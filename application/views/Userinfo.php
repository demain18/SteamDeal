<?php
if(isset($_SESSION["user_situation"]) == false) {
	echo("<script>alert('먼저 로그인부터 하세요.')</script>");
	echo("<script>location.replace('/SteamDeal/main/index');</script>");
}
?>
<div class="searching-grid-background"></div>
<div class="container">
<div class="content-grid row">
	<div class="control-grid col">

		<a href="/SteamDeal/main/modify_sell">
			<div class="result-item">
				<span class="item-image"><img src="/SteamDeal/public/img/logo-steam.jpg" class="item-image-title"></span>
				<span class="item-element item-price">25.5$</span>
				<span class="item-element item-gamecount">Game count : 25</span>
				<span class="item-element item-date">2018-11-10</span>
			</div>
		</a>

	 </div>
	 <div class="userinfo-grid col">
	 	<h3>유저 정보</h3>
		<p><strong>닉네임</strong>
		<?php
		echo $_SESSION["user_nickname"];
		?></p>
		<p><strong>비밀번호 변경</strong></p>
	 	<p><strong>회원 탈퇴하기</strong></p>
	  </div>
  </div>
</div>
