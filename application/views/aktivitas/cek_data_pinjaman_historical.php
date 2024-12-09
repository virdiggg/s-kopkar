<section class="content-header">
     
      <ol class="breadcrumb">
      <li><a href="#"><i class="fas fa-dolly mr-1"></i></a></li>
      <li class="active">Historical Pinjaman Anggota</li>
      </ol>
</section>
<section class="content">
	<div class="row mt-4">
		<div class="col-lg-12">
			<div class="box box-widget">
				<div class="box-body table-responsive">
				<div class="text-right" style="padding:4px;">
				<a href="<?=site_url('aktivitas/tampil_data_pengajuan')?>" class="btn btn-primary"><i class="fas fa-undo"> Kembali</i></a>
				</div>

					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Nama</th>
								<th>No Pinjaman</th>
								<th>Status Pinjaman</th>
								<th>Sisa Kewajiban</th>
								<th>Kewajiban/bln</th>								
								<th>Sisa (bulan)</th>
								
							</tr>
						</thead>
						<tbody>
						<?php
						$no=1;
						foreach($row as $data) { ?>
							<tr>
								<td><?=$no++?></td>
								<td><?=$data->nama?></td>
								<td><?=$data->no_pinjaman?></td>
								<td><?=$data->status_pinjaman?></td>
								<td><?=number_format($data->sisa_angsuran,0)?></td>
								<td><?=number_format($data->besar_angsuran,0)?></td>
								<td><?=$data->sisa_angsuran_bln?></td>
							</tr>
							<?php } ?>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="box box-widget">
				<div class="box-body">
					<table width="100%">
						<tr>
							<td style="vertical-align:top; width:40%">
								<label for="sub_total">Total Kewajiban Berjalan</label>
							</td>
							<td>
								<div class="form-group">
									<input type="text" id="sub_total" value="<?= !is_null($total_kewajiban->sisa_angsuran) ? number_format($total_kewajiban->sisa_angsuran, 0) : '' ?>" class="form-control" readonly="">
								</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top; width:40%">
								<label for="sub_total">Kewajiban per bulan</label>
							</td>
							<td>
								<div class="form-group">
									<input type="text" id="sub_total" value="<?= !is_null($total_kewajiban_perbulan->besar_angsuran) ? number_format($total_kewajiban_perbulan->besar_angsuran, 0) : '' ?>" class="form-control" readonly="">
								</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top;">
								<label for="discount">Pengajuan Baru</label>
							</td>
							<td>
								<div  class="form-group">
									<input type="text" id="" value="<?=number_format($pengajuan_baru->jumlah_kewajiban,0)?>" class="form-control" readonly="">
								</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top;">
								<label for="discount">Kewajiban Baru per bulan</label>
							</td>
							<td>
								<div  class="form-group">
									<input type="text" id="" value="<?=number_format($kewajiban_baru->kewajiban_bulan,0)?>" class="form-control" readonly="">
								</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top;">
								<label for="grand_total">Total Pinjaman</label>
							</td>
							<td>
								<div class="form-group">
									<input type="text" id="grand-total" class="form-control" value="<?=number_format($pengajuan_baru->jumlah_kewajiban + $total_kewajiban->sisa_angsuran,0)?>" readonly>
								</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top;">
								<label style="color:red;" for="grand_total">Total kewajiban perbulan</label>
							</td>
							<td>
								<div class="form-group">
									<input style="color:red;" type="text" id="grand-total" class="form-control" value="<?=number_format($kewajiban_baru->kewajiban_bulan + $total_kewajiban_perbulan->besar_angsuran,0)?>" readonly>
								</div>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>		
	</div>
</section>