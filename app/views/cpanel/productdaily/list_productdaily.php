<div class="container">
<h3 style="text-align: center">Liệt kê sản phẩm</h3>
<div style="text-align: left">
<form action="<?php echo BASE_URL?>/productdaily/add_productdaily">
<button type = "submit" class = "btn btn-success" style = "margin-bottom:15px"><i class="fas fa-fw fa-plus-circle" style = "margin-right:5px;"></i>
Thêm sản phẩm
</button>  
</form>
<div class="input-group flex-nowrap">
<?php
if(!empty($_POST['search'])){
$search_value=$_POST["search"];

echo($search_value)
}

?>


<form action="" method="POST" class="formsearch">
  <input type="search" class="textbox" placeholder="Vui Lòng Điền Sản Phẩm muốn tìm">
  <button type="submit" class="button">
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
<table class="table">
<thead>
      <tr>
        <th>Id</th>
        <th>Tên sản phẩm</th>
        <th>Hình sản phẩm</th>
        <th>Danh mục</th>
        <th>Giá sản phẩm</th>
        <th>Số lượng sản phẩm</th>
        <th>Sản phẩm hot</th>
        <th width="100px;">Mô tả</th>
        <th>Quản lý</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $i = 0;
    foreach($product as $key => $pro){
        $i++;
    ?>
      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $pro['title_product'] ?></td>
        <td><img src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $pro['image_product'] ?>"height="50" width="50"></td>
        <td><?php echo $pro['title_category_product'] ?></td>
        <td><?php echo number_format($pro['price_product'],0,',','.').'đ' ?></td>
        <td><?php echo $pro['quantity_product'] ?></td>
        <td><?php 
        if($pro['product_hot']==0){
          echo 'Không có';
        }else{
          echo 'Có';
        }
        ?></td>
        <td style="
    word-break: break-all;" ><?php echo $pro['desc_product'] ?></td>
        <td>
        <a style="color:#404040;" href="<?php echo BASE_URL ?>/product/delete_product/<?php echo $pro['id_product'] ?>"><i class="fas fa-trash"></i></a> || 
        <a style="color:#404040;" href="<?php echo BASE_URL ?>/product/edit_product/<?php echo $pro['id_product'] ?>"><i class="far fa-edit"></i></a></td>
      </tr> 
    <?php
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