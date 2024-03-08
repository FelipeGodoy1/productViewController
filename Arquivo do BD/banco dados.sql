
/*Criaçao do banco de dados*/
CREATE DATABASE agenda;


/*Utilização do banco de dados*/
USE agenda;


/*Criaçao da estrutura e das tabelas*/
CREATE TABLE contato (
	id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(45),
    idade INT
);

CREATE TABLE email (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(45),
    perfil VARCHAR(45),
    contato_id INT,
    FOREIGN KEY (contato_id)
        REFERENCES contato (id)
);

CREATE TABLE telefone (
    id INT PRIMARY KEY AUTO_INCREMENT,
    telefone VARCHAR(45),
    perfil VARCHAR(45),
    contato_id INT,
    FOREIGN KEY (contato_id)
        REFERENCES contato (id)
);

CREATE TABLE endereco (
    id INT PRIMARY KEY AUTO_INCREMENT,
    estado VARCHAR(45),
    cidade VARCHAR(45),
    bairro VARCHAR(45),
    rua VARCHAR(45),
    numero VARCHAR(45),
    complemento VARCHAR(45),
    observacao VARCHAR(45),
    contato_id INT,
    FOREIGN KEY (contato_id)
        REFERENCES contato (id)
);


CREATE TABLE servico (
	id INT PRIMARY KEY AUTO_INCREMENT,
    nome TEXT,
    categoria TEXT,
    valor DECIMAL(10,2),
    valor_adicional DECIMAL(10,2),
    garantia INT,
	contato_id INT,
    FOREIGN KEY (contato_id)
        REFERENCES contato (id)
);




/* inserindo dados das tabelas */
INSERT INTO contato ( nome, idade ) VALUES ( 'Dorindo Josias Damásio', 29 );
INSERT INTO contato ( nome, idade ) VALUES ( 'Emiliana Fernanda Candeias', 32 );
INSERT INTO contato ( nome, idade ) VALUES ( 'Romão Dino Rosmaninho', 22 );
INSERT INTO contato ( nome, idade ) VALUES ( 'Odete Liedson Tavares', 35 );
INSERT INTO contato ( nome, idade ) VALUES ( 'Quitério Valmor Robalinho', 42 );
INSERT INTO contato ( nome, idade ) VALUES ( 'Armindo Soeiro Bugalho', 55 );
INSERT INTO contato ( nome, idade ) VALUES ( 'João Alberta Patrício', 45 );
INSERT INTO contato ( nome, idade ) VALUES ( 'Aurora Teodorico Couto', 20 );
INSERT INTO contato ( nome, idade ) VALUES ( 'Lúcio Trajano Caldas', 30 );
INSERT INTO contato ( nome, idade ) VALUES ( 'Samara Emanuela Rebouças', 19 );
INSERT INTO contato ( nome, idade ) VALUES ( 'Cora Délio Mafra', 43 );
INSERT INTO contato ( nome, idade ) VALUES ( 'Renata Cláudio Rebocho', 28 );
INSERT INTO contato ( nome, idade ) VALUES ( 'Teresina Quirino Rodovalho', 57 );
INSERT INTO contato ( nome, idade ) VALUES ( 'Israel Santiago Félix', 52 );
INSERT INTO contato ( nome, idade ) VALUES ( 'Fernando Firmino Rosmaninho', 26 );

SELECT * FROM contato;

