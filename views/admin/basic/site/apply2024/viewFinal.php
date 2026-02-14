<script src="/assets/js/masonry.pkgd.min.js"></script>
<style>
.btn.btn-success.w-100, .btn.btn-light.w-100 {
	font-size:12px;
	padding:8px 0px;
}
.divContents {
	/* max-width:96%; */
}
div.divEstimate span.input-group-text {
	font-size:12px;
	padding:0px 6px;
}

div.divEstimate input[type=text] {
	font-size:13px;
}
.f12 {
	font-size:12px;
}
ul.ulClean {

}
ul.ulClean  li{
	list-style:decimal;
	padding-bottom:20px;
}
</style>


<!--[if IE]>
<script type="text/javascript" src="/assets/signature/excanvas.js"></script>
<![endif]-->
<script type="text/javascript" src="/assets/signature/jquery.ui.touch-punch.min.js"></script>
<script src="/assets/signature/jquery.signature.js"></script>


<div class="divContents divApply mt-5 pt-5">
	<div class="row">
		<div class="col-sm-3 mb-4">
			<div class="list-group">
				<button type="button" class="list-group-item list-group-item-action list-group-item-dark active" aria-current="true">Step1. 신청서</button>
				<button type="button" class="list-group-item list-group-item-action">Step2. 산출내역서</button>
				<button type="button" class="list-group-item list-group-item-action">Step3. 수행계획서</button>
				<button type="button" class="list-group-item list-group-item-action">Step4. 청렴서약서</button>
				<button type="button" class="list-group-item list-group-item-action">Step5. 개인정보 수집·이용·제공 동의서 </button>
				<button type="button" class="list-group-item list-group-item-action">Step6. 제출서류</button>
			</div>
		</div>
		<div class="col-sm-9 divAgree">
			<h4>중소기업 산업디자인 개발 지원사업 신청서</h4>
			<br>
			<div class="row mb-2">
				<label for="projectName" class="col-sm-2 col-form-label"><div class="bigTitle">신청과제명</div></label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="projectName" name="projectName" placeholder="신청과제명을 입력하세요" value="<?=element("projectName", $detailD)?>">
				</div>
			</div>

			<div class="row mb-2">
				<label for="projectName" class="col-sm-2 col-form-label"><div class="bigTitle">신청분야</div></label>
				<div class="col-sm-10 pt-2">

					<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" id="applyCategory1" name="applyCategory[]" value="제품" <?=preg_match("/제품/i", element("applyCategory", $detailD))?"checked":""?>>
						<label class="form-check-label" for="applyCategory1">제품</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" id="applyCategory2" name="applyCategory[]" value="브랜드" <?=preg_match("/브랜드/i", element("applyCategory", $detailD))?"checked":""?>>
						<label class="form-check-label" for="applyCategory2">브랜드</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" id="applyCategory3" name="applyCategory[]" value="UX·UI" <?=preg_match("/UX·UI/i", element("applyCategory", $detailD))?"checked":""?>>
						<label class="form-check-label" for="applyCategory3">UX·UI</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" id="applyCategory4" name="applyCategory[]" value="기타" <?=preg_match("/기타/i", element("applyCategory", $detailD))?"checked":""?>>
						<label class="form-check-label" for="applyCategory4">기타</label>
					</div>

				</div>
			</div>



			<div class="row mb-2">
				<label for="projectName" class="col-sm-2 col-form-label"><div class="bigTitle">신청 기업</div></label>
				<div class="col-sm-10">

					<div class="row applyComType">
						<div class="col-sm-12">
							<h5>중소기업</h5>

							<div class="row mb-2 ">
								<label for="com1Name" class="col-sm-2 col-form-label">기업명</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" id="com1Name" name="com1Name" placeholder="기업명을 입력하세요" value="<?=element("com1Name", $detailD)?>">
								</div>

								<label for="com1Type1" class="col-sm-2 col-form-label">기업형태</label>
								<div class="col-sm-4 pt-2">
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="com1Type" id="com1Type1" value="법인" <?=preg_match("/법인/i", element("com1Type", $detailD))?"checked":""?>>
										<label class="form-check-label" for="com1Type1"> 법인</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="com1Type" id="com1Type2" value="개인" <?=preg_match("/개인/i", element("com1Type", $detailD))?"checked":""?>>
										<label class="form-check-label" for="com1Type2"> 개인</label>
									</div>
								</div>
							</div>

							<div class="row mb-2">
								<label for="com1No1" class="col-sm-2 col-form-label">사업자번호</label>
								<div class="col-sm-4">
									<div class="input-group">
										<input type="text" class="form-control onlyNumber text-start" id="com1No1" name="com1No1" placeholder="000" inputmode="numeric" pattern="[0-9]*" maxlength="3" value="<?=element("com1No1", $detailD)?>">
										<span class="input-group-text">-</span>
										<input type="text" class="form-control onlyNumber text-start" id="com1No2" name="com1No2" placeholder="00" inputmode="numeric" pattern="[0-9]*" maxlength="2" value="<?=element("com1No2", $detailD)?>">
										<span class="input-group-text">-</span>
										<input type="text" class="form-control onlyNumber text-start" id="com1No3" name="com1No3" placeholder="00000" inputmode="numeric" pattern="[0-9]*" maxlength="5" value="<?=element("com1No3", $detailD)?>" style="width:20%">
									</div>
								</div>

								<label for="com1FoundDate" class="col-sm-2 col-form-label">설립일자</label>
								<div class="col-sm-4">
									<input type="date" class="form-control datepicker" id="com1FoundDate" name="com1FoundDate" placeholder="설립일자 선택하세요" value="<?=element("com1FoundDate", $detailD)?>">
								</div>

							</div>

							<div class="row mb-2">
								<label for="com1WorkType" class="col-sm-2 col-form-label">업종분야</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="com1WorkType" name="com1WorkType" placeholder="업종분야를 입력하세요" value="<?=element("com1WorkType", $detailD)?>">
								</div>
							</div>

							<div class="row mb-2">
								<label for="com1RepresentName" class="col-sm-2 col-form-label">대표자 명</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="com1RepresentName" name="com1RepresentName" placeholder="대표자명을 입력하세요" value="<?=element("com1RepresentName", $detailD)?>">
								</div>
							</div>

							<div class="row mb-2 ">
								<label for="com1RepresentPhone" class="col-sm-2 col-form-label">대표자 연락처</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" id="com1RepresentPhone" name="com1RepresentPhone" placeholder="대표자 연락처를 입력하세요" value="<?=element("com1RepresentPhone", $detailD)?>">
								</div>

								<label for="com1RepresentEmail" class="col-sm-2 col-form-label">대표자 이메일</label>
								<div class="col-sm-4">
									<input type="email" class="form-control" id="com1RepresentEmail" name="com1RepresentEmail" placeholder="대표자 이메일주소를 입력하세요" value="<?=element("com1RepresentEmail", $detailD)?>">
								</div>
							</div>

							<div class="row mb-2">
								<label for="com1Address" class="col-sm-2 col-form-label">기업 주소</label>
								<div class="col-sm-10">
									<div class="input-group mb-2">
										<input type="text" class="form-control" readonly id="com1Zip" name="com1Zip" placeholder="00000" maxlength=5   value="<?=element("com1Zip", $detailD)?>">
										<input type="text" class="form-control" readonly id="com1Address1" name="com1Address1" placeholder="주소를 입력하세요" style="width:50% !important;"  value="<?=element("com1Address1", $detailD)?>">
									</div>
									<input type="text" class="form-control" id="com1Address2" name="com1Address2" placeholder="상세 주소를 입력하세요" value="<?=element("com1Address2", $detailD)?>">
									<input type="hidden" id="com1Address3" name="com1Address3" value="<?=element("com1Address3", $detailD)?>">
								</div>
							</div>

							<div class="row mb-2">
								<label for="com1ManagerName" class="col-sm-2 col-form-label">담당자 명</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="com1ManagerName" name="com1ManagerName" placeholder="담당자 명을 입력하세요"  value="<?=element("com1ManagerName", $detailD)?>">
								</div>
							</div>

							<div class="row mb-2 ">
								<label for="com1ManagerPhone" class="col-sm-2 col-form-label">담당자 연락처</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" id="com1ManagerPhone" name="com1ManagerPhone" placeholder="담당자 연락처를 입력하세요"  value="<?=element("com1ManagerPhone", $detailD)?>">
								</div>

								<label for="com1ManagerEmail" class="col-sm-2 col-form-label">담당자 이메일</label>
								<div class="col-sm-4">
									<input type="email" class="form-control" id="com1ManagerEmail" name="com1ManagerEmail" placeholder="담당자 이메일주소를 입력하세요"  value="<?=element("com1ManagerEmail", $detailD)?>">
								</div>
							</div>

						</div>
						<div class="col-sm-12 pt-3">
							<h5>디자인기업</h5>


							<div class="row mb-2 ">
								<label for="com2Name" class="col-sm-2 col-form-label">기업명</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" id="com2Name" name="com2Name" placeholder="기업명을 입력하세요" value="<?=element("com2Name", $detailD)?>">
								</div>

								<label for="com2Type1" class="col-sm-2 col-form-label">기업형태</label>
								<div class="col-sm-4 pt-2">
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="com2Type" id="com2Type1" value="법인" <?=preg_match("/법인/i", element("com2Type", $detailD))?"checked":""?>>
										<label class="form-check-label" for="com2Type1"> 법인</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="com2Type" id="com2Type2" value="개인" <?=preg_match("/개인/i", element("com2Type", $detailD))?"checked":""?>>
										<label class="form-check-label" for="com2Type2"> 개인</label>
									</div>
								</div>
							</div>

							<div class="row mb-2">
								<label for="com2No1" class="col-sm-2 col-form-label">사업자번호</label>
								<div class="col-sm-4">
									<div class="input-group">
										<input type="text" class="form-control onlyNumber text-start" id="com2No1" name="com2No1" placeholder="000" inputmode="numeric" pattern="[0-9]*" maxlength="3" value="<?=element("com2No1", $detailD)?>">
										<span class="input-group-text">-</span>
										<input type="text" class="form-control onlyNumber text-start" id="com2No2" name="com2No2" placeholder="00" inputmode="numeric" pattern="[0-9]*" maxlength="2" value="<?=element("com2No2", $detailD)?>">
										<span class="input-group-text">-</span>
										<input type="text" class="form-control onlyNumber text-start" id="com2No3" name="com2No3" placeholder="00000" inputmode="numeric" pattern="[0-9]*" maxlength="5" value="<?=element("com2No3", $detailD)?>" style="width:20%">
									</div>
								</div>

								<label for="com2FoundDate" class="col-sm-2 col-form-label">설립일자</label>
								<div class="col-sm-4">
									<input type="date" class="form-control datepicker" id="com2FoundDate" name="com2FoundDate" placeholder="설립일자 선택하세요" value="<?=element("com2FoundDate", $detailD)?>">
								</div>

							</div>

							<div class="row mb-2">
								<label for="com2WorkType" class="col-sm-2 col-form-label">업종분야</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="com2WorkType" name="com2WorkType" placeholder="업종분야를 입력하세요" value="<?=element("com2WorkType", $detailD)?>">
								</div>
							</div>

							<div class="row mb-2">
								<label for="com2RepresentName" class="col-sm-2 col-form-label">대표자 명</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="com2RepresentName" name="com2RepresentName" placeholder="대표자명을 입력하세요" value="<?=element("com2RepresentName", $detailD)?>">
								</div>
							</div>

							<div class="row mb-2 ">
								<label for="com2RepresentPhone" class="col-sm-2 col-form-label">대표자 연락처</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" id="com2RepresentPhone" name="com2RepresentPhone" placeholder="대표자 연락처를 입력하세요" value="<?=element("com2RepresentPhone", $detailD)?>">
								</div>

								<label for="com2RepresentEmail" class="col-sm-2 col-form-label">대표자 이메일</label>
								<div class="col-sm-4">
									<input type="email" class="form-control" id="com2RepresentEmail" name="com2RepresentEmail" placeholder="대표자 이메일주소를 입력하세요" value="<?=element("com2RepresentEmail", $detailD)?>">
								</div>
							</div>

							<div class="row mb-2">
								<label for="com2Address" class="col-sm-2 col-form-label">기업 주소</label>
								<div class="col-sm-10">
									<div class="input-group mb-2">
										<input type="text" class="form-control" readonly id="com2Zip" name="com2Zip" placeholder="00000" maxlength=5   value="<?=element("com2Zip", $detailD)?>">
										<input type="text" class="form-control" readonly id="com2Address1" name="com2Address1" placeholder="주소를 입력하세요" style="width:50% !important;" value="<?=element("com2Address1", $detailD)?>">
									</div>
									<input type="text" class="form-control" id="com2Address2" name="com2Address2" placeholder="상세 주소를 입력하세요" value="<?=element("com2Address2", $detailD)?>">
									<input type="hidden" id="com2Address3" name="com2Address3" value="<?=element("com2Address3", $detailD)?>">
								</div>
							</div>

							<div class="row mb-2">
								<label for="com2ManagerName" class="col-sm-2 col-form-label">담당자 명</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="com2ManagerName" name="com2ManagerName" placeholder="담당자 명을 입력하세요"  value="<?=element("com2ManagerName", $detailD)?>">
								</div>
							</div>

							<div class="row mb-2 ">
								<label for="com2ManagerPhone" class="col-sm-2 col-form-label">담당자 연락처</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" id="com2ManagerPhone" name="com2ManagerPhone" placeholder="담당자 연락처를 입력하세요"  value="<?=element("com2ManagerPhone", $detailD)?>">
								</div>

								<label for="com2ManagerEmail" class="col-sm-2 col-form-label">담당자 이메일</label>
								<div class="col-sm-4">
									<input type="email" class="form-control" id="com2ManagerEmail" name="com2ManagerEmail" placeholder="담당자 이메일주소를 입력하세요"  value="<?=element("com2ManagerEmail", $detailD)?>">
								</div>
							</div>


						</div>
					</div>
				</div>
			</div>


			<div class="row mb-2">
				<label for="totalPrice" class="col-sm-2 col-form-label"><div class="bigTitle">개발비용</div></label>
				<div class="col-sm-10">
					<div class="input-group">
						<input type="text" class="form-control onlyNumber" id="totalPrice" name="totalPrice" placeholder="총 소요 개발비용을 입력하세요 " value="<?=element("totalPrice", $detailD)?>">
						<span class="input-group-text">원</span>
					</div>
				</div>
			</div>
			<hr>

			<center class="pt-4">
			<h5>위와 같이 중소기업 산업디자인 개발 지원사업을 신청합니다.</h5>
			<h5>아울러 동 사업신청 및 계획서 상의 기재 내용이 사실임을 확약하며,</h5>
			<h5>만약 사실이 아닐 경우 선정 취소 등의 조치가 취해질 수 있음을 확인합니다.</h5>

			<h5 class="mt-4"><?=date("Y년 m월 d일")?></h5>
			</center>


			<div class="row mt-4 mb-5">
				<div class="col-sm-6">
					<div class="input-group">
						<span class="input-group-text">중소기업</span>
						<input type="text" class="form-control" id="signCom1Name" name="signCom1Name" value="<?=element("signCom1Name", $detailD)?>">
						<span class="input-group-text">대표</span>
						<input type="text" class="form-control" id="signCom1Represent" name="signCom1Represent" value="<?=element("signCom1Represent", $detailD)?>">
						<button class="btn btn-<?=element("com1signData2", $detailD)?"success":"danger"?>" id="btnSign_com1" type="button" onclick="return fnDoSign('com1')">서명</button>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="input-group">
						<span class="input-group-text">디자인기업</span>
						<input type="text" class="form-control" id="signCom2Name" name="signCom2Name" value="<?=element("signCom2Name", $detailD)?>">
						<span class="input-group-text">대표</span>
						<input type="text" class="form-control" id="signCom2Represent" name="signCom2Represent" value="<?=element("signCom2Represent", $detailD)?>">
						<button class="btn btn-<?=element("com2signData2", $detailD)?"success":"danger"?>" id="btnSign_com2" type="button" onclick="return fnDoSign('com2')">서명</button>
					</div>
				</div>
			</div>

		</div>
	</div>
	<textarea class="d-none" name="com1signData1" id="com1signData1"><?=element("com1signData1", $detailD)?></textarea>
	<textarea class="d-none" name="com1signData2" id="com1signData2"><?=element("com1signData2", $detailD)?></textarea>
	<textarea class="d-none" name="com2signData1" id="com2signData1"><?=element("com2signData1", $detailD)?></textarea>
	<textarea class="d-none" name="com2signData2" id="com2signData2"><?=element("com2signData2", $detailD)?></textarea>
