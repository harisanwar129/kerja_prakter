<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
{

	var $title = "units";

	function __construct()
	{
		parent::__construct();
		check_login_session();
		$this->load->model('unit_m', 'unit');
	}

	public function index()
	{
		$data['title'] = $this->title;
		$data['row'] = $this->unit->get()->result();
		$this->template->load('_template', 'product/unit/unit_data', $data);
	}

	public function add()
	{
		$unit = new stdClass();
		$unit->unit_id = null;
		$unit->uname = null;
		$data = array(
			'title' => $this->title,
			'page' => 'add',
			'row' => $unit
		);
		$this->template->load('_template', 'product/unit/unit_form', $data);
	}

	public function edit($id = null)
	{
		if ($id != null) {
			$query = $this->unit->get($id);
			if ($query->num_rows() > 0) {
				$unit = $query->row();
				$data = array(
					'title' => $this->title,
					'page' => 'edit',
					'row' => $unit
				);
				$this->template->load('_template', 'product/unit/unit_form', $data);
			} else {
				echo "<script>alert('Data tidak ditemukan');
				window.location='" . site_url('unit') . "';</script>";
			}
		} else {
			echo "<script>window.location='" . site_url('unit') . "';</script>";
		}
	}

	public function process()
	{
		if (isset($_POST['add'])) {
			$data = $this->input->post(null, TRUE);
			$this->unit->add($data);
		} else if (isset($_POST['edit'])) {
			$data = $this->input->post(null, TRUE);
			$this->unit->edit($data);
		}

		if ($this->db->affected_rows() == 1) {
			echo "<script>alert('Data berhasil disimpan');
			window.location='" . site_url('unit') . "';</script>";
		} else {
			redirect('unit');
		}
	}

	public function del($id = null)
	{
		$this->unit->del($id);

		if ($this->db->affected_rows() == 1) {
			echo "<script>alert('Data berhasil dihapus');
			window.location='" . site_url('unit') . "';</script>";
		} else {
			echo "<script>window.location='" . site_url('unit') . "';</script>";
		}
	}
}
