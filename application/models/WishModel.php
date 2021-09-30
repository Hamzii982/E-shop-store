<?php
    class WishModel extends CI_Model{
        public function view($id)
        {
            $query=$this->db->query("select * from es_wishlist WHERE user_id='$id'");
            return $query;
        }
        public function insert($data){
            return $this->db->insert('es_wishlist',$data);
        }

        public function newsletter($data){
            return $this->db->insert('es_newsletter',$data);
        }

        public function comment($data){
            return $this->db->insert('es_contacts',$data);
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