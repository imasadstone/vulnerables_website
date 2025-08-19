-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2025 at 09:13 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manga_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `content`, `created_at`) VALUES
(1, 4, 'tuyệt vời', '2025-07-02 15:53:09'),
(11, 6, 'abcdef', '2025-07-05 14:40:18'),
(18, 6, '123', '2025-07-09 06:38:42');

-- --------------------------------------------------------

--
-- Table structure for table `filler`
--

CREATE TABLE `filler` (
  `id` int(4) NOT NULL,
  `category` varchar(255) NOT NULL,
  `sidestory` varchar(255) NOT NULL,
  `describes` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `filler`
--

INSERT INTO `filler` (`id`, `category`, `sidestory`, `describes`) VALUES
(1, 'Naruto', 'The Ninja Clash in the Land of Snow', 'Xoay quanh nhiệm vụ bảo vệ nữ diễn viên Yukie Fujikaze, người thực chất là công chúa Koyuki của vùng đất Tuyết, đang bị truy đuổi bởi kẻ phản loạn Dotou Kazahana. Cùng với đội 7, Naruto giúp cô lấy lại niềm tin, chiến đấu chống lại Dotou và khôi phục mùa xuân cho vùng đất lạnh giá. Phim kết thúc với chiến thắng của Naruto bằng Rasengan bảy màu, cùng khoảnh khắc Koyuki lần đầu rơi nước mắt vì ước mơ ngày bé đã trở thành sự thật.'),
(2, 'Naruto', 'Road to ninja: Naruto the movie', 'Naruto và Sakura bị Obito đưa vào một thế giới ảo, nơi mọi thứ đều đảo ngược: cha mẹ Naruto còn sống, Sakura không còn bị kiểm soát, bạn bè thay đổi tính cách. Trong khi Sakura tận hưởng thế giới mới, Naruto lại cảm thấy lạc lõng dù có cha mẹ bên cạnh. Họ phát hiện kẻ đứng sau là Menma – phiên bản phản diện của Naruto trong thế giới ảo, do Obito thao túng.\r\nSau nhiều trận chiến và hy sinh, Naruto thức tỉnh, vượt qua Menma, giải thoát cả hai khỏi ảo thuật. Trở lại thế giới thực, Naruto nhận ra giá trị của gia đình, bạn bè và cuộc sống thật, quyết tâm mạnh mẽ hơn trên con đường trở thành ninja vĩ đại.'),
(3, 'Dragon Ball', 'Dragon Ball Z Side Story: Plan to Eradicate the Saiyans', 'Dr. Raichi, tộc Tuffle sống sót cuối cùng, muốn tiêu diệt Saiyan để trả thù. Ông thả khí độc Destron xuống Trái Đất, buộc Goku và các chiến binh phải ngăn chặn. Raichi tạo ra các chiến binh ma và cỗ máy Hatchihyack từ thù hận. Sau khi bị tiêu diệt, Hatchihyack hóa thành cỗ máy mạnh mẽ tấn công Trái Đất. Cuối cùng, các Siêu Saiyan hợp sức tiêu diệt Hatchihyack, cứu Trái Đất khỏi diệt vong.'),
(4, 'One Piece', 'One Piece Film: Red', 'Luffy và băng Mũ Rơm đến đảo Elegia để dự buổi hòa nhạc của ca sĩ nổi tiếng Uta – con nuôi của Tứ Hoàng Shanks. Uta dùng năng lực từ trái ác quỷ để tạo ra \"Thế giới hát ca\" nơi cô muốn giữ mọi người lại mãi mãi trong hạnh phúc, tránh khỏi đau khổ do hải tặc gây ra. Tuy nhiên, sức mạnh của Uta dần mất kiểm soát vì cô dùng nấm khiến mình không ngủ được, đe dọa đến toàn thế giới nếu cô chết.\r\n\r\nKhi mọi chuyện trở nên nguy cấp, Shanks xuất hiện để cứu con gái. Uta triệu hồi ác quỷ Tot Musica, gây hỗn loạn ở cả hai thế giới. Luffy và Shanks hợp lực đánh bại quái vật. Cuối cùng, Uta từ chối cứu chữa để hát một bài hát đưa mọi người trở lại thế giới thực, và cô ra đi trong vòng tay của cha mình.'),
(5, 'Doraemon', 'Doraemon: Nobita and the Castle of the Undersea Devil', 'Nobita và các bạn đi cắm trại dưới đáy biển bằng các bảo bối của Doraemon. Họ vô tình phát hiện ra vương quốc dưới nước tên là Mu và gặp người cá Eru. Sau một loạt sự cố và hiểu lầm, nhóm bị kết án tử nhưng được tha khi vương quốc Atlantis – nơi bị robot kiểm soát – sắp hủy diệt Trái Đất. Họ cùng Eru đến Atlantis và tiêu diệt siêu máy tính Poseidon bằng sự hy sinh của chiếc xe Buggy. Cuối cùng, cả nhóm được vinh danh và trở về nhà, để lại Buggy như một kỷ niệm cảm động.'),
(6, 'Conan', 'Conan, Kid, and the Crystal Mother', 'Kaitou Kid nhắm đến viên ngọc \"Crystal Mother\" của Nữ hoàng Selizabeth trên chuyến tàu Royal Express. Sau khi phát hiện viên ngọc bà đang đeo là giả, Kid rút lui và bí mật theo dõi bằng thiết bị nghe lén. Cùng lúc, Conan nghi ngờ có vụ trộm sắp xảy ra, trong khi một cặp tội phạm khác – Jackal và Rose – cũng lên kế hoạch cướp viên ngọc và giết Kid cùng Nữ hoàng.\r\nKaito và Conan đều cố gắng tìm vị trí viên ngọc thật. Conan dùng suy luận kiểu Father Brown để đoán nơi cất giấu. Khi Kaito nhận ra chỗ ẩn giấu, anh dàn dựng cho màn tái xuất của Kid bằng cách tắt hết đèn tàu. Conan thì nhớ ra Jackal là một tên trộm đá quý nguy hiểm từng thấy trong cơ sở dữ liệu. Cuộc đối đầu giữa các bên đang đến gần khi tàu sắp vào Osaka.');

-- --------------------------------------------------------

--
-- Table structure for table `mgcontents`
--

CREATE TABLE `mgcontents` (
  `id` int(5) NOT NULL,
  `category` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `describes` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mgcontents`
--

INSERT INTO `mgcontents` (`id`, `category`, `name`, `describes`) VALUES
(1, 'Dragon Ball', 'Dragon Ball Z', 'Dragon Ball Z theo chân Son Goku, một chiến binh Saiyan, cùng bạn bè anh chiến đấu bảo vệ Trái Đất khỏi những kẻ thù mạnh mẽ như Frieza, Cell và Majin Buu, thông qua các trận chiến siêu năng lực đỉnh cao.\r\n\r\n'),
(2, 'Dragon Ball', 'Dragon Ball Super', 'Dragon Ball Super kể về hành trình mới của Goku khi anh đối mặt với những kẻ thù mạnh ở cấp vũ trụ, như Beerus, Goku Black, và tham gia Giải đấu sức mạnh giữa các vũ trụ. Goku đạt được trạng thái mới Ultra Instinct và bảo vệ Trái Đất trước các mối đe dọa siêu cấp.\r\n\r\n'),
(3, 'Naruto', 'Naruto Dattebayo', 'Kể về hành trình của Uzumaki Naruto, một cậu bé bị cả làng xa lánh vì mang trong mình Cửu Vĩ Hồ Ly, con quái vật từng tàn phá làng Lá. Dù cô độc và bị kỳ thị, Naruto luôn nỗ lực để khẳng định bản thân, kết bạn và theo đuổi ước mơ trở thành Hokage – người bảo vệ làng. Phim mở đầu bằng những nhiệm vụ đầu tiên của Đội 7, cuộc thi Chuunin, sự xuất hiện của Orochimaru, cuộc xâm lăng làng Lá, và kết thúc bằng trận quyết chiến giữa Naruto và Sasuke tại Thung lũng Kết thúc – đặt nền móng cho phần tiếp theo là Naruto Shippuden.'),
(4, 'Naruto', 'Naruto Shippuden', 'kể về hành trình trưởng thành của Naruto cùng Sakura trong nỗ lực tìm lại Sasuke, người đã rời làng để theo đuổi sức mạnh. Câu chuyện mở rộng với sự xuất hiện của tổ chức Akatsuki, các Vĩ thú và các trận chiến quy mô toàn thế giới. Từ việc giải cứu Gaara, đối đầu Akatsuki, chiến tranh Thế giới Ninja lần thứ 4, đến trận chiến cuối cùng giữa Naruto và Sasuke, bộ phim là hành trình Naruto chứng minh giá trị bản thân, bảo vệ bạn bè và mang lại hòa bình cho thế giới ninja.'),
(5, 'Naruto', 'Boruto', 'Boruto là phần tiếp theo của Naruto, kể về cuộc sống thời bình và hành trình trưởng thành của Boruto Uzumaki, con trai Naruto. Cùng bạn bè, Boruto đối mặt với những mối đe dọa mới như tổ chức Kara và tộc Ōtsutsuki, đồng thời khám phá sức mạnh bí ẩn Karma và di sản ninja mà cha mình để lại.'),
(6, 'One Piece', 'One Piece', 'One Piece kể về Monkey D. Luffy, chàng trai có cơ thể cao su sau khi ăn trái Ác Quỷ, lên đường tìm kho báu \"One Piece\" để trở thành Vua Hải Tặc. Luffy thành lập băng hải tặc Mũ Rơm và cùng các thành viên như Zoro, Nami, Usopp, Sanji và nhiều người khác phiêu lưu khắp đại dương, đối đầu với hải tặc, tổ chức tội phạm, chính quyền và nhiều kẻ thù khác để thực hiện ước mơ của mình.'),
(7, 'Doraemon', 'Doraemon', 'Manga Doraemon là tác phẩm của Fujiko F. Fujio, ra mắt từ năm 1969. Truyện kể về Doraemon – chú mèo máy từ tương lai được gửi về quá khứ để giúp Nobita, một cậu bé hậu đậu, cải thiện cuộc sống nhằm thay đổi tương lai cho con cháu dòng họ Nobi. Mỗi chương thường xoay quanh rắc rối của Nobita và cách Doraemon dùng bảo bối hỗ trợ, nhưng hậu quả lại thường trở nên nghiêm trọng hơn do sự lạm dụng hoặc bị người khác lợi dụng sai mục đích.'),
(8, 'Doraemon', 'Doraemon: Chú khủng long của Nobita', 'Nobita tình cờ ấp nở một quả trứng khủng long và kết bạn với chú khủng long Pisuke. Khi Pisuke lớn dần và không thể nuôi trong nhà, Nobita phải đưa chú về quá khứ. Trên đường trở về, nhóm bạn gặp trở ngại bởi những kẻ săn khủng long do một tên tỷ phú cầm đầu. Sau nhiều gian nan và nguy hiểm, nhóm bạn cùng một chú khủng long bạo chúa từng được thuần hóa đã tiêu diệt tổ chức xấu xa, giải cứu Pisuke và trở về hiện tại. Cuối cùng, Nobita buồn bã chia tay Pisuke để cậu trở về đúng nơi mình thuộc về.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n'),
(9, 'Conan', 'Detective Conan', 'Truyện xoay quanh một cậu thám tử trung học có tên là Kudo Shinichi trong lúc đang điều tra một Tổ chức Áo đen bí ẩn đã bị ép phải uống một loại thuốc độc có thể gây chết người. May mắn là đã sống sót nhưng cơ thể thì lại bị teo nhỏ như một đứa bé 6-7 tuổi. Kể từ đó để tránh bị lộ thân phận thực sự của mình, Shinichi đã lấy tên là Edogawa Conan và chuyển đến sống ở nhà của cô bạn thời thơ ấu Mori Ran cùng với cha của cô ấy là một thám tử tư tên Mori Kogoro với hy vọng một ngày nào đó cậu có thể hạ gục Tổ chức Áo Đen và lấy lại hình dáng ban đầu.'),
(10, 'Sailor Moon', 'Sailor Moon', 'Sailor Moon xoay quanh Usagi Tsukino, một nữ sinh trung học phát hiện mình là công chúa Mặt Trăng tái sinh. Cùng với các chiến binh Sailor khác như Mercury, Mars, Jupiter, Venus và nhiều đồng minh khác, họ hợp lực chống lại các thế lực hắc ám để bảo vệ Trái Đất và vương quốc Mặt Trăng khỏi diệt vong.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`) VALUES
(1, 'admin', '00e57640477961333848717747276704', 'admin@admin.com', 1),
(4, 'guest', '202cb962ac59075b964b07152d234b70', 'guest@guest.com', 0),
(6, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@test.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `filler`
--
ALTER TABLE `filler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mgcontents`
--
ALTER TABLE `mgcontents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `filler`
--
ALTER TABLE `filler`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mgcontents`
--
ALTER TABLE `mgcontents`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
