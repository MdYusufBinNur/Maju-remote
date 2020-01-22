<?php

namespace App\Http\Controllers;

use App\About;
use App\Blog;
use App\Category;
use App\Contact;
use App\Design;
use App\Gallery;
use App\Profile;
use App\Service;
use App\Slider;
use App\SocialLinker;
use App\Videography;
use App\VideoService;
use Illuminate\Http\Request;

class WebController extends Controller
{

//  ----------For Web home------------
    public  function home()
    {
        //return view('web.web_home');
//        $sliders = Slider::query()->select('*')->orderBy('id','DESC')->limit(4)->get();
        $sliders = Slider::query()->select('*')->orderBy('id','ASC')->get();
        $linkers = $this->common_linker();
        $contact = $this->common_contact();

        //return $linkers;
        $insta_apis =  $this->insta_api();
       //return $insta_apis;
        return view('web.web_home',compact('linkers','contact','sliders','insta_apis'));
    }

//  ------------For Photography Page-------------
    public function photography()
    {
        $linkers = $this->common_linker();
        $contact = $this->common_contact();
        // $categories = Category::with('gallery')->get();
        $categories = Category::query()->select('*')->where('category_type', '=','Photography')->get();
        $services = $this->service();
        //return $categories;
        return view('web.photography.photography',compact('linkers','contact','categories','services'));
    }

//  ------------For Videography Page-------------
    public  function videography($id)
    {
        //return $id;

        $contact = $this->common_contact();
        $categories = Category::query()->select('*')->where('category_type', '=','Videography')->get();

        $linkers_blog = $this->common_linker();

        $video_services = VideoService::query()->select('*')->orderBy('order_no','ASC')->get();
        if ($id == 'all')
        {
            $all_videos = Videography::all();

            return view('web.videography.videography',compact('contact','video_services','categories','all_videos','linkers_blog'));

        }
        else
        {
            $all_videos = Videography::query()->select('*')->where('category_id','=',$id)->get();
            $cat_name = Category::query()->select('category_name')->where('id','=',$id)->first();
            return view('web.videography.videography',compact('contact','video_services','categories','all_videos','linkers_blog','cat_name'));
        }
    }

//  -----For About Page----------
    public  function about()
    {
        $linkers = $this->common_linker();
        $contact = $this->common_contact();
//      $abouts = About::query()->select('*')->orderBy('id','ASC')->limit(5)->get();
        $abouts = About::all();
        //return $abouts;
        return view('web.about.about',compact('linkers','contact','abouts'));

    }

//  -------For Shop page-----------
    public function shop()
    {
        $linkers = $this->common_linker();
        $contact = $this->common_contact();
        return view('web.shop.shop',compact('linkers','contact'));

    }

//  ---------- For Design Page--------------
    public  function design()
    {
        $linkers = $this->common_linker();
        $contact = $this->common_contact();
        $designs = Design::all();
        return view('web.design.design',compact('linkers','contact','designs'));
    }

//  ---------- For Blog Page------------------
    public function blog()
    {
        $sliders = Slider::query()->select('*')->orderBy('id','DESC')->limit(4)->get();
        $categories = Category::query()->select("*")->where('category_type','=','Blog')->get();
        $blogs = Blog::query()->select('blogs.title','blogs.image','blogs.id','blogs.category_id','blogs.date')->orderBy('id','DESC')->paginate(4);
        $linkers = $this->common_linker();
        $contact = $this->common_contact();

        $populer_posts = Blog::query()->select('*')->orderBy('count_no','DESC')->limit(3)->get();
        //return $populer_posts;
        $profiles = $this->profile();
        return view('web.blog.blog',compact('linkers','profiles','contact','blogs','categories','sliders','populer_posts'));

    }

    public function categorized_blog($id)
    {

        $categories = Category::query()->select("*")->where('category_type','=','Blog')->get();
        $category_name = Category::find($id);
//        $blogs = Blog::query()->select('*')->orderBy('id','DESC')->where('category_id','=',$id)->paginate(6);
        $categorized_blogs = Blog::query()->select('blogs.title','blogs.image','blogs.id','blogs.category_id','blogs.date')->orderBy('id','DESC')->where('category_id','=',$id)->paginate(4);
        $linkers_blog = $this->common_linker();
        $contact = $this->common_contact();
        $profiles = $this->profile();
        $categorized_populer_posts = Blog::query()->select('*')->orderBy('count_no','DESC')->limit(3)->get();

        //return $linkers;
        return view('web.blog.blog',compact('linkers_blog','profiles','contact','categorized_blogs','categories','category_name','categorized_populer_posts'));
        //return $id;
    }

    public function blog_details($id)
    {
        $blog = Blog::find($id);
        $linkers_blog = $this->common_linker();
        $contact = $this->common_contact();

        $count = $blog->count_no + 1;

        //return $count;
        Blog::find($id)->update(
            [
                'count_no' => $count
            ]
        );
        return view('web.blog.blog_details',compact('linkers_blog','blog','contact'));




    }

    public function profile()
    {
        $profile = Profile::query()->select('*')->orderBy('id','DESC')->first();
        return $profile;
    }

//  ----------- Common Social Linker For All Footers
    public function common_linker()
    {
        $linkers = SocialLinker::all();
        return $linkers;
    }

    public function common_contact()
    {
        $contact = Contact::query()->select('*')->orderBy('id','DESC')->first();
        return $contact;
    }



//  ---------- Instagram Api ---------------
    public function insta_api()
    {
        $access_token = "1768553477.1662a35.9ec60db77cac406c98ffbfea1f3ef98e"; //Access Token Generated by Instagram Auth

        $ch = curl_init(); //Initializing cURL Session
        curl_setopt($ch, CURLOPT_URL, "https://api.instagram.com/v1/users/self/media/recent/?count=4&access_token=".$access_token); //Sending GET Request to the Instagram API along with the Access Token
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //Informing the cURL session of a return value.

        $server_output = curl_exec($ch); //Executing the request and catching the return value in variable.
        $output_json = json_decode($server_output, true); //decoding the response json and storing in another variable.
        $posts = $output_json["data"]; //The full posts returned by API is stored in another array.
        curl_close($ch); //cURL Session Closed

        $feeds = array(); //Declared an array to call while displaying.

        //Loop through the posts
        for($i = 0; $i < count($posts); $i++){

            //Insert necessary informations to feed array
            $feeds[$i]["name"] = "Name: ". $posts[$i]["user"]["full_name"];
            $feeds[$i]["image_url"] = $posts[$i]["images"]["standard_resolution"]["url"];
            $created_at = $posts[$i]["created_time"];
            $feeds[$i]["created_time"] = date('M j, Y', $created_at);
            $feeds[$i]["like"] = $posts[$i]["likes"]["count"];
        }

        return json_encode($feeds);
    }

//  ------------- Photography Page -------------
    public function get_gallery($id)
    {

        $result = Gallery::with('category')->where('category_id','=',$id)->get();
        return json_encode($result);
    }
    public function get_images($id)
    {
        $res = Gallery::find($id);
        $result = json_decode($res->gallery_images);
        return json_encode($res);
    }
    public function service()
    {
        $services = Service::query()->select('*')->orderBy('order_no','ASC')->get();
        return $services;
    }




}
