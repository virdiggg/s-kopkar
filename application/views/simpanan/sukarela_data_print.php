<!DOCTYPE html>
<html>
<head>
	<title>Simpanan sukarela print</title>
</head>
<body>
<table border="1" cellspacing="3" cellpadding="3">
      			<thead>
      					<th>No</th>
	      				<th>Nama</th>
	      				<th>No Tabungan S_sukarela</th>
	      				<th>Jumlah</th>	      				
	      				
      			</thead>
      			<tbody>
                        <?php
                        $no=1;
                        foreach ($row as $data){ ?>
      			<tr>
                             <td><?=$no++?></td>          
                             <td><?=$data->nama?></td>          
                             <td><?=$data->no_tab_sukarela?></td>          
                             <td><?=number_format($data->jumlah,0)?></td>          
                                 
                        </tr>
                        <?php } ?>
      			</tbody>
      		</table>
      		<script type="text/javascript">
      			window.print();
      		</script>

</body>
</html>