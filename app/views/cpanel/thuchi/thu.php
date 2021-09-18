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