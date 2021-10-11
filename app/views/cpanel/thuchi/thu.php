<html>
<h3 style="text-align: center">Quản lý thu </h3>
<div class="container">
    <form action="<?php echo BASE_URL ?>/thuchi/list" method="post" enctype="multipart/form-data">
        <input type="date" name="search">
    <button type="submit" class="btn btn-success" name= "submit">Truy xuất</button>
    </form>
    <table class="table " >
        <thead>
        <tr>
            <th>Số thứ tự </th>
            <th>Mã đơn hàng  </th>
            <th>Tên sản phẩm </th>
            <th>Giá </th>
            <th>Số lượng</th>
            <th>Tổng tiền </th>
            <th>Ngày</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $i = 0;
            $total=0;
            foreach($thu as $key => $cate){
                $i++;
                $total +=  $cate['price_product']*$cate['product_quantity'];
        ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $cate['order_code']?></td>
                <td><?php echo $cate['title_product']?></td>
                <td><?php echo $cate['price_product']?></td>
                <td><?php echo $cate['product_quantity']?></td>
                <td><?php echo $cate['price_product']*$cate['product_quantity']?></td>
                <td><?php echo $cate['order_date'] ?></td>
               
                <!-- <a style="color:#404040;" href="<?php echo BASE_URL ?>/product/delete_category/<?php echo $cate['id_category_product'] ?>"><i class="fas fa-trash"></i></a> || 
                <a style="color:#404040;" href="<?php echo BASE_URL ?>/product/edit_category/<?php echo $cate['id_category_product'] ?>"><i class="far fa-edit"></i></a></td> -->
            </tr> 
        <?php
            }
        ?>
         <td style="text-align:right" colspan="6">Tổng thu nhập : <?php echo number_format($total,0,',','.').'đ' ?></td>
        </tbody>
    </table>
</div>
</html>

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