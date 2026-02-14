<style>
table.mfTable  td {
	padding:8px 10px !important;
}
</style>

<div class="box">
	<div class="box-table">


		<table class="table mfTable" id="mfTable">
			<thead>
			<tr>
				<th class="text-center">번호</th>
				<th class="text-center">분류</th>
				<th class="text-center col-sm-3">업체 정보</th>
				<th class="text-center">연락처</th>
				<th class="text-center">신청금액</th>
				<th class="text-center">신청분류</th>
				<th class="text-center">관리</th>
			</tr>
			</thead>
			<tbody>
<? foreach($applyD as $k => $aD) { ?>
			<tr>
				<td class="text-center"><?=count($applyD)-$k?></td>
				<td class="text-center"><?=$aD['category']?></td>
				<td>
					<table class="table">
						<tr>
							<th style="padding:5px 0px; width:75px;">업체명</th>
							<td style="padding:5px 0px;"><?=$aD['comName']?></td>
						</tr>
						<tr>
							<th style="padding:5px 0px;">대표자명</th>
							<td style="padding:5px 0px;"><?=$aD['ceoName']?></td>
						</tr>
						<tr>
							<th style="padding:5px 0px;word-break:nowrap;">사업자번호</th>
							<td style="padding:5px 0px;"><?=$aD['comNo']?></td>
						</tr>
						<tr>
							<th style="padding:5px 0px;">업종/업테</th>
							<td style="padding:5px 0px;"><?=$aD['comType1']?>/<?=$aD['comType2']?></td>
						</tr>
						<tr>
							<th style="padding:5px 0px;">주소</th>
							<td style="padding:5px 0px;">
								(<?=$aD['comZip']?>) <?=$aD['comAddr1']?>, <?=$aD['comAddr2']?><br><?=$aD['comAddr3']?>
							</td>
						</tr>
						<tr>
							<th style="padding:5px 0px;">상.근.수</th>
							<td style="padding:5px 0px;"><?=$aD['comEmployee']?>명</td>
						</tr>
					</table>

				</td>
				<td class="text-center"><?=$aD['comTel']?><br><?=$aD['comPhone']?><br><?=$aD['comEmail']?></td>
				<td>
					<?=$aD['comFile1Source']?"":"사업자 등록증 없음<br>"?>
					<?=$aD['comFile2Source']?"":"소상공인증명원 없음"?>
				</td>
				<td class="text-center">
					<?=count($aD['typeD'])?>개 품목 신청
					<div  style="max-height:210px;overflow-y:auto;">
					<table class="table">
						<tr>
							<th>분류</th>
							<th>품목명</th>
						</tr>
<? foreach($aD['typeD'] as $key2 => $tD) { ?>
						<tr>
							<td style="padding:5px 0px;" class="text-center"><?=$cateName[$tD['cate']]?></td>
							<td style="padding:5px 0px;" class="text-center"><?=$tD['aType']?><?=$tD['aEtc']?"(".$tD['aEtc'].")":""?></td>
						</tr>
<? } ?>
					</table>
					</div>
				</td>
				<td class="text-center">
					<?=$aD['status']?><br><?=$aD['regDate']?><br><?=$aD['regIP']?><br>
					<a href="/admin/site/apply/form/<?=$aD['no']?>" class="btn btn-sm btn-success">수정</a>
					<a href="/admin/site/apply/deleteData/<?=$aD['no']?>" class="btn btn-sm btn-danger" onclick="return confirm('정말 삭제하시겠습니까?\n\n한번 삭제한 자료를 복구 불가능합니다.')">삭제</a>
				</td>
			</tr>
<? } ?>
			</tbody>
		</table>

	</div>
</div>



<link rel="stylesheet" type="text/css" href="/assets/datatables/datatables.min.css"/>
<script type="text/javascript" src="/assets/datatables/datatables.min.js"></script>

<script>
$(document).ready(function() {
	var table = $('#mfTable').DataTable({
		ordering:  false,
		lengthMenu: [100, 50, 25],
	});
});
/*
		fixedColumns:{
			left: 3
		},
*/
</script>