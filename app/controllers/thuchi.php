<?php
    class thuchi extends DController{
        public function __construct(){
           parent::__construct();
        }
        public function list(){
            $table_order = "tbl_order";
            $table_order_detail= "tbl_order_details";
            $table_product= "tbl_product";
            $format='d/m/Y';
            $thu=$this->load->model('thuchimodel');
            $date='01/01/1970';
            if(isset($_POST['submit'])){
                $date = $_POST['search'];
                // $date=dateFormat($format,$date);
                $date = date($format, strtotime($date));  
                //echo $date;
            }
           
            
            // echo $date;
            // $data['thu'] = $thu->get($table_order,$date);
            // print_r($data);
           
            if($date != '01/01/1970')
            {
                $data['thu'] = $thu->get($table_order,$table_order_detail,$table_product,$date);
                $this->load->view('cpanel/header');   
                $this->load->view('cpanel/menu');    
                $this->load->view('cpanel/thuchi/thu',$data);
                $this->load->view('cpanel/footer');
            }
            else{
                $data['thu'] = $thu->getall($table_order,$table_order_detail,$table_product);
                $this->load->view('cpanel/header');   
                $this->load->view('cpanel/menu');    
                $this->load->view('cpanel/thuchi/thu',$data);
                $this->load->view('cpanel/footer');
            }                
        }
    }
?>