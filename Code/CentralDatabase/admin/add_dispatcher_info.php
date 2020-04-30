            <?php
			include ('db/dbcon.php');
                if (isset($_POST['save'])){

                    $branchid=$_POST['branchid'];
                    $firstname=$_POST['firstname'];
                    $lastname=$_POST['lastname'];
                    $username=$_POST['username'];
                    $password=$_POST['password'];
                    $confirm_password=$_POST['confirm_password'];
					
					$result=mysqli_query($connect,"select * from dispatcher WHERE username='$username'") or die (mysqli_error());
					$row=mysqli_num_rows($result);
					if ($row > 0)
					{
					echo "<script>alert('Username already taken!'); window.location='add_dispatcher.php'</script>";
					}
					elseif($password != $confirm_password)
					{
					echo "<script>alert('Password do not match!'); window.location='add_dispatcher.php'</script>";
					}else
						
                    mysqli_query($connect,"insert into dispatcher (branchid,firstname,lastname,username,password,confirm_password,date_added)
                        values ('$branchid','$firstname','$lastname','$username','$password','$confirm_password',DATE_FORMAT(NOW(),'%b %d %Y %h:%i %p'))") or die(mysql_error()); 
					header('location:dispatcher.php');
					
                }
            ?>