</div>


<!-- 서명 -->
<div class="modal fade" id="signatureModal" tabindex="-1" aria-labelledby="signatureModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="signatureModalLabel"><span></span>대표자 서명</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div id="signPlace" class="per100" style="width:440px;height:150px;border:1px solid #eee; border-radius:10px;"></div>

			</div>


			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">창닫기</button>
			</div>
		</div>
	</div>
</div>



<script>
var signType = '';
$(document).ready(function() {
	$('#signPlace').signature(); 
});
function fnDoSign(type) {
	signType = type;
	if (type=='com1') {
		$("#signatureModalLabel").find("span").html("중소기업 ");
	} else {
		$("#signatureModalLabel").find("span").html("디자인기업 ");
	}
	$("#signatureModal").modal('show');
	$('#signPlace').signature(); 
	if ($("#"+type+"signData2").val()!='') {
		$('#signPlace').signature('disable').signature('draw', $("#"+type+"signData2").val())
	}
}
function fnDoSign2(type) {
	signType = type;
	if (type=='com1') {
		$("#signatureModalLabel").find("span").html("중소기업 ");
	} else {
		$("#signatureModalLabel").find("span").html("디자인기업 ");
	}
	$("#signatureModal").modal('show');
	$('#signPlace').signature(); 
	if ($("#"+type+"sign1Data2").val()!='') {
		$('#signPlace').signature('disable').signature('draw', $("#"+type+"sign1Data2").val())
	}
}
function fnDoSign3(type) {
	signType = type;
	if (type=='com1') {
		$("#signatureModalLabel").find("span").html("중소기업 ");
	} else {
		$("#signatureModalLabel").find("span").html("디자인기업 ");
	}
	$("#signatureModal").modal('show');
	$('#signPlace').signature(); 
	if ($("#"+type+"sign2Data2").val()!='') {
		$('#signPlace').signature('disable').signature('draw', $("#"+type+"sign2Data2").val())
	}
}


</script>





<div class="divContents divApply mt-5 pt-5">
	<div class="row">
		<div class="col-sm-3 mb-4">
			<div class="list-group">
				<button type="button" class="list-group-item list-group-item-action">Step1. 신청서</button>
				<button type="button" class="list-group-item list-group-item-action list-group-item-dark active" aria-current="true">Step2. 산출내역서</button>
				<button type="button" class="list-group-item list-group-item-action">Step3. 수행계획서</button>
				<button type="button" class="list-group-item list-group-item-action">Step4. 청렴서약서</button>
				<button type="button" class="list-group-item list-group-item-action">Step5. 개인정보 수집·이용·제공 동의서 </button>
				<button type="button" class="list-group-item list-group-item-action">Step6. 제출서류</button>
			</div>
		</div>
		<div class="col-sm-9 divAgree">
			<h4>디자인개발비 산출내역서</h4>
			<br>

			<div class="row mb-2">
				<label for="projectName" class="col-sm-2 col-form-label">
					<div class="bigTitle">인건비</div>
				</label>
				<div class="col-sm-10">
					<div id="estimateWorker" class="divEstimate">
