<div class="modal-body">
    <div class="card-body">
        <div class="row g-5">
            <!-- Email -->
            <div class="col-md-4">
                <div class="form-group">
                    <label for="email" class="required">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}"
                        readonly />
                </div>
            </div>

            <!-- Nama Lengkap -->
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nama" class="required">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" id="nama" value="{{ $user->nama }}"
                        readonly />
                </div>
            </div>

            <!-- Password --

        <!-- Role -->
            <div class="col-md-4">
                <div class="form-group">
                    <label for="role" class="required">Role</label>
                    <input type="text" name="role" class="form-control" id="role"
                        value="{{ ucfirst($user->role) }}" readonly />
                </div>
            </div>

            <!-- Alamat -->
            <div class="col-md-12">
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" class="form-control" id="alamat" rows="3" readonly>{{ $user->alamat ?? '-' }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
