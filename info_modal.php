<!-- My Account -->
    <div class="modal fade" id="Feedbackform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<center><h4 class="modal-title" id="myModalLabel">My Account</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					
          
               <form method="POST" action="#" >
            <div class="col-md-4">
              <label for="profile-first-name" class="my-profile__label">Full Name</label>
              <input type="text" value="" class="my-profile__field" id="profile-first-name">

              <label for="profile-email" class="my-profile__label">Email*</label>
              <input type="email" value="" required name="email" class="my-profile__field" id="profile-email">

              <div>
                <label for="offer-type" class="my-profile__label">Reaction</label>
                <select name="Reaction" id="offer-type" class="my-profile__field">
                  <option disabled value="All" selected>Feedback Reaction</option>
                  <option value="Happy">Happy</option>
                  <option value="Fairly Happy">Fairly Happy</option>
                  <option value="Neutral">Neutral</option>
                  <option value="Not Happy">Not Happy</option>
                </select>
              </div><!-- .col -->

              <label for="profile-twitter" class="my-profile__label">Message</label>
              <input type="text" name="comment" required value="" class="my-profile__field" id="profile-twitter">
              <button type="submit" name="submit_feedback" class="my-profile__submit">Send</button>
            </div><!-- .col -->
          </form>
                
            
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- /.modal -->