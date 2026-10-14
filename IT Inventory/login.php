<?php
//-------------------------------------------------------------------------------------------------
//   IT Inventory
//      © 2025 Remus Rigo
//         v1.0.20260902
//-------------------------------------------------------------------------------------------------

// Load config file
$configPath = __DIR__ . '/json/config.json';
$config = json_decode(file_get_contents($configPath), true);
$User = $config['User'] ?? 'root';
$UserPsw = $config['UserPsw'] ?? '';

session_start();
$pdo = new PDO("mysql:host=localhost;dbname=ITDB;charset=utf8", $User, $UserPsw);
$username = $_POST['username'];
$password = $_POST['password'];
$stmt = $pdo->prepare("SELECT id, username, password FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['password']))
{
   $_SESSION['user_id'] = $user['id'];
   $_SESSION['username'] = $user['username'];

   header("Location: index.php");
   exit;
}
else
{
   echo "Invalid username or password";
}

?>
