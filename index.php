<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Play' rel='stylesheet' type='text/css'>
<script src="modernizr.custom.js"></script>
<title>Cybertronian Hunt</title>
<link rel="icon" href="img/anokha-logo.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="loginstyle.css">
<meta name="veiwport" content="width=device-width">
</head>
<body>  
<?php
session_start();
if (isset($_POST['login-email-mobile']) && isset($_POST['login-password']))
  {
        $login = urlencode($_POST['login-email-mobile']);
	$password = urlencode($_POST['login-password']);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_URL,"https://anokha.amrita.edu/api/registrations/login/");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS,"login-email-mobile=$login&login-password=$password&accessLevel=form");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec ($ch);
	if($result)
	{
		$result = json_decode($result,true);
		$status =  $result['status'];
		switch($status)
		{
		case "ok" : try{
				$servername = "localhost";
				$dbname = "treasurehunt";
				 $username =  $result['name'];
                            $anokhaid =  $result['anokha_id'];
			    $conn = new PDO("mysql:host=$servername;dbname=$dbname",'anokhagame','cyber#hunt@2015');
			    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			    $stmt = $conn->prepare("select * from users where username = :name
							and anokhaid = :anokhaid");
			    $stmt->bindParam(':name',$username);
		            $stmt->bindParam(':anokhaid',$anokhaid);
			    $stmt->execute();
			    $row = $stmt->fetch();
			    if($row)
				{
				$_SESSION['anokhaid'] = $row['anokhaid']; 
                                $_SESSION['username'] = $row['username'];
                                $_SESSION['score'] = $row['score'];
                                $_SESSION['level_no'] = $row['level_no'];
                                header('Location:homepage.php');
				}
			else
				{
			$stmt1 = $conn->prepare("insert into users (username,anokhaid,score,level_no,date_time)
					values(:username,:anokhaid,0,1,now())");
                                                      
                            $stmt1->bindParam(':username',$username);
                            $stmt1->bindParam(':anokhaid',$anokhaid);
                  
				if($stmt1->execute())
				{
					$_SESSION['anokhaid'] = $anokhaid;
					$_SESSION['username'] = $username;
                                        $_SESSION['score'] = 0;
                                        $_SESSION['level_no'] = 1;
                                        header('Location:homepage.php');
				}
				}
				}
				catch(PDOException $e)
			    	{    echo "Error: " . $e->getMessage();   }
      			    
					break;
		case "incorrect" : $msg =  "Password Incorrect. Try again";	
				 	break;
		case "not_registered" : $msg = "Please register in anokha site";
					break;
		case "email_not_verified" : $msg = "Mail not verified";			
						break;
		}
	 }
	else
	{
		echo "curl error: ".curl_error($ch);
	}
}
?>
<h1>Cybertr<a href='https://www.anokha.amrita.edu'><span><img src="img/anokha-logo.ico" class="head-logo" align:"center"></span></a>nian Hunt</h1>
<a href="https://anokha.amrita.edu/register">
<div class="signup">
	<p>Register</p>
</div>
</a>
<a href="#loginScreen">
<div class="login">
	<p>Login</p>
</div>
</a>
<div id="loginScreen">
	<a href='' class="cancel">&times;</a>
	<?php
        if(isset($msg) & !empty($msg))
        {
                echo $msg;
        }
?>
<form action="" method="POST">
    
    <div><label>Email/Phone : </label><input class="textbox" type="text" name="login-email-mobile"/></div> 
    <br> 
    <div><label>Password&nbsp;&nbsp; :  </label><input class="textbox1" type="password" name="login-password"/></div><br><br>
    <input class="btn register" type="submit" name="submit" value="Login" />

</form>
</div>
<div id="cover">
</div>
<div style="width:100%;bottom:0px;position:fixed;" align="right">
<img src="img/amrita.png" style="height:70px; padding:0 10px 0 0;">
</div>
<div style="width:100%; bottom:0px; position:fixed;" align="center">
<p style="color:white; font-size:10px;">BEST VIEWED IN MOZILLA FIREFOX AND GOOGLE CHROME</p>
</div>
<div style="bottom:20px; position:fixed; width:100%;" align="left">
<button id="trigger-overlay" type="button" class="buttn">RULES</button>
</div>
<div class="overlay overlay-hugeinc">
                        <button type="button" class="overlay-close">Close</button>
                        <h1>Rules</h1>
		<div class="overlay-text" align="center">	
		<ul class="the_rules">
		
			<li>This is an individual event.</li><br>
   			<li>Anyone can participate irrespective of their geographical location.</li><br>
   			<li>Helping others with answers is a violation of the intergalactic law. Suggesting obscure clues and gently nudging them to the answer however is not.</li><br>
			<li>The pictures given each question are clues to a specific answer to be entered in the text field.</li><br>
			<li>All answers consist only of 'a-z' and '0-9',spaces wherever applicable have already been provided.</li><br>
			<li>The questions have a beginner friendly learning curve.</li><br>
			<li>Participants are judged based on their aggregate score at the end of the treasure hunt, and the participants who have completed the hunt (or have crossed the maximum number of levels) are declared winners.</li><br>
			<li>In case of a tie with 2 or more participants stuck on the same level,the participant who solves the question the earliest will be given preference.</li><br>
			<li>The decision of the event organizers shall be final and binding.</li><br>
			<li>For discussions/clues head to the <a href="https://www.facebook.com/cybertronianhunt" style="color:green">facebook</a> page.</li><br>
			<li>For further details, click <a href="https://anokha.amrita.edu/events/cybertronian-hunt-i100" style="color:green">here</a>.</li><br> 
		</ul>
               
		</div>
                <script src="classie.js"></script>
                <script src="demo1.js"></script>
</div>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
 
ga('create', 'UA-57855581-1', 'auto');
ga('send', 'pageview');
 
</script> 
</body>
</html>
