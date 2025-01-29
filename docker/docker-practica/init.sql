CREATE TABLE libro (
    id SERIAL PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL
);

INSERT INTO libro (titulo, autor) VALUES
('Amor en pena', 'Jesús Terino Rodriguez'),
('Ricitos de oro', 'Jesús Rodriguez Mercado'),
('El laberinto del fauno', 'Alejandro Pintado López');
