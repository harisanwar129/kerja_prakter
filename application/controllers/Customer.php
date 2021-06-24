<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	var $title = "customers";

	function __construct()
	{
		parent::__construct();
        check_login_session();
        $this->load->model('customer_m', 'customer');
	}
    
	public function index()
	{
        $data['title'] = $this->title;
        $data['row'] = $this->customer->get()->result();
		$this->template->load('_template', 'customer/customer_data', $data);
    }
    
    public function add()
    {
		$customer = new stdClass();
		$customer->customer_id = null;
		$customer->name = null;
		$customer->gender = null;
		$customer->phone = null;
		$customer->address = null;
		$data = array(
            'title' => $this->title,
            'page' => 'add',
			'row' => $customer
		);
        $this->template->load('_template', 'customer/customer_form', $data);   
    }

	public function edit($id = null)
	{
		if($id != null) {
			$query = $this->customer->get($id);
			if($query->num_rows() > 0) {
				$customer = $query->row();
				$data = array(
                    'title' => $this->title,
                    'page' => 'edit',
                    'row' => $customer
                );
		        $this->template->load('_template', 'customer/customer_form', $data);  
			} else {
				echo "<script>alert('Data tidak ditemukan');
				window.location='".site_url('customer')."';</script>";
			}
		} else {
			echo "<script>window.location='".site_url('customer')."';</script>";
		}
	}

    public function process()
	{
		$data = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			if ($this->customer->check_customer($data['name'],null, $data['addr'])->num_rows() > 0) {
				echo "<script>alert('Nama ini sudah dipakai nama lain lain');
				window.location='" . site_url('customer/add') . "';</script>";
			} else {
				$this->customer->add($data);
				echo "<script>alert('Data berhasil disimpan');
				window.location='" . site_url('customer') . "';</script>";
			}
		} else if (isset($_POST['edit'])) {
			if ($this->customer->check_customer($data['name'], $data['id'])->num_rows() > 0) {
				echo "<script>alert('Nama ini sudah dipakai barang lain');
				window.location='" . site_url('customer/edit/' . $data['id']) . "';</script>";
			} else {
				$this->customer->edit($data);
				echo "<script>alert('Data berhasil disimpan');
				window.location='" . site_url('customer') . "';</script>";
			}
		} else {
			redirect('customer');
		}
	}
    public function del($id = null)
	{
		$this->customer->del($id);
		
		if($this->db->affected_rows() == 1) {
			echo "<script>alert('Data berhasil dihapus');
			window.location='".site_url('customer')."';</script>";
		} else {
			echo "<script>window.location='".site_url('customer')."';</script>";
		}
	}
}
