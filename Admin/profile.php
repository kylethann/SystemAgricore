<?php 
include('../config.php');
include('includes/header.php');

$adminData = fetchAdmins($pdo);


$user = $_SESSION['id'];
 
$query1 = "SELECT * FROM admin WHERE id=:user LIMIT 1";
$statement = $pdo->prepare($query1);
$data = [

':user'=> $user

];

$statement->execute($data);

$res = $statement->fetch(PDO::FETCH_OBJ);

?>

<main class="mt-5 pt-3">
  <div class="container-fluid p-4">
    <?php if (isset($_SESSION['flash_message'])) : ?>
      <div class="alert alert-<?= $_SESSION['alert'] ?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['flash_message'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php
      unset($_SESSION['flash_message']);
      unset($_SESSION['alert']);
    endif;
    ?>
    <style>
      .img-profile {
      border-radius: .25rem;
      object-fit: cover;
      height: 250px;
      width: px; 
      }

      .image_area {
		  position: relative;
		}

		img {
		  	display: block;
		  	max-width: 100%;
		}

		.preview {
  			overflow: hidden;
  			width: 160px; 
  			height: 160px;
  			margin: 10px;
  			border: 1px solid red;
		}

		.modal-lg{
  			max-width: 1000px !important;
		}

		.overlay {
		  position: absolute;
		  bottom: 10px;
		  left: 0;
		  right: 0;
		  background-color: rgba(255, 255, 255, 0.5);
		  overflow: hidden;
		  height: 0;
		  transition: .5s ease;
		  width: 100%;
		}

		.image_area:hover .overlay {
		  height: 50%;
		  cursor: pointer;
		}

		.text {
		  color: #333;
		  font-size: 20px;
		  position: absolute;
		  top: 50%;
		  left: 50%;
		  -webkit-transform: translate(-50%, -50%);
		  -ms-transform: translate(-50%, -50%);
		  transform: translate(-50%, -50%);
		  text-align: center;
		}
		
    </style>
    <!-- Change password Modal -->
    <div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
      <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
          <header class="modal__header">
            <h2 class="modal__title" id="modal-1-title">Change your Password</h2>
            <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
          </header>
          <form action="../databaseHandlers/user_passwordUpdate.php" method="post">
            <div class="modal__content" id="modal-1-content">
              <input type="password" class="input-control gray" placeholder="Enter your current password." name="old_password">
              <input type="password" class="input-control gray" placeholder="Enter new password." name="new_password">
              <input type="password" class="input-control gray" placeholder="Repeat new password." name="repeat_new_password">
            </div>
            <div class="modal__footer">
              <button class="modal__btn modal__btn-primary">Save Changes</button>
              <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">
                Close
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Photo Modal -->
    <div class="modal fade" id="profileModal" tabindex="-3" aria-labelledby="profileModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="profileModalLabel">Profile Photo</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="../databaseHandlers/updatePhoto.php" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <input required class="form-control" type="file" id="photo" name="photo">
              <input type="hidden" id="cropped-photo" name="cropped-photo" value="">
              <!-- <input type="text" hidden name="oldPhoto" value="<?= $userData['profile_photo'] ?>"> -->
              <!-- <input type="text" hidden name="oldPhoto" value="<?= $res->Profile_Photo;?>"> -->
            </div>
            <div class="modal-footer">
              <button type="button" id="close-btn" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Upload</button>
            </div>
          </form>
        </div>
      </div> 
    </div> 

    <!-- TEMP -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
			  	<div class="modal-dialog modal-lg" role="document">
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<h5 class="modal-title">Crop Image Before Upload</h5>
			        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          			<span aria-hidden="true">×</span>
			        		</button>
			      		</div>
			      		<div class="modal-body">
			        		<div class="img-container">
			            		<div class="row">
			                		<div class="col-md-8">
			                    		<img src="" id="sample_image" />
			                		</div>
			                		<div class="col-md-4">
			                    		<div class="preview"></div>
			                		</div>
			            		</div>
			        		</div>
			      		</div>
			      		<div class="modal-footer">
			      			<button type="button" id="crop" class="btn btn-primary">Crop</button>
			        		<button type="button" class="btn btn-secondary" id="cancel-btn" data-dismiss="modal">Cancel</button>
			      		</div>
			    	</div>
			  	</div>
			</div>			

    <!-- <div class="modal fade" id="profileModal" tabindex="-3" aria-labelledby="profileModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="profileModalLabel">Profile Photo</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="../databaseHandlers/updatePhotoORIG.php" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
            <input type="text" name="oldPhoto" value="<?= $res->Profile_Photo; ?>" hidden>
            <input type="file" class="input-control" id="change-dp-input" name="photo">
              <input type="file" name="photo" accept="image/*">
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" name="upload" value="Upload">
              </div>
          </form> 
        </div>
      </div>
    </div> -->

    <!-- <input type="file" naem="image" class="box" accept="jpg, png, jpeg" onchange="previewImage(event)" style="margin-left: 20%;"> -->
    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">EDIT ACCOUNT INFORMATION</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="../databaseHandlers/user_adminUpdate.php" method="post">
            <div class="modal-body">
              <input required type="number" name="id" hidden value="<?= $_SESSION['id'] ?>">
              <input required type="text" name="role" hidden value="<?= $_SESSION['role'] ?>">
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input required type="username" name="username" class="form-control" id="username" placeholder="Username" value="<?= $res->username; ?>">
              </div>
              <div class="mb-3">
                <label for="full_name" class="form-label">Full Name</label>
                <input required type="fullName" name="fullName" class="form-control" id="fullName" placeholder="Enter Full Name" value="<?= $res->fullName; ?>">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input required type="email" name="email" class="form-control" id="email" placeholder="name@example.com" value="<?= $res->email; ?>">
              </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="update" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </form>
            <!-- </div> -->
        </div>
      </div>
      <div class="container-fluid bg-light">
      <h3 class="my-3 text-dark text-center">USER INFORMATION</h3> 
        <div class="row">
          <div class="col-lg-4"> 
            <div class="card mb-4">
              <div class="card-body text-center rounded-left "  style="background-color: #ffff; display: grid; justify-content: center;">
              <img src= <?= ($res->Profile_Photo) ? ($res->Profile_Photo) : "../Admin/stock-photo.jpg" ?> alt="" class="img-profile">
                  <br>
                  <p class="my-3"></p>
                  <h5 class="text-muted mb-1"><?= $res->fullName; ?></h5>
                  <h4 class="my-3">Admin</h4>
                  <!-- Photo modal -->
                  <div class="d-flex justify-content-center mb-2">
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#profileModal">
                      Change Profile 
                    </button>
                  </div>
                </div>
              </div>
              <div class="card mb-4 mb-lg-0">
                    <div class="card-body p-0"> </div>
                </div>
              </div>
              <div class="col-lg-8 ">
                <div class="card mb-4 ">
                  <div class="card-body">
                  <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0">ADMIN NUMBER</p>
                      </div>
                      <div class="col-sm-9">
                        <input disabled type="id" name="id" class="form-control text-muted" id="id" value="<?= $res->id; ?>">
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0">USERNAME</p>
                      </div>
                      <div class="col-sm-9">
                        <input disabled type="username" name="username" class="form-control text-muted" id="username" value="<?= $res->username; ?>">
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0">FULLNAME</p>
                      </div>
                      <div class="col-sm-9">
                        <input disabled type="name" name="name" class="form-control text-muted" id="name" value="<?=$res->fullName; ?>">
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0">EMAIL</p>
                      </div>
                      <div class="col-sm-9">
                        <input disabled type="email" name="email" class="form-control text-muted" id="name" value="<?=$res->email; ?>">
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0">ACCOUNT CREATED</p>
                      </div>
                      <div class="col-sm-9">
                        <input disabled type="DateCreated" name="DateCreated" class="form-control text-muted" id="DateCreated" value="<?=$res->DateCreated; ?>">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-primary ms-3 left" data-bs-toggle="modal" data-bs-target="#editModal">
                        Edit Personal Information
                      </button>
                      <button type="button" class="btn btn-outline-primary ms-3" id="change-dp-btn" data-custom-open="modal-1">
                        Change Password
                      </button>
                    <div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
  </div>
