# IT Inventory: User's Guide

> IT Inventory is **in progress**.



## Requirements

* A web server with **PHP** and **MySQL/MariaDB**, e.g. [XAMPP](https://www.apachefriends.org) installed in `C:\xampp`
* A web browser



## Install (XAMPP)

1. Install XAMPP and start **Apache** and **MySQL** from the XAMPP Control Panel.
2. Download the latest release from the [Releases page](https://github.com/RemusRigo/ITInventory-WebDev/releases) and extract it.
3. Open the `Install` folder and double-click `Install XAMPP.bat`. It:
   * copies the `IT Inventory` folder to `C:\xampp\htdocs\IT Inventory`;
   * creates the `it_db` database and its tables from `it_db.sql` (enter the MySQL `root` password when asked; it is empty on a new XAMPP).
4. Open `C:\xampp\htdocs\IT Inventory\json\config.json` and set the MySQL user, its password and the language:

   ```json
   {
       "User": "root",
       "UserPsw": "<your MySQL password>",
       "language": "en"
   }
   ```

   `language`: `en` (English) or `ro` (Romanian).
5. Open <http://localhost/IT%20Inventory/> and sign in:

   |User|Password|
   |-|-|
   |`admin`|`admin`|

> **Security:** change the `admin` password, and don't make the site reachable from the internet.
> Anyone who can open the site can also download `json/config.json`, which holds the MySQL password, so on a shared network
> use a MySQL account that has rights only on `it_db` (not `root`).



## Usage

|Menu|Description|
|-|-|
|*categories*|The device categories from the database; click one to list its devices (empty columns are hidden)|
|**List Locations**|All locations; click one to see its devices|
|**List IP's**|All IP addresses and the devices they belong to|
|**Search**|Search the devices|
|**Add device**|Add a new device *(admin)*|
|**Manage IP's**|Add IP ranges and link IP's to devices *(admin)*|

* Click a device's **ID** to edit it.
* Click a column header to sort the table.
* Devices with status **Disposed** are shown with a colored row.
* Each list shows how many records were found and how long the query took.

### Device fields

|Field|Description|
|-|-|
|**Host Name**, **Description**|Name and description of the device|
|**Manufacturer**, **Model**, **Category**|What the device is|
|**Inventory**, **SN**, **PN**, **Firmware**|Inventory number, serial number, part number, firmware version|
|**IP**, **IP is active**, **IP 2**|IP addresses (from the IP list)|
|**Ethernet MAC** (2), **Bluetooth**|MAC addresses|
|**Port**, **Phone Number**|Network port, phone number|
|**Custodian**, **Location**|Who has the device and where it is|
|**Status**, **Purchased**, **Disposed**|Status and dates|
|**Notes**|Free text (paragraphs are kept)|



## Uninstall

1. Delete the folder `C:\xampp\htdocs\IT Inventory`.
2. Optional: drop the database (in phpMyAdmin, or `DROP DATABASE it_db;`).
