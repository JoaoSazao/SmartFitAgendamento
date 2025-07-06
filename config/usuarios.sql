CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO usuarios (nome, email, senha)
VALUES ('João da Silva', 'joao@email.com', '$2y$12$eVSoJ8rReJqtHINNb0E4vubqwYnavGmTbyIJvaiF0GZxIf7opvODK'); -- substitua pelo hash real

