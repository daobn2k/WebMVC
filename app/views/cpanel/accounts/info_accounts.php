<h3 style="text-align: center">Danh Sách Tài Khoản</h3>
<div style="text-align: left">
<form action="<?php echo BASE_URL?>/accounts/add_accountsadmin">
<button type = "submit" class = "btn btn-success" style = "margin-bottom:15px"><i class="fas fa-fw fa-plus-circle" style = "margin-right:5px;"></i>
Thêm tài khoản quản lý
</button>  
</form>
</div>
<?php
 if(!empty($_GET['msg'])){
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value){
       echo "<script type='text/javascript'>alert('$value');</script>";
    }
 }

?>
<table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Họ Và Tên</th>
        <th>Emil</th>
        <th>Số Điện Thoại</th>
        <th>Địa Chỉ</th>
        <th>Loại Tài Khoản</th>
        <th>Quản lý</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $i = 0;
    foreach($accounts as $key => $accounts){
  
        $i++;
    ?>
      <tr>
        <td><?php echo $i?></td>
        <td><?php echo $accounts['fullname'] ?></td>
        <td><?php echo $accounts['email'] ?></td>

     <td><?php echo $accounts['phone'] ?></td>
        <td><?php echo $accounts['address'] ?></td>
        <td><?php echo $accounts ['role']?></td>
        <td><a href="<?php echo BASE_URL ?>/accounts/delete_accounts/<?php echo $accounts['accounts_id'] ?>">Xóa</a> || 
        <a href="<?php echo BASE_URL ?>/accounts/edit_accounts/<?php echo $accounts['accounts_id'] ?>">Cập nhật</a></td>
      </tr> 
    <?php
    }
    ?>
    </tbody>
  </table>