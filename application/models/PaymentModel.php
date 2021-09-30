<?php
    class PaymentModel extends CI_Model{
        //view Contacts
        public function view()
        {
            $query=$this->db->query("select * from es_payment");
            return $query->result();
        }

        public function viewseller()
        {
            $query=$this->db->query("SELECT * from es_user WHERE Role='Seller' ORDER BY Id DESC");
            
            return $query->result();
        }

        public function viewproduct()
        {
            $query=$this->db->query("SELECT * from es_products ORDER BY Id DESC");
            
            return $query->result();
        }

        public function vieworder()
        {
            $query=$this->db->query("SELECT * from es_orders ORDER BY Id DESC");
            
            return $query->result();
        }

        public function vieworderdet()
        {
            $query=$this->db->query("SELECT * from es_order_details ORDER BY Id DESC");
            
            return $query->result();
        }

        //insert Contact
        public function record($data){
            return $this->db->insert('es_payment',$data);
        }
        //Edit Contact from ID
        public function Edit($id)
        {
            $query=$this->db->query("select * from es_payment where Id='".$id."'");
            return $query->result();
        }
        //Update Contacts
        public function update($id, $acname, $bname, $code, $add, $acn, $ibn)
        {
            $query=$this->db->query("update es_payment set BankName='$bname', Title='$acname', BranchCode='$code', BranchAddress='$add', AccountNumber='$acn', IBANNumber='$ibn' where Id='".$id."'");
            return $query;
        }
        //Delete Contact
        public function Delete($id)
        {
            return $this->db->query("Delete from es_payment where Id='".$id."'");
        }
    }