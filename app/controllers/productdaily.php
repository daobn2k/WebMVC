<?php
    class productdaily extends DController{
        public function __construct(){
           parent::__construct();
        }
        public function index(){
            Session::init();
        }


        public function list_productdaily(){
            $this->load->view('cpanel/header');
           $this->load->view('cpanel/menu');
            
           $table_product = "tbl_product";
           $table_category = "tbl_category_product";

           $categorymodel = $this->load->model('categorymodel'); 
           $data['product'] = $categorymodel->product($table_product, $table_category);
           $this->load->view('cpanel/productdaily/list_productdaily', $data);
           $this->load->view('cpanel/footer');
       }


      
        public function add_productdaily(){
            $this->load->view('cpanel/header');
            $this->load->view('cpanel/menu');
            $table = "tbl_product"; 
            $categorymodel = $this->load->model('categorymodel');
            $data['list_product_home'] = $categorymodel->list_product_home($table);
            $this->load->view('cpanel/productdaily/add_productdaily',$data);
            $this->load->view('cpanel/footer');
        }
        
    //     public function insert_productdaily(){
    //     $title = $_POST['title_productdaily'];
    //     $desc = $_POST['desc_productdaily'];
    //     $price = $_POST['price_productdaily'];
    //     $hot = $_POST['productdaily_hot'];
    //     $quantity = $_POST['quantity_productdaily'];

    //     $image = $_FILES['image_productdaily']['name'];
    //     $tmp_image = $_FILES['image_productdaily']['tmp_name'];

    //     $div = explode('.', $image);
    //     $file_ext = strtolower(end($div));
    //     $unique_image = $div[0].'.'.$file_ext;

    //     $path_uploads = "public/uploads/productdaily".$unique_image;
    //     move_uploaded_file($tmp_image, $path_uploads);
    //     $category = $_POST['category_productdaily'];


    //     $table = "tbl_product";

    //     $data = array(
    //         'title_productdaily' => $title,
    //         'desc_productdaily'=> $desc,
    //         'quantity_productdaily' => $quantity,
    //         'price_productdaily'=> $price,
    //         'productdaily_hot'=> $hot,
    //         'image_productdaily' => $unique_image,
    //         'id_category_productdaily'=> $category
    //     );
    //     $categorymodel = $this->load->model('categorymodel');
    //     $result = $categorymodel->insertproductdaily($table,$data);
       
    //     if($result==1){
    //         $message['msg'] = "Thêm sản phẩm thành công";
    //         header('Location:'.BASE_URL."/productdaily/add_productdaily?msg=".urlencode(serialize($message)));
    //     }else{
    //         $message['msg'] = "Thêm sản phẩm thất bại";
    //         header('Location:'.BASE_URL."/productdaily/add_productdaily?msg=".urlencode(serialize($message)));
    //     }
    //     }
      
    
    //     public function delete_productdaily($id){
    //         $table = "tbl_product";
    //         $cond = "id_productdaily='$id'";
    //         $categorymodel = $this->load->model('categorymodel'); 
    //         $result = $categorymodel->deleteproductdaily($table,$cond);

    //         if($result==1){
    //             $message['msg'] = "Xóa sản phẩm thành công";
    //             header('Location:'.BASE_URL."/productdaily/list_productdaily?msg=".urlencode(serialize($message)));
    //         }else{
    //             $message['msg'] = "Xóa sản phẩm thất bại";
    //             header('Location:'.BASE_URL."/productdaily/list_productdaily?msg=".urlencode(serialize($message)));
    //         }
    //     }

    //     public function edit_productdaily($id){
    //         $table = "tbl_product";
    //         $table_category = "tbl_category_product";
    //         $cond = "id_productdaily='$id'";
    //         $categorymodel = $this->load->model('categorymodel'); 
    //         $data['productdailybyid'] = $categorymodel->productdailybyid($table,$cond);
    //         $data['category'] = $categorymodel->category($table_category);
    //         $this->load->view('cpanel/header');
    //         $this->load->view('cpanel/menu');
    //         $this->load->view('cpanel/productdaily/edit_productdaily',$data);
    //         $this->load->view('cpanel/footer');
    //     }


    //     public function update_productdaily($id){
    //         $title = $_POST['title_productdaily'];
    //         $desc = $_POST['desc_productdaily'];
    //         $price = $_POST['price_productdaily'];
    //         $hot = $_POST['productdaily_hot'];
    //         $quantity = $_POST['quantity_productdaily'];
    //         $category = $_POST['category_productdaily'];
    //         $image = $_FILES['image_productdaily']['name'];

    //         $tmp_image = $_FILES['image_productdaily']['tmp_name'];

    //         $categorymodel = $this->load->model('categorymodel');
    //         $table = "tbl_product";
            
    //         $div = explode('.', $image);
    //         $file_ext = strtolower(end($div));
    //         $unique_image = $div[0].'.'.$file_ext;
    
    //         $path_uploads = "public/uploads/productdaily".$unique_image;
    //         if($image){
    //             $cond = "id_productdaily='$id'";
    //             $data['productdailybyid'] = $categorymodel->productdailybyid($table,$cond);
    //             foreach ($data['productdailybyid'] as $key => $value) {
    //                     $path_unlink ="public/uploads/productdaily";
    //                     unlink( $path_unlink.$value['image_productdaily']);
        
    //             }
               
    //             $data = array(
    //                 'title_productdaily' => $title,
    //                 'desc_productdaily'=> $desc,
    //                 'quantity_productdaily' => $quantity,
    //                 'price_productdaily'=> $price,
    //                 'productdaily_hot' => $hot,
    //                 'image_productdaily' => $unique_image,
    //                 'id_category_productdaily'=> $category
    //             );
    //             move_uploaded_file($tmp_image, $path_uploads);
    //         }else{
    //             $data = array(
    //                 'title_productdaily' => $title,
    //                 'desc_productdaily'=> $desc,
    //                 'quantity_productdaily' => $quantity,
    //                 'price_productdaily'=> $price,
    //                 'productdaily_hot' => $hot,
    //                 //'image_productdaily' => $unique_image,
    //                 'id_category_productdaily'=> $category
    //             );
    //         }
    //         $result = $categorymodel->updateproductdaily($table,$data,$cond);
    //         if($result==1){
    //             $message['msg'] = "Cập nhật sản phẩm thành công";
    //             header('Location:'.BASE_URL."/productdaily/list_productdaily?msg=".urlencode(serialize($message)));
    //         }else{
    //             $message['msg'] = "Cập nhật phẩm thất bại";
    //             header('Location:'.BASE_URL."/productdaily/list_productdaily?msg=".urlencode(serialize($message)));
    //         }
    //         }
       
    }
?>