@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
  <h2 class="title text-center">Danh mục bài viết</h2>
  <?php foreach ($post as $key => $p): ?>
    <div class="single-products" style="padding: 10px;display:block;">
            <div class="text-center" >
                <img style="float:left;width:350px;height:200px;" src="{{asset('public/uploads/post/'.$p->post_image)}}" alt="{{$p->post_slug}}" >
                <h3 >{{$p->post_title}}</h3>
                <p>{!! $p->post_desc !!}<p>
                <a href="" class="btn btn-default btn-sm add-to-cart" >Xem bài viết</a>

            </div>

    </div>

  </div >
  <div class="clearfix"><div>
  <?php endforeach; ?>


        <!--/recommended_items-->
</div>

@endsection
