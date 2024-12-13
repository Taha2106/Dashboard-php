<?php
include("components/header.php")
?>
<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">


    <div class="row bg-light rounded mx-0">
        <div class="col-lg-12">
            <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add Product</button>

        </div>
        <div class="col-md-12 ">
<h3 class = "px-3 py-3">Products</h3>
            <table class="table">
                <thead>
                    <tr>

                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Description</th>
                        <th scope="col">Category Name</th>
                        <th scope="col" colspan = '1'>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php


                    $query = $pdo->query("SELECT products.*, categories.name
FROM products
INNER JOIN categories
ON products.product_category_name = categories.id");
                    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($rows as $keys) {

                    ?>
                        <tr>
                            <th scope="row"><img src="<?php echo $prodImgAddress.$keys['product_image']?>" alt="" width="100px" height='100px'></th>
                            <td><?php echo $keys['product_name']?></td>
                            <td><?php echo $keys['product_price']?></td>
                            <td><?php echo $keys['product_quantity']?></td>
                            <td><?php echo $keys['product_desc']?></td>
                            <td><?php echo $keys['name']?></td>
                            <td><a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalUpdate<?php echo $keys['product_id']?>">Edit</a></td>
                            <td><a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteProduct<?php echo $keys['product_id']?>">Delete</a></td>
                        </tr>

  





<!-- modal delete  -->
<div class="modal fade" id="deleteProduct<?php echo $keys['product_id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                <input type="hidden" name = 'prodId' value = '<?php echo $keys['product_id']?>'>

                    <div class="mb-3">
                        
                    </div>
                   

                    <button type="submit" name="deleteProduct" class="btn btn-primary">Delete Product</button>
                </form>
            </div>

        </div>
    </div>
</div>




                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div> 












<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Name</label>
                        <input type="text" name='prodName' class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Price</label>
                        <input type="number" name='prodPrice' class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Quantity</label>
                        <input type="number" name='prodQuantity' class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Description</label>
                        <textarea class="form-control" name = 'prodDesc' id="largeTextBox" rows="5" placeholder="Type your sentence or paragraph here..."></textarea>
                        <div id="emailHelp" class="form-text">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Product Image</label>
                        <input type="file" name='prodImage' class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Select Product</label>
                    <select class="form-select" name = "prodCatId" aria-label="Default select example">

  <option selected>Open this select menu</option>


  <?php 
  $query = $pdo->query("select * from categories");
  $rows = $query->fetchAll(PDO::FETCH_ASSOC);
  foreach($rows as $keys){
  ?>
  
  <option value="<?php echo $keys['id']?>"><?php echo $keys['name']?></option>
  <?php
  }
  ?>
</select>
</div>
                    <button type="submit" name="AddProduct" class="btn btn-primary">Add Product</button>
                </form>
            </div>

        </div>
    </div>
</div>
<?php
include("components/footer.php")
?>