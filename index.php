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
            	<form action="search.php" method="post" role="search">
            		<div class="form-group">
            			<input id="nav-search-input" style="width: 80%; float: left;" class="form-control" type="text" name="Search" placeholder="Search by name,contact or email" aria-label="Search">
                        <button id="nav-search-btn" type="submit" style="width: 20%;">
                            <span class="material-icons" id="scope-search">search</span>
                        </button>
            		</div>
        		</form>


        		<?php
        	$limit = 4;
        	$j = 1;
        	if (isset($_GET["page"])) {  
      		$pn  = $_GET["page"];  
    		}
    		else {  
      		$pn=1;  
    		};   
  
    		$start_from = ($pn-1) * $limit;

			$query = "SELECT contacts.id AS id, contacts.name AS name, contacts.dob AS dob, contacts.contact AS contact, contacts.email AS email FROM contacts ORDER BY name ASC LIMIT $start_from, $limit";
			$result = mysqli_query($con, $query)or die($mysqli_error($con));
			if (mysqli_num_rows($result) >= 1){
				
				while ($row = mysqli_fetch_array($result)){
						echo'<div class="accordion" id="myaccordion">
  				<div class="card">
    				<div class="card-header" id="headingOne">
      					<h4 class="mb-0"> '. $row["name"] . '
        				<button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse'.$j.'" aria-expanded="true" aria-controls="collapseOne">

          					<span class="material-icons float-right" style="margin-top: -30px;">arrow_upward</span>
        				</button>
      					</h4>
    				</div>

    				<div id="collapse'.$j.'" class="collapse" aria-labelledby="headingOne" data-parent="#myaccordion">
      				<div class="card-body">
        				<div class="contact d-flex">
        					<div class="details float-left" style="width: 60%;">
        					<label>'.$row["dob"].'</label>
        					</div>
        					<div class="operation" style="width: 60%;">
        						<div>
        							<a class="btn btn-danger float-right" href="removecontact.php?id='.$row["id"].' ">Remove</a>
        							<a class="btn btn-primary float-right" href="editcontact.php?id='.$row["id"].' ">Edit</a>
        						</div>
        					</div>	
        				</div>

        				<div class="phone-details d-flex">
        					<div class="phone-number w-50 float-left">
        						<span class="material-icons">phone</span>
        						<label>'.$row["contact"].'</label>
        					</div>
        					<div class="email w-50">
        						<span class="material-icons">email</span>
        						<label>'.$row["email"].'</label>
        						
        					</div>
        				</div>
        				
      				</div>
    				</div>
  				</div>
  			</div>'; $j++;
					}
				} else{
				echo "<center><h2>Oops no contact saved! Need Help?</h2></center>";
			}

			$query = "SELECT COUNT(*) FROM contacts";
			$result = mysqli_query($con, $query)or die($mysqli_error($con));
			$row = mysqli_fetch_ROW($result);
     
        	$total_records = $row[0];   
           
        	$total_pages = ceil($total_records / $limit);   
        	$pagLink = "";
        	echo "</br>";
        	for ($i=1; $i<=$total_pages; $i++) { 
            if ($i==$pn) { 
              $pagLink .= "<span class='active pagina' ><a class='anchor'  href='index.php?page="
                                                .$i."'>".$i."</a></span>"; 
          }             
          else  { 
              $pagLink .= "<span class='pagina'><a class='anchor' href='index.php?page=".$i."'> 
                                                ".$i."</a></span>";   
          } 
        };   
        echo $pagLink;
			?>
				<div>
					<a href="addcontact.php">
						<span class="material-icons" style="float: right; font-size: 48px; color: black;">add_circle</span>
					</a>
				</div>


			</div>
		</div>
	</div>

</body>
</html>