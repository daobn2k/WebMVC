<?php
  
  if(!empty($_GET['msg'])){
     $msg = unserialize(urldecode($_GET['msg']));
     foreach ($msg as $key => $value){
        echo "<script type='text/javascript'>alert('$value');</script>";
     }
  }
 
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
                     <h1>Thông Tin Cá Nhân</h1>
                  </div>
               </div>
               <?php
               foreach($customer_select as $key => $value){
               ?>
               <div class="content_text">
                  <div class="container_table">
                     <table class="table table-hover table-condensed">
                        <thead>
                           <tr class="tr tr_first">
                              <th >Họ và Tên</th>
                              <th>Email</th>
                              <th >Phone</th>
                              <th >Address</th>
                            <th>Chức Năng</th>
                             
                           </tr>
                        </thead>
                        <tbody>

                              <tr class="tr">
                              <td data-th="Họ Và Tên">
                                    <div class="col_table_name">
                                       <h4 class="nomargin"><?php echo $value['fullname'] ?></h4>
                                    </div>
                                 </td>
                                 <td data-th="Email">
                                    <div class="col_table_name">
                                       <h4 class="nomargin"><?php echo $value['email'] ?></h4>
                                    </div>
                                 </td>
                                 <td data-th="Phone">
                                    <div class="col_table_name">
                                       <h4 class="nomargin"><?php echo $value['phone'] ?></h4>
                                    </div>
                                 </td>
                                 
                                 <td data-th="Address"><span class="color_red font_money"><?php  echo $value['address']?></span></td>
                                     <td data-th="Phone">
                                    <div class="col_table_name">
                                    <button type="submit" style="box-shadow: none;"  class="btn btn-sm btn-primary"><a href="<?php echo BASE_URL?>/customer/update/<?php echo $value['accounts_id']?>">Cập nhật</a></button>  


                                    </div>
                                 </td>                             
                                 <td class="actions aligncenter" colspan = "2">
                                 <div class="col_table_name">

                             </div>     
                                   </td>
                              </tr>
                              <?php
                              }  
                              ?>
                          
                        
                        </tbody>
                        <tfoot>
                        
                           <tr class="tr_last">
                          
                         
                    
                        </tfoot>
                     </table>
                     <h3 style="text-align: center">Lịch Sử Mua Hàng</h3>
<table class="table table-striped">
    <thead>
    <?php 
    $i = 0;
    foreach($customer_select_code as $key => $value)
    {
        $i++;
  ?>
      <tr>
        <th>ID</th>
        <th>Code đơn hàng</th>
        <th>Ngày đặt</th>
        <th>Tình trạng</th>
        <th>Xử Lí</th>
        <th>Thông Tin Đơn Hàng</th>
      </tr>
    </thead>
    <tbody>
  
      <tr>
        <td><?php echo $i?></td>
        <td><?php echo $value['order_code']?></td>
        <td><?php echo $value['order_date']?></td>
        <td><?php if($value['order_status']==0){echo 'Đơn hàng mới';}else{echo 'Đã xử lý';}?></td>
        <td>
        <?php 
        if($value['order_status']==0){?>
         <a href="<?php echo BASE_URL?>/customer/huydonhang/<?php echo $value['order_code'];?>"
          class="btn_df btn_table floatleft"> Hủy Đơn Hàng </a>
         <div class="clear"></div> 
         <?php
         }
         else
         {
            ?>
    <a href="<?php echo BASE_URL?>/customer/huydonhang/<?php echo $value['order_code']?>"
          class="btn_df btn_table floatleft btn-success"></a>
         <div class="clear"></div>
            <?php
         }
         ?>
        <td colspan="5">
         <a href="<?php echo BASE_URL?>/customer/checkout/<?php echo $value['order_code']?>"
          class="btn_df btn_table floatleft"><i class="fa fa-long-arrow-left"></i> Xem Chi Tiết</a>
         <div class="clear"></div>
         </td>
      </tr> 
   <?php
    }
    ?>

    </tbody>
  </table>
                  </div>
             
               </div>
            </div>
         </div>
      </section>
       
      </section>
                              
      </section>
      <div class="clear">
      
      </div>