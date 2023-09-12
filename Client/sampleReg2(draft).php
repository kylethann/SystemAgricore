<?php

include '../config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['id'])) {
	header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$fullName = $_POST['fullName'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);


	if ($password == $cpassword) {
		$stmt = $pdo->prepare("SELECT * FROM client WHERE email= ? ");
		$stmt->execute([$email]);
		if (!$stmt->rowCount() > 0) {
			$sql = $pdo->prepare("INSERT INTO client (username, fullName, email, password)
					VALUES (?, ?, ?, ?)");
			$result = $sql->execute([$username, $fullName, $email, $password]);

			if ($result) {
				$stmt = $pdo->prepare("SELECT * FROM client WHERE username = ?");
				$stmt->execute([$username]);
				$res = $stmt->fetch();
				$id = $res['id'];

				logAct('client', $id, "New client: $username added to the system.", $pdo);
				$username = "";
				$fullName = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";

				$_SESSION['flash_message'] = "Account succesfully created!";
				header("Location: ./index.php");
				exit;
			} else {
				$_SESSION['flash_message'] = "Oops! Something went wrong!";
			}
		} else {
			$_SESSION['flash_message'] = "Email already exists!";
		}
	} else {
		$_SESSION['flash_message'] = "Password did not match";
	}
}

?>

<!DOCTYPE html>
<html>

<head>

<style>
	div.background: {
        background: url(bg4.jpg);
        opacity: 06;
    } 
</style>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->

	<link rel="stylesheet" type="text/css" href="../logStyle.css">

	<title>REGISTRATION FORM</title>
</head>

<body>

	<!-- <div class="background">
		<img class="bg"
		src="images/bg4.jpg"
		alt="">
	</div> -->
	<div id="alert"></div>
	<!-- <div class="container-login100" style="background-image: url('images/bg4.jpg');" > -->
	<div class="limit">
	<div class="container">
	<p class="login-text" style="font-size: 2rem; font-weight: 650;">REGISTRATION FORM</p>
		<form action="" method="POST" class="login-email">
	<fieldset id="part1">
			<legend><b> <p class="login-text" style=" text-align: left; font-size: 1.5rem; font-weight: 500;">I. Personal Information</p></b> </legend>
		<fieldset id= "account">
			<legend><b> Farmer Account </b></legend>
			<div class="input-group">
				<input type="text" placeholder="Username" name="Username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="Email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="Password" value="<?php echo $_POST['Password']; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
		</fieldset>
			<fieldset id="user">
				<legend> <b> Complete Information </b></legend>
				<div class="input-group">
					<input type="text" placeholder="Surname" name="Surname" value="<?php echo $surname; ?>" required>
				</div>
				<div class="input-group">
					<input type="text" placeholder="First Name" name="First_Name" value="<?php echo $firstname; ?>" required>
				</div>
				<div class="input-group">
					<input type="text" placeholder="Middle Name" name="Middle_Name" value="<?php echo $middlename; ?>" required>
				</div>
				<div class="input-group">
					<input type="text" placeholder="Extension Name" name="Extension_Name" value="<?php echo $extensioname; ?>" required>
				</div>
            <div class="input-group">
				<input type="text" placeholder="Mobile Number" name="mobile_number" value="<?php echo $mobilenum; ?>" required>
			</div>
            <div class="input-group">
				<input type="text" placeholder="Landline Number" name="landline_number" value="<?php echo $landlinenum; ?>" required>
			</div>
            <div class="input-group">
				<input type="text" placeholder="Birthday" name="birthday" value="<?php echo $birthday; ?>" required>
			</div>
            <div class="input-group">
				<input type="text" placeholder="Place of Birth" name="placeOfbirth" value="<?php echo $pob; ?>" required>
			</div>
			<!-- if no, name of the household head -->
				<!-- relationship: -->

			<!-- no. of living household members -->
				<!-- no. of male -->
				<!-- no. of female -->
            <div class="contact100-form-radio">
                        <p style= "Color: Black"> <b>Gender: </b> 
                        <input type="radio" id="female"  name="gender"> Female
						<input type="radio" id="male" name="gender"> Male<br>
			</div>
			<div class="contact100-form-radio">
                        <p style= "Color: Black"> <b>Civil Status: </b><br>
                        <input type="radio" id="single"  name="cstatus"> Single 
						<input type="radio" id="married"  name="cstatus"> Married 
						<input type="radio" id="widowed" name="cstatus"> Widowed
						<input type="radio" id="seperated"  name="cstatus"> Seperated<br>
			</div>
			<div class="contact100-form-radio">
                        <p style= "Color: Black"> <b>Highest Formal Education: </b> </br>
                        <input type="radio" id="preSchool"  name="HFE"> Pre-School
						<input type="radio" id="elementary"  name="HFE"> Elementary <br>
						<input type="radio" id="highschool" name="HFE"> High School
						<input type="radio" id="juniorHS"  name="HFE"> Junior High School <br>
						<input type="radio" id="college"  name="HFE"> College
						<input type="radio" id="vocational" name="HFE"> Vocational<br>
						<input type="radio" id="postGrad"  name="HFE"> Post Graduate
						<input type="radio" id="none"  name="HFE"> None<br>
			</div>
			<div class="contact100-form-radio">
                        <b><p style= "Color: Black"> With Government ID? </b>
                        <input type="radio" id="yes"  name="governmentID"> Yes
						<input type="radio" id="no" name="governmentID"> No<br>
			</div>
			<!-- if yes, specify ID type -->
				<!-- id number -->
			
			</fieldset>

			<br>
