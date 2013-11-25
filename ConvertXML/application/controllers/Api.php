<?php defined('BASEPATH') OR exit('No direct script access allowed');
	require APPPATH.'/libraries/REST_Controller.php';

	class Api extends REST_Controller {
	
		function __construct() {
			parent::__construct();
			$this->load->helper('file');
		}

		function xml_from_csv_get()
		{
			$filename = "./database_collection/csvdb.csv";
			$delimiter = ",";
			$header = NULL;
			$data = array();
			if (($handle = fopen($filename, 'r')) !== FALSE)
			{
				while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
				{
					if(!$header)
						$header = $row;
					else
						$data[] = array_combine($header, $row);
				}
				fclose($handle);
			}
			if($data)
			{
				$this->response($data, 200, 'csv', 'xml'); // 200 being the HTTP response code
			}
			else
			{
				$this->response(array('error' => 'Couldn\'t find any users!'), 404, 'csv', 'xml');
			}
		}
		
		function xml_from_xml_get(){
			$filename = "./database_collection/xmldb.xml";
			$sxe = simplexml_load_file($filename);
			$json = json_encode($sxe);
			$output_array = json_decode($json, TRUE);
			if($output_array)
			{
				$this->response($output_array, 200, 'xml', 'xml'); // 200 being the HTTP response code
			}
			else
			{
				$this->response(array('error' => 'Couldn\'t find any users!'), 404, 'xml', 'xml');
			}
		}
		
		function xml_from_sql_get(){
			$filename="./database_collection/sqldb.sql";
			$dbhost = 'localhost::3036';
			$dbuser = 'root';
			$dbpass = '';
			//Melakukan koneksi ke dalam database, sebelumnya database sudah diimport ke dalam phpMySQL
			$conn = mysql_connect($dbhost, $dbuser, $dbpass);
			if(! $conn)
			{
				die ('Could not connect :'.mysql_error()); // Koneksi ke database gagal
			}
			//Database yang akan diakses adalah database itb
			mysql_select_db('itb', $conn);
			//Tabel yang akan diakses adalah tabel mahasiswa
			$sql = 'select * from mahasiswa';
			$data = mysql_query($sql, $conn);
			if(! $data)
			{
				die('Could not get data: '.mysql_error()); // table kosong atau tidak ada
			}
			$field = mysql_num_fields($data); //Mengisi jumlah atribut dalam tabel mahasiswa ke dalam variabel field
			$tablename = mysql_field_table($data, 1); //Mengisi nama tabel ke dalam variabel tablename
			$xml = new SimpleXMLElement('<xml></xml>'); //Membuat file format xml
			$i = NULL; //Inisiasi variabel untuk looping
			while($row=mysql_fetch_array($data, MYSQL_ASSOC)) //Pengulangan terjadi ketika data dalam $data masih ada
			{
				$table = $xml->addChild($tablename); //Menambah anak dari file xml, dalam hal ini menambahkan elemen mahasiswa ke dalam file xml
				for($i=0;$i<$field;$i++){ //Melakukan pengulangan sebanyak jumlah field
					$field_name = mysql_field_name($data, $i); //Mengisi nama atribut dalam suatu tabel ke dalam variabel field_name
					$field_data = $row[$field_name]; //Mengakses data dari tabel mahasiswa sesuai dengan atribut yang dalam tabel mahasiswa
					$table2 = $table->addchild($field_name, $field_data); //Menambah anak dari mahasiswa dengan atribut-atribut dalam tabel mahasiswa
				}
			}
			Header('Content-type:text/xml');
			echo $xml->asXML(); //print file xml ke dalam web
			mysql_close($conn); //Menutup koneksi database sql
		}
		
		function html_from_xml_get(){
			$filename = "./database_collection/xmldb.xml";
			$sxe = simplexml_load_file($filename);
			$json = json_encode($sxe);
			$output_array = json_decode($json, TRUE);
			if($output_array)
			{
				$this->response($output_array, 200, 'xml', 'html'); // 200 being the HTTP response code
			}
			else
			{
				$this->response(array('error' => 'Couldn\'t find any users!'), 404, 'xml', 'html');
			}
		}
	}