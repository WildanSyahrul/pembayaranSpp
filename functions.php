<?php 

$koneksi = mysqli_connect('localhost','root','','pembayaran');


function query($query){
	global $koneksi;
	$result = mysqli_query($koneksi,$query);
	$rows 	= [];
	while ($row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function hapusPetugas($id){
	global $koneksi;
	mysqli_query($koneksi,"DELETE FROM tb_petugas WHERE id_petugas = '$id'");
	return mysqli_affected_rows($koneksi);
}

function tambahPetugas($data){
	global $koneksi;
	$username = $data["username"];
	$password = password_hash($data["password"], PASSWORD_DEFAULT);
	$nama_petugas = $data["nama_petugas"];

	$query = mysqli_query($koneksi,"INSERT INTO tb_petugas VALUES ('','$username','$password','$nama_petugas','petugas')");
	return mysqli_affected_rows($koneksi);
}

function updatePetugas($data){
	global $koneksi;
	$username = $data["username"];
	$password = password_hash($data["password"], PASSWORD_DEFAULT);
	$nama_petugas = $data["nama_petugas"];
	$id = $data["id_petugas"];

	$query = mysqli_query($koneksi,"UPDATE tb_petugas SET 
							username = '$username',
							password = '$password',
							nama_petugas = '$nama_petugas',
							level = 'petugas'
						WHERE  id_petugas = $id");
	return mysqli_affected_rows($koneksi);
}

function tambahSiswa($data){
	global $koneksi;
	$nisn = $data["nisn"];
	$nis = $data["nis"];
	$nama = $data["nama"];
	$id_kelas = $data["kelas"];
	$alamat = $data["alamat"];
	$no_telp = $data["no_telp"];
	$id_spp = $data["spp"];
	$query = mysqli_query($koneksi,"INSERT INTO tb_siswa VALUES ('','$nisn','$nis','$nama','$id_kelas','$alamat','$no_telp','$id_spp')");
	mysqli_query($koneksi,"INSERT INTO tb_pembayaran VALUES('',null,'$nisn',null,null,null,'$id_spp',null,'belum-lunas')");
	return mysqli_affected_rows($koneksi);
}

function updateSiswa($data){
	global $koneksi;
	$nisn = $data["nisn"];
	$nis = $data["nis"];
	$nama = $data["nama"];
	$id_kelas = $data["id_kelas"];
	$alamat = $data["alamat"];
	$no_telp = $data["no_telp"];
	$id_spp = $data["id_spp"];	
	$id = $data["id_siswa"];
	$query = mysqli_query($koneksi,"UPDATE tb_siswa SET 
							nisn = '$nisn',
							nis = '$nis',
							nama = '$nama',
							id_kelas = '$id_kelas',
							alamat = '$alamat',
							no_telp = '$no_telp',
							id_spp = '$id_spp'
						WHERE  id_siswa = $id");
	return mysqli_affected_rows($koneksi);
}

function hapusSiswa($id){
	global $koneksi;
	mysqli_query($koneksi,"DELETE FROM tb_siswa WHERE id_siswa = '$id'");
	return mysqli_affected_rows($koneksi);
}

function tambahKelas($data){
	global $koneksi;
	$nama_kelas = $data["nama_kelas"];
	$kompetensi_keahlian = $data["kompetensi_keahlian"];
	$query = mysqli_query($koneksi,"INSERT INTO tb_kelas VALUES ('','$nama_kelas','$kompetensi_keahlian')");
	return mysqli_affected_rows($koneksi);
}

function hapusKelas($id){
	global $koneksi;
	mysqli_query($koneksi,"DELETE FROM tb_kelas WHERE id_kelas = '$id'");
	return mysqli_affected_rows($koneksi);
}


function updateKelas($data){
	global $koneksi;
	$nama_kelas = $data["nama_kelas"];
	$kompetensi_keahlian = $data["kompetensi_keahlian"];	
	$id = $data["id_kelas"];
	$query = mysqli_query($koneksi,"UPDATE tb_kelas SET 
							nama_kelas = '$nama_kelas',
							kompetensi_keahlian = '$kompetensi_keahlian'
						WHERE  id_kelas = $id");
	return mysqli_affected_rows($koneksi);
}

function tambahSPP($data){
	global $koneksi;
	$tahun = $data["tahun"];
	$nominal = $data["nominal"];
	$query = mysqli_query($koneksi,"INSERT INTO tb_spp VALUES ('','$tahun','$nominal')");
	return mysqli_affected_rows($koneksi);
}

function updateSPP($data){
	global $koneksi;
	$tahun = $data["tahun"];
	$nominal = $data["nominal"];
	$id = $data["id_spp"];
	$query = mysqli_query($koneksi,"UPDATE tb_spp SET 
							tahun = '$tahun',
							nominal = '$nominal'
						WHERE  id_spp = $id");
	return mysqli_affected_rows($koneksi);
}

function hapusSPP($id){
	global $koneksi;
	mysqli_query($koneksi,"DELETE FROM tb_spp WHERE id_spp = '$id'");
	return mysqli_affected_rows($koneksi);
}

function kirimPembayaran($data){
	global $koneksi;
	$id_petugas = $data["id_petugas"];
	$nisn = $data["nisn"];
	$tgl_bayar = date("d");
	$bulan_dibayar = date("m");
	$tahun_dibayar = date("Y");
	$id_spp = $data["id_spp"];
	$jumlah_bayar = $data["jumlah_bayar"];
	$status = 'lunas';
	$id_pembayaran = $data["id_pembayaran"];
	$query = mysqli_query($koneksi,"UPDATE tb_pembayaran SET
			id_petugas = '$id_petugas',
			tgl_bayar = '$tgl_bayar',
			bulan_dibayar = '$bulan_dibayar',
			tahun_dibayar = '$tahun_dibayar',
			jumlah_bayar = '$jumlah_bayar',
			status = 'lunas'
			WHERE id_pembayaran = '$id_pembayaran'
		");
	return mysqli_affected_rows($koneksi);
}