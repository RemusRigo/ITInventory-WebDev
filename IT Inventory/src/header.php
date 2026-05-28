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
   echo "\n<link rel='stylesheet' href='css/Login.css'>";
   echo "\n<link rel='stylesheet' href='css/Markdown.css'>";
}

echo "\n<link rel='stylesheet' href='css/Main.css'>";
echo "\n<link rel='stylesheet' href='css/Menu.css'>";
echo "\n<link rel='stylesheet' href='css/Items.css'>";
echo "\n<link rel='stylesheet' href='css/EditDevice.css'>";

if (isset($_GET['cat']))
{
   echo "\n<script src='js/SortTableByColumn.js' defer></script>";
   echo "\n<script src='js/HideEmptyColumns.js'></script>";
   echo "\n<script src='js/update_filter.js' defer></script>";
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