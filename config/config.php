<?php
/**
 * Created by PhpStorm.
 * User: 3529588
 * Date: 27/04/2017
 * Time: 08:40
 */


define('DEVELOPER_STATUS', true);

$root         = '/';
$include_path = 'includes/';


session_start();

// If developer status is true / enabled

if (DEVELOPER_STATUS) {
    // Set error_reporting to E_ALL (default on XAMPP), which display all errors
    error_reporting(E_ALL);
} else {
    // Turn off all error reporting (default on most servers)
    error_reporting(0);
}

require '../public/inc/functions.php';


// Configuration for Database
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'planteskole';

// Connect to database
$db = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check for connection error
if ($db->connect_error) {
    connect_error(__LINE__, __FILE__);
}

// Set charset from Db text to utf8
$db->set_charset('utf8');

// Set the database server to danish names for date and times
$result = $db->query("SET lc_time_names = 'da_DK';");

// If result returns false, use the function query_error to show debugging info
if (!$result) {
    query_error($query, __LINE__, __FILE__);
}

ob_start();
