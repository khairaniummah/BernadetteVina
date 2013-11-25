<?php
// Tugas Pemrograman Integratif II3160
// Olivia - 18211014
// Ardian Indra Gunawan - 18211029
header("Content-Type: application/xml");
$txt_file    = file_get_contents('asal.csv');
$rows        = explode("\n", $txt_file);
array_shift($rows);
$output = '<?xml version="1.0" encoding="UTF-8"?>' . '
'.'<?xml-stylesheet type="text/css" href="index.css"?>' . '
'.'<datasiswa>
';

foreach($rows as $row => $data)
{
    $row_data = explode(',', $data);

    $info[$row]['nim']          = $row_data[0];
    $info[$row]['nama']         = $row_data[1];
    $info[$row]['jurusan']  	= $row_data[2];

	$b = '	<siswa>' . '
' .	'		<NIM>' . $info[$row]['nim'] . '</NIM>' .  '
' . '		<NAMA> ' . $info[$row]['nama'] . '</NAMA>' . '
' . '		<JURUSAN> ' . $info[$row]['jurusan'] . '		</JURUSAN>' . '
' . '	</siswa>' . '
';
	$output .= $b;
}
	$output .= '</datasiswa>';
// $results = print_r($output, true); 
file_put_contents('csvtoxml.xml', print_r($output, true));
$xmlDoc = new DOMDocument('1.0', 'UTF-8');
$xmlDoc->load("csvtoxml.xml");
print $xmlDoc->saveXML();
?>