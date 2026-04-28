CREATE DATABASE driver_management;
USE driver_management;

-- Drivers Table
CREATE TABLE drivers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    mobile VARCHAR(15),
    license_no VARCHAR(50)
);

-- Driver Advance Table
CREATE TABLE driver_advance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    driver_id INT,
    amount DECIMAL(10,2),
    reason VARCHAR(255),
    advance_date DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (driver_id) REFERENCES drivers(id)
);
