<?php
    class dashbroadmodel extends DModel{
        public function __construct(){
           parent::__construct();
        }
    public function getall($table_order,$table_order_detail,$table_product){
       
        $sql = "SELECT * FROM $table_order,$table_order_detail,$table_product WHERE $table_order.order_code=$table_order_detail.order_code 
        AND $table_order_detail.product_id=$table_product.id_product";
        return $this->db->select($sql);
    }
    function get($table_order,$table_order_detail,$table_product,$date){
        $sql = "SELECT * FROM $table_order,$table_order_detail,$table_product WHERE  $table_order.order_date LIKE '%$date%'
            AND $table_order.order_code=$table_order_detail.order_code 
            AND $table_order_detail.product_id=$table_product.id_product";
        return $this->db->select($sql);
    }

    public function list_stock($stock){
        $sql = "SELECT * FROM $stock";
        return $this->db->select($sql);
    }
    public function list_order ($order){
        $sql = "SELECT * FROM $order";
        return $this->db->select($sql);
    }
    public function list_order_status ($order){
        $sql = "SELECT * FROM $order where order_status = 0 ";
        return $this->db->select($sql);
    }
    public function list_user($table){
            $sql = "SELECT * FROM $table WHERE  `role` = 'user' ";
            return $this->db->select($sql);  
    }
}  
?>