<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$lang['site']['officeName'] = '그린칩스 페스티벌 사무국';
$lang['site']['festivalPeriod'] = '2024.10.17(목) ~ 10.27(일)';
$lang['site']['festivalPlace'] = '- 성수 프로젝트렌트 올드타운, 서촌라운지, DDP 아트홀 1관';

$lang['site']['listAll'] = '전체리스트';
$lang['site']['faqSearch'] = 'FAQ 검색';


$lang['site']['boardF1'] = '번호';
$lang['site']['boardF2'] = '제목';
$lang['site']['boardF3'] = '날짜';
$lang['site']['boardF4'] = '조회수';


$lang['site']['boardT1'] = '글주소';
$lang['site']['boardT2'] = '목록';
$lang['site']['boardT3'] = '검색목록';
$lang['site']['boardT4'] = '글쓰기';
$lang['site']['boardT5'] = '관리';
$lang['site']['boardT6'] = '이전글';
$lang['site']['boardT7'] = '다음글';
$lang['site']['boardT8'] = '답변';
$lang['site']['boardT9'] = '삭제';
$lang['site']['boardT10'] = '수정';

$lang['site']['btnBack'] = '뒤로가기';
$lang['site']['btnCancel'] = '취소';
$lang['site']['btnSave'] = '저장';
$lang['site']['btnSubmit'] = '제출';
$lang['site']['btnClose'] = '창 닫기';
$lang['site']['btnLogin'] = '로그인';
$lang['site']['btnLogout'] = '로그아웃';
$lang['site']['btnRegNew'] = '신규 작성';
$lang['site']['btnRegMod'] = '등록 수정';
$lang['site']['btnFindID'] = '아이디 / 비밀번호 찾기';

$lang['site']['btnRegBuyer'] = '바이어 등록';
$lang['site']['btnRegPress'] = '프레스 등록';

$lang['site']['buyerGuide'] = '바이어 등록 안내';
$lang['site']['pressGuide'] = '프레스 등록 안내';

$lang['site']['btnRequestCertificationCode'] = '인증번호 요청';


$lang['site']['policyT1'] = '개인정보 보호정책';
$lang['site']['policyA1'] = '동의합니다.';

$lang['site']['policyT2'] = '광고성 정보 수신 동의 (선택)';

$lang['site']['policyA2'] = '이메일을 통한 광고성 정보 수신에 동의합니다.';
$lang['site']['policyA3'] = 'SMS를 통한 광고성 정보 수신에 동의합니다.';

$lang['site']['modalT1'] = '등록 정보 수정';
$lang['site']['modifyGuide1'] = '등록할 때 입력한 이메일 주소를 입력하십시오';
$lang['site']['modifyGuide2'] = '이메일 주소를 입력하십시오';
$lang['site']['modifyGuide3'] = '메일로 발송된 코드를 입력하십시오';
$lang['site']['modifyGuide4'] = '인증코드';
$lang['site']['modifyGuide5'] = '인증유효시간이 지났습니다. 다시 시도하여 주세요';
$lang['site']['modifyGuide6'] = '시도가능 회수가 초과하였습니다.';
$lang['site']['modifyGuide7'] = '세션정보가 없습니다. 다시 시도하여 주세요.';
$lang['site']['modifyGuide8'] = '파일정보가 없습니다.';
$lang['site']['modifyGuide9'] = '한번 삭제한 자료는 복구할 수 없습니다. \n\n정말 삭제하시겠습니까?';
$lang['site']['modifyGuide10'] = '아이디/비밀번호를 통해 신청서를 임시 저장하여 자유롭게 수정 및 재작성 하실 수 있습니다.';

$lang['site']['joinGuide1'] = '영문자, 숫자 포함 5글자 이상 입력하여 주세요';
$lang['site']['joinGuide2'] = '아이디를 입력하여 주세요';

$lang['site']['sendMailName'] = '그린칩스페스티벌 사무국';
$lang['site']['certifyMailTitle'] = 'GreenChips Festival _ 인증코드 안내';

$lang['site']['certifyMailGuide1'] = '매칭되는 자료가 없습니다. 다시 시도하여 주세요';

$lang['site']['findIDtxt1'] = '이메일 주소로 계정 찾기';
$lang['site']['findIDtxt2'] = '아이디/비밀번호는 가입 시 등록한 메일 주소로 알려드립니다.';
$lang['site']['findIDtxt3'] = '가입할 때 등록한 메일 주소를 입력하고 "ID/PW 찾기" 버튼을 클릭해주세요.';


