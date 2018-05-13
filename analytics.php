<?php

  $hn = 'localhost';
  $un = 'dropthatdatabase';
  $pw = 'sesame';
  $db = 'DropThatDatabaseDimensional';

  $conn_err_msg = 'There is a problem connecting to the database.';

  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die(mysql_fatal_error($conn_err_msg));

  echo <<<_END
  <html>
    <head>
      <title>Analytics</title>
      <link rel="shortcut icon" href="./static/images/favicon.png" width="16" height="16">
      <link rel="stylesheet" type="text/css" href="./static/css/styles.css">
      <script type="text/javascript" src="./static/js/validation.js"></script>
    </head>
    <body>
      <h1>Analytics</h1>
_END;
      echo "<h3>Top Preferences for March</h3>";
      echo topFaves($conn);
      echo "<br><br><h3>Average Rating Of Movies And Total Number of Reviews By Date</h3>";
      echo getAverage($conn, "date");
      echo "<br><br><h3>Average Rating Of Movies And Total Number of Reviews Per Month</h3>";
      echo getAverage($conn, "month");
      echo "<br><br><h3>Average Rating Of Movies And Total Number of Reviews Per Year</h3>";
      echo getAverage($conn, "year");
      echo "<br><br><h3>Information about Rock & Rule</h3>";
      echo slice($conn);
      echo "<br><br><h3>Information about Highly Awarded Comedies during March</h3>";
      echo dice($conn);

function getAverage($conn, $gran) {
  $query = "";
  if ($gran == "date") {
    $query =
      "SELECT	Media.title as MediaTitle,
      Calendar.Date as CalendarDate,
      Calendar.month as CalendarMonth,
      Calendar.year as CalendarYear,
      average_review_score as AverageUserRating, sum(Total_Reviews) as TotalUserReviews
      FROM 	Media JOIN Rating USING (mediakey)
      		JOIN Calendar USING (calendarKey)
      GROUP BY 	Calendar.Year, Calendar.month,
      Calendar.Date, Rating.mediakey;";
  } else if ($gran == "month") {
    $query =
      "SELECT	Media.title as MediaTitle,
      Calendar.month as CalendarMonth,
      Calendar.year as CalendarYear,
      round(avg(average_review_score), 1) as AverageUserRating,
      sum(Total_Reviews) as TotalUserReviews
      FROM 	Rating JOIN Calendar USING (CalendarKey)
      JOIN Media USING(MediaKey)
      GROUP BY 	month, mediakey;";
  } else  {
    $query =
      "SELECT Media.title as MediaTitle,
      Calendar.year as CalendarYear, round(avg(average_review_score), 1)
      as AverageUserRating, sum(Total_Reviews) as TotalUserReviews
      FROM 	Media JOIN rating using (mediakey)
      JOIN calendar using (calendarKey)
      GROUP BY Calendar.Year, Rating.mediakey;";
  }
  $result = $conn->query($query);
  if (!$result) {
      echo "SELECT FAILED: $query<br>" . $conn->error. "<br><br>";
      return;
  }
  printAverageTable($result, $gran);
}

function printAverageTable($result, $gran) {
  echo "<table border = '1'>";
  echo "	<tr>\n";
  echo "		<th><i>Media Title</i></th>";
  if ($gran == "date") {
    echo "		<th><i>Date</i></th>";
  }
  if ($gran == "month" || $gran == "date") {
    echo "		<th><i>Month</i></th>";
  }
  echo "		<th><i>Year </i></th>";
  echo "		<th><i>Average User Rating</i></th>";
  echo "		<th><i>Total User Reviews</i></th>";
  echo "	<tr>\n";
  while($row = $result->fetch_array())
  {
    echo "<td>" . $row['MediaTitle'] . "</td>\n";
    if ($gran == "date") {
      echo "<td>" . $row['CalendarDate'] . "</td>\n";
    }
    if ($gran == "month" || $gran == "date") {
      echo "<td>" . $row['CalendarMonth'] . "</td>\n";
    }
    echo "<td>" . $row['CalendarYear'] . "</td>\n";
    echo "<td>" . $row['AverageUserRating'] . "</td>\n";
    echo "<td>" . $row['TotalUserReviews'] . "</td>\n";

    echo "	</tr>\n";
  }
echo "</table>";
}

