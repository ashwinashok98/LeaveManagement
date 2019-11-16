<?php
  include("./connect.php");
  use phpmailer\PHPMailer\PHPMailer;
  require_once "phpmailer/PHPMailer.php";
  require_once "phpmailer/Exception.php";
  
  if (!empty($_FILES["student_excel_file"])) { 
    $file=$_FILES["student_excel_file"];
    $designation="student"; 
} 
if (!empty($_FILES["teacher_excel_file"])) { 
    $file=$_FILES["teacher_excel_file"];
    $designation="faculty"; 
} 
        $output = ''; 
        $flag=0;
        $errout='';
        $errout='
                    <label class="text-danger">Incomplete Data</label>  
								<table class="table table-bordered table-responsive ">  
										 <tr>  
                                         <th>User ID</th>  
                                         <th>Name</th>  
                                         
                                         <th>Email</th>  
                                         <th>Department</th> 
                                         <th>Mobile</th>
                                         <th>Join Date</th> 
														
										 </tr> ';
                    
        $output .= '';

        if(!empty($file))  
        {  
            
            
		 
			$file_array = explode(".", $file["name"]);  
			if($file_array[1] == "xlsx")  
			{  
					 include("./Classes/PHPExcel/IOFactory.php");  
					 
					 $output .= "  
					 <label class='text-success'>Data Updated</label>  
								<table class='table table-bordered table-responsive'>  
										 <tr>  
													<th>User ID</th>  
													<th>Name</th>  
                                                    
                                                    <th>Email</th>  
                                                    <th>Department</th>
                                                    <th>Mobile</th>
                                                    <th>Join Date</th> 
														
										 </tr>  
										 ";  
					 $object = PHPExcel_IOFactory::load($file["tmp_name"]);  
					 
					 foreach($object->getWorksheetIterator() as $worksheet)  
					 {  
								$highestRow = $worksheet->getHighestRow();  
								for($row=2; $row<=$highestRow; $row++)  
								{  
										 $Fid = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());  
										 $Fname = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());  
										
										 $Email= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue()); 
                                         $Dep= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue()); 
                                         $Mob= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue()); 
                                         $Join= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());

                                        if($Fname!='' && $Fid!='' &&  $Email!='' &&  $Dep!='' &&  strlen($Mob)==10 &&   $Join!='')
                                        {
                                            /*if ($stmt = $connect->prepare('SELECT * FROM user WHERE Fid = ?')) 
                                            {
                                                // Bind parameters (s = string, i = int, b = blob, etc)
                                                $stmt->bind_param('s', $Fid);
                                                $stmt->execute();
                                                // Store the result 
                                                $stmt->store_result();
                                            
                                               if ($stmt->num_rows > 0) 
                                                {
                                                    $stmt1 = $connect->prepare("UPDATE user SET email=? WHERE department=? ");
                                                    $stmt1->bind_param('ss',$Email ,$Dep);
                                                    $stmt1->execute();
                                                    
                                                }*/
                                        
                                                //else
                                                $stmt2 = $connect->prepare("INSERT INTO user(user_id,name,designation,email,department,mobile,joinDate) VALUES (?, ?, ?, ?, ?,?,?)");
                                                    
                                                $stmt2->bind_param('sssssis', $Fid,$Fname,$designation,$Email,$Dep,$Mob,$Join);
                                                $stmt2->execute();

                                                

                                                    $pwd = bin2hex(openssl_random_pseudo_bytes(4));
                                                    $hash = password_hash($pwd,PASSWORD_DEFAULT);
                                                    
                                                    $stmtp = $connect->prepare("INSERT INTO login VALUES (?, ?)");
                                                    $stmtp->bind_param('ss', $Fid,$hash);
                                                    $stmtp->execute();

                                                    $mail_address = $Email;
                                                    $mail = new PHPMailer();
                                                    $mail->setFrom("ashwinashok98@gmail.com");
                                                    $mail->addAddress($mail_address);
                                                    $mail->Subject = "Login Details";
                                                    $mail->isHTML(true);
                                                    $mail->Body =" <h4>Login Details for JGI Leave Manager: <br> Username:".$Fid." <br> Password:".$pwd."</h4>
                                                    <b>Please do not share this information to anyone.</b>";
                                                    $mail->send();
                                                
                                                   
                                                    
                                            //}
                                            $output .= '  
										 <tr>  
													<td>'.$Fid.'</td>  
													<td>'.$Fname.'</td>  
													 
													<td>'.$Email.'</td>  
                                                    <td>'.$Dep.'</td>  
                                                    <td>'.$Mob.'</td>  
                                                    <td>'.$Join.'</td>	
										 </tr>  
										 ';
                                         
                                        }
                                        else
                                        {
                                            $flag=1;
                                              $errout.= '  
                                                    <tr>  
                                                        <td>'.$Fid.'</td>  
                                                        <td>'.$Fname.'</td>  
                                                        
                                                        <td>'.$Email.'</td>  
                                                        <td>'.$Dep.'</td> 
                                                        <td>'.$Mob.'</td> 
                                                        <td>'.$Join.'</td>  		
                                                    </tr>  
                                                    ';  

                                        }
										
										
										


										 
								}  
                         	

										
                        }
                        $output .= '</table>
                        ';
                         echo $output;
                         if($flag==1)
                         {
                            $errout .= '</table></div>
                            ';
                             echo $errout;
                         }
                                    
                                    
            }
			else  
			{  
               
                $output .='
                            <div class="card-body">INVALID FILE</div>
                           
                            ';
                            echo $output;
            }
        }
    
        