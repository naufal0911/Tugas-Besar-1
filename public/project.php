<?php
	session_start();	
	define('_HOST', 'localhost');
	define('_USER', 'root');
	define('_PASS', '');
	define('_DBSE', 'ml');
	
	define('BASE_URL', 'http://127.0.0.1:8000/');

	define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
	
	if(!isset($_SESSION['angket_logged_in']) && "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" != BASE_URL.'login.php')
		header('location: login.php');
	
	$db = new PDO('mysql:host='._HOST.';dbname='._DBSE.';charset=utf8', _USER, _PASS);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


if(isset($_GET['action']) && strtolower($_GET['action']) == 'processadd') {
		$stmt = $db->prepare("INSERT INTO toko_orders(`project_name`,`project_description`,`project_start`,`project_end`,`total_angket`,`user_create`,`create_date`) VALUES(?, ?, ?, ?, ?, ?, NOW())");
		if($stmt->execute(array($_POST['project_name'],$_POST['project_description'],$_POST['project_start'],$_POST['project_end'],$_POST['total_angket'],$_SESSION['user']['user_id']))) {
			$projectId = $db->lastInsertId();
			foreach($_POST['city_id'] as $k => $v) {
				$pd = $db->prepare("INSERT INTO project_detail(`project_id`,`province_id`,`city_id`,`jumlah_angket`) VALUES('".$projectId."', ?, ?, ?)");
				$pd->execute(array($_POST['province_id'][$k],$v,$_POST['jumlah_angket'][$k]));
			}
			$r['stat'] = 1;
			$r['message'] = 'Success';
		}
		else {
			$r['stat'] = 0;
			$r['message'] = 'Failed';
		}
		echo json_encode($r);
		exit;
	}
?>