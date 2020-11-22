<?php 

$in = "18 5";
$in = explode(" ", $in);
$n = $in[0];
$m = $in[1];

if($m == 0){
	echo 0;
	die;
}
if($m == 1){
	echo $n;
	die;
}

$k = ($n-1) / ($m-1); // Кол-во членов прогрессии
$k = (integer) $k;



$d = $m - 1; // Шаг прогрессии

$s = (2+($k-1)*$d)*$k / 2;

//echo a(1, $k);
echo "$s <br> $d, $k";
