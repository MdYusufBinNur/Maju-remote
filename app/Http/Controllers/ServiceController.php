<?php

namespace App\Http\Controllers;

use App\Service;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    public function index()
    {
        $all_services = Service::query()->select('*')->orderBy('order_no','ASC')->get();
        return view('admin.service.service_list',compact('all_services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.add_new_service');
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
        if (!empty($image))
        {
            $fileType    = $image->getClientOriginalExtension();
            $imageName   = rand().'.'.$fileType;
            $directory   = 'Service_Images/';
            $imageUrl    = $directory.$imageName;
            Image::make($image)->save($imageUrl);
        }
        //return $request->file('image');
        else
        {
            $imageUrl = null;
        }

        $result = Service::create([
            'title' => $request->get('title'),
            'title_description' => $request->get('title_description'),
            'title_image' => $imageUrl,
            'order_no' =>  $request->get('order_no'),
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = Service::find($id);
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
        $image = $request->file('title_image');
        $id = $request->service_id;
        $old_category_info =  Service::find($id);

        //return $request->file('title_image');
        if (!empty($image)){

            File::delete($old_category_info->title_image);

            $fileType    = $image->getClientOriginalExtension();
            $imageName   = rand().'.'.$fileType;
            $directory   = 'Service_Images/';
            $imageUrl    = $directory.$imageName;
            Image::make($image)->save($imageUrl);

            $result = Service::find($id)->update([
                'title' => $request->get('title'),
                'title_description' => $request->get('title_description'),
                'title_image' => $imageUrl,
                'order_no' =>  $request->get('order_no'),

            ]);
        }
        else
        {
            $result =Service::find($id)->update([
                'title' => $request->get('title'),
                'order_no' =>  $request->get('order_no'),
                'title_description' => $request->get('title_description'),
            ]);
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
        $about = Service::find($id);

        if (!$about)
        {

            return back()->with('error','Failed To Delete');
        }
        else{
            File::delete($about->title_image);
            Service::find($id)->delete();
            return back()->with('success','Data Deleted');
        }
    }


    public function check_validity($id)
    {

        $res = Service::query()->select('*')->where('order_no','=',$id)->count();


        return response()->json($res);
//        if (count($res) != null)
//        {
//            return response()->json($res,200);
//        }
//        else
//        {
//            return response()->json("available",200);
//        }
        //
    }


    public function update_priority(Request $request)
    {
        $data = $request->input('index_no');

        foreach ($data as $key=>$value)
        {
            $result = Service::find($value)->update(
                [
                    'order_no' => $key+1
                ]
            );
        }


        return response()->json("Success");
    }
}
