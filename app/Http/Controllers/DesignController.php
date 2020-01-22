<?php

namespace App\Http\Controllers;

use App\Design;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class DesignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_designs = Design::all();
        return view('admin.design.design_list',compact('all_designs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.design.add_new_design');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('title_image');
        $background_image = $request->file('background_image');
        if (!empty($image))
        {
            $fileType    = $image->getClientOriginalExtension();
            $imageName   = rand().'.'.$fileType;
            $directory   = 'Design_Images/';
            $imageUrl    = $directory.$imageName;
            Image::make($image)->save($imageUrl);

        }
        //return $request->file('image');
        else
        {
            $imageUrl = null;
        }
        if (!empty($background_image))
        {
            $fileType    = $background_image->getClientOriginalExtension();
            $imageName   = rand().'.'.$fileType;
            $directory   = 'Design_Images/';
            $background_imageUrl    = $directory.$imageName;
            Image::make($background_image)->save($background_imageUrl);

        }
        //return $request->file('image');
        else
        {
            $background_imageUrl = null;
        }

        $result = Design::create([
            'title' => $request->get('title'),
            'title_value' => $request->get('title_value'),
            'title_description' => $request->get('title_description'),
            'title_image' => $imageUrl,
            'background_image' => $background_imageUrl,
        ]);
        if ($result)
        {
            return back()->with('success','Added Successfully');
        }
        else
        {
            return back()->with('error','Failed To Add');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(Design $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = Design::find($id);
        return json_encode($result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //return $request;
        $background_image = $request->file('background_image');
        $image = $request->file('title_image');
        $old_category_info =  Design::find($request->design_id);

        //return $old_category_info;
        //return $request->file('title_image');
        if (!empty($image)){

            File::delete($old_category_info->title_image);

            $fileType    = $image->getClientOriginalExtension();
            $imageName   = rand().'.'.$fileType;
            $directory   = 'Design_Images/';
            $imageUrl    = $directory.$imageName;
            Image::make($image)->save($imageUrl);

            if (!empty($background_image))
            {
                File::delete($old_category_info->background_image);
                $fileType    = $background_image->getClientOriginalExtension();
                $imageName   = rand().'.'.$fileType;
                $directory   = 'Design_Images/';
                $background_imageUrl    = $directory.$imageName;
                Image::make($background_image)->save($background_imageUrl);
                $result = Design::find($request->design_id)->update([
                    'title' => $request->get('title'),

                    'title_description' => $request->get('title_description'),
                    'title_image' => $imageUrl,

                ]);
            }
            else
            {

                $result = Design::find($request->design_id)->update([
                    'title' => $request->get('title'),

                    'title_description' => $request->get('title_description'),
                    'title_image' => $imageUrl,
                ]);
            }

        }
        else
        {
            if (!empty($background_image))
            {
                File::delete($old_category_info->background_image);
                $fileType    = $background_image->getClientOriginalExtension();
                $imageName   = rand().'.'.$fileType;
                $directory   = 'Design_Images/';
                $background_imageUrl    = $directory.$imageName;
                Image::make($background_image)->save($background_imageUrl);

                $result = Design::find($request->design_id)->update([
                    'title' => $request->get('title'),
                    'title_value' => $request->get('title_value'),
                    'title_description' => $request->get('title_description'),

                ]);
            }
            else
            {
                $result = Design::find($request->design_id)->update([
                    'title' => $request->get('title'),
                    'title_value' => $request->get('title_value'),
                    'title_description' => $request->get('title_description'),

                ]);
            }

        }

        if ($result)
        {
            return back()->with('success','Updated Successfully');
        }
        else
        {
            return back()->with('error','Failed To Update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = Design::find($id);

        if (!$about)
        {
            return back()->with('error','Failed To Delete');
        }
        else{
            File::delete($about->title_image);
            Design::find($id)->delete();
            return back()->with('success','Data Deleted');
        }
    }
}
