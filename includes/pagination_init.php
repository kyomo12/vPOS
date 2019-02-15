<?php
$p = $_GET['p'];
if($p){
    $start = ($p - 1) * $limit;
}else{
    $start = 0;
}