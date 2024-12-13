<?php
include("connection.php");

$catImgAddress = 'img/categories/';
$prodImgAddress = 'img/products/';

if(isset($_POST['AddCategory'])){
    $name = $_POST['catName'];
    $imageName = $_FILES['catImage']['name'];
    $imageObject = $_FILES['catImage']['tmp_name'];
    $extension = pathinfo($imageName, PATHINFO_EXTENSION);
    $pathDirectory = 'img/categories/'.$imageName;
    if ($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "webp") {
if(move_uploaded_file($imageObject, $pathDirectory)){
    $query = $pdo ->prepare("insert into categories(name, image) values (:pn, :pimg)");
    $query -> bindParam("pn", $name);
    $query -> bindParam("pimg", $imageName);
    $query -> execute();
    echo "<script>alert('data submitted successfully');</script>";
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;

}
}else{
    echo "<script>alert('invalid file type use only jpeg,png,jpg or webp');</script>";
}
}




//update categories
if(isset($_POST['UpdateCategory'])){
    $name = $_POST['catName'];
    $id = $_POST['catId'];
    if(!empty($_FILES['catImage']['name'])){
        $imageName = $_FILES['catImage']['name'];
        $imageObject = $_FILES['catImage']['tmp_name'];
        $extension = pathinfo($imageName, PATHINFO_EXTENSION);
        $pathDirectory = 'img/categories/'.$imageName;
        if ($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "webp") {
    if(move_uploaded_file($imageObject, $pathDirectory)){
        $query = $pdo ->prepare("update categories set name = :catName, image = :catImage where id = :catId");
        $query -> bindParam("catId", $id);
        $query -> bindParam("catName", $name);
        $query -> bindParam("catImage", $imageName);
        $query -> execute();
        echo "<script>alert('data updated successfully');</script>";
        // header("Location: " . $_SERVER['PHP_SELF']);
        // exit;
    
    }
    }else{
        echo "<script>alert('invalid file type use only jpeg,png,jpg or webp');</script>";
    }
    }else{
        $query = $pdo ->prepare("update categories set name = :catName where id = :catId");
        $query -> bindParam("catId", $id);
        $query -> bindParam("catName", $name);
        $query -> execute();
        echo "<script>alert('data updated successfully');</script>";
    }
}


//delete categories


if(isset($_POST['deleteCategory'])){
    $id = $_POST['catId'];
    $query = $pdo ->prepare("delete from categories where id = :catId");
    $query -> bindParam("catId", $id);
    $query -> execute();
    echo "<script>alert('data deleted successfully');</script>";
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}


//add products
if(isset($_POST['AddProduct'])){

    $prodName = $_POST['prodName'];
    $prodPrice = $_POST['prodPrice'];
    $prodQuantity = $_POST['prodQuantity'];
    $prodCatId = $_POST['prodCatId'];
    $prodDesc = $_POST['prodDesc'];
    $prodImage = $_FILES['prodImage']['name'];
    $prodTmpName = $_FILES['prodImage']['tmp_name'];
    $extension = pathinfo($prodImage, PATHINFO_EXTENSION);
    $PathAddress = 'img/products/'.$prodImage; 
    if ($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "webp") {
        if(move_uploaded_file($prodTmpName, $PathAddress)){
            $query = $pdo ->prepare("insert into products(product_name, product_image,product_quantity,product_price,product_desc,product_category_name) values (:pn, :pi, :pq, :pp, :pd, :pcn)");
            $query -> bindParam("pn", $prodName);
            $query -> bindParam("pi", $prodImage);
            $query -> bindParam("pq", $prodQuantity);
            $query -> bindParam("pp", $prodPrice);
            $query -> bindParam("pd", $prodDesc);
            $query -> bindParam("pcn", $prodCatId);
            $query -> execute();
            echo "<script>alert('Product submitted successfully');</script>";
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        
        }else{
            echo "<script>alert('Something is wrong');</script>";
        }
        }else{
            echo "<script>alert('Error!');</script>";
        }
}
        
        







//delete categories


if(isset($_POST['deleteProduct'])){
    $productId = $_POST['prodId'];
    $query = $pdo ->prepare("delete from products where product_id = :proId");
    $query -> bindParam("proId", $productId);
    $query -> execute();
    echo "<script>alert('product deleted successfully');</script>";
 header("Location: " . $_SERVER['PHP_SELF']);
            exit;
}


?>