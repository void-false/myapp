<?php 

		date_default_timezone_set('Asia/Jerusalem');
		$t = time();
	    $json_wex = file_get_contents('https://wex.nz/api/3/ticker/eth_ltc');
	    $json_kraken = file_get_contents('https://api.kraken.com/0/public/Ticker?pair=XBTUSD,LTCUSD,LTCXBT');
	    # $json_polo = file_get_contents('https://poloniex.com/public?command=returnTicker');
	    # $json_etc  = file_get_contents('https://etc.ethermine.org/api/miner_new/F46bDBEB58A140BD025113B8F17853d65bD2AA90');
	    # $json_sc   = file_get_contents('https://api.nanopool.org/v1/sia/user/488ca1ee0ca5a3d3d96be6bc11118cc7ddeef8b4a1dd9516581b5e0613ccf8dacc1f69623ee1');
	    $obj_wex = json_decode($json_wex);
	    $obj_kraken = json_decode($json_kraken);
	    # $obj_polo = json_decode($json_polo);
	    # $obj_etc  = json_decode($json_etc);
	    # $obj_sc   = json_decode($json_sc);
	    
		$output = (object) ['btc_low'  => $obj_kraken->result->XXBTZUSD->l[0],
	    					'btc_high' => $obj_kraken->result->XXBTZUSD->h[0],
							'btc_last' => $obj_kraken->result->XXBTZUSD->c[0],
							'ltc_high' => $obj_kraken->result->XLTCZUSD->h[0],
							'ltc_low'  => $obj_kraken->result->XLTCZUSD->l[0],
							'ltc_last' => $obj_kraken->result->XLTCZUSD->c[0],
							
							'ltcbtc_high' => $obj_kraken->result->XLTCXXBT->h[0],
							'ltcbtc_low'  => $obj_kraken->result->XLTCXXBT->l[0],
							'ltcbtc_last' => $obj_kraken->result->XLTCXXBT->c[0],
							
							'ethltc_low'   => $obj_wex->eth_ltc->low,
							'ethltc_high'  => $obj_wex->eth_ltc->high,
							'ethltc_last'  => $obj_wex->eth_ltc->last,
							
							'time_now' => date("H:i:s", $t),
		];
		
		$output_json = json_encode($output);
		header('Content-Type: application/json');
		echo $output_json;

?>