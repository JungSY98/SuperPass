<div class="box">
	<div class="box-table">

<!--[if IE]>
<script type="text/javascript" src="/assets/signature/excanvas.js"></script>
<![endif]-->
<script type="text/javascript" src="/assets/signature/jquery.ui.touch-punch.min.js"></script>
<script src="/assets/signature/jquery.signature.js"></script>


<div class="divContents2 divApply">
	<div class="row">
		<div class="col-sm-12 divForm">

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
										<input type="text" class="form-control" readonly id="com1Zip" name="com1Zip" placeholder="00000" maxlength=5  onclick="execDaumPostcode('com1')" value="<?=element("com1Zip", $detailD)?>">
										<input type="text" class="form-control" readonly id="com1Address1" name="com1Address1" placeholder="주소를 입력하세요" style="width:50% !important;" onclick="execDaumPostcode('com1')" value="<?=element("com1Address1", $detailD)?>">
										<button class="btn btn-dark" type="button" onclick="execDaumPostcode('com1')">주소검색</button>
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
										<input type="text" class="form-control" readonly id="com2Zip" name="com2Zip" placeholder="00000" maxlength=5  onclick="execDaumPostcode('com2')" value="<?=element("com2Zip", $detailD)?>">
										<input type="text" class="form-control" readonly id="com2Address1" name="com2Address1" placeholder="주소를 입력하세요" style="width:50% !important;" onclick="execDaumPostcode('com2')" value="<?=element("com2Address1", $detailD)?>">
										<button class="btn btn-dark" type="button" onclick="execDaumPostcode('com2')">주소검색</button>
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
						<input type="text" class="form-control onlyNumber" id="totalPrice" name="totalPrice" placeholder="개발비용을 입력하세요" value="<?=element("totalPrice", $detailD)?>">
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
						<!-- <button class="btn btn-<?=element("com1signData2", $detailD)?"success":"danger"?>" id="btnSign_com1" type="button" onclick="return fnDoSign('com1')">서명</button> -->
					</div>
				</div>
				<div class="col-sm-6">
					<div class="input-group">
						<span class="input-group-text">디자인기업</span>
						<input type="text" class="form-control" id="signCom2Name" name="signCom2Name" value="<?=element("signCom2Name", $detailD)?>">
						<span class="input-group-text">대표</span>
						<input type="text" class="form-control" id="signCom2Represent" name="signCom2Represent" value="<?=element("signCom2Represent", $detailD)?>">
						<!-- <button class="btn btn-<?=element("com2signData2", $detailD)?"success":"danger"?>" id="btnSign_com2" type="button" onclick="return fnDoSign('com2')">서명</button> -->
					</div>
				</div>
			</div>

			<hr>

		</div>
	</div>
	<textarea class="d-none" name="com1signData1" id="com1signData1"><?=element("com1signData1", $detailD)?></textarea>
	<textarea class="d-none" name="com1signData2" id="com1signData2"><?=element("com1signData2", $detailD)?></textarea>
	<textarea class="d-none" name="com2signData1" id="com2signData1"><?=element("com2signData1", $detailD)?></textarea>
	<textarea class="d-none" name="com2signData2" id="com2signData2"><?=element("com2signData2", $detailD)?></textarea>
</div>

