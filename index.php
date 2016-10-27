<html>
       
	<head>
	
	   <meta charset="UTF-8">
	   
		<title>
			Open3D.club
		</title>
		   
		<link rel="stylesheet" type="text/css" href="style/myStyle.css">
	   		   	
	</head>
	
	<body>
  
    <div id="header">
  		<img id="tric_finger" src="finger_02.gif" >
  		<a href= "mail.php">
  			<img id="tric1" src="upload.png" >
  		</a>
  		<p >Approaching the complete mastery of mind over material world, instant access to publics imagination... </p>
  		<a href= "/Prize/index.php">
  			<img id="tric2" src="3DPrizes.png" align="right" >
  		</a>  			
  	</div>
    
    <center>				
      
		<div class="main_section" id="main_section">
        <div id="divDesc" style="display:none">?&nbsp;</div>
       
        
	<script type="text/javascript">


		function myFunction(eSrc)	{

        	var y;
			y = eSrc.parentElement.id;
				
			var picFolder = "big/"; 
			 gifFolder = "gif/"
			var divPicClass = "divPictureActive";
			var imgClass = "pictureActive";			
									
			if ((document.getElementById("divPicture").className != "divPictureActive" && document.getElementById("divPicture").className != "divPictureActiveMedium") || document.getElementById("main_section").className != "mainSectionActive") {            
				document.getElementById("main_section").className  = "mainSectionActive";
				document.getElementById("divAllPictures").className = "divAllPictures";			
			}
			
			var mediumPic = isPictureMedium();
			if (mediumPic) {
				picFolder = "medium/";
				gifFolder = "gifMedium/";
				divPicClass = "divPictureActiveMedium";
				imgClass = "pictureActiveMedium";
			}
			
			document.getElementById("divPicture").className = divPicClass; 
			
			setPicturePosition();						
    			
			var hasDesc = false;
			var descVal = "";
			var hasGif = false;
			var descGifDiv = eSrc.nextSibling.nextSibling;
			var hasRar = false;
			var downloadLink = "<a class='notReady'><a>";
			var authorQRCodePng = descGifDiv.getAttribute("authorQRCodePng");
			authorHasQRCode = false;
			authorKey = 0;		
			//General code
			authorQRCode = "1Nc4rAwregHjxY6kwoeBnPTCz6JK5UWF3J";
			linkQR = "bitcoin:";

			if (descGifDiv.getAttribute("hasDesc") == '1') 
			{
			  hasDesc = true;
			  descVal = eSrc.nextSibling.nextSibling.innerHTML;
			}
			
			if (descGifDiv.getAttribute("hasGif") == '1') hasGif = true;
			
			if (descGifDiv.getAttribute("hasRar") == '1') 
			{
				hasRar = true;
				downloadLink = "<a class='print' href='javascript:download("+y+" , \"images/rar/"+y+".rar\")' ><a>";
			}
			
			if (descGifDiv.getAttribute("authorHasQRCode") == '1') 
			{
				authorHasQRCode = true;
				authorQRCode = descGifDiv.getAttribute("authorQRCode");				
			}
			
			linkQR += authorQRCode + "?label=Thank%20you";
			
			if (hasDesc) {
				if (hasGif) {
					document.getElementById("divPicture").innerHTML="<div class='relative'><div id='play' class='play' onclick='playPicture(this, gifFolder)'></div><div id='pause' class='pause' onclick='pausePicture(this)'></div><div id='close' class='close' onclick='hidePicture()'></div><div id='donate' class='donate' style='display:none'><a href='"+linkQR+"'><img class='bitCoinImg' src=\"images/bitCoinWallets/"+authorQRCodePng+".png\"></a></div><img id='"+y+"' class="+imgClass+" src=\"images/"+picFolder+y+".jpg\" onclick='start()'><div class='bigImgText'>" + descVal + "</div>" + downloadLink + "</div>";
				} else {
					document.getElementById("divPicture").innerHTML="<div class='relative'><div id='close' class='close' onclick='hidePicture()'></div><div id='donate' class='donate' style='display:none'><a href='" + linkQR + "'><img class='bitCoinImg' src=\"images/bitCoinWallets/"+authorQRCodePng+".png\"></a></div><img id='"+y+"' class="+imgClass+" src=\"images/"+picFolder+y+".jpg\" onclick='start()'><div class='bigImgText'>" + descVal + "</div>" + downloadLink + "</div>";
				}
			} else {
				document.getElementById("divPicture").innerHTML="<div class='relative'><div id='close' class='close' onclick='hidePicture()'></div><div id='donate' class='donate' style='display:none'><a href='" + linkQR + "'><img class='bitCoinImg' src=\"images/bitCoinWallets/"+authorQRCodePng+".png\"></a></div><img id='"+y+"' class="+imgClass+" src=\"images/"+picFolder+y+".jpg\" onclick='start()'>" + downloadLink + "</div>";
			}
						
		}        
          	
            
		function download(y, path) {
      	          
			picture = document.getElementById("divPicture").innerHTML;  
			// set commercial without play, print buttons. Close button will be displayed in 10 sec
			document.getElementById("divPicture").innerHTML = "<div id='closeCommercial' class='close' onclick='removeCommercial(picture)' style='display:none'></div><img id='"+y+"' class='pictureActive' src=\"images/commercial/commercialModel.gif\">";
					
			var ifrm = document.getElementById("frame");
			ifrm.src = path;	
			
			setTimeout(function(){
					// display exit button
					document.getElementById("closeCommercial").style.display = ""
			},10000);
		}
	  
		function removeCommercial(picture) 
		{	  	  
			document.getElementById("divPicture").innerHTML = picture;
		}

		function hidePicture() 
		{            
			document.getElementById("divPicture").className = "divPicture";
			document.getElementById("main_section").className  = "main_section";
			document.getElementById("divAllPictures").className = "divAllPicturesActive";
		}
      
		function playPicture(eSrc, gifFolder)
		{                        
			var y;
			y = eSrc.nextSibling.nextSibling.nextSibling.nextSibling.id

            document.getElementById("divPicture").firstChild.firstChild.nextSibling.nextSibling.nextSibling.nextSibling.src = "images/" + gifFolder +y + ".gif";
			document.getElementById("play").style.display = "none";
			document.getElementById("pause").style.display = "inline-block";
		}
      
		function pausePicture(eSrc)
		{
			var y;
            y = eSrc.nextSibling.nextSibling.nextSibling.id;

			document.getElementById("divPicture").firstChild.firstChild.nextSibling.nextSibling.nextSibling.nextSibling.src = "images/big/" + y + ".jpg";
			document.getElementById("play").style.display = "inline-block";
			document.getElementById("pause").style.display = "none";
		}
      
		function start(){

		}
      
		window.onresize = function(){
			setPicturePosition();
		} 
  
		function setPicturePosition() {
		  
			var divPicture = document.getElementById('divPicture');
			var divAllPictures = document.getElementById('divAllPictures');
			var leftAllPictures = divAllPictures.offsetLeft + divAllPictures.offsetWidth;
			divPicture.style.left = leftAllPictures +"px";   

		}
  
		function isPictureMedium() {

			var result = false;

			var w = window.innerWidth;
			var h = window.innerHeight;

			var divAllPictures = document.getElementById('divAllPictures');
			var allPicsRightPosition = divAllPictures.offsetLeft + divAllPictures.offsetWidth;

			if ( (w-allPicsRightPosition) < 1100) result = true;

			return result;

		}
		
		function donate(eSrc) {
			
			document.getElementById("divPicture").firstChild.firstChild.nextSibling.nextSibling.nextSibling.style.display = "inline-block";
		}
               
