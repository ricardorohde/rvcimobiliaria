-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Fev 03, 2013 as 02:38 AM
-- Versão do Servidor: 5.1.44
-- Versão do PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `RVCIMOBILIARIA`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `id_estado` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `uf` char(2) NOT NULL,
  `estado` varchar(19) NOT NULL,
  PRIMARY KEY (`id_estado`),
  UNIQUE KEY `estado` (`estado`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Extraindo dados da tabela `estados`
--

INSERT INTO `estados` (`id_estado`, `uf`, `estado`) VALUES
(1, 'AC', 'Acre'),
(2, 'AL', 'Alagoas'),
(3, 'AP', 'Amapá'),
(4, 'AM', 'Amazonas'),
(5, 'BA', 'Bahia'),
(6, 'CE', 'Ceará'),
(7, 'DF', 'Distrito Federal'),
(8, 'ES', 'Espirito Santo'),
(9, 'GO', 'Goiás'),
(10, 'MA', 'Maranhão'),
(11, 'MT', 'Mato Grosso'),
(12, 'MS', 'Mato Grosso do Sul'),
(13, 'MG', 'Minas Gerais'),
(14, 'PA', 'Pará'),
(15, 'PB', 'Paraíba'),
(16, 'PR', 'Paraná'),
(17, 'PE', 'Pernambuco'),
(18, 'PI', 'Piauí'),
(19, 'RN', 'Rio Grande do Norte'),
(20, 'RS', 'Rio Grande do Sul'),
(21, 'RJ', 'Rio de Janeiro'),
(22, 'RO', 'Rondônia'),
(23, 'RR', 'Roraima'),
(24, 'SC', 'Santa Catarina'),
(25, 'SP', 'São Paulo'),
(26, 'SE', 'Sergipe'),
(27, 'TO', 'Tocantins');

-- --------------------------------------------------------

--
-- Estrutura da tabela `IMOVEL`
--

CREATE TABLE IF NOT EXISTS `IMOVEL` (
  `ID_IMOVEL` int(6) NOT NULL AUTO_INCREMENT,
  `TIPO_IMOVEL` char(1) NOT NULL,
  `STATUS_IMOVEL` char(1) NOT NULL,
  `DESTAQUE_IMOVEL` char(1) NOT NULL,
  `NOME_IMOVEL` varchar(50) NOT NULL,
  `AREA_IMOVEL` double NOT NULL,
  `QUARTO_IMOVEL` int(11) NOT NULL,
  `BANHEIRO_IMOVEL` int(11) NOT NULL,
  `GARAGEM_IMOVEL` int(11) NOT NULL,
  `MINIDESC_IMOVEL` varchar(90) NOT NULL,
  `DESC_IMOVEL` text NOT NULL,
  `CIDADE_IMOVEL` varchar(50) NOT NULL,
  `VALOR_IMOVEL` varchar(20) NOT NULL,
  `THUMB_IMOVEL` varchar(200) NOT NULL,
  `INFRA_IMOVEL` text NOT NULL,
  `PAGAMENTO_IMOVEL` text NOT NULL,
  `CARACTERISTICA_IMOVEL` text NOT NULL,
  `BAIRRO_IMOVEL` varchar(50) NOT NULL,
  `CONDOMINIO_IMOVEL` varchar(50) NOT NULL,
  `IMG1_IMOVEL` varchar(200) NOT NULL,
  `IMG2_IMOVEL` varchar(200) DEFAULT NULL,
  `IMG3_IMOVEL` varchar(200) DEFAULT NULL,
  `IMG4_IMOVEL` varchar(200) DEFAULT NULL,
  `IMG5_IMOVEL` varchar(200) DEFAULT NULL,
  `IMG6_IMOVEL` varchar(200) DEFAULT NULL,
  `IMG7_IMOVEL` varchar(200) DEFAULT NULL,
  `IMG8_IMOVEL` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID_IMOVEL`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `IMOVEL`
--

INSERT INTO `IMOVEL` (`ID_IMOVEL`, `TIPO_IMOVEL`, `STATUS_IMOVEL`, `DESTAQUE_IMOVEL`, `NOME_IMOVEL`, `AREA_IMOVEL`, `QUARTO_IMOVEL`, `BANHEIRO_IMOVEL`, `GARAGEM_IMOVEL`, `MINIDESC_IMOVEL`, `DESC_IMOVEL`, `CIDADE_IMOVEL`, `VALOR_IMOVEL`, `THUMB_IMOVEL`, `INFRA_IMOVEL`, `PAGAMENTO_IMOVEL`, `CARACTERISTICA_IMOVEL`, `BAIRRO_IMOVEL`, `CONDOMINIO_IMOVEL`, `IMG1_IMOVEL`, `IMG2_IMOVEL`, `IMG3_IMOVEL`, `IMG4_IMOVEL`, `IMG5_IMOVEL`, `IMG6_IMOVEL`, `IMG7_IMOVEL`, `IMG8_IMOVEL`) VALUES
(1, 'A', 'A', 'S', 'Apartamento', 70, 3, 1, 1, 'Apartamento bem localizado no bairro universit&aacute;rio', 'Apartamento Padr&atilde;o a venda no bairro universit&aacute;rio ideal para quem quer morar proximo ao campus da UFV, 3 quartos, 1 sala, 1 cozinha estilo americana, 1 &aacute;rea de servi&ccedil;o, 1 banheiro e 1 sala de estar.', 'Rio Parana&iacute;ba', '95.000,00', 'images/imoveis/thumbs/imovel0001.jpg', '<li>Port&atilde;o El&eacute;trico</li>\r\n<li>Cerca El&eacute;trica</li>', '<li>Disposto a negociar</li>', '<li>Piso frio</li>\r\n<li>Banheiro com box</li>\r\n<li>Sala de TV</li>\r\n<li>Cozinha americana</li>', 'Universit&aacute;rio', 'N&atilde;o Informado', 'images/imoveis/0001/01.jpg', 'images/imoveis/0001/02.jpg', 'images/imoveis/0001/03.jpg', 'images/imoveis/0001/04.jpg', 'images/imoveis/0001/05.jpg', 'images/imoveis/0001/06.jpg', 'images/imoveis/0001/07.jpg', 'images/imoveis/0001/08.jpg'),
(2, 'C', 'A', 'S', 'Casa', 50, 2, 1, 2, 'Teste de query', 'teste de consulta', 'Rio Parana&iacute;ba', '300.000,00', 'images/imoveis/thumbs/imovel0002.jpg', '<li>Teste</li>', '<li>Teste</li>', '<li>Teste</li>', 'Novo Rio', '0', 'images/imoveis/0002/01.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `IMOVEL_CADASTRADO`
--

CREATE TABLE IF NOT EXISTS `IMOVEL_CADASTRADO` (
  `ID_IMOVEL_CADASTRADO` int(6) NOT NULL AUTO_INCREMENT,
  `TIPO_CLIENTE` set('V','C','L','I','O') NOT NULL COMMENT 'V=e;S=Suspense;P=Policial;F=Ficção',
  `NOME_CLIENTE` varchar(200) NOT NULL,
  `ENDERECO_CLIENTE` varchar(400) DEFAULT NULL,
  `TELEFONE_CLIENTE` int(11) NOT NULL,
  `CELULAR_CLIENTE` int(11) DEFAULT NULL,
  `EMAIL_CLIENTE` varchar(200) DEFAULT NULL,
  `TIPO_IMOVEL` varchar(30) NOT NULL,
  `CEP_IMOVEL` int(8) DEFAULT NULL,
  `CIDADE_IMOVEL` varchar(100) DEFAULT NULL,
  `ESTADO_IMOVEL` varchar(100) DEFAULT NULL,
  `ENDERECO_IMOVEL` varchar(200) DEFAULT NULL,
  `NUMERO_IMOVEL` int(10) DEFAULT NULL,
  `DESCRICAO_IMOVEL` text NOT NULL,
  `VALOR_IMOVEL` int(20) NOT NULL,
  `CONDOMINIO_IMOVEL` int(20) DEFAULT NULL,
  PRIMARY KEY (`ID_IMOVEL_CADASTRADO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `IMOVEL_CADASTRADO`
--

