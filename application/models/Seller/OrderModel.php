<?php
    class OrderModel extends CI_Model{
        //view Contacts
        public function view($seller)
        {
            $query=$this->db->query("select * from es_products where supplier_FID='$seller'");
            return $query->result();
        }
        //view Categories
        public function viewcat()
        {
            $query=$this->db->query("select * from es_order_details");
            return $query->result();
        }

        public function orderdetails($id)
        {
            $query=$this->db->query("select * from es_order_details WHERE order_fid='$id'");
            return $query->result();
        }

        public function reviews()
        {
            $query=$this->db->query("select * from es_reviews");
            return $query->result();  
        }

        public function orderv()
        {
            $query=$this->db->query("select * from es_orders");
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
        public function deliver($id)
        {
            $query=$this->db->query("UPDATE es_order_details SET status=1 where id='".$id."'");
            return $query;
        }

        public function delivered($id)
        {
            $query=$this->db->query("UPDATE es_orders SET status='delivered' where id=$id");
            return $query;
        }

        //Delete Contact
        public function Delete($id)
        {
            return $this->db->query("Delete from es_products where Id='".$id."'");
        }
    }