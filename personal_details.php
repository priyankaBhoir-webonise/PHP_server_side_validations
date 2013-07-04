<!DOCTYPE html>
<?php 
		$array_hobbies=array('reading','traveling','music');
		$countries=array('select','india','united_kingdom','shrilanka','United_state');
?>
<html>
	<head>
		<title> assignment - 2 : sever side validation </title>
	</head>
	<body>
		Instructions:
		<ul> 
		<li>All deatails are necessary
		<li>name should not contain numeric value
		<li>password must include 1 capital letter, 1 small letter, 1 special character(!@#$%^&*()), 1 number 
		<li>password should contain atleast 10 characters
		<li>spaces are not allowed in the password
		</ul>
		<div name="form_div" >
		
		<form action="details.php" method ="get">
		<table border=1>
		<tr><td>First name : <td><input type="text" name="fname" id="fname" value="<?php echo $_GET['fname'] ?>"><br><br>
		<tr><td>Last name : <td><input type="text" name="lname" id="lname"   value="<?php echo $_GET['lname'] ?>"><br><br>
		<tr><td>Gender :<td> <input type="radio" name="gender" value="male" <?php if( $_GET['gender']==male) echo'checked'; ?> >Male
				<input type="radio" name="gender" value="female" <?php if( $_GET['gender']==female) echo'checked'; ?> ">Female<br><br>
		<tr><td>email :<td> <input type="text" name="email"  value="<?php echo $_GET['email'] ?>"> <br><br>
		<tr><td>Password :<td> <input type="password" name="password" value="<?php echo $_GET['password'] ?>"><br ><br>
		<tr><td>Country :<td> <select name="country" id="country">
							<?php $variable=$_GET['country']; 
								foreach($countries as $key=>$values){
									echo '<option value='.$values;
									if( $values==$variable) echo' selected';
									echo ' >'.$values.'</option>';					
								}								
								?>
						</select><br ><br>
		<tr><td>zipcode : <td><input type="text" name="zip" id="zip" value="<?php echo $_GET['zip'] ?>"><br><br>
		<tr><td>Hobies :<td>		<?php $variable=$_GET['hobies']; 
								foreach($array_hobbies as $key=>$values){
									echo '<input type="checkbox" name="hobies[]" value='.$values;
									if( array_search($values,$variable)!=null) echo' checked';
									echo ' >'.$values;					
								}								
								?> 				
		<tr><td colspan=2><input type="submit" name="submit" value="submit">
		</table>
		</form>
		
		
		</div>
	</body>
</html>
		
