-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 22, 2023 lúc 05:45 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `du_an_mot`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(10) NOT NULL,
  `iduser` int(10) DEFAULT 0,
  `bill_hovaten` varchar(255) NOT NULL,
  `bill_diachi` varchar(255) NOT NULL,
  `bill_email` varchar(100) NOT NULL,
  `bill_phone` varchar(50) NOT NULL,
  `bill_pttt` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1: Thanh toán trực tiếp. 2:Chuyển khoản. 3:Thanh toán online',
  `ngaydathang` varchar(50) NOT NULL,
  `tongcong` int(10) NOT NULL DEFAULT 0,
  `bill_trangthai` tinyint(1) DEFAULT 0 COMMENT '0: Mới nhận đơn hàng. 1: Đang chờ. 2:Đang giao hàng. 3: Đã giao hàng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(11) NOT NULL,
  `hovaten` varchar(100) NOT NULL,
  `iduser` int(10) NOT NULL,
  `idpro` int(10) NOT NULL,
  `noidung` varchar(255) NOT NULL,
  `ngaybinhluan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id`, `hovaten`, `iduser`, `idpro`, `noidung`, `ngaybinhluan`) VALUES
(22, 'Trương Văn Tiến Đạt', 1, 20, 'sản phẩm này đẹp quá', '23:15:18 15/10/2023'),
(23, 'Trương Văn Tiến Đạt', 1, 20, 'chụp ảnh đẹp', '23:22:40 15/10/2023'),
(24, 'Trương Văn Tiến Đạt', 1, 20, 'sadasdasdkjasjdhaskdhasjdhasjhdasljjdnhasljdhasjkdhasjdhasjd', '23:28:06 15/10/2023'),
(26, 'Lê Thị Hồng Nhung', 2, 19, 'yuhgfgfghfg', '02:21:41 16/10/2023'),
(30, 'Le Quang Van Quyen', 4, 23, 'xaau', '18:02:29 08/11/2023');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_dm` int(10) NOT NULL COMMENT 'mã loại hàng',
  `ten_dm` varchar(50) NOT NULL COMMENT 'tên loại hàng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id_dm`, `ten_dm`) VALUES
(1, 'Áo thun nam'),
(2, 'Áo thun nữ'),
(8, 'Đầm bầu'),
(9, 'Áo phao'),
(10, 'Váy nữ'),
(11, 'Chân váy'),
(12, 'Quần kaki nữ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `id` int(10) NOT NULL,
  `iduser` int(10) NOT NULL,
  `idpro` int(10) NOT NULL,
  `hinh` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `gia` int(10) NOT NULL DEFAULT 0,
  `soluong` int(3) NOT NULL,
  `thanhtien` int(10) NOT NULL,
  `idbill` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(11) NOT NULL COMMENT 'mã sản phẩm',
  `ten_sp` varchar(50) NOT NULL COMMENT 'tên sản phẩm',
  `don_gia` int(11) DEFAULT 0 COMMENT 'đơn giá',
  `hinh` varchar(500) DEFAULT NULL COMMENT 'hình ảnh',
  `mo_ta` text DEFAULT NULL COMMENT 'mô tả sản phẩm',
  `so_luot_xem` int(11) NOT NULL DEFAULT 0 COMMENT 'số lượt xem',
  `id_dm` int(10) NOT NULL COMMENT 'mã danh mục'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `ten_sp`, `don_gia`, `hinh`, `mo_ta`, `so_luot_xem`, `id_dm`) VALUES
