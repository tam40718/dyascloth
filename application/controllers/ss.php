<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ss extends CI_Controller {

	public function index()
	{
		
		error_reporting(E_ALL);
		if(isset($_POST['ImageName'])){
		$imgname = $_POST['ImageName'];
		$imsrc = str_replace(' ','+',$_POST['base64']);
		$imsrc = base64_decode($imsrc);
		$fp = fopen($imgname, 'w');
		fwrite($fp, $imsrc);
		if(fclose($fp)){
			echo "Image uploaded";
		}else{
			echo "Error uploading image";
		}
		}else{
			echo "gk ublem";
		}
 }