</script>
  

<?php

	$htmlString;
	$pieces;
	$tmpArr = array();
	$descArr = array();
	$lines = file('Descriptions.txt');

	//Div with authors and their QR codes
	
	$piecesQR;
	$tmpArray = array();
	$AuthorArr = array();
	$QRCodeArr = array();
	$linesQR = file('AuthorQRCode.txt');

	foreach ($linesQR as $line_num => $line) {

		$lineParts = explode(";", $line);
		
		foreach ($lineParts as $line)
		{
			$piecesQR = explode("_", $line);
			$AuthorArr[] = $piecesQR[1];
			$QRCodeArr[] = $piecesQR[2];
		}								
	}
	
	$htmlString = "<div id='divAllPictures' class='divAllPicturesActive'>"; 							

	foreach ($lines as $line_num => $line) {

		$lineParts = explode(";", $line);
		$line = $lineParts[0];
		
		$pieces = explode("_", $line);
		$descArr[] = $pieces;
		foreach ($pieces as $piece) {				 
		}
		$tmpArr[] = $pieces[0];
	}

	foreach($tmpArr as $arrItem) {
		$arrKey;
		$arrKey = array_search($arrItem, $tmpArr);
	}


	$image_types = array(
		'gif' => 'image/gif',
		'png' => 'image/png',
		'jpg' => 'image/jpeg',
	);

	$dir = 'images/small/';
	$files = scandir($dir);

	foreach(glob($dir.'*') as $filename){
		$arrKey;
		$imgName = basename($filename);
		$imgNameArr = explode(".", basename($filename));
		$imgId = $imgNameArr[0]; 
		$searchItem = $imgNameArr[0] . ".";
		$hasDesc = false;
		$hasGif = false;
		$hasRar = false;
		
		//Check if rar file exists on server		
		$rarFilename = 'images/rar/' .$imgId. '.rar';		
		
		if (file_exists($rarFilename)) {
			$hasRar = true;
		}

		if (in_array($searchItem, $tmpArr)) {		
			$arrKey = array_search($searchItem, $tmpArr);      
			$desc = $descArr[$arrKey];    
			$hasDesc = true;
			$authorName = $desc[2];
			$authorQRCodePng = "GeneralCode";
			$authorHasQRCode = false;
			$authorKey = 0;
			//General code
			$authorQRCode = "1Nc4rAwregHjxY6kwoeBnPTCz6JK5UWF3J"; 
			if (in_array($authorName, $AuthorArr)) {
				$authorKey = array_search($authorName, $AuthorArr);
				$authorQRCode = $QRCodeArr[$authorKey];
				$authorHasQRCode = true;
				$authorQRCodePng = $authorName;
			}			
			$longDesc = "";
			$shortDesc = $desc[2] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $desc[3];    

			$descLen = count($desc);
			for ($i = 2; $i < $descLen; $i++)
			{							
				if ($longDesc == ""){
				  $longDesc = "<span onmouseover='donate(this)'>" . $desc[$i] . "</span>";				  				  	 
				} else {
				  $longDesc .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $desc[$i];
				}
			}
				if ($desc[1] == 'gif') $hasGif = true;
				$htmlString .= "<div id='" . $imgId . "' class='img'><img class='picture' src=\"images/small/" . $imgId . ".jpg\"	onclick='myFunction(this)' ><div class='imgText'>" . $shortDesc . "</div><div style='display: none' hasDesc='" . $hasDesc . "' hasGif='" . $hasGif ."' hasRar='" . $hasRar . "' authorQRCodePng='" . $authorQRCodePng . "' authorHasQRCode='" . $authorHasQRCode. "' authorQRCode='" . $authorQRCode . "'>" . $longDesc ."</div></div>";
			}
			else {
				$htmlString .= "<div id='" . $imgId . "' class='img'><img class='picture' src=\"images/small/" . $imgId . ".jpg\"	onclick='myFunction(this)' ><div class='imgText'>&nbsp;</div><div style='display: none' hasDesc='" . $hasDesc . "' hasGif='" . $hasGif ."' hasRar='" . $hasRar . "' authorQRCodePng='" . $authorQRCodePng . "' authorHasQRCode='" . $authorHasQRCode. "' authorQRCode='" . $authorQRCode . "'></div></div>";
			}
		}

	$htmlString .= "</div>";
	
	
	echo $htmlString;

?>

        <div id="divPicture" class="divPicture">&nbsp;</div>         
        <iframe id="frame" style="display:none"></iframe>
        
      </div>	
    </center>
 </body>
				
</html>