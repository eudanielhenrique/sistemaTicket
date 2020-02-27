-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 27-Fev-2020 às 04:55
-- Versão do servidor: 8.0.18
-- versão do PHP: 7.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `teste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name_category` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `category`
--

INSERT INTO `category` (`id`, `name_category`) VALUES
(1, 'sala de estar'),
(2, 'cozinha'),
(3, 'quarto'),
(4, 'escritorio');

-- --------------------------------------------------------

--
-- Estrutura da tabela `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `name_color` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `colors`
--

INSERT INTO `colors` (`id`, `name_color`) VALUES
(1, 'branco'),
(2, 'marron'),
(3, 'preto'),
(4, 'bege');

-- --------------------------------------------------------

--
-- Estrutura da tabela `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `name_depar` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `department`
--

INSERT INTO `department` (`id`, `id_cat`, `name_depar`) VALUES
(1, 1, 'moveis'),
(2, 2, 'moveis'),
(3, 3, 'moveis'),
(4, 4, 'moveis');

-- --------------------------------------------------------

--
-- Estrutura da tabela `form_payment`
--

CREATE TABLE `form_payment` (
  `id` int(11) NOT NULL,
  `name_form` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `form_payment`
--

INSERT INTO `form_payment` (`id`, `name_form`) VALUES
(1, 'boleto'),
(2, 'visa'),
(3, 'master'),
(4, 'elo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `id_color` int(5) NOT NULL,
  `id_material` int(5) NOT NULL,
  `garantia` int(5) NOT NULL,
  `largura` int(5) NOT NULL,
  `altura` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `info`
--

INSERT INTO `info` (`id`, `id_color`, `id_material`, `garantia`, `largura`, `altura`) VALUES
(1, 1, 1, 3, 120, 90),
(2, 1, 1, 3, 120, 90),
(3, 2, 2, 3, 240, 70),
(4, 3, 2, 3, 150, 80),
(5, 3, 1, 3, 130, 100),
(6, 2, 2, 3, 110, 110),
(7, 1, 1, 3, 190, 50),
(8, 3, 2, 3, 130, 60);

-- --------------------------------------------------------

--
-- Estrutura da tabela `list_ticket`
--

CREATE TABLE `list_ticket` (
  `id` int(11) NOT NULL,
  `name_ticket` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `list_ticket`
--

INSERT INTO `list_ticket` (`id`, `name_ticket`) VALUES
(1, 'Produto não entregue'),
(2, 'Produto fora do prazo de entrega'),
(3, 'Produto com defeito'),
(4, 'Produto diferente do pedido'),
(5, 'Produto com peças faltando');

-- --------------------------------------------------------

--
-- Estrutura da tabela `materials`
--

CREATE TABLE `materials` (
  `id` int(11) NOT NULL,
  `name_material` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `materials`
--

INSERT INTO `materials` (`id`, `name_material`) VALUES
(1, 'MDP'),
(2, 'MDF');

-- --------------------------------------------------------

--
-- Estrutura da tabela `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `id_form` int(11) NOT NULL,
  `id_sale` int(11) NOT NULL,
  `amount_parc` int(5) NOT NULL,
  `value_parc` decimal(5,2) NOT NULL,
  `total` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `payment`
--

INSERT INTO `payment` (`id`, `id_form`, `id_sale`, `amount_parc`, `value_parc`, `total`) VALUES
(1, 1, 1, 1, '90.15', '90.15'),
(2, 2, 2, 2, '116.95', '233.91'),
(3, 4, 3, 5, '48.03', '240.15'),
(4, 3, 4, 2, '60.07', '120.15'),
(5, 2, 5, 2, '116.95', '233.91'),
(6, 1, 6, 1, '233.91', '233.91'),
(7, 2, 7, 3, '40.05', '120.15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `problemDescription`
--

CREATE TABLE `problemDescription` (
  `id` int(11) NOT NULL,
  `description` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `problemDescription`
--

INSERT INTO `problemDescription` (`id`, `description`) VALUES
(1, 'produto com arranhões');

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name_product` varchar(60) NOT NULL,
  `value_product` decimal(5,2) NOT NULL,
  `stock` int(20) NOT NULL,
  `id_depar` int(11) NOT NULL,
  `id_info` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `name_product`, `value_product`, `stock`, `id_depar`, `id_info`) VALUES
(1, 'Painel para TV até 42 Polegadas Life Espresso Móveis Griggio', '90.15', 60, 3, 1),
(42, 'Painel para TV até 65 Polegadas', '233.91', 60, 1, 2),
(43, 'Painel para TV até 42 Polegadas 1 Prateleira', '76.85', 5, 1, 2),
(44, 'Balcão de Cozinha 4 Portas 1 Gaveta Campinas', '280.41', 9, 2, 3),
(45, 'Cama Solteiro Mônaco Tcil Móveis Branco', '240.15', 4, 3, 4),
(46, 'Criado Mudo 2 Gavetas e 1 Nicho Modena', '200.15', 15, 3, 5),
(47, 'Guarda Roupa Casal 6 Portas 2 Gavetas', '400.15', 20, 3, 6),
(48, 'Conjunto 2 Cadeiras Apogeu Móveis', '248.15', 10, 2, 7),
(49, 'Cadeira Secretária MB-LC01G Giratória', '120.15', 150, 4, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `amount` int(5) NOT NULL,
  `date_request` date DEFAULT NULL,
  `date_delivery` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `sales`
--

INSERT INTO `sales` (`id`, `id_user`, `id_product`, `amount`, `date_request`, `date_delivery`) VALUES
(1, 2, 1, 1, '2020-02-03', '2020-02-13'),
(2, 2, 42, 1, '2020-02-03', '2020-02-10'),
(3, 5, 45, 1, '2020-02-05', '2020-02-15'),
(4, 6, 49, 1, '2020-02-06', '2020-02-10'),
(5, 3, 42, 1, '2020-02-04', '2020-02-13'),
(6, 1, 42, 1, '2020-02-02', '2020-02-12'),
(7, 1, 49, 1, '2020-02-01', '2020-02-11'),
(8, 1, 44, 1, '2020-04-04', '2020-04-10'),
(9, 1, 45, 1, '2020-04-05', '2020-04-11'),
(10, 1, 46, 1, '2020-04-04', '2020-04-10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`id`, `name_status`) VALUES
(1, 'Aberto'),
(2, 'Em andamento'),
(3, 'Concluido');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ticket`
--

CREATE TABLE `ticket` (
  `id` int(5) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_list_ticket` int(5) NOT NULL,
  `id_product` int(11) NOT NULL,
  `descr` varchar(40) NOT NULL,
  `id_status` int(5) NOT NULL,
  `data_ticket` date DEFAULT NULL,
  `data_fec` date DEFAULT NULL,
  `resp` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `ticket`
--

INSERT INTO `ticket` (`id`, `id_user`, `id_list_ticket`, `id_product`, `descr`, `id_status`, `data_ticket`, `data_fec`, `resp`) VALUES
(5, 1, 4, 42, 'Cor_do_produto_e_diferente_do_pedido', 1, '2020-02-26', NULL, 7),
(6, 1, 5, 42, 'Sem_o_suporte_de_TV', 2, '2020-02-26', NULL, 7),
(7, 1, 3, 42, 'Produto_com_arranhoes', 3, '2020-02-26', '2020-03-20', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `type_users`
--

CREATE TABLE `type_users` (
  `id` int(11) NOT NULL,
  `name_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `type_users`
--

INSERT INTO `type_users` (`id`, `name_type`) VALUES
(1, 'client'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name_user` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `id_type_user` int(5) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name_user`, `email`, `id_type_user`, `password`) VALUES
(1, 'maria da silva', 'teste@teste.com', 1, '123456'),
(2, 'jessica de lima', 'jessica@teste.com', 1, '123456'),
(3, 'jorge luis', 'jorge@teste.com', 1, '123456'),
(4, 'amanda oliveira', 'amanda@teste.com', 1, '123456'),
(5, 'roberto cardoso', 'roberto@teste.com', 1, '123456'),
(6, 'bruna andrade', 'bruna@teste.com', 1, '123456'),
(7, 'paulo henrique', 'admin@teste.com', 2, '123456');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cat` (`id_cat`);

--
-- Índices para tabela `form_payment`
--
ALTER TABLE `form_payment`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_color` (`id_color`),
  ADD KEY `id_material` (`id_material`);

--
-- Índices para tabela `list_ticket`
--
ALTER TABLE `list_ticket`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_form` (`id_form`),
  ADD KEY `id_sale` (`id_sale`);

--
-- Índices para tabela `problemDescription`
--
ALTER TABLE `problemDescription`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_product` (`id_product`);

--
-- Índices para tabela `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_list_ticket` (`id_list_ticket`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `resp` (`resp`);

--
-- Índices para tabela `type_users`
--
ALTER TABLE `type_users`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type_user` (`id_type_user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `form_payment`
--
ALTER TABLE `form_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `list_ticket`
--
ALTER TABLE `list_ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `problemDescription`
--
ALTER TABLE `problemDescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `type_users`
--
ALTER TABLE `type_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `category` (`id`);

--
-- Limitadores para a tabela `info`
--
ALTER TABLE `info`
  ADD CONSTRAINT `info_ibfk_1` FOREIGN KEY (`id_color`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `info_ibfk_2` FOREIGN KEY (`id_material`) REFERENCES `materials` (`id`);

--
-- Limitadores para a tabela `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`id_form`) REFERENCES `form_payment` (`id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`id_sale`) REFERENCES `sales` (`id`);

--
-- Limitadores para a tabela `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Limitadores para a tabela `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`id_list_ticket`) REFERENCES `list_ticket` (`id`),
  ADD CONSTRAINT `ticket_ibfk_3` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `ticket_ibfk_4` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `ticket_ibfk_5` FOREIGN KEY (`resp`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_type_user`) REFERENCES `type_users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
