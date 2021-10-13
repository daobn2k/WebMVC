<?php 
class accounts extends DController{
    public function __construct(){
        Session::checkSession();
        parent::__construct();
    }
    public function index(){
           $this->accounts(); 
     }
    
     public function info_accounts(){
        $table_admin = "tbl_accounts";
        $customermodel = $this->load->model('customermodel');
        $data['accounts'] = $customermodel->accounts_admin($table_admin); 
        $this->load->view('cpanel/header');   
        $this->load->view('cpanel/menu');    
        $this->load->view('cpanel/accounts/info_accounts',$data);
        $this->load->view('cpanel/footer');
       }
       public function info_user(){
        $table_admin = "tbl_accounts";
        $customermodel = $this->load->model('customermodel');
        $data['accounts'] = $customermodel->accounts_user($table_admin); 

        $this->load->view('cpanel/header');   
        $this->load->view('cpanel/menu');    
        $this->load->view('cpanel/accounts/info_user',$data);
        $this->load->view('cpanel/footer');
       }
    public function delete_accounts($id){
        $table = "tbl_accounts";
        $cond = "accounts_id='$id'";
        $customermodel = $this->load->model('customermodel'); 
        $result = $customermodel->deleteaccounts($table,$cond);
echo "ĐÃ xóa thành công";
        if($result==1){
            $message['msg'] = "Xóa tài khoản thành công";
            header('Location:'.BASE_URL."/accounts/info_accounts?msg=".urlencode(serialize($message)));
        }else{
            $message['msg'] = "Xóa tài  khoản thất bại";
            header('Location:'.BASE_URL."/accounts/info_accounts?msg=".urlencode(serialize($message)));
        }
    }
    public function edit_accounts($id){
   
        $cond = "accounts_id='$id'";
        
        $table_admin = "tbl_accounts";
        $customermodel = $this->load->model('customermodel');
        $data['accounts'] = $customermodel->accountsinfo($table_admin,$cond); 
        $data['abc'] = $customermodel->accounts($table_admin); 


        if(isset($_POST['edit_button'])){
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        $data = array(
            'fullname' => $fullname,
            'phone'=> $phone,
            'address' => $address,
            'email'=> $email
        );
     
        $cond = "tbl_accounts.accounts_id='$id'";
        $result = $customermodel->updateinfo($table_admin,$data,$cond);
        if($result==1){
            $message['msg'] = "Cập nhật sản phẩm thành công";
            header('Location:'.BASE_URL."/accounts/info_accounts?msg=".urlencode(serialize($message)));
        }else{
            $message['msg'] = "Cập nhật phẩm thất bại";
            header('Location:'.BASE_URL."/accounts/info_accounts?msg=".urlencode(serialize($message)));
        }
        }  
     $this->load->view('cpanel/header');
    $this->load->view('cpanel/menu');
    $this->load->view('cpanel/accounts/edit_accounts',$data);
    $this->load->view('cpanel/footer');
      
    }


    public function add_accountsadmin(){
        $table_admin = "tbl_accounts";
        $customermodel = $this->load->model('customermodel');
        $data['accounts'] = $customermodel->accounts($table_admin); 
   
   
 if(isset($_POST['btn_dangky'])){
        
    
    
    $username = $_POST['username'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];

        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $fullname = $_POST['fullname'];
        $address = $_POST['address'];
        $role = $_POST['role'];
                        
                   if($repassword != $password){
                    $message['msg'] = "Vui Lòng Nhập Đúng Mật Khẩu";
                    header('Location:'.BASE_URL."/accounts/add_accountsadmin?msg=".urlencode(serialize($message)));
                    }else{
                    
                    $data = array(
                        'username' => $username,
                        'password'=> $password,
                        'fullname' => $fullname,
                        'email' => $email,
                        'phone'=> $phone,
                        'address'=> $address,
                        'role' => $role,
                    );
                
                    $table= "tbl_accounts";
                    $dangkymodel = $this->load->model('dangkymodel');
                    $result = $dangkymodel->insertproduct($table,$data);
                  
                    if($result==1){
                        $message['msg'] = "Thêm Tài Khoản thành công";
                        header('Location:'.BASE_URL."/accounts/info_accounts?msg=".urlencode(serialize($message)));
                    }else{
                        $message['msg'] = "Thêm Tài Khoản thất bại";
                        header('Location:'.BASE_URL."/accounts/add_accountsadmin?msg=".urlencode(serialize($message)));
                    }
                        }
            }
    $this->load->view('cpanel/header');
    $this->load->view('cpanel/menu');
    $this->load->view('cpanel/accounts/add_accountsadmin',$data);
    $this->load->view('cpanel/footer');
    
  }
 

  public function salecode(){
    $table = "sale_user";
    $table_admin = "tbl_accounts";;
    $customermodel = $this->load->model('customermodel');
    $data['list_sale'] = $customermodel->list_sale($table); 

    
    $this->load->view('cpanel/header');
    $this->load->view('cpanel/menu');
    $this->load->view('cpanel/accounts/salecode',$data);
    $this->load->view('cpanel/footer');
  }
}
?>