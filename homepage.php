<?php
session_start();
require_once 'connect.php';
if (isset($_SESSION['username']))
{
  function keymaker($id)
        {
           $secretkey='hfaa1h1awhqa3sdoyasw7e2sho3mqeojemdw09jdsklafjp1qwoijedmp03w9eiojdma';
           $key=md5($id.$secretkey);
           return $key;
        }
	$anoid = $_SESSION['anokhaid'];
	$level = $_SESSION['level_no'];
	$hintsql = "SELECT * FROM `questions` WHERE level_no='$level' ";
	$hintresult = mysql_query($hintsql) or die(mysql_error());
	$hintrow = mysql_fetch_assoc($hintresult);
	$hint1 = $hintrow['hint'];
	$image = "question/".$hintrow['qname'];
	if ( isset( $_POST['Submit1'] ) ) 
	{
		echo $_POST['user_answer'];
		$ans = md5($_POST['user_answer']);
		//echo $ans;
		$sql = "SELECT * FROM `questions` WHERE level_no='$level' ";
		$result = mysql_query($sql) or die(mysql_error());
		$row = mysql_fetch_assoc($result);
		$level_limit = mysql_query("select count(1) FROM `questions` ");
                $limit = mysql_fetch_array($level_limit);
                $total = $limit[0];
                if ($row['answer'] == $ans && ($_SESSION['level_no']) <= $total)
		{
			
			$_SESSION['level_no'] = $_SESSION['level_no'] + 1;
			$_SESSION['score'] = $_SESSION['score'] + $row['score'];
			$tscore = $_SESSION['score'];
			$tlevel = $_SESSION['level_no'];
			$tname = $_SESSION['username'];
                        $sqlimage = "SELECT * FROM `questions` WHERE level_no='$tlevel' ";
                	$resultimage = mysql_query($sqlimage) or die(mysql_error());
                	$rowimage = mysql_fetch_assoc($resultimage);
			$image = "question/".$rowimage['qname'];	
			$update_sql = "update users set score='$tscore',level_no='$tlevel', date_time = now()  where anokhaid='$anoid'";
			$returnval = mysql_query($update_sql);
			if($tlevel>123)
			{
				header('Location: congrats.html');
			}
			else
			{
                        header('Location: success.php?id='.$ans.'&&key='.keymaker($ans).'');
			}

			
		}
		/*
		elseif ( $total == ($_SESSION['level_no']))
                {
                       // header('Location: lastpage.php');
			  //header('Location: congrats.html');
                } */

		else
		{
			header('Location: wrong.php?id='.$ans.'&&key='.keymaker($ans).'');
		}
		
	}

}
else
{
	header('Location: index.php');
}

?>
<html>
<head>
<script src="jquery.js" type="text/javascript"></script>
<script src="min.js" type="text/javascript"></script>
<script src="modernizr.custom.js"></script>

    <script>
	var ans = "<?php echo $hint1; ?>";
	jQuery(function($){
   	$("#x").mask(ans);
	});
	 
    </script>
<title>Homepage</title>
<link rel="icon" href="img/anokha-logo.ico" type="image/x-icon">
<link href="homepagestyle.css" rel="stylesheet">
<style>
</style>
</head>
<body>
<header>
<h4>GREETINGS, EARTHLING<span class="greetings">SCORE: <?php echo $_SESSION['score']; ?></span><br><br><a href="lb.php" class="links">LEADERBOARD</a><span style="float:right"><a href="logout.php" class="links">LOGOUT</a></span></h4>
</header>
<h1>LEVEL : <?php echo $_SESSION['level_no']; ?>/123</h1>
<form action='' method='POST'>
<div class="question" align="center" >
<img src="<?php echo $image; ?>" style='width:450px;height:400px;'>
<br><br><br>
<input id="x" type="text" name='user_answer' placeholder='click here for hint'/>
<br><br>
<input class='btn register' type='submit' name='Submit1' value='Submit' />
</div>
<div style="bottom:20px;position:fixed;" align="left">
<button id="trigger-overlay" type="button" class="buttn">RULES</button>
</div>
<!--<p style=" bottom:-10px;width:100%; position:fixed;font-size:10px;color:white;" align="center">*THE CONTEST ENDS ON MARCH 3, 10pm</p>-->
<div class="overlay overlay-hugeinc">
                        <button type="button" class="overlay-close">Close</button>
                      <h2>Rules</h2>
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
