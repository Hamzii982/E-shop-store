<?php
    class categoryModel extends CI_Model{
        //view Contacts
        public function view()
        {
            $query=$this->db->query('select * from es_category');
            return $query->result();
        }
        //insert Contact
        public function record($data){
            return $this->db->insert('es_category',$data);
        }
        //Edit Contact from ID
        public function Edit($id)
        {
            $query=$this->db->query("select * from es_category where Id='".$id."'");
            return $query->result();
        }
        //Update Contacts
        public function update($id, $name)
        {
            $query=$this->db->query("update es_category set Name='$name' where Id='".$id."'");
            return $query;
        }
        //Delete Contact
        public function Delete($id)
        {
            return $this->db->query("Delete from es_category where Id='".$id."'");
        }
    }