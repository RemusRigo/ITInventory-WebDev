$db = "it_db";
$timestamp = Get-Date -Format "yyyy-MM-dd HH-mm-ss";
$bk = "$db $timestamp.sql";

C:\xampp\mysql\bin\mysqldump -u root -p $db > $bk