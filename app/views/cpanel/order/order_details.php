<div class="container"> 
<h3 style="text-align: center">Liệt kê đơn hàng chi tiết</h3>
<table class="table table-striped">
    <thead>
      <tr>
        <th>Mã Đơn Hàng</th>
        <th>Tên người đặt</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th>Địa chỉ</th>
      </tr>
    </thead>
    <tbody>
    <?php

    foreach($list_info_order as $key => $ord){

    ?>
      <tr>
        <td><?php echo $ord['order_code'] ?></td>
        <td><?php echo $ord['order_username'] ?></td>
        <td><?php echo $ord['order_email'] ?></td>
        <td><?php echo $ord['order_phone'] ?></td>
        <td><?php echo $ord['order_address'] ?></td>
      

      </tr> 
    <?php
    }
    ?>
    </tbody>
  </table>


<table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Số lượng</th>
        <th>Đơn giá</th>
        <th>Thành tiền</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $i = 0;
    $total = 0;
    foreach($order_details as $key => $ord){
        $total+=$ord['product_quantity']*$ord['price_product'];
        $i++;
    ?>
      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $ord['title_product'] ?></td>
        <td><img src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $ord['image_product'] ?>" height="100" width="100"></td>
        <td><?php echo $ord['product_quantity'] ?></td>
        <td><?php echo number_format($ord['price_product'],0,',','.').'đ' ?></td>
        <td><?php echo number_format($ord['product_quantity']*$ord['price_product'],0,',','.').'đ' ?></td>
      </tr> 
    <?php
    }
    ?>
    <form action="<?php echo BASE_URL ?>/order/order_confirm/<?php echo $ord['order_code'] ?>" method="POST">
    <tr>
        <td><input type="submit" name="update_order" value="Xử lý đơn hàng" class="btn btn-success"></td>
        <td style="text-align:right" colspan="6">Tổng tiền : <?php echo number_format($total,0,',','.').'đ' ?></td>
    </tr>
    </form>
    </tbody>
  </table>
  </div>