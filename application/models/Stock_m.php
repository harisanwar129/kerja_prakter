<?php
class stock_m extends CI_Model
{

	var $table = "t_stock";

	public function get($id = null)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		if ($id != null) {
			$this->db->where('stock_id', $id);
		}
		// $this->db->order_by('stock_id', 'desc');
		$query = $this->db->get();
		return $query;
	}
	public function del($id)
	{
		$this->db->where('stock_id', $id);
		$this->db->delete($this->table);
	}


	public function get_stock_in()
	{
		$this->db->select('t_stock.stock_id, 
		p_item.barcode, 
		p_item.name as item_name, 
		qty, date, detail,
		supplier.name as supplier_name,
		p_item.item_id');
		$this->db->from($this->table);
		$this->db->join('p_item', 't_stock.item_id = p_item.item_id');
		$this->db->join('supplier', 't_stock.supplier_id = supplier.supplier_id', 'left');
		$this->db->where('type', 'in');
		$this->db->order_by('stock_id', 'desc');
		$query = $this->db->get();
		return $query;
	}
	public function add_stock_in($data)
	{
		$params = array(
			'item_id' => $data['item_id'],
			'type' => "in",
			'detail' => $data['detail'],
			'supplier_id' => $data['supplier'] == '' ? null : $data['supplier'],
			'qty' => $data['qty'],
			'date' => $data['date'],
			'user_id' => $this->session->userdata('userid')
		);
		$this->db->insert($this->table, $params);
	}


	public function get_stock($id = null)
	{
		$post = $this->session->userdata('search');
		$this->db->select('*, satuan.uname as satuan_uname,kategori.cname as category_cname, p_item.name as p_item_name');
		$this->db->from('p_item');
		$this->db->join('satuan', 'p_item.unit_id = satuan.unit_id');
		$this->db->join('kategori', 'p_item.category_id = kategori.category_id');


		$query = $this->db->get();
		return $query;
	}


	public function get_stock_detail($stock_id = null)
	{
		$this->db->from('stock_detail');
		$this->db->join('p_item', 'stock_detail.item_id = p_item.item_id');
		if ($stock_id != null) {
			$this->db->where('stock_detail.stock_id', $stock_id);
		}
		$query = $this->db->get();
		return $query;
	}







	function get_stock_pagination($limit = null, $start = null)
	{
		$post = $this->session->userdata('search');
		$this->db->select('*, satuan.uname as satuan_uname,kategori.cname as category_cname, p_item.name as p_item_name');
		$this->db->from('p_item');
		$this->db->join('satuan', 'p_item.unit_id = satuan.unit_id');
		$this->db->join('kategori', 'p_item.category_id = kategori.category_id');
		if (!empty($post['date1']) && !empty($post['date2'])) {
			$this->db->where("p_items.created BETWEEN '" . db_date($post['date1']) . "' AND '" . db_date($post['date2']) . "'");
		}
		if (!empty($post['kategori'])) {
			if ($post['kategori'] == 'null') {
				$this->db->where("p_item.category_id IS NULL");
			} else {
				$this->db->where("p_item.category_id", $post['kategori']);
			}
		}
		if (!empty($post['name'])) {
			$this->db->like("name", $post['name']);
		}
		$this->db->limit($limit, $start);
		$this->db->order_by('p_item.created', 'desc');
		$query = $this->db->get();
		return $query;
	}



	public function get_stock_out()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('p_item', 't_stock.item_id = p_item.item_id');
		$this->db->where('type', 'out');
		$this->db->order_by('stock_id', 'desc');
		$query = $this->db->get();
		return $query;
	}
	public function add_stock_out($data)
	{
		$params = array(
			'item_id' => $data['item_id'],
			'type' => "out",
			'detail' => $data['detail'],
			'qty' => $data['qty'],
			'date' => $data['date'],
			'user_id' => $this->session->userdata('userid')
		);
		$this->db->insert($this->table, $params);
	}
}
