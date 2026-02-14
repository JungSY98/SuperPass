<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Store_click_log_model extends CI_Model
{
    protected $table = 'dsp_store_click_log';

    public function insert($data = []){
        $data['clicked_at'] = date('Y-m-d H:i:s');
        $this->db->insert($this->table, $data);
        return (int)$this->db->insert_id();
    }

    public function count_by_store($from=null, $to=null){
        if ($from) $this->db->where('clicked_at >=', $from);
        if ($to)   $this->db->where('clicked_at <',  $to);
        return $this->db->select('store_no, COUNT(*) as cnt')
            ->from($this->table)->group_by('store_no')
            ->order_by('cnt','DESC')->get()->result_array();
    }
}
