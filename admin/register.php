<?php  
require_once "core/init.php";

require_once "functions/link.php";


if($_SESSION['user']){
	header('Location: index.php');
}else{

$error = '';

if(isset($_POST['submit'])){
	$email = $_POST['email'];
	$pass = $_POST['password'];

	if(!empty(trim($email)) && !empty(trim($pass))){

		if(register_cek_email($email)){//GANTI register_cek_mail
			if(register_user($email, $pass)){
				$_SESSION['user'] = $email;
				header('Location: index.php');
			}else{
				$error = 'Aduhhh ada masalah saat DAFTAR';
			}
		}else{
			$error = 'Email sudah terdaftar';
		}

	}else{
		$error = 'email dan password wajib diisi';
	}
}

require_once "view/header.php";

?>



<br>
<div class="container">

	<form action="" method="post" class="form-group col-md-7">
		<h3> Register ADMIN </h3> <br>

		<div id="error"><?=$error ?></div>

		<div class="form-group ">
			<label for="email">Email</label>
			<input type="email" class="form-control" name="email" id="email">
		</div>
		<div class="form-group ">
			<label for="password">Password</label>
			<input type="password" class="form-control" name="password" id="password">
		</div>
		<button type="submit" name="submit" value="submit" class="btn btn-dark">Submit</button>
	</form>

</div>


<?php require_once "view/footer.php"; ?>
<?php } ?>