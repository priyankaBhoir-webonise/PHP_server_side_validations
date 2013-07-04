<?php 
		$fname=isset($_GET['fname'])?trim($_GET['fname']):false;
		$lname=isset($_GET['lname'])?trim($_GET['lname']):false;
		$gender=isset($_GET['gender'])?trim($_GET['gender']):false;
		$email=isset($_GET['email'])?trim($_GET['email']):false;
		$password=$_GET['password'];          //isset($_GET['password'])?trim($_GET['password']):false;
		$country=isset($_GET['country'])?trim($_GET['country']):false;
		$zipcode=isset($_GET['zip'])?trim($_GET['zip']):false;
		$hobies=$_GET['hobies'];
		$flag=true;
		$list='';
		
		function valid_field($name){
			if($name){
				if( preg_match('/[!@#$%^&*()]/',$name)==1) {
					echo '<span style=\'color:red\'>should not contain special characters</span>';
					$GLOBALS['flag']=false;
					}
				else if(preg_match('/[0-9]/',$name)==1)	{
					echo '<span style=\'color:red\'> should not contain numeric values </span>';
					$GLOBALS['flag']=false;
				}
				else if($name=='select'){
						echo '<span style=\'color:red\'>please select country </span>';
						$GLOBALS['flag']=false;
				}
				else
					echo " $name";
			}
			else{
				echo '<span style=\'color:red\'>please fill the details </span>';
				$GLOBALS['flag']=false;
			}
		}
		function valid_email($email) {
			if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
					echo "$email";	
			}
			else
			{
				echo '<span style=\'color:red\'>invalid email id </span>';
				$GLOBALS['flag']=false;
			}
		}
		function valid_password($name)
		{	
			if($name){
				if(preg_match('/[0-9]/',$name)==0 ||preg_match('/[A-Z]/',$name)==0 || preg_match('/[a-z]/',$name)==0 || preg_match('/[!@#$%^&*()]/',$name)==0 || strpos($name,' ') !=false || strlen($name)<10)
					echo '<span style=\'color:red\'>Invalid password </span>';
				else
					echo "$name";
			}
			else{
					echo '<span style=\'color:red\'>should not empty. spaces will be ignored </span>';
					$GLOBALS['flag']=false;
			}

		}
		
		function valid_zip($a)
		{
			if($a){
				if( !is_numeric($a) || strlen($a)!=6 ){
						echo '<span style=\'color:red\'>Invalid zipcode </span>';
						$GLOBALS['flag']=false;
				}
				else
						echo "$a";
			}	
			else
				{
						echo '<span style=\'color:red\'>Invalid zipcode </span>';
						$GLOBALS['flag']=false;
				}	
		}
		function valid_hobies($hobies)
		{
			 if(empty($hobies))
		 	 {
   				 echo '<span style=\'color:red\'>You didnt select any hobby </span>';
				$GLOBALS['flag']=false;
 			 }
  			else
  			{
   				 $N = count($hobies);
 
    				echo("You selected $N hobby(hobbies): ");
    				for($i=0; $i < $N; $i++)
    				{
      					echo($hobies[$i] . ", ");
					$GLOBALS['list']=$GLOBALS['list'].'&hobies[]='.$hobies[$i];
   				 }
 			 }
		}
		
			
		
		echo '<table >';
		echo '<tr> <th align=center> Details';
		echo '<tr><td>First name <td>: ';valid_field($fname);
		echo '<tr><td>Last name <td>:  ';valid_field($lname);
		echo '<tr><td>Gender <td>: ';valid_field($gender);
		echo '<tr><td>email  <td>: ';valid_email($email);
		echo '<tr><td>password <td>: ';valid_password($password);
		echo '<tr><td>country <td>: '; valid_field($country);
		echo '<tr><td>zipcode <td>: '; valid_zip($zipcode);
		echo '<tr><td>Hobies <td>: '; valid_hobies($hobies);
		echo '</table>';
		if($flag==false)
		{
			foreach($_GET as $key=>&$value){
					$value=urlencode($value);	
			}
			
	
		echo '<br>please correct the details (click on following link):'; 
		echo "<a href=http://localhost/assignment_2/personal_details.php?fname=$_GET[fname]&lname=$_GET[lname]&gender=$_GET[gender]&email=$_GET[email]&country=$_GET[country]&zip=$_GET[zip]&hobies[]=$list&password=$_GET[password]> details form </a>"; 
		}
		else
		{
			echo '<hr> <h3 align=center>Thank you!!!</h3>';
		}
?>
	
