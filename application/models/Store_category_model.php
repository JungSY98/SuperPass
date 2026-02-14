<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Store_category_model extends CI_Model
{
    protected $table = 'dsp_store_category';

    public function list_all($only_use = false) {
        if ($only_use) $this->db->where('is_use','Y');
        return $this->db->from($this->table)
            ->order_by('(sort_order IS NULL)', 'ASC', FALSE)
            ->order_by('sort_order', 'ASC')
            ->order_by('cat_id', 'ASC')
            ->get()->result_array();
    }

    public function get($cat_id) {
        return $this->db->from($this->table)->where('cat_id',(int)$cat_id)->get()->row_array();
    }

    public function insert($data) {
        $data['reg_ip']   = $this->input->ip_address();
        $data['reg_date'] = date('Y-m-d H:i:s');
        $this->db->insert($this->table, $data);
        return (int)$this->db->insert_id();
    }

    public function update($cat_id, $data) {
        $data['upd_date'] = date('Y-m-d H:i:s');
        return $this->db->where('cat_id',(int)$cat_id)->update($this->table, $data);
    }

    public function delete($cat_id) {
        return $this->db->where('cat_id',(int)$cat_id)->delete($this->table);
    }

    public function reorder($ids) {
        // $ids: [cat_id1, cat_id2, ...]
        if (!is_array($ids)) return false;
        $this->db->trans_start();
        $order = 1;
        foreach ($ids as $id) {
            $this->db->where('cat_id', (int)$id)->update($this->table, ['sort_order'=>$order++,'upd_date'=>date('Y-m-d H:i:s')]);
        }
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function toggle_use($cat_id, $to) {
        return $this->update($cat_id, ['is_use'=> ($to ? 'Y':'N') ]);
    }

    public function find_by_code($code) {
        return $this->db->from($this->table)->where('code', $code)->get()->row_array();
    }
}
