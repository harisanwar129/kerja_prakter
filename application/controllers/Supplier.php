<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	var $title = "suppliers";

	function __construct()
	{
		parent::__construct();
        check_login_session();
        $this->load->model('supplier_m', 'supplier');
	}
    
	public function index()
	{
        $data['title'] = $this->title;
        $data['row'] = $this->supplier->get()->result();
		$this->template->load('_template', 'supplier/supplier_data', $data);
    }
    
    public function add()
    {
		$supplier = new stdClass();
		$supplier->supplier_id = null;
		$supplier->name = null;
		$supplier->phone = null;
		$supplier->address = null;
		$supplier->description = null;
		$data = array(
            'title' => $this->title,
            'page' => 'add',
			'row' => $supplier
		);
        $this->template->load('_template', 'supplier/supplier_form', $data);   
    }

	public function edit($id = null)
	{
		if($id != null) {
			$query = $this->supplier->get($id);
			if($query->num_rows() > 0) {
				$supplier = $query->row();
				$data = array(
                    'title' => $this->title,
                    'page' => 'edit',
                    'row' => $supplier
                );
		        $this->template->load('_template', 'supplier/supplier_form', $data);  
			} else {
				echo "<script>alert('Data tidak ditemukan');
				window.location='".site_url('supplier')."';</script>";
			}
		} else {
			echo "<script>window.location='".site_url('supplier')."';</script>";
		}
	}

    public function process()
	{
		if(isset($_POST['add'])) {
            $data = $this->input->post(null, TRUE);
            $this->supplier->add($data);
		} else if(isset($_POST['edit'])) {
            $data = $this->input->post(null, TRUE);
            $this->supplier->edit($data);
		}

		if($this->db->affected_rows() == 1) {
			echo "<script>alert('Data berhasil disimpan');
			window.location='".site_url('supplier')."';</script>";
		} else {
			redirect('supplier');
		}
	}

    public function del($id = null)
	{
		$this->supplier->del($id);
		
		if($this->db->affected_rows() == 1) {
			echo "<script>alert('Data berhasil dihapus');
			window.location='".site_url('supplier')."';</script>";
		} else {
			echo "<script>window.location='".site_url('supplier')."';</script>";
		}
	}
}
