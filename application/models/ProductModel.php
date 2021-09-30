<?php
    class ProductModel extends CI_Model{
        //view Contacts
        public function view()
        {
            $query=$this->db->query('select * from es_products where Quantity>0');
            return $query->result();
        }

        public function relatedpro($sellid)
        {
            $query=$this->db->query("SELECT * from es_products where supplier_FID='$sellid' ORDER BY Id DESC");
            return $query->result();
        }

        public function add_visits($visitor_ip)
        {
            $query=$this->db->query("SELECT * from es_visits where ip_addr='$visitor_ip' ORDER BY id DESC LIMIT 1");
            if($query->num_rows() > 0)
            {
                return;
            }
            else {
                $query=$this->db->query("SELECT * from es_visits where ip_addr='$visitor_ip'");
                if($query->num_rows() > 0){
                    $data=array(
                        "unique_visits" => 0,
                        "ip_addr" => $visitor_ip
                    );
                    $this->db->insert('es_visits',$data);
                }
                else {
                    $data=array(
                        "unique_visits" => 1,
                        "ip_addr" => $visitor_ip
                    );
                    $this->db->insert('es_visits',$data);
                }
                
            }
        }

        public function viewlist($page)
        {
            $limit=10;
            $start=($page-1) * $limit;
            $query=$this->db->query("select * from es_products where Quantity>0 LIMIT $start, $limit");
            return $query->result();
        }
        public function search($search, $page)
        {
            $limit=10;
            $start=($page-1) * $limit;
            $query=$this->db->query("select * from es_products where Name='$search' LIMIT $start, $limit");
            return $query->result();
        }
        public function viewcat($category, $page)
        {
            $limit=10;
            $start=($page-1) * $limit;
            $query=$this->db->query("select * from es_products WHERE Category='$category' LIMIT $start, $limit");
            return $query->result();
        }

        public function vieworder()
        {
            $query=$this->db->query("select * from es_products ORDER BY Id Desc");
            return $query->result();
        }

        public function featured($page)
        {
            $limit=10;
            $start=($page-1) * $limit;
            $query=$this->db->query("select * from es_products where featured=1 LIMIT $start, $limit");
            return $query->result();
        }

        public function bestsell()
        {
            $query=$this->db->query("SELECT product_id, SUM(quantity) AS TotalQuantity
            FROM es_order_details
            GROUP BY product_id
            ORDER BY SUM(quantity) DESC");
            return $query->result();
        }

        public function count()
        {
            $query=$this->db->query("select count(Id) AS Id from es_products");
            $count=$query->result();
            $total=$count[0]->Id;
            $pages=ceil($total/10);
            return $pages;
        }

        public function countsearch($search)
        {
            $query=$this->db->query("select count(Id) AS Id from es_products where Name='$search'");
            $count=$query->result();
            $total=$count[0]->Id;
            $pages=ceil($total/10);
            return $pages;
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
        public function update($id, $name, $desc, $cat, $pprice, $sprice, $img)
        {
            $query=$this->db->query("update es_products set Name='$name', Description='$desc', Category='$cat', PurchasePrice='$pprice', SalePrice='$sprice', Image='$img' where Id='".$id."'");
            return $query;
        }

        public function adjustqty($quantity, $id)
        {
            $query=$this->db->query("UPDATE es_products set Quantity='$quantity' where Id='".$id."'");
            return $query;
        }

        public function feature($id)
        {
            $query=$this->db->query("UPDATE es_products set featured=1 where Id='".$id."'");
            return $query;
        }

        public function unfeature($id)
        {
            $query=$this->db->query("UPDATE es_products set featured=0 where Id='".$id."'");
            return $query;
        }


        //Delete Contact
        public function Delete($id)
        {
            return $this->db->query("Delete from es_products where Id='".$id."'");
        }
    }