<?php
    class categorymodel extends DModel{
        public function __construct(){
           parent::__construct();
        }


        public function category($table){
            $sql = "SELECT * FROM $table ORDER BY id_category_product DESC";
            return $this->db->select($sql);
        }

        public function category_home($table){
                $sql = "SELECT * FROM $table ORDER BY id_category_product DESC";
                return $this->db->select($sql);    
        }
        public function categorybyid_home($table,$table_product,$id){
            $sql = "SELECT * FROM $table,$table_product WHERE $table.id_category_product=$table_product.id_category_product
            AND $table_product.id_category_product='$id' ORDER BY $table_product.id_product DESC  ";
            return $this->db->select($sql); 
        }
        public function categorybyid($table,$cond){
             $sql = "SELECT * FROM $table WHERE $cond";

            return $this->db->select($sql);
            
        }
        public function insertcategory($table_category_product,$data){
            return $this->db->insert($table_category_product,$data);
         
        }
       
        public function updatecategory($table_category_product,$data,$cond){
            return $this->db->update($table_category_product,$data,$cond);
        }
        public function deletecategory($table_category_product,$cond){
            return $this->db->delete($table_category_product,$cond);
        }
        
        public function list_product($table){
            $sql = " SELECT * FROM $table ";
            return $this->db->select($sql);    
        }
        public function list_product_search($table_product,$search_value){
            $sql = "SELECT * FROM $table_product WHERE title_product LIKE '$search_value%' ";
            return $this->db->select($sql);        
        }
        public function list_product_home($table_product){
            $sql = "SELECT * FROM $table_product ";
            return $this->db->select($sql);        
        }
        public function list_product_index($table_product){
            $sql = "SELECT * FROM $table_product ORDER BY $table_product.id_product DESC ";
            return $this->db->select($sql);        
        }
        public function insertproduct($table,$data){
            return $this->db->insert($table,$data);
        }
        public function product($table_product, $table_category){
            $sql = "SELECT * FROM $table_product,$table_category WHERE $table_product.id_category_product=$table_category.id_category_product
            ORDER BY $table_product.id_product DESC ";
            return $this->db->select($sql);        
        }
        public function deleteproduct($table_product,$cond){
            return $this->db->delete($table_product,$cond);
        }
        public function productbyid($table,$cond){
            $sql = "SELECT * FROM $table WHERE $cond";

           return $this->db->select($sql);
           
       }
       public function updateproduct($table_category_product,$data,$cond){
        return $this->db->update($table_category_product,$data,$cond);
    }
    public function details_product_home($table,$table_product,$cond){
        $sql = "SELECT * FROM $table_product,$table WHERE $cond";
        return $this->db->select($sql);
    }
    public function related_product_home($table_product){
        $sql = "SELECT * FROM $table_product  ORDER BY RAND() limit 4";
        return $this->db->select($sql);
    }



    public function get_user_id($table,$username){
        $sql = "SELECT * FROM $table  where $table.username = $username ";
        return $this->db->select($sql);
    }


    public function get_product_daily($table){
        $sql = "SELECT * FROM tbl_product ORDER BY RAND() LIMIT 5";
        return $this->db->select($sql);        
    }

    // edit by so 1 Hug Vug
    
    public function get_limit_page($table,$limit,$first_data_of_page)
    {
        $sql = "select * from $table limit $first_data_of_page,$limit";
        return $this->db->select($sql);
    }

    }
?>









  