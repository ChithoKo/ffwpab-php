<?php

/**
 * @Author: CharlesKo
 * @Date:   2017-10-24 16:04:46
 * @Last Modified by:   CharlesKo
 * @Last Modified time: 2017-11-10 13:57:14
 */

$pathOri = '/Applications/XAMPP/xamppfiles/htdocs/ffwpab_ver1.1/ffwpab-web/src/image/';

// upload single file
function uploadFile($fileInfo, $path = '/Applications/XAMPP/xamppfiles/htdocs/ffwpab_ver1.1/ffwpab-web/src/image/', $allowExt = array('gif', 'jpg', 'jpeg', 'png', 'wbmp'), $maxSize = 2097152, $imgFlag = true){

	// echo 'POST during upload: ' . is_uploaded_file($fileInfo['tmp_name']) . '<br/>';				/////////////////////////////////////////////

	if($fileInfo['error'] == UPLOAD_ERR_OK){
		if(is_uploaded_file($fileInfo['tmp_name'])){
			// echo 'POST during upload 2: ' . is_uploaded_file($fileInfo['tmp_name']) . '<br/>';	/////////////////////////////////////////////

			// 
			$ext = getExt($fileInfo['name']);
			$filename = getUniName() . ".$ext";
			if(!in_array($ext, $allowExt)){
				exit('this kind of file extension is illegal');
			}
			if($fileInfo['size'] > $maxSize){
				exit('the file size is over large');
			}
			if($imgFlag){
				// 如何验证图片是否真正的图片类型，是否只是其他文件改了个扩展名 等
				// getimagesize($filename) 验证是否真正图片类型, return false if fake img
				$info = getimagesize($fileInfo['tmp_name']);
				if(!$info){
					exit('not a real img type');
				}
			}

			$destination = $path . $filename;
			// echo "<br/>destination is : $destination<br/>";														////////////////////////
			if(move_uploaded_file($fileInfo['tmp_name'], $destination)){
				// echo '<br/>POST uploading? ' . is_uploaded_file($fileInfo['tmp_name']) . '<br/>';							////////////////////////
				unset($fileInfo['error'], $fileInfo['size'], $fileInfo['type'], $fileInfo['tmp_name']);
				$fileInfo['name'] = $filename;
				// echo "<br/>name : " . $fileInfo['name'] . "<br/>";												////////////////////////
				// print_r($fileInfo);																				////////////////////////
				return $fileInfo;
			}else{
				$msg = 'move failed';
			}
		}else{
			$msg = 'it is not uploaded through POST';
			echo $msg;
		}
	}else{
		switch($fileInfo['error']){
			case 1:
				$msg = 'UPLOAD_ERR_INI_SIZE';
				break;
			case 2:
				$msg = 'UPLAOD_ERR_FORM_SIZE';
				break;
			case 3:
				$msg = 'UPLAOD_ERR_PARTIAL';
				break;
			case 4:
				$msg = 'UPLOAD_ERR_NO_FILE';
				break;
			case 6:
				$msg = 'UPLOAD_ERR_NO_TMP_DIR';
				break;
			case 7:
				$msg = 'UPLOAD_ERR_CANT_ERITE';
				break;
			case 8:
				$msg = 'UPLOAD_ERR_EXTENSION';
				break;
		}
	}

	echo $msg;
}

// 
function buildInfo(){
	$files = array();
	// print_r($_FILES);																				/////////////////////////////////////////////

	foreach ($_FILES as $file){
		// 
		if(is_string($file['name'])){
			$files[] = $file;
		}else{
			foreach ($file['name'] as $key => $value){
				// echo '<br/>POST?' . is_uploaded_file($file['tmp_name'][$key]) . '<br/>';				/////////////////////////////////////////////

				$files[$key]['name'] = $value;
				$files[$key]['size'] = $file['size'][$key];
				$files[$key]['tmp_name'] = $file['tmp_name'][$key];
				$files[$key]['error'] = $file['error'][$key];
				$files[$key]['type'] = $file['type'][$key];
			}
		}
	}
	// echo 'POST before output: ' . is_uploaded_file($files[0]['tmp_name']) . '<br/>';				/////////////////////////////////////////////
	return $files;
}

