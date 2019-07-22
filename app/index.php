<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
	h1 {
		text-align: center;
	}
	img {
		text-align: center;
		width:50%;
		margin: 0 auto;
	}

	#cont {
		width: 100%;
		text-align: center;
	}
	</style>
</head>
<body>
	<h1>Тест</h1>
	<hr>
	<div id="cont">

<?php
  $dir = 'images';
  $imgs_arr = array();
  // Check if image directory exists
  if (file_exists($dir) && is_dir($dir) ) {
    
      // Get files from the directory
      $dir_arr = scandir($dir);
      $arr_files = array_diff($dir_arr, array('.','..') );
      foreach ($arr_files as $file) {
        //Get the file path
        $file_path = $dir."/".$file;
        // Get extension
        $ext = pathinfo($file_path, PATHINFO_EXTENSION);
        if ($ext=="jpg" || $ext=="png" || $ext=="JPG" || $ext=="PNG") {
          array_push($imgs_arr, $file);
        }
        
      }
      $count_img_index = count($imgs_arr) - 1;
      $random_img = $imgs_arr[rand( 0, $count_img_index )];
  }
?>
<img src="<?php echo $dir."/".$random_img ?>">
</div>
</body>
</html>

