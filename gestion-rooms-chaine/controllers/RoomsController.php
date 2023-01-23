<?php 

class RoomsController{

	public function getAllRooms(){
		$rooms = Room::getAll();
		return $rooms;
	}

	public function getOneRoom(){
		if(isset($_POST['room_id'])){
			$data = array(
				'room_id' => $_POST['room_id']
			);
			$room= Room::getRoom($data);
			return $room;
		}
	}
	public function findRooms(){
		if(isset($_POST['search'])){
			$data = array('search' => $_POST['search']);
		}
		$rooms = Room::searchRoom($data);
		return $rooms;
	} 

	public function addRoom(){
		if(isset($_POST['submit'])){
			$data = array(
				'room_type' => $_POST['room_type'],
				'room_price' => $_POST['room_price'],
				'room_image' => $_POST['room_image'],
				
				// 'date_emb' => $_POST['date_emb'],
				'reservation' => $_POST['reservation'],
			);
			$result = Room::add($data);
			if($result === 'ok'){
				Session::set('success','Room Ajouté');
				Redirect::to('home');
			}else{
				echo $result;
			}
		}
	}

	public function updateRoom(){
		
			$data = array(
				'room_id' => $_POST['room_id'],
				'room_type' => $_POST['room_type'],
				'room_price' => $_POST['room_price'],
				'room_image' => $_POST['room_image'],
				
				// 'date_emb' => $_POST['date_emb'],
				'reservation' => $_POST['reservation'],
			);
			// die(print_r($data));
			$result = Room::update($data);
			// if($result === 'ok'){
			// 	Session::set('success','Room Modifié');
			// 	Redirect::to('home');
			// }else{
			// 	echo $result;
			// }
		
	}
	public function deleteRoom(){
		// if(isset($_POST['room_id'])){
			$data['room_id'] = $_POST['room_id'];
			// die(print_r($data));
			$result = Room::delete($data);
			if($result === 'ok'){
				Session::set('success','Room Supprimé');
				Redirect::to('home');
			}else{
				echo $result;
			}
		
	}

}



?>