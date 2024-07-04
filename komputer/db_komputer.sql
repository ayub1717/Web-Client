-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jul 2024 pada 09.21
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_komputer`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`) VALUES
(2, 'ayub', 'ayub@gmail.com', '$2y$10$TaSyJqSDSrq7roUjFyvKm.Dq2kZkgIdS9V9rrd3lySHtK26ztnAU.'),
(4, 'iman', 'iman@gmail.com', '$2y$10$O/RlBjPRLq9OsGZpKzfujOd0z2SqH74QTDPd9Q83laowVFflZox5y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_komponen`
--

CREATE TABLE `data_komponen` (
  `id` int(11) NOT NULL,
  `nama_komponen` varchar(50) NOT NULL,
  `jenis` varchar(25) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `detail` text NOT NULL,
  `foto` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_komponen`
--

INSERT INTO `data_komponen` (`id`, `nama_komponen`, `jenis`, `merk`, `detail`, `foto`) VALUES
(1, 'Intel Core i7 12700K', 'CPU', 'Intel1', 'CPU Specifications\r\nTotal Cores 12\r\n# of Performance-cores8\r\n# of Efficient-cores4\r\nTotal Threads 20\r\nMax Turbo Frequency 5.00 GHz\r\nIntel® Turbo Boost Max Technology 3.0 Frequency ‡ 5.00 GHz\r\nPerformance-core Max Turbo Frequency 4.90 GHz\r\nEfficient-core Max Turbo Frequency 3.80 GHz\r\nPerformance-core Base Frequency 3.60 GHz\r\nEfficient-core Base Frequency 2.70 GHz\r\nCache 25 MB Intel® Smart Cache\r\nTotal L2 Cache12 MB\r\nProcessor Base Power 125 W\r\nMaximum Turbo Power 190 W', 0x75706c6f6164732f696e74656c2069372e6a7067),
(8, 'Intel® Core™ i7-13700K', 'CPU', 'Intel', 'CPU Specifications\r\nNumber of Cores 16\r\n# Performance-core8\r\n# Efficient-core8\r\nTotal Thread 24\r\nMax Turbo Frequency 5.40 GHz\r\nIntel® Turbo Boost Max Technology 3.0 Frequency ‡ 5.40 GHz\r\nPerformance-core Maximum Turbo Frequency 5.30 GHz\r\nEfficient-core Maximum Turbo Frequency 4.20 GHz\r\nPerformance-core Base Frequency 3.40 GHz\r\nEfficient-core Base Frequency 2.50 GHz\r\nCache 30 MB Intel® Smart Cache\r\nCache L2 Total24 MB\r\nProcessor Base Power 125 W\r\nMaximum Turbo Power 253 W', 0x75706c6f6164732f696e74656c2069372031332e6a7067),
(9, 'RTX 4090', 'VGA', 'Asus', 'GPU Engine Specifications:	NVIDIA CUDA ® Cores	16384\r\nShader Core	Ada Lovelace\r\n83 TFLOPS\r\nRay Tracing Core	191 TFLOPS\r\nThird Generation\r\nTensor Cores (AI)	1321 AI TOPS\r\nFourth Generation\r\nBoost Clock (GHz)	2.52\r\nBase Clock (GHz)	2.23\r\nMemory Specifications:	Standard Memory Configuration	GDDR6X 24GB\r\nMemory Interface Width	384-bit\r\nTechnology Support:	NVIDIA Architecture	Ada Lovelace\r\nRay Tracing	Yes\r\nNVIDIA DLSS	DLSS 3.5\r\nSuper Resolution\r\nDLAA\r\nRay Reconstruction\r\nFrame Generation\r\nNVIDIA Reflex	Yes\r\nNVIDIA Broadcast	Yes\r\nPCI Express Gen 4	Yes\r\nResizable BAR	Yes\r\nNVIDIA ® GeForce Experience ™	Yes\r\nNVIDIA Ansel	Yes\r\nNVIDIA FreeStyle	Yes\r\nNVIDIA ShadowPlay	Yes\r\nNVIDIA Highlights	Yes\r\nNVIDIA G-SYNC ®	Yes\r\nGame Ready Driver	Yes\r\nNVIDIA Studio Driver	Yes\r\nNVIDIA Omniverse	Yes\r\nMicrosoft DirectX ® 12 Ultimate	Yes\r\nNVIDIA GPU Boost ™	Yes\r\nNVIDIA NVLink ™ (Supports SLI)	No\r\nVulkan RT API, OpenGL 4.6	Yes\r\nNVIDIA Encoder (NVENC)	2 8th Generation\r\nNVIDIA Decoder (NVDEC)	5th Generation\r\nAV1 Encode	Yes\r\nAV1 Decode	Yes\r\nCUDA Capabilities	8.9\r\nVR Ready	Yes', 0x75706c6f6164732f52545820343039302e706e67),
(10, 'RTX 3090', 'VGA', 'Asus', 'GeForce RTX 3090 Series\r\nG eForce RTX 3090 Ti	G eForce RTX 3090\r\nGPU Engine Specifications:	NVIDIA CUDA ® Cores	10752	10496\r\nBoost Clock (GHz)	1.86	1.70\r\nBase Clock (GHz)	1.56	1.40\r\nMemory Specifications:	Standard Memory Configuration	24GB GDDR6X	24GB GDDR6X\r\nMemory Interface Width	384-bit	384-bit\r\nTechnology Support:	Ray Tracing Cores	2nd Generation	2nd Generation\r\nTensor Cores	3rd Generation	3rd Generation\r\nNVIDIA Architecture	Ampere	Ampere\r\nMicrosoft DirectX ® 12 Ultimate	Yes	Yes\r\nNVIDIA DLSS	Yes	Yes\r\nNVIDIA Reflex	Yes	Yes\r\nNVIDIA Broadcast	Yes	Yes\r\nPCI Express Gen 4	Yes	Yes\r\nResizable BAR	Yes	Yes\r\nNVIDIA ® GeForce Experience ™	Yes	Yes\r\nNVIDIA Ansel	Yes	Yes\r\nNVIDIA FreeStyle	Yes	Yes\r\nNVIDIA ShadowPlay	Yes	Yes\r\nNVIDIA Highlights	Yes	Yes\r\nNVIDIA G-SYNC ®	Yes	Yes\r\nReady to Use Game Driver	Yes	Yes\r\nNVIDIA Studio Drivers	Yes	Yes\r\nNVIDIA Omniverse	Yes	Yes\r\nNVIDIA GPU Boost ™	Yes	Yes\r\nNVIDIA NVLink ™ (Supports SLI)	Yes	Yes\r\nVulkan RT API, OpenGL 4.6	Yes	Yes\r\nHDMI 2.1	Yes	Yes\r\nDisplayPort 1.4a	Yes	Yes\r\nNVIDIA Encoder	7th Generation	7th Generation\r\nNVIDIA Decoder	5th Generation	5th Generation\r\nCUDA Capabilities	8.6	8.6\r\nSupports VR	Yes	Yes', 0x75706c6f6164732f52545820333039302e6a7067);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `data_komponen`
--
ALTER TABLE `data_komponen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `data_komponen`
--
ALTER TABLE `data_komponen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
