<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Stocks</title>
<link type="text/css" rel="stylesheet" href="stylesheet.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
	<table class="stocks">
		<?php
			require_once('get.php');
		?>
	</table>
	<script>
		$(function() {
			setInterval(function() {
				$.get("get.php", function(update) {
					$('.stocks').html(update);
				});
			}, 3000);
		});
	</script>
</body>
</html>