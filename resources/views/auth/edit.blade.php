@extends('master.master')
@section('title')
    SAPRAS | Edit Pengguna
@endsection

@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Data Pengguna</h3>
                </div>
                <form action="{{ route('pengguna.update', $user->id) }}" method="POST" id="barang-form">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row g-5">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="required">Email</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        value="{{ old('email', $user->email) }}" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama" class="required">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control" id="nama"
                                        value="{{ old('nama', $user->nama) }}" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" />
                                    <small class="text-muted">Kosongkan jika tidak ingin mengubah password.</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="role" class="required">Role</label>
                                    <select name="role" class="form-select" id="role" data-control="select2"
                                        required>
                                        <option value="member" {{ $user->role === 'member' ? 'selected' : '' }}>Member</option>
                                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="superadmin" {{ $user->role === 'superadmin' ? 'selected' : '' }}>Super Admin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" class="form-control" id="alamat">{{ old('alamat', $user->alamat) }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('pengguna.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
                            <button type="submit" class="btn btn-primary btn-sm">Simpan Perubahan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
