
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `Iddh` varchar(5) NOT NULL,
  `Id_sp` int(5) NOT NULL,
  `Ma_size` varchar(5) NOT NULL,
  `Soluong` int(11) NOT NULL,
  `Dongia` decimal(10,0) NOT NULL,
  `Thanhtien` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`Iddh`, `Id_sp`, `Ma_size`, `Soluong`, `Dongia`, `Thanhtien`) VALUES
('DH100', 10001, 'SZ102', 1, '1890000', '1890000'),
('DH100', 10003, 'SZ104', 1, '1890000', '1890000'),
('DH100', 10008, 'SZ103', 1, '1890000', '1890000'),
('DH101', 10002, 'SZ102', 2, '1690000', '3380000'),
('DH102', 10021, 'SZ102', 1, '890000', '890000'),
('DH103', 10021, 'SZ102', 1, '890000', '890000'),
('DH104', 10002, 'SZ105', 5, '1690000', '8450000'),
('DH105', 10003, 'SZ104', 1, '1890000', '1890000'),
('DH106', 10039, 'SZ104', 4, '2190000', '8760000'),
('DH107', 10003, 'SZ105', 1, '1890000', '1890000'),
('DH108', 10004, 'SZ103', 2, '1500000', '3000000'),
('DH109', 10002, 'SZ101', 12, '1690000', '20280000'),
('DH110', 10002, 'SZ101', 12, '1690000', '20280000'),
('DH111', 10002, 'SZ100', 4, '1690000', '6760000'),
('DH111', 10004, 'SZ103', 4, '1500000', '6000000'),
('DH112', 10003, 'SZ102', 3, '1890000', '5670000'),
('DH112', 10004, 'SZ104', 1, '1500000', '1500000'),
('DH112', 10005, 'SZ102', 1, '1500000', '1500000'),
('DH113', 10002, 'SZ100', 1, '1690000', '1690000'),
('DH114', 10003, 'SZ102', 1, '1890000', '1890000'),
('DH115', 10007, 'SZ105', 7, '2390000', '16730000'),
('DH116', 10001, 'SZ101', 1, '1050000', '1050000'),
('DH117', 10001, 'SZ102', 1, '1050000', '1050000'),
('DH118', 10001, 'SZ100', 1, '1050000', '1050000'),
('DH119', 10001, 'SZ100', 1, '1050000', '1050000'),
('DH120', 10004, 'SZ103', 1, '880000', '880000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietquyen`
--

CREATE TABLE `chitietquyen` (
  `Id_role` varchar(5) NOT NULL,
  `Id_danhmuc` varchar(5) NOT NULL,
  `tinhtrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietquyen`
--

INSERT INTO `chitietquyen` (`Id_role`, `Id_danhmuc`, `tinhtrang`) VALUES
('RL100', 'DM100', 1),
('RL100', 'DM101', 0),
('RL100', 'DM102', 0),
('RL100', 'DM103', 0),
('RL100', 'DM104', 0),
('RL100', 'DM105', 0),
('RL100', 'DM106', 1),
('RL100', 'DM107', 0),
('RL101', 'DM100', 1),
('RL101', 'DM101', 1),
('RL101', 'DM102', 1),
('RL101', 'DM103', 0),
('RL101', 'DM104', 1),
('RL101', 'DM105', 0),
('RL101', 'DM106', 1),
('RL101', 'DM107', 1),
('RL102', 'DM100', 1),
('RL102', 'DM101', 1),
('RL102', 'DM102', 1),
('RL102', 'DM103', 1),
('RL102', 'DM104', 1),
('RL102', 'DM105', 1),
('RL102', 'DM106', 1),
('RL102', 'DM107', 1),
('RL103', 'DM100', 1),
('RL103', 'DM101', 1),
('RL103', 'DM102', 1),
('RL103', 'DM103', 1),
('RL103', 'DM104', 1),
('RL103', 'DM105', 1),
('RL103', 'DM106', 1),
('RL103', 'DM107', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietsanpham`
--

CREATE TABLE `chitietsanpham` (
  `Id_sp` int(5) NOT NULL,
  `Ma_size` varchar(5) NOT NULL,
  `Soluong` int(11) NOT NULL,
  `Tinhtrang` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietsanpham`
--

INSERT INTO `chitietsanpham` (`Id_sp`, `Ma_size`, `Soluong`, `Tinhtrang`) VALUES
(10001, 'SZ100', 3, 1),
(10001, 'SZ101', 1, 1),
(10001, 'SZ102', 3, 1),
(10001, 'SZ103', 3, 1),
(10002, 'SZ100', 1, 1),
(10002, 'SZ101', 5, 1),
(10002, 'SZ102', 5, 1),
(10002, 'SZ103', 4, 1),
(10003, 'SZ100', 5, 1),
(10003, 'SZ101', 5, 1),
(10003, 'SZ102', 5, 1),
(10003, 'SZ103', 5, 1),
(10004, 'SZ100', 5, 1),
(10004, 'SZ101', 5, 1),
(10004, 'SZ102', 5, 1),
(10004, 'SZ103', 5, 1),
(10005, 'SZ100', 5, 1),
(10005, 'SZ101', 5, 1),
(10005, 'SZ102', 3, 1),
(10005, 'SZ103', 5, 1),
(10006, 'SZ100', 5, 1),
(10006, 'SZ101', 5, 1),
(10006, 'SZ102', 5, 1),
(10006, 'SZ103', 5, 1),
(10007, 'SZ100', 5, 1),
(10007, 'SZ101', 5, 1),
(10007, 'SZ102', 5, 1),
(10007, 'SZ103', 5, 1),
(10008, 'SZ100', 5, 1),
(10008, 'SZ101', 5, 1),
(10008, 'SZ102', 5, 1),
(10008, 'SZ103', 3, 1),
(10009, 'SZ104', 5, 1),
(10010, 'SZ104', 5, 1),
(10011, 'SZ104', 5, 1),
(10012, 'SZ104', 5, 1),
(10013, 'SZ104', 5, 1),
(10014, 'SZ104', 5, 1),
(10015, 'SZ104', 5, 1),
(10016, 'SZ104', 5, 1),
(10017, 'SZ104', 5, 1),
(10018, 'SZ100', 5, 1),
(10018, 'SZ101', 5, 1),
(10018, 'SZ102', 5, 1),
(10018, 'SZ103', 5, 1),
(10019, 'SZ100', 5, 1),
(10019, 'SZ101', 5, 1),
(10019, 'SZ102', 5, 1),
(10019, 'SZ103', 5, 1),
(10020, 'SZ100', 5, 1),
(10020, 'SZ101', 5, 1),
(10020, 'SZ102', 5, 1),
(10020, 'SZ103', 5, 1),
(10021, 'SZ100', 5, 1),
(10021, 'SZ101', 5, 1),
(10021, 'SZ102', 3, 1),
(10021, 'SZ103', 5, 1),
(10022, 'SZ100', 5, 1),
(10022, 'SZ101', 5, 1),
(10022, 'SZ102', 5, 1),
(10022, 'SZ103', 5, 1),
(10023, 'SZ100', 5, 1),
(10023, 'SZ101', 5, 1),
(10023, 'SZ102', 5, 1),
(10023, 'SZ103', 5, 1),
(10024, 'SZ100', 5, 1),
(10024, 'SZ101', 5, 1),
(10024, 'SZ102', 5, 1),
(10024, 'SZ103', 5, 1),
(10025, 'SZ104', 5, 1),
(10026, 'SZ104', 5, 1),
(10027, 'SZ104', 5, 1),
(10028, 'SZ104', 5, 1),
(10029, 'SZ104', 5, 1),
(10030, 'SZ104', 5, 1),
(10031, 'SZ104', 5, 1),
(10032, 'SZ104', 5, 1),
(10033, 'SZ104', 5, 1),
(10034, 'SZ101', 5, 1),
(10034, 'SZ102', 5, 1),
(10034, 'SZ103', 5, 1),
(10035, 'SZ104', 5, 1),
(10036, 'SZ101', 5, 1),
(10036, 'SZ102', 5, 1),
(10036, 'SZ103', 5, 1),
(10037, 'SZ101', 5, 1),
(10037, 'SZ102', 5, 1),
(10037, 'SZ103', 5, 1),
(10038, 'SZ101', 5, 1),
(10038, 'SZ102', 5, 1),
(10038, 'SZ103', 5, 1),
(10039, 'SZ104', 5, 1),
(10040, 'SZ101', 5, 1),
(10040, 'SZ102', 5, 1),
(10040, 'SZ103', 5, 1),
(10041, 'SZ104', 5, 1),
(10042, 'SZ101', 5, 1),
(10042, 'SZ102', 5, 1),
(10042, 'SZ103', 5, 1),
(10043, 'SZ100', 1, 1),
(10043, 'SZ101', 5, 1),
(10043, 'SZ102', 1, 1),
(10043, 'SZ103', 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `Id_danhmuc` varchar(5) NOT NULL,
  `Ten_danhmuc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`Id_danhmuc`, `Ten_danhmuc`) VALUES
('DM100', 'Đơn hàng'),
('DM101', 'Quản lý kho'),
('DM102', 'Thể loại'),
('DM103', 'Roles '),
('DM104', 'Sản phẩm'),
('DM105', 'Tài khoản'),
('DM106', 'Thông tin tài khoản'),
('DM107', 'Thống kê');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `Iddh` varchar(5) NOT NULL,
  `Id_kh` varchar(5) NOT NULL,
  `Id_nv` varchar(5) DEFAULT NULL,
  `Tennguoinhan` varchar(50) NOT NULL,
  `Diachi` varchar(200) NOT NULL,
  `Sđt` varchar(11) DEFAULT NULL,
  `Ghichu` text DEFAULT NULL,
  `Thoidiemdathang` date NOT NULL,
  `Thoidiemgiaohang` date NOT NULL,
  `Tongtien` decimal(10,0) NOT NULL,
  `Id_trangthai` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`Iddh`, `Id_kh`, `Id_nv`, `Tennguoinhan`, `Diachi`, `Sđt`, `Ghichu`, `Thoidiemdathang`, `Thoidiemgiaohang`, `Tongtien`, `Id_trangthai`) VALUES
('DH113', 'TK103', ' ', 'Admin', 'An Dương Vương, Q5, TP.HCM', '01345678454', '', '2023-04-04', '2023-04-11', '1690000', 'STA10'),
('DH114', 'TK103', ' ', 'Admin', 'An Dương Vương, Q5, TP.HCM', '73474474474', '', '2023-04-04', '2023-04-11', '1890000', 'STA10'),
('DH115', 'TK103', ' ', 'Admin', 'An Dương Vương, Q5, TP.HCM', '68897876567', '', '2023-04-11', '2023-04-18', '16730000', 'STA10'),
('DH116', 'TK109', ' ', 'MINHTAM', 'HCM', '0123424324', '', '2023-04-25', '2023-05-02', '1050000', 'STA10'),
('DH117', 'TK101', ' ', 'Nguyễn Văn A', 'An Dương Vương, Q5, TP.HCM', '09099999099', '', '2023-04-25', '2023-05-02', '1050000', 'STA10'),
('DH118', 'TK106', ' ', 'Khach hang 2', 'HCM', '0273732122', '', '2023-04-25', '2023-05-02', '1050000', 'STA10'),
('DH119', 'TK103', ' ', 'Admin', 'An Dương Vương, Q5, TP.HCM', '0123456789', '', '2023-05-08', '2023-05-15', '1050000', 'STA10'),
('DH120', 'TK103', ' ', 'Admin', 'An Dương Vương, Q5, TP.HCM', '0123456789', '', '2023-05-08', '2023-05-15', '880000', 'STA10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `Id_role` varchar(5) NOT NULL,
  `Ten_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`Id_role`, `Ten_role`) VALUES
('RL100', 'Khách hàng'),
('RL101', 'Nhân viên'),
('RL102', 'Quản lý'),
('RL103', 'Admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `ID_sp` int(5) NOT NULL,
  `Tensp` varchar(50) NOT NULL,
  `Id_theloai` varchar(5) NOT NULL,
  `Dongia` decimal(10,0) NOT NULL,
  `Img` varchar(50) NOT NULL,
  `Mota` text DEFAULT NULL,
  `Ngayphathanh` date NOT NULL,
  `Hienthi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`ID_sp`, `Tensp`, `Id_theloai`, `Dongia`, `Img`, `Mota`, `Ngayphathanh`, `Hienthi`) VALUES
(10001, 'VÒNG TAY CỎ 4 LÁ', 'TL001', '1050000', 'VT1.jpg', '', '2023-03-22', 1),
(10002, 'VÒNG TAY BÔNG TUYẾT', 'TL001', '769000', 'VT2.jpg', '', '2023-03-22', 1),
(10003, 'VÒNG TAY NGÔI SAO', 'TL001', '689000', 'VT3.jpg', '', '2023-03-22', 1),
(10004, 'VÒNG TAY TRÁI TIM', 'TL001', '880000', 'VT4.jpg', '', '2023-03-22', 1),
(10005, 'VÒNG TAY DẠNG KIỀNG ĐÍNH ĐÁ', 'TL001', '750000', 'VT5.jpg', '', '2023-03-22', 1),
(10006, 'VÒNG TAY PHA LÊ', 'TL001', '1197000', 'VT6.jpg', '', '2023-03-22', 1),
(10007, 'VÒNG TAY HỒ LY', 'TL001', '939000', 'VT7.jpg', '', '2023-03-22', 1),
(10008, 'VÒNG TAY ĐÍNH CHARM ', 'TL001', '1390000', 'VT8.jpg', '', '2022-03-22', 1),
(10009, 'NHẪN ĐÍNH ĐÁ CAO CẤP', 'TL002', '799000', 'N2.jpg', '', '2023-03-22', 1),
(10010, 'NHẪN HÌNH RẮN CÁ TÍNH', 'TL002', '469000', 'N1.jpg', '', '2022-03-22', 1),
(10011, 'NHẪN VƯƠNG MIỆN', 'TL002', '479000', 'N3.jpg', '', '2023-03-22', 1),
(10012, 'NHẪN MẶT ĐÁ CHỮ NHẬT', 'TL002', '539000', 'N4.jpg', '', '2023-03-22', 1),
(10013, 'NHẪN MẶT ĐÁ VUÔNG', 'TL002', '599000', 'N5.jpg', '', '2023-03-22', 1),
(10014, 'NHẪN BÔNG HOA ĐÍNH ĐÁ ', 'TL002', '919000', 'N6.jpg', '', '2023-03-22', 1),
(10015, 'NHẪN LÁ NGUYỆT QUẾ', 'TL002', '679000', 'N7.jpg', '', '2023-03-22', 1),
(10016, 'NHẪN ĐÍNH ĐÁ PHA LÊ CAO CẤP', 'TL002', '1390000', 'N8.jpg', '', '2023-03-22', 1),
(10017, 'NHẪN HÌNH CHIẾC NƠ', 'TL002', '639000', 'N11.jpg', '', '2023-03-22', 1),
(10018, 'DÂY CHUYỀN MẶT TRÁI TIM ', 'TL003', '1050000', 'VC1.jpg', '', '2023-03-22', 1),
(10019, 'DÂY CHUYỀN ĐƠN GIẢN ĐÍNH ĐÁ', 'TL003', '888000', 'VC2.jpg', '', '2023-03-22', 1),
(10020, 'DÂY CHUYỀN MẶT VUÔNG SANG TRỌNG ', 'TL003', '1580000', 'VC3.jpg', '', '2023-03-22', 1),
(10021, 'DÂY CHUYỀN HOA 4 CÁNH ĐÍNH ĐÁ', 'TL003', '998000', 'VC4.jpg', '', '2023-03-22', 1),
(10022, 'DÂY CHUYỀN THIÊN NGA', 'TL003', '839000', 'VC5.jpg', '', '2023-03-22', 1),
(10023, 'DÂY CHUYỀN MẶT LÁ MÙA THU', 'TL003', '1090000', 'VC6.jpg', '', '2023-03-22', 1),
(10024, 'DÂY CHUYỀN MẶT CHIẾC NƠ ĐÍNH ĐÁ', 'TL003', '1190000', 'VC7.jpg', '', '2023-03-22', 1),
(10025, 'BÔNG TAI ĐÍNH NGỌC TRAI', 'TL004', '998000', 'BT1.jpg', '', '2023-03-22', 1),
(10026, 'BÔNG TAI TRÁI TIM', 'TL004', '848000', 'BT2.jpg', '', '2023-03-22', 1),
(10027, 'BÔNG TAI BI TRÒN NHỎ', 'TL004', '748000', 'BT3.jpg', '', '2023-03-22', 1),
(10028, 'BÔNG TAI HÌNH TAM GIÁC', 'TL004', '648000', 'BT4.jpg', '', '2023-03-22', 1),
(10029, 'BÔNG TAI HOA 4 CÁNH ĐÍNH ĐÁ', 'TL004', '898000', 'BT5.jpg', '', '2023-03-22', 1),
(10030, 'BÔNG TAI NGÔI SAO ĐÍNH ĐÁ', 'TL004', '748000', 'BT6.jpg', '', '2023-03-22', 1),
(10031, 'BÔNG TAI MẶT TRÒN ĐÍNH ĐÁ', 'TL004', '678000', 'BT7.jpg', '', '2023-03-22', 1),
(10032, 'BÔNG TAI OX ĐÍNH ĐÁ', 'TL004', '658000', 'BT8.jpg', '', '2023-03-22', 1),
(10033, 'BÔNG TAI HÌNH BÔNG TUYẾT', 'TL004', '798000', 'BT9.jpg', '', '2023-03-22', 1),
(10034, 'VÒNG TAY DẠNG KIỀNG XOẮN ĐÍNH ĐÁ', 'TL001', '1190000', 'VT9.jpg', '', '2023-03-22', 1),
(10035, 'NHẪN ĐÍNH ĐÁ ĐỎ SANG TRỌNG', 'TL002', '2290000', 'N9.jpg', '', '2023-03-22', 1),
(10036, 'DÂY CHUYỀN DẠNG BI', 'TL003', '2590000', 'VC8.jpg', '', '2023-03-22', 1),
(10037, 'VÒNG TAY DẠNG KIỀNG HÌNH CON CÔNG', 'TL001', '1690000', 'VT10.jpg', '', '2023-03-22', 1),
(10038, 'VÒNG TAY NGUYỆT QUẾ', 'TL001', '889000', 'VT11.jpg', '', '2023-03-22', 1),
(10039, 'BÔNG TAI DẠNG KHOEN TRÒN', 'TL004', '619000', 'BT10.jpg', '', '2023-03-22', 1),
(10040, 'DÂY CHUYỀN THỎ NGẮM TRĂNG', 'TL003', '1690000', 'VC9.jpg', '', '2023-03-22', 1),
(10041, 'NHẪN VƯƠNG MIỆN ĐÍNH ĐÁ CAO CẤP', 'TL002', '999000', 'N10.jpg', '', '2023-03-22', 1),
(10042, 'DÂY CHUYỀN CHONG CHÓNG ĐÍNH ĐÁ', 'TL003', '949000', 'VC10.jpg', '', '2023-03-22', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `Ma_size` varchar(5) NOT NULL,
  `Ten_size` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`Ma_size`, `Ten_size`) VALUES
('SZ100', '6'),
('SZ101', '7'),
('SZ102', '8'),
('SZ103', '9'),
('SZ104', '--');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `Id_tk` varchar(5) NOT NULL,
  `Id_role` varchar(5) NOT NULL,
  `tendangnhap` varchar(25) NOT NULL,
  `matkhau` varchar(25) NOT NULL,
  `Hienthi` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`Id_tk`, `Id_role`, `tendangnhap`, `matkhau`, `Hienthi`) VALUES
('TK101', 'RL101', 'nhanvien', '456', 1),
('TK102', 'RL102', 'quanly', '789', 1),
('TK103', 'RL103', 'admin', 'admin', 1),
('TK105', 'RL100', 'mr', '123', 0),
('TK106', 'RL100', 'mmm', '123', 0),
('TK108', 'RL100', 'Minhtam', '123', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `Idtheloai` varchar(5) NOT NULL,
  `Tentheloai` varchar(50) NOT NULL,
  `Thutu` int(11) NOT NULL,
  `Hienthi` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`Idtheloai`, `Tentheloai`, `Thutu`, `Hienthi`) VALUES
('TL001', 'VÒNG  TAY', 1, 1),
('TL002', 'NHẪN', 2, 1),
('TL003', 'DÂY CHUYỀN', 3, 1),
('TL004', 'BÔNG TAI', 4, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongke`
--

CREATE TABLE `thongke` (
  `STT` int(5) NOT NULL,
  `MaSP` varchar(5) NOT NULL,
  `TenSP` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Dongia` int(8) NOT NULL,
  `Soluong` int(5) NOT NULL,
  `Thuthap` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtintaikhoan`
--

CREATE TABLE `thongtintaikhoan` (
  `Id_tk` varchar(5) NOT NULL,
  `Hoten` varchar(50) NOT NULL,
  `Ngaydangky` date NOT NULL,
  `Diachi` varchar(200) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Dienthoai` varchar(11) NOT NULL,
  `Tinhtrang` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thongtintaikhoan`
--

INSERT INTO `thongtintaikhoan` (`Id_tk`, `Hoten`, `Ngaydangky`, `Diachi`, `Email`, `Dienthoai`, `Tinhtrang`) VALUES
('TK101', 'Nhân viên ', '2022-04-22', 'An Dương Vương, Q5, TP.HCM', '', '09099999099', 1),
('TK102', 'Quản lý ', '2022-04-22', 'An Dương Vương, Q5, TP.HCM', '', '0909999213', 1),
('TK103', 'Admin', '2022-04-22', 'An Dương Vương, Q5, TP.HCM', '', '', 1),
('TK105', 'Khach hang 1', '0000-00-00', '', '', '', 1),
('TK106', 'Khach hang 2', '0000-00-00', '', '', '', 1),
('TK108', 'Khach hang 3 ', '0000-00-00', '', '', '', 1),
('TK109', 'Khach hang 4 ', '0000-00-00', '', '', '', 1),
('TK110', 'khach hang 5 ', '0000-00-00', '', '', '', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinhtrang`
--

CREATE TABLE `tinhtrang` (
  `Tinhtrang` tinyint(1) NOT NULL,
  `Tentinhtrang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tinhtrang`
--

INSERT INTO `tinhtrang` (`Tinhtrang`, `Tentinhtrang`) VALUES
(0, 'Bị khoá'),
(1, 'Hoạt động');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trangthai`
--

CREATE TABLE `trangthai` (
  `Id_trangthai` varchar(5) NOT NULL,
  `Tentrangthai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `trangthai`
--

INSERT INTO `trangthai` (`Id_trangthai`, `Tentrangthai`) VALUES
('STA10', 'Chưa xử lý'),
('STA11', 'Đang xử lý'),
('STA12', 'Đã xử lý');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`Iddh`,`Id_sp`,`Ma_size`),
  ADD KEY `Id_sp` (`Id_sp`),
  ADD KEY `Ma_size` (`Ma_size`);

--
-- Chỉ mục cho bảng `chitietquyen`
--
ALTER TABLE `chitietquyen`
  ADD PRIMARY KEY (`Id_role`,`Id_danhmuc`),
  ADD KEY `fk_danhmuc` (`Id_danhmuc`);

--
-- Chỉ mục cho bảng `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  ADD PRIMARY KEY (`Id_sp`,`Ma_size`),
  ADD KEY `Size` (`Ma_size`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`Id_danhmuc`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`Iddh`),
  ADD KEY `Id_kh` (`Id_kh`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Id_role`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`ID_sp`),
  ADD KEY `fk_theloai` (`Id_theloai`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`Ma_size`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`Id_tk`),
  ADD UNIQUE KEY `tendangnhap` (`tendangnhap`),
  ADD KEY `fk_roles` (`Id_role`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`Idtheloai`);

--
-- Chỉ mục cho bảng `thongtintaikhoan`
--
ALTER TABLE `thongtintaikhoan`
  ADD PRIMARY KEY (`Id_tk`),
  ADD KEY `fk_tinhtrang` (`Tinhtrang`);

--
-- Chỉ mục cho bảng `tinhtrang`
--
ALTER TABLE `tinhtrang`
  ADD PRIMARY KEY (`Tinhtrang`);

--
-- Chỉ mục cho bảng `trangthai`
--
ALTER TABLE `trangthai`
  ADD PRIMARY KEY (`Id_trangthai`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietquyen`
--
ALTER TABLE `chitietquyen`
  ADD CONSTRAINT `fk_danhmuc` FOREIGN KEY (`Id_danhmuc`) REFERENCES `danhmuc` (`Id_danhmuc`),
  ADD CONSTRAINT `fk_role` FOREIGN KEY (`Id_role`) REFERENCES `roles` (`Id_role`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`Id_kh`) REFERENCES `taikhoan` (`Id_tk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
