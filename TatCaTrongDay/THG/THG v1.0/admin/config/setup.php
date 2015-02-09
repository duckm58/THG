<?php
//Setup file:

# Database Connection Here...
include('../config/connection.php');

# Constants:
DEFINE('D_TEMPLATE', 'template');

# Function:
include ('functions/data.php');
include ('functions/template.php');

# Site Setup:
$debug = data_setting_value($dbc, 'debug-status');

$site_title = 'THG 1.0';

if(isset($_GET['page'])){
	
	$pageid = $_GET['page']; // Set $pageid to equal the value givin in the URL.
	
} else {
	
	$pageid = 1; // Set $pageid equal to 1 (the Home Page).
}


# Page Setup
$page = data_page($dbc,$pageid);


# User Setup:
$user = data_user($dbc, $_SESSION['username']);

?>