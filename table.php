<html>

<style>
    td,tr,th,thead{
        border:1px solid black;
    }

</style>
<body>

    <table>
        <thead>
            <th>DATE </th>
            <th>8.45 to 9.35</th>
            <th>9.35 to 10.25</th>
            <th>10.40 to 11.30</th>
            <th>11.30 to 12.20</th>
            <th>12.20 to 1.10</th>
            <th>1.50 to 2.40</th>
            <th>2.40 to 3.30</th>
        </thead>
        <tbody>
            <?php
            $days = $_GET['days'];
            for ($i = 1; $i <= $days; $i++) {
                ?>
                <tr>
                    <td>
                        day <?php echo $i; ?>
                    </td>
                    <td>
                        <select>
                            <option value="volvo">Volvo</option>
                            <option value="saab">Saab</option>
                        </select>
                    </td>
                    <td>
                        <select>
                            <option value="volvo">Volvo</option>
                            <option value="saab">Saab</option>
                        </select>
                    </td>
                    <td>
                        <select>
                            <option value="volvo">Volvo</option>
                            <option value="saab">Saab</option>
                        </select>
                    </td>
                    <td>
                        <select>
                            <option value="volvo">Volvo</option>
                            <option value="saab">Saab</option>
                        </select>
                    </td>
                    <td>
                        <select>
                            <option value="volvo">Volvo</option>
                            <option value="saab">Saab</option>
                        </select>
                    </td>
                    <td>
                        <select>
                            <option value="volvo">Volvo</option>
                            <option value="saab">Saab</option>
                        </select>
                    </td>
                    <td>
                        <select>
                            <option value="volvo">Volvo</option>
                            <option value="saab">Saab</option>
                        </select>
                    </td>
                </tr>


            <?php
            }
            ?>

        </tbody>

    </table>
</body>

</html>