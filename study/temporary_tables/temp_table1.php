<?php

  $maketemp = "
    CREATE TEMPORARY TABLE temp_table_1 (
      `itineraryId` int NOT NULL,
      `live` varchar(1),
      `shipCode` varchar(10),
      `description` text,
      `duration` varchar(10),
      PRIMARY KEY(itineraryId)
    )
  "; 

  mysql_query($maketemp, $connection) or die ("Sql error : ".mysql_error());

  $inserttemp = "
    INSERT INTO temp_table_1
      (`itineraryId`, `live`, `shipCode`, `description`, `duration`)
    SELECT `id`, `live`, `ship`, `description`, `duration`
    FROM `cruises`
    WHERE `live` = 'Y'
  ";

  mysql_query($inserttemp, $connection) or die ("Sql error : ".mysql_error());

  $select = "
    SELECT `itineraryId`, `shipCode`, `description`, `duration`
    FROM temp_table_1
  ";
  $export = mysql_query($select, $connection) or die ("Sql error : ".mysql_error());