
CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `descricao` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `compra` (
  `id` int(11) NOT NULL,
  `pagamento_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `horario` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `forma_pagamento` (
  `id` int(11) NOT NULL,
  `descricao` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(300) NOT NULL,
  `preco` double NOT NULL,
  `imagem` varchar(100) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `produto_compra` (
  `compra_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `quantidade` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `produto_categoria` (
  `produto_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `pagamento_id` (`pagamento_id`);

ALTER TABLE `forma_pagamento`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `produto_compra`
  ADD PRIMARY KEY (`compra_id`,`produto_id`);

ALTER TABLE `produto_categoria`
  ADD PRIMARY KEY (`categoria_id`,`produto_id`);

ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `forma_pagamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`pagamento_id`) REFERENCES `forma_pagamento` (`id`);

ALTER TABLE `produto_compra`
  ADD CONSTRAINT `produto_compra_ibfk_1` FOREIGN KEY (`compra_id`) REFERENCES `compra` (`id`),
  ADD CONSTRAINT `produto_compra_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`);

ALTER TABLE `produto_categoria`
  ADD CONSTRAINT `produto_categoria_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `produto_categoria_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`);

