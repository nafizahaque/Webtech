  <html lang="en">
<head>
  <title> Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  .button {
			background-color: #0066cc;
			border: none;
			color: white;
			padding: 10px;
			border-radius: 10px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			/*font-size: 16px;
			margin: 10px 2px;*/
			cursor: pointer;
			border-radius: 10px;
			}
  </style>
</head>
<body>
<?php
$text = $_POST['myText'];
$chars = array();
$counts = array();

for($i=0;$i<strlen($text);$i=$i+1)
{
	$contain = 0;
	for($j=0;$j<sizeof($chars);$j=$j+1)
	{
		if($chars[$j]==$text[$i])
			$contain = $contain+1;
	}
	if($contain == 0)
	{
		$chars[] = $text[$i];
	}
}

for($i=0;$i<sizeof($chars);$i=$i+1)
{
	$counts[] = 0;
	for($j=0;$j<strlen($text);$j=$j+1)
	{
		if($chars[$i]==$text[$j])
			$counts[$i] = $counts[$i]+1;
	}
}

for ($sel=0; $sel<sizeof($chars)-1; $sel = $sel+1 )
    {
        $k = $sel;
        for ( $q=$sel+1; $q<sizeof($chars); $q = $q+1 )
        {
            if( $chars[$k] > $chars[$q] )
                $k = $q;
        }
        $tempVal = $chars[$sel];
        $chars[$sel] = $chars[$k];
        $chars[$k] = $tempVal;
		
		$tempVal = $counts[$sel];
        $counts[$sel] = $counts[$k];
        $counts[$k] = $tempVal;
    }
	
	$wordsCount = array();
	$words = explode(" ",$text);
	$fullWords = $words;
	
	for($l=0;$l<sizeof($words);$l=$l+1)
	{
		for($z=$l+1;$z<sizeof($words);$z=$z+1)
		{
			if($words[$l]==$words[$z] && $words[$l]!=" ")
			{
				 $words[$z]=" ";
				 
			}
		}
	}
	
	for($l=0;$l<sizeof($words);$l=$l+1)
	{
		$wordsCount[] = 0;
		for($z=0;$z<sizeof($fullWords);$z=$z+1)
		{
			if($words[$l] == $fullWords[$z])
			{
				$wordsCount[$l] = $wordsCount[$l]+1;
			}
		}
	}
	
	for ($sel=0; $sel<sizeof($words)-1; $sel = $sel+1 )
    {
        $k = $sel;
        for ( $q=$sel+1; $q<sizeof($words); $q = $q+1 )
        {
            if( strlen($words[$k]) > strlen($words[$q]) )
                $k = $q;
        }
        $tempVal = $words[$sel];
        $words[$sel] = $words[$k];
        $words[$k] = $tempVal;
		
		$tempVal = $wordsCount[$sel];
        $wordsCount[$sel] = $wordsCount[$k];
        $wordsCount[$k] = $tempVal;
    }
	
?>
<hr/>
<h2> Character Frequency Count</h2>
<hr/>
<table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Character</th>
        <th>Count</th>
      </tr>
    </thead>
    <tbody>
	<?php
		for($l=0;$l<sizeof($chars);$l=$l+1)
		{
			echo "<tr>";
			echo "<td>".$chars[$l]." </td><td>".$counts[$l]."</td>";
			echo "</tr>";
		}
	?>
	</tbody>
  </table>
  <input type="button" onclick="goBack1()" class="button" value="Input Another String"/>
  <hr/>
  <h2>Word Count </h2>
  <hr/>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Character</th>
        <th>Count</th>
      </tr>
    </thead>
    <tbody>
	<?php
		for($l=0;$l<sizeof($words);$l=$l+1)
		{
			if($words[$l]!=" ")
			{
				echo "<tr>";
				echo "<td>".$words[$l]."</td><td> ".$wordsCount[$l]."</td>";
				echo "</tr>";
			}
		}
	?>
	</tbody>
  </table>
  <input type="button" onclick="goBack1()" class="button" value="Input Another String"/>
  <script>
    function goBack1()
   {  
   window.location.href = 'Occurence_input.html';
   }
  </script>
  </body>
  </html>
