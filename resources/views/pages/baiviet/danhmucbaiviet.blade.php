@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
  <h2 class="title text-center">{{$meta_title}}</h2>
  <?php foreach ($post as $key => $p): ?>
  <div class = "product-image-wrapper" style="border: none;">
    <div class="single-products" style="margin: 10px 0;padding: 2px;">
            <div class="text-center" >

                <img style="float:left;width:30%;padding:5px; height:150px;" src="{{URL::to('public/uploads/post/'.$p->post_image)}}" alt="{{$p->post_slug}}" >
                <h3 style="color:#D7423C ;padding:5px;" >{{$p->post_title}}</h3>
                <p>{!! $p->post_desc !!}<p>
                  <a href="{{url('/bai-viet/'.$p->post_slug)}}" class="btn btn-default btn-sm add-to-cart" >Xem bài viết</a>

            </div>
    </div>
  </div>
  </div >
  <div class="clearfix"><div>
  <?php endforeach; ?>


        <!--/recommended_items-->
</div>

@endsection
