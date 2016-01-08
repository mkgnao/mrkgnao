<?php namespace App\Http\TeamWorkPm\Response;

use App\Http\TeamWorkPm\Helper\Str;
use ArrayObject;

class JSON extends Model
{

    public function parse($data, array $headers)
    {
        \Log::info('data: '.$data);

        $source = json_decode($data, true);

        \Log::info('STATUS: '.$source['STATUS']);

        $errors = $this->getJsonErrors();
        $this->string = $data;

        if (!$errors) {
            if (!(
                $headers['Status'] === 201 ||
                $headers['Status'] === 200 ||
                $headers['Status'] === 409 ||
                $headers['Status'] === 422
            )
            ) {
                print_r($headers);
                exit;
            }
            if ($headers['Status'] === 201 || $headers['Status'] === 200) {
                switch ($headers['Method']) {
                    case 'UPLOAD':
                        if (!empty($source['pendingFile']) && !empty($source['pendingFile']['ref'])) {
                            return (string)$source['pendingFile']['ref'];
                        }
                    case 'POST':
                        // print_r($headers);
                        if (!empty($headers['id'])) {
                            return (int)$headers['id'];
                        } elseif (!empty($source['fileId'])) {
                            return (int)$source['fileId'];
                        }
                    // no break
                    case 'PUT':
                    case 'DELETE':
                        return true;

                    default:
                        if (!empty($source['STATUS'])) {
                            unset($source['STATUS']);
                        }
                        if (!empty($source['project']) && !empty($source['project']['files'])) {
                            $source = $source['project']['files'];
                        } elseif (!empty($source['project']) && !empty($source['project']['notebooks'])) {
                            $source = $source['project']['notebooks'];
                        } elseif (!empty($source['project']) && !empty($source['project']['links'])) {
                            $source = $source['project']['links'];
                        } elseif (
                            !empty($source['messageReplies']) &&
                            preg_match(
                                '!messageReplies/(\d+)!',
                                $headers['X-Action']
                            )
                        ) {
                            $source = current($source['messageReplies']);
                        } elseif (
                            !empty($source['people']) &&
                            preg_match(
                                '!projects/(\d+)/people/(\d+)!',
                                $headers['X-Action']
                            )
                        ) {
                            $source = current($source['people']);
                        } elseif (
                            !empty($source['project']) &&
                            preg_match(
                                '!projects/(\d+)/notebooks!',
                                $headers['X-Action']
                            )
                        ) {
                            $source = [];
                        } else {
                            $source = current($source);
                        }
                        if ($headers['X-Action'] === 'links' ||
                            $headers['X-Action'] === 'notebooks'
                        ) {
                            $_source = [];
                            $wrapper = $headers['X-Action'];
                            foreach ($source as $project) {
                                foreach ($project->$wrapper as $object) {
                                    $_source[] = $object;
                                }
                            }
                            $source = $_source;
                        } elseif (
                            strpos($headers['X-Action'], 'time_entries') > 0 &&
                            !$source
                        ) {
                            $source = [];
                        }
                        $this->headers = $headers;
                        $this->string = json_encode($source);

                        // HACK: DDYOK BECAUSE OF HHVM
                        $source_obj = json_decode(json_encode($source));

                        \Log::info('this string:'.$this->string);
                        //\Log::info('post source:'.$source);
                        \Log::info('source obj:'.$source_obj);

                        $this->data = self::camelizeObject($source_obj);

                        if (!empty($this->data->id)) {
                            $this->data->id = (int)$this->data->id;
                        }

                        return $this;
                }
            } elseif (!empty($source['MESSAGE'])) {
                $errors = $source['MESSAGE'];
            } else {
                $errors = null;
            }
        }

        throw new \App\Http\TeamWorkPm\Exception([
            'Message' => $errors,
            'Response' => $data,
            'Headers' => $headers
        ]);
    }

    /**
     * @codeCoverageIgnore
     */
    private function getJsonErrors()
    {
        $errorCode = json_last_error();
        if (!$errorCode) {
            return null;
        }

        if (function_exists('json_last_error_msg')) {
            return json_last_error_msg();
        }

        switch ($errorCode) {
            case JSON_ERROR_DEPTH:
                return 'Maximum stack depth exceeded';
                break;
            case JSON_ERROR_STATE_MISMATCH:
                return 'Underflow or the modes mismatch';
                break;
            case JSON_ERROR_CTRL_CHAR:
                return 'Unexpected control character found';
                break;
            case JSON_ERROR_SYNTAX:
                return 'Syntax error, malformed JSON';
                break;
            case JSON_ERROR_UTF8:
                return 'Malformed UTF-8 characters, possibly incorrectly encoded';
                break;
        }
        return null;
    }

    protected static function camelizeObject($source)
    {

        \Log::info($source);

        $destination = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
        foreach ($source as $key => $value) {
            if (ctype_upper($key)) {
                $key = strtolower($key);
            }
            $key = Str::camel($key);
            $destination->$key = is_scalar($value) ?
                $value : self::camelizeObject($value);
        }
        return $destination;
    }

    protected function getContent()
    {
        $object = json_decode($this->string);

        return json_encode($object, JSON_PRETTY_PRINT);
    }
}
