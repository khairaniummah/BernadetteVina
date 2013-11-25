<?php
	/*
	Tugas-2 Pemrograman Integratif
	---------------------------------------------------
	oleh:
	Christian Hendy/ 18211036
	Ryan Aldiansyah Akbar/ 18210017
	*/
	header('Content-type: text/xml');
	
	$temp = $_GET['db'];
	
	switch($temp){
		case "data1":
			opendata1();
			break;
		case "data2":
			opendata2();
			break;
		case "data3":
			opendata3();
			break;
		default:
			echo "Database not found.";
			break;
	}
	
	function openData1(){
		$file = fopen("data1.sql", "r") or exit("Unable to open file!");
		$xml = "<?xml-stylesheet type=\"text/xsl\" href=\"/PemrogramanIntegratif/Tugas2/tugas2.xsl\"?>";
		$rootnode = "";
		$headers = array();
		$data = array();
		
		$xml.="<table>";
		
		while(!feof($file)){
			$temp = fgets($file);
			if((strcmp(substr($temp, 0, 2),"--")==0)||(strcmp(substr($temp, 0, 2),"/*")==0)){
			}
			else if(strcasecmp(substr($temp, 0, 12),"CREATE TABLE")==0){
				$rootnode = substr($temp, 14, -5);
			}
			else if(strcmp(substr($temp, 0, 1),"'")==0){
			}
			else if(strpos($temp, "INSERT INTO") !== false){
				$tempProses = explode('(', $temp);
				for($i=1; $i<count($tempProses); $i++){
					$tempProses[$i] = str_replace(")", "", $tempProses[$i]);
					$tempProses[$i] = str_replace(";", "", $tempProses[$i]);
					$tempProses[$i] = str_replace("'", "", $tempProses[$i]);
					$data[count($data)] = $tempProses[$i];
				}
				
				foreach($data as $dataFinal){
					$dataFinal = explode(",", $dataFinal);
					$xml.="<$rootnode $headers[0]=\"$dataFinal[0]\">";
					for($i=1; $i<count($dataFinal); $i++){
						if($dataFinal[$i] != null){
								$xml.="<$headers[$i]>$dataFinal[$i]</$headers[$i]>";
						}
					}
					$xml.="</$rootnode>";
				}
			}
			else{
				$tempProses = explode('`', $temp);
				if((count($tempProses)==3) && (strcmp($tempProses[0], "  ")==0)){
					$headers[count($headers)] = substr($tempProses[1], 0);
				}
			}
		}
		
		$xml.="</table>";
		echo $xml;
	}
	
	function openData2(){		
		$file = fopen("data2.csv", "r") or exit("Unable to open file!");
		$xml = "<?xml-stylesheet type=\"text/xsl\" href=\"/PemrogramanIntegratif/Tugas2/tugas2.xsl\"?>";
		$xml.="<table>";
		
		$headers = fgetcsv($file);
		
		while(!feof($file)){
			$data = fgetcsv($file);
		
			if((strcmp($data[0], $headers[0]) == 0) || $data[0] == null){
			}
			else{
				$xml.="<mahasiswa $headers[0]=\"$data[0]\">";
				
				for($i=1; $i<count($headers); $i++){
					$xml.="<$headers[$i]>$data[$i]</$headers[$i]>";
				}
				
				$xml.="</mahasiswa>";
			}
		}
		
		$xml.="</table>";
		echo $xml;
		fclose($file);
	}
	
	function openData3(){		
		$file = fopen("data3.xml", "r") or exit("Unable to open file!");
		
		while(!feof($file)){
			echo fgets($file);
		}
		
		fclose($file);
	}
?>