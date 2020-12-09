@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập nhật bài viết
                        </header>
                         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">
                            <div class="position-center">
                              <form role="form" action="{{URL::to('/update-post/'.$post->post_id)}}" method="post">
                                  {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiêu đề bài viết</label>
                                    <input type="text" value="{{$post->post_title}}" name="post_title" class="form-control" onkeyup="ChangeToSlug();" id="slug" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slug</label>
                                    <input type="text" value="{{$post->post_slug}}" name="post_slug" class="form-control" id="convert_slug" placeholder="Slug">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tóm tắt bài viết</label>
                                    <textarea style="resize: none" rows="3" value="{{$post->post_desc}}" class="form-control" name="post_desc" id="ckeditor1" placeholder="Mô tả danh mục">{{$post->post_desc}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung bài viết</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="post_content" id="ckeditor2" placeholder="Mô tả danh mục">{{$post->post_content}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Từ khóa</label>
                                    <textarea style="resize: none" rows="2" class="form-control" name="post_meta_keywords" id="exampleInputPassword1" placeholder="Mô tả danh mục">{{$post->post_meta_keywords}}</textarea>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Hình ảnh bài viết</label>
                                  <input type="file" name="post_image" class="form-control" id="exampleInputEmail1">
                                  <img src="{{URL::to('public/uploads/post/'.$post->post_image)}}" height="100" width="100">

                              </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="post_status" class="form-control input-sm m-bot15" >
                                            <option value="0">Hiển thị</option>
                                            <option value="1">Ẩn</option>

                                    </select>


                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Danh mục bài viết</label>
                                      <select name="cate_post_id" class="form-control input-sm m-bot15">
                                            @<?php foreach ($cate_post as $key => $cate): ?>
                                              <option value="{{$cate->cate_post_id}}">{{$cate->cate_post_name}}</option>
                                            <?php endforeach; ?>
                                    </select>
                                </div>
                                <button type="submit" name="add_post" class="btn btn-info">Cập nhật bài viết</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection
