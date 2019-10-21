<?php
  include("./connect.php");
  echo("in");
  
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
        $errout='<div class="container">
                     <div class="row">
                         <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                             <div class="card card-signin my-5">
                                 <div class="card-body">
                    <label class="text-danger">Incomplete Data</label>  
								<table class="table table-bordered">  
										 <tr>  
                                         <th>User ID</th>  
                                         <th>Name</th>  
                                         
                                         <th>Email</th>  
                                         <th>Department</th> 
														
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
								<table class='table table-bordered'>  
										 <tr>  
													<th>User ID</th>  
													<th>Name</th>  
                                                    
                                                    <th>Email</th>  
                                                    <th>Department</th> 
														
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

                                        if($Fname!='' && $Fid!='' &&  $Email!='' &&  $Dep!='')
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
                                                
                                                    $stmt2 = $connect->prepare("INSERT INTO user(user_id,name,designation,email,department) VALUES (?, ?, ?, ?, ?)");
                                                    
                                                    $stmt2->bind_param('sssss', $Fid,$Fname,$designation,$Email,$Dep);
                                                    $stmt2->execute();
                                                    
                                            //}
                                            $output .= '  
										 <tr>  
													<td>'.$Fid.'</td>  
													<td>'.$Fname.'</td>  
													 
													<td>'.$Email.'</td>  
													<td>'.$Dep.'</td>  	
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
    
        