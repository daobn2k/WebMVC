<?php
    class loginmodel extends DModel{
        public function __construct(){
           parent::__construct();
        }
        public function login($table_admin,$username,$password){
            $sql = "SELECT * FROM $table_admin WHERE username=? AND password=? ";
            return $this->db->affectedRows($sql,$username,$password);       
        }
        public function getlogin($table_admin,$username,$password){
            $sql = "SELECT * FROM $table_admin WHERE username=? AND password=? ";
            return $this->db->selectUser($sql,$username,$password);    
        }
        public function checklogin($table_admin){
            $sql = "SELECT * FROM $table_admin";
            return $this->db->affectedRows($sql);       
        }
    }
?>









  