<?php 
$num = [2,1,3,2];
$num1 = 0;

if ($num1==1){
    echo "goods";
}
echo sizeof($num) ."\n";
sort($num) ;
$num = array_unique($num);
echo "<br>";
$arraysize =  sizeof($num);
for ($i=0; $i < $arraysize; $i++) { 
    if ($i == $arraysize){
    echo $num[$i];
    }
 
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gradient Text Effect</title>
<style>
    .gradient-text {
        background: linear-gradient(to right, #00fff1, #AA336A);
        -webkit-background-clip: text; /* For Safari/Chrome */
        background-clip: text;
        color: transparent;
        font-size: 48px;
        font-weight: bold;
        -webkit-text-fill-color: transparent;
    }
</style>
</head>
<body>

<h1 class="gradient-text">Gradient Text Effect</h1>

</body>
</html>