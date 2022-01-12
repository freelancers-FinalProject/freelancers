<?php
include "connect.php";
//Getting value of "search" variable from "script.js".
if (isset($_POST['search'])) {
//Search box value assigning to $Name variable.
   $Name = $_POST['search'];
//Search query.
   $Query = "SELECT username FROM sub_admin WHERE username LIKE '%$Name%' LIMIT 5";
//Query execution
   $ExecQuery = MySQLi_query($con, $Query);
//Creating unordered list to display result.
   echo '
<ul>
   ';
   //Fetching result from database.
   while ($Result = MySQLi_fetch_array($ExecQuery)) {
       ?>
   <li onclick='fill("<?php echo $Result["username"]; ?>")'>
   <a>
   <!-- Assigning searched result in "Search box" in "search.php" file. -->
       <?php echo $Result['username']; ?>
   </li></a>
   <!-- Below php code is just for closing parenthesis. Don't be confused. -->
   <?php
}}
?>
</ul>