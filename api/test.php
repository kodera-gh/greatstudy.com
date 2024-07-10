<?php
  header("Access-Control-Allow-Origin: http://localhost:8080");
  header("Access-Control-Allow-Credentials:true");
  header('Access-Control-Allow-Headers:Content-Type');
  header('Content-Type: application/json');

  $response = [
      1 => [
        'id' => 1,
        'name' => "山田太郎"
      ],
      2 => [
        'id' => 2,
        'name' => "山田次郎"
      ],
  ];
  
  echo json_encode($response);