<div class="divForm">
	<h4>제출서류</h4>
	<br>

	<div class="row mb-2">
		<label for="projectName" class="col-sm-6 col-form-label"><div class="bigTitle">지원신청서 및 기업 일반현황</div></label>
		<div class="col-sm-6">
			<button type="button" class="btn btn-<?=isset($fileD['docu1']['com1'])?'siteprimary':'secondary'?> w-100" onclick="return fnFileUpload('docu1', 'com1')">공용</button>
		</div>
	</div>

	<div class="row mb-2">
		<label for="projectName" class="col-sm-6 col-form-label"><div class="bigTitle">개인정보 등의 수집·이용 제공동의서</div></label>
		<div class="col-sm-3">
			<button type="button" class="btn btn-<?=isset($fileD['docu2']['com1'])?'siteprimary':'secondary'?> w-100" onclick="return fnFileUpload('docu2', 'com1')">중소기업</button>
		</div>
		<div class="col-sm-3">
			<button type="button" class="btn btn-<?=isset($fileD['docu2']['com2'])?'siteprimary':'secondary'?> w-100" onclick="return fnFileUpload('docu2', 'com2')">디자인전문기업</button>
		</div>
	</div>

	<div class="row mb-2">
		<label for="projectName" class="col-sm-6 col-form-label"><div class="bigTitle">디자인개발비 산출내역서</div></label>
		<div class="col-sm-6">
			<button type="button" class="btn btn-<?=isset($fileD['docu3']['com1'])?'siteprimary':'secondary'?> w-100" onclick="return fnFileUpload('docu3', 'com1')">공용</button>
		</div>
	</div>



	<div class="row mb-2">
		<label for="projectName" class="col-sm-6 col-form-label"><div class="bigTitle">청렴서약서</div></label>
		<div class="col-sm-3">
			<button type="button" class="btn btn-<?=isset($fileD['docu4']['com1'])?'siteprimary':'secondary'?> w-100" onclick="return fnFileUpload('docu4', 'com1')">중소기업</button>
		</div>
		<div class="col-sm-3">
			<button type="button" class="btn btn-<?=isset($fileD['docu4']['com2'])?'siteprimary':'secondary'?> w-100" onclick="return fnFileUpload('docu4', 'com2')">디자인전문기업</button>
		</div>
	</div>

	<div class="row mb-2">
		<label for="projectName" class="col-sm-6 col-form-label"><div class="bigTitle">세부 수행계획서</div></label>
		<div class="col-sm-6">
			<button type="button" class="btn btn-<?=isset($fileD['docu5']['com1'])?'siteprimary':'secondary'?> w-100" onclick="return fnFileUpload('docu5', 'com1')">공용</button>
		</div>
	</div>




	<div class="row mb-2">
		<label for="projectName" class="col-sm-6 col-form-label"><div class="bigTitle">제품·서비스 소개서</div></label>
		<div class="col-sm-3">
			<button type="button" class="btn btn-<?=isset($fileD['docu6']['com1'])?'siteprimary':'secondary'?> w-100" onclick="return fnFileUpload('docu6', 'com1')">중소기업</button>
		</div>
		<div class="col-sm-3 text-center align-middle pt-2">
			-
		</div>
	</div>

	<div class="row mb-2">
		<label for="projectName" class="col-sm-6 col-form-label"><div class="bigTitle">포트폴리오</div></label>
		<div class="col-sm-3 text-center align-middle pt-2">
			-
		</div>
		<div class="col-sm-3">
			<button type="button" class="btn btn-<?=isset($fileD['docu7']['com2'])?'siteprimary':'secondary'?> w-100" onclick="return fnFileUpload('docu7', 'com2')">디자인전문기업</button>
		</div>
	</div>

	<div class="row mb-2">
		<label for="projectName" class="col-sm-6 col-form-label"><div class="bigTitle">사업자등록증 사본</div></label>
		<div class="col-sm-3">
			<button type="button" class="btn btn-<?=isset($fileD['docu8']['com1'])?'siteprimary':'secondary'?> w-100" onclick="return fnFileUpload('docu8', 'com1')">중소기업</button>
		</div>
		<div class="col-sm-3">
			<button type="button" class="btn btn-<?=isset($fileD['docu8']['com2'])?'siteprimary':'secondary'?> w-100" onclick="return fnFileUpload('docu8', 'com2')">디자인전문기업</button>
		</div>
	</div>

	<div class="row mb-2">
		<label for="projectName" class="col-sm-6 col-form-label"><div class="bigTitle">국세·지방세 납세증명서</div></label>
		<div class="col-sm-3">
			<button type="button" class="btn btn-<?=isset($fileD['docu9']['com1'])?'siteprimary':'secondary'?> w-100" onclick="return fnFileUpload('docu9', 'com1')">중소기업</button>
		</div>
		<div class="col-sm-3">
			<button type="button" class="btn btn-<?=isset($fileD['docu9']['com2'])?'siteprimary':'secondary'?> w-100" onclick="return fnFileUpload('docu9', 'com2')">디자인전문기업</button>
		</div>
	</div>

	<div class="row mb-2">
		<label for="projectName" class="col-sm-6 col-form-label"><div class="bigTitle">중소기업확인서</div></label>
		<div class="col-sm-3">
			<button type="button" class="btn btn-<?=isset($fileD['docu10']['com1'])?'siteprimary':'secondary'?> w-100" onclick="return fnFileUpload('docu10', 'com1')">중소기업</button>
		</div>
		<div class="col-sm-3 text-center align-middle pt-2">
			-
		</div>
	</div>

	<div class="row mb-2">
		<label for="projectName" class="col-sm-6 col-form-label"><div class="bigTitle">참가자격 실적 증명서류</div></label>
		<div class="col-sm-3 text-center align-middle pt-2">
			-
		</div>
		<div class="col-sm-3">
			<button type="button" class="btn btn-<?=isset($fileD['docu11']['com2'])?'siteprimary':'secondary'?> w-100" onclick="return fnFileUpload('docu11', 'com2')">디자인전문기업</button>
		</div>
	</div>

	<div class="row mb-2">
		<label for="projectName" class="col-sm-6 col-form-label"><div class="bigTitle">산업디자인전문회사 신고필증 사본</div></label>
		<div class="col-sm-3 text-center align-middle pt-2">
			-
		</div>
		<div class="col-sm-3">
			<button type="button" class="btn btn-<?=isset($fileD['docu12']['com2'])?'siteprimary':'secondary'?> w-100" onclick="return fnFileUpload('docu12', 'com2')">디자인전문기업</button>
		</div>
	</div>

	<div class="row mb-2">
		<label for="projectName" class="col-sm-6 col-form-label"><div class="bigTitle">전문인력 확인서</div></label>
		<div class="col-sm-3 text-center align-middle pt-2">
			-
		</div>
		<div class="col-sm-3">
			<button type="button" class="btn btn-<?=isset($fileD['docu13']['com2'])?'siteprimary':'secondary'?> w-100" onclick="return fnFileUpload('docu13', 'com2')">디자인전문기업</button>
		</div>
	</div>

	<div class="row mb-2">
		<label for="projectName" class="col-sm-6 col-form-label"><div class="bigTitle">전문인력 4대 사회보험 사업장 가입자 명부</div></label>
		<div class="col-sm-3 text-center align-middle pt-2">
			-
		</div>
		<div class="col-sm-3">
			<button type="button" class="btn btn-<?=isset($fileD['docu14']['com2'])?'siteprimary':'secondary'?> w-100" onclick="return fnFileUpload('docu14', 'com2')">디자인전문기업</button>
		</div>
	</div>
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
				<button type="button" class="btn btn-secondary" onclick="fnSignClear('signPlace')">서명 지우기</button>
				<button type="button" class="btn btn-danger" onclick="fnSignSave()">서명 저장</button>
			</div>
		</div>
	</div>
