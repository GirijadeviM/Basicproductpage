
<?php 
define('SERVER', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'ecommerce');



function dbConnect(){
    $mysqli = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE);
    if($mysqli->connect_errno != 0){
       return FALSE;
    }else{
       return $mysqli;
    }
 }

function getProductsByCategory($brand){
    $mysqli = dbConnect();
    $stmt = $mysqli->prepare("SELECT * FROM mobilephone WHERE brand = ?");
    $stmt->bind_param("s", $brand);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_all(MYSQLI_ASSOC);
    if(count($data) == 0){
       header("Location: index.php");
       exit();
    }else{
       return $data;
    }
 }
 function getHomePageProducts($int){
     $mysqli = dbConnect();
    $result = $mysqli->query("SELECT * FROM mobilephone ORDER BY rand() LIMIT $int");
    while ($row = $result->fetch_assoc()){
       $data[] = $row;
    }
    return $data;
 }
 

 function getProductByTitle($title){
    $mysqli = dbConnect();
    $stmt = $mysqli->prepare("SELECT * FROM mobilephone WHERE product_name = ?");
    $stmt->bind_param("s", $title);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_all(MYSQLI_ASSOC);
   
       return $data;
  
 }
 function getCategories(){
    $mysqli = dbConnect();
    $result = $mysqli->query("SELECT DISTINCT brand FROM mobilephone");
    while ($row = $result->fetch_assoc()) {
       $data[] = $row;
    }
    return $data;
 }
 
 ?>