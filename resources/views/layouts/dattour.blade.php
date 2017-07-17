@extends('layouts.index')
@section('pages')
@section('title',$title)
<script type="text/javascript" src="{{asset('js/datTour.js')}}"></script>
<div class="chitiettour">
	<div class="title">Du lịch {{$tour->tentour}}</div>
	<div class="content">
		<div class="images">
			<img src="{{asset('images/place/' . $tour->hinhanh)}}">
		</div>
		<div class="info">
		<div class="price">Giá: {{$tour->dongia}} VNĐ</div>
		<div> Thời gian: {{$tour->thoigian}}</div>
		<div>Khởi hành: {{$tour->ngaykhoihanh}}</div>
		<div>Lịch trình: {{$tour->lichtrinh}}</div>
		<div>Số chỗ còn nhận: {{$tour->soluong}}</div>
		<a href="{{asset('tour/chitiet/' . $tour->id)}}">
                   <input type="submit" class="btnChitietTour" name="btnChitietTour" value="Chi tiết tour" />
                </a>
        
		</div>
	</div>
	<div style="clear: both;"></div>
</div>
<div class="datTour">
	<div class="tabs">
		<ul>
			<li class="active" id="tab_datTour">Đặt tour</li>
			<li id="tab_dieukhoan">Điều khoản</li>
		</ul>
	</div>
	<div class="tab_containerdt">
		<div class="tab_content" id="tab1">
			<form method="post" action="{{route('dattour', $tour->id)}}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<table style="width: 100%; height: 300px">
					<tr>
						<td style="width: 100px">
							Họ và tên:
						</td>
						<td><input type="text" name="hoten"></td>
					</tr>
					<tr>
						<td>Điện thoại:</td>
						<td><input type="text" name="dienthoai"></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><input type="text" name="email"></td>
					</tr>
					<tr>
						<td>Địa chỉ:</td>
						<td><input type="text" name="diachi"></td>
					</tr>
					<tr>
						<td>Số người:</td>
						<td><input type="number" name="songuoi" min="1" max="{{$tour->soluong}}">
							Trẻ nhỏ (dưới 6 tuổi) <input type="number" name="trenho" value="0" min="0">
						</td>
					</tr>
					<tr>
						<td>Yêu cầu</td>
						<td><textarea name="yeucau" id="" rows="5" style="width: 80%;"></textarea></td>
					</tr>
					<tr>
						<td colspan="2" style="text-align: center;">
							<input type="submit" name="btnDatTour" value="Đặt Tour">
						</td>
					</tr>
				</table>
			</form>
		</div>
		<div class="tab_content" id="tab2">
			<b>Điều kiện khi đăng ký và hủy vé tour:</b>
            <ul>
                <li>Vé máy bay được xuất ngay sau khi quý khách đã thanh toán, xác nhận thông tin cá nhân (họ tên, ngày tháng năm sinh…) và có những điều kiện vé theo quy định của hang Viet Nam Airlines.
                </li>
                <li>Sau khi xác nhận và thanh toán (ít nhất 50% tiền cọc giữ chỗ và thanh toán 100% trước ngày khởi hành là 15 ngày)
                </li>
                <li>Ngay sau khi Quý khách đăng ký tour và xuất vé, nếu hủy phạt tour và phạt vé máy bay theo quy định của Hãng hàng không Vietnam Airlines:
                <ul>
                    <li>Sau khi đặt cọc, thanh toán : phí hủy 35% tiền tour+ 100% Vé máy bay
                    </li>
                    <li>Sau khi đặt cọc, thanh toán và từ 15 ngày trước ngày khởi hành: phí hủy 35% tiền tour+ vé máy bay theo quy định của Vietnam Airlines
                    </li>
                    <li>Hủy 10 ngày trước ngày khởi hành: phí hủy 45% tiền tour+ vé máy bay theo quy định của Vietnam Airlines
                    </li>
                    <li>Hủy 07 ngày trước ngày khởi hành: phí hủy 70% tiền tour + vé máy bay theo quy định của Vietnam Airlines
                    </li>
                    <li>Hủy 05 ngày trước ngày khởi hành: phí hủy 100% tiền tour + vé máy bay. Trường hợp quý khách đến trễ giờ khởi hành được tính là hủy 5 ngày trước ngày khởi hành.
                    </li>
                </ul>
                </li>
                <li>Trường hợp Quý khách dời tour sang ngày khởi hành khác trong dịp Lễ phải báo trước 20 ngày (chỉ được dời 1 lần) sẽ không tính phí hủy nếu ngày được chọn còn chỗ.
                </li>
                <li>Trường hợp hủy tour do sự cố khách quan như thiên tai, dịch bệnh hoặc do tàu thủy, xe lửa, máy bay hoãn/hủy chuyến, Du Lịch Việt sẽ không chịu trách nhiệm bồi thường thêm bất kỳ chi phí nào khác ngoài việc hoàn trả chi phí những dịch vụ chưa được sử dụng của tour đó.
                </li>
            </ul>
            <b>Lưu ý:</b>
            <ul>
                <li>Khi đăng ký tour, quý khách mang CMND hoặc Passport Photo. (Có thể mang bảng chính để nhân viên Sales photo lại). Đối với tour Miền Bắc có đi Hà Khẩu (Trung Quốc), quý khách vui lòng mang theo 2 tấm hình 3*4 để làm thủ tục.
                </li>
                <li>Quý khách có mặt trước giờ bay 2h00 phút, hành lý gọn nhẹ khi đi mang theo giấy tờ tùy thân bản chính (đối với khách Việt Nam là chứng minh nhân dân &amp; Passport đối với Kiều bào &amp; ngoại quốc).
                </li>
                <li>Trẻ em (dưới 12 tuổi) khi đi du lịch mang theo giấy khai sinh (bản chính hoặc sao y có thị thực) để làm thủ tục hàng không .Trường hợp không có cha hoặc mẹ đi cùng phải có giấy ủy quyền của cha mẹ và có xác nhận của chính quyền địa phương .
                </li>
                <li>Hành lý và tư trang du khách tự bảo quản trong quá trình du lịch .
                </li>
            </ul>
		</div>
	</div>
</div>
@endsection