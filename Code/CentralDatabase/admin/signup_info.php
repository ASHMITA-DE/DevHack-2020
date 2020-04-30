            <?php
			include ('db/dbcon.php');
                if (isset($_POST['save'])){

                    $branchid=$_POST['branchid'];
                    $firstname=$_POST['firstname'];
                    $lastname=$_POST['lastname'];
                    $username=$_POST['username'];
                    $password=$_POST['password'];
                    $confirm_password=$_POST['confirm_password'];
                    $user_type=$_POST['user_type'];
					
					$result=mysqli_query($connect,"select * from admin WHERE username='$username'") or die (mysqli_error());
					$row=mysqli_num_rows($result);
					if ($row > 0)
					{
					echo "<script>alert('Username already taken!'); window.location='signup.php'</script>";
					}
					elseif($password != $confirm_password)
					{
					echo "<script>alert('Password do not match!'); window.location='signup.php'</script>";
					}else
						
                    mysql_query("insert into admin (branchid,firstname,lastname,username,password,confirm_password,user_type,date_added)
                        values ('$branchid','$firstname','$lastname','$username','$password','$confirm_password','$user_type',DATE_FORMAT(NOW(),'%b %d %Y %h:%i %p'))") or die(mysql_error()); 
					header('location:profile.php');
					
                }
            ?>