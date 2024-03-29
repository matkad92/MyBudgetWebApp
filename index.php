<?php

	session_start();
	if (isset($_SESSION['loggedInID']))
	{
		header('Location: RWD_BalancePage.php');
		exit();
	}
?>

<!DOCTYPE HTML>
<html lang="pl">

<head>
	<meta charset="utf-8" />
	<title>MyBudget</title>
	<!--dodać ikonke zamiast kuli ziemskiej-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Budget Application" />
	<meta name="keywords" content="oszczędności, bilans, przychody, wydatki, marzenia, savings, personal budget " />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />	
	<link rel="stylesheet" href="RWDcss.css" type="text/css" />
	<link rel="stylesheet" href="img/fontello/css/fontello.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&display=swap" rel="stylesheet">
	
	<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script> <!--dolaczenie bibliotekiJQuery-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	
</head>

<body>

	<header>
	
		<section>
			<div class="container-fluid p-3 bg-primary text-white text-center">
				<h1 class="logo"><i class="icon-money"></i>MyBudget.pl</h1>
				
				  <blockquote class="blockquote">
					<p>"Do not save what is left after spending, but spend what is left after saving."</p>
					<footer class="blockquote-footer text-white">Warren Buffet</footer>
				</blockquote>
				
			</div>
		</section>
		
	</header>
	
	<main>
	
		<div id="mainPageContainer" class="container-md p-4 mt-5 text-dark bg-light text-center rounded border border-4 border-primary">
						
			<section>
				<div class="row mt-3 ml-2 gy-3" >
				
					<div class="col-lg-6">
						 <img class="rounded mainPagePicture" src="img/tlo1.jpg" alt="Nie można wyświetlić obrazu">
					</div>
					
					<div class="col">
						<div class="mainPageContent">
							<h2>Dlaczego warto?</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
							<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
						</div>
					</div>
					
									
				</div>
									
				<div class="row mt-4">
			
					<div class="col text-center">
																
						<a href="RWD_LoginPage.php"><button type="button" class="btn btn-lg btn-success btn-block"><i class="icon-logout"></i> Zaloguj się</button></a>

					</div>		
					
					<div class="col text-center">
																			
						<a href="RWD_RegisterPage.php"><button type="button" class="btn btn-lg btn-warning btn-block"><i class="icon-user"></i> Zarejestruj się</button></a>				
				
					</div>
					
				</div>
				
			</section>
			
		</div>
		
	</main>

	
</body>

</html>