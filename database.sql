-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.14-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela crud.keys
CREATE TABLE IF NOT EXISTS `keys` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `api_key` varchar(255) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` int(1) NOT NULL,
  `is_private_key` int(1) NOT NULL,
  `ip_addresses` text NOT NULL,
  `date_created` date NOT NULL,
  `api_key_activated` enum('yes','no') NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela crud.keys: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `keys` DISABLE KEYS */;
INSERT INTO `keys` (`id`, `user_id`, `api_key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`, `api_key_activated`) VALUES
	(1, 1, 'crud@2022', 0, 0, 0, '', '0000-00-00', 'yes');
/*!40000 ALTER TABLE `keys` ENABLE KEYS */;

-- Copiando estrutura para tabela crud.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela crud.migrations: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`version`) VALUES
	(3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Copiando estrutura para tabela crud.salario
CREATE TABLE IF NOT EXISTS `salario` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `salario` varchar(255) NOT NULL,
  `salario_atual` enum('yes','no') NOT NULL DEFAULT 'yes',
  `date_created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela crud.salario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `salario` DISABLE KEYS */;
/*!40000 ALTER TABLE `salario` ENABLE KEYS */;

-- Copiando estrutura para tabela crud.users
CREATE TABLE IF NOT EXISTS `users` (
  `codigo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nomecompleto` varchar(300) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `data_nasc` date NOT NULL,
  `cep` varchar(20) NOT NULL,
  `endereco` varchar(300) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `cidade` varchar(300) NOT NULL,
  `estado` varchar(2) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela crud.users: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
