<?php
    session_start();
    include('./connect.php');
    if (!isset($_SESSION['loggedin']))
    {
        header('Location: index.html');
        exit();
    }
    if(($_SESSION['admin']==0))
    {
        echo '<script language="javascript">';
        echo 'alert("Not An Admin")';
        echo '</script>';
        echo '<script>window.location.href = "home.php";</script>';
    }
    else
    {
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
													<th> Name</th>  
													<th>ID</th>  
                                                    <th>Quantity</th>
													<th>color</th>  
														
										 </tr> ';
                    
        $output .= '<div class="container">
                        <div class="row">
                            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                                <div class="card card-signin my-5">
                                    <div class="card-body">';

        if(!empty($_FILES["excel_file"]))  
        {  
            
            
		 
			$file_array = explode(".", $_FILES["excel_file"]["name"]);  
			if($file_array[1] == "xlsx")  
			{  
					 include("./Classes/PHPExcel/IOFactory.php");  
					 
					 $output .= "  
					 <label class='text-success'>Data Updated</label>  
								<table class='table table-bordered'>  
										 <tr>  
													<th> Name</th>  
													<th>ID</th>  
                                                    <th>Quantity</th>
													<th>color</th>  
														
										 </tr>  
										 ";  
					 $object = PHPExcel_IOFactory::load($_FILES["excel_file"]["tmp_name"]);  
					 
					 foreach($object->getWorksheetIterator() as $worksheet)  
					 {  
								$highestRow = $worksheet->getHighestRow();  
								for($row=2; $row<=$highestRow; $row++)  
								{  
										 $PName = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(0, $row)->getValue());  
										 $PID = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(1, $row)->getValue());  
										
										 $Quant= mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(2, $row)->getValue()); 
										 $color= mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(3, $row)->getValue()); 

                                        if($PName!='' && $PID!='' &&  $Quant!='' &&  $color!='')
                                        {
                                            if ($stmt = $con->prepare('SELECT * FROM inventory WHERE productId = ?')) 
                                            {
                                                // Bind parameters (s = string, i = int, b = blob, etc)
                                                $stmt->bind_param('s', $PID);
                                                $stmt->execute();
                                                // Store the result 
                                                $stmt->store_result();
                                            
                                                if ($stmt->num_rows > 0) 
                                                {
                                                    $stmt1 = $con->prepare("UPDATE inventory SET quantity=? WHERE productId=? ");
                                                    $stmt1->bind_param('is',$Quant ,$PID);
                                                    $stmt1->execute();
                                                    
                                                }
                                        
                                                else
                                                {
                                                    $stmt2 = $con->prepare("INSERT INTO inventory(productName, productId, quantity,color) VALUES (?, ?, ?, ?)");
                                                    $stmt2->bind_param('ssis', $PName,$PID,$Quant,$color);
                                                    $stmt2->execute();
                                                }
                                            }
                                            $output .= '  
										 <tr>  
													<td>'.$PName.'</td>  
													<td>'.$PID.'</td>  
													 
													<td>'.$Quant.'</td>  
													<td>'.$color.'</td>  	
										 </tr>  
										 ';
                                         
                                        }
                                        else
                                        {
                                            $flag=1;
                                              $errout.= '  
                                                    <tr>  
                                                                <td>'.$PName.'</td>  
                                                                <td>'.$PID.'</td>  
                                                                
                                                                <td>'.$Quant.'</td>  
                                                                <td>'.$color.'</td>  	
                                                    </tr>  
                                                    ';  

                                        }
										
										
										


										 
								}  
                         	

										
                        }
                        $output .= '</table>
                        </div>
                            </div>
                            </div>
                            </div>
                            </div>';
                         echo $output;
                         if($flag==1)
                         {
                            $errout .= '</table></div>
                            </div>
                            </div>
                            </div>
                            </div>';
                             echo $errout;
                         }
                                    
                                    
            }
			else  
			{  
               
                $output .='<div class="card bg-danger text-white">
                            <div class="card-body">INVALID FILE</div>
                            </div> 
                            ';
                            echo $output;
            }
        }
    }
        