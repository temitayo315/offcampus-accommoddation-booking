
$(document).ready(function () {
	
	$(".remove").click(function(){
		var remove_id = $(this).attr('id');
		
		if (confirm("Are you sure you want to delete this property?")) {
			$.ajax({
				url: "assets/includes/delete.php",
				method: "POST",
				data: {id:remove_id, rem:1},
				success:function(data){
					alert(data);
					window.location.href='my_property.php';
				}
			});
		}	
	});

});