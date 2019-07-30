<?php 
error_reporting(0);

//htmlspecialchars = untuk menonaktifkan tag html 
//strtolower = agar huruf pertama tetap kecil
//stripcslashes = untuk menghindari \ (slash) masuk kedalam database
/*mysqli_real_escape_string = untuk mencegah sql injection seperti (dalam kasus yang pernah saya alami ketika saya membuat sebuah form yang akan saya input datanya kedalam database, lalu saya menginput kata “jum’at” didalam inputannya)*/


//koneksi kedatabase
$conn = mysqli_connect("localhost", "root", "", "db_tokobale");

//menampilkan data pelanggan
function pelanggan($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result))
	{
		$rows[] = $row;
	}

	return $rows;
}

//menampilkan data admin
function admin($query)
{
	global $conn;
	$result= mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result))
	{
		$rows[] = $row;
	}
	return $rows;
}
//menampilkan data kategori
function kategori($query)
{
	global $conn;
	$result = mysqli_query($conn,$query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result))
	{
		$rows[] = $row;
	}
	return $rows;
}
//menampilkan data bank
function bank($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows= [];
	while ($row = mysqli_fetch_assoc($result))
	{
		$rows[] = $row;
	}
	return $rows;
}
//menampilkan data kota
function kota($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) 
	{
		$rows[] = $row;
	}
	return $rows;
}
//menampilakan data subkategori
function subkategori($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) 
	{
		$rows[] = $row;
	}
	return $rows;
}
function produk($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) 
	{
		$rows[] = $row;
	}
	return $rows;
}
function orders($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];

	while ($row = mysqli_fetch_assoc($result)) 
	{
		$rows[] = $row;
	}

	return $rows;
}
function resi($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) 
	{
		$rows[] = $row;
	}
	return $rows;
}
function kurir($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) 
	{
		$rows[] = $row;
	}
	return $rows;
}
function konfirmasi($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) 
	{
		$rows[] = $row;
	}
	return $rows;
}

//menghapus pelanggan
function hapuspelanggan($kdplgn)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM pelanggan WHERE kodepelanggan= $kdplgn");

	return mysqli_affected_rows($conn);
}
//menghapus admin
function hapusadmin ($idadm)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM admin WHERE id_admin = $idadm");

	return mysqli_affected_rows($conn);
}
//menghapus data kategori
function hapuskategori($idkategori)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM kategori WHERE id_kategori = $idkategori");

	return mysqli_affected_rows($conn);
}
//menghapus data bank
function hapusbank($kdbank)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM bank WHERE kode_bank = $kdbank");

	return mysqli_affected_rows($conn);
}
//menghapus data kota
function hapuskota($idkota)
{
	global $conn;
	mysqli_query ($conn, "DELETE FROM kota WHERE id_kota = $idkota");

	return mysqli_affected_rows($conn);
}
//menghapus data subkategori
function hapussubkategori($kdsubkategori)
{
	global $conn;
	//delete kategori dahulu
	mysqli_query($conn, "DELETE FROM kategori WHERE kd_subkategori = $kdsubkategori");
	//delete subkategori
	mysqli_query($conn, "DELETE FROM sub_kategori WHERE kd_subkategori = $kdsubkategori");

	return mysqli_affected_rows($conn);
}
//menghapus data produk
function hapusproduk($kdproduk)
{
	global $conn;
	$result =mysqli_query($conn, "SELECT * FROM produk WHERE kodeproduk= $kdproduk");
	$rows = mysqli_fetch_assoc($result);

	$foto_produk1 = $rows['foto1'];
	$foto_produk2 = $rows['foto2'];

	if (file_exists("../../images/".$foto_produk1) && file_exists("../../images/".$foto_produk2))
	{ 
		unlink("../../images/".$foto_produk1);
		unlink("../../images/".$foto_produk2);
	}
	
	if (file_exists("../../images/".$foto_produk1))
	{
		unlink("../../images/".$foto_produk1);
	}
	
	if (file_exists("../../images/".$foto_produk2))
	{
		unlink("../../images/".$foto_produk2);
	}

	// elseif (file_exists("../images/".$foto_produk1))
	// {
	// 	unlink("../images/".$foto_produk1);
	// }
	// else
	// {
	// 	unlink("../images/".$foto_produk) && unlink ("../images/".$foto_produk1);
	// }
	mysqli_query($conn, "DELETE FROM produk WHERE kodeproduk= $kdproduk");

	return mysqli_affected_rows($conn);
}
//hapus order
function hapusorder($idorder)
{
	global $conn;

	mysqli_query($conn, "DELETE FROM orders WHERE id_order = $idorder");

	return mysqli_affected_rows($conn);
}
function hapuskurir($kuririd)
{
	global $conn;

	mysqli_query($conn, "DELETE FROM kurirs WHERE kurir_id = $kuririd");

	return mysqli_affected_rows($conn);
}

