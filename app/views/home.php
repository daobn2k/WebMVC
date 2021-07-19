   <section>
        <div class="bg_in">
            <div class="module_pro_all">
                <div class="box-title">
                    <div class="title-bar">
                        <h1>Món ăn HOT</h1>
                        <a class="read_more" href="<?php echo BASE_URL ?>/sanpham/tatca">
                  Xem thêm
                  </a>
                    </div>
                </div>
                <div class="pro_all_gird">
                    <div class="girds_all list_all_other_page ">


                    <?php 
         foreach($product_home as $key => $product){
             if($product['product_hot']==1){
         ?>
            <form action="<?php echo BASE_URL ?>/giohang/themgiohang" method="POST">
            <input type="hidden" value="<?php echo $product['id_product']?>" name="product_id">
            <input type="hidden" value="<?php echo $product['title_product']?>" name="product_title">
            <input type="hidden" value="<?php echo $product['image_product']?>" name="product_image">
            <input type="hidden" value="<?php echo $product['price_product']?>" name="product_price">
            <input type="hidden" value="1" name="product_quantity">

            <div class="grids home_product">
               <div class="grids_in">
                  <div class="content">
                     <div class="img-right-pro">
                        <a href="sanpham.php">
                        <img class="lazy img-pro content-image" src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $product['image_product'] ?>" data-original="<?php echo BASE_URL ?>/public/images/cakholangvudai.jpg" alt="<?php echo $product['title_product'] ?>" />
                        </a>
                        <div class="content-overlay"></div>
                        <div class="content-details fadeIn-top">
                           <ul class="details-product-overlay">
                              <li>Ngon</li>
        
                           </ul>
                        </div>
                     </div>
                     <div class="name-pro-right">
                        <a href="<?php echo BASE_URL ?>/sanpham/chitietsanpham/<?php echo $product['id_product'] ?>">
                           <h3><?php echo $product['title_product'] ?></h3>
                        </a>
                     </div>
                     <div>                       
                        <input type="submit" style="box-shadow: none" class="btn btn-success" name="addcart" value="Đặt hàng">                    
                     </div>
                     <div class="price_old_new">
                        <div class="price">
                           <span class="news_price"><?php echo number_format ($product['price_product'],0,',','.').'đ' ?> </span>
                        </div>
                     </div>
                  </div>
               </div>
            </div> 
            </form>
            <?php
             }
            }
            ?>               
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
            <?php
            foreach($category as $key => $cate){
                
            ?>

            <div class="module_pro_all">
                <div class="box-title">
                    <div class="title-bar">
                        <h1><?php echo $cate['title_category_product'] ?></h1>
                        <a class="read_more" href="sanpham.php">
                  Xem thêm
                  </a>
                    </div>
                </div>
                <div class="pro_all_gird">
                    <div class="girds_all list_all_other_page ">
                    <?php
                        foreach($product_home as $key => $pro_cate){
                            if($cate['id_category_product']==$pro_cate['id_category_product']){
                    ?>
                     <form action="<?php echo BASE_URL ?>/giohang/themgiohang" method="POST">
            <input type="hidden" value="<?php echo $pro_cate['id_product']?>" name="product_id">
            <input type="hidden" value="<?php echo $pro_cate['title_product']?>" name="product_title">
            <input type="hidden" value="<?php echo $pro_cate['image_product']?>" name="product_image">
            <input type="hidden" value="<?php echo $pro_cate['price_product']?>" name="product_price">
            <input type="hidden" value="1" name="product_quantity">
               <div class="grids">
               <div class="grids_in">
                  <div class="content">
                     <div class="img-right-pro">
                        <a href="sanpham.php">
                        <img class="lazy img-pro content-image" src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $pro_cate['image_product'] ?>" data-original="<?php echo BASE_URL ?>/public/images/cakholangvudai.jpg" alt="Cá kho làng Vũ Đại" />
                        </a>
                        <div class="content-overlay"></div>
                        <div class="content-details fadeIn-top">
                           <ul class="details-product-overlay">
                              <li>Ngon</li>
        
                           </ul>
                        </div>
                     </div>
                     <div class="name-pro-right">
                        <a href="<?php echo BASE_URL ?>/sanpham/chitietsanpham/<?php echo $pro_cate['id_product'] ?>">
                           <h3><?php echo $pro_cate['title_product'] ?></h3>
                        </a>
                     </div>
                     <div>                       
                        <input type="submit" style="box-shadow: none" class="btn btn-success" name="addcart" value="Đặt hàng">                    
                     </div>
                     <div class="price_old_new">
                        <div class="price">
                           <span class="news_price"><?php echo number_format ($pro_cate['price_product'],0,',','.').'đ' ?> </span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
                            </form>
                    <?php
                     }
                    }
                    ?>      
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
            <?php
                        }
                        ?>
           
        
    </section>
    <!--end:body-->
    <div class="clear"></div>
    