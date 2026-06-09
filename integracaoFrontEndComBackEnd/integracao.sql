CREATE DATABASE IF NOT EXISTS integracao_backend_com_frontend
CHARACTER SET utf8mb4
COLLATE utf8mb4_general_ci;

USE integracao_backend_com_frontend;

-- ----------------------------
-- Tabela: nivel_acesso
-- ----------------------------
CREATE TABLE nivel_acesso (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nivel_acesso VARCHAR(100) NOT NULL,
    created_at DATETIME NULL,
    updated_at DATETIME NULL
) ENGINE=InnoDB;

-- ----------------------------
-- Tabela: usuarios
-- ----------------------------
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    data_nascimento DATE NULL,
    telefone VARCHAR(20) NULL,
    created_at DATETIME NULL,
    updated_at DATETIME NULL,
    nivel_acesso_id INT NOT NULL,

    INDEX idx_nivel_acesso (nivel_acesso_id),

    CONSTRAINT fk_usuarios_nivel_acesso
        FOREIGN KEY (nivel_acesso_id)
        REFERENCES nivel_acesso(id)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ----------------------------
-- Tabela: turmas
-- ----------------------------
CREATE TABLE turmas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    turma VARCHAR(100) NOT NULL,
    ano INT NULL,
    sala VARCHAR(100) NULL,
    quantidade_alunos INT NULL,
    created_at DATETIME NULL,
    updated_at DATETIME NULL
) ENGINE=InnoDB;

SELECT * FROM nivel_acesso;