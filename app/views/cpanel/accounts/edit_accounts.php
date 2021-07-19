<?php
if(!empty($_GET['msg'])){
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value){
        echo '<span style="color:blue;font-weight:bold">'.$value.'</span>';
    }
}
?>
<h3 style="text-align: center">Cật Nhật Thay Đổi Thông Tin</h3>
<div class="col-md-6">
<?php
  foreach($accounts as $key => $pro){
?>
<form action="<?php echo BASE_URL ?>/accounts/edit_accounts/<?php echo $pro['accounts_id']?>" method="post" enctype="multipart/form-data">


  <div class="form-group">
    <label for="pwd">Họ và Tên</label>
    <input type="text" value="<?php echo $pro['fullname'] ?>"  name="fullname" class="form-control">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" value="<?php echo $pro['email'] ?>" name="email" class="form-control">
  </div> 
  <div class="form-group">
    <label for="pwd">Số Điện Thoại</label>
    <input type="text" value="<?php echo $pro['phone'] ?>"  name="phone" class="form-control">
  </div>
 
  <div class="form-group">
    <label for="pwd">Địa Chỉ</label>
    <input type="text" value="<?php echo $pro['address'] ?>"  name="address" class="form-control">
  </div>

  <div class="form-group">
    <label for="pwd">Loại Tài Khoản</label>
    <input type="text" value="<?php echo $pro['role'] ?>" disabled  name="price_product" class="form-control">

  </div>
  <div class="form-group">
    <button type="submit" name = "edit_button" class="btn btn-success">Cập nhật Tài Khoản</button>
  </div>
 
</form>

</div>
<?php
  }
?>