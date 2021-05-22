-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2021 at 07:38 AM
-- Server version: 8.0.23
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`) VALUES
(1, 'Jason', 'TheGoonners', '2ae377fcf667236f2b88cdfb95521ffe'),
(2, 'jason', 'jasonbrandoo', '912ec803b2ce49e4a541068d495ab570'),
(3, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`) VALUES
(12, 'Jazz', '2019-01-19 19:53:41');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `post_id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `username`, `body`, `created_at`) VALUES
(38, 31, 'jason', '<p>great post</p>\r\n', '2018-01-14 22:01:04'),
(39, 34, 'Jason', '<p>great</p>\r\n', '2018-01-26 12:43:21'),
(40, 34, 'brando', '<p>post</p>\r\n', '2018-01-26 12:43:40'),
(42, 39, 'anjing', 'asda', '2018-01-29 13:28:11'),
(43, 79, 'jason', '<p>fuck</p>\r\n', '2018-01-31 06:39:48'),
(44, 76, 'TheGoonners', '<p>fuck</p>\r\n', '2018-02-01 15:12:49'),
(45, 76, 'TheGoonners', 'Uhuy', '2018-02-01 15:18:37'),
(46, 76, 'TheGoonners', '<p>uhuy</p>\r\n', '2018-02-01 15:18:51'),
(47, 81, 'kemasjaka', '<p>wow</p>\r\n', '2018-02-01 15:22:04');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id_message` int NOT NULL,
  `reciever_id` varchar(255) NOT NULL,
  `sender_id` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id_message`, `reciever_id`, `sender_id`, `body`, `created_at`) VALUES
(16, 'TheGoonners', 'kemasjaka', 'asdfghjkl', '2018-02-01 14:31:51'),
(17, 'TheGoonners', 'kemasjaka', 'qwer', '2018-02-01 14:31:51'),
(18, 'TheGoonners', 'kemasjaka', 'aaaaa', '2018-02-01 14:31:51'),
(19, 'kemasjaka', 'TheGoonners', '<p>cuk</p>\r\n', '2018-02-01 14:31:51'),
(20, 'kemasjaka', 'TheGoonners', '<p>apa kabar</p>\r\n', '2018-02-01 14:31:51'),
(21, 'TheGoonners', 'kemasjaka', '<p>asdsd</p>\r\n', '2018-02-01 14:31:51'),
(22, 'TheGoonners', 'kemasjaka', '<p>sadasdsa</p>\r\n', '2018-02-01 14:31:51'),
(23, 'kemasjaka', 'TheGoonners', '<h1><strong>adsd </strong></h1>\r\n', '2018-02-01 14:31:51'),
(24, 'TheGoonners', 'kemasjaka', '<p>hai</p>\r\n', '2018-02-06 12:06:46'),
(25, 'saber', 'Saber', '<p>test</p>\r\n', '2019-01-20 05:21:30'),
(26, 'asdf', 'saber', '<p>www</p>\r\n', '2019-01-20 17:20:49'),
(27, 'alpha', 'saber', '<p>haiii</p>\r\n', '2019-01-20 17:51:45');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id_news` int NOT NULL,
  `category_id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `text` text NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id_news`, `category_id`, `user_id`, `title`, `slug`, `text`, `post_image`, `created_at`) VALUES
