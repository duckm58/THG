<?php
# Timezone.
date_default_timezone_set('Asia/Ho_Chi_Minh');

error_reporting(0);
# Start the session:
session_start();

# Database Connection:
include('config/connection.php');

# Constants:
DEFINE('D_TEMPLATE', 'template');
DEFINE('NAME_DOMAIN', 'http://localhost/THG');

# Function:
include ('functions/user.php');
include ('functions/sandbox.php');
include ('functions/data.php');
include ('functions/template.php');
include ('classes/time_ago.php');

$_SESSION['status_user_page'] = status_user_page();

/*
 * Them 1 bien $checkPassword de kiem tra sai mat khau.
 * Them phan kiemtra sign-up
 * By: HaiTrieu
 * */
#----Login
//$checkPassword = check_user($dbc);
#----Signup
$checkSignUp = validSignUp($dbc);


# User Setup:
check_user($dbc);
$user = data_user($dbc, $_SESSION['username']);//bien toan cuc.

# Restaurant Setup:
check_restaurant();
$restaurant = restaurant_data($dbc);//bien toan cuc.

# Site and Page Setup:
$site_title = 'THG 1.0';
$debug = data_setting_value($dbc, 'debug-status');

$path = get_path();
$slug = $path['call_parts'][0];

check_slug($slug, $dbc);

# Prepare to load page.
$page = data_post($dbc, $slug);
$view = data_post_type($dbc, $page['type']);

?>