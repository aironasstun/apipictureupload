<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Fileupload;

class FileuploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'content' => 'required',
        //     'img' => 'image|nullable|max:10000'
        // ]);
        
        $picture = $request->file('image');
        return response()->json($picture);

        if($picture)
        {

            $filenameWithExt = $picture[name]->getClientOriginalName(); // Full file name
            $filename = pathinfo($filenameWithExt, PATHINFOFILENAME); //File name without extension
            $extension = $picture->guessClientExtension(); //Only file extesion name
            $fileName= $filename.''.time().'.'.$extension; //Concatenated file name and extension

            // Image path ready to upload
            $picture->storeAs('public/posts-images', $fileName);


            $test = Fileupload::create([
                'filename' => 'Test',
                //'content' => request('content'),
                'img' => $fileName,
           ]);
        
        $test->save();
        return response()->json('Done');
            

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}