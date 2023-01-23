<?php 

class Room {

	static public function getAll(){
		$stmt = DB::connect()->prepare('SELECT * FROM rooms');
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
		$stmt = null;
	}

	static public function getRoom($data){
		$room_id = $data['room_id'];
		try{
			$query = 'SELECT * FROM rooms WHERE room_id=:room_id';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":room_id" => $room_id));
			$room= $stmt->fetch(PDO::FETCH_OBJ);
			return $room;
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}

	static public function add($data){
		$stmt = DB::connect()->prepare('INSERT INTO rooms (room_type,room_price,room_image,reservation)
			VALUES (:room_type,:room_price,:room_image,:reservation)');
		$stmt->bindParam(':room_type',$data['room_type']);
		$stmt->bindParam(':room_price',$data['room_price']);
		$stmt->bindParam(':room_image',$data['room_image']);
		
		$stmt->bindParam(':reservation',$data['reservation']);

		if($stmt->execute()){
			return 'ok';
		}else{
			return 'error';
		}
		$stmt->close();
		$stmt = null;
	}
	static public function update($data){
		$stmt = DB::connect()->prepare('UPDATE rooms SET room_type= :room_type,room_price=:room_price,room_image=:room_image,reservation=:reservation WHERE room_id=:room_id');
		$stmt->bindParam(':room_id',$data['room_id']);
		$stmt->bindParam(':room_type',$data['room_type']);
		$stmt->bindParam(':room_price',$data['room_price']);
		$stmt->bindParam(':room_image',$data['room_image']);
		
		$stmt->bindParam(':reservation',$data['reservation']);
		if($stmt->execute()){
			return 'ok';
		}else{
			return 'error';
		}
		$stmt->close();
		$stmt = null;
	}

	static public function delete($data){
		$room_id = $data['room_id'];
		try{
			$query = 'DELETE FROM rooms WHERE room_id=:room_id';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":room_id" => $room_id));
			if($stmt->execute()){
				return 'ok';
			}
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}

	static public function searchRoom($data){
		$search = $data['search'];
		try{
			$query = 'SELECT * FROM rooms WHERE room_type LIKE ? OR suite_type LIKE ?';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array('%'.$search.'%','%'.$search.'%'));
			$rooms = $stmt->fetchAll();
			return $rooms;
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}
}
