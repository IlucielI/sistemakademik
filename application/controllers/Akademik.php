<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akademik extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_Model');
		$this->load->model('BackEnd_Model');
	}

	public function index()
	{
		$data = array(
			'title' => 'Dashboard',
			'countMahasiswa' => $this->User_Model->getCountUser("mahasiswa"),
			'countMatakuliah' => $this->BackEnd_Model->getCountMatakuliah(),
			'countSKS' => $this->BackEnd_Model->getCountSKS($this->session->userdata('npm')),
		);
		$this->load->view('Backend/templete', $data);
		$this->load->view('Backend/dashboard', $data);
	}


	public function showUser()
	{
		$data = array(
			'title' => 'Data Mahasiswa',
			'mahasiswa' => $this->User_Model->getMahasiswa(),
		);
		$this->load->view('Backend/templete', $data);
		$this->load->view('Backend/Manage/User/showUser', $data);
	}

	public function ajax_jurusan()
	{
		$data = $this->BackEnd_Model->get_jurusan($this->input->post('id'));
		echo json_encode($data);
	}

	public function deleteUser()
	{
		$this->User_Model->deleteUser($this->input->post('id'));
		$this->session->set_flashdata('flash', 'Mahasiswa Deleted!');
		redirect('Akademik/showUser');
	}

	public function addUser()
	{
		$data = array(
			'title' => 'Tambah Mahasiswa',
			'fakultas' => $this->BackEnd_Model->getFakultas(),
		);
		$this->load->view('Backend/templete', $data);
		$this->load->view('Backend/Manage/User/addUser', $data);
	}

	public function insertUser()
	{
		if (!empty($this->User_Model->getUser($this->input->post('username')))) {
			$this->session->set_flashdata('flash', 'Username Already Exists!');
			redirect('Akademik/showUser');
		}
		$data = [
			"username" => $this->input->post('username'),
			"password" => $this->input->post('password'),
			"email" => $this->input->post('email'),
			"role" => "mahasiswa",
		];
		$user_id = $this->User_Model->insertUser($data);
		$this->_sendEmail($data);
		$data = [
			"npm" => $this->User_Model->getLastNPM(),
			"nama" => $this->input->post('nama'),
			"kelas" => $this->input->post('kelas'),
			"jurusan_id" => $this->input->post('jurusan_id'),
			"semester" => $this->input->post('semester'),
			"user_id" => $user_id,
		];
		$this->User_Model->insertMahasiswa($data);
		$this->session->set_flashdata('flash', 'Mahasiswa Added!');
		redirect('Akademik/showUser');
	}

	private function _sendEmail($data)
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => '1versus.channel1@gmail.com',
			'smtp_pass' => 'malvinbucin99',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n",
		];
		$this->load->library('email', $config);
		$this->email->initialize($config);
		$this->email->from('1versus.channel1@gmail.com', 'Hr Website Universitas JWP');
		$this->email->to($data['email']);
		$this->email->subject('Website Account Akademik');
		$this->email->message('
      <h1 style= "color: #00adef; text-align:center">Hr Website Universitas JWP</h1>
      <p style= "color: grey; font-size:18px;text-align:center">Hr Website Account Akademik</p>
      <p style= "text-align:center"> Hai ' . $data['username'] . ',</p>
      <p style= "text-align:center"> Welcome to JWP, Please Sign In with the details below,</p>
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

	public function editUser()
	{
		$data = [
			'title' => 'Update User',
			'user' => $this->User_Model->getUserById($this->input->post('id', true)),
			'mahasiswa' => $this->User_Model->getMahasiswaByUserID($this->input->post('id', true)),
			'fakultas' => $this->BackEnd_Model->getFakultas(),
		];
		$data['fakultasMhs'] = $this->BackEnd_Model->getFakultas($this->BackEnd_Model->getJurusan($data['mahasiswa']['jurusan_id']));
		$data['jurusan'] = $this->BackEnd_Model->get_jurusan($data['fakultasMhs']['id']);
		$this->load->view('Backend/templete', $data);
		$this->load->view('Backend/Manage/User/editUser', $data);
	}

	public function updateUser()
	{
		$data = [
			"username" => $this->input->post('username'),
			"password" => $this->input->post('password'),
			"email" => $this->input->post('email'),
		];
		$this->User_Model->updateUser($data, $this->input->post('id', true));
		$this->_sendEmail($data);
		$data = [
			"nama" => $this->input->post('nama'),
			"kelas" => $this->input->post('kelas'),
			"jurusan_id" => $this->input->post('jurusan_id'),
			"semester" => $this->input->post('semester'),
		];
		$this->User_Model->updateMahasiswa($data, $this->input->post('id', true));
		$this->session->set_flashdata('flash', 'Mahasiswa Updated!');
		redirect('Akademik/showUser');
	}

	public function showMatakuliah()
	{
		$data = array(
			'title' => 'Data Mata Kuliah',
			'matakuliah' => $this->BackEnd_Model->getMatakuliah(),
		);
		$this->load->view('Backend/templete', $data);
		$this->load->view('Backend/Manage/Matakuliah/showMatakuliah', $data);
	}

	public function addMatakuliah()
	{
		$data = array(
			'title' => 'Tambah Matakuliah',
			'fakultas' => $this->BackEnd_Model->getFakultas(),
		);
		$this->load->view('Backend/templete', $data);
		$this->load->view('Backend/Manage/Matakuliah/addMatakuliah', $data);
	}

	public function insertMatakuliah()
	{
		if (!empty($this->BackEnd_Model->getMatakuliah($this->input->post('kode_mk')))) {
			$this->session->set_flashdata('flash', 'Kode Mata Kuliah Already Exists!');
			redirect('Akademik/showMatakuliah');
		}
		$data = [
			"kode_mk" => $this->input->post('kode_mk'),
			"nama" => $this->input->post('nama'),
			"semester" => $this->input->post('semester'),
			"sks" => $this->input->post('sks'),
			"jurusan_id" => $this->input->post('jurusan_id'),
		];
		$this->BackEnd_Model->insertMatakuliah($data);
		$this->session->set_flashdata('flash', 'Matakuliah Added!');
		redirect('Akademik/showMatakuliah');
	}

	public function editMatakuliah()
	{
		$data = [
			'title' => 'Update Mata Kuliah',
			'matakuliah' => $this->BackEnd_Model->getMatakuliah($this->input->post('kode_mk', true)),
			'fakultas' => $this->BackEnd_Model->getFakultas(),
		];
		$data['fakultasMhs'] = $this->BackEnd_Model->getFakultas($this->BackEnd_Model->getJurusan($data['matakuliah']['jurusan_id']));
		$data['jurusan'] = $this->BackEnd_Model->get_jurusan($data['fakultasMhs']['id']);
		$this->load->view('Backend/templete', $data);
		$this->load->view('Backend/Manage/Matakuliah/editMatakuliah', $data);
	}

	public function updateMatakuliah()
	{
		$data = [
			"kode_mk" => $this->input->post('kode_mk'),
			"nama" => $this->input->post('nama'),
			"semester" => $this->input->post('semester'),
			"sks" => $this->input->post('sks'),
			"jurusan_id" => $this->input->post('jurusan_id'),
		];
		$this->BackEnd_Model->updateMatakuliah($data, $this->input->post('lastkode'));
		$this->session->set_flashdata('flash', 'Mata Kuliah Updated!');
		redirect('Akademik/showMatakuliah');
	}

	public function deleteMatakuliah()
	{
		$this->BackEnd_Model->deleteMatakuliah($this->input->post('id'));
		$this->session->set_flashdata('flash', 'Mata Kuliah Deleted!');
		redirect('Akademik/showMatakuliah');
	}

	public function editProfile()
	{
		$data = [
			'title' => 'Update Profile',
		];
		$this->load->view('Backend/templete', $data);
		$this->load->view('Backend/Manage/Profile/editProfile', $data);
	}

	public function updateProfile()
	{

		if ($this->input->post('new_password1') != $this->input->post('new_password2')) {
			$this->session->set_flashdata('flash', 'Konfirmasi password Baru tidak sesuai!');
			redirect('Akademik/editProfile');
		}
		$user =	$this->User_Model->getUser($this->input->post('username'));
		if (!empty($user)) {
			if ($this->input->post('current_password') == $user['password']) {
				$data = [
					"password" => $this->input->post('new_password2'),
				];
				$this->User_Model->updateUser($data, $this->input->post('id'));
				$this->session->sess_destroy();
				$this->session->set_flashdata('flash', 'Password Berhasil Di Update');
				redirect('Auth/signOut');
			} else {
				$this->session->set_flashdata('flash', 'Password Lama Salah');
				redirect('Akademik/editProfile');
			}
		}
	}
}
