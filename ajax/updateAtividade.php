<?php 
require_once '../includes/db.php'; // The mysql database connection script
if(isset($_GET['atividadeID'])){
	$status = $mysqli->real_escape_string($_GET['status']);
	$atividadeID = $mysqli->real_escape_string($_GET['atividadeID']);

	$query="UPDATE atividade set status='$status' where id='$atividadeID'";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

	$result = $mysqli->affected_rows;

	$json_response = json_encode($result);
}
?>