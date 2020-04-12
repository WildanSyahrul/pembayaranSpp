<?php 

$conn = mysqli_connect("localhost","root","","pembayaranspp");


function query($query){
	global $conn;
	$result = mysqli_query($conn,$query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function tambahPetugas($data){
	global $conn;
	$username = $data["username"];
	$password = password_hash($data["password"], PASSWORD_DEFAULT);
	$nama_petugas = $data["nama_petugas"];

	$query = mysqli_query($conn,"INSERT INTO petugas VALUES ('','$username','$password','$nama_petugas','petugas')");
	return mysqli_affected_rows($conn);
}

function hapusPetugas($id){
	global $conn;
	mysqli_query($conn,"DELETE FROM petugas WHERE id_petugas = '$id'");
	return mysqli_affected_rows($conn);
}

function updatePetugas($data){
	global $conn;
	$username = $data["username"];
	$password = password_hash($data["password"], PASSWORD_DEFAULT);
	$nama_petugas = $data["nama_petugas"];
	$id = $data["id_petugas"];

	$query = mysqli_query($conn,"UPDATE petugas SET 
							username = '$username',
							password = '$password',
							nama_petugas = '$nama_petugas',
							level = 'petugas'
						WHERE  id_petugas = $id");
	return mysqli_affected_rows($conn);
}

function tambahKelas($data){
	global $conn;
	$nama_kelas = $data["nama_kelas"];
	$kompetensi_keahlian = $data["kompetensi_keahlian"];
	$query = mysqli_query($conn,"INSERT INTO kelas VALUES ('','$nama_kelas','$kompetensi_keahlian')");
	return mysqli_affected_rows($conn);
}

function hapusKelas($id){
	global $conn;
	mysqli_query($conn,"DELETE FROM kelas WHERE id_kelas = '$id'");
	return mysqli_affected_rows($conn);
}


function updateKelas($data){
	global $conn;
	$nama_kelas = $data["nama_kelas"];
	$kompetensi_keahlian = $data["kompetensi_keahlian"];	
	$id = $data["id_kelas"];
	$query = mysqli_query($conn,"UPDATE kelas SET 
							nama_kelas = '$nama_kelas',
							kompetensi_keahlian = '$kompetensi_keahlian'
						WHERE  id_kelas = $id");
	return mysqli_affected_rows($conn);
}

function tambahSiswa($data){
	global $conn;
	$nisn = $data["nisn"];
	$nis = $data["nis"];
	$nama = $data["nama"];
	$id_kelas = $data["kelas"];
	$alamat = $data["alamat"];
	$no_telp = $data["no_telp"];
	$id_spp = $data["spp"];
		$query = mysqli_query($conn,"INSERT INTO siswa VALUES ('','$nisn','$nis','$nama','$id_kelas','$alamat','$no_telp','$id_spp')");
	mysqli_query($conn,"INSERT INTO pembayaran VALUES('',null,'$nisn',null,null,null,'$id_spp',null,'belum-lunas')");
	return mysqli_affected_rows($conn);
}

function kirimPembayaran($data){
	global $conn;
	$id_petugas = $data["id_petugas"];
	$nisn = $data["nisn"];
	$tgl_bayar = date("Y-m-d");
	$bulan_dibayar = date("m");
	$tahun_dibayar = date("Y");
	$id_spp = $data["id_spp"];
	$jumlah_bayar = $data["jumlah_bayar"];
	$status = 'lunas';
	$id_pembayaran = $data["id_pembayaran"];
	$query = mysqli_query($conn,"UPDATE pembayaran SET
			id_petugas = '$id_petugas',
			tgl_bayar = '$tgl_bayar',
			bulan_dibayar = '$bulan_dibayar',
			tahun_dibayar = '$tahun_dibayar',
			jumlah_bayar = '$jumlah_bayar',
			status = 'lunas'
			WHERE id_pembayaran = '$id_pembayaran'
		");
	return mysqli_affected_rows($conn);
}

function updateSiswa($data){
	global $conn;
	$nisn = $data["nisn"];
	$nis = $data["nis"];
	$nama = $data["nama"];
	$id_kelas = $data["kelas"];
	$alamat = $data["alamat"];
	$no_telp = $data["no_telp"];
	$id_spp = $data["spp"];	
	$id = $data["siswa"];
	$query = mysqli_query($conn,"UPDATE siswa SET 
							nisn = '$nisn',
							nis = '$nis',
							nama = '$nama',
							id_kelas = '$id_kelas',
							alamat = '$alamat',
							no_telp = '$no_telp',
							id_spp = '$id_spp'
						WHERE  id_siswa = $id");
	return mysqli_affected_rows($conn);
}

function hapusSiswa($id){
	global $conn;
	mysqli_query($conn,"DELETE FROM siswa WHERE id_siswa = '$id'");
	return mysqli_affected_rows($conn);
}

function tambahSPP($data){
	global $conn;
	$tahun = $data["tahun"];
	$nominal = $data["nominal"];
	$query = mysqli_query($conn,"INSERT INTO spp VALUES ('','$tahun','$nominal')");
	return mysqli_affected_rows($conn);
}

function updateSPP($data){
	global $conn;
	$tahun = $data["tahun"];
	$nominal = $data["nominal"];
	$id = $data["id_spp"];
	$query = mysqli_query($conn,"UPDATE spp SET 
							tahun = '$tahun',
							nominal = '$nominal'
						WHERE  id_spp = $id");
	return mysqli_affected_rows($conn);
}

function hapusSPP($id){
	global $conn;
	mysqli_query($conn,"DELETE FROM spp WHERE id_spp = '$id'");
	return mysqli_affected_rows($conn);
}