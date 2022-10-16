<?php 
    $page = "Category Edit";
    include("layouts/header.php");

    include("layouts/navbar.php");

    include("vendor/autoload.php");

    use Libs\Database\MySQL;
    use Libs\Database\CategoryTable;
    use Helpers\Auth;

    if(isset($_POST['search'])){
        $search = $_POST['search'];
        $table  = new CategoryTable(new MySQL);
        $categories = $table->search($search);
    }else{
        $table  = new CategoryTable(new MySQL);
        $categories = $table->getAll();
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $table = new CategoryTable(new MySQL());
        $category = $table->edit($id);
    }

    

    Auth::check();


?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-4 text-info rounded p-2 bg-dark" style="border-right: 2px solid #fff;">
                <div class="row mb-2 p-4">
                    <div class="col-sm-12">
                        <h3 class="text-center"><strong>' <?= $category->name ?> ' Edit</strong></h3>
                    </div>
                </div>
                
                <div class="mt-3 p-3 text-white">              
                    <form action="_actions/category-update.php" method="POST">
                        <input type="hidden" name="id" value="<?= $category->id ?>">
                        <div class="form-group mb-3">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="name">Category Name</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" value="<?= $category->name ?>" name="name" class="form-control" placeholder="Enter Category name..." required>
                                </div>
                            </div>                        
                        </div>
                        <button type="submit" class="btn btn-outline-success float-end mb-5"><i class="fa fa-save"></i> Update</button>
                    </form>
                </div>
            </div>
            <div class="col-sm-8 bg-dark text-info p-3 rounded" style="border-left: 2px solid #fff;">
                <div class="row mb-3 p-3">
                    <div class="col-sm-8">
                        <h3><strong>Category List <span class="badge bg-danger"><?= count($categories) ?></span></strong></h3>
                    </div>
                    <div class="col-sm-4">
                        <form method="POST" action="categories.php" class="d-flex" role="search">
                            <?php if(isset($search)) : ?>
                                <input class="form-control me-1" value="<?= $search; ?>" name="search" type="search" placeholder="Search..." aria-label="Search">
                            <?php else : ?>
                                <input class="form-control me-1" value="" name="search" type="search" placeholder="Search..." aria-label="Search">
                            <?php endif; ?>
                            <button class="btn btn-outline-success" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
                
                <div class="table-responsive p-3" style="height: 460px; overflow: auto">              
                    <table class="table table-hover table-dark">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Created Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty($categories)) : ?>
                                <tr>
                                    <td colspan="6">Category not found.</td>
                                </tr>
                            <?php else : ?>
                                <?php foreach($categories as $category): ?>
                                    <tr>
                                        <td><?= $category->id; ?></td>
                                        <td><?= $category->name; ?></td>
                                        <td><?= $category->created_at; ?></td>
                                        <td>
                                            <a href="category-edit.php?id=<?= $category->id ?>" class="btn btn-outline-warning btn-sm mb-1"><i class="fa fa-edit"></i></a>
                                            <a href="category-delete.php?id=<?= $category->id ?>" onclick="return confirm('Are you sure?')" class="btn btn-outline-danger  btn-sm"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 
<?php
    include("layouts/footer-bar.php");
    include("layouts/footer.php"); 
?>
    
