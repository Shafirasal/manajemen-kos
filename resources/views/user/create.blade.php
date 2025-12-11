<form action="{{ url('/user/store') }}" method="POST" id="form-tambah">
    @csrf
    <div id="modal-master" class="modal-dialog modal-md" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title text-primary">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body">

                {{-- USERNAME --}}
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control">
                    <small id="error-username" class="error-text text-danger"></small>
                </div>

                {{-- ROLE --}}
                <div class="form-group">
                    <label>Role</label>
                    <select name="role" id="role" class="form-control">
                        <option value="">-- Pilih Role --</option>
                        <option value="pemilik">Pemilik</option>
                        <option value="operator">Operator</option>
                        <option value="penyewa">Penyewa</option>
                    </select>
                    <small id="error-role" class="error-text text-danger"></small>
                </div>

                {{-- PENGELOLA (pemilik & operator) --}}
                <div class="form-group" id="form-pengelola" style="display:none;">
                    <label>Pilih Pengelola</label>
                    <select name="id_pengelola" class="form-control">
                        <option value="">-- Pilih User --</option>
                        @foreach ($pengelola as $p)
                            <option value="{{ $p->id_pemilik }}">
                                {{ $p->nama_pengelola ?? $p->nama_pemilik ?? $p->nama ?? 'Tanpa Nama' }}
                            </option>
                        @endforeach
                    </select>
                    <small id="error-id_pengelola" class="error-text text-danger"></small>
                </div>


                {{-- PENYEWA --}}
                <div class="form-group" id="form-penyewa" style="display:none;">
                    <label>Pilih Penyewa</label>
                    <select name="id_penyewa" class="form-control">
                        <option value="">-- Pilih User --</option>
                        @foreach ($penyewa as $p)
                            <option value="{{ $p->id_penyewa }}">
                                {{ $p->nama_penyewa ?? $p->nama ?? 'Tanpa Nama' }}
                            </option>
                        @endforeach
                    </select>
                    <small id="error-id_penyewa" class="error-text text-danger"></small>
                </div>

                {{-- PASSWORD --}}
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" id="password-field" class="form-control">
                    <small id="error-password" class="error-text text-danger"></small>
                </div>

            </div>

            <div class="modal-footer">
                <button class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>
                <button class="btn btn-primary btn-sm">Simpan</button>
            </div>

        </div>
    </div>
</form>

<script>
document.getElementById('role').addEventListener('change', function() {
    let role = this.value;

    document.getElementById('form-pengelola').style.display = 'none';
    document.getElementById('form-penyewa').style.display = 'none';

    if (role === 'pemilik' || role === 'operator') {
        document.getElementById('form-pengelola').style.display = 'block';
    }
    if (role === 'penyewa') {
        document.getElementById('form-penyewa').style.display = 'block';
    }
});
</script>

<script>
$(document).ready(function() {
    $("#form-tambah").validate({
        rules: {
            username: { required: true, minlength: 1, maxlenght: 40 },
            role: { required: true },
            password: { required: true, minlength: 5 },
        },

        submitHandler: function(form) {
            $.ajax({
                url: form.action,
                method: form.method,
                data: $(form).serialize(),
                success: function(res) {
                    if (res.status) {
                        $('#myModal').modal('hide');
                        Swal.fire('Berhasil', res.message, 'success');
                        dataUser.ajax.reload();
                    } else {
                        $('.error-text').text('');
                        $.each(res.msgField, function(i, msg) {
                            $('#error-' + i).text(msg[0]);
                        });
                    }
                }
            });
            return false;
        }
    });
});
</script>
