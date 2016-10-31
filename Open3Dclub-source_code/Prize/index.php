<html>
       
	<head>
	
	   <meta charset="UTF-8">
	   
		<title>
			3DPrize
		</title>
		   
		<link rel="stylesheet" type="text/css" href="style/myStyle.css">			
	   		   	
	</head>
	
	<body>	
  
    <div id="header">
  		<img id="tric_finger" src="finger_02.gif" >
  		<a href= "http://www.open3d.club/index.php">
  			<img id="tric1" src="download.png" >
  		</a>
  		<p >"The ultimate purpose of invention is the complete mastery of mind over the material world" </p>  
  		<a href= "http://www.open3d.club/Prize/index.php">
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
			youtubeLink = "";
			embeddedVideoClass = "embeddedVideo";
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
				embeddedVideoClass = "embeddedVideoMedium";
			}
			
			document.getElementById("divPicture").className = divPicClass; 
			
			setPicturePosition();						
    			
			var hasDesc = false;
			var descVal = "";
			var hasGif = false;
			var descGifDiv = eSrc.nextSibling.nextSibling;
			var hasRar = false;
			var QRCode = descGifDiv.getAttribute("QRCode");
			//https://blockchain.info/address/1ErZ54tZ3KFLvSA1zDXJiW6zcppupZakoA
			var downloadLink = "<a class='print' target='_blank' href='https://blockchain.info/address/" + QRCode + "'></a>";
			youtubeLink = descGifDiv.getAttribute("youtubeLink");

			if (descGifDiv.getAttribute("hasDesc") == '1') 
			{
			  hasDesc = true;
			  descVal = eSrc.nextSibling.nextSibling.textContent;
			}
			
			if (descGifDiv.getAttribute("hasGif") == '1') hasGif = true;			
			
			if (hasDesc) {
				if (hasGif) {
					document.getElementById("divPicture").innerHTML="<div class='relative'><div id='play' class='play' onclick='playPicture(this, youtubeLink)'></div><div id='pause' class='pause' onclick='pausePicture(this)'></div><div id='close' class='close' onclick='hidePicture()'></div><img id='"+y+"' class="+imgClass+" src=\"images/"+picFolder+y+".jpg\" onclick='start()'><div class='bigImgText'>" + descVal + "</div>" + downloadLink + "</div>";
				} else {
					document.getElementById("divPicture").innerHTML="<div class='relative'><div id='close' class='close' onclick='hidePicture()'></div><img id='"+y+"' class="+imgClass+" src=\"images/"+picFolder+y+".jpg\" onclick='start()'><div class='bigImgText'>" + descVal + "</div>" + downloadLink + "</div>";
				}
			} else {
				document.getElementById("divPicture").innerHTML="<div class='relative'><div id='close' class='close' onclick='hidePicture()'></div><img id='"+y+"' class="+imgClass+" src=\"images/"+picFolder+y+".jpg\" onclick='start()'>" + downloadLink + "</div>";
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
      
		function playPicture(eSrc, youtubeLink)
		{            
			var y;
			y = eSrc.nextSibling.nextSibling.nextSibling.id;
			
			//embededVideo
			var youtubeHtml = "<embed class='" + embeddedVideoClass + "' src='" + youtubeLink + "' type='application/x-shockwave-flash'>";
			document.getElementById("divPicture").firstChild.firstChild.nextSibling.nextSibling.nextSibling.style.display = "none";
			document.getElementById("divPicture").firstChild.firstChild.nextSibling.nextSibling.nextSibling.nextSibling.style.display = "none";
			document.getElementById("divPicture").firstChild.innerHTML += youtubeHtml;
			
			document.getElementById("divPicture").firstChild.lastChild.previousSibling.setAttribute('class', 'printPlayed');
			
			document.getElementById("play").style.display = "none";
			document.getElementById("pause").style.display = "inline-block";
		}
      
		function pausePicture(eSrc){

			var y;
			y = eSrc.nextSibling.nextSibling.id;

			document.getElementById("divPicture").firstChild.firstChild.nextSibling.nextSibling.nextSibling.src = "images/big/" + y + ".jpg";
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
               
</script>
  

<?php

	$htmlString;
	$pieces;
	$tmpArr = array();
	$descArr = array();	
	$lines = file('Descriptions.txt');

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
			$longDesc = "";
			$shortDesc = $desc[3] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $desc[4];  
			$QRCode = "";	
			$youtubeLink = $desc[1];
			
		    $descLen = count($desc);		  
			for ($i = 3; $i < $descLen; $i++){

				if ($longDesc == ""){
					$longDesc = $desc[$i];
				} else {
					$longDesc .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $desc[$i];
				}
			}
			
			$lastItem = $desc[$descLen-1];
						
			$firstDelimiter = "[";
			$secondDelimiter = "]";
			$firstPos = strpos($lastItem, $firstDelimiter) + 1;
			$secondPos = strpos($lastItem, $secondDelimiter);
			$QRLen = $secondPos - $firstPos;
			
			$QRCode = substr($lastItem, $firstPos, $QRLen);

			if ($desc[2] == 'gif') $hasGif = true;
			$htmlString .= "<div id='" . $imgId . "' class='img'><img class='picture' src=\"images/small/" . $imgId . ".jpg\"	onclick='myFunction(this)' ><div class='imgText'>" . $shortDesc . "</div><div style='display: none' hasDesc='" . $hasDesc . "' hasGif='" . $hasGif ."' hasRar='" . $hasRar . "' QRCode='" . $QRCode . "' youtubeLink='" . $youtubeLink . "'>" . $longDesc ."</div></div>";
		}
		else {
			$htmlString .= "<div id='" . $imgId . "' class='img'><img class='picture' src=\"images/small/" . $imgId . ".jpg\"	onclick='myFunction(this)' ><div class='imgText'>&nbsp;</div><div style='display: none' hasDesc='" . $hasDesc . "' hasGif='" . $hasGif ."' hasRar='" . $hasRar . "'></div></div>";
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