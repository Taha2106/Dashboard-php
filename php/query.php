<?php
include("connection.php");

$catImgAddress = 'img/categories/';

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
    // header("Location: " . $_SERVER['PHP_SELF']);
    // exit;

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

}











?>