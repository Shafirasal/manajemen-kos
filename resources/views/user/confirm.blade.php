@empty($user)
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Kesalahan</h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="alert alert-danger">
                    <h5><i class="fas fa-ban"></i> Kesalahan!!!</h5>
                    Data user tidak ditemukan.
                </div>
                <a href="{{ url('/user') }}" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </div>

@else

    <form action="{{ url('/user/'.$user->id_user.'/delete') }}" method="POST" id="form-delete">
        @csrf
        @method('DELETE')

        <div id="modal-master" class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title text-primary">Hapus User</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="alert alert-warning">
                        <h5><i class="fas fa-exclamation-triangle"></i> Konfirmasi</h5>
                        Apakah Anda yakin ingin menghapus user berikut?
                    </div>

                    <table class="table table-sm table-bordered table-striped">

                        {{-- NAMA / IDENTITAS USER --}}
                        <tr>
                            <th class="text-right col-4">Nama User:</th>
                            <td class="col-8">
                                {{-- Penyewa --}}
                                @if($user->role === 'penyewa')
                                    {{ $user->penyewa->nama ?? '-' }}

                                {{-- Pemilik / Operator --}}
                                @elseif(in_array($user->role, ['pemilik','operator']))
                                    {{ $user->pengelola->nama ?? '-' }}

                                @else
                                    -
                                @endif
                            </td>
                        </tr>

                        {{-- USERNAME --}}
                        <tr>
                            <th class="text-right col-4">Username:</th>
                            <td class="col-8">{{ $user->username }}</td>
                        </tr>

                        {{-- ROLE --}}
                        <tr>
                            <th class="text-right col-4">Role:</th>
                            <td class="col-8">{{ ucfirst($user->role) }}</td>
                        </tr>

                        {{-- TANGGAL --}}
                        <tr>
                            <th class="text-right col-4">Dibuat Pada:</th>
                            <td class="col-8">{{ $user->created_at }}</td>
                        </tr>

                    </table>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger btn-sm">Ya, Hapus</button>
                </div>

            </div>
        </div>
    </form>

    {{-- AJAX DELETE --}}
    <script>
        $(document).ready(function() {

            $("#form-delete").on('submit', function(e){
                e.preventDefault();

                $.ajax({
                    url: this.action,
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(response) {

                        if(response.status){
                            $('#myModal').modal('hide');

                            Swal.fire({
                                icon: "success",
                                title: "Berhasil",
                                text: response.message
                            });

                            dataUser.ajax.reload();

                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Gagal",
                                text: response.message
                            });
                        }
                    },
                    error: function(){
                        Swal.fire({
                            icon: "error",
                            title: "Server Error",
                            text: "Terjadi kesalahan pada server."
                        });
                    }
                });
            });

        });
    </script>

@endempty
