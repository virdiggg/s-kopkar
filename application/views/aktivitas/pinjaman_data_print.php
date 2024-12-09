<!DOCTYPE html>
<html>
<head>
	<title>Data pinjaman</title>
</head>
<body>
<h3>Data Pinjaman</h3>
<table border="1" cellpadding="3" cellspacing="3">
                        <thead>
                                    
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>No Pinjaman</th>
                                    <th>Status</th>
                                    <th>Jumlah Pinjaman</th>
                                    <th>Lama Angsuran</th>
                                    <th>Besar Angsuran</th>
                                    <th>Total Angsuran</th>                          
                                    <th>Masuk Angsuran</th>                          
                                    <th>Sisa Angsuran</th>                           
                                    <th>Sisa Bln</th>                             
                                    
                        </thead>
                        <tbody>
                        <?php
                        $no=1;
                        foreach ($row as $data){ ?>
                        <tr>
                       
                             <td><?=$no++?></td>          
                             <td><?=$data->nama?></td>          
                             <td><?=$data->no_pinjaman?></td>          
                             <td><?=$data->status_pinjaman?></td>          
                             <td><?=number_format($data->jumlah_pinjaman,0)?></td>  
                             <td><?=$data->lama_angsuran?></td>          
                             <td><?=number_format($data->besar_angsuran,0)?></td>    
                             <td><?=number_format($data->total_angsuran,0)?></td>    
                             <td><?=number_format($data->masuk_angsuran,0)?></td>    
                             <td><?=number_format($data->sisa_angsuran,0)?></td>     
                             <td><?=$data->sisa_angsuran_bln?></td>          
                                    
                        </tr>
                        <?php } ?>
                        </tbody>
                  </table>
                  <script type="text/javascript">
                  	window.print();
                  </script>
</body>
</html>