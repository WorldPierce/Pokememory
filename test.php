<?php
 $con = mysqli_connect("localhost", "root", "root") or die("Oops some thing went wrong");
  mysqli_select_db($con, "pokemon") or die("Oops some thing went wrong");
// echo $_GET["username"];
// echo '<script type="text/javascript">',
//      'gameStartAnimation();',
//      '</script>'
// ;
//   $username = $_GET["username"];
// 			$password = $_GET["password"];

// 				//create new user
			
// 			$sql = "INSERT INTO users (username, password, wins) VALUES ('".$username."', '".$password."', '0')";
// 						    if (mysqli_query($con, $sql)) {
// 						      echo "New record created successfully $username<br>";
// 						    } else {
// 						      echo "Error: " . $sql . "<br>" . mysqli_error($con);
// 						    }
// mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<head>
<script src="scripts/vue.js"></script>
<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>

<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.5/angular.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link href="http://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">



<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="scripts/application.js"></script>
<link rel="stylesheet" type="text/css" href="scripts/application.css">



</head>
<body>

<a class="login-trigger" href="#" data-target="#login" data-toggle="modal">Login</a>

			<div id="login" class="modal fade" role="dialog">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-body">
			        <button data-dismiss="modal" class="close">&times;</button>
			        <h4>Login</h4>
			        <form>
			          <input type="text" name="username" class="username form-control" placeholder="Username"/>
			          <input type="password" name="password" class="password form-control" placeholder="Password"/>
			          <input class="btn login" type="submit" name="login" value="Login" />
			          <input class="btn login" type="submit" name="login" value="Register" />
			        </form>
			      </div>
			    </div>
			  </div>  
			</div>

			<?php
			$username = $_GET["username"];
			$password = $_GET["password"];
			$auth = $_GET["login"];
			//making sure all variables have values before attempting to login or register
			if($username != "" && $password != "" && $auth != ""){


				if($auth == "Register"){
					//check if username takin if not register, if it is display message
					//$sql = "SELECT username FROM users WHERE username=".$username."";
					$query = mysqli_query($con, "SELECT * FROM users WHERE username='".$username."'");
					//username taken
					if(mysqli_num_rows($query) > 0){

    					echo '<script type="text/javascript">',
				     		 "alert('Username $username already exists');",
				     		 '</script>';
					}
					else{
						//username available
						//TODO make catch table
						$sql = "INSERT INTO users (username, password, wins) VALUES ('".$username."', '".$password."', 0 )";
						if (mysqli_query($con, $sql)) {
							    //login
							      //echo "New record created successfully $username<br>";
							echo '<script type="text/javascript">',
				     		"loginPlayer(\"$username\");",
				     		'</script>';
						} else {
							      //echo "Error: " . $sql . "<br>" . mysqli_error($con);
						}
					}
				}
					
				else if ($auth == "Login"){
					$query = mysqli_query($con, "SELECT * FROM users WHERE username='".$username."' AND password='".$password."'");

					if(mysqli_num_rows($query) > 0){
						$user = mysqli_fetch_array($query);
						//echo $user['password'];
						$wins = $user['wins'];
						echo '<script type="text/javascript">',
				     	"loginPlayer(\"$username\",$wins);",
				     	'</script>';

    					// echo '<script type="text/javascript">',
				     // 		 "alert('Username $username already exists');",
				     // 		 '</script>';
					}
					else{
						echo '<script type="text/javascript">',
				     		 "alert('Invalid username or password');",
				     		 '</script>';
					}
				}
			
 // $con = mysqli_connect("localhost", "root", "root") or die("Oops some thing went wrong");
 //  mysqli_select_db($con, "pokemon") or die("Oops some thing went wrong");
				
				// echo '<script type="text/javascript">',
				//      "loginPlayer(\"$username\");",
				//      '</script>';

				 mysqli_close($con);
				 }
				?>

			<a class="pokedex-trigger" href="#" data-target="#pokedex" data-toggle="modal"><img src="PokeMemory/pokedex.png"></a>

			<div id="pokedex" class="modal fade" role="dialog">
			  <div class="modal-dialog">
			    
			    <div class="pokedex-modal-content">
			      <div class="modal-body">
			        <button data-dismiss="modal" class="close">&times;</button>
			        <h4>Pokedex</h4>

			        <div class="pokedex_body">

			        </div>
			        <!-- <form>
			          <input type="text" name="username" class="username form-control" placeholder="Username"/>
			          <input type="password" name="password" class="password form-control" placeholder="password"/>
			          <input class="btn login" type="submit" name="login" value="Login" />
			          <input class="btn login" type="submit" name="login" value="Register" />
			        </form> -->
			      </div>
			    </div>
			  </div>  
			</div>

			<a class="pokeball-trigger" href="#" data-target="#pokeball_select" data-toggle="modal"><img src="PokeMemory/pokeballRED.png"></a>

			<div id="pokeball_select" class="modal fade" role="dialog">
			  <div class="modal-dialog">
			    
			    <div class="pokeball-modal-content">
			      <div class="modal-body">
			        <button data-dismiss="modal" class="close">&times;</button>
			        <h4>Select a Pokeball, but be careful this starts a new game!</h4>
			        <img class="pokeball_select" src="PokeMemory/p.png"></a>
			        <img class="pokeball_select" src="PokeMemory/p1.jpg"></a>
			        <img class="pokeball_select" src="PokeMemory/p2.jpg"></a>
			        <img class="pokeball_select" src="PokeMemory/p3.png"></a>
			      </div>
			    </div>
			  </div>  
			</div>
			<!-- <div class="pokeball">
    			<div class="pokeball__button"></div>
  			</div> -->
	<div id="container">
		<img class="logo" src="PokeMemory/logo.png" alt="pokemon-font">
		

			<p class="header"></p>
			
			<button  class="btn red" id="newGame1">Single Player</button>
			<button class="btn blue" id="newGame2">Local Multi-Player</button>
			


			
			<div class="row">
				<div class="col-sm-3" style="text-align:center;">
					
					<div class="player1" style="display:none">
						<h3 id="player1Info">
						<img class="player1Img" src="PokeMemory/trainer.png" />
						</h3>
						<div class="player1Catches box">
						</div>
					</div>
				</div>
			    
			    <div id="board" class="col-sm-6" >
			    <!-- <div id ="myAnimation"></div> -->
			    <!-- <p id="myAnimation"></p> -->
			        <table  align="center">
			          <tr id="row1">
			            <td id=1 class="square"></td>
			            <td id=2 class="square v"></td>
			            <td id=3 class="square v"></td>
			            <td id=4 class="square v"></td>
			            <td id=5 class="square v"></td>
			            <td id=6 class="square v"></td>
			            <td id=7 class="square v"></td>
			            <td id=8 class="square"></td>
			          </tr>
			          <tr id="row2">
			            <td id=9 class="square h"></td>
			            <td id=10 class="square v h"></td>
			            <td id=11 class="square v h"></td>
			            <td id=12 class="square v h"></td>
			            <td id=13 class="square v h"></td>
			            <td id=14 class="square v h"></td>
			            <td id=15 class="square v h"></td>
			            <td id=16 class="square h"></td>
			          </tr>
			          <tr id="row2">
			            <td id=17 class="square h"></td>
			            <td id=18 class="square v h"></td>
			            <td id=19 class="square v h"></td>
			            <td id=20 class="square v h"></td>
			            <td id=21 class="square v h"></td>
			            <td id=22 class="square v h"></td>
			            <td id=23 class="square v h"></td>
			            <td id=24 class="square h"></td>
			          </tr>
			          <tr id="row2">
			            <td id=25 class="square h"></td>
			            <td id=26 class="square v h"></td>
			            <td id=27 class="square v h"></td>
			            <td id=28 class="square v h"></td>
			            <td id=29 class="square v h"></td>
			            <td id=30 class="square v h"></td>
			            <td id=31 class="square v h"></td>
			            <td id=32 class="square h"></td>
			          </tr>
			          <tr id="row2">
			            <td id=33 class="square h"></td>
			            <td id=34 class="square v h"></td>
			            <td id=35 class="square v h"></td>
			            <td id=36 class="square v h"></td>
			            <td id=37 class="square v h"></td>
			            <td id=38 class="square v h"></td>
			            <td id=39 class="square v h"></td>
			            <td id=40 class="square h"></td>
			          </tr>
			          <tr id="row3">
			            <td id=41 class="square"></td>
			            <td id=42 class="square v"></td>
			            <td id=43 class="square v"></td>
			            <td id=44 class="square v"></td>
			            <td id=45 class="square v"></td>
			            <td id=46 class="square v"></td>
			            <td id=47 class="square v"></td>
			            <td id=48 class="square"></td>
			          </tr>
			        </table>
		      </div>
		    <div class="col-sm-3" style="text-align:center;">
				<div class="row">
					<div class="player2" style="display:none">
						<a class="login2-trigger col-sm-2" href="#" data-target="#login2" data-toggle="modal">Login</a>

						<div id="login2" class="modal fade" role="dialog">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-body">
						        <button data-dismiss="modal" class="close">&times;</button>
						        <h4>Login Player 2</h4>
						        <!-- <form onsubmit="return loginPlayer2()"> -->
						          <input type="text" id="username2" name="username2" class="username form-control" placeholder="Username"/>
						          <input type="password" id="password2" name="password2" class="password form-control" placeholder="Password"/>
						          <button class="btn login" name="login2" value="Login" onclick="loginPlayer2(this.value)">Login</button>
						          <button class="btn login" name="login2" value="Register" onclick="loginPlayer2(this.value)">Register</button>
						          <!-- <input class="btn login" type="submit" name="login2" value="Login" />
						          <input class="btn login" type="submit" name="login2" value="Register" /> -->
						        <!-- </form> -->
						      </div>
						    </div>
						  </div>  
						</div>
						
							<h3 id="player2Info">
							<img class="wins" v-bind:src="pokeball"/>
							{{message}}
							<img class="player2Img" src="PokeMemory/trainer2.png" />
							</h3>
						
						<div class="player2Catches box">
						</div>
						
					</div>
				</div>
			</div>

		
		  
	</div>


</body>
</html>