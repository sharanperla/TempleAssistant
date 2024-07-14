<?php
session_start();
if($_SESSION['status']==true)
{
	$conn=new mysqli("localhost","root","","tadb");
		if(mysqli_Connect_error()){
			die("connection failed:");
		}
if(isset($_POST['add-btn'])){
                 

                              $uid=$_SESSION['id'];			  
							   $fullname=$_SESSION['fullname'];
                               $email=$_SESSION['email'];
                               $phone=$_SESSION['phone'];
							   $phalanubhavi=$_SESSION['phname'];
							   $nakshathra=$_SESSION['naksh'];
                               $sid = isset($_POST['s_id']) ? $_POST['s_id'] : '';
							   $wantdate1= isset($_POST['date']) ? $_POST['date'] : '';
                                 $sqlx="select * from sevabooking where u_id='$uid' && phname='$phalanubhavi' && date='$wantdate1' && s_id='$sid'";
								 $sqly="select * from sevaorders where u_id='$uid' && phname='$phalanubhavi' && date='$wantdate1' && s_id='$sid'";
								
                                 $resultx=$conn->query($sqlx);
								 $resulty=$conn->query($sqly);
					
                                   if($resulty->num_rows > 0)
								   {
									echo "<script>alert('sorry you have allready added this seva to Arpana pathra!')</script>";
									echo"<script>window.location.href='userhomepage.php'</script>";
								   }
                                    elseif ($resultx->num_rows > 0) {
                                        echo "<script>alert('sorry you have allready booked this seva with this name!')</script>";
										echo"<script>window.location.href='userhomepage.php'</script>";
                                    }
                                    else{
                                        	        $sql2="select*from sevalist where s_id='$sid'";
								                       $result= $conn->query($sql2);
								 						if ($result->num_rows > 0) {
								
									 					 while ($row = $result->fetch_assoc()) {
																			$s_id = $row['s_id'];
																			$s_name = $row['s_name'];
																			$price = $row['price'];
																			$qty=$row['qty'];
																			$quantity=1;
																			$date=$row['date'];
									 										 }
																if ($quantity>$qty) {
																	echo "<script>alert('sorry not available!')</script>";
																	header("Location: userhomepage.php");
																} else {
											                        $sql = "INSERT INTO sevabooking (s_id, u_id,  s_name, qty, price, fname,phone, email ,phname ,nakshathra,date,created_at) VALUES ('$sid', '$uid', '$s_name', '$quantity', '$price','$fullname','$phone','$email','$phalanubhavi','$nakshathra','$date',NOW())";
											                       $updateQty = "UPDATE sevalist  SET qty = qty-'$quantity' WHERE s_id = '$s_id'";
																if ($conn->query($sql) === TRUE) {
																	$conn->query($updateQty);
																	echo "<script>alert('Added to Arpana pathra!,check Arpana pathra to continue')</script>";
																	echo"<script>window.location.href='userhomepage.php'</script>";
												   
												   
												   
																						} else {
																							echo "Error adding to Arpana pathra: " . $conn->error;
																						}
																					}//quantity availability
																				
																		}//close if
																		else {
																			echo "Product not found!";
																		}
									}
								}
									// if($phname==$phalanubhavi){
									// 	echo "<script>alert('sorry you have allready booked this seva with this name!')</script>";
									// 	echo"<script>window.location.href='userhomepage.php'</script>";
											
	
					}
				else{
						header('Location: adminlogin.php');
						}
                ?>