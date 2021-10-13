<?php
    class customermodel extends DModel{
        public function __construct(){
           parent::__construct();
        }
        public function updateinfo($table_admin,$data,$cond){
            return $this->db->update($table_admin,$data,$cond);
        }
        public function customer_info_admin($table_admin,$order_userid){
            $sql = "SELECT * FROM $table_admin WHERE accounts_id = $order_userid limit 1 ";
            return $this->db->select($sql);
        }
        public function accounts($table_admin){
            $sql = "SELECT * FROM $table_admin ";
            return $this->db->select($sql);
        }
        public function accounts_user($table_admin){
            $sql = "SELECT * FROM $table_admin WHERE tbl_accounts.role = 'user' ";
            return $this->db->select($sql);
        }


        public function accounts_admin($table_admin){
            $sql = "SELECT * FROM $table_admin WHERE tbl_accounts.role = 'admin' ";
            return $this->db->select($sql);
        }
        public function accountsinfo($table_admin,$cond){
            $sql = "SELECT * FROM $table_admin where $cond";
            return $this->db->select($sql);
        }


        public function deleteaccounts($table,$cond){
            return $this->db->delete($table,$cond);
        }

        public function category($table){
            $sql = "SELECT * FROM $table ORDER BY id_category_product DESC  ";
            return $this->db->select($sql);
        }   
        public function customer_info($table_order,$order_userid){
            $sql = "SELECT * FROM $table_order WHERE order_userid = $order_userid limit 1 ";
            return $this->db->select($sql);
    }

    public function customer_info_ordercode($table_order,$order_code){
        $sql = "SELECT * FROM $table_order WHERE order_code = $order_code  ";
        return $this->db->select($sql);
}
public function customer_select_code($table_order,$order_userid){
        $sql = "SELECT * FROM $table_order WHERE order_userid = $order_userid  ";
        return $this->db->select($sql);
}



public function list_order_details($table_product,$table_order_details,$cond){
    $sql = "SELECT * FROM $table_order_details,$table_product WHERE $cond";
    return $this->db->select($sql);
}
public function list_info($table_order_details,$cond_info){
    $sql = "SELECT * FROM $table_order_details WHERE $cond_info ";
    return $this->db->select($sql);
}
public function list_info_order($table_order,$order_code){
    $sql = "SELECT * FROM $table_order WHERE $order_code ";
    return $this->db->select($sql);
}
public function deleteorder_details($table_order_details,$order_code){
    return $this->db->delete($table_order_details,$order_code);
}
public function deleteorder($table_order,$order_code){
    return $this->db->delete($table_order,$order_code);
}

public function evalue($table){
    $sql = "SELECT * FROM $table";
    return $this->db->select($sql);
}

public function list_sale($table){
    $sql = "SELECT * FROM $table";
    return $this->db->select($sql);
}

}
?>
