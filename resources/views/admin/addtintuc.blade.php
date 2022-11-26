@extends('admin_layout')
@section('admin_content')
<div class="container-main">
                <div class="title">
                    <marquee>
                        <span >Chào mừng bạn đến với trang.chúc bạn có một ngày làm việc vui vẻ</span>
                    </marquee>
                </div>
                <div class="wrapper">
                    <form class="form" action="{{URL::to('/save-tintuc')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}} 
                       <div class="inputfield">
                          <label>Tên bài viết</label>
                          <input type="text" rows="5" name="tenbaiviet"  class="input">
                       </div>   
                       <div class="inputfield">
                          <label>Ngày cập nhật</label>
                          <input type="date" name="thoigian" class="input" >
                       </div> 
                       <div class="inputfield">
                          <label>Tên tiêu đề</label>
                          <input type="text" rows="5" name="tieude"  class="input">
                       </div>  
                       <div class="inputfield">
                            <div class="form-group">
                                <label for="exampleInputFile">Hình ảnh</label>
                                <input name="image" type="file" id="choose">
                                <p class="help-block"></p>
                            </div>
                        </div>    
                          <div class="inputfield">
                            <div>
                                <button class="btn-postup">thêm tin tức</button>
                                <a class="btn-cancel btn-postup-cancel" href="{{URL::to('/list-tintuc')}}" type="button" onclick="$('#manage-supplier').get(0).reset()"> Cancel</a>
                            </div>
                          </div>
                       <div class="">
                            <textarea style="resize: none" rows="5"  id="editor1" placeholder="Mô tả danh" name="mota"></textarea>
                        </div>
                    </form> 
                </div>
            </div>

@endsection