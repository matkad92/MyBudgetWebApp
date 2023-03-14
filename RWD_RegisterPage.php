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

<?php

	session_start();
?>

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
	
		<div id="addIncomeContainer" class="container mt-5 mb-5 p-4 bg-light navbar-light rounded border border-4 border-primary">
		  <h2><i class="icon-user"></i> Formularz rejestracji</h2>
		  
		  <form action="register.php" method="post">
			<div class="form-floating mb-3 mt-3">
			  <input type="text" class="form-control" id="login" placeholder="Podaj login:" name="userLogin">
			  <label for="login">Login</label>
			</div>
			<?php

				if(isset($_SESSION['e_nick']))
				{					
					echo '<div class="text-danger">'.$_SESSION['e_nick'].'</div>';
					unset ($_SESSION['e_nick']);
				}
			?>
			<div class="form-floating mt-3 mb-3">
			  <input type="password" class="form-control" id="password" placeholder="Podaj hasło" name="userPassword">
			  <label for="password">Hasło</label>
			</div>
			<div class="form-floating mt-3 mb-3">
			  <input type="password" class="form-control" id="repeatPassword" placeholder="Podaj hasło" name="userPasswordConfirmation">
			  <label for="repeatPassword">Powtórz hasło</label>
			</div>
			<div class="form-floating mt-3 mb-3">
			  <input type="email" class="form-control" id="email" placeholder="Podaj email" name="userEmail">
			  <label for="email">@ Podaj email</label>
			</div>

			<div class="row">
				<div class="col text-center">
																			
						<button type="submit" class="btn btn-lg btn-warning btn-block"><i class="icon-user"></i> Zarejestruj się</button>					
				
				</div>
			</div>
		  </form>
		</div>
		
	</main>

	
</body>

</html>