function slice($conn) {
  $query =
    "SELECT
    Title as MediaTitle,
    Year,
    Genre,
    Award as NumberOfAwards,
    average_review_score as AverageReviewScore,
    Total_Reviews as TotalUserReviews
    FROM 	Rating JOIN Media USING (mediakey)
    WHERE title = 'Rock & Rule';";

    $result = $conn->query($query);
    if (!$result) {
        echo "SELECT FAILED: $query<br>" . $conn->error. "<br><br>";
        return;
    }

    echo "<table border = '1'>";
    echo "	<tr>\n";
    echo "		<th><i>Media Title</i></th>";
    echo "		<th><i>Year</i></th>";
    echo "		<th><i>Genre</i></th>";
    echo "		<th><i>Number Of Awards</i></th>";
    echo "		<th><i>Average Review Score</i></th>";
    echo "		<th><i>Total User Reviews</i></th>";
    echo "	<tr>\n";
    while($row = $result->fetch_array())
    {
      echo "<td>" . $row['MediaTitle'] . "</td>\n";
      echo "<td>" . $row['Year'] . "</td>\n";
      echo "<td>" . $row['Genre'] . "</td>\n";
      echo "<td>" . $row['NumberOfAwards'] . "</td>\n";
      echo "<td>" . $row['AverageReviewScore'] . "</td>\n";
      echo "<td>" . $row['TotalUserReviews'] . "</td>\n";
      echo "	</tr>\n";
    }
  echo "</table>";
}

function dice($conn) {
  $query =
    "SELECT Title as MediaTitle,
    Media.Year as Year,
    Genre,
    Award as NumberOfAwards,
    average_review_score as AverageReviewScore,
    Total_Reviews as TotalUserReviews,
    Date as DateRecorded
    FROM 	Rating
    JOIN 	Media USING (mediakey)
    JOIN 	Calendar USING (calendarkey)
    WHERE 	Calendar.month = 3 and Media.award > 5
    and Media.genre LIKE '%comedy%';";

    $result = $conn->query($query);
    if (!$result) {
        echo "SELECT FAILED: $query<br>" . $conn->error. "<br><br>";
        return;
    }

    echo "<table border = '1'>";
    echo "	<tr>\n";
    echo "		<th><i>Media Title</i></th>";
    echo "		<th><i>Year</i></th>";
    echo "		<th><i>Genre</i></th>";
    echo "		<th><i>Number Of Awards</i></th>";
    echo "		<th><i>Average Review Score</i></th>";
    echo "		<th><i>Total User Reviews</i></th>";
    echo "		<th><i>Date Recorded</i></th>";
    echo "	<tr>\n";
    while($row = $result->fetch_array())
    {
      echo "<td>" . $row['MediaTitle'] . "</td>\n";
      echo "<td>" . $row['Year'] . "</td>\n";
      echo "<td>" . $row['Genre'] . "</td>\n";
      echo "<td>" . $row['NumberOfAwards'] . "</td>\n";
      echo "<td>" . $row['AverageReviewScore'] . "</td>\n";
      echo "<td>" . $row['TotalUserReviews'] . "</td>\n";
      echo "<td>" . $row['DateRecorded'] . "</td>\n";
      echo "	</tr>\n";
    }
  echo "</table>";
}

function topFaves($conn) {
  $query =
  "SELECT
    (SELECT CONCAT(M.Title, ' (', M.Year, ')')
    FROM Calendar C, Media M, Popularity P
    WHERE C.CalendarKey = P.CalendarKey
    AND M.MediaKey = P.MediaKey
    AND C.Year = 2018
    AND C.Month = 3
    GROUP BY P.MediaKey
    ORDER BY count(P.MediaKey) DESC
    LIMIT 1) as TopMedia,
    (SELECT CONCAT(A.FirstName, ' ', A.LastName)
    FROM Calendar C, Actor A, Popularity P
    WHERE C.CalendarKey = P.CalendarKey
    AND A.ActorKey = P.ActorKey
    AND C.Year = 2018
    AND C.Month = 3
    GROUP BY P.ActorKey
    ORDER BY count(P.ActorKey) DESC
    LIMIT 1) as TopActor,
    (SELECT CONCAT(D.FirstName, ' ', D.LastName)
    FROM Calendar C, Director D, Popularity P
    WHERE C.CalendarKey = P.CalendarKey
    AND D.DirectorKey = P.DirectorKey
    AND C.Year = 2018
    AND C.Month = 3
    GROUP BY P.DirectorKey
    ORDER BY count(P.DirectorKey) DESC
    LIMIT 1) as TopDirector,
    (SELECT FavoriteGenre
    FROM Popularity, Calendar C
    WHERE C.Month = 3
    GROUP BY FavoriteGenre
    ORDER BY count(FavoriteGenre) DESC
    LIMIT 1) AS TopGenre;";

    $result = $conn->query($query);
    if (!$result) {
        echo "SELECT FAILED: $query<br>" . $conn->error. "<br><br>";
        return;
    }

    echo "<table border = '1'>";
    echo "	<tr>\n";
    echo "		<th><i>Top Media</i></th>";
    echo "		<th><i>Top Actor</i></th>";
    echo "		<th><i>Top Director</i></th>";
    echo "		<th><i>Top Genre</i></th>";
    echo "	<tr>\n";
    while($row = $result->fetch_array())
    {
      echo "<td>" . $row['TopMedia'] . "</td>\n";
      echo "<td>" . $row['TopActor'] . "</td>\n";
      echo "<td>" . $row['TopDirector'] . "</td>\n";
      echo "<td>" . $row['TopGenre'] . "</td>\n";
      echo "	</tr>\n";
    }
  echo "</table>";

}

?>
