<!DOCTYPE html>
<html>
	<head>
		<title>Book of Semi-Remarkable Recipes</title>
		<meta charset="utf-8" />
		<meta name="description" content="Tale of Recipes for all to see" />

		<link href="recipeBook.css" type="text/css" rel="stylesheet" />

		<!-- Google Analytics -->
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-55322337-2', 'auto');
		  ga('send', 'pageview');
		</script>
	</head>

	<body background="images/bg.jpg">
		<?php
		$text = explode("|", file_get_contents("classrecipes.txt"));
		$recipe = array();
		$category = array();

		for ($i = 0; $i < count($text)-1; $i+=4){
			$recipe[] = array($text[$i+1], $text[$i+2], $text[$i+3]);

			$isFound = FALSE;
			for ($k = 0; $k < count($category); $k++){
				if ($text[$i+2] == $category[$k]){
					$isFound = TRUE;
					break;
				}
			}

			if ($isFound == FALSE){
				$category[] = $text[$i+2];
			}
		}
		?>

		<table border="1">
			<tr><th id="caption" colspan="3">Book of Recipes</th></tr>
			<tr id="titles">
				<th>Name</th>
				<th>Category</th>
				<th>URL</th>
			</tr>

			<?php
			for ($k = 0; $k < count($category); $k++){ ?>

				<tr><th id="cat1" colspan="3"> <?= $category[$k] ?> </th></tr>

				<?php for ($i = 0; $i < count($recipe); $i++){
					if ($recipe[$i][1] == $category[$k]){ ?>
						<tr><td> <?= $recipe[$i][0] ?> </td>
							<td id="cat2"> <?= $recipe[$i][1] ?> </td>
							<td><a href=<?= $recipe[$i][2] ?>>
									<?= $recipe[$i][2] ?></a></td>
						</tr>
					<?php }
				}
			} ?>
		</table>
	</body>
</html>