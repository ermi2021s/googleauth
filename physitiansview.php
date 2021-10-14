<!DOCTYPE html>
<html>
  
<body>
<style>
table {
  border-collapse: collapse;
  border: 1px solid black;
} 

th,td {
  border: 1px solid black;
}

table{
  table-layout: fixed;
  width: 250px;  

}
text {
  font-size: large;
  font-size-adjust: 0.58;
}

</style>

    <center>
    <h1>paients data</h1>
       
    </center>
    <?php 
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "assignment2";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $userID = 1;
        $sql = "SELECT DataURL FROM test_session  
        inner JOIN test ON test.testID = test_session.Test_IDtest 
        inner JOIN therapy ON test.Therapy_IDtherapy = therapy.therapyID
        where User_IDmed =" . $userID . ";";
        $result = $conn->query($sql);

    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
        
        echo $row["DataURL"] . "<br>";
         
        
        
          // Open a file
        
        $file = fopen($row["DataURL"] . ".csv", "r");

        // Fetching data from csv file row by row
        while (($data = fgetcsv($file)) !== false) {
            echo "<body><center><table>\n\n";
            // HTML tag for placing in row format
            echo "<tr>";
            //var_dump($data);
            foreach ($data as $i) {
                 echo "<td>" . $i
                     . "</td>" ;
             }
            echo "</tr> \n";
            // Closing the file
        
  
        echo "\n</table></center></body>";
        echo "\n";
        }
        fclose($file);
        
        }
      } else {
        echo "0 results";
      }
        
      ?>

</body>
  
</html>