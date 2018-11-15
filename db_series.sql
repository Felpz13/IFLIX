-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15-Nov-2018 às 18:48
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_series`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_series`
--

CREATE TABLE `tb_series` (
  `CODIGO` int(11) NOT NULL,
  `NOME` varchar(35) NOT NULL,
  `GENERO` varchar(20) NOT NULL,
  `CENSURA` int(11) NOT NULL,
  `TEMPORADAS` int(11) NOT NULL,
  `DESCRICAO` varchar(1000) DEFAULT NULL,
  `FOTO` varchar(50) NOT NULL,
  `TRAILER` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_series`
--

INSERT INTO `tb_series` (`CODIGO`, `NOME`, `GENERO`, `CENSURA`, `TEMPORADAS`, `DESCRICAO`, `FOTO`, `TRAILER`) VALUES
(19, 'How To Get Away With a Murder', 'Drama', 14, 5, 'Annalise Keating é advogada da área criminal e professora de direito em uma universidade de prestígio da Filadélfia. Ao lado de cinco de seus alunos, se envolve em uma conspiração de assassinato distorcida que promete mudar o curso de suas vidas.', 'Imagens/Capas/1.png', 'https://www.youtube.com/embed/E-MJsHRYIlY?rel=0'),
(20, 'Breaking Bad', 'Drama', 16, 5, 'Walter White (Bryan Cranston) é um professor de química na casa dos 50 anos que trabalha em uma escola secundária no Novo México, descobre que tem câncer terminal decide ganhar dinheiro rapidamente para sua família. Walter usa seu conhecimento de química para fazer e vender metanfetamina, uma droga sintética. Ele conta com a ajuda do ex-aluno e pequeno traficante Jesse (Aaron Paul) e enfrenta vários desafios, incluindo o fato de seu concunhado ser um importante nome dentro da Agência Anti-Drogas da região. , a fim de garantir o futuro de sua família.', 'Imagens/Capas/2.png', 'https://www.youtube.com/embed/XrVlzrRECY4?rel=0'),
(21, 'Dexter', 'Crime', 18, 8, 'Dexter Morgan (Michael C. Hall) é adotado aos três anos de idade por Harry Morgan (James Remar) e Doris (Kathrin Middleton), depois de ter se tornado órfão. Após detectar sua tendência homicida, o pai de Dexter decide ensinar a ele um código no intuito de canalizar a raiva do filho para situações mais propícias à violência. Nesta nova lógica, Dexter deve matar apenas assassinos de pessoas inocentes com a condição de provar sua culpa. Ele inicia o desenvolvimento de diversas estratégias usando seu conhecimento e a experiência para realizar sua nova função.', 'Imagens/Capas/3.png', 'https://www.youtube.com/embed/YQeUmSD1c3g?rel=0'),
(22, 'Narcos', 'Crime', 0, 0, 'No final da década de 1970, Pablo Escobar (Wagner Moura) não é mais considerado apenas um traficante. Seu nome circula pelas delegacias da Colômbia e também dos Estados Unidos como o traficantes de drogas mais perigoso do momento. Enquanto isso, Escobar continua construindo seu império e enriquece cada vez mais com seus negócios ilegais.', 'Imagens/Capas/4.png', 'https://www.youtube.com/embed/GeTzNdlAEA0?rel=0'),
(23, 'Game of Thrones', 'Fantasia', 16, 7, 'Situada nos continentes fictícios de Westeros e Essos, a série centra-se no Trono de Ferro dos Sete Reinos e segue um enredo de alianças e conflitos entre as famílias nobres dinásticas, seja competindo para reivindicar o trono ou lutando pela independência do trono. ', 'Imagens/Capas/5.png', 'https://www.youtube.com/embed/rDHuyRyGuFQ?rel=0'),
(24, 'Supernatural', 'Fantasia', 14, 14, 'Desde que era pequeno, Sam Winchester (Jared Padalecki) tentava escapar do próprio passado. Após a misteriosa morte de Mary (Samantha Smith), o pai de Sam passou a procurar vingança contra as forças do mal que mataram a esposa, destruindo qualquer ser maligno que cruze o seu caminho. Ao contrário de Sam, Dean (Jensen Ackles), irmão mais velho, sempre quis seguir os passos do pai. Sam está determinado a se livrar do \"negócio da família\", mas sua vida está prestes a tomar os rumos que ele não desejava, quando ele fica sem escolhas a não ser unir-se ao irmão.', 'Imagens/Capas/6.png', 'https://www.youtube.com/embed/PoI2hpwzE00?rel=0'),
(25, 'The Walking Dead', 'Fantasia', 16, 9, 'Baseado na história em quadrinhos escrita por Robert Kirkman, este drama potente e visceral retrata a vida nos Estados Unidos pós-apocalíptico. Um grupo de sobreviventes, liderado pelo policial Rick Grimes, segue viajando em busca de uma nova moradia segura e distante dos mortos-vivos. A pressão para permanecerem vivos e lutarem pela sobrevivência faz com que muitos do grupo sejam submetidos às mais profundas formas de crueldade humana. Rick acaba descobrindo que o tão assustador desespero pela subsistência pode ser ainda mais fatal do que os próprios mortos-vivos que os rodeiam.', 'Imagens/Capas/7.png', 'https://www.youtube.com/embed/KF0yI-rwPV0?rel=0'),
(26, 'Fear the Walking Dead', 'Fantasia', 16, 4, 'Ambientada em Los Angeles, a série mostra o começo do apocalipse zumbi e a temível desintegração da sociedade pelos olhos de uma família disfuncional, que precisa se unir para tentar sobreviver ao caos do fim dos tempos.', 'Imagens/Capas/8.png', 'https://www.youtube.com/embed/88vcCpzBET4?rel=0'),
(27, 'The Last Kingdom  ', 'Ação', 18, 3, 'A história acompanha o jovem Uhtred, um nobre que perdeu os pais em um dos ataques viquingues. Levado e criado por eles, Uhtred cresce e se torna um guerreiro. Mais tarde, ele parte com a missão de conquistar as terras onde nasceu.  Enquanto isso, o Rei Alfredo enfrenta problemas políticos e religiosos para unificar os reinos e transformá-lo no que hoje é a Inglaterra. ', 'Imagens/Capas/9.png', 'https://www.youtube.com/embed/WxPApTGWwas?rel=0'),
(28, 'Vikings', 'Ação', 16, 5, 'Ragnar Lothbrok (Travis Fimmel) é o maior guerreiro da sua era. Lider de seu bando, com seus irmãos e sua família, ele ascende ao poder e torna-se Rei da Noruega, além de guerreiro implacável, Ragnar segue as tradições nórdicas e é devoto dos deuses, as lendas contam que ele descende diretamente de Odin, o deus da guerra. ', 'Imagens/Capas/10.png', 'https://www.youtube.com/embed/SLOa9s1q_Ug?rel=0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_series`
--
ALTER TABLE `tb_series`
  ADD PRIMARY KEY (`CODIGO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_series`
--
ALTER TABLE `tb_series`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

--
-- Usuário BD
-- 

CREATE USER 'aluno'@'localhost' IDENTIFIED BY 'aluno';

GRANT ALL PRIVILEGES ON `db_series` . * TO 'aluno'@'localhost';

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
