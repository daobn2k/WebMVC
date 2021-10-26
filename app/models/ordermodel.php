<?php
    class ordermodel extends DModel{
        public function __construct(){
           parent::__construct();
        }
    public function insert_order($table_order,$data_order){
        return $this->db->insert($table_order,$data_order);
    }
    public function insert_order_details($table_order_details,$data_details){
        return $this->db->insert($table_order_details,$data_details);
    }
    public function list_order($table_order){
        $sql = "SELECT * FROM $table_order ORDER BY order_id DESC";
        return $this->db->select($sql);
    }

    public function list_order_user_id($table_order,$user_id){
        $sql = "SELECT * FROM $table_order WHERE $table_order.order_userid = $user_id";
        return $this->db->select($sql);
    }
    public function list_order_details_user_id($table_order_detail,$order_code){
        $sql = "SELECT * FROM $table_order_detail WHERE $table_order_detail.order_code = $order_code";
        return $this->db->select($sql);
    }

    public function list_product_by_id($table_product,$id){
        $sql = "SELECT * FROM $table_product WHERE $table_product.id_product = $id";
        return $this->db->select($sql);
    }
    public function list_order_details($table_product,$table_order_details,$cond){
        $sql = "SELECT * FROM $table_order_details,$table_product WHERE $cond";
        return $this->db->select($sql);
    }
    public function list_info($table_order_details,$cond_info){
        $sql = "SELECT * FROM $table_order_details WHERE $cond_info LIMIT 1";
        return $this->db->select($sql);
    }
    public function order_confirm($table_order,$data,$cond){
        return $this->db->update($table_order,$data,$cond);
    }

    public function list_info_order($table_order,$condd_info){
             $sql = "SELECT * FROM $table_order WHERE order_code = $condd_info";
             return $this->db->select($sql);
    }

    public function order_code($table_order,$order_userid){
        $sql = "SELECT order_code FROM $table_order WHERE order_userid = $order_userid";
        return $this->db->select($sql);
    }

    public function update_evalue($table_admin,$data,$cond){
        return $this->db->update($table_admin,$data,$cond);
    }

    // edit by so 1 Hug Vuog
    public function get_limit_order($table_order,$limit,$first_data_of_page)
    {
        $sql = "select * from $table_order limit $first_data_of_page,$limit";
        return $this->db->select($sql);
    }

    public function get_sale($table_sale,$id,$sale_code)
    {
        $sql = "SELECT * FROM $table_sale WHERE sale_user_id = $id and sale_code = '$sale_code'";

        return $this->db->select($sql);
    }

    public function delete_sale_code($table_sale,$cond)
    {
        return $this->db->delete($table_sale,$cond);
    }
}
?>