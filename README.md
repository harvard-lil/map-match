# map-match
Match the library name to the library shape

Based on https://github.com/frenski/quizy-memorygame

### Create database table
    CREATE TABLE `leaderboard` (`id` int(11) unsigned NOT NULL AUTO_INCREMENT, `name` varchar(80) DEFAULT NULL, `time` int(11) DEFAULT NULL,, `clicks` int(11) DEFAULT NULL, `game_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (`id`))
