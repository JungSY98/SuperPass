<div class="container-fluid py-4">
  <h1 class="h4 mb-3">쿠폰 사용 기록</h1>

  <form class="card mb-3 p-3" method="get">
    <div class="row g-2 align-items-end">
      <div class="col-md-2">
        <label class="form-label">Store No</label>
        <input type="number" class="form-control" name="store_no" value="<?= (int)$store_no; ?>" placeholder="예: 1">
      </div>
      <div class="col-md-2">
        <label class="form-label">Coupon No</label>
        <input type="number" class="form-control" name="coupon_no" value="<?= (int)($filters['coupon_no'] ?? 0); ?>">
      </div>
      <div class="col-md-2">
        <label class="form-label">Member ID</label>
        <input type="number" class="form-control" name="mem_id" value="<?= (int)($filters['mem_id'] ?? 0); ?>">
      </div>
      <div class="col-md-2">
        <label class="form-label">From</label>
        <input type="date" class="form-control" name="from" value="<?= html_escape($filters['from'] ?? ''); ?>">
      </div>
      <div class="col-md-2">
        <label class="form-label">To</label>
        <input type="date" class="form-control" name="to" value="<?= html_escape($filters['to'] ?? ''); ?>">
      </div>
      <div class="col-md-2">
        <button class="btn btn-dark w-100">검색</button>
      </div>
    </div>
  </form>

  <div class="card">
    <div class="table-responsive">
      <table class="table table-sm table-striped align-middle">
        <thead class="table-light">
          <tr>
            <th>Time</th>
            <th>Mem</th>
            <th>Store</th>
            <th>Coupon</th>
            <th class="text-end">원금액</th>
            <th class="text-end">할인액</th>
            <th class="text-end">결제액</th>
            <th>출처</th>
            <th>타입/값</th>
            <th>Device</th>
            <th>Browser</th>
            <th>IP</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($rows as $r): ?>
          <tr>
            <td class="small text-muted"><?= html_escape($r['used_at']); ?></td>
            <td><?= (int)$r['mem_id']; ?></td>
            <td><?= (int)$r['store_no']; ?></td>
            <td><?= $r['coupon_no'] ? (int)$r['coupon_no'] : '-'; ?></td>
            <td class="text-end"><?= number_format($r['price_orig']); ?></td>
            <td class="text-end"><?= number_format($r['discount']); ?></td>
            <td class="text-end fw-semibold"><?= number_format($r['price_pay']); ?></td>
            <td><span class="badge <?= $r['dc_source']=='COUPON'?'text-bg-primary':'text-bg-secondary'; ?>"><?= html_escape($r['dc_source']); ?></span></td>
            <td><?= html_escape($r['dc_type']).' / '.number_format($r['dc_amount']); ?></td>
            <td><?= html_escape($r['device']); ?></td>
            <td><?= html_escape($r['browser']); ?></td>
            <td class="small text-muted"><?= html_escape($r['ip']); ?></td>
          </tr>
          <?php endforeach; ?>
          <?php if (empty($rows)): ?>
          <tr><td colspan="12" class="text-center text-muted py-4">검색 결과가 없습니다.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
