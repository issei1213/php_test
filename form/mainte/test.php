<?php

  $contactFile = ".contact.dat";

  //ファイル丸ごと読み込み
  // $fillContents = file_get_contents($contactFile);

  // echo $contactFile;

  // ファイルに書き込む(上書き)
  // file_put_contents($contanctFile, "テストです");

  // $addText = "テストです". "\n";

  // ファイルに書き込む(追記)

  // $allData = file($contactFile);

  // foreach($allData as $lineData){
  //   $lines = explode(",", $lineData);
  //   echo $lines[0]. "<br>";
  //   echo $lines[1]. "<br>";
  //   echo $lines[2]. "<br>";
  // }

  $contentFile = ".content.dat";

  $contents = fopen($contactFile, "a+");

  $addText = "1行追記" . "\n";

  fwrite($contents, $addText);

  fclose($contents);
  