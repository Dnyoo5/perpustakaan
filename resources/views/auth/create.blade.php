@extends('master.master')
@section('title')
 PERPUSTAKAAN | CREATE PENGGUNA
@endsection

@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Data Barang</h3>
                </div>
                <form action="{{ route('pengguna.store') }}" method="POST" id="barang-form">
                    @csrf
                    <div class="card-body">
                        <div class="row g-5">
                            <!-- Email -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="required">Email</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" required />
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Nama Lengkap -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama" class="required">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{ old('nama') }}" required />
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password" class="required">Password</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" required />
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Role -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="role" class="required">Role</label>
                                    <select name="role" class="form-select @error('role') is-invalid @enderror" id="role" data-control="select2" required>
                                        <option value="">Pilih Role</option>
                                        <option value="member" {{ old('role') === 'member' ? 'selected' : '' }}>Member</option>
                                        <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="superadmin" {{ old('role') === 'superadmin' ? 'selected' : '' }}>Super Admin</option>
                                    </select>
                                    @error('role')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Alamat -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat">{{ old('alamat') }}</textarea>
                                    @error('alamat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('pengguna.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
