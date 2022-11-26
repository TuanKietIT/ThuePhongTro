@extends('welcome')
@section('content')
<div class="session-bar">
    <a href="">Trang chủ</a>
    <p>></p>
    <span>Đăng nhập</span>
</div>
<div id="content-register">
	<div id="register">
		<form action="{{URL::to('/save-dangky')}}" class="form" method="POST">
        {{csrf_field()}} 
            <img src="./public/font-end/image/user.png" class="tab-img">
			<a href="dangnhap.html" class="close">Đăng nhập</a>
			<h2 > Đăng Ký </h2>
            <div class="input-group">
				<input type="text" name="tenthanhvien" id="loginPwd" required>
				<label for="loginPwd">Họ tên:</label>
		    </div>
            <div class="input-group">
				<input type="email" name="email" id="loginPwd" required>
				<label for="loginPwd">Email:</label>
		    </div>
            <div class="input-group">
				<input type="password" name="password" id="loginPwd" required>
				<label for="loginPwd">Mật khẩu:</label>
		    </div>
            <div class="input-group">
				<input type="text" name="dienthoai" id="loginPwd" required>
				<label for="loginPwd">Điện thoai:</label>
		    </div>
            <div class="input-group">
				<input type="text" name="diachi" id="loginPwd" required>
				<label for="loginPwd">Địa chỉ:</label>
		    </div>
            <div class="input-group">
                <div class="select">
                    <select name="loaithanhvien_use" id="">
                        @foreach($loaithanhvien as $key => $thanhvien)
                            <option value="{{$thanhvien->loaithanhvien_id}}">{{$thanhvien->tenloai}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
			<div class="input-group">
				</br>
				<input type="submit" value="Đăng Ký" class="submit-btn">
				</br> 
			</div>
		</form>
	</div>
</div>


@endsection