$lang['site']['LoginTxt1'] = '아이디';
$lang['site']['LoginTxt2'] = '비밀번호';
$lang['site']['LoginTxt3'] = '이름';
$lang['site']['LoginTxt4'] = '이메일';

$lang['site']['LoginTxt11'] = '아이디를 입력하세요';
$lang['site']['LoginTxt21'] = '비밀번호를 입력하세요';
$lang['site']['LoginTxt31'] = '이름을 입력하세요';
$lang['site']['LoginTxt41'] = '이메일을 입력하세요';

$lang['site']['siteTitle1'] = '패스워드 변경';
$lang['site']['siteTitle11'] = '회원님의 패스워드를 변경합니다.';
$lang['site']['siteTitle2'] = '새로운 패스워드';
$lang['site']['siteTitle3'] = '새로운 패스워드 (재입력)';


$lang['site']['certifyMailContent'] = '<table style="width:900px;"><tr><th><img src="'.$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/assets/images/emailCertifyTitle.jpg"></th></tr><tr><td style="text-align:center;padding:30px;line-height:200%;"><p style="font-size:24px;">그린칩스페스티벌 인증코드는 아래와 같습니다.</p><br><br><p style="font-size:30px;font-weight:800;color:#ee6cac;">{{CODE}}</p><p style="font-size:24px;">코드를 복사하여, 웹사이트에 입력하여 주세요</p><p style="font-size:24px;">감사합니다.</p></td></tr></tr><td style="background-color:#ee6cac;color:white;text-align:center;padding:30px;"><p style="font-size:24px;">그린칩스페스티벌 사무국</p></td></tr></table>';

$lang['site']['notfound'] = "파일을 찾을 수 없습니다.";


$lang['site']['accessDeny'] = "잘못된 접근입니다.";


$lang['site']['buyerGuide1'] = "바이어데이 일정";
$lang['site']['buyerGuide2'] = "일 &nbsp; &nbsp; 정";
$lang['site']['buyerGuide3'] = "2024년 10월 18일(금) 10시 ~ 17시";
$lang['site']['buyerGuide4'] = "장 &nbsp; &nbsp; 소";
$lang['site']['buyerGuide5'] = "DDP (상세 장소는 확정된 바이어 대상으로 추후 안내)";
$lang['site']['buyerGuide6'] = "바이어 등록 시 혜택";
$lang['site']['buyerGuide7'] = "- DDP 디자인론칭페어 무료 입장<br>- 비즈매칭 스케줄 정보 제공<br>- 그린칩스, DDP디자인론칭페어,<br>중소기업 산업 디자인 개발 사업 참여기업 미팅<br>* 사무국에서 승인된 경우만 바이어로 등록됩니다.<br>(모집 조건이 맞지 않는 경우 반려됩니다.) ";
$lang['site']['buyerGuide8'] = "바이어 등록절차";

$lang['site']['buyerGuide9'] = "등록 절차";
$lang['site']['buyerGuide10'] = "온라인 바이어 등록 → 사무국에서 확인 후 바이어 등록 확정 메일 발송 ";
$lang['site']['buyerGuide11'] = "입장 절차";
$lang['site']['buyerGuide12'] = "- 안내데스크에서 등록된 바이어 확인(명함 or 신분증) → 출입증 수령 → 입장";


$lang['site']['pressGuide1'] = "전시회 일정";
$lang['site']['pressGuide2'] = "일 &nbsp; &nbsp; 정";
$lang['site']['pressGuide3'] = "2024년 10월 17일(목)~27일(일)";
$lang['site']['pressGuide4'] = "장 &nbsp; &nbsp; 소";
$lang['site']['pressGuide5'] = "DDP 아트홀 1관";
$lang['site']['pressGuide6'] = "프레스 등록 대상";
$lang['site']['pressGuide7'] = "- 해외 디자인 매체/매거진 기자";
$lang['site']['pressGuide8'] = "프레스 등록 시 혜택";

$lang['site']['pressGuide9'] = "- DDP 디자인론칭페어 무료 입장<br>- 공식 보도자료 수신<br>* 사무국에서 승인된 경우만 프레스로 등록됩니다.<br>(모집 조건이 맞지 않는 경우 반려됩니다.)";
$lang['site']['pressGuide10'] = "프레스 등록절차";
$lang['site']['pressGuide11'] = "등록 절차";
$lang['site']['pressGuide12'] = "온라인 프레스 등록 -> 사무국에서 확인 후 프레스 등록 확정 메일 발송 ";
$lang['site']['pressGuide13'] = "입장 절차";
$lang['site']['pressGuide14'] = "- 안내데스크에서 등록된 프레스 확인(명함 or 신분증) -> 출입증 수령 -> 입장";





