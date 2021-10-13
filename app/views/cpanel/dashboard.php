<div class="container-fluid" style ="height:100%">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Trang thống kê </h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>

  <!-- Content Row -->
  <div style="height: 100%;">
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tổng số khách hàng :</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php 
                $i = 0 ;
                foreach ($list_user as $key => $list_user) {
                    $i++;
                  echo  $i;                }
                ?>
            </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Tổng Thu Nhập:</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php 
                   $total = 0 ;
                foreach ($thu as $key => $thu) {
                    $total +=  $thu['price_product']*$thu['product_quantity'];
                }
                echo number_format($total,0,',','.').'đ'; 
                ?>  
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tổng Thu Chi:</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                      <?php 
                      $total_stock = 0 ;
                      foreach ($list_stock as $key => $list_stock) {
                          $total_stock += $list_stock['stock_quantity'] * $list_stock['stock_purchaseprice'];
                      }
                 echo number_format($total_stock,0,',','.').'đ'; 
?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Tổng Số Đơn Hàng</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php 
                          $order = 0;
                      foreach ($list_order as $key => $list_order) {
                        $order++;
                        }
                        echo $order;
                        ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Số Đơn Hàng chưa xử lí:</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php 
                          $order_status = 0;
                      foreach ($list_order_status as $key => $list_order_status) {
                          $order_status++;
                        }
                        echo $order_status;
                        ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>