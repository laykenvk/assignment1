<?php
$DB_HOST = 'laykenvk.dk.mysql';
$DB_USER = 'laykenvk_dk';
$DB_PASS = 'J8XXPETS';
$DB_NAME = 'laykenvk_dk';
// $DB_PORT = '8889';
$link = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
//$link = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $DB_PORT);
if ($link->connect_error) { 
   die('Connect Error ('.$link->connect_errno.') '.$link->connect_error);
}
$link->set_charset('utf8'); 
?>