INSERT INTO email (email, perfil, contato_id) VALUES ( 'DorindoJosias@outlook.com', 'pessoal', 1);
INSERT INTO email (email, perfil, contato_id) VALUES ( 'DorindoWeb@uol.com.br','profissional', 1);
INSERT INTO email (email, perfil, contato_id) VALUES ( 'Emiliana123@hotmail.com','pessoal',2 );
INSERT INTO email (email, perfil, contato_id) VALUES ( 'RomaDino@gmail.com','pessoal', 3 );
INSERT INTO email (email, perfil, contato_id) VALUES ( 'OdeteL@live.com.br','pessoal',4 );
INSERT INTO email (email, perfil, contato_id) VALUES ( 'OdetDonto@outlook.com','profissional', 4 );
INSERT INTO email (email, perfil, contato_id) VALUES ( 'Quiterio98@gmail.com', 'pessoal', 5);
INSERT INTO email (email, perfil, contato_id) VALUES ( 'ArmindoSoe@uol.com', 'pessoal', 6);
INSERT INTO email (email, perfil, contato_id) VALUES ( 'JoaoAlbert@mailbox.com', 'pessoal', 7);
INSERT INTO email (email, perfil, contato_id) VALUES ( 'JoaoConnect@Hushmail.com', 'profissional', 7 );
INSERT INTO email (email, perfil, contato_id) VALUES ( 'AuroraPatricio@hotmail.com', 'pessoal', 8 );
INSERT INTO email (email, perfil, contato_id) VALUES ( 'LucioTrajano98@proton.com', 'pessoal', 9 );
INSERT INTO email (email, perfil, contato_id) VALUES ( 'LucioMoveis@outlook.com', 'profissional', 9 );
INSERT INTO email (email, perfil, contato_id) VALUES ( 'SamaraManu@gmail.com', 'pessoal', 10 );
INSERT INTO email (email, perfil, contato_id) VALUES ( 'Cora_Delio@hotmail.com', 'pessoal', 11 );
INSERT INTO email (email, perfil, contato_id) VALUES ( 'Cora_Pneus@outlook.com', 'profissional', 11 );
INSERT INTO email (email, perfil, contato_id) VALUES ( 'Renatinha@proton.com', 'pessoal', 12 );
INSERT INTO email (email, perfil, contato_id) VALUES ( 'TeresinaQui985@gmail.com', 'pessoal', 13 );
INSERT INTO email (email, perfil, contato_id) VALUES ( 'Israel-Felix@uol.com', 'pessoal', 14 );
INSERT INTO email (email, perfil, contato_id) VALUES ( 'FernandoFirme@gmail.com', 'pessoal', 15 );
INSERT INTO email (email, perfil, contato_id) VALUES ( 'FernFuneraria@outlook.com', 'profissional', 15 );



SELECT * FROM email where contato_id > 10;

INSERT INTO telefone ( telefone, perfil, contato_id ) VALUES ( '19 97246-6750','pessoal',1);
INSERT INTO telefone ( telefone, perfil, contato_id ) VALUES ( '19 3379-5410', 'profissional', 1);
INSERT INTO telefone ( telefone, perfil, contato_id ) VALUES ( '18 98514-3828', 'pessoal', 2);
INSERT INTO telefone ( telefone, perfil, contato_id ) VALUES ( '15 97478-6582', 'pessoal', 3);
INSERT INTO telefone ( telefone, perfil, contato_id ) VALUES ( '19 98722-2488', 'pessoal', 4);
INSERT INTO telefone ( telefone, perfil, contato_id ) VALUES ( '19 3732-7856', 'profissional', 4);
INSERT INTO telefone ( telefone, perfil, contato_id ) VALUES ( '17 99112-3270', 'pessoal', 5);
INSERT INTO telefone ( telefone, perfil, contato_id ) VALUES ( '17 98271-3151', 'pessoal', 6);
INSERT INTO telefone ( telefone, perfil, contato_id ) VALUES ( '19 98812-9647', 'pessoal', 7);
INSERT INTO telefone ( telefone, perfil, contato_id ) VALUES ( '19 2765-1864', 'profissional', 7);
INSERT INTO telefone ( telefone, perfil, contato_id ) VALUES ( '13 97554-2031', 'pessoal', 8);
INSERT INTO telefone ( telefone, perfil, contato_id ) VALUES ( '18 98515-7685', 'pessoal', 9);
INSERT INTO telefone ( telefone, perfil, contato_id ) VALUES ( '18 2126-5973', 'profissional', 9);
INSERT INTO telefone ( telefone, perfil, contato_id ) VALUES ( '14 98546-7914', 'pessoal',10);
INSERT INTO telefone ( telefone, perfil, contato_id ) VALUES ( '17 99663-3462', 'pessoal',11);
INSERT INTO telefone ( telefone, perfil, contato_id ) VALUES ( '17 2450-7444', 'profissional',11);
INSERT INTO telefone ( telefone, perfil, contato_id ) VALUES ( '18 99279-8845', 'pessoal',12);
INSERT INTO telefone ( telefone, perfil, contato_id ) VALUES ( '17 98528-5450', 'pessoal',13);
INSERT INTO telefone ( telefone, perfil, contato_id ) VALUES ( '19 99951-9085', 'pessoal',14);
INSERT INTO telefone ( telefone, perfil, contato_id ) VALUES ( '19 98373-3107', 'pessoal',15);
INSERT INTO telefone ( telefone, perfil, contato_id ) VALUES ( '19 3603-6233', 'profissional',15);


