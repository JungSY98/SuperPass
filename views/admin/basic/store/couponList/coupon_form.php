<div class="container py-4">
	<h1 class="h4 mb-3">쿠폰 <?= !empty($row) ? '수정' : '등록' ?></h1>

	<div class="card mb-3">
		<div class="card-body d-flex align-items-center gap-3">
			<img src="/uploads/store/<?= html_escape($cur_store['sMainIMG_Source'] ?: 'noimg.jpg'); ?>" style="width:56px;height:56px;object-fit:cover;border-radius:.5rem;">
			<div>
				<div class="fw-bold"><?= html_escape($cur_store['sNameKR'] ?: $cur_store['sNameEN']); ?></div>
				<div class="text-muted small">기본할인: <?= html_escape($cur_store['dcAmount']); ?><?= $cur_store['dcType']==='%'?'%':'원'; ?> (코드: <?= html_escape($cur_store['storeCode']); ?>)</div>
			</div>
		</div>
	</div>

	<?= validation_errors('<div class="alert alert-danger small mb-3">','</div>'); ?>

	<form method="post" action="<?= site_url('admin/store/couponList/save'); ?>" enctype="multipart/form-data" class="card">
		<div class="card-body">
			<input type="hidden" name="<?= $csrf_name; ?>" value="<?= $csrf_hash; ?>">
			<input type="hidden" name="store_no" value="<?= (int)$store_no; ?>">
			<input type="hidden" name="coupon_no" value="<?= (int)($row['coupon_no'] ?? 0); ?>">
			<input type="hidden" name="main_img_old" value="<?= html_escape($row['main_img'] ?? ''); ?>">

			<div class="row g-3">
				<div class="col-md-12">
					<label class="form-label">쿠폰 대상 <span class="text-danger">*</span></label>
			<label class="col-2 ms-5 bg-light p-3">
					<input type="radio" name="target_audience" value="ALL"	required <?=element('target_audience', $row)=='ALL' ? 'checked' :'' ?>> 전체
			</label>
			<label class="col-2 bg-light p-3">
					<input type="radio" name="target_audience" value="KR"	required <?=element('target_audience', $row)=='KR' ? 'checked' :'' ?>> 국내
			</label>
			<label class="col-2 bg-light p-3">
					<input type="radio" name="target_audience" value="INTL" required <?=element('target_audience', $row)=='INTL' ? 'checked' :'' ?>> 해외
			</label>
			

				</div>
				<div class="col-md-6">
					<label class="form-label">쿠폰명(KR) <span class="text-danger">*</span></label>
					<input type="text" name="title_kr" value="<?= html_escape($row['title_kr'] ?? ''); ?>" class="form-control" required>
				</div>
				<div class="col-md-6">
					<label class="form-label">쿠폰명(EN)</label>
					<input type="text" name="title_en" value="<?= html_escape($row['title_en'] ?? ''); ?>" class="form-control">
				</div>

				<div class="col-md-6">
					<label class="form-label">코드(미입력 시 상점코드 사용)</label>
					<input type="text" name="coupon_code" value="<?= html_escape($row['coupon_code'] ?? ''); ?>" class="form-control">
				</div>

				<div class="col-md-3">
					<label class="form-label">할인 타입</label>
					<select name="dc_type" class="form-select">
						<option value="">(상점 기본 사용)</option>
						<option value="%"	<?= (isset($row['dc_type']) && $row['dc_type']==='%') ? 'selected':''; ?>>%</option>
						<option value="￦" <?= (isset($row['dc_type']) && $row['dc_type']==='￦') ? 'selected':''; ?>>원(￦)</option>
						<option value="Gift" <?= (isset($row['dc_type']) && $row['dc_type']==='Gift') ? 'selected':''; ?>>사은품</option>
					</select>
				</div>
				<div class="col-md-3">
					<label class="form-label">할인 값</label>
					<input type="number" name="dc_amount" value="<?= html_escape($row['dc_amount'] ?? ''); ?>" class="form-control" placeholder="예: 10 또는 3000">
				</div>

				<div class="col-md-6">
					<label class="form-label">유효기간 시작</label>
					<input type="date" name="valid_from" value="<?= isset($row['valid_from']) && $row['valid_from'] ? date('Y-m-d', strtotime($row['valid_from'])) : ''; ?>" class="form-control">
				</div>
				<div class="col-md-6">
					<label class="form-label">유효기간 종료</label>
					<input type="date" name="valid_to" value="<?= isset($row['valid_to']) && $row['valid_to'] ? date('Y-m-d', strtotime($row['valid_to'])) : ''; ?>" class="form-control">
				</div>

				<div class="col-md-12">
					<label class="form-label">설명(KR)</label>
					<textarea name="desc_kr" rows="3" class="form-control"><?= html_escape($row['desc_kr'] ?? ''); ?></textarea>
				</div>
				<div class="col-md-12">
					<label class="form-label">설명(EN)</label>
					<textarea name="desc_en" rows="3" class="form-control"><?= html_escape($row['desc_en'] ?? ''); ?></textarea>
				</div>

				<div class="col-md-3">
					<label class="form-label">스탬프 적용</label>
					<select name="is_stamp" class="form-select">
						<option value="N" <?= (!empty($row) && $row['is_stamp']!=='Y') ? 'selected':''; ?>>미적용</option>
						<option value="Y" <?= (!empty($row) && $row['is_stamp']==='Y') ? 'selected':''; ?>>적용</option>
					</select>
				</div>
				<div class="col-md-3">
					<label class="form-label">사용 여부</label>
					<select name="is_use" class="form-select">
						<option value="Y" <?= (empty($row) || $row['is_use']==='Y') ? 'selected':''; ?>>사용</option>
						<option value="N" <?= (!empty($row) && $row['is_use']==='N') ? 'selected':''; ?>>중지</option>
						<option value="W" <?= (!empty($row) && $row['is_use']==='W') ? 'selected':''; ?>>임시 저장</option>
					</select>
				</div>

				<div class="col-md-3">
					<label class="form-label">정렬값</label>
					<input type="number" name="sort_order" value="<?= html_escape($row['sort_order'] ?? ''); ?>" class="form-control">
				</div>

				<div class="col-md-3">
					<label class="form-label">대표 이미지</label>
					<input type="file" name="main_img" class="form-control" accept=".jpg,.jpeg,.png,.webp">
					<?php if (!empty($row['main_img'])): ?>
						<div class="mt-2">
							<img src="/uploads/coupon/<?= html_escape($row['main_img']); ?>" style="width:120px;height:120px;object-fit:cover;border-radius:.5rem;">
						</div>
					<?php endif; ?>
				</div>
				<div class="row g-2 mt-2">
					<div class="col-md-12">
						<label class="form-label">카카오 링크</label>
						<input type="text" class="form-control" name="kakao_link" value="<?= html_escape($row['kakao_link'] ?? ''); ?>" placeholder="쿠폰 사용을 대체하는 카카오링크를 입력하여 주세요">
					</div>
				</div>
				<div class="row g-2 mt-2">
					<div class="col-md-4">
						<label class="form-label">총 사용 가능 횟수(전체)</label>
						<input type="number" class="form-control" name="limit_total" value="<?= html_escape($row['limit_total'] ?? ''); ?>" placeholder="예: 100">
					</div>
					<div class="col-md-4">
						<label class="form-label">회원 1인당 횟수</label>
						<input type="number" class="form-control" name="limit_per_member" value="<?= html_escape($row['limit_per_member'] ?? ''); ?>" placeholder="예: 1">
					</div>
					<div class="col-md-4">
						<label class="form-label">회원 제한 기간</label>
						<select class="form-select" name="limit_member_period">
							<?php $p = $row['limit_member_period'] ?? 'lifetime'; ?>
							<option value="lifetime" <?= $p==='lifetime'?'selected':''; ?>>평생 1회</option>
							<option value="day"			<?= $p==='day'?'selected':''; ?>>하루</option>
							<option value="week"		 <?= $p==='week'?'selected':''; ?>>1주</option>
							<option value="month"		<?= $p==='month'?'selected':''; ?>>1달</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer d-flex gap-2">
			<a href="<?= site_url('admin/store/couponList/store/'.$store_no); ?>" class="btn btn-secondary">목록</a>
			<button type="submit" class="btn btn-primary">저장</button>
		</div>
	</form>
</div>
</body>
</html>
