jQuery(document).ready(function ($) {
	// when someone saves a business, add latitude and longitude to the location   
	$('#publish').on('click', function (e) { // this is what triggers the function        
		var url = businessajax.ajaxurl; // this tells the function to be ajaxy        
		var address = $('#level').val(); // these variables come from the HTML  
		var city = $('#city').val()''
		var state = $('#state').val()''
		var zip = $('#zip').val()''
		var nonce = $('#cdashmm_membership_nonce').val();        
		var data = { // gather all the variables to send them to PHP            
		'action': 'cdashmm_update_total_amount', // this is the name of the PHP function            
		'level_id': level,            
		'nonce': nonce        
		};        

		// update the subtotal, then add it to the donation to get the total        
		$.post(url, data, function (response) { // this is what JS gets back from PHP                       
			$("#latitude").val(response.latitude);     
			$("#longitude").val(response.longitude);     
		});    
	});
});