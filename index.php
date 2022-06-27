<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php
		function makeMyDayGreatAgain($json, array $param = [null, null])
		{
			if (is_object($json))
				foreach (get_object_vars($json) as $key => $value)
				{
					if ($key == $param[0] or is_null($param[0]))
					{
						echo "<p>object key:</p>";
						echo "<p style='margin-left:5%;'>";
							print_r($key);
						echo "</p>";

						echo "<p>json elem:</p>";
						echo "<p style='margin-left:5%;'>";
							print_r($value);
						echo "</p>";
					}

					makeMyDayGreatAgain($value, $param);
					
				}
			elseif (is_array($json)) 
				foreach ($json as $key => $value)
				{
					if (is_null($param[0]))
					{
						echo "<p>array key:</p>";
						echo "<p style='margin-left:5%;'>";
							print_r($key);
						echo "</p>";

						echo "<p>array elem:</p>";
						echo "<p style='margin-left:5%;'>";
							print_r($value);
						echo "</p>";
					}

					makeMyDayGreatAgain($value, $param);
				}
			else
			{
				if (is_null($param[0]))
				{
					echo "<p>array elem:</p>";
					echo "<p style='margin-left:5%;'>";
						print_r($json);
					echo "</p>";
				}
			}
		}

		const readOutput = __DIR__."/google.json";

		$json = (json_decode(file_get_contents(readOutput)));

		makeMyDayGreatAgain($json);		
	?>
</body>
</html>