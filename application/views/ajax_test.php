<!doctype html>
<html lang="ko">
 <head>
  <meta charset="UTF-8">
  <title>Document</title>
  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
 </head>
 <body>
	<a href="javascript:void(0);" onclick="goActEvent()">ajax로 값 전달</a>
	<script>
		// ajax로 값 전달
		function goActEvent() {
			$.ajax({
				url : '/SteamDeal/main/ajax_get',
				data			: {
					param1		: '10',
					param2		: '20'
				},
				type			: 'POST',
				dataType		: 'json',
				success		: function(result) {
					if(result.success == false) {
						alert(result.msg);
						return;
					}
					alert(result.data);
				}
			});
		}

	</script>
 </body>
</html>
