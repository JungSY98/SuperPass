<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usage_model extends CI_Model
{
    // ───────── 사번/권한에 따라 상점 제한(회사 관리자만 해당) ─────────
    private function _limit_scope()
    {
        // 예: 슈퍼관리자면 무제한, 업체관리자면 소속 상점만
        if ($this->session->userdata('is_super_admin')) return;
        $store_ids = $this->session->userdata('admin_store_ids'); // ex) [1,4,8]
        if (is_array($store_ids) && count($store_ids)){
            $this->db->where_in('u.store_no', $store_ids);
        } else {
            // 회사관리자인데 상점배정이 없다면 결과 0건
            $this->db->where('1=', '0', false);
        }
    }

    private function _apply_filters($p)
    {
        if (!empty($p['start'])) $this->db->where('u.used_at >=', $p['start'].' 00:00:00');
        if (!empty($p['end']))   $this->db->where('u.used_at <=', $p['end'].' 23:59:59');
        if (!empty($p['store_no']))  $this->db->where('u.store_no', (int)$p['store_no']);
        if (!empty($p['coupon_no'])) $this->db->where('u.coupon_no', (int)$p['coupon_no']);
        if ($p['is_stamp'] !== '')   $this->db->where('c.is_stamp', $p['is_stamp'] ? 'Y' : 'N');
        $this->_limit_scope();
    }

    // ───────── 대시보드 KPI ─────────
    public function summary($p)
    {
        $this->db->from('dsp_coupon_usage u')
                 ->join('dsp_coupon c', 'c.coupon_no=u.coupon_no','left',false);
        $this->_apply_filters($p);
        $this->db->select('COUNT(*) usage_cnt,
                           COUNT(DISTINCT u.mem_id) member_cnt,
                           SUM(u.discount) discount_sum,
                           SUM(u.price_pay) pay_sum', false);
        return $this->db->get()->row_array() ?: ['usage_cnt'=>0,'member_cnt'=>0,'discount_sum'=>0,'pay_sum'=>0];
    }

    // ───────── 상점 TOP ─────────
    public function top_stores($p, $limit=10)
    {
        $this->db->from('dsp_coupon_usage u')
                 ->join('dsp_coupon c','c.coupon_no=u.coupon_no','left',false)
                 ->join('dsp_store  s','s.no=u.store_no','left',false);
        $this->_apply_filters($p);
        $this->db->select('u.store_no, s.sNameKR, s.sNameEN,
                           COUNT(*) usage_cnt, SUM(u.discount) discount_sum, SUM(u.price_pay) pay_sum', false)
                 ->group_by('u.store_no')->order_by('usage_cnt','DESC')->limit((int)$limit);
        return $this->db->get()->result_array();
    }

    // ───────── 쿠폰 TOP ─────────
    public function top_coupons($p, $limit=10)
    {
        $this->db->from('dsp_coupon_usage u')
                 ->join('dsp_coupon c','c.coupon_no=u.coupon_no','left',false)
                 ->join('dsp_store  s','s.no=u.store_no','left',false);
        $this->_apply_filters($p);
        $this->db->select('u.coupon_no, c.title_kr, c.title_en, u.store_no, s.sNameKR, s.sNameEN,
                           COUNT(*) usage_cnt, SUM(u.discount) discount_sum, SUM(u.price_pay) pay_sum', false)
                 ->group_by('u.coupon_no')->order_by('usage_cnt','DESC')->limit((int)$limit);
        return $this->db->get()->result_array();
    }

    // ───────── 디바이스/브라우저 ─────────
    public function device($p)
    {
        $this->db->from('dsp_coupon_usage u')
                 ->join('dsp_coupon c','c.coupon_no=u.coupon_no','left',false);
        $this->_apply_filters($p);
        $this->db->select('COALESCE(u.device,"unknown") device, COALESCE(u.browser,"unknown") browser, COUNT(*) usage_cnt', false)
                 ->group_by('device, browser')->order_by('usage_cnt','DESC');
        return $this->db->get()->result_array();
    }

    // ───────── 히트맵(일×시간대) ─────────
    public function heatmap($p)
    {
        $this->db->from('dsp_coupon_usage u')
                 ->join('dsp_coupon c','c.coupon_no=u.coupon_no','left',false);
        $this->_apply_filters($p);
        $this->db->select('DATE(u.used_at) d, HOUR(u.used_at) h, COUNT(*) usage_cnt', false)
                 ->group_by('d, h')->order_by('d ASC, h ASC');
        return $this->db->get()->result_array();
    }

    // ───────── 쿠폰별 할인총액/사용량 리스트 ─────────
    public function coupon_table($p)
    {
        $this->db->from('dsp_coupon_usage u')
                 ->join('dsp_coupon c','c.coupon_no=u.coupon_no','left',false)
                 ->join('dsp_store  s','s.no=u.store_no','left',false);
        $this->_apply_filters($p);
        $this->db->select('s.sNameKR store_kr, s.sNameEN store_en,
                           u.coupon_no, c.title_kr, c.title_en,
                           SUM(u.discount) discount_sum, COUNT(*) usage_cnt', false)
                 ->group_by('s.no, u.coupon_no')
                 ->order_by('store_kr ASC, discount_sum DESC');
        return $this->db->get()->result_array();
    }

    // ───────── Export ─────────
    public function export_rows($p, $limit=100000)
    {
        $this->db->from('dsp_coupon_usage u')
                 ->join('dsp_coupon c','c.coupon_no=u.coupon_no','left',false)
                 ->join('dsp_store  s','s.no=u.store_no','left',false);
        $this->_apply_filters($p);
        $this->db->select('u.used_at, u.mem_id, u.store_no, s.sNameKR, s.sNameEN,
                           u.coupon_no, c.title_kr, c.title_en,
                           u.price_orig, u.discount, u.price_pay, u.dc_type, u.dc_amount,
                           u.device, u.browser, u.ip', false)
                 ->order_by('u.used_at','DESC')->limit((int)$limit);
        return $this->db->get()->result_array();
    }
}