</div>

<!-- 우편번호 -->
<div id="daumAddressWrap" style="display:none;border:1px solid;width:50%;height:300px;margin:5px 0;position:fixed;top:calc(50% - 150px);left:25%;">
<img src="//t1.daumcdn.net/postcode/resource/images/close.png" id="btnFoldWrap" style="cursor:pointer;position:absolute;right:0px;top:-1px;z-index:1" onclick="foldDaumPostcode()" alt="접기 버튼">
</div>



<!-- 파일업로드 -->
<div class="modal fade" id="uploadModal" aria-labelledby="uploadModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="uploadModalLabel"><span></span></h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="divUploadFileList" id="divUploadFileList">
				</div>
				<div id="uploadFile" class="w-100 text-center"></div>
				<div id="uploadPlace" class="w-100 align-middle text-center"></div>
			</div>


			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" onclick="location.reload()">창닫기</button>
			</div>
		</div>
	</div>
</div>

<link rel="stylesheet" href="/assets/plupload/jquery.plupload.queue/css/jquery.plupload.queue.css" type="text/css" media="screen" />
<!-- production -->
<script type="text/javascript" src="/assets/plupload/plupload.full.min.js"></script>
<script type="text/javascript" src="/assets/plupload/i18n/ko.js" charset="UTF-8"></script>
<script type="text/javascript" src="/assets/plupload/jquery.plupload.queue/jquery.plupload.queue.js"></script>
<script>
/* 전역 변수 선언 */
var isAllUploaded = false;
var isFileAdd = false;
var currentStep = 'step5';
var arrFileName = new Array();
<? foreach($document as $k => $docuName) { ?>
arrFileName['<?=$k?>'] = '<?=$docuName?>';
<? } ?>
var arrComType = new Array();
arrComType['com1'] = '중소기업';
arrComType['com2'] = '디자인전문기업';
$(document).ready(function() {

});
// 최종 확인
function finishStep() {

}

