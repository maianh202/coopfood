-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 08, 2023 lúc 11:49 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `coopfood`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `donhangid` int(11) NOT NULL,
  `sanphamid` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `thanhtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`donhangid`, `sanphamid`, `gia`, `soluong`, `thanhtien`) VALUES
(1, 33, 73800, 2, 147600),
(1, 51, 60480, 3, 181440),
(2, 14, 208710, 1, 208710),
(2, 39, 31770, 1, 31770),
(2, 95, 162000, 1, 162000),
(3, 46, 46800, 3, 140400),
(3, 52, 55350, 1, 55350),
(4, 37, 69390, 1, 69390),
(4, 3, 13410, 3, 40230),
(5, 60, 11700, 1, 11700),
(6, 65, 33480, 1, 33480),
(6, 49, 19530, 1, 19530);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietyeucau`
--

CREATE TABLE `chitietyeucau` (
  `yeucauid` int(11) NOT NULL,
  `sanphamid` int(11) NOT NULL,
  `soluongyc` int(11) NOT NULL,
  `hinhanhyeucau` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietyeucau`
--

INSERT INTO `chitietyeucau` (`yeucauid`, `sanphamid`, `soluongyc`, `hinhanhyeucau`) VALUES
(1, 14, 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `chucvuid` int(11) NOT NULL,
  `tenchucvu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chucvu`
--

INSERT INTO `chucvu` (`chucvuid`, `tenchucvu`) VALUES
(1, 'nhân viên bán hàng'),
(2, 'trưởng cửa hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `danhmucid` int(11) NOT NULL,
  `tendanhmuc` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `hinhanhdm` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`danhmucid`, `tendanhmuc`, `hinhanhdm`) VALUES
(1, 'Rau củ, Trái cây', 'images/category/rau.png'),
(2, 'Thịt, Trứng, Hải Sản', 'images/category/thit.png'),
(3, 'Thức Ăn Chế Biến, Bún Tươi', 'images/category/thucphamchebien.png'),
(4, 'Thực Phẩm Đông, Mát', 'images/category/thucphamdonglanh.png'),
(5, 'Bánh, Kẹo, Snack', 'images/category/banh.png'),
(6, 'Sữa, Sản Phẩm Từ Sữa', 'images/category/sua.png'),
(7, 'Thức Uống', 'images/category/douong.png'),
(8, 'Gia Vị, Gạo, Thực Phẩm Khô', 'images/category/giavi.png'),
(9, 'Sản Phẩm Cho Bé', 'images/category/sanphamchobe.png'),
(10, 'Chăm Sóc Cá Nhân', 'images/category/chamsoccanhan.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `donhangid` int(11) NOT NULL,
  `khachhangid` int(11) NOT NULL,
  `nhanvienid` int(11) DEFAULT NULL,
  `ngaydat` datetime NOT NULL,
  `ngaynhan` datetime DEFAULT NULL,
  `tongtien` int(11) NOT NULL,
  `ghichu` text NOT NULL,
  `trangthaiid` int(11) DEFAULT NULL,
  `sdt` varchar(20) NOT NULL,
  `thanhpho` varchar(20) DEFAULT NULL,
  `quan` varchar(20) DEFAULT NULL,
  `phuong` varchar(20) DEFAULT NULL,
  `chitietdiachi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`donhangid`, `khachhangid`, `nhanvienid`, `ngaydat`, `ngaynhan`, `tongtien`, `ghichu`, `trangthaiid`, `sdt`, `thanhpho`, `quan`, `phuong`, `chitietdiachi`) VALUES
