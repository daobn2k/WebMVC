<!-- Send Mail Php Basic -->

<?php 
   if(!empty($_GET['msg'])){
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value){
       echo "<script type='text/javascript'>alert('$value');</script>";
    }
 }
?>
<div style="height:100%">
    <div style="    display: flex;
    justify-content: center;">
    <div class="col-md-7 d-flex align-items-stretch">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3 class="mb-4" style="text-align: center;"> Chăm Sóc Khách Hàng</h3>
									<div id="form-message-warning" class="mb-4"></div> 
									<div id="form-message-success" class="mb-4">
										</div>
									<form method="POST" id="contactForm" name="contactForm">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<select class="form-control"  name="name" id="cat_id">
														<option value ="">--Chọn Tên Khách Hàng--</option>
														 <?php

													foreach($accounts_user as $key => $rs){
													?>
													<option value = "<?php echo $rs['username'] ?>"><?php echo $rs['username'] ?></option>
													<?php
												}
													?>
														</select>
											
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" class="form-control" name="subject" id="subject" placeholder="Tiêu Đề">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<textarea name="message" class="form-control" id="message" cols="30" rows="7" placeholder="Nội dung"></textarea>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group" style="text-align: center;">
													<button type="submit"  name="add_contact" class="btn btn-primary">Send Message </button>
													<div class="submitting"></div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
    </div>
</div>