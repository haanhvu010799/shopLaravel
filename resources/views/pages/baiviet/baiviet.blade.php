@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
  <h2 class="title text-center">{{$meta_title}}</h2>
  <?php foreach ($post as $key => $p): ?>
    <div class="single-products" style="padding: 10px;display:block;">
      {!! $p->post_content !!}

  </div >
  <div class="clearfix"><div>
  <?php endforeach; ?>


        <!--/recommended_items-->
</div>

@endsection
