create database if not exists gestion;
use gestion;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Identificador único
    nombre VARCHAR(100) NOT NULL,      -- Nombre del usuario
    email VARCHAR(150) UNIQUE NOT NULL, -- Email (para login único)
    contraseña VARCHAR(255) NOT NULL,  -- Contraseña cifrada
    creado_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Fecha de creación
);

CREATE TABLE tareas (
    id INT AUTO_INCREMENT PRIMARY KEY,      -- Identificador único de la tarea
    usuario_id INT NOT NULL,                -- Usuario al que pertenece la tarea (clave foránea)
    titulo VARCHAR(255) NOT NULL,           -- Título o descripción corta de la tarea
    descripcion TEXT,                       -- Descripción completa de la tarea
    fecha_entrega DATE NOT NULL, -- Fecha de entrega de la tarea
	estado enum('to_do','doing','done'), 
    creada_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Fecha de creación
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE -- Relación con usuarios
);

INSERT INTO usuarios (nombre, email, contraseña) 
VALUES 
('victor_losada', 'victor.losada@gmail.com', '1234'),
('jaime_sanchez', 'jaime.sanchez@gmail.com', '4567');

INSERT INTO tareas (usuario_id, titulo, descripcion, fecha_entrega, estado) 
VALUES
(1, 'Entregable UD 02 HLC', 'Desarrollo de app web.', '2024-11-20','done'),
(1, 'Esquema WPF UD 03', 'Esquema resumen de la unidad 3.', '2024-11-22', 'doing'),
(2, 'Examen UD 03 WPF', 'Prepara el examen realizando de nuevo la práctica', '2024-11-25', 'to_do'),
(2, 'Entregable UD02 PSP', 'Realizar esquema para el entregable.', '2024-11-18', 'to_do');
