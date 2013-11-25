<?php
// Tugas Pemrograman Integratif II3160
// Olivia - 18211014
// Ardian Indra Gunawan - 18211029
			header("Content-Type: application/xml");
			$xmlDoc = new DOMDocument('1.0', 'UTF-8');
			$xmlDoc->load("datasiswa.xml");
			print $xmlDoc->saveXML();
?>