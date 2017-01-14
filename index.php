<!DOCTYPE html>
<html>

<head>
		<title>Recepti za zdrav zivot</title>
		<link rel="stylesheet" type="text/css" href="stil1.css">
		<script type="text/javascript " src="funkcije.js"></script>
		<script type="text/javascript " src="glavna.js"></script>
		<link rel="stylesheet" type="text/css" href="_styles.css" media="screen">
</head>
<div class="navigation">
				<h1>RECEPTI ZA ZDRAV ZIVOT</h1>
				<div id="menu">
				<ul>
					<li><a href="index.php">Pocetna</a></li>
					<li><a href="hrana.php">Hrana</a></li>
					<li><a href="fitness.php">Fitness</a></li>
					<li><a href="psiha.php">Psihicko zdravlje</a></li>
					<li><a href="pitanja.php">Pitanja i odgovori</a></li>
					<li><a href="galerijaa.php">Galerija</a></li>
				</ul>
				</div>

				
</div>
<br><br><br><br>

<?php
$izlaz='';
	if(isset($_POST['searchbtt'])){
		$searched = htmlEntities($_POST['search'], ENT_QUOTES);
		
		$xml=simplexml_load_file('recepti.xml');
		foreach($xml->recept as $k){
		
		$o=$k->ocjena;
		$ime=$k->name;

		if($searched=='')$izlaz.='<div>'.$o.' '.$ime.'<div>';	
		elseif(strpos($o, $searched)!==false || strpos($ime,$searched)!==false)$izlaz.='<div>'.$o.' '.$ime.'<div>';
		
	}
}
?>
<body>


<div class="container" >
	
	<div id="za_sliku">

	</div>
	
	<div class="poslije_slike">
	
		<div class="glavni">
		<?php
$xml=simplexml_load_file('admin.xml');

if(isset($_REQUEST['login'])){
	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];
	foreach($xml->admin as $k){
		if($k->username == $username && $k->password == $password){
				session_start();
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			print "<form action='index.php' method='POST'><input name='logout' type='submit' value='Logout' id='login'></form>";
			print "<p id='login'>".$username." je logovan</p>";
			print "<form action='zaadmina.php' method='POST'><input name='receptiadmin' type='submit' value='Pregled/izmjena liste recepata i download kao csv' id='receptiadmin'></form>";
		}
	}
	
}
if(isset($_SESSION['username'], $_SESSION['password']) == false){
	print "<form action='index.php' method='POST'><input type='text' name='username' placeholder='username' value='' id='login'><input type='password' name='password' placeholder='password' value='' id='login'><input name='login' type='submit' value='Login' id='login'>  </form>";
}
if(isset($_REQUEST['logout'])){
	if (!isset($_SESSION))
  {
    session_start();
  }
	session_destroy();
}

