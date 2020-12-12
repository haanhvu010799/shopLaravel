@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm thư viện ảnh
                        </header>
                         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">
                            <input type="hidden" value="{{$pro_id}}" name="pro_id" class="pro_id">
                            <form>
                              @csrf
                            <div id="gallery_load">
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th>Tên hình ảnh</th>
                                      <th>Ảnh: </th>
                                      <th>Quản lý </th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td> </td>
                                      <td> </td>
                                      <td> </td>
                                    </tr>

                                  </tbody>
                                </table>
                          </div>
                        </form>
                        </div>
                    </section>

            </div>
@endsection
