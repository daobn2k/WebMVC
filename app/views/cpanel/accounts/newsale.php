
<div class="container-fluid dashboard-content" style="height: 100%;">

<div class="row">

<?php 
  if(!empty($_GET['msg'])){
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value){
       echo "<script type='text/javascript'>alert('$value');</script>";
    }
 }
 $data = [10,15,25,30,35];
?>
    <div class="col-x1-6 col-lg-6 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header" >
                <h2 style="display:flex;justify-content: center;">Thêm Mới Ưu Đãi</h2>
                <div class="card-body">
                    <form action="<?php echo BASE_URL ?>/accounts/newsale" method = "POST" id ="basicform">
                        <div class="form-group">
                            <label for="cat_id">Khách hàng nhận ưu đãi</label>
                            <select class="form-control" name="sale_user_id" id="cat_id">
                            <option value ="">--Xin Mời Lựa chọn--</option>
                        <?php
                        foreach ($accounts as $key => $result_user) {
                            ?>
                        <option value = "<?php echo $result_user['accounts_id'] ?>"><?php echo $result_user['username'] ?></option>
                        <?php
                           }
                        ?>
                            </select>
                        </div>
                      
                        <div class="form-group">
                            <label for="cat_id">Mức độ ưu đãi</label>
                            <select class="form-control" name="sale" id="cat_id">
                            <option value ="">--Lựa chọn mức độ ưu đãi-</option>
                        <?php
                        foreach ($data as $key => $data) {
                            ?>
                        <option value ="<?php echo $data ?>"><?php echo $data . '%' ?></option>
                        <?php
                           }
                        ?>
                            </select>
                        </div>
                        <div class="form-group">
                          <label for="sale_start">Ngày bắt đầu</label>
                          <input type="date" name="start" id="sale_start" class="form-control" placeholder="Chọn ngày bắt đầu" value="<?php echo date('DD-MM-YYYY');?>" >
                        </div>      
                        <div class="form-group">
                          <label for="sale_end">Ngày kết thúc</label>
                          <input type="date" name="end" id="sale_end" class="form-control" placeholder="Chọn ngày kết thúc" value="<?php echo date('DD-MM-YYYY');?>" >
                        </div>  
                        <div class="row">
                            <div class="col-sm-12 pb2 pb-sm-4 pb-lg-0 pr-0">
                              
                                <div class="col-sm-12 pl-0">
                                    <button type="submit" class="btn btn-primary" name ="addnewsale">Thêm Mới</button>
                                </div>
                            </div>
                        </div>    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
