-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09-Dez-2015 às 13:07
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `filmoes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bgs`
--

CREATE TABLE IF NOT EXISTS `bgs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(500) NOT NULL,
  `loc` int(2) NOT NULL,
  `ativo` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `bgs`
--

INSERT INTO `bgs` (`id`, `url`, `loc`, `ativo`) VALUES
(1, 'imagens/bg.jpg', 1, 0),
(2, 'imagens/bg2.jpg', 2, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cinemas`
--

CREATE TABLE IF NOT EXISTS `cinemas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `preco` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `cinemas`
--

INSERT INTO `cinemas` (`id`, `nome`, `preco`) VALUES
(1, 'Cinemark - Midway Mall', ''),
(2, 'Moviecom - Praia Shopping', ''),
(3, 'Cinépolis - Natal Shopping', '<p><font class="t1"> Salas Tradicionais </font> <br/> Seg., ter. <font class="hIco">EF</font>: R$ 17,00 <font class="hIco">M</font> e R$ 20,00 <font class="hIco">N</font> <br/> Qua. (exceto fer.): R$ 18,00 <font class="hIco">TD</font> <br/> Qui., sex., sáb., dom. e feriado: R$ 22,00 <font class="hIco">M</font> e R$ 25,00 <font class="hIco">N</font> <br/> </p> <p> <font class="t1"> Salas 3D </font> <br/> Seg., ter. <font class="hIco">EF</font>: R$ 26,00 <font class="hIco">TD</font> <br/> Qua. <font class="hIco">EF</font>: R$ 25,00 <font class="hIco">TD</font> <br/> Qui., sex., sáb., dom. e feriado: R$ 31,00 <font class="hIco">TD</font> <br/> </p> <p> <font class="t1"> Salas VIP </font> <br/> Seg., ter. <font class="hIco">EF</font>: R$ 33,00 <font class="hIco">TD</font> <br/> Qua. <font class="hIco">EF</font>: R$ 31,00 <font class="hIco">TD</font> <br/> Qui., sex., sáb., dom. e feriado: R$ 42,00 <font class="hIco">TD</font> <br/> </p> <p> <font class="t1"> Salas VIP 3D</font> <br/> Seg., ter. <font class="hIco">EF</font>: R$ 39,00 <font class="hIco">TD</font> <br/> Qua. <font class="hIco">EF</font>: R$ 37,00 <font class="hIco">TD</font> <br/> Qui., sex., sáb., dom. e feriado: R$ 45,00 <font class="hIco">TD</font> <br/> </p> <p> <font class="t1"> Salas Macro XE Tradicionais </font> <br/> Seg., ter. <font class="hIco">EF</font>: R$ 20,00 <font class="hIco">M</font> e R$ 23,00 <font class="hIco">N</font> <br/> Qua. <font class="hIco">EF</font>: R$ 21,00 <font class="hIco">TD</font> <br/> Qui., sex., sáb., dom. e feriado: R$ 25,00 <font class="hIco">M</font> e R$ 28,00 <font class="hIco">N</font> <br/>  </p> <p> <font class="t1">Salas Macro XE 3D</font> <br/> Seg., ter. <font class="hIco">EF</font>: R$ 29,00 <font class="hIco">TD</font> <br/> Qua. <font class="hIco">EF</font>: R$ 28,00 <font class="hIco">TD</font> <br/> Qui., sex., sáb., dom. e feriado: R$ 34,00 <font class="hIco">TD</font> <br/> </p> <p>\n <font class="hIco">OBS</font>: Matinê são todas as sessões iniciadas até 16h55 <br/> <font class="hIco">EF</font>: Exceto Feriado <br/> <font class="hIco">TD</font>: Todo o Dia <br/> <font class="hIco">M</font>: Matinê <br/> <font class="hIco">N</font>: Noite </p>'),
(4, 'Cinépolis - Norte Shopping', '<p> <font class="t1"> Salas Tradicionais </font> <br/> Seg., ter., qua. <font class="hIco">EF</font>: R$ 13,00 <font class="hIco">M</font> e R$ 15,00 <font class="hIco">N</font> Qui., sex., sáb., dom. e feriado: R$ 17,00 <font class="hIco">M</font> e R$ 19,00 <font class="hIco">N</font> </p> <p> <font class="t1"> Salas 3D </font> <br/> Seg., ter., qua. <font class="hIco">EF</font>: R$ 17,00 <font class="hIco">TD</font> Qui., sex., sáb., dom. e feriado: R$ 22,00 <font class="hIco">TD</font> </p> <p> <font class="t1"> Salas Macro XE Tradicionais </font> <br/> Seg., ter., qua. <font class="hIco">EF</font>: R$ 13,00 <font class="hIco">M</font> e R$ 15,00 <font class="hIco">N</font> Qui., sex., sáb., dom. e feriado: R$ 17,00 <font class="hIco">M</font> e R$ 19,00 <font class="hIco">N</font> </p> <p> <font class="t1"> Salas Macro XE 3D </font> <br/> Seg., ter., qua. <font class="hIco">EF</font>: R$ 17,00 <font class="hIco">TD</font> Qui., sex., sáb., dom. e feriado: R$ 22,00 <font class="hIco">TD</font> </p> <p> <font class="hIco">OBS</font>: Matinê são todas as sessões iniciadas até 16h55 <br/> <font class="hIco">EF</font>: Exceto Feriado <br/> <font class="hIco">TD</font>: Todo o Dia <br/> <font class="hIco">M</font>: Matinê <br/> <font class="hIco">N</font>: Noite </p>'),
(5, 'Multicine - Partage Mossoró', '<p>Não há tabela de preços disponível!</p>');

-- --------------------------------------------------------

--
-- Estrutura da tabela `localizacao`
--

CREATE TABLE IF NOT EXISTS `localizacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCinema` int(2) NOT NULL,
  `l1` varchar(300) NOT NULL,
  `l2` varchar(300) NOT NULL,
  `l3` varchar(300) NOT NULL,
  `mapa` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idCinema` (`idCinema`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `localizacao`
--

INSERT INTO `localizacao` (`id`, `idCinema`, `l1`, `l2`, `l3`, `mapa`) VALUES
(1, 3, 'Avenida Senador Salgado Filho, 2234', 'Loja 400 – Piso L2 – Candelária', 'Natal - RN', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3969.0957190284266!2d-35.2134393852327!3d-5.842131895767035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7b2ff7f174cbe21%3A0x2dca4e1d5201607!2sCin%C3%A9polis!5e0!3m2!1spt-BR!2sbr!4v1447375115106" frameborder="0" allowfullscreen></iframe>'),
(2, 4, 'Av Doutor Medeiros Filho, 2395', 'Loja 230A – Bairro Potengi', 'Natal - RN', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3969.6901799849184!2d-35.2492955852332!3d-5.757655095827385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7b3aa4484175c1d%3A0x7c50cdd1371fb131!2sPartage+Norte+Shopping+Natal!5e0!3m2!1spt-BR!2sbr!4v1447375528809" frameborder="0" allowfullscreen></iframe>'),
(3, 5, 'Avenida João da Escóssia, 1515', 'Partage Shopping Mossoró – Nova Betânia', 'Mossoró - RN', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.5744210714593!2d-37.379404785235806!3d-5.171942296246965!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7ba06ac1d109887%3A0xb8ce6a76107ec05c!2sMulticine+Cinemas!5e0!3m2!1spt-BR!2sbr!4v1447680431271" frameborder="0" allowfullscreen></iframe>');

-- --------------------------------------------------------

--
-- Estrutura da tabela `propaganda`
--

CREATE TABLE IF NOT EXISTS `propaganda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `urlImg` varchar(500) NOT NULL,
  `texto` varchar(3000) NOT NULL,
  `usuario` int(2) NOT NULL,
  `loc` int(2) NOT NULL,
  `ativo` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `propaganda_ibfk_1` (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(500) NOT NULL,
  `texto` varchar(5000) NOT NULL,
  `ativo` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `slide`
--

INSERT INTO `slide` (`id`, `url`, `texto`, `ativo`) VALUES
(1, 'imagens/slide/1.jpg', '', 0),
(2, 'imagens/slide/2.jpg', '', 0),
(3, 'imagens/slide/3.jpg', '', 0),
(4, 'imagens/slide/4.jpg', '', 0),
(5, 'imagens/slide/5.jpg', '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `per` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `login`, `senha`, `per`) VALUES
(1, 'QWRtaW5pc3RyYWRvcg==', 'YWRtaW4=', 'YWRtaW4=', 9);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `localizacao`
--
ALTER TABLE `localizacao`
  ADD CONSTRAINT `localizacao_ibfk_1` FOREIGN KEY (`idCinema`) REFERENCES `cinemas` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `propaganda`
--
ALTER TABLE `propaganda`
  ADD CONSTRAINT `propaganda_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
