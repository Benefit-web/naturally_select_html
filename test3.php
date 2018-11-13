<?php
$params = array(
    'access_token' => "3200194670.80912dc.6694d5f5992e419996f80a23868844c3",
    "q" => "おうちごはん",
);
$query = http_build_query($params);
  
//POSTリクエストを送信し、返ってきたJSONデータをオブジェクト形式に変換
$obj = json_decode(@file_get_contents("https://api.instagram.com/v1/tags/search?{$query}"));
  
//個々の場所データ
foreach($obj->data as $item){
    //タグ名・投稿数
    $name = $item->name;
    $count = $item->media_count;
    //出力
    echo "<p>#{$name} ({$count})</p>";
}



?>
