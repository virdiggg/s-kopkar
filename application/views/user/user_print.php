<!DOCTYPE html>
<html>
<head>
	<title>Print user</title>
</head>
<body>
<h3>Data User Koperasi karyawan</h3>
<table border="1" cellpadding="2" cellspacing="2">
      			<thead>
      					<th>No</th>
	      				<th>User Name</th>
                <th>Nama</th>
                <th>Bergabung</th>	      				
                <th>Kode Toko</th>
	      		<th>Level</th>
	      				
      			</thead>
      			<tbody>
      			<?php 
      			$no=1;
      			foreach($row->result() as $key => $data) { ?>
	      			<tr>
		      			<td><?= $no++ ?>.</td>
		      			<td><?= $data->username ?></td>
                <td><?= $data->nama ?></td>
		      			<td><?= $data->tgl_gabung ?></td>                                   
		      			<td><?= $data->kode_toko ?></td>
		      			<td>
                                         <?php
                                         if($data->level =="1"){
                                          echo "Pengurus";
                                         }
                                         else if($data->level =="2"){
                                          echo "Anggota";
                                         }
                                         else{
                                          echo "Karyawan Koperasi";
                                         }
                                         ?> 
                                    </td>
		      		
	      			</tr>
	      			<?php } ?>	
      			</tbody>
      		</table>
      		<script type="text/javascript">
      			window.print();
      		</script>
</body>
</html>