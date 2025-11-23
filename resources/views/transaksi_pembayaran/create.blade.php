<form action="{{ url('/transaksi_pembayaran/store') }}" 
      method="POST" 
      id="form-tambah-pembayaran" 
      enctype="multipart/form-data">

    @csrf

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title text-primary">Tambah Pembayaran Pertama</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body">

                {{-- INFO --}}
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i>
                    Sistem akan otomatis membuat tagihan untuk bulan berikutnya
                </div>

                {{-- TRANSAKSI SEWA --}}
                <div class="form-group">
                    <label>Transaksi Sewa <span class="text-danger">*</span></label>
                    <select name="id_transaksi_sewa" id="id_transaksi_sewa" class="form-control" required>
                        <option value="">-- Pilih Transaksi Sewa --</option>
                        @foreach ($transaksiSewa as $sewa)
                            <option value="{{ $sewa->id_transaksi_sewa }}">
                                {{ $sewa->penyewa->nama }} | Kamar {{ $sewa->kamar->no_kamar }} | {{ $sewa->lama_sewa }} bulan
                            </option>
                        @endforeach
                    </select>
                    <small id="error-id_transaksi_sewa" class="error-text text-danger"></small>
                </div>

                {{-- NOMINAL --}}
                <div class="form-group">
                    <label>Nominal Pembayaran <span class="text-danger">*</span></label>
                    <input type="number" name="nominal" id="nominal" class="form-control" 
                           placeholder="Contoh: 500000" required>
                    <small class="text-muted">Minimal 1 bulan sewa</small>
                    <small id="error-nominal" class="error-text text-danger d-block"></small>
                </div>

                {{-- TANGGAL BAYAR --}}
                <div class="form-group">
                    <label>Tanggal Bayar <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal_bayar" id="tanggal_bayar" 
                           class="form-control" value="{{ date('Y-m-d') }}" required>
                    <small id="error-tanggal_bayar" class="error-text text-danger d-block"></small>
                </div>

                {{-- BUKTI BAYAR --}}
                <div class="form-group">
                    <label>Bukti Bayar <span class="text-danger">*</span></label>
                    <input type="file" name="bukti_bayar" id="bukti_bayar" 
                           class="form-control-file" accept="image/*,.pdf" required>
                    <small class="text-muted">Format: JPG, PNG, PDF (Max: 2MB)</small>
                    <small id="error-bukti_bayar" class="error-text text-danger d-block"></small>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                    Batal
                </button>
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fas fa-save"></i> Simpan
                </button>
            </div>

        </div>
    </div>

</form>

<script>
$(document).ready(function() {

    // Validasi & Submit
    $("#form-tambah-pembayaran").validate({
        rules: {
            id_transaksi_sewa: { required: true },
            nominal: { required: true, number: true, min: 1 },
            tanggal_bayar: { required: true },
            bukti_bayar: { required: true }
        },
        submitHandler: function(form) {
            var formData = new FormData(form);

            $.ajax({
                url: form.action,
                type: form.method,
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status) {
                        $('#myModal').modal('hide');
                        
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: response.message
                        });

                        // Reload DataTable
                        if (typeof dataPembayaran !== 'undefined') {
                            dataPembayaran.ajax.reload();
                        }

                        form.reset();
                    } else {
                        // Tampilkan error
                        $('.error-text').text('');
                        if (response.msgField) {
                            $.each(response.msgField, function(prefix, val) {
                                $('#error-' + prefix).text(val[0]);
                            });
                        }
                        
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: response.message
                        });
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Terjadi kesalahan server'
                    });
                }
            });
            
            return false;
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function(element) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element) {
            $(element).removeClass('is-invalid');
        }
    });

});
</script>