SELECT * FROM telefone;

INSERT INTO endereco ( estado, cidade, bairro, rua, numero, complemento, observacao, contato_id) 
VALUES ('Sao Paulo', 'Araguaína', 'Industrial', 'Tiradentes', '3437', 'Loja 6', 'sem portao', 1);
INSERT INTO endereco ( estado, cidade, bairro, rua, numero, complemento, observacao, contato_id) 
VALUES ('Sao Paulo', 'Americana', 'Jardim São Roque', 'Rua A', '875', 'casa', 'sem detalhes ', 2);
INSERT INTO endereco ( estado, cidade, bairro, rua, numero, complemento, observacao, contato_id) 
VALUES ('São Paulo', 'Ribeirão Preto', 'Industrial', 'Santa Luzia', '1654', 'Anexo 4', 'edificio', 3);
INSERT INTO endereco ( estado, cidade, bairro, rua, numero, complemento, observacao, contato_id) 
VALUES ('São Paulo', 'Presidente Prudente', 'Boa Vista', 'Pernambuco', '6180', 'Terreo 3', 'sem detalhes', 4);
INSERT INTO endereco ( estado, cidade, bairro, rua, numero, complemento, observacao, contato_id) 
VALUES ('São Paulo', 'Santana de Parnaíba', 'Centro', 'Vinte e Dois', '6990', 'Sala 6', ' edificio', 5);
INSERT INTO endereco ( estado, cidade, bairro, rua, numero, complemento, observacao, contato_id) 
VALUES ('São Paulo', 'Mesquita', 'Santo Antônio', 'Tiradentes', '5621', 'Galeria 1', 'sem detalhes', 6);
INSERT INTO endereco ( estado, cidade, bairro, rua, numero, complemento, observacao, contato_id) 
VALUES ('São Paulo', 'Santa Barbara d Oeste', 'Planalto', 'Treze', '6750', 'Fazenda 2', ' sitio', 7);
INSERT INTO endereco ( estado, cidade, bairro, rua, numero, complemento, observacao, contato_id) 
VALUES ('São Paulo', 'Campinas', 'São José', 'Dezessete', '2122', 'Lote 5', 'bairro novo', 8);
INSERT INTO endereco ( estado, cidade, bairro, rua, numero, complemento, observacao, contato_id) 
VALUES ('São Paulo', 'Osasco', 'Bela Vista', 'Bela Vista', '3101', 'Casa 6', 'bar do zé', 9);
INSERT INTO endereco ( estado, cidade, bairro, rua, numero, complemento, observacao, contato_id) 
VALUES ('São Paulo', 'Pinhais', 'Vila Nova', 'Projetada', '5993', 'Anexo 1', 'sem detalhes', 10);
INSERT INTO endereco ( estado, cidade, bairro, rua, numero, complemento, observacao, contato_id) 
VALUES ('São Paulo', 'São Carlos', 'São José', 'Vinte e Dois', '8089', 'Casa 7', 'CCB', 11);
INSERT INTO endereco ( estado, cidade, bairro, rua, numero, complemento, observacao, contato_id) 
VALUES ('São Paulo', 'Canoas', 'São Cristóvão', 'Dom Pedro II', '9942', 'Conjunto 10', 'sem detalhes', 12);
INSERT INTO endereco ( estado, cidade, bairro, rua, numero, complemento, observacao, contato_id) 
VALUES ('São Paulo', 'Arapiraca', 'Santo Antônio', 'Duque de Caxias', '819', 'Portão 5', 'Bar do Tonho', 13);
INSERT INTO endereco ( estado, cidade, bairro, rua, numero, complemento, observacao, contato_id) 
VALUES ('São Paulo', 'Ariquemes', 'Industrial', 'São Francisco', '9392', 'Fundos 1', 'sem detalhes', 14);
INSERT INTO endereco ( estado, cidade, bairro, rua, numero, complemento, observacao, contato_id) 
VALUES ('São Paulo', 'São José do Rio Preto', 'Centro', 'Santos Dumont', '5798', 'Loja 8', 'rua sem saida', 15);


