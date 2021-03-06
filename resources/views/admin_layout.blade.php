<!DOCTYPE html>
<head>
<title>Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}" >

<!-- Datapicker -->
<link rel="stylesheet" href="{{asset('public/backend/css/jquery-ui.css')}}">

<!-- Morris chart -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet"/>
<link href="{{asset('public/backend/css/jquery.dataTables.min.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css"/>
<link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('public/backend/css/morris.css')}}" type="text/css"/>

<!-- calendar -->
<link rel="stylesheet" href="{{asset('public/backend/css/monthly.css')}}">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="{{asset('public/backend/js/jquery2.0.3.min.js')}}"></script>
<!-- <script src="{{asset('public/backend/js/raphael-min.js')}}"></script> -->
<script src="{{asset('public/backend/js/morris.js')}}"></script>

</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">

    <a href="{{URL::to('/trang-chu')}}">
        <img height="60px" width="220px" src="public/uploads/steam.png">
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="{{('public/backend/images/avatar.jpg')}}">
                <span class="username">
                	<?php
					$name = Session::get('admin_name');
					if($name){
						echo $name;

					}
					?>

                </span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <!-- <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li> -->
                <li><a href="{{URL::to('/logout')}}"><i class="fa fa-key"></i>Đăng xuất</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->

    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{URL::to('/dashboard')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Tổng quan</span>
                    </a>
                </li>

                </li>
                 <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-barcode"></i>
                        <span>Đơn hàng</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/manage-order')}}">Quản lý đơn hàng</a></li>


                    </ul>
                </li>
                 <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-ticket"></i>
                        <span>Mã giảm giá</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/insert-coupon')}}">Khởi tạo mã giảm giá</a></li>
                        <li><a href="{{URL::to('/list-coupon')}}">Danh sách mã giảm giá</a></li>
                    </ul>
                </li>
                 <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-car"></i>
                        <span>Vận chuyển</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/delivery')}}">Quản lý vận chuyển</a></li>



                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Bài viết</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-category-post')}}">Thêm danh mục bài viết</a></li>
						<li><a href="{{URL::to('/all-category-post')}}">Danh sách danh mục bài viết</a></li>
            <li><a href="{{URL::to('/add-post')}}">Tạo bài viết mới</a></li>
            <li><a href="{{URL::to('/all-post')}}">Danh sách các bài viết</a></li>

                    </ul>
              <!--   </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-th-list"></i>
                        <span>Danh mục-Thương hiệu</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-category-product')}}">Thêm danh mục sản phẩm</a></li>
						
                        <li><a href="{{URL::to('/add-brand-product')}}">Thêm thương hiệu sản phẩm</a></li>
                        

                    </ul>
                </li>
 -->
                  <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-shopping-basket"></i>
                        <span>Quản lý hàng hóa</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/all-category-product')}}">Danh mục sản phẩm</a></li><li><a href="{{URL::to('/all-brand-product')}}">Thương hiệu sản phẩm</a></li>
                        <li><a href="{{URL::to('/all-product')}}">Danh sách sản phẩm</a></li>

                    </ul>
                </li>
                 <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-user"></i>
                        <span>Users</span>
                    </a>
                    <ul class="sub">
                         <li><a href="{{URL::to('/add-users')}}">Thêm user</a></li>
                        <li><a href="{{URL::to('/users')}}">Danh sách user</a></li>

                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-pencil"></i>
                        <span>Chỉnh sửa thông tin</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/manage-slider')}}">Thay đổi slider</a></li>
                        <li><a href="{{URL::to('/add-slider')}}">Tạo slider mới</a></li>
                        <!-- <li><a href="{{URL::to('/information')}}">Chỉnh sửa thông tin liên hệ</a></li> -->

                    </ul>
                </li>
            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
        @yield('admin_content')
    </section>
 <!-- footer -->
		  <div class="footer">
			<div class="wthree-copyright">
			  <p style="text-align: center;">Nhóm 4: Đồ án lập trình ứng dụng Web</p>
			</div>
		  </div>
  <!-- / footer -->
</section>
<!--main content end-->
</section>
<script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/backend/js/scripts.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('public/backend/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.form-validator.min.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/backend/js/jquery-ui.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>



<!-- Script xử lý  Slug thành không dấu -->
<script type="text/javascript">
    function ChangeToSlug()
        {
            var slug;

            //Lấy text từ thẻ input title
            slug = document.getElementById("slug").value;
            slug = slug.toLowerCase();
            //Đổi ký tự có dấu thành không dấu
                slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                slug = slug.replace(/đ/gi, 'd');
                //Xóa các ký tự đặt biệt
                slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                //Đổi khoảng trắng thành ký tự gạch ngang
                slug = slug.replace(/ /gi, "-");
                //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                slug = slug.replace(/\-\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-/gi, '-');
                slug = slug.replace(/\-\-/gi, '-');
                //Xóa các ký tự gạch ngang ở đầu và cuối
                slug = '@' + slug + '@';
                slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                //In slug ra textbox có id “slug”
            document.getElementById('convert_slug').value = slug;
        }
</script>
<!-- Scipt xử lý tồn kho -->
<script type="text/javascript">
    $('.update_quantity_order').click(function(){
        var order_product_id = $(this).data('product_id');
        var order_qty = $('.order_qty_'+order_product_id).val();
        var order_code = $('.order_code').val();
        var _token = $('input[name="_token"]').val();
        // alert(order_product_id);
        // alert(order_qty);
        // alert(order_code);
        $.ajax({
                url : '{{url('/update-qty')}}',

                method: 'POST',

                data:{_token:_token, order_product_id:order_product_id ,order_qty:order_qty ,order_code:order_code},
                // dataType:"JSON",
                success:function(data){

                    alert('Cập nhật số lượng thành công');

                   location.reload();




                }
        });

    });
</script>
<!-- Script xử lý đơn đặt hàng -->
<script type="text/javascript">
    $('.order_details').change(function(){
        var order_status = $(this).val();
        var order_id = $(this).children(":selected").attr("id");
        var _token = $('input[name="_token"]').val();

        //lay ra so luong
        quantity = [];
        $("input[name='product_sales_quantity']").each(function(){
            quantity.push($(this).val());
        });
        //lay ra product id
        order_product_id = [];
        $("input[name='order_product_id']").each(function(){
            order_product_id.push($(this).val());
        });
        j = 0;
        for(i=0;i<order_product_id.length;i++){
            //so luong khach dat
            var order_qty = $('.order_qty_' + order_product_id[i]).val();
            //so luong ton kho
            var order_qty_storage = $('.order_qty_storage_' + order_product_id[i]).val();

            if(parseInt(order_qty)>parseInt(order_qty_storage)){
                j = j + 1;
                if(j==1){
                    alert('Không đủ hàng tồn kho');
                }
                $('.color_qty_'+order_product_id[i]).css('background','#000');
            }
        }
        if(j==0){

                $.ajax({
                        url : '{{url('/update-order-qty')}}',
                            method: 'POST',
                            data:{_token:_token, order_status:order_status ,order_id:order_id ,quantity:quantity, order_product_id:order_product_id},
                            success:function(data){
                                alert('Thay đổi tình trạng đơn hàng thành công');
                                location.reload();
                            }
                });

        }

    });
</script>
<!-- Xử lý giao hàng -->
<script type="text/javascript">
    $(document).ready(function(){

        fetch_delivery();

        function fetch_delivery(){
            var _token = $('input[name="_token"]').val();
             $.ajax({
                url : '{{url('/select-feeship')}}',
                method: 'POST',
                data:{_token:_token},
                success:function(data){
                   $('#load_delivery').html(data);
                }
            });
        }
        $(document).on('blur','.fee_feeship_edit',function(){

            var feeship_id = $(this).data('feeship_id');
            var fee_value = $(this).text();
             var _token = $('input[name="_token"]').val();
            // alert(feeship_id);
            // alert(fee_value);
            $.ajax({
                url : '{{url('/update-delivery')}}',
                method: 'POST',
                data:{feeship_id:feeship_id, fee_value:fee_value, _token:_token},
                success:function(data){
                   fetch_delivery();
                }
            });

        });
        $('.add_delivery').click(function(){

           var city = $('.city').val();
           var province = $('.province').val();
           var wards = $('.wards').val();
           var fee_ship = $('.fee_ship').val();
            var _token = $('input[name="_token"]').val();
           // alert(city);
           // alert(province);
           // alert(wards);
           // alert(fee_ship);
            $.ajax({
                url : '{{url('/insert-delivery')}}',
                method: 'POST',
                data:{city:city, province:province, _token:_token, wards:wards, fee_ship:fee_ship},
                success:function(data){
                   fetch_delivery();
                }
            });


        });
        $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
            // alert(action);
            //  alert(matp);
            //   alert(_token);

            if(action=='city'){
                result = 'province';
            }else{
                result = 'wards';
            }
            $.ajax({
                url : '{{url('/select-delivery')}}',
                method: 'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                   $('#'+result).html(data);
                }
            });
        });
    })