<? foreach(element("Worker", $estimateD) as $kk => $worker) { ?>
						<div class="row divSectionWorker mb-2">
							<div class="col-sm-4">
								<div class="input-group">
								<span class="input-group-text">항목</span>
								<input type="text" name="estimateItemWorker<?=$kk+1?>" class="form-control" value="<?=$worker['item']?>" placeholder="항목명 #<?=$kk+1?> 를 입력하세요">
								</div>
							</div>
							<div class="col-sm-5">
								<div class="input-group">
									<span class="input-group-text">산출내역</span>
									<input type="text" name="estimateContentWorker<?=$kk+1?>" class="form-control" value="<?=$worker['content']?>" placeholder="산출내역 #<?=$kk+1?> 를 입력하세요">
								</div>
							</div>
							<div class="col-sm-3">
								<div class="input-group">
									<span class="input-group-text">금액</span>
									<input type="text" name="estimatePriceWorker<?=$kk+1?>" class="form-control onlyNumber" value="<?=$worker['price']?>" placeholder="금액 #<?=$kk+1?> 를 입력하세요" inputmode="numeric" pattern="[0-9]*">
									<span class="input-group-text">원</span>
								</div>
							</div>

							<!-- <div class="col-sm-12"><div class="divSectionGroup"></div></div> -->
						</div>
<? } ?>
					</div>
					<p class="text-danger f12">cf. 총괄책임, 실무디자이너</p>
				</div>
			</div>

			<div class="row mb-2">
				<label for="projectName" class="col-sm-2 col-form-label">
					<div class="bigTitle">직접비</div>
				</label>
				<div class="col-sm-10">
					<div id="estimateDirect" class="divEstimate">
<? foreach(element("Direct", $estimateD) as $kk => $data) { ?>
						<div class="row divSectionDirect mb-2">
							<div class="col-sm-4">
								<div class="input-group">
									<span class="input-group-text">항목</span>
									<input type="text" name="estimateItemDirect<?=$kk+1?>" class="form-control" value="<?=$data['item']?>" placeholder="항목명 #<?=$kk+1?> 를 입력하세요">
								</div>
							</div>
							<div class="col-sm-5">
								<div class="input-group">
									<span class="input-group-text">산출내역</span>
									<input type="text" name="estimateContentDirect<?=$kk+1?>" class="form-control" value="<?=$data['content']?>" placeholder="산출내역 #<?=$kk+1?> 를 입력하세요">
								</div>
							</div>
							<div class="col-sm-3">
								<div class="input-group">
									<span class="input-group-text">금액</span>
									<input type="text" name="estimatePriceDirect<?=$kk+1?>" class="form-control onlyNumber" value="<?=$data['price']?>" placeholder="금액 #<?=$kk+1?> 를 입력하세요" inputmode="numeric" pattern="[0-9]*">
									<span class="input-group-text">원</span>
								</div>
							</div>
							<!-- <div class="col-sm-12"><div class="divSectionGroup"></div></div> -->
						</div>
<? } ?>
					</div>
					<p class="text-danger f12">cf. 재료구입비, 디자인목업비</p>
				</div>
			</div>

			<div class="row mb-2">
				<label for="projectName" class="col-sm-2 col-form-label">
					<div class="bigTitle">
					기타비용
					</div>
				</label>
				<div class="col-sm-10">
					<div id="estimateEtc" class="divEstimate">
<? foreach(element("Etc", $estimateD) as $kk => $data) { ?>
						<div class="row divSectionEtc mb-2">
							<div class="col-sm-4">
								<div class="input-group">
									<span class="input-group-text">항목</span>
									<input type="text" name="estimateItemEtc<?=$kk+1?>" class="form-control" value="<?=$data['item']?>" placeholder="항목명 #<?=$kk+1?> 를 입력하세요">
								</div>
							</div>
							<div class="col-sm-5">
								<div class="input-group">
									<span class="input-group-text">산출내역</span>
									<input type="text" name="estimateContentEtc<?=$kk+1?>" class="form-control" value="<?=$data['content']?>" placeholder="산출내역 #<?=$kk+1?> 를 입력하세요">
								</div>
							</div>
							<div class="col-sm-3">
								<div class="input-group">
									<span class="input-group-text">금액</span>
									<input type="text" name="estimatePriceEtc<?=$kk+1?>" class="form-control onlyNumber" value="<?=$data['price']?>" placeholder="금액 #<?=$kk+1?> 를 입력하세요" inputmode="numeric" pattern="[0-9]*">
									<span class="input-group-text">원</span>
								</div>
							</div>
							<!-- <div class="col-sm-12"><div class="divSectionGroup"></div></div> -->
						</div>
<? } ?>
					</div>
					<p class="text-danger f12">cf. 활동비, 설문조사비, 인쇄비, 출원비</p>
				</div>
			</div>

			<div class="row mb-2">
				<label for="projectName" class="col-sm-2 col-form-label"><div class="bigTitle">합계</div></label>
				<div class="col-sm-10">
					<div class="input-group">
						<input type="text" name="sumPriceQ" class="form-control onlyNumber" placeholder="합계금액을 입력하세요" inputmode="numeric" pattern="[0-9]*" value="<?=element("sumPriceQ", $detailD)?>" readonly>
						<span class="input-group-text">원</span>
					</div>
				</div>
			</div>
			<div class="row mb-2">
				<label for="projectName" class="col-sm-2 col-form-label"><div class="bigTitle">창작료</div></label>
				<div class="col-sm-10">
					<div class="input-group">
						<input type="text" name="creativePriceQ" class="form-control onlyNumber" placeholder="창작료를 입력하세요" inputmode="numeric" pattern="[0-9]*" value="<?=element("creativePriceQ", $detailD)?>">
						<span class="input-group-text">원</span>
					</div>
					<p>※ 개발비용의 10% 이내
				</div>
			</div>
			<div class="row mb-2">
				<label for="projectName" class="col-sm-2 col-form-label"><div class="bigTitle">총계 (총사업비)</div></label>
				<div class="col-sm-10">
					<div class="input-group">
						<input type="text" name="totalPriceQ" class="form-control onlyNumber" placeholder="합계금액을 입력하세요" inputmode="numeric" pattern="[0-9]*" value="<?=element("totalPriceQ", $detailD)?>" readonly>
						<span class="input-group-text">원</span>
					</div>
					<p>※ 부가가치세 미포함</p>
				</div>
			</div>
			<div class="row mb-2">
				<label for="projectName" class="col-sm-2 col-form-label"><div class="bigTitle">지원한도 (A)</div></label>
				<div class="col-sm-10">
					<div class="input-group">
						<input type="text" name="supportPriceQ" class="form-control onlyNumber" placeholder="지원금액을 입력하세요" inputmode="numeric" pattern="[0-9]*" value="<?=element("supportPriceQ", $detailD)?>" readonly>
						<span class="input-group-text">원</span>
					</div>
					<p class="text-danger f12">분야별 지원한도 : 제품 디자인 30,000천원, 브랜드 디자인 22,000천원, UX·UI 디자인 25,000천원, 기타 20,000천원</p>
				</div>
			</div>
			<div class="row mb-2">
				<label for="projectName" class="col-sm-2 col-form-label"><div class="bigTitle">기업부담금 (B)<br>(A의 10%)</div></label>
				<div class="col-sm-10">
					<div class="input-group">
						<input type="text" name="payPriceQ" class="form-control onlyNumber" placeholder="기업부담금을 입력하세요" inputmode="numeric" pattern="[0-9]*" value="<?=element("payPriceQ", $detailD)?>" readonly>
						<span class="input-group-text">원</span>
					</div>
					<p class="text-danger f12">
						※ 지원한도의 10%<br>
						※ 기업부담금 및 부가가치세는 중소기업이 부담<br>
						※ 기업부담금 내에 디자인개발비 회계정산비용이 필수적으로 포함되어야 함
					</p>

				</div>
			</div>

			<div class="row mb-2">
				<label for="projectName" class="col-sm-2 col-form-label"><div class="bigTitle">부가세 (C)<br>(A+B의 10%)</div></label>
				<div class="col-sm-10">
					<div class="input-group">
						<input type="text" name="vatPriceQ" class="form-control onlyNumber" placeholder="부가세 금액을 입력하세요" inputmode="numeric" pattern="[0-9]*" value="<?=element("vatPriceQ", $detailD)?>" readonly>
						<span class="input-group-text">원</span>
					</div>
				</div>
			</div>
			<div class="row mb-2">
				<label for="projectName" class="col-sm-2 col-form-label"><div class="bigTitle">총개발비<br>(A+B+C)</div></label>
				<div class="col-sm-10">
					<div class="input-group">
						<input type="text" name="allPriceQ" class="form-control onlyNumber" placeholder="부가세 금액을 입력하세요" inputmode="numeric" pattern="[0-9]*" value="<?=element("allPriceQ", $detailD)?>" readonly>
						<span class="input-group-text">원</span>
					</div>
				</div>
			</div>


		</div>
	</div>
</div>





<div class="divContents divApply mt-5 pt-5">
	<div class="row">
		<div class="col-sm-3 mb-4">
			<div class="list-group">
				<button type="button" class="list-group-item list-group-item-action">Step1. 신청서</button>
				<button type="button" class="list-group-item list-group-item-action">Step2. 산출내역서</button>
				<button type="button" class="list-group-item list-group-item-action list-group-item-dark active" aria-current="true">Step3. 수행계획서</button>
				<button type="button" class="list-group-item list-group-item-action">Step4. 청렴서약서</button>
				<button type="button" class="list-group-item list-group-item-action">Step5. 개인정보 수집·이용·제공 동의서 </button>
				<button type="button" class="list-group-item list-group-item-action">Step6. 제출서류</button>
			</div>
		</div>
		<div class="col-sm-9 divAgree">
			<h4>지원사업 수행계획서</h4>
			<br>

			<nav>
				<div class="nav nav-tabs" id="nav-tab" role="tablist2">
						<button class="nav-link active" id="nav-eval1-tab" type="button">1. 과제평가</button>
						<button class="nav-link" id="nav-eval2-tab" type="button">2. 수행평가</button>
				</div>
			</nav>

			<div class="tab-content2" id="nav-tabContent">
				<!-- 과제평가 -->
				<div class="tab-pane2 fade show active pt-3 pb-3" id="nav-eval1">

					<div class="row mb-2">
						<label for="com1Status" class="col-sm-2 col-form-label"><div class="bigTitle">중소기업 현황</div></label>
						<div class="col-sm-10">
							<textarea class="form-control" name="com1Status" id="com1Status" rows="5" placeholder="주요 거래처를 간략히 기재하세요
