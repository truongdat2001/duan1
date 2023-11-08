-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 23, 2023 lúc 12:02 PM
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
-- Cơ sở dữ liệu: `duanmau`
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

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `iduser`, `bill_hovaten`, `bill_diachi`, `bill_email`, `bill_phone`, `bill_pttt`, `ngaydathang`, `tongcong`, `bill_trangthai`) VALUES
(45, 2, 'Lê Thị Hồng Nhung', 'Xuân Hồi - Lệ Thủy - Quảng Bình', 'nhungkappi@gmail.com', '0862960216', 1, '23:36:04 16/10/2023', 15000000, 0),
(46, 1, 'Trương Văn Tiến Đạt', '', 'dattruong792001@gmail.com', '', 1, '22:24:33 18/10/2023', 29500000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(11) NOT NULL,
  `hovaten` varchar(100) NOT NULL,
  `iduser` int(10) DEFAULT NULL,
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
(26, 'Lê Thị Hồng Nhung', 2, 19, 'yuhgfgfghfg', '02:21:41 16/10/2023');

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
(1, 'Máy ảnh'),
(2, 'Điện thoại'),
(8, 'Ống kính'),
(9, 'Table'),
(10, 'Laptop'),
(11, 'Đồng hồ'),
(12, 'Sạc dự phòng');

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

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`id`, `iduser`, `idpro`, `hinh`, `name`, `gia`, `soluong`, `thanhtien`, `idbill`) VALUES
(63, 2, 12, 'samsung-galaxy-m52-5g-1-600x600.png', 'Samsung Galaxy M52', 9000000, 1, 9000000, 45),
(64, 2, 13, 'Canon EOS M3 (Body).png', 'Canon EOS M3 (Body)', 6000000, 1, 6000000, 45),
(65, 1, 15, 'Canon EOS R (Body).png', 'Canon EOS R (Body)', 29500000, 1, 29500000, 46);

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
(7, 'Canon 60D (Body)', 4000000, 'canon-60d.png', '        Canon 60D là dòng máy bán chuyên nhưng lại có khả năng quay phim độ nét cao 1080p. Chiếc máy này có vài tính năng của dòng máy cao cấp Canon EOS 5D Mark II, bao gồm chức năng quay phim, chức năng xem trực tiếp, và công nghệ xử lý ảnh DiGIC 4.Những đoạn phim được thu với định dạng MOV với chuẩn nén video H.264/MPEG-4 và tuyến âm thanh PCM.', 100, 1),
(10, 'Canon 800D ', 9000000, 'canon eos 800D.png', ' Canon EOS 800D chính là bộ máy để bạn bắt đầu và phát triển kĩ năng chụp của mình trong mọi mục đích sử dụng. Nhiều công nghệ xịn trên máy, có cảm ứng, có xoay lật, có kết nối wifi chuyển ảnh, có màn hình hiện chuẩn màu,...', 5, 1),
(11, 'Canon EF-S 17-85mm', 2500000, 'Canon EF-S 17-85mm f4-5.6 IS USM.png', '    Nội dung đang cập nhật.', 70, 8),
(12, 'Samsung Galaxy M52', 9000000, 'samsung-galaxy-m52-5g-1-600x600.png', ' Đang cập nhật.', 10, 2),
(13, 'Canon EOS M3 (Body)', 6000000, 'Canon EOS M3 (Body).png', ' Canon EOS M3 là máy ảnh Mirrorless sở hữu cảm biến CMOS 24.2MP cùng bộ xử lý hình ảnh DIGIC 6 với dải nhạy sáng từ 100 -12800 và mở rộng tối đa lên đến 25600 mang lại chất lượng hình ảnh vượt trội. Canon EOS M3 trang bị công nghệ lấy nét lai ( Hybrid CMOS AF III) cho khả năng lấy nét tự động siêu nhanh cùng với khả năng chụp ảnh với độ phân giải cao, quay video Full HD 1080p bên trong một thiết kế siêu nhỏ gọn.', 1, 1),
(14, 'Canon 80D (Body)', 14000000, 'Canon 80D (Body).png', ' Đặc trưng bởi khả năng chụp ảnh đa năng, Canon EOS 80D được trang bị hệ thống lấy nét mạnh mẽ bên trong thiết kế trực quan. Với cảm biến APS-C CMOS 24.2MP và bộ xử lý hình ảnh DIGIC 6, chiếc máy ảnh Canon 80D này có khả năng chụp ảnh có độ phân giải cao. Tốc độ chụp liên tiếp 7fps, quay phim Full HD 1080p cùng độ nhạy sáng cao và ISO mở rộng 25600, cung cấp khả năng hoạt động hiệu quả trong điều kiện ánh sáng thấp. Khi hoạt động với kính ngắm quang học thì hệ thống lấy nét 45 điểm AF hỗ trợ cross-type cho phép thực hiện nhanh chóng trong một loạt các điều kiện ánh sáng và theo dõi các đối tượng chuyển động hiệu quả.', 19, 1),
(15, 'Canon EOS R (Body)', 29500000, 'Canon EOS R (Body).png', ' Canon R là sự kết hợp của ngàm ống kính được đổi mới và cảm biến hình ảnh full frame nâng cấp cho ra hệ thống máy ảnh đa phương tiện độc đáo. EOS R sở hữu cảm biến CMOS fullframe 30.3 triệu điểm ảnh có độ phân giải cao kết hợp cùng bộ xử lý hình ảnh DIGIC 8. Sự kết hợp công nghệ này cho dải nhạy sáng rộng lên đến mức ISO, tốc độ chụp liên tiếp nhanh hơn lên 8 ảnh/giây và khả năng quay phim UHD 4K30.', 40, 1),
(16, 'Canon 700D (Body)', 7000000, 'Canon 700D (Body).png', ' Canon 700D là dòng máy ảnh tầm trung dễ sử dụng, dễ làm quen tiếp cận với người mới chơi, mang đầy đủ các tính năng cơ bản của máy ảnh chuyên dụng. Sở hữu màn hình xoay lật cảm ứng tiện dụng cùng chất ảnh đẹp, Canon 700D phù hợp sử dụng trong nhiều thể loại, đáp ứng tốt nhu cầu của người dùng phổ thông.', 79, 1),
(17, 'Canon 6D (Body)', 12000000, 'Canon 6D (Body).png', ' Canon 6D là dòng máy ảnh Full Frame giá rẻ đầu tiên của Canon được ra mắt vào năm 2012 với nhiều tính năng nổi trội lần đầu được Canon tích hợp vào một chiếc máy Full Frame chuyên nghiệp. Một vài tính năng nổi bật có thể kể tới như đây là chiếc Full Frame đầu tiên được tích hợp GPS và kết nối Wifi, sử dụng bộ vi xử lí mới với khả năng khử noise ở ISO cao cực ấn tượng.', 46, 1),
(18, 'Canon EF 24-70mm', 2000000, 'Canon EF 24-70mm f2.8L II USM.png', '    Nội dung đang cập nhật.', 54, 8),
(19, 'Canon EF 24-105mm ', 9000000, '9f41216d-97db-4231-981a-f225cc7f978c.png', '  OK cano', 0, 8),
(20, 'Canon EF 50mm ', 5000000, 'canon-ef-50-usm-1.png', '  Nội dung đang cập nhật.', 0, 8),
(21, 'iPhone 15 Pro Max ', 34000000, 'iPhone 15 Pro Max 256GB.png', ' ', 0, 2),
(22, 'Samsung Galaxy S22 5G', 12000000, 'Samsung Galaxy S22 5G 128GB.png', ' ', 0, 2),
(23, 'Samsung Galaxy A34 5G', 7000000, 'Samsung Galaxy A34 5G.png', '', 0, 2),
(24, 'Canon EF-S 17-85mm', 12000000, 'Canon EF 24-70mm f2.8L II USM.png', '', 0, 8);

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
(3, 'Trương Văn Đạt', 'tiendat1', '123', 'dattruong07092001@gmail.com', NULL, NULL, 'nguoidung');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_dm` int(10) NOT NULL AUTO_INCREMENT COMMENT 'mã loại hàng', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã sản phẩm', AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_bill` FOREIGN KEY (`idbill`) REFERENCES `bill` (`id`),
  ADD CONSTRAINT `giohang_sanpham` FOREIGN KEY (`idpro`) REFERENCES `sanpham` (`id_sp`),
  ADD CONSTRAINT `giohang_user` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `lk_sapham_danhmuc` FOREIGN KEY (`id_dm`) REFERENCES `danhmuc` (`id_dm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
