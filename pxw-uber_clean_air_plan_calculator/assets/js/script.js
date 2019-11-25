jQuery(document).ready(function($){
	
	// Uber API. 
	var pxw_ucapc_API = JSON.parse($('#pxw_ucapc_API').val());
	
	// Swiper
	var swiper = new Swiper('.swiper-container', {
		pagination: {
			el: '.swiper-pagination',
			type: 'progressbar',
		},
	});
	
	document.querySelector('.slide-1').addEventListener('click', function (e) {
		e.preventDefault();
		swiper.slideTo(0, 0);
		calculate();
	});
    document.querySelector('.slide-2').addEventListener('click', function (e) {
		e.preventDefault();
		swiper.slideTo(1, 0);
		calculate();
	});
    document.querySelector('.slide-3').addEventListener('click', function (e) {
		e.preventDefault();
		swiper.slideTo(2, 0);
		calculate();
	});
	document.querySelector('.slide-4').addEventListener('click', function (e) {
		e.preventDefault();
		swiper.slideTo(3, 0);
		calculate();
	});
    document.querySelector('.slide-5').addEventListener('click', function (e) {
		e.preventDefault();
		swiper.slideTo(4, 0);
		calculate();
	});
    document.querySelector('.slide-6').addEventListener('click', function (e) {
		e.preventDefault();
		swiper.slideTo(5, 0);
		calculate();
	});
	
	// Calculator function
	function calculator($fund, $years, $weekly_p ){
		$length = $years * 52;
		$price 	= Math.floor($weekly_p * $length) - $fund;
		$new_weekly_p = $price / $length;
		
		return $new_weekly_p.toFixed(2);
	}
	// Fire Calculation 
	function calculate(){
		// Uber Clean Air fund
		$fund = $('#pxw_ucapc_range').val();
		$('.pxw_ucapc_fund span').html($fund);
		
		$selected = $('.swiper-slide-active .pxw_ucapc_item_label').attr('data_v');
		
        $years		= pxw_ucapc_API[$selected]['agreement_length'] ;
		$weekly_p 	= pxw_ucapc_API[$selected]['weekly_rental'];
		
		$new_weekly_p = calculator($fund, $years, $weekly_p );
		$('.pxw_ucapc_weekly span').html($new_weekly_p );
	}
	
	// On load.
	calculate();
	
	// On update. 
	$('#pxw_ucapc_range').change(function(){
		calculate();
	});
	
	swiper.on( 'slideChangeTransitionEnd', function() {
		calculate();
	});
});