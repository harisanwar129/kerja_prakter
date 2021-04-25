<?php
class Sale_m extends CI_Model
{

	function invoice_no()
	{
		$query = $this->db->query("SELECT MAX(MID(invoice,9,4)) AS invoice_no 
		FROM penjualan WHERE MID(invoice,3,6) = DATE_FORMAT(CURDATE(),'%y%m%d')");
		if ($query->num_rows() > 0) {
			$r = $query->row();
			$n = ((int)$r->invoice_no) + 1;
			$no = sprintf("%'.04d", $n);
		} else {
			$no = "0001";
		}
		$invoice = "SJ" . date('ymd') . $no;
		return $invoice;
	}

	public function get_cart($cart_id = null, $item_id = null)
	{
		$this->db->select('*, p_item.name as item_name, transaksi.price as cart_price');
		$this->db->from('transaksi');
		$this->db->join('p_item', 'transaksi.item_id = p_item.item_id');
		$this->db->join('satuan', 'p_item.unit_id = satuan.unit_id');
		if ($cart_id != null) {
			$this->db->where('card_id', $cart_id);
		}
		if ($item_id != null) {
			$this->db->where('transaksi.item_id', $item_id);
		}
		$this->db->where('user_id', $this->session->userdata('userid'));
		$query = $this->db->get();
		return $query;
	}

	public function add_cart($data)
	{
		$query = $this->db->query("SELECT MAX(cart_id) AS cart_no FROM transaksi");
		if ($query->num_rows() > 0) {
			$r = $query->row();
			$cart_no = ((int)$r->cart_no) + 1;
		} else {
			$cart_no = "1";
		}

		$params = array(
			'cart_id' => $cart_no,
			'item_id' => $data['item_id'],
			'price' => $data['price'],
			'discount_item' => 0,
			'qty' => $data['qty'],
			'total' => $data['price'] * $data['qty'],
			'user_id' => $this->session->userdata('userid')
		);
		$this->db->insert('transaksi', $params);
	}

	public function update_cart_qty($data)
	{
		$sql = "UPDATE transaksi 
			SET price = '$data[price]', 
			qty = qty + '$data[qty]', 
			total = '$data[price]' * qty 
			WHERE item_id = '$data[item_id]'";
		$this->db->query($sql);
	}

	public function edit_cart($data)
	{
		$params = array(
			'price' => $data['price'],
			'qty' => $data['qty'],
			'discount_item' => $data['discount'],
			'total' => $data['total'],
			'updated' => date('Y-m-d H:i:s')
		);
		$this->db->where('cart_id', $data['cart_id']);
		$this->db->update('transaksi', $params);
	}

	public function del_cart($cart_id = null, $user_id = null)
	{
		if ($cart_id != null) {
			$this->db->where('cart_id', $cart_id);
		}
		if ($user_id != null) {
			$this->db->where('user_id', $user_id);
		}
		$this->db->delete('transaksi');
	}

	public function add_sale($data)
	{
		$params = array(
			'invoice' => $this->invoice_no(),
			'customer_id' => $data['customer_id'] == "" ? null : $data['customer_id'],
			'total_price' => $data['subtotal'],
			'discount' => $data['discount'],
			'final_price' => $data['grandtotal'],
			'cash' => $data['cash'],
			'change' => $data['change'],
			'note' => $data['note'],
			'date' => $data['date'],
			'user_id' => $this->session->userdata('userid')
		);
		$this->db->insert('penjualan', $params);
		return $this->db->insert_id();
	}
	public function add_sale_detail($params)
	{
		$this->db->insert_batch('t_sale_detail', $params);
	}


	public function get_sale($id = null)
	{
		$this->db->select('*, customer.name as customer_name, user.username as user_name, penjualan.created as sale_created');
		$this->db->from('penjualan');
		$this->db->join('customer', 'penjualan.customer_id = customer.customer_id', 'left');
		$this->db->join('user', 'penjualan.user_id = user.user_id');
		if ($id != null) {
			$this->db->where('sale_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}
	public function get_sale_detail($sale_id = null)
	{
		$this->db->from('t_sale_detail');
		$this->db->join('p_item', 't_sale_detail.item_id = p_item.item_id');
		if ($sale_id != null) {
			$this->db->where('t_sale_detail.sale_id', $sale_id);
		}
		$query = $this->db->get();
		return $query;
	}

	function get_sale_pagination($limit = null, $start = null)
	{
		$post = $this->session->userdata('search');
		$this->db->select('*, customer.name as customer_name, user.username as user_name, penjualan.created as sale_created');
		$this->db->from('penjualan');
		$this->db->join('customer', 'penjualan.customer_id = customer.customer_id', 'left');
		$this->db->join('user', 'penjualan.user_id = user.user_id');
		if (!empty($post['date1']) && !empty($post['date2'])) {
			$this->db->where("penjualan.date BETWEEN '" . db_date($post['date1']) . "' AND '" . db_date($post['date2']) . "'");
		}
		if (!empty($post['customer'])) {
			if ($post['customer'] == 'null') {
				$this->db->where("penjualan.customer_id IS NULL");
			} else {
				$this->db->where("penjualan.customer_id", $post['customer']);
			}
		}
		if (!empty($post['invoice'])) {
			$this->db->like("invoice", $post['invoice']);
		}
		$this->db->limit($limit, $start);
		$this->db->order_by('penjualan.created', 'desc');
		$query = $this->db->get();
		return $query;
	}

	public function del_sale($id)
	{
		$this->db->where('sale_id', $id);
		$this->db->delete('penjualan');
	}
}
