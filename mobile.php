<?php
include("db.php");
if(isset($_GET['title'])){
    $cat=urldecode($_GET['title']);
    $product=getProductByTitle($cat);
}
?>
<?php
if(isset($_GET['remove'])){
    $remove_name = $_GET['remove'];
   $mysqli = dbConnect(); 
   $result=$mysqli->query( "DELETE FROM `mobilephone` WHERE product_name= '$remove_name'");
   header("Location: index.php");
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        main .right .product{
    display: grid;
     grid-template-columns: auto 1fr;
    grid-column-gap: 50px;
    grid-row-gap: 50px;
 }
 /* main .right .product-left{} */
 main .right .product-left img{
    height: 150px;
    display: block;
    margin: 0 auto;
 }
 /* main .right .product-right{} */
 main .right .product-right .title{
    font-weight: bold;
    font-size: 18px;
 }
 main .right .product-right .title a{
    text-decoration: none;
    color: #555;
    line-height: 26px;
 }
 main .right .product-right .title a:hover{
    text-decoration: underline;
 }
 main .right .product-right .description{
    margin-top: 10px;
 }
 main .right .product-right .price{
    font-size: 24px;
    margin-top: 30px;
    color: darkred;
 }
 main .right .product-right button{
    display: block;
    border: none;
    font-size: 18px;
    padding: 10px 30px;
    margin-top: 50px;
    border: thin solid #d4d4d4;
 }
 .delete-btn,.delete-btn-edit{
    padding:10px;
    text-decoration:none;
    color:white;
    border:1px solid black;
    background-color:black;
    border-radius:20px;
 }
.delete-btn-edit
  {
    padding:10px 20px 10px 20px;
  }
        </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include("navigation.php") ;
    include("headerp.php");
    ?>
    <main>
    <div class="left"> 
      <div class="section-title"> MobilePhone Brands</div>
      <?php $brands = getCategories() ?>
      <?php
         foreach ($brands as $brand) {
            ?>
               <a href="brand.php?category=<?php echo $brand['brand'] ?>"><?php echo ucfirst($brand['brand']) ?></a>
            <?php
         }
      ?>
   </div>
   <div class="right"> <!-- Displaying the products -->
   <div class="section-title">mobile phone</div>
  
   <div class="product">
      
               <div class="product-left">
                  <img src="<?php echo "mobiles /{$product[0]['image']}" ?>" alt="image">
               </div>
               <div class="product-right">
                  <p class="title">
                     
                     <?php echo $product[0]['product_name'] ?>  
                     <p class="description"><?php echo $product[0]['description']?></p>  
                   
                     </a>
                  </p>
<?php echo "RS.".$product[0]['price'];?><br><br>
<form action="" method="GET">
<a href="mobile.php ? remove=<?php echo $product[0]['product_name']; ?>" onclick="return confirm('remove Product?')" class="delete-btn"> Remove</a>
<a href="edit.php "class="delete-btn-edit">  Edit</a>
         </form>
               </div>
           
   </div>
</div>
</main>
</body>
</html>
