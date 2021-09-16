<?php
   if(!empty($_GET['msg'])){
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value){
       echo "<script type='text/javascript'>alert('$value');</script>";
    }
 }
?>
<h3 style="text-align: center">Thêm sản phẩm</h3>
<div class="col-md-6">
<form action="<?php echo BASE_URL ?>/product/insert_product" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="pwd">Tên Sản Phẩm </label>
    <select class="form-control" name="category_product">
    <?php
    foreach($list_product_home as $key =>$list){
    ?>
    <option value="<?php echo $list['id_product'] ?>"><?php echo $list['title_product']?></option>
    <?php
    }
    ?>
    </select>
  </div>
  <button type="submit" class="btn btn-success">Thêm sản phẩm</button>
</form>
</div>