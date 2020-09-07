$(document).ready(function () {
		$(".removeopenhouse").click(function(){
		var remove_open_house_id = $(this).attr('id');
		
		if (confirm("Are you sure you want to delete open house?")) {
			$.ajax({
				url: "assets/includes/delete_open_house.php",
				method: "POST",
				data: {id:remove_open_house_id, remv:1},
				success:function(data){
					alert(data);
					window.location.href='open_property.php';
				}
			});
		}
	});
		
});
		