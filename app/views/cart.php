<?php   
               if(!empty($_GET['msg'])){
                  $msg = unserialize(urldecode($_GET['msg']));
                  foreach ($msg as $key => $value){
                     echo "<script type='text/javascript'>alert('$value');</script>";
                  }
               }
            
 if (Session::get('role') !== 'user'){

?>
<section>
         <div class="bg_in">
            <div class="content_page cart_page">
               <div class="breadcrumbs">
                  <ol itemscope itemtype="http://schema.org/BreadcrumbList">
                     <li itemprop="itemListElement" itemscope
                        itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="<?php echo BASE_URL ?>">
                        <span itemprop="name">Trang chủ</span></a>
                        <meta itemprop="position" content="1" />
                     </li>
                     <li itemprop="itemListElement" itemscope
                        itemtype="http://schema.org/ListItem">
                        <span itemprop="item">
                        <strong itemprop="name">
                        Giỏ hàng
                        </strong>
                        </span>
                        <meta itemprop="position" content="2" />
                     </li>
                  </ol>
               </div>
               <div class="box-title">
                  <div class="title-bar">
                     <h1>Giỏ hàng của bạn</h1>
                  </div>
               </div>
             
               <div class="content_text">
                  <div class="container_table">
                     <table class="table table-hover table-condensed">
                        <thead>
                           <tr class="tr tr_first">
                              <th  style="font-size:16px;">Hình ảnh</th>
                              <th   style="font-size:16px;">Tên sản phẩm</th>
                              <th  style="font-size:16px;">Giá</th>
                              <th  style="font-size:16px;">Số lượng</th>
                              <th  style="font-size:16px;" colspan = "2">Thành tiền</th>
                            <th></th>
                              <th> Chức Năng</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php
                             if(isset($_SESSION['shopping_cart'])){
                        ?>
                           <form action='<?php echo BASE_URL ?>/giohang/updategiohang' method="POST">
                           <?php
                              $total = 0;
                              foreach($_SESSION['shopping_cart'] as $key => $value){
                                 $subtotal = $value['product_quantity']*$value['product_price'];
                                 $total+=$subtotal;                          
                           ?>
                              <tr class="tr">
                                 <td data-th="Hình ảnh">
                                    <div class="col_table_image col_table_hidden-xs"><img src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $value['product_image'] ?>" alt="<?php echo $value['product_title'] ?>" class="img-responsive"/></div>
                                 </td>
                                 <td data-th="Sản phẩm">
                                    <div class="col_table_name">
                                       <h4 class="nomargin"><?php echo $value['product_title'] ?></h4>
                                    </div>
                                 </td>
                               
                                 <td data-th="Giá"><span class="color_red font_money"><?php echo number_format($value['product_price'],0,',','.').'đ' ?></span></td>
                                 <td data-th="Số lượng">
                                    <div class="clear margintop5">
                                       <div class="floatleft">
                                       
                                       <input type="number" style="font-size:16px !important;" min="0" class="inputsoluong" name="qty[<?php echo $value['product_id'] ?>]"  
                                       value="<?php echo $value['product_quantity'] ?>">
                                       
                                       </div>
                                    </div>
                                    <div class="clear"></div>
                                 </td>
                                 <td data-th="Thành tiền"  ><span class="color_red font_money"><?php echo number_format($subtotal,0,',','.').'đ' ?></span></td>
                                 
                                 <td colspan = "2" class="actions aligncenter">
                                       
                                       <button type="submit" style="box-shadow: none;font-size:16px;" value="<?php echo $value['product_id'] ?>" name="delete_cart" class="btn btn-sm btn-warning">Xóa</button>
                                       
                                       <button type="submit" style="box-shadow: none;font-size:16px;" value="<?php echo $value['product_id'] ?>" name="update_cart" class="btn btn-sm btn-primary">Cập nhật</button>  

                                 </td>
                              </tr>
                              <?php
                              }  
                              ?>
                           </form>
                           <tr>
                              <td colspan="9" class="textright_text">
                                 <div class="sum_price_all">
                                    <span class="text_price">Tổng tiền thành toán</span>: 
                                    <span class="text_price color_red"><?php echo number_format($total,0,',','.').'đ' ?></span>
                                 </div>
                              </td>
                           </tr>
                           <?php
                             }
                             else{
                           ?>
                             <tr>
                              <td colspan="9">
                                 <div class="sum_price_all">
                                    <span class="text_price">Giỏ hàng trống</span> 
                                 </div>
                              </td>
                           </tr>
                           <?php
                             }
                           ?>
                        </tbody>
                        <tfoot>
                           <tr >
                              <td colspan = "9" class ='textleft_text' > 
                              <div class="clear"> 
                         <button class = "btn btn-success" style="font-size:16px;">  <a href="<?php echo BASE_URL?>/login/login" ><i class="fa fa fa-shopping-cart"></i> Gửi Đơn Hàng</a> </button>      
                               </div>
                              </td>
                           </tr>
                        </tfoot>
                     </table>
                  </div>
                  <div class="contact_form">
                  </div>
            </div>
         </div>
      </section>
<?php
}else{
?>
<section>
         <div class="bg_in">
            <div class="content_page cart_page">
               <div class="breadcrumbs">
                  <ol itemscope itemtype="http://schema.org/BreadcrumbList">
                     <li itemprop="itemListElement" itemscope
                        itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="<?php echo BASE_URL ?>">
                        <span itemprop="name">Trang chủ</span></a>
                        <meta itemprop="position" content="1" />
                     </li>
                     <li itemprop="itemListElement" itemscope
                        itemtype="http://schema.org/ListItem">
                        <span itemprop="item">
                        <strong itemprop="name">
                        Giỏ hàng
                        </strong>
                        </span>
                        <meta itemprop="position" content="2" />
                     </li>
                  </ol>
               </div>
               <div class="box-title">
                  <div class="title-bar">
                     <h1>Giỏ hàng của bạn</h1>
                  </div>
               </div>
               <?php
               if(!empty($_GET['msg'])){
                  $msg = unserialize(urldecode($_GET['msg']));
                  foreach ($msg as $key => $value){
                     echo '<span style="color:blue;font-weight:bold">'.$value.'</span>';
                  }
               }
               ?>
               <div class="content_text">
                  <div class="container_table">
                     <table class="table table-hover table-condensed">
                        <thead>
                           <tr class="tr tr_first">
                              <th >Hình ảnh</th>
                              <th>Tên sản phẩm</th>
                              <th >Giá</th>
                              <th style="width:100px;">Số lượng</th>
                              <th style="text-align:right" >Thành tiền</th>
                              <th colspan ="2" >Chức năng</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php
                             if(isset($_SESSION['shopping_cart'])){
                        ?>
                           <form action='<?php echo BASE_URL ?>/giohang/updategiohang' method="POST">
                           <?php
                              $total = 0;
                              foreach($_SESSION['shopping_cart'] as $key => $value){
                                 $subtotal = $value['product_quantity']*$value['product_price'];
                                 $total+=$subtotal;                          
                           ?>
                              <tr class="tr">
                                 <td data-th="Hình ảnh">
                                    <div class="col_table_image col_table_hidden-xs"><img src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $value['product_image'] ?>" alt="<?php echo $value['product_title'] ?>" class="img-responsive"/></div>
                                 </td>
                                 <td data-th="Sản phẩm">
                                    <div class="col_table_name">
                                       <h4 class="nomargin"><?php echo $value['product_title'] ?></h4>
                                    </div>
                                 </td>
                              
                                 <td data-th="Giá"><span class="color_red font_money"><?php echo number_format($value['product_price'],0,',','.').'đ' ?></span></td>
                                 <td data-th="Số lượng">
                                    <div class="col_table_name">
                                       <div class="floatleft">
                                       
                                       <input type="number" min="0" class="inputsoluong" name="qty[<?php echo $value['product_id'] ?>]"  
                                       value="<?php echo $value['product_quantity'] ?>">
                                       
                                       </div>
                                    </div>
                                    <div class="clear"></div>
                                 </td>
                                 <td ><span class="color_red font_money"><?php echo number_format($subtotal,0,',','.').'đ' ?></span></td>
                                 
                                 <td class="actions aligncenter">
                                       
                                       <button type="submit" style="box-shadow: none;font-size:16px;" value="<?php echo $value['product_id'] ?>" name="delete_cart" class="btn btn-sm btn-warning">Xóa</button>
                                       
                                       <button type="submit" style="box-shadow: none;font-size:16px;" value="<?php echo $value['product_id'] ?>" name="update_cart" class="btn btn-sm btn-primary">Cập nhật</button>  

                                 </td>
                              </tr>
                              <?php
                              }  
                              ?>
                           </form>
                           <tr>
                              <td colspan="9" class="textright_text">
                                 <div class="sum_price_all">
                                    <span class="text_price">Tổng tiền thành toán</span>: 
                                    <span class="text_price color_red"><?php echo number_format($total,0,',','.').'đ' ?></span>
                                 </div>
                              </td>
                           </tr>
                           <?php
                             }
                             else{
                           ?>
                             <tr>
                              <td colspan="9">
                                 <div class="sum_price_all">
                                    <span class="text_price">Giỏ hàng trống</span> 
                                 </div>
                              </td>
                           </tr>
                           <?php
                             }
                           ?>
                        </tbody>
                        <tfoot>
                           <tr class="tr_last">
                              <td colspan="9">
                                 <a href="<?php echo BASE_URL?>" class="btn_df btn_table floatleft"><i class="fa fa-long-arrow-left"></i> Tiếp tục mua hàng</a>
                                 <div class="clear"></div>
                              </td>
                           </tr>
                        </tfoot>
                     </table>
                  </div>   
                  <div class="contact_form">
                     <div class="contact_right">
                        <div class="form_contact_in">
                           <div class="box_contact">
                              <form name="FormDatHang" method="POST" autocomplete="off" action="<?php echo BASE_URL ?>/giohang/dathang" >
                                 <div class="content-box_contact">
                                 <div class="row btnclass">
                                        <div class="input" style="margin-bottom:20px; border-radius: 4px;max-width: 150px; height:48px;">
                                          <label> <span style="color:red;"></span></label>
                                          <input style="font-size:14px;line-height:20px; border-radius: 4px;max-width: 150px; height:48px;" type="text" name="sale_code" required class="clsip" placeholder="Input your sale code ... ">
                                       </div>
                                       <div class="input ipmaxn ">
                                          <input type="submit" class="btn btn-success" name="frmSubmit" id="frmSubmit" value="Gửi đơn hàng" style = "width:150px; font-size:16px;">
                                       </div>
                                    </div>
                                    </div>         
                                    <div class="row">
                                       <div class="input">
                                          <label> <span style="color:red;"></span></label>
                                          <input type="hidden" name="name" required class="clsip" value = "<?php echo $_SESSION['fullname']?>">
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                                    <!---row---->
                                    <div class="row">
                                       <div class="input">
                                          <label><span style="color:red;">*</span></label>
                                          <input type="hidden" name="phone" required onkeydown="return checkIt(event)" class="clsip" value = "<?php echo $_SESSION['phone']?>">
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                                    <!---row---->
                                    <div class="row">
                                       <div class="hidden">
                                          <label>Địa chỉ: <span style="color:red;">*</span></label>
                                          <input type="text" name="address" required class="clsip" value = "<?php echo $_SESSION['address']?>" >
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                                    <!---row---->
                                    <div class="row">
                                       <div class="hidden">
                                          <label>Email: <span style="color:red;">*</span></label>
                                          <input type="text" name="email" onchange="return KiemTraEmail(this);" required class="clsip" value = "<?php echo $_SESSION['email']?>">
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                                    <!---row---->
                                    <div class="row">
                                       <div class="hidden">
                                          <label>ID: <span style="color:red;">*</span></label>
                                          <input type="text" name="id" onchange="return KiemTraEmail(this);" required class="clsip" value = "<?php echo $_SESSION['userid']?>">
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                                    <!---row---->
                                    <!-- <div class="row btnclass">
                                       <div class="input ipmaxn ">
                                          <input type="submit" class="btn btn-success" name="frmSubmit" id="frmSubmit" value="Gửi đơn hàng" style = "width:150px;">
                                       </div> -->
                                       
                                    </div>
                                    <!---row---->
                                    <div class="clear"></div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
            </div>
         </div>
      </section>
      <?php
 }
?>

      <div class="clear"></div>