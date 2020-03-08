<div class="container-fluid">
	<div class="card">
		<div class="card-body">
			<button type="button" class="btn btn-sm btn-flat btn-secondary">Jumlah : 1 Dokumen</button>
			<a href="<?php echo base_url() ?>archive/archive_add" class="btn btn-sm btn-flat btn-success float-right mx-1"><i class="mdi mdi-plus"></i> Tambah Dokumen</a>
			<a href="<?php echo base_url() ?>archive/archive_import" class="btn btn-sm btn-flat btn-secondary float-right mx-1"><i class="mdi mdi-upload"></i> Import Dokumen</a>
		</div>
	</div>

	<div class="card">
		<div class="card-body">
			<table class="table table-bordered text-center datatables">
				<thead class="bg-primary-template text-white text-bold">
					<tr>
						<th class="valign-middle"><b>NO ARSIP</b></th>
						<th class="valign-middle"><b>NO SURAT</b></th>
						<th class="valign-middle"><b>JENIS SURAT</b></th>
						<th class="valign-middle"><b>PERIHAL</b></th>
						<th class="valign-middle"><b>TANGGAL TERBIT</b></th>
						<th class="valign-middle"><b></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="valign-middle">ARC0001</td>
						<td class="valign-middle">N-GMU/001/1/2020</td>
						<td class="valign-middle">Nota Dinas</td>
						<td class="valign-middle">Biaya Perjalanan Dinas SPPD Direktur Utama</td>
						<td class="valign-middle">01-Jan-2020</td>
						<td class="valign-middle text-nowrap">
							<a class="btn btn-info text-white"><i class="mdi mdi-account-multiple"></i> Lihat</a>
							<a class="btn btn-primary text-white"><i class="mdi mdi-download"></i> Unduh</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

</div>