(7, 'Áo Thun Nam Tay Ngắn Polyester Thêu Hình Form Fitt', 589000, 'ao-thun-nam-10f23tss001l-black-beauty-_1__2_1_jpg.png', '', 100, 1),
(10, 'Áo Thun Nam S.Café Thêu chữ Coffee Lovers Form Loo', 520000, 'ao-thun-nam-25-10f23tss062-burnt-henna-_1__2_jpg.png', '', 5, 1),
(11, 'Đầm bầu caro dáng suông Yumi Dress', 299000, 'yumi_dress__1__be82bbfd3dc04cdf83a0c876f8047447_large.png', '', 70, 8),
(12, 'Áo Thun Cổ Tròn Ngắn Tay', 195000, 'goods_44_462666.png', '  Đang cập nhật.', 10, 2),
(13, 'Black Friday 2023  - giam 15 hang nguyen gia  Chuy', 343000, 'ao-thun-nam-10s23tss016-angel-falls-_6__2_jpg.png', '', 1, 1),
(14, 'Black Friday 2023  - giam 15 hang nguyen gia  Chuy', 422000, '10-f22tss014r1-burnt-ochre-ao-thun-nam_1__1_1_jpg.png', '', 19, 1),
(15, 'Áo Thun Nam Tay Ngắn In Hình Form Loose - 10S23TSS', 278000, '10s23tss047_black-ao-thun-nam_6__1_jpg.png', '', 40, 1),
(16, 'Áo Thun Nam Tay Ngắn Họa Tiết Thêu Form Regular - ', 226000, 'ao-thun-nam-10s23tss019-navy-_2__1_jpg.png', '', 79, 1),
(17, 'Áo Thun Nam Tay Ngắn In Thân Sau Form Regular - 10', 245000, 'ao-thun-nam-10f22tss008_bright_white_14__1_1.png', '', 46, 1),
(18, 'Đầm bầu cổ vuông Laura Dress', 385000, 'dam_bau_co_vuong_laura_dress__3__fe0148e9849d4c2188027219e9a2af7f_large.png', '', 54, 8),
(19, 'Đầm bầu công sở chất tơ Peach Dress', 345000, 'dam_bau_co_vuong_laura_dress__3__fe0148e9849d4c2188027219e9a2af7f_large.png', '', 0, 8),
(20, 'Đầm bầu công sở đuôi cá Nora Sress', 385000, 'nora_dress__2__3f0ee95726564345afd5732d8f126685_large.png', '', 0, 8),
(21, 'Áo Thun Supima Cotton Cổ Tròn ', 293000, 'vngoods_31_444527.png', '  ', 0, 2),
(22, 'Áo Thun Mini Ngắn Tay', 293000, 'vngoods_47_455762.png', '  ', 0, 2),
(23, 'Áo Thun Vải Gân Kẻ Sọc Cổ Cao Dài Tay', 391000, 'vngoods_01_462912.png', ' ', 0, 2),
(24, 'Đầm bầu dự tiệc chất tapta cao cấp Tata Dress', 595000, 'tata__9__7759fc98184e446a8881c5ab1d03e286_large.png', ' ', 0, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `hovaten` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `diachi` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `vaitro` varchar(50) NOT NULL DEFAULT 'nguoidung'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `hovaten`, `username`, `password`, `email`, `diachi`, `phone`, `vaitro`) VALUES
(1, 'Trương Văn Tiến Đạt', 'tiendat', 'tiendat', 'dattruong792001@gmail.com', NULL, NULL, 'admin'),
(2, 'Lê Thị Hồng Nhung', 'nhungxinh', 'nhung', 'nhungkappi@gmail.com', 'Xuân Hồi - Lệ Thủy - Quảng Bình', '0862960216', 'nguoidung'),
(3, 'Trương Văn Đạt', 'tiendat1', '123', 'dattruong07092001@gmail.com', NULL, NULL, 'nguoidung'),
(4, 'Le Quang Van Quyen', 'vanquyenst1', 'vanquyenst1', 'lequangvanquyen@gmail.com', NULL, NULL, 'admin');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bill_user` (`iduser`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpro` (`idpro`),
  ADD KEY `iduser` (`iduser`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_dm`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `giohang_user` (`iduser`),
  ADD KEY `giohang_sanpham` (`idpro`),
  ADD KEY `giohang_bill` (`idbill`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `lk_sapham_danhmuc` (`id_dm`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_dm` int(10) NOT NULL AUTO_INCREMENT COMMENT 'mã loại hàng', AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã sản phẩm', AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `fk_bill_user` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `fk_cm_sp` FOREIGN KEY (`idpro`) REFERENCES `sanpham` (`id_sp`),
  ADD CONSTRAINT `fk_cm_user` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
