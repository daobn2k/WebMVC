<?php
    class dangkymodel extends DModel{
        public function __construct(){
           parent::__construct();
        }
       
        public function insertproduct($table,$data){
            return $this->db->insert($table,$data);
        }
    }
?>









  