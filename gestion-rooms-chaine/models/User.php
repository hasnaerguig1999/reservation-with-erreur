<?php 

class User{

	static public function login($data){
		$username = $data['user_email'];
		try{
			$query = 'SELECT * FROM users WHERE user_email=:user_email';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":user_email" => $user_email));
			$user_email = $stmt->fetch(PDO::FETCH_OBJ);
			return $user_email;
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}

	static public function createUser($data){
		$stmt = DB::connect()->prepare('INSERT INTO users (user_email,user_password)
			VALUES (:user_email,:user_password)');
		$stmt->bindParam(':user_email',$data['user_email']);
		$stmt->bindParam(':user_password',$data['user_password']);

		if($stmt->execute()){
			return 'ok';
		}else{
			return 'error';
		}
		$stmt->close();
		$stmt = null;
	}

}

 ?>