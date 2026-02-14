<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Social Meta model class
 *
 * Copyright (c) CIBoard <www.ciboard.co.kr>
 *
 * @author CIBoard (develop@ciboard.co.kr)
 */

class Social_meta_model extends CB_Model
{

	/**
	 * 테이블명
	 */
	public $_table = 'social_meta';

	/**
	 * 사용되는 테이블의 프라이머리키
	 */
	public $parent_key = 'mem_id';

	public $meta_key = 'smt_key';

	public $meta_value = 'smt_value';

	public $cache_prefix= 'social_meta/social-meta-model-get-'; // 캐시 사용시 프리픽스

	public $cache_time = 86400; // 캐시 저장시간

	function __construct()
	{
		parent::__construct();

		check_cache_dir('social_meta');
	}


	public function get_all_meta($mem_id = 0)
	{
		if (empty($mem_id)) {
			return false;
		}

		$cachename = $this->cache_prefix . $mem_id;

		// 1) 캐시 먼저 조회
		$data = $this->cache->get($cachename);

		// 2) 캐시 미스면 재계산
		if (!is_array($data)) {
			$data = [];               // ← false일 수 있으므로 먼저 배열로 초기화 (핵심)
			$result = [];

			$res = $this->get('', '', [$this->parent_key => $mem_id]);
			if (is_array($res)) {
				foreach ($res as $val) {
					// 키 존재 여부를 안전하게 체크 (선택)
					if (isset($val[$this->meta_key])) {
						$result[$val[$this->meta_key]] = $val[$this->meta_value] ?? null;
					}
				}
			}

			$data['result'] = $result;   // 이미 $data는 배열이므로 안전
			$data['cached'] = '1';

			$this->cache->save($cachename, $data, $this->cache_time);
		}

		return isset($data['result']) ? $data['result'] : false;
	}



	public function save($mem_id = 0, $savedata = '')
	{
		if (empty($mem_id)) {
			return false;
		}

		if ($savedata && is_array($savedata)) {
			foreach ($savedata as $column => $value) {
				$this->meta_update($mem_id, $column, $value);
			}
		}
		$this->cache->delete($this->cache_prefix . $mem_id);
	}


	public function deletemeta($mem_id = 0)
	{
		if (empty($mem_id)) {
			return false;
		}
		$this->delete_where(array($this->parent_key => $mem_id));
		$this->cache->delete($this->cache_prefix . $mem_id);
	}


	public function meta_update($mem_id = 0, $column = '', $value = false)
	{
		if (empty($mem_id)) {
			return false;
		}

		$column = trim($column);
		if (empty($column)) {
			return false;
		}

		$old_value = $this->item($mem_id, $column);
		if (empty($value)) {
			$value = '';
		}
		if ($value === $old_value) {
			return false;
		}

		if (false === $old_value) {
			return $this->add_meta($mem_id, $column, $value);
		}

		return $this->update_meta($mem_id, $column, $value);
	}


	public function item($mem_id = 0, $column = '')
	{
		if (empty($mem_id)) {
			return false;
		}
		if (empty($column)) {
			return false;
		}

		$result = $this->get_all_meta($mem_id);

		return isset($result[ $column ]) ? $result[ $column ] : false;
	}


	public function add_meta($mem_id = 0, $column = '', $value = '')
	{
		if (empty($mem_id)) {
			return false;
		}
		$column = trim($column);
		if (empty($column)) {
			return false;
		}

		$updatedata = array(
			'mem_id' => $mem_id,
			'smt_key' => $column,
			'smt_value' => $value,
		);
		$this->db->replace($this->_table, $updatedata);

		return true;
	}


	public function update_meta($mem_id = 0, $column = '', $value = '')
	{
		if (empty($mem_id)) {
			return false;
		}

		$column = trim($column);
		if (empty($column)) {
			return false;
		}

		$this->db->where($this->parent_key, $mem_id);
		$this->db->where($this->meta_key, $column);
		$data = array($this->meta_value => $value);
		$this->db->update($this->_table, $data);

		return true;
	}


	public function get_mem_id_by_social ($social_type = '', $social_id = '')
	{
		if (empty($social_type)) {
			return false;
		}
		if (empty($social_id)) {
			return false;
		}

		$key = $social_type . '_id';
		$where = array(
			'smt_key' => $key,
			'smt_value' => $social_id
		);
		$info = $this->get_one('', '', $where);

		return isset($info['mem_id']) ? $info['mem_id'] : false;
	}


	public function get_social_id_by_mem_id ($social_type = '', $mem_id = 0)
	{
		if (empty($social_type)) {
			return false;
		}
		$mem_id = (int) $mem_id;
		if (empty($mem_id) OR $mem_id < 1) {
			return false;
		}

		$key = $social_type . '_id';
		$where = array(
			'smt_key' => $key,
			'mem_id' => $mem_id
		);
		$info = $this->get_one('', '', $where);

		return isset($info['smt_value']) ? $info['smt_value'] : false;
	}
}
