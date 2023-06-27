<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>|Tìm kiếm nhà trọ sinh viên|</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
	<link rel="stylesheet" href="{{asset('public/font-end/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/font-end/css/base.css')}}">
 
    <script src="https://kit.fontawesome.com/0dc07ae90e.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

</head>
<body>
	<div class="app">
		<header class="header-nav">
		    <div class="grid">
		   	    <div class="header__navbar">
		   	    	<div class="header__navbar-list">
		   	    		<span class="header__navbar-item header__navbar-space">
		   	    			<span>Tìm kiếm nhà trọ sinh viên</span>
		   	    		</span>
		   	    		<span class="header__navbar-item">
		   	    			<a class="header__navbar-icon" href="">
						    	Kết nối
						    	<i class="fa-brands fa-facebook"></i>
						    </a>
		   	    		</span>
		   	    	</div>
		   	    	<div class="header__navbar-list">
		   	    		<span class="header__navbar-item header__navbar-space">
		   	    			<a class="header__navbar-icon" href="">
						       <span> Thông báo</span>
		   	    			   <i class="fa-solid fa-bell"></i>
						    </a>
		   	    		</span>
		   	    		<span class="header__navbar-item">
						   <?php
                                $customer_id = Session::get('customer_id');
                                if($customer_id!=NULL){ 
                                 ?>
								 <a class="header__navbar-icon" href="{{URL::to('/dang-xuat')}}">
									Đăng Xuât
									<i class="fa-solid fa-right-from-bracket"></i>
								</a>
                                <?php
                                }else{
                                ?>
								<a class="header__navbar-icon" href="{{URL::to('/dang-nhap')}}">
									Đăng Nhập
									<i class="fa-solid fa-lock"></i>
								</a>
                                <?php 
                                }
                                 ?>
		   	    		</span>
		   	    	</div>
		        </div>
		        <div class="header_nav">
		   	    	<nav>
		   	    		<a class="image_center" href="">
		   	    			<img class="logo" src="{{asset('public/font-end/image/logo.png')}}" alt="">
		   	    			<span>ThueTro24.com</span>
		   	    		</a>
		   	    		<ul>
		   	    			<li>
		   	    				<a href="{{URL::to('/')}}">
		   	    					<i class="fa-solid fa-house"></i>
		   	    					Trang chủ
		   	    				</a>
		   	    			</li>
		   	    			<li>
		   	    				<a href="{{URL::to('/list-loaithanhvien')}}">
		   	    					<i class="fa-solid fa-user"></i>
		   	    					Quản lý tin
		   	    				</a>
		   	    			</li>
		   	    			<li>
		   	    				<a href="{{URL::to('/tin-tuc')}}">
		   	    					<i class="fa-regular fa-newspaper"></i>
		   	    					Tin tức
		   	    				</a>
		   	    			</li>
		   	    			<li>
		   	    				<a href="{{URL::to('/yeu-thich')}}">
		   	    					<i class="fa-solid fa-star"></i>
		   	    					Yêu thích
		   	    				</a>
		   	    			</li>
		   	    			<li>
		   	    				<a href="{{URL::to('/lien-he')}}">
		   	    					<i class="fa-solid fa-envelope"></i>
		   	    				   Liên hệ
		   	    			   </a>
		   	    			</li>
		   	    			<li>
		   	    				<a href="{{URL::to('/dang-tin')}}">
		   	    					<i class="fa-solid fa-pen-to-square"></i>
		   	    					Đăng tin
		   	    				</a>
		   	    			</li>


		   	    		</ul>
		   	    		<img class="avata" src="{{asset('public/font-end/image/avata.jpg')}}" onclick="toggleMenu()" alt="">
		   	    		<div class="sub-menu-wrap" id="subMenu">
		   	    			<div class="sub-menu">
		   	    				<div class="user-info">
									<div>
									<?php
										$hinhanh = Session::get('hinhanh');
										if($hinhanh){
											echo '<img src="./public/upload/user/" class="tab-img" />';
										}
										?>
									</div>
		   	    					<h3>
									   <?php
										$tenthanhvien = Session::get('tenthanhvien');
										if($tenthanhvien){
											echo $tenthanhvien;
										}
										?>

									</h3>
		   	    				</div>
		   	    				<hr/>
		   	    				<a class="sub-menu-links">
		   	    					<span>
		   	    						<i class="fa-solid fa-user-pen"></i>
		   	    					</span>
		   	    					<p> Chỉnh sửa</p>
		   	    				</a>
		   	    				<a class="sub-menu-links">
		   	    					<span>
		   	    						<i class="fa-solid fa-sun"></i>
		   	    					</span>
		   	    					<p> Cài đặt</p>

		   	    				</a>
		   	    				<a class="sub-menu-links">
		   	    					<span>
		   	    						<i class="fa-solid fa-circle-info"></i>
		   	    					</span>
		   	    					<p> Hỗ trợ</p>
		   	    				</a>
								<?php
                                   $customer_id = Session::get('customer_id');
                                   if($customer_id!=NULL){ 
                                 ?>
									<a class="sub-menu-links" href="{{URL::to('/dang-xuat')}}">
										<span>
										<i class="fa-solid fa-right-from-bracket"></i>
										</span>
										<p> Đăng xuất</p>
									</a>
                                <?php
                                }else{
                                ?>
								    <a class="sub-menu-links" href="{{URL::to('/dang-nhap')}}">
										<span>
										<i class="fa-solid fa-lock"></i>
										</span>
										<p> đăng nhập</p>
									 </a>
                                <?php 
                                }
                                 ?>
		   	    				
		   	    			</div>
		   	    		</div>
		   	    	</nav>
		        </div>
		        <div class="header-search">
		        	<div class="menu-search">
		        		<div class="select-menu">
							<form action="{{URL::to('/tim-kiem')}}" method="post">
							{{csrf_field()}}  
								<div class="input-box">
									<i class="fa-solid fa-magnifying-glass"></i>
									<input type="text" name="keywords" placeholder="Nhập tên bài viết..." />
									<button class="button">Tìm</button>
								</div>
							</form>
							 <div class="select-search">
							   <a href="">Tìm vị trí khoảng cách 1km</a>
							 </div>
							 
		        		</div>
		        	</div>
		        </div>
            </div>
		</header>	
		<section class="big-image">
	        <div class="big-image-content">
	           <img src="{{asset('public/font-end/image/background.jpg')}}" alt="">
	           <div class="content-image">
		        	<h2>
		        		ThueTro24h.com 
		        	</h2>
		        	<span>
		        		<img class="logo-1" src="{{asset('public/font-end/image/logo.png')}}" alt="">
		        	</span>
		        	<p>Kinh doanh trong hạnh phúc</p>
		        </div>
		        <div class="image-left">
		        	 <img class="logo-1" src="{{asset('public/font-end/image/image-left.jpg')}}" alt="">
		        </div>
		        <div class="image-right">
		        	 <img class="logo-1" src="{{asset('public/font-end/image/image-right.jpg')}}" alt="">
		        </div>
		        <div class="slow-left">
		        	<span>
		        	     <h3>Thảnh thơi chọn trọ </h3>
		        	     <p>giá rẻ khỏi lo <i class="fa-solid fa-face-smile"></i></p>
		        	     <span>Tìm ngay là có !!!</span>
		        	</span>
		        </div>
	        </div>
	    </section>
		<div class="container">
			<div class="section">
			    @yield('content')
			</div>
		</div>
        <footer>
            <div class="rows">
                <div class="col">
                	<span class="logo-info">
                		<img class="logo-1" src="{{asset('public/font-end/image/logo.png')}}" alt="">
                		<p>Thuetro24h.com</p>
                	</span>
                    <h4>
                        Website mở nhằm mục đích giúp khách hàng có thể tìm được nhà trọ thích hợp nhanh chống và tiện lợi thiêu nhu cầu của mỗi người
                        Cảm ơn quý khách đã quan tâm đến.
                        Chúc quý khách có thể tìm được trọ phù hợp với nhu cầu của mình !!!
                    </h4>
                </div>
                <div class="col">
                    <h3><div class="underline"><span></span></div>Giới thiệu</h3>
                    <p>
                        Thuetro24h hoạt động 24/24
                        Website mở nhằm mục đích giúp khách hàng có thể tìm được nhà trọ thích hợp nhanh chống và tiện lợi thiêu nhu cầu của mỗi người
                    </p>
                    <p> 
                        Kinh doanh trong hạnh phúc
                    </p>
                    <p> 
                        Vừa lòng khách đến vừa lòng khách đi 
                    </p>
                    <p> 
                        Hoạt động tối đa  
                    </p>
                </div>
                <div class="col">
                   <h3><div class="underline"><span></span></div> Danh mục</h3>
                   <li class="footer-menu"><a class="a" href="">Trang chủ</a></li>
                   <li class="footer-menu"><a class="a" href="">Quản lý tin</a></li>
                   <li class="footer-menu"><a class="a" href="">Tin tức</a></li>
                   <li class="footer-menu"><a class="a" href="">Yêu thích</a></li>
                   <li class="footer-menu"><a class="a" href="">Liên hệ</a></li>
                   <li class="footer-menu"><a class="a" href="">Đăng tin</a></li>

                </div>
                <div class="col">
                    <h3><div class="underline"><span></span></div>Bản tin</h3>
                    <form>
                        <i class="fa-solid fa-square-envelope"></i>
                        <input type="email" placeholder=" Email....." required>
                        <button type="submit"><i class="fa-solid fa-arrow-right-from-bracket"></i></button>
                    </form>
                    <div class="social-icons">
                        <a href="" ><i class="fav fa-brands fa-facebook-f"></i></a>
                        <a href="" ><i class="fav fa-brands fa-instagram"></i></a>
                        <a href="" ><i class="fav fa-regular fa-envelope"></i></a>
                        <a href="" ><i class="fav fa-brands fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </footer>
	</div>
<script src="{{asset('public/back-end/ckeditor/ckeditor.js')}}"></script>
<script>
    // Replace the <textarea id="editor1"> with a CKEditor 4
    // instance, using default configuration.
     CKEDITOR.replace( 'editor1' );
     CKEDITOR.replace( 'editor2' );
     CKEDITOR.replace( 'editor3' );
</script>
<script>
	let subMenu = document.getElementById("subMenu");

	function toggleMenu() {
		subMenu.classList.toggle("open-menu");
	}
</script>
</body>
</html>