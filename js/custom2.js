
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
/*	$('.count').click(function(){
    		alert("yea...on the low");
    	});
*/
    //load unseen notification
    function load_unseen_notification(view = ''){
      $.ajax({
        url: '../notifications.php',
        method: "POST",
        data:{view:view},
        dataType:"json",
        success:function(data){
          $("span .count").html(data);
        }
      });
    }
    load_unseen_notification();

    $("#contact_form").on("submit",function(e){
    	e.preventDefault();
    	var form_data = $(this).serialize();
    	$.ajax({
    		url:"../assets/includes/contact_agent_single_form.php",
    		method:"POST",
    		data:form_data,
    		success:function(data){
    			$("contact_form")[0].reset();
    			load_unseen_notification();
    		}
    	});
    })

    $(document).on('click','a > span',function(){
    	$(".count").html('');
    	load_unseen_notification("yes");
    });

    setInterval(function(){
    	load_unseen_notification();
    }, 5000);
})