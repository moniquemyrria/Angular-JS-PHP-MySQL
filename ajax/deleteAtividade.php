<?php 
require_once '../includes/db.php'; // The mysql database connection script
if(isset($_GET['atividadeID'])){
	$atividadeID = $mysqli->real_escape_string($_GET['atividadeID']);

	$query="DELETE FROM atividade WHERE id='$atividadeID'";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

	$result = $mysqli->affected_rows;

	echo $json_response = json_encode($result);
}
?>