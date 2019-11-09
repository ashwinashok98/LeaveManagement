<?php
include("./connect.php");

    $from = $_POST['from'];
    $todate =  strtotime($_POST['to']);
    $fromdate =  strtotime($_POST['from']);
    $days = (abs($todate - $fromdate)/60/60/24);

    $output="";
    $output.="<input type ='text' id='day' name='day' value='".$days."' hidden>";
    $output.="
    <table class='table table-hover'>
        <thead>
            <th>DATE </th>
            <th class='mgl-10'>08.45 to 09.35</th>
            <th class='mgl-10'>09.35 to 10.25</th>
            <th class='mgl-10'>10.40 to 11.30</th>
            <th class='mgl-10'>11.30 to 12.20</th>
            <th class='mgl-10'>12.20 to 1.10</th>
            <th class='mgl-10'>01.50 to 02.40</th>
            <th class='mgl-10'>02.40 to 03.30</th>
        </thead>
        <tbody>

           ";
            for ($i = 1; $i <= $days+1; $i++) {

               $output.=' <tr>
                    <td>
                        day'.$i.'
                    </td>
                    ';
                    for ($j = 1; $j <= 7; $j++) {

                        $output.='<td><select  class="form-control mt-5" id="teach'.(string)$i.(string)$j.'" name="teach'.(string)$i.(string)$j.'">
                        <option value="NULL">Select</option>';

                        $teachers_sql = "SELECT name FROM user WHERE designation='faculty'";
                        $teachers_result = mysqli_query($connect, $teachers_sql);
                        if (mysqli_num_rows($teachers_result) > 0) {
                            while ($teacher = mysqli_fetch_array($teachers_result)) {

                        $output.='<option  value='.$teacher["name"].'> '.$teacher["name"].'</option>';
                            }
                        }
                        $output.='
                        </select>
                        <select  class="form-control mb-3" id="sem'.(string)$i.(string)$j.'" name="sem'.(string)$i.(string)$j.'">
                        <option value="0">Sem</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                    </td>
               ';
                    }
                    $output.=" </tr>";



            }


        $output.="</tbody>

    </table>";


    $data = array(
        'output' => $output,

      );
      echo json_encode($data);
