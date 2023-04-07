<?php

	session_start();
	if (!isset($_SESSION['loggedIn']))
	{
		header('Location: index.php');
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
		<section>
		
			<nav class="navbar navbar-expand-lg mt-1 bg-light navbar-light rounded border border-4 border-primary">
			  <div class="container-fluid">
				<a class="navbar-brand" href="#"><h2><i class="icon-money"></i></h2></a>
				<button class="navbar-toggler btn-lg " type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
				  <ul class="navbar-nav">
					<li class="nav-item">
					  <a class="nav-link" href="#"><i class="icon-home"></i> Strona główna</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link" href="#"><i class="icon-money-1"></i> Dodaj przychód</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link" href="#"><i class="icon-basket"></i> Dodaj wydatek</a>
					</li>  					
					<li class="nav-item">
					  <a class="nav-link" href="#"><i class="icon-balance-scale"></i> Bilans</a>
					</li>  					
					<li class="nav-item">
					  <a class="nav-link" href="#"><i class="icon-cog"></i> Ustawienia</a>
					</li>  					
					<li class="nav-item">
					  <a class="nav-link" href="logout.php"><i class="icon-logout"></i> Wyloguj</a>
					</li>  
				  </ul>
				</div>
			  </div>
			</nav>
			
		</section>
		
	</header>
	
	<main>
	
		<div id="mainPageContainer" class="container-md p-4 mt-5 text-dark bg-light text-center rounded border border-4 border-primary">
						
			<section>
			
								
				<div class="row  g-3 mt-4 mb-4">
			
					<div class="col-md-4 text-center">
																
						<button type="button" class="btn btn-lg btn-primary btn-block balanceButtons">Bieżący miesiąc</button>

					</div>		
					
					<div class="col-md-4 g-3 text-center">
																			
						<button type="button" class="btn btn-lg btn-primary btn-block balanceButtons">Poprzedni miesiąc</button>					
				
					</div>
					
					<div class="col-md-4 g-3 text-center">
																			
						<button id="toggleModal" type="button" class="btn btn-lg btn-primary btn-block balanceButtons">Wybrany okres</button>					
				
					</div>
					
				</div>
				
				
				 <div
					  class="modal fade"
					  id="exampleModal"
					  tabindex="-1"
					  role="dialog"
					  aria-labelledby="exampleModalLabel"
					  aria-hidden="true"
					>
					  <div class="modal-dialog">
						<div class="modal-content">
						  <div class="modal-header">
							<h4 class="modal-title" id="exampleModalLabel">Wybierz datę:</h4>
							<button
							  type="button"
							  class="close"
							  data-dismiss="modal"
							  aria-label="Close"
							>
							  <span aria-hidden="true">&times;</span>
							</button>
						  </div>
						  <div class="modal-body">
							  <form action="/action_page.php">
								<div class="form mt-3 mb-3">
								  <label class="text-left" for="startDate">Od:</label>
								  <input type="date" class="form-control" id="startDate" name="incomeDate">
								 </div>
								<div class="form mt-3 mb-3">
								  <label for="finishDate">Do:</label>
								  <input type="date" class="form-control" id="finishDate" name="incomeDate">
								 </div>
							</form>
						  </div>
						  <div class="modal-footer">
							<button
							  type="button"
							  class="btn btn-secondary"
							  data-dismiss="modal"
							>
							  Anuluj
							</button>
							<button type="button" class="btn btn-primary">Wybierz</button>
						  </div>
						</div>
					  </div>
					</div>
				
				
				
				
				
				<div style="clear: both"></div>
			
				<h2 class="logo"><i class="icon-balance-scale"></i> 
				<?php
					if(isset($_SESSION['loggedInID']))
					{
						echo "Bilans dla ID : ".$_SESSION['loggedInID'];
					}
					else echo "Brak zalogowanego użytkownika!";				
				?>
			
				</h2>
			
			
			
				<div class="row mt-2 gy-3" >
				
					<div class="balancePageContent col-lg-6 rounded border border-2 border-primary">
						<div class="balancePageContent">
							<h2>Przychody</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
							<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
						</div>
					</div>
					
					<div class="balancePageContent col-lg-6 rounded border border-2 border-primary">
						<div class="balancePageContent">
							<h2>Wydatki</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
							<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
						</div>
					</div>
					
									
				</div>
									
				
			</section>
			
		</div>
		
	</main>
	
	<script src="./app.js"></script>
	
</body>

</html>