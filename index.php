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
			//runs get.php script when the page first loads
			require_once('get.php');
		?>
	</table>
	<script>
		//calls the get.php script every 3000 milliseconds (3 seconds)
		$(function() {
			setInterval(function() {
				$.get("get.php", function(update) {
					$('.stocks').html(update);
					//replaces the contents of the "stocks" class table with the results from get.php
				});
			}, 3000);
		});
	</script>
</body>
</html>
