  <form method="post">  
    Enter a Number: <input type="text" name="input"><br><br>  
    <input type="submit" name="submit" value="Submit">  
    </form>  
<?php  

$servername = "localhost";
 $username = "root";
 $password = "prime123#";
 $dbname= "prime";


    if($_POST)  
    {  
        $input=$_POST['input'];  
        $i=2;
          if ($input % $i == 1) {
          //prime 
           echo 'The Number '. $input . ' is not prime';  
	    $conn = new mysqli($servername, $username, $password, $dbname);
	    $sql = "INSERT INTO numberinfo (no, type) VALUES ('$input', 'NP')";
	    if ($conn->query($sql) === TRUE) {
	          echo   "  ..NP New record created successfully";
	  } else {
	          echo "Error: " . $sql . "<br>" . $conn->error;
	  }
	  $conn->close();

          }
          else
          {
          echo 'The Number '. $input . ' is prime';  
	   $conn = new mysqli($servername, $username, $password, $dbname);
           $sql = "INSERT INTO numberinfo (no, type) VALUES ('$input', 'Prime')";
           if ($conn->query($sql) === TRUE) {
                  echo "..Prime  record created successfully";
          } else {
                  echo "Error: " . $sql . "<br>" . $conn->error;
          }
	  $conn->close();
          }
          
          
         
    }   
    
?>  

