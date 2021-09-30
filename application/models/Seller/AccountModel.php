<?php
    class AccountModel extends CI_Model{
        public function demo($seller)
        {
            $query=$this->db->query("select * from es_user where Role='Seller' && Id='$seller'");
            return $query->result();
            return $data;
        }

        public function login($email,$uin)
        {
            $query=$this->db->query("Select * from es_user where verify=2 && Email='$email' && Password='$uin' ");
            if($query->num_rows())
            {
                
                return $query->result();
            }
            else
            {
                return "false";
            }

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
        public function update($id,$name,$email,$add,$fname,$lname,$mobile,$about, $city, $country)
        {
            return $this->db->query("update es_user set Username='$name', Email='$email', FirstName='$fname', LastName='$lname', address='$add', Mobile='$mobile', city='$city', country='$country', About='$about' where Id='".$id."'");
        }
    }



?>