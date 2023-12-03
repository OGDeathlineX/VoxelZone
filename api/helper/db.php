<?php
@$mysqli = new mysqli("localhost","user11","user11","equipo2");

if ($mysqli -> connect_errno) {
	echo '{"status":500,"error":"Failed to connect to MySQL: '. $mysqli -> connect_error.'"}';
	exit();
}