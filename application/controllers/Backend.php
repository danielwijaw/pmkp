<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/API_Controller.php';
require FCPATH.'/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class backend extends API_Controller {

	public function index()
	{
		header("Access-Control-Allow-Origin: *");

		// API Configuration
		$this->_apiConfig([
			'methods' => ['GET'],
        ]);

		// return data
		$this->api_return(
			[
				'status' => true,
				"result" => "Api Oke",
			],
		200);
	}

	public function rekap_kepatuhan_identifikasi_pasien(){
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

		if(isset($_FILES['berkas_excel']['name']) && in_array($_FILES['berkas_excel']['type'], $file_mimes)) {
		
			$arr_file = explode('.', $_FILES['berkas_excel']['name']);
			$extension = end($arr_file);
		
			if('csv' == $extension) {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}
		
			$spreadsheet = $reader->load($_FILES['berkas_excel']['tmp_name']);
			
			$sheetData = $spreadsheet->getActiveSheet()->toArray();
			echo "<table width='100%' border='1' style='border-collapse: collapse; font-family: arial'>
				<tr style='font-weight: bold'>
					<td>Tanggal</td>
					<td>Petugas Menanyakan Nama Pasien ?</td>
					<td>Petugas Menanyakan Tanggal Lahir Pasien ?</td>
					<td>Nama Pengambil Sample</td>
					<td>Nama Petugas Yang Dinilai</td>
				</tr>";
			for($i = 0;$i < count($sheetData);$i++)
			{
				$data[$i]['tanggal'] = $sheetData[$i]['0'];
				$data[$i]['nama_pasien'] = $sheetData[$i]['6'];
				$data[$i]['tanggal_lahir'] = $sheetData[$i]['7'];
				$data[$i]['pengambil_sample'] = $sheetData[$i]['8'];
				$data[$i]['petugas_dinilai'] = $sheetData[$i]['9'];
				if(preg_match('/ya/i', $data[$i]['nama_pasien'])==FALSE){
					$data_nama_pasien[] = "1";
					$color_red = "style='background-color:red'";
				}else{
					$data_nama_pasien_ya[] = "1";
					$color_red = "";
				}
				if(preg_match('/ya/i', $data[$i]['tanggal_lahir'])==FALSE){
					$data_tanggal_lahir[] = "1";
					$color_blue = "style='background-color:blue'";
				}else{
					$data_tanggal_lahir_ya[] = "1";
					$color_blue = "";
				}
				echo "<tr>";
					echo "<td>".$data[$i]['tanggal']."</td>";
					echo "<td ".$color_red.">".$data[$i]['nama_pasien']."</td>";
					echo "<td ".$color_blue.">".$data[$i]['tanggal_lahir']."</td>";
					echo "<td>".$data[$i]['pengambil_sample']."</td>";
					echo "<td>".$data[$i]['petugas_dinilai']."</td>";
				echo "</tr>";
			}
				echo "<tr>";
					echo "<td>&nbsp;</td>";
					echo "<td>Tidak = ".array_sum($data_nama_pasien)."<br/>Ya = ".array_sum($data_nama_pasien_ya)."</td>";
					echo "<td>Tidak = ".array_sum($data_tanggal_lahir)."<br/>Ya = ".array_sum($data_nama_pasien_ya)."</td>";
				echo "</tr>";
			echo "</table>";
			die();
		}
	}

	public function kecepatan_respon_komplain(){
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        if(isset($_FILES['berkas_excel']['name']) && in_array($_FILES['berkas_excel']['type'], $file_mimes)) {
        
            $arr_file = explode('.', $_FILES['berkas_excel']['name']);
            $extension = end($arr_file);
        
            if('csv' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
        
            $spreadsheet = $reader->load($_FILES['berkas_excel']['tmp_name']);
            
            $sheetData = $spreadsheet->getActiveSheet()->toArray();
            echo "<table width='100%' border='1' style='border-collapse: collapse; font-family: arial'>
                <tr style='font-weight: bold'>
                    <td>Tanggal</td>
                    <td>Poli</td>
                    <td>Kategori Komplain</td>
                </tr>";
            for($i = 0;$i < count($sheetData);$i++)
            {
                $data[$i]['tanggal'] = $sheetData[$i]['0'];
                $data[$i]['poli'] = $sheetData[$i]['4'];
                $data[$i]['kategori'] = $sheetData[$i]['7'];
                if($data[$i]['kategori'] == 'HIJAU'){
                    $color['HIJAU'] = "style='background-color:green'";
                    $kategori['HIJAU'][] = '1';
                }
                if($data[$i]['kategori'] == 'KUNING'){
                    $color['KUNING'] = "style='background-color:yellow'";
                    $kategori['KUNING'][] = '1';
                }
                if($data[$i]['kategori'] == 'MERAH'){
                    $color['MERAH'] = "style='background-color:red'";
                    $kategori['MERAH'][] = '1';
                }
                echo "<tr>";
                    echo "<td>".$data[$i]['tanggal']."</td>";
                    echo "<td>".$data[$i]['poli']."</td>";
                    echo "<td ".$color[$data[$i]['kategori']].">".$data[$i]['kategori']."</td>";
                echo "</tr>";
            }
                echo "<tr>";
                    echo "<td colspan='2'>&nbsp;</td>";
                    echo "  <td>
                                Hijau = ".array_sum($kategori['HIJAU'])." <br/>
                                Kuning = ".array_sum($kategori['KUNING'])." <br/>
                                Merah = ".array_sum($kategori['MERAH'])." <br/>
                            </td>";
                echo "</tr>";
            echo "</table>";
            die();
        }
	}

	public function rekap_resiko_jatuh(){
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        if(isset($_FILES['berkas_excel']['name']) && in_array($_FILES['berkas_excel']['type'], $file_mimes)) {
        
            $arr_file = explode('.', $_FILES['berkas_excel']['name']);
            $extension = end($arr_file);
        
            if('csv' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
        
            $spreadsheet = $reader->load($_FILES['berkas_excel']['tmp_name']);
            
            $sheetData = $spreadsheet->getActiveSheet()->toArray();
            echo "<table width='100%' border='1' style='border-collapse: collapse; font-family: arial'>
                <tr style='font-weight: bold'>
                    <td>Tanggal</td>
                    <td>Skrining Resiko Jatuh IGD/Rawat Jalan?</td>
                    <td>Assesment Resiko Jatuh Rawat Inap?</td>
                    <td>Assesment Ulang Resiko Jatuh?</td>
                    <td>Edukasi Pencegahan Jatuh?</td>
                </tr>";
            for($i = 0;$i < count($sheetData);$i++)
            {
                $data[$i]['tanggal'] = $sheetData[$i]['0'];
                $data[$i]['igd'] = $sheetData[$i]['5'];
                $data[$i]['ranap'] = $sheetData[$i]['6'];
                $data[$i]['ulang'] = $sheetData[$i]['7'];
                $data[$i]['cegah'] = $sheetData[$i]['8'];
                if(preg_match('/ya/i', $data[$i]['igd'])==FALSE){
                    $igd['tidak'][] = "1";
                    $color_red['igd'] = "style='background-color:red'";
                }else{
                    $igd['ya'][] = "1";
                    $color_red['igd'] = "";
                }
                if(preg_match('/ya/i', $data[$i]['ranap'])==FALSE){
                    $ranap['tidak'][] = "1";
                    $color_red['ranap'] = "style='background-color:red'";
                }else{
                    $ranap['ya'][] = "1";
                    $color_red['ranap'] = "";
                }
                if(preg_match('/ya/i', $data[$i]['ulang'])==FALSE){
                    $ulang['tidak'][] = "1";
                    $color_red['ulang'] = "style='background-color:red'";
                }else{
                    $ulang['ya'][] = "1";
                    $color_red['ulang'] = "";
                }
                if(preg_match('/ya/i', $data[$i]['cegah'])==FALSE){
                    $cegah['tidak'][] = "1";
                    $color_red['cegah'] = "style='background-color:red'";
                }else{
                    $cegah['ya'][] = "1";
                    $color_red['cegah'] = "";
                }
                echo "<tr>";
                    echo "<td>".$data[$i]['tanggal']."</td>";
                    echo "<td ".$color_red['igd'].">".$data[$i]['igd']."</td>";
                    echo "<td ".$color_red['ranap'].">".$data[$i]['ranap']."</td>";
                    echo "<td ".$color_red['ulang'].">".$data[$i]['ulang']."</td>";
                    echo "<td ".$color_red['cegah'].">".$data[$i]['cegah']."</td>";
                echo "</tr>";
            }
                echo "<tr>";
                    echo "<td>&nbsp;</td>";
                    echo "<td>Tidak = ".array_sum($igd['tidak'])."<br/>Ya = ".array_sum($igd['ya'])."</td>";
                    echo "<td>Tidak = ".array_sum($ranap['tidak'])."<br/>Ya = ".array_sum($ranap['ya'])."</td>";
                    echo "<td>Tidak = ".array_sum($ulang['tidak'])."<br/>Ya = ".array_sum($ulang['ya'])."</td>";
                    echo "<td>Tidak = ".array_sum($cegah['tidak'])."<br/>Ya = ".array_sum($cegah['ya'])."</td>";
                echo "</tr>";
            echo "</table>";
            die();
            header("Location: index.php"); 
        }
	}

	public function waktu_tunggu_rawat_jalan(){
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        if(isset($_FILES['berkas_excel']['name']) && in_array($_FILES['berkas_excel']['type'], $file_mimes)) {
        
            $arr_file = explode('.', $_FILES['berkas_excel']['name']);
            $extension = end($arr_file);
        
            if('csv' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
        
            $spreadsheet = $reader->load($_FILES['berkas_excel']['tmp_name']);
            
            $sheetData = $spreadsheet->getActiveSheet()->toArray();
            echo "<table width='100%' border='1' style='border-collapse: collapse; font-family: arial'><tr style='font-weight: bold'><td>Tanggal</td><td>Waktu Datang</td><td>Waktu Pulang</td><td>Selisih Waktu</td></tr>";
            for($i = 0;$i < count($sheetData);$i++)
            {
                $data[$i]['tanggal'] = $sheetData[$i]['0'];
                $data[$i]['waktu_datang'] =date("H:i", strtotime($sheetData[$i]['4']));
                $data[$i]['waktu_pulang'] = date("H:i", strtotime($sheetData[$i]['5']));
                $date_awal  = new DateTime($data[$i]['waktu_datang']);
                $date_akhir = new DateTime($data[$i]['waktu_pulang']);
                $selisih = $date_akhir->diff($date_awal);
                $jam = $selisih->format('%h');
                $menit = $selisih->format('%i');
                if($menit >= 0 && $menit <= 9){
                    $menit = "0".$menit;
                }
                $hasil = $jam.":".$menit;
                $data[$i]['hitung'] = $hasil;
                $minutes[] = $menit;
                $minutes[] = $jam * 60;
                echo "<tr>";
                echo "<td>".$data[$i]['tanggal']."</td>";
                echo "<td>".$data[$i]['waktu_datang']."</td>";
                echo "<td>".$data[$i]['waktu_pulang']."</td>";
                echo "<td>".$data[$i]['hitung']."</td>";
                echo "</tr>";
            }
            $jumlah_menit = array_sum($minutes);
            echo "<tr style='font-weight: bold'><td colspan='3'>Jumlah Waktu</td><td>".gmdate('H:i', $jumlah_menit * 60)."</td></tr>";
            echo "</table>";
            die();
        }
	}
}
