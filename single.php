<?php  
require_once "users_core/init.php";
require_once "users_view/header.php";

$error = '';
$id = $_GET['id'];

if(isset($_GET['id'])){
	$article = tampilkan_per_id($id);
	while($row = mysqli_fetch_assoc($article)){
		$judul_awal = $row['judul'];
		$konten_awal = $row['isi'];
		$tag_awal = $row['tag'];
	}
}
?>


	<br>
	<div class="single">
		<p id="judul_single"> <?=$judul_awal; ?> </p> <br>

		<p id="isi_single"> <?=$konten_awal; ?> </p>

		<p id="tag_single"> Tag: <?=$tag_awal; ?> </p>		
	</div> <hr>

 

<?php require_once "users_view/footer.php"; ?>
