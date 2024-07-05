<?php
include("db.php");
$username= $password= $email=$phone="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = $_POST["name"];
    $price = $_POST["price"];
    $brand = $_POST["brand"];
    $image = $_POST["image"];
    $description = $_POST["des"];

        $mysqli = dbConnect();
        $result = $mysqli->query("update mobilephone SET price='$price',brand='$brand',image='$image',description='$description' where product_name='$username'");        
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
    <h1 class="head">Edit Product</h1>
<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
   <label> Productname:</label><br> 
    <input type="text" name="name" size="30"  value=""><br>
 <label>Price:</lqbel><br>
<input type="text" name="price" size="30"  value=""><br>
<label>Brand:</label><br>
<input type="text" name="brand" size="30"  value=""><br>
<label>Image:</label><br>
<input type="text" name="image" size="30" value=""><br>
<label>Description:</label><br>
<input type="text" name="des" size="30" value=""><br>
<input type="submit"id="button" value="Edit"> <br>
</form>
</body>
</html>