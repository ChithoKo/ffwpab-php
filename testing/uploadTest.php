<?php

/**
 * @Author: CharlesKo
 * @Date:   2017-10-21 17:45:16
 * @Last Modified by:   CharlesKo
 * @Last Modified time: 2017-11-07 17:35:54
 */

// print_r($_FILES);
require_once '../include.php';

$name = $_FILES['filesUploaded']['name'];
$type = $_FILES['filesUploaded']['type'];
$tmp_name = $_FILES['filesUploaded']['tmp_name'];
$error = $_FILES['filesUploaded']['error'];
$size = $_FILES['filesUploaded']['size'];

echo 'apache owner : ' . exec('whoami') . "<br/>\n";
echo "name : $name";

// var_dump($_FILES);

// foreach ($_FILES as $file){
// 	foreach ($file as $key => $value){
// 		print_r($value);
// 		echo "<br/>key : $key <br/>";
// 	}
// }

// move_uploaded_file($_FILES['filesUploaded']['tmp_name'], 'img/' . $_FILES['filesUploaded']['name']);
// if($error == UPLOAD_ERR_OK){
// 		if(is_uploaded_file($tmp_name)){
// 			$destination = 'img/' . $name;
// 			echo "<br/>destination is : $destination<br/>";
// 			if(move_uploaded_file($tmp_name, $destination)){
// 				echo 'success';
// 			}
// 		}
// }

// echo is_uploaded_file($_FILES['filesUploaded']['tmp_name']);
// // uploadFile($_FILES['filesUploaded'], 'img/');

// // print_r(buildInfo());
// // uploadFiles();


// // upload multiple files
// function uploadFiles($path = null){
// 	if($path == null){
// 		$path = 'img/';
// 	}
// 	if(!file_exists($path)){
// 		mkdir($path, 0775, true);
// 	}
// 	$files = buildInfo();
// 	foreach ($files as $file) {
// 		uploadFile($file);
// 	}
// }


// // 
// function buildInfo(){
// 	$files = array();
// 	foreach ($_FILES as $file){
// 		// 
// 		if(is_string($file['name'])){
// 			$files[] = $file;
// 		}else{
// 			foreach ($file['name'] as $key => $value){
// 				echo '<br/>POST?' . is_uploaded_file($file['tmp_name'][$key]) . '<br/>';					/////////////////////////////////////////////
// 				$files[$key]['name'] = $value;
// 				$files[$key]['size'] = $file['size'][$key];
// 				$files[$key]['tmp_name'] = $file['tmp_name'][$key];
// 				$files[$key]['error'] = $file['error'][$key];
// 				$files[$key]['type'] = $file['type'][$key];
// 			}
// 		}
// 	}
// 	return $files;
// }



// // upload single file
// function uploadFile($fileInfo, $path = 'img/', $allowExt = array('gif', 'jpg', 'jpeg', 'png', 'wbmp'), $maxSize = 2097152, $imgFlag = true){

// 	if($fileInfo['error'] == UPLOAD_ERR_OK){
// 		if(is_uploaded_file($fileInfo['tmp_name'])){

// 			// 
// 			$ext = getExt($fileInfo['name']);
// 			$filename = getUniName() . ".$ext";
// 			if(!in_array($ext, $allowExt)){
// 				exit('this kind of file extension is illegal');
// 			}
// 			if($fileInfo['size'] > $maxSize){
// 				exit('the file size is over large');
// 			}
// 			if($imgFlag){
// 				// 如何验证图片是否真正的图片类型，是否只是其他文件改了个扩展名 等
// 				// getimagesize($filename) 验证是否真正图片类型, return false if fake img
// 				$info = getimagesize($fileInfo['tmp_name']);
// 				if(!$info){
// 					exit('not a real img type');
// 				}
// 			}

// 			$destination = $path . $filename;
// 			// echo "<br/>destination is : $destination<br/>";														////////////////////////
// 			if(move_uploaded_file($fileInfo['tmp_name'], $destination)){
// 				unset($fileInfo['error'], $fileInfo['size'], $fileInfo['type'], $fileInfo['tmp_name']);
// 				// echo "<br/>name : " . $fileInfo['name'] . "<br/>";												////////////////////////
// 				return $fileInfo;
// 			}else{
// 				$msg = 'move failed';
// 			}
// 		}else{
// 			$msg = 'it is not uploaded through POST';
// 		}
// 	}else{
// 		switch($fileInfo['error']){
// 			case 1:
// 				$msg = 'UPLOAD_ERR_INI_SIZE';
// 				break;
// 			case 2:
// 				$msg = 'UPLAOD_ERR_FORM_SIZE';
// 				break;
// 			case 3:
// 				$msg = 'UPLAOD_ERR_PARTIAL';
// 				break;
// 			case 4:
// 				$msg = 'UPLOAD_ERR_NO_FILE';
// 				break;
// 			case 6:
// 				$msg = 'UPLOAD_ERR_NO_TMP_DIR';
// 				break;
// 			case 7:
// 				$msg = 'UPLOAD_ERR_CANT_ERITE';
// 				break;
// 			case 8:
// 				$msg = 'UPLOAD_ERR_EXTENSION';
// 				break;
// 		}
// 	}

// 	return $msg;
// }

// // get a unique name that will never get the same name with 2 files
// function getUniName(){
// 	return md5(uniqid(microtime(true), true));
// }

// // get the extension of the selected file
// function getExt($filename){
// 	return strtolower(end(explode('.', $filename)));
// }


