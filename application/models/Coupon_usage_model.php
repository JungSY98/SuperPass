<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Coupon_usage_model extends CI_Model
{
    protected $table = 'dsp_coupon_usage';

    public function insert($data){
        $data['reg_date'] = date('Y-m-d H:i:s');
        $this->db->insert($this->table,$data);
        return (int)$this->db->insert_id();
    }

    public function search($where=[],$limit=50,$offset=0){
        if(!empty($where['store_no'])) $this->db->where('store_no',(int)$where['store_no']);
        if(!empty($where['coupon_no']))$this->db->where('coupon_no',(int)$where['coupon_no']);
        if(!empty($where['mem_id']))   $this->db->where('mem_id',(int)$where['mem_id']);
        if(!empty($where['from']))     $this->db->where('used_at >=',$where['from']);
        if(!empty($where['to']))       $this->db->where('used_at <',$where['to']);
        return $this->db->from($this->table)
            ->order_by('used_at','DESC')->limit($limit,$offset)->get()->result_array();
    }
}
