<?php

class User_Model extends CI_Model
{
	public function getUser($username = false)
	{
		if ($username == false) {
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where('username !=', 'admin');
			return $this->db->get()->result_array();
		}
		return $this->db->get_where('user', ['username' => $username])->row_array();
	}

	public function getMahasiswa($npm = false)
	{
		if ($npm == false) {
			$this->db->select('*, mahasiswa.nama as nama ,jurusan.nama as jurusan, fakultas.nama as fakultas');
			$this->db->from('mahasiswa');
			$this->db->join('jurusan', 'mahasiswa.jurusan_id = jurusan.id', 'LEFT');
			$this->db->join('fakultas', 'fakultas.id = jurusan.fakultas_id', 'LEFT');
			return $this->db->get()->result_array();
		}
		return $this->db->get_where('mahasiswa', ['npm' => $npm])->row_array();
	}

	public function getMahasiswaByUserID($user_id)
	{
		return $this->db->get_where('mahasiswa', ['user_id' => $user_id])->row_array();
	}

	public function getUserById($id)
	{
		return $this->db->get_where('user', ['id' => $id])->row_array();
	}

	public function getLastNPM()
	{
		$this->db->select('npm');
		$this->db->from('mahasiswa');
		$this->db->order_by('npm', 'DESC');
		$npm = $this->db->get()->row_array();
		if (!empty($npm)) {
			$lastnpm = intval($npm['npm']);
		} else {
			$lastnpm = '00000000';
		}
		return str_pad($lastnpm + 1, 8, '0', STR_PAD_LEFT);
	}

	public function deleteUser($user_id)
	{
		$this->db->delete('user', array('id' => $user_id));
		$this->db->delete('mahasiswa', array('user_id' => $user_id));
	}

	public function insertUser($data)
	{
		$this->db->insert('user', $data);
		return $this->db->insert_id();
	}
	public function insertMahasiswa($data)
	{
		$this->db->insert('mahasiswa', $data);
	}

	public function updateUser($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('user', $data);
	}
	public function updateMahasiswa($data, $user_id)
	{
		$this->db->where('user_id', $user_id);
		$this->db->update('mahasiswa', $data);
	}

	public function getCountUser($role)
	{
		$this->db->where('role', $role);
		$this->db->from('user');
		return $this->db->count_all_results();
	}
}
