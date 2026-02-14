<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Store_file_upload_model extends CI_Model
{
    protected $table = 'dsp_store_file_upload';

    /**
     * 상점별 사진 목록
     * @param int $store_no
     * @param string $type 기본 storeExplain
     * @param int $limit
     * @return array
     */
    public function list_by_store($store_no, $type = 'storeExplain', $limit = 50)
    {
        return $this->db->from($this->table)
            ->where('storeNo', (int)$store_no)
            ->where('type', $type)
            ->order_by('sort_order', 'ASC')
            ->limit($limit)
            ->get()->result_array();
    }
}
