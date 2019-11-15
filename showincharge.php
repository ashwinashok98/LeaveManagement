<?php

$id = $_POST["id"];

include "./connect.php";

$output = '';

$query = "SELECT * FROM leaveapplication where application_id = '" . $id . "' ";
$result = mysqli_query($connect, $query);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if ($row['inchargeFaculty'] != 'D_faculty') {
            $orifrom=$row['fromDate'];
            $orito=$row['toDate'];
            $t_from = strtotime($orifrom);
            $t_to = strtotime($orito);
            $new_from = date("d-m-Y", $t_from);
            $new_to = date("d-m-Y", $t_to);
       
        $output .= '<div class="card-block table-border-style">
                         <div class="table-responsive">
                                 <table class="table table-hover">
                                     <thead>
                                        <tr>
                                            <th>Leave ID</th>
                                            <th>From</th>
                                            <th>To</th>
                                            <th>Faculty Incharge</th>
                                            <th>Approval</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">' . $row['application_id'] . '</th>
                                            <td>' .  $new_from . '</td>
                                            <td>' .  $new_to . '</td>
                                            <td>' . $row['inchargeFaculty'] . '</td>';
        if ($row['leaveStatus'] == 1) {
            $output .= ' <td> <i class="fa fa-check fa-2x" aria-hidden="true" style="color:green"></i>';
        }
        if ($row['leaveStatus'] == -1) {
            $output .= ' <td> <i class="fa fa-times fa-2x" aria-hidden="true" style="color:red">';
        }
        if ($row['leaveStatus'] == 0) {
            $output .= ' <td> <i class="fa fa-spinner fa-pulse fa-2x fa-fw" aria-hidden="true" style="color:#E2D02A">';
        }

        $output .= '</td>
                </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>';
    } else 
    {
        $output .= '<div class="card-block table-border-style">
        <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                       <tr>
                           <th>Leave ID</th>
                           <th>DATE </th>
                           <th class>08.45 to 09.35</th>
                           <th class>09.35 to 10.25</th>
                           <th class>10.40 to 11.30</th>
                           <th class>11.30 to 12.20</th>
                           <th class>12.20 to 1.10</th>
                           <th class>01.50 to 02.40</th>
                           <th class>02.40 to 03.30</th>
                           
                       </tr>
                   </thead>
                   <tbody>';
        $query1 = "SELECT * FROM managefaculty where application_id = '" . $id . "' ";
        $result1 = mysqli_query($connect, $query1);
        while ($row = mysqli_fetch_array($result1)) {

            $output .= '
                                        <tr>
                                            <th scope="row" >' . $row['application_id'] . '</th>
                                            <td>' . $row['date'] . '</td>';
                                            
                                            $null=substr($row['period1'],0,5);
                                            $sem=substr($row['period1'],5);
                                            
                                            if($null=='NULL' || $sem=='0')
                                            {
                                                $output.='<td>---</td>';
                                            }
                                            else{
                                                $output.= '<td>' . $row['period1'] . '</td>';
                                            }

                                            $null=substr($row['period2'],0,5);
                                            $sem=substr($row['period2'],5);
                                            if($null=='NULL' || $sem=='0')
                                            {
                                                $output.='<td>---</td>';
                                            }
                                            else{
                                                $output.= '<td>' . $row['period2'] . '</td>';
                                            }
                                            $null=substr($row['period3'],0,5);
                                            $sem=substr($row['period3'],5);
                                            if($null=='NULL' || $sem=='0')
                                            {
                                                $output.='<td>---</td>';
                                            }
                                            else{
                                                $output.= '<td>' . $row['period3'] . '</td>';
                                            }
                                            $null=substr($row['period4'],0,5);
                                            $sem=substr($row['period4'],5);
                                            if($null=='NULL' || $sem=='0')
                                            {
                                                $output.='<td>---</td>';
                                            }
                                            else{
                                                $output.= '<td>' . $row['period4'] . '</td>';
                                            }
                                            $null=substr($row['period5'],0,5);
                                            $sem=substr($row['period5'],5);
                                            if($null=='NULL' || $sem=='0')
                                            {
                                                $output.='<td>---</td>';
                                            }
                                            else{
                                                $output.= '<td>' . $row['period5'] . '</td>';
                                            }
                                            $null=substr($row['period6'],0,5);
                                            $sem=substr($row['period6'],5);
                                            if($null=='NULL' || $sem=='0')
                                            {
                                                $output.='<td>---</td>';
                                            }
                                            else{
                                                $output.= '<td>' . $row['period6'] . '</td>';
                                            }
                                            $null=substr($row['period7'],0,5);
                                            $sem=substr($row['period7'],5);
                                            if($null=='NULL' || $sem=='0')
                                            {
                                                $output.='<td>---</td>';
                                            }
                                            else{
                                                $output.= '<td>' . $row['period7'] . '</td>';
                                            }

                                           $output.='</tr>';
        }
       
        $output .= '</td>
                    </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>';
    }
}



$data = array(
    'output' => $output,

);
echo json_encode($data);
