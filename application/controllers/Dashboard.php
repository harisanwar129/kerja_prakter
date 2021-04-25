<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_login_session();
	}

	public function index()
	{
		$query = $this->db->query("SELECT t_sale_detail.item_id, p_item.name, (SELECT SUM(t_sale_detail.qty)) AS sold
		FROM t_sale_detail
			INNER JOIN penjualan ON t_sale_detail.sale_id = penjualan.sale_id
			INNER JOIN p_item ON t_sale_detail.item_id = p_item.item_id
			WHERE MID(penjualan.date,6,2) = DATE_FORMAT(CURDATE(),'%m')
		GROUP BY t_sale_detail.item_id
		ORDER BY sold desc
		LIMIT 10");

		$data['title'] = "Dashboard";
		$data['row'] = $query->result();

		$this->template->load('_template', 'dashboard', $data);
	}
}
