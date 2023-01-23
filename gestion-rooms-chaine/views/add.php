<?php 
	if(isset($_POST['submit'])){
		$newRoom = new RoomsController();
		$newRoom->addRoom();
	}
?>
<div class="container">
	<div class="row my-4">
		<div class="col-md-8 mx-auto">
			<div class="card">
				<div class="card-header">Ajouter un Room</div>
				<div class="card-body bg-light">
					<a href="<?php echo BASE_URL;?>" class="btn btn-sm btn-secondary mr-2 mb-2">
						<i class="fas fa-home"></i>
					</a>
					<form method="post">
						<div class="form-group">
						<select name="room_type"  id="room_type" onchange="updateForm()"><option value=""></option>
          
          <option value="single" >Lit single</option>
          <option value="double" >Lit double</option>
          <option value="suite">Suite</option>
        </select><br>
        <div id="suite_type_section" style="display: none;">
        <label >Type de suite:</label><br>
            <select name="suite_type">
              <option></option>
              <option value="standard">Standard</option>
              <option value="junior">Junior</option>
              <option value="presidential">Présidentielle</option>
              <option value="penthouse">Penthouse</option>
              <option value="honeymoon">Lune de miel</option>
              <option value="bridal">Mariage</option>
            </select><br>
					</div>
						<div class="form-group">
							<label for="room_price">room_price*</label>
							<input type="text" name="room_price" class="form-control" placeholder="room_price">
						</div>
						<div class="form-group">
							<label for="room_Image">Room Image*</label>
							<input type="file" name="room_image" class="form-control" placeholder="room_image">
						</div>
					
						<div class="form-group">
							<select class="form-control" name="reservation">
								<option value="1">non_reserver</option>
								<option value="0">reserver</option>
							</select>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary" name="submit">Valider</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	
function updateForm() {
  var roomType = document.getElementById('room_type').value;
  var suiteTypeSection = document.getElementById('suite_type_section');
console.log(roomType);
  if (roomType == 'suite') {
    suiteTypeSection.style.display = "block";
  } else {
    suiteTypeSection.style.display = "none";
  }
}

function showSuiteTypeSelect() {
    document.getElementById("suite_type_section").style.display = "block";
  }
  
  function hideSuiteTypeSelect() {
    document.getElementById("suite_type_section").style.display = "none";
  }
  
  function updateForm() {
    var roomType = document.getElementById("room_type").value;
    if (roomType == "suite") {
      showSuiteTypeSelect();
    } else {
      hideSuiteTypeSelect();
    }
  }
  
  function updateGuestInfoFields() {
  var numGuests = document.getElementById('num-guests').value;
  var guestInfoFields = document.getElementById('guest-info-fields');

  // supprime tous les champs de formulaire existants
  while (guestInfoFields.firstChild) {
    guestInfoFields.removeChild(guestInfoFields.firstChild);
 
  }}

  
</script>