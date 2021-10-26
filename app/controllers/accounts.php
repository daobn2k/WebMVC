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

  public function newsale(){
    $table = "sale_user";
    $table_admin = "tbl_accounts";
    $customermodel = $this->load->model('customermodel');
    $data['list_sale'] = $customermodel->list_sale($table); 
    $data['accounts'] = $customermodel->accounts($table_admin);
    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
    if(isset($_GET['delete_id'])){
        $id =$_GET['delete_id'];
        $data= $customermodel ->deletesalecode($table,$id); 
        if($data==1){
            $message['msg'] = "Xóa Mã Code Thành Công";
            header('Location:'.BASE_URL."/accounts/salecode/".$id."?msg=".urlencode(serialize($message)));
        }else{
            $message['msg'] = "Xóa Mã Code Thất Bại";
            header('Location:'.BASE_URL."/accounts/salecode/".$id."?msg=".urlencode(serialize($message)));
        }
    }
     if(isset($_POST['addnewsale'])){
          $sale_user_id =$_POST['sale_user_id'];
          $sale = $_POST['sale'];
          $status = 1;    
          $sale_code = rand(0,9999).substr(str_shuffle($permitted_chars), 0, 10);
          $start_date = $_POST['start'];
          $start_end = $_POST['end'];
          if($start_date !== '' && $start_end !== '' && $sale_user_id && $sale !== ''){
            $data = array(
                'sale_user_id' => $sale_user_id,
                'sale_code'=> $sale_code,
                'sale' => $sale,
                'sale_start'=> $start_date,
                'sale_end'=> $start_end,
                'status' => $status,
            );
            
         
            $result = $customermodel->insert_sale_code($table,$data);
          var_dump($result);
            if($result==1){
             
          header('Location:'.BASE_URL."/login/login?msg=".urlencode(serialize($message)));
           
          $data['customer_info_admin'] = $customermodel->accounts($table_admin,$sale_user_id);
  
          $name =  $data['customer_info_admin'][0]['username'];
          $email =   $data['customer_info_admin'][0]['email'];
          
          $subject = "Ưu đãi siêu may mắn cho khách hàng thân thiện ";
          $content = "Khách Hàng may mắn: ".$name."<br>"."code: ". $sale_code."<br>"."Từ ngày".$start_date."-Đến Ngày".$start_end."<br>"."<br>"."Thân gửi quý khách nhân dịp siêu ưu đãi ^^ hãy sử dụng mã code phía trên để được nhận ưu đãi ";
          include 'PHPMailer/PHPMailer.php';
          include 'PHPMailer/SMTP.php';
          include 'PHPMailer/Exception.php';
          
          $mail = new PHPMailer\PHPMailer\PHPMailer;       
           //Server settings
          $mail->isSMTP();                                      // Set mailer to use SMTP
          $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
          $mail->SMTPAuth = true;                               // Enable SMTP authentication
          $mail->Username = 'vvdao096@gmail.com';                 // SMTP username
          $mail->Password = 'vandao2k'; 
          $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
          $mail->Port = 587;                                    // TCP port to connect to
  
          //Recipients
          $mail->setFrom('vvdao096@gmail.com', 'Cửa Hàng Phân Nhánh EcoMart');
          $mail->addAddress('vvdao096@gmail.com', 'Quản Lý');
          $mail->isHTML(true);                                  // Set email format to HTML
          $mail->Subject = 'Tin nhắn đã được gửi thành công';
          $mail->Body    = "Event giảm giá cho khách hàng";
          $mail->CharSet="UTF-8";
          if ($mail->send()) {
              $mail->addAddress($email, 'Khách hàng');
              $mail->Subject = $subject;
              $mail->Body    = $content;
              $mail->send();
              $message['msg'] = "Mã sale code  tạo thành công và đã được gửi đi";
              header('Location:'.BASE_URL."/accounts/salecode?msg=".urlencode(serialize($message)));
          } 
          }else{
            $message['msg'] ='Làm ơn kiểm tra lại đi thiếu gì rồi';
          }
        }
  }


    $this->load->view('cpanel/header');
    $this->load->view('cpanel/menu');
    $this->load->view('cpanel/accounts/newsale',$data);
    $this->load->view('cpanel/footer');
  }

  public function mail(){
    $table = "tbl_accounts";
    $customermodel = $this->load->model('customermodel');
    $data['accounts_user'] = $customermodel->accounts_user($table); 

    if (isset($_POST['add_contact'])) {
        $name = $_POST['name'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
    
        if($name != ''){

          
        $data['customer_detail'] = $customermodel->customer_detail($table,$name); 

            $email =$data['customer_detail'][0]['email'];
            $content = "Họ tên: ".$name."<br>"."email: ".$email."<br>"."<br>"."Thân gửi: ".$message;
                
            include 'PHPMailer/PHPMailer.php';
            include 'PHPMailer/SMTP.php';
            include 'PHPMailer/Exception.php';
            
            $mail = new PHPMailer\PHPMailer\PHPMailer;       
             //Server settings
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'vvdao096@gmail.com';                 // SMTP username
            $mail->Password = 'vandao2k'; 
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
    
            //Recipients
            $mail->setFrom('vvdao096@gmail.com', 'Cửa Hàng Phân Nhánh EcoMart');
            $mail->addAddress('tovantiep2604@gmail.com', 'Quản Lý');
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Tin nhắn đã được gửi thành công';
            $mail->Body    = $content;
            $mail->CharSet="UTF-8";
            if ($mail->send()) {
                $mail->addAddress($email, 'Khách hàng');
                $mail->Subject = $subject;
                $mail->Body    = $message;
                $mail->send();
                $message['msg'] = "Tin nhắn đã được gửi đi";
                header('Location:'.BASE_URL."/accounts/salecode?msg=".urlencode(serialize($message)));
            } else {
                $message['msg'] = "Tin nhắn không được gửi đi";
                header('Location:'.BASE_URL."/accounts/salecode?msg=".urlencode(serialize($message)));
            }               
        }
        }
    $this->load->view('cpanel/header');
    $this->load->view('cpanel/menu');
    $this->load->view('cpanel/accounts/mail',$data);
    $this->load->view('cpanel/footer');
  }
}
?>