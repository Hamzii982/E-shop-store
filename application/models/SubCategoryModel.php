<?php
    class SubCategoryModel extends CI_Model{
        //view Contacts
        public function view()
        {
            $query=$this->db->query('select * from es_sub_category');
            return $query->result();
        }
        public function viewcat()
        {
            $query=$this->db->query('select * from es_category');
            return $query->result();
        }
        //insert Contact
        public function record($data){
            return $this->db->insert('es_sub_category',$data);
        }
        //Edit Contact from ID
        public function Edit($id)
        {
            $query=$this->db->query("select * from es_sub_category where id='".$id."'");
            return $query->result();
        }
        //Update Contacts
        public function update($id, $name, $cname)
        {
            $query=$this->db->query("update es_sub_category set name='$name', category_fid='$cname' where id='".$id."'");
            return $query;
        }
        //Delete Contact
        public function Delete($id)
        {
            return $this->db->query("Delete from es_sub_category where id='".$id."'");
        }
    }