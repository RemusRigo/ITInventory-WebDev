<?php
//-------------------------------------------------------------------------------------------------
//   IT Inventory
//      © 2025 Remus Rigo
//         v2026-05-14
//   build menu
//-------------------------------------------------------------------------------------------------

echo "\n<ul>";
echo "\n<li>Devices";
echo "\n<ul>";
echo "\n<li><a href='index.php?cat=all'>All</a></li>";
echo "\n<li class='sep'> </li>";

$conn = new mysqli("localhost", $User, $UserPsw, "it_db");
if ($conn->connect_error)
{
   die("Database connection failed: " . $conn->connect_error);
}

$result = $conn->query('SELECT * FROM category;');
if ($result->num_rows > 0)
{
  while ($row = $result->fetch_assoc())
   {
      echo "\n<li><a href='index.php?cat=". $row['id'] ."'>" .$row['name']. "</a></li>";
   }
}

echo "</ul></li>";
echo "<li>Tools";
echo "<ul>";
echo "<li><a href='index.php?list=location'>List Locations</a></li>";
echo "<li><a href='index.php?list=ip'>List IP's</a></li>";
echo "</ul></li>";

echo "\n<li><a href='index.php?search'>Search</a></li>";

if( $loggedUser=="admin" )
{   
   echo "\n<li>Admin";
   echo "\n<ul>";
   echo "\n<li><a href='index.php?addDevice'>Add device</a></li>";
   echo "\n<li class='sep'></li>";
   echo "\n<li><a href='index.php?IP'>Manage IP's</a></li>";
   echo "\n</ul>";
   echo "\n</li>";
}      

echo "\n</ul>";

?>