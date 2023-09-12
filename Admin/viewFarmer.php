<?php 
// include('../config.php');
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
                        $farmer_id = $_GET['id'];
                        $query = "SELECT * FROM farmer1 WHERE id=:far_id LIMIT 1";
                        $statement = $pdo->prepare($query);
                        $data = 
                        [
                            ':far_id' => $farmer_id

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
                            <div class="card mb-4">
                            
                                <div class="card-body text-center rounded-right ">
                                    <img src="assets/profile-placeholder.jpg" alt="" class="rounded-circle img-fluid" style="width: 150px;">
                                    <!-- <input disabled type="profile_photo" name="profile_photo" class="form-control" id="profile_photo" value="<?=$result->profile_photo; ?>"> -->
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark mb-0">FARMER ID:</p>
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
                                <p class="text-dark mb-0">FIRST NAME:</p>
                            </div>
                            <div class="col-sm-9">
                                <input disabled type="name" name="name" class="form-control text-muted" id="name" value="<?=$result->name; ?>">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark mb-0">MIDDLE NAME:</p>
                            </div>
                            <div class="col-sm-9">
                            <input disabled type="middleName" name="middleName" class="form-control text-muted" id="middleName" value="<?=$result->middleName; ?>">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark mb-0">LAST NAME:</p>
                            </div>
                            <div class="col-sm-9">
                            <input disabled type="surname" name="surname" class="form-control text-muted" id="surname" value="<?=$result->surname; ?>">
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
                                <p class="text-dark mb-0">GENDER:</p>
                            </div>
                            <div class="col-sm-9">
                                <input disabled type="gender" name="gender" class="form-control text-muted" id="gender" value="<?=$result->gender; ?>">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark mb-0">AGE:</p>
                            </div>
                            <div class="col-sm-9">
                                <input disabled type="age" name="age" class="form-control text-muted" id="age" value="<?=$result->age; ?>">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark mb-0">BIRTHDAY:</p>
                            </div>
                            <div class="col-sm-9">
                                <input disabled type="birthday" name="birthday" class="form-control text-muted" id="birthday" value="<?=$result->birthday; ?>">
                            </div>
                        </div>
                        <hr>
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
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark mb-0">CROPS:</p>
                            </div>
                            <div class="col-sm-9">
                                <input disabled type="crops" name="crops" class="form-control text-muted" id="crops" value="<?=$result->crops; ?>">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark mb-0">ACCOUNT CREATED:</p>
                            </div>
                            <div class="col-sm-9">
                                <input disabled type="dateCreated" name="dateCreated" class="form-control text-muted" id="dateCreated" value="<?=$result->dateCreated; ?>">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light"><a href="farmerprofile.php"><i class="fas fa-angle-left fa-lg text-dark-100"></i> Back</button>
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