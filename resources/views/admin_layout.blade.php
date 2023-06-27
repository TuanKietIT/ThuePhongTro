<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="{{asset('public/back-end/css/style.css')}}">
    <script src="https://kit.fontawesome.com/0dc07ae90e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <div class="wapper">
        <div class="navbar">
            <div class="logo">
                <img width="45px" src="{{asset('public/back-end/images/logo.png')}}" alt="">
                <span class="logo-name">ATK</span>
            </div>
            <div class="search-box">
                <form action="">
                    <input type="text">
                    <i class="fa fa-solid fa-magnifying-glass"></i>
                </form>
            </div>
            <div class="nav-item">
                <div class="langue">
                    <select name="" id="">
                        <option value="">
                            English
                        </option>
                        <option value="">Japan</option>
                    </select>
                </div>
                <div class="nav-icons">
                    <ul>
                        <li>
                            <a href=""><i class="fa-solid fa-envelope"></i></a>
                        </li>
                        <li>
                            <a href=""><i class="fa-solid fa-bell"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="account">   
                    <span class="account-name">
                        <?php
                        $name = Session::get('admin_name');
                        if($name){
                            echo $name;
                        }
                        ?>
                    </span>
                    <img width="30px" src="{{asset('public/back-end/images/n1.png')}}" alt="">
                </div>
            </div>
        </div>
        <div class="container-body">
            <input type="checkbox" value="" id="check">
            <div id="sidebar">
                <label for="check">
                    <span class="span fa-solid fa-times" id="times"></span>
                    <span class="span fa-solid fa-bars" id="bars"></span>
                </label>
                <ul class="side-menu">
                    <li class="header__navbar-item header__navbar__item before">
                        <a href="{{URL::to('/dashboard')}}" class="active header__navbar__item-link ">
                            <i class="fa fa-solid fa-house"></i>
                             <span class="dashboard">Dashboard</span>
                        </a>
                    </li>
                    <li class="header__navbar__item-list">
                        <a href="" class="navbar__item__link">
                            <i class="fa fa-solid fa-user"></i>
                            <span>Thành Viên</span>
                            <i class="fa-right fa-solid fa-chevron-down"></i>
                        </a>
                        <ul class="side-down">
                            <li>
                                <a href="{{URL::to('/list-loaithanhvien')}}">
                                    <i class="fa fa-solid fa-book"></i>
                                    Danh mục
                                </a>
                            </li>
                            <li>
                                <a href="{{URL::to('/list-thanhvien')}}">
                                    <i class="fa fa-solid fa-list"></i>
                                    Danh sách
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="header__navbar__item-list">
                        <a href="" class="navbar__item__link">
                            <i class="fa fa-solid fa-pen-to-square"></i>
                            <span>Đăng tin</span>
                            <i class="fa-right fa-solid fa-chevron-down"></i>
                        </a>
                        <ul class="side-down">
                            <li>
                                <a href="{{URL::to('/list-loaiphong')}}">
                                    <i class="fa fa-solid fa-book"></i>
                                    Danh mục phòng
                                </a>
                            </li>
                            <li>
                                <a href="{{URL::to('/list-vitri')}}">
                                    <i class="fa fa-solid fa-book"></i>
                                    Danh mục vị trí
                                </a>
                            </li>
                            <li>
                                <a href="{{URL::to('/list-dangtin')}}">
                                    <i class="fa fa-solid fa-list"></i>
                                    Danh sách Tin
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="header__navbar__item-list">
                        <a href="{{URL::to('/list-tintuc')}}" class="navbar__item__link">
                            <i class="fa fa-brands fa-stack-overflow"></i>
                            <span>Tin tức</span>
                        </a>
                    </li>
                    <li class="header__navbar__item-list">
                        <a href="{{URL::to('/list-lienhe')}}" class="navbar__item__link">
                            <i class="fa fa-solid fa-handshake-angle"></i>
                            <span>Liên hệ</span>
                        </a>
                        
                    </li>
                    <li class="header__navbar__item-list">
                        <a href="{{URL::to('/list-admin')}}" class="navbar__item__link">
                            <i class="fa fa-solid fa-comment"></i>
                            <span href="">Admin</span>
                        </a>
                    </li>
                   
               </ul>
            </div>
        </div>
        <div class="main-body">
           @yield('admin_content')
        </div>
    </div>
<script src="{{asset('public/back-end/js/script.js')}}"></script>
<script src="{{asset('public/back-end/ckeditor/ckeditor.js')}}"></script>
<script>
    // Replace the <textarea id="editor1"> with a CKEditor 4
    // instance, using default configuration.
     CKEDITOR.replace( 'editor1' );
     CKEDITOR.replace( 'editor2' );
     CKEDITOR.replace( 'editor3' );
</script>
<script>
    $(document).ready(function(){
        $('.togle').click(function(){
            $('#sidebar').toggleClass('show');
        })
    })
</script>
</body>
</html>