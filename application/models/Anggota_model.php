<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota_model extends CI_Model
{
    protected $table = 'anggota';
    // untuk DataTables: urutan kolom (gunakan null untuk kolom aksi jika ada)
    protected $column_order = array(null, 'no_mhs', 'nama', 'angkatan');
    // kolom yg boleh dicari
    protected $column_search = array('nama', 'email', 'telepon', 'alamat');
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
            if (isset($this->column_order[$colIndex]) && $this->column_order[$colIndex] !== null) {
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

    public function get_by_id($id)
    {
        return $this->db->get_where($this->table, array('id' => $id))->row();
    }

    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db->where('id', $id)->delete($this->table);
    }

    public function get_data()
    {
        // $this->db->select('*');
        $this->db->from($this->table);
        $this->db->limit(10, 0);
        return $this->db->get()->result();
        // $query = $this->db->get();
        // echo $this->db->last_query();
        // die();
        // return $query->result();
        // return $this->db->get($this->table)->result();
    }
}
