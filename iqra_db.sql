-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2026 at 08:27 AM
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
-- Database: `iqra_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`) VALUES
(1, 'Sahih Bukhari'),
(2, 'Sahih Muslim'),
(3, 'Sunan Abu Dawood'),
(4, 'Sunan Tirmidhi');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT 'unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hadiths`
--

CREATE TABLE `hadiths` (
  `id` int(11) NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `arabic` text DEFAULT NULL,
  `english` text DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hadiths`
--

INSERT INTO `hadiths` (`id`, `book_id`, `arabic`, `english`, `status`, `reference`) VALUES
(1, 1, 'إِنَّمَا الأَعْمَالُ بِالنِّيَّاتِ', 'Actions are judged by intentions', 'Authentic', 'Bukhari 1'),
(2, 2, 'الطهور شطر الإيمان', 'Purity is half of faith', 'Authentic', 'Muslim 1'),
(3, 1, 'إِنَّمَا الأَعْمَالُ بِالنِّيَّاتِ', 'Actions are judged by intentions', 'Authentic', 'Bukhari 1'),
(4, 2, 'الطهور شطر الإيمان', 'Purity is half of faith', 'Authentic', 'Muslim 1'),
(5, 1, 'الدين النصيحة', 'Religion is sincerity', 'Authentic', 'Bukhari 2'),
(6, 2, 'من حسن إسلام المرء تركه ما لا يعنيه', 'Part of good Islam is leaving what does not concern you', 'Authentic', 'Muslim 2'),
(7, 1, 'لا يؤمن أحدكم حتى يحب لأخيه ما يحب لنفسه', 'None of you truly believes until he loves for his brother what he loves for himself', 'Authentic', 'Bukhari 3'),
(8, 2, 'إن الله كتب الإحسان على كل شيء', 'Allah has prescribed excellence in everything', 'Authentic', 'Muslim 3'),
(9, 3, 'من غشنا فليس منا', 'Whoever cheats is not one of us', 'Authentic', 'Abu Dawood 1'),
(10, 1, 'تبسمك في وجه أخيك صدقة', 'Smiling in your brother\'s face is charity', 'Hasan', 'Bukhari 4'),
(11, 2, 'الكلمة الطيبة صدقة', 'A good word is charity', 'Authentic', 'Muslim 4'),
(12, 4, 'إنما بعثت لأتمم مكارم الأخلاق', 'I was sent to perfect good character', 'Authentic', 'Tirmidhi 1'),
(13, 1, 'من كان يؤمن بالله واليوم الآخر فليقل خيرا أو ليصمت', 'Whoever believes in Allah and the Last Day should speak good or remain silent', 'Authentic', 'Bukhari 5'),
(14, 2, 'المسلم من سلم المسلمون من لسانه ويده', 'A Muslim is one from whose tongue and hand others are safe', 'Authentic', 'Muslim 5'),
(15, 1, 'خير الناس أنفعهم للناس', 'The best people are those who benefit others', 'Hasan', 'Bukhari 6'),
(16, 2, 'لا ضرر ولا ضرار', 'There should be neither harming nor reciprocating harm', 'Authentic', 'Muslim 6'),
(17, 3, 'الدين يسر', 'Religion is easy', 'Authentic', 'Abu Dawood 2'),
(18, 1, 'من لا يرحم لا يرحم', 'He who does not show mercy will not be shown mercy', 'Authentic', 'Bukhari 7'),
(19, 2, 'إن الله جميل يحب الجمال', 'Allah is beautiful and loves beauty', 'Authentic', 'Muslim 7'),
(20, 1, 'أحب الأعمال إلى الله أدومها وإن قل', 'The most beloved deeds to Allah are those that are consistent even if small', 'Authentic', 'Bukhari 8'),
(21, 2, 'اطلبوا العلم من المهد إلى اللحد', 'Seek knowledge from cradle to grave', 'Hasan', 'Muslim 8'),
(22, 4, 'الراحمون يرحمهم الرحمن', 'The merciful are shown mercy by the Most Merciful', 'Authentic', 'Tirmidhi 2'),
(23, 1, 'إِنَّمَا الأَعْمَالُ بِالنِّيَّاتِ', 'Actions are judged by intentions', 'Authentic', 'Bukhari 1'),
(24, 2, 'الطهور شطر الإيمان', 'Purity is half of faith', 'Authentic', 'Muslim 1'),
(25, 1, 'الدين النصيحة', 'Religion is sincerity', 'Authentic', 'Bukhari 2'),
(26, 2, 'من حسن إسلام المرء تركه ما لا يعنيه', 'Part of good Islam is leaving what does not concern you', 'Authentic', 'Muslim 2'),
(27, 1, 'لا يؤمن أحدكم حتى يحب لأخيه ما يحب لنفسه', 'None of you truly believes until he loves for his brother what he loves for himself', 'Authentic', 'Bukhari 3'),
(28, 2, 'إن الله كتب الإحسان على كل شيء', 'Allah has prescribed excellence in everything', 'Authentic', 'Muslim 3'),
(29, 3, 'من غشنا فليس منا', 'Whoever cheats is not one of us', 'Authentic', 'Abu Dawood 1'),
(30, 1, 'تبسمك في وجه أخيك صدقة', 'Smiling in your brother\'s face is charity', 'Hasan', 'Bukhari 4'),
(31, 2, 'الكلمة الطيبة صدقة', 'A good word is charity', 'Authentic', 'Muslim 4'),
(32, 4, 'إنما بعثت لأتمم مكارم الأخلاق', 'I was sent to perfect good character', 'Authentic', 'Tirmidhi 1'),
(33, 1, 'من كان يؤمن بالله واليوم الآخر فليقل خيرا أو ليصمت', 'Whoever believes in Allah and the Last Day should speak good or remain silent', 'Authentic', 'Bukhari 5'),
(34, 2, 'المسلم من سلم المسلمون من لسانه ويده', 'A Muslim is one from whose tongue and hand others are safe', 'Authentic', 'Muslim 5'),
(35, 1, 'خير الناس أنفعهم للناس', 'The best people are those who benefit others', 'Hasan', 'Bukhari 6'),
(36, 2, 'لا ضرر ولا ضرار', 'There should be neither harming nor reciprocating harm', 'Authentic', 'Muslim 6'),
(37, 3, 'الدين يسر', 'Religion is easy', 'Authentic', 'Abu Dawood 2'),
(38, 1, 'من لا يرحم لا يرحم', 'He who does not show mercy will not be shown mercy', 'Authentic', 'Bukhari 7'),
(39, 2, 'إن الله جميل يحب الجمال', 'Allah is beautiful and loves beauty', 'Authentic', 'Muslim 7'),
(40, 1, 'أحب الأعمال إلى الله أدومها وإن قل', 'The most beloved deeds to Allah are those that are consistent even if small', 'Authentic', 'Bukhari 8'),
(41, 2, 'اطلبوا العلم من المهد إلى اللحد', 'Seek knowledge from cradle to grave', 'Hasan', 'Muslim 8'),
(42, 4, 'الراحمون يرحمهم الرحمن', 'The merciful are shown mercy by the Most Merciful', 'Authentic', 'Tirmidhi 2'),
(43, 1, 'إن الله لا ينظر إلى صوركم ولكن ينظر إلى قلوبكم', 'Allah does not look at your appearance but at your hearts', 'Authentic', 'Bukhari 9'),
(44, 2, 'من حسن إسلام المرء تركه ما لا يعنيه', 'Part of good Islam is leaving what does not concern you', 'Authentic', 'Muslim 9'),
(45, 1, 'إن الله يحب إذا عمل أحدكم عملاً أن يتقنه', 'Allah loves that when one does a job, he does it perfectly', 'Authentic', 'Bukhari 10'),
(46, 2, 'المؤمن القوي خير وأحب إلى الله من المؤمن الضعيف', 'A strong believer is better and more beloved to Allah than a weak one', 'Authentic', 'Muslim 10'),
(47, 3, 'إنما الدنيا متاع', 'Indeed this world is temporary enjoyment', 'Hasan', 'Abu Dawood 3'),
(48, 1, 'أفضل الصدقة سقي الماء', 'The best charity is giving water', 'Hasan', 'Bukhari 11'),
(49, 2, 'تبسمك في وجه أخيك صدقة', 'Smiling at your brother is charity', 'Authentic', 'Muslim 11'),
(50, 4, 'طلب العلم فريضة على كل مسلم', 'Seeking knowledge is obligatory on every Muslim', 'Authentic', 'Tirmidhi 3'),
(51, 1, 'خيركم من تعلم القرآن وعلمه', 'The best among you are those who learn and teach the Quran', 'Authentic', 'Bukhari 12'),
(52, 2, 'من صمت نجا', 'Whoever remains silent is saved', 'Hasan', 'Muslim 12'),
(53, 1, 'الحياء من الإيمان', 'Modesty is part of faith', 'Authentic', 'Bukhari 13'),
(54, 2, 'لا يدخل الجنة من كان في قلبه مثقال ذرة من كبر', 'No one with arrogance in their heart will enter Paradise', 'Authentic', 'Muslim 13'),
(55, 3, 'اتق الله حيثما كنت', 'Fear Allah wherever you are', 'Authentic', 'Abu Dawood 4'),
(56, 1, 'من لا يشكر الناس لا يشكر الله', 'Whoever does not thank people does not thank Allah', 'Authentic', 'Bukhari 14'),
(57, 2, 'إن الله كتب الإحسان على كل شيء', 'Allah has prescribed excellence in everything', 'Authentic', 'Muslim 14'),
(58, 1, 'أحب الأعمال إلى الله الصلاة على وقتها', 'The most beloved deed to Allah is prayer on time', 'Authentic', 'Bukhari 15'),
(59, 2, 'إن الله لا يضيع أجر المحسنين', 'Allah does not waste the reward of those who do good', 'Authentic', 'Muslim 15'),
(60, 4, 'من تواضع لله رفعه الله', 'Whoever humbles himself for Allah, Allah will raise him', 'Hasan', 'Tirmidhi 4'),
(61, 1, 'إن مع العسر يسرا', 'Indeed with hardship comes ease', 'Authentic', 'Bukhari 16'),
(62, 2, 'الراحمون يرحمهم الرحمن', 'The merciful are shown mercy by Allah', 'Authentic', 'Muslim 16'),
(63, 3, 'الدال على الخير كفاعله', 'One who guides to good is like the doer', 'Hasan', 'Abu Dawood 5'),
(64, 1, 'إِنَّمَا الأَعْمَالُ بِالنِّيَّاتِ', 'Actions are judged by intentions', 'Authentic', 'Bukhari 1'),
(65, 2, 'الطهور شطر الإيمان', 'Purity is half of faith', 'Authentic', 'Muslim 1'),
(66, 1, 'الدين النصيحة', 'Religion is sincerity', 'Authentic', 'Bukhari 2'),
(67, 2, 'من حسن إسلام المرء تركه ما لا يعنيه', 'Part of good Islam is leaving what does not concern you', 'Authentic', 'Muslim 2'),
(68, 1, 'لا يؤمن أحدكم حتى يحب لأخيه ما يحب لنفسه', 'None of you truly believes until he loves for his brother what he loves for himself', 'Authentic', 'Bukhari 3'),
(69, 2, 'إن الله كتب الإحسان على كل شيء', 'Allah has prescribed excellence in everything', 'Authentic', 'Muslim 3'),
(70, 3, 'من غشنا فليس منا', 'Whoever cheats is not one of us', 'Authentic', 'Abu Dawood 1'),
(71, 1, 'تبسمك في وجه أخيك صدقة', 'Smiling in your brother\'s face is charity', 'Hasan', 'Bukhari 4'),
(72, 2, 'الكلمة الطيبة صدقة', 'A good word is charity', 'Authentic', 'Muslim 4'),
(73, 4, 'إنما بعثت لأتمم مكارم الأخلاق', 'I was sent to perfect good character', 'Authentic', 'Tirmidhi 1'),
(74, 1, 'من كان يؤمن بالله واليوم الآخر فليقل خيرا أو ليصمت', 'Whoever believes in Allah and the Last Day should speak good or remain silent', 'Authentic', 'Bukhari 5'),
(75, 2, 'المسلم من سلم المسلمون من لسانه ويده', 'A Muslim is one from whose tongue and hand others are safe', 'Authentic', 'Muslim 5'),
(76, 1, 'خير الناس أنفعهم للناس', 'The best people are those who benefit others', 'Hasan', 'Bukhari 6'),
(77, 2, 'لا ضرر ولا ضرار', 'There should be neither harming nor reciprocating harm', 'Authentic', 'Muslim 6'),
(78, 3, 'الدين يسر', 'Religion is easy', 'Authentic', 'Abu Dawood 2'),
(79, 1, 'من لا يرحم لا يرحم', 'He who does not show mercy will not be shown mercy', 'Authentic', 'Bukhari 7'),
(80, 2, 'إن الله جميل يحب الجمال', 'Allah is beautiful and loves beauty', 'Authentic', 'Muslim 7'),
(81, 1, 'أحب الأعمال إلى الله أدومها وإن قل', 'The most beloved deeds to Allah are those that are consistent even if small', 'Authentic', 'Bukhari 8'),
(82, 2, 'اطلبوا العلم من المهد إلى اللحد', 'Seek knowledge from cradle to grave', 'Hasan', 'Muslim 8'),
(83, 4, 'الراحمون يرحمهم الرحمن', 'The merciful are shown mercy by the Most Merciful', 'Authentic', 'Tirmidhi 2'),
(84, 1, 'إن الله لا ينظر إلى صوركم ولكن ينظر إلى قلوبكم', 'Allah does not look at your appearance but at your hearts', 'Authentic', 'Bukhari 9'),
(85, 2, 'من حسن إسلام المرء تركه ما لا يعنيه', 'Part of good Islam is leaving what does not concern you', 'Authentic', 'Muslim 9'),
(86, 1, 'إن الله يحب إذا عمل أحدكم عملاً أن يتقنه', 'Allah loves that when one does a job, he does it perfectly', 'Authentic', 'Bukhari 10'),
(87, 2, 'المؤمن القوي خير وأحب إلى الله من المؤمن الضعيف', 'A strong believer is better and more beloved to Allah than a weak one', 'Authentic', 'Muslim 10'),
(88, 3, 'إنما الدنيا متاع', 'Indeed this world is temporary enjoyment', 'Hasan', 'Abu Dawood 3'),
(89, 1, 'أفضل الصدقة سقي الماء', 'The best charity is giving water', 'Hasan', 'Bukhari 11'),
(90, 2, 'تبسمك في وجه أخيك صدقة', 'Smiling at your brother is charity', 'Authentic', 'Muslim 11'),
(91, 4, 'طلب العلم فريضة على كل مسلم', 'Seeking knowledge is obligatory on every Muslim', 'Authentic', 'Tirmidhi 3'),
(92, 1, 'خيركم من تعلم القرآن وعلمه', 'The best among you are those who learn and teach the Quran', 'Authentic', 'Bukhari 12'),
(93, 2, 'من صمت نجا', 'Whoever remains silent is saved', 'Hasan', 'Muslim 12'),
(94, 1, 'الحياء من الإيمان', 'Modesty is part of faith', 'Authentic', 'Bukhari 13'),
(95, 2, 'لا يدخل الجنة من كان في قلبه مثقال ذرة من كبر', 'No one with arrogance in their heart will enter Paradise', 'Authentic', 'Muslim 13'),
(96, 3, 'اتق الله حيثما كنت', 'Fear Allah wherever you are', 'Authentic', 'Abu Dawood 4'),
(97, 1, 'من لا يشكر الناس لا يشكر الله', 'Whoever does not thank people does not thank Allah', 'Authentic', 'Bukhari 14'),
(98, 2, 'إن الله كتب الإحسان على كل شيء', 'Allah has prescribed excellence in everything', 'Authentic', 'Muslim 14'),
(99, 1, 'أحب الأعمال إلى الله الصلاة على وقتها', 'The most beloved deed to Allah is prayer on time', 'Authentic', 'Bukhari 15'),
(100, 2, 'إن الله لا يضيع أجر المحسنين', 'Allah does not waste the reward of those who do good', 'Authentic', 'Muslim 15'),
(101, 4, 'من تواضع لله رفعه الله', 'Whoever humbles himself for Allah, Allah will raise him', 'Hasan', 'Tirmidhi 4'),
(102, 1, 'إن مع العسر يسرا', 'Indeed with hardship comes ease', 'Authentic', 'Bukhari 16'),
(103, 2, 'الراحمون يرحمهم الرحمن', 'The merciful are shown mercy by Allah', 'Authentic', 'Muslim 16'),
(104, 3, 'الدال على الخير كفاعله', 'One who guides to good is like the doer', 'Hasan', 'Abu Dawood 5'),
(105, 3, 'إن الله طيب لا يقبل إلا طيبا', 'Allah is pure and accepts only what is pure', 'Authentic', 'Abu Dawood 6'),
(106, 3, 'المسلم أخو المسلم', 'A Muslim is a brother of another Muslim', 'Authentic', 'Abu Dawood 7'),
(107, 3, 'كلكم راع وكلكم مسؤول عن رعيته', 'Each of you is a shepherd and responsible for his flock', 'Authentic', 'Abu Dawood 8'),
(108, 3, 'من دل على خير فله مثل أجر فاعله', 'Whoever guides to good gets reward like the doer', 'Hasan', 'Abu Dawood 9'),
(109, 3, 'إنما الأعمال بالخواتيم', 'Actions are judged by their endings', 'Hasan', 'Abu Dawood 10'),
(110, 4, 'إن الله يحب التوابين', 'Allah loves those who repent', 'Authentic', 'Tirmidhi 5'),
(111, 4, 'من لا يرحم لا يُرحم', 'He who does not show mercy will not be shown mercy', 'Authentic', 'Tirmidhi 6'),
(112, 4, 'الدعاء مخ العبادة', 'Supplication is the essence of worship', 'Hasan', 'Tirmidhi 7'),
(113, 4, 'أفضل الذكر لا إله إلا الله', 'The best remembrance is \'La ilaha illallah\'', 'Authentic', 'Tirmidhi 8'),
(114, 4, 'إن الله يحب الرفق في الأمر كله', 'Allah loves gentleness in all matters', 'Authentic', 'Tirmidhi 9'),
(115, 3, 'من سلك طريقا يلتمس فيه علما سهل الله له طريقا إلى الجنة', 'Whoever seeks knowledge, Allah makes his path to Paradise easy', 'Authentic', 'Abu Dawood 11'),
(116, 3, 'المؤمن للمؤمن كالبنيان يشد بعضه بعضا', 'Believers are like a building supporting each other', 'Authentic', 'Abu Dawood 12'),
(117, 3, 'حب لأخيك ما تحب لنفسك', 'Love for your brother what you love for yourself', 'Authentic', 'Abu Dawood 13'),
(118, 3, 'إن الله لا يغير ما بقوم حتى يغيروا ما بأنفسهم', 'Allah does not change a people until they change themselves', 'Authentic', 'Abu Dawood 14'),
(119, 3, 'خيركم خيركم لأهله', 'The best of you are those who are best to their families', 'Hasan', 'Abu Dawood 15'),
(120, 4, 'الصدق يهدي إلى البر', 'Truthfulness leads to righteousness', 'Authentic', 'Tirmidhi 10'),
(121, 4, 'لا يؤمن أحدكم حتى يحب لأخيه ما يحب لنفسه', 'None of you truly believes until he loves for his brother what he loves for himself', 'Authentic', 'Tirmidhi 11'),
(122, 4, 'إن الله كتب الإحسان في كل شيء', 'Allah has prescribed excellence in everything', 'Authentic', 'Tirmidhi 12'),
(123, 4, 'الدنيا سجن المؤمن', 'The world is a prison for the believer', 'Hasan', 'Tirmidhi 13'),
(124, 4, 'من صبر ظفر', 'Whoever is patient will succeed', 'Hasan', 'Tirmidhi 14'),
(125, 5, 'arabic hadiths', 'english', 'authentic', 'abc'),
(126, 3, 'اطلبوا العلم ولو بالصين', 'Seek knowledge even if you have to go to China.', 'Weak', 'Abu Dawood'),
(127, 3, 'حب الدنيا رأس كل خطيئة', 'Love of the world is the root of all evil.', 'Weak', 'Abu Dawood'),
(128, 3, 'اختلاف أمتي رحمة', 'Difference of opinion among my Ummah is mercy.', 'Weak', 'Abu Dawood'),
(129, 4, 'اطلبوا العلم من المهد إلى اللحد', 'Seek knowledge from cradle to grave.', 'Weak', 'Tirmidhi'),
(130, 4, 'الفقر فخري', 'Poverty is my pride.', 'Weak', 'Tirmidhi'),
(131, 4, 'النوم أخو الموت', 'Sleep is the brother of death.', 'Weak', 'Tirmidhi'),
(132, 4, 'من لم تنهه صلاته عن الفحشاء والمنكر فلا صلاة له', 'One whose prayer does not stop him from evil has no prayer.', 'Weak', 'Tirmidhi'),
(133, 3, 'الدين النصيحة', 'Religion is sincerity.', 'Weak', 'Abu Dawood'),
(134, 4, 'النظافة من الإيمان', 'Cleanliness is part of faith.', 'Weak', 'Tirmidhi'),
(135, 3, 'الدنيا سجن المؤمن وجنة الكافر', 'The world is a prison for the believer and paradise for the disbeliever.', 'Weak', 'Abu Dawood');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `user_id`, `title`, `note`, `created_at`) VALUES
(2, 1, 'Iqra', 'I love Allah.', '2026-04-27 20:23:17');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `transaction_id` varchar(100) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `transaction_id`, `amount`, `status`, `created_at`) VALUES
(13, 1, 'abcdefg987654', 500, 'verified', '2026-04-28 11:58:38'),
(14, 1, 'abcdefg987654', 500, 'verified', '2026-04-28 11:58:38'),
(15, 1, '123456789', 500, 'verified', '2026-04-28 11:59:39'),
(16, 1, '123456789', 500, 'verified', '2026-04-28 11:59:39'),
(17, 1, '123mkjhy789', 500, 'verified', '2026-04-28 12:08:12'),
(18, 1, '123mkjhy789', 500, 'verified', '2026-04-28 12:08:12'),
(19, 1, '1234fghjk', 500, 'verified', '2026-04-29 14:49:23'),
(20, 1, '1234fghjk', 500, 'verified', '2026-04-29 14:49:23'),
(21, 1, '1234rfsdtyuh', 500, 'verified', '2026-04-29 14:49:43'),
(22, 1, '1234rfsdtyuh', 500, 'verified', '2026-04-29 14:49:43'),
(23, 1, 'fygyhgjh67677466356', 500, 'verified', '2026-04-29 14:52:24'),
(24, 1, 'fygyhgjh67677466356', 500, 'verified', '2026-04-29 14:52:24'),
(25, 13, 'qwe345bnh', 500, 'verified', '2026-04-29 15:03:43'),
(26, 13, 'jdwihwgfyuhawhfuqkwuf', 500, 'verified', '2026-04-29 15:04:54'),
(27, 16, 'njsu76378390', 500, 'verified', '2026-04-30 02:42:27'),
(28, 17, 'sdkcjkhfkxdfh32t5676r48', 500, 'verified', '2026-04-30 03:33:53'),
(29, 19, '387r867ugtejgrhsg', 500, 'verified', '2026-05-02 14:55:15'),
(30, 26, 'xfduhhjlhggsryuyuj56764657', 500, 'verified', '2026-05-03 18:10:40'),
(31, 27, '1234556dfgfxfgfdx', 500, 'verified', '2026-05-03 18:38:48'),
(32, 27, 'fdfdxxdf', 500, 'verified', '2026-05-03 18:59:02');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `id` int(11) NOT NULL,
  `surah_id` int(11) DEFAULT NULL,
  `surah_name` varchar(100) DEFAULT NULL,
  `question` text DEFAULT NULL,
  `option_a` varchar(255) DEFAULT NULL,
  `option_b` varchar(255) DEFAULT NULL,
  `option_c` varchar(255) DEFAULT NULL,
  `option_d` varchar(255) DEFAULT NULL,
  `correct_answer` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`id`, `surah_id`, `surah_name`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_answer`) VALUES
