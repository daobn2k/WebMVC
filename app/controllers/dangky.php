<?php
    class dangky extends DController{
        public function __construct(){
            $message = array();
            $data = array();
           
           parent::__construct();
        }
        public function index(){
            $this->dangky();
        }
        public function dangky(){
            $this->load->view('cpanel/dangky');
           
        }
      public function  themtaikhoan(){
       
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $fullname = $_POST['fullname'];
        $address = $_POST['address'];
        $role = $_POST['role'];
        $table = "tbl_accounts";
        $data = array(
            'username' => $username,
            'password'=> $password,
            'fullname' => $fullname,
            'email' => $email,
            'phone'=> $phone,
            'address'=> $address,
            'role' => $role,
        );
        $dangkymodel = $this->load->model('dangkymodel');
        $result = $dangkymodel->insertproduct($table,$data);
      
        if($result==1){
            $message['msg'] = "Thêm Tài Khoản thành công";
            header('Location:'.BASE_URL."/login/login?msg=".urlencode(serialize($message)));
        }else{
            $message['msg'] = "Thêm Tài Khoản thất bại";
            header('Location:'.BASE_URL."/dangky/dangky?msg=".urlencode(serialize($message)));
        }
    }
    }
?>