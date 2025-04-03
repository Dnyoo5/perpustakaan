@extends('master.master')
@section('title')
 PERPUSTAKAAN | EDIT BUKU
@endsection
@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
                <!--begin::Post-->
                <div class="content flex-row-fluid" id="kt_content">
                    <!--begin::Form-->
                    <form id="kt_ecommerce_edit_product_form" action="{{ route('buku.update', $buku->id) }}" method="POST"
                        class="form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!--begin::Aside column-->
                        <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                            <!--begin::Thumbnail settings-->
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Gambar Buku</h2>
                                    </div>
                                </div>
                                <div class="card-body text-center pt-0">
                                    <div class="image-input image-input-outline" data-kt-image-input="true">
                                        <div class="image-input-wrapper w-150px h-150px" style="background-image: url('{{ asset('storage/' . $buku->gambar) }}');"></div>
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar" data-bs-original-title="Change avatar">
                                            <i class="ki-duotone ki-pencil fs-7"><span class="path1"></span><span class="path2"></span></i>
                                            <input type="file" name="gambar" accept=".png, .jpg, .jpeg">
                                        </label>
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar" data-bs-original-title="Cancel avatar">
                                            <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>
                                        </span>
                                    </div>
                                    <div class="text-muted fs-7">Hanya file gambar *.png, *.jpg dan *.jpeg yang diterima</div>
                                    @error('gambar')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!--end::Thumbnail settings-->

                            <!--begin::Kategori Buku-->
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Kategori Buku</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <label class="form-label d-block">Kategori Buku</label>
                                    <select name="id_kategori" class="form-select mb-2" data-control="select2" data-allow-clear="true" data-placeholder="Kategori Buku">
                                        <option value="">Kategori Buku</option>
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}" {{ $buku->kategori_id == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_kategori')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                    <div class="text-muted fs-7">Pilih Kategori Buku yang tersedia</div>
                                </div>
                            </div>
                            <!--end::Kategori Buku-->

                            <!--begin::Tahun Penerbit-->
                            <div class="card card-flush py-8">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Tahun Penerbit</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <label class="form-label d-block">Tahun Terbit</label>
                                    <input type="text" name="tahun_terbit" id="tahun_terbit" class="form-control mb-2" placeholder="Masukan Tahun Terbit" value="{{ $buku->tahun_terbit }}" />
                                    @error('tahun_terbit')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                    <div class="text-muted fs-7">Tahun Terbit Buku.</div>
                                </div>
                            </div>
                            <!--end::Tahun Penerbit-->
                        </div>
                        <!--end::Aside column-->

                        <!--begin::Main column-->
                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                            <div class="tab-content">
                                <div id="kt_ecommerce_edit_product_advanced" role="tabpanel">
                                    <div class="d-flex flex-column gap-3 gap-lg-10">
                                        <!--begin::Inventory-->
                                        <div class="card card-flush py-4">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h2>Edit Buku</h2>
                                                </div>
                                            </div>
                                            <div class="card-body pt-0">
                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row fv-plugins-icon-container">
                                                    <label class="required form-label">Judul Buku</label>
                                                    <input type="text" name="judul_buku" class="form-control mb-2" placeholder="Judul Buku" value="{{ $buku->judul }}" />
                                                    @error('judul_buku')
                                                        <div class="text-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                    <div class="text-muted fs-7">Masukan Judul Buku.</div>
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row fv-plugins-icon-container">
                                                    <label class="required form-label">Kode Buku</label>
                                                    <input type="number" min="0" name="kode_buku" class="form-control mb-2" placeholder="Masukan Kode Buku" value="{{ $buku->kode_buku }}" />
                                                    @error('kode_buku')
                                                        <div class="text-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                    <div class="text-muted fs-7">Masukan Kode Buku.</div>
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row fv-plugins-icon-container">
                                                    <label class="required form-label">Stok</label>
                                                    <input type="number" min="0" name="stok" class="form-control mb-2" placeholder="Stok Buku" value="{{ $buku->stok }}" />
                                                    @error('stok')
                                                        <div class="text-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                    <div class="text-muted fs-7">Masukan Stok Buku.</div>
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row fv-plugins-icon-container">
                                                    <label class="required form-label">Penulis</label>
                                                    <input type="text" name="penulis" class="form-control mb-2" placeholder="Penulis" value="{{ $buku->penulis }}" />
                                                    @error('penulis')
                                                        <div class="text-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                    <div class="text-muted fs-7">Penulis Buku.</div>
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                        </div>
                                        <!--end::Inventory-->

                                        <!--begin::Sinopsis Buku-->
                                        <div class="card card-flush py-4">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h2>Sinopsis Buku</h2>
                                                </div>
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class="mb-10">
                                                    <label class="form-label required">Sinopsis Buku</label>
                                                    <textarea name="sinopsis" class="form-control" rows="4" placeholder="Masukan Sinopsis">{{ $buku->sinopsis }}</textarea>
                                                    @error('sinopsis')
                                                        <div class="text-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                    <div class="text-muted fs-7">Sinopsis Buku.</div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Sinopsis Buku-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Tab content-->

                            <div class="d-flex justify-content-end">
                                <a href="{{ route('buku') }}" class="btn btn-light me-5">Cancel</a>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </div>
                        <!--end::Main column-->
                    </form>
                </div>
                <!--end::Post-->
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#tahun_terbit').flatpickr({
            dateFormat: "Y",
        });
    </script>
@endsection
