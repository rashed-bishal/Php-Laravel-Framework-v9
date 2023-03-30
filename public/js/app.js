$(document).ready(function(){
	$('#companies_id').change(function(){
		let selectedValue = $(this).val();
		window.location.href = "/contacts/company/"+selectedValue;
	});

	$('erase_contact').click(function(){
		$.ajax({
			url: '/contacts/erase',
			method: 'POST',
		});
	});
});
