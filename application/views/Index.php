<div class="searching-grid-background"></div>
<div class="container">
<div class="searching-grid">
	<h3 class="searching-title"><strong>하고싶은 게임을 저렴하게 가지세요.</strong></h3>
	<form action="#" class="searching-form">
		<input class="form-controls form-control-lg searching-md" id="auto_tags" type="text" placeholder="이곳에서 게임을 검색하세요.">
	</form>
	<script type="text/javascript">
	// require('application/controllers/module/jquery-ui-1.12.1.custom/jquery-ui.js');
	$( function() {
		$("#auto_tags").autocomplete({
        source: "/SteamDeal/process/autocomplete_search",
        minLength: 1,
        response: function(event, ui) {
            console.log(ui);
        },
        select: function(event, ui) {
            console.log("Selected:" + ui.item.value);
        },
        focus: function(event, ui) {
            return false;
        }
    });
	});
	</script>
	<div class="hashtag-games">
		<span class="badge badge-pill badge-info taged-game">#배틀그라운드</span>
		<span class="badge badge-pill badge-info taged-game">#폴아웃</span>
		<span class="badge badge-pill badge-info taged-game">#포르자 호라이즌4</span>
		<span class="badge badge-pill badge-info taged-game">#러스트</span>
		<span class="badge badge-pill badge-info taged-game">#카운터스트라이크</span>
	</div>
</div>

<div class="intro-grid intro-grid-one row">
	<div class="description">
		<h2>내가 하고싶은 게임이 있는</h2>
		<h2>계정을 검색하고 시세에 맞춰</h2>
		<h2>구매하세요!</h2>
	</div>
	<div>
		<!-- some dashboard preview -->
	</div>
</div>

<div class="intro-grid intro-grid-two">
	<div class="description">
		<button type="button" class="btn btn-primary btn-lg goto-login">살만한 계정 찾아보기</button>
	</div>
</div>
</div>
