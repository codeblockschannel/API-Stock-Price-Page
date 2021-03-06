<?php
	//echoes first row in table
	echo '<tr>
			<td>Company Name</td>
			<td>Symbol</td>
			<td>Price</td>
		</tr>';
	//array of stocks that will be analyzed
	$symbols = array("AAPL", "FB", "AMZN", "TWTR", "GOOG", "IBM", "MSFT", "AMD", "F", "GE");
	
	//for every stock in the array above, the loop will make a call to the API, decode the JSON contents into an array.		
	foreach ($symbols as $stocks) {
	$call = "https://api.iextrading.com/1.0/stock/market/batch?symbols=$stocks&types=quote";
	$content = file_get_contents($call);
	$data = json_decode($content, true);
	
	//gets data from array
	$price = $data[$stocks]['quote']['latestPrice'];
	$name = $data[$stocks]['quote']['companyName'];
	
	//assigns values to variables if the stock symbol does not exist
	if(empty($name)) {
		$price = "N/A";
		$stocks = "N/A";
		$name = "N/A";
	}
	//echoes data from API into a table row
	echo '<tr>
			<td>'.$name.'</td>
			<td>'.$stocks.'</td>
			<td>'.$price.'</td>
		</tr>';
}
