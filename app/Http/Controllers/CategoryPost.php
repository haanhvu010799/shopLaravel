<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Slider;
use Auth;
use CategorypostModel;
use Session;
use App\CatePost;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

session_start();
class CategoryPost extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_category_post(){
        $this->AuthLogin();
    	return view('admin.category_post.add_category');
    }
    public function save_category_post(Request $request){
        $this->AuthLogin();
    	$data = $request->all();
      $category_post = new CatePost();
      $category_post -> cate_post_name =  $data['cate_post_name'];
      $category_post -> cate_post_slug =  $data['cate_post_slug'];
      $category_post -> cate_post_desc =  $data['cate_post_desc'];
      $category_post -> cate_post_status =  $data['cate_post_status'];
      $category_post-> save();
    	Session::put('message','Thêm danh mục bài viết thành công');
    	return redirect()->back();
    }
    public function all_category_post(){
      $this->AuthLogin();
      $category_post = CatePost::orderBy('cate_post_id','DESC')->paginate(10);
      return view('admin.category_post.list_category')->with(compact('category_post'));
    }

    public function danh_muc_bai_viet($cate_post_slug)  {
      

    }
  /*  public function edit_category_post($category_post_id){
        $this->AuthLogin();
        $edit_category_post = DB::table('tbl_category_post')->where('category_id',$category_post_id)->get();

        $manager_category_post  = view('admin.edit_category_post')->with('edit_category_post',$edit_category_post);

        return view('admin_layout')->with('admin.edit_category_post', $manager_category_post);
    }
    public function update_category_post(Request $request,$category_post_id){
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_post_name;
        $data['meta_keywords'] = $request->category_post_keywords;
        $data['slug_category_post'] = $request->slug_category_post;
        $data['category_desc'] = $request->category_post_desc;
        DB::table('tbl_category_post')->where('category_id',$category_post_id)->update($data);
        Session::put('message','Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('all-category-post');
    }
    public function delete_category_post($category_post_id){
        $this->AuthLogin();
        DB::table('tbl_category_post')->where('category_id',$category_post_id)->delete();
        Session::put('message','Xóa danh mục sản phẩm thành công');
        return Redirect::to('all-category-post');
    } */
}
