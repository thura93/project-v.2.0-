<?php 
    $page = "Users";
    include("layouts/header.php");

    include("layouts/navbar.php");

    include("vendor/autoload.php");

    use Libs\Database\MySQL;
    use Libs\Database\UsersTable;
    use Helpers\Auth;

    $table  = new UsersTable(new MySQL);
    $users = $table->getAll();

    Auth::check();


?>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-sm-12 bg-dark text-info p-3 rounded">
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <h3><strong>User List <span class="badge bg-danger"><?= count($users) ?></span></strong></h3>
                    </div>
                    <div class="col-sm-6">
                        <a href="users-create.php" class="btn btn-primary float-end"> <i class="fa fa-user-plus"></i> Create </a>
                    </div>
                </div>
                <div class="table-responsive" style="height: 490px;">              
                    <table class="table table-hover table-dark">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Photo</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty($users)) : ?>
                                <tr>
                                    <td colspan="6">Users not found.</td>
                                </tr>
                            <?php else : ?>
                                <?php foreach($users as $user): ?>
                                    <tr>
                                        <td><?= $user->id; ?></td>
                                        <td>
                                            <?php if($user->photo == false) :?>
                                                <img src="img/150-1503945_transparent-user-png-default-user-image-png-png.png" width="50" alt="">
                                            <?php else : ?>
                                                <img src="_actions/photos/<?= $user->photo ?>" width="50" alt="">
                                            <?php endif; ?>
                                        </td>
                                        <td><?= htmlspecialchars($user->name) ?></td>
                                        <td><?= $user->email; ?></td>
                                        <td><?= $user->phone; ?></td>
                                        <td><?= $user->address; ?></td>
                                        <td>
                                            <?php if($user->role_id == 1) : ?>
                                                <span class="badge bg-secondary"><?= $user->rolename; ?></span>
                                            <?php elseif($user->role_id == 2) : ?>
                                                <span class="badge bg-info"><?= $user->rolename; ?></span>
                                            <?php elseif($user->role_id == 3) : ?>
                                                <span class="badge bg-primary"><?= $user->rolename; ?></span>
                                            <?php elseif($user->role_id == 4) : ?>
                                                <span class="badge bg-success"><?= $user->rolename; ?></span>
                                            <?php else : ?>
                                                <span class="badge bg-success"><?= $user->rolename; ?></span>
                                            <?php endif; ?>                                            
                                        </td>
                                        <td>
                                            <div class="btn-group dorpdown">
                                                <a href="" class="btn btn-sm btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown">Change Role</a>
                                                <div class="dropdown-menu dropdown-menu-dark">
                                                    <a href="_actions/role.php?id=<?= $user->id ?>&role=1" class="dropdown-item">User</a>
                                                    <a href="_actions/role.php?id=<?= $user->id ?>&role=2" class="dropdown-item">Staff</a>
                                                    <a href="_actions/role.php?id=<?= $user->id ?>&role=3" class="dropdown-item">Author</a>
                                                    <a href="_actions/role.php?id=<?= $user->id ?>&role=4" class="dropdown-item">Manager</a>
                                                    <a href="_actions/role.php?id=<?= $user->id ?>&role=5" class="dropdown-item">Admin</a>
                                                </div>
                                            </div>
                                            <?php if($user->suspended == 1) : ?>
                                                <a href="_actions/unsuspend.php?id=<?= $user->id ?>" class="btn btn-outline-warning btn-sm mb-1">Supspended</a>
                                            <?php else : ?>
                                                <a href="_actions/suspend.php?id=<?= $user->id ?>" class="btn btn-outline-success btn-sm mb-1">Active</a>
                                            <?php endif; ?>
                                            
                                            <?php if($user->id !== $auth->id) : ?>
                                                <a href="_actions/delete.php?id=<?= $user->id ?>&&photo=<?= $user->photo ?>" onclick="return confirm('Are you sure?')" class="btn btn-outline-danger  btn-sm"><i class="fa fa-trash"></i> Del</a>
                                            <?php endif; ?>
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
