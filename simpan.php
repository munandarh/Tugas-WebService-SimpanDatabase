<?php
include 'koneksi.php';
    if( !$xml = simplexml_load_file('apotik.xml') ) //using simplexml_load_file function to load xml file
    {
        echo 'load XML failed ! ';
    }
    else
    {
        echo '<h1>This is the Data</h1>';
		foreach( $xml as $simpan ) //parse the xml file into object
        {
			$nama = $simpan->nama; //get the childnode title
			$kode = $simpan->kode; //get the child node author
			$ukuran = $simpan->ukuran; //get the child node publisher
			$satuan = $simpan->satuan; //get the child node month
			$jumlah = $simpan->jumlah;	 //get the child node year
			$khasiat = $simpan->khasiat;
			$harga  = $simpan->harga;
			$namaperusahaan  = $simpan->perusahaan->namaperusahaan;
			$alamat  = $simpan->perusahaan->alamat;
			$email = $simpan->perusahaan->email;

            echo 'nama : '.$nama.'<br />';
            echo 'kode : '.$kode.'<br />';
			echo 'ukuran : '.$ukuran.'<br />';
			echo 'satuan : '.$satuan.'<br />';
			echo 'jumlah : '.$jumlah.'<br />';
			echo 'khasiat : '.$khasiat.'<br />';
			echo 'harga : '.$harga.'<br />';
			echo 'namaperusahaan : '.$namaperusahaan.'<br />';
			echo 'alamat : '.$alamat.'<br />';
			echo 'email : '.$email.'<br />';
			echo '<br>';

//save to database
			$q = "INSERT INTO obat VALUES('','$nama','$kode','$ukuran','$satuan','$jumlah','$khasiat','$harga','$namaperusahaan $alamat $email')";
			$result = mysql_query($q);
        }
			if ($result) {
			echo '<h2>Success Save to Database </h2>';
			}
			else echo '<h2>Failed Save to Databaase</h2>';
    }
?> 