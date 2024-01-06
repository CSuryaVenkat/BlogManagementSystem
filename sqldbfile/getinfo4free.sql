-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2022 at 01:32 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `getinfo4free`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `AdminUserName` varchar(255) DEFAULT NULL,
  `AdminPassword` varchar(255) DEFAULT NULL,
  `AdminEmailId` varchar(255) DEFAULT NULL,
  `userType` int(11) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `AdminUserName`, `AdminPassword`, `AdminEmailId`, `userType`, `CreationDate`, `UpdationDate`) VALUES
(1, 'admin', 'f925916e2754e5e03f75dd58a5733251', 'notes2free@gmail.com', 1, '2021-05-26 18:30:00', '2021-11-11 16:23:15'),
(3, 'subadmin', 'f925916e2754e5e03f75dd58a5733251', 'notes2freesubdomain@gmail.in', 0, '2021-11-10 18:28:11', NULL),
(4, 'suadmin2', 'f925916e2754e5e03f75dd58a5733251', 'notes2freesubdomain@test.com', 0, '2021-11-10 18:28:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(200) DEFAULT NULL,
  `catslug` varchar(1000) NOT NULL,
  `Description` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Is_Active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `CategoryName`, `catslug`, `Description`, `PostingDate`, `UpdationDate`, `Is_Active`) VALUES
