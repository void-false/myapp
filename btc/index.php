<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BTC-E!</title>
	<style>
		body {
			display: none;
		}
		.now { text-decoration: underline; }
		#ltc_count { width: 75px; }
	</style>
  </head>
  <body>
    <h1>BTC-e Lives!</h1>
	
	<div>Last Updated: <span class="now">00:00:00<span></span></div>
	<div class="result"><p>Loading data...</p></div>
	
	<div class="ethltc">
		<p></p>
	</div>
	
	<div class="etc_mining"></div>
	<div class="sc_mining"></div>
    
    <!-- jQuery  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script>
	/*global $*/
	$("body").fadeIn("slow");
	
	var getTime = function() {
		var now = new Date();
		var strNow = ((now.getHours() < 10 ? "0"+now.getHours() : now.getHours()) + ":" +
					  (now.getMinutes() < 10 ? "0"+now.getMinutes() : now.getMinutes()) + ":" +
					  (now.getSeconds() < 10 ? "0"+now.getSeconds() : now.getSeconds()));
		$(".now").html(strNow);
	}
	
	var getData = function() {
		$.ajax({
			url: 'getbtc.php',
			type: 'GET',
			dataType: 'json',
			success: function(data) {
				//data - response from server
				$(".result").html("<p>High: " + data.btc_high + "<br>" 
										   + "Low: " + data.btc_low + "<br>"
										   + "<strong>Last: " + data.btc_last + "</strong></p>"
										   
										   + "<p>High: " + data.ltc_high + "<br>" 
										   + "Low: " + data.ltc_low + "<br>"
										   + "<strong>Last: " + data.ltc_last + "</strong></p>"
										   
										   + "<p>High: " + data.ltcbtc_high + "<br>" 
										   + "Low: " + data.ltcbtc_low + "<br>"
										   + "<strong>Last: " + data.ltcbtc_last + "</p>");
										   
				$(".ethltc").html("<p>High: " + data.eth_high + "<br>" 
										   + "Low: " + data.eth_low + "<br>"
										   + "<strong>Last: " + data.eth_last + "</strong></p>"
										   + "<p>High: " + data.ethltc_high + "<br>" 
										   + "Low: " + data.ethltc_low + "<br>"
										   + "<strong>Last: " + data.ethltc_last + "</strong></p>");
			
				$(".now").html(data.time_now);
				
				document.title = Math.trunc(data.btc_last) + "/" + Math.trunc(data.ltc_last) + "/" + Math.trunc(data.eth_last);
			}
		});
	};
	
	getTime();
	getData();
	
	//setInterval(function() {
	//	getTime();
	//}, 1000);
	
	//https://btc-e.com/api/3/ticker/btc_usd
	setInterval(function() { 
		getData();	
	}, 3000);

	</script>
  </body>
</html>