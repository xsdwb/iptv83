<?php
date_default_timezone_set("Asia/Shanghai");
$timefirst = date('YmdH', time());
$channel = empty($_GET['id']) ? "cctv16hd4k/15000000" : trim($_GET['id']);
$array = explode("/", $channel);
//$ip = trim($_GET['ip']);
$url= "223.109.53.49/liveplay-kk.rtxapp.com";
$url= "117.184.239.60/liveplay-kk.rtxapp.com";
$stream = "http://" . $url . "/live/program/live/{$array[0]}/{$array[1]}/";
$timestamp = substr(time(), 0, 9) - 7;
$current = "#EXTM3U" . "\r\n";
$current .= "#EXT-X-VERSION:3" . "\r\n";
$current .= "#EXT-X-TARGETDURATION:3" . "\r\n";
$current .= "#EXT-X-MEDIA-SEQUENCE:{$timestamp}" . "\r\n";
for ($i = 0; $i < 3; $i++) {
    $current .= "#EXTINF:3," . "\r\n";
    $current .= $stream . $timefirst . "/" . $timestamp . ".ts" . "\r\n";
    $timestamp = $timestamp + 1;
    }
header("Content-Disposition: attachment; filename=playlist.m3u8");
echo $current;
?>
