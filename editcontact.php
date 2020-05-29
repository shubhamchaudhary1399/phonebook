<?php
  require("includes/common.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
</head>
<body>
	<div class="container py-4">
		<div class="card" style="max-width: 600px; margin: auto;">
            <div class="card-header text-center my-card">PhoneBook</div>

            <div class="card-body">
            	<div>
            		<a href="index.php" style="width: 30%; float: left;"><span class="material-icons" style="color: black;">arrow_back</span></a>
            		<h4 style="width: 70%;float: right;">Edit Contact</h4>
            	</div>
            	
                <?php
                $contact_id = $_GET['id'];
                $query = "SELECT contacts.name AS name, contacts.dob AS dob, contacts.contact AS contact, contacts.email AS email FROM contacts WHERE id = $contact_id";
                $result = mysqli_query($con, $query)or die($mysqli_error($con));
                $row = mysqli_fetch_array($result);
                ?>
                <form method="POST" action=<?php echo "editcontact_script.php?id=".$contact_id.""?>>
                <div class="form-group">
                    <label for="name" class="col-form-label text-md-right">Name
                     </label>
                    <input id="name" type="text" class="form-control " name="Name" value="<?php  echo $row['name']?>" required autocomplete="name" autofocus>
                </div>
                <div class="form-group">
                    <label for="dob" class="col-form-label text-md-right">DOB
                     </label>
                    <input id="dob" type="date" class="form-control " name="DOB" value="<?php  echo $row['dob']?>" required autocomplete="dob" autofocus>
                </div>
                <div class="form-group">
                    <label for="mob" class="col-form-label text-md-right">Mobile Number
                     </label>
                    <input id="mob" type="tel" class="form-control " name="Mob" value="<?php  echo $row['contact']?>" required autocomplete="mob" autofocus>
                </div>
                <div class="form-group">
                    <label for="email" class="col-form-label text-md-right">Email
                     </label>
                    <input id="email" type="email" class="form-control " name="Email" value="<?php  echo $row['email']?>" required autocomplete="email" autofocus>
                </div>

                <input type="submit" name="" class="btn btn-primary float-right" value="Save" id="submit">
				</form>
			</div>
		</div>
	</div>

</body>
</html>



