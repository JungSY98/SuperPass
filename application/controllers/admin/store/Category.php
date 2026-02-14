<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CB_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->helper(['url','form']);
        $this->load->library(['session','form_validation','upload']);
        $this->load->model('Store_category_model','cat');
    }

    public function index() {
        $view = [
            'rows'      => $this->cat->list_all(false),
            'csrf_name' => $this->security->get_csrf_token_name(),
            'csrf_hash' => $this->security->get_csrf_hash(),
        ];
		/**
		 * 어드민 레이아웃을 정의합니다
		 */
		$layoutconfig = array('layout' => 'layout', 'skin' => 'category_list');
		$view['layout'] = $this->managelayout->admin($layoutconfig, $this->cbconfig->get_device_view_type());
		$this->data = $view;
		$this->layout = element('layout_skin_file', element('layout', $view));
		$this->view = element('view_skin_file', element('layout', $view));
    }

    public function edit($cat_id=0) {
        $row = $cat_id ? $this->cat->get($cat_id) : [];
        $view = [
            'row'       => $row,
            'csrf_name' => $this->security->get_csrf_token_name(),
            'csrf_hash' => $this->security->get_csrf_hash(),
        ];
		/**
		 * 어드민 레이아웃을 정의합니다
		 */
		$layoutconfig = array('layout' => 'layout', 'skin' => 'category_form');
		$view['layout'] = $this->managelayout->admin($layoutconfig, $this->cbconfig->get_device_view_type());
		$this->data = $view;
		$this->layout = element('layout_skin_file', element('layout', $view));
		$this->view = element('view_skin_file', element('layout', $view));
    }

    public function save() {
        if (!$this->input->post()) show_404();

        $cat_id = (int)$this->input->post('cat_id', true);
        $this->form_validation->set_rules('code','코드','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('name_kr','한글명','trim|required|max_length[100]');
        $this->form_validation->set_rules('name_en','영문명','trim|required|max_length[100]');

        if(!$this->form_validation->run()){
            return $this->edit($cat_id);
        }

        // 파일 업로드(선택)
        $icon_img = $this->input->post('icon_img_old', true);
        if (!empty($_FILES['icon_img']['name'])) {
            $conf = [
                'upload_path'   => FCPATH.'uploads/category/',
                'allowed_types' => 'png|jpg|jpeg|webp|svg',
                'encrypt_name'  => TRUE,
                'max_size'      => 4096,
            ];
            if (!is_dir($conf['upload_path'])) @mkdir($conf['upload_path'],0777,true);
            $this->upload->initialize($conf);
            if ($this->upload->do_upload('icon_img')) {
                $up       = $this->upload->data();
                $icon_img = $up['file_name'];
            } else {
                $data['upload_error'] = $this->upload->display_errors('','');
            }
        }

        $payload = [
            'code'       => trim($this->input->post('code', true)),
            'name_kr'    => trim($this->input->post('name_kr', true)),
            'name_en'    => trim($this->input->post('name_en', true)),
            'icon_img'   => $icon_img,
            'color_hex'  => $this->input->post('color_hex', true) ?: null,
            'is_use'     => $this->input->post('is_use', true)=='Y' ? 'Y':'N',
            'sort_order' => strlen($this->input->post('sort_order', true)) ? (int)$this->input->post('sort_order', true) : null,
        ];

        if ($cat_id) $this->cat->update($cat_id, $payload);
        else         $cat_id = $this->cat->insert($payload);

        redirect('admin/store/category');
    }

    public function delete($cat_id) {
        $this->cat->delete((int)$cat_id);
        redirect('admin/store/category');
    }

    /* ------- Ajax: 드래그 정렬 ------- */
    public function reorder() {
        if (!$this->input->is_ajax_request()) show_404();
        $ids = $this->input->post('ids');
        $ok  = $this->cat->reorder($ids);
        $this->json(['ok'=>$ok]);
    }

    /* ------- Ajax: 사용여부 토글 ------- */
    public function toggle() {
        if (!$this->input->is_ajax_request()) show_404();
        $id = (int)$this->input->post('id');
        $to = $this->input->post('use')==='Y';
        $ok = $this->cat->toggle_use($id, $to);
        $this->json(['ok'=>$ok]);
    }

    /* ------- Ajax: 인라인 필드 업데이트(code/name/color 등) ------- */
    public function inline() {
        if (!$this->input->is_ajax_request()) show_404();
        $id    = (int)$this->input->post('id');
        $field = $this->input->post('field', true);
        $value = $this->input->post('value', true);

        $allow = ['code','name_kr','name_en','color_hex','sort_order'];
        if (!in_array($field,$allow)) $this->json(['ok'=>false,'msg'=>'not allowed']);

        if ($field==='sort_order') $value = (int)$value;
        $ok = $this->cat->update($id, [$field=>$value]);
        $this->json(['ok'=>$ok, 'value'=>$value]);
    }

    /* ------- Ajax: 아이콘 업로드 ------- */
    public function upload_icon() {
        if (!$this->input->is_ajax_request()) show_404();
        $conf = [
            'upload_path'   => FCPATH.'uploads/category/',
            'allowed_types' => 'png|jpg|jpeg|webp|svg',
            'encrypt_name'  => TRUE,
            'max_size'      => 4096,
        ];
        if (!is_dir($conf['upload_path'])) @mkdir($conf['upload_path'],0777,true);
        $this->upload->initialize($conf);
        if ($this->upload->do_upload('file')) {
            $up = $this->upload->data();
            $this->json(['ok'=>true, 'file'=>$up['file_name']]);
        } else {
            $this->json(['ok'=>false, 'msg'=>$this->upload->display_errors('','')]);
        }
    }

    /* ------- Public API: 프론트 매핑 제공 ------- */
    public function api_list() {
        $rows = $this->cat->list_all(true);
        // 프론트에서 code→icon 매핑에 바로 쓰도록 최소 필드만
        $out = array_map(function($r){
            return [
                'cat_id' => (int)$r['cat_id'],
                'code'   => $r['code'],
                'name_kr'=> $r['name_kr'],
                'name_en'=> $r['name_en'],
                'icon'   => $r['icon_img'] ? '/uploads/category/'.$r['icon_img'] : null,
                'color'  => $r['color_hex'],
            ];
        }, $rows);
        $this->output->set_content_type('application/json')->set_output(json_encode($out));
    }

    private function json($arr){ $this->output->set_content_type('application/json')->set_output(json_encode($arr)); }
}