</script>

<!-- script load gallery -->
<script type="text/javascript">
    $(document).ready(function(){
        load_gallery();

        function load_gallery(){
            var pro_id = $('#pro_id').val();

            var _token = $('input[name="_token"]').val();
            $.ajax({
                url : "{{url('/select-gallery')}}",
                method: "POST",
                data:{"pro_id": pro_id,"_token": _token},
                success:function(data){
                    $('#gallery_load').html(data);

                }
            });
        }

        $('#file').change(function(){
            var error='';
            var files=$('#file')[0].files;
            if(files.length>10){
                error+='<p>Vui lòng chọn tối đa 10 ảnh</p>'
            }else if(files.size>2000000){
                error+='<p>Vượt quá kích thước ảnh cho phép</p>'
            }
            if(error==''){

            }else {
                $('#file').val('');
                $('#error_gallery').html('<span class="text-danger">'+error+'</span>');
                return false;
            }


        });

        $(document).on('blur','.edit_gal_name',function(){
            var gal_id=$(this).data('gal_id');
            var gal_text= $(this).text();
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url : '{{url('/update-gallery-name')}}',
                method: "POST",
                data:{gal_id: gal_id, gal_text: gal_text, _token: _token},
                success:function(data){
                   load_gallery();
                   $('#error_gallery').html('<span class="text-danger">Cập nhật hình ảnh thành công </span>');
                }
            });
        });
         $(document).on('click','.delete_gallery',function(){
            var gal_id=$(this).data('gal_id');
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url : '{{url('/xoa-gallery')}}',
                method: "POST",
                data:{gal_id: gal_id, _token: _token},
                success:function(data){
                   load_gallery();
                   $('#error_gallery').html('<span class="text-danger">Xóa hình ảnh thành công </span>');
                }
            });
        });



    });
