<style>
	:root{
		--brand: #0f766e;	 /* 헤더/강조 */
		--green: #12ac8a;	 /* 메인 포인트 */
		--ink:	 #111827;	 /* 진한 글자 */
		--muted: #6b7280;	 /* 보조 글자 */
		--line:	#e5e7eb;	 /* 라인 */
		--chip1: #eef7f3;	 /* heat 최소 */
		--chip5: #12ac8a;	 /* heat 최대 */
	}
	body{ background:#fff; }
	.page-title{ font-size:28px; font-weight:900; color:var(--ink); margin:10px 0 14px; }

	/* 필터 바 */
	#frmFilter .form-label{ font-weight:700; color:var(--muted); }
	.w-120{ width:120px; }
	.btn-preset .btn{ min-width:60px; }
	.btn-brand{ background:var(--brand); color:#fff; border:0; }
	.btn-brand:hover{ filter:brightness(.95); }

	/* 탭 */
	.nav-tabs .nav-link{ font-weight:900; color:var(--muted); }
	.nav-tabs .nav-link.active{ color:var(--ink); }

	/* KPI */
	.kpi .card{ border:1px solid var(--line); }
	.kpi .lbl{ color:var(--muted); font-weight:800; }
	.kpi .val{ font-weight:900; font-size:32px; letter-spacing:.2px; color:var(--ink); }

	/* 표 공통 */
	.table thead th{
		white-space:nowrap; user-select:none; cursor:pointer;
		color:var(--muted); font-weight:800; border-bottom:2px solid var(--line);
	}
	.table tfoot td{ background:#f9fafb; font-weight:900; }
	.table-sm th, .table-sm td{ vertical-align:middle; }
	.subtle{ color:var(--muted); }
	.group-title{
		font-weight:900; color:var(--ink);
		border-top:2px solid var(--ink); border-bottom:1px solid var(--line);
		background:#f9fafb; padding:.45rem .6rem; margin-top:.85rem;
	}

	/* 히트맵 */
	.legend-box{ display:flex; align-items:center; gap:8px; }
	.legend-chip{ width:20px; height:20px; border-radius:4px; border:1px solid var(--line); }
	.heat table{ table-layout:fixed; }
	.heat thead th{ position:sticky; top:0; background:#fff; z-index:2; }

	/* 토스트(에러) */
	#toastErr{ position:fixed; top:14px; right:14px; z-index:9999; display:none; }
	/* 숫자 가독성/정렬 */
	.num, .table td.text-end, .table tfoot td.text-end{
		font-variant-numeric: tabular-nums;
		font-feature-settings: 'tnum';
	}
</style>


<div class="page-title">사용통계</div>

<!-- ===== 필터 ===== -->
<form id="frmFilter" class="row gy-2 gx-3 align-items-end mb-3">
	<div class="col-auto">
		<label class="form-label">기간</label>
		<div class="d-flex gap-2">
			<input type="text" class="form-control form-control-sm datepicker" id="start" name="start" value="<?=html_escape($start)?>" placeholder="YYYY-MM-DD" style="width:120px;">
			<input type="text" class="form-control form-control-sm datepicker" id="end"	name="end"	 value="<?=html_escape($end)?>"	 placeholder="YYYY-MM-DD" style="width:120px;">
		</div>
	</div>
	<div class="col-auto">
		<label class="form-label">상점번호</label>
		<input type="number" class="form-control form-control-sm" name="store_no" value="<?=html_escape($store_no)?>" placeholder="ex) 4" style="width:120px;">
	</div>
	<div class="col-auto">
		<label class="form-label">쿠폰번호</label>
		<input type="number" class="form-control form-control-sm" name="coupon_no" value="<?=html_escape($coupon_no)?>" placeholder="ex) 10" style="width:120px;">
	</div>
	<div class="col-auto">
		<label class="form-label">스탬프</label>
		<select class="form-select form-select-sm" name="is_stamp" style="width:120px;">
			<option value=""	<?=($is_stamp===''?'selected':'')?>>전체</option>
			<option value="1" <?=($is_stamp==='1'?'selected':'')?>>스탬프만</option>
			<option value="0" <?=($is_stamp==='0'?'selected':'')?>>스탬프 제외</option>
		</select>
	</div>

	<!-- 프리셋 -->
	<div class="col-auto">
		<label class="form-label d-block">프리셋</label>
		<div class="btn-group btn-group-sm" role="group">
			<button class="btn btn-outline-secondary" type="button" data-preset="today">오늘</button>
			<button class="btn btn-outline-secondary" type="button" data-preset="7">7일</button>
			<button class="btn btn-outline-secondary" type="button" data-preset="30">30일</button>
			<button class="btn btn-outline-secondary" type="button" data-preset="month">이번달</button>
		</div>
	</div>

	<div class="col-auto">
		<label class="form-label d-block">&nbsp;</label>
		<button class="btn btn-sm btn-brand" type="submit">적용</button>
		<button id="btnCSV"	class="btn btn-sm btn-outline-secondary" type="button">CSV</button>
		<!-- <button id="btnXLSX" class="btn btn-sm btn-outline-success"	 type="button">XLSX</button> -->
	</div>
</form>

<!-- ===== 탭 ===== -->
<ul class="nav nav-tabs">
	<li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab1" type="button">Summary</button></li>
	<li class="nav-item"><button class="nav-link"				 data-bs-toggle="tab" data-bs-target="#tab2" type="button">일자 × 시간대 사용량</button></li>
	<li class="nav-item"><button class="nav-link"				 data-bs-toggle="tab" data-bs-target="#tab3" type="button">상점(그룹)별 쿠폰 할인총액 / 사용량</button></li>
</ul>

<div class="tab-content">

	<!-- ========== TAB1: 대시보드 ========== -->
	<div class="tab-pane fade show active" id="tab1">
		<!-- KPI -->
		<div class="row g-4 kpi my-1">
			<div class="col-lg-4 col-md-6">
				<div class="card p-3">
					<div class="lbl">총 사용수</div>
					<div class="val" id="kpiUsage">0</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-6"><div class="card p-3"><div class="lbl">총 할인액</div><div class="val" id="kpiDiscount">0</div></div></div>
			<div class="col-lg-4 col-md-6"><div class="card p-3"><div class="lbl">총 결제액</div><div class="val" id="kpiPay">0</div></div></div>
		</div>


		<!-- ADD: 파생 KPI -->
		<div class="row g-3 kpi my-4">
			<div class="col-lg-3 col-md-6">
				<div class="card p-3">
					<div class="lbl">객단가(평균 결제액)</div>
					<div class="val num" id="kpiAvgPay">0</div>
				</div>
				</div>
				<div class="col-lg-3 col-md-6">
				<div class="card p-3">
					<div class="lbl">평균 할인액</div>
					<div class="val num" id="kpiAvgDc">0</div>
				</div>
				</div>
				<div class="col-lg-3 col-md-6">
				<div class="card p-3">
					<div class="lbl">평균 할인율</div>
					<div class="val num" id="kpiAvgRate">0%</div>
				</div>
				</div>
				<div class="col-lg-3 col-md-6">
				<div class="card p-3">
					<div class="lbl">회원당 평균 사용수 <span class="subtle">(재방문 지표)</span></div>
					<div class="val num" id="kpiPerMember">0</div>
				</div>
			</div>
		</div>




		<div class="row g-3" id="kpiRow">
		<!-- KPI Cards -->
		</div>

		<div class="row g-3 mt-1 mb-3">
		<div class="col-xl-3">
			<div class="card h-100">
			<div class="card-header fw-bold">Top 5 Age (Clicks)</div>
			<div class="card-body"><ul id="ageList" class="mb-0"></ul></div>
			</div>
		</div>
		<div class="col-xl-3">
			<div class="card h-100">
			<div class="card-header fw-bold">Top 5 Nation (Clicks)</div>
			<div class="card-body"><ul id="nationList" class="mb-0"></ul></div>
			</div>
		</div>
		<div class="col-xl-3">
			<div class="card h-100">
			<div class="card-header fw-bold">Top 5 Purpose (Clicks)</div>
			<div class="card-body"><ul id="purposeList" class="mb-0"></ul></div>
			</div>
		</div>
	  <div class="col-xl-3">
		<div class="card h-100">
		  <div class="card-header fw-bold">Top 5 Gender (Clicks)</div>
		  <div class="card-body"><ul id="genderClicksList" class="mb-0"></ul></div>
		</div>
	  </div>

		</div>

		<div class="row g-3 mt-1">
		<div class="col-xl-6">
			<div class="card h-100">
			<div class="card-header fw-bold">Top Store (unique coupon users)</div>
			<div class="card-body"><div id="topStore">-</div></div>
			</div>
		</div>
		<div class="col-xl-6">
			<div class="card h-100">
			<div class="card-header fw-bold">Top Coupon (uses)</div>
			<div class="card-body"><div id="topCoupon">-</div></div>
			</div>
		</div>
		</div>

		<br>
		<!-- [추가] 회원 분포 (회원 기준 Top5) -->
		<div class="row g-3 mt-1">
		  <div class="col-xl-3">
			<div class="card h-100">
			  <div class="card-header fw-bold">Members – Top 5 Age</div>
			  <div class="card-body"><ul id="memAgeList" class="mb-0"></ul></div>
			</div>
		  </div>
		  <div class="col-xl-3">
			<div class="card h-100">
			  <div class="card-header fw-bold">Members – Top 5 Nation</div>
			  <div class="card-body"><ul id="memNationList" class="mb-0"></ul></div>
			</div>
		  </div>
		  <div class="col-xl-3">
			<div class="card h-100">
			  <div class="card-header fw-bold">Members – Top 5 Purpose</div>
			  <div class="card-body"><ul id="memPurposeList" class="mb-0"></ul></div>
			</div>
		  </div>
		<div class="col-xl-3">
			<div class="card h-100">
			  <div class="card-header fw-bold">Top 5 Gender (Usage)</div>
			  <div class="card-body"><ul id="genderUsageList" class="mb-0"></ul></div>
			</div>
		</div>
		</div>

		<br>


		<!-- TOP 표 -->
		<div class="row g-3">
			<div class="col-lg-6">
				<div class="card p-3">
					<h6 class="mb-2">상점 TOP 30</h6>
					<table class="table table-sm table-striped" id="tblTopStore">
						<thead>
							<tr>
								<th data-key="name">상점</th>
								<th data-key="usage_cnt"		 class="text-end">사용수</th>
								<th data-key="discount_sum"	class="text-end">할인액</th>
								<th data-key="pay_sum"			 class="text-end">결제액</th>
							</tr>
						</thead>
						<tbody></tbody>
						<tfoot><tr>
							<td class="text-end"><b>합계</b></td>
							<td id="sumStoreCnt"			class="text-end">0</td>
							<td id="sumStoreDiscount" class="text-end">0</td>
							<td id="sumStorePay"			class="text-end">0</td>
						</tr></tfoot>
					</table>
					<div class="subtle">※ 헤더 클릭으로 정렬</div>
				</div>
			</div>

			<div class="col-lg-6">
				<div class="card p-3">
					<h6 class="mb-2">쿠폰 TOP 30</h6>
					<table class="table table-sm table-striped" id="tblTopCoupon">
						<thead>
							<tr>
								<th data-key="title">쿠폰</th>
								<th data-key="usage_cnt"		 class="text-end">사용수</th>
								<th data-key="discount_sum"	class="text-end">할인액</th>
								<th data-key="pay_sum"			 class="text-end">결제액</th>
							</tr>
						</thead>
						<tbody></tbody>
						<tfoot><tr>
							<td class="text-end"><b>합계</b></td>
							<td id="sumCouponCnt"			class="text-end">0</td>
							<td id="sumCouponDiscount" class="text-end">0</td>
							<td id="sumCouponPay"			class="text-end">0</td>
						</tr></tfoot>
					</table>
					<div class="subtle">※ 헤더 클릭으로 정렬</div>
				</div>
			</div>

			<div class="col-lg-12">
				<div class="card p-3">
					<h6 class="mb-2">디바이스/브라우저</h6>
					<canvas id="chartDevice" height="120"></canvas>
				</div>
			</div>
		</div>

		<!-- 브랜드/몰 -->
		<div class="row g-3 mt-2 d-none">
			<div class="col-lg-6">
				<div class="card p-3">
					<h6 class="mb-2">브랜드 그룹</h6>
					<table class="table table-sm table-striped" id="tblBrand">
						<thead><tr><th>브랜드</th><th class="text-end">사용수</th><th class="text-end">할인액</th><th class="text-end">결제액</th></tr></thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
			<div class="col-lg-6 d-none">
				<div class="card p-3">
					<h6 class="mb-2">몰 그룹</h6>
					<table class="table table-sm table-striped" id="tblMall">
						<thead><tr><th>몰</th><th class="text-end">사용수</th><th class="text-end">할인액</th><th class="text-end">결제액</th></tr></thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>

	</div><!-- /tab1 -->

	<!-- ========== TAB2: 히트맵 ========== -->
	<div class="tab-pane fade" id="tab2">
		<div class="d-flex justify-content-between align-items-center my-2">
			<h6 class="mb-0">일자 × 시간대 사용량</h6>
			<div class="legend-box">
				<span class="legend-chip" style="background:#eef7f3"></span><small class="subtle">낮음</small>
				<span class="legend-chip" style="background:#bfe8d9"></span>
				<span class="legend-chip" style="background:#7dd7be"></span>
				<span class="legend-chip" style="background:#38c59f"></span>
				<span class="legend-chip" style="background:#12ac8a"></span><small class="subtle">높음</small>
			</div>
		</div>
		<div class="table-responsive heat">
			<table class="table table-sm table-bordered" id="tblHeat">
				<thead></thead><tbody></tbody><tfoot></tfoot>
			</table>
		</div>
	</div><!-- /tab2 -->

	<!-- ========== TAB3: 기획문서1 (브랜드/몰 그룹 + 쿠폰 리스트) ========== -->
	<div class="tab-pane fade" id="tab3">
		<div class="card p-3">
			<div class="d-flex justify-content-between align-items-center">
				<h6 class="mb-0">상점(그룹)별 쿠폰 할인총액 / 사용량</h6>
				<small class="subtle">그룹 헤더에 소계, 하단 합계 표시</small>
			</div>
			<div id="couponListWrap" class="mt-2"><!-- JS render --></div>
		</div>
	</div><!-- /tab3 -->

</div><!-- /tab-content -->

<!-- 토스트(에러) -->
<div id="toastErr" class="alert alert-danger shadow-sm" role="alert"></div>

<!-- libs -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>

<script>

/* ===== 공통 헬퍼 ===== */
$('.datepicker').datepicker({ dateFormat:'yy-mm-dd' });
function nf(v){
	// 숫자/문자 모두 안전하게 'ko-KR' 로 고정 포맷
	const n = Number(v) || 0;
	return n.toLocaleString('ko-KR');
}
function q() { return $('#frmFilter').serialize(); }
function showErr(msg){
	$('#toastErr').text(msg).fadeIn(120);
	setTimeout(()=>$('#toastErr').fadeOut(300), 2500);
}

/* REPLACE: 프리셋 핸들러 */
(function(){
	function fmt(d){
		const y = d.getFullYear();
		const m = ('0'+(d.getMonth()+1)).slice(-2);
		const day = ('0'+d.getDate()).slice(-2);
		return `${y}-${m}-${day}`;
	}
	function setPreset(range){
		// 오늘(로컬 자정) 기준
		const now = new Date();
		// 자정 기준으로 고정해서 시간대 영향 제거
		let end	 = new Date(now.getFullYear(), now.getMonth(), now.getDate());
		let start = new Date(end.getTime());
		if (range === '7'){			// 오늘 포함 7일 => -6
			start.setDate(end.getDate() - 6);
		} else if (range === '30'){ // 오늘 포함 30일 => -29
			start.setDate(end.getDate() - 29);
		} else if (range === 'month'){ // 이번달
			start = new Date(end.getFullYear(), end.getMonth(), 1);
		} else { // today
			// start = end 그대로 (하루)
		}

		const s = fmt(start), e = fmt(end);
		// datepicker 내부 상태까지 갱신
		$('input[name=start]').datepicker('setDate', s).trigger('change');
		$('input[name=end]'	).datepicker('setDate', e).trigger('change');
	console.log($('input[name=start]').val(), $('input[name=end]').val());
		// 필요하면 콘솔 확인
		// console.log('[preset]', range, '=>', s, '~', e);

		$('#frmFilter').trigger('submit');
	}

	$(document).off('click.preset','[data-preset]').on('click.preset','[data-preset]', function(){
		setPreset($(this).data('preset'));	 // today / 7 / 30 / month


	});
})();

// Export
$('#btnCSV').on('click',	()=> location.href='/admin/stat/couponStatics/export/csv?'	+ q());
$('#btnXLSX').on('click', ()=> location.href='/admin/stat/couponStatics/export/xlsx?' + q());

/* ===== Ajax Loaders ===== */
function loadSummary(){
	const qStr = q();
	// 전체 요약
	$.getJSON('/admin/stat/couponStatics/summary', qStr)
		.done(r=>{
			const usage = Number(r.usage_cnt)||0;
			const member= Number(r.member_cnt)||0;
			const dc		= Number(r.discount_sum)||0;
			const pay	 = Number(r.pay_sum)||0;

			// 원본 KPI
			$('#kpiUsage').text(nf(usage));
			$('#kpiMember').text(nf(member));
			$('#kpiDiscount').text(nf(dc));
			$('#kpiPay').text(nf(pay));

			// 파생 KPI
			const avgPay	= usage ? (pay / usage) : 0;
			const avgDc	 = usage ? (dc	/ usage) : 0;
			const avgRate = (dc + pay) ? (dc / (dc + pay) * 100) : 0;
			const perMem	= member ? (usage / member) : 0;

			$('#kpiAvgPay').text(nf(Math.round(avgPay)));
			$('#kpiAvgDc').text(nf(Math.round(avgDc)));
			$('#kpiAvgRate').text(avgRate.toFixed(1) + '%');
			$('#kpiPerMember').text(perMem.toFixed(2));

			// (선택) 스탬프 비중: 스탬프 요약 별도 호출하여 계산
			const qArr = $('#frmFilter').serializeArray();
			const qStamp = $.param(qArr.filter(x=>x.name!=='is_stamp').concat([{name:'is_stamp', value:1}]));
			$.getJSON('/admin/stat/couponStatics/summary', qStamp).done(rs=>{
				const stampShare = usage ? ( (Number(rs.usage_cnt)||0) / usage * 100 ) : 0;
				// 원하시면 카드 추가해서 표시하거나, KPI 평균 할인율 옆에 작은 배지로 표시
				$('#kpiAvgRate').append(` <span class="badge text-bg-light subtle">스탬프 ${stampShare.toFixed(1)}%</span>`);
			});
		})
		.fail(()=> showErr('요약 데이터 조회 실패'));
}


// 표 정렬
function bindSort($table){
	const $b=$table.find('tbody');
	$table.find('thead th').off('click').on('click', function(){
		const key=$(this).data('key'); if(!key) return;
		const d=$(this).data('desc')==='1';
		const rows = $b.children('tr').get();
		rows.sort((a,b)=>{
			const A=$(a).data(key), B=$(b).data(key);
			const Av = isNaN(+A) ? (A||'') : +A;
			const Bv = isNaN(+B) ? (B||'') : +B;
			return (Av>Bv?1:(Av<Bv?-1:0))*(d?-1:1);
		});
		$.each(rows,(_,r)=>$b.append(r));
		$(this).data('desc', d?0:1);
	});
}

function loadTopStore(){
	$.getJSON('/admin/stat/couponStatics/top-stores', q())
		.done(r=>{
			const $b=$('#tblTopStore tbody').empty();
			let sCnt=0,sDc=0,sPay=0;
			(r.rows||[]).forEach(x=>{
				sCnt+=x.usage_cnt|0; sDc+=x.discount_sum|0; sPay+=x.pay_sum|0;
				const name=x.sNameKR||x.sNameEN||('#'+x.store_no);
				$b.append(`<tr data-name="${name}" data-usage_cnt="${x.usage_cnt|0}" data-discount_sum="${x.discount_sum|0}" data-pay_sum="${x.pay_sum|0}">
					<td>${name}</td><td class="text-end">${nf(x.usage_cnt)}</td>
					<td class="text-end">${nf(x.discount_sum)}</td><td class="text-end">${nf(x.pay_sum)}</td></tr>`);
			});
			$('#sumStoreCnt').text(nf(sCnt)); $('#sumStoreDiscount').text(nf(sDc)); $('#sumStorePay').text(nf(sPay));
			bindSort($('#tblTopStore'));
		})
		.fail(()=> showErr('상점 TOP 조회 실패'));
}

let chartDevice=null;
function loadDevice(){
	$.getJSON('/admin/stat/couponStatics/device', q())
		.done(r=>{
			const labels=[], values=[];
			(r.rows||[]).forEach(x=>{
				labels.push((x.device||'unknown')+' / '+(x.browser||'unknown'));
				values.push(x.usage_cnt|0);
			});
			chartDevice && chartDevice.destroy();
			chartDevice = new Chart(document.getElementById('chartDevice'), {
				type:'bar',
				data:{ labels, datasets:[{label:'사용수', data:values, backgroundColor:'#12ac8a'}] },
				options:{
					responsive:true,
					plugins:{ legend:{display:false} },
					scales:{
					y:{
						beginAtZero:true,
						ticks:{ callback:(val)=> nf(val) }	 // ADD
					}
					}
				}
			});
		})
		.fail(()=> showErr('디바이스/브라우저 조회 실패'));
}

function loadTopCoupon(){
	$.getJSON('/admin/stat/couponStatics/top-coupons', q())
		.done(r=>{
			const $b=$('#tblTopCoupon tbody').empty();
			let sCnt=0,sDc=0,sPay=0;
			(r.rows||[]).forEach(x=>{
				sCnt+=x.usage_cnt|0; sDc+=x.discount_sum|0; sPay+=x.pay_sum|0;
				const ttl=x.title_kr||x.title_en||('#'+x.coupon_no);
				$b.append(`<tr data-title="${ttl}" data-usage_cnt="${x.usage_cnt|0}" data-discount_sum="${x.discount_sum|0}" data-pay_sum="${x.pay_sum|0}">
					<td>${ttl}</td><td class="text-end">${nf(x.usage_cnt)}</td>
					<td class="text-end">${nf(x.discount_sum)}</td><td class="text-end">${nf(x.pay_sum)}</td></tr>`);
			});
			$('#sumCouponCnt').text(nf(sCnt)); $('#sumCouponDiscount').text(nf(sDc)); $('#sumCouponPay').text(nf(sPay));
			bindSort($('#tblTopCoupon'));
		})
		.fail(()=> showErr('쿠폰 TOP 조회 실패'));
}

// Heatmap build
function buildHeat($tbl, rows){
	// rows: [{d:'YYYY-MM-DD', h:0..23, usage_cnt, discount_sum, pay_sum}, ...]
	const days=[...new Set((rows||[]).map(r=>r.d))].sort();

	// 인덱스화
	const byKey={};
	let maxCnt=0;
	rows.forEach(x=>{
		const k = `${x.d}|${x.h}`;
		const cnt = Number(x.usage_cnt)||0;
		byKey[k] = {
			cnt: cnt,
			dc : Number(x.discount_sum)||0,
			pay: Number(x.pay_sum)||0
		};
		if (cnt > maxCnt) maxCnt = cnt;
	});

	// 헤더
	const th=['<tr><th style="width:80px">시간\\날짜</th>'];
	days.forEach(d=> th.push(`<th>${d.slice(5)}</th>`));
	th.push('<th>합계</th></tr>');
	$tbl.find('thead').html(th.join(''));

	// 본문
	const tb=[];
	const colSum = days.map(_=>({cnt:0, dc:0, pay:0}));
	let grand = { cnt:0, dc:0, pay:0 };

	for(let h=0; h<24; h++){
		let rowSum = { cnt:0, dc:0, pay:0 };
		tb.push(`<tr><th>${h}시</th>`);
		days.forEach((d,idx)=>{
			const v = byKey[`${d}|${h}`] || {cnt:0,dc:0,pay:0};
			rowSum.cnt += v.cnt; rowSum.dc += v.dc; rowSum.pay += v.pay;
			colSum[idx].cnt += v.cnt; colSum[idx].dc += v.dc; colSum[idx].pay += v.pay;
			grand.cnt += v.cnt; grand.dc += v.dc; grand.pay += v.pay;

			// 칸표시: 기본은 '건수'만, title에 금액 툴팁
			const ratio = maxCnt ? (v.cnt/maxCnt) : 0;
			const a = 0.12 + 0.6*ratio;
			const bg = `rgba(18,172,138,${a})`;
			tb.push(
				`<td style="background:${bg}; text-align:center;"
						 title="사용: ${nf(v.cnt)}건\n할인: ${nf(v.dc)}원\n결제: ${nf(v.pay)}원">
					 ${v.cnt? nf(v.cnt):''}
				 </td>`
			);
		});
		tb.push(`<td class="text-end fw-bold" title="할인: ${nf(rowSum.dc)}원 / 결제: ${nf(rowSum.pay)}원">${nf(rowSum.cnt)}</td></tr>`);
	}
	$tbl.find('tbody').html(tb.join(''));

	// 푸터(열 합계) – 3행: 건수/할인/결제
	const foot = [];

	// ① 건수 합계
	let line = ['<tr><th>합계(건수)</th>'];
	days.forEach((_,i)=> line.push(`<td class="text-end fw-bold">${nf(colSum[i].cnt)}</td>`));
	line.push(`<td class="text-end fw-bold">${nf(grand.cnt)}</td></tr>`);
	foot.push(line.join(''));

	// ② 할인 합계
	line = ['<tr><th>합계(할인)</th>'];
	days.forEach((_,i)=> line.push(`<td class="text-end fw-bold">${nf(colSum[i].dc)}</td>`));
	line.push(`<td class="text-end fw-bold">${nf(grand.dc)}</td></tr>`);
	foot.push(line.join(''));

	// ③ 결제 합계
	line = ['<tr><th>합계(결제)</th>'];
	days.forEach((_,i)=> line.push(`<td class="text-end fw-bold">${nf(colSum[i].pay)}</td>`));
	line.push(`<td class="text-end fw-bold">${nf(grand.pay)}</td></tr>`);
	foot.push(line.join(''));

	$tbl.find('tfoot').html(foot.join(''));
}
function loadHeat(){	$.getJSON('/admin/stat/couponStatics/heatmap', q()).done(r=> buildHeat($('#tblHeat'),	r.rows||[])).fail(()=>showErr('히트맵 조회 실패')); }
function loadHeat2(){ $.getJSON('/admin/stat/couponStatics/heatmap', q()).done(r=> buildHeat($('#tblHeat2'), r.rows||[])).fail(()=>showErr('시간대 표 조회 실패')); }

// 기획문서1: 그룹+소계+합계
function loadCouponGrouped(){
	$.getJSON('/admin/stat/couponStatics/coupon-table', q())
		.done(r=>{
			const rows = r.rows||[];
			const g = {}; rows.forEach(x=>{ const store=x.store_kr||x.store_en||('#'+x.store_no); (g[store]=g[store]||[]).push(x); });

			const wrap = $('#couponListWrap').empty();
			let grandUsage=0, grandDiscount=0;

			Object.keys(g).sort().forEach(store=>{
				const arr = g[store]; const subU = arr.reduce((s,x)=>s+(x.usage_cnt|0),0); const subD = arr.reduce((s,x)=>s+(x.discount_sum|0),0);
				grandUsage+=subU; grandDiscount+=subD;

				wrap.append(`<div class="group-title">${store}</div>`);
				const tbl = $(`<table class="table table-sm table-striped mb-2">
					<thead><tr><th>쿠폰</th><th class="text-end">할인금액</th><th class="text-end">사용량</th></tr></thead>
					<tbody></tbody><tfoot><tr><td class="text-end"><b>소계</b></td><td class="text-end"><b>${nf(subD)}</b></td><td class="text-end"><b>${nf(subU)}</b></td></tr></tfoot>
				</table>`);
				const $b = tbl.find('tbody');
				arr.forEach(x=>{
					const ttl = x.title_kr || x.title_en || ('#'+x.coupon_no);
					$b.append(`<tr><td>${ttl}</td><td class="text-end">${nf(x.discount_sum)}</td><td class="text-end">${nf(x.usage_cnt)}</td></tr>`);
				});
				wrap.append(tbl);
			});

			wrap.append(`<div class="text-end fw-bold mt-1">합계 : 할인금액 ${nf(grandDiscount)} / 사용량 ${nf(grandUsage)}</div>`);
		})
		.fail(()=> showErr('쿠폰 리스트(그룹) 조회 실패'));
}

// 브랜드/몰
function loadBrand(){
	$.getJSON('/admin/stat/couponStatics/group/brand', q())
		.done(r=>{
			const $b=$('#tblBrand tbody').empty();
			(r.rows||[]).forEach(x=> $b.append(`<tr><td>${x.brand||'미지정'}</td><td class="text-end">${nf(x.usage_cnt)}</td><td class="text-end">${nf(x.discount_sum)}</td><td class="text-end">${nf(x.pay_sum)}</td></tr>`));
		})
		.fail(()=> showErr('브랜드 그룹 조회 실패'));
}
function loadMall(){
	$.getJSON('/admin/stat/couponStatics/group/mall', q())
		.done(r=>{
			const $b=$('#tblMall tbody').empty();
			(r.rows||[]).forEach(x=> $b.append(`<tr><td>${x.mall||'미지정'}</td><td class="text-end">${nf(x.usage_cnt)}</td><td class="text-end">${nf(x.discount_sum)}</td><td class="text-end">${nf(x.pay_sum)}</td></tr>`));
		})
		.fail(()=> showErr('몰 그룹 조회 실패'));
}

// submit → 모든 섹션 갱신
$('#frmFilter').on('submit', function(e){
	e.preventDefault();
	loadSummary(); loadTopStore(); loadTopCoupon(); loadDevice();
	loadHeat(); loadHeat2(); loadCouponGrouped(); loadBrand(); loadMall();
}).trigger('submit');


loadSummary2();

function loadSummary2(){
  const from = document.getElementById('start').value;
  const to   = document.getElementById('end').value;
  fetch(`/admin/stat/couponStatics/summary_data?from=${encodeURIComponent(from)}&to=${encodeURIComponent(to)}`)
    .then(r=>r.json()).then(drawSummary);
}

function drawSummary(d){
  const kpiRow = document.getElementById('kpiRow');
  kpiRow.innerHTML = '';
  const KPIS = [
    ['총 회원수', d.kpis.total_members],
    ['상점클릭 활성사용자', d.kpis.active_click_members],
    ['쿠폰 이용자수', d.kpis.coupon_users],
    ['상점클릭 수', d.kpis.clicks_total],
    ['쿠폰 사용 수', d.kpis.uses_total],
    ['전환율 %', d.kpis.conversion_percent + '%'],
  ];
  KPIS.forEach(([label,val])=>{
    const col = document.createElement('div'); col.className='col-md-4 col-xl-2';
    col.innerHTML = `<div class="card h-100"><div class="card-body"><div class="small text-muted">${label}</div><div class="display-6">${val}</div></div></div>`;
    kpiRow.appendChild(col);
  });
  // [추가] 회원 KPI
  const memberKpiRow = document.getElementById('memberKpiRow');
  if (memberKpiRow) {
    memberKpiRow.innerHTML = '';
    const MKPIS = [
      ['New Members', d.member_kpis.new_members],
      ['Active Login Members', d.member_kpis.active_login_members],
      ['Domestic Members', d.member_kpis.domestic_members],
      ['Foreign Members', d.member_kpis.foreign_members],
    ];
    MKPIS.forEach(([label,val])=>{
      const col = document.createElement('div'); col.className='col-md-3 col-xl-3';
      col.innerHTML = `<div class="card h-100"><div class="card-body"><div class="small text-muted">${label}</div><div class="display-6">${val}</div></div></div>`;
      memberKpiRow.appendChild(col);
    });
  }
  function fillList(id, arr){
    const el = document.getElementById(id); el.innerHTML='';
    (arr||[]).forEach(it=>{
      const li=document.createElement('li');
      li.textContent = `${it.label} — ${it.cnt}`;
      el.appendChild(li);
    });
  }
  fillList('ageList', d.distrib.age);
  fillList('nationList', d.distrib.nation);
  fillList('purposeList', d.distrib.purpose);
  fillList('memAgeList', d.member_distrib.age);
  fillList('memNationList', d.member_distrib.nation);
  fillList('memPurposeList', d.member_distrib.purpose);
  fillList('genderClicksList', (d.gender && d.gender.clicks) ? d.gender.clicks : []);
  fillList('genderUsageList',  (d.gender && d.gender.usage)  ? d.gender.usage  : []);

  document.getElementById('topStore').textContent = d.top_store ? `${d.top_store.store} — ${d.top_store.users} users` : '-';
  document.getElementById('topCoupon').textContent = d.top_coupon ? `${d.top_coupon.title} — ${d.top_coupon.uses} uses` : '-';
}

</script>
