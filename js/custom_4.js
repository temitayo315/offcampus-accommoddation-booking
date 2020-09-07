$(document).ready(function () {
		$(".close").click(function(){
		var close_house_id = $(this).attr('id');
		
		if (confirm("Are you sure you want to close this open house?")) {
			$.ajax({
				url: "assets/includes/close_house_form.php",
				method: "POST",
				data: {id:close_house_id, close:1},
				success:function(data){
					alert(data);
					window.location.href='open_property.php';
				}
			});
		}
	});
});
		