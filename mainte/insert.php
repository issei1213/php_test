<?php

  ini_set("display_errors", 1);

  function insertContact($data){
    var_dump($data);
    // DB接続
    require "db_connection.php";

    // DB保存
    $params = [
      "id" => null,
      "your_name" => $data["your_name"],
      "email" => $data["email"],
      "url" => $data["url"],
      "gender" => $data["gender"],
      "age" => $data["age"],
      "contact" => $data["contact"],
      "created_at" => "NOW()"
    ];

    // $params = [
    //   "id" => null,
    //   "your_name" => "なまえ",
    //   "email" => "test@gmail.com",
    //   "url" => "http://test.com",
    //   "gender" => "1",
    //   "age" => "2",
    //   "contact" => "いいい",
    //   "created_at" => null
    // ];

    $count = 0;
    $columns = "";
    $values = "";

    foreach(array_keys($params) as $key){
      if($count++>0){
        $columns .= ",";
        $values .= ",";
      }
      $columns .= $key;
      $values .= ':'.$key;
    }

    $sql = 'insert into contacts ('. $columns .')values('. $values .')';

    var_dump($sql);
    // exit

    $stmt = $pdo->prepare($sql);//プリペアードステートメント
    $stmt->execute($params);//実行

  }
?>