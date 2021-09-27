<?php

class BackEnd_Model extends CI_Model
{
	public function getFakultas($id = false)
	{
		if ($id == false) {
			return $this->db->get('fakultas')->result_array();
		}
		return $this->db->get_where('fakultas', ['id' => $id])->row_array();
	}

	public function get_jurusan($id)
	{
		return $this->db->get_where('jurusan', ['fakultas_id' => $id])->result_array();
	}

	public function getJurusan($id)
	{
		$this->db->select('fakultas_id');
		$this->db->from('jurusan');
		$this->db->where('id', $id);
		$jurusan = $this->db->get()->row_array();
		return $jurusan['fakultas_id'];
	}

	public function getMatakuliah($kode_mk = false)
	{
		if ($kode_mk == false) {
			$this->db->select('*, matakuliah.nama as nama ,jurusan.nama as jurusan');
			$this->db->from('matakuliah');
			$this->db->join('jurusan', 'matakuliah.jurusan_id = jurusan.id', 'LEFT');
			return $this->db->get()->result_array();
		}
		return $this->db->get_where('matakuliah', ['kode_mk' => $kode_mk])->row_array();
	}

	public function insertMatakuliah($data)
	{
		$this->db->insert('matakuliah', $data);
	}

	public function updateMatakuliah($data, $kode_mk)
	{
		$this->db->where('kode_mk', $kode_mk);
		$this->db->update('matakuliah', $data);
	}

	public function deleteMatakuliah($kode_mk)
	{
		$this->db->delete('matakuliah', array('kode_mk' => $kode_mk));
	}

	public function getCountSKS($npm)
	{
		$this->db->select_sum('total_sks');
		$this->db->where('npm', $npm);
		$this->db->from('krs');
		return $this->db->count_all_results();
	}

	public function getCountMatakuliah()
	{
		$this->db->from('matakuliah');
		return $this->db->count_all_results();
	}
}
