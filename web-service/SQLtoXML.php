<?php
// Tugas Pemrograman Integratif II3160
// Olivia - 18211014
// Ardian Indra Gunawan - 18211029
			header("Content-Type: application/xml");
			$txt_file    = file_get_contents('datasiswa.sql');
			$rows        = explode("\n", $txt_file);
			array_shift($rows);
			
			$output = '<?xml version="1.0" encoding="ISO-8859-1"?>' . '
'.'<?xml-stylesheet type="text/css" href="index.css"?>' . '
' . '<datasiswa>' . '
';

			$linecount = count($rows);

			for($i = 0; $i < $linecount; $i++)
   
			{
				$data = $rows[$i];
				if( preg_match("/INSERT INTO/", preg_quote($rows[$i])) ) {
				$row_data = explode('(', $data);
				$countdata = count($row_data);
				
				for($j = 1; $j < $countdata; $j++) {
					$value[$j] = $row_data[$j]; 
					//echo $value[$j];
					
					$isidata = explode(',',$value[$j]);
  
					$info[$j]['nim']		  = $isidata[0];
					$info[$j]['nama']         = trim(($isidata[1]),"'");
					$info[$j]['jurusan']  	  = trim(($isidata[2]),"');\r");
					
						$b = '	<siswa>' . '
						' .	'		<NIM>' . $info[$j]['nim'] . '</NIM>' .  '
						' . '		<NAMA> ' . $info[$j]['nama'] . '</NAMA>' . '
						' . '		<JURUSAN> ' . $info[$j]['jurusan'] . '		</JURUSAN>' . '
						' . '	</siswa>' . '
						';
						$output .= $b;
				}
				$output .= '</datasiswa>';
				file_put_contents('sqltoxml.xml', print_r($output, true));
				}
			}
				$xmlDoc = new DOMDocument('1.0', 'UTF-8');
				$xmlDoc->load("sqltoxml.xml");
				print $xmlDoc->saveXML();
?>