- 기업연혁
- 분야 및 생산품목
- 주요 거래처"><?=element("com1Status", $detailD)?></textarea>
<? /*
							<div class="input-group mb-2">
								<span class="input-group-text">기업연혁</span>
								<textarea class="form-control" name="com1statusHistory" id="com1statusHistory" rows="5" placeholder="기업연혁을 간략히 기재하세요"><?=element("com1statusHistory", $detailD)?></textarea>
							</div>
							<div class="input-group mb-2">
								<span class="input-group-text">분야 및 <br>생산품목</span>
								<textarea class="form-control" name="com1statusProduct" id="com1statusProduct" rows="5" placeholder="분야 및 생산품목을 간략히 기재하세요"><?=element("com1statusProduct", $detailD)?></textarea>
							</div>
							<div class="input-group mb-2">
								<span class="input-group-text p-3">주요 <br>거래처</span>
								<textarea class="form-control" name="com1statusClients" id="com1statusClients" rows="5" placeholder="주요 거래처를 간략히 기재하세요"><?=element("com1statusClients", $detailD)?></textarea>
							</div>
*/ ?>
							<p class="text-dark">※ 기업 현황 등을 간략히 기재<br>- 기업연혁 / 분야 및 생산품목 / 주요 거래처 등</p>
						</div>
					</div>

					<div class="row mb-2">
						<label for="projectName" class="col-sm-2 col-form-label"><div class="bigTitle">중소기업 매출현황</div></label>
						<div class="col-sm-10">
							<div class="row">
								<div class="col-sm-3">
									<div class="input-group">
										<input type="text" name="com1Sales2021" class="form-control onlyNumber" value="<?=element("com1Sales2021", $detailD)?>" placeholder="2021년 매출액을 입력하세요" inputmode="numeric" pattern="[0-9]*">
										<span class="input-group-text">원</span>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="input-group">
										<input type="text" name="com1Sales2022" class="form-control onlyNumber" value="<?=element("com1Sales2022", $detailD)?>" placeholder="2022년 매출액을 입력하세요" inputmode="numeric" pattern="[0-9]*">
										<span class="input-group-text">원</span>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="input-group">
										<input type="text" name="com1Sales2023" class="form-control onlyNumber" value="<?=element("com1Sales2023", $detailD)?>" placeholder="2023년 매출액을 입력하세요" inputmode="numeric" pattern="[0-9]*">
										<span class="input-group-text">원</span>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="input-group">
										<input type="text" name="com1Sales2024" class="form-control onlyNumber" value="<?=element("com1Sales2024", $detailD)?>" placeholder="2024년 예상 매출액을 입력하세요" inputmode="numeric" pattern="[0-9]*">
										<span class="input-group-text">원</span>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row mb-2">
						<label for="projectName" class="col-sm-2 col-form-label"><div class="bigTitle">중소기업 인력현황</div></label>
						<div class="col-sm-10">
							<div class="row mb-2">
								<div class="col-sm-3">
									<div class="input-group">
										<input type="text" name="com1Employee2021" class="form-control onlyNumber" value="<?=element("com1Employee2021", $detailD)?>" placeholder="2021년 고용인원을 입력하세요" inputmode="numeric" pattern="[0-9]*">
										<span class="input-group-text">명</span>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="input-group">
										<input type="text" name="com1Employee2022" class="form-control onlyNumber" value="<?=element("com1Employee2022", $detailD)?>" placeholder="2022년 고용인원을 입력하세요" inputmode="numeric" pattern="[0-9]*">
										<span class="input-group-text">명</span>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="input-group">
										<input type="text" name="com1Employee2023" class="form-control onlyNumber" value="<?=element("com1Employee2023", $detailD)?>" placeholder="2023년 고용인원을 입력하세요" inputmode="numeric" pattern="[0-9]*">
										<span class="input-group-text">명</span>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="input-group">
										<input type="text" name="com1Employee2024" class="form-control onlyNumber" value="<?=element("com1Employee2024", $detailD)?>" placeholder="2024년 예상 고용인원을 입력하세요" inputmode="numeric" pattern="[0-9]*">
										<span class="input-group-text">명</span>
									</div>
								</div>
							</div>
							<div class="row">
								<label for="com1Designer" class="col-sm-3 col-form-label pt-2">디자이너 보유여부</label>

								<div class="col-sm-9 pt-2">
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="com1Designer" id="com1Designer1" value="보유" <?=element("com1Designer", $detailD)=='보유'?"checked":""?> onclick="fnViewOption('com1Designer', 'show')">
										<label class="form-check-label" for="com1Designer1"> 보유</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="com1Designer" id="com1Designer2" value="미보유" <?=element("com1Designer", $detailD)=='미보유'?"checked":""?> onclick="fnViewOption('com1Designer', 'hide')">
										<label class="form-check-label" for="com1Designer2"> 미보유</label>
									</div>
								</div>

								<div class="div_com1Designer pt-2" style="<?=element("com1Designer", $detailD)=='보유'?"display:block":""?>">
									<div class="input-group">
										<span class="input-group-text">디자이너 재직자 수</span>
										<input type="text" name="com1DesignerCnt" class="form-control onlyNumber" value="<?=element("com1DesignerCnt", $detailD)?>" placeholder="(제품디자인 0명, 시각디자인 0명)" inputmode="numeric" pattern="[0-9]*">
										<span class="input-group-text">명</span>
									</div>
								</div>

							</div>
						</div>
					</div>

					<div class="row mb-2">
						<label for="com1Technical" class="col-sm-2 col-form-label"><div class="bigTitle">중소기업 보유기술</div></label>
						<div class="col-sm-10">
							<textarea class="form-control" name="com1Technical" id="com1Technical" rows="5" placeholder="※ 특허 등 기업 보유기술 현황, 주요 실적 등 기재"><?=element("com1Technical", $detailD)?></textarea>
						</div>
					</div>

					<div class="row mb-2">
						<label for="com1Vision" class="col-sm-2 col-form-label"><div class="bigTitle">중소기업 <br>소개 및 신청사유</div></label>
						<div class="col-sm-10">

							<div class="row">
								<label for="com1JoinPath1" class="col-sm-3 col-form-label pt-2">참여경로</label>
								<div class="col-sm-9 pt-2">
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="com1JoinPath[]" id="com1JoinPath1" value="서울시·재단 홈페이지" <?=preg_match("/재단/i", element("com1JoinPath", $detailD))?"checked":""?>>
										<label class="form-check-label" for="com1JoinPath1"> 서울시·재단 홈페이지</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="com1JoinPath[]" id="com1JoinPath2" value="SNS 홍보" <?=preg_match("/SNS/i", element("com1JoinPath", $detailD))?"checked":""?>>
										<label class="form-check-label" for="com1JoinPath2"> SNS 홍보</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="com1JoinPath[]" id="com1JoinPath3" value="지인 소개" <?=preg_match("/지인/i", element("com1JoinPath", $detailD))?"checked":""?>>
										<label class="form-check-label" for="com1JoinPath3"> 지인 소개</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="com1JoinPath[]" id="com1JoinPath4" value="기업·산업·디자인 관련 커뮤니티" <?=preg_match("/커뮤니티/i", element("com1JoinPath", $detailD))?"checked":""?>>
										<label class="form-check-label" for="com1JoinPath4"> 기업·산업·디자인 관련 커뮤니티</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="com1JoinPath[]" id="com1JoinPath5" value="컨소시엄 기업의 추천" <?=preg_match("/컨소시엄/i", element("com1JoinPath", $detailD))?"checked":""?>>
										<label class="form-check-label" for="com1JoinPath5"> 컨소시엄 기업의 추천</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="com1JoinPath[]" id="com1JoinPath6" value="기타" <?=preg_match("/기타/i", element("com1JoinPath", $detailD))?"checked":""?>>
										<label class="form-check-label" for="com1JoinPath6"> 기타</label>
									</div>
								</div>
							</div>


							<textarea class="form-control" name="com1Vision" id="com1Vision" rows="5" placeholder="※ 기업의 비전 및 의지, 디자인 개발 지원 신청 사유 등을 간략히 기재 "><?=element("com1Vision", $detailD)?></textarea>
						</div>
					</div>

					<div class="row mb-2">
						<label for="com1Specific" class="col-sm-2 col-form-label"><div class="bigTitle">신청과제 주요특성</div></label>
						<div class="col-sm-10">
							<textarea class="form-control" name="com1Specific" id="com1Specific" rows="15" placeholder="※ 대상과제 정보 및 특징 등을 상세히 기재
- 대상과제의 기본정보(제품명, 출시일, 규격, 주요 용도 등)
- 대상과제의 특장점 
- 시장 경쟁력, 경쟁제품 등과의 차별성"><?=element("com1Specific", $detailD)?></textarea>
							<p>※ 대상과제 정보 및 특징 등을 상세히 기재<br>
- 대상과제의 기본정보(제품명, 출시일, 규격, 주요 용도 등) / 대상과제의 특장점 / 시장 경쟁력, 경쟁제품 등과의 차별성</p>
							<h5 class="mt-3">기존 제품 등 이미지 자료 업로드</h5>
							<ul class="ulImageExplain row mt-4" id="ulImageExplain">
							</ul>
						</div>
					</div>
					<div class="row mb-2">
						<label for="com1Necessary" class="col-sm-2 col-form-label"><div class="bigTitle">지원 필요성</div></label>
						<div class="col-sm-10">
							<textarea class="form-control" name="com1Necessary" id="com1Necessary" rows="5" placeholder="※ 디자인 개발 지원 필요성 및 시급성 등을 간략히 기재"><?=element("com1Necessary", $detailD)?></textarea>
						</div>
					</div>

					<div class="row mb-2">
						<label for="com1Plan" class="col-sm-2 col-form-label"><div class="bigTitle">활용계획 및<br>기대효과</div></label>
						<div class="col-sm-10">
							<textarea class="form-control" name="com1Plan" id="com1Plan" rows="15" placeholder="※ 사업화 가능성 및 활용계획 등을 상세히 기재
