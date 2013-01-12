<?
include 'includes/variables.php';
$title = 'Sign in';

include 'includes/header.php';

echo '<h>Sign in</h>
	  <div id="line"></div>';

if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)
{
	echo '<p>You are already signed in, do you want to <a href="signout.php">sign out</a>?</p>';
}
else
{
	//has the form been posted, if not make it
	if($_SERVER['REQUEST_METHOD'] != 'POST')
	{
		echo '<br>
			  <form method="post" action="">
				Username:<input type="text" name="user_name"/><br>
				Password:<input type="text" name="user_pass"/><br>
				<input type="submit" value="Sign in"/>
			  </form>';
	}
	else
	{
		$errors = array();
		if(empty($_POST['user_name']))
			$errors[] = 'You need to enter a username';
		if(empty($_POST['user_pass']))
			$errors[] = 'You forgot to enter a password';
		if(!empty($errors))
		{
			echo '<p>Oops, you did not enter some fields correctly</p>';
			echo '<ul>';
			foreach($errors as $bullet)
				echo '<li>' . $bullet . '</li>';
			echo '</ul>';
		}
		else
		{
			$query = "SELECT user_id, user_name, user_lvl
					  FROM users
					  WHERE user_name='".mysql_real_escape_string($_POST['user_name'])."'
					  AND user_pass='".sha1($_POST['user_pass'])."'";
			$result = mysql_query($query);
			if(!$result)
				echo '<p>A sign in error occured!<br>'.mysql_error().'</p>';
			else
			{
				if(mysql_num_rows($result)==0)
					echo '<p>Could not sign you in. You entered a wrong user name or password</p>';
				else
				{
					$row = mysql_fetch_assoc($result);
					$_SESSION['signed_in'] = true;
					$_SESSION['user_id'] = $row['user_id'];
					$_SESSION['user_name'] = $row['user_name'];
					$_SESSION['user_lvl'] = $row['user_lvl'];
				}
			}
		}
	}
}
include 'includes/footer.php';
?>