(1, 1, 'Al-Fatihah', 'Which Surah of the Quran is recited in every Rak’ah (unit) of Salah and is considered essential for the prayer to be valid?', 'Al-Ikhlas', 'Al-Fatihah', 'Yaseen', 'Al-Kawthar', 'b'),
(2, 1, 'Al-Fatihah', 'How many total verses (Ayat) are present in Surah Al-Fatihah according to the standard Quranic count?', 'Six verses', 'Seven verses', 'Eight verses', 'Five verses', 'b'),
(3, 1, 'Al-Fatihah', 'What is the correct meaning of the name \"Al-Fatihah\" as used for the first Surah of the Quran?', 'The Opening', 'The Light', 'The Straight Path', 'The Book', 'a'),
(4, 1, 'Al-Fatihah', 'In Surah Al-Fatihah, the phrase \"Ihdinas Sirat al-Mustaqeem\" is a supplication asking Allah for what?', 'Forgiveness of sins', 'Guidance to the straight path', 'Increase in wealth', 'Protection from enemies', 'b'),
(5, 1, 'Al-Fatihah', 'Based on Islamic scholarship, in which city was Surah Al-Fatihah primarily revealed?', 'Madina', 'Both Makkah and Madina', 'Makkah', 'Taif', 'c'),
(6, 2, 'Al-Baqarah', 'Which Surah of the Quran is the longest in terms of number of verses and covers a wide range of laws, guidance, and stories?', 'Surah Aal-e-Imran', 'Surah An-Nisa', 'Surah Al-Baqarah', 'Surah Yaseen', 'c'),
(7, 2, 'Al-Baqarah', 'What is the exact number of verses (Ayat) in Surah Al-Baqarah as recorded in the Quran?', 'Two hundred verses', 'Two hundred eighty-six verses', 'Three hundred verses', 'One hundred fifty verses', 'b'),
(8, 2, 'Al-Baqarah', 'In which Surah of the Quran can Ayat-ul-Kursi, one of the most powerful verses, be found?', 'Surah Yaseen', 'Surah Al-Fatihah', 'Surah Al-Baqarah', 'Surah Ikhlas', 'c'),
(9, 2, 'Al-Baqarah', 'What does the name \"Al-Baqarah\" mean, which is derived from an incident involving Bani Israel?', 'Camel', 'Cow', 'Sheep', 'Horse', 'b'),
(10, 2, 'Al-Baqarah', 'According to historical context, in which city was Surah Al-Baqarah mainly revealed?', 'Makkah', 'Madina', 'Both cities equally', 'Unknown', 'b'),
(11, 3, 'Aal-e-Imran', 'The title \"Aal-e-Imran\" refers to which specific family mentioned in the Quran?', 'Family of Musa (A.S)', 'Family of Ibrahim (A.S)', 'Family of Imran', 'Family of Nuh (A.S)', 'c'),
(12, 3, 'Aal-e-Imran', 'Which Prophet is prominently mentioned in Surah Aal-e-Imran, especially in relation to his miraculous birth?', 'Prophet Yusuf (A.S)', 'Prophet Isa (A.S)', 'Prophet Nuh (A.S)', 'Prophet Hud (A.S)', 'b'),
(13, 3, 'Aal-e-Imran', 'What is the central theme of Surah Aal-e-Imran regarding the believers’ attitude in difficult situations?', 'Focus on trade', 'Faith and patience', 'War strategy only', 'Travel and migration', 'b'),
(14, 3, 'Aal-e-Imran', 'Based on revelation history, where was Surah Aal-e-Imran primarily revealed?', 'Makkah', 'Madina', 'Both Makkah and Madina', 'Unknown location', 'b'),
(15, 3, 'Aal-e-Imran', 'Which righteous woman is mentioned in Surah Aal-e-Imran and honored for her purity and devotion?', 'Aisha (R.A)', 'Fatima (R.A)', 'Zainab (R.A)', 'Maryam (A.S)', 'd'),
(16, 4, 'An-Nisa', 'What is the meaning of the word \"An-Nisa\", which is the title of Surah 4 in the Quran?', 'Men', 'Women', 'Children', 'Family', 'b'),
(17, 4, 'An-Nisa', 'Surah An-Nisa primarily focuses on which area of life, especially concerning society?', 'War strategies', 'Trade systems', 'Family laws and social justice', 'Travel rules', 'c'),
(18, 4, 'An-Nisa', 'Which important topic is discussed in detail in Surah An-Nisa to ensure fairness among people?', 'Fasting', 'Inheritance distribution', 'Hajj rituals', 'Charity only', 'b'),
(19, 4, 'An-Nisa', 'According to Islamic history, in which city was Surah An-Nisa revealed?', 'Makkah', 'Madina', 'Both', 'Unknown', 'b'),
(20, 4, 'An-Nisa', 'What is the major theme emphasized throughout Surah An-Nisa?', 'Scientific discovery', 'Justice and fairness', 'Historical events', 'Natural phenomena', 'b'),
(21, 5, 'Al-Ma’idah', 'What is the meaning of the word \"Al-Ma’idah\", which refers to a specific event mentioned in the Surah?', 'Water', 'Light', 'Table spread', 'Food storage', 'c'),
(22, 5, 'Al-Ma’idah', 'Surah Al-Ma’idah includes a large number of commands and rulings mainly related to what?', 'Stories of prophets', 'Laws and regulations', 'Travel experiences', 'Battles', 'b'),
(23, 5, 'Al-Ma’idah', 'Which type of laws are clearly explained in Surah Al-Ma’idah for Muslims to follow?', 'Food laws (Halal and Haram)', 'Trade laws', 'War strategies', 'None of these', 'a'),
(24, 5, 'Al-Ma’idah', 'In which city was Surah Al-Ma’idah revealed according to most scholars?', 'Makkah', 'Madina', 'Both', 'Unknown', 'b'),
(25, 5, 'Al-Ma’idah', 'What is the core message of Surah Al-Ma’idah regarding a believer’s duty?', 'Focus on wealth', 'Obedience to Allah’s commands', 'Scientific research', 'Exploration', 'b'),
(26, 6, 'Al-An’am', 'What is the main theme of Surah Al-An’am regarding belief?', 'Trade regulations', 'Oneness of Allah (Tawheed)', 'Agriculture laws', 'Inheritance rules', 'b'),
(27, 6, 'Al-An’am', 'Surah Al-An’am was revealed primarily in which city?', 'Madina', 'Makkah', 'Taif', 'Jerusalem', 'b'),
(28, 6, 'Al-An’am', 'Which major concept is strongly emphasized in Surah Al-An’am?', 'Shirk acceptance', 'Tawheed and rejection of shirk', 'War strategies', 'Financial rules', 'b'),
(29, 6, 'Al-An’am', 'How many sections of guidance are mainly discussed in this Surah?', 'Social laws only', 'Belief and moral guidance', 'Only stories', 'Only battles', 'b'),
(30, 6, 'Al-An’am', 'Surah Al-An’am is part of which category of Surahs?', 'Madani Surah', 'Makki Surah', 'Modern Surah', 'None', 'b'),
(31, 7, 'Al-A’raf', 'What does \"Al-A’raf\" refer to in the Surah?', 'A river', 'A barrier between Paradise and Hell', 'A mountain', 'A desert', 'b'),
(32, 7, 'Al-A’raf', 'Which important story is mentioned in Surah Al-A’raf?', 'Prophet Musa (A.S) and Pharaoh', 'Prophet Isa (A.S)', 'Prophet Dawood (A.S)', 'Prophet Yusuf (A.S)', 'a'),
(33, 7, 'Al-A’raf', 'What is a key lesson from Surah Al-A’raf?', 'Wealth is everything', 'Following prophets and obeying Allah', 'Travel rules', 'Trade ethics', 'b'),
(34, 7, 'Al-A’raf', 'Surah Al-A’raf mainly focuses on?', 'Scientific facts', 'Stories of past nations', 'Business laws', 'Agriculture', 'b'),
(35, 7, 'Al-A’raf', 'This Surah warns against what behavior?', 'Charity', 'Arrogance and disbelief', 'Kindness', 'Honesty', 'b'),
(36, 8, 'Al-Anfal', 'What does \"Al-Anfal\" mean?', 'Charity', 'Spoils of war', 'Fasting rewards', 'Prayer benefits', 'b'),
(37, 8, 'Al-Anfal', 'Which famous battle is mentioned in Surah Al-Anfal?', 'Battle of Uhud', 'Battle of Badr', 'Battle of Hunayn', 'Battle of Tabuk', 'b'),
(38, 8, 'Al-Anfal', 'Surah Al-Anfal mainly deals with?', 'Rules of war and unity', 'Trade laws', 'Inheritance', 'Fasting', 'a'),
(39, 8, 'Al-Anfal', 'What is strongly encouraged in this Surah?', 'Division', 'Unity among believers', 'Greed', 'Silence', 'b'),
(40, 8, 'Al-Anfal', 'Surah Al-Anfal was revealed after which event?', 'Migration to Madina', 'Battle of Badr', 'Conquest of Makkah', 'Hajj', 'b'),
(41, 9, 'At-Tawbah', 'What is the meaning of \"Tawbah\"?', 'Punishment', 'Repentance', 'War', 'Justice', 'b'),
(42, 9, 'At-Tawbah', 'Which Surah does NOT begin with Bismillah?', 'Al-Fatiha', 'At-Tawbah', 'Yunus', 'Ikhlas', 'b'),
(43, 9, 'At-Tawbah', 'Surah At-Tawbah mainly focuses on?', 'Agriculture', 'Repentance and hypocrisy', 'Science', 'Trade', 'b'),
(44, 9, 'At-Tawbah', 'This Surah strongly warns against?', 'Truthfulness', 'Hypocrisy', 'Charity', 'Prayer', 'b'),
(45, 9, 'At-Tawbah', 'Surah At-Tawbah was revealed in which period?', 'Early Makkah period', 'Late Madani period', 'Before Hijrah', 'None', 'b'),
(46, 10, 'Yunus', 'Surah Yunus is named after which Prophet?', 'Prophet Musa (A.S)', 'Prophet Yunus (A.S)', 'Prophet Isa (A.S)', 'Prophet Nuh (A.S)', 'b'),
(47, 10, 'Yunus', 'Main message of Surah Yunus is?', 'Wealth collection', 'Faith, patience and trust in Allah', 'War strategy', 'Trade rules', 'b'),
(48, 10, 'Yunus', 'Surah Yunus was revealed in?', 'Makkah', 'Madina', 'Both', 'None', 'a'),
(49, 10, 'Yunus', 'Which concept is repeated in Surah Yunus?', 'Denial of prophets', 'Belief in Allah’s mercy', 'Only science', 'Only history', 'b'),
(50, 10, 'Yunus', 'Prophet Yunus (A.S) is known for his story of?', 'Battle', 'Being in the belly of a whale', 'Trade journey', 'Kingdom', 'b'),
(51, 11, 'Hud', 'Surah Hud is named after which Prophet sent to the people of Aad?', 'Prophet Hud (A.S)', 'Prophet Nuh (A.S)', 'Prophet Musa (A.S)', 'Prophet Ibrahim (A.S)', 'a'),
(52, 11, 'Hud', 'Which nation rejected Prophet Hud (A.S)?', 'Bani Israel', 'People of Aad', 'People of Thamud', 'Quraysh', 'b'),
(53, 11, 'Hud', 'What is a key lesson from destroyed nations in Surah Hud?', 'Trade success', 'Punishment for denial of truth', 'Science growth', 'Travel importance', 'b'),
(54, 11, 'Hud', 'What quality is emphasized for believers in hardship?', 'Patience and steadfastness', 'Wealth', 'Speed', 'Fame', 'a'),
(55, 11, 'Hud', 'Surah Hud is classified as?', 'Madani Surah', 'Makki Surah', 'Modern Surah', 'None', 'b'),
(56, 12, 'Yusuf', 'Surah Yusuf narrates the story of which Prophet?', 'Prophet Musa (A.S)', 'Prophet Yusuf (A.S)', 'Prophet Nuh (A.S)', 'Prophet Isa (A.S)', 'b'),
(57, 12, 'Yusuf', 'What did Prophet Yusuf (A.S) see in his dream?', 'Sun, moon and stars bowing', 'Fire from sky', 'Mountains moving', 'Sea splitting', 'a'),
(58, 12, 'Yusuf', 'Main lesson of Surah Yusuf is?', 'Anger', 'Patience and trust in Allah', 'Wealth', 'Fear', 'b'),
(59, 12, 'Yusuf', 'Who betrayed Prophet Yusuf (A.S)?', 'His brothers', 'His father', 'King of Egypt', 'Angels', 'a'),
(60, 12, 'Yusuf', 'Surah Yusuf teaches that Allah’s plan is?', 'Always confusing', 'Always best', 'Always delayed', 'Always harsh', 'b'),
(61, 13, 'Ar-Ra’d', 'What does Ar-Ra’d mean?', 'Wind', 'Thunder', 'Rain', 'Fire', 'b'),
(62, 13, 'Ar-Ra’d', 'Main theme of Surah Ar-Ra’d?', 'Trade laws', 'Oneness of Allah', 'War rules', 'Agriculture', 'b'),
(63, 13, 'Ar-Ra’d', 'Hearts find peace through?', 'Money', 'Remembrance of Allah', 'Power', 'Travel', 'b'),
(64, 13, 'Ar-Ra’d', 'Which signs are mentioned in Surah?', 'Only animals', 'Thunder and natural signs', 'Only humans', 'Only oceans', 'b'),
(65, 13, 'Ar-Ra’d', 'Guidance comes from?', 'Leaders', 'Books', 'Allah alone', 'People', 'c'),
(66, 14, 'Ibrahim', 'Surah Ibrahim is named after which Prophet?', 'Prophet Nuh (A.S)', 'Prophet Ibrahim (A.S)', 'Prophet Musa (A.S)', 'Prophet Isa (A.S)', 'b'),
(67, 14, 'Ibrahim', 'What did Prophet Ibrahim (A.S) pray for Makkah?', 'Wealth', 'Security and provision', 'War victory', 'Kingship', 'b'),
(68, 14, 'Ibrahim', 'Main theme of Surah Ibrahim?', 'Technology', 'Gratitude vs ingratitude', 'Trade', 'Science', 'b'),
(69, 14, 'Ibrahim', 'What happens when people are grateful?', 'Blessings increase', 'Nothing', 'Punishment', 'Loss', 'a'),
(70, 14, 'Ibrahim', 'Surah Ibrahim compares?', 'Sea and land', 'Guidance and misguidance', 'Day and night', 'Mountains', 'b'),
(71, 15, 'Al-Hijr', 'Al-Hijr refers to the land of which nation?', 'Aad', 'Thamud', 'Quraysh', 'Bani Israel', 'b'),
(72, 15, 'Al-Hijr', 'Which Prophet was sent to Al-Hijr people?', 'Prophet Nuh (A.S)', 'Prophet Salih (A.S)', 'Prophet Musa (A.S)', 'Prophet Ibrahim (A.S)', 'b'),
(73, 15, 'Al-Hijr', 'Allah promises Quran will be?', 'Changed', 'Lost', 'Protected', 'Hidden', 'c'),
(74, 15, 'Al-Hijr', 'Who refused to bow to Adam (A.S)?', 'Angel', 'Iblis', 'Human', 'Jinn', 'b'),
(75, 15, 'Al-Hijr', 'Main lesson for Prophet (PBUH)?', 'Seek wealth', 'Be patient with disbelievers', 'Leave preaching', 'Fight always', 'b'),
(76, 16, 'An-Nahl', 'Surah An-Nahl is also known as which Surah?', 'Surah of Bees', 'Surah of Ants', 'Surah of Birds', 'Surah of Fish', 'a'),
(77, 16, 'An-Nahl', 'What is the main theme of Surah An-Nahl?', 'Stories of kings', 'Blessings of Allah in creation', 'War rules', 'Trade laws', 'b'),
(78, 16, 'An-Nahl', 'Which creation is mentioned in the title of this Surah?', 'Ant', 'Bee', 'Spider', 'Camel', 'b'),
(79, 16, 'An-Nahl', 'According to Surah An-Nahl, Allah has given humans?', 'Only wealth', 'Countless blessings', 'Only power', 'Only knowledge', 'b'),
(80, 16, 'An-Nahl', 'Surah An-Nahl mainly reminds humans to?', 'Forget blessings', 'Be grateful to Allah', 'Focus only on world', 'Avoid worship', 'b'),
(81, 17, 'Al-Isra', 'Surah Al-Isra is also known as?', 'Surah Bani Israel', 'Surah Maryam', 'Surah Nuh', 'Surah Yusuf', 'a'),
(82, 17, 'Al-Isra', 'Which journey of Prophet Muhammad (PBUH) is mentioned?', 'Hijrah', 'Isra and Mi’raj', 'Battle of Badr', 'Hajj', 'b'),
(83, 17, 'Al-Isra', 'From which place to Masjid Al-Aqsa did Isra happen?', 'Madina', 'Makkah', 'Taif', 'Yemen', 'b'),
(84, 17, 'Al-Isra', 'Surah Al-Isra mainly focuses on?', 'Business rules', 'Faith and guidance', 'Agriculture', 'Science', 'b'),
(85, 17, 'Al-Isra', 'Which group is mentioned in early history in this Surah?', 'Romans', 'Bani Israel', 'Persians', 'Greeks', 'b'),
(86, 18, 'Al-Kahf', 'Surah Al-Kahf means?', 'The Cave', 'The River', 'The Light', 'The Mountain', 'a'),
(87, 18, 'Al-Kahf', 'Which group is mentioned sleeping in a cave?', 'Companions of the Cave', 'Prophets', 'Kings', 'Soldiers', 'a'),
(88, 18, 'Al-Kahf', 'Which day is recommended to recite Surah Al-Kahf?', 'Monday', 'Friday', 'Sunday', 'Saturday', 'b'),
(89, 18, 'Al-Kahf', 'Which story is NOT in Surah Al-Kahf?', 'Dhul-Qarnayn', 'Companions of Cave', 'Prophet Yusuf', 'Musa and Khidr', 'c'),
(90, 18, 'Al-Kahf', 'Main lesson of Surah Al-Kahf?', 'Wealth is everything', 'Faith protects from trials', 'War is necessary', 'Travel is main goal', 'b'),
(91, 19, 'Maryam', 'Surah Maryam is named after which personality?', 'Mother of Musa (A.S)', 'Maryam (A.S)', 'Queen of Egypt', 'Wife of Pharaoh', 'b'),
(92, 19, 'Maryam', 'Which Prophet is born miraculously without father?', 'Prophet Isa (A.S)', 'Prophet Musa (A.S)', 'Prophet Nuh (A.S)', 'Prophet Ibrahim (A.S)', 'a'),
(93, 19, 'Maryam', 'Who is the father of Prophet Yahya (A.S)?', 'Zakariya (A.S)', 'Ibrahim (A.S)', 'Nuh (A.S)', 'Imran', 'a'),
(94, 19, 'Maryam', 'Surah Maryam mainly focuses on?', 'Trade', 'Mercy of Allah and miracles', 'War', 'Science', 'b'),
(95, 19, 'Maryam', 'Maryam (A.S) is known for her?', 'Wealth', 'Chastity and devotion', 'Power', 'Kingdom', 'b'),
(96, 20, 'Taha', 'Surah Taha was revealed to comfort which Prophet?', 'Prophet Musa (A.S)', 'Prophet Isa (A.S)', 'Prophet Nuh (A.S)', 'Prophet Yusuf (A.S)', 'a'),
(97, 20, 'Taha', 'What command was given to Prophet Musa (A.S)?', 'Go to Pharaoh', 'Go to Rome', 'Go to India', 'Go to Yemen', 'a'),
(98, 20, 'Taha', 'Who made the golden calf for Bani Israel?', 'Harun (A.S)', 'Samiri', 'Pharaoh', 'Musa (A.S)', 'b'),
(99, 20, 'Taha', 'Main theme of Surah Taha?', 'Wealth', 'Faith and patience', 'Trade', 'War', 'b'),
(100, 20, 'Taha', 'Allah is described in this Surah as?', 'Only powerful', 'Most Merciful', 'Only strict', 'Only silent', 'b'),
(101, 16, 'An-Nahl', 'Surah An-Nahl is also known as the Surah of which blessing due to its mention of Allah’s favors?', 'Fasting', 'Blessings', 'Prayer', 'Charity', 'b'),
(102, 16, 'An-Nahl', 'Which important creation is mentioned in detail for producing honey?', 'Ants', 'Bees', 'Birds', 'Fish', 'b'),
(103, 16, 'An-Nahl', 'Surah An-Nahl mainly emphasizes which concept?', 'Trade', 'Allah’s countless blessings', 'War', 'History', 'b'),
(104, 16, 'An-Nahl', 'According to this Surah, gratitude leads to?', 'Loss', 'Increase in blessings', 'Punishment', 'Weakness', 'b'),
(105, 16, 'An-Nahl', 'Which natural sign is highlighted as evidence of Allah’s power?', 'Mountains only', 'Rain, animals and nature', 'Cities', 'Books', 'b'),
(106, 17, 'Al-Isra', 'Surah Al-Isra mentions which miraculous journey of Prophet Muhammad (PBUH)?', 'Hijrah', 'Isra and Mi’raj', 'Battle of Badr', 'Battle of Uhud', 'b'),
(107, 17, 'Al-Isra', 'To which city did the Prophet travel in the night journey?', 'Makkah', 'Jerusalem', 'Madina', 'Taif', 'b'),
(108, 17, 'Al-Isra', 'Which sacred place is mentioned as the destination of the Isra journey?', 'Masjid al-Haram', 'Masjid al-Aqsa', 'Masjid Quba', 'Masjid Nabawi', 'b'),
(109, 17, 'Al-Isra', 'What is a major theme of Surah Al-Isra?', 'War rules', 'Moral values and guidance', 'Trade', 'Science', 'b'),
(110, 17, 'Al-Isra', 'Which group of sins is strongly warned against in this Surah?', 'Minor mistakes', 'Major sins and injustice', 'Only food sins', 'Travel sins', 'b'),
(111, 18, 'Al-Kahf', 'Surah Al-Kahf is recommended to be recited on which day?', 'Monday', 'Friday', 'Sunday', 'Saturday', 'b'),
(112, 18, 'Al-Kahf', 'Which group of youth is mentioned who slept in a cave?', 'Companions of Badr', 'Ashab al-Kahf', 'Bani Israel', 'Quraysh', 'b'),
(113, 18, 'Al-Kahf', 'What protected the young men in the cave?', 'Weapons', 'Allah’s miracle', 'Food', 'Army', 'b'),
(114, 18, 'Al-Kahf', 'Which companion of Musa (A.S) is mentioned in this Surah?', 'Harun', 'Khidr', 'Yusha', 'Luqman', 'b'),
(115, 18, 'Al-Kahf', 'What is one of the main lessons of Surah Al-Kahf?', 'Wealth is everything', 'Faith protects from trials', 'Travel is important', 'War is necessary', 'b'),
(116, 19, 'Maryam', 'Surah Maryam is named after which noble woman?', 'Aisha (R.A)', 'Maryam (A.S)', 'Fatima (R.A)', 'Hajar (A.S)', 'b'),
(117, 19, 'Maryam', 'Which miracle is mentioned regarding Prophet Isa (A.S)?', 'He spoke in infancy', 'He flew', 'He wrote books', 'He built cities', 'a'),
(118, 19, 'Maryam', 'Who was the father of Prophet Yahya (A.S)?', 'Zakariya (A.S)', 'Ibrahim (A.S)', 'Musa (A.S)', 'Nuh (A.S)', 'a'),
(119, 19, 'Maryam', 'Surah Maryam mainly highlights which quality of Prophet Zakariya (A.S)?', 'Wealth', 'Supplication and hope', 'Anger', 'Power', 'b'),
(120, 19, 'Maryam', 'Which theme is strong in Surah Maryam?', 'Science', 'Mercy of Allah', 'Trade', 'War', 'b'),
(121, 20, 'Ta-Ha', 'Surah Ta-Ha was revealed to comfort which Prophet?', 'Prophet Isa (A.S)', 'Prophet Muhammad (PBUH)', 'Prophet Musa (A.S)', 'Prophet Nuh (A.S)', 'c'),
(122, 20, 'Ta-Ha', 'Which event of Prophet Musa (A.S) is detailed in this Surah?', 'Migration to Madina', 'Encounter with Pharaoh', 'Battle of Uhud', 'Hijrah', 'b'),
(123, 20, 'Ta-Ha', 'What did Allah command Musa (A.S) to throw which turned into a snake?', 'Stick', 'Sword', 'Rope', 'Stone', 'a'),
(124, 20, 'Ta-Ha', 'Who misled the Bani Israel during Musa’s absence?', 'Harun', 'Samiri', 'Pharaoh', 'Qarun', 'b'),
(125, 20, 'Ta-Ha', 'Main lesson of Surah Ta-Ha is?', 'Pride', 'Trust in Allah and patience', 'Wealth', 'Speed', 'b'),
(126, 21, 'Al-Anbiya', 'Surah Al-Anbiya mainly discusses which group of noble personalities sent by Allah?', 'Kings', 'Prophets', 'Scholars', 'Warriors', 'b'),
(127, 21, 'Al-Anbiya', 'Which miracle is mentioned about Prophet Ibrahim (A.S)?', 'Fire became cool for him', 'He split the sea', 'He flew in sky', 'He built ships', 'a'),
(128, 21, 'Al-Anbiya', 'Which Prophet swallowed by a big fish is mentioned in this Surah?', 'Yunus (A.S)', 'Musa (A.S)', 'Isa (A.S)', 'Nuh (A.S)', 'a'),
(129, 21, 'Al-Anbiya', 'What is the central message of Surah Al-Anbiya?', 'Trade success', 'Unity of Prophets and Tawheed', 'War strategy', 'Agriculture', 'b'),
(130, 21, 'Al-Anbiya', 'Which word describes the Prophets in this Surah?', 'Weak', 'Patient and chosen', 'Rich', 'Kings', 'b'),
(131, 22, 'Al-Hajj', 'Surah Al-Hajj is named after which important Islamic pilgrimage?', 'Umrah', 'Hajj', 'Zakat', 'Jihad', 'b'),
(132, 22, 'Al-Hajj', 'Which act is strongly emphasized in this Surah?', 'Trade', 'Submission to Allah', 'Travel', 'Cooking', 'b'),
(133, 22, 'Al-Hajj', 'What natural event is described as frightening on the Day of Judgment?', 'Rain', 'Earthquake', 'Wind', 'Snow', 'b'),
(134, 22, 'Al-Hajj', 'Surah Al-Hajj contains rulings about which worship?', 'Fasting', 'Pilgrimage rituals', 'Prayer only', 'Charity only', 'b'),
(135, 22, 'Al-Hajj', 'What does this Surah say about people who argue about Allah?', 'They are guided', 'They are misguided', 'They are rewarded', 'They are forgiven always', 'b'),
(136, 23, 'Al-Mu’minun', 'Surah Al-Mu’minun describes success belongs to those who are?', 'Wealthy', 'Believers', 'Kings', 'Traders', 'b'),
(137, 23, 'Al-Mu’minun', 'Which quality is mentioned first for successful believers?', 'Charity', 'Humility in prayer', 'Fasting', 'Travel', 'b'),
(138, 23, 'Al-Mu’minun', 'What does this Surah say about useless speech?', 'Allowed', 'Avoided by believers', 'Rewarded', 'Neutral', 'b'),
(139, 23, 'Al-Mu’minun', 'Which creation stages of humans are mentioned?', 'Water cycle', 'Embryonic development', 'Fire creation', 'Stone creation', 'b'),
(140, 23, 'Al-Mu’minun', 'Main theme of Surah Al-Mu’minun is?', 'Trade rules', 'Characteristics of true believers', 'War', 'Science', 'b'),
(141, 24, 'An-Nur', 'Surah An-Nur mainly focuses on which concept?', 'Trade', 'Light and purity', 'War', 'Travel', 'b'),
(142, 24, 'An-Nur', 'Ayat-un-Nur (Verse of Light) is found in which Surah?', 'Al-Baqarah', 'An-Nur', 'Yaseen', 'Al-Kahf', 'b'),
(143, 24, 'An-Nur', 'What is strongly emphasized in this Surah?', 'Gossip', 'Chastity and modesty', 'War', 'Wealth', 'b'),
(144, 24, 'An-Nur', 'Which punishment is mentioned for false accusation?', 'Reward', 'Strict punishment', 'Forgiveness always', 'No rule', 'b'),
(145, 24, 'An-Nur', 'Surah An-Nur gives guidance about which behavior?', 'Cooking', 'Social ethics', 'Travel', 'Business', 'b'),
(146, 25, 'Al-Furqan', 'What does the word Al-Furqan mean?', 'Book', 'Criterion between truth and falsehood', 'War', 'Light', 'b'),
(147, 25, 'Al-Furqan', 'Who is described as a warner in this Surah?', 'Prophet Musa (A.S)', 'Prophet Muhammad (PBUH)', 'Prophet Isa (A.S)', 'Prophet Nuh (A.S)', 'b'),
(148, 25, 'Al-Furqan', 'What does this Surah strongly reject?', 'Prayer', 'Shirk and disbelief', 'Fasting', 'Charity', 'b'),
(149, 25, 'Al-Furqan', 'Who are described as true servants of Allah?', 'Rich people', 'Ibad-ur-Rahman', 'Kings', 'Soldiers', 'b'),
(150, 25, 'Al-Furqan', 'Main theme of Surah Al-Furqan is?', 'Sports', 'Distinguishing truth from falsehood', 'Trade', 'Science', 'b'),
(151, 26, 'Ash-Shu’ara', 'Surah Ash-Shu’ara mainly narrates stories of which group of people?', 'Kings', 'Prophets and their nations', 'Scientists', 'Traders', 'b'),
(152, 26, 'Ash-Shu’ara', 'Which Prophet confronted Pharaoh as mentioned in this Surah?', 'Isa (A.S)', 'Musa (A.S)', 'Ibrahim (A.S)', 'Nuh (A.S)', 'b'),
(153, 26, 'Ash-Shu’ara', 'What is repeated in this Surah after each story of a Prophet?', 'Trade lesson', 'Allah’s help and warning', 'War plan', 'Science rule', 'b'),
(154, 26, 'Ash-Shu’ara', 'Who is repeatedly mentioned as rejecting truth in different stories?', 'Believers', 'Disbelieving قوم', 'Angels', 'Scholars', 'b'),
(155, 26, 'Ash-Shu’ara', 'Main lesson of Surah Ash-Shu’ara is?', 'Success through wealth', 'Victory of truth over falsehood', 'Technology', 'Travel', 'b'),
(156, 27, 'An-Naml', 'Surah An-Naml mentions the story of which Prophet who could understand animal speech?', 'Sulaiman (A.S)', 'Musa (A.S)', 'Isa (A.S)', 'Nuh (A.S)', 'a'),
(157, 27, 'An-Naml', 'Which creature is mentioned in the Surah name?', 'Bee', 'Ant', 'Bird', 'Fish', 'b'),
(158, 27, 'An-Naml', 'Who brought the throne of Queen of Sheba?', 'Jinn', 'A powerful servant of Sulaiman', 'Angels', 'Humans', 'b'),
(159, 27, 'An-Naml', 'What was Queen of Sheba’s reaction after guidance?', 'Rejected it', 'Accepted Islam', 'Ignored it', 'Fought', 'b'),
(160, 27, 'An-Naml', 'Main theme of Surah An-Naml is?', 'Trade', 'Power of Allah and wisdom of Prophets', 'War', 'Science', 'b'),
(161, 28, 'Al-Qasas', 'Surah Al-Qasas narrates the early life story of which Prophet?', 'Musa (A.S)', 'Isa (A.S)', 'Yunus (A.S)', 'Nuh (A.S)', 'a'),
(162, 28, 'Al-Qasas', 'Who raised Prophet Musa (A.S) in the palace?', 'Bani Israel', 'Pharaoh’s family', 'Traders', 'Scholars', 'b'),
(163, 28, 'Al-Qasas', 'Which person from Musa’s story is known for helping him in Madyan?', 'Harun (A.S)', 'Shuayb (A.S)', 'Yusuf (A.S)', 'Luqman', 'b'),
(164, 28, 'Al-Qasas', 'What did Musa (A.S) accidentally do in Egypt?', 'Built a city', 'Killed a man unintentionally', 'Became king', 'Wrote book', 'b'),
(165, 28, 'Al-Qasas', 'Main lesson of Surah Al-Qasas is?', 'Power', 'Allah’s plan is perfect', 'Trade', 'Science', 'b'),
(166, 29, 'Al-Ankabut', 'Surah Al-Ankabut is named after which creature?', 'Ant', 'Spider', 'Bee', 'Snake', 'b'),
(167, 29, 'Al-Ankabut', 'What is the spider’s house compared to in this Surah?', 'Strong shelter', 'Weak structure', 'Castle', 'Mountain', 'b'),
(168, 29, 'Al-Ankabut', 'What does this Surah say about believers?', 'They will never be tested', 'They will be tested', 'They are always rich', 'They never struggle', 'b'),
(169, 29, 'Al-Ankabut', 'Which Prophet is mentioned as facing rejection from his people?', 'Nuh (A.S)', 'Ibrahim (A.S)', 'Sulaiman (A.S)', 'Yunus (A.S)', 'b'),
(170, 29, 'Al-Ankabut', 'Main theme of Surah Al-Ankabut is?', 'Faith tested through trials', 'Trade success', 'Science', 'War', 'a'),
(171, 30, 'Ar-Rum', 'Surah Ar-Rum refers to which empire?', 'Persian', 'Roman', 'Arab', 'Indian', 'b'),
(172, 30, 'Ar-Rum', 'What prophecy is mentioned in Surah Ar-Rum?', 'Rain will stop', 'Romans will be victorious again', 'Sun will disappear', 'Sea will dry', 'b'),
(173, 30, 'Ar-Rum', 'What natural sign of Allah is mentioned for reflection?', 'Mountains only', 'Creation of humans and nature', 'Cities', 'Weapons', 'b'),
(174, 30, 'Ar-Rum', 'What does this Surah say about marriage and love?', 'It is random', 'It is a sign of Allah', 'It is not important', 'It is forbidden', 'b'),
(175, 30, 'Ar-Rum', 'Main message of Surah Ar-Rum is?', 'Power of kings', 'Victory belongs to Allah’s plan', 'Trade', 'Science', 'b'),
(176, 31, 'Luqman', 'Surah Luqman mainly contains the advice of which wise personality?', 'Prophet Yusuf (A.S)', 'Luqman the Wise', 'Prophet Musa (A.S)', 'Prophet Nuh (A.S)', 'b'),
(177, 31, 'Luqman', 'What advice does Luqman give to his son first?', 'Be rich', 'Do not commit shirk', 'Travel the world', 'Fight enemies', 'b'),
(178, 31, 'Luqman', 'What is strongly emphasized in Luqman’s advice to parents?', 'Disrespect', 'Kindness and gratitude', 'Distance', 'Argument', 'b'),
(179, 31, 'Luqman', 'Which natural creation is mentioned as a sign of Allah’s knowledge?', 'Mountains', 'Even a tiny seed', 'Stars only', 'Rivers', 'b'),
(180, 31, 'Luqman', 'Main theme of Surah Luqman is?', 'War strategy', 'Wisdom and Tawheed', 'Trade', 'History', 'b'),
(181, 32, 'As-Sajdah', 'Surah As-Sajdah is named after which act of worship?', 'Fasting', 'Prostration', 'Charity', 'Hajj', 'b'),
(182, 32, 'As-Sajdah', 'What is highlighted as a sign of true believers?', 'Arguing', 'Prostrating to Allah', 'Ignoring prayer', 'Wealth', 'b'),
(183, 32, 'As-Sajdah', 'From what did Allah create humans according to this Surah?', 'Fire', 'Clay', 'Light', 'Wind', 'b'),
(184, 32, 'As-Sajdah', 'What is mentioned about the Day of Judgment in this Surah?', 'It will not happen', 'It will surely come', 'It already passed', 'It is optional', 'b'),
(185, 32, 'As-Sajdah', 'Main theme of Surah As-Sajdah is?', 'Science', 'Faith in resurrection and obedience', 'Trade', 'Travel', 'b'),
(186, 33, 'Al-Ahzab', 'Surah Al-Ahzab refers to which famous battle?', 'Badr', 'Khandaq (Trench)', 'Uhud', 'Tabuk', 'b'),
(187, 33, 'Al-Ahzab', 'Who is called the Seal of the Prophets?', 'Musa (A.S)', 'Muhammad (PBUH)', 'Isa (A.S)', 'Ibrahim (A.S)', 'b'),
(188, 33, 'Al-Ahzab', 'What title is given to the wives of Prophet Muhammad (PBUH)?', 'Sisters of Ummah', 'Mothers of the believers', 'Queens', 'Teachers', 'b'),
(189, 33, 'Al-Ahzab', 'What is strongly emphasized in this Surah?', 'Fashion', 'Obedience to Allah and His Messenger', 'Trade', 'War only', 'b'),
(190, 33, 'Al-Ahzab', 'Main theme of Surah Al-Ahzab is?', 'History', 'Social and moral guidance', 'Science', 'Agriculture', 'b'),
(191, 34, 'Saba', 'Surah Saba is named after which ancient قوم?', 'Thamud', 'Saba (Sheba)', 'Aad', 'Bani Israel', 'b'),
(192, 34, 'Saba', 'What blessing was given to the people of Saba?', 'Wealth only', 'Gardens and prosperity', 'War power', 'Mountains', 'b'),
(193, 34, 'Saba', 'What happened to the people of Saba due to ingratitude?', 'They became richer', 'Their blessings were taken away', 'They became prophets', 'Nothing happened', 'b'),
(194, 34, 'Saba', 'Which Prophet is mentioned as having control over jinn?', 'Sulaiman (A.S)', 'Musa (A.S)', 'Isa (A.S)', 'Nuh (A.S)', 'a'),
(195, 34, 'Saba', 'Main lesson of Surah Saba is?', 'Wealth is everything', 'Gratitude brings blessings', 'War success', 'Science', 'b'),
(196, 35, 'Fatir', 'Surah Fatir begins by praising Allah as the Creator of what?', 'War', 'Heavens and earth', 'Trade', 'Cities', 'b'),
(197, 35, 'Fatir', 'What does Fatir mean?', 'Destroyer', 'Originator / Creator', 'King', 'Messenger', 'b'),
(198, 35, 'Fatir', 'Which creation is mentioned flying with wings in pairs and singles?', 'Fish', 'Birds', 'Humans', 'Bees', 'b'),
(199, 35, 'Fatir', 'What is said about knowledge and ignorance?', 'They are equal', 'They are not equal', 'Both are same', 'Not mentioned', 'b'),
(200, 35, 'Fatir', 'Main theme of Surah Fatir is?', 'Trade system', 'Allah as Creator and Sustainer', 'War', 'Travel', 'b'),
(201, 36, 'Ya-Sin', 'Surah Ya-Sin is often called the heart of which holy book?', 'Hadith', 'Quran', 'Tafseer', 'Fiqh', 'b'),
(202, 36, 'Ya-Sin', 'What does Surah Ya-Sin mainly emphasize?', 'Trade laws', 'Resurrection after death', 'War rules', 'Travel', 'b'),
(203, 36, 'Ya-Sin', 'Which example is given about a city rejecting messengers?', 'Rome', 'Antioch', 'Makkah', 'Egypt', 'b'),
(204, 36, 'Ya-Sin', 'What happens to the sun and moon according to this Surah?', 'They stop permanently', 'They move in fixed orbits', 'They collide', 'They disappear', 'b'),
(205, 36, 'Ya-Sin', 'Main theme of Surah Ya-Sin is?', 'History only', 'Belief in resurrection and prophethood', 'Trade', 'Science', 'b'),
(206, 37, 'As-Saffat', 'Surah As-Saffat describes angels arranged in what way?', 'Scattered', 'In rows', 'Randomly', 'Hidden', 'b'),
(207, 37, 'As-Saffat', 'Which Prophet is associated with sacrifice story in this Surah?', 'Ibrahim (A.S)', 'Musa (A.S)', 'Nuh (A.S)', 'Isa (A.S)', 'a'),
(208, 37, 'As-Saffat', 'Who was almost sacrificed in obedience to Allah?', 'Ismail (A.S)', 'Yusuf (A.S)', 'Yunus (A.S)', 'Harun (A.S)', 'a'),
(209, 37, 'As-Saffat', 'What happens to shayateen according to this Surah?', 'They are rewarded', 'They are rejected and punished', 'They rule', 'They are forgiven', 'b'),
(210, 37, 'As-Saffat', 'Main theme of Surah As-Saffat is?', 'War strategy', 'Unity of Allah and obedience', 'Trade', 'Science', 'b'),
(211, 38, 'Sad', 'Surah Sad is named after which Arabic letter?', 'Alif', 'Ba', 'Sad', 'Ta', 'c'),
(212, 38, 'Sad', 'Which Prophet is tested with wealth and patience?', 'Ayub (A.S)', 'Musa (A.S)', 'Isa (A.S)', 'Nuh (A.S)', 'a'),
(213, 38, 'Sad', 'What is emphasized in this Surah?', 'Pride', 'Patience and repentance', 'Trade', 'Travel', 'b'),
(214, 38, 'Sad', 'Who refused to prostrate to Adam (A.S)?', 'Angel', 'Iblis', 'Human', 'Jinn', 'b'),
(215, 38, 'Sad', 'Main theme of Surah Sad is?', 'Stories only', 'Truth, patience and accountability', 'Science', 'Trade', 'b'),
(216, 39, 'Az-Zumar', 'Surah Az-Zumar mainly focuses on groups of people on the Day of Judgment as?', 'Traders and kings', 'Groups in Paradise and Hell', 'Soldiers', 'Farmers', 'b'),
(217, 39, 'Az-Zumar', 'What is strongly emphasized in this Surah?', 'Shirk', 'Sincere worship of Allah', 'War', 'Trade', 'b'),
(218, 39, 'Az-Zumar', 'What does Allah say about forgiveness in this Surah?', 'It is limited', 'It is vast and open for repentance', 'It does not exist', 'Only for prophets', 'b'),
(219, 39, 'Az-Zumar', 'Who are mentioned as receiving reward for patience?', 'Disbelievers', 'Believers', 'Kings', 'Traders', 'b'),
(220, 39, 'Az-Zumar', 'Main theme of Surah Az-Zumar is?', 'Science', 'Sincerity in worship and accountability', 'History', 'Travel', 'b'),
(221, 40, 'Ghafir', 'What is another name of Surah Ghafir?', 'Al-Mu’min', 'Al-Fil', 'Al-Asr', 'Al-Kafirun', 'a'),
(222, 40, 'Ghafir', 'What does Ghafir mean?', 'Punisher', 'Forgiver', 'Warrior', 'King', 'b'),
(223, 40, 'Ghafir', 'Which believer from Pharaoh’s family is mentioned?', 'Musa (A.S)', 'A believing man', 'Harun (A.S)', 'Yusuf (A.S)', 'b'),
(224, 40, 'Ghafir', 'What does this Surah emphasize about Allah?', 'He forgets sins', 'He is Forgiving and accepts repentance', 'He only punishes', 'He is distant', 'b'),
(225, 40, 'Ghafir', 'Main theme of Surah Ghafir is?', 'Trade', 'Faith and Allah’s mercy', 'Science', 'War', 'b'),
(226, 41, 'Fussilat', 'Surah Fussilat means the verses of the Quran have been explained in what manner?', 'Hidden', 'Clearly explained', 'Only symbols', 'Not explained', 'b'),
(227, 41, 'Fussilat', 'What does this Surah emphasize about the Quran?', 'It is poetry', 'It is clear guidance', 'It is a storybook', 'It is optional', 'b'),
(228, 41, 'Fussilat', 'What creation sign is mentioned in this Surah?', 'Only humans', 'Heavens and earth', 'Only animals', 'Only water', 'b'),
(229, 41, 'Fussilat', 'Who are described as enemies of the prophets?', 'Believers', 'Disbelievers who reject truth', 'Angels', 'Traders', 'b'),
(230, 41, 'Fussilat', 'Main theme of Surah Fussilat is?', 'Trade laws', 'Clarity of revelation and accountability', 'War', 'Science', 'b'),
(231, 42, 'Ash-Shura', 'What does Ash-Shura mean?', 'Punishment', 'Consultation', 'Light', 'War', 'b'),
(232, 42, 'Ash-Shura', 'What principle is encouraged among believers?', 'Fighting', 'Mutual consultation', 'Silence', 'Wealth', 'b'),
(233, 42, 'Ash-Shura', 'What is said about Allah in this Surah?', 'He has partners', 'He is unique and powerful', 'He is weak', 'He is limited', 'b'),
(234, 42, 'Ash-Shura', 'Which relationship is emphasized?', 'Enemies', 'Brotherhood among believers', 'Kings', 'Traders', 'b'),
(235, 42, 'Ash-Shura', 'Main theme of Surah Ash-Shura is?', 'Governance and unity', 'Science', 'Trade', 'History', 'a'),
(236, 43, 'Az-Zukhruf', 'What does Az-Zukhruf mean?', 'Gold and decoration', 'War', 'Water', 'Light', 'a'),
(237, 43, 'Az-Zukhruf', 'What is criticized in this Surah?', 'Simple life', 'Love of wealth and pride', 'Prayer', 'Fasting', 'b'),
(238, 43, 'Az-Zukhruf', 'Which Prophet is mentioned frequently?', 'Musa (A.S)', 'Ibrahim (A.S)', 'Yunus (A.S)', 'Isa (A.S)', 'a'),
(239, 43, 'Az-Zukhruf', 'What does this Surah say about prophets?', 'They are kings', 'They are chosen messengers', 'They are traders', 'They are poets', 'b'),
(240, 43, 'Az-Zukhruf', 'Main theme of Surah Az-Zukhruf is?', 'Wealth is everything', 'False pride vs true guidance', 'Science', 'Travel', 'b'),
(241, 44, 'Ad-Dukhan', 'What does Ad-Dukhan mean?', 'Fire', 'Smoke', 'Light', 'Wind', 'b'),
(242, 44, 'Ad-Dukhan', 'What warning is given in this Surah?', 'Rain will stop', 'Punishment for disbelievers', 'Trade will end', 'Sun will fall', 'b'),
(243, 44, 'Ad-Dukhan', 'Which night is mentioned as blessed?', 'Night of travel', 'Laylatul Qadr', 'Normal night', 'Battle night', 'b'),
(244, 44, 'Ad-Dukhan', 'What happened to Pharaoh’s people?', 'They were blessed', 'They were destroyed', 'They became prophets', 'Nothing', 'b'),
(245, 44, 'Ad-Dukhan', 'Main theme of Surah Ad-Dukhan is?', 'Science', 'Divine punishment and mercy', 'Trade', 'History only', 'b'),
(246, 45, 'Al-Jathiyah', 'What does Al-Jathiyah mean?', 'Standing', 'Kneeling', 'Running', 'Flying', 'b'),
(247, 45, 'Al-Jathiyah', 'What is emphasized in this Surah?', 'Books', 'Signs of Allah in creation', 'Trade', 'War', 'b'),
(248, 45, 'Al-Jathiyah', 'What happens on Judgment Day according to this Surah?', 'People will be playing', 'People will kneel before Allah', 'People will sleep', 'People will trade', 'b'),
(249, 45, 'Al-Jathiyah', 'What is strongly warned against?', 'Prayer', 'Following desires instead of truth', 'Fasting', 'Charity', 'b'),
(250, 45, 'Al-Jathiyah', 'Main theme of Surah Al-Jathiyah is?', 'Science only', 'Accountability and divine signs', 'History', 'Trade', 'b'),
(251, 46, 'Al-Ahqaf', 'Surah Al-Ahqaf refers to which قوم (nation)?', 'Thamud', 'Aad', 'Bani Israel', 'Quraysh', 'b'),
(252, 46, 'Al-Ahqaf', 'Which Prophet is mentioned as warning his people?', 'Nuh (A.S)', 'Hud (A.S)', 'Ibrahim (A.S)', 'Isa (A.S)', 'b'),
(253, 46, 'Al-Ahqaf', 'What was the response of the قوم of Aad?', 'They believed', 'They rejected and were destroyed', 'They migrated', 'They became prophets', 'b'),
(254, 46, 'Al-Ahqaf', 'What is emphasized about parents in this Surah?', 'Ignoring them', 'Kindness and care', 'Arguing', 'Distance', 'b'),
(255, 46, 'Al-Ahqaf', 'Main theme of Surah Al-Ahqaf is?', 'Trade', 'Consequences of disbelief and guidance', 'Science', 'Travel', 'b'),
(256, 47, 'Muhammad', 'Surah Muhammad is named after which Prophet?', 'Musa (A.S)', 'Muhammad (PBUH)', 'Isa (A.S)', 'Nuh (A.S)', 'b'),
(257, 47, 'Muhammad', 'What is emphasized in this Surah regarding believers?', 'Weakness', 'Support for truth and fighting injustice', 'Silence', 'Trade', 'b'),
(258, 47, 'Muhammad', 'What happens to disbelievers according to this Surah?', 'They are rewarded', 'Their deeds are wasted', 'They become rich', 'They are forgiven automatically', 'b'),
(259, 47, 'Muhammad', 'What is encouraged after battles?', 'Arrogance', 'Steadfastness', 'Luxury', 'Ignorance', 'b'),
(260, 47, 'Muhammad', 'Main theme of Surah Muhammad is?', 'War glory', 'Support of truth and rejection of falsehood', 'Science', 'Trade', 'b'),
(261, 48, 'Al-Fath', 'What does Al-Fath mean?', 'Punishment', 'Victory', 'War', 'Light', 'b'),
(262, 48, 'Al-Fath', 'Which peace treaty is referred to in this Surah?', 'Treaty of Badr', 'Treaty of Hudaybiyyah', 'Treaty of Uhud', 'Treaty of Taif', 'b'),
(263, 48, 'Al-Fath', 'What is promised to believers in this Surah?', 'Defeat', 'Clear victory', 'No reward', 'Punishment', 'b'),
(264, 48, 'Al-Fath', 'Who pledged allegiance under the tree?', 'Sahaba (R.A)', 'Enemies', 'Traders', 'Kings', 'a'),
(265, 48, 'Al-Fath', 'Main theme of Surah Al-Fath is?', 'Trade', 'Divine victory and forgiveness', 'Science', 'History', 'b'),
(266, 49, 'Al-Hujurat', 'What does Al-Hujurat mean?', 'Rooms', 'Mountains', 'Wars', 'Cities', 'a'),
(267, 49, 'Al-Hujurat', 'What behavior is strongly forbidden in this Surah?', 'Helping', 'Backbiting and suspicion', 'Praying', 'Charity', 'b'),
(268, 49, 'Al-Hujurat', 'What is said about believers?', 'They are enemies', 'They are brothers', 'They are strangers', 'They are traders', 'b'),
(269, 49, 'Al-Hujurat', 'What is emphasized when speaking to the Prophet (PBUH)?', 'Loud voice', 'Respect and lowering voice', 'Ignoring', 'Arguing', 'b'),
(270, 49, 'Al-Hujurat', 'Main theme of Surah Al-Hujurat is?', 'Social manners and unity', 'Science', 'Trade', 'War', 'a'),
(271, 50, 'Qaf', 'Surah Qaf begins with which Arabic letter?', 'Alif', 'Qaf', 'Ba', 'Ta', 'b'),
(272, 50, 'Qaf', 'What is strongly discussed in this Surah?', 'Trade', 'Resurrection after death', 'Travel', 'Science', 'b'),
(273, 50, 'Qaf', 'What is mentioned about human creation?', 'From gold', 'From clay and Allah’s knowledge', 'From fire', 'From stone', 'b'),
(274, 50, 'Qaf', 'What happens on Day of Judgment?', 'No accountability', 'Every deed will be recorded', 'Only kings judged', 'No one judged', 'b'),
(275, 50, 'Qaf', 'Main theme of Surah Qaf is?', 'History', 'Resurrection and accountability', 'Trade', 'War', 'b'),
(276, 51, 'Adh-Dhariyat', 'What is the main theme emphasized in Surah Adh-Dhariyat regarding human creation purpose?', 'Trade and wealth', 'Worship of Allah alone', 'Scientific discovery', 'World travel', 'b'),
(277, 51, 'Adh-Dhariyat', 'Which group of angels is mentioned in Surah Adh-Dhariyat as distributing commands?', 'Messengers on earth', 'Carriers of wind and rain', 'Guardians of mountains', 'Recorders of deeds', 'b'),
(278, 51, 'Adh-Dhariyat', 'What is strongly emphasized in Surah Adh-Dhariyat about the Day of Judgment?', 'It is impossible', 'It is uncertain', 'It is surely coming', 'It already happened', 'c'),
(279, 51, 'Adh-Dhariyat', 'Which Prophet is NOT directly mentioned but his nation is referred to for destruction?', 'Prophet Musa (A.S)', 'Prophet Nuh (A.S)', 'Prophet Isa (A.S)', 'Prophet Yunus (A.S)', 'b'),
(280, 51, 'Adh-Dhariyat', 'What is a key attribute of the righteous mentioned in this Surah?', 'Sleeping most of the time', 'Asking forgiveness at dawn', 'Collecting wealth', 'Avoiding prayer', 'b'),
(281, 52, 'At-Tur', 'What does \"At-Tur\" refer to in this Surah?', 'A river', 'Mount Sinai', 'A desert', 'A city', 'b'),
(282, 52, 'At-Tur', 'What is the main warning in Surah At-Tur?', 'World destruction only', 'Denial of resurrection leads to punishment', 'Trade failure', 'Travel loss', 'b'),
(283, 52, 'At-Tur', 'What reward is described for the righteous in Paradise?', 'Gold only', 'Gardens and delights', 'Palaces on earth', 'Rivers of fire', 'b'),
(284, 52, 'At-Tur', 'What accusation do disbelievers make against the Prophet (PBUH) in this Surah?', 'He is a king', 'He is a poet or magician', 'He is a merchant', 'He is a traveler', 'b'),
(285, 52, 'At-Tur', 'What is strongly emphasized about Allah’s planning?', 'It is weak', 'It is random', 'It is perfect and powerful', 'It does not exist', 'c'),
(286, 53, 'An-Najm', 'What does \"An-Najm\" mean?', 'The Moon', 'The Star', 'The Sun', 'The Sky', 'b'),
(287, 53, 'An-Najm', 'What important event is mentioned at the beginning of Surah An-Najm?', 'Battle of Badr', 'Revelation from Allah', 'Migration to Madina', 'Creation of humans', 'b'),
(288, 53, 'An-Najm', 'Which Prophet is mentioned as having seen Jibreel (A.S) in true form?', 'Prophet Musa (A.S)', 'Prophet Muhammad (PBUH)', 'Prophet Isa (A.S)', 'Prophet Nuh (A.S)', 'b'),
(289, 53, 'An-Najm', 'What is denied in this Surah regarding idols?', 'They have no power', 'They create humans', 'They control rain', 'They are alive', 'a'),
(290, 53, 'An-Najm', 'What does Surah An-Najm emphasize about revelation?', 'It is from humans', 'It is pure divine revelation', 'It is poetry', 'It is imagination', 'b'),
(291, 54, 'Al-Qamar', 'What does \"Al-Qamar\" mean?', 'The Sun', 'The Moon', 'The Star', 'The Earth', 'b'),
(292, 54, 'Al-Qamar', 'Which miracle of Prophet Muhammad (PBUH) is mentioned in this Surah?', 'Splitting of the Moon', 'Raising the dead', 'Walking on water', 'Turning stones into gold', 'a'),
(293, 54, 'Al-Qamar', 'What is repeated multiple times in this Surah for emphasis?', 'Stories of merchants', 'Ease of Quran', 'Warnings to disbelievers', 'Trade rules', 'c'),
(294, 54, 'Al-Qamar', 'Which nations are mentioned as destroyed due to disbelief?', 'Only Arabs', 'Previous nations like Aad and Thamud', 'Only Romans', 'Only Jews', 'b'),
(295, 54, 'Al-Qamar', 'What is a key message of Surah Al-Qamar?', 'Wealth brings success', 'Quran is easy to understand and remember', 'War is necessary', 'Travel is required', 'b'),
(296, 55, 'Ar-Rahman', 'What does \"Ar-Rahman\" mean?', 'The Just', 'The Most Merciful', 'The Powerful', 'The Creator', 'b'),
(297, 55, 'Ar-Rahman', 'What is repeated in Surah Ar-Rahman as a reminder?', 'Which of your Lord’s favors will you deny?', 'Work hard', 'Travel far', 'Fight always', 'a'),
(298, 55, 'Ar-Rahman', 'What major blessing is mentioned repeatedly?', 'Gold and silver', 'Knowledge of Quran and creation', 'War success', 'Trade wealth', 'b'),
(299, 55, 'Ar-Rahman', 'Who are the two gardens mentioned in this Surah for the righteous?', 'Earth and sky', 'Two levels of Paradise', 'Sea and river', 'Mountain and valley', 'b'),
(300, 55, 'Ar-Rahman', 'What is the overall theme of Surah Ar-Rahman?', 'Punishment only', 'Blessings of Allah and gratitude', 'Trade system', 'History of wars', 'b'),
(301, 56, 'Al-Waqi\'ah', 'What is the main theme of Surah Al-Waqi\'ah regarding human groups on the Day of Judgment?', 'Rich and poor only', 'Three groups of people', 'Only believers', 'Only prophets', 'b'),
(302, 56, 'Al-Waqi\'ah', 'What does \"Al-Waqi\'ah\" refer to?', 'Death', 'The Inevitable Event (Day of Judgment)', 'Birth', 'Creation', 'b'),
(303, 56, 'Al-Waqi\'ah', 'Who are the \"people of the right hand\"?', 'Disbelievers', 'Successful believers', 'Children', 'Sinners', 'b'),
(304, 56, 'Al-Waqi\'ah', 'What is strongly emphasized in this Surah?', 'Trade success', 'Certainty of resurrection', 'Science advancement', 'War strategy', 'b'),
(305, 56, 'Al-Waqi\'ah', 'What blessing is repeatedly mentioned in Paradise?', 'Gold coins', 'Fruits and comfort', 'Weapons', 'Palaces on earth', 'b'),
(306, 57, 'Al-Hadid', 'What does \"Al-Hadid\" mean?', 'Gold', 'Iron', 'Silver', 'Copper', 'b'),
(307, 57, 'Al-Hadid', 'What is the main theme of Surah Al-Hadid?', 'History', 'Faith and charity', 'Trade', 'War only', 'b'),
(308, 57, 'Al-Hadid', 'What is emphasized about Allah in this Surah?', 'He sleeps', 'He is always powerful and alive', 'He is limited', 'He is unknown', 'b'),
(309, 57, 'Al-Hadid', 'What is encouraged in this Surah?', 'Collecting wealth', 'Spending in charity', 'Avoiding people', 'Ignoring prayers', 'b'),
(310, 57, 'Al-Hadid', 'What is the reward for believers?', 'Earthly kingship', 'Light on the Day of Judgment', 'Money', 'Weapons', 'b'),
(311, 58, 'Al-Mujadila', 'What does \"Al-Mujadila\" mean?', 'The fighter', 'The woman who pleads', 'The traveler', 'The believer', 'b'),
(312, 58, 'Al-Mujadila', 'What issue is discussed in this Surah?', 'Trade rules', 'Zihar (wrong divorce practice)', 'War', 'Travel', 'b'),
(313, 58, 'Al-Mujadila', 'What is emphasized about private conversations?', 'They are always allowed', 'Allah knows all secrets', 'They are unimportant', 'They are forbidden always', 'b'),
(314, 58, 'Al-Mujadila', 'Who is always present according to this Surah?', 'People', 'Allah in knowledge', 'Kings', 'Angels only', 'b'),
(315, 58, 'Al-Mujadila', 'What is rewarded for believers?', 'Wealth', 'Honor and Allah’s help', 'Travel', 'Weapons', 'b'),
(316, 59, 'Al-Hashr', 'What does \"Al-Hashr\" mean?', 'Gathering', 'Battle', 'Trade', 'Journey', 'a'),
(317, 59, 'Al-Hashr', 'Which group is mentioned in this Surah?', 'Bani Israel only', 'Jewish tribe Banu Nadir', 'Romans', 'Persians', 'b'),
(318, 59, 'Al-Hashr', 'What is a key attribute of Allah mentioned here?', 'Weak', 'The Creator and Planner', 'Unknown', 'Silent', 'b'),
(319, 59, 'Al-Hashr', 'What is emphasized about Quran verses?', 'They are optional', 'They guide hearts', 'They are stories only', 'They are poetry', 'b'),
(320, 59, 'Al-Hashr', 'What is strongly advised?', 'Forgetting Allah', 'Being mindful of Allah', 'Ignoring prayers', 'Sleeping', 'b'),
(321, 60, 'Al-Mumtahanah', 'What does \"Al-Mumtahanah\" mean?', 'The tested woman', 'The believer', 'The judge', 'The warrior', 'a'),
(322, 60, 'Al-Mumtahanah', 'What is discussed in this Surah?', 'Trade laws', 'Relations with non-Muslims', 'War only', 'Science', 'b'),
(323, 60, 'Al-Mumtahanah', 'What is advised regarding loyalty?', 'To enemies', 'To Allah and believers', 'To wealth', 'To kings', 'b'),
(324, 60, 'Al-Mumtahanah', 'What example is given?', 'Prophet Yusuf', 'Prophet Ibrahim', 'Prophet Musa', 'Prophet Nuh', 'b'),
(325, 60, 'Al-Mumtahanah', 'What is a key principle?', 'Blind friendship', 'Faith-based relationships', 'Ignoring truth', 'Wealth priority', 'b'),
(326, 61, 'As-Saff', 'What does \"As-Saff\" mean?', 'The Line/Row', 'The Book', 'The War', 'The Journey', 'a'),
(327, 61, 'As-Saff', 'What is strongly encouraged in this Surah?', 'Disunity', 'Striving in Allah’s path', 'Ignoring prayers', 'Sleeping', 'b'),
(328, 61, 'As-Saff', 'Who is mentioned as a Prophet giving good news?', 'Isa (A.S)', 'Musa (A.S)', 'Nuh (A.S)', 'Yunus (A.S)', 'a'),
(329, 61, 'As-Saff', 'What is condemned?', 'Honesty', 'Saying what you do not do', 'Faith', 'Prayer', 'b'),
(330, 61, 'As-Saff', 'What is rewarded?', 'Wealth', 'Victory and forgiveness', 'Power', 'Travel', 'b'),
(331, 62, 'Al-Jumu\'ah', 'What does \"Al-Jumu\'ah\" mean?', 'Friday congregation', 'War', 'Trade', 'Journey', 'a'),
(332, 62, 'Al-Jumu\'ah', 'What is emphasized in this Surah?', 'Business only', 'Friday prayer', 'Travel', 'Fasting', 'b'),
(333, 62, 'Al-Jumu\'ah', 'Who was sent as Messenger?', 'Prophet Muhammad (PBUH)', 'Prophet Isa', 'Prophet Musa', 'Prophet Nuh', 'a'),
(334, 62, 'Al-Jumu\'ah', 'What is warned against?', 'Prayer', 'Leaving prayer for trade', 'Faith', 'Knowledge', 'b'),
(335, 62, 'Al-Jumu\'ah', 'What is encouraged?', 'Neglecting worship', 'Balance between worship and life', 'Ignoring religion', 'Sleep', 'b'),
(336, 63, 'Al-Munafiqun', 'What does \"Al-Munafiqun\" mean?', 'Believers', 'Hypocrites', 'Warriors', 'Scholars', 'b'),
(337, 63, 'Al-Munafiqun', 'What is hypocrisy defined as?', 'Truthfulness', 'Saying what is not in heart', 'Faith', 'Knowledge', 'b'),
(338, 63, 'Al-Munafiqun', 'What do hypocrites claim?', 'We are believers', 'We are kings', 'We are scholars', 'We are traders', 'a'),
(339, 63, 'Al-Munafiqun', 'What is warned about wealth?', 'It guarantees heaven', 'It can distract from Allah', 'It is everything', 'It is useless always', 'b'),
(340, 63, 'Al-Munafiqun', 'What is the main message?', 'Hidden faith is dangerous', 'Trade rules', 'Science', 'Travel', 'a'),
(341, 64, 'At-Taghabun', 'What does \"At-Taghabun\" mean?', 'Loss and gain', 'Trade', 'War', 'Journey', 'a'),
(342, 64, 'At-Taghabun', 'What is emphasized about Day of Judgment?', 'No accountability', 'True loss and gain revealed', 'No reward', 'No punishment', 'b'),
(343, 64, 'At-Taghabun', 'What is advised?', 'Ignoring Allah', 'Obeying Allah and His Messenger', 'Sleeping', 'Fighting', 'b'),
(344, 64, 'At-Taghabun', 'What is a test in life?', 'Wealth and children', 'Only war', 'Only travel', 'Only food', 'a'),
(345, 64, 'At-Taghabun', 'What leads to success?', 'Disobedience', 'Faith and patience', 'Wealth', 'Power', 'b'),
(346, 65, 'At-Talaq', 'What does \"At-Talaq\" mean?', 'Marriage', 'Divorce', 'War', 'Trade', 'b'),
(347, 65, 'At-Talaq', 'What is emphasized about divorce?', 'It is random', 'It has rules and limits', 'It is always wrong', 'It is unlimited', 'b'),
(348, 65, 'At-Talaq', 'What is encouraged during hardship?', 'Hope in Allah', 'Despair', 'Anger', 'Wealth', 'a'),
(349, 65, 'At-Talaq', 'What does Allah provide for those who trust Him?', 'Confusion', 'Solutions and provision', 'War', 'Fear', 'b'),
(350, 65, 'At-Talaq', 'What is a key lesson?', 'Follow emotions', 'Follow Allah’s law', 'Ignore rules', 'Break family', 'b');
INSERT INTO `quiz_questions` (`id`, `surah_id`, `surah_name`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_answer`) VALUES
(351, 66, 'At-Tahrim', 'What does \"At-Tahrim\" mean?', 'Lawful', 'Prohibition', 'War', 'Journey', 'b'),
(352, 66, 'At-Tahrim', 'What is addressed in this Surah?', 'Trade rules', 'Family and accountability', 'Science', 'History', 'b'),
(353, 66, 'At-Tahrim', 'Who is mentioned as examples of belief/disbelief?', 'Wives of prophets', 'Kings', 'Warriors', 'Traders', 'a'),
(354, 66, 'At-Tahrim', 'What is advised?', 'Repentance', 'Pride', 'Anger', 'Wealth', 'a'),
(355, 66, 'At-Tahrim', 'What protects believers?', 'Power', 'Faith and obedience', 'Money', 'Weapons', 'b'),
(356, 67, 'Al-Mulk', 'What does \"Al-Mulk\" mean?', 'Knowledge', 'Sovereignty', 'War', 'Life', 'b'),
(357, 67, 'Al-Mulk', 'What is the main theme?', 'Trade', 'Power of Allah over creation', 'War', 'History', 'b'),
(358, 67, 'Al-Mulk', 'What is created perfectly?', 'Earth and sky', 'Only humans', 'Only animals', 'Only oceans', 'a'),
(359, 67, 'Al-Mulk', 'What protects from Hellfire?', 'Charity only', 'Good deeds and belief', 'Money', 'Power', 'b'),
(360, 67, 'Al-Mulk', 'What is emphasized?', 'Death is certain', 'Life is endless', 'No accountability', 'No creator', 'a'),
(361, 68, 'Al-Qalam', 'What does \"Al-Qalam\" mean?', 'Sword', 'Pen', 'Book', 'War', 'b'),
(362, 68, 'Al-Qalam', 'What is emphasized?', 'Knowledge and writing', 'War', 'Trade', 'Travel', 'a'),
(363, 68, 'Al-Qalam', 'What is condemned?', 'Good manners', 'Bad character', 'Prayer', 'Charity', 'b'),
(364, 68, 'Al-Qalam', 'Whose character is praised?', 'Prophet Muhammad (PBUH)', 'Kings', 'Warriors', 'Merchants', 'a'),
(365, 68, 'Al-Qalam', 'What is reward for good behavior?', 'Loss', 'Great reward', 'Punishment', 'Fear', 'b'),
(366, 69, 'Al-Haqqah', 'What does \"Al-Haqqah\" mean?', 'Truth of Judgment Day', 'Life', 'War', 'Journey', 'a'),
(367, 69, 'Al-Haqqah', 'What is emphasized?', 'Doubt in resurrection', 'Certainty of judgment', 'No life after death', 'Random world', 'b'),
(368, 69, 'Al-Haqqah', 'Which nations are mentioned?', 'Only Arabs', 'Past destroyed nations', 'Only Romans', 'Only Jews', 'b'),
(369, 69, 'Al-Haqqah', 'What happens to believers?', 'Punishment', 'Reward', 'Nothing', 'Loss', 'b'),
(370, 69, 'Al-Haqqah', 'What is Quran described as?', 'Poetry', 'Truth from Allah', 'Storybook', 'Myth', 'b'),
(371, 70, 'Al-Ma\'arij', 'What does \"Al-Ma\'arij\" mean?', 'Steps of elevation', 'War', 'Journey', 'Trade', 'a'),
(372, 70, 'Al-Ma\'arij', 'What is described about angels?', 'They fall', 'They ascend to Allah', 'They sleep', 'They fight', 'b'),
(373, 70, 'Al-Ma\'arij', 'What attitude of humans is criticized?', 'Patience', 'Impatience', 'Faith', 'Charity', 'b'),
(374, 70, 'Al-Ma\'arij', 'Who is safe from anxiety?', 'Believers who pray regularly', 'Rich people', 'Kings', 'Traders', 'a'),
(375, 70, 'Al-Ma\'arij', 'What is the key message?', 'Human impatience vs divine patience', 'Only wealth matters', 'War is needed', 'Travel is key', 'a'),
(376, 71, 'Nuh', 'Surah Nuh mainly describes the preaching of which Prophet to his people over a long period of time?', 'Prophet Ibrahim (A.S)', 'Prophet Nuh (A.S)', 'Prophet Musa (A.S)', 'Prophet Isa (A.S)', 'b'),
(377, 71, 'Nuh', 'For how many years did Prophet Nuh (A.S) call his people according to the Surah?', '950 years', '100 years', '500 years', '200 years', 'a'),
(378, 71, 'Nuh', 'What was the main response of his people to the message of Tawheed?', 'They accepted immediately', 'They rejected and disbelieved', 'They migrated', 'They became kings', 'b'),
(379, 71, 'Nuh', 'What natural punishment was sent to the people of Nuh?', 'Earthquake', 'Flood', 'Drought', 'Fire', 'b'),
(380, 71, 'Nuh', 'What is a key lesson from Surah Nuh?', 'Patience in preaching', 'Speed in action', 'Wealth importance', 'War strategy', 'a'),
(381, 72, 'Al-Jinn', 'Who is the Surah Al-Jinn about?', 'Humans', 'Angels', 'Jinn beings', 'Prophets', 'c'),
(382, 72, 'Al-Jinn', 'What did a group of jinn do when they heard the Quran?', 'They ran away', 'They believed in it', 'They fought it', 'They ignored it', 'b'),
(383, 72, 'Al-Jinn', 'What concept is strongly emphasized in Surah Al-Jinn?', 'Tawheed', 'Trade', 'War', 'Travel', 'a'),
(384, 72, 'Al-Jinn', 'Can jinn hear the Quran according to this Surah?', 'No', 'Yes', 'Sometimes', 'Unknown', 'b'),
(385, 72, 'Al-Jinn', 'Who has knowledge of the unseen according to Surah Al-Jinn?', 'Jinn', 'Humans', 'Allah only', 'Angels', 'c'),
(386, 73, 'Al-Muzzammil', 'What is the main instruction in Surah Al-Muzzammil for the Prophet (PBUH)?', 'Sleep more', 'Pray at night (Tahajjud)', 'Travel', 'Trade', 'b'),
(387, 73, 'Al-Muzzammil', 'What is recommended reading in this Surah?', 'Poetry', 'Quran in slow recitation', 'Books', 'Stories', 'b'),
(388, 73, 'Al-Muzzammil', 'What quality is emphasized for believers?', 'Patience and prayer', 'Speed', 'Anger', 'Wealth', 'a'),
(389, 73, 'Al-Muzzammil', 'Surah Al-Muzzammil refers to the Prophet as?', 'Covered in cloth', 'Warrior', 'King', 'Traveler', 'a'),
(390, 73, 'Al-Muzzammil', 'Night prayer helps in what according to this Surah?', 'Physical strength', 'Spiritual strength', 'Money', 'Trade', 'b'),
(391, 74, 'Al-Muddaththir', 'What does \"Al-Muddaththir\" mean?', 'The one who sleeps', 'The one who covers himself', 'The leader', 'The traveler', 'b'),
(392, 74, 'Al-Muddaththir', 'What command was given to the Prophet in this Surah?', 'Stand and warn', 'Sleep', 'Travel', 'Fight', 'a'),
(393, 74, 'Al-Muddaththir', 'What is strongly warned in this Surah?', 'Faith', 'Hellfire punishment', 'Trade', 'Travel', 'b'),
(394, 74, 'Al-Muddaththir', 'Who is warned about arrogance in this Surah?', 'Believers', 'Disbelievers', 'Prophets', 'Angels', 'b'),
(395, 74, 'Al-Muddaththir', 'What is a key message?', 'Call people to Allah', 'Ignore message', 'Stay silent', 'Travel only', 'a'),
(396, 75, 'Al-Qiyamah', 'What does Al-Qiyamah mean?', 'Life', 'Death', 'Resurrection Day', 'Sleep', 'c'),
(397, 75, 'Al-Qiyamah', 'What is the main topic of Surah Al-Qiyamah?', 'Trade', 'Day of Judgment', 'Travel', 'War', 'b'),
(398, 75, 'Al-Qiyamah', 'What will humans be questioned about?', 'Wealth only', 'Their deeds', 'Travel', 'Food', 'b'),
(399, 75, 'Al-Qiyamah', 'What happens to the disbeliever on that day?', 'Peace', 'Regret', 'Reward', 'Honour', 'b'),
(400, 75, 'Al-Qiyamah', 'What is emphasized?', 'Accountability', 'Trade', 'Sports', 'Power', 'a'),
(401, 76, 'Al-Insan', 'What is the meaning of Al-Insan?', 'Angel', 'Human being', 'Jinn', 'Animal', 'b'),
(402, 76, 'Al-Insan', 'What is Allah’s blessing mentioned in this Surah?', 'Speech only', 'Guidance and creation', 'Wealth', 'Travel', 'b'),
(403, 76, 'Al-Insan', 'What is rewarded in Paradise?', 'Disobedience', 'Patience and good deeds', 'Laziness', 'Anger', 'b'),
(404, 76, 'Al-Insan', 'Who is mentioned as patient in this Surah?', 'Believers', 'Disbelievers', 'Animals', 'None', 'a'),
(405, 76, 'Al-Insan', 'What is the reward of righteous people?', 'Punishment', 'Paradise', 'Loss', 'Fear', 'b'),
(406, 77, 'Al-Mursalat', 'What does Al-Mursalat refer to?', 'Mountains', 'Wind sent forth', 'Animals', 'Stars', 'b'),
(407, 77, 'Al-Mursalat', 'What is repeated in this Surah?', 'Trade', 'Warning of Judgment Day', 'Travel', 'Food', 'b'),
(408, 77, 'Al-Mursalat', 'What happens to deniers of truth?', 'Reward', 'Punishment', 'Peace', 'Wealth', 'b'),
(409, 77, 'Al-Mursalat', 'What is the main tone of Surah?', 'Warning', 'Fun', 'Story', 'Travel', 'a'),
(410, 77, 'Al-Mursalat', 'What is emphasized?', 'Truth of resurrection', 'Trade', 'Science', 'Sports', 'a'),
(411, 78, 'An-Naba', 'What does An-Naba mean?', 'Story', 'Great News', 'War', 'Travel', 'b'),
(412, 78, 'An-Naba', 'What is the “Great News”?', 'Trade', 'Day of Judgment', 'Food', 'Travel', 'b'),
(413, 78, 'An-Naba', 'What creation signs are mentioned?', 'Mountains and earth', 'Cars', 'Buildings', 'Ships', 'a'),
(414, 78, 'An-Naba', 'What is promised to believers?', 'Punishment', 'Paradise', 'Loss', 'Fear', 'b'),
(415, 78, 'An-Naba', 'What is the warning for disbelievers?', 'Reward', 'Severe punishment', 'Peace', 'Wealth', 'b'),
(416, 79, 'An-Nazi’at', 'What does An-Nazi’at refer to?', 'Those who rest', 'Those who pull out', 'Those who sleep', 'Those who travel', 'b'),
(417, 79, 'An-Nazi’at', 'What is mentioned about resurrection?', 'Denied', 'Sure to happen', 'Optional', 'Unknown', 'b'),
(418, 79, 'An-Nazi’at', 'Who is mentioned as an example?', 'Prophet Musa (A.S)', 'Prophet Isa (A.S)', 'Prophet Nuh (A.S)', 'Prophet Ibrahim (A.S)', 'a'),
(419, 79, 'An-Nazi’at', 'What is the main theme?', 'Judgment Day', 'Trade', 'Travel', 'Science', 'a'),
(420, 79, 'An-Nazi’at', 'What happens to disbelievers?', 'Reward', 'Punishment', 'Peace', 'Wealth', 'b'),
(421, 80, 'Abasa', 'What does Abasa mean?', 'He smiled', 'He frowned', 'He cried', 'He spoke', 'b'),
(422, 80, 'Abasa', 'Who is the Surah referring to?', 'Prophet Musa (A.S)', 'Prophet Muhammad (PBUH)', 'Prophet Isa (A.S)', 'Prophet Nuh (A.S)', 'b'),
(423, 80, 'Abasa', 'What lesson is given?', 'Equality in guidance', 'Trade', 'War', 'Travel', 'a'),
(424, 80, 'Abasa', 'Who came seeking guidance?', 'Rich man', 'Blind companion', 'King', 'Soldier', 'b'),
(425, 80, 'Abasa', 'What is emphasized?', 'Importance of Quran', 'Wealth', 'Power', 'Food', 'a'),
(426, 80, 'Abasa', 'Which important lesson is highlighted in Surah Abasa regarding seeking guidance?', 'Wealth is priority', 'All humans are equal in seeking guidance', 'Only leaders matter', 'Only rich people matter', 'b'),
(427, 80, 'Abasa', 'Who is being gently corrected in this Surah?', 'Prophet Musa (A.S)', 'Prophet Muhammad (PBUH)', 'Prophet Isa (A.S)', 'Prophet Nuh (A.S)', 'b'),
(428, 80, 'Abasa', 'What group of people came seeking knowledge in this Surah?', 'Rich leaders', 'Blind companion and poor believers', 'Kings', 'Soldiers', 'b'),
(429, 80, 'Abasa', 'What is emphasized about the Quran?', 'It is for selected people', 'It is a reminder for all', 'It is only for scholars', 'It is optional', 'b'),
(430, 80, 'Abasa', 'What is the main message of Surah Abasa?', 'Equality in dawah', 'Trade rules', 'War strategy', 'Food laws', 'a'),
(431, 81, 'At-Takwir', 'What does At-Takwir describe?', 'Creation of mountains', 'Events of the Day of Judgment', 'Trade systems', 'Stories of Prophets', 'b'),
(432, 81, 'At-Takwir', 'What will happen to the sun on the Day of Judgment?', 'It will rise normally', 'It will be folded/lose light', 'It will grow bigger', 'It will stop forever', 'b'),
(433, 81, 'At-Takwir', 'What is the main theme of Surah At-Takwir?', 'Science', 'Afterlife reality', 'Travel', 'Trade', 'b'),
(434, 81, 'At-Takwir', 'What is the purpose of this Surah?', 'Entertainment', 'Reminder of Judgment Day', 'History', 'Geography', 'b'),
(435, 81, 'At-Takwir', 'What is emphasized in this Surah?', 'Truth of revelation', 'Wealth', 'Power', 'Food', 'a'),
(436, 82, 'Al-Infitar', 'What does Al-Infitar refer to?', 'Breaking of stars', 'Splitting of sky', 'Opening of earth', 'Flood', 'b'),
(437, 82, 'Al-Infitar', 'What will humans realize on Judgment Day?', 'They are immortal', 'Every deed is recorded', 'They are kings', 'Nothing matters', 'b'),
(438, 82, 'Al-Infitar', 'Who records deeds?', 'Humans', 'Angels', 'Animals', 'Jinn only', 'b'),
(439, 82, 'Al-Infitar', 'What is the main message?', 'Accountability', 'Trade', 'War', 'Travel', 'a'),
(440, 82, 'Al-Infitar', 'What is warned in this Surah?', 'Carelessness', 'Prayer', 'Charity', 'Knowledge', 'a'),
(441, 83, 'Al-Mutaffifin', 'What does Al-Mutaffifin mean?', 'The truthful', 'Those who give full measure', 'Those who cheat in measurement', 'The poor', 'c'),
(442, 83, 'Al-Mutaffifin', 'What is strongly condemned in this Surah?', 'Honesty', 'Cheating in trade', 'Prayer', 'Fasting', 'b'),
(443, 83, 'Al-Mutaffifin', 'Where are the records of evil people kept?', 'Illiyyin', 'Sijjin', 'Heaven', 'Earth', 'b'),
(444, 83, 'Al-Mutaffifin', 'What is reward of righteous people?', 'Hell', 'Paradise', 'Loss', 'Punishment', 'b'),
(445, 83, 'Al-Mutaffifin', 'What is main theme?', 'Justice in business', 'War', 'Science', 'Travel', 'a'),
(446, 84, 'Al-Inshiqaq', 'What does Al-Inshiqaq mean?', 'Gathering', 'Splitting open', 'Traveling', 'Sleeping', 'b'),
(447, 84, 'Al-Inshiqaq', 'What happens to sky on Judgment Day?', 'It remains same', 'It splits open', 'It disappears', 'It becomes earth', 'b'),
(448, 84, 'Al-Inshiqaq', 'What is given to people in their right hand?', 'Punishment', 'Book of deeds (good)', 'Nothing', 'Fire', 'b'),
(449, 84, 'Al-Inshiqaq', 'What is main theme?', 'Accountability', 'Trade', 'War', 'Science', 'a'),
(450, 84, 'Al-Inshiqaq', 'What happens to disbelievers?', 'Reward', 'Severe punishment', 'Peace', 'Wealth', 'b'),
(451, 85, 'Al-Buruj', 'What does Al-Buruj mean?', 'Stars', 'Constellations', 'Mountains', 'Rivers', 'b'),
(452, 85, 'Al-Buruj', 'What historical event is mentioned?', 'People of the cave', 'People of the trench', 'Battle of Badr', 'Flood of Nuh', 'b'),
(453, 85, 'Al-Buruj', 'What happened to believers in trenches?', 'Rewarded', 'Burned for faith', 'Saved immediately', 'Ignored', 'b'),
(454, 85, 'Al-Buruj', 'What is main lesson?', 'Patience in faith', 'Trade', 'Science', 'Travel', 'a'),
(455, 85, 'Al-Buruj', 'What is warned?', 'Oppression', 'Prayer', 'Charity', 'Knowledge', 'a'),
(456, 86, 'At-Tariq', 'What does At-Tariq mean?', 'Morning star', 'Knocker/bright star', 'Moon', 'Sun', 'b'),
(457, 86, 'At-Tariq', 'What is emphasized in this Surah?', 'Human creation', 'Trade', 'War', 'Travel', 'a'),
(458, 86, 'At-Tariq', 'What is every soul guarded by?', 'Animals', 'Angels', 'Humans', 'Kings', 'b'),
(459, 86, 'At-Tariq', 'What is the main theme?', 'Resurrection', 'Trade', 'Science', 'Travel', 'a'),
(460, 86, 'At-Tariq', 'What is Allah’s power shown in?', 'Creation of humans', 'Trade', 'Food', 'War', 'a'),
(461, 87, 'Al-A’la', 'What does Al-A’la mean?', 'The Highest', 'The Lowest', 'The Middle', 'The Strong', 'a'),
(462, 87, 'Al-A’la', 'What is Allah instructed to be glorified in?', 'Only wealth', 'Everything', 'Only war', 'Only food', 'b'),
(463, 87, 'Al-A’la', 'What is main theme?', 'Purification of soul', 'Trade', 'War', 'Science', 'a'),
(464, 87, 'Al-A’la', 'What is better for believers?', 'World only', 'Hereafter', 'Power', 'Money', 'b'),
(465, 87, 'Al-A’la', 'What is reminder given?', 'Allah’s creation', 'Trade', 'Travel', 'Sports', 'a'),
(466, 88, 'Al-Ghashiyah', 'What does Al-Ghashiyah mean?', 'Covering event', 'Peace', 'Light', 'Journey', 'a'),
(467, 88, 'Al-Ghashiyah', 'What happens on Judgment Day?', 'People are divided', 'Nothing', 'Trade increases', 'Earth stops', 'a'),
(468, 88, 'Al-Ghashiyah', 'What is mentioned about heaven?', 'Pain', 'Comfort and joy', 'Fire', 'Darkness', 'b'),
(469, 88, 'Al-Ghashiyah', 'What is main message?', 'Reflection on creation', 'Trade', 'War', 'Science', 'a'),
(470, 88, 'Al-Ghashiyah', 'What is emphasized?', 'Allah’s power', 'Wealth', 'Travel', 'Sports', 'a'),
(471, 89, 'Al-Fajr', 'What does Al-Fajr mean?', 'Night', 'Dawn', 'Evening', 'Midnight', 'b'),
(472, 89, 'Al-Fajr', 'Which قوم is mentioned?', 'Aad and Thamud', 'Romans', 'Persians', 'Greeks', 'a'),
(473, 89, 'Al-Fajr', 'What is warned?', 'Oppression', 'Prayer', 'Charity', 'Knowledge', 'a'),
(474, 89, 'Al-Fajr', 'What happens to soul of righteous?', 'Peaceful return', 'Punishment', 'Loss', 'Fear', 'a'),
(475, 89, 'Al-Fajr', 'What is main theme?', 'Justice', 'Trade', 'Science', 'Travel', 'a'),
(476, 90, 'Al-Balad', 'What does Al-Balad mean?', 'City', 'Country', 'Desert', 'Mountain', 'a'),
(477, 90, 'Al-Balad', 'What struggle is mentioned?', 'No struggle', 'Human life struggle', 'Trade only', 'Travel only', 'b'),
(478, 90, 'Al-Balad', 'What is best action?', 'Helping others', 'Ignoring poor', 'Cheating', 'Fighting', 'a'),
(479, 90, 'Al-Balad', 'What is shown as difficult path?', 'Charity and kindness', 'Sin', 'Trade', 'Travel', 'a'),
(480, 90, 'Al-Balad', 'What is main message?', 'Human responsibility', 'War', 'Science', 'Sports', 'a'),
(481, 91, 'Ash-Shams', 'What natural elements are mentioned in Surah Ash-Shams as signs of Allah’s creation?', 'Mountains and rivers', 'Sun, moon, and earth', 'Animals only', 'Deserts only', 'b'),
(482, 91, 'Ash-Shams', 'What is the main theme of Surah Ash-Shams?', 'Trade system', 'Purification of soul', 'War strategy', 'Travel guidance', 'b'),
(483, 91, 'Ash-Shams', 'What happens to the one who purifies his soul?', 'He succeeds', 'He loses', 'He becomes poor', 'He is punished', 'a'),
(484, 91, 'Ash-Shams', 'What قوم is mentioned who denied their Prophet?', 'Aad', 'Thamud', 'Quraysh', 'Bani Israel', 'b'),
(485, 91, 'Ash-Shams', 'What is the result of corruption of the soul?', 'Success', 'Failure', 'Wealth', 'Power', 'b'),
(486, 92, 'Al-Lail', 'What is the meaning of Al-Lail?', 'Morning', 'Night', 'Evening', 'Daylight', 'b'),
(487, 92, 'Al-Lail', 'What contrast is made in this Surah?', 'Rich and poor', 'Night and day, good and bad deeds', 'War and peace', 'Trade and travel', 'b'),
(488, 92, 'Al-Lail', 'What leads to ease in life according to this Surah?', 'Charity and righteousness', 'Anger', 'Laziness', 'Power', 'a'),
(489, 92, 'Al-Lail', 'What happens to the miser?', 'Success', 'Hardship', 'Peace', 'Wealth', 'b'),
(490, 92, 'Al-Lail', 'What is the main message?', 'Doing good deeds', 'Trade', 'War', 'Science', 'a'),
(491, 93, 'Ad-Duha', 'What does Ad-Duha mean?', 'Night', 'Morning brightness', 'Evening', 'Sunset', 'b'),
(492, 93, 'Ad-Duha', 'What comfort is given to Prophet Muhammad (PBUH)?', 'Allah has left him', 'Allah has not forsaken him', 'He is alone', 'He is lost', 'b'),
(493, 93, 'Ad-Duha', 'What is instructed in this Surah?', 'Be harsh', 'Help orphans', 'Ignore poor', 'Travel only', 'b'),
(494, 93, 'Ad-Duha', 'What is the main message?', 'Hope after difficulty', 'War', 'Trade', 'Science', 'a'),
(495, 93, 'Ad-Duha', 'What should a believer do?', 'Be grateful', 'Be angry', 'Be careless', 'Be silent', 'a'),
(496, 94, 'Ash-Sharh', 'What does Ash-Sharh mean?', 'Difficulty', 'Expansion of chest', 'Fear', 'Pain', 'b'),
(497, 94, 'Ash-Sharh', 'What blessing is given to Prophet (PBUH)?', 'Ease after hardship', 'Only hardship', 'No support', 'Loneliness', 'a'),
(498, 94, 'Ash-Sharh', 'What is repeated in this Surah?', 'With hardship comes ease', 'Only pain exists', 'No relief', 'No hope', 'a'),
(499, 94, 'Ash-Sharh', 'What is instructed after finishing work?', 'Rest', 'Strive harder', 'Sleep', 'Travel', 'b'),
(500, 94, 'Ash-Sharh', 'What is main theme?', 'Hope and relief', 'Trade', 'War', 'Science', 'a'),
(501, 95, 'At-Tin', 'What does At-Tin mean?', 'Fig', 'Olive', 'Fig and Olive', 'Dates', 'c'),
(502, 95, 'At-Tin', 'What creation is mentioned?', 'Mountains', 'Best human creation', 'Stars', 'Oceans', 'b'),
(503, 95, 'At-Tin', 'What happens to those who believe?', 'Reward', 'Punishment', 'Loss', 'Fear', 'a'),
(504, 95, 'At-Tin', 'What is main theme?', 'Human dignity', 'Trade', 'War', 'Travel', 'a'),
(505, 95, 'At-Tin', 'What is warned?', 'Fall of character', 'Health', 'Wealth', 'Science', 'a'),
(506, 96, 'Al-Alaq', 'What was the first word revealed?', 'Pray', 'Read (Iqra)', 'Fast', 'Fight', 'b'),
(507, 96, 'Al-Alaq', 'What is man created from?', 'Fire', 'Blood clot (Alaq)', 'Water', 'Stone', 'b'),
(508, 96, 'Al-Alaq', 'What is warned?', 'Knowledge arrogance', 'Prayer', 'Charity', 'Travel', 'a'),
(509, 96, 'Al-Alaq', 'Who is mentioned as rebellious?', 'Prophet Musa', 'Abu Jahl', 'Prophet Isa', 'Prophet Nuh', 'b'),
(510, 96, 'Al-Alaq', 'What is main message?', 'Seek knowledge', 'War', 'Trade', 'Travel', 'a'),
(511, 97, 'Al-Qadr', 'What is Laylatul Qadr?', 'Night of power', 'Night of fear', 'Night of war', 'Night of trade', 'a'),
(512, 97, 'Al-Qadr', 'Why is this night important?', 'Quran revealed', 'War started', 'Trade increased', 'Travel began', 'a'),
(513, 97, 'Al-Qadr', 'What is better than?', '100 years', '1000 months', '10 years', '1 year', 'b'),
(514, 97, 'Al-Qadr', 'What descends on this night?', 'Angels', 'Animals', 'Humans', 'Fire', 'a'),
(515, 97, 'Al-Qadr', 'What is main message?', 'Value of worship', 'Trade', 'War', 'Science', 'a'),
(516, 98, 'Al-Bayyinah', 'What does Al-Bayyinah mean?', 'Clear proof', 'Darkness', 'War', 'Travel', 'a'),
(517, 98, 'Al-Bayyinah', 'What was sent to guide people?', 'Trade', 'Prophet and Quran', 'Weapons', 'Books only', 'b'),
(518, 98, 'Al-Bayyinah', 'Who are best people?', 'Disbelievers', 'Believers doing good deeds', 'Kings', 'Soldiers', 'b'),
(519, 98, 'Al-Bayyinah', 'What is main theme?', 'Clear guidance', 'Trade', 'War', 'Science', 'a'),
(520, 98, 'Al-Bayyinah', 'What is reward?', 'Hell', 'Paradise', 'Loss', 'Fear', 'b'),
(521, 99, 'Az-Zalzalah', 'What does Az-Zalzalah mean?', 'Peace', 'Earthquake', 'Storm', 'Fire', 'b'),
(522, 99, 'Az-Zalzalah', 'What will earth do on Judgment Day?', 'Speak', 'Remain silent', 'Disappear', 'Break', 'a'),
(523, 99, 'Az-Zalzalah', 'What will humans see?', 'Nothing', 'Their deeds', 'Gold', 'Water', 'b'),
(524, 99, 'Az-Zalzalah', 'What is main theme?', 'Accountability', 'Trade', 'War', 'Travel', 'a'),
(525, 99, 'Az-Zalzalah', 'What happens to smallest good deed?', 'Ignored', 'Shown', 'Deleted', 'Hidden', 'b'),
(526, 100, 'Al-Adiyat', 'What does Al-Adiyat refer to?', 'Camels running fast', 'Horses running fast', 'Ships', 'Birds', 'b'),
(527, 100, 'Al-Adiyat', 'What is man accused of?', 'Gratitude', 'Ingratitude', 'Honesty', 'Faith', 'b'),
(528, 100, 'Al-Adiyat', 'What is exposed?', 'Hidden sins', 'Trade', 'Science', 'Travel', 'a'),
(529, 100, 'Al-Adiyat', 'What is main theme?', 'Human behavior', 'War', 'Trade', 'Science', 'a'),
(530, 100, 'Al-Adiyat', 'What is warned?', 'Accountability', 'Health', 'Wealth', 'Travel', 'a'),
(531, 101, 'Al-Qari’ah', 'What does Al-Qari’ah mean?', 'The Striking Calamity', 'Peace', 'Rain', 'Light', 'a'),
(532, 101, 'Al-Qari’ah', 'What happens on this Day?', 'Mountains become light', 'Mountains become like wool', 'Earth stops', 'Sky burns', 'b'),
(533, 101, 'Al-Qari’ah', 'What determines success?', 'Wealth', 'Good deeds', 'Strength', 'Travel', 'b'),
(534, 101, 'Al-Qari’ah', 'What is main theme?', 'Judgment Day', 'Trade', 'Science', 'War', 'a'),
(535, 101, 'Al-Qari’ah', 'What happens to heavy scales?', 'Loss', 'Success', 'Fear', 'Pain', 'b'),
(536, 102, 'At-Takathur', 'What does At-Takathur mean?', 'Competition in wealth', 'Peace', 'Light', 'War', 'a'),
(537, 102, 'At-Takathur', 'What distracts people?', 'Knowledge', 'Worldly competition', 'Prayer', 'Charity', 'b'),
(538, 102, 'At-Takathur', 'What will humans see in grave?', 'Nothing', 'Hellfire', 'Paradise', 'Dreams', 'b'),
(539, 102, 'At-Takathur', 'What is main warning?', 'Greed', 'Health', 'Travel', 'Science', 'a'),
(540, 102, 'At-Takathur', 'What is asked on Judgment Day?', 'Wealth', 'Blessings', 'Travel', 'Food', 'b'),
(541, 103, 'Al-Asr', 'What does Al-Asr mean?', 'Morning', 'Time', 'Night', 'Day', 'b'),
(542, 103, 'Al-Asr', 'What is human loss condition?', 'Belief and good deeds', 'Except believers doing good', 'Richness', 'Strength', 'b'),
(543, 103, 'Al-Asr', 'What is advised?', 'Patience and truth', 'Anger', 'Trade', 'War', 'a'),
(544, 103, 'Al-Asr', 'What is main message?', 'Time importance', 'War', 'Science', 'Travel', 'a'),
(545, 103, 'Al-Asr', 'Who are saved?', 'Everyone', 'Believers', 'Rich only', 'Soldiers', 'b'),
(546, 104, 'Al-Humazah', 'What does Al-Humazah mean?', 'Backbiter', 'Traveler', 'Believer', 'Warrior', 'a'),
(547, 104, 'Al-Humazah', 'What is punished?', 'Charity', 'Mocking and greed', 'Prayer', 'Knowledge', 'b'),
(548, 104, 'Al-Humazah', 'Where are sinners placed?', 'Paradise', 'Hellfire', 'Earth', 'Sea', 'b'),
(549, 104, 'Al-Humazah', 'What is main theme?', 'Moral behavior', 'Trade', 'Science', 'Travel', 'a'),
(550, 104, 'Al-Humazah', 'What destroys people?', 'Wealth love', 'Prayer', 'Charity', 'Faith', 'a'),
(551, 105, 'Al-Fil', 'What does Al-Fil mean?', 'Camel', 'Elephant', 'Horse', 'Lion', 'b'),
(552, 105, 'Al-Fil', 'What army is mentioned?', 'Persians', 'Abraha’s army', 'Romans', 'Greeks', 'b'),
(553, 105, 'Al-Fil', 'How was army destroyed?', 'Storm', 'Birds with stones', 'Flood', 'Fire', 'b'),
(554, 105, 'Al-Fil', 'What is main lesson?', 'Allah’s power', 'Trade', 'War', 'Science', 'a'),
(555, 105, 'Al-Fil', 'What was protected?', 'Palace', 'Kaaba', 'City', 'River', 'b'),
(556, 106, 'Quraysh', 'What does Quraysh refer to?', 'Tribe of Makkah', 'River', 'Mountain', 'City', 'a'),
(557, 106, 'Quraysh', 'What blessing is mentioned?', 'Trade journeys', 'War', 'Science', 'Travel', 'a'),
(558, 106, 'Quraysh', 'Who should they worship?', 'Idols', 'Allah', 'Kings', 'Animals', 'b'),
(559, 106, 'Quraysh', 'What is main theme?', 'Gratitude', 'War', 'Science', 'Trade', 'a'),
(560, 106, 'Quraysh', 'What is reminder?', 'Food', 'Security and provision', 'Weapons', 'Gold', 'b'),
(561, 107, 'Al-Ma’un', 'What does Al-Ma’un mean?', 'Charity goods', 'Food', 'War', 'Light', 'a'),
(562, 107, 'Al-Ma’un', 'Who is criticized?', 'Believers', 'Those who deny charity and prayer', 'Prophets', 'Angels', 'b'),
(563, 107, 'Al-Ma’un', 'What is sign of hypocrisy?', 'Prayer and help', 'Neglect of orphans', 'Knowledge', 'Travel', 'b'),
(564, 107, 'Al-Ma’un', 'What is main theme?', 'Social responsibility', 'Trade', 'War', 'Science', 'a'),
(565, 107, 'Al-Ma’un', 'What is warned?', 'Ignoring poor', 'Prayer', 'Charity', 'Faith', 'a'),
(566, 108, 'Al-Kawthar', 'What does Al-Kawthar mean?', 'River in Paradise', 'War', 'Mountain', 'Light', 'a'),
(567, 108, 'Al-Kawthar', 'What is given to Prophet Muhammad (PBUH)?', 'Enemy', 'Abundance of good', 'Loss', 'Fear', 'b'),
(568, 108, 'Al-Kawthar', 'What is instructed?', 'Prayer and sacrifice', 'Trade', 'War', 'Travel', 'a'),
(569, 108, 'Al-Kawthar', 'What happens to enemies?', 'Reward', 'Cut off from good', 'Peace', 'Wealth', 'b'),
(570, 108, 'Al-Kawthar', 'What is main theme?', 'Blessings', 'Trade', 'War', 'Science', 'a'),
(571, 109, 'Al-Kafirun', 'What does Al-Kafirun mean?', 'Believers', 'Disbelievers', 'Warriors', 'Travelers', 'b'),
(572, 109, 'Al-Kafirun', 'What is message?', 'No compromise in faith', 'Trade', 'War', 'Science', 'a'),
(573, 109, 'Al-Kafirun', 'What is declared?', 'Unity of religion', 'Clear separation of belief', 'Trade', 'Travel', 'b'),
(574, 109, 'Al-Kafirun', 'Who is addressed?', 'Muslims', 'Disbelievers', 'Kings', 'Soldiers', 'b'),
(575, 109, 'Al-Kafirun', 'What is emphasized?', 'Faith clarity', 'Wealth', 'War', 'Science', 'a'),
(576, 110, 'An-Nasr', 'What does An-Nasr mean?', 'Help', 'Victory', 'Peace', 'Light', 'b'),
(577, 110, 'An-Nasr', 'What event is mentioned?', 'Migration', 'Conquest of Makkah', 'War', 'Trade', 'b'),
(578, 110, 'An-Nasr', 'What should people do after victory?', 'Be proud', 'Praise Allah', 'Fight', 'Travel', 'b'),
(579, 110, 'An-Nasr', 'What is main message?', 'Humility', 'Trade', 'War', 'Science', 'a'),
(580, 110, 'An-Nasr', 'What is sign of completion?', 'Death', 'Victory and forgiveness', 'Loss', 'Fear', 'b'),
(581, 111, 'Al-Masad', 'Who is condemned in this Surah?', 'Abu Lahab', 'Abu Bakr', 'Umar', 'Ali', 'a'),
(582, 111, 'Al-Masad', 'What is his punishment?', 'Reward', 'Burning fire', 'Peace', 'Wealth', 'b'),
(583, 111, 'Al-Masad', 'Who is mentioned with him?', 'Wife', 'Son', 'Friend', 'Soldier', 'a'),
(584, 111, 'Al-Masad', 'What is main theme?', 'Opposition to truth', 'Trade', 'Science', 'Travel', 'a'),
(585, 111, 'Al-Masad', 'What is warned?', 'Evil actions', 'Prayer', 'Charity', 'Knowledge', 'a'),
(586, 112, 'Al-Ikhlas', 'What does Al-Ikhlas mean?', 'Sincerity', 'Truth', 'War', 'Light', 'a'),
(587, 112, 'Al-Ikhlas', 'What concept is explained?', 'Prophethood', 'Oneness of Allah', 'Trade', 'Travel', 'b'),
(588, 112, 'Al-Ikhlas', 'Allah is described as?', 'Many gods', 'One and eternal', 'Human', 'Angel', 'b'),
(589, 112, 'Al-Ikhlas', 'What is main theme?', 'Tawheed', 'War', 'Trade', 'Science', 'a'),
(590, 112, 'Al-Ikhlas', 'How important is this Surah?', 'Low', 'Equal to one-third Quran', 'None', 'Optional', 'b'),
(591, 113, 'Al-Falaq', 'What does Al-Falaq mean?', 'Dawn', 'Night', 'Light', 'Storm', 'a'),
(592, 113, 'Al-Falaq', 'What is protection asked from?', 'Good', 'Evil of creation', 'Success', 'Knowledge', 'b'),
(593, 113, 'Al-Falaq', 'What should be avoided?', 'Charity', 'Dark magic and envy', 'Prayer', 'Faith', 'b'),
(594, 113, 'Al-Falaq', 'What is main theme?', 'Protection', 'Trade', 'War', 'Science', 'a'),
(595, 113, 'Al-Falaq', 'Who is sought for protection?', 'Humans', 'Allah', 'Kings', 'Angels', 'b'),
(596, 114, 'An-Nas', 'What does An-Nas mean?', 'Angels', 'Mankind', 'Jinn', 'Animals', 'b'),
(597, 114, 'An-Nas', 'Protection is sought from?', 'Humans', 'Whisperer (Shaytan)', 'Kings', 'Fire', 'b'),
(598, 114, 'An-Nas', 'What is main danger?', 'Wealth', 'Evil whispers', 'Travel', 'Trade', 'b'),
(601, 0, 'An-Nas', 'What does Surah An-Nas teach us to seek protection from Allah against?', 'Worldly problems', 'Magic, whispers, and the evil of Satan', 'Diseases', 'Lack of wealth', 'b');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_results`
--

CREATE TABLE `quiz_results` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `surah_id` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `percentage` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_results`
--

INSERT INTO `quiz_results` (`id`, `user_id`, `surah_id`, `score`, `total`, `percentage`, `created_at`) VALUES
(1, 1, 1, 0, 3, 0, '2026-04-27 16:28:22'),
(2, 1, 1, 0, 3, 0, '2026-04-27 16:28:59'),
(3, 1, 2, 0, 3, 0, '2026-04-27 16:33:50'),
(4, 1, 5, 0, 10, 0, '2026-04-27 16:53:21'),
(5, 1, 4, 10, 10, 100, '2026-04-27 16:54:03'),
(6, 1, 5, 4, 10, 40, '2026-04-27 16:54:52'),
(7, 1, 114, 13, 20, 65, '2026-04-28 10:34:19'),
(8, 1, 1, 0, 10, 0, '2026-04-29 15:06:31'),
(9, 1, 1, 3, 10, 30, '2026-04-29 15:08:07'),
(10, 1, 67, 7, 10, 70, '2026-04-29 15:22:38'),
(11, 1, 56, 10, 10, 100, '2026-04-29 15:23:42'),
(12, 1, 6, 0, 10, 0, '2026-04-30 02:42:40'),
(13, 1, 4, 0, 10, 0, '2026-04-30 02:43:28'),
(14, 1, 3, 0, 10, 0, '2026-04-30 02:49:27'),
(15, 1, 2, 1, 10, 10, '2026-04-30 02:51:14'),
(16, 1, 2, 0, 10, 0, '2026-04-30 02:53:29'),
(17, 1, 3, 10, 10, 100, '2026-04-30 02:58:16'),
(18, 1, 3, 10, 10, 100, '2026-04-30 03:17:34'),
(19, 1, 3, 10, 10, 100, '2026-04-30 03:22:19'),
(20, 1, 1, 7, 10, 70, '2026-04-30 03:25:48'),
(21, 16, 1, 7, 10, 70, '2026-04-30 03:27:54'),
(22, 1, 3, 0, 10, 0, '2026-05-02 09:25:50'),
(23, 1, 10, 0, 10, 0, '2026-05-02 09:25:59'),
(24, 1, 34, 10, 10, 100, '2026-05-02 10:46:34'),
(25, 19, 2, 4, 10, 40, '2026-05-02 14:56:50'),
(26, 19, 2, 8, 10, 80, '2026-05-02 15:01:00'),
(27, 16, 1, 4, 5, 80, '2026-05-02 23:21:03'),
(28, 16, 2, 4, 5, 80, '2026-05-02 23:21:32'),
(29, 26, 76, 4, 5, 80, '2026-05-03 18:24:36');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(20) DEFAULT 'user',
  `is_premium` int(11) DEFAULT 0,
  `country` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`, `is_premium`, `country`, `city`) VALUES
