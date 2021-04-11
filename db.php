<?php
require "rb.php";
R::setup( 'pgsql:host=localhost;dbname=webdev1',
        'postgres', 'CampFord27' );
        
session_start();
?>