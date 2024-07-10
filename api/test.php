<?php
  header("Access-Control-Allow-Origin: http://localhost:8080");
  header("Access-Control-Allow-Credentials:true");
  header('Access-Control-Allow-Headers:Content-Type');
  header('Content-Type: application/json');

  $response = [
      'status' => 'success',
      'message' => 'データ取得成功',
      'data' => [
          'id' => 1,
          'name' => 'John Doe'
      ]
  ];
  
  echo json_encode($response);