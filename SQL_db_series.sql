--
-- Base de Dados: `db_series`
--
CREATE DATABASE IF NOT EXISTS `db_series` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_series`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_series`
--

CREATE TABLE IF NOT EXISTS `tb_series` (
  `CODIGO` int NOT NULL AUTO_INCREMENT,
  `NOME` varchar(20) NOT NULL,
  `GENERO` varchar(20) NOT NULL,
  `CENSURA` varchar(20) NOT NULL,
  `TEMPORADAS` int NOT NULL,
  `DESCRICAO` varchar(300) NOT NULL,
  `FOTO` varchar(50) NOT NULL,
  PRIMARY KEY (`CODIGO`)
) DEFAULT CHARSET=utf8;

-- ------------------------


--
-- Usuário BD
-- 

CREATE USER 'aluno'@'localhost' IDENTIFIED BY 'aluno';

GRANT ALL PRIVILEGES ON `db_series` . * TO 'aluno'@'localhost';