- 개발된 결과물에 대하여 주 소비자층, 주 타겟시장, 진출시기, 시장진출(확장) 및 판매, 마케팅 전략 등을 기재 
- 디자인 개발 지원에 따른 기대효과(매출증대 및 시장 파급효과, 참여기업 성장가능성 등)
"><?=element("com1Plan", $detailD)?></textarea>
							<p>※ 사업화 가능성 및 활용계획 등을 상세히 기재<br>
							- 개발된 결과물에 대하여 주 소비자층, 주 타겟시장, 진출시기, 시장진출(확장) 및 판매, 마케팅 전략 등을 기재 <br>
							- 디자인 개발 지원에 따른 기대효과(매출증대 및 시장 파급효과, 참여기업 성장가능성 등)</p>
						</div>
					</div>

					<div class="row mb-2 d-none">
						<label for="com1OtherHistory1" class="col-sm-2 col-form-label"><div class="bigTitle">과거 유사사업<br>참여이력</div></label>
						<div class="col-sm-10">
							
							<p>서울시, 정부 기관, 재단 등의 디자인 지원사업에 참여한 적이 있는지?</p>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="com1OtherHistory" id="com1OtherHistory1" value="보유" <?=element("com1OtherHistory", $detailD)=='보유'?"checked":""?> onclick="fnViewOption('com1OtherHistory', 'show')">
								<label class="form-check-label" for="com1OtherHistory1"> 예</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="com1OtherHistory" id="com1OtherHistory2" value="미보유" <?=element("com1OtherHistory", $detailD)=='미보유'?"checked":""?> onclick="fnViewOption('com1OtherHistory', 'hide')">
								<label class="form-check-label" for="com1OtherHistory2"> 해당없음</label>
							</div>

							<div class="div_com1OtherHistory pt-2" style="<?=element("com1OtherHistory", $detailD)=='보유'?"display:block;":""?>">
								<div class="row mb-2">
									<label for="com1OH_name" class="col-sm-3 col-form-label">사업명</label>
									<div class="col-sm-9">
										<input type="text" name="com1OH_name" id="com1OH_name" class="form-control" value="<?=element("com1OH_name", 
										$detailD)?>" placeholder="사업명을 입력하세요">
									</div>
								</div>
								<div class="row mb-2">
									<label for="com1OH_periodS" class="col-sm-3 col-form-label">사업기간</label>
									<div class="col-sm-9">
										<div class="input-group">
											<input type="date" name="com1OH_periodS" id="com1OH_periodS" class="form-control" value="<?=element("com1OH_periodS", 
											$detailD)?>">
											<span class="input-group-text">~</span>
											<input type="date" name="com1OH_periodE" id="com1OH_periodE" class="form-control" value="<?=element("com1OH_periodE", 
											$detailD)?>">
										</div>
									</div>
								</div>
								<div class="row mb-2">
									<label for="com1OH_result" class="col-sm-3 col-form-label">사업성과</label>
									<div class="col-sm-9">
										<input type="text" name="com1OH_result" id="com1OH_result" class="form-control" value="<?=element("com1OH_result", 
										$detailD)?>" placeholder="사업성과를 입력하세요">
									</div>
								</div>
								<div class="row mb-2">
									<label for="com1OH_coCompany" class="col-sm-3 col-form-label">협력한 디자인 기업 상호</label>
									<div class="col-sm-9">
										<input type="text" name="com1OH_coCompany" id="com1OH_coCompany" class="form-control" value="<?=element("com1OH_coCompany", 
										$detailD)?>" placeholder="협력한 디자인 기업 상호를 입력하세요">
									</div>
								</div>
							</div>

						</div>
					</div>

					<div class="row mb-2">
						<label for="com1CoworkHistory1" class="col-sm-2 col-form-label"><div class="bigTitle">컨소시업<br>구성 관련</div></label>
						<div class="col-sm-10">
							<p>금회 컨소시엄으로 사업 참여한 디자인기업과 협업한 경험이 있는지?</p>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="com1CoworkHistory" id="com1CoworkHistory1" value="없음" <?=element("com1CoworkHistory", $detailD)=='없음'?"checked":""?>>
								<label class="form-check-label" for="com1CoworkHistory1"> 없음</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="com1CoworkHistory" id="com1CoworkHistory2" value="1회" <?=element("com1CoworkHistory", $detailD)=='1회'?"checked":""?>>
								<label class="form-check-label" for="com1CoworkHistory2"> 1회</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="com1CoworkHistory" id="com1CoworkHistory3" value="2회" <?=element("com1CoworkHistory", $detailD)=='2회'?"checked":""?>>
								<label class="form-check-label" for="com1CoworkHistory3"> 2회</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="com1CoworkHistory" id="com1CoworkHistory4" value="3회 이상" <?=element("com1CoworkHistory", $detailD)=='3회 이상'?"checked":""?>>
								<label class="form-check-label" for="com1CoworkHistory4"> 3회 이상</label>
							</div>

							<p class="mt-2">협업 경험이 있다면, 어떤 분야에서 함께 협업했는지?</p>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="com1CoworkDepart" id="com1CoworkDepart1" value="제품개발" <?=element("com1CoworkDepart", $detailD)=='제품개발'?"checked":""?> onclick="fnViewOption('com1CoworkDepart', 'hide')">
								<label class="form-check-label" for="com1CoworkDepart1"> 제품개발</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="com1CoworkDepart" id="com1CoworkDepart2" value="브랜드" <?=element("com1CoworkDepart", $detailD)=='브랜드'?"checked":""?> onclick="fnViewOption('com1CoworkDepart', 'hide')">
								<label class="form-check-label" for="com1CoworkDepart2"> 브랜드</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="com1CoworkDepart" id="com1CoworkDepart3" value="UX·UI" <?=element("com1CoworkDepart", $detailD)=='UX·UI'?"checked":""?> onclick="fnViewOption('com1CoworkDepart', 'hide')">
								<label class="form-check-label" for="com1CoworkDepart3"> UX·UI</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="com1CoworkDepart" id="com1CoworkDepart4" value="디자인컨설팅" <?=element("com1CoworkDepart", $detailD)=='디자인컨설팅'?"checked":""?> onclick="fnViewOption('com1CoworkDepart', 'hide')">
								<label class="form-check-label" for="com1CoworkDepart4"> 디자인컨설팅</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="com1CoworkDepart" id="com1CoworkDepart5" value="기타" <?=element("com1CoworkDepart", $detailD)=='기타'?"checked":""?> onclick="fnViewOption('com1CoworkDepart', 'show')">
								<label class="form-check-label" for="com1CoworkDepart5"> 기타</label>
							</div>
							<div class="div_com1CoworkDepart pt-2">
								<div class="row mb-2">
									<label for="com1CoworkDepartEtc" class="col-sm-3 col-form-label">기타 내용입력</label>
									<div class="col-sm-9">
										<input type="text" name="com1CoworkDepartEtc" id="com1CoworkDepartEtc" class="form-control" value="<?=element("com1CoworkDepartEtc", 
										$detailD)?>" placeholder="기타 내용입력을 입력하세요">
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
				<!-- 과제평가 -->


				<nav>
					<div class="nav nav-tabs" id="nav-tab" role="tablist2">
						<button class="nav-link" id="nav-eval1-tab" type="button">1. 과제평가</button>
						<button class="nav-link active" id="nav-eval2-tab" type="button">2. 수행평가</button>
					</div>
				</nav>
				<!-- 수행평가 -->
				<div class="tab-pane fade show pt-3 pb-3" id="nav-eval2">
				
					<div class="row mb-2">
						<label for="com2Status" class="col-sm-2 col-form-label"><div class="bigTitle">디자인기업 현황</div></label>
						<div class="col-sm-10">
							<textarea class="form-control" name="com2Status" id="com2Status" rows="5" placeholder="기업현황 등을 간략히 기재하세요
