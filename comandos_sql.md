CREATE TABLE alunos(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(30) NOT NULL,
    primeira DECIMAL(3,1) NOT NULL,
    segunda DECIMAL(3,1) NOT NULL,
    media DECIMAL(3,1) NOT NULL,
    situacao VARCHAR(15) NOT NULL
);
INSERT INTO alunos(nome,primeira,segunda,media,situacao)VALUES(
    'guilherme',
    8,
    7.5,
    7.75,
    'aprovado'
);