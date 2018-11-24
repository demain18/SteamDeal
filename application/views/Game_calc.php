<div class="modal fade" id="steamGameList" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">스팀 게임목록 조회</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="steamGameListModalClose">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
				<form id="steam_profile" action="/SteamDeal/main/scraping">
				  <div class="form-group">
					<label for="exampleInputPassword1">스팀 프로필 오른쪽 배너의 '게임' 링크를 붙혀넣으세요.</label>
					<input type="text" class="form-control" name="steam_profilesite_link" id="steam_profilesite_link" placeholder="Link here.">
					</div>
				  <button type="button" class="btn btn-primary" value="POST" onclick="game_scraping();">조회하기</button>
				</form>
			  </div>
			</div>
		  </div>
		</div>
