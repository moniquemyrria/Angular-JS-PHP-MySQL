<?php 
require_once '../includes/db.php'; // The mysql database connection script
if(isset($_GET['descricao'])){
	$descricao = $mysqli->real_escape_string($_GET['descricao']);
	$status = "0";
	$data = date("Y-m-d", strtotime("now"));

	$query="INSERT INTO atividade(descricao,status,data)  VALUES ('$descricao', '$status', '$data')";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

	$result = $mysqli->affected_rows;

	echo $json_response = json_encode($result);
	}
?>