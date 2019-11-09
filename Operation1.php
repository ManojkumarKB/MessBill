<html>
<body>
<?php
$con=new mysqli("localhost","root","","Mess_bill");
if(!$con)
{
    die('Could not connect:'.mysql_error());
}
else
{
    $nm=0;
    echo '<script>alert($nm)</script>';
    $nm=$_POST['Nm'];  
$id=(int)$_POST['IdlyQty'];
$vd=(int)$_POST['VdQty'];
$dh=(int)$_POST['DhQty'];
$pr=(int)$_POST['PrQty'];
$to=(int)$_POST['tot'];
$amt_pd=(int)$_POST['Amt_pd'];
// echo '<script>alert($to)</script>';
// echo '<script>alert($amt_pd)</script>';
//  echo '<html><script>alert($amt_pd)</script></html>';
 $sql = "INSERT INTO Ritems_payment(Name,Idly,Dhosai,Poori,Vadai,Amount,Paid_Amount) VALUES('$nm','$id','$dh','$pr','$vd','$to','$amt_pd')";

 if ($con->query($sql) === TRUE)
 {
     echo "<html><script>alert('Insertion done successfully')</script></html>";
 } 
 else 
 {
     echo "<html><script>alert('Insertion done unsuccessfull')</script></html>";
 }
 $sql = "SELECT Name, Amount, Paid_Amount,order_id FROM Ritems_payment WHERE Name='$nm'"; 
 $result = $con->query($sql);
 if ($result->num_rows > 0)
 {
     echo '<html><table><tr><th>Order id</th><th>Name</th><th>total amount</th><th>Paid Amount</th></tr>';
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
        echo '<tr><td>';
        echo "<tr><td>" . $row["order_id"]."</td> <td>" . $row["Name"]. "</td><td>" . $row["Amount"]. "</td><td>".$row["Paid_Amount"]."</td></tr>";
    }
} else {
    echo "0 results";
}
}
?>
<br><br>
<a href="main.html">Go to Main Page</a>
</body></html>