<?php
//-------------------------------------------------------------------------------------------------
//   IT Inventory
//      © 2025 Remus Rigo
//         v2026-05-21
//   header
//-------------------------------------------------------------------------------------------------

$configPath = __DIR__ . '/../json/config.json';

echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "\n<head>";
echo "\n<title name=''>IT Inventory</title>";
echo "\n<meta charset='UTF-8'>";

if (empty($_SESSION['user_id']))
{
   echo "\n<link rel='stylesheet' href='css/login.css'>";
}

echo "\n<link rel='stylesheet' href='css/main.css'>";
echo "\n<link rel='stylesheet' href='css/edit.css'>";
echo "\n<link rel='stylesheet' href='css/menu_xp.css'>";

if (isset($_GET['cat']))
{
   echo "\n<script src='js/show_devices.js' defer></script>";
   echo "\n<script src='js/update_filter.js' defer></script>";
   echo "\n<script src='js/hide_columns.js'></script>";
}

if (isset($_GET['addDevice']) or isset($_GET['updateDevice']))
{
   echo "\n<link href='https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css' rel='stylesheet'/>";
   echo "\n<script src='https://code.jquery.com/jquery-3.6.0.min.js' defer></script>";
   echo "\n<script src='https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js' defer></script>";
}

echo "\n</head>\n<body>";

// Load config file
$configPath = __DIR__ . '/../json/config.json';
$config = json_decode(file_get_contents($configPath), true);

// get settings (if missing load defaults)
$langCode = $config['language'] ?? 'en';
$User = $config['User'] ?? 'root';
$UserPsw = $config['UserPsw'] ?? '';

// Get language data
$langFile = "json/lng/{$langCode}.json";
if (file_exists($langFile))
{
   $cfgLang = json_decode(file_get_contents($langFile), true);
}
else
{
   $cfgLang = []; // fallback if file missing
}

?>