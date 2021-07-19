<?php
   if(!empty($_GET['msg'])){
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value){
       echo "<script type='text/javascript'>alert('$value');</script>";
    }
 }
?>
<h3 style="text-align: center">Thêm danh mục sản phẩm</h3>
<div class="col-md-6">
<form action="<?php echo BASE_URL ?>/product/insert_category" method="post">
  <div class="form-group">
    <label for="email">Tên danh mục:</label>
    <input type="text" name="title_category_product" class="form-control">
  </div>
  <div class="form-group">
    <label for="pwd">Miêu tả danh mục:</label>
    <input type="text" name="desc_category_product" class="form-control">
  </div>
  <button type="submit" class="btn btn-success">Thêm danh mục</button>
</form>
</div>