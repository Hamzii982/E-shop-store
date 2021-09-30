<?php
    class LoginModel extends CI_Model{
        public function log($email)
        {
            $query=$this->db->query("Select Password from es_user where Email='$email'");
            $data = $query->row();
            if($data)
            {
            foreach($data as $row)
            {
                return $row;
            } 
            }

        }
        public function login($email,$uin)
        {
            $query=$this->db->query("Select * from es_user where Email='$email' && Password='$uin' ");
            if($query->num_rows())
            {
                
                return $query->result();
            }
            else
            {
                return "false";
            }

        }

        public function changepass($id)
        {
            $query=$this->db->query("Select Password from es_user where Id='$id'");
            $data = $query->row();
            if($data)
            {
            foreach($data as $row)
            {
                return $row;
            } 
            }
        }
        public function insertuser($data){
            $query=$this->db->query("Select * from es_user where Email='$data[Email]'");
            if($query->num_rows())
            {
                return false;
            }
            else{
            return $this->db->insert('es_user',$data);
            }
        }
        public function verify($email)
        {
            $query=$this->db->query("update es_user set Verify=1 where Email='$email'");
            if($query)
            {
                echo "Account Verified Successfully.<br>";
                echo "<a href=".base_url('seller/login').">Click this link to Login Page</a>";
            }
            else{
                echo "Error While Verifying.";
            }
        }

        public function updateprofile($id,$fname, $lname, $email, $mobile, $address)
        {
            return $query=$this->db->query("UPDATE es_user SET FirstName='$fname', LastName='$lname', Mobile='$mobile', Email='$email', Address='$address' WHERE Id='".$id."'");
        }

        public function newpassword($id, $pass)
        {
            return $query=$this->db->query("UPDATE es_user SET Password='$pass' WHERE Id='".$id."'");
        }

    }
?>