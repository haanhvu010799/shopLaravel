<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Brand;
use App\Slider;
use App\CatePost;
use Session;
use App\Contact;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class ContactController extends Controller
{
    public function lien_he(Request $request)
    {
    	$category_post = CatePost::orderBy('cate_post_id','DESC')->get();
        // $category_post=DB::table('tbl_category_post')->where('cate_post_status','0')->orderBy('cate_post_id','desc')->get();
        //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        //seo
        $meta_desc = "Liện hệ với chúng tôi";
        $meta_keywords = "Liên Hệ,contact";
        $meta_title = "Liện hệ với chúng tôi";
        $url_canonical = $request->url();
        //--seo

    	  $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
    	
    	return view('pages.lienhe.contact')->with('category',$cate_product)->with('brand',$brand_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider)->with('category_post',$category_post); 
    }
    public function information(){

    	return view('admin.lienhe.add_information');
    }
}
