<?php
    class login extends DController{
        public function __construct(){
            $message = array();
            $data = array();
           
           parent::__construct();
        }
        public function index(){
            $this->login();
        }
        public function login(){

            Session::init();
        
            $this->load->view('cpanel/login');
       
        }
        public function dashboard(){
            Session::checkSession();
            
            $table_accounts = "tbl_accounts";
            $table_product = "tbl_product";
            $table_category_product ="tbl_category_product";
            $table_order = "tbl_order";
            $table_order_detail = "tbl_order_details";
            $tbl_stock = "tbl_stock";
            

            $dashbroadmodel = $this->load->model('dashbroadmodel');

            $data['list_user'] = $dashbroadmodel->list_user($table_accounts);
            $data['thu'] = $dashbroadmodel->getall($table_order,$table_order_detail,$table_product);
            $data['list_stock'] = $dashbroadmodel->list_stock($tbl_stock);
            $data['list_order']= $dashbroadmodel->list_order($table_order);
            $data['list_order_status']= $dashbroadmodel->list_order_status($table_order);
            $this->load->view('cpanel/header');
            $this->load->view('cpanel/menu');
            $this->load->view('cpanel/dashboard',$data);
            $this->load->view('cpanel/footer');
        }
       
        public function authentication_login(){
            $username = $_POST['username'];
            $password = $_POST['password']; 
            $table_admin = 'tbl_accounts';
            $loginmodel = $this->load->model('loginmodel');

            $count = $loginmodel->login($table_admin,$username,$password);
            $result = $loginmodel->getlogin($table_admin,$username,$password);
            if($count==0){
                $message['msg'] = "Tài Khoản hoặc mật khẩu sai, xin kiểm tra lại";
                header("Location:".BASE_URL."/login/login");
            }
            else{
               
                Session::init();
                Session::set('login',true);
                Session::set('username',$result[0]['username']);
                Session::set('fullname',$result[0]['fullname']);
                Session::set('userid',$result[0]['accounts_id']);     
                Session::set('email',$result[0]['email']);   
                Session::set('phone',$result[0]['phone']);     
                Session::set('address',$result[0]['address']);     
                Session::set('role',$result[0]['role']);   

             if($result[0]['role'] == 'admin'){
                header("Location:".BASE_URL."/login/dashboard");
             }else if ($result[0]['role'] == 'user'){
                header("Location:".BASE_URL);
             }else{
                header("Location:".BASE_URL."/login/login");
             }
        }
    }
        public function logout(){
            Session::init();
            Session::destroy();
            // unset($_SESSION['login']);
            header("Location:".BASE_URL."/login/login");
        }
        
    }
?>