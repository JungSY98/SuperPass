<div class="box">
<div class="box-header">
<div class="container py-4">
  <h1 class="h4 mb-3">분류 <?= !empty($row)?'수정':'등록' ?></h1>

  <form method="post" action="<?= site_url('admin/store/category/save'); ?>" enctype="multipart/form-data" class="card p-3">
    <input type="hidden" name="<?= $csrf_name; ?>" value="<?= $csrf_hash; ?>">
    <input type="hidden" name="cat_id" value="<?= (int)($row['cat_id'] ?? 0); ?>">
    <input type="hidden" name="icon_img_old" value="<?= html_escape($row['icon_img'] ?? ''); ?>">

    <div class="row g-3">
      <div class="col-md-4">
        <label class="form-label">코드 (영문/슬러그)</label>
        <input type="text" class="form-control" name="code" value="<?= html_escape($row['code'] ?? ''); ?>" required>
      </div>
      <div class="col-md-4">
        <label class="form-label">한글명</label>
        <input type="text" class="form-control" name="name_kr" value="<?= html_escape($row['name_kr'] ?? ''); ?>" required>
      </div>
      <div class="col-md-4">
        <label class="form-label">영문명</label>
        <input type="text" class="form-control" name="name_en" value="<?= html_escape($row['name_en'] ?? ''); ?>" required>
      </div>

      <div class="col-md-4">
        <label class="form-label">아이콘 이미지</label>
        <input type="file" class="form-control" name="icon_img" accept=".png,.jpg,.jpeg,.webp,.svg">
        <?php if (!empty($row['icon_img'])): ?>
          <div class="mt-2"><img src="/uploads/category/<?= html_escape($row['icon_img']); ?>" style="width:64px;height:64px;object-fit:contain;border:1px solid #eee;border-radius:8px;"></div>
        <?php endif; ?>
      </div>

      <div class="col-md-3">
        <label class="form-label">표시 색상 (선택)</label>
        <input type="text" class="form-control" name="color_hex" placeholder="#2EB899" value="<?= html_escape($row['color_hex'] ?? ''); ?>">
      </div>

      <div class="col-md-2">
        <label class="form-label">사용</label>
        <select class="form-select" name="is_use">
          <option value="Y" <?= (empty($row) || ($row['is_use']??'Y')==='Y')?'selected':''; ?>>Y</option>
          <option value="N" <?= (!empty($row) && ($row['is_use']??'')==='N')?'selected':''; ?>>N</option>
        </select>
      </div>

      <div class="col-md-3">
        <label class="form-label">정렬</label>
        <input type="number" class="form-control" name="sort_order" value="<?= (int)($row['sort_order'] ?? 0); ?>">
      </div>
    </div>

    <div class="mt-3 d-flex gap-2">
      <a href="<?= site_url('admin/category'); ?>" class="btn btn-secondary">목록</a>
      <button class="btn btn-primary">저장</button>
    </div>
  </form>
</div>
</div>
</div>

