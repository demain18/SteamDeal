<div class="searching-grid-background"></div>
<div class="container">
	<div class="content-grid row">
		<div class="col-sm">
			<form>
				<div class="form-group">
					<label for="inputState">플랫폼</label>
					<select id="inputState" class="form-control">
							<option disabled selected>Choose...</option>
						<option>스팀(Steam)</option>
						<option>오리진(Origin)</option>
						<option>블리자드 배틀넷(Blizzard Battle.net)</option>
					</select>
				</div>
				<div class="form-group">
				<label for="exampleInputEmail1">계정 정보 추가하기</label>
				<input type="text" class="form-control account-info" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="이곳에 작성하세요.">
				<!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
				</div>
				<div class="alert alert-success" role="alert">
					계정 추정가격 : 정해지지 않음.
				</div>
				<p class="game-calc-p"><a class="game-calc" data-toggle="modal" href="#steamGameList">내 게임목록 조회하기</a></p>



				<label for="exampleInputPassword1">판매가 지정</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
					<span class="input-group-text">₩</span>
					</div>
					<input type="text" class="form-control price-form" aria-label="Amount (to the nearest dollar)">
				</div>

				 <!--
				<div class="form-check">
				<input type="checkbox" class="form-check-input" id="exampleCheck1">
				<label class="form-check-label" for="exampleCheck1">Check me out</label>
				</div>
				-->
				<p>
					<a class="pay-type" data-toggle="collapse" href="#bz-pay" role="button" aria-expanded="false" aria-controls="collapseExample">
					번개장터로 결재하기
					</a>
					<a class="pay-type" data-toggle="collapse" href="#personal-pay" role="button" aria-expanded="false" aria-controls="collapseExample">
					연락처로 결재하기
					</a>
				</p>
				<div class="collapse" id="bz-pay">
					<div class="form-group">
					<label for="exampleInputPassword1">번개장터 링크</label>
					<input type="text" class="form-control bz-form" id="exampleInputPassword1" placeholder="이곳에 번개장터 링크를 붙혀놓으세요.">
					</div>
				</div>

				<div class="collapse" id="personal-pay">
					<div class="form-group">
					<label for="exampleInputPassword1">연락처</label>
					<input type="text" class="form-control bz-form" id="exampleInputPassword1" placeholder="이곳에 카카오톡 아이디를 기재하세요.">
					</div>
				</div>
				<button type="submit" class="btn btn-primary">등록완료</button>

			</form>
		</div>
		<div class="col-sm">
			<div class="game-count">
				<p class="utill-border">Games</p>
				<!--
				<p>PLAYERUNKNOWS BATTLEGROUND</p>
				<p>GTA V</p>
				<p>Call of duty Modern Warfare</p>
				<p>Day by daylight</p>
				-->
				<script type="text/javascript">
					function game_scraping() {
						/*
						var queryString = $("form[name=steam_profilesite]").serialize();
							$.ajax({
									type: 'post',
									url: '/SteamDeal/main/scraping',
									data: queryString,
									dataType:'text',
									success: function () {
											alert('data posted successfully!');
											console.log(queryString);
									},
									error: function (request, status, error) {
											alert('data posted failed.');
											console.log('code: '+request.status+"\n"+'message: '+request.responseText+"\n"+'error: '+error);
									}
							});
							*/
							// var queryString = $("#steam_profilesite_link").serialize();
							var queryString = $("#steam_profilesite_link").serialize();
							alert(queryString);
							/*
							$.ajax({
										url: '/SteamDeal/main/scraping',
										type : "POST",
					 					cache : false,
					 					data : queryString,
										dataType : "json",
										success: function () {
												alert('data posted successfully!');
												console.log(queryString);
										},
										error: function (request, status, error) {
												alert('data posted failed.');
												console.log('code: '+request.status+"\n"+'message: '+request.responseText+"\n"+'error: '+error);
										}
									});
									*/

									/*
									$.ajax({
										type: 'POST',
										url : '/SteamDeal/main/scraping',
										data: {
											param1	: queryString
										},
										dataType:"text",
										success : function(data, status, xhr)
										{
											alert('ajax worked.');
											console.log(queryString);
										},
										error: function (request, status, error)
										{
												alert('ajax failed.');
												console.log('code: '+request.status+"\n"+'message: '+request.responseText+"\n"+'error: '+error);
										}
									});
									*/
										$.ajax({
											url : '/SteamDeal/main/ajax_get',
											data			: {
												param1		: '10',
												param2		: '20',
												param3		: queryString
											},
											type			: 'POST',
											dataType		: 'json',
											success		: function(result) {
												if(result.success == false) {
													alert('failed.');
												}
												alert(result.data);
											}
										});
					}
				</script>
			</div>
		</div>
	</div>
</div>
