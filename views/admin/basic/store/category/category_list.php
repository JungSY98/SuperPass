<style>
  .drag-handle{ cursor:grab; }
  .row-item{ transition: background .2s ease; }
  .row-item.highlight{ background:#fffdf0; }
  .icon-preview{ width:36px;height:36px;object-fit:contain;border-radius:8px;border:1px solid #eee;background:#fff; }
  .inline-edit{ min-width: 120px; }
</style>
<div class="box">
<div class="box-header">
<div class="container-fluid py-3">

  <div class="d-flex align-items-center mb-3">
    <h1 class="h4 mb-0">상점 분류 관리</h1>
    <div class="ms-auto">
      <a href="<?= site_url('admin/store/category/create'); ?>" class="btn btn-primary">+ 새 분류</a>
    </div>
  </div>

  <div class="card">
    <div class="table-responsive">
      <table class="table align-middle mb-0" id="tblCat">
        <thead class="table-light">
          <tr>
            <th style="width:44px;"></th>
            <th style="width:70px;">아이콘</th>
            <th style="width:160px;">코드</th>
            <th>한글명</th>
            <th>영문명</th>
            <th style="width:110px;">색상</th>
            <th style="width:90px;">사용</th>
            <th style="width:110px;">정렬</th>
            <th style="width:140px;">관리</th>
          </tr>
        </thead>
        <tbody id="catBody">
          <?php foreach ($rows as $r): ?>
          <tr class="row-item" data-id="<?= (int)$r['cat_id'] ?>">
            <td class="text-muted drag-handle"><i class="fa fa-bars"></i></td>
            <td>
              <img src="<?= $r['icon_img'] ? '/uploads/category/'.$r['icon_img'] : '/assets/images/noimg.png' ?>" class="icon-preview me-2" id="icon-<?= $r['cat_id'] ?>">
              <!-- <button class="btn btn-sm btn-outline-secondary btnIcon" data-id="<?= $r['cat_id'] ?>">변경</button> -->
            </td>
            <td><input class="form-control form-control-sm inline-edit in-code" value="<?= html_escape($r['code']) ?>"></td>
            <td><input class="form-control form-control-sm inline-edit in-name-kr" value="<?= html_escape($r['name_kr']) ?>"></td>
            <td><input class="form-control form-control-sm inline-edit in-name-en" value="<?= html_escape($r['name_en']) ?>"></td>
            <td><input class="form-control form-control-sm inline-edit in-color" value="<?= html_escape($r['color_hex']) ?>" placeholder="#2EB899"></td>
            <td>
              <div class="form-check form-switch">
                <input class="form-check-input chkUse" type="checkbox" <?= ($r['is_use']==='Y'?'checked':'') ?>>
              </div>
            </td>
            <td><input class="form-control form-control-sm inline-edit in-sort" value="<?= (int)$r['sort_order'] ?>"></td>
            <td>
              <a href="<?= site_url('admin/store/category/edit/'.$r['cat_id']); ?>" class="btn btn-sm btn-outline-primary">수정</a>
              <a href="<?= site_url('admin/store/category/delete/'.$r['cat_id']); ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('삭제하시겠습니까?');">삭제</a>
            </td>
          </tr>
          <?php endforeach;?>
        </tbody>
      </table>
    </div>
  </div>

</div>

<!-- 아이콘 업로드 input (숨김) -->
<input type="file" id="fileIcon" accept=".png,.jpg,.jpeg,.webp,.svg" class="d-none">
<script>
(function(){
  const CSRF_NAME = <?= json_encode($csrf_name); ?>;
  let   CSRF_HASH = <?= json_encode($csrf_hash); ?>;

  $.ajaxSetup({
    headers: {'X-Requested-With':'XMLHttpRequest'},
    beforeSend: function(_, s){
      if(s.type && s.type.toUpperCase()==='POST'){
        const pair = encodeURIComponent(CSRF_NAME)+'='+encodeURIComponent(CSRF_HASH);
        s.data = s.data ? (s.data+'&'+pair) : pair;
      }
    }
  });

  // jQuery UI Sortable: 드래그 정렬
  $("#catBody").sortable({
    handle: ".drag-handle",
    placeholder: "table-active",
    update: function(){
      const ids = $("#catBody tr").map(function(){ return $(this).data('id'); }).get();
      $.post('<?= site_url('admin/store/category/reorder'); ?>', {ids: ids}, function(resp){
        if(!resp.ok) alert('정렬 저장 실패');
      }, 'json');
    }
  });

  // 인라인 저장(디바운스)
  let timer = null;
  $("#catBody").on('input', '.inline-edit', function(){
    clearTimeout(timer);
    const $tr   = $(this).closest('tr');
    const id    = $tr.data('id');
    const $in   = $(this);
    const field = $in.hasClass('in-code') ? 'code'
                : $in.hasClass('in-name-kr') ? 'name_kr'
                : $in.hasClass('in-name-en') ? 'name_en'
                : $in.hasClass('in-color')   ? 'color_hex'
                : $in.hasClass('in-sort')    ? 'sort_order'
                : '';
    if(!field) return;

    $tr.addClass('highlight');
    timer = setTimeout(function(){
      $.post('<?= site_url('admin/store/category/inline'); ?>', {id:id, field:field, value:$in.val()}, function(resp){
        if(!resp.ok) alert('저장 실패');
        $tr.removeClass('highlight');
      }, 'json');
    }, 400);
  });

  // 사용여부 토글
  $("#catBody").on('change', '.chkUse', function(){
    const $tr = $(this).closest('tr'), id=$tr.data('id'), use=this.checked?'Y':'N';
    $.post('<?= site_url('admin/store/category/toggle'); ?>', {id:id, use:use}, function(resp){
      if(!resp.ok) alert('변경 실패');
    }, 'json');
  });

  // 아이콘 변경
  let targetId = null;
  $(".btnIcon").on('click', function(){
    targetId = $(this).data('id');
    $("#fileIcon").val('').trigger('click');
  });
  $("#fileIcon").on('change', function(){
    if(!this.files || !this.files[0]) return;
    const fd = new FormData();
    fd.append('file', this.files[0]);
    $.ajax({
      url: '<?= site_url('admin/store/category/upload_icon'); ?>',
      type: 'POST', data: fd, processData:false, contentType:false, dataType:'json',
      success: function(resp){
        if(resp.ok){
          // 인라인 저장
          $.post('<?= site_url('admin/store/category/inline'); ?>', {id:targetId, field:'icon_img', value:resp.file}, function(r){
            if(r.ok) $("#icon-"+targetId).attr('src','/uploads/category/'+resp.file);
          }, 'json');
        }else alert(resp.msg||'업로드 실패');
      }
    });
  });

})();
</script>
</div>
</div>