<!-- FARMER PROFILE -->
			<fieldset id="part2">
			<legend> <p class="login-text" style=" text-align: left; font-size: 1.5rem; font-weight: 500;">II. Farmer Profile </p></legend>
				<!-- <p style= "text-align: left">II. FARMER PROFILE</p> </legend> -->
				<div>
				<fieldset id="livelihood">
					<legend><b><p style= "Color: Black"> Main Livelihood </p></b></legend>
					<div class="contact100-form-radio">
                        <input type="radio" id="farmer"  name="mainlivelihood"> Farmer
						<input type="radio" id="fisherfolk"  name="mainlivelihood"> Fisherfolk
						<input type="radio" id="agriyouth"  name="mainlivelihood"> Agri Youth
						<input type="radio" id="fsrmworker/laborer" name="mainlivelihood"> Farmworker/Laborer<br>
					</div>
				</fieldset>
				<fieldset id= "location">
					<legend> <b><p style= "color: black"> Farm Address </p> </b></legend>
						<div class="input-group">
							<input type="text" placeholder="Barangay" id= "barangay" name="barangay" value="<?php echo $barangay; ?>" required>
						</div>
						<div class="input-group">
							<input type="text" placeholder="Municiplaity" id="municipality" name="municipality" value="<?php echo $municipality; ?>" required>
						</div>
						<div class="input-group">
							<input type="text" placeholder="Province" id="province" name="province" value="<?php echo $province; ?>" required>
						</div>
				</fieldset>
				<fieldset id="farmActivity">
					<legend> <b> Type of Farming Activity </b></legend>
					<div>
						<input type="checkbox" id="rice" name="activity" value="activity" >Rice
						<!-- <label input type="checkbox" id="rice" name="activity" value="activity">Rice </label> -->
					</div>
					<div>
						<input type="checkbox" id="rice" name="activity" value="activity" >Corn
						<!-- <label input type="checkbox" id="corn" name="activity" value="activity">Corn </label> -->
					</div>
					<div>
						<input type="checkbox" id="sugarcane" name="activity" value="activity" >Sugarcane
						<!-- <label input type="checkbox" id="rice" name="activity" value="activity">Rice </label> -->
					</div>
					<div>
						<input type="checkbox" id="watermelon" name="activity" value="activity" >Watermelon
						<!-- <label input type="checkbox" id="corn" name="activity" value="activity">Corn </label> -->
					</div>
				</fieldset>
				<fieldset id="association">
					<legend> <b><p style= "Color: Black"> Memeber of any Farmers Asociation/Cooperatives? </p></b></legend>
					<div class="contact100-form-radio">
                        <input type="radio" id="yes"  name="farmerAssoc"> Yes
						<input type="radio" id="no" name="farmerAssoc"> No<br>
					</div>
			<!-- if yes, specify -->
				</fieldset>
				<fieldset id="area">
					<legend> <b><p style= "Color: Black">Total Farm Area (in hectares)</p></b></legend>
					<div class="input-group">
							<input type="text" placeholder="" id= "area" name="area" value="<?php echo $area; ?>" required>
						</div>
				</fieldset>
				<fieldset id="ancestral">
					<legend> <b> <p style= "Color: Black">Within Ancestral Domain</p></b></legend>
					<div class="contact100-form-radio">
                        <input type="radio" id="yes"  name="farmerAssoc"> Yes
						<input type="radio" id="no" name="farmerAssoc"> No<br>
					</div>
				</fieldset>
				<fieldset id="ownershiptype">
				<legend> <b> <p style= "Color: Black">Ownership Type</p></b></legend>
					<div class="contact100-form-radio">
                        <input type="radio" id="owner"  name="type"> Registered Owner
						<input type="radio" id="tenant" name="type"> Tenant
						<input type="radio" id="lessee" name="type">Lessee<br>
					</div>
				</fieldset>
				<br>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="index.php">Login Here</a>.</p>
			
		</form>
		</div>
				</div>
</div>	
</fieldset>
	</div>
		<script>
			const alertDiv = document.getElementById('alert');
			const messageDiv = document.createElement('div');
			messageDiv.classList.add('alert');
			messageDiv.classList.add('warning');
			messageDiv.textContent = "<?= $_SESSION['flash_message'] ?>";
			<?php if (isset($_SESSION['flash_message'])) : ?>
				alertDiv.append(messageDiv);
				setTimeout(() => {
					alertDiv.innerHTML = '';
					<?php unset($_SESSION['flash_message'])
					?>
				}, 2000);
			<?php endif; ?>
		</script>
		</div>
</body>

</html>