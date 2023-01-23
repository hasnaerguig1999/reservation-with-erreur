<?php 
	if(isset($_POST['room_id'])){
		$Room= new RoomsController();
		$room = $Room->getOneRoom();
	}else{
		Redirect::to('home');
	}
	if(isset($_POST['submit'])){
		$Room = new RoomsController();
		$Room->updateRoom();
		Redirect::to('home');
	}
?>
<div class="container">
	<div class="row my-4">
		<div class="col-md-8 mx-auto">
			<div class="card">
				<div class="card-header">Modifier un Room</div>
				<div class="card-body bg-light">
					<a href="<?php echo BASE_URL;?>" class="btn btn-sm btn-secondary mr-2 mb-2">
						<i class="fas fa-home"></i>
					</a>
					<form method="post">
						<div class="form-group">
							<label for="room_type">room_type*</label>
							<input type="text" name="room_type" class="form-control" placeholder="Room_type"
							value="<?php echo $room->room_type; ?>"
							>
						</div>
						<div class="form-group">
							<label for="room_price">Room Price *</label>
							<input type="text" name="room_price" class="form-control" placeholder="room price"
							value="<?php echo $room->room_price; ?>"
							>
						</div>
						<div class="form-group">
							<label for="mat">room image*</label>
							<input type="file" name="room_image" class="form-control" placeholder="room image"
								value="<?php echo $room->room_image; ?>">
								<input type="hidden" name="room_id" value="<?php echo $room->room_id; ?>">
						</div>
						
						<div class="form-group">
							<select class="form-control" name="reservation">
								<option value="1" <?php echo $room->reservation ? 'selected' : ''; ?>>non_reserver</option>
								<option value="0"
								<?php echo !$room->reservation ? 'selected' : ''; ?>
								>reserver</option>
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