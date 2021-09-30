<?php
    class ProductModel extends CI_Model{
        //view Contacts
        public function view($seller)
        {
            $query=$this->db->query("select * from es_products where supplier_FID='$seller'");
            return $query->result();
        }
        //view Categories
        public function viewcat()
        {
            $query=$this->db->query("select * from es_category");
            return $query->result();
        }

        public function email()
        {
            $query=$this->db->query("select * from es_newsletter");
            return $query->result();
        }

        //insert Contact
        public function record($data){
            return $this->db->insert('es_products',$data);
        }
        //Edit Contact from ID
        public function Edit($id)
        {
            $query=$this->db->query("select * from es_products where Id='".$id."'");
            return $query->result();
        }
        //Update Contacts
        public function update($id, $name, $desc, $cat, $pprice, $sprice, $img, $qty)
        {
            $query=$this->db->query("update es_products set Name='$name', Description='$desc', Category='$cat', PurchasePrice='$pprice', SalePrice='$sprice', Quantity='$qty' , Image='$img' where Id='".$id."'");
            return $query;
        }

        


        //Delete Contact
        public function Delete($id)
        {
            return $this->db->query("Delete from es_products where Id='".$id."'");
        }
    }