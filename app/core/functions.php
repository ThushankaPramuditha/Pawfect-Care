<?php 

function show($stuff)
{
	echo "<pre>";
	print_r($stuff);
	echo "</pre>";
}

function esc($str)
{
	return htmlspecialchars($str);
}


function redirect($path)
{
	header("Location: " . ROOT."/".$path);
	die;
}

//function to upload images
function upload($file,$path): string {
	//ex: tommy.jpg -> i want to store it in pets section of the images
	//therefore $path = pets

    $target_dir = "./uploads/".$path."/";
	//target_dir = "./uploads/pets/"

    $filename = uniqid();
	//$filename = 213123123

	//to get the extention name at the end of the image we are uploading, we use pathinfo($file["name"], PATHINFO_EXTENSION);
    $target_file = $target_dir . $filename . "." . pathinfo($file["name"], PATHINFO_EXTENSION);
	//target_file = "./uploads/pets/213123123.jpg"

    $imageFileType = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));

 
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return $filename . "." . pathinfo($file["name"], PATHINFO_EXTENSION);
        } else {
            return "";
        }
	}
    
