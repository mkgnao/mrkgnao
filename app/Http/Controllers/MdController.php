<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\MdContent;

class MdController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mdContent = MdContent::findOrFail($id);
        return view('md.show', ['mdContent' => MdContent::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        \Log::info('show: '.$id);
        $mdContent = MdContent::findOrFail($id);
        \Log::info('show find or fail');
        return view('md.edit', ['mdContent' => MdContent::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mdContent = MdContent::findOrFail($id);

        $mdContent->content = $request->data['content'];

        $mdContent->save();

        Session::flash('message', 'saved');

        return Redirect::route('md.edit', ['mdContent' => MdContent::findOrFail($id)]);
    }
}
