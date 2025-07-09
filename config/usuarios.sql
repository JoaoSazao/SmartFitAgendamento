CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO usuarios (nome, email, senha)
VALUES ('SmartFitAdmin', 'smartadm@smartfit.com', '$2y$12$qzEOJiT38Jc6K5QQIBLRSO1XDRIz9WN7jrz6mGyQywRhKhnLAvDXq'); -- substitua pelo hash real

CREATE TABLE pagamentos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome_cartao VARCHAR(100),
  numero_cartao VARCHAR(20),
  validade VARCHAR(7),
  cvv VARCHAR(4),
  plano_escolhido VARCHAR(20),
  valor DECIMAL(10,2),
  data_pagamento TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
