<?php

$url = 'https://www.reddit.com/r/YouFellForItFool/comments/cjlngm/you_fell_for_it_fool.json';
$data = file_get_contents($url);
$data = json_decode($data, true);
$data = $data[1]['data']['children'][0]['data']['all_awardings'][0]['resized_icons'];

var_dump($data);