<?php
// Always start this first
session_start();

if ( ! empty( $_POST ) ) {
        // Getting submitted user data from database
        $con = new mysqli("localhost","u500032359_atul","Roxydog04553!@#$" ,"u500032359_gym");
        $stmt = $con->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param('s', $_POST['email']);
        $stmt->execute();
        $result = $stmt->get_result();
    	$user = $result->fetch_object();
    		
    	// Verify user password and set $_SESSION
    	if ( password_verify( $_POST['psw'], $user->password ) ) {
            $_SESSION['userID'] = $user->ID;
                $_SESSION['name'] = $user->fname;
               # echo $_SESSION['name'];
            header("Location: index.html?Success");
            
            exit();
    	}
}
?>