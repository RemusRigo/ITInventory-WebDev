-- Create Database --------------------------------------------------------------------------------

CREATE DATABASE it_db
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_general_ci;

USE it_db;

-- Create Users table -----------------------------------------------------------------------------

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO users VALUES (1, 'admin', '$2y$10$lSPDIca/R4P056Jp2KJxLe0JXmtLCZpsmQ2f2cBfbTEq/BBAtHBmG');

-- Create Devices table ---------------------------------------------------------------------------

CREATE TABLE devices (
   id INT AUTO_INCREMENT PRIMARY KEY,
   name VARCHAR(100) NOT NULL,
   device VARCHAR(100) NULL,
   manufacturer VARCHAR(100),
   model VARCHAR(100),
   category_id INT NULL,
   inventory VARCHAR(50) NULL,
   sn VARCHAR(100) NULL,
   ip_id INT NULL, -- VARCHAR(15) NULL CHECK (ip = '' OR ip IS NULL OR ip REGEXP '^[0-9]{1,3}(\\.[0-9]{1,3}){3}$'),
   ip_isactive tinyint(1) NOT NULL DEFAULT 0,
   ip2_id INT NULL,
   phone_no VARCHAR(20),
   IMEI1 varchar(15) DEFAULT NULL,
   IMEI2 varchar(15) DEFAULT NULL,
   mac varchar(17) DEFAULT NULL CHECK (mac = '' or mac is null or mac regexp '^[A-Fa-f0-9]{2}(:[A-Fa-f0-9]{2}){5}$'),
   mac2 varchar(17) DEFAULT NULL CHECK (mac = '' or mac is null or mac regexp '^[A-Fa-f0-9]{2}(:[A-Fa-f0-9]{2}){5}$'),
   bt VARCHAR(50) NULL,
   pn VARCHAR(100) NULL,
   firmware VARCHAR(100),
   custodian varchar(150) NULL,
   location1 INT,
   location2 VARCHAR(100),
   status_id INT DEFAULT 0,
   purchased DATE,
   disposed DATE,
   notes TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Create Category table --------------------------------------------------------------------------

CREATE TABLE category (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Create Status table --------------------------------------------------------------------------

CREATE TABLE status (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Create IP table --------------------------------------------------------------------------------

CREATE TABLE ip (
  ID int(10) AUTO_INCREMENT PRIMARY KEY,
  IPv4 varchar(15) NOT NULL CHECK (IPv4 regexp '^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$')
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Create Locations table -------------------------------------------------------------------------

CREATE TABLE locations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

