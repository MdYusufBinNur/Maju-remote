<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_categories = Category::all();
        return view('admin.category.category_list',compact('all_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.add_new_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $result = Category::create([
            'category_name' => $request->get('category_name'),
            'category_type' => $request->get('category_type'),
            'category_description' => $request->get('category_description')
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
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = Category::find($id);
        return json_encode($result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $id = $request->get('category_id');
        $old_category = Category::find($id);

        if (!empty($request->get('category_type')))
        {
            $category_type = $request->get('category_type');
        }
        else
        {
            $category_type = $old_category->category_type;
        }

        $result = Category::find($request->get('category_id'))->update([

            'category_name' => $request->get('category_name'),
            'category_type' => $category_type,
            'category_description' => $request->get('category_description')
        ]);
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
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check  = Category::find($id);

        if (!empty($check))
        {
            Category::find($id)->delete();
            return back()->with('success','Deleted Successfully');
        }
        else
        {
            return back()->with('error','Failed To Updated');

        }
    }
}
