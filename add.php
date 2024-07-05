<?php
 include("db.php");
?>
<?php

$username= $password= $email=$phone="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = $_POST["name"];
    $price = $_POST["price"];
    $brand = $_POST["brand"];
    $image = $_POST["image"];
    $status="Completed";
    $description = $_POST["des"];

        $mysqli = dbConnect();
        $result = $mysqli->query("INSERT INTO mobilephone(product_name,price,brand,image,description,status) VALUES('$username','$price','$brand','$image','$description','$status')");    
         header("Location: index.php");
        mysqli_close($conn);
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="Stylesheet" href="add.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
</head>
<body>

    <div class="signin">
    <div class="form">
    <h1 class="head">Add Products</h1>
  
           
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
    Productname:<br> <input type="text" name="name" size="30"  value=""><br>
  
  
 price<br>
<input type="text" name="price" size="30"  value=""><br>
<label>brand</label><br>
<input type="text" name="brand" size="30"  value=""><br>
<label>Image</label><br>
<input type="text" name="image" size="30" value=""><br>
<label>Description</label><br>
<input type="text" name="des" size="30" value=""><br>
<input type="submit"id="button" value="Add"> <br>
</form>
</div>
</div>

</body>
</html>
