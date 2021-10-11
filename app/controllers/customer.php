<?php
    class customer extends DController{
        public function __construct(){
            Session::checkSession();
            $message = array();
            $data = array();
           parent::__construct();
        }
        public function index(){
            Session::init();
            $this->customer();
        }

        public function info($order_userid){
            $table = 'tbl_category_product';   
            $categorymodel = $this->load->model('categorymodel');
            $data['category'] = $categorymodel->category_home($table); 
            $table_admin = "tbl_accounts";
            $table_order = 'tbl_order';   
            $table_evalue ='tbl_evaluateaccount';
            $customermodel = $this->load->model('customermodel');
            $data['customer_select'] = $customermodel->customer_info_admin($table_admin,$order_userid); 
            $data['evalue'] = $customermodel ->evalue($table_evalue);
            $data['customer_select_code'] = $customermodel ->customer_select_code($table_order,$order_userid); 
            $this->load->view('header',$data);       
            $this->load->view('info',$data);
            $this->load->view('footer');
        }     
        
     
        public function checkout($order_code){
   
            $table_order = 'tbl_order';   
            $customermodel = $this->load->model('customermodel');
            $table_order_details = "tbl_order_details";
            $table_product = "tbl_product";
            $cond = "$table_product.id_product = $table_order_details.product_id AND $table_order_details.order_code = '$order_code'";
            $cond_info = "$table_order_details.order_code = '$order_code'";
            $data['order_details'] = $customermodel->list_order_details($table_product,$table_order_details,$cond);
            $data['order_info'] = $customermodel->list_info($table_order_details,$cond_info);

            $data['abc'] = $customermodel->customer_info_ordercode($table_order,$order_code);
        

            $this->load->view('header',$data);       
            $this->load->view('checkout',$data);
            $this->load->view('footer');
        }     
       
        public function huydonhang($order_code){
      
          
            $customermodel = $this->load->model('customermodel'); 
            $table_order = "tbl_order";
            $table_order_details = "tbl_order_details";

            $data['list_info_order'] = $customermodel->list_info_order($table_order,$order_code); 
          foreach($data['list_info_order'] as $key => $value){
              $value['order_userid'];
          }
       $order_id = $value['order_userid'];
            $data = $customermodel->deleteorder($table_order_details,$order_code);
            $data = $customermodel ->deleteorder_details($table_order,$order_code);
              
            if($data==1){
                $message['msg'] = "Hủy Đơn Hàng Thành Công";
                header('Location:'.BASE_URL."/customer/info/".$order_id."?msg=".urlencode(serialize($message)));
            }else{
                $message['msg'] = "Hủy Đơn Hàng Thất Bại";
                header('Location:'.BASE_URL."/customer/info/".$order_id."?msg=".urlencode(serialize($message)));
            }
          
        }
     
        
        public function update($order_userid){
    
            $table_admin = "tbl_accounts";
 
            $customermodel = $this->load->model('customermodel');

            $data['customer_select'] = $customermodel->customer_info_admin($table_admin,$order_userid); 

        if ( isset($_POST['update_info'])){
            $name = $_POST['txtHoTen'];
            $dt = $_POST['txtDienThoai'];
            $dc = $_POST['txtDiaChi'];
          
            $email = $_POST['txtEmail'];
            $data = array(
                'fullname' => $name,
                'phone'=> $dt,
                'address' => $dc,
                'email'=> $email
            );
            $cond = "tbl_accounts.accounts_id='$order_userid'";
            $result = $customermodel->updateinfo($table_admin,$data,$cond);
            if($result==1){
                $message['msg'] = "Cập nhật sản phẩm thành công";
                header('Location:'.BASE_URL."/customer/update/".$order_userid."?msg=".urlencode(serialize($message)));
            }else{
                $message['msg'] = "Cập nhật phẩm thất bại";
                header('Location:'.BASE_URL."/customer/update/".$order_userid."?msg=".urlencode(serialize($message)));
            }
            }   
            $this->load->view('header');       
            $this->load->view('update',$data);
            $this->load->view('footer');
        
        }
   
   
   
   
    }
?>