// upload multiple files
function uploadFiles($path = '/Applications/XAMPP/xamppfiles/htdocs/ffwpab_ver1.1/ffwpab-web/src/image/'){
	$fileInfos = array();

	if(!file_exists($path)){
		mkdir($path, 0775, true);
	}

	$files = buildInfo();
	// echo 'POST after output: ' . is_uploaded_file($files[0]['tmp_name']) . '<br/>';				/////////////////////////////////////////////

	foreach ($files as $file) {
		// echo 'POST before upload: ' . is_uploaded_file($file['tmp_name']) . '<br/>';				/////////////////////////////////////////////

		$fileInfos[] = uploadFile($file);
	}

	return $fileInfos;
}

// resize the image to different sizes
function resizeRegularImage($filename, $file_width=null, $crop_length=null, $src_x=0, $src_y=0, $path='/Applications/XAMPP/xamppfiles/htdocs/ffwpab_ver1.1/ffwpab-web/src/image/'){
	global $pathOri;
	
	$orifilename = $path . $filename;
	list($src_w, $src_h, $imagetype) = getimagesize($orifilename);
	$mime = image_type_to_mime_type($imagetype);

	$createFunc = str_replace('/', 'createfrom', $mime);
	$outputFunc = str_replace('/', null, $mime);

	$src_cropped_wh = '';
	if($file_width){
		$src_cropped_wh = $crop_length * $src_w / $file_width;
		$src_x = $src_x * $src_w / $file_width;
		$src_y = $src_y * $src_w / $file_width;
	}

	$src_image = $createFunc($orifilename);
	if($src_w > $src_h){
		$dst_50_h = 50;
		$dst_220_h = 220;
		$dst_350_h = 350;
		$dst_800_h = 800;
		$dst_50_w = ceil($src_w * 50 / $src_h);
		$dst_220_w = ceil($src_w * 220 / $src_h);
		$dst_350_w = ceil($src_w * 350 / $src_h);
		$dst_800_w = ceil($src_w * 800 / $src_h);
		if($src_cropped_wh == ''){
			$src_cropped_wh = $src_h;	
		}
																				///////////////////////////////////////////////
	}else{
		$dst_50_w = 50;
		$dst_220_w = 220;
		$dst_350_w = 350;
		$dst_800_w = 800;
		$dst_50_h = ceil($src_h * 50 / $src_w);
		$dst_220_h = ceil($src_h * 220 / $src_w);
		$dst_350_h = ceil($src_h * 350 / $src_w);
		$dst_800_h = ceil($src_h * 800 / $src_w);
		if($src_cropped_wh == ''){
			$src_cropped_wh = $src_w;	
		}																		///////////////////////////////////////////////

	}

	$dst_50_image = imagecreatetruecolor($dst_50_w, $dst_50_h);
	$dst_220_image = imagecreatetruecolor($dst_220_w, $dst_220_h);
	$dst_350_image = imagecreatetruecolor($dst_350_w, $dst_350_h);
	$dst_800_image = imagecreatetruecolor($dst_800_w, $dst_800_h);
	$dst_cropped_50_image = imagecreatetruecolor($dst_50_w, $dst_50_w);			///////////////////////////////////////////////
	$dst_cropped_220_image = imagecreatetruecolor($dst_220_w, $dst_220_w);		///////////////////////////////////////////////
	$dst_cropped_350_image = imagecreatetruecolor($dst_350_w, $dst_350_w);		///////////////////////////////////////////////
	$dst_cropped_800_image = imagecreatetruecolor($dst_800_w, $dst_800_w);		///////////////////////////////////////////////

	// imagecopyresampled(dst_image, src_image, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)

	imagecopyresampled($dst_50_image, $src_image, 0, 0, 0, 0, $dst_50_w, $dst_50_h, $src_w, $src_h);
	imagecopyresampled($dst_220_image, $src_image, 0, 0, 0, 0, $dst_220_w, $dst_220_h, $src_w, $src_h);
	imagecopyresampled($dst_350_image, $src_image, 0, 0, 0, 0, $dst_350_w, $dst_350_h, $src_w, $src_h);
	imagecopyresampled($dst_800_image, $src_image, 0, 0, 0, 0, $dst_800_w, $dst_800_h, $src_w, $src_h);
	imagecopyresampled($dst_800_image, $src_image, 0, 0, 0, 0, $dst_800_w, $dst_800_h, $src_w, $src_h);
	imagecopyresampled($dst_cropped_50_image, $src_image, 0, 0, $src_x, $src_y, $dst_50_w, $dst_50_w, $src_cropped_wh, $src_cropped_wh);	///////////////////
	imagecopyresampled($dst_cropped_220_image, $src_image, 0, 0, $src_x, $src_y, $dst_220_w, $dst_220_w, $src_cropped_wh, $src_cropped_wh);	///////////////////
	imagecopyresampled($dst_cropped_350_image, $src_image, 0, 0, $src_x, $src_y, $dst_350_w, $dst_350_w, $src_cropped_wh, $src_cropped_wh);	///////////////////
	imagecopyresampled($dst_cropped_800_image, $src_image, 0, 0, $src_x, $src_y, $dst_800_w, $dst_800_w, $src_cropped_wh, $src_cropped_wh);	///////////////////

	$destination_50 = $path . '50/';
	$destination_220 = $path . '220/';
	$destination_350 = $path . '350/';
	$destination_800 = $path . '800/';
	$destination_cropped_50 = $path . 'cropped/50/';																///////////////////////////////////////////////
	$destination_cropped_220 = $path . 'cropped/220/';																///////////////////////////////////////////////
	$destination_cropped_350 = $path . 'cropped/350/';																///////////////////////////////////////////////
	$destination_cropped_800 = $path . 'cropped/800/';																///////////////////////////////////////////////

	if($destination_50 && file_exists(dirname($destination_50))){
		$dst_50_file = $destination_50 . $filename;
	}
	if($destination_220 && file_exists(dirname($destination_220))){
		$dst_220_file = $destination_220 . $filename;
	}
	if($destination_350 && file_exists(dirname($destination_350))){
		$dst_350_file = $destination_350 . $filename;
	}
	if($destination_800 && file_exists(dirname($destination_800))){
		$dst_800_file = $destination_800 . $filename;
	}
	if($destination_cropped_50 && file_exists(dirname($destination_cropped_50))){
		$dst_cropped_50_file = $destination_cropped_50 . $filename;
	}
	if($destination_cropped_220 && file_exists(dirname($destination_cropped_220))){
		$dst_cropped_220_file = $destination_cropped_220 . $filename;
	}
	if($destination_cropped_350 && file_exists(dirname($destination_cropped_350))){
		$dst_cropped_350_file = $destination_cropped_350 . $filename;
	}
	if($destination_cropped_800 && file_exists(dirname($destination_cropped_800))){
		$dst_cropped_800_file = $destination_cropped_800 . $filename;
	}

	$outputFunc($dst_50_image, $dst_50_file);
	$outputFunc($dst_220_image, $dst_220_file);
	$outputFunc($dst_350_image, $dst_350_file);
	$outputFunc($dst_800_image, $dst_800_file);
	$outputFunc($dst_cropped_50_image, $dst_cropped_50_file);
	$outputFunc($dst_cropped_220_image, $dst_cropped_220_file);
	$outputFunc($dst_cropped_350_image, $dst_cropped_350_file);
	$outputFunc($dst_cropped_800_image, $dst_cropped_800_file);

	imagedestroy($src_image); 
	imagedestroy($dst_50_image);
	imagedestroy($dst_220_image);
	imagedestroy($dst_350_image);
	imagedestroy($dst_800_image);
	imagedestroy($dst_cropped_50_image);
	imagedestroy($dst_cropped_220_image);
	imagedestroy($dst_cropped_350_image);
	imagedestroy($dst_cropped_800_image);
}

// get a unique name that will never get the same name with 2 files
function getUniName(){
	return md5(uniqid(microtime(true), true));
}

// get the extension of the selected file
function getExt($filename){
	return strtolower(end(explode('.', $filename)));
}


// testing -----------------------------------------------------------------------------------------------------------------------------------------------
// echo 'upload > function > php<br/>';
// uploadFiles();
