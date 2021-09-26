<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_Model');
		$this->load->model('BackEnd_Model');
		if ($this->session->userdata('role') != 1) {
			redirect('Auth');
		}
	}

	public function index()
	{
		$data = array(
			'title' => 'Dashboard',
			'countEmployee' => $this->User_Model->getCountUser(2),
			'countInternship' => $this->User_Model->getCountUser(3),
		);
		$this->load->view('Backend/templete', $data);
		$this->load->view('Backend/dashboard', $data);
	}

	public function showUser()
	{
		$data = array(
			'title' => 'Manage User',
			'user' => $this->User_Model->getUser(),
		);
		$this->load->view('Backend/templete', $data);
		$this->load->view('Backend/Manage/User/showUser', $data);
	}

	public function deleteUser()
	{
		$this->User_Model->deleteUser($this->input->post('user_id'));
		$this->session->set_flashdata('flash', 'User Deleted!');
		redirect('Admin/showUser');
	}

	public function addUser()
	{
		$data = array(
			'title' => 'Add User',
		);
		$this->load->view('Backend/templete', $data);
		$this->load->view('Backend/Manage/User/addUser', $data);
	}

	public function insertUser()
	{
		if ($this->User_Model->getUser($this->input->post('username', true))) {
			$this->session->set_flashdata('flash', 'Username Already Exists!');
			redirect('Admin/showUser');
		}
		$data = [
			"username" => $this->input->post('username', true),
			"password" => bin2hex(random_bytes(9)),
			"email" => $this->input->post('email', true),
			"role_id" => $this->input->post('role_id', true),
			"is_active" => $this->input->post('is_active', true),
			"date_created" => gmdate("Y-m-d H:i:s", time() + (60 * 60 * 7)),
		];
		$this->User_Model->insertUser($data);
		$this->_sendEmail($data);
		$this->session->set_flashdata('flash', 'User Added!');
		redirect('Admin/showUser');
	}

	public function resendEmail()
	{
		$data = $this->User_Model->getUserById($this->input->post('user_id'));
		if ($data["email"] == false) {
			$this->session->set_flashdata('flash', "Account Doesn't Have Email!");
			redirect('Admin/showUser');
		}
		$this->_sendEmail($data);
		$this->session->set_flashdata('flash', 'Resend Email Success!');
		redirect('Admin/showUser');
	}

	public function resendEmailAll()
	{
		if ($this->input->post('emailAll')) {
			$data = $this->User_Model->resendEmailAll();
			foreach ($data as $data) {
				$this->_sendEmail($data);
			}
		}
		$this->session->set_flashdata('flash', 'Resend Email All Success!');
		redirect('Admin/showUser');
	}

	private function _sendEmail($data)
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'hrwebsite.fxmedia@gmail.com',
			'smtp_pass' => 'hrwebsitefx',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n",
		];
		$this->load->library('email', $config);
		$this->email->initialize($config);
		$this->email->from('hrwebsite.fxmedia@gmail.com', 'Hr Website FXMedia');
		$this->email->to($data['email']);
		$this->email->subject('Hr Website Account');
		$this->email->message('
      <h1 style= "color: #00adef; text-align:center">Hr Website FXMedia</h1>
      <p style= "color: grey; font-size:18px;text-align:center">Hr Website Account</p>
      <p style= "text-align:center"> Hai ' . $data['username'] . ',</p>
      <p style= "text-align:center"> Welcome to FXMedia on board training, Please Sign In with the details below,</p>
			<p style= "text-align:center"> Username : ' . $data['username'] . '</p>
			<p style= "text-align:center"> Password : ' . $data['password'] . '</p>
      <p style= "text-align:center;"><a href="'
			. base_url('Auth?username=' . $data['username'] . '&password=' . $data['password']) . '" style="cursor:pointer;"><button type="button" style="cursor:inherit;width:200px;height:40px;border-radius:6px;background-color:#00adef;">
                  Sign In
                </button></a></p>');
		if ($this->email->send()) {
			return true;
		} else {
			echo ($this->email->print_debugger());
			die;
		}
	}

	public function is_active()
	{
		$this->User_Model->is_active($this->input->post('is_active'));
		if ($this->input->post('is_active') == 1) {
			$this->session->set_flashdata('flash', 'All User Active!');
		} else {
			$this->session->set_flashdata('flash', 'All User Non Active!');
		}
		redirect('Admin/showUser');
	}

	public function editUser()
	{
		$data = [
			'title' => 'Edit User',
			'user' => $this->User_Model->getUserById($this->input->post('user_id', true)),
		];
		$this->load->view('Backend/templete', $data);
		$this->load->view('Backend/Manage/User/editUser', $data);
	}

	public function updateUser()
	{
		$data = [
			"username" => $this->input->post('username', true),
			"password" => $this->input->post('password', true),
			"email" => $this->input->post('email', true),
			"role_id" => $this->input->post('role_id', true),
			"is_active" => $this->input->post('is_active', true),
		];
		$this->User_Model->updateUser($data, $this->input->post('user_id', true));
		$this->session->set_flashdata('flash', 'User Updated!');
		redirect('Admin/showUser');
	}

	public function showPortfolio()
	{
		$data = array(
			'title' => 'Manage Portfolio',
			'portfolio' => $this->BackEnd_Model->getPortfolio(),
		);
		$this->load->view('Backend/templete', $data);
		$this->load->view('Backend/Manage/Portfolio/showPortfolio', $data);
	}

	public function editPortfolio()
	{
		$data = [
			'title' => 'Edit Portfolio',
			'portfolio' => $this->BackEnd_Model->getPortfolio($this->input->post('portfolio_id', true)),
		];
		$this->load->view('Backend/templete', $data);
		$this->load->view('Backend/Manage/Portfolio/editPortfolio', $data);
	}

	public function updatePortfolio()
	{
		$upload_image = $_FILES['portfolio_file']["name"];
		if ($upload_image) {
			$config['allowed_types'] = 'mp4|3gp|mkv|flv|';
			$config['max_size']     = '200000';
			$config['upload_path'] = './asset/video';
			$config['file_name'] = bin2hex(random_bytes(5)) . '-' . $_FILES['portfolio_file']["name"];
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('portfolio_file')) {
				$portfolio_file = $this->upload->data('file_name');
			} else {
				$this->session->set_flashdata('flash', $this->upload->display_errors('', ''));
				redirect('Admin/showPortfolio');
			}
		};
		unlink('./asset/video/' . $this->input->post('oldPortfolio_file', true));
		$this->BackEnd_Model->updatePortfolio($portfolio_file, $this->input->post('portfolio_id', true));
		$this->session->set_flashdata('flash', 'Portfolio Updated!');
		redirect('Admin/showPortfolio');
	}

	public function showLink()
	{
		$data = array(
			'title' => 'Manage Link Conference',
			'link' => $this->BackEnd_Model->getLinkConf(),
		);
		$this->load->view('Backend/templete', $data);
		$this->load->view('Backend/Manage/LinkConference/showLink', $data);
	}

	public function editLink()
	{
		$data = [
			'title' => 'Edit Link Conference',
			'link' => $this->BackEnd_Model->getLinkConf($this->input->post('link_id', true)),
		];
		$this->load->view('Backend/templete', $data);
		$this->load->view('Backend/Manage/LinkConference/editLink', $data);
	}
	public function updateLink()
	{
		$this->BackEnd_Model->updateLinkConf($this->input->post('link', true), $this->input->post('link_id', true));
		$this->session->set_flashdata('flash', 'Link Updated!');
		redirect('Admin/showLink');
	}
}
