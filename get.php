<?php
	echo '<tr>
			<td>Company Name</td>
			<td>Symbol</td>
			<td>Price</td>
		</tr>';
	$symbols = array("AAPL", "FB", "AMZN", "TWTR", "GOOG", "IBM", "MSFT", "AMD", "F", "GE");
			
	foreach ($symbols as $stocks) {
	$call = "https://api.iextrading.com/1.0/stock/market/batch?symbols=$stocks&types=quote";
	$content = file_get_contents($call);
	$data = json_decode($content, true);

	$price = $data[$stocks]['quote']['latestPrice'];
	$name = $data[$stocks]['quote']['companyName'];

	if(empty($name)) {
		$price = "N/A";
		$stocks = "N/A";
		$name = "N/A";
	}

	echo '<tr>
			<td>'.$name.'</td>
			<td>'.$stocks.'</td>
			<td>'.$price.'</td>
		</tr>';
}
