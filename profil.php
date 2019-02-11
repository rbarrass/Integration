<?php
  require("functions/displayFunc.php");
  require("functions/main.func.php");
  verifyIfConnected('student');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mon Profil</title>
	<link rel="stylesheet" type="text/css" href="style.less" media="screen">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!--Pour la partie responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<style>
		th,td{
			font-size: 16px;
		}
		p{
			font-size: 30px;
		}
		body{
			  background-color: #F5F5F5;
		}

	</style>
</head>
<body>
	<?php 
	//if($_GET['idu'] == $_SESSION['idu']){
	if(isset($_GET['idu'])){
		if($_GET['idu']==1){
			validProfile($_GET['idu']);
			echo "<p style='color: green;'> Votre inscription a bien été validée !</p>";
		}
	}
	$array_profil = profilDisplay(1);
	echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	    <div class="container">
	        <a class="navbar-brand" href="#" id="nameU">Université de Cergy-Pontoise</a>
	        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	            <span class="navbar-toggler-icon"></span>
	        </button>

	        <div class="collapse navbar-collapse" id="navbarSupportedContent">
	            <ul class="navbar-nav ml-auto">
	                <li class="nav-item">
	                    <a class="nav-link" href="functions/logout.php" style="color: #00BFFF; font-size:15px;">Se déconnecter</a>
	                </li>
	            </ul>

	        </div>
	    </div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-md-offset-1 col-md-10">
				<div class="col-md-offset-1 col-md-3">
					<img src="pictures/profil_pic/default.png"
            		alt="" class="img-rounded img-responsive" id="profil_pic" />
				</div>
				<div class="col-md-offset-1 col-md-5">
					<blockquote id="info">
	               		 <p>'.$array_profil[1]['nameu'].' '.$array_profil[2]['surnameu'].'</p> <small><cite title="Source Title">ADRESSE  <i class="glyphicon glyphicon-map-marker"></i></cite></small>
	           		 </blockquote>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-offset-1 col-md-10">
			<div class="panel panel-default">
	          	<div class="panel-heading">
	         	<h4 class="panel-title">User info</h4>
	          	</div>
	          	<div class="panel-body">
	            	<table class="table profile__table">
	              	<tbody>
	                	<tr>
		                  <th><strong>Email</strong></th>
		                  <td>'.$array_profil[0]['emailu'].'</td>
		                </tr>
		                <tr>
		                  <th><strong>Entreprise</strong></th>
		                  <td>'.$array_profil[8]['namei'].'</td>
		                </tr>
		                <tr>
		                	<th><strong>Adresse entreprise</strong></th>
		                  <td>'.$array_profil[9]['adri'].'</td>
		                </tr>
		                <tr>
		                  <th><strong>Téléphone</strong></th>
		                  <td>'.$array_profil[5]['phoneu'].'</td>
		                </tr>
		                <tr>
		                  <th><strong>ID étudiant</strong></th>
		                  <td>'.$array_profil[3]['student_idu'].'</td>	
		                </tr>
		                <tr>
		                  <th><strong>Tuteur </strong></th>
		                  <td>'.$array_profil[10]['nametut'].'</td>
		                </tr>
		                <tr>
		                  <th><strong>Durée du contrat</strong></th>
		                  <td>3 mois</td>
		                </tr>              		                
		              </tbody>
	            	</table>
	          	</div>
	        </div>
	   		</div>
		</div>
		<div class="row">
			<div class="col-md-offset-5 col-md-2">
				  <a href="editProfil.php" class="access">Éditer</a>
			</div>
		</div>
	</div>';
	//}
	?>
		
	</body>
</html>
