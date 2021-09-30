<?php
    class OrderModel extends CI_Model{
        public function view($id)
        {
            $query=$this->db->query("select * from es_wishlist WHERE user_id='$id'");
            return $query;
        }

        public function vieworder()
        {
            $query=$this->db->query("select * from es_orders");
            return $query->result();  
        }

        public function reviews()
        {
            $query=$this->db->query("select * from es_reviews");
            return $query->result();  
        }


        public function orderdet()
        {
            $query=$this->db->query("select * from es_order_details");
            return $query->result();  
        }

        public function viewprod()
        {
            $query=$this->db->query("select * from es_products");
            return $query->result();  
        }

        public function feedbacks()
        {
            $query=$this->db->query("select * from es_contacts");
            return $query->result();  
        }

        public function feedback($id)
        {
            $query=$this->db->query("select * from es_contacts where id='$id'");
            return $query->result();  
        }

        public function insert($data){
            $query= $this->db->insert('es_orders',$data);
            return $last_id=$this->db->insert_id();
        }

        public function insertdet($data){
            return $query= $this->db->insert('es_order_details',$data);
            
        }

        public function delete($id)
        {

            return $this->db->query("DELETE FROM es_wishlist WHERE id='$id'");
        }

        public function prodqty($id)
        {
            $query=$this->db->query("select * from es_order_details where order_fid='$id'");
            return $query->result();
        }

        public function deleteorder($id)
        {
            
            $this->db->query("DELETE FROM es_order_details WHERE order_fid='$id'");
            return $this->db->query("DELETE FROM es_orders WHERE id='$id'");
        }

        public function deleterev($id)
        {
            return $this->db->query("DELETE FROM es_reviews WHERE id='$id'");
        }

        public function getorder($id)
        {
            $query=$this->db->query("SELECT * from es_orders where customer_fid='".$id."' && remove=0 ORDER BY id DESC");
            return $query->result();
        }

        public function getdetail($order_id)
        {
            $query=$this->db->query("SELECT * from es_order_details where order_fid='".$order_id."' ORDER BY id DESC");
            return $query->result();
        }

        public function getpro($pro_id)
        {
            $query=$this->db->query("SELECT * from es_products where Id='".$pro_id."' ORDER BY Id DESC");
            return $query->result();
        }

        public function update($id)
        {
            return $query=$this->db->query("UPDATE es_orders SET status='approved' where id='".$id."'");
        }

        public function removeorder($id)
        {
            return $query=$this->db->query("UPDATE es_orders SET remove=1 where id='".$id."'");
        }

        public function recieveorder($id)
        {
            return $query=$this->db->query("UPDATE es_orders SET status='done' where id='".$id."'");
        }
    }



?>