<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_Model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		if ($this->session->userdata('role')) {
			if ($this->session->userdata('role') > 1) {
				redirect('Home');
			} else {
				redirect('Admin');
			}
		}
		$this->load->view('Auth/signIn');
	}

	public function signIn()
	{
		$this->form_validation->set_rules('username', 'username', 'required|trim');
		$this->form_validation->set_rules('password', 'password', 'required');

		if ($this->form_validation->run() == false) {
			redirect('/');
		} else {
			$username = strtolower(stripslashes($this->input->post('username', true)));
			$password = $this->input->post('password', true);
			$user = $this->User_Model->getUser($username);
			if ($user['role'] == "mahasiswa") {
				$mahasiswa = $this->User_Model->getMahasiswa($user['username']);
			}
			if ($user) {
				if ($password == $user['password']) {
					$data = [
						'username' => $user['username'],
						'role' => $user['role'],
					];
					if ($user['role'] == "mahasiswa") {
						$data['nama'] = $mahasiswa['nama'];
					}
					$this->session->set_userdata($data);
					redirect('Admin');
				} else {
					$this->session->set_flashdata('flash', 'Wrong Password!');
					redirect('/');
				}
			} else {
				$this->session->set_flashdata('flash', 'Wrong Username / not registered!');
				redirect('/');
			}
		}
	}

	public function signOut()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('flash', 'See You Later :)');
		redirect('/');
	}
}
