<?php

$a='NULL-5';
$output='';
$null=substr($a,0,4);
$sem=substr($a,strlen($a)-2);
if ($null == 'NULL' || $sem == '0') {
    $output .= '<td>---</td>';
} else {
    $output .= '<td>' . $a . '</td>';
}
echo $output;
/*
 $output .= '
                                        <tr>
                                            <th scope="row">' . $row['application_id'] . '</th>
                                            <td>' . $row['day'] . '</td>';
                                            
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
*/

?>