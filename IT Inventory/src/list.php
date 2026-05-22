<?php
//-------------------------------------------------------------------------------------------------
//   IT Inventory
//      © 2026 Remus Rigo
//         v2026-05-20
//   list locations / devices / IP's
//-------------------------------------------------------------------------------------------------

// starting time for sql query
$start = microtime(true);

$conn = new mysqli("localhost", $User, $UserPsw, "it_db");
if ($conn->connect_error)
{
   die("Database connection failed: " . $conn->connect_error);
}

$list=htmlspecialchars($_GET['list']);

//-------------------------------------------------------------------------------------------------
// Query locations
if ($list == "location")
{
   // Query all locations
   if (!isset($_GET['id']))
   {
      // Show all locations
      $sql = "SELECT id, name
         FROM locations
         ORDER BY name";

      // Show only locations that have devices
      //SELECT l.id, l.name
      //   FROM locations l
      //   JOIN devices d ON d.location1 = l.id
      //   GROUP BY l.id, l.name
      //   ORDER BY l.name

      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->get_result();
   }

   // Query all devices on location
   if (isset($_GET['id']))
   {
      $sql = "SELECT d.id, d.hostname, d.description, l.name AS location_name, ip.IPv4, d.ip2
        FROM devices d
        LEFT JOIN locations l ON l.id = d.location1
        LEFT JOIN ip ip ON ip.id = d.ip_id
        WHERE d.location1 = ?
        ORDER BY d.id";

      $id=$_GET['id'];
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $result = $stmt->get_result();
   }
}

//-------------------------------------------------------------------------------------------------
// Query IP's
if ($list == "ip")
{
   $sql = "SELECT d.id, d.hostname, d.description, i.IPv4
      FROM devices d
      JOIN ip i ON i.ID = d.ip_id
      ORDER BY i.IPv4, d.hostname";

   $stmt = $conn->prepare($sql);
   $stmt->execute();
   $result = $stmt->get_result();
}

//-------------------------------------------------------------------------------------------------

// ending time for sql query
$end = microtime(true);

if ($result->num_rows > 0)
{
   // Display locations ---------------------------------------------------------------------------
   if ($list == "location") 
   {

      // Display only locations -------------------------------------------------------------------
      if (!isset($_GET['id']))
      {
         //echo "<script>document.querySelector(\"div[name='header_title']\").innerHTML = \"IT Inventory: Locations\";</script>";
         echo "\n<table name='devices' id='devices' class='devices'>";
         echo "<thead>";
         echo "\n<tr>";
         echo "<th>ID</th>";
         echo "<th>{$cfgLang['Location1']}</th>";
         echo "</tr>";
         echo "</thead><tbody>";

         while ($row = $result->fetch_assoc())
         {
            echo "<tr><td>" . htmlspecialchars($row['id']) . "</td>";
            echo "<td><a href='index.php?list=location&id=" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['name']) . "</a></td></tr>";
         }

      }
      // Display all devices on location ----------------------------------------------------------
      if (isset($_GET['id']))
      {
         //echo "<script>document.querySelector(\"div[name='header_title']\").innerHTML = \"IT Inventory: {$result->fetch_assoc()['location_name']}\";</script>";
         $result->data_seek(0);

         echo "\n<table name='devices' id='devices' class='devices'>";
         echo "<thead>";
         echo "\n<tr>";
         echo "<th>ID</th>";
         echo "<th>{$cfgLang['HostName']}</th>";
         echo "<th>{$cfgLang['Description']}</th>";
         echo "<th>{$cfgLang['IP1']}</th>";
         echo "<th>{$cfgLang['IP2']}</th>";
         echo "</tr>";
         echo "</thead><tbody>";

         while ($row = $result->fetch_assoc())
         {
            echo "<tr>
               <td>". htmlspecialchars($row['id']) ."</td>
               <td>". htmlspecialchars($row['hostname']) ."</td>
               <td>". htmlspecialchars($row['description']) ."</td>
               <td>". htmlspecialchars($row['IPv4']) ."</td>
               <td>". htmlspecialchars($row['ip2']) ."</td>
               </tr>";
         }
      }

      echo "</tbody></table>";
      $totalRows = $result->num_rows;
      echo "<p style='font-size:smaller;'>".$totalRows . " record" . ($totalRows == 1 ? "" : "s") . " found in ". ($end - $start) ." seconds";
   }


   if ($list == "ip")
   {
      echo "<script>document.querySelector(\"div[name='header_title']\").innerHTML = \"IT Inventory: IP list\";</script>";
      echo "\n<table name='devices' id='devices' class='devices'>";
      echo "<thead>";
      echo "\n<tr>";
      echo "<th>ID</th>";
      echo "<th>{$cfgLang['HostName']}</th>";
      echo "<th>{$cfgLang['Description']}</th>";
      echo "<th>{$cfgLang['IP1']}</th>";
      echo "</tr>";
      echo "</thead><tbody>";

      while ($row = $result->fetch_assoc())
      {
         echo "<tr>
            <td>". htmlspecialchars($row['id']) ."</td>
            <td>". htmlspecialchars($row['hostname']) ."</td>
            <td>". htmlspecialchars($row['description']) ."</td>
            <td>". htmlspecialchars($row['IPv4']) ."</td>
            </tr>";
      }
      echo "</tbody></table>";
      $totalRows = $result->num_rows;
      echo "<p style='font-size:smaller;'>".$totalRows . " record" . ($totalRows == 1 ? "" : "s") . " found in ". ($end - $start) ." seconds";
   }
}
else
{
   echo "\n<p>No devices found.";
}