function fnViewFile(fileName, clientName) {
	location = "/viewFiles/"+fileName+"/";
}

function fnDelFile2(no) {
	if (confirm("정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다.")) {
		$.ajax({
			url: "/apply2023/ajaxDelUploadPhoto/",
			type: "POST",
			dataType: "html",
			data: {
				'no': no,
				'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
			},
			success: function(data){
				$("#btnName"+no).remove();
			}
		});
	}
}

function fnGetFileList(docuType, comType) {
	$("#divUploadFileList").html("");
	$.ajax({
		url: "/apply2023/ajaxGetDocuList/",
		type: "POST",
		dataType: "html",
		data: {
			'applyNo': '<?=$applyNo?>',
			'docuType': docuType,
			'comType': comType,
			'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		},
		success: function(data){
			$("#divUploadFileList").html(data);
		}
	});
}

function fnUploadSave() {

}

function fnFileUpload(docuType, comType) {
	// 업로드 된 파일 가져오기
	fnGetFileList(docuType, comType);
	$("#uploadModalLabel").find("span").html("[ "+arrComType[comType]+" ]<br>"+arrFileName[docuType]+"  파일 첨부");
	fnCallFileUpload(docuType, comType);
	$("#uploadModal").modal("show");
}
function fnCallFileUpload(docuType, comType) {
	// Setup html5 version
	$("#uploadPlace").pluploadQueue({
		// General settings
		runtimes : 'html5',
		url : "/apply2023/upload",
		chunk_size : '1mb',
		unique_names : true,
		multipart_params: { 
			'applyNo' : '<?=$applyNo?>',
			'docuType' : docuType,
			'comType' : comType,
			'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		},
		filters : {
			prevent_duplicates : true,
			max_file_size : '100mb',
			mime_types: [
				{title : "Image files", extensions : "jpg,gif,png,JPG,jpeg,JPEG,GIF,PNG"},
				{title : "PDF files", extensions : "pdf,PDF"},
				{title : "Document files", extensions : "doc,docx,ppt,pptx,hwp,hwpx,xls,xlsx,DOC,DOCX,PPT,PPTX,HWP,HWPX,XLS,XLSX"},
				{title : "Zip files", extensions : "zip,ZIP"}
			]
		},
		init : {
			FilesAdded: function(up, files) {
				isAllUploaded = false;
				isFileAdd = true;
			},
			UploadComplete: function(up, files) {
                // Called when all files are either uploaded or failed
				fileVerify = new Array();
				plupload.each(files, function(file) {
					fileVerify.push(file);
				});
				isAllUploaded = true;
				isFileAdd = false;

				var upVerifyHtml = '';
				var arrUploadFiles = new Array();
				// 파일 DB 처리 
				for( var i = 0 ; i < fileVerify.length ; i++) {
					var clientName = fileVerify[i]['name'];
					var fileName = fileVerify[i]['target_name'];
					var fileData = JSON.stringify(fileVerify[i]);
					arrUploadFiles.push({"clientName":clientName, "fileName":fileName, "fileData":fileData});
				}
				$.ajax({
					url: "/apply2023/ajaxUploadFile/",
					type: "POST",
					dataType: "html",
					data: {
						'type': docuType+"_"+comType,
						'applyNo': '<?=$applyNo?>',
						'arrUploadFiles':arrUploadFiles,
						'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
					},
					success: function(data){
						fnGetFileList(docuType, comType);
						fnCallFileUpload(docuType, comType)
					}
				});
			}
		}
	});
	$("#uploadPlace_container").css("padding", "0px")
	$("div.plupload_header_content").css("display", "none");
	var chgTitle = setTimeout(function() {
		$("#uploadPlace_container").attr("title", arrFileName[docuType]+" 업로드");
	}, 100);
}

var signType = '';
var currentStep = 'step2';
$(document).ready(function() {
	$("#com1Name").on("change", function() {
		$("#signCom1Name").val($(this).val());
	});
	$("#com1RepresentName").on("change", function() {
		$("#signCom1Represent").val($(this).val());
	});
	$("#com2Name").on("change", function() {
		$("#signCom2Name").val($(this).val());
	});
	$("#com2RepresentName").on("change", function() {
		$("#signCom2Represent").val($(this).val());
	});
	$('#signPlace').signature(); 
	fnSetNumber();
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
		$('#signPlace').signature('enable').signature('draw', $("#"+type+"signData2").val())
	}
}
function fnSignSave() {

	if ($("#signPlace").signature('toSVG').length<700) {
		alert("서명이 작습니다. 다시 서명하여 주세요");
	}
	$("#"+signType+"signData1").val($("#signPlace").signature('toSVG'));
	$("#"+signType+"signData2").val($("#signPlace").signature('toJSON'));
	if ($("#"+signType+"signData1").val() == "" || $("#signPlace").signature('toSVG').length<700) {
		$("#btnSign_"+signType).removeClass("btn-success").addClass("btn-danger");
	} else {
		$("#btnSign_"+signType).removeClass("btn-danger").addClass("btn-success");
		$("#signatureModal").modal('hide');
	}
	
}
function fnSignClear(signID) {
	$("#"+signID).signature('clear'); 
	$("#"+signType+"signData1").val('');
	$("#"+signType+"signData2").val('');
}

</script>





	<button type="button" onclick="location = '/admin/site/apply2023/'; " class="btn btn-success w-100">지원 신청 저장 & 목록이동</button>


	</div>

</div>



<script>
function fnChkForm() {
	// 필수 사항 체크
	if (fnChkField("comName", "업체명을 입력하세요")==false) { return false; }
	if (fnChkField("ceoName", "대표자명을 입력하세요")==false) { return false; }
	if (fnChkField("comNo1", "사업자등록번호를 입력하세요")==false) { return false; }
	if (fnChkField("comNo2", "사업자등록번호를 입력하세요")==false) { return false; }
	if (fnChkField("comNo3", "사업자등록번호를 입력하세요")==false) { return false; }
	if (fnChkField("comType1", "사업자 업태를 입력하세요")==false) { return false; }
	if (fnChkField("comType2", "사업자 업종을 입력하세요")==false) { return false; }
	if (fnChkField("comAddr1", "사업자 소재지를 입력하세요")==false) { execDaumPostcode();  return false; }
	if (fnChkField("comAddr2", "사업자 소재지 상세주소를 입력하세요")==false) { return false; }
	if (fnChkField("comEmployee", "사업자 소재지 상세주소를 입력하세요")==false) { return false; }
	if (fnChkField("comEmployee", "사업자 소재지 상세주소를 입력하세요")==false) { return false; }
	//if (fnChkField("comTel1", "전화번호를 입력하세요")==false) { return false; }
	//if (fnChkField("comTel2", "전화번호를 입력하세요")==false) { return false; }
	//if (fnChkField("comTel3", "전화번호를 입력하세요")==false) { return false; }
	if (fnChkField("comPhone1", "휴대전화번호를 입력하세요")==false) { return false; }
	if (fnChkField("comPhone2", "휴대전화번호를 입력하세요")==false) { return false; }
	if (fnChkField("comPhone3", "휴대전화번호를 입력하세요")==false) { return false; }
	if (fnChkField("comEmail1", "이메일주소를 입력하세요")==false) { return false; }
	if (fnChkField("comEmail12", "이메일주소를 입력하세요")==false) { return false; }
	if (fnChkField("totalFund", "희망 사업비를 선택하세요")==false) { return false; }
}
function fnChkField(id, msg) {
	if ($("#"+id).val()=="") {
		$('html, body').stop().animate({scrollTop: $("#"+id).position().top}, 500);
		alert(msg);
		$("#"+id).focus();
		return false;
	} else {
		return true;
	}
}
function fnViewPolicy() {
	if ($(".contPrivacyPolicy").css('display')=='none') {
		$("#iconArrow").attr("src", "/assets/images/icon_arrow_up.png");
		$(".contPrivacyPolicy").slideDown();
	} else {
		$("#iconArrow").attr("src", "/assets/images/icon_arrow_down.png");
		$(".contPrivacyPolicy").slideUp();
	}
}
function fnViewTab(cate) {
	$("#tabApplyCategory li").find("a").removeClass("active");
	$("#tabApplyCategory li").each(function() {
		if ($(this).find("a").attr("aria-controls")==cate) $(this).find("a").addClass("active");
	});
	$(".tab-pane").removeClass("active");
	$("#"+cate).addClass("active");
}
$(document).ready(function() {
	$("input[name='apply[4][6]']").on("click", function() {
		if ($(this).is(":checked")==true) {
			$("div#efficientTab table.cateTable").append('<tr id="etcField"><td></td><td><textarea name="etcType" class="form-control" rows="3" placeholder="기타 희망 품목을 입력하세요" required></textarea></td></tr>');
		} else {
			$("#etcField").remove();
		}
	});
	fnViewTab('fireTab');
	$("#totalFund").on("change", function() {
		if ($(this).val()=="") {
			$("#supportFund").val("");
			$("#selfFund").val("");
			$("#vatFund").val("");
			$("#totalSelfFund").val("");
			$("input[name=supportFund]").val("");
			$("input[name=selfFund]").val("");
			$("input[name=vatFund]").val("");
			$("input[name=totalSelfFund]").val("");
		} else {
			s1Fund = parseInt($(this).val() * 0.9);
			s2Fund = parseInt($(this).val() * 0.1);
			vFund = parseInt($(this).val() * 0.1);
			tsFund = parseInt(s2Fund) + parseInt(vFund);
			$("#supportFund").val( number_format( String(s1Fund) ) );
			$("#selfFund").val( number_format( String(s2Fund) ) );
			$("#vatFund").val( number_format( String(vFund) ) );
			$("#totalSelfFund").val( number_format( String(tsFund) ) );
			$("input[name=supportFund]").val( s1Fund );
			$("input[name=selfFund]").val( s2Fund );
			$("input[name=vatFund]").val( vFund );
			$("input[name=totalSelfFund]").val( tsFund );
		}
	});
<? if (element('totalFund', $applyD)){ ?>
	$("#totalFund").val("<?=element('totalFund', $applyD)?>").prop("selected", true);
	var selectFund = <?=element('totalFund', $applyD)?>;
	s1Fund = parseInt(selectFund * 0.9);
	s2Fund = parseInt(selectFund * 0.1);
	vFund = parseInt(selectFund * 0.1);
	tsFund = parseInt(s2Fund) + parseInt(vFund);
	$("#supportFund").val( number_format( String(s1Fund) ) );
	$("#selfFund").val( number_format( String(s2Fund) ) );
	$("#vatFund").val( number_format( String(vFund) ) );
	$("#totalSelfFund").val( number_format( String(tsFund) ) );
	$("input[name=supportFund]").val( s1Fund );
	$("input[name=selfFund]").val( s2Fund );
	$("input[name=vatFund]").val( vFund );
	$("input[name=totalSelfFund]").val( tsFund );

<? } ?>
	$(document).on("click", function() {
		saveAll();
	});
	//setInterval(saveAll, 30000);
	fnSetNumber();
	
});

function saveAll() {
	var saveD = new Array();
	$(".divForm input").each(function() {
		//console.log($(this).attr("name")+ " _ "+$(this).attr("type")+' _ '+$(this).val()+" _ "+$(this).is(":checked"));
		if ($(this).attr("type")=='radio') {
			if ($(this).is(":checked")==true) {
				saveD.push({'type':$(this).attr("type"), 'name':$(this).attr("name"), 'val':$(this).val(), 'isChecked':$(this).is(":checked")});
			}
		} else {
			saveD.push({'type':$(this).attr("type"), 'name':$(this).attr("name"), 'val':$(this).val(), 'isChecked':$(this).is(":checked")});
		}
	});
	$(".divForm select").each(function() {
		saveD.push({'type':'select', 'name':$(this).attr("name"), 'val':$("select[name="+$(this).attr("name")+"] option:selected").val(), 'isChecked':true});
	});
	$(".divForm textarea").each(function() {
		saveD.push({'type':'textarea', 'name':$(this).attr("name"), 'val':$("textarea[name="+$(this).attr("name")+"]").val(), 'isChecked':true});
	});

	//saveD = JSON.stringify(saveD);
	//console.log(saveD);

	$.ajax({
		url: "/apply2023/ajaxAutoSave/",
		type: "POST",
		dataType: "html",
		data: {
			'saveStep': 'step2',
			'saveD': saveD,
			'applyNo': '<?=$applyNo?>',
			'year': '2023',
			'times': '1',
			'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		},
		success: function(data){
			var result = $.parseJSON(data);
			if (result.stat == 'false') {
				alert(result.msg);
				location.reload();
			} else if (result.stat == 'debug') {
				console.log($.parseJSON(result.msg));
			}
		}
	});

}

$("#menuTitle").html("접수 수정");
</script>
<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
<script>
    // 우편번호 찾기 찾기 화면을 넣을 element
    var element_wrap = document.getElementById('daumAddressWrap');

    function foldDaumPostcode() {
        // iframe을 넣은 element를 안보이게 한다.
        element_wrap.style.display = 'none';
    }

    function execDaumPostcode(comNo) {
        // 현재 scroll 위치를 저장해놓는다.
        var currentScroll = Math.max(document.body.scrollTop, document.documentElement.scrollTop);
        new daum.Postcode({
            oncomplete: function(data) {
                // 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                var addr = ''; // 주소 변수
                var extraAddr = ''; // 참고항목 변수
                addr = data.roadAddress;

                // 사용자가 선택한 주소가 도로명 타입일때 참고항목을 조합한다.
                if(data.userSelectedType === 'R'){
                    // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                    // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                    if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                        extraAddr += data.bname;
                    }
                    // 건물명이 있고, 공동주택일 경우 추가한다.
                    if(data.buildingName !== '' && data.apartment === 'Y'){
                        extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                    }
                    // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                    if(extraAddr !== ''){
                        extraAddr = ' (' + extraAddr + ')';
                    }
                    // 조합된 참고항목을 해당 필드에 넣는다.
                    document.getElementById(comNo+"Address3").value = extraAddr;
                
                } else {
                    document.getElementById(comNo+"Address3").value = '';
                }

                // 우편번호와 주소 정보를 해당 필드에 넣는다.
                document.getElementById(comNo+"Zip").value = data.zonecode;
                document.getElementById(comNo+"Address1").value = addr;
                // 커서를 상세주소 필드로 이동한다.
                document.getElementById(comNo+"Address2").focus();

                // iframe을 넣은 element를 안보이게 한다.
                // (autoClose:false 기능을 이용한다면, 아래 코드를 제거해야 화면에서 사라지지 않는다.)
                element_wrap.style.display = 'none';

                // 우편번호 찾기 화면이 보이기 이전으로 scroll 위치를 되돌린다.
                document.body.scrollTop = currentScroll;
            },
            // 우편번호 찾기 화면 크기가 조정되었을때 실행할 코드를 작성하는 부분. iframe을 넣은 element의 높이값을 조정한다.
            onresize : function(size) {
                element_wrap.style.height = size.height+'px';
            },
            width : '100%',
            height : '100%'
        }).embed(element_wrap);

        // iframe을 넣은 element를 보이게 한다.
        element_wrap.style.display = 'block';
    }
</script>