<h3 style="text-align: center">Liệt kê sản phẩm</h3>
<div style="text-align: left">
<form action="<?php echo BASE_URL?>/product/add_product">
<button type = "submit" class = "btn btn-success" style = "margin-bottom:15px"><i class="fas fa-fw fa-plus-circle" style = "margin-right:5px;"></i>
Thêm sản phẩm
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
        <th>Tên sản phẩm</th>
        <th>Hình sản phẩm</th>
        <th>Danh mục</th>
        <th>Giá sản phẩm</th>
        <th>Số lượng sản phẩm</th>
        <th>Sản phẩm hot</th>
        <th>Mô tả</th>
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
        <td><img src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $pro['image_product'] ?>"height="200" width="200"></td>
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
        <td><?php echo $pro['desc_product'] ?></td>
        <td><a href="<?php echo BASE_URL ?>/product/delete_product/<?php echo $pro['id_product'] ?>">Xóa</a> || 
        <a href="<?php echo BASE_URL ?>/product/edit_product/<?php echo $pro['id_product'] ?>">Cập nhật</a></td>
      </tr> 
    <?php
    }
    ?>
    </tbody>
  </table>