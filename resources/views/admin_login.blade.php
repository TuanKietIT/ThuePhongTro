<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="{{asset('public/back-end/css/style.css')}}">
    <script src="https://kit.fontawesome.com/0dc07ae90e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
        <!--//header-->
        <!--main-->
        <div class="main-w3layouts-agileinfo">
               <!--form-stars-here-->
            <div class="wthree-form">
                <h2>Đăng nhập admin</h2>
                <?php
                    $message = Session::get('message');
                    if ($message) {
                        echo '<span class="message-text">'.$message.'</span>';
                        Session::get('message',null);
                    }
                ?>
                <form action="{{URL::to('/admin-login')}}" method="POST">
                {{csrf_field()}}
                    <div class="form-sub-w3">
                        <input type="text" class="text" name="admin_email" placeholder="Email" required="" />
                        <div class="icon-w3">
                           <i class="fa fa-user" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="form-sub-w3">
                        <input type="password" class="password" name="admin_password" placeholder="Mật khẩu" required="" />
                        <div class="icon-w3">
                           <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                        </div>
                    </div>
                    <label class="anim">
                    <input type="checkbox" class="checkbox">
                        <span>Ghi nhớ</span> 
                    </label> 
                    <div class="clear"></div>
                    <div class="submit-agileits">
                        <input type="submit" value="Đăng nhập">
                    </div>
                </form>

            </div>
        </div>
</body>
</html>