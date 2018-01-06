-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 06, 2018 at 12:18 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saelaqoo_lsmain`
--

-- --------------------------------------------------------

--
-- Table structure for table `MY_access`
--

CREATE TABLE `MY_access` (
  `id` int(25) NOT NULL,
  `Username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `allow` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'y',
  `logged_in` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'y',
  `agent` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'User agnet',
  `type` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `MY_files`
--

CREATE TABLE `MY_files` (
  `id` int(25) NOT NULL,
  `Username` varchar(128) NOT NULL,
  `type` varchar(128) NOT NULL COMMENT 'Directory, notebook, diary or file',
  `name` varchar(128) NOT NULL,
  `diary_type` varchar(128) NOT NULL COMMENT 'Diary event type',
  `diary_date` varchar(128) NOT NULL COMMENT 'Diary event date',
  `diary_reminder` varchar(10) NOT NULL,
  `diary_priority` varchar(128) NOT NULL COMMENT 'Diary event priority',
  `diary_fore_color` varchar(32) NOT NULL,
  `header` longtext NOT NULL,
  `html` longtext NOT NULL COMMENT 'Content',
  `footer` longtext NOT NULL,
  `file_url` longtext NOT NULL,
  `file_type` longtext NOT NULL,
  `file_size` varchar(128) NOT NULL,
  `fav` varchar(11) NOT NULL DEFAULT 'n' COMMENT 'Show on desktop',
  `icon` longtext NOT NULL COMMENT 'Icona',
  `create_date` varchar(128) NOT NULL,
  `last_view` varchar(128) NOT NULL,
  `last_edit` varchar(128) NOT NULL,
  `folder` varchar(25) NOT NULL DEFAULT '/' COMMENT 'In which directory it is saved',
  `trash` varchar(2) NOT NULL,
  `delete_date` varchar(19) NOT NULL,
  `correct_username` varchar(128) NOT NULL,
  `correct_date` varchar(16) NOT NULL,
  `correct_note` longtext NOT NULL COMMENT 'Teacher corrections note',
  `correct_header` longtext NOT NULL,
  `correct_html` longtext NOT NULL COMMENT 'Teacher corrections content',
  `correct_footer` longtext NOT NULL,
  `correct_seen` varchar(11) NOT NULL COMMENT 'Student has seen correction',
  `shared_from` varchar(128) NOT NULL,
  `history` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `MY_messages`
--

CREATE TABLE `MY_messages` (
  `id` int(25) NOT NULL,
  `type` varchar(128) NOT NULL,
  `Sender` varchar(128) NOT NULL,
  `Receiving` longtext NOT NULL,
  `group_id` varchar(11) NOT NULL,
  `subject` varchar(128) NOT NULL,
  `body` longtext NOT NULL,
  `date` varchar(25) NOT NULL,
  `is_read` varchar(25) NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `MY_peoples`
--

CREATE TABLE `MY_peoples` (
  `id` int(25) NOT NULL,
  `Username` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `surname` varchar(128) NOT NULL,
  `saved_username` varchar(128) NOT NULL,
  `group_username` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `MY_share`
--

CREATE TABLE `MY_share` (
  `id` int(25) NOT NULL,
  `Sender` varchar(128) NOT NULL,
  `Receiving` varchar(128) NOT NULL,
  `file_id` int(25) NOT NULL,
  `comment` longtext NOT NULL,
  `share_date` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `MY_timetable`
--

CREATE TABLE `MY_timetable` (
  `id` int(25) NOT NULL,
  `Username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `day_of_week` int(25) NOT NULL,
  `hour_of_day` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `book` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `linked` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `fore_color` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'black',
  `tooltip_color` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `decoration` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `MY_users`
--

CREATE TABLE `MY_users` (
  `UserID` int(25) NOT NULL,
  `name` varchar(128) NOT NULL,
  `surname` varchar(128) NOT NULL,
  `Username` varchar(65) NOT NULL,
  `UsernameMD5` varchar(128) NOT NULL,
  `User_type` varchar(11) NOT NULL DEFAULT 'studente' COMMENT 'Account type',
  `Password` varchar(32) NOT NULL,
  `pwd_changed` varchar(32) NOT NULL COMMENT 'Last password changed',
  `UniKey` longtext NOT NULL,
  `recovery_key` varchar(32) NOT NULL,
  `activation_code` varchar(32) NOT NULL,
  `EmailAddress` varchar(64) NOT NULL,
  `phone_number` varchar(16) NOT NULL,
  `date_of_birth` varchar(16) NOT NULL,
  `sex` varchar(16) NOT NULL,
  `profile_image` varchar(516) NOT NULL DEFAULT 'default',
  `background` longtext NOT NULL,
  `regione` varchar(128) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `accent` varchar(11) NOT NULL DEFAULT '#045FB4',
  `taskbar` text NOT NULL,
  `suspend` varchar(128) NOT NULL DEFAULT 'n',
  `registred_from` longtext NOT NULL,
  `pc` varchar(11) NOT NULL DEFAULT 'y',
  `tablet` varchar(11) NOT NULL DEFAULT 'y',
  `mobile` varchar(11) NOT NULL DEFAULT 'y',
  `send_email_on_access` varchar(11) NOT NULL DEFAULT 'y',
  `access_control` varchar(11) NOT NULL DEFAULT 'y',
  `deactivated` varchar(11) NOT NULL DEFAULT 'n',
  `deleted` varchar(11) NOT NULL DEFAULT 'n' COMMENT 'Is account deleted',
  `event` varchar(11) NOT NULL DEFAULT 'n' COMMENT 'Show new event at login',
  `first_login` varchar(11) NOT NULL DEFAULT 'y',
  `email_new_message` varchar(11) NOT NULL DEFAULT 'y',
  `email_new_mark` varchar(11) NOT NULL DEFAULT 'y',
  `email_new_share` varchar(11) NOT NULL DEFAULT 'y',
  `language` varchar(11) NOT NULL DEFAULT 'it-IT',
  `DOC_subject` varchar(128) NOT NULL,
  `autosave_timer` varchar(11) NOT NULL DEFAULT '300',
  `visible` varchar(11) NOT NULL DEFAULT 'y',
  `visible_email` varchar(11) NOT NULL DEFAULT 'n',
  `visible_school` varchar(11) NOT NULL DEFAULT 'y',
  `block_list` longtext NOT NULL,
  `Services` longtext NOT NULL,
  `OneCardID` varchar(16) NOT NULL,
  `icon_set` varchar(128) NOT NULL DEFAULT 'monochromatic'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `MY_access`
--
ALTER TABLE `MY_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `MY_files`
--
ALTER TABLE `MY_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Username` (`Username`);

--
-- Indexes for table `MY_messages`
--
ALTER TABLE `MY_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `MY_peoples`
--
ALTER TABLE `MY_peoples`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `MY_share`
--
ALTER TABLE `MY_share`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `MY_timetable`
--
ALTER TABLE `MY_timetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `MY_users`
--
ALTER TABLE `MY_users`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `MY_access`
--
ALTER TABLE `MY_access`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1365;
--
-- AUTO_INCREMENT for table `MY_files`
--
ALTER TABLE `MY_files`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2491;
--
-- AUTO_INCREMENT for table `MY_messages`
--
ALTER TABLE `MY_messages`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT for table `MY_peoples`
--
ALTER TABLE `MY_peoples`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `MY_share`
--
ALTER TABLE `MY_share`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `MY_timetable`
--
ALTER TABLE `MY_timetable`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=360;
--
-- AUTO_INCREMENT for table `MY_users`
--
ALTER TABLE `MY_users`
  MODIFY `UserID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
