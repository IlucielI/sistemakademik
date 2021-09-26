<?php

class BackEnd_Model extends CI_Model
{
	public function getPortfolio($portfolio_id = false)
	{
		if ($portfolio_id == false) {
			return $this->db->get('portfolio')->result_array();
		}
		return $this->db->get_where('portfolio', ['portfolio_id' => $portfolio_id])->row_array();
	}
	public function updatePortfolio($data, $id)
	{
		$this->db->set('portfolio_file', $data);
		$this->db->where('portfolio_id', $id);
		$this->db->update('portfolio');
	}

	public function getLinkConf($link_id = false)
	{
		if ($link_id == false) {
			return $this->db->get('link-conference')->result_array();
		}
		return $this->db->get_where('link-conference', ['link_id' => $link_id])->row_array();
	}
	public function updateLinkConf($data, $id)
	{
		$this->db->set('link', $data);
		$this->db->where('link_id', $id);
		$this->db->update('link-conference');
	}

	public function getCountSKS($npm)
	{
		$this->db->where('npm', $npm);
		$this->db->from('krs');
		$this->db->select_sum('total_sks');
		$this->db->group_by('npm');
		return $this->db->get()->row_array();
	}
}
