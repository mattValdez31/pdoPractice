<html>
<body>

<?php 

$dsn = 'mysql:host=sql2.njit.edu;dbname=mjv32';
$uname = 'mjv32';
$passwd = 'ccYhBxVxR';

//Create PDO object
try
{
	$db = new PDO($dsn, $uname, $passwd);
	echo "<p>You successfully connected to the database!</p>";
}
catch (PDOException $e)
{
	$e_message = $e->getMessage();
	echo "<p>Could not connect to the database: $e_message </p>";
}

if (!mysql_select_db("mjv32"))
{
	echo "Unable to select db: " . mysql_error();
}


$q = "SELECT * FROM accounts WHERE id<6";
$result = mysql_query($q);
$count = sizeof($query);

tableTags::tFormat();

while ($row = mysql_fetch_assoc($result))
{
	$i = 0;
	foreach ($row as $r)
	{
		tableTags::tDetail($r);
		if($i == sizeof($row)-1)
		{
			tableTags::endTRow();
		}
		$i++;
	}
}

class tableTags
	{
		static public function headingOne($text)
		{
			return '<h1>' . $text . '</h1>';
		}

		static public function tFormat()
		{
			echo "<table>";
		}

		static public function tDetail($text)
		{
			echo '<td>' . $text . '</td>';
		}

		static public function tHeader($text)
		{
			echo '<th>' . $text . '</th>';
		}

		static public function endTRow()
		{
			echo '</tr>';
		}
	}


?>
</body>
</html>
