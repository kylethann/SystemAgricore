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
                        $client_id = $_GET['id'];

                        $query = "SELECT * FROM customer WHERE id=:cus_id LIMIT 1";
                        $statement = $pdo->prepare($query);
                        $data = [

                            ':cus_id' => $client_id

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
                                <p class="text-dark mb-0">CLIENT ID:</p>
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
                                <input disabled type="full_name" name="full_name" class="form-control text-muted" id="full_name" value="<?=$result->full_name; ?>">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark mb-0">MIDDLE NAME:</p>
                            </div>
                            <div class="col-sm-9">
                            <input disabled type="middle_name" name="middle_name" class="form-control text-muted" id="middle_name" value="<?=$result->middle_name; ?>">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark mb-0">LAST NAME:</p>
                            </div>
                            <div class="col-sm-9">
                            <input disabled type="last_name" name="last_name" class="form-control text-muted" id="last_name" value="<?=$result->last_name; ?>">
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
                            <input disabled type="contact_number" name="contact_number" class="form-control text-muted" id="contact_number" value="<?=$result->contact_number; ?>">
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