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
	public function getMahasiswa($npm)
	{
		return $this->db->get_where('mahasiswa', ['npm' => $npm])->row_array();
	}

	public function resendEmailAll()
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username !=', 'admin');
		$this->db->where('email !=', '');
		return $this->db->get()->result_array();
	}

	public function getCountUser($role)
	{
		$this->db->where('role', $role);
		$this->db->from('user');
		return $this->db->count_all_results();
	}

	public function deleteUser($user_id)
	{
		$this->db->delete('user', array('user_id' => $user_id));
	}

	public function insertUser($data)
	{
		$this->db->insert('user', $data);
	}

	public function updateUser($data, $id)
	{
		$this->db->where('user_id', $id);
		$this->db->update('user', $data);
	}
}
