@extends('welcome')
@section('content')
<div class="session-bar">
    <a href="">Trang chủ</a>
    <p>></p>
    <span>Đăng nhập</span>
</div>
<div class="container-login">
        <form class="form-1" action="{{URL::to('/user-login')}}" method="POST">
        {{csrf_field()}} 
            <h1>Đăng nhập</h1>
            <?php
                    $message = Session::get('dangnhap');
                    if ($message) {
                        echo '<span class="text">'.$message.'</span>';
                        Session::get('dangnhap',null);
                    }
            ?>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" required />
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required />
            <span>
				<p> Quên mật khẩu?</p>
				<a href="{{URL::to('/dang-ky')}}">Đăng ký</a>
			</span>
            <button>Đăng nhập</button>
            <p class="choose">Chọn đăng nhập</p>
            <div class="icons">
                <a href="{{URL::to('/login-facebook')}}" target="blank"><i class="fab fa-facebook-f"></i>
				         </a>
                <a class="google" href="https://mail.google.com/" target="blank">
                    <i class="fab fa-google"></i>
                </a>
            </div>
        </form>
    </div>



@endsection