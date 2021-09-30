<?php
    class SupplierModel extends CI_Model{
        public function demo()
        {
            $query=$this->db->query("select * from es_supplier");
            return $query->result();
            return $data;
        }
        public function insertrec($data){
            return $this->db->insert('es_supplier',$data);
        }
        public function Delete($id)
        {
            return $this->db->query("Delete from es_supplier where Id='".$id."'");
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