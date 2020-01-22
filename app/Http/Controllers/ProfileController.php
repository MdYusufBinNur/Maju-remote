<?php

namespace App\Http\Controllers;

use App\Profile;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_profiles = Profile::all();
        return view('admin.profile.profile_list',compact('all_profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profile.add_new_profile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('profile_image');
        if (!empty($image))
        {
            $fileType    = $image->getClientOriginalExtension();
            $imageName   = rand().'.'.$fileType;
            $directory   = 'Profile_Images/';
            $imageUrl    = $directory.$imageName;
            Image::make($image)->save($imageUrl);
        }
        //return $request->file('image');
        else
        {
            $imageUrl = null;
        }


        $result = Profile::create([
            'profile_name' =>$request->profile_name,
            'profile_description' => $request->get('profile_description'),
            'profile_image' => $imageUrl,
        ]);

        if ($result)
        {
            return back()->with('success','Data Inserted Successfully');
        }
        else
        {
            return back()->with('error',' Failed to insert data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $res = Profile::find($id);
        return json_encode($res);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //return $request;
        $id = $request->get('profile_id');
        $old_val = Profile::find($id);
        $image = $request->file('profile_image');
        if (!empty($image))
        {
            File::delete($old_val->profile_image);
            $fileType    = $image->getClientOriginalExtension();
            $imageName   = rand().'.'.$fileType;
            $directory   = 'Profile_Images/';
            $imageUrl    = $directory.$imageName;
            Image::make($image)->save($imageUrl);
        }
        //return $request->file('image');
        else
        {
            $imageUrl = $old_val->profile_image;
        }
        $result = Profile::find($id)->update([
            'profile_name' =>$request->get('profile_name'),
            'profile_description' => $request->get('profile_description'),
            'profile_image' => $imageUrl,
        ]);

        if ($result)
        {
            return back()->with('success','Data Inserted Successfully');
        }
        else
        {
            return back()->with('error',' Failed to insert data');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old_val = Profile::find($id)->count();

        //return $old_val;
       if ($old_val > 0)
       {
           $old_val = Profile::find($id);
           File::delete($old_val->profile_image);
           $res = Profile::find($id)->delete();
           return back()->with('success','Successfully deleted');
       }
       else {
           return back()->with('error','Failed to delete');
       }



    }
}
