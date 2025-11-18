<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Latihan_datatable_model extends CI_Model
{
	protected $table = 'anggota';
	protected $column_order = array('nama', 'no_mhs', 'angkatan');
	protected $column_search = array('nama', 'no_mhs', 'angkatan');
	protected $order = array('id' => 'desc');

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query($post)
	{
		$this->db->from($this->table);
		// pencarian global
		if (!empty($post['search']['value'])) {
			$search = $post['search']['value'];
			$this->db->group_start();
			foreach ($this->column_search as $i => $col) {
				if ($i === 0) {
					$this->db->like($col, $search);
				} else {
					$this->db->or_like($col, $search);
				}
			}
			$this->db->group_end();
		}
		// ordering
		if (isset($post['order'][0]['column'])) {
			$colIndex = intval($post['order'][0]['column']);
			$dir = ($post['order'][0]['dir'] === 'asc') ? 'asc' : 'desc';
			if (isset($this->column_order[$colIndex])) {
				$this->db->order_by($this->column_order[$colIndex], $dir);
			}
		} else if (!empty($this->order)) {
			$this->db->order_by(key($this->order), $this->order[key($this->order)]);
		}
	}

	public function get_datatables($post)
	{
		$this->_get_datatables_query($post);
		if (isset($post['length']) && $post['length'] != -1) {
			$this->db->limit(intval($post['length']), intval($post['start']));
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered($post)
	{
		$this->_get_datatables_query($post);
		return $this->db->count_all_results();
	}

	public function count_all()
	{
		return $this->db->count_all($this->table);
	}
}
