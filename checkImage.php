<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "image_wrap";
$tableName = "user";

$connection = new mysqli($host,$username,$password,$database);

if($connection->connect_error){
    die("Connection failed : ".$connection->connection_error);
}else{
    //echo("Sucessfully Connected");
}
$no=rand();
if(isset($_POST['code'])){
    $image_fb=$_POST["image_fb"];
    $codePost=$_POST['code'];
    $codePost = str_replace(' ','',$codePost);

    $codePost_id=explode("`",$codePost);
    $sql_1= "SELECT id,image FROM user";
    $result = $connection->query($sql_1);

    if ($result->num_rows>0){
        // output data of each row
        while($row = $result->fetch_assoc()){
            if($codePost_id[0]==$row["id"]){
                $image_png="".$row["image"]."";
                

                $png = imagecreatefrompng($image_png);
                $jpeg = imagecreatefromjpeg($image_fb);

                list($width, $height) = getimagesize($image_fb);
                list($newwidth, $newheight) = getimagesize($image_png);
                $out = imagecreatetruecolor($newwidth, $newheight);
                imagecopyresampled($out, $jpeg, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                imagecopyresampled($out, $png, 0, 0, 0, 0, $newwidth, $newheight, $newwidth, $newheight);
                imagejpeg($out, 'out/'.$no.'.jpg', 100);
                echo 'out/'.$no.'.jpg';
            }
        }
    }else{
        echo $image_fb;
    }
}


?>