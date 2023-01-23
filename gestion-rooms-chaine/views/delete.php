<?php 
	if(isset($_POST['room_id'])){
		$exitRoom = new RoomsController();
		$exitRoom->deleteRoom();
	}
?>