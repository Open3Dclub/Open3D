<?php

$max_allowed_file_size = 51200; // size in KB 
$allowed_extensions = array("jpg", "jpeg", "qcode", "stl");
$upload_folder = './uploads/'; //<-- this folder must be writeable by the script
$your_email = 'open3dclub@gmail.com';//<<--  update this to your email address

$errors ='';

if(isset($_POST['submit']))
{
	//Get the uploaded file information
	$name_of_uploaded_file =  basename($_FILES['uploaded_file']['name']);
	
	//Name without extension
	
	//get the file extension of the file
	$type_of_uploaded_file = substr($name_of_uploaded_file, strrpos($name_of_uploaded_file, '.') + 1);
	
	$size_of_uploaded_file = $_FILES["uploaded_file"]["size"]/1024;
	
	///------------Do Validations-------------
	if(empty($_POST['name'])||empty($_POST['email']))
	{
		$errors .= "\n Name and Email are required fields. ";	
	}
	if(IsInjected($visitor_email))
	{
		$errors .= "\n Bad email value!";
	}
	
	if($size_of_uploaded_file > $max_allowed_file_size ) 
	{
		$errors .= "\n Size of file should be less than $max_allowed_file_size";
	}
	
	//------ Validate the file extension -----
	$allowed_ext = false;
	for($i=0; $i<sizeof($allowed_extensions); $i++) 
	{ 
		if(strcasecmp($allowed_extensions[$i],$type_of_uploaded_file) == 0)
		{
			$allowed_ext = true;		
		}
	}
	
	if(!$allowed_ext)
	{
		$errors .= "\n The uploaded file is not supported file type. ".
		" Only the following file types are supported: ".implode(',',$allowed_extensions);
	}
	
	//send the email 
	if(empty($errors))
	{
		//copy the temp. uploaded file to uploads folder
		$path_of_uploaded_file = $upload_folder . $name_of_uploaded_file;
		$tmp_path = $_FILES["uploaded_file"]["tmp_name"];
		
		if(is_uploaded_file($tmp_path))
		{
		    if(!copy($tmp_path,$path_of_uploaded_file))
		    {
		    	$errors .= '\n error while copying the uploaded file';
		    }
		}
		
		//send the email.. we'll be using phpMailer
		
		require("PHPMailer/class.phpmailer.php");
		$mail = new PHPMailer();
		
		
		$mail = new PHPMailer();
	
		$mail->IsSMTP();  // telling the class to use SMTP
		$mail->Host     = "mail.tricstudio.com"; // SMTP server
		
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'tricstud';                            // SMTP username
		$mail->Password = 'q3QUbpbW0H';   
		
		$mail->From     = "bojana@tricstudio.com";
		$mail->AddAddress("open3dclub@gmail.com");
		$mail->AddAddress("vladababic@gmail.com");
		
		$mail->Subject  = "Model korisnika " . $_POST['name'] . " (email: " . $_POST['email'] . ")";
		$mail->Body     = "Korisnik: " . $_POST['name'] . "\nEmail: " . $_POST['email'] ."\nNaziv modela: " . $_POST['3DmodelName'] . "\n" . $_POST['message'];
		$mail->WordWrap = 50;
		
		$mail->AddAttachment($path_of_uploaded_file);      // attachment
		 
		if(!$mail->Send()) {
			echo 'Message was not sent.';
			echo 'Mailer error: ' . $mail->ErrorInfo;
		} else {
			echo 'Message has been sent.';
		}			
	}
}
///////////////////////////Functions/////////////////
// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
?>

