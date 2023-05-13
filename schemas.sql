CREATE TABLE admin (
  admin_id INT AUTO_INCREMENT PRIMARY KEY,
  admin_name VARCHAR(128) NOT NULL,
  admin_email VARCHAR(255) UNIQUE NOT NULL,
  admin_password VARCHAR(255) NOT NULL
);