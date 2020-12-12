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
use App\Gallery;
use Illuminate\Support\Facades\Redirect;

class GalleryController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_gallery($product_id){
        $pro_id = $product_id;
        return view('admin.gallery.add_gallery')->with(compact('pro_id'));
    }
    public function select_gallery(Request $request){
      $product_id= $request->pro_id;
      $gallery= Gallery::where('product_id',$product_id)->get();
      $gallery_count=$gallery->count();
      $output =' <table class="table table-hover">
        <thead>
          <tr>
            <th>Thứ tự</th>
            <th>Tên hình ảnh</th>
            <th>Ảnh: </th>
            <th>Quản lý </th>
          </tr>
        </thead>
        <tbody>
      ';
      if($gallery_count>0){
        $i=0;
        foreach ($gallery as $key => $gal) {
          $i++;
          $output.=
          "<tr>
            <td>'.$i.' </td>
            <td>'.$gal->gallery_name.' </td>
            <td>'.$gal->gallery_image.' </td>
            <td>
              <button data-gal_id=".$gal->gallery_id.">Xóa </button>
            </td>
          </tr>";

        }
      }else{
        $output.='<tr>
          <td colspan="4"> Ảnh chưa được thêm vào </td>
        </tr>';
      }
      echo $output;
    }
}
