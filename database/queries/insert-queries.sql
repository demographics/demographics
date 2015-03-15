INSERT INTO `COMMUNITY` (`id`, `name`) VALUES
(1, 'Nicosia'),
(2, 'Fterikoudin');

INSERT INTO `MEMBER` (`id`, `firstname`, `lastname`, `email`, `birthday`, `gender`, `password`, `pre74`, `post74`, `picture`) VALUES
(1, 'Demetris', 'Paschalides', 'dpasch01@cs.ucy.ac.cy', '1992-02-13', 'M', '909b21869a5beb6549013709e3f1b46e', 1, 1, NULL),
(3, 'Andreas', 'Frangou', 'afragk02@hotmail.com', '1992-03-17', 'M', '827ccb0eea8a706c4c34a16891f84e7b', 1, 1, NULL),
(4, 'Panayiotis', 'Pavlides', 'ppana02@cs.ucy.ac.cy', '1821-02-24', 'F', '827ccb0eea8a706c4c34a16891f84e7b', 1, 1, NULL);

INSERT INTO `EVENT` (`id`, `title`, `type`, `content`, `datetime`, `date`, `view`, `like`, `member`, `tags`) VALUES
(3, 'Went to church', 'memoir', 'Just like any Sunday morning!', '2015-03-10 15:07:30', '2015-03-13', 11, 0, 1, 'church,Sunday'),
(4, 'Studying for exams', 'memoir', 'I am going to fail this class.', '2015-03-10 15:08:32', '2015-03-10', 9, 0, 1, 'Exams,Studying'),
(5, 'On a fieldtrip', 'memoir', 'This is going to be amazing!', '2015-03-10 15:08:59', '2015-03-28', 2, 0, 1, 'Trip');

INSERT INTO `MARKER` (`event`, `lng`, `lat`) VALUES
(3, 33.634644, 35.225430),
(4, 33.029022, 35.072716),
(5, 33.189697, 34.917465);

INSERT INTO `COMMENT` (`id`, `event`, `content`, `datetime`, `member`) VALUES
(2, 3, 'I was there too!', '2015-03-10 15:11:21', 3),
(3, 5, 'I will like to come too!!!', '2015-03-10 15:17:05', 3),
(4, 4, 'Don''t worry, we will be again in the same one...', '2015-03-10 15:18:00', 3);

INSERT INTO `NOTIFICATION` (`id`, `member`, `owner`, `event`, `status`, `type`, `datetime`) VALUES
(1127, 3, 1, 3, 'seen', 1, '2015-03-10 15:11:21'),
(1128, 3, 1, 5, 'unseen', 1, '2015-03-10 15:17:05'),
(1129, 3, 1, 4, 'seen', 1, '2015-03-10 15:18:00');