(1, 1, 1, '2023-06-01 00:00:00', '2023-06-05 16:18:45', 349040, '', 4, '034558864', NULL, NULL, NULL, 'HM'),
(2, 1, 3, '2023-06-02 13:37:49', '2023-06-05 17:04:26', 422480, '', 3, '000000000252', NULL, NULL, NULL, 'HM'),
(3, 2, 2, '2023-06-04 10:10:32', NULL, 215750, '', 2, '2541284184', NULL, NULL, NULL, 'LB'),
(4, 2, NULL, '2023-06-04 10:11:48', NULL, 129620, '', 1, '5623546812', NULL, NULL, NULL, 'LB'),
(5, 2, NULL, '2023-06-04 10:14:40', NULL, 31700, '', 1, '525463698', NULL, NULL, NULL, 'LB'),
(6, 1, NULL, '2023-06-05 15:53:28', NULL, 73010, '', 1, '201201204512', NULL, NULL, NULL, 'LB');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `giohangid` int(11) NOT NULL,
  `khachhangid` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  `hinhanh` varchar(50) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `khachhangid` int(11) NOT NULL,
  `tenkhach` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `matkhau` varchar(50) NOT NULL,
  `ngaysinh` date NOT NULL,
  `dienthoai` varchar(20) NOT NULL,
  `diachi` varchar(50) NOT NULL,
  `gioitinh` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`khachhangid`, `tenkhach`, `email`, `matkhau`, `ngaysinh`, `dienthoai`, `diachi`, `gioitinh`) VALUES
