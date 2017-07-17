<div class="category">TÌM TOUR</div>
<div class="content">

    <form method="get" style="width: 100%;" action="{{route('timkiem')}}">
        
        <select name="loaiTour" id="loaiTour">
            <option value="">--Loại tour-- </option>
            <option value="1">Trong nước </option>
            <option value="0">Ngoài nước</option>
        </select>
        <select name="khoihanh">
            <option value="%">-- Điểm khởi hành --</option>
            <option value="Hà Nội">Hà Nội</option>
            <option value="Sài Gòn">Sài Gòn</option>
            <option value="Đà Nẵng">Đà Nẵng</option>
            <option value="TP. Hồ Chí Minh">TP. Hồ Chí Minh</option>
        </select>
        <select name="thoigian">
            <option value="%">-- Thời gian --</option>
            <option value="1 ngày">1 ngày</option>
            <option value="2 ngày 1 đêm">2 ngày 1 đêm</option>
            <option value="3 ngày 2 đêm">3 ngày 2 đêm</option>
            <option value="4 ngày 3 đêm">4 ngày 3 đêm</option>
            <option value="5 ngày 4 đêm">5 ngày 4 đêm</option>
            <option value="6 ngày 5 đêm">6 ngày 5 đêm</option>
            <option value="10 ngày 9 đêm">10 ngày 9 đêm</option>
        </select>
        <select name="dongia">
            <option value="0-100">-- Giá (VNĐ) --</option>
            <option value="75-100">75.000.000 - 100.000.000</option>
            <option value="50-75">50.000.000 - 75.000.000</option>
            <option value="40-50">40.000.000 - 50.000.000</option>
            <option value="30-40">30.000.000 - 40.000.000</option>
            <option value="20-30">20.000.000 - 30.000.000</option>
            <option value="10-20">10.000.000 - 20.000.000</option>
            <option value="5-10">5.000.000 - 10.000.000</option>
            <option value="0-5">0 - 5.000.000</option>
        </select>
        <select name="diadiem" id="diadiem">
            <option value="%">-- Địa điểm --</option>
            @foreach($diadiem1 as $dd)
                <option value="{{$dd->tendiadiem}}">{{$dd->tendiadiem}}</option>
            @endforeach
        </select>
        <input type="submit" class="btnSearch" value="Tìm kiếm" />
    </form>
</div>