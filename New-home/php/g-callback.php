<?php
	require_once "config.php";
	if (isset($_SESSION['access_token']))
		$gClient->setAccessToken($_SESSION['access_token']);
	else if (isset($_GET['code'])) {
		$token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
		$_SESSION['access_token'] = $token;
	} else {
		header('Location: login.php');
		exit();
	}
	$oAuth = new Google_Service_Oauth2($gClient);
	$userData = $oAuth->userinfo_v2_me->get();
	$_SESSION['id'] = $userData['id'];
	$_SESSION['email'] = $userData['email'];
	$_SESSION['gender'] = $userData['gender'];
	$_SESSION['picture'] = $userData['picture'];
	$_SESSION['familyName'] = $userData['familyName'];
	$_SESSION['givenName'] = $userData['givenName'];
 	$sql= "INSERT INTO google_users ('id', 'email', 'gender', 'picture', 'familyName', `picture_link`) VALUES ('".$userData['id']."','".$userData['email']."','".$userData['gender']."','".$userData['picture']."','".$userData['familyName']."','".$userData['givenName']."')";
	mysqli_query($con,$sql);
	header('Location: index.php');
	exit();



	#"insert into google_users values('".$userData['id']."','".$userData['givenName']."','".$userData['familyName']."','".$userData['email']."',
 #'".$userData['gender']."','".$userData['picture']."')";
?>





