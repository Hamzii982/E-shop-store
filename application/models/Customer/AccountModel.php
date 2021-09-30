<?php
    class AccountModel extends CI_Model{
        public function viewcustom($custom)
        {
            $query=$this->db->query("select * from es_user where Role='Customer' && Id='$custom'");
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