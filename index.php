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


$q = "SELECT * FROM accounts WHERE id<6";
$query = $db->prepare($q);
$query->execute();
$result = $query->fetchAll();

tableTags::tFormat();

foreach($result as $r)
{
	echo "<tr>";
	echo "matt";
	tableTags::tDetail($r['id']);
	tableTags::tDetail($r['email']);
	tableTags::tDetail($r['fname']);
	tableTags::tDetail($r['lname']);
	tableTags::tDetail($r['phone']);
	tableTags::tDetail($r['birthday']);
	tableTags::tDetail($r['gender']);
	tableTags::tDetail($r['password']);

	tableTags::endTRow();
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