(1, 'Educations and technical blogs', 'Educations-and-technical-blogs', 'deals with the Educations and technical blogs ', '2022-03-24 17:19:04', '2022-03-28 14:06:16', 1),
(2, 'Health and food', 'Health-and-food', 'Health and food ', '2022-03-24 17:19:37', '2022-03-28 14:06:28', 1),
(3, 'Gadgets and Reviews', 'Gadgets-and-Reviews', 'Gadgets and Reviews', '2022-03-24 17:20:05', '2022-03-28 14:06:35', 1),
(4, 'How to and troubleshoot blogs', 'How-to-and-troubleshoot-blogs', 'How to and troubleshoot blogs ', '2022-03-24 17:20:24', '2022-03-28 14:06:43', 1),
(5, 'Travel and entertainment', 'Travel-and-entertainment', 'Travel and entertainment ', '2022-03-24 17:20:36', '2022-03-28 14:06:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcomments`
--

CREATE TABLE `tblcomments` (
  `id` int(11) NOT NULL,
  `postId` int(11) DEFAULT NULL,
  `posturl` varchar(1000) NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `comment` mediumtext DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcomments`
--

INSERT INTO `tblcomments` (`id`, `postId`, `posturl`, `name`, `email`, `comment`, `postingDate`, `status`) VALUES
(17, 6, 'Dbms-project-on-online-inventory-shopping-management-using-php-and-mysql', 'jdhfdgf', 'hfgdhg@gmail.com', 'sdhsjdhsjds', '2022-03-29 06:23:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`id`, `name`, `email`, `comment`, `status`) VALUES
(1, '', 'nikhilk@cronj.com', 'hello macadjhfsjdfh jshj hj hj hjfh jf ', 1),
(2, 'jdahjahasj', 'kdhfjshj@gmail.com', 'kjfeahajhs', 1),
(3, 'sss', 'ss@gmail.com', 'a', 1),
(4, 's', 'Sheris@petcartel.com', 's', 1),
(5, 'Nikhil keshaav', 'nikhilk@cronj.com', 'aaa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `Description` longtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `PageTitle`, `Description`, `PostingDate`, `UpdationDate`) VALUES
(1, 'aboutus', 'About News Portal', '<font color=\"#7b8898\" face=\"Mercury SSm A, Mercury SSm B, Georgia, Times, Times New Roman, Microsoft YaHei New, Microsoft Yahei, å¾®è½¯é›…é»‘, å®‹ä½“, SimSun, STXihei, åŽæ–‡ç»†é»‘, serif\"><span style=\"font-size: 26px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></font><br>', '2021-06-29 18:30:00', '2021-11-06 18:30:00'),
(2, 'contactus', 'Contact Details', '<p><br></p><p><b>Address :&nbsp; </b>New Delhi India</p><p><b>Phone Number : </b>+91 -01234567890</p><p><b>Email -id : </b>notes2free@gmail.com</p>', '2021-06-29 18:30:00', '2021-11-06 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblposts`
--

CREATE TABLE `tblposts` (
  `id` int(11) NOT NULL,
  `PostTitle` longtext DEFAULT NULL,
  `postdes` varchar(2000) NOT NULL,
  `postkeywords` varchar(2000) NOT NULL,
  `authorname` varchar(2000) NOT NULL,
  `authordes` varchar(2000) NOT NULL,
  `cattags` varchar(2000) NOT NULL,
  `hashtags` varchar(2000) NOT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `SubCategoryId` int(11) DEFAULT NULL,
  `PostDetails` longtext CHARACTER SET utf8 DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Is_Active` int(1) DEFAULT NULL,
  `PostUrl` mediumtext DEFAULT NULL,
  `PostImage` varchar(255) DEFAULT NULL,
  `viewCounter` int(11) DEFAULT NULL,
  `postedBy` varchar(255) DEFAULT NULL,
  `lastUpdatedBy` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblposts`
--

INSERT INTO `tblposts` (`id`, `PostTitle`, `postdes`, `postkeywords`, `authorname`, `authordes`, `cattags`, `hashtags`, `CategoryId`, `SubCategoryId`, `PostDetails`, `PostingDate`, `UpdationDate`, `Is_Active`, `PostUrl`, `PostImage`, `viewCounter`, `postedBy`, `lastUpdatedBy`) VALUES
(6, 'Dbms project on online inventory shopping management using php and mysql', 'Dbms project on online inventory shopping management using php and mysql', 'Dbms project on online inventory shopping management using php and mysql', 'nikhil', 'nihkil', 'Dbms project ,on online inventory ,shopping, management ,using php ,and mysql', 'Dbms project ,on online inventory ,shopping, management ,using php ,and mysql', 1, 1, '<p id=\"isPasted\">Online inventory shopping system using PHP and MySQL database where this projects developed by using HTML and CSS, used also used PHP logic to perform front end logic and business logic in the PHP project where on this DBMS project contains the responsive and user-friendly UI and performs the online inventory shopping logic on this, and also used MySQL database for storing the data and performs the logic on the database. we used store procedure and trigger in the backend called MySQL and performs the logic in the database</p><h3>Technology used in the shopping project</h3><p>1. HTML - HTML used in this Page layout has been designed using&nbsp;this and also did the responsive way and all layout be done using HTML or hypertext markup language.<br><br>2. CSS - CSS used for all designed parts in the project and also used for the all responsive design are done in the CSS. were using CSS develops the animation and moving animation and so on.<br><br>3. JAVASCRIPT - All validation and animation propose using javascript where all the logic and validation, and animation is done using javascript and also used jquery also for the online shopping system.<br><br>4. PHP - PHP used on this all the database logic like insert, delete, update, display this is done using the PHP logic and also admin logic are also there the project.<br><br>5. MYSQL - This is used to store the data used in this project and also contains the store procedure and trigger on this project in the database and we store the data from the admin and performed the operation on the user side.<br><br>6. XAMPP or APACHE - a project run over an apache server and used the xampp for this project to run in localhost. example URL http://localhost/online-shopping-php-project.</p><p><br></p><h3>supported operating system for online shopping in php</h3><p>1. window<br>2.linux<br>3.ubantu</p><h3>Cost and technology used in inventory shopping management project</h3><table><thead><tr><th colspan=\"2\">Project Details - contact +91-9964716807</th></tr></thead><tbody><tr><td>project title</td><td>online inventory shopping system using php and mysql</td></tr><tr><td>project type</td><td>mini project or dbms project</td></tr><tr><td>Database used</td><td>Mysql and xampp server</td></tr><tr><td>Project price</td><td>₹ &nbsp;5000 INR</td></tr><tr><td>Project discount</td><td>₹ &nbsp;500 INR</td></tr><tr><td>Final price</td><td>₹ &nbsp;5500 INR</td></tr><tr><td>Documentation</td><td>charges extra cost for documentation for all project</td></tr><tr><td>project setup</td></tr></tbody></table><h3>Project demo</h3>', '2022-03-28 14:53:02', '2022-03-29 10:58:25', 1, 'Dbms-project-on-online-inventory-shopping-management-using-php-and-mysql', '1.sm.webpwebp', 26, 'admin', NULL),
(7, 'tips to crack the Infosys interview process and questions in 2021', 'tips to crack the Infosys interview process and questions in 2021', 'tips to crack the Infosys interview process and questions in 2021', 'tips to crack the Infosys interview process and questions in 2021', 'tips to crack the Infosys interview process and questions in 2021', 'tips to crack, the Infosy,s interview process ,and questions, in, 2021', 'tips to ,crack the Infosys, interview process a,nd questions, in 2,021', 1, 2, '<p id=\"isPasted\" style=\"text-align:justify;\">In 1981, seven engineers started Infosys Limited with just US$250. From the beginning, the company was founded on the principle of building and implementing great ideas that drive progress for clients and enhance lives through enterprise solutions. It has a growing global presence with 242,371 employees.</p><p style=\"text-align:justify;\"><strong>Infosys&nbsp;</strong>is a global leader in next-generation digital services and consulting. Enable clients in 46 countries to navigate their digital transformation. With nearly four decades of experience in managing the systems and workings of global enterprises.</p><p>&nbsp;&nbsp;</p><p style=\"text-align:justify;\">Infosys has also empowered the business with agile digital at scale to deliver unprecedented levels of performance and customer delight. Infosys has 82 sales and marketing offices and 123 development centers across the world as of 31 March 2018, with a major presence in India, United States, China, Australia, Japan, Middle East, and Europe. Since its establishment in 1981 till 2014, the CEOs of Infosys were its promoters, with N.R. Narayana Murthy leading the company in its initial 21 years.</p><p>&nbsp;&nbsp;</p><p style=\"text-align:justify;\">Dr. Vishal Sikka was the first non-promoter CEO of Infosys who worked for around 3 years. Dr. Vishal Sikka resigned in August 2017. In a personal note to board colleagues, Sikka cites a &quot;drumbeat of distractions&quot; and &quot;false, baseless, malicious and increasingly personal attacks&quot; as his reason for leaving Infosys. Many sources suspect this is in reference to a long-running feud with Infosys Founders over the new direction Sikka was reportedly taking Infosys.</p><p>&nbsp;&nbsp;</p><p style=\"text-align:justify;\">After his resignation, UB Pravin Rao was appointed as Interim CEO and MD of Infosys Infosys appointed Salil Parekh chief executive officer (CEO) and managing director (MD) of the company with effect from 2 January 2018 The recruitment and selection process at Infosys is geared towards finding the best match between candidate&rsquo;s test and company requirements.</p><p>&nbsp;&nbsp;</p><p style=\"text-align:justify;\">.Attributes to which the hiring manager looks here are analytical ability, teamwork, leadership skills, communication skills, ability to innovate along with professional competence and academic excellence.</p><h3 style=\"text-align:justify;\">Pros of the company joining</h3><p style=\"text-align:justify;\"><br></p><p style=\"text-align:justify;\">1. Infosys provides the best training that you can ever undergo (My personal Experience). Infosys has made a large training campus at Mysore to train freshers. It provides training on various technologies with excellent study material, well-created PPTs, and online learning tools.</p><p>&nbsp;&nbsp;</p><p style=\"text-align:justify;\">2. Less stressful work so you can learn other technologies side by side if you wish. Infosys provides Good facilities and has a good infrastructure to maximize the use of all possible options.</p><p>&nbsp;&nbsp;</p><p style=\"text-align:justify;\">3. The Work environment is good.</p><p>&nbsp;&nbsp;</p><p style=\"text-align:justify;\">4. Good Onsite Opportunities (If you can survive in Infosys for more than 3-4 Years)Infosys conducts training programs on various new technologies side by side. You can register yourself and learn the new technologies that you want.</p><p>&nbsp;&nbsp;</p><p style=\"text-align:justify;\">5. If you have plans for higher studies then Infosys is good for you. Work pressure is less so you can study and prepare for MBA or MTech and give exams.</p><p>&nbsp;&nbsp;</p><p style=\"text-align:justify;\">6.Finally, the major point is Infosys has a brand value and good fame. It can help you to get a good package in small companies if you are good in your domain.</p><h3 style=\"text-align:justify;\">Cons of infosys</h3><p style=\"text-align:justify;\"><br></p><p style=\"text-align:justify;\">1. Project distribution is random. No matter which technology you are interested in or good at, you will be given a project on a random basis.<br>2. No challenging work to do. No hard coding. If you are a keen coder or love coding, Infosys is not for you. Most projects are on a Support &amp; Maintenance basis.<br>3. Payscale is less fresher as compared to other companies. (On a higher Job level, it is still OK).<br>4. Too much of Variable Pay component.<br>5. You need to read/practice your favorite domain on your own to brush up your skills if you want your career in that domain only. Thus, moving out of Infosys to get a job in your domain in another company.<br>6. You have to maintain average working hours of 9.15 yearly.</p><h4 style=\"text-align:justify;\">Headquarters: Bangalore, Karnataka, India.</h4><p><br></p><h3 style=\"text-align:justify;\"><strong>Interview process of Infosys</strong></h3><p style=\"text-align:justify;\"><br></p><p><br></p><p><br></p><ul><li style=\"text-align:justify;\"><a data-cke-saved-href=\"http://www.notes4free.in/aptitude-preparation/index.html\" href=\"http://www.notes4free.in/aptitude-preparation/index.html\">Aptitude test process</a> -This includes logical reasoning, quantitative ability, and verbal ability. The questions asked are similar to the CAT exams but with lower difficulty levels. This test contains time limits and cutoffs for each. The number of questions in this round contains 65. There is no negative marking attending all the questions is better.</li></ul><p style=\"text-align:justify;\"><br></p><ul><li style=\"text-align:justify;\">Technical interview process - Candidates are generally asked questions based on their CV and their area of interest. Sound knowledge of at least one programming language, information about operating systems, and awareness of the latest emerging technologies are some things that could help you notch up a good score in this round. Questions are asked based on their CV and their area of interest.</li><li style=\"text-align:justify;\">HR interview process- The objective here is to access whether you are a good fit for the company. The question asked here is almost to check your communication and your background. Confident, eye contact is important, be brief in the point of whatever you are going to say. Once you complete this round you will receive results through mail. It takes several weeks to receive an offer letter so be patient.</li></ul><h3 style=\"text-align:justify;\">Infosys Aptitude questions test pattern for the interview process</h3><p><br></p><table><thead><tr><th style=\"text-align:justify;\">Sections</th><th style=\"text-align:justify;\">Topics</th><th style=\"text-align:justify;\">No of questions</th></tr></thead><tbody><tr><td style=\"text-align:justify;\">Logical reasoning</td><td style=\"text-align:justify;\">Data sufficiency, visual reasoning, statement reasoning</td><td style=\"text-align:justify;\">15</td></tr><tr><td style=\"text-align:justify;\"><a data-cke-saved-href=\"http://www.notes4free.in/aptitude-preparation/index.html\" href=\"http://www.notes4free.in/aptitude-preparation/index.html\">Quantitative aptitude</a></td><td style=\"text-align:justify;\">Number series, puzzles, algebra, probability</td><td style=\"text-align:justify;\">10</td></tr><tr><td style=\"text-align:justify;\">Verbal ability</td><td style=\"text-align:justify;\">Fill in the blanks, Synonyms, Antonyms, vocabulary</td><td style=\"text-align:justify;\">40</td></tr></tbody></table><p><br></p><h3 style=\"text-align:justify;\">Percentage criteria and salary in Infosys</h3><p style=\"text-align:justify;\">Min 60% in 10th and 12th, 65% and above in degree for attained to interview process</p><p style=\"text-align:justify;\">Salaray package:1,47,264-11,80,812 a year.</p><h3 style=\"text-align:justify;\">How to apply for the off-campus drive</h3><p style=\"text-align:justify;\">1. Visit the official website www.infosys.com.<br>2. Choose a suitable job role.<br>3. Enter the details correctly.<br>4. Press the submit button.<br>5. Fill details in the registration form and click on submit.<br>6. Please note the reference id and password.<br>7. Note the reference number for further use.</p><h3 style=\"text-align:justify;\">Online Application process:</h3><p style=\"text-align:justify;\">1. Information seminar /career Fairs.<br>2. Apply to the instep.<br>3. Resume is evaluated: Once it reaches the instep team it is evaluated by a committee of specialists.<br>4. Telephonic interview: After having a successful resume evaluation, candidates will be invited to attend a telephonic interview. As the interview will be based on the applicant&#39;s resume, it is advisable to be prepared to discuss all skills, strengths, and experiences mentioned in the resume.<br>5. Shortlisted candidate: Receives an offer letter, Student confirms receipt of the offer letter, Visa Preparation, and Logistics, Arrival Integration.</p>', '2022-03-28 14:54:10', '2022-03-29 07:00:03', 1, 'tips-to-crack-the-Infosys-interview-process-and-questions-in-2021', '2.sm.webpwebp', 13, 'admin', NULL),
(8, 'dbms project on online course registration portal using php and mysql', 'dbms project on online course registration portal using php and mysql', 'dbms project on online course registration portal using php and mysql', 'nikhil', 'dbms project on online course registration portal using php and mysql', 'dbms project ,on online ,course registration ,portal usin,g php a,nd mysql', 'dbms project ,on online ,course registration ,portal usin,g php a,nd mysql', 2, 1, '<p id=\"isPasted\" style=\"text-align:justify;\"><strong>Online course registration portal using PHP and MySQL</strong> where in this project contains 2 modules <strong>1. admin portal and 2. student portal</strong> where admin portal admin can manage the student&#39;s details, add courses, add department and students details in the admin portal and also admin can add and delete or update the studends details of the students, and second on user portal were in this students should log in by there register the name and after register users get an update password option where students can update the details in online student <strong>course registration portal using PHP</strong> and mysql and after the open, the online portal users can enrol the there courses in the portal and also update their session and other details of the student for more info... see the demo video below given in online course registration DBMS project</p><h3 style=\"text-align:justify;\">Technology used in the online course registeration project</h3><p style=\"text-align:justify;\"><br></p><p style=\"text-align:justify;\">1.&nbsp;<strong>HTML&nbsp;</strong>- HTML used in this Page layout has been designed using&nbsp;this and also did the responsive way and all layout be done using HTML or hypertext markup language.<br><br>2. CSS - CSS used for all designed parts in the project and also used for the all responsive design are done in the CSS. were using CSS develops the animation and moving animation and so on.<br><br>3. JAVASCRIPT - All validation and animation propose using javascript where all the logic and validation, and animation is done using javascript and also used jquery also for the online shopping system.<br><br>4.<strong>&nbsp;PHP</strong> - PHP used on this all the database logic like insert, delete, update, display this is done using the PHP logic and also admin logic are also there the project.<br><br>5.&nbsp;<strong>MYSQL</strong> - This is used to store the data used in this project and also contains the store procedure and trigger on this project in the database and we store the data from the admin and performed the operation on the user side.<br><br>6. XAMPP or APACHE - a project run over an apache server and used the xampp for this project to run in localhost. example URL http://localhost/online-course.</p><p style=\"text-align:justify;\"><br></p><h3 style=\"text-align:justify;\">supported operating system for online course registation in php</h3><p style=\"text-align:justify;\">1. window<br>2.linux<br>3.ubantu</p><h3 style=\"text-align:justify;\">Cost and technology used in course registration project</h3><table><thead><tr><th colspan=\"2\" style=\"text-align:justify;\">Project Details- contact - +91 9964716807</th></tr></thead><tbody><tr><td style=\"text-align:justify;\">project title</td><td style=\"text-align:justify;\">DBMS project on online course registration using php and mysql</td></tr><tr><td style=\"text-align:justify;\">project type</td><td style=\"text-align:justify;\">mini project or DBMS project</td></tr><tr><td style=\"text-align:justify;\">Database used</td><td style=\"text-align:justify;\">Mysql and xampp server</td></tr><tr><td style=\"text-align:justify;\">Project price</td><td style=\"text-align:justify;\">₹ 3500 INR</td></tr><tr><td style=\"text-align:justify;\">Project discount</td><td style=\"text-align:justify;\">₹ 500 INR</td></tr><tr><td style=\"text-align:justify;\">Final price</td><td style=\"text-align:justify;\">₹ 3000 INR</td></tr><tr><td style=\"text-align:justify;\">Documentation</td><td style=\"text-align:justify;\">charges extra cost for documentation for all project</td></tr><tr><td style=\"text-align:justify;\">project setup</td><td style=\"text-align:justify;\">free</td></tr><tr><td style=\"text-align:justify;\">Helpline center</td><td style=\"text-align:justify;\">+91-9964716807</td></tr></tbody></table><h3 style=\"text-align:justify;\">Project demo</h3>', '2022-03-28 14:55:15', '2022-03-29 06:13:47', 1, 'dbms-project-on-online-course-registration-portal-using-php-and-mysql', '3.sm.webpwebp', 7, 'admin', NULL),
(9, 'Infosys Off campus drive for MCA,MSc ,B.E and B.tech', 'Infosys Off campus drive for MCA,MSc ,B.E and B.tech', 'Infosys Off campus drive for MCA,MSc ,B.E and B.tech', 'Infosys Off campus drive for MCA,MSc ,B.E and B.tech', 'Infosys Off campus drive for MCA,MSc ,B.E and B.tech', 'Infosys, Off campus ,drive for, MCA,MSc ,B.E and B.tech', 'Infosys, Off campus ,drive for, MCA,MSc ,B.E and B.tech', 2, 4, '<p id=\"isPasted\">One of the leading Information Technology organizations i.e. Infosys currently hiring as a Freshers recruitment drive 2021 under all department of Engineering Graduates of 2021-2022&nbsp;batch and also BSc, MSc, and so on from various streams who are aspiring to launch a dynamic career in the engineering industry with Infosys in Karnataka. to clarify kindly read on for further information regarding who we are looking for, eligibility criteria and application guidelines for Jobs in Infosys technology.</p><p><br></p><p><br></p><p>Selection Process:</p><ul><li>Written Test (Aptitude and Programming)&nbsp;</li><li>Technical Interview on air</li><li>&nbsp;HR Interview &nbsp;</li></ul><p><br></p><p>Education</p><ul><li>10th Standard &ndash; Pass</li><li>&nbsp;Diploma &ndash; Pass &bull; 12th Standard &ndash; Pass</li><li>Graduation &ndash; Pass is required to get apply. Qualification</li></ul><p>&nbsp;All Arts, Science, Commerce and Engineering Graduates Jobs near me who have some IT skills or looking for a career in IT sectors.</p><p><br></p><p><a data-cke-saved-href=\"https://surveys.infosysapps.com/r/a/Fresherrecruitment_NEG_Eref\" href=\"https://surveys.infosysapps.com/r/a/Fresherrecruitment_NEG_Eref\">https://surveys.infosysapps.com/r/a/Fresherrecruitment_NEG_Eref</a></p><p>Infosys off campus drive for BCA and Bsc Last date September 19<br><br></p><p><a data-cke-saved-href=\"https://surveys.infosysapps.com/r/a/Infosys_DSE_SP\" href=\"https://surveys.infosysapps.com/r/a/Infosys_DSE_SP\">https://surveys.infosysapps.com/r/a/Infosys_DSE_SP</a></p><p>Infosys Off-campus drive for MCA, MSc, B.E, and B.tech &nbsp;Last date September 26th</p><p><br></p><p><br></p>', '2022-03-28 14:57:02', '2022-03-29 08:13:11', 1, 'Infosys-Off-campus-drive-for-MCA,MSc-,B.E-and-B.tech', '4.sm.webpwebp', 26, 'admin', NULL),
(10, 'Infosys Off campus drive for MCA,MSc ,B.E and B.tech', 'Infosys Off campus drive for MCA,MSc ,B.E and B.tech', 'Infosys Off campus drive for MCA,MSc ,B.E and B.tech', 'Infosys Off campus drive for MCA,MSc ,B.E and B.tech', 'Infosys Off campus drive for MCA,MSc ,B.E and B.tech', 'Infosys Off campus drive for MCA,MSc ,B.E and B.tech', 'Infosys Off campus drive for MCA,MSc ,B.E and B.tech', 3, 5, '<p id=\"isPasted\">One of the leading Information Technology organizations i.e. Infosys currently hiring as a Freshers recruitment drive 2021 under all department of Engineering Graduates of 2021-2022&nbsp;batch and also BSc, MSc, and so on from various streams who are aspiring to launch a dynamic career in the engineering industry with Infosys in Karnataka. to clarify kindly read on for further information regarding who we are looking for, eligibility criteria and application guidelines for Jobs in Infosys technology.</p><p><br></p><p><br></p><p>Selection Process:</p><ul><li>Written Test (Aptitude and Programming)&nbsp;</li><li>Technical Interview on air</li><li>&nbsp;HR Interview &nbsp;</li></ul><p><br></p><p>Education</p><ul><li>10th Standard &ndash; Pass</li><li>&nbsp;Diploma &ndash; Pass &bull; 12th Standard &ndash; Pass</li><li>Graduation &ndash; Pass is required to get apply. Qualification</li></ul><p>&nbsp;All Arts, Science, Commerce and Engineering Graduates Jobs near me who have some IT skills or looking for a career in IT sectors.</p><p><br></p><p><a data-cke-saved-href=\"https://surveys.infosysapps.com/r/a/Fresherrecruitment_NEG_Eref\" href=\"https://surveys.infosysapps.com/r/a/Fresherrecruitment_NEG_Eref\">https://surveys.infosysapps.com/r/a/Fresherrecruitment_NEG_Eref</a></p><p>Infosys off campus drive for BCA and Bsc Last date September 19<br><br></p><p><a data-cke-saved-href=\"https://surveys.infosysapps.com/r/a/Infosys_DSE_SP\" href=\"https://surveys.infosysapps.com/r/a/Infosys_DSE_SP\">https://surveys.infosysapps.com/r/a/Infosys_DSE_SP</a></p><p>Infosys Off-campus drive for MCA, MSc, B.E, and B.tech &nbsp;Last date September 26th</p><p><br></p><p><br></p>', '2022-03-28 14:57:51', '2022-03-29 08:13:11', 1, 'Infosys-Off-campus-drive-for-MCA,MSc-,B.E-and-B.tech', '5.sm.webpwebp', 26, 'admin', NULL),
(11, 'Aptitude test practices on Average', 'Aptitude test practices on Average', 'Aptitude test practices on Average', 'Aptitude test practices on Average', 'Aptitude test practices on Average', 'Aptitude test practices on Average', 'Aptitude test practices on Average', 3, 6, '<p id=\"isPasted\">One of the leading Information Technology organizations i.e. Infosys currently hiring as a Freshers recruitment drive 2021 under all department of Engineering Graduates of 2021-2022&nbsp;batch and also BSc, MSc, and so on from various streams who are aspiring to launch a dynamic career in the engineering industry with Infosys in Karnataka. to clarify kindly read on for further information regarding who we are looking for, eligibility criteria and application guidelines for Jobs in Infosys technology.</p><p><br></p><p><br></p><p>Selection Process:</p><ul><li>Written Test (Aptitude and Programming)&nbsp;</li><li>Technical Interview on air</li><li>&nbsp;HR Interview &nbsp;</li></ul><p><br></p><p>Education</p><ul><li>10th Standard &ndash; Pass</li><li>&nbsp;Diploma &ndash; Pass &bull; 12th Standard &ndash; Pass</li><li>Graduation &ndash; Pass is required to get apply. Qualification</li></ul><p>&nbsp;All Arts, Science, Commerce and Engineering Graduates Jobs near me who have some IT skills or looking for a career in IT sectors.</p><p><br></p><p><a data-cke-saved-href=\"https://surveys.infosysapps.com/r/a/Fresherrecruitment_NEG_Eref\" href=\"https://surveys.infosysapps.com/r/a/Fresherrecruitment_NEG_Eref\">https://surveys.infosysapps.com/r/a/Fresherrecruitment_NEG_Eref</a></p><p>Infosys off campus drive for BCA and Bsc Last date September 19<br><br></p><p><a data-cke-saved-href=\"https://surveys.infosysapps.com/r/a/Infosys_DSE_SP\" href=\"https://surveys.infosysapps.com/r/a/Infosys_DSE_SP\">https://surveys.infosysapps.com/r/a/Infosys_DSE_SP</a></p><p>Infosys Off-campus drive for MCA, MSc, B.E, and B.tech &nbsp;Last date September 26th</p><p><br></p><p><br></p>', '2022-03-28 14:58:34', '2022-03-29 09:20:37', 1, 'Aptitude-test-practices-on-Average', '3.sm.webpwebp', 12, 'admin', NULL),
(12, 'Aptitude test practices on Average', 'Aptitude test practices on Average', 'Aptitude test practices on Average', 'Aptitude test practices on Average', 'Aptitude test practices on Average', 'Aptitude test practices on Average', 'Aptitude test practices on Average', 4, 7, '<p>Aptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on Average</p><p><br></p><p><br></p><p>Aptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on Average</p><p><br></p><p>Aptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on Average</p><p><br></p><p>Aptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on Average</p>', '2022-03-28 14:59:18', '2022-03-29 09:20:37', 1, 'Aptitude-test-practices-on-Average', '2.sm.webpwebp', 12, 'admin', NULL),
(13, 'How to Use WebP Images on WordPress', 'How to Use WebP Images on WordPress', 'How to Use WebP Images on WordPress', 'How to Use WebP Images on WordPress', 'How to Use WebP Images on WordPress', 'How to Use WebP Images on WordPress', 'How to Use WebP Images on WordPress', 4, 8, '<p>How to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPress</p><p><br></p><p><br></p><p>How to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPress</p><p><br></p><p><br></p><p>How to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPress</p><p><br></p><p>How to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPressHow to Use WebP Images on WordPress</p>', '2022-03-28 15:00:08', '2022-03-29 02:56:39', 1, 'How-to-Use-WebP-Images-on-WordPress', '5.sm.webpwebp', 3, 'admin', NULL),
(14, 'Using WebP Images', 'Using WebP Images', 'Using WebP Images', 'Using WebP Images', 'Using WebP Images', 'Using WebP Images', 'Using WebP Images', 4, 8, '<p>Using WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP Images</p><p>Using WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP Images</p><p>Using WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP ImagesUsing WebP Images</p>', '2022-03-28 15:00:51', '2022-03-29 03:05:08', 1, 'Using-WebP-Images', '1.sm.webpwebp', 3, 'admin', NULL),
(15, 'Aptitude test practices on Average', 'Aptitude test practices on Average', 'Aptitude test practices on Average', 'Aptitude test practices on Average', 'Aptitude test practices on Average', 'Aptitude test practices on Average', 'Aptitude test practices on Average', 5, 9, '<p>Aptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on Average</p>', '2022-03-28 15:29:17', '2022-03-29 09:20:37', 1, 'Aptitude-test-practices-on-Average', '5.sm.webpwebp', 12, 'admin', NULL),
(16, 'Aptitude test practices on Average', 'Aptitude test practices on Average', 'Aptitude test practices on Average', 'Aptitude test practices on Average', 'Aptitude test practices on Average', 'Aptitude test practices on Average', 'Aptitude test practices on Average', 5, 10, '<p>Aptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on AverageAptitude test practices on Average</p>', '2022-03-28 15:29:54', '2022-03-29 09:20:37', 1, 'Aptitude-test-practices-on-Average', '1.sm.webpwebp', 12, 'admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubcategory`
--

CREATE TABLE `tblsubcategory` (
  `SubCategoryId` int(11) NOT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `Subcategory` varchar(255) DEFAULT NULL,
  `SubCatDescription` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Is_Active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubcategory`
--

INSERT INTO `tblsubcategory` (`SubCategoryId`, `CategoryId`, `Subcategory`, `SubCatDescription`, `PostingDate`, `UpdationDate`, `Is_Active`) VALUES
(1, 1, 'Educations blogs ', 'Educations blogs ', '2022-03-24 17:22:38', NULL, 1),
(2, 1, 'Technical Blogs ', 'Technical Blogs ', '2022-03-24 17:22:49', NULL, 1),
(3, 2, 'Health blogs ', 'Health blogs ', '2022-03-24 17:23:05', NULL, 1),
(4, 2, 'Food related blogs ', 'Food related blogs ', '2022-03-24 17:23:17', NULL, 1),
(5, 3, 'Gadgets blogs ', 'Gadgets blogs ', '2022-03-24 17:23:28', NULL, 1),
(6, 3, 'Products review blogs ', 'Products review blogs ', '2022-03-24 17:23:39', NULL, 1),
(7, 4, 'How to Blogs ', 'How to Blogs ', '2022-03-24 17:24:25', NULL, 1),
(8, 4, 'troubleshoots blogs ', 'troubleshoots blogs ', '2022-03-24 17:24:40', NULL, 1),
(9, 5, 'Travel Blogs ', 'Travel Blogs ', '2022-03-24 17:24:50', NULL, 1),
(10, 5, 'Entertainment blogs ', 'Entertainment blogs ', '2022-03-24 17:25:05', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `AdminUserName` (`AdminUserName`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcomments`
--
ALTER TABLE `tblcomments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `postId` (`postId`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblposts`
--
ALTER TABLE `tblposts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `postcatid` (`CategoryId`),
  ADD KEY `postsucatid` (`SubCategoryId`),
  ADD KEY `subadmin` (`postedBy`);

--
-- Indexes for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  ADD PRIMARY KEY (`SubCategoryId`),
  ADD KEY `catid` (`CategoryId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblcomments`
--
ALTER TABLE `tblcomments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblposts`
--
ALTER TABLE `tblposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  MODIFY `SubCategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblcomments`
--
ALTER TABLE `tblcomments`
  ADD CONSTRAINT `pid` FOREIGN KEY (`postId`) REFERENCES `tblposts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblposts`
--
ALTER TABLE `tblposts`
  ADD CONSTRAINT `postcatid` FOREIGN KEY (`CategoryId`) REFERENCES `tblcategory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `postsucatid` FOREIGN KEY (`SubCategoryId`) REFERENCES `tblsubcategory` (`SubCategoryId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `subadmin` FOREIGN KEY (`postedBy`) REFERENCES `tbladmin` (`AdminUserName`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  ADD CONSTRAINT `catid` FOREIGN KEY (`CategoryId`) REFERENCES `tblcategory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
