<?php
define('NAME','Get Admitted Online');
define('NAME_BANGLA','গেট এডমিটেড অনলাইন প্রি ক্যাডেট এন্ড কিন্ডার গার্টেন স্কুল');
define('ADDRESS_BANGLA','ডাকঘরঃ সদর, উপজেলা ও জেলাঃ সদর লালমনিরহাট <br>স্থাপিতঃ ২০১৮');
define('ADDITIONAL_INFO','বিদ্যালয় কোডঃ ৮৭২১৯৮ 	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	    EIIN: 127988	  		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     মোবাইলঃ ০১৭০৫৯২৭২৫৭');
define('TAGLINE','Get Admitted Online');
define('EMAIL','contact@thewebdivers.com');
define('PREFIX','NPKKGSC');
define('FRONT_SITE_PATH','http://'.$_SERVER['HTTP_HOST']."/admission");

define('STUDENT_IMAGE',FRONT_SITE_PATH."/media/users/");
define('UPLOAD_APPLICANT_IMAGE',$_SERVER['DOCUMENT_ROOT']."/admission/media/users/");
define('UPLOAD_STUDENT_IMAGE',$_SERVER['DOCUMENT_ROOT']."/admission/media/users/");



$curStr=$_SERVER['REQUEST_URI'];
$curArr=explode('/',$curStr);
$cur_path=$curArr[count($curArr)-1];
$dashboard_active="";
$payments_active="";
$profile_active="";

if($cur_path=='' || $cur_path=='dashboard'){
	$dashboard_active="active";
}elseif($cur_path=='' || $cur_path=='payments'){
	$payments_active="active";
}elseif($cur_path=='' || $cur_path=='profile'){
	$profile_active="active";
}else{

}
?>