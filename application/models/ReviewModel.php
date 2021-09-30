<?php
    class ReviewModel extends CI_Model{
        public function view($id)
        {
            $query=$this->db->query("select * from es_reviews WHERE product_id='$id'");
            // print_r($query->conn_id->affected_rows);
            // exit();
            return $query;
        }
        public function viewr()
        {
            $query=$this->db->query("select * from es_reviews");
            // print_r($query->conn_id->affected_rows);
            // exit();
            return $query->result();
        }
        public function insert($data){
            return $this->db->insert('es_reviews',$data);
        }
        public function delete($id)
        {
            return $this->db->query("DELETE FROM es_wishlist WHERE id='$id'");
        }
        public function Edit($id)
        {
            $query=$this->db->query("select * from es_supplier where Id='".$id."'");
            return $query->result();
        }
        public function update($id,$name, $add, $phone)
        {
            $query=$this->db->query("update es_supplier set Name='$name', Address='$add', Phone='$phone' where Id='".$id."'");
        }
    }



?>