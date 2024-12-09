<section class="content-header">
     
      <ol class="breadcrumb">
      <li><a href="#"><i class="fas fa-dolly mr-1"></i></a></li>
      <li class="active">Pinjaman Anggota</li>
      </ol>
</section>
	
<section class="content">
	<div class="row">
	<!-- =================================================================== -->
		<div class="col-lg-6">
			<div class="box box-widget">
				<div class="box-body">
				<form action="<?=site_url('aktivitas/update_pengajuan')?>" method="post">
					<table>
						<tr>
							<td style="vertical-align:top">
								<label for="tanggal">tanggal Pengajuan</label>
							</td>
							<td>
								<div class="form-group">
									<input type="date" name="tgl_pengajuan" value="<?=$row->tgl_pengajuan?>" class="form-control" readonly>
								</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top; width:50%">
								<label for="pengajuan_id">No Pinjaman</label>
							</td>
							<td>
							<div class="form-group">
								<input type="hidden" name="pengajuan_id" id="pengajuan_id" value="<?=$row->pengajuan_id?>" class="form-control" readonly>
								<input type="hidden" name="shu_ang" id="shu_ang" value="<?=$row->shu_ang?>" class="form-control" readonly>
								<input type="hidden" name="shu_kop" id="shu_kop" value="<?=$row->shu_kop?>" class="form-control" readonly>
								<input type="hidden" name="shu_bln" id="shu_bln" value="<?=$row->shu_bln?>" class="form-control" readonly>
								<input type="text" name="no_pinjaman" id="no_pinjaman" value="<?=$row->no_pinjaman?>" class="form-control" readonly>
							</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top; width:50%">
								<label for="koperasi_id">Koperasi ID</label>
							</td>
							<td>
							<div class="form-group">
								<input type="text" name="koperasi_id" id="koperasi_id" value="<?=$row->koperasi_id?>" class="form-control" readonly>
							</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top; width:40%">
								<label for="nama">Nama</label>
							</td>
							<td>
							<div class="form-group">
								<input type="text" name="nama" id="nama" value="<?=$row->nama?>" class="form-control" readonly>
							</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top; width:40%">
								<label>Jumlah Pengajuan</label>
							</td>
							<td>
							<div class="form-group">
								<input type="text" name="jumlah_pinjaman" id="jumlah_pinjaman" value="<?=$row->jumlah_pinjaman?>" class="form-control" readonly>
							</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top; width:40%">
								<label>Jenis Pinjaman</label>
							</td>
							<td>
							<div class="form-group">
								<input type="text" name="jenis_pinjaman" id="jenis_pinjaman" value="<?=$row->jenis_pinjaman?>" class="form-control" readonly>
							</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top; width:40%">
								<label>Lama angsuran</label>
							</td>
							<td>
							<div class="form-group">
								<input type="text" name="lama_angsuran" id="lama_angsuran" value="<?=$row->lama_angsuran?>" class="form-control" readonly>
							</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top; width:40%">
								<label>Jumlah Kewajiban</label>
							</td>
							<td>
							<div class="form-group">
								<input type="text" name="jumlah_kewajiban" id="jumlah_kewajiban" value="<?=$row->jumlah_kewajiban?>" class="form-control" readonly>
							</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top; width:40%">
								<label>Kewajiban/bln</label>
							</td>
							<td>
							<div class="form-group">
								<input type="text" name="kewajiban_bulan" id="kewajiban_bulan" value="<?=$row->kewajiban_bulan?>" class="form-control" readonly>
							</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top">
								<label for="status">Status Pengajuan</label>		
							</td>
							<td>
								<div>
									<select id="status" name="status" class="form-control">
										<option value="DISETUJUI">Disetujui</option>
										<option value="DITOLAK">Ditolak</option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
						<td></td>
							<td style="padding-top:10px">
							<button id="proses" name="proses" class="btn btn-success"><i class="fa fa-paper-plane"> Proses</i></button>
							<a href="<?=site_url('aktivitas/tampil_data_pengajuan')?>" class="btn btn-primary"><i class="fa fa-back"> Kembali</i></a>
							</td>

						</tr>
					</table>
					</form>
				</div>
			</div>
		</div>	
	</div>


	<div class="row mt-4">
		<div class="col-lg-12">
			<div class="box box-widget">
				<div class="box-body table-responsive">
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
							<tr>
								<td colspan="9" class="text-center">Tidak ada Item</td>
							</tr>
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
								<label for="sub_total">Kewajiban Berjalan</label>
							</td>
							<td>
								<div class="form-group">
									<input type="number" id="sub_total" value="" class="form-control" readonly="">
								</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top;">
								<label for="discount">Pengajuan Baru</label>
							</td>
							<td>
								<div  class="form-group">
									<input type="number" id="discount" value="0" min="0" class="form-control">
								</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top;">
								<label for="grand_total">Total Pinjaman</label>
							</td>
							<td>
								<div class="form-group">
									<input type="number" id="grand-total" class="form-control" readonly>
								</div>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		
		
	</div>
</section>