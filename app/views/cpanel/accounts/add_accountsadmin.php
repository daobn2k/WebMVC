<?php
   if(!empty($_GET['msg'])){
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value){
       echo "<script type='text/javascript'>alert('$value');</script>";
    }
 }
?>
<h3 style="text-align: center">Thêm Tài Khoản Admin</h3>
<div class="col-md-6">
<form action="<?php echo BASE_URL ?>/accounts/add_accountsadmin" method="post">
  <div class="form-group">
    <label for="text">Tên Tài Khoản</label>
    <input type="text" required name="username" class="form-control">
  </div>
  <div class="form-group">
    <label for="pwd">Mật Khẩu</label>
    <input type="password" required name="password" class="form-control">
  </div>
  <div class="form-group">
    <label for="pwd">Nhập Lại Mật Khẩu</label>
    <input type="password" required  name="repassword" class="form-control">
  </div>
  <div class="form-group">
    <label for="email">Họ Tên Quản Lý</label>
    <input type="text" required name="fullname" class="form-control">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" required name="email" class="form-control">
  </div>
  <div class="form-group">
    <label for="text">Địa Chỉ</label>
    <input type="text" required name="address" class="form-control">
  </div>

  <div class="form-group">
    <label for="text">Số Điện Thoại Cá Nhân</label>
    <input type="text" required name="phone" class="form-control">
  </div>
  <div class="form-group">
    <label for="text"></label>
    <input type="hidden"  name="role" class="form-control"  value="admin">
  </div>


  <button type="submit" name = "btn_dangky"class="btn btn-success">Thêm danh mục</button>
</form>
</div>