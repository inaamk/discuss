<?php
	session_start();
	include("includes/db.php");
	include("functions/functions.php");
	switch($_REQUEST['sAction']){
		default :
			getArticles();
		break;
		case'getPaginator';
			getPaginator();
		break;
	}
?>