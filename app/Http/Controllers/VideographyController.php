<?php

namespace App\Http\Controllers;

use App\Category;
use App\Videography;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class VideographyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_videos = Videography::all();
        $all_categories = Category::where('category_type','=','Videography')->get();
//        return $all_videos;
        return view('admin.videography.videography_list',compact('all_videos','all_categories'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_categories = Category::where('category_type','=','Videography')->get();
        return view('admin.videography.add_new_videography',compact('all_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $video_file = $request->file('video_file');
//
//
//        if (!empty($video_file))
//        {
//            $fileType = $video_file->getClientOriginalExtension();
//            $videoName = rand().'.'.$fileType;
//            $dir = 'Video_File/';
//            $video_url = $dir.$videoName;
//            $video_file->move($dir, $videoName);
//        }
//        else
//        {
//            $video_url = null;
//        }

        $video_link = $request->get('video_link');
        $video_key = str_replace("https://www.youtube.com/watch?v=","",$video_link);
        //return $video_key;
        $result = Videography::create(
            [

                'category_id' =>$request->get('category_id'),
                'name' => $request->get('video_title'),
//                'video_file' => $video_url,
                'video_link' => $video_link,
                'video_key' => $video_key,
            ]
        );

        if ($result)
        {
            return back()->with('success','Data Stored Successfully');
        }
        else
        {
            return back()->with('error','Failed To Store Data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Videography  $videography
     * @return \Illuminate\Http\Response
     */
    public function show(Videography $videography)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Videography  $videography
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = Videography::with('category')->find($id);
        return json_encode($result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Videography  $videography
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $old_data = Videography::find($request->get('video_id'));

        $video_link = $request->get('video_link');
        $video_key = str_replace("https://www.youtube.com/watch?v=","",$video_link);


        $image = $request->file('cover_image');
        $video_file = $request->file('video_file');

        if (!empty($request->get('category_id')))
        {
            $category_id = $request->get('category_id');
        }
        else
        {
            $category_id = $old_data->category_id;
        }

//
//        if (!empty($video_file))
//        {
//            File::delete($old_data->video_file);
//            $fileType = $video_file->getClientOriginalExtension();
//            $videoName = rand().'.'.$fileType;
//            $dir = 'Video_File/';
//            $video_url = $dir.$videoName;
//            $video_file->move($dir, $videoName);
//        }
//        else
//        {
//            $video_url = $old_data->video_file;
//        }

        $result = Videography::find($request->get('video_id'))->update(
            [
                'category_id' => $category_id,
                /*    'name' => $request->get('video_title'),
                      'video_file' =>$video_url,
                      'video_link' => $request->get('video_link')
                */
                'name' => $request->get('video_title'),

                'video_link' => $video_link,
                'video_key' => $video_key,

            ]
        );

        if ($result)
        {
            return back()->with('success','Data Stored Successfully');
        }
        else
        {
            return back()->with('error','Failed To Store Data');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Videography  $videography
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old_file = Videography::find($id);

        //dd($old_file);
        //return $old_file;

        if (!$old_file)
        {
            return back()->with('error','Failed To Delete');
        }
        else{
            File::delete($old_file->video_file);
            Videography::find($id)->delete();
            return back()->with('success','Data Deleted');
        }
    }
}