(1, 'Noor', '', '1234!Noor', 'user', 1, 'India', 'Lahore'),
(3, 'Noor E Sehar', 'admin123@gmail.com', 'Noor!1234', 'admin', 0, NULL, NULL),
(16, 'Fatima', 'fshazadi006@gmail.com', 'fsfs$2424', 'user', 1, NULL, NULL),
(19, 'abdullah', 'ab123@gmail.com', '123$mnopqr', 'user', 1, NULL, NULL),
(20, 'Noor E Sehar', 'abc@gmail.com', '1234!Noor', 'user', 0, 'Pakistan', 'Lahore'),
(21, 'noor', 'xnjsknck@gmail.com', 'mm', 'user', 0, 'Pakistan', 'Lahore'),
(23, 'noor', 'habib@gmail.com', 'fsfs$2424', 'user', 0, 'Pakistan', 'Karachi'),
(24, 'Fatima', 'nooreehar@gmail.com', 'abcdef', 'user', 0, NULL, NULL),
(25, 'fatima', 'admin786@gmail.com', 'Noor!1234', 'user', 0, 'Pakistan', 'Unknown'),
(26, 'abdulmoiz', 'mnopq@gmail.com', '786!abcio', 'user', 1, 'Pakistan', 'Karachi'),
(27, 'Fatima Shazadi', 'dmin123@gmail.com', 'Noor!1234', 'user', 1, 'Pakistan', 'Lahore');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hadiths`
--
ALTER TABLE `hadiths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hadiths`
--
ALTER TABLE `hadiths`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=603;

--
-- AUTO_INCREMENT for table `quiz_results`
--
ALTER TABLE `quiz_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