</script>
<!-- Các script Ckeditor -->
<script type="text/javascript">
    $(document).ready( function () {
    $('#myTable').DataTable();
    } );
</script>
<script type="text/javascript">
        $.validate({

        });
</script>
 <script>
       // Replace the <textarea id="editor1"> with a CKEditor
       // instance, using default configuration.
        CKEDITOR.replace('ckeditor');
        CKEDITOR.replace('ckeditor1');
        CKEDITOR.replace('ckeditor2');
        CKEDITOR.replace('ckeditor3');
        CKEDITOR.replace('id4');
</script>
<!-- Script dựng thống kê -->
<script type="text/javascript">

    $("#datepicker").datepicker({
        changeMonth: true,
        changeYear: true,
        prevText:"Tháng trước",
        nextText:"Tháng sau",
        dateFormat:"yy-mm-dd",
        dayNamesMin: ["Thứ 2","Thứ 3","Thứ 4","Thứ 5","Thứ 6", "Thứ 7","Chủ nhật"],
        duration:"slow"
        
    })
    $("#datepicker2").datepicker({
        changeMonth: true,
        changeYear: true,
        prevText:"Tháng trước",
        nextText:"Tháng sau",
        dateFormat:"yy-mm-dd",
        dayNamesMin: ["Thứ 2","Thứ 3","Thứ 4","Thứ 5","Thứ 6", "Thứ 7","Chủ nhật"],
        duration:"slow"
    })
    $(document).ready(function(){
        // chart30daysorder();
        var chart= new Morris.Bar({
            element:'chart',
            parseTime: false,
            hideHover:'auto',
            xkey:'period',
            ykeys:['order','sales','profit'],
            labels: ['đơn hàng','doanh số','lợi nhuận']

        });

        function chart30daysorder(){
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{url('/days-order')}}",
                method:"POST",
                dataType:"JSON",
                data:{_token:_token},
                success:function(data)
                {
                    chart.setData(data);
                }
            });

        }
        $('#dashboard-filter').change(function(){
            var dashboard_value=$(this).val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{url('/dashboard-filter')}}",
                method:"POST",
                dataType:"JSON",
                data:{"dashboard_value":dashboard_value,"_token":_token},
                success:function(data)
                {
                    chart.setData(data);
                }
            });
        });
        $("#btn-dashboard-filter").click(function(){
            var _token = $('input[name="_token"]').val();
            var from_date =$('#datepicker').val();
            var to_date=$('#datepicker2').val();
            $.ajax({
                url:"{{url('/filter-by-date')}}",
                method: "POST",
                dataType:"JSON",
                data:{"from_date":from_date, "to_date":to_date, "_token":_token},
                success:function(data)
                {
                    
                    chart.setData(data);
                }

            });
        }); 

    });
</script>

<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('public/backend/js/jquery.scrollTo.js')}}"></script>
<!-- morris JavaScript -->

<!-- calendar -->
<script type="text/javascript" src="{{asset('public/backend/js/monthly.js')}}"></script>
<script type="text/javascript">
	$(window).load( function() {

		$('#mycalendar').monthly({
			mode: 'event',

		});

		$('#mycalendar2').monthly({
			mode: 'picker',
			target: '#mytarget',
			setWidth: '250px',
			startHidden: true,
			showTrigger: '#mytarget',
			stylePast: true,
			disablePast: true
		});

	switch(window.location.protocol) {
	case 'http:':
	case 'https:':
	// running on a server, should be good.
	break;
	case 'file:':
	alert('Just a heads-up, events will not work when run locally.');
	}

	});
</script>
	<!-- //calendar -->


</body>
</html>
