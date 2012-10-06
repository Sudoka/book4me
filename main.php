<?php session_start(); ?>
<html>
<head>
	<title> Event Scheduler </title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href='http://fonts.googleapis.com/css?family=Nunito:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Relex' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lustria' rel='stylesheet' type='text/css'>
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript" src="ui.js"></script>
	<script type="text/javascript" src="fav.js"></script>

	<div id="header">
		<div id="welcome"> <img src="https://graph.facebook.com/<?php echo $_SESSION['facebook']?>/picture"> <?php echo $_SESSION['name']; ?> <a href="logout.php"> [logout] </a>
		</div>
		
		<div id="header-text">
			<a class="anchorLink" href="#about-us"> About Us </a>
		</div>
		<div id="header-text">
			<a class="anchorLink" href="#contacts"> Contacts </a>
		</div>
		<div id="header-text">
			<a class="anchorLink" href="#book"> Book </a>
		</div>
		<div id="header-text">
			<a class="anchorLink" href="#home"> Home </a>
		</div>

	</div>
	</hr>
	</head>

<?php
if(!isset($_SESSION['id'])) header('Location: login.php');
?>

	<body>
		<section id="home">
		<div id="homeText" class="scrollInfo">
			<div id="htext">
		<h1>Home </h1></div>
		<div id="ptext">
		<?php include("home_calendar.php"); ?>
		</div>
		</div>
		</section>
		
		<section id="book">
		<div id="bookText" class="scrollInfo">	
		<div id="htext">
		<h1> Book </h1></div>
		<div id="ptext">
		<p>
		
		<form name="book" action="book.php" method="GET">
		<br>Name <input type="text" name="name">
		<br>Keywords: <input type="text" name="keywords">
		<br> Description <input type="text" name="description">
		<br> Room <select name="room">
		<option value="1"> Room 1</option>
		<option value="2"> Room 2</option>
		<option value="3"> Room 3</option>
		</select>
		<br>Date : 
		<select name="date">
		<script>
			for(i=1;i<=31;i++) {
				document.write('<option value="' + i + '">' + i + '</option>');
				}
		</script>
		</select>&nbsp;&nbsp;
		<select name="month">
		<script>
			for(i=1;i<=12;i++) {
				document.write('<option value="' + i + '">' + i + '</option>');
				}
		</script>
		</select>
		<br>Select Start time : 
		<select name="start">
		<script>
			for(i=0;i<=9;i++) {
				document.write('<option value="' + i + '">' + '0' + i + ':00</option>');
				}
			for(i=10;i<=23;i++) {
				document.write('<option value="' + i + '">' + i + ':00</option>');
				}
		</script>
		</select>
		<br>Select End time : 
		<select name="end">
		<script>
			for(i=0;i<=9;i++) {
				document.write('<option value="' + i + '">' + '0' + i + ':00</option>');
				}
			for(i=10;i<=23;i++) {
				document.write('<option value="' + i + '">' + i + ':00</option>');
				}
		</script>
		</select>
		<br><input type="submit" value="submit">
		
		</form>
		</p>
		</div>
		</div>
		</div>
		</section>
		
		<section id="contacts">
		<div id="contactsText" class="scrollInfo">
		<div id="htext">
		<h1> Contacts </h1></div>
		<div id="ptext">
		<p>A home is a place of residence or refuge.
		[1] When it refers to a building, it is usually a <br>place in which an individual 
		or a family can live and store personal property. <br>Most modern-day households contain sanitary facilities and<br> a means of preparing food. 
		Animals have their own homes as well, either living in the <br>wild or shared with humans in a domesticated environment.<br> 
		"Home" is also used to refer to the geographical area <br>(whether it be a suburb, town, city or country) in which a person grew up <br>or 
		feels they belong, or it can refer to the native <br>habitat of a wild animal. Sometimes, as an alternative to the <br>
		definition of "home" as a physical locale<br> ("Home is where you hang your hat"), home may be perceived <br>to have no physical location, 
		instead, home may relate instead to a<br> mental or emotional state of refuge or comfort. <br>
		Popular sayings along these lines are <br>"Home is where the heart is" or "You can never go home again".<br>
		There are cultures in which homes are mobile such as nomadic peoples.<br>
		</p>
		</div>
		</div>
		</div>
		</section>

		<section id="about-us">
		<div id="aboutText" class="scrollInfo">	
		<div id="htext">
		<h1> About Us </h1></div>
		<div id="ptext">
		<p>
		A home is a place of residence or refuge.
		[1] When it refers to a building, it is usually a <br>place in which an individual 
		or a family can live and store personal property. <br>Most modern-day households contain sanitary facilities and<br> a means of preparing food. 
		Animals have their own homes as well, either living in the <br>wild or shared with humans in a domesticated environment.<br> 
		"Home" is also used to refer to the geographical area <br>(whether it be a suburb, town, city or country) in which a person grew up <br>or 
		feels they belong, or it can refer to the native <br>habitat of a wild animal. Sometimes, as an alternative to the <br>
		definition of "home" as a physical locale<br> ("Home is where you hang your hat"), home may be perceived <br>to have no physical location, 
		instead, home may relate instead to a<br> mental or emotional state of refuge or comfort. <br>
		Popular sayings along these lines are <br>"Home is where the heart is" or "You can never go home again".<br>
		There are cultures in which homes are mobile such as nomadic peoples.<br>
		</p>
		</div>
		</div>
		</div>
		</section>
		
	</body>
</head>
</html>
