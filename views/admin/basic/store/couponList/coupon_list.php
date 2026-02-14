<div class="container py-4">
  <h1 class="h4 mb-3">쿠폰 관리</h1>

  <?php if ($cur_store): ?>
  <div class="card mb-3">
    <div class="card-body d-flex align-items-center gap-3">
      <img src="/uploads/store/<?= html_escape($cur_store['sMainIMG_Source'] ?: 'noimg.jpg'); ?>" style="width:64px;height:64px;object-fit:cover;border-radius:.5rem;">
      <div>
        <div class="fw-bold"><?= html_escape($cur_store['sNameKR'] ?: $cur_store['sNameEN']); ?></div>
        <div class="text-muted small">기본할인: <?= html_escape($cur_store['dcAmount']); ?><?= $cur_store['dcType']==='%'?'%':'원'; ?> (코드: <?= html_escape($cur_store['storeCode']); ?>)</div>
      </div>
      <div class="ms-auto">
        <a class="btn btn-primary" href="<?= site_url('admin/store/couponList/create/'.$store_no); ?>">+ 쿠폰 등록</a>
      </div>
    </div>
  </div>

  <?php if (empty($rows)): ?>
    <div class="alert alert-warning">등록된 쿠폰이 없습니다. “+ 쿠폰 등록”을 눌러 추가하세요.</div>
  <?php else: ?>
  <div class="card">
    <div class="table-responsive">
      <table class="table align-middle mb-0">
        <thead class="table-light">
        <tr>
          <th style="width:100px;">이미지</th>
          <th>쿠폰명</th>
          <th>대상</th>
		  <th>코드</th>
          <th>할인정보</th>
          <th>기간</th>
          <th>사용여부</th>
          <th class="text-end">관리</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($rows as $r): ?>
          <tr>
            <td><img src="/uploads/coupon/<?= html_escape($r['main_img'] ?: ''); ?>" style="width:80px;height:80px;object-fit:cover;border-radius:.5rem;"></td>
            <td class="fw-semibold"><?= html_escape($r['title_kr']); ?><br><?= html_escape($r['title_en']); ?></td>
            <td><?=$r['target_audience']?></td>
			<td><?= html_escape($r['coupon_code']); ?></td>

            <td>
              <?php if ($r['dc_type'] && $r['dc_amount']): ?>
                <span class="badge text-bg-primary"><?= $r['dc_type']==='%' ? ($r['dc_amount'].'%') : (number_format($r['dc_amount']).'원'); ?></span>
              <?php else: ?>
                <span class="badge text-bg-secondary">상점 기본 사용</span>
              <?php endif; ?>
            </td>
            <td class="small text-muted"><?= ($r['valid_from'] ?: '-') .' ~ '. ($r['valid_to'] ?: '-') ?></td>
            <td><?= $r['is_use']==='Y' ? '<span class="badge text-bg-success">사용</span>' : '<span class="badge text-bg-secondary">중지</span>' ?></td>
            <td class="text-end">
              <a class="btn btn-sm btn-outline-primary" href="<?= site_url('admin/store/couponList/edit/'.$store_no.'/'.$r['coupon_no']); ?>">수정</a>
              <a class="btn btn-sm btn-outline-danger"  href="<?= site_url('admin/store/couponList/delete/'.$store_no.'/'.$r['coupon_no']); ?>" onclick="return confirm('삭제하시겠습니까?');">삭제</a>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
  <?php endif; ?>

  <?php else: ?>
    <div class="alert alert-info">상점을 먼저 선택하세요. (예: <code>/admin/coupon/store/1</code>)</div>
  <?php endif; ?>
</div>
