<section>
<?php
               if(!empty($_GET['msg'])){
                  $msg = unserialize(urldecode($_GET['msg']));
                  foreach ($msg as $key => $value){
                     echo "<script type='text/javascript'>alert('$value');</script>";
                  }
               }
?>
         <div class="bg_in">
            <div class="contact_form">
               <div class="contact_left">
                  <div class="ch-contacts-details">
                     <ul class="contact-list">
                      
                     </ul>
                     <!--   <div class="hiring-box">
                        <strong class="title">Chào bạn!</strong>
                        
                        <p>Mọi thắc mắc bạn hãy gửi về mail của chúng tôi <strong>thietbivanphong@gmail.com</strong> chúng tôi sẽ giải đáp cho bạn.</p>
                        
                        <p><a href="." class="arrow-link"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Về trang chủ</a></p>
                        
                        </div> -->
                  </div>
               </div>
               <div class="contact_right">
                  <div class="form_contact_in">
                     <div class="box_contact">
                        <form name="FormDatHang" method="post" action="" >
                           <div class="content-box_contact">
                              <div class="row">
                              <?php 
                              foreach ( $customer_select as $key => $value){

                              ?>
                                 <div class="input">
                                    <label>Họ và tên: <span style="color:red;">*</span></label>
                                    <input type="text" name="txtHoTen" required class="clsip" value = "<?php echo $value['fullname']?>">
                                 </div>
                                 <div class="clear"></div>
                              </div>
                              <!---row---->
                              <div class="row">
                                 <div class="input">
                                    <label>Số điện thoại: <span style="color:red;">*</span></label>
                                    <input type="text" name="txtDienThoai" required onkeydown="return checkIt(event)" class="clsip" value = "<?php echo $value['phone']?>">
                                 </div>
                                 <div class="clear"></div>
                              </div>
                              <!---row---->
                              <div class="row">
                                 <div class="input">
                                    <label>Địa chỉ: <span style="color:red;">*</span></label>
                                    <input type="text" name="txtDiaChi" required class="clsip" value = "<?php echo $value['address']?>">
                                 </div>
                                 <div class="clear"></div>
                              </div>
                              <!---row---->
                              <div class="row">
                                 <div class="input">
                                    <label>Email: <span style="color:red;">*</span></label>
                                    <input type="text" name="txtEmail" onchange="return KiemTraEmail(this);" required class="clsip" value = "<?php echo $value['email']?>">
                                 </div>
                                 <div class="clear"></div>
                              </div>
                              <!---row---->
                              <!-- <div class="row">
                                 <div class="input">
                                    <label>Nội dung: <span style="color:red;">*</span></label>
                                    <textarea type="text" name="txtNoiDung" class="clsipa"></textarea>
                                 </div>
                                 <div class="clear"></div>
                              </div> -->
                              <!---row---->
                              <div class="row btnclass">
                                 <div class="input ipmaxn ">
                               <?php
                               }
                               ?>
                                  <button type="submit" name =  "update_info" class = "btn btn-success">Cật Nhật Thông Tin</button>
                                  <button type="submit" class = "btn btn-success"> <a href="<?php echo BASE_URL?>/customer/info/<?php echo $value['accounts_id']?>"> Quay Lại</a></button>
                                 </div>
                                 <div class="clear"></div>
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
      </section>