<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Carbon\Carbon;
use DemeterChain\B;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_categories = Category::where('category_type','=','Blog')->get();
        $all_blogs = Blog::query()->select('*')->orderBy('id','DESC')->get();
        return view('admin.blog.blog_list',compact('all_blogs','all_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_categories = Category::where('category_type','=','Blog')->get();
        return view('admin.blog.add_new_blog',compact('all_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // return $request;
        set_time_limit(100);
        $image = $request->file('image');
        if (!empty($image))
        {
            $fileType    = $image->getClientOriginalExtension();
            $imageName   = rand().'.'.$fileType;
            $directory   = 'Blog_Images/';
            $imageUrl    = $directory.$imageName;
            Image::make($image)->save($imageUrl);
        }
        //return $request->file('image');
        else
        {
            $imageUrl = null;
        }

        $date = Carbon::now()->format('d-m-Y');
        $result = Blog::create([
            'category_id' => $request->get('category_id'),
            'title' => $request->get('title'),
            'date' => $date,
            'image' =>$imageUrl,
            'description' => $request->get('description'),

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
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $res = Blog::with('category')->find($id);
        return json_encode($res);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //return $request;
        //set_time_limit(100);

        $gal_id = $request->get('blog_id');

        $check_old = Blog::find($gal_id);
        if (empty($request->get('category_id')))
        {
            if ($request->file('image'))
            {
                $image = $request->file('image');
                $fileType    = $image->getClientOriginalExtension();
                $imageName   = rand().'.'.$fileType;
                $directory   = 'Blog_Images/';
                $imageUrl    = $directory.$imageName;
                Image::make($image)->save($imageUrl);

                File::delete($check_old->image);

                Blog::find($gal_id)->update([
                    'title' => $request->get('title'),
                    'image' =>$imageUrl,

                ]);

                Blog::find($gal_id)->update([

                    'description' => $request->get('description'),
                ]);
            }
            else
            {
                Blog::find($gal_id)->update([
                    'title' => $request->get('title'),
                    'description' => $request->get('description'),
                ]);
            }

        }
        else
        {
            if ($request->file('image'))
            {
                $image = $request->file('image');
                $fileType    = $image->getClientOriginalExtension();
                $imageName   = rand().'.'.$fileType;
                $directory   = 'Blog_Images/';
                $imageUrl    = $directory.$imageName;
                Image::make($image)->save($imageUrl);

                File::delete($check_old->image);


                Blog::find($gal_id)->update([

                    'category_id' => $request->get('category_id'),
                    'title' => $request->get('title'),
                    'image' =>$imageUrl,
                    'description' => $request->get('description'),
                ]);
            }
            else
            {
                Blog::find($gal_id)->update([
                    'category_id' => $request->get('category_id'),
                    'title' => $request->get('title'),
                    'description' => $request->get('description'),
                ]);
            }
        }

        return back()->with('success','Images Updated Successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = Blog::find($id);

        if (!$about)
        {

            return back()->with('error','Failed To Delete');
        }
        else{
            File::delete($about->image);
            Blog::find($id)->delete();
            return back()->with('success','Data Deleted');
        }
    }
}
