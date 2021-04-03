<?php
defined('BASEPATH') or exit('No direct script access allowed');

class stock extends CI_Controller
{

    var $title = "stock in";
    var $title2 = "stock out";

    function __construct()
    {
        parent::__construct();
        check_login_session();
        $this->load->model('stock_m', 'stock');

        $this->load->model('item_m', 'item');
    }






    public function cetak($id)
    {
        $data = array(
            'stock' => $this->stock->get_stock($id)->result(),
            'stock_detail' => $this->stock->get_stock($id)->result(),
        );
        $this->load->view('transaction/stock/receipt_print', $data);
    }








    public function stock_in_data()
    {
        $data['title'] = $this->title;
        $data['row'] = $this->stock->get_stock_in()->result();
        $this->template->load('_template', 'transaction/stock_in/stock_in_data', $data);
    }
    public function stock_in_add()
    {
        $this->load->model('supplier_m', 'supplier');
        $supplier = $this->supplier->get()->result();

        $item = $this->item->get()->result();

        $data = array(
            'title' => $this->title,
            'page' => 'in_add',
            'supplier' => $supplier,
            'item' => $item
        );
        $this->template->load('_template', 'transaction/stock_in/stock_in_form', $data);
    }
    public function stock_in_del()
    {
        $item_id = $this->uri->segment(4);
        $stock_id = $this->uri->segment(5);
        $qty = $this->stock->get($stock_id)->row()->qty;

        $data = ['qty' => $qty, 'item_id' => $item_id];
        $this->item->update_stock_out($data);
        $this->stock->del($stock_id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil dihapus');
            window.location='" . site_url('stock/in') . "';</script>";
        }
    }


    public function stock_out_data()
    {
        $data['title'] = $this->title2;
        $data['row'] = $this->stock->get_stock_out()->result();
        $this->template->load('_template', 'transaction/stock_out/stock_out_data', $data);
    }
    public function stock_out_add()
    {
        $item = $this->item->get()->result();
        $data = array(
            'title' => $this->title2,
            'page' => 'out_add',
            'item' => $item
        );
        $this->template->load('_template', 'transaction/stock_out/stock_out_form', $data);
    }
    public function stock_out_del()
    {
        $item_id = $this->uri->segment(4);
        $stock_id = $this->uri->segment(5);
        $qty = $this->stock->get($stock_id)->row()->qty;

        $data = ['qty' => $qty, 'item_id' => $item_id];
        $this->item->update_stock_in($data);
        $this->stock->del($stock_id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil dihapus');
            window.location='" . site_url('stock/out') . "';</script>";
        }
    }

    public function process()
    {
        if (isset($_POST['in_add'])) {
            $data = $this->input->post(null, TRUE);
            $this->stock->add_stock_in($data);
            $this->item->update_stock_in($data);
            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('Data berhasil disimpan');
                window.location='" . site_url('stock/in') . "';</script>";
            }
        } else if (isset($_POST['out_add'])) {
            $data = $this->input->post(null, TRUE);
            $row_item = $this->item->get($this->input->post('item_id'))->row();
            if ($row_item->stock < $this->input->post('qty')) {
                echo "<script>alert('Stock tidak mencukupi');
                window.location='" . site_url('stock/out') . "';</script>";
            } else {
                $this->stock->add_stock_out($data);
                $this->item->update_stock_out($data);
                if ($this->db->affected_rows() > 0) {
                    echo "<script>alert('Data berhasil disimpan');
                    window.location='" . site_url('stock/out') . "';</script>";
                }
            }
        }
    }
}