- 기업연혁
- 분야 및 생산품목
- 주요 거래처"><?=element("com2Status", $detailD)?></textarea>
<? /*
							<div class="input-group mb-2">
								<span class="input-group-text">기업연혁</span>
								<textarea class="form-control" name="com1statusHistory" id="com1statusHistory" rows="5" placeholder="기업연혁을 간략히 기재하세요"><?=element("com1statusHistory", $detailD)?></textarea>
							</div>
							<div class="input-group mb-2">
								<span class="input-group-text">분야 및 <br>생산품목</span>
								<textarea class="form-control" name="com1statusProduct" id="com1statusProduct" rows="5" placeholder="분야 및 생산품목을 간략히 기재하세요"><?=element("com1statusProduct", $detailD)?></textarea>
							</div>
							<div class="input-group mb-2">
								<span class="input-group-text p-3">주요 <br>거래처</span>
								<textarea class="form-control" name="com1statusClients" id="com1statusClients" rows="5" placeholder="주요 거래처를 간략히 기재하세요"><?=element("com1statusClients", $detailD)?></textarea>
							</div>
*/ ?>
							<p class="text-dark">※ 기업 현황 등을 간략히 기재<br>- 기업연혁 / 분야 및 생산품목 / 주요 거래처 등</p>
						</div>
					</div>

					<div class="row mb-2">
						<label for="projectName" class="col-sm-2 col-form-label"><div class="bigTitle">디자인기업 매출현황</div></label>
						<div class="col-sm-10">
							<div class="row">
								<div class="col-sm-3">
									<div class="input-group">
										<input type="text" name="com2Sales2021" class="form-control onlyNumber" value="<?=element("com2Sales2021", $detailD)?>" placeholder="2021년 매출액을 입력하세요" inputmode="numeric" pattern="[0-9]*">
										<span class="input-group-text">원</span>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="input-group">
										<input type="text" name="com2Sales2022" class="form-control onlyNumber" value="<?=element("com2Sales2022", $detailD)?>" placeholder="2022년 매출액을 입력하세요" inputmode="numeric" pattern="[0-9]*">
										<span class="input-group-text">원</span>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="input-group">
										<input type="text" name="com2Sales2023" class="form-control onlyNumber" value="<?=element("com2Sales2023", $detailD)?>" placeholder="2023년 매출액을 입력하세요" inputmode="numeric" pattern="[0-9]*">
										<span class="input-group-text">원</span>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="input-group">
										<input type="text" name="com2Sales2024" class="form-control onlyNumber" value="<?=element("com2Sales2024", $detailD)?>" placeholder="2024년 예상 매출액을 입력하세요" inputmode="numeric" pattern="[0-9]*">
										<span class="input-group-text">원</span>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row mb-2">
						<label for="projectName" class="col-sm-2 col-form-label"><div class="bigTitle">디자인기업 인력현황</div></label>
						<div class="col-sm-10">
							<div class="row mb-2">
								<p>전체 인원</p>
								<div class="col-sm-3">
									<div class="input-group">
										<input type="text" name="com2Employee2021" class="form-control onlyNumber" value="<?=element("com2Employee2021", $detailD)?>" placeholder="2021년 전체인원을 입력하세요" inputmode="numeric" pattern="[0-9]*">
										<span class="input-group-text">명</span>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="input-group">
										<input type="text" name="com2Employee2022" class="form-control onlyNumber" value="<?=element("com2Employee2022", $detailD)?>" placeholder="2022년 전체인원을 입력하세요" inputmode="numeric" pattern="[0-9]*">
										<span class="input-group-text">명</span>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="input-group">
										<input type="text" name="com2Employee2023" class="form-control onlyNumber" value="<?=element("com2Employee2023", $detailD)?>" placeholder="2023년 전체인원을 입력하세요" inputmode="numeric" pattern="[0-9]*">
										<span class="input-group-text">명</span>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="input-group">
										<input type="text" name="com2Employee2024" class="form-control onlyNumber" value="<?=element("com2Employee2024", $detailD)?>" placeholder="2024년 예상 전체인원을 입력하세요" inputmode="numeric" pattern="[0-9]*">
										<span class="input-group-text">명</span>
									</div>
								</div>
							</div>
							<div class="row mb-2">
								<p>디자이너</p>
								<div class="col-sm-3">
									<div class="input-group">
										<input type="text" name="com2Designer2021" class="form-control onlyNumber" value="<?=element("com2Designer2021", $detailD)?>" placeholder="2021년 디자이너 인원을 입력하세요" inputmode="numeric" pattern="[0-9]*">
										<span class="input-group-text">명</span>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="input-group">
										<input type="text" name="com2Designer2022" class="form-control onlyNumber" value="<?=element("com2Designer2022", $detailD)?>" placeholder="2022년 디자이너 인원을 입력하세요" inputmode="numeric" pattern="[0-9]*">
										<span class="input-group-text">명</span>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="input-group">
										<input type="text" name="com2Designer2023" class="form-control onlyNumber" value="<?=element("com2Designer2023", $detailD)?>" placeholder="2023년 디자이너 인원을 입력하세요" inputmode="numeric" pattern="[0-9]*">
										<span class="input-group-text">명</span>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="input-group">
										<input type="text" name="com2Designer2024" class="form-control onlyNumber" value="<?=element("com2Designer2024", $detailD)?>" placeholder="2024년 예상 디자이너 인원을 입력하세요" inputmode="numeric" pattern="[0-9]*">
										<span class="input-group-text">명</span>
									</div>
								</div>
							</div>
						</div>
					</div>


					<div class="row mb-2">
						<label for="com2Technical" class="col-sm-2 col-form-label"><div class="bigTitle">디자인기업<br> 역량 및 전문성</div></label>
						<div class="col-sm-10">
							<textarea class="form-control" name="com2Technical" id="com2Technical" rows="15" placeholder="※ 디자인기업의 주요실적 및 공모전 수상 실적 등을 기재(최근 5년, 신청과제와 유사실적 등)
- 주요실적 사업명, 사업기간, 총매출액, 발주기관, 주요내용 및 성과
- 국내외 어워드 수상실적(수상년도, 어워드명, 수상내용 등)




※ 디자인기업의 전문성, 보유기술, 디자인 보유 역량 등을 기재
- 참여 디자이너의 전문분야, 주요 경력내용 등을 상세히 기재(증빙서류 첨부)"><?=element("com2Technical", $detailD)?></textarea>
							<p>※ 디자인기업의 주요실적 및 공모전 수상 실적 등을 기재(최근 5년, 신청과제와 유사실적 등)<br>
							- 주요실적 사업명, 사업기간, 총매출액, 발주기관, 주요내용 및 성과<br>
							- 국내외 어워드 수상실적(수상년도, 어워드명, 수상내용 등)</p>
							<p>※ 디자인기업의 전문성, 보유기술, 디자인 보유 역량 등을 기재<br>
							- 참여 디자이너의 전문분야, 주요 경력내용 등을 상세히 기재(증빙서류 첨부)</p>

							<h5 class="nt-3">증빙서류 업로드</h5>
							<div class="divDocu15"></div>
						</div>
					</div>


					<div class="row mb-2">
						<label for="com2Vision" class="col-sm-2 col-form-label"><div class="bigTitle">디자인기업 <br>소개 및 신청사유</div></label>
						<div class="col-sm-10">

							<div class="row">
								<label for="com2JoinPath1" class="col-sm-2 col-form-label">참여경로</label>
								<div class="col-sm-10 pt-2">
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="com2JoinPath[]" id="com2JoinPath1" value="서울시·재단 홈페이지" <?=preg_match("/재단/i", element("com2JoinPath", $detailD))?"checked":""?>>
										<label class="form-check-label" for="com2JoinPath1"> 서울시·재단 홈페이지</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="com2JoinPath[]" id="com2JoinPath2" value="SNS 홍보" <?=preg_match("/SNS/i", element("com2JoinPath", $detailD))?"checked":""?>>
										<label class="form-check-label" for="com2JoinPath2"> SNS 홍보</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="com2JoinPath[]" id="com2JoinPath3" value="지인 소개" <?=preg_match("/지인/i", element("com2JoinPath", $detailD))?"checked":""?>>
										<label class="form-check-label" for="com2JoinPath3"> 지인 소개</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="com2JoinPath[]" id="com2JoinPath4" value="기업·산업·디자인 관련 커뮤니티" <?=preg_match("/커뮤니티/i", element("com2JoinPath", $detailD))?"checked":""?>>
										<label class="form-check-label" for="com2JoinPath4"> 기업·산업·디자인 관련 커뮤니티</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="com2JoinPath[]" id="com2JoinPath5" value="컨소시엄 기업의 추천" <?=preg_match("/컨소시엄/i", element("com2JoinPath", $detailD))?"checked":""?>>
										<label class="form-check-label" for="com2JoinPath5"> 컨소시엄 기업의 추천</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="com2JoinPath[]" id="com2JoinPath6" value="기타" <?=preg_match("/기타/i", element("com2JoinPath", $detailD))?"checked":""?>>
										<label class="form-check-label" for="com2JoinPath6"> 기타</label>
									</div>
								</div>
							</div>


							<textarea class="form-control" name="com2Vision" id="com2Vision" rows="5" placeholder="※ 기업의 비전 및 의지, 디자인 개발 지원 신청 사유 등을 간략히 기재 "><?=element("com2Vision", $detailD)?></textarea>
						</div>
					</div>

					<div class="row mb-2">
						<label for="com2Vision" class="col-sm-2 col-form-label"><div class="bigTitle">디자인 개발 <br>수행계획</div></label>
						<div class="col-sm-10">

							<h5>진단 및 분석</h5>

							<p>- 디자인 개발 범위(신규 또는 개선 등 디자인 개발 범위 및 내용 기재)</p>
							<textarea class="form-control" name="com2Required" id="com2Required" rows="5" placeholder="- 디자인 개발 범위(신규 또는 개선 등 디자인 개발 범위 및 내용 기재)"><?=element("com2Required", $detailD)?></textarea>

							<p>- 문제점 진단, 목표시장 조사 및 분석, 진출 전략 등을 기재</p>
							<textarea class="form-control" name="com2Diagnosis" id="com2Diagnosis" rows="5" placeholder="- 문제점 진단, 목표시장 조사 및 분석, 진출 전략 등을 기재"><?=element("com2Diagnosis", $detailD)?></textarea>

							<h5 class="mt-3">디자인 기획 및 개발 전략</h5>

							<textarea class="form-control" name="com2Strategy" id="com2Strategy" rows="15" placeholder="- 디자인 콘셉트 및 디자인 개발 주요 전략 등을 기술 
- 디자인(콘셉트)의 창의성 및 우수성 등을 전략적으로 기술
  ※ 디자인 콘셉트(안) 등 이미지 삽입





- 디자인 개발 과정의 수행·수혜기업 간 협력방안 등 기재
- 수행계획의 전략적 추진방안 등 기재"><?=element("com2Strategy", $detailD)?></textarea>
							<p>- 디자인 콘셉트 및 디자인 개발 주요 전략 등을 기술<br> 
							- 디자인(콘셉트)의 창의성 및 우수성 등을 전략적으로 기술<br> 
							※ 디자인 콘셉트(안) 등 이미지 삽입</p>
							<p>- 디자인 개발 과정의 수행·수혜기업 간 협력방안 등 기재<br> 
							- 수행계획의 전략적 추진방안 등 기재</p>

							<h5 class="mt-3">디자인 콘셉트(안) 등 이미지 업로드</h5>
							<ul class="ulConceptExplain row mt-4" id="ulConceptExplain">
							</ul>
						</div>
					</div>


					<div class="row mb-2">
						<label for="com2ResultDocu" class="col-sm-2 col-form-label"><div class="bigTitle">예상 도출 결과물</div></label>
						<div class="col-sm-10">
							<textarea class="form-control" name="com2ResultDocu" id="com2ResultDocu" rows="10" placeholder="- 디자인 개발 지원을 통해 예상되는 도출 결과물 등을 모두 기재

