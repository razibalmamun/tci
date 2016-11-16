<?php 

class M_data extends CI_Model{
	function data($number,$offset){
		return $query = $this->db->get('user',$number,$offset)->result();		
	}
 
	function jumlah_data(){
		return $this->db->get('user')->num_rows();
	}
	
	
	function sales_rpt(){
		$this->db->select("CONCAT(address.firstname,' ',address.lastname) AS `Name`,
		address.email AS Email, items.created_at AS Date, items.`name` AS Description,
		items.store_id AS Logon, items.`name` AS Category, items.store_id AS FeedbackDate,
		items.sku AS ProductSearchcode, items.order_id AS Orderref, orders.grand_total");

		$this->db->from("sales_flat_order AS orders");
		$this->db->join("sales_flat_order_item AS items", "items.order_id = orders.entity_id");
		$this->db->join("sales_flat_order_address AS address", "orders.entity_id = address.parent_id", "LEFT");
		$this->db->where("items.created_at BETWEEN  '2016-07-01' AND '2016-07-31'");
		$this->db->where("orders.status", "complete");

		$query = $this->db->get();
		$result = $query->result_array();
	}
}