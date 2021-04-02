<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item extends CI_Controller
{

	var $title = "items";

	function __construct()
	{
		parent::__construct();
		check_login_session();
		$this->load->model('item_m', 'item');
	}

	public function index()
	{
		$data['title'] = $this->title;
		$data['row'] = $this->item->get()->result();
		$this->template->load('_template', 'product/item/item_data', $data);
	}

	public function add()
	{
		$item = new stdClass();
		$item->item_id = null;
		$item->name = null;
		$item->barcode = null;
		$item->price = null;

		$this->load->model('category_m', 'category');
		$query_ctg = $this->category->get();
		$category[null] = '- Pilih -';
		foreach ($query_ctg->result() as $ctg) {
			$category[$ctg->category_id] = $ctg->cname;
		}

		$this->load->model('unit_m', 'unit');
		$query_unt = $this->unit->get();
		$unit[null] = '- Pilih -';
		foreach ($query_unt->result() as $unt) {
			$unit[$unt->unit_id] = $unt->uname;
		}

		$data = array(
			'title' => $this->title,
			'page' => 'add',
			'row' => $item,
			'category' => $category, 'selectedcategory' => null,
			'unit' => $unit, 'selectedunit' => null
		);
		$this->template->load('_template', 'product/item/item_form', $data);
	}

	public function edit($id = null)
	{
		if ($id != null) {
			$query = $this->item->get($id);
			if ($query->num_rows() > 0) {
				$item = $query->row();

				$this->load->model('category_m', 'category');
				$query_ctg = $this->category->get();
				$category[null] = '- Pilih -';
				foreach ($query_ctg->result() as $ctg) {
					$category[$ctg->category_id] = $ctg->cname;
				}

				$this->load->model('unit_m', 'unit');
				$query_unt = $this->unit->get();
				$unit[null] = '- Pilih -';
				foreach ($query_unt->result() as $unt) {
					$unit[$unt->unit_id] = $unt->uname;
				}

				$data = array(
					'title' => $this->title,
					'page' => 'edit',
					'row' => $item,
					'category' => $category, 'selectedcategory' => $item->category_id,
					'unit' => $unit, 'selectedunit' => $item->unit_id
				);
				$this->template->load('_template', 'product/item/item_form', $data);
			} else {
				echo "<script>alert('Data tidak ditemukan');
				window.location='" . site_url('item') . "';</script>";
			}
		} else {
			echo "<script>window.location='" . site_url('item') . "';</script>";
		}
	}

	public function process()
	{
		$data = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			if ($this->item->check_barcode($data['barcode'])->num_rows() > 0) {
				echo "<script>alert('Barcode ini sudah dipakai barang lain');
				window.location='" . site_url('item/add') . "';</script>";
			} else {
				$this->item->add($data);
				echo "<script>alert('Data berhasil disimpan');
				window.location='" . site_url('item') . "';</script>";
			}
		} else if (isset($_POST['edit'])) {
			if ($this->item->check_barcode($data['barcode'], $data['id'])->num_rows() > 0) {
				echo "<script>alert('Barcode ini sudah dipakai barang lain');
				window.location='" . site_url('item/edit/' . $data['id']) . "';</script>";
			} else {
				$this->item->edit($data);
				echo "<script>alert('Data berhasil disimpan');
				window.location='" . site_url('item') . "';</script>";
			}
		} else {
			redirect('item');
		}
	}

	public function del($id = null)
	{
		$this->item->del($id);

		if ($this->db->affected_rows() == 1) {
			echo "<script>alert('Data berhasil dihapus');
			window.location='" . site_url('item') . "';</script>";
		} else {
			echo "<script>window.location='" . site_url('item') . "';</script>";
		}
	}
}
