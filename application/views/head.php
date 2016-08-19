<?PHP
// header('Content-Type: text/html; charset=utf-8');
// session_cache_expire(30);
// session_start();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<!-- 공통파일 포함 -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="Content-Script-Type" content="text/javascript">
	<meta http-equiv="Content-Style-Type" content="text/css">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="subject" content="테스트용">
	<meta name="author" content="gold9ine">
	<meta name="keywords" content="test">
	<meta name="description" content="테스트 홈페이지">
	<meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,target-densitydpi=medium-dpi">
	<meta name="apple-mobile-web-app-title" content="테스트 페이지">
	<!--모바일용 화면크기 비율고정-->
	<meta id="mobileMeta" name="viewport" content="width=device-width">
	<title>테스트 페이지</title>
<!-- 	<link rel="shortcut icon" href="/include/img/default.ico">
	<link rel="apple-touch-icon" href="/include/img/default.ico"> -->
	<!-- java script -->
	<!-- <script language="javascript" src="//apis.daum.net/maps/maps3.js?apikey=<?=$mapKey?>&libraries=services"></script> -->
	<!-- <script language="Javascript" src="/include/lib/webnote/webnote.js"></script>
	<script language="Javascript" src="/include/lib/webnote/webnoteSub.js"></script> -->
	<script language="Javascript" src="/include/lib/ckeditor/ckeditor.js"></script>
	<!-- style sheet -->
	<link rel="stylesheet" href="/include/lib/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="/include/lib/bootstrap/css/bootstrap-theme.min.css">
	<!-- <link rel="stylesheet" href="/include/css/layout.css"> -->
	<link rel="stylesheet" href="/include/css/nanumgothic.css">
</head>
<body>
	<?php
	if($this->session->flashdata('message')){
		?>
		<script>
			alert('<?=$this->session->flashdata('message')?>');
		</script>
		<?php
	}
	?>
	<nav class="navbar navbar-default">
		<div class="container-fluid">								
			<div class="col-md-4"><a class="brand" href="/">JavaScript</a></div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<?php
					if($this->session->userdata('is_login')){
						?>
						<li><a href="/auth/logout">로그아웃</a></li>
						<?php
					} else{
						$record_last = $this->uri->segment($this->uri->total_segments());
						if(!strcasecmp($record_last, 'login') || !strcasecmp($record_last, 'register')){
						?>
						<li><a href="/auth/login">로그인</a></li>
						<?php
						}else{
						?>
						<li><a href="<?=site_url('/auth/login?returnURL='.rawurlencode(current_url()))?>">로그인</a></li>
						<?php
						}
						?>
						<li><a href="/auth/register">회원가입</a></li>
						<?php
					}
					?>
				</ul>
			</div>
		</div>
	</nav>
	<div>
		<?PHP
		if($this->config->item('is_dev')){
			?>
			<div class="well col-md-12">
				개발환경을 수정 중입니다. 
			</div>
			<?php 
		}
		// echo($_SERVER["DOCUMENT_ROOT"]);
		?>
	</div>
	<div class="container-fluid">
		<div class="row-fluid">