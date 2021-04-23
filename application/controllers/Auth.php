<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function index()
	{
		redirect('auth/login');
	}

	public function login()
	{
		if ($this->session->userdata('userid')) {
			redirect('dashboard');
		} else {
			$this->load->view('login');
		}
	}

	public function proses()
	{
		echo '<link href="' . base_url() . '/assets/plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
			<link href="' . base_url() . 'assets/plugins/sweetalert2/animate.css" rel="stylesheet" type="text/css" />
			<script src="' . base_url() . 'assets/bower_components/jquery/dist/jquery.min.js"></script>
			<script src="' . base_url() . 'assets/plugins/sweetalert2/sweetalert2.min.js" type="text/javascript"></script>';

		if (isset($_POST['login'])) {
			$this->load->model('user_m', 'user');
			$data = $this->input->post(null, TRUE);
			$query = $this->user->login($data);
			if ($query->num_rows() > 0) {
				$row = $query->row();
				$options = array(
					'userid' => $row->user_id,
					'level' => $row->level,
				);
				$this->session->set_userdata($options);
				// echo "<script>alert('Selamat, Login sukses');
				// window.location='".site_url('dashboard')."';</script>";
				echo "<script>
            	setTimeout(function() {
                    swal({
						title: 'Success!',
						text: 'Selamat, login berhasil :)',
						type: 'success',
						allowOutsideClick: false
					}).then(
						function() {
							window.location='" . site_url('dashboard') . "';
						}
					)
				}, 50);
				</script>";
			} else {
				// echo "<script>alert('Login gagal! Username / password salah');
				// window.location='".site_url('auth/login')."';</script>";
				echo "<script>
            	setTimeout(function() {
	            	swal({
						title: 'Error!',
						text: 'Login gagal! Username / password salah',
						type: 'error',
						allowOutsideClick: false
					}).then(
						function() {
							window.location='" . site_url('auth/login') . "';
						}
					)
				}, 50);
				</script>";
			}
		} else {
			redirect('auth/login');
		}
	}

	public function logout()
	{
		$this->load->model('sale_m', 'sale');
		$this->sale->del_cart(null, $this->session->userdata('userid'));

		$options = array('userid', 'level', 'search');
		$this->session->unset_userdata($options);
		redirect('auth/login');
	}
}
