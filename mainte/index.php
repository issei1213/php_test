<?php

  require "db_connection.php";

  // ユーザー入力なし  query
  // $sql = "select * from contacts where id = 1";
  // $stmt = $pdo->query($sql);
  // $result = $stmt->fetchall();

  // echo "<pre>";
  // var_dump($result);
  // echo "<pre>";



  // ユーザー入力あり prepare bind execute

  $sql = "select * from contacts where id = :id"; //名前つきプレースフォルダー
  $stmt = $pdo->prepare($sql);//プリペアードステートメント
  $stmt->bindValue("id", 1, PDO::PARAM_INT);//紐付け
  $stmt->execute();//実行

  $result = $stmt->fetchall();

  echo "<pre>";
  var_dump($result);
  echo "<pre>";

  // トランザクション beginTranction, commit, 
  // ex)銀行の場合  残高を確認→Aさんから引き落とし→Bさんに振り込み

  $pdo->beginTranction();
  try{
    //SQL処理
    $stmt = $pdo->prepare($sql);//プリペアードステートメント
    $stmt->bindValue("id", 1, PDO::PARAM_INT);//紐付け
    $stmt->execute();//実行

    $pdo->commit();
  }catch(PDOException $e){
    $pdo->rollback();//更新をキャンセル
  }


?>