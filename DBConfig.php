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

$username=$_POST['username'];
$code="";

if($username!=""){
if($_FILES['fileInput']['name']!=""){
    $extention= end(explode(".",$_FILES["fileInput"]["name"]));
    //lowercase extention
    $extention=strtolower($extention);
    $allowed_type=array("png","jpg","jpeg");
    if(in_array($extention,$allowed_type)){
        $new_name=rand().".".$extention;
        $location="profPic";
        if(is_dir($location)==false){
            mkdir("$location", 0700);// Create directory if it does not exist
        }else{
            $path="profPic/".$new_name;
            if(move_uploaded_file($_FILES['fileInput']['tmp_name'],$path)){
                $sql = "INSERT INTO user(name,image) VALUES ('$username','$path')";
                if(mysqli_query($connection,$sql)){
                    //echo "Successfully added to databse";
                    echo "".$path."~";
                    
                    $sql_1= "SELECT * FROM user ORDER BY id DESC LIMIT 1;";
                    $result = $connection->query($sql_1);

                    if ($result->num_rows!= 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            $code= "". $row["id"]. "`name:" . $row["name"]. " image:" . $row["image"]."~";
                            
                        }
                    } else {
                        echo "0 results";
                    }
                    }else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
                }
            }
        }
        
        
    }else{
        echo "<script>'Please insert a png,jpg or jpeg file'</script>";
    }
}else{
    echo '<script>alert("please Insert a file)"</script>';
}
}else{
    echo "<script>alert('Enter a Username')</script>";
}
echo $code;
?>