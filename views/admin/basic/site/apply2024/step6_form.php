			<h4>제출서류</h4>
			<br>

<?=form_open("/apply/step6/", array("method"=>"POST"), array("applyNo"=>$applyNo))?>

			<div class="row mb-2 d-none">
				<label for="projectName" class="col-sm-6 col-form-label"><div class="bigTitle">청렴서약서</div></label>
				<div class="col-sm-3">
					<button type="button" class="btn btn-<?=isset($fileD['docu4']['com1'])?'siteprimary':'secondary'?> w-100" onclick="return fnFileUpload('docu4', 'com1')">중소기업</button>
				</div>
				<div class="col-sm-3">
					<button type="button" class="btn btn-<?=isset($fileD['docu4']['com2'])?'siteprimary':'secondary'?> w-100" onclick="return fnFileUpload('docu4', 'com2')">디자인전문기업</button>
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
				<label for="projectName" class="col-sm-6 col-form-label"><div class="bigTitle">부가가치세과세표준증명</div></label>
				<div class="col-sm-3">
					<button type="button" class="btn btn-<?=isset($fileD['docu16']['com1'])?'siteprimary':'secondary'?> w-100" onclick="return fnFileUpload('docu16', 'com1')">중소기업</button>
				</div>
				<div class="col-sm-3 text-center align-middle pt-2">
					-
				</div>
			</div>


			<div class="row mb-2 d-none">
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


			<p class="text-danger">
				※ 부가가치세과세표준증명은 최근 3개년(21~23년) 제출 최근 3개년이 없을 시 가능 자료만 제출<br>
				※ 제출문서 유효기간 확인 필수(유효기간이 지나거나 공고 마감일 이후 발행한 서류는 인정하지 않음)
			</p>

			<hr>

<?=form_close()?>