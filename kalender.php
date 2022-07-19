<div class="rightcolumn" style="background-color: white" >
			<div class="card" style="background-color: white">
				<h1><center>KALENDER</center></h1>
			<?php
	        //mengambil tanggal sistem saat ini (1-31)
	        $hari = date("d");
	        $hariini=$hari;
	        //mengambil bulan sistem saat ini (1-12)
	        $bulan = date("m");
	        //mengambil tahun sistem saat ini
	        $tahun = date("Y");
	        //mencari jumlah hari bulan dan tahun ini
	        $jumlahhari = date("t",mktime(0,0,0,$bulan,$hari,$tahun));
	        ?>

            <?php
	        switch ($bulan) {
            case 1: $nmbulan = "Jan"; break;
		    case 2: $nmbulan = "Feb"; break;
		    case 3: $nmbulan = "Mar"; break;
		    case 4: $nmbulan = "Apr"; break;
		    case 5: $nmbulan = "Mei"; break;
		    case 6: $nmbulan = "Jun"; break;
		    case 7: $nmbulan = "Jul"; break;
		    case 8: $nmbulan = "Agu"; break;
		    case 9: $nmbulan = "Sep"; break;
		    case 10: $nmbulan = "Okt"; break;
		    case 11: $nmbulan = "Nov"; break;
		    case 12: $nmbulan = "Des"; break;
	        }
	        echo "<center><h1>$nmbulan $tahun</h1></center>";
	        ?>	    
	        <br>
	<table style="border: 2px solid #000000" align="center" cellpadding="5">
		<tr bgcolor="#FF0000">
			<td align="center"><font color="#FFFFFF">Min</font></td>
			<td align="center">Sen</td>
			<td align="center">Sel</td>
			<td align="center">Rab</td>
			<td align="center">Kam</td>
			<td align="center">Jum</td>
			<td align="center">Sab</td>
		</tr>

        <?php
	    $s=date("w",mktime (0,0,0,$bulan,1,$tahun));
	    for ($ds=1; $ds<=$s; $ds++) { 
		echo "<td></td>";
	}

	for ($d=1; $d<=$jumlahhari; $d++) {
		//jika minggu ke 0, maka buat baris baru
		if (date("w",mktime (0,0,0,$bulan,$d,$tahun))==0) {
			echo "<tr>";
		}

		$warna="#000000"; //warna default
		$warnasel="white"; //warna sel default

		//jika hari minggu beri warna merah
		if (date("l",mktime (0,0,0,$bulan,$d,$tahun))=="Sunday") {
			$warna="#FF0000";
		}

		//blok sel yang sesuai hari ini
		if ($hariini==$d) {
			$warna="black";
			$warnasel="lightgrey";
		}

		//beri warna default tanggal tiap harinya (selain hari minggu)
		echo "<td align=center valign=middle bgcolor=$warnasel> <span style=\"color:$warna\">$d</span></td>";

		//jika hari ke enam, akhiri baris
		if (date("w",mktime (0,0,0,$bulan,$d,$tahun))==6) {
			echo "</tr>";
		}
	} 
	echo '</table>';
    ?>