※ 작성예시
1. 사용성 및 시장성 조사, 분석자료 (      부) 
2. 전후 비교시안 등 디자인안 (2D, 3D등)
3. 설계 도면 (      부) 
4. 시방서 (      부) 
5. 매뉴얼 북사용설명서 등) (      부) 
6. 목업 (      개) 
7. 결과보고서 (      부) "><?=element("com2ResultDocu", $detailD)?></textarea>
							<p>- 디자인 개발 지원을 통해 예상되는 도출 결과물 등을 모두 기재<br>
							※ 작성예시<br>
							1. 사용성 및 시장성 조사, 분석자료 (      부) <br>
							2. 전후 비교시안 등 디자인안 (2D, 3D등)<br>
							3. 설계 도면 (      부) <br>
							4. 시방서 (      부) <br>
							5. 매뉴얼 북사용설명서 등) (      부) <br>
							6. 목업 (      개) <br>
							7. 결과보고서 (      부) </p>

							<h5 class="mt-3">예상 도출 결과물 업로드</h5>
							<ul class="ulExpectResult row mt-4" id="ulExpectResult">
							</ul>

						</div>
					</div>

					<div class="row mb-2">
						<label for="com2Schedule" class="col-sm-2 col-form-label"><div class="bigTitle">추진 일정</div></label>
						<div class="col-sm-10">
							<textarea class="form-control" name="com2Schedule" id="com2Schedule" rows="10" placeholder="- 디자인 개발 등을 위한 추진 일정 기재(5월 ~ 8월)

※ 작성예시
1. 사용성 및 시장조사 등 조사분석 : 5월
2. 디자인 기획 방향 수립 및 콘셉트 도출 : 5월~6월 
3. 아이디어 스케치 및 구체화 : 5월~6월  
4. 2D, 3D 모델링 및 렌더링 : 6월~7월   
5. 디자인 설계 : 6월~7월
6. 목업 제작 : 8월 
7. 개발된 디자인 활용계획 수립 : 8월 
8. 보고서 작성 및 제출 : 8월 "><?=element("com2Schedule", $detailD)?></textarea>
							<p>- 디자인 개발 등을 위한 추진 일정 기재(5월 ~ 8월)<br>
							※ 작성예시<br>
							1. 사용성 및 시장조사 등 조사분석 : 5월<br>
							2. 디자인 기획 방향 수립 및 콘셉트 도출 : 5월~6월 <br>
							3. 아이디어 스케치 및 구체화 : 5월~6월  <br>
							4. 2D, 3D 모델링 및 렌더링 : 6월~7월   <br>
							5. 디자인 설계 : 6월~7월<br>
							6. 목업 제작 : 8월 <br>
							7. 개발된 디자인 활용계획 수립 : 8월 <br>
							8. 보고서 작성 및 제출 : 8월</p>
						</div>
					</div>



				</div>
			</div>


		</div>
	</div>

</div>





<div class="divContents divApply mt-5 pt-5">
	<div class="row">
		<div class="col-sm-3 mb-4">
			<div class="list-group">
				<button type="button" class="list-group-item list-group-item-action">Step1. 신청서</button>
				<button type="button" class="list-group-item list-group-item-action">Step2. 산출내역서</button>
				<button type="button" class="list-group-item list-group-item-action">Step3. 수행계획서</button>
				<button type="button" class="list-group-item list-group-item-action list-group-item-dark active" aria-current="true">Step4. 청렴서약서</button>
				<button type="button" class="list-group-item list-group-item-action">Step5. 개인정보 수집·이용·제공 동의서 </button>
				<button type="button" class="list-group-item list-group-item-action">Step6. 제출서류</button>
			</div>
		</div>
		<div class="col-sm-9 divAgree">
			<h4>청렴서약서</h4>
			<br>

			<h5 class="mb-4" style="line-height:200%;">당사는 부패 없는 투명한 기업경영과 공정한 행정이 사회발전과 국가 경쟁력에 중요한 관건이 됨을 깊이 인식하며, 국제적으로도 OECD뇌물방지 협약이 발효되고 부패기업 및 국가에 대한 제재가 강화되는 추세에 맞추어 청렴계약제 시행 취지에 적극 호응하여 해당 사업에 참여함에 있어 다음 사항을 준수할 것을 서약합니다.</h5>
			<ul class="ulClean">
				<li>본 사업의 신청 및 참여 시 담합 등 부당 또는 불공정한 일체의 행위를 않겠습니다.</li>
				<li>누구에게도 사적인 이익을 위해 청탁하지 않겠습니다.</li>
				<li>어떠한 명목으로도 일체의 금품. 향응을 제공하지 않겠습니다.</li>
				<li>관련 법령과 규정을 준수하여 사업을 진행하겠습니다.</li>
			</ul>
			<h5 class="mb-4" style="line-height:200%;">위 준수사항을 위반한 경우에는 향후 사업선정 취소 등의 어떠한 불이익 처분이 있더라도 이의를 제기하지 않을 것을 약속합니다 .</h5>
			<hr>

			<div class="row mt-4 mb-5">
				<div class="col-sm-6">
					<h5>중소기업</h5>


					<p class="">서약자 : <?=element("com1Name", $detailD)?> 대표 <?=element("com1RepresentName", $detailD)?></p>

					<button class="mt-3 btn btn-<?=element("com1sign2Data2", $detailD)?"success":"danger"?> w-100" id="btnSign2_com1" type="button" onclick="return fnDoSign3('com1')">서명</button>

				</div>
				<div class="col-sm-6">
					<h5>디자인기업</h5>

					<p class="">서약자 : <?=element("com2Name", $detailD)?> 디자인개발기업 대표 <?=element("com2RepresentName", $detailD)?></p>

					<button class="mt-3 btn btn-<?=element("com2sign2Data2", $detailD)?"success":"danger"?> w-100" id="btnSign2_com2" type="button" onclick="return fnDoSign3('com2')">서명</button>

			<textarea class="d-none" name="com1sign2Data1" id="com1sign2Data1"><?=element("com1sign2Data1", $detailD)?></textarea>
			<textarea class="d-none" name="com1sign2Data2" id="com1sign2Data2"><?=element("com1sign2Data2", $detailD)?></textarea>
			<textarea class="d-none" name="com2sign2Data1" id="com2sign2Data1"><?=element("com2sign2Data1", $detailD)?></textarea>
			<textarea class="d-none" name="com2sign2Data2" id="com2sign2Data2"><?=element("com2sign2Data2", $detailD)?></textarea>
		</div>
	</div>
</div>




<div class="divContents divApply mt-5 pt-5">
	<div class="row">
		<div class="col-sm-3 mb-4">
			<div class="list-group">
				<button type="button" class="list-group-item list-group-item-action">Step1. 신청서</button>
				<button type="button" class="list-group-item list-group-item-action">Step2. 산출내역서</button>
				<button type="button" class="list-group-item list-group-item-action">Step3. 수행계획서</button>
				<button type="button" class="list-group-item list-group-item-action">Step4. 청렴서약서</button>
				<button type="button" class="list-group-item list-group-item-action list-group-item-dark active" aria-current="true">Step5. 개인정보 수집·이용·제공 동의서 </button>
				<button type="button" class="list-group-item list-group-item-action">Step6. 제출서류</button>
			</div>
		</div>
		<div class="col-sm-9 divAgree">
			<h4>개인정보 수집·이용·제공 동의서</h4>
			<br>
			<div class="divBox p-4" style="height:150px;overflow-y:auto;border:1px solid black;">
				<h5 class="mb-4">개인정보를 수집·이용·제공하고자 하는 경우에는「개인정보 보호법」제15조 제1항 제1호, 제17조 제1항 제1호, 제24조 제1항 제1호에 따라 본인의 동의를 얻어야 합니다. <br>이에 본인은 아래의 내용과 같이 본인의 개인정보를 수집·이용·제공하는 것에 동의합니다.</h5>
				<p>1. 개인정보의 수집ㆍ이용에 관한 사항</p>
				<p class="ps-3">￭ 수집ㆍ이용 목적</p>
				<p class="ps-4">- 사업 참여 및 프로그램 지원, 사후관리 등을 위해 사업참여 신청자 정보 수집·이용 </p>
				<p class="ps-4">- 우수사례 발굴 및 사업성과 확산을 위한 정보 수집·이용</p>
				<p class="ps-4">- 사업 안내 및 홍보 등을 위한 자료발송 등 </p>
				<p class="ps-3">￭ 개인정보 수집 항목</p>
				<p class="ps-4">- 성명, 단체명, 법인등록번호, 연락처, 주소, 이메일 기타 선정·지원과 관련된 개인정보 </p>
				<p class="ps-3">￭ 보유 및 이용 기간</p>
				<p class="ps-4">수집ㆍ이용에 관한 동의일로부터 5년</p>
				<p class="mt-3">2. 개인정보의 제3자 제공</p>
				<p class="ps-3">￭ 개인정보를 제공받는 자</p>
				<p class="ps-4">- 서울디자인 재단, 서울시, 컨설팅 전문가, 전문회사(‘중소기업 산업디자인 개발 지원사업’과 관련하여 디자인재단과 계약을 체결한 회사)</p>
				<p class="ps-3">￭ 개인정보를 제공받는 자의 개인정보 이용 목적</p>
				<p class="ps-4">- 효과적인 사업운영과 관리, 홍보 등 </p>
				<p class="ps-3">￭ 제공하는 개인정보 항목</p>
				<p class="ps-4">- 성명, 단체명, 법인등록번호, 연락처, 주소, 이메일 기타 선정·지원과 관련된 개인정보</p>
				<p class="ps-3">￭ 보유 및 이용 기간</p>
				<p class="ps-4">수집ㆍ이용에 관한 동의일로부터 5년</p>
				<hr>
				<div class="row">
					<div class="col-sm-12">
						정보주체의 동의, 법률의 특별한 규정 등 개인정보보호법 제 17조 및 제 18조에 해당하는 경우에만 개인정보를 제3자에게 제공합니다.
					</div>
				</div>
			</div>
			<br>
			<h5>개인정보의 수집·이용에 관한 사항 및 개인정보의 제3자 제공에 동의하십니까?</h5>

			<div class="row mt-4 mb-5">
				<div class="col-sm-6">
					<h5>중소기업</h5>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="agree" id="flexRadioDefault11" value="Y" <?=element("agree", $applyD)=='Y' ? 'checked' : ''?>>
						<label class="form-check-label" for="flexRadioDefault11">
						동의함
						</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="agree" id="flexRadioDefault12" value="N" <?=element("agree", $applyD)=='N' ? 'checked' : ''?>>
						<label class="form-check-label" for="flexRadioDefault12">
						동의하지 않음
						</label>
					</div>

					<button class="mt-3 btn btn-<?=element("com1sign1Data2", $detailD)?"success":"danger"?> w-100" id="btnSign1_com1" type="button" onclick="return fnDoSign2('com1')">서명</button>

				</div>
				<div class="col-sm-6">
					<h5>디자인기업</h5>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="agree2" id="flexRadioDefault21" value="Y" <?=element("agree2", $applyD)=='Y' ? 'checked' : ''?>>
						<label class="form-check-label" for="flexRadioDefault21">
						동의함
						</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="agree2" id="flexRadioDefault22" value="N" <?=element("agree2", $applyD)=='N' ? 'checked' : ''?>>
						<label class="form-check-label" for="flexRadioDefault22">
						동의하지 않음
						</label>
					</div>

					<button class="mt-3 btn btn-<?=element("com2sign1Data2", $detailD)?"success":"danger"?> w-100" id="btnSign1_com2" type="button" onclick="return fnDoSign2('com2')">서명</button>

			<textarea class="d-none" name="com1sign1Data1" id="com1sign1Data1"><?=element("com1sign1Data1", $detailD)?></textarea>
			<textarea class="d-none" name="com1sign1Data2" id="com1sign1Data2"><?=element("com1sign1Data2", $detailD)?></textarea>
			<textarea class="d-none" name="com2sign1Data1" id="com2sign1Data1"><?=element("com2sign1Data1", $detailD)?></textarea>
			<textarea class="d-none" name="com2sign1Data2" id="com2sign1Data2"><?=element("com2sign1Data2", $detailD)?></textarea>

		</div>
	</div>
