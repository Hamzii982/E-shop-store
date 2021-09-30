<?php
    class MyModel extends CI_Model{
        public function demo()
        {
            $query=$this->db->query("select * from es_user");
            return $query->result();
        }
        public function get_recent_orders()
        {
            $query=$this->db->query("SELECT * FROM es_orders ORDER BY id DESC LIMIT 10");
            return $query->result();
        }
        public function count_visits()
        {
            $query=$this->db->query("SELECT * FROM es_visits");
            return $query->result();
        }
        public function get_recent_reviews()
        {
            $query=$this->db->query("SELECT * FROM es_reviews ORDER BY id DESC LIMIT 3");
            return $query->result();
        }
        public function get_recent_products()
        {
            $query=$this->db->query("SELECT * FROM es_products ORDER BY id DESC LIMIT 7");
            return $query->result();
        }
        public function seller_products($sell_id)
        {
            $query=$this->db->query("SELECT * FROM es_products WHERE supplier_FID='$sell_id' ORDER BY id DESC");
            return $query->result();
        }
        public function seller_orders($sell_id)
        {
            $query=$this->db->query("SELECT * FROM es_order_details ORDER BY id DESC");
            return $query->result();
        }
        public function insertrec($data){
            return $this->db->insert('es_user',$data);
        }
        public function Delete($id)
        {
            return $this->db->query("Delete from es_user where Id='".$id."'");
        }
        public function Edit($id)
        {
            $query=$this->db->query("select * from es_user where Id='".$id."'");
            return $query->result();
        }
        public function update($id,$name, $email, $pass)
        {
            $query=$this->db->query("update es_user set Username='$name', Email='$email', Password='$pass' where Id='".$id."'");
        }
    }



?>