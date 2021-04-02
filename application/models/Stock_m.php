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


	function get_stock_pagination($limit = null, $start = null)
	{
		$post = $this->session->userdata('search');
		$this->db->select('*, p_item.name as p_item_name, p_unit.uname as p_unit_uname,p_category.cname as p_category_cname, t_stock.qty as t_stock_qty');
		$this->db->from('t_stock');
		$this->db->join('p_item', 't_stock.item_id = p_item.item_id');
		$this->db->join('p_unit', 't_stock.unit_id = p_unit.unit_id');
		$this->db->join('p_category', 't_stock.category_id = p_category.category_id');
		if (!empty($post['date1']) && !empty($post['date2'])) {
			$this->db->where("t_stock.date BETWEEN '" . db_date($post['date1']) . "' AND '" . db_date($post['date2']) . "'");
		}
		if (!empty($post['p_item'])) {
			if ($post['p_item'] == 'null') {
				$this->db->where("t_stock.item_id IS NULL");
			} else {
				$this->db->where("t_stock.item_id", $post['p_item']);
			}
		}
		if (!empty($post['date'])) {
			$this->db->like("date", $post['date']);
		}
		$this->db->limit($limit, $start);
		$this->db->order_by('t_stock.date', 'desc');
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
