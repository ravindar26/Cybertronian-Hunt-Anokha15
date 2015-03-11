<?php 
session_start();
if (!isset($_SESSION['username']))
{
	header('Location: index.php');
}
?>
<!DOCTYPE html>
<head>
<link rel="icon" href="img/anokha-logo.ico" type="image/x-icon">
<style>
.text {
text-align:center;
font-size: 20px;
color: #D3D3D3;
top:30px;
position: relative;
}

body{ 
  background: url('img/cosmos.jpg'); //no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

a{
font-style: oblique;
text-decoration: none;
color:#66CCCC;
}

p img{
top: 50px;
position: relative;
}

</style>
<head>
<body>
<p style="text-align:center"><img src="img/last.jpg" /></p>
<div class = "text">
<br>Looks like you are too fast..<br><br>
Please wait till further questions are uploaded..<br><br>
<a href='homepage.php'>Go back to HomePage</a>
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