(107, 12, 9, 'Java Jazz 2019 Usung Tema Broadway', 'Java-Jazz-2019-Usung-Tema-Broadway', '<p>Java Jazz kembali digelar. Untuk tahun ini, ajang tahunan yang diadakan Java Festival Production mengusung tema Broadway dengan semboyan&nbsp;<em>Music Unites Us All</em>. Broadway adalah sebuah daerah di kota New York, Amerika Serikat yang identik dengan pertunjukan teater drama, musik, dan tari.</p>\r\n\r\n<p>Broadway relatif asing bagi masyarakat Indonesia. Namun menurut Dewi Gontha, Direktur Utama Java Festival Production, Java Jazz harus mencari sesuatu yang baru agar tetap relevan.</p>\r\n\r\n<p>&quot;Kalau kami enggak menampilkan sesuatu yang baru, (kami) jadi rata-rata. Kalau kami bikin&nbsp;<em>event</em>&nbsp;rutin tiap tahun, harus cari yang baru,&quot; ujar Dewi dalam acara konferesi pers pertama Jakarta International BNI Java Jazz Festival 2019 yang diselenggarakan di No Boundary Cafe, Kemang, Jakarta Selatan, pada Rabu (16/1/2019).</p>\r\n\r\n<p>Dewi mengaku penggemar hal-hal berbau Broadway. Namun ia paham bahwa ada kesulitan dalam memasukkan tema tersebut ke dalam acara festival musik sebesar Java Jazz. Meski Broadway berunsur drama, musik, dan tari, Java Jazz 2019 akan mengangkat musiknya saja.</p>\r\n\r\n<p>&quot;Broadway itu kan&nbsp;<em>live entertainment</em>&nbsp;yang sifatnya megah,&quot; kilah Dewi. Untuk menampilkan musik yang megah, panggung akan dibuat besar seperti teater Broadway.</p>\r\n\r\n<p>&quot;Kesulitannya, kalau konser hanya satu artis mudah. Tapi kalau yang main 9 kelompok berbeda (dalam satu panggung), itu susah. Kami hanya bisa memainkan dekor yang berbeda,&quot; jelas anak pebisnis Peter F. Gontha itu.</p>\r\n\r\n<p>Dewi pun enggan membocorkan dekorasi panggung yang dipersiapkannya. &quot;Dekor-dekor itu terkait tema yang kami ambil tahun ini. Harus dilihat, kalau enggak, enggak&nbsp;<em>surprise</em>dong,&quot; ujar Dewi sambil tertawa.</p>\r\n\r\n<p>Semua itu demi menarik minat penonton baru. Untuk penyelenggaraan tahun ini, Dewi berharap jumlah&nbsp;<em>traffic&nbsp;</em>penonton ada pada angka 110 ribu hingga 115 ribu. Mereka akan memadati 11 panggung Java Jazz selama tiga hari.</p>\r\n\r\n<p>&quot;Beberapa tahun sudah konstan, dan kami berharap regenerasi untuk tahun ini. Dulu Java Jazz dikenal untuk mereka yang lebih tua, sekarang kami merombak program, tampilan,&quot; ungkap Dewi.</p>\r\n\r\n<p>Jika penyelenggaraan sebelumnya Java Festival Production menargetkan usia 25 ke atas, tahun ini bergeser jadi anak muda usia 18-34 tahun. Ini demi regenerasi yang dimaksud Dewi.</p>\r\n\r\n<p>Pergeseran demografi penonton sangat penting di usia Java Jazz yang sudah 14 tahun. Inilah alasan mengapa akhir-akhir ini Java Jazz dianggap kurang&nbsp;<em>nge-jazz</em>. Tahun lalu, ada Lauv, Daniel Caesar, dan Goo Goo Dolls sebagai pengisi program&nbsp;<em>special show</em>.</p>\r\n\r\n<p>Tahun ini, dua penyanyi perempuan muda akan unjuk gigi; Raveena Aurora (24) dan Gabriella &ldquo;H. E. R.&rdquo; Wilson (21). Mereka datang untuk menggaet penonton muda.</p>\r\n\r\n<p>&ldquo;Gerbang masuk kita untuk mengerti musik jazz itu macam-macam,&rdquo; ujar Nikita Dompas dari tim program Java Jazz. Menurut lelaki yang juga gitaris jazz ini, orang yang langsung menyukai jazz sejak muda memang ada.</p>\r\n\r\n<p>&quot;Tapi ada juga anak-anak muda yang suka mendengarkan (musik) yang mendekati, yang (berasal) dari satu pohon (dengan jazz). Syukur-syukur mereka akan menyukai musik yang lebih berat,&rdquo; ujar Nikita.</p>\r\n\r\n<p>Namun tak serta merta mereka yang sudah berumur dilupakan. Java Jazz diramaikan oleh Toto, band rock legendaris asal AS, yang berdiri sejak 1976.</p>\r\n\r\n<p>Selain Toto, Raveena, dan H. E. R; musisi luar yang akan tampil antara lain R+R = Now, Cyrus Chestnut Trio, GoGo Penguin, James Vickery, JMSN, Lucky Chops, Moonchild, Nathan East Band of Brothers, Sin&eacute;ad Harnett, dan The Suffers.</p>\r\n\r\n<p>Dari lokal Indonesia; ada Afgan, Andien, Barry Likumahuwa, Indra Aziz, Indro Hardjodikoro, Isyana Sarasvati, Kunto Aji, Parkdrive, Radhini, Teddy Adhitya, Yura Yunita, dan masih banyak lagi.</p>\r\n\r\n<p>Java Jazz 2019 diselenggarakan pada 1-3 Maret di JiExpo Kemayoran, Jakarta Pusat. Tiket masuk harian dibanderol Rp750.000, sementara tiket terusan 3 hari mencapai Rp1,76 juta. Untuk<em>&nbsp;special show</em>&nbsp;ada harga tambahan yakni Rp125.000 untuk Rafeena, H.E.R seharga Rp175.000, dan TOTO dibanderol Rp355.000.</p>\r\n', 'java-jazz-2019.jpg', '2019-01-20 19:29:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `total_post` int NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `phone`, `location`, `facebook`, `twitter`, `password`, `total_post`, `profile_picture`, `register_date`) VALUES
(8, 'asdf', 'asdf', 'asdf@asdf.com', '08976567788', 'los angeles', '', '', '912ec803b2ce49e4a541068d495ab570', 12, 'burning-cigarette.jpg', '2019-01-18 19:24:11'),
(9, 'Tahta', 'saber', 'saber@saber.com', '', '', '', '', '2bde79bff687ae45f1354cde4324ccdd', 5, 'Mortal_Kombat_X_(2015-)_005-003.jpg', '2019-01-18 20:41:52'),
(10, 'alpha', 'alpha', 'alpha@alpha.com', '', '', '', '', '2c1743a391305fbf367df8e4f069f9f9', 1, '', '2019-01-20 17:33:17'),
(11, 'ronaldo', 'ronaldo', 'ronaldo@ronaldo.com', '', '', '', '', 'c5aa3124b1adad080927ce4d144c6b33', 1, '', '2019-01-21 06:09:40'),
(12, 'brian', 'brian', 'brian@brian.com', '', '', '', '', 'cbd44f8b5b48a51f7dab98abcdf45d4e', 1, '', '2019-01-21 06:26:17'),
(13, 'jason', 'jason', 'jason@jason.jason', '', '', '', '', '912ec803b2ce49e4a541068d495ab570', 3, '', '2021-05-22 04:57:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `sender_id` (`sender_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`),
  ADD KEY `slug` (`slug`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `id_news` (`id_news`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id_message` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
