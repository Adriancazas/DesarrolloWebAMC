CREATE DATABASE tarea4;

USE tarea4;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    correo VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE hobbies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fotografia VARCHAR(255) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT
);

-- Insertar un usuario de ejemplo (contraseña: 123456)
INSERT INTO usuarios (correo, password) VALUES 
('usuario@ejemplo.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');