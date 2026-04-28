-- Datenbank erstellen, wenn nicht vorhanden
CREATE DATABASE IF NOT EXISTS walletApp_db
  DEFAULT CHARACTER SET utf8mb4
  DEFAULT COLLATE utf8mb4_general_ci;

-- In die Datenbank wechseln
USE walletApp_db;

-- Tabelle 'users' erstellen
CREATE TABLE IF NOT EXISTS users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    guthaben DECIMAL(10, 2) NOT NULL,
    regdatum TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP  
);

-- Tabelle 'transaktionen' erstellen
CREATE TABLE IF NOT EXISTS transaktionen (
    transaktion_id INT AUTO_INCREMENT PRIMARY KEY,
    username_sender VARCHAR(50) NOT NULL,
    username_empfaenger VARCHAR(50) NOT NULL,
    betrag DECIMAL(10, 2) NOT NULL,
    datum TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    verwendungszweck VARCHAR(50)
);
