<?php
  require("functions/displayFunc.php");
  require("functions/main.func.php");
  verifyIfConnected('profil.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>
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
		h5{
			text-align: center;
        	font-size: 25px;
        	font-style: bold;
        	margin-bottom: 20px;
		}
		*{
			font-size: 20px;
		}
	</style>
</head>
<body>
	<?php 
	//
	if(isset($_GET['idu'])){
		if($_GET['idu'] == $_SESSION['idu']){
			validProfile($_GET['idu']);
			echo "<p style='color: green;'> Votre inscription a bien été validée !</p>";
		}
	}
	$tmp="'";
	$array_profil = profilDisplay($_SESSION['idu']);
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
	               		 <p>'.$array_profil[1]['nameu'].' '.$array_profil[2]['surnameu'].'</p> <small><cite title="Source Title">'.$array_profil[6]['adru'].'<i class="glyphicon glyphicon-map-marker"></i></cite></small>
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
	          		<h5>L'.$tmp.'étudiant</h4>
	            	<table class="table profile__table">
	              	<tbody>
	              		<tr>
		                  <th><strong>Genre</strong></th>
		                  <td>'.$array_profil[4]['genderu'].'</td>
		                </tr>
	                	<tr>
		                  <th><strong>Email</strong></th>
		                  <td>'.$array_profil[0]['emailu'].'</td>
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
		                  <th><strong>Validation du compte</strong></th>
		                  <td>'.$array_profil[8]['validationu'].'</td>	
		                </tr>
		                <tr>
		                  <th><strong>Validation du tuteur</strong></th>
		                  <td>'.$array_profil[9]['validationtutu'].'</td>	
		                </tr>
		               <tr>
		                  <th><strong>Années prévues aux Masters</strong></th>
		                  <td>'.$array_profil[10]['promotionu'].'</td>	
		                </tr>
		                <tr>
		                  <th><strong>Filière et groupe</strong></th>
		                  <td>Master '.$array_profil[34]['branchcl'].' groupe '.$array_profil[35]['groupcl'].'</td>	
		                </tr>
		                <tr>
		                  <th><strong>Nationalité</strong></th>
		                  <td>'.$array_profil[11]['nationality'].'</td>
		                </tr>
		                <tr>
		                  <th><strong>Date de naissance</strong></th>
		                  <td>'.$array_profil[12]['dateofbirth'].'</td>	
		                </tr>
		                <tr>
		                  <th><strong>Lieu de naissance</strong></th>
		                  <td>'.$array_profil[13]['placeofbirth'].'</td>	
		                </tr>
		               </tbody>
		               </table>
		               <h5>Le poste</h5>
		               <table class="table profile__table">
		               <tbody>
		                <tr>
		                  <th><strong>Date de début de contrat</strong></th>
		                  <td>'.$array_profil[15]['begindate'].'</td>	
		                </tr>
		                <tr>
		                  <th><strong>Date de fin de contrat</strong></th>
		                  <td>'.$array_profil[14]['enddate'].'</td>	
		                </tr>
		                <tr>
		                  <th><strong>Intitulé du poste pourvu</strong></th>
		                  <td>'.$array_profil[16]['job'].'</td>	
		                </tr>
		                <tr>
		                  <th><strong>Missions confiées</strong></th>
		                  <td>'.$array_profil[17]['typejob'].'</td>	
		                </tr>
		                <tr>
		                  <th><strong>Outil et technologies mises en oeuvre</strong></th>
		                  <td>'.$array_profil[18]['technologies'].'</td>
		                </tr>
		               </tbody>
		               </table>
		               <h5>L'.$tmp.'entreprise</h5>
		               <table class="table profile__table">
		               <tbody>
		                <tr>
		                  <th><strong>Raison sociale de l'.$tmp.'entreprise</strong></th>
		                  <td>'.$array_profil[19]['namei'].'</td>	
		                </tr>
		                <tr>
		                  <th><strong>Adresse de l'.$tmp.'entreprise</strong></th>
		                  <td>'.$array_profil[20]['adri'].'</td>
		                </tr>
		                <tr>
		                  <th><strong>Code postal</strong></th>
		                  <td>'.$array_profil[21]['postalcode'].'</td>	
		                </tr>
		                <tr>
		                  <th><strong>Ville de l'.$tmp.'entreprise</strong></th>
		                  <td>'.$array_profil[22]['city'].'</td>	
		                </tr> 
		                <tr>
		                  <th><strong>Numéro de téléphone de l'.$tmp.'entreprise</strong></th>
		                  <td>'.$array_profil[23]['phonei'].'</td>	
		                </tr>
		                <tr>
		                  <th><strong>Numéro de siret</strong></th>
		                  <td>'.$array_profil[24]['siret'].'</td>	
		                </tr>
		                <tr>
		                  <th><strong>Code NAF</strong></th>
		                  <td>'.$array_profil[25]['naf'].'</td>	
		                </tr>  
		                <tr>
		                  <th><strong>Numéro de la convention collective</strong></th>
		                  <td>'.$array_profil[26]['collectiveagreement'].'</td>	
		                </tr> 
		                <tr>
		                  <th><strong>Intitulé de la convention collective</strong></th>
		                  <td>'.$array_profil[27]['intcollectiveagreement'].'</td>	
		                </tr>   
		                <tr>
		                  <th><strong>Numéro de TVA intracommunautaire</strong></th>
		                  <td>'.$array_profil[28]['tva'].'</td>	
		                </tr> 
		                <tr>
		                  <th><strong>Caisse de retraite complémentaire non-cadre</strong></th>
		                  <td>'.$array_profil[29]['retirement'].'</td>	
		                </tr>
		                <tr>
		                  <th><strong>Affiliation</strong></th>
		                  <td>'.$array_profil[30]['affiliation'].'</td>	
		                </tr>	
		                <tr>
		                  <th><strong>Site internet</strong></th>
		                  <td>'.$array_profil[31]['website'].'</td>	
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