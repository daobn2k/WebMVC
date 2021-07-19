<?php
   if(!empty($_GET['msg'])){
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value){
       echo "<script type='text/javascript'>alert('$value');</script>";
    }
 }
?>
<h3 style="text-align: center">Cập nhật sản phẩm</h3>
<div class="col-md-6">
<?php
  foreach($productbyid as $key => $pro){
?>
<form action="<?php echo BASE_URL ?>/product/update_product/<?php echo $pro['id_product']?>" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="email">Tên sản phẩm</label>
    <input type="text" value="<?php echo $pro['title_product'] ?>" name="title_product" class="form-control">
  </div>
  <div class="form-group">
    <label for="pwd">Hình ảnh sản phẩm</label>
    <input type="file" name="image_product" class="form-control">
    <p><img src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $pro['image_product'] ?>"height="200" width="200"></p>
  </div>
  <div class="form-group">
    <label for="pwd">Giá sản phẩm</label>
    <input type="text" value="<?php echo $pro['price_product'] ?>"  name="price_product" class="form-control">
  </div>
  <div class="form-group">
    <label for="pwd">Số lượng sản phẩm</label>
    <input type="text" value="<?php echo $pro['quantity_product'] ?>" name="quantity_product" class="form-control">
  </div>
  <div class="form-group">
    <label for="pwd">Miêu tả sản phẩm</label>
    <textarea name="desc_product" rows="5" style="resize: none" class="form-control "<?php echo $pro['desc_product'] ?>></textarea>
  </div>
  <div class="form-group">
    <label for="pwd">Danh mục sản phẩm</label>
    <select class="form-control" name="category_product">
    <?php
    foreach($category as $key =>$cate){
    ?>
    <option <?php if($pro['id_category_product']==$cate['id_category_product']){ echo 'selected'; } ?> value="<?php echo $cate['id_category_product'] ?>"><?php echo $cate['title_category_product'] ?></option>
    <?php
    }
    ?>
    </select>
  </div>
  <div class="form-group">
    <label for="pwd">Sản phẩm hot</label>
    <select class="form-control" name="product_hot"> 
    <?php
    if($pro['product_hot']==0){
    ?> 
    <option selected value="0">Không có</option>
    <option value="1">Có</option>
    <?php
    }else{
    ?>
    <option value="0">Không có</option>
    <option selected value="1">Có</option>
    <?php
    }
    ?>
    </select>
  </div>
  <button type="submit" class="btn btn-success">Cập nhật sản phẩm</button>
</form>
<?php
  }
?>
</div>