?>


			<div class="treeMenu">
				<ol class="tree">
					<li>
						<label for="folder1" id="home">Pocetna</label> <input type="checkbox" id="folder1" /> 
						<ol>
							<li class="file"><a href="">File 1</a></li>
							<li>
								<label for="subfolder1">Subfolder 1</label> <input type="checkbox" id="subfolder1" /> 
								<ol>
									<li class="file"><a href="">Filey 1</a></li>
									<li>
										<label for="subsubfolder1">Subfolder 1</label> <input type="checkbox" id="subsubfolder1" /> 
										<ol>
											<li class="file"><a href="">File 1</a></li>
											<li>
												<label for="subsubfolder2">Subfolder 1</label> <input type="checkbox" id="subsubfolder2" /> 
												<ol>
													<li class="file"><a href="">Subfile 1</a></li>
													<li class="file"><a href="">Subfile 2</a></li>
													<li class="file"><a href="">Subfile 3</a></li>
												</ol>
											</li>
										</ol>
									</li>
								</ol>
							</li>
						</ol>
					</li>
					<li>
						<label for="folder2" id="food">Hrana</label> <input type="checkbox" id="folder2" /> 
						<ol>
							<li class="file"><a href="">File 1</a></li>
							<li>
								<label for="subfolder2">Subfolder 1</label> <input type="checkbox" id="subfolder2" /> 
								<ol>
									<li class="file"><a href="">Subfile 1</a></li>
									<li class="file"><a href="">Subfile 2</a></li>
									<li class="file"><a href="">Subfile 3</a></li>
								</ol>
							</li>
						</ol>
					</li>
					<li>
						<label for="folder3" id="fitness">Fitness</label> <input type="checkbox" id="folder3" /> 
						<ol>
							<li class="file"><a href="">File 1</a></li>
							<li>
								<label for="subfolder3">Subfolder 1</label> <input type="checkbox" id="subfolder3" /> 
								<ol>
									<li class="file"><a href="">Subfile 1</a></li>
									<li class="file"><a href="">Subfile 2</a></li>
									<li class="file"><a href="">Subfile 3</a></li>
								</ol>
							</li>
						</ol>
					</li>
					<li>
						<label for="folder4" id="psycho">Psihicko zdravlje</label> <input type="checkbox" id="folder4" /> 
						<ol>
							<li class="file"><a href="">File 1</a></li>
							<li>
								<label for="subfolder4">Subfolder 1</label> <input type="checkbox" id="subfolder4" /> 
								<ol>
									<li class="file"><a href="">Subfile 1</a></li>
									<li class="file"><a href="">Subfile 2</a></li>
									<li class="file"><a href="">Subfile 3</a></li>
								</ol>
							</li>
						</ol>
					</li>
					<li>
						<label for="folder5" id="questions">Pitanja i odgovori</label> <input type="checkbox" id="folder5" /> 
						<ol>
							<li class="file"><a href="">File 1</a></li>
							<li>
								<label for="subfolder5">Subfolder 1</label> <input type="checkbox" id="subfolder5" /> 
								<ol>
									<li class="file"><a href="">Subfile 1</a></li>
									<li class="file"><a href="">Subfile 2</a></li>
									<li class="file"><a href="">Subfile 3</a></li>
								</ol>
							</li>
						</ol>
					</li>
				</ol>

			</div>


			<p id="motivaciona_poruka">"Uspjeh vam nece sam doci. Vi morate ici prema njemu." - Marva Kolins</p>
			<img id="success" src="success.jpg" alt="slika success">
		</div>
	
		<div class="sporedni">
		
			<!--<div class="loginireg">
				<form method="post" id="flogin" >
					<h4>Zelite li da se logujete?</h4>

					<label>Username:  </label> <br> <input  type="text" id="user2" onChange="validacijaLogin()"><br></input><label id="labelaUsername2"></label>
					<br>		
					<label>Password:    </label> <br> <input type="password" id="pass2" onChange="validacijaPassword2()"><br></input><label id="labelaPassword2"></label>
					<br><br>
					<input type="submit" value="Login" id="log"> </input>
				</form>
				

				<form name= "fregistracija" id="fregistracija" >

					<h4>Zelite li da se registrujete?</h4>

					<label>Email:</label><br><input type="Email" id="email" onChange="validacijaEmail()"><br></input><label id="labelaEmail"></label>
					<br>
					<label>Username:</label><br><input type="text" id="user" onChange="validacijaRegistracije()"><br></input><label id="labelaUsername"></label>
					<br>
					<label>Password:</label><br><input type="password" id="pass" onChange="validacijaPassword()"><br></input><label id="labelaPassword"></label>
					<br><br>
					<input type="submit" value="Registracija" id="reg"></input>
				</form>
			</div>
		-->

<!--                                                                -->
<br><br>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	
	<script type="text/javascript">
	function prikaz()
	{
		var tekst = $("input[name='search']").val();
		$.post("s.php",{searchVal:tekst},function(output){
		$("#output").html(output);
	}
	);
	}
	function q()
	{
		var tekst = $("input[name='search']").val();
		$.post("s.php",{searchVal: tekst},function(output){
		$("#output").html(output);
	}
	);
	}
	
	</script>
	
	<script type="text/javascript">
	
	
	
	</script>
	
	</script>

<form action="index.php" method="post">

	<input type="text" name="search" placeholder="Pretrazi recepte..." onkeyup="q();" />
	<input type="button" name="searchbtt" value="Trazi" onclick="prikaz();" />
	</form>
	<div id="output"></div>


			<div class="anketa"> 
				
				<h4>Kako vam se svidjela ova web stranica?</h4>
				<form id="fanketa">
				  	<input type="radio" name="anketa" value="1" checked> Odlicna je.<br>
			  		<input type="radio" name="anketa" value="2"> Vrlodobra.<br>
			 		<input type="radio" name="anketa" value="3"> Moze i bolje.<br>
			 		<input type="radio" name="anketa" value="4"> Losa je.<br><br>

			  		<input type="submit" value="Glasaj" class="dugme">
			  		<input type="submit" value="Rezultati" class="dugme"> <br>
				</form>
			</div>
		</div>
	
		<div class="footer">
		<p>	Ova web stranica sadrzi informacije i savjete o zdravom nacinu zivota, 
		kojima Vas zelimo potaknuti da budete aktivniji u ocuvanju i unaprjedjenju 
		vlastitog zdravlja Mi brinemo o Vasem psihickom i fizickom zdravlju.<br> </p>
		</div>
	</div>
	
	
</div>
</body>
</html>