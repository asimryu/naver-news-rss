<?php
//rss news xaml 데이터를 json으로 변환하여 출력
$sch = "";
if( isset($_GET['sch']) ) $sch = $_GET['sch'];
$news_url = "http://newssearch.naver.com/search.naver?where=rss&query={$sch}&field=0&nx_search_query=&nx_and_query=&nx_sub_query=&nx_search_hlquery=";
$fileContents = file_get_contents($news_url);
$fileContents = str_replace(array("\n", "\r", "\t"), '', $fileContents);
$fileContents = trim(str_replace('"', "'", $fileContents));
$xml = simplexml_load_string($fileContents);
$json = json_encode($xml, JSON_UNESCAPED_UNICODE);
echo $json;