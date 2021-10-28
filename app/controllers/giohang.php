<?php
    class giohang extends DController{
        public function __construct(){
            $data = array();
            parent::__construct();
        }
        public function index(){
            $this->giohang();
        }
        
        public function giohang(){
            Session::init();
            // Session::destroy();
            $table = 'tbl_category_product';   
            $table_admin = "tbl_accounts";
            $categorymodel = $this->load->model('categorymodel');
            $data['category'] = $categorymodel->category_home($table); 

            $this->load->view('header',$data);
            $this->load->view('cart');
            $this->load->view('footer');
        }
        public function dathang(){
            Session::init();
            $table_sale="sale_user";
            $tbl_account="tbl_accounts";
            $table_order = "tbl_order";
            $table_order_details = "tbl_order_details";
            $table_product = "tbl_product";
            $ordermodel = $this->load->model('ordermodel');
            $name = $_POST['name'];
            $sodienthoai = $_POST['phone'];
            $email = $_POST['email'];
            $id = $_POST['id'];
            $diachi = $_POST['address'];
            $order_code = rand(0,9999);
            date_default_timezone_set('asia/ho_chi_minh');
            $date = date("d/m/Y");
            $hour = date("h:i:sa");
            $order_date = $date.$hour;
            $data['list_order_user_id'] =$ordermodel->list_order_user_id($table_order,$id);
            $totalOrder = 0 ;
            $order_code_detail = array();
            $sale = 0;
            $sale_id;
            if(isset($_POST['sale_code'])){
                $sale_code = $_POST['sale_code'];
                $id_user = $_SESSION['userid'];
                $data['get_sale']= $ordermodel->get_sale($table_sale,$id_user,$sale_code);
                $sale = $data['get_sale'][0]['sale'];
                $sale_id=$data['get_sale'][0]['sale_id'];
            };
            foreach($data['list_order_user_id'] as $key => $order_by_user_id){
                $data['list_order_details_user_id']=$ordermodel->list_order_details_user_id($table_order_details, $order_by_user_id['order_code']);
                foreach($data['list_order_details_user_id'] as $key => $list_order_details_user_id){
                    $data['list_product_by_id'] = $ordermodel->list_product_by_id($table_product,$list_order_details_user_id['product_id']);
                        foreach($data['list_product_by_id'] as $key => $list_product_by_id){
                            $totalOrder += $list_product_by_id['price_product'] * $list_order_details_user_id['product_quantity'];
                        }
                }
            }
            $data_order = array(
                'order_status' => 0,
                'order_code' => $order_code,
                'order_date' => $date.' '.$hour,
                'order_userid' =>$id,
                'order_username' =>$name,
                'order_phone' => $sodienthoai,
                'order_email' => $email,
                'order_address' => $diachi
            );

            $result_order = $ordermodel->insert_order($table_order,$data_order); 
           
            if(Session::get("shopping_cart")==true){
                foreach(Session::get("shopping_cart") as $key => $value){
                    $data_details = array(
                        'order_code' => $order_code,
                        'product_id' => $value['product_id'],
                        'product_quantity' => $value['product_quantity'],
                    );
          
            $result_order_details = $ordermodel->insert_order_details($table_order_details,$data_details); 
            $sale_oder = ( $sale * ( $value['product_quantity'] * $value['product_price'] ) ) / 100 ;
            $total = $value['product_quantity'] * $value['product_price'] -  $sale_oder;
            $result = $totalOrder + $total;
            $cond_delete_id = `sale_id=`.$sale_id;
            $data = $ordermodel ->delete_sale_code($table_sale,$cond_delete_id);
            if ($result > 0 && $result <= 100000) {
                $evaluate_id = 1;
             $data_update = array(
                 'evaluate_id'=> $evaluate_id
             );
             $cond = "tbl_accounts.accounts_id='$id'";
             $result_order = $ordermodel->update_evalue($tbl_account,$data_update,$cond); 
            
            }
           else if ($result > 100000 && $result <= 500000) {
               $evaluate_id = 2;
            $data_update = array(
                'evaluate_id'=> $evaluate_id
            );
            $cond = "tbl_accounts.accounts_id='$id'";
            $result_order = $ordermodel->update_evalue($tbl_account,$data_update,$cond); 

           }
           else if ($result > 500000 && $result < 100000){
            $evaluate_id = 3;
            $data_update = array(
                'evaluate_id'=> $evaluate_id
            );
            $cond = "tbl_accounts.accounts_id='$id'";
            $result_order = $ordermodel->update_evalue($tbl_account,$data_update,$cond); 

           }
           else {
            $evaluate_id = 4;
            $data_update = array(
                'evaluate_id'=> $evaluate_id
            );
            $cond = "tbl_accounts.accounts_id='$id'";
            $result_order = $ordermodel->update_evalue($tbl_account,$data_update,$cond); 
           }
            require 'PHPMailer/PHPMailer.php';
            require 'PHPMailer/SMTP.php';
            require 'PHPMailer/Exception.php';
            $mail = new PHPMailer\PHPMailer\PHPMailer;       
           
             //Server settings
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = "true";                               // Enable SMTP authentication
            $mail->Username = 'vvdao096@gmail.com';                 // SMTP username
            $mail->Password = 'vandao2k'; 
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
           
            //Recipients
         
            $mail->setFrom('vvdao096@gmail.com', 'admin');
            $mail->addAddress('vvdao096@gmail.com', 'quản trị nhà hàng');
            $mail->isHTML(true);
            $mail->Subject = 'Có một khách vừa đặt bàn!';
            $mail->Body    = 'Xin Chào bạn';
            $mail->CharSet="UTF-8";
          
            //for ($i = 0; $i < 100; $i++) {
            if ($mail->Send()) {
                $i = 0;
                $mail->addAddress($email, 'Khách Hàng');
                $mail->isHTML(true);
              $content = "<table border = '1'>";
                $content .= "<tr>
                <th>ID</th>
                <th>Tên Người Đặt</th>
                <th>Số Điện Thoại</th>
                <th>Địa Chỉ Nhận Hàng</th>
                <th>Tên sản phẩm</th>
                <th >Giá</th>
                <th>Số lượng</th>
                <th>Giảm giá </th>
                <th>Thành tiền</th>
               
             </tr> ";
             foreach (Session::get("shopping_cart") as $key => $value){ 
                $sale_oder = ( $sale * ( $value['product_quantity'] * $value['product_price'] ) ) / 100 ;
                $total = $value['product_quantity'] * $value['product_price'] - $sale_oder;
                $result_bill += $total; 
            $content .="   <tr>
            <td >
            <div>
            <h4 > ".++$i."</h4>
            </div> 
         </td>
                     <td >
                        <div>
                        <h4 > ".$name."</h4>
                        </div> 
                     </td>
                     <td >
                     <div>
                     <p >  ".$sodienthoai."</p>
                     </div> 
                      <td >
                        <div>
                        <h4 >  ". $diachi."</h4>
                        </div> 
                      </td>  

                        <td >
                            <div><h4 > ".$value['product_title']."</h4>   </div>
                        </td>
                    <td ><h4 > ".$value['product_price']."</h4></td>
                    <td style = 'text-align:center'><h4 > ".$value['product_quantity']."</h4></td>
                    <td style = 'text-align:center'><h4 > ".$sale."%"."</h4></td>
                    <td ><h4 > ".$total."</h4></td>

              </tr>"."</br>"."Total Bill:".$result_bill;
             }
            $content .= "</table>";
                $mail->Subject = 'Bạn Đã Đặt hàng Thành Công!';
                $mail->Body    = "Thông Tin Chi Tiết Đơn Hàng : " .$content."<br>"."Cảm ơn Quý Khách Đã Đặt Hàng !";
                $mail->CharSet="UTF-8";
                $mail->Send();
                $message['msg'] = "Đơn Hàng Đã Được Đặt Thành Công";
                header('Location:'.BASE_URL."/giohang/giohang?msg=".urlencode(serialize($message)));
                unset($_SESSION["shopping_cart"]);
            } else {
              $message['msg'] = "Đơn hàng chưa đặt được vui lòng đặt lại";
                header('Location:'.BASE_URL."/giohang/giohang?msg=".urlencode(serialize($message)));
            }
        }
    }
}
        
        public function themgiohang(){
            Session::init();
            
            if(isset($_SESSION["shopping_cart"])){
            $avaiable = 0;
            foreach($_SESSION["shopping_cart"] as $key => $value){
                if($_SESSION["shopping_cart"][$key]['product_id'] == $_POST['product_id']){
                    $avaiable ++;
                    $_SESSION["shopping_cart"][$key]['product_quantity'] = $_SESSION["shopping_cart"][$key]['product_quantity'] + $_POST['product_quantity'];
                }
            }
            if($avaiable == 0){
                $item = array(
                    'product_id' => $_POST["product_id"],
                    'product_title' => $_POST["product_title"],
                    'product_price' => $_POST["product_price"],
                    'product_image' => $_POST["product_image"],
                    'product_quantity' => $_POST["product_quantity"]
                );
                $_SESSION["shopping_cart"][] = $item;
            }
        }else{
            $item = array(
                'product_id' => $_POST["product_id"],
                'product_title' => $_POST["product_title"],
                'product_price' => $_POST["product_price"],
                'product_image' => $_POST["product_image"],
                'product_quantity' => $_POST["product_quantity"]
            );
            $_SESSION["shopping_cart"][] = $item;
        }
        header("Location:".BASE_URL.'/giohang/giohang');
    }
    public function updategiohang(){
        Session::init();
        // Session::destroy();
        if(isset($_POST['delete_cart'])){
            if(isset($_SESSION["shopping_cart"])){
                foreach($_SESSION["shopping_cart"] as $key => $values){

                    if($_SESSION["shopping_cart"][$key]["product_id"] == $_POST['delete_cart']){
                        unset($_SESSION["shopping_cart"][$key]); 
                    }
                }
                header("Location:".BASE_URL.'/giohang/giohang'); 
        }else{
            header('Location:'.BASE_URL);
        }
    }else{
        foreach($_POST['qty'] as $key => $qty){
            foreach($_SESSION["shopping_cart"] as $session => $values){
                if($values['product_id']== $key && $qty >= 1){
                    $_SESSION["shopping_cart"][$session]['product_quantity'] = $qty;
                }elseif($values['product_id']== $key && $qty <= 0){
                    unset($_SESSION["shopping_cart"][$session]); 
                }
            }
        }
        header("Location:".BASE_URL.'/giohang/giohang');
    //     if(isset($_SESSION["shopping_cart"])){
    //         foreach($_SESSION["shopping_cart"] as $key => $value){

    //             if($_SESSION["shopping_cart"][$key]["product_id"] == $_POST['delete_cart']){
    //                 unset($_SESSION["shopping_cart"][$key]; 
    //             }
    //         }
    //         header("Location:".BASE_URL.'/giohang/giohang');
    // }else{
    //     header('Location:'.BASE_URL);
    // }
    }
    
    
    }






}
?>