SELECT * FROM endereco;


INSERT INTO servico ( nome, categoria, valor, valor_adicional, garantia, contato_id)
VALUES ( 'Borracheiro', 'Automotivo', 120.00, 50.00, 60, 11);
INSERT INTO servico ( nome, categoria, valor, valor_adicional, garantia, contato_id) 
VALUES ( 'Programador Java', 'Desenvolvimento web', 200.00, 80.00, 90, 1);
INSERT INTO servico ( nome, categoria, valor, valor_adicional, garantia, contato_id) 
VALUES ( 'Funeraria', 'Serviço Social', 150.00, 60.00, 20, 15);
INSERT INTO servico ( nome, categoria, valor, valor_adicional, garantia, contato_id) 
VALUES ( 'Instalador Fibra Otica', 'Instalador', 120.00, 30.00, 40, 7);
INSERT INTO servico ( nome, categoria, valor, valor_adicional, garantia, contato_id) 
VALUES ( 'Instalador de Moveis', 'Instalador', 90.00, 30.00, 10, 9);
INSERT INTO servico ( nome, categoria, valor, valor_adicional, garantia, contato_id) 
VALUES ( 'Odontologia', 'Medicina Estetica', 180.00, 60.00, 90, 4);


SELECT * FROM servico;


SELECT 
    c.id,
    c.nome,
    c.idade,
    t.telefone,
    t.perfil as perfil_telefone,
    e.email,
    e.perfil as perfil_email,
    en.cidade,
    en.estado
FROM
    contato AS c,
    telefone AS t,
    email AS e,
    endereco as en
WHERE
    c.id = t.contato_id
        AND c.id = e.contato_id
        AND c.id = en.contato_id
        AND e.perfil = 'profissional'
        AND t.perfil = 'profissional'
ORDER BY c.nome;




SELECT 
    c.nome,
    t.id,
    t.telefone,
    t.perfil,
    en.cidade,
    en.bairro,
    s.nome,
    s.categoria,
    s.valor,
    s.valor_adicional,
    s.garantia,
    (s.valor + s.valor_adicional * 3) AS Orcamento
FROM
    contato AS c,
    telefone AS t,
    endereco AS en,
    servico AS s
WHERE
    c.id = t.contato_id
        AND c.id = en.contato_id
        AND c.id = s.contato_id
        AND t.perfil = 'profissional'
ORDER BY Orcamento ASC
LIMIT 1;

SELECT * FROM contato;

ALTER TABLE contato ADD cliente INT;
ALTER TABLE contato ADD prestador INT;



/*adicionar clientes a tabela*/
UPDATE contato
JOIN email ON contato.id = email.contato_id
SET prestador = 0,
cliente = 1
WHERE email.perfil = 'pessoal';

    


/*adicionar prestador de serviço*/
UPDATE contato
JOIN email ON contato.id = email.contato_id
SET prestador = 1,
cliente = 0
WHERE email.perfil = 'profissional';
