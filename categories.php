<?php
include("components/header.php")
?>
<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">


    <div class="row bg-light rounded mx-0">
        <div class="col-lg-12">
            <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add Category</button>

        </div>
        <div class="col-md-12 ">
            <h3 px-3 py-3>Categories</h3>
            <table class="table">
                <thead>
                    <tr>

                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php


                    $query = $pdo->query("select * from categories");
                    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($rows as $keys) {

                    ?>
                        <tr>
                            <th scope="row"><img src="<?php echo $catImgAddress . $keys['image']?>" alt="" width="100px" height='100px'></th>
                            <td><?php echo $keys['name']?></td>
                            <td><a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalUpdate<?php echo $keys['id']?>">Edit</a></td>
                            <td><a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete<?php echo $keys['id']?>">Delete</a></td>
                        </tr>

                        <!-- modal update -->
      <div class="modal fade" id="modalUpdate<?php echo $keys['id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name = 'catId' value = '<?php echo $keys['id']?>'>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Category Name</label>
                        <input type="text" name='catName' class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Category Image</label>
                        <input type="file" name='catImage' class="form-control" id="exampleInputPassword1">
                        <img class="mt-3" src="<?php echo $catImgAddress.$keys['image']?>" alt="" width="100px" height="60px">
                    </div>

                    <button type="submit" name="UpdateCategory" class="btn btn-primary">Update Category</button>
                </form>
            </div>

        </div>
    </div>
</div>











<!-- modal delete -->
<div class="modal fade" id="modalDelete<?php echo $keys['id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                <input type="hidden" name = 'catId' value = '<?php echo $keys['id']?>'>

                    <div class="mb-3">
                        
                    </div>
                   

                    <button type="submit" name="deleteCategory" class="btn btn-primary">Delete Category</button>
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
                        <label for="exampleInputEmail1" class="form-label">Category Name</label>
                        <input type="text" name='catName' class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Category Image</label>
                        <input type="file" name='catImage' class="form-control" id="exampleInputPassword1">
                    </div>

                    <button type="submit" name="AddCategory" class="btn btn-primary">Add Category</button>
                </form>
            </div>

        </div>
    </div>
</div>
<?php
include("components/footer.php")
?>