<section>
         <div class="bg_in">
            <div class="contact_form">
               <div class="contact_left">
                  <div class="ch-contacts-details">
                     <ul class="contact-list">
                        <li class="addr">
                           <strong class="title">Địa chỉ của chúng tôi</strong>
                           <p>
                              <em><strong>49-53 food</strong></em><br />
                              <em>69/68 Triều Khúc-Thanh Xuân<br />
                              Điện thoại : 0943888967<br />
                              <!--   <strong>Điện thoại: <span style="color:#FF0000"></span></strong></em> -->
                           </p>
                        </li>
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
                        <form name="FormDatHang" method="post" action="<?php echo BASE_URL?>\index\lienhe" >
                           <div class="content-box_contact">
                              <div class="row">
                                 <div class="input">
                                    <label>Họ và tên: <span style="color:red;">*</span></label>
                                    <input type="text" name="txtHoTen" required class="clsip">
                                 </div>
                                 <div class="clear"></div>
                              </div>
                              <!---row---->
                              <div class="row">
                                 <div class="input">
                                    <label>Số điện thoại: <span style="color:red;">*</span></label>
                                    <input type="text" name="txtDienThoai" required onkeydown="return checkIt(event)" class="clsip">
                                 </div>
                                 <div class="clear"></div>
                              </div>
                              <!---row---->
                              <div class="row">
                                 <div class="input">
                                    <label>Địa chỉ: <span style="color:red;">*</span></label>
                                    <input type="text" name="txtDiaChi" required class="clsip" >
                                 </div>
                                 <div class="clear"></div>
                              </div>
                              <!---row---->
                              <div class="row">
                                 <div class="input">
                                    <label>Email: <span style="color:red;">*</span></label>
                                    <input type="text" name="txtEmail" onchange="return KiemTraEmail(this);" required class="clsip">
                                 </div>
                                 <div class="clear"></div>
                              </div>
                              <!---row---->
                              <div class="row">
                                 <div class="input">
                                    <label>Nội dung: <span style="color:red;">*</span></label>
                                    <textarea type="text" name="txtNoiDung" class="clsipa"></textarea>
                                 </div>
                                 <div class="clear"></div>
                              </div>
                              <!---row---->
                              <div class="row btnclass">
                                 <div class="input ipmaxn ">
                                  <button type="submit" name =  "add_contact" class = "btn btn-success">Gửi Liên Hệ</button>
                                  <button type="submit" class = "btn btn-success">Quay Lại</button>

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