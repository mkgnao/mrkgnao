<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\MdContent;

class MdController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        \Log::info('show');
        $mdContent = MdContent::findOrFail($id);
        \Log::info('show find or fail');
        return \View::make('md.show', compact('mdContent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mdContent = MdContent::find($id);

        return \View::make('md.edit');
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

        return \View::make('md.show', compact('mdContent'));
    }
}
