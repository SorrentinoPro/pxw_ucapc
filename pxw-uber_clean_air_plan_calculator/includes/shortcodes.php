<?php
	/**
		* Display Calculator via Short-code.
		*  
		* return HTML. 
	*/
	function pxw_ucapc_shortcode(){
		
		// Mimic an API CALL OUTPUT from UBER.
		$ucapc_API_CALL = '{
		"agreement_TPPI": {
		"vehicle": "Toyota Prius Plug-in Hybrid Business Edition Plus",
		"agreement_length": 3.5,
		"weekly_rental": 249
		},
		"agreement_NLT6": {
		"vehicle": "Nissan Leaf e+ Tekna - 62kWh",
		"agreement_length": 4,
		"weekly_rental": 249
		},
		"agreement_NLT4": {
		"vehicle": "Nissan Leaf e+ Tekna - 40kWh",
		"agreement_length": 4,
		"weekly_rental": 219
		},
		"agreement_MVTS": {
		"vehicle": "Mercedes Vito Tourer Select",
		"agreement_length": 4,
		"weekly_rental": 279
		},
		"agreement_MGZS": {
		"vehicle": "MG ZS EV Exclusive",
		"agreement_length": 3,
		"weekly_rental": 259
		},
		"agreement_KNPH": {
		"vehicle": "Kia Niro Plug-In Hybrid",
		"agreement_length": 3.5,
		"weekly_rental": 249
		}
		}';
		
		// Convert to array. 
		$ucapc_API_CALL_A = json_decode($ucapc_API_CALL, true);
		//var_dump($ucapc_API_CALL);
		
		// Open Section.
		$output .= '<section id="pxw_ucapc_section" >';
		$output .= '<input type="hidden" id="pxw_ucapc_API" value="'.esc_attr($ucapc_API_CALL).'" />';
		$output .= '<h2 id="pxw_ucapc_title">Uber Clean Air Savings</h2>';
		
		// Open Container.
		$output .= '<div class="pxw_ucapc_container swiper-container">';
		// Open Wrapper.
		$output .= '<div class="swiper-wrapper">';
		
		foreach( $ucapc_API_CALL_A as $API_Agreement => $array){
			
			$API_Agreement_t = str_replace("_", " ", $API_Agreement);
			$API_Agreement_serial = substr($API_Agreement, -4);
			
			$output .= '<div class="pxw_ucapc_item swiper-slide">';
			
			$output .= '<div class="pxw_ucapc_half pxw_ucapc_info">';
			
			$output .= '<h3 class="pxw_ucapc_item_label" data_v="'.$API_Agreement.'">'.$API_Agreement_t.'</h3>';
			foreach($array as $parameter => $value){
				
				$parameter_n = str_replace("_", " ", $parameter);
				$tx='';
				$txp='';
				if( 'length' === substr($parameter_n, -6) ){$tx=' Years';}
				else if( 'rental' === substr($parameter_n, -6) ){$txp=' £';}
				
				$output .= '<span class="pxw_ucapc_item_param" data_v="'.$parameter.'"><b>'. $parameter_n .': </b></span>';
				$output .= '<span class="pxw_ucapc_item_value" data_v="'.$value.'">'.$txp . $value . $tx .'</span><br>';
			}
			//close half info.
			$output .= '</div>';
			
			$output .= '<div class="pxw_ucapc_half pxw_ucapc_car">';
			// Get Img car based on agreement serial 
			$output .= '<img class="pxw_ucapc_img" src="'. plugins_url('../assets/img/'.$API_Agreement_serial.'.png', __FILE__) .'" />';
			//close half car.
			$output .= '</div>';
			
			//close item.
			$output .= '</div>';
		}
		
		// Close wrapper.
		$output .= '</div>';
		
		// Add Pagination. 
		$output .= '<div class="swiper-pagination"></div>';
		
		// Close Container.
		$output .= '</div>';
		 
		$output .= ' <hr class="pxw_ucapc_hr">';
		$output .= ' <p class="append-buttons">';
		$output .= '<a href="#" class="slide-1">Deal 1</a>';
		$output .= '<a href="#" class="slide-2">Deal 2</a>';
		$output .= '<a href="#" class="slide-3">Deal 3</a>';
		$output .= '<a href="#" class="slide-4">Deal 4</a>';
		$output .= '<a href="#" class="slide-5">Deal 5</a>';
		$output .= '<a href="#" class="slide-6">Deal 6</a>';
		$output .= '</p>';
		
		// Open Calculator.
		$output .= '<div class="pxw_ucapc_calculator" >';
		
		$output .= '<input id="pxw_ucapc_range" type="range" min="1000" max="5000" value="1000" class="slider" >';
		
		// Open fund.
		$output .= '<div class="pxw_ucapc_fund" >';
		$output .= '<b>Uber Clean Air Funds: </b> £<span></span>';
		// Close fund.
		$output .= '</div>';
		// Open weekly pay.
		$output .= '<div class="pxw_ucapc_weekly" >';
		//$output .= '<b>Weekly Payment: </b> £<span></span>';
		$output .= '<b>Weekly Discounted: </b> £<span></span>';
		// Close weekly pay.
		$output .= '</div>';
		
		//Close calculator.
		$output .= '</div>';
		
		
		// Close Section.
		$output .= '</section>';
		
		// Output Short-code
		return $output;
	}
	add_shortcode('pxw_ucapc', 'pxw_ucapc_shortcode');
?>