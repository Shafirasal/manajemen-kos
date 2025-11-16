<div class="modal-dialog" role="document">
    <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title">Detail Tipe Kamar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">

            <table class="table table-sm table-bordered table-striped">

                <tr>
                    <th class="text-right col-4">Nama Tipe</th>
                    <td class="col-8">{{ $tipeKamar->jenis_tipe_kamar }}</td>
                </tr>

                <tr>
                    <th class="text-right col-4">Harga / Bulan</th>
                    <td>Rp {{ number_format($tipeKamar->harga_perbulan, 0, ',', '.') }}</td>
                </tr>

                <tr>
                    <th class="text-right col-4">Fasilitas</th>
                    <td>{{ $tipeKamar->fasilitas }}</td>
                </tr>

                <tr>
                    <th class="text-right col-4">Tanggal Dibuat</th>
                    <td>{{ $tipeKamar->created_at }}</td>
                </tr>

                <tr>
                    <th class="text-right col-4">Terakhir Diupdate</th>
                    <td>{{ $tipeKamar->updated_at }}</td>
                </tr>

            </table>

        </div>

        <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
        </div>

    </div>
</div>
