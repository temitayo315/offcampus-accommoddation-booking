$(document).ready(function () {
		$(".open").click(function(){
		var open_house_id = $(this).attr('id');
		
		if (confirm("Are you sure you want open this house?")) {
			$.ajax({
				url: "assets/includes/close_house_form.php",
				method: "POST",
				data: {id:open_house_id, open:1},
				success:function(data){
					alert(data);
					window.location.href='open_property.php';
				}
			});
		}
	});
});
		