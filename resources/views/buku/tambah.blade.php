@extends('master.master')
@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start  container-xxl ">

                <!--begin::Post-->
                <div class="content flex-row-fluid" id="kt_content">
                    <!--begin::Form-->
                    <form id="kt_ecommerce_add_product_form"
                        class="form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework"
                        data-kt-redirect="/metronic8/demo11/apps/ecommerce/catalog/products.html">
                        <!--begin::Aside column-->
                        <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10"
                            data-select2-id="select2-data-132-h8y1">
                            <!--begin::Thumbnail settings-->
                            <div class="card card-flush py-4">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>Thumbnail</h2>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->

                                <!--begin::Card body-->
                                <div class="card-body text-center pt-0">
                                    <!--begin::Image input-->
                                    <!--begin::Image input placeholder-->
                                    <style>
                                        .image-input-placeholder {
                                            background-image: url('/metronic8/demo11/assets/media/svg/files/blank-image.svg');
                                        }

                                        [data-bs-theme="dark"] .image-input-placeholder {
                                            background-image: url('/metronic8/demo11/assets/media/svg/files/blank-image-dark.svg');
                                        }
                                    </style>
                                    <!--end::Image input placeholder-->

                                    <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                        data-kt-image-input="true">
                                        <!--begin::Preview existing avatar-->
                                        <div class="image-input-wrapper w-150px h-150px"></div>
                                        <!--end::Preview existing avatar-->

                                        <!--begin::Label-->
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            aria-label="Change avatar" data-bs-original-title="Change avatar"
                                            data-kt-initialized="1">
                                            <i class="ki-duotone ki-pencil fs-7"><span class="path1"></span><span
                                                    class="path2"></span></i>
                                            <!--begin::Inputs-->
                                            <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
                                            <input type="hidden" name="avatar_remove">
                                            <!--end::Inputs-->
                                        </label>
                                        <!--end::Label-->

                                        <!--begin::Cancel-->
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                            aria-label="Cancel avatar" data-bs-original-title="Cancel avatar"
                                            data-kt-initialized="1">
                                            <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span
                                                    class="path2"></span></i> </span>
                                        <!--end::Cancel-->

                                        <!--begin::Remove-->
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                            aria-label="Remove avatar" data-bs-original-title="Remove avatar"
                                            data-kt-initialized="1">
                                            <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span
                                                    class="path2"></span></i> </span>
                                        <!--end::Remove-->
                                    </div>
                                    <!--end::Image input-->

                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">Set the product thumbnail image. Only *.png, *.jpg and
                                        *.jpeg image files are accepted</div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Thumbnail settings-->
                            <!--begin::Status-->
                            <div class="card card-flush py-4" data-select2-id="select2-data-131-mapj">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>Kategori Buku</h2>
                                    </div>
                                    <!--end::Card title-->

                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <div class="rounded-circle bg-success w-15px h-15px"
                                            id="kt_ecommerce_add_product_status"></div>
                                    </div>
                                    <!--begin::Card toolbar-->
                                </div>
                                <!--end::Card header-->

                                <!--begin::Card body-->
                                <div class="card-body pt-0" data-select2-id="select2-data-130-az4i">
                                    <!--begin::Select2-->

                                    <select name="nama_penanggung_jawab" class="form-select mb-2" data-control="select2"
                                        data-allow-clear="true" data-placeholder="Nama Penanggung Jawab">
                                        <option value="">Nama Penanggung Jawab</option>

                                    </select>
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">Set the product status.</div>
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Status-->

                            <!--begin::Category & tags-->
                            <div class="card card-flush py-4">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>Product Details</h2>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->

                                <!--begin::Card body-->
                                <div class="card-body pt-0">

                                    <label class="form-label d-block">Tags</label>
                                    <!--end::Label-->

                                    <input type="text" name="nama_ruangan" id="tahun_terbit" class="form-control mb-2"
                                        placeholder="Masukan nama Ruangan/Kelas" value="{{ old('nama_ruangan') }}" />

                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">Add tags to a product.</div>
                                    <!--end::Description-->
                                    <!--end::Input group-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Category & tags-->
                            <!--begin::Weekly sales-->
                            <div class="card card-flush py-4">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>Weekly Sales</h2>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->

                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <span class="text-muted">No data available. Sales data will begin capturing once
                                        product has been published.</span>
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Weekly sales-->
                            <!--begin::Template settings-->
                            <div class="card card-flush py-4" data-select2-id="select2-data-144-kn6j">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>Product Template</h2>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->

                                <!--begin::Card body-->
                                <div class="card-body pt-0" data-select2-id="select2-data-143-zqk6">
                                    <!--begin::Select store template-->
                                    <label for="kt_ecommerce_add_product_store_template" class="form-label">Select a
                                        product template</label>
                                    <!--end::Select store template-->

                                    <!--begin::Select2-->
                                    <select class="form-select mb-2 select2-hidden-accessible" data-control="select2"
                                        data-hide-search="true" data-placeholder="Select an option"
                                        id="kt_ecommerce_add_product_store_template"
                                        data-select2-id="select2-data-kt_ecommerce_add_product_store_template"
                                        tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                        <option data-select2-id="select2-data-145-rtqe"></option>
                                        <option value="default" selected="" data-select2-id="select2-data-14-cgq5">
                                            Default template</option>
                                        <option value="electronics" data-select2-id="select2-data-146-73i3">Electronics
                                        </option>
                                        <option value="office" data-select2-id="select2-data-147-af3u">Office stationary
                                        </option>
                                        <option value="fashion" data-select2-id="select2-data-148-o30c">Fashion</option>
                                    </select><span
                                        class="select2 select2-container select2-container--bootstrap5 select2-container--below"
                                        dir="ltr" data-select2-id="select2-data-13-ptcb" style="width: 100%;"><span
                                            class="selection"><span
                                                class="select2-selection select2-selection--single form-select mb-2"
                                                role="combobox" aria-haspopup="true" aria-expanded="false"
                                                tabindex="0" aria-disabled="false"
                                                aria-labelledby="select2-kt_ecommerce_add_product_store_template-container"
                                                aria-controls="select2-kt_ecommerce_add_product_store_template-container"><span
                                                    class="select2-selection__rendered"
                                                    id="select2-kt_ecommerce_add_product_store_template-container"
                                                    role="textbox" aria-readonly="true" title="Default template">Default
                                                    template</span><span class="select2-selection__arrow"
                                                    role="presentation"><b
                                                        role="presentation"></b></span></span></span><span
                                            class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    <!--end::Select2-->

                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">Assign a template from your current theme to define how a
                                        single product is displayed.</div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Template settings-->
                        </div>
                        <!--end::Aside column-->

                        <!--begin::Main column-->
                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                            <!--begin:::Tabs-->
                            <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2"
                                role="tablist">
                                <!--begin:::Tab item-->

                                <!--end:::Tab item-->

                                <!--begin:::Tab item-->
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                        href="#kt_ecommerce_add_product_advanced" aria-selected="false" tabindex="-1"
                                        role="tab">Advanced</a>
                                </li>
                                <!--end:::Tab item-->

                            </ul>
                            <!--end:::Tabs-->
                            <!--begin::Tab content-->
                            <div class="tab-content">
                                <!--begin::Tab pane-->

                                <!--end::Tab pane-->

                                <!--begin::Tab pane-->
                                <div id="kt_ecommerce_add_product_advanced" role="tab-panel">
                                    <div class="d-flex flex-column gap-7 gap-lg-10">

                                        <!--begin::Inventory-->
                                        <div class="card card-flush py-4">
                                            <!--begin::Card header-->
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h2>Tambah Buku</h2>
                                                </div>
                                            </div>
                                            <!--end::Card header-->

                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">
                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Judul Buku</label>
                                                    <!--end::Label-->

                                                    <!--begin::Input-->
                                                    <input type="text" name="sku" class="form-control mb-2"
                                                        placeholder="Judul Buku" value="">
                                                    <!--end::Input-->

                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Masukan Judul Buku.</div>
                                                    <!--end::Description-->
                                                    <div
                                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    </div>
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Kode Buku</label>
                                                    <!--end::Label-->

                                                    <!--begin::Input-->
                                                    <input type="number" min="0" name="barcode"
                                                        class="form-control mb-2" placeholder="Kode Buku" value="">
                                                    <!--end::Input-->

                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Masukan Kode Buku.</div>
                                                    <!--end::Description-->
                                                    <div
                                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    </div>
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Stok</label>
                                                    <!--end::Label-->

                                                    <!--begin::Input-->
                                                    <div class="d-flex gap-3">
                                                        <input type="number" min="0" name="shelf"
                                                            class="form-control mb-2" placeholder="Stok Buku"
                                                            value="">

                                                    </div>
                                                    <!--end::Input-->

                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Masukan Stok Buku</div>
                                                    <!--end::Description-->
                                                    <div
                                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    </div>
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Input group-->

                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Card header-->
                                        </div>
                                        <!--end::Inventory-->

                                        <!--begin::Variations-->
                                        <div class="card card-flush py-4">
                                            <!--begin::Card header-->
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h2>Variations</h2>
                                                </div>
                                            </div>
                                            <!--end::Card header-->

                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">
                                                <!--begin::Input group-->
                                                <div class="" data-kt-ecommerce-catalog-add-product="auto-options">
                                                    <!--begin::Label-->
                                                    <label class="form-label">Add Product Variations</label>
                                                    <!--end::Label-->

                                                    <!--begin::Repeater-->
                                                    <div id="kt_ecommerce_add_product_options">
                                                        <!--begin::Form group-->
                                                        <div class="form-group">
                                                            <div data-repeater-list="kt_ecommerce_add_product_options"
                                                                class="d-flex flex-column gap-3">
                                                                <div data-repeater-item=""
                                                                    class="form-group d-flex flex-wrap align-items-center gap-5">
                                                                    <!--begin::Select2-->
                                                                    <div class="w-100 w-md-200px">
                                                                        <select
                                                                            class="form-select select2-hidden-accessible"
                                                                            name="kt_ecommerce_add_product_options[0][product_option]"
                                                                            data-placeholder="Select a variation"
                                                                            data-kt-ecommerce-catalog-add-product="product_option"
                                                                            data-select2-id="select2-data-126-moag"
                                                                            tabindex="-1" aria-hidden="true">
                                                                            <option
                                                                                data-select2-id="select2-data-128-uxha">
                                                                            </option>
                                                                            <option value="color">Color</option>
                                                                            <option value="size">Size</option>
                                                                            <option value="material">Material</option>
                                                                            <option value="style">Style</option>
                                                                        </select><span
                                                                            class="select2 select2-container select2-container--bootstrap5"
                                                                            dir="ltr"
                                                                            data-select2-id="select2-data-127-l0lq"
                                                                            style="width: 100%;"><span
                                                                                class="selection"><span
                                                                                    class="select2-selection select2-selection--single form-select"
                                                                                    role="combobox" aria-haspopup="true"
                                                                                    aria-expanded="false" tabindex="0"
                                                                                    aria-disabled="false"
                                                                                    aria-labelledby="select2-kt_ecommerce_add_product_options0product_option-vz-container"
                                                                                    aria-controls="select2-kt_ecommerce_add_product_options0product_option-vz-container"><span
                                                                                        class="select2-selection__rendered"
                                                                                        id="select2-kt_ecommerce_add_product_options0product_option-vz-container"
                                                                                        role="textbox"
                                                                                        aria-readonly="true"
                                                                                        title="Select a variation"><span
                                                                                            class="select2-selection__placeholder">Select
                                                                                            a variation</span></span><span
                                                                                        class="select2-selection__arrow"
                                                                                        role="presentation"><b
                                                                                            role="presentation"></b></span></span></span><span
                                                                                class="dropdown-wrapper"
                                                                                aria-hidden="true"></span></span>
                                                                    </div>
                                                                    <!--end::Select2-->

                                                                    <!--begin::Input-->
                                                                    <input type="text"
                                                                        class="form-control mw-100 w-200px"
                                                                        name="kt_ecommerce_add_product_options[0][product_option_value]"
                                                                        placeholder="Variation">
                                                                    <!--end::Input-->

                                                                    <button type="button" data-repeater-delete=""
                                                                        class="btn btn-sm btn-icon btn-light-danger">
                                                                        <i class="ki-duotone ki-cross fs-1"><span
                                                                                class="path1"></span><span
                                                                                class="path2"></span></i> </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Form group-->

                                                        <!--begin::Form group-->
                                                        <div class="form-group mt-5">
                                                            <button type="button" data-repeater-create=""
                                                                class="btn btn-sm btn-light-primary">
                                                                <i class="ki-duotone ki-plus fs-2"></i> Add another
                                                                variation
                                                            </button>
                                                        </div>
                                                        <!--end::Form group-->
                                                    </div>
                                                    <!--end::Repeater-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Card header-->
                                        </div>
                                        <!--end::Variations-->

                                        <!--begin::Shipping-->
                                        <div class="card card-flush py-4">
                                            <!--begin::Card header-->
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h2>Shipping</h2>
                                                </div>
                                            </div>
                                            <!--end::Card header-->

                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">
                                                <!--begin::Input group-->
                                                <div class="fv-row">
                                                    <!--begin::Input-->
                                                    <div class="form-check form-check-custom form-check-solid mb-2">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="kt_ecommerce_add_product_shipping_checkbox"
                                                            value="1">
                                                        <label class="form-check-label">
                                                            This is a physical product
                                                        </label>
                                                    </div>
                                                    <!--end::Input-->

                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Set if the product is a physical or
                                                        digital item. Physical products may require shipping.</div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Shipping form-->
                                                <div id="kt_ecommerce_add_product_shipping" class="d-none mt-10">
                                                    <!--begin::Input group-->
                                                    <div class="mb-10 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="form-label">Weight</label>
                                                        <!--end::Label-->

                                                        <!--begin::Editor-->
                                                        <input type="text" name="weight" class="form-control mb-2"
                                                            placeholder="Product weight" value="">
                                                        <!--end::Editor-->

                                                        <!--begin::Description-->
                                                        <div class="text-muted fs-7">Set a product weight in kilograms
                                                            (kg).</div>
                                                        <!--end::Description-->
                                                    </div>
                                                    <!--end::Input group-->

                                                    <!--begin::Input group-->
                                                    <div class="fv-row">
                                                        <!--begin::Label-->
                                                        <label class="form-label">Dimension</label>
                                                        <!--end::Label-->

                                                        <!--begin::Input-->
                                                        <div class="d-flex flex-wrap flex-sm-nowrap gap-3">
                                                            <input type="number" name="width"
                                                                class="form-control mb-2" placeholder="Width (w)"
                                                                value="">
                                                            <input type="number" name="height"
                                                                class="form-control mb-2" placeholder="Height (h)"
                                                                value="">
                                                            <input type="number" name="length"
                                                                class="form-control mb-2" placeholder="Lengtn (l)"
                                                                value="">
                                                        </div>
                                                        <!--end::Input-->

                                                        <!--begin::Description-->
                                                        <div class="text-muted fs-7">Enter the product dimensions in
                                                            centimeters (cm).</div>
                                                        <!--end::Description-->
                                                    </div>
                                                    <!--end::Input group-->
                                                </div>
                                                <!--end::Shipping form-->
                                            </div>
                                            <!--end::Card header-->
                                        </div>
                                        <!--end::Shipping-->
                                        <!--begin::Meta options-->
                                        <div class="card card-flush py-4">
                                            <!--begin::Card header-->
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h2>Meta Options</h2>
                                                </div>
                                            </div>
                                            <!--end::Card header-->

                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">
                                                <!--begin::Input group-->
                                                <div class="mb-10">
                                                    <!--begin::Label-->
                                                    <label class="form-label">Meta Tag Title</label>
                                                    <!--end::Label-->

                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control mb-2" name="meta_title"
                                                        placeholder="Meta tag name">
                                                    <!--end::Input-->

                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Set a meta tag title. Recommended to be
                                                        simple and precise keywords.</div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Input group-->
                                                <div class="mb-10">
                                                    <!--begin::Label-->
                                                    <label class="form-label">Meta Tag Description</label>
                                                    <!--end::Label-->

                                                    <!--begin::Editor-->
                                                    <div role="toolbar" class="ql-toolbar ql-snow"><span
                                                            class="ql-formats"><span class="ql-header ql-picker"><span
                                                                    class="ql-picker-label" tabindex="0" role="button"
                                                                    aria-expanded="false"
                                                                    aria-controls="ql-picker-options-1"><svg
                                                                        viewBox="0 0 18 18">
                                                                        <polygon class="ql-stroke"
                                                                            points="7 11 9 13 11 11 7 11"></polygon>
                                                                        <polygon class="ql-stroke"
                                                                            points="7 7 9 5 11 7 7 7"></polygon>
                                                                    </svg></span><span class="ql-picker-options"
                                                                    aria-hidden="true" tabindex="-1"
                                                                    id="ql-picker-options-1"><span tabindex="0"
                                                                        role="button" class="ql-picker-item"
                                                                        data-value="1"></span><span tabindex="0"
                                                                        role="button" class="ql-picker-item"
                                                                        data-value="2"></span><span tabindex="0"
                                                                        role="button"
                                                                        class="ql-picker-item ql-selected"></span></span></span><select
                                                                class="ql-header" style="display: none;">
                                                                <option value="1"></option>
                                                                <option value="2"></option>
                                                                <option selected="selected"></option>
                                                            </select></span><span class="ql-formats"><button
                                                                type="button" class="ql-bold" aria-pressed="false"
                                                                aria-label="bold"><svg viewBox="0 0 18 18">
                                                                    <path class="ql-stroke"
                                                                        d="M5,4H9.5A2.5,2.5,0,0,1,12,6.5v0A2.5,2.5,0,0,1,9.5,9H5A0,0,0,0,1,5,9V4A0,0,0,0,1,5,4Z">
                                                                    </path>
                                                                    <path class="ql-stroke"
                                                                        d="M5,9h5.5A2.5,2.5,0,0,1,13,11.5v0A2.5,2.5,0,0,1,10.5,14H5a0,0,0,0,1,0,0V9A0,0,0,0,1,5,9Z">
                                                                    </path>
                                                                </svg></button><button type="button" class="ql-italic"
                                                                aria-pressed="false" aria-label="italic"><svg
                                                                    viewBox="0 0 18 18">
                                                                    <line class="ql-stroke" x1="7" x2="13"
                                                                        y1="4" y2="4"></line>
                                                                    <line class="ql-stroke" x1="5" x2="11"
                                                                        y1="14" y2="14"></line>
                                                                    <line class="ql-stroke" x1="8" x2="10"
                                                                        y1="14" y2="4"></line>
                                                                </svg></button><button type="button" class="ql-underline"
                                                                aria-pressed="false" aria-label="underline"><svg
                                                                    viewBox="0 0 18 18">
                                                                    <path class="ql-stroke"
                                                                        d="M5,3V9a4.012,4.012,0,0,0,4,4H9a4.012,4.012,0,0,0,4-4V3">
                                                                    </path>
                                                                    <rect class="ql-fill" height="1" rx="0.5"
                                                                        ry="0.5" width="12" x="3" y="15"></rect>
                                                                </svg></button></span><span class="ql-formats"><button
                                                                type="button" class="ql-image" aria-pressed="false"
                                                                aria-label="image"><svg viewBox="0 0 18 18">
                                                                    <rect class="ql-stroke" height="10" width="12"
                                                                        x="3" y="4"></rect>
                                                                    <circle class="ql-fill" cx="6" cy="7"
                                                                        r="1"></circle>
                                                                    <polyline class="ql-even ql-fill"
                                                                        points="5 12 5 11 7 9 8 10 11 7 13 9 13 12 5 12">
                                                                    </polyline>
                                                                </svg></button><button type="button"
                                                                class="ql-code-block" aria-pressed="false"
                                                                aria-label="code-block"><svg viewBox="0 0 18 18">
                                                                    <polyline class="ql-even ql-stroke"
                                                                        points="5 7 3 9 5 11"></polyline>
                                                                    <polyline class="ql-even ql-stroke"
                                                                        points="13 7 15 9 13 11"></polyline>
                                                                    <line class="ql-stroke" x1="10" x2="8"
                                                                        y1="5" y2="13"></line>
                                                                </svg></button></span></div>
                                                    <div id="kt_ecommerce_add_product_meta_description"
                                                        name="kt_ecommerce_add_product_meta_description"
                                                        class="min-h-100px mb-2 ql-container ql-snow">
                                                        <div class="ql-editor ql-blank" contenteditable="true"
                                                            data-placeholder="Type your text here...">
                                                            <p><br></p>
                                                        </div>
                                                        <div class="ql-tooltip ql-hidden"><a class="ql-preview"
                                                                rel="noopener noreferrer" target="_blank"
                                                                href="about:blank"></a><input type="text"
                                                                data-formula="e=mc^2" data-link="https://quilljs.com"
                                                                data-video="Embed URL"><a class="ql-action"></a><a
                                                                class="ql-remove"></a></div>
                                                    </div>
                                                    <!--end::Editor-->

                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Set a meta tag description to the product
                                                        for increased SEO ranking.</div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Input group-->
                                                <div>
                                                    <!--begin::Label-->
                                                    <label class="form-label">Meta Tag Keywords</label>
                                                    <!--end::Label-->

                                                    <!--begin::Editor-->
                                                    <input id="kt_ecommerce_add_product_meta_keywords"
                                                        name="kt_ecommerce_add_product_meta_keywords"
                                                        class="form-control mb-2">
                                                    <!--end::Editor-->

                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Set a list of keywords that the product is
                                                        related to. Separate the keywords by adding a comma <code>,</code>
                                                        between each keyword.</div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Card header-->
                                        </div>
                                        <!--end::Meta options-->
                                    </div>
                                </div>
                                <!--end::Tab pane-->

                            </div>
                            <!--end::Tab content-->

                            <div class="d-flex justify-content-end">
                                <!--begin::Button-->
                                <a href="/metronic8/demo11/apps/ecommerce/catalog/products.html"
                                    id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">
                                    Cancel
                                </a>
                                <!--end::Button-->

                                <!--begin::Button-->
                                <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                                    <span class="indicator-label">
                                        Save Changes
                                    </span>
                                    <span class="indicator-progress">
                                        Please wait... <span
                                            class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                                <!--end::Button-->
                            </div>
                        </div>
                        <!--end::Main column-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Post-->
            </div>
        </div>
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