<html>
<head>
	
	   <meta charset="UTF-8">
	   
		<title>
			Upload
		</title>
		   
		
	   		   	
		<!-- a helper script for vaidating the form-->
		<script language="JavaScript" src="scripts/gen_validatorv31.js" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="style/myStyle.css">
		<link href="style/bootstrap.min.css" rel="stylesheet">
		<link href="style/bootstrap-theme.min.css" rel="stylesheet">
		
		
	   	</style>
	</head>
	
	<body>
	
		<script src="scripts/jquery-2.1.0.min.js"></script>
		<script src="scripts/bootstrap.min.js"></script>

		<script src="scripts/jquery-ui-1.10.4.custom.min.js"></script>		
	
	
		<div id="headerManifesto">
			<a href= "http://www.open3d.club">
			<img id="tric1" src="download.png" >
			</a>
			<p class="pManifesto">Design. Share. Print. </p>
			<a href= "http://www.open3d.club/Prize/index.php">
			<img id="tric2" src="3DPrizes.png" align="right" >
			</a>
		</div>
		
		<div class="content">
		<div class="policyAndMail">
		
			<!-- Nav tabs -->
			<ul class="nav nav-tabs">
			  <li class="active calibris"><a href="#policy" data-toggle="tab">Terms and Principles</a></li>
			  <li class="calibris"><a href="#mail" data-toggle="tab">Send us your 3D design</a></li>
			  <li class="calibris"><a href="#advertisement" data-toggle="tab">0ΣAdvertisement</a></li>
			  <li class="calibris"><a href="#source" data-toggle="tab">Distribution of Btc</a></li>	
			  <li class="calibris"><a href="#thanks" data-toggle="tab">AltCoins</a></li>
			  <li class="calibris"><a href="#white" data-toggle="tab"> DraftDocument</a></li>	  
			</ul>
			
			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane active mpcontent" id="policy">					
					<img id="policyImg" src="images/PrivacyAndPolicyText.jpg" alt="As users we believe in privacy, as artists we believe in freedom of sharing. Above all, we believe in cooperation. By doing work for Open3D team you agree to these principles.Free - Free 3D printable objects, instant and free access to publics imagination. All 3D models, once uploaded to the platform are, and will be free forever, for everyone to use them. Free software should not be used to   collect data about users’ activity and this should always stay verifiable through the free and open source.Fairness - All credits will be fairly attributed to the contributors of the project and they will also be used as a base for the reputation system. This system should ensure that all participants will be objectively rewarded for their contribution, based on constant statistical measurement of the platform usage data.Decentralised - All areas of the Open3D club should eventually evolve towards a distributed network which will reflect a will of the majority of participants.">
				</div>
												
				<div class="tab-pane mpcontent" id="source">
					<img id="sourceImg" src="images/Distribution_of_Btc.jpg">
				</div>
				
				<div class="tab-pane mpcontent" id="advertisement">					
					<img id="advertiseImg" src="images/Advertise.jpg">
				</div>
				
				<div class="tab-pane mpcontent" id="thanks">
					<img id="thanksImg" src="images/Lite_Dark_Ether_Coin.jpg">
				</div>
				
				<div class="tab-pane mpcontent" id="white">
					<img id="whiteImg" src="images/WhitePaper.jpg" alt="As users">
				</div>
				
				
				
				<div class="tab-pane mpcontent" id="mail">
					<?php
						
						if(!empty($errors))
						{
							echo "<table class='mailForm'><tr><td>" . nl2br($errors) . "</td></tr></table>";
						}
					?>
					<form method="POST" name="email_form_with_php" class="form-inline" role="form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data"> 
							
						<table class="mailForm">
							<tr>
								<td><input type="email" name="email" class="form-control" placeholder="Your email..."></td>
								<td><input type="text" name="name" class="form-control" placeholder="Pseudonym or name..."></td>
								<td><input type="text" name="3DmodelName" class="form-control" placeholder="3D model name..."></td>
								<td><input type="file" name="uploaded_file" placeholder="Attach 3D model..."></td>
							</tr>							
							<tr>
								<td colspan="4"><textarea type="text" name="message" class="form-control" placeholder="All fildes above have to be filled in before sending 3Dmodel... This big message file is an optional" rows="5" cols="110"></textarea></td>							
							</tr>
							<tr>
								<td colspan="4"><input type="submit" value="Send" name='submit' class="btn btn-default"></td>
							</tr>
						</table>
															
					</form>
				</div>	
				
				<a href="bitcoin:32GdjbDbZu71jCBjFXMLPjF96aYqnC9N8y?label=Thank%20you">
					<div class="bitcoinDonation"></div>
				</a>
				
			</div>
		</div>
		</div>

		<script language="JavaScript">
			// Code for validating the form
			// Visit http://www.javascript-coder.com/html-form/javascript-form-validation.phtml
			// for details
			var frmvalidator  = new Validator("email_form_with_php");
			frmvalidator.addValidation("name","req","Please provide your name"); 
			frmvalidator.addValidation("email","req","Please provide your email"); 
			frmvalidator.addValidation("email","email","Please enter a valid email address"); 
			
			$( "#combobox" ).autocomplete({
				change: function( event, ui ) {
					alert("jupii");
				}
			});
			$( "#combobox" ).on( "autocompletechange", function( event, ui ) { alert ("juuu"); } ); 
			 
		</script>

</body>
</html>



