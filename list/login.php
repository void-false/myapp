<?php 
    session_start();
    if(isset($_POST['submit'])) {
        if(strtoupper($_POST['username']) == 'VOID' && $_POST['password'] == '1234') {
            $_SESSION['id'] = 1;
            header("location: bookapplite.php");
        }
        else {
            header("location: index.php");
        }
    }
	else {
			header("location: index.php");
	}
?>
