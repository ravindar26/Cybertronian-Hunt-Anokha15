<?php
  function keymaker($id)
        {
           $secretkey='hfaa1h1awhqa3sdoyasw7e2sho3mqeojemdw09jdsklafjp1qwoijedmp03w9eiojdma';
           $key=md5($id.$secretkey);
           return $key;
        }
$testurlkey = keymaker($_GET['id']);
if(isset($_GET['id']) && $testurlkey==$_GET['key'])
{

$dir = 'img/answer_wrong/';
$images= scandir($dir);
$i = rand(2,sizeof($images)-1);
$img = 'img/answer_wrong/'.$images[$i];
}
else
{
        header('Location: homepage.php');
}

?>
<head>
<link rel="icon" href="img/anokha-logo.ico" type="image/x-icon">
<style>
.question{
	top: 100px;
	position: relative;
	}
.btn{
                height:40px;
                background:#2f4f4f;
                opacity:0.5;
                color:white;
                border-style:solid;
                border-radius:5px;
        }

body{background:url('img/cosmos.jpg');}
</style>
</head>
<body>
<div  class='question' align='center'>
<form action='homepage.php' method='POST'>
<img src="<?php echo $img; ?>" style='width:450px;height:450px'>
<br><br><br>
<input class='btn' type='submit' value='Try again'/>
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

