<?php
@$mysqli = new mysqli("localhost","user8","user8","user8");

if ($mysqli -> connect_errno) {
	echo '{"status":500,"error":"Failed to connect to MySQL: '. $mysqli -> connect_error.'"}';
	exit();
}