-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08-Nov-2016 às 14:10
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `livraria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cartoes`
--

CREATE TABLE `cartoes` (
  `numero` int(16) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `codigo_seguranca` int(3) NOT NULL,
  `data_validade` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cartoes`
--

INSERT INTO `cartoes` (`numero`, `nome`, `codigo_seguranca`, `data_validade`) VALUES
(123, 'Brendol L. Oliveria', 123, '05/19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `cpf` int(11) NOT NULL,
  `rg` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `orgao_emissor` varchar(45) NOT NULL,
  `passaporte` int(11) DEFAULT NULL,
  `nome_mae` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `preferencial` char(1) NOT NULL DEFAULT 'N' COMMENT 'S=Sim/N=Não',
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`cpf`, `rg`, `nome`, `orgao_emissor`, `passaporte`, `nome_mae`, `email`, `senha`, `preferencial`, `status`) VALUES
(11111111, 402586958, 'Brendol', '123', 123, 'Mãe', 'brendol.lourencon@gmail.com', '123', '', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos_usuario`
--

CREATE TABLE `contatos_usuario` (
  `id_contato` int(11) NOT NULL,
  `cpf_cnpj` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `tipo` char(1) DEFAULT NULL COMMENT 'E=Editoras / C=Clientes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `editoras`
--

CREATE TABLE `editoras` (
  `cnpj` int(14) NOT NULL,
  `razao_social` varchar(45) NOT NULL,
  `descricao_estadual` int(11) NOT NULL,
  `nome_fantasia` varchar(50) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecos`
--

CREATE TABLE `enderecos` (
  `id_endereco` int(11) NOT NULL,
  `cep` int(11) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `estado` char(2) DEFAULT NULL,
  `rua` varchar(45) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `primeiro_endereco` char(1) NOT NULL,
  `status` char(1) NOT NULL,
  `cpf_cnpj` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_pedidos`
--

CREATE TABLE `itens_pedidos` (
  `id_item` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `itens_pedidos`
--

INSERT INTO `itens_pedidos` (`id_item`, `id_pedido`, `id_produto`, `quantidade`, `valor`) VALUES
(5, 67, 2, 1, '150.00'),
(6, 68, 2, 1, '150.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `midias`
--

CREATE TABLE `midias` (
  `id_midia` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `midias_produtos`
--

CREATE TABLE `midias_produtos` (
  `id_midias_produtos` int(11) NOT NULL,
  `id_midia` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `data_hora` datetime NOT NULL,
  `cpf_cliente` int(11) NOT NULL,
  `data_entrega` datetime NOT NULL,
  `tipo_pagamento` varchar(45) NOT NULL,
  `valor_total` decimal(6,2) NOT NULL,
  `status` char(2) NOT NULL COMMENT 'P=Pendente\nPG=Pago\nC=Cancelado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `data_hora`, `cpf_cliente`, `data_entrega`, `tipo_pagamento`, `valor_total`, `status`) VALUES
(67, '2016-11-05 06:11:21', 11111111, '2016-11-08 00:00:00', 'cartao', '900.00', 'A'),
(68, '2016-11-05 06:11:28', 11111111, '2016-11-08 00:00:00', 'cartao', '900.00', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `valor` decimal(7,2) NOT NULL,
  `titulo` varchar(80) NOT NULL,
  `descricao` text NOT NULL,
  `meta_titulo` varchar(60) NOT NULL,
  `meta_descricao` varchar(170) DEFAULT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `valor`, `titulo`, `descricao`, `meta_titulo`, `meta_descricao`, `status`) VALUES
(1, '50.00', 'Historias Secretas do Rock Brasileiro', 'Em Histórias secretas do rock brasileiro, as aventuras de bandas como A Bolha, O Terço, Equipe Mercado, Som Beat e Analfabitles, entre outras em destaque no livro, ajudam a traçar um pequeno e modesto painel do bravo rock underground brasileiro dos anos 1960 e 1970, quando vingou, com valentia, à sombra da repressão política e social e à custa da indiferença do grande público, da grande imprensa e até mesmo das gravadoras. Com sua verve idealista aflorada, essas bandas encararam a censura, o preconceito, as limitações do mercado, a precariedade dos instrumentos e a infraestrutura indigente para romper com as tradições e o conservadorismo de nossa cultura musical. Ao evoluir dos bailes (nos clubes) para os concertos de rock (nos teatros e ginásios) e dos covers para as composições próprias, acabaram dando ao rock uma linguagem peculiar, única e brasileira.', 'Historias Secretas do Rock Brasileiro', 'Rock Brasileiro', 'A'),
(2, '50.00', 'Harry Potter e as Reliquias da Morte', 'Desta vez, Harry Potter foi encarregado de uma tarefa obscura, perigosa e aparentemente impossível: localizar e destruir os Horcruxes remanescentes de Voldemort. Potter nunca esteve tão sozinho nem teve de enfrentar um futuro tão sombrio. Porém, de algum modo, Harry deve encontrar dentro de si próprio a força para completar a tarefa que lhe foi dada: ele deve sair do ambiente acolhedor e seguro da Toca para seguir sem temor nem hesitação pelo inexorável caminho que lhe foi traçado...\nNa sétima e última parte da saga de Harry Potter, J.K. Rowling revela de modo espetacular respostas que há muito são esperadas. A encantadora e elaborada narrativa, com guinadas repentinas em compassos de tirar o fôlego, confirma a autora como uma grande contadora de histórias cujos livros serão lidos, re-lidos e lidos mais uma vez.', 'Harry Potter e as Relíquias da Morte', 'Harry Potter', 'A'),
(3, '30.00', 'Percy Jackson e o Ladrao de Raios', 'Primeiro volume da saga Percy Jackson e os olimpianos, ''O Ladrão de Raios'' esteve entre os primeiros lugares na lista das séries mais vendidas do The New York Times. O autor conjuga lendas da mitologia grega com aventuras no século XXI. Nelas, os deuses do Olimpo continuam vivos, ainda se apaixonam por mortais e geram filhos metade deuses, metade humanos, como os heróis da Grécia antiga. Marcados pelo destino, eles dificilmente passam da adolescência. Poucos conseguem descobrir sua identidade. O garoto-problema Percy Jackson é um deles. Tem experiências estranhas em que deuses e monstros mitológicos parecem saltar das páginas dos livros direto para a sua vida. Pior que isso: algumas dessas criaturas estão bastante irritadas. Um artefato precioso foi roubado do Monte Olimpo e Percy é o principal suspeito. Para restaurar a paz, ele e seus amigos - jovens heróis modernos - terão de fazer mais do que capturar o verdadeiro ladrão: precisam elucidar uma traição mais ameaçadora que a fúria dos deuses.', 'Percy Jackson e o Ladrao de Raios', 'Percy Jackson', 'A'),
(5, '26.00', 'Maze Runner - Correr ou Morrer', 'Ao acordar dentro de um escuro elevador em movimento, a única coisa que Thomas consegue lembrar é de seu nome. Sua memória está completamente apagada. Mas ele não está sozinho. Quando a caixa metálica chega a seu destino e as portas se abrem, Thomas se vê rodeado por garotos que o acolhem e o apresentam ''A Clareira'', um espaço aberto cercado por muros gigantescos. Assim como Thomas, nenhum deles sabe como foi parar ali, nem por quê. Sabem apenas que todas as manhãs as portas de pedra do Labirinto que os cerca se abrem, e, à noite, se fecham. E que a cada trinta dias um novo garoto é entregue pelo elevador. Porém, um fato altera de forma radical a rotina do lugar - chega uma garota, a primeira enviada à Clareira. E mais surpreendente ainda é a mensagem que ela traz consigo. Thomas será mais importante do que imagina, mas para isso terá de descobrir os sombrios segredos guardados em sua mente e correr... correr muito.', 'Maze Runner', 'Maze Runner', 'A'),
(6, '30.00', 'The Walking Dead - Invasao', 'O sexto volume da série que é sucesso na TV, nos livros e nas HQs\r\n\r\nDas cinzas de uma devastada Woodbury, dois grupos de sobreviventes surgem, cada um com os próprios interesses em vista. No subterrâneo, nos labirintos de túneis antigos, Lilly Caul e seu grupo de idosos, desajustados e crianças tentam construir uma nova vida. Mas um desejo secreto ainda queima no coração e na alma de Lilly: ela quer sua amada cidade Woodbury de volta. Já o psicótico Reverendo Jeremiah Garlitz reconstrói seu exército de seguidores, com uma diabólica arma secreta. Ele planeja acabar com Lilly e seu grupo — os responsáveis pelo fim de seu culto — e agora, pela primeira vez, tem como enviar uma amostra do inferno diretamente aos habitantes dos túneis. O confronto final entre estas duas facções libera uma arma inimaginável, forjada a partir de monstruosas hordas de mortos-vivos, aperfeiçoadas por um lunático e banhadas no sangue de inocentes.', 'The Walking Dead', 'The Walking Dead', 'A'),
(8, '90.00', 'Harry Potter e A Crianca Amaldicoada', 'Sempre foi difícil ser Harry Potter e não é mais fácil agora que ele é um sobrecarregado funcionário do Ministério da Magia, marido e pai de três crianças em idade escolar. Enquanto Harry lida com um passado que se recusa a ficar para trás, seu filho mais novo, Alvo, deve lutar com o peso de um legado de família que ele nunca quis. À medida que passado e presente se fundem de forma ameaçadora, ambos, pai e filho, aprendem uma incômoda verdade: às vezes as trevas vêm de lugares inesperados.', 'Harry', 'Harry', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefones`
--

CREATE TABLE `telefones` (
  `id_telefone` int(11) NOT NULL,
  `cpf_cnpj` int(11) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `tipo` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cartoes`
--
ALTER TABLE `cartoes`
  ADD PRIMARY KEY (`numero`),
  ADD UNIQUE KEY `numero_UNIQUE` (`numero`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cpf`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `contatos_usuario`
--
ALTER TABLE `contatos_usuario`
  ADD PRIMARY KEY (`id_contato`),
  ADD KEY `fk_cpf_cnpj_idx` (`cpf_cnpj`);

--
-- Indexes for table `editoras`
--
ALTER TABLE `editoras`
  ADD PRIMARY KEY (`cnpj`),
  ADD UNIQUE KEY `cnpj_UNIQUE` (`cnpj`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `enderecos`
--
ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`id_endereco`),
  ADD KEY `fk_cpf_idx` (`cpf_cnpj`);

--
-- Indexes for table `itens_pedidos`
--
ALTER TABLE `itens_pedidos`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `fk_id_pedido_idx` (`id_pedido`),
  ADD KEY `fk_id_produto_idx` (`id_produto`);

--
-- Indexes for table `midias`
--
ALTER TABLE `midias`
  ADD PRIMARY KEY (`id_midia`);

--
-- Indexes for table `midias_produtos`
--
ALTER TABLE `midias_produtos`
  ADD PRIMARY KEY (`id_midias_produtos`),
  ADD KEY `fk_id_midia_idx` (`id_midia`),
  ADD KEY `fk_id_produto_idx` (`id_produto`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `fk_cpf_cliente_idx` (`cpf_cliente`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`);

--
-- Indexes for table `telefones`
--
ALTER TABLE `telefones`
  ADD PRIMARY KEY (`id_telefone`),
  ADD KEY `fk_cpf_cnpj_idx` (`cpf_cnpj`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contatos_usuario`
--
ALTER TABLE `contatos_usuario`
  MODIFY `id_contato` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `itens_pedidos`
--
ALTER TABLE `itens_pedidos`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `midias`
--
ALTER TABLE `midias`
  MODIFY `id_midia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `midias_produtos`
--
ALTER TABLE `midias_produtos`
  MODIFY `id_midias_produtos` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `telefones`
--
ALTER TABLE `telefones`
  MODIFY `id_telefone` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `contatos_usuario`
--
ALTER TABLE `contatos_usuario`
  ADD CONSTRAINT `fk_cpf_cnpj` FOREIGN KEY (`cpf_cnpj`) REFERENCES `editoras` (`cnpj`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD CONSTRAINT `cnpj` FOREIGN KEY (`cpf_cnpj`) REFERENCES `editoras` (`cnpj`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cpf` FOREIGN KEY (`cpf_cnpj`) REFERENCES `clientes` (`cpf`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `itens_pedidos`
--
ALTER TABLE `itens_pedidos`
  ADD CONSTRAINT `id_pedido` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id_pedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_produto` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `midias_produtos`
--
ALTER TABLE `midias_produtos`
  ADD CONSTRAINT `fk_id_midia` FOREIGN KEY (`id_midia`) REFERENCES `midias` (`id_midia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_produto` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_cpf_cliente` FOREIGN KEY (`cpf_cliente`) REFERENCES `clientes` (`cpf`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `telefones`
--
ALTER TABLE `telefones`
  ADD CONSTRAINT `fk_cnpj` FOREIGN KEY (`cpf_cnpj`) REFERENCES `editoras` (`cnpj`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cpf` FOREIGN KEY (`cpf_cnpj`) REFERENCES `clientes` (`cpf`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
