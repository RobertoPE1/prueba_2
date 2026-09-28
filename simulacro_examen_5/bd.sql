-- Creamos la base de datos
CREATE DATABASE IF NOT EXISTS fruta_temporada;
USE fruta_temporada;

-- Creamos la tabla
CREATE TABLE IF NOT EXISTS fruta (
    id INT AUTO_INCREMENT PRIMARY KEY,   -- Identificador único
     nombre VARCHAR(150) NOT NULL,        -- Título del objeto
      calidad VARCHAR(100) NOT NULL, -- 
      precio VARCHAR(50) NOT NULL     -- Plataforma 
   
);