//mengubah pelanggan
function ubahpelanggan($dtplgn)
{
	global $conn;
	//ambil data tiap-tiap elemen dalam form pelanggan
	$kdplgn = $dtplgn["kodepelanggan"];
	$nama = mysqli_real_escape_string($conn, htmlspecialchars($dtplgn["namapelanggan"]));
	$alamat = mysqli_real_escape_string($conn, htmlspecialchars($dtplgn["alamat"]));
	$idkota = mysqli_real_escape_string($conn, htmlspecialchars($dtplgn["id_kota"]));
	$nohp = htmlspecialchars( $dtplgn["nohp"]);
	$email = htmlspecialchars(strtolower(stripcslashes($dtplgn["email"])));
	
	mysqli_query($conn, "UPDATE pelanggan SET
		namapelanggan = '$nama',
		alamat = '$alamat',
		id_kota= '$idkota',
		nohp = '$nohp',
		email = '$email'

		WHERE kodepelanggan = $kdplgn");

	return mysqli_affected_rows($conn);
}
//ubah admin
function ubahadmin($dtadm)
{
	global $conn;
	//ambil datanya
	$idadm = $dtadm["id_admin"];
	$username = htmlspecialchars(strtolower(stripcslashes($dtadm["username"])));
	$password1 = mysqli_real_escape_string($conn, htmlspecialchars($dtadm["password"]));
	$nmlengkap = mysqli_real_escape_string($conn, htmlspecialchars($dtadm["namalengkap"]));
	$email = htmlspecialchars(strtolower(stripcslashes($dtadm["email"])));
	$notelpon = htmlspecialchars($dtadm["notelpon"]);
	$level = htmlspecialchars($dtadm["level"]);

	//enkripsi password
	$password1 = password_hash($password1, PASSWORD_DEFAULT);

	mysqli_query($conn, "UPDATE admin SET
		username = '$username' ,
		password = '$password1' ,
		namalengkap = '$nmlengkap' ,
		email = '$email' ,
		notelpon = '$notelpon',
		level = '$level'

		WHERE id_admin = $idadm");

	return mysqli_affected_rows($conn);
	
}
//ubah kategori
function ubahkategori ($dataktgri)
{
	global $conn;
	//ambil datanya
	$idkategori = $dataktgri["id_kategori"];
	$nmkategori = mysqli_real_escape_string($conn, htmlspecialchars($dataktgri["namakategori"]));


	mysqli_query($conn, "UPDATE kategori SET
		namakategori = '$nmkategori' 
		WHERE id_kategori = $idkategori");


	return mysqli_affected_rows($conn);
}
//ubah bank
function ubahbank($dtbank)
{
	global $conn;
	//ambil datanya
	$kdbank = $dtbank["kode_bank"];
	$norek = htmlspecialchars($dtbank["norek"]);
	$nmbank  = mysqli_real_escape_string($conn, htmlspecialchars($dtbank["namabank"]));
	$atasnama = mysqli_real_escape_string($conn, htmlspecialchars($dtbank["atasnama"]));


	mysqli_query($conn, "UPDATE bank SET
		norek = '$norek',
		namabank = '$nmbank',
		atasnama = '$atasnama'

		WHERE kode_bank = $kdbank");

	return mysqli_affected_rows($conn); 
}
//ubah Kota
function ubahkota($dtkota)
{
	global $conn;
	//ambil datanya
	$idkota = $dtkota["id_kota"];
	$nmkota = mysqli_real_escape_string($conn, htmlspecialchars($dtkota["nama_kota"]));
	$ongkir = htmlspecialchars($dtkota["ongkir"]);

	mysqli_query($conn, "UPDATE kota SET
		nama_kota = '$nmkota',
		ongkir = '$ongkir'

		WHERE id_kota= $idkota");

	return mysqli_affected_rows($conn);
}
//ubah subkategori
function ubahsubkategori($dtsubkategori)
{
	global $conn;
	//ambil datanya
	$kdsubkategori = $dtsubkategori["kd_subkategori"];
	$idkategori = $dtsubkategori["id_kategori"];
	$nmsubkategori = mysqli_real_escape_string($conn, htmlspecialchars($dtsubkategori["nama_subkategori"]));

	mysqli_query($conn, "UPDATE sub_kategori SET
		nama_subkategori = '$nmsubkategori'

		WHERE kd_subkategori = $kdsubkategori");

	return mysqli_affected_rows($conn);
}

function upload($inputname)
{
	$namafile = $_FILES[$inputname]['name'];
	$ukuranfile = $_FILES[$inputname]['size'];
	$error = $_FILES[$inputname]['error'];
	$tmpname = $_FILES[$inputname]['tmp_name'];

	//cek apakah tidak ada gambar yang diupload
	if( $error === 4){
		echo "<script>
		alert ('pilih gambar terlebih dahulu!!!');	
		</script>";
		return false;
	}

	//cek apakah yang diupload adalah gambar
	$ekstensigambarvalid = ['jpg','jpeg', 'png']; //variabel untuk ektensi file yang dibolehkan diupload
	$ekstensigambar = explode('.', $namafile); //variabel untuk mengambil ekstensi gambar1
	$ekstensigambar = strtolower(end($ekstensigambar));

	//mengecek apakah ekstensi gambar yang telah diambil ada didalam ekstensigambarvalid(tidak ada)
	if ( !in_array($ekstensigambar, $ekstensigambarvalid))
	{
		echo "<script>
		alert ('yang ada upload bukan gambar!!!');	
		</script>";
		return false;
	}

	//cek jika ukurannya terlalu besar
	if ($ukuranfile > 1000000)
	{
		echo "<script>
		alert ('ukuran gambar terlalu besar!!!');	
		</script>";
		return false;
	}

	//lolos pengecekan, gambar siap diupload
	move_uploaded_file($tmpname, "../../images/". $namafile);

	return $namafile;					
}
//ubah produk//blmsiap
function ubahproduk ($dtproduk)
{
	global $conn;
	//ambil data tiap-tiap elemen dalam form produk 
	$kdproduk = $dtproduk["kodeproduk"];
	$kdsubkategori = $dtproduk["kd_subkategori"];
	$nama_produk =mysqli_real_escape_string($conn, htmlspecialchars($dtproduk["nama_produk"]));
	$deskripsi = mysqli_real_escape_string($conn, htmlspecialchars($dtproduk["deskripsi"]));
	$hargaproduk =htmlspecialchars ($dtproduk["harga_produk"]);
	$stok =htmlspecialchars ($dtproduk["stok"]);
	$berat = mysqli_real_escape_string($conn, htmlspecialchars($dtproduk["berat"]));
	$fotolama1 = $dtproduk["fotolama1"];
	$fotolama2 = $dtproduk["fotolama2"];
	$ukuran =htmlspecialchars ($dtproduk["ukuran"]);
	$diskon =htmlspecialchars ($dtproduk["diskon"]);
	$tglmasuk =htmlspecialchars ($dtproduk["tgl_masuk"]);

	//cek apakah user pilih gambar baru atau tidak
	
	if ($_FILES['foto1']['error'] === 4 && $_FILES['foto2']['error'] === 4) 
	{
		//$fotobr1 = $fotolama1;
		//$fotobr2 = $fotolama2;
		mysqli_query($conn, "UPDATE produk SET 
			nama_produk = '$nama_produk',
			deskripsi = '$deskripsi',
			harga_produk = '$hargaproduk',
			stok = '$stok',
			berat = '$berat',
			ukuran = '$ukuran',
			diskon = '$diskon',
			tgl_masuk = '$tglmasuk',
			foto1 = '$fotolama1',
			foto2 = '$fotolama2'

			WHERE kodeproduk = $kdproduk ");

	}
	else
	{
		if ( $_FILES['foto1']['name'] && $_FILES['foto2']['name'] )
		{
			$fotobaru1 = upload('foto1');
			$fotobaru2 = upload('foto2');

			mysqli_query($conn, "UPDATE produk SET 
				nama_produk = '$nama_produk',
				deskripsi = '$deskripsi',
				harga_produk = '$hargaproduk',
				stok = '$stok',
				berat = '$berat',
				ukuran = '$ukuran',
				diskon = '$diskon',
				tgl_masuk = '$tglmasuk',
				foto1 = '$fotobaru1',
				foto2 = '$fotobaru2'

				WHERE kodeproduk = $kdproduk ");

			if (file_exists("../../images/".$fotolama1)) 
			{
				unlink("../../images/".$fotolama1);
			}if (file_exists("../../images/".$fotolama2))
			{
				unlink("../../images/".$fotolama2);
			}

		}
		elseif ( $_FILES['foto1']['name'] )
		{

			$fotobaru1 = upload('foto1');
			mysqli_query($conn, "UPDATE produk SET 
				nama_produk = '$nama_produk',
				deskripsi = '$deskripsi',
				harga_produk = '$hargaproduk',
				stok = '$stok',
				berat = '$berat',
				ukuran = '$ukuran',
				diskon = '$diskon',
				tgl_masuk = '$tglmasuk',
				foto1 = '$fotobaru1'

				WHERE kodeproduk = $kdproduk ");

			if (file_exists("../../images/".$fotolama1)) 
			{
				unlink("../../images/".$fotolama1);

			}
		}
		else if ( $_FILES['foto2']['name'] )
		{

			$fotobaru2 = upload('foto2');

			mysqli_query($conn, "UPDATE produk SET 
				nama_produk = '$nama_produk',
				deskripsi = '$deskripsi',
				harga_produk = '$hargaproduk',
				stok = '$stok',
				berat = '$berat',
				ukuran = '$ukuran',
				diskon = '$diskon',
				tgl_masuk = '$tglmasuk',
				foto2 = '$fotobaru2'

				WHERE kodeproduk = $kdproduk ");

			if (file_exists("../../images/".$fotolama2))
			{
				unlink("../../images/".$fotolama2);
			}
		}

	}

	return mysqli_affected_rows($conn);
}
//ubah order
function ubahorder($dtorder)
{
	global $conn;
	//ambil datanya
	$idordr= $dtorder["id_order"];
	$kdpelanggan= $dtorder["kodepelanggan"];
	$tglordr= $dtorder["tgl_order"];
	$alamatpengirim= $dtorder["alamat_pengirim"];
	$idkt= $dtorder["id_kota"];
	$kurir= $dtorder["kurir"];
	$resi= $dtorder["resi"];
	$sttsordr = htmlspecialchars($dtorder["status_order"]);
	$sttsknfrmsi = htmlspecialchars($dtorder["status_konfirmasi"]);
	$sttstrma = htmlspecialchars($dtorder["status_terima"]);

	mysqli_query($conn, "UPDATE orders SET
		status_order = '$sttsordr',
		status_konfirmasi = '$sttsknfrmsi',
		status_terima = '$sttstrma',
		resi = '$resi'
		WHERE id_order = $idordr");

	return mysqli_affected_rows($conn);
}
//ubah kurir
function ubahkurir($dtkurir)
{
	global $conn;
	//ambil datanya
	$kuririd = $dtkurir["kurir_id"];
	$kurir = mysqli_real_escape_string($conn, htmlspecialchars($dtkurir["kurir"]));


	mysqli_query($conn, "UPDATE kurirs SET
		kurir = '$kurir' 
		WHERE kurir_id = $kuririd");


	return mysqli_affected_rows($conn);
}
//update status konfirmasu
function statuskonfirmasi($dtkonfirmasi)
{
	global $conn;
	//ambil datanya
	$idkonfirmasi = $dtkonfirmasi["id_konfirmasi"];
	$status= htmlspecialchars($dtkonfirmasi["status"]);


	mysqli_query($conn, "UPDATE konfirmasi SET
		status = '$status' 
		WHERE id_konfirmasi = $idkonfirmasi");
	return mysqli_affected_rows($conn);
}

//tambahpelanggan
function tambahpelanggan($dtplgn)
{
	global $conn;
	$nama = mysqli_real_escape_string($conn, htmlspecialchars($dtplgn["namapelanggan"]));
	$jk = htmlspecialchars($dtplgn["jeniskelamin"]);
	$tmplahir = htmlspecialchars($dtplgn["tempatlahir"]);
	$tgllahir = htmlspecialchars($dtplgn["tgllahir"]);
	$alamat = htmlspecialchars($dtplgn["alamat"]);
	$idkota = htmlspecialchars($dtplgn["id_kota"]);
	$nohp= htmlspecialchars($dtplgn["nohp"]);
	$email = htmlspecialchars(strtolower(stripcslashes($dtplgn["email"])));
	$username = htmlspecialchars(strtolower(stripcslashes($dtplgn["username"])));
	$password = htmlspecialchars($dtplgn["password"]);
	$password1 = htmlspecialchars($dtplgn["password1"]);
	$tgldaftar = htmlspecialchars($dtplgn["tanggaldaftar"]);

	//cek konfirmasi password
	if($password !== $password1) {
		echo "
			<script> 
					alert('konfirmasi password tidak sesuai!');
			</script>
		";
		return false;
	}

	//enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	mysqli_query($conn, "INSERT INTO pelanggan
		VALUES 
		('', '$nama', '$jk', '$tmplahir', '$tgllahir', '$alamat', '$idkota','$nohp', '$email', '$username', '$password', '$tgldaftar')");

	return mysqli_affected_rows($conn);
}
//tambah admin
function tambahadmin($dtadm)
{
	global $conn;

	$username = htmlspecialchars(strtolower(stripcslashes($dtadm["username"])));
	$password = htmlspecialchars($dtadm["password"]);
	$nmlengkap = mysqli_real_escape_string($conn, htmlspecialchars($dtadm["namalengkap"]));
	$email = htmlspecialchars(strtolower(stripcslashes($dtadm["email"])));
	$notelpon= htmlspecialchars($dtadm["notelpon"]);
	$level = htmlspecialchars($dtadm["level"]);

	//enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	//diberi kutip karena merupakan string
	mysqli_query($conn, "INSERT INTO admin 
		VALUES 
		('', '$username','$password','$nmlengkap', '$email', '$notelpon', '$level')");

	return mysqli_affected_rows($conn);

}
//tambah Kategori
function tambahkategori($dataktgri)
{
	global $conn;
	$nmkategori = mysqli_real_escape_string($conn, htmlspecialchars($dataktgri["namakategori"]));

	$query = "INSERT INTO kategori VALUES
	('','$nmkategori')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
//tambah Bank
function tambahbank($dtbank)
{
	global $conn;
	$norek = htmlspecialchars($dtbank["norek"]);
	$nmbank  = mysqli_real_escape_string($conn, htmlspecialchars($dtbank["namabank"]));
	$atasnama = mysqli_real_escape_string($conn, htmlspecialchars($dtbank["atasnama"]));

	$query = "INSERT INTO bank 
	VALUES ('', '$norek', '$nmbank', '$atasnama')";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
//tambah kota
function tambahkota($dtkota)
{
	global $conn;
	//ambil datanya
	$nmkota = mysqli_real_escape_string($conn, htmlspecialchars($dtkota["nama_kota"]));
	$ongkir = htmlspecialchars($dtkota["ongkir"]);

	mysqli_query($conn, "INSERT INTO kota 
		VALUES ('', '$nmkota', '$ongkir')");

	return mysqli_affected_rows($conn);

}
//tambah subkategori
function tambahsubkategori($dtsubkategori)
{
	global $conn;
	//ambil datanya
	$nmkategori = mysqli_real_escape_string($conn, htmlspecialchars($dtsubkategori["namakategori"]));
	$nmsubkategori = mysqli_real_escape_string($conn, htmlspecialchars($dtsubkategori["nama_subkategori"]));

	mysqli_query($conn, "INSERT INTO sub_kategori 
		VALUES ('','$nmkategori', '$nmsubkategori')");

	return mysqli_affected_rows($conn);
}
//tambah produk
function tambahproduk($dtproduk)
{
	global $conn;
	//ambil data tiap-tiap elemen dalam form produk 
	$nmsubkategori = $dtproduk["nama_subkategori"];
	$nama_produk =mysqli_real_escape_string($conn, htmlspecialchars($dtproduk["nama_produk"]));
	$deskripsi =mysqli_real_escape_string($conn, htmlspecialchars($dtproduk["deskripsi"]));
	$hargaproduk =htmlspecialchars ($dtproduk["harga_produk"]);
	$stok =htmlspecialchars ($dtproduk["stok"]);;
	$berat =htmlspecialchars ($dtproduk["berat"]);
	$ukuran =htmlspecialchars ($dtproduk["ukuran"]);
	$diskon =htmlspecialchars ($dtproduk["diskon"]);
	$tglmasuk =htmlspecialchars ($dtproduk["tgl_masuk"]);

	//upload gambar
	// $nmfoto1 = upload('foto1');
	// $nmfoto2 = upload('foto2');
	// if (!$nmfoto1 && !$nmfoto2) 
	// {
	// 	return false;
	// }
	if ( $_FILES['foto1']['name'] && $_FILES['foto2']['name'] )
	{
		$nmfoto1 = upload('foto1');
		$nmfoto2 = upload('foto2');

		mysqli_query($conn, "INSERT INTO produk VALUES
			('', '$nmsubkategori', '$nama_produk', '$deskripsi', '$hargaproduk', '$stok',
			'$berat','$nmfoto1', '$nmfoto2', '$ukuran', '$diskon', '$tglmasuk')");

	}
	elseif ( $_FILES['foto1']['name'] )
	{
		$nmfoto1 = upload('foto1');
		mysqli_query($conn, "INSERT INTO produk VALUES
			('', '$nmsubkategori', '$nama_produk', '$deskripsi', '$hargaproduk', '$stok',
			'$berat','$nmfoto1', '', '$ukuran', '$diskon', '$tglmasuk')");
	}
	else if ( $_FILES['foto2']['name'] )
	{

		$nmfoto2 = upload('foto2');
		mysqli_query($conn, "INSERT INTO produk VALUES
			('', '$nmsubkategori', '$nama_produk', '$deskripsi', '$hargaproduk', '$stok',
			'$berat','', '$nmfoto2', '$ukuran', '$diskon', '$tglmasuk')");

		
	}
	return mysqli_affected_rows($conn);
}
//tambah order
function tambahorder($dtorder)
{
	global $conn;

	$nmpelanggan = mysqli_real_escape_string($conn, htmlspecialchars($dtorder["namapelanggan"]));
	$tglorder = htmlspecialchars($dtorder["tgl_order"]);
	$alamat = mysqli_real_escape_string($conn, htmlspecialchars($dtorder["alamat_pengirim"]));
	$namakota = mysqli_real_escape_string($conn, htmlspecialchars($dtorder["nama_kota"]));
	$sttsorder= htmlspecialchars($dtorder["status_order"]);
	$sttskonfirmasi= htmlspecialchars($dtorder["status_konfirmasi"]);
	$sttsterima= htmlspecialchars($dtorder["status_terima"]);
	$kurir1= htmlspecialchars($dtorder["kurir"]);
	$resi1= htmlspecialchars($dtorder["resi"]);
	//diberi kutip karena merupakan string
	mysqli_query($conn, "INSERT INTO orders 
		VALUES 
		('', '$nmpelanggan','$tglorder','$alamat', '$namakota', '$sttsorder', '$sttskonfirmasi', '$sttsterima', 
		'$kurir1', '$resi1')");

	return mysqli_affected_rows($conn);

}
//tambah kurir
function tambahkurir($dtkurir)
{
	global $conn;
	//ambil datanya
	$kurir1 = mysqli_real_escape_string($conn, htmlspecialchars($dtkurir["kurir"]));


	mysqli_query($conn, "INSERT INTO kurirs VALUES
		('', '$kurir1')");


	return mysqli_affected_rows($conn);
}


//cari pelanggan
function caripelanggan($keyword)
{
	global $conn;
	$query = "SELECT kodepelanggan, namapelanggan, alamat, nohp, email FROM pelanggan WHERE
	namapelanggan LIKE '%$keyword%' OR
	alamat LIKE '%$keyword%' OR
	nohp LIKE '%$keyword%' OR
	email LIKE '%$keyword%' ";

	return pelanggan($query);
}


####################
//edited by ramdan
function toRupiah($number)
{
	if ( is_numeric($number) )
	{

		return "Rp" . number_format($number, 0, ',', '.');
	}
}

function fromRupiah($rupiah)
{
	return (int) str_replace('Rp', '', str_replace('.', '', $rupiah));
}


function makeQuotes($value)
{
	return "'$value'";
}

function makeMultiValues($request)
{

	//cek ika array multidimensi
	if (isset($request[0]))
	{
		foreach ($request as $key => $value)
		{
			$value = array_map('makeQuotes', $value);

			$data[] = "(" . implode($value, ',') . ")";		
		}

		return implode($data, ',');
	}

	$request = array_map('makeQuotes', $request);

	return "(" . implode($request, ',') . ")";	
}

function getKeys($request)
{
	//cek jika array multidimensi
	if (isset($request[0]))
	{
		return "(" . implode(array_keys($request[0]), ',') . ")";
	}

	return "(" . implode(array_keys($request), ',') . ")";
}

function getQueryInsert($table, $request)
{
	return "INSERT INTO $table " . getKeys($request) . " VALUES " . makeMultiValues($request);
}

function insert($table, $request) 
{
	global $conn;
	
	mysqli_query($conn, getQueryInsert($request, $table));

	return mysqli_insert_id($conn);
}

function getQueryUpdate($table, $request, $where)
{
	$string = "";
	foreach ($request as $key => $value)
	{
		$string .= " $key='$value', ";
	}

	$string = substr($string, 0, strlen($string) - 2);
	
	return "UPDATE $table set $string where $where";
}

function update($table, $request, $where)
{
	global $conn;
	
	mysqli_query($conn, getQueryUpdate($table, $request, $where));

	return mysqli_affected_rows($conn);
}

function delete($table, $where)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM $table WHERE $where");

	return mysqli_affected_rows($conn);	
}

function get($table)
{
	global $conn;
	$sqlTable = mysqli_query($conn, "SELECT * FROM $table");

	while ($rows = mysqli_fetch_assoc($sqlTable))
	{
		$data[] = $rows;
	}

	return $data;
}

function getWhere($table, $where)
{
	global $conn;
	$sqlTable = mysqli_query($conn, "SELECT * FROM $table where $where");

	while ($rows = mysqli_fetch_assoc($sqlTable))
	{
		$data[] = $rows;
	}

	return $data;
}

function select($columns, $table)
{
	global $conn;
	$sqlTable = mysqli_query($conn, "SELECT $columns FROM $table");

	while ($rows = mysqli_fetch_assoc($sqlTable))
	{
		$data[] = $rows;
	}

	return $data;
}

function selectWhere($columns, $table, $where)
{
	global $conn;
	$sqlTable = mysqli_query($conn, "SELECT $columns FROM $table WHERE $where");

	while ($rows = mysqli_fetch_assoc($sqlTable))
	{
		$data[] = $rows;
	}

	return $data;
}


function decrement($table, $column, $decrement, $where)
{
	global $conn;
	mysqli_query($conn, "UPDATE $table set $column = $column - $decrement WHERE $where");

	return mysqli_affected_rows($conn);
}

function increment($table, $column, $decrement, $where)
{
	global $conn;
	mysqli_query($conn, "UPDATE $table set $column = $column + $decrement WHERE $where");

	return mysqli_affected_rows($conn);
}

function check($table, $where)
{
	global $conn;
	$query = mysqli_query($conn, "select count(*) as count from $table WHERE $where");

	return mysqli_fetch_assoc($query)['count'];
}

####################

?>


