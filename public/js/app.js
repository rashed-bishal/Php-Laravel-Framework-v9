$(document).ready(function(){
	$('#search').keyup(function(event){
		let searchValue = $(this).val();
		if(searchValue.length == 0)
		{
			$('#btn-refresh').fadeOut();
		}
		else
		{
			$('#btn-refresh').fadeIn();
		}

	});	
});


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

	$('#btn-refresh').click(function(){
		window.location.href = "/contacts";
	});
});
