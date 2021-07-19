<?php
    class sanpham extends DController{
        public function __construct(){
            $data = array();
           parent::__construct();
        }
        public function index(){
           
            $this->danhmuc();
        }
        public function tatca(){
            Session::init();
            $table = 'tbl_category_product'; 
            $table_product = 'tbl_product';  
            $categorymodel = $this->load->model('categorymodel');
            $data['category'] = $categorymodel->category_home($table); 
            $data['list_product'] = $categorymodel->list_product_home($table_product); 

            $this->load->view('header',$data);   
            $this->load->view('list_product',$data);
            $this->load->view('footer');
        }
        public function danhmuc($id){
            $table = 'tbl_category_product'; 
            $table_product = 'tbl_product';  
            $categorymodel = $this->load->model('categorymodel');
            $data['category'] = $categorymodel->category_home($table); 
            $data['category_by_id'] = $categorymodel->categorybyid_home($table,$table_product,$id); 

            $this->load->view('header',$data);   
            $this->load->view('categoryproduct',$data);
            $this->load->view('footer');
        }
        
        public function chitietsanpham($id){
            Session::init();
            $table = 'tbl_category_product'; 
            $table_product = 'tbl_product';  
            $cond = "$table_product.id_category_product=$table.id_category_product AND $table_product.id_product='$id'";
           
            $categorymodel = $this->load->model('categorymodel');
            $data['category'] = $categorymodel->category_home($table); 
            $data['details_product'] = $categorymodel->details_product_home($table,$table_product,$cond); 

            foreach($data['details_product'] as $key => $cate){
                $id_cate = $cate['id_category_product'];
            }
            // $cond_related = "$table_product.id_category_product=$table.id_category_product AND $table.id_category_product = '$id_cate' AND $table_product.id_product NOT IN('$id')";
         
            $data['related'] = $categorymodel->related_product_home($table_product); 
         
            $this->load->view('header',$data);       
            $this->load->view('details_product',$data);
            $this->load->view('footer');
        }
        

     
        
        
    }
?>