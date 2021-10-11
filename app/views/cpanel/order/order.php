<div class="container">
<h3 style="text-align: center">Liệt kê đơn hàng</h3>


<div class="input-group flex-nowrap">
<form method="post" class="formsearch">
  <input  type="search" name= "search" class="textbox" placeholder="Vui lòng Mã Đơn Hàng muốn tìm">
  <button title="Search" type="submit" class="button">
  <i class="fas fa-search"></i>
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
        <th>Id</th>
        <th>Code đơn hàng</th>
        <th>Ngày đặt</th>
        <th>Tình trạng</th>
        <th>Quản lý</th>
      </tr>
    </thead>

    <?php
if(!empty($_POST["search"])){
  $search_value=$_POST["search"];
  if( $search_value !== '') {
    $con=new mysqli('127.0.0.1','root','','pdo_blogs_ecommerce');
    if($con->connect_error){
        echo 'Connection Faild: '.$con->connect_error;
        }else{
            $sql="SELECT * FROM tbl_order WHERE tbl_order.order_code LIKE '%$search_value%' or tbl_order.order_date LIKE '%$search_value%'";
            $res=$con->query($sql);
            $i = 0;
            while($row=$res->fetch_assoc()){
              $i++;
              ?>
               <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['order_code'] ?></td>
        <td><?php echo $row['order_date'] ?></td>
        <td><?php if($row['order_status']==0){echo 'Đơn hàng mới';}else{echo 'Đã xử lý';}?></td>
        <td><a href="<?php echo BASE_URL ?>/order/order_details/<?php echo $row['order_code'] ?>">Xem đơn hàng</a></td>
      </tr> 

      <?php
            }       
            }
    
  }
  else{
    return null;
  }
?>
<?php 
}else{
   if(!empty($_GET['msg'])){
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value){
       echo "<script type='text/javascript'>alert('$value');</script>";
    }
 }
?>
    <tbody>
    <?php
    $i = 0;
    foreach($order as $key => $ord){
        $i++;
    ?>
      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $ord['order_code'] ?></td>
        <td><?php echo $ord['order_date'] ?></td>
        <td><?php if($ord['order_status']==0){echo 'Đơn hàng mới';}else{echo 'Đã xử lý';}?></td>
        <td><a href="<?php echo BASE_URL ?>/order/order_details/<?php echo $ord['order_code'] ?>">Xem đơn hàng</a></td>
      </tr> 
    <?php
    }
    }
    ?>
    </tbody>
  </table>
  </div>

  <style>
  
  .formsearch {
    display: flex;
    width: 100%;
    margin-bottom:20px;  
    outline: 0;
    float: left;
    -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
    -webkit-border-radius: 4px;
    border-radius: 4px;
}

.formsearch  .textbox {
  width: 100% ;
  outline: 0;
  background-color: rgba(255, 255, 255, 0.8);
  color: #212121;
  border: 0;
  float: left;
  padding :4px 16px;
  border-radius: 4px 0 0 4px;
}

.formsearch > .textbox:focus {
  outline: 0;
  background-color: #FFF;
}

.formsearch > .button {
  outline: 0;
  background: none;
  background-color: rgba(38, 50, 56, 0.8);
  float: left;
  height: 42px;
  width: 42px;
  text-align: center;
  line-height: 42px;
  border: 0;
  color: #FFF;
  font: normal normal normal 14px/1 FontAwesome;
  font-size: 16px;
  text-rendering: auto;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
  -webkit-transition: background-color .4s ease;
  transition: background-color .4s ease;
  -webkit-border-radius: 0 4px 4px 0;
  border-radius: 0 4px 4px 0;
}

.formsearch > .button:hover {
  background-color: rgba(0, 150, 136, 0.8);
}
</style>