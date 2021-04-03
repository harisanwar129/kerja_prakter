<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sale extends CI_Controller
{

	var $title = "Sales";

	function __construct()
	{
		parent::__construct();
		check_login_session();
		$this->load->model('sale_m', 'sale');
	}

	public function index()
	{
		$this->load->model('customer_m', 'customer');
		$customer = $this->customer->get()->result();
		$this->load->model('item_m', 'item');
		$item = $this->item->get()->result();
		$data = array(
			'title' => $this->title,
			'page' => 'add',
			'customer' => $customer,
			'item' => $item,
			'cart' => $this->sale->get_cart(),
			'invoice' => $this->sale->invoice_no()
		);
		$this->template->load('_template', 'transaction/sale/sale_form', $data);
	}

	public function process()
	{
		if (isset($_POST['add_cart'])) {
			$data = $this->input->post(null, TRUE);
			$item_id = $this->input->post('item_id');

			if ($this->sale->get_cart(null, $item_id)->num_rows() > 0) {
				$this->sale->update_cart_qty($data);
			} else {
				$this->sale->add_cart($data);
			}

			if ($this->db->affected_rows() > 0) {
				$params = array("success" => true);
			} else {
				$params = array("success" => false);
			}
			echo json_encode($params);
		}

		if (isset($_POST['edit_cart'])) {
			$data = $this->input->post(null, TRUE);
			$this->sale->edit_cart($data);
			if ($this->db->affected_rows() > 0) {
				$params = array("success" => true);
			} else {
				$params = array("success" => false);
			}
			echo json_encode($params);
		}

		if (isset($_POST['process_payment'])) {
			$data = $this->input->post(null, TRUE);
			$sale_id = $this->sale->add_sale($data);

			$cart = $this->sale->get_cart()->result();
			$data2 = [];
			foreach ($cart as $c => $row) {
				array_push($data2, array(
					'sale_id' => $sale_id,
					'item_id' => $row->item_id,
					'price' => $row->price,
					'qty' => $row->qty,
					'discount_item' => $row->discount_item,
					'total' => $row->total,
				));
			}
			$this->sale->add_sale_detail($data2);

			$this->sale->del_cart(null, $this->session->userdata('userid'));

			if ($this->db->affected_rows() > 0) {
				$params = array("success" => true, "sale_id" => $sale_id);
			} else {
				$params = array("success" => false);
			}
			echo json_encode($params);
		}
	}

	public function cart_data()
	{
		$cart = $this->sale->get_cart();
		$data = array(
			'cart' => $cart
		);
		$this->load->view('transaction/sale/cart_data', $data);
	}

	public function cart_del()
	{
		$cart_id = $this->input->post('cart_id');
		if (isset($cart_id)) {
			$this->sale->del_cart($cart_id);
		} else {
			$this->sale->del_cart(null, $this->session->userdata('userid'));
		}

		if ($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function cetak($id)
	{
		$data = array(
			'sale' => $this->sale->get_sale($id)->row(),
			'sale_detail' => $this->sale->get_sale_detail($id)->result(),
		);
		$this->load->view('transaction/sale/receipt_print', $data);
	}

	public function del($id = null)
	{
		$this->sale->del_sale($id);

		if ($this->db->affected_rows() == 1) {
			echo "<script>alert('Data berhasil dihapus');
			window.location='" . site_url('report/sale') . "';</script>";
		} else {
			echo "<script><script>alert('Data gagal dihapus');
			window.location='" . site_url('report/sale') . "';</script>";
		}
	}
}
