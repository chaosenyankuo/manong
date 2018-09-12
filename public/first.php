<?php

	$cate_id = $_POST['cate'];

	$pdo = new PDO('mysql:host=localhost;dbname=haochichi;charset=utf8','root','');

	$stmt = $pdo -> prepare('select * from shops where cate_id = ?');

	$arr = [$cate_id];

	$stmt->execute($arr);

	$shops = $stmt -> fetchAll();

	echo json_encode($shops);