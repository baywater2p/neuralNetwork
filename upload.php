<?
$img = "data:image/jpg;base64," . $_POST["base64"]; 
$data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $img)); 
$rando=rand(1111,9999);
$filepath = "uploads/a".$rando.".jpg";
file_put_contents($filepath,$data);  
echo "<img src='".$filepath."'>";
?>
