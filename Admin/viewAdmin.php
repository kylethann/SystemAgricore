<?php
include('includes/header.php');

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- <meta charset="UTF-8">
        <title>Account Set-Up</title>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css'> -->
        <link rel="stylesheet" href="css/tblEdit.css">
        
    </head>
   
    <body>
        <div class="container">
            <div class="col-lg-13 ">
                

                <?php
                    if(isset($_GET['id']))
                                                    
                    {
                        $admin_id = $_GET['id'];
                        // $student_id = $_GET['id'];

                        $query = "SELECT * FROM admin WHERE id=:adm_id LIMIT 1";
                        $statement = $pdo->prepare($query);
                        $data = [

                            ':adm_id' => $admin_id

                        ];

                        $statement->execute($data);
                        $result = $statement->fetch(PDO::FETCH_OBJ);
                    }

                ?>
                <!-- <form class="requires-validation" novalidate> <input type="hidden" name="farmer_id"  value="<?=$result->id?>"> -->
                <div class="card mb-4 ">
                    <div class="card-body">
                    <h5 class="my-3 text-dark text-center">PERSONAL INFORMATION</h5> 
                        <div class="col-sm-3 right">
                            <div class="profile-photo-container" style="margin-bottom: 2rem;">
                                <picture class="profile-picture">
                                <img src="<?= ($result->Profile_Photo) ? ($result->Profile_Photo) : "../Admin/stock-photo.jpg" ?>" alt="" class="" style="width: 300px; border-radius: .25rem;">
                                </picture>
                            </div>
                            </div> 
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark mb-0">ADMIN ID:</p>
                            </div>
                            <div class="col-sm-9">
                                <input disabled type="id" name="id" class="form-control" id="id" value="<?=$result->id; ?>">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark mb-0">USERNAME:</p>
                            </div>
                            <div class="col-sm-9">
                                <input disabled type="username" name="username" class="form-control text-muted" id="username" value="<?=$result->username; ?>">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark mb-0">FULLNAME:</p>
                            </div>
                            <div class="col-sm-9">
                                <input disabled type="name" name="name" class="form-control text-muted" id="name" value="<?=$result->fullName; ?>">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark mb-0">EMAIL:</p>
                            </div>
                            <div class="col-sm-9">
                                <input disabled type="email" name="email" class="form-control text-muted" id="name" value="<?=$result->email; ?>">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark mb-0">ACCOUNT CREATED:</p>
                            </div>
                            <div class="col-sm-9">
                                <input disabled type="DateCreated" name="DateCreated" class="form-control text-muted" id="DateCreated" value="<?=$result->DateCreated; ?>">
                            </div>
                        </div>
                        <!-- <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark mb-0">ADDRESS:</p>
                            </div>
                            <div class="col-sm-9">
                                <input disabled type="address" name="address" class="form-control text-muted" id="address" value="<?=$result->address; ?>">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark mb-0">CONTACT NUMBER:</p>
                            </div>
                            <div class="col-sm-9">
                                <input disabled type="contactNumber" name="contactNumber" class="form-control text-muted" id="contactNumber" value="<?=$result->contactNumber; ?>">
                            </div>
                        </div> -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light"><a href="users.php"><i class="fas fa-angle-left fa-lg text-dark-100"></i> Back</button>
                            <!-- <a href="editFarmer.php?id=<?= $farmer['id']?>" class="btn btn-warning">Edit</a>
                            <button type="button" class="btn btn-warning"><a href="editFarmer.php">Edit</button> -->
                        </div>
                        <!-- <hr> -->
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>



<?php
include('includes/footer.php')
?>