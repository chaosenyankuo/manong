<?php
	
	//��ȡ����Ĳ���
	$email = $_POST['email'];

	//���ݿ���
	$pdo = new PDO('mysql:host=localhost;dbname=haochichi;charset=utf8','root','');

	$stmt = $pdo -> prepare('select * from users where email =  ?');

	$arr = [$email];

	$stmt->execute($arr);

	$user = $stmt -> fetch();

	if($user === false){
		echo '1';
	}else{
		echo '0';
	}