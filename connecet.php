<?php
	
	$engine1 = $POST['engine1'];
	$engine2 = $POST['engine2'];
	$engine3 = $POST['engine3'];
	$engine4 = $POST['engine4'];
	$engine5 = $POST['engine5'];
	$engine6 = $POST['engine6'];
	$save = $POST['save'];
	$start = $POST['start'];
	
	//database connection

	$conn = new mysli('localhost','root','','robotarm')

	if ($conn->connect_error) {
		die('connection failed : '.$conn->connect_error);

	}else{

		$stmt = $conn->prepare("insert into robotarm(engine1,engine2,engine3,engine4,engine5,engine6,save,start)
			values(?,?,?,?,?,?,?,?)");

		$stmt->bind_parm("iiiiiibb"$engine1,$engine2,$engine3,$engine4,$engine5,$engine6,$save,$start);

		$stmt->execute();
		echo "success";

		$stmt->close();
		$conn->close();
	
	}
?>