<?php
    class index extends DController{
        public function __construct(){
            $data = array();
           parent::__construct();
        }
        public function index(){
            Session::init();
            $this->homepage();
        }
        public function homepage(){
            Session::init();
            $table = 'tbl_category_product';   
            $table_product = 'tbl_product';   
            $categorymodel = $this->load->model('categorymodel');
            $data['category'] = $categorymodel->category_home($table); 
            $data['product_home'] = $categorymodel->list_product_index($table_product); 

            $this->load->view('header',$data);       
            $this->load->view('home',$data);
            $this->load->view('footer');
       
        }     
        
        public function lienhe(){
            Session::init();
            $table = 'tbl_category_product';   
            $categorymodel = $this->load->model('categorymodel');
            $data['category'] = $categorymodel->category_home($table); 

            $this->load->view('header',$data);       
            $this->load->view('contact');
            $this->load->view('footer');
         if (isset($_POST['add_contact'])) {
            $name = $_POST['txtHoTen'];
            $dt = $_POST['txtDienThoai'];
            $dc = $_POST['txtDiaChi'];
            $email = $_POST['txtEmail'];
            $nd = $_POST['txtNoiDung'];
            $content = "Họ tên: ".$name."<br>"."sdt: ".$dt."<br>"."dịa chỉ: ".$dc."<br>"."email: ".$email."<br>"."nd: ".$nd;


                require 'PHPMailer/PHPMailer.php';
                require 'PHPMailer/SMTP.php';
                require 'PHPMailer/Exception.php';
                
                $mail = new PHPMailer\PHPMailer\PHPMailer;       
                 //Server settings
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'phpLop01@gmail.com';                 // SMTP username
                $mail->Password = 'kqlrdkzrgsmmomnm'; 
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('phpLop01@gmail.com', 'admin');
                $mail->addAddress('tovantiep2604@gmail.com', 'quản trị nhà hàng');
                
                $mail->isHTML(true);                                  // Set email format to HTML
                
                $mail->Subject = 'Có một khách đã phản hồi!';
                $mail->Body    = $content;
                $mail->CharSet="UTF-8";
                
                //for ($i = 0; $i < 100; $i++) {
                if ($mail->send()) {
                    //gửi mail cho khach hàng
                    $mail->addAddress($email, 'Khách hàng');
                    $mail->Subject = 'Phản Hồi ';
                    $mail->Body    = 'Bạn đã phản hồi thành công';
                    $mail->send();
                } else {
                    echo 'Tin nhắn không được gửi đi';
                }               
            }
        }  
    




     }  
?>