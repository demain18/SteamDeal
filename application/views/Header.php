<!DOCTYPE html>
<html lang="en">
<head>
	<!-- root 위치는 phpmysql폴더 부터이다 -->
	<link rel="stylesheet" href="/SteamDeal/public/css/header.css?ver=1">
	<link rel="stylesheet" href="/SteamDeal/public/css/<?php echo $style_sheet_index ?>?ver=2">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
	<!-- <script src="./asset/js/autofill.js"></script> -->

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Nanum+Gothic" rel="stylesheet">
	<!-- Remember to include jQuery :) -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<!-- Used Library
	Bootstrap
	-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SteamDeal</title>
</head>
<body>

	<div class="navbar-sd">
		<span class="navbar-logo navbar-left"><a href="/SteamDeal/main/index"><img src="/SteamDeal/public/img/logo-img.png" class="logo-img"></a></span>
		<span class="navbar-ex navbar-right"><a href="">계정 판매하기</a></span>
		<span class="navbar-login navbar-right"><a data-toggle="modal" href="#loginModal">로그인</a></span>
		<span class="navbar-register navbar-right"><a data-toggle="modal" href="#registerModal">회원가입</a></span>

		<span class="navbar-profile navbar-right">
			<i class="material-icons profile-icon">
			account_circle
			</i>
		</span>
	</div>
