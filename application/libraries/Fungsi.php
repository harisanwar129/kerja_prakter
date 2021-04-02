<?php
Class Fungsi {

    protected $CI;

    public function __construct() {
        $this->CI =& get_instance();
    }

    public function user_login() {
        $this->CI->load->model('user_m', 'user');
        $userid = $this->CI->session->userdata('userid');
        return $this->CI->user->get($userid)->row();
    }

    public function count_supplier() {
        $this->CI->load->model('supplier_m', 'supplier');
        return $this->CI->supplier->get()->num_rows();
    }

    public function count_customer() {
        $this->CI->load->model('customer_m', 'customer');
        return $this->CI->customer->get()->num_rows();
    }

    public function count_item() {
        $this->CI->load->model('item_m', 'item');
        return $this->CI->item->get()->num_rows();
    }

    public function count_user() {
        $this->CI->load->model('user_m', 'user');
        return $this->CI->user->get()->num_rows();
    }
    
}