(1, 'mai anh', 'maianh202@gmail.com', 'maianh', '0000-00-00', '0375855222', 'HN', ''),
(2, 'Hằng', 'hang@gmail.com', 'hang2000', '0000-00-00', '5125487', 'KO bit', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaiyeucau`
--

CREATE TABLE `loaiyeucau` (
  `loaiyeucauid` int(11) NOT NULL,
  `tenyeucau` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaiyeucau`
--

INSERT INTO `loaiyeucau` (`loaiyeucauid`, `tenyeucau`) VALUES
(1, 'Đổi hàng'),
(2, 'Trả hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `nccid` int(11) NOT NULL,
  `tenncc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`nccid`, `tenncc`) VALUES
(1, 'Acecook'),
(2, 'AFC'),
(3, 'Betagen'),
(4, 'Biore'),
(5, 'BOBBY'),
(6, 'C2'),
(7, 'Carrie Junior'),
(8, 'Celano'),
(9, 'Chinsu'),
(10, 'Coca Cola'),
(11, 'Coop Select'),
(12, 'Cornetto'),
(13, 'CP'),
(14, 'Đầm Sen'),
(15, 'Đang cập nhật!'),
(16, 'GATSBY'),
(17, 'Godbbawee'),
(18, 'Grow Plus'),
(19, 'Hoff'),
(20, 'HUGGIES'),
(21, 'Kim Bôi'),
(22, 'KitKat'),
(23, 'Koikeya'),
(24, 'L.V.QUIRIT'),
(25, 'Laurier'),
(26, 'Lenger'),
(27, 'Mead Johnson'),
(28, 'Meat Deli'),
(29, 'Merino'),
(30, 'MILIKET'),
(31, 'Mộc Châu'),
(32, 'Nabati Richeese'),
(33, 'Nakydaco'),
(34, 'Nam Dương'),
(35, 'Neptune'),
(36, 'Nestle'),
(37, 'Omachi'),
(38, 'Orion'),
(39, 'Pepsico'),
(40, 'Safeguard'),
(41, 'SG Food'),
(42, 'Strongbow'),
(43, 'TH Truemilk'),
(44, 'Tiger'),
(45, 'Unilever'),
(46, 'VIETCOCO'),
(47, 'Vinamilk'),
(48, 'Yến Nhung'),
(49, 'Zemlya'),
(50, 'Zott');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `nhanvienid` int(11) NOT NULL,
  `tennhanvien` varchar(100) NOT NULL,
  `chucvuid` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `matkhau` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`nhanvienid`, `tennhanvien`, `chucvuid`, `email`, `matkhau`) VALUES
(1, 'Mai Anh', 1, 'nhom29@gmail.com', 'nhom29@gmail.com'),
(2, 'Loan', 1, 'loan2002@gmail.com', '123456'),
(3, 'Hằng', 1, 'hang2002@gmail.com', 'hang2002');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `sanphamid` int(11) NOT NULL,
  `tensanpham` varchar(200) NOT NULL,
  `danhmucid` int(11) DEFAULT NULL,
  `nccid` int(11) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `giaban` int(11) NOT NULL,
  `donvitinh` varchar(20) DEFAULT NULL,
  `giakhuyenmai` int(11) DEFAULT NULL,
  `hinhanh` varchar(100) DEFAULT NULL,
  `hinhanhzoom` varchar(100) DEFAULT NULL,
  `mota` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`sanphamid`, `tensanpham`, `danhmucid`, `nccid`, `soluong`, `giaban`, `donvitinh`, `giakhuyenmai`, `hinhanh`, `hinhanhzoom`, `mota`) VALUES
(1, 'Dưa hấu đỏ – kg', 1, 15, 3000, 14900, 'kg', 13410, 'images/sp/1.png', 'images/sp/1-big.png', NULL),
(2, 'Táo Envy Mỹ nhỏ kg', 1, 15, 3000, 170600, 'Kg', 153540, 'images/sp/2.png', 'images/sp/2-big.png', NULL),
(3, 'Dưa leo – kg', 1, 15, 3000, 14900, 'Cái', 13410, 'images/sp/3.png', 'images/sp/3-big.png', NULL),
(4, 'Xà lách (Salad) giống Mỹ', 1, 15, 3000, 34900, 'Cái', 31410, 'images/sp/4.png', 'images/sp/4-big.png', NULL),
(5, 'Rau muống', 1, 15, 3000, 20900, 'Kg', 18810, 'images/sp/5.png', 'images/sp/5-big.png', NULL),
(6, 'Cải bẹ xanh', 1, 15, 3000, 16900, 'Kg', 15210, 'images/sp/6.png', 'images/sp/6-big.png', NULL),
(7, 'Khoai tây miền bắc kg', 1, 15, 3000, 23900, 'Kg', 21510, 'images/sp/7.png', 'images/sp/7-big.png', NULL),
(8, 'Khoai mỡ', 1, 15, 3000, 35900, 'Kg', 32310, 'images/sp/8.png', 'images/sp/8-big.png', NULL),
(9, 'Củ gừng', 1, 15, 3000, 39900, 'Kg', 35910, 'images/sp/9.png', 'images/sp/9-big.png', NULL),
(10, 'Cam sành loại 1 – kg', 1, 15, 3000, 27900, 'Kg', 25110, 'images/sp/10.png', 'images/sp/10-big.png', NULL),
(11, 'Ức gà không xương kg – TD', 2, 15, 3000, 95900, 'Kg', 86310, 'images/sp/11.png', 'images/sp/11-big.png', NULL),
(12, 'Bắp bò kg', 2, 15, 3000, 375900, 'Kg', 338310, 'images/sp/12.png', 'images/sp/12-big.png', NULL),
(13, 'Thịt heo xay đặc biệt chuẩn ngon(S) kg', 2, 15, 3000, 160900, 'Kg', 144810, 'images/sp/13.png', 'images/sp/13-big.png', NULL),
(14, 'Sụn heo Premium(S) kg', 2, 15, 3000, 231900, 'Kg', 208710, 'images/sp/14.png', 'images/sp/14-big.png', NULL),
(15, 'Trứng cút Coop Select 30T – Mb', 2, 11, 3000, 28000, 'Vỉ', 25200, 'images/sp/15.png', 'images/sp/15-big.png', NULL),
(16, 'Trứng gà tươi 10T/hộp – DAB', 2, 15, 3000, 35900, 'Vỉ', 32310, 'images/sp/16.png', 'images/sp/16-big.png', NULL),
(17, 'Trứng vịt size L Coop Select 6T – MB', 2, 11, 3000, 25900, 'Vỉ', 23310, 'images/sp/17.png', 'images/sp/17-big.png', NULL),
(18, 'Tôm thẻ trứng kg (70-90 con/kg)', 2, 15, 3000, 319900, 'Kg', 287910, 'images/sp/18.png', 'images/sp/18-big.png', NULL),
(19, 'Nghêu trắng sạch Lenger 600g', 2, 26, 3000, 41900, 'Gói', 37710, 'images/sp/19.png', 'images/sp/19-big.png', NULL),
(20, 'Mực lá đại dương kg – VDS990', 2, 15, 3000, 295000, 'Kg', 265500, 'images/sp/20.png', 'images/sp/20-big.png', NULL),
(21, 'Cá basa không đầu', 2, 15, 3000, 77900, 'Kg', 70110, 'images/sp/21.png', 'images/sp/21-big.png', NULL),
(22, 'Cá trắm sông kg', 2, 15, 3000, 84900, 'Kg', 76410, 'images/sp/22.png', 'images/sp/22-big.png', NULL),
(23, 'Bún tươi – kg', 3, 15, 3000, 19900, 'Kg', 17910, 'images/sp/23.png', 'images/sp/23-big.png', NULL),
(24, 'Mực rim me Đầm Sen hộp 150g', 3, 14, 3000, 71200, 'Hộp', 64080, 'images/sp/24.png', 'images/sp/24-big.png', NULL),
(25, 'Cá cơm tẩm me ăn liền Đầm Sen hủ 200g', 3, 14, 3000, 84000, 'Hộp', 75600, 'images/sp/25.png', 'images/sp/25-big.png', NULL),
(26, 'Đùi gà chiên giòn cay CPV 500g', 3, 13, 3000, 87600, 'Gói', 78840, 'images/sp/26.png', 'images/sp/26-big.png', NULL),
(27, 'Cóc ngâm chua ngọt Bốn mùa 500g', 3, 15, 3000, 27000, 'Gói', 24300, 'images/sp/27.png', 'images/sp/27-big.png', NULL),
(28, 'Thịt kho tàu kg', 3, 15, 3000, 250000, 'Kg', 225000, 'images/sp/28.png', 'images/sp/28-big.png', NULL),
(29, 'Giò thủ Meat Deli 250gr', 3, 28, 3000, 84900, 'Gói', 76410, 'images/sp/29.png', 'images/sp/29-big.png', NULL),
(30, 'Nhộng Kg', 3, 15, 3000, 105000, 'Kg', 94500, 'images/sp/30.png', 'images/sp/30-big.png', NULL),
(31, 'Kem hộp Merino 3in1 Đậu xanh sầu riêng sữa dừa 900ml', 4, 29, 3000, 53900, 'Hộp', 48510, 'images/sp/31.png', 'images/sp/31-big.png', NULL),
(32, 'Kem cao cấp Celano sữa chua & dâu 800ml', 4, 8, 3000, 99500, 'Hộp', 89550, 'images/sp/32.png', 'images/sp/32-big.png', NULL),
(33, 'Kem Cornetto Mini Socola & Vani 12x18g', 4, 12, 3000, 82000, 'Hộp', 73800, 'images/sp/33.png', 'images/sp/33-big.png', NULL),
(34, 'Kem que Topkid TH soco – vani 46g', 4, 43, 3000, 11600, 'Cái', 10440, 'images/sp/34.png', 'images/sp/34-big.png', NULL),
(35, 'Bắp ngọt đông lạnh SGF gói 500g\r\n', 4, 41, 3000, 45000, 'Gói', 40500, 'images/sp/35.png', 'images/sp/35-big.png', NULL),
(36, 'Khoai tây đông lạnh Farm Best Rosti Round 1kg', 4, 15, 3000, 104600, 'Gói', 94140, 'images/sp/36.png', 'images/sp/36-big.png', NULL),
(37, 'Cá viên hồ lô đông lạnh Sài Gòn food 330g', 4, 15, 3000, 77100, 'Gói', 69390, 'images/sp/37.png', 'images/sp/37-big.png', NULL),
(38, 'Đậu hủ trắng Coop Select 300g', 4, 11, 3000, 10800, 'Hộp', 9720, 'images/sp/38.png', 'images/sp/38-big.png', NULL),
(39, 'Bánh bao xá xíu Phú Mỹ 300g', 4, 15, 3000, 35300, 'Gói', 31770, 'images/sp/39.png', 'images/sp/39-big.png', NULL),
(40, 'Măng trúc Quân tử 300g – Kim bôi', 4, 21, 3000, 51500, 'Gói', 46350, 'images/sp/40.png', 'images/sp/40-big.png', NULL),
(41, 'Bánh gạo Orion khoai tây phô mai 100.8g', 5, 38, 3000, 21400, 'Gói', 19260, 'images/sp/41.png', 'images/sp/41-big.png', NULL),
(42, 'Bánh xốp Nabati Richeese hộp 20 x 7.5g', 5, 32, 3000, 36000, 'Hộp', 32400, 'images/sp/42.png', 'images/sp/42-big.png', NULL),
(43, 'Bánh cracker AFC dinh dưỡng tảo biển hộp 200g', 5, 2, 3000, 28000, 'Hộp', 25200, 'images/sp/43.png', 'images/sp/43-big.png', NULL),
(44, 'Hạt điều mật ong Yến Nhung hủ 450g', 5, 48, 3000, 278500, 'Hộp', 250650, 'images/sp/44.png', 'images/sp/44-big.png', NULL),
(45, 'Choco Kitakat Chunky thanh 38g', 5, 22, 3000, 18000, 'Cái', 16200, 'images/sp/45.png', 'images/sp/45-big.png', NULL),
(46, 'Kẹo singum Hubba Bubba Original 56g', 5, 15, 3000, 52000, 'Cái', 46800, 'images/sp/46.png', 'images/sp/46-big.png', NULL),
(47, 'Rau câu khoai môn Coop Select kg', 5, 11, 3000, 46200, 'Kg', 41580, 'images/sp/47.png', 'images/sp/47-big.png', NULL),
(48, 'Tảo biển nấu canh Mi Yuk Godbawee 15g', 5, 17, 3000, 17400, 'Gói', 15660, 'images/sp/48.png', 'images/sp/48-big.png', NULL),
(49, 'Snack khoa tây Koikeya lát dày cay đặc biệt 80g', 5, 23, 3000, 21700, 'Gói', 19530, 'images/sp/49.png', 'images/sp/49-big.png', NULL),
(50, 'Snack khoai tây Gokochi Koi muối tự nhiên 65g', 5, 15, 3000, 18400, 'Gói', 16560, 'images/sp/50.png', 'images/sp/50-big.png', NULL),
(51, 'Sữa đặc Ngôi sao Phương Nam xanh lá hộp 1,284kg', 6, 47, 3000, 67200, 'Hộp', 60480, 'images/sp/51.png', 'images/sp/51-big.png', NULL),
(52, 'Sữa lúa mạch Milo lốc 8 x 180ml', 6, 36, 3000, 61500, 'Lốc', 55350, 'images/sp/52.png', 'images/sp/52-big.png', NULL),
(53, 'Sữa chua uống tiệt trùng TH việt quất 48x180ml', 6, 43, 3000, 387000, 'Thùng', 348300, 'images/sp/53.png', 'images/sp/53-big.png', NULL),
(54, 'Sữa chua TH táo và sori 4x100g', 6, 43, 3000, 33600, 'Lốc', 30240, 'images/sp/54.png', 'images/sp/54-big.png', NULL),
(55, 'Sữa lên men Betagen dâu chai 700ml', 6, 3, 3000, 43000, 'Chai', 38700, 'images/sp/55.png', 'images/sp/55-big.png', NULL),
(56, 'Sữa tươi tiệt trùng Vinamilk 100% sữa tươi ít đường 220ml', 6, 47, 3000, 8100, 'Bịch', 7290, 'images/sp/56.png', 'images/sp/56-big.png', NULL),
(57, 'Phomai Zott Toast gói 200g', 6, 50, 3000, 61300, 'Gói', 55170, 'images/sp/57.png', 'images/sp/57-big.png', NULL),
(58, 'Phomai L V Quirit Light 200g', 6, 24, 3000, 69500, 'Gói', 62550, 'images/sp/58.png', 'images/sp/58-big.png', NULL),
(59, 'Sữa chua hoa quả Hoff chuối 4x55g', 6, 19, 3000, 46500, 'Lốc', 41850, 'images/sp/59.png', 'images/sp/59-big.png', NULL),
(60, 'Sữa chua nếp cẩm Mộc Châu 160gm', 6, 31, 3000, 13000, 'Cái', 11700, 'images/sp/60.png', 'images/sp/60-big.png', NULL),
(61, 'Nước tinh khiết Aquafina thùng 24 chai x 500ml', 7, 39, 3000, 119500, 'Thùng', 107550, 'images/sp/61.png', 'images/sp/61-big.png', NULL),
(62, 'Bia Tiger thùng 24 lon x 330ml', 7, 44, 3000, 374500, 'Thùng', 337050, 'images/sp/62.png', 'images/sp/62-big.png', NULL),
(63, 'Trà đen C2 dưa lưới bạc hà 455ml', 7, 6, 3000, 9500, 'Chai', 8550, 'images/sp/63.png', 'images/sp/63-big.png', NULL),
(64, 'Rượu Soju Korice hương mận 12% 360ml', 7, 15, 3000, 61000, 'Chai', 54900, 'images/sp/64.png', 'images/sp/64-big.png', NULL),
(65, 'Trà sữa đường nâu Nestea 8 gói x17g', 7, 36, 3000, 37200, 'Hộp', 33480, 'images/sp/65.png', 'images/sp/65-big.png', NULL),
(66, 'Nescafe 3in1 mới – vị hài hoà không ngọt hộp 20 gói x 10g', 7, 36, 3000, 63500, 'Hộp', 57150, 'images/sp/66.png', 'images/sp/66-big.png', NULL),
(67, 'Nước táo lên men Strongbow vị dâu đen thùng 24 chai x 330ml', 7, 42, 3000, 413300, 'Thùng', 371970, 'images/sp/67.png', 'images/sp/67-big.png', NULL),
(68, 'Trà atiso thảo mộc Coop Select 500g', 7, 11, 3000, 375000, 'Gói', 337500, 'images/sp/68.png', 'images/sp/68-big.png', NULL),
(69, 'Mật ong rừng sữa chúa Zemlya 360g', 7, 49, 3000, 74500, 'Chai', 67050, 'images/sp/69.png', 'images/sp/69-big.png', NULL),
(70, 'Nước giải khát Coca không đường 24x600ml', 7, 10, 3000, 201500, 'Thùng', 181350, 'images/sp/70.png', 'images/sp/70-big.png', NULL),
(71, 'Mì Hảo Hảo tôm chua cay 30gói x 75g', 8, 1, 3000, 126000, 'Thùng', 113400, 'images/sp/71.png', 'images/sp/71-big.png', NULL),
(72, 'Hạt nêm Knorr thịt thăn xương ống và tủy gói 900g', 8, 45, 3000, 85500, 'Bịch', 76950, 'images/sp/72.png', 'images/sp/72-big.png', NULL),
(73, 'Hạt nêm Neptune 4in1 vị heo 850g', 8, 35, 3000, 75000, 'Gói', 67500, 'images/sp/73.png', 'images/sp/73-big.png', NULL),
(74, 'Nước mắm Nam Ngư đệ nhị chai 900ml', 8, 9, 3000, 23900, 'Chai', 21510, 'images/sp/74.png', 'images/sp/74-big.png', NULL),
(75, 'Mì Miliket chay thùng 30 gói x 70g', 8, 30, 3000, 127000, 'Thùng', 114300, 'images/sp/75.png', 'images/sp/75-big.png', NULL),
(76, 'Mì dinh dưỡng khoai tây Omachi xốt bò hầm tô 18x92g', 8, 37, 3000, 244200, 'Thùng', 219780, 'images/sp/76.png', 'images/sp/76-big.png', NULL),
(77, 'Dầu ăn Cooking Oil Nakydaco 1L', 8, 33, 3000, 42000, 'Chai', 37800, 'images/sp/77.png', 'images/sp/77-big.png', NULL),
(78, 'Dầu dừa tinh khiết Premium Organic Vietcoco 1 lít', 8, 46, 3000, 181500, 'Chai', 163350, 'images/sp/78.png', 'images/sp/78-big.png', NULL),
(79, 'Tương ớt Nam Dương cay vừa 255g', 8, 34, 3000, 11400, 'Chai', 10260, 'images/sp/79.png', 'images/sp/79-big.png', NULL),
(80, 'Tương ớt Chinsu chai 500g', 8, 9, 3000, 28700, 'Chai', 25830, 'images/sp/80.png', 'images/sp/80-big.png', NULL),
(81, 'Khăn ướt Bobby Nano Sliver – 100 miếng', 9, 5, 3000, 45500, 'Gói', 40950, 'images/sp/81.png', 'images/sp/81-big.png', NULL),
(82, 'Sữa Nan Optipro 1 HMO 900g – F', 9, 36, 3000, 486500, 'Lon', 437850, 'images/sp/82.png', 'images/sp/82-big.png', NULL),
(83, 'Sữa tắm gội cho bé Carrie Junior yoghurt mơ', 9, 7, 3000, 185000, 'Chai', 166500, 'images/sp/83.png', 'images/sp/83-big.png', NULL),
(84, 'Khăn sữa sợi tre Coop Select 30×30 6 cái', 9, 15, 3000, 120000, 'Cái', 108000, 'images/sp/84.png', 'images/sp/84-big.png', NULL),
(85, 'Sản phẩm dinh dưỡng NAN OPTIPRO 4 HMO 2-FL hộp thiếc 900g', 9, 36, 3000, 422300, 'Hộp', 380070, 'images/sp/85.png', 'images/sp/85-big.png', NULL),
(86, 'Bảng xóa LT 908M', 9, 15, 3000, 49500, 'Cái', 44550, 'images/sp/86.png', 'images/sp/86-big.png', NULL),
(87, 'Sữa tắm gội baby PUREEN tinh chất sữa chua & vani 750ml', 9, 15, 3000, 190300, 'Chai', 171270, 'images/sp/87.png', 'images/sp/87-big.png', NULL),
(88, 'Sản phẩm dinh dưỡng GrowPlus+ (xanh) tăng cân hộp thiếc 900g', 9, 18, 3000, 308500, 'Hộp', 277650, 'images/sp/88.png', 'images/sp/88-big.png', NULL),
(89, 'Sản phẩm dinh dưỡng Enfamil A+ Neuropro 1 – FL HMO 830g', 9, 27, 3000, 635000, 'Hộp', 571500, 'images/sp/89.png', 'images/sp/89-big.png', NULL),
(90, 'Tã dán Huggies Dry size S – 56 miếng', 9, 20, 3000, 197000, 'Gói', 177300, 'images/sp/90.png', 'images/sp/90-big.png', NULL),
(91, 'Nước rửa tay Lifebuoy Vitamin bảo vệ vượt trội 10 túi 400g', 10, 45, 3000, 59000, 'Bịch', 53100, 'images/sp/91.png', 'images/sp/91-big.png', NULL),
(92, 'Nước rửa tay Lifebuoy Vitamin bảo vệ vượt trội 10 chai 450g', 10, 45, 3000, 77500, 'Chai', 69750, 'images/sp/92.png', 'images/sp/92-big.png', NULL),
(93, 'Dầu gội Clear bạc hà mát lạnh sạch gàu 880g', 10, 45, 3000, 224000, 'Chai', 201600, 'images/sp/93.png', 'images/sp/93-big.png', NULL),
(94, 'Kem đánh răng P/S trà xanh 230g', 10, 45, 3000, 43000, 'Hộp', 38700, 'images/sp/94.png', 'images/sp/94-big.png', NULL),
(95, 'Dầu gội Clear men nước hoa Warm Forest 600g', 10, 45, 3000, 180000, 'Chai', 162000, 'images/sp/95.png', 'images/sp/95-big.png', NULL),
(96, 'Xà bông cục Safeguard Ivory white care 130g/125g', 10, 40, 3000, 19500, 'Hộp', 17550, 'images/sp/96.png', 'images/sp/96-big.png', NULL),
(97, 'Băng vệ sinh Laurier hằng ngày siêu thấm không hương 40 miếng', 10, 25, 3000, 41000, 'Bịch', 36900, 'images/sp/97.png', 'images/sp/97-big.png', NULL),
(98, 'Sữa tắm Biore mát lạnh kháng khuẩn 800g', 10, 4, 3000, 131000, 'Bộ', 117900, 'images/sp/98.png', 'images/sp/98-big.png', NULL),
(99, 'Sữa rửa mặt nam Gatsby Strong Clear 130g', 10, 16, 3000, 71000, 'Chai', 63900, 'images/sp/99.png', 'images/sp/99-big.png', NULL),
(100, 'Mặt nạ Reinplatz vita white 25g', 10, 15, 3000, 25000, 'Cái', 22500, 'images/sp/100.png', 'images/sp/100-big.png', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinhtrang`
--

CREATE TABLE `tinhtrang` (
  `tinhtrangid` int(11) NOT NULL,
  `tentinhtrang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tinhtrang`
--

INSERT INTO `tinhtrang` (`tinhtrangid`, `tentinhtrang`) VALUES
(1, 'Đang chờ xử lý'),
(2, 'Phê duyệt'),
(3, 'Đang xử lý'),
(4, 'Thành công'),
(5, 'Từ chối yêu cầu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trangthai`
--

CREATE TABLE `trangthai` (
  `trangthaiid` int(11) NOT NULL,
  `tentrangthai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `trangthai`
--

INSERT INTO `trangthai` (`trangthaiid`, `tentrangthai`) VALUES
(1, 'Đang chuẩn bị hàng'),
(2, 'Đang giao'),
(3, 'Giao hàng thành công'),
(4, 'Giao hàng không thành công'),
(5, 'Đã hủy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `yeucaudoitra`
--

CREATE TABLE `yeucaudoitra` (
  `yeucauid` int(11) NOT NULL,
  `donhangid` int(11) NOT NULL,
  `nhanvienid` int(11) DEFAULT NULL,
  `khachhangid` int(11) NOT NULL,
  `ngayyeucau` datetime NOT NULL,
  `lydo` varchar(200) NOT NULL,
  `ngayhoanthanh` datetime DEFAULT NULL,
  `tinhtrangid` int(11) NOT NULL,
  `loaiyeucauid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `yeucaudoitra`
--

INSERT INTO `yeucaudoitra` (`yeucauid`, `donhangid`, `nhanvienid`, `khachhangid`, `ngayyeucau`, `lydo`, `ngayhoanthanh`, `tinhtrangid`, `loaiyeucauid`) VALUES
(1, 2, NULL, 1, '2023-06-07 23:25:28', 'hết hạn sử dụng', NULL, 1, 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`chucvuid`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`danhmucid`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`donhangid`),
  ADD KEY `fkkhachhangid` (`khachhangid`),
  ADD KEY `fknv` (`nhanvienid`),
  ADD KEY `fktt` (`trangthaiid`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`giohangid`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`khachhangid`);

--
-- Chỉ mục cho bảng `loaiyeucau`
--
ALTER TABLE `loaiyeucau`
  ADD PRIMARY KEY (`loaiyeucauid`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`nccid`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`nhanvienid`),
  ADD KEY `fkidcv` (`chucvuid`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`sanphamid`),
  ADD KEY `fkncc` (`nccid`),
  ADD KEY `fkdm` (`danhmucid`);

--
-- Chỉ mục cho bảng `tinhtrang`
--
ALTER TABLE `tinhtrang`
  ADD PRIMARY KEY (`tinhtrangid`);

--
-- Chỉ mục cho bảng `trangthai`
--
ALTER TABLE `trangthai`
  ADD PRIMARY KEY (`trangthaiid`);

--
-- Chỉ mục cho bảng `yeucaudoitra`
--
ALTER TABLE `yeucaudoitra`
  ADD PRIMARY KEY (`yeucauid`),
  ADD KEY `fkttr` (`tinhtrangid`),
  ADD KEY `fklyc` (`loaiyeucauid`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `chucvuid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `danhmucid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `donhangid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `giohangid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `khachhangid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `loaiyeucau`
--
ALTER TABLE `loaiyeucau`
  MODIFY `loaiyeucauid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `nccid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `nhanvienid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `sanphamid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT cho bảng `tinhtrang`
--
ALTER TABLE `tinhtrang`
  MODIFY `tinhtrangid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `trangthai`
--
ALTER TABLE `trangthai`
  MODIFY `trangthaiid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `yeucaudoitra`
--
ALTER TABLE `yeucaudoitra`
  MODIFY `yeucauid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `fkidnv` FOREIGN KEY (`nhanvienid`) REFERENCES `nhanvien` (`nhanvienid`),
  ADD CONSTRAINT `fkkhachhangid` FOREIGN KEY (`khachhangid`) REFERENCES `khachhang` (`khachhangid`),
  ADD CONSTRAINT `fktt` FOREIGN KEY (`trangthaiid`) REFERENCES `trangthai` (`trangthaiid`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `fkidcv` FOREIGN KEY (`chucvuid`) REFERENCES `chucvu` (`chucvuid`);

--
-- Các ràng buộc cho bảng `yeucaudoitra`
--
ALTER TABLE `yeucaudoitra`
  ADD CONSTRAINT `fklyc` FOREIGN KEY (`loaiyeucauid`) REFERENCES `loaiyeucau` (`loaiyeucauid`),
  ADD CONSTRAINT `fkttr` FOREIGN KEY (`tinhtrangid`) REFERENCES `tinhtrang` (`tinhtrangid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
