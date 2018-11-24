</div>
<div class="footer-sd">
		<p class="footer-description">스팀딜은 번개장터의 결재시스템을 이용하며 그로인한 수익을 추출하지 않습니다.</p>
		<!-- Modal page start -->
		<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">스팀딜 회원가입</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
				<script type="text/javascript">
				/*
				function form_check() {
					var chk1=document.frmJoin.userinfo_statement.checked;
					alert('checking...');
					if(!chk1){
							alert('약관1에 동의해 주세요');
							return false;
							break;
					}
					window.location.href = '/SteamDeal/process/register';
				}
				*/
				</script>
				<form action="/SteamDeal/process/register" method="post">
				  <div class="form-group">
					<label for="exampleInputEmail1">이메일</label>
					<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
					<small id="emailHelp" class="form-text text-muted">&nbsp;<a href="http://m.bunjang.co.kr/">번개장터</a>에서 사용하는 이메일과 동일해야합니다.</small>
				  </div>
				<div class="form-group">
					<label for="exampleInputEmail1">닉네임</label>
					<input type="text" name="nickname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nickname">
				  </div>
				  <div class="form-group">
					<label for="exampleInputPassword1">아이디</label>
					<input type="text" name="id" class="form-control" id="exampleInputPassword1" placeholder="Id">
				  </div>
				  <div class="form-group">
					<label for="exampleInputPassword1">비밀번호</label>
					<input type="password" name="pw" class="form-control" id="exampleInputPassword1" placeholder="Password">
				  </div>
				  <div class="form-group">
					<label for="exampleInputPassword1">비밀번호 재입력</label>
					<input type="password" name="pwc" class="form-control" id="exampleInputPassword1" placeholder="Password">
				  </div>
				  <div class="form-group form-check">
					<input type="hidden" name="statement_check" value="0" />
					<input type="checkbox" name="statement_check" class="form-check-input" value="1" id="userinfo_statement">
					<label class="form-check-label" for="exampleCheck1">서비스의 <a href="/SteamDeal/main/userinfo_statement" target="_blank">이용약관</a> 및 <a href="/SteamDeal/main/userinfo_statement" target="_blank">개인정보 취급방침</a>에 동의합니다.</label>
					  <!-- 클릭시 새창에서 이용약관과 개인정보 취급방침 실행 -->
				  </div>
				  <button type="submit" class="btn btn-primary">회원가입</button>
				</form>
			  </div>
			</div>
		  </div>
		</div>

		<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">스팀딜 로그인</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
				<form action="/SteamDeal/process/login" method="post">
				  <div class="form-group">
					<label for="exampleInputPassword1">아이디</label>
					<input type="text" name="id" class="form-control" id="exampleInputPassword1" placeholder="Id">
				  </div>
				  <div class="form-group">
					<label for="exampleInputPassword1">비밀번호</label>
					<input type="password" name="pw" class="form-control" id="exampleInputPassword1" placeholder="Password">
				  </div>
				  <div class="form-group form-check">
					<input type="checkbox" class="form-check-input" id="exampleCheck1">
					<label class="form-check-label" for="exampleCheck1">아이디 기억하기</label>
				  </div>
				  <button type="submit" class="btn btn-primary">로그인</button>
				</form>
			  </div>
			</div>
		  </div>
		</div>
		<?php
		if(isset($game_calc)) {
			echo $game_calc;
		} else {
			echo '';
		}
		 ?>
	</div>

</body>
</html>
