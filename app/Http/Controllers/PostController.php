<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Slider;
use App\Http\Requests;
use App\Post;
use App\CatePost;
use Illuminate\Support\Facades\Redirect;
session_start();

class PostController extends Controller
{
      public function AuthLogin(){
          $admin_id = Session::get('admin_id');
          if($admin_id){
              return Redirect::to('dashboard');
          }else{
              return Redirect::to('admin')->send();
          }
      }
      public function add_post(){
          $this->AuthLogin();
          $cate_post= CatePost::orderBy('cate_post_id','DESC')->get();
          return view('admin.post.add_post')->with(compact('cate_post'));

      }
      public function save_post(Request $request){
            $this->AuthLogin();
      	    $data = $request->all();
            $post = new Post();
            $post->post_title=$data['post_title'];
            $post->post_slug=$data['post_slug'];
            $post->post_desc=$data['post_desc'];
            $post->post_content=$data['post_content'];
            $post->post_meta_keywords=$data['post_meta_keywords'];
            $post->cate_post_id=$data['cate_post_id'];
            $post->post_status=$data['post_status'];
            $get_image=$request->file('post_image');

          if($get_image){
              $get_name_image = $get_image->getClientOriginalName();
              $name_image = current(explode('.',$get_name_image));
              $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
              $get_image->move('public/uploads/post',$new_image);
              $post->post_image=$new_image;
              $post->save();
              Session::put('message','Thêm bài viết thành công');
              return redirect()->back();
          }
          // Cho phép để ảnh trống
          else{
            $post->post_image=' ';
          	$post->save();
          	Session::put('message','Thêm bài viết thành công');
          	return redirect()->back();
          }

      }
      public function all_post(){
        $this->AuthLogin();
        $all_post= Post::orderBy('post_id','desc')->paginate(10);

        return view('admin.post.list_post')->with(compact('all_post'));

      }

      public function unactive_post(Request $request,$post_id){
          $this->AuthLogin();
          DB::table('tbl_posts')->where('post_id',$post_id)->update(['post_status'=>1]);
          Session::put('message','Không kích hoạt sản phẩm thành công');
          return redirect()->back();

      }
      public function active_post(Request $request,$post_id){
          $this->AuthLogin();
          DB::table('tbl_posts')->where('post_id',$post_id)->update(['post_status'=>0]);
          Session::put('message','Không kích hoạt sản phẩm thành công');
          return redirect()->back();
      }
      // public function edit_post($post_id){
      //      $this->AuthLogin();
      //     $cate_post = DB::table('tbl_category_post')->orderby('category_id','desc')->get();
      //     $brand_post = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
      //
      //     $edit_post = DB::table('tbl_post')->where('post_id',$post_id)->get();
      //
      //     $manager_post  = view('admin.edit_post')->with('edit_post',$edit_post)->with('cate_post',$cate_post)->with('brand_post',$brand_post);
      //
      //     return view('admin_layout')->with('admin.edit_post', $manager_post);
      // }
      // public function update_post(Request $request,$post_id){
      //      $this->AuthLogin();
      //     $data = array();
      //     $data['post_name'] = $request->post_name;
      //     $data['post_quantity'] = $request->post_quantity;
      //     $data['post_slug'] = $request->post_slug;
      //     $data['post_price'] = $request->post_price;
      //     $data['post_desc'] = $request->post_desc;
      //     $data['post_content'] = $request->post_content;
      //     $data['category_id'] = $request->post_cate;
      //     $data['brand_id'] = $request->post_brand;
      //     $data['post_status'] = $request->post_status;
      //     $get_image = $request->file('post_image');
      //
      //     if($get_image){
      //                 $get_name_image = $get_image->getClientOriginalName();
      //                 $name_image = current(explode('.',$get_name_image));
      //                 $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
      //                 $get_image->move('public/uploads/post',$new_image);
      //                 $data['post_image'] = $new_image;
      //                 DB::table('tbl_post')->where('post_id',$post_id)->update($data);
      //                 Session::put('message','Cập nhật sản phẩm thành công');
      //                 return Redirect::to('all-post');
      //     }
      //
      //     DB::table('tbl_post')->where('post_id',$post_id)->update($data);
      //     Session::put('message','Cập nhật sản phẩm thành công');
      //     return Redirect::to('all-post');
      // }
      public function delete_post($post_id){
          $this->AuthLogin();
          $post=Post::find($post_id);
          $post_image= $post->post_image;

          $post->delete();
          Session::put('message','Xóa bài viết thành công');
          return redirect()->back();
      }
      public function danh_muc_bai_viet(Request $request, $post_slug)  {
        //CategoryPost
        // $category_post= DB::table('tbl_posts')->join('tbl_category_post','tbl_posts.cate_post_id','=','tbl_category_post.cate_post_id')->where('tbl_category_post.cate_post_slug',$post_slug)->paginate(10);
        $category_post= CatePost::orderBy('cate_post_id','DESC')->get();
        //slide
       $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
       // $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
       // $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
       $catepost = CatePost::where('cate_post_slug',$post_slug)->take(1)->get();
       $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
       $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

       foreach ($catepost as $key => $cate) {
         $meta_desc = $cate -> cate_post_desc;
         $meta_keywords=$cate->cate_post_slug;
         $meta_title=$cate->cate_post_name;
         $cate_id=$cate->cate_post_id;
         $url_canonical = $request->url();
       }
       // $post=Post::with('cate_post')->where('post_status',0)->where('cate_post_id',$cate_id)->paginate(20);
       $post= Post::orderBy('post_id','ASC')->where('post_status',0)->where('cate_post_id',$cate_id)->paginate(15);
        return view('pages.baiviet.danhmucbaiviet')->with('category',$cate_product)->with('brand',$brand_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider)->with('post',$post)->with('category_post',$category_post);
      }
  }
