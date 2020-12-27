@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
	<style type="text/css">
		p.title_thongke{
			text-align: center;
			font-size: 20px;
			font-weight: bold;
		}
	</style>
	<div class="row">
		<p class="title_thongke, panel-heading">Thống kế doanh số bán hàng</p>
		<form style="padding:20px;" autocomplete="off">
			@csrf

			<div class="col-md-2">
				<p>Từ ngày: <input type="text" id="datepicker" class="form-control"></p>
				</br>
				<input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả"></p>
			</div>
			<div class="col-md-2">
				<p>Đến ngày: <input type="text" id="datepicker2" class="form-control"></p>
			</div>
			<div class="col-md-2">
				<p>
					Chọn mốc thời gian:
					<select class="dashboard-filter form-control" id="dashboard-filter">
						<option>--Chọn mốc thời gian--</option>
						<option value="7ngay">7 ngày vừa qua</option>
						<option value="thangtruoc">Tháng trước</option>
						<option value="thangnay">Tháng này</option>
						<option value="365ngayqua">365 ngày vừa qua</option>
					</select>
				</p>
			</div>
		</form >
		<div class="col-md-12" style="color: black;">
			
			<div id="chart" style="height: 250px;"></div>
			
		</div>
	</div>

</div>

@endsection