</div>


<div class="divContents divApply mt-5 pt-5">
	<div class="row">
		<div class="col-sm-3 mb-4">
			<div class="list-group">
				<button type="button" class="list-group-item list-group-item-action">Step1. 신청서</button>
				<button type="button" class="list-group-item list-group-item-action">Step2. 산출내역서</button>
				<button type="button" class="list-group-item list-group-item-action">Step3. 수행계획서</button>
				<button type="button" class="list-group-item list-group-item-action">Step4. 청렴서약서</button>
				<button type="button" class="list-group-item list-group-item-action">Step5. 개인정보 수집·이용·제공 동의서 </button>
				<button type="button" class="list-group-item list-group-item-action list-group-item-dark active" aria-current="true">Step6. 제출서류</button>
			</div>
		</div>
		<div class="col-sm-9 divAgree">
			<h4>제출서류</h4>
			<br>

			<div class="row mb-2 d-none">
				<label for="projectName" class="col-sm-4 col-form-label"><div class="bigTitle">청렴서약서</div></label>
				<div class="col-sm-4">
					<div class="divDocu4Com1"></div>
				</div>
				<div class="col-sm-4">
					<div class="divDocu4Com2"></div>
				</div>
			</div>

			<div class="row mb-2">
				<label for="projectName" class="col-sm-4 col-form-label"><div class="bigTitle">제품·서비스 소개서</div></label>
				<div class="col-sm-4">
					<div class="divDocu6Com1"></div>
				</div>
				<div class="col-sm-4 text-center align-middle pt-2">
					-
				</div>
			</div>

			<div class="row mb-2">
				<label for="projectName" class="col-sm-4 col-form-label"><div class="bigTitle">포트폴리오</div></label>
				<div class="col-sm-4 text-center align-middle pt-2">
					-
				</div>
				<div class="col-sm-4">
					<div class="divDocu7Com2"></div>
				</div>
			</div>

			<div class="row mb-2">
				<label for="projectName" class="col-sm-4 col-form-label"><div class="bigTitle">사업자등록증 사본</div></label>
				<div class="col-sm-4">
					<div class="divDocu8Com1"></div>
				</div>
				<div class="col-sm-4">
					<div class="divDocu8Com2"></div>
				</div>
			</div>

			<div class="row mb-2">
				<label for="projectName" class="col-sm-4 col-form-label"><div class="bigTitle">국세·지방세 납세증명서</div></label>
				<div class="col-sm-4">
					<div class="divDocu9Com1"></div>
				</div>
				<div class="col-sm-4">
					<div class="divDocu9Com2"></div>
				</div>
			</div>

			<div class="row mb-2">
				<label for="projectName" class="col-sm-4 col-form-label"><div class="bigTitle">중소기업확인서</div></label>
				<div class="col-sm-4">
					<div class="divDocu10Com1"></div>
				</div>
				<div class="col-sm-4 text-center align-middle pt-2">
					-
				</div>
			</div>

			<div class="row mb-2 d-none">
				<label for="projectName" class="col-sm-4 col-form-label"><div class="bigTitle">참가자격 실적 증명서류</div></label>
				<div class="col-sm-4 text-center align-middle pt-2">
					-
				</div>
				<div class="col-sm-4">
					<div class="divDocu11Com2"></div>
				</div>
			</div>

			<div class="row mb-2">
				<label for="projectName" class="col-sm-4 col-form-label"><div class="bigTitle">부가가치세과세표준증명</div></label>
				<div class="col-sm-4">
					<div class="divDocu16Com1"></div>
				</div>
				<div class="col-sm-4 text-center align-middle pt-2">
					-
				</div>
			</div>



			<div class="row mb-2">
				<label for="projectName" class="col-sm-4 col-form-label"><div class="bigTitle">산업디자인전문회사 신고필증 사본</div></label>
				<div class="col-sm-4 text-center align-middle pt-2">
					-
				</div>
				<div class="col-sm-4">
					<div class="divDocu12Com2"></div>
				</div>
			</div>

			<div class="row mb-2">
				<label for="projectName" class="col-sm-4 col-form-label"><div class="bigTitle">전문인력 확인서</div></label>
				<div class="col-sm-4 text-center align-middle pt-2">
					-
				</div>
				<div class="col-sm-4">
					<div class="divDocu13Com2"></div>
				</div>
			</div>

			<div class="row mb-2">
				<label for="projectName" class="col-sm-4 col-form-label"><div class="bigTitle">전문인력 4대 사회보험 사업장 가입자 명부</div></label>
				<div class="col-sm-4 text-center align-middle pt-2">
					-
				</div>
				<div class="col-sm-4">
					<div class="divDocu14Com2"></div>
				</div>
			</div>

		</div>
	</div>
</div>





<script>
var $masonry;
$(document).ready(function() {
	fnGetImgExplain();
	fnGetCenceptExplain();
	fnGetExpectResult();
	fnGetFileList('docu15', 'com2', 'divDocu15');
	fnGetFileList('docu4', 'com1', 'divDocu4Com1');
	fnGetFileList('docu4', 'com2', 'divDocu4Com2');
	fnGetFileList('docu6', 'com1', 'divDocu6Com1');
	fnGetFileList('docu7', 'com2', 'divDocu7Com2');
	fnGetFileList('docu8', 'com1', 'divDocu8Com1');
	fnGetFileList('docu8', 'com2', 'divDocu8Com2');
	fnGetFileList('docu9', 'com1', 'divDocu9Com1');
	fnGetFileList('docu9', 'com2', 'divDocu9Com2');
	fnGetFileList('docu10', 'com1', 'divDocu10Com1');
	fnGetFileList('docu11', 'com2', 'divDocu11Com2');
	fnGetFileList('docu12', 'com2', 'divDocu12Com2');
	fnGetFileList('docu13', 'com2', 'divDocu13Com2');
	fnGetFileList('docu14', 'com2', 'divDocu14Com2');
	fnGetFileList('docu16', 'com1', 'divDocu16Com1');
});


function fnGetExpectResult() {
	$.ajax({
		url: "/apply/ajaxGetUploadPhoto/",
		type: "POST",
		dataType: "html",
		data: {
			'type': 'expectResult',
			'applyNo': '<?=$applyNo?>',
			'btn': 'hidden',
			'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		},
		success: function(data){
			$('#ulExpectResult').html('');
			fnCallMasonry('ulExpectResult', data);
			//$("#ulImageExplain").html(data);
		}
	});
}
function fnGetCenceptExplain() {
	$.ajax({
		url: "/apply/ajaxGetUploadPhoto/",
		type: "POST",
		dataType: "html",
		data: {
			'type': 'conceptExplain',
			'applyNo': '<?=$applyNo?>',
			'btn': 'hidden',
			'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		},
		success: function(data){
			$('#ulConceptExplain').html('');
			fnCallMasonry('ulConceptExplain', data);
			//$("#ulImageExplain").html(data);
		}
	});
}
function fnGetImgExplain() {
	$.ajax({
		url: "/apply/ajaxGetUploadPhoto/",
		type: "POST",
		dataType: "html",
		data: {
			'type': 'imgExplain',
			'applyNo': '<?=$applyNo?>',
			'btn': 'hidden',
			'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		},
		success: function(data){
			$('#ulImageExplain').html('');
			fnCallMasonry('ulImageExplain', data);
			//$("#ulImageExplain").html(data);
		}
	});
}
function fnCallMasonry(id, data) {
	var $content = $(data);
	var $masonry = $('#'+id).append( $content ).masonry( 'appended', $content ).masonry({
		// options
		itemSelector: '.grid-item',
		columnWidth: '.grid-item',
		percentPosition: true
	});
	var timerId = setInterval(function() { $masonry.masonry('layout') }, 1000);
	setTimeout(function() { clearInterval(timerId); }, 10000);
}
function fnGetFileList(docuType, comType, target) {
	$("."+target).html("");
	$.ajax({
		url: "/apply/ajaxGetDocuList/",
		type: "POST",
		dataType: "html",
		data: {
			'applyNo': '<?=$applyNo?>',
			'docuType': docuType,
			'comType': comType,
			'btn': 'hidden',
			'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		},
		success: function(data){
			$("."+target).html(data);
		}
	});
}
function fnViewFile(fileName, clientName) {
	location = "/viewFiles/"+fileName+"/";
}
$("input").attr("disabled", true);
$("textarea").attr("disabled", true);
</script>