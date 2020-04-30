							<?php	
							include ('db/dbcon.php');
							if (!isset($_FILES['image']['tmp_name'])) {
							echo "";
							}else{
							$file=$_FILES['image']['tmp_name'];
							$image = $_FILES["image"] ["name"];
							$image_name= addslashes($_FILES['image']['name']);
							$size = $_FILES["image"] ["size"];
							$error = $_FILES["image"] ["error"];

							if ($error > 0){
										die("Error uploading file! Code $error.");
									}else{
										if($size > 10000000) //conditions for the file
										{
										die("Format is not allowed or file size is too big!");
										}
										
									else
										{

									move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
									$profile=$_FILES["image"]["name"];
									$firstname = $_POST['firstname'];
									$lastname = $_POST['lastname'];
									$contact_number = $_POST['contact_number'];
								
						mysqli_query($connect,"insert into driver (firstname,lastname,contact_number,profile,date_added)
						values ('$firstname','$lastname','$contact_number','$profile',DATE_FORMAT(NOW(),'%b %d %Y %h:%i %p'))")or die(mysqli_error());						
						echo "<script>alert('Driver Added!'); window.location='driver.php'</script>";
									}
									}
							}
								?>