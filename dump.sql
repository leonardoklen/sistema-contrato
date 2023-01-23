CREATE SCHEMA cama_inbox;
USE cama_inbox;

-- cama_inbox.departamento definition

CREATE TABLE `departamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- cama_inbox.indice definition

CREATE TABLE `indice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- cama_inbox.tipo_cobranca definition

CREATE TABLE `tipo_cobranca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- cama_inbox.tipo_contrato definition

CREATE TABLE `tipo_contrato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- cama_inbox.tipo_empresa definition

CREATE TABLE `tipo_empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- cama_inbox.tipo_renovacao definition

CREATE TABLE `tipo_renovacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- cama_inbox.usuario definition

CREATE TABLE `usuario` (
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `senha` varchar(100) NOT NULL,
  PRIMARY KEY (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- cama_inbox.empresa definition

CREATE TABLE `empresa` (
  `cnpj` varchar(14) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  `id_tipo_empresa` int(11) NOT NULL,
  PRIMARY KEY (`cnpj`),
  KEY `empresa_FK` (`id_tipo_empresa`),
  CONSTRAINT `empresa_FK` FOREIGN KEY (`id_tipo_empresa`) REFERENCES `tipo_empresa` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- cama_inbox.filial definition

CREATE TABLE `filial` (
  `cnpj` varchar(14) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `cnpj_empresa` varchar(14) NOT NULL,
  PRIMARY KEY (`cnpj`),
  KEY `filial_FK` (`cnpj_empresa`),
  CONSTRAINT `filial_FK` FOREIGN KEY (`cnpj_empresa`) REFERENCES `empresa` (`cnpj`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- cama_inbox.contrato definition

CREATE TABLE `contrato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cnpj_contratante` varchar(14) NOT NULL,
  `cnpj_contratado` varchar(14) NOT NULL,
  `data_assinatura` date NOT NULL,
  `data_vencimento` date NOT NULL,
  `id_tipo_contrato` int(11) NOT NULL,
  `id_tipo_renovacao` int(11) NOT NULL,
  `id_tipo_cobranca` int(11) NOT NULL,
  `id_indice` int(11) NOT NULL,
  `multa` tinyint(1) NOT NULL,
  `aviso_previo` tinyint(1) NOT NULL,
  `anexo` varchar(200) NOT NULL,
  `situacao` tinyint(1) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `contrato_FK_1` (`cnpj_contratado`),
  KEY `contrato_FK_2` (`id_departamento`),
  KEY `contrato_FK_3` (`id_tipo_contrato`),
  KEY `contrato_FK_4` (`id_tipo_renovacao`),
  KEY `contrato_FK_5` (`id_tipo_cobranca`),
  KEY `contrato_FK_6` (`id_indice`),
  KEY `contrato_FK` (`cnpj_contratante`),
  CONSTRAINT `contrato_FK` FOREIGN KEY (`cnpj_contratante`) REFERENCES `filial` (`cnpj`),
  CONSTRAINT `contrato_FK_1` FOREIGN KEY (`cnpj_contratado`) REFERENCES `empresa` (`cnpj`),
  CONSTRAINT `contrato_FK_2` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id`),
  CONSTRAINT `contrato_FK_3` FOREIGN KEY (`id_tipo_contrato`) REFERENCES `tipo_contrato` (`id`),
  CONSTRAINT `contrato_FK_4` FOREIGN KEY (`id_tipo_renovacao`) REFERENCES `tipo_renovacao` (`id`),
  CONSTRAINT `contrato_FK_5` FOREIGN KEY (`id_tipo_cobranca`) REFERENCES `tipo_cobranca` (`id`),
  CONSTRAINT `contrato_FK_6` FOREIGN KEY (`id_indice`) REFERENCES `indice` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- cama_inbox.aditivo definition

CREATE TABLE `aditivo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_contrato` int(11) NOT NULL,
  `data` date NOT NULL,
  `observacao` varchar(200) NOT NULL,
  `anexo` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `aditivo_FK` (`id_contrato`),
  CONSTRAINT `aditivo_FK` FOREIGN KEY (`id_contrato`) REFERENCES `contrato` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO cama_inbox.aditivo
(id, id_contrato, `data`, observacao, anexo)
VALUES(1, 83, '2023-01-21', 'adsdas', '63cc51b553ce5.png');
INSERT INTO cama_inbox.aditivo
(id, id_contrato, `data`, observacao, anexo)
VALUES(2, 83, '2023-01-28', 'TESTE TI', '63cc548969209.png');
INSERT INTO cama_inbox.aditivo
(id, id_contrato, `data`, observacao, anexo)
VALUES(3, 83, '2023-01-27', 'TESTE TI', '63cc551968a67.pdf');
INSERT INTO cama_inbox.aditivo
(id, id_contrato, `data`, observacao, anexo)
VALUES(4, 85, '2023-01-21', 'TESTE', '63cc56959f5b3.pdf');


INSERT INTO cama_inbox.contrato
(id, cnpj_contratante, cnpj_contratado, data_assinatura, data_vencimento, id_tipo_contrato, id_tipo_renovacao, id_tipo_cobranca, id_indice, multa, aviso_previo, anexo, situacao, id_departamento)
VALUES(83, '90263242000160', '78467576000150', '2023-01-21', '2023-01-28', 1, 1, 1, 2, 1, 1, '63cc3c43d6046.png', 1, 1);
INSERT INTO cama_inbox.contrato
(id, cnpj_contratante, cnpj_contratado, data_assinatura, data_vencimento, id_tipo_contrato, id_tipo_renovacao, id_tipo_cobranca, id_indice, multa, aviso_previo, anexo, situacao, id_departamento)
VALUES(84, '90263242000160', '78467576000150', '2023-01-21', '2023-01-21', 1, 1, 1, 2, 1, 1, '63cc3eda460b1.png', 0, 1);
INSERT INTO cama_inbox.contrato
(id, cnpj_contratante, cnpj_contratado, data_assinatura, data_vencimento, id_tipo_contrato, id_tipo_renovacao, id_tipo_cobranca, id_indice, multa, aviso_previo, anexo, situacao, id_departamento)
VALUES(85, '90263242000160', '78467576000150', '2023-01-01', '2023-01-21', 1, 1, 1, 2, 1, 1, '63cc5640660f6.pdf', 1, 1);


INSERT INTO cama_inbox.departamento
(id, nome)
VALUES(1, 'Financeiro - CC 25001');
INSERT INTO cama_inbox.departamento
(id, nome)
VALUES(2, 'Cobrança - CC 26001');


INSERT INTO cama_inbox.empresa
(cnpj, nome, email, telefone, id_tipo_empresa)
VALUES('29149966000258', 'CAMA INBOX INDUSTRIA E COMERCIO DE MOVEIS LTDA', 'teste@teste.com.br', '44999999999', 1);
INSERT INTO cama_inbox.empresa
(cnpj, nome, email, telefone, id_tipo_empresa)
VALUES('36945575000124', 'SOFA INBOX', 'teste@teste.com.br', '44999999999', 1);
INSERT INTO cama_inbox.empresa
(cnpj, nome, email, telefone, id_tipo_empresa)
VALUES('78467576000150', 'FK Sistemas', 'teste@teste.com.br', '44999999999', 2);


INSERT INTO cama_inbox.filial
(cnpj, nome, cnpj_empresa)
VALUES('04592384000130', 'FL 2 - Cianorte-PR', '36945575000124');
INSERT INTO cama_inbox.filial
(cnpj, nome, cnpj_empresa)
VALUES('56716075000128', 'FL 2 - Cianorte-PR', '29149966000258');
INSERT INTO cama_inbox.filial
(cnpj, nome, cnpj_empresa)
VALUES('77065906000119', 'FL 1 - Umuarama-PR', '36945575000124');
INSERT INTO cama_inbox.filial
(cnpj, nome, cnpj_empresa)
VALUES('90263242000160', 'FL 1 - Umuarama-PR', '29149966000258');


INSERT INTO cama_inbox.indice
(id, descricao)
VALUES(1, 'IGP-M');
INSERT INTO cama_inbox.indice
(id, descricao)
VALUES(2, 'IPCA');


INSERT INTO cama_inbox.tipo_cobranca
(id, descricao)
VALUES(1, 'Assessoria jurídica');
INSERT INTO cama_inbox.tipo_cobranca
(id, descricao)
VALUES(2, 'E-mail');


INSERT INTO cama_inbox.tipo_contrato
(id, descricao)
VALUES(1, 'Tempo determinado');
INSERT INTO cama_inbox.tipo_contrato
(id, descricao)
VALUES(2, 'Tempo indeterminado');


INSERT INTO cama_inbox.tipo_empresa
(id, descricao)
VALUES(1, 'Contratante');
INSERT INTO cama_inbox.tipo_empresa
(id, descricao)
VALUES(2, 'Contratada');


INSERT INTO cama_inbox.tipo_renovacao
(id, descricao)
VALUES(1, 'Anual');
INSERT INTO cama_inbox.tipo_renovacao
(id, descricao)
VALUES(2, 'Semestral');