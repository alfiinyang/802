-- Run this FIRST (before prodlist.sql).
-- Creates the flamingo database and the users table for login/registration.

CREATE DATABASE IF NOT EXISTS flamingo;

CREATE TABLE IF NOT EXISTS flamingo.users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(255) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL   -- stores a hash, never the plain password
);

