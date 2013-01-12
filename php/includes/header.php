<?
	include "connect.php";
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="design.css" />
	<?
	if(isset($scripts))
		echo $scripts;
	?>
	<title><?if(isset($title))echo $title;?></title>
</head>

<body>
	<div class="container">
		<div class="navDiv">
			<div class="navBar">
				<div id="leftHalf">
					<ul id="nav-List">
						<li><a href="index.html">Home</a></li>
						<li><a href="work.html">Work</a></li>
						<li><a href="blog.html">Blog</a></li>
						<li><a href="forum.html">Forum</a></li> 
					</ul>

				</div>
				<div id="rightHalf">
				<?
				if(isset($userbar))
					echo $userbar;
				?>
				</div>
			</div>
		</div>
		
		<div class="contentDiv">
			<div class="content">
