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
            //    foreach($customer_select as $key => $value){

              
               
               ?>
               <div class="content_text">
                  <div class="container_table">
                     <table class="table table-hover table-condensed">
                        <thead>
                           <tr class="tr tr_first">
                           <th >ID</th>
                           <th >Tên Sản Phẩm</th>
                            <th >Hình Ảnh</th>
                            <th>Số Lượng</th>
                              <th >Giá Thành</th>
                              <th >Tổng Tiền</th>
                           <th colspan ="2"></th>
                             
                           </tr>
                        </thead>
                        <tbody>
<?php 
if(!empty($_GET['msg'])){
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value){
        echo '<span style="color:blue;font-weight:bold">'.$value.'</span>';
    }
}
$i = 0;
$total = 0;
foreach($order_details as $key => $ord){
    $total+=$ord['product_quantity']*$ord['price_product'];
    $i++;
?>
                              <tr class="tr">
                              <td data-th="ID">
                                    <div class="col_table_name">
                                       <h4 class="nomargin"><?php echo $i; ?></h4>
                                    </div>
                                 </td>
                              <td data-th="Tên Sản Phẩm">
                                    <div class="col_table_name">
                                       <h4 class="nomargin"><?php echo $ord['title_product']  ?></h4>
                                    </div>
                                 </td>
                                
                                 <td><img src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $ord['image_product'] ?>" height="100" width="100"></td>

                                 <td data-th="Số Lượng">
                                    <div class="col_table_name">
                                       <h4 class="nomargin"><?php  echo $ord['product_quantity'] ?></h4>
                                    </div>
                                 </td>
                                 <td data-th="Giá Thành">
                                    <div class="col_table_name">
                                       <h4 class="nomargin"><?php  echo number_format($ord['price_product'],0,',','.').'đ' ?></h4>
                                    </div>
                                 </td>
                                 <td data-th="Tổng Tiền">
                                    <div class="col_table_name">
                                       <h4 class="nomargin"><?php echo number_format($ord['product_quantity']*$ord['price_product'],0,',','.').'đ' ?></h4>
                                    </div>
                                 </td>                                   
                                 <td class="actions aligncenter">
                                 <div class="col_table_name" colspan = " 2"> 

                             </div>     
                                      </td> 
                                    

                                 </td>
                              </tr>
                              <?php
                              }  
                              ?>




                        </tbody>
                        <tfoot>
                           <tr class="tr_last">
                              <td colspan="7">
                                 <a href="<?php echo BASE_URL?>" class="btn_df btn_table floatleft"><i class="fa fa-long-arrow-left"></i> Đặt Đơn Hàng Khác </a>
                                 <div class="clear"></div>
                              </td>
         </td>
                           </tr>
                        </tfoot>
                     </table>
                  </div>
             
               </div>
            </div>
         </div>
      </section>
       
      </section>
                              
      </section>
      <div class="clear"></div>