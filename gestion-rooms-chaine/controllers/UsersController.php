<?php 

class UsersController {

	public function auth(){
		if(isset($_POST['submit'])){
			$data['user_email'] = $_POST['user_email'];
			$result = User::login($data);
			if($result->user_email=== $_POST['user_email'] && password_verify($_POST['user_password'],$result->user_password)){

				$_SESSION['logged'] = true;
				$_SESSION['user_email'] = $result->user_email;
				Redirect::to('home');

			}else{
				Session::set('error','Pseudo ou mot de passe est incorrect');
				Redirect::to('login');
			}
		}
	}

	public function register(){
		if(isset($_POST['submit'])){
			$options = [
				'cost' => 12
			];
			$user_password = password_hash($_POST['user_password'],PASSWORD_BCRYPT,$options);
			$data = array(
				'user_email' => $_POST['user_email'],
				// 'username' => $_POST['username'],
				'user_password' => $user_password,
			);
			$result = User::createUser($data);
			if($result === 'ok'){
				Session::set('success','Compte crée');
				Redirect::to('login');
			}else{
				echo $result;
			}
		}
	}

	static public function logout(){
		session_destroy();
	}


}
