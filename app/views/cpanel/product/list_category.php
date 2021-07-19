<h3 style="text-align: center">Liệt kê danh mục sản phẩm</h3>
<div style="text-align: left">
<form action="<?php echo BASE_URL?>/product/add_category">
<button type = "submit" class = "btn btn-success" style = "margin-bottom:15px"><i class="fas fa-fw fa-plus-circle" style = "margin-right:5px;"></i>
Thêm Loại sản phẩm
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
        <th>Tên danh mục</th>
        <th>Mô tả</th>
        <th>Quản lý</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $i = 0;
    foreach($category as $key => $cate){
        $i++;
    ?>
      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $cate['title_category_product'] ?></td>
        <td><?php echo $cate['desc_category_product'] ?></td>
        <td><a href="<?php echo BASE_URL ?>/product/delete_category/<?php echo $cate['id_category_product'] ?>">Xóa</a> || 
        <a href="<?php echo BASE_URL ?>/product/edit_category/<?php echo $cate['id_category_product'] ?>">Cập nhật</a></td>
      </tr> 
    <?php
    }
    ?>
    </tbody>
  </table>