</main>


<script>

$(document).ready(function(){
  
	var $modal = $('#modal');
  var $profileModal = $('#profileModal')
	var image = document.getElementById('sample_image');

	var cropper;

  $("#cancel-btn, #close-btn").on('click', () => {
    $profileModal.modal('hide');
    $modal.modal('hide');
    $('#photo').val('');
});

	$('#photo').change(function(event){
		var files = event.target.files;

		var done = function(url){
			image.src = url;
			$modal.modal('show');
		};

		if(files && files.length > 0)
		{
			reader = new FileReader();
			reader.onload = function(event)
			{
				done(reader.result);
			};
			reader.readAsDataURL(files[0]);
		}
	});

	$modal.on('shown.bs.modal', function() {
		cropper = new Cropper(image, {
			aspectRatio: 1,
			viewMode: 3,
			preview:'.preview'
		});
	}).on('hidden.bs.modal', function(){
		cropper.destroy();
   		cropper = null;
	});

	$('#crop').click(function(){
		canvas = cropper.getCroppedCanvas({
			width:400,
			height:400
		});

		canvas.toBlob(function(blob){
			url = URL.createObjectURL(blob);
			var reader = new FileReader();
			reader.readAsDataURL(blob);
			reader.onloadend = function(){
				var base64data = reader.result;
				$.ajax({
					url:'cropped.php',
					method:'POST',
					data:{image:base64data},
					success:function(data)
					{
						$modal.modal('hide');
            $("#cropped-photo").val(data)
					}
				});
			};
		});
	});
	
});
</script>


<?php
    include('includes/footer.php')
 ?>