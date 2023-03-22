<?php $this->load->view('back/include/header'); ?>
<!--begin::Main-->

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Haber Düzenleme Seçenekleri</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Panel</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Haberlerimiz / Genel Düzenleme</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->

            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">

                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title fs-3 fw-bold">İçeriği Düzenle</div>
                        <!--end::Card title-->
                        <div class="card-title fs-3 p-2">
                            <ul class="nav nav-stretch nav-line-tabs fw-semibold fs-6 border-transparent flex-nowrap" role="tablist" id="kt_layout_builder_tabs">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active btn btn-danger" data-bs-toggle="tab" href="#kt_builder_main" role="tab" aria-selected="true" style="color:#fff !important;">TR</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link btn btn-danger" data-bs-toggle="tab" href="#kt_builder_layout" role="tab" aria-selected="false" tabindex="-1" style="color:#fff !important;">EN</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Form-->
                    <form id="kt_project_settings_form" class="form" action="<?php echo base_url('admin/haberupdate'); ?>" method="post" enctype="multipart/form-data">
                        <!--begin::Card body-->
                        <div class="tab-content">
                            <div class="card-body p-9 tab-pane fade show active" id="kt_builder_main" role="tabpanel1">
                                <!--begin::Row-->
                                <!--begin::Row-->
                                <div class="mt-5 mb-8">
                                    <!--begin::Col-->
                                    <div class="col-xl-3">
                                        <div class="fs-6 fw-semibold mt-2 mb-3">Haber Başlığı</div>
                                        <div class="form-text mb-2">Görselin yukarısında duracak bold yazım başlık.</div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-12 fv-row">
                                        <input type="text" class="form-control form-control-solid" name="tr_anabaslik" value="<?php echo $haber->tr_anabaslik; ?>" />
                                    </div>
                                </div>
                                <!--end::Row-->
                                <!--begin::Row-->
                                <div class="mt-5 mb-8">
                                    <!--begin::Col-->
                                    <div class="col-xl-3">
                                        <div class="fs-6 fw-semibold mt-2 mb-3">Haber Adı</div>
                                        <div class="form-text mb-2">Bu kısımda haberin kısa adı veya haber sahibinin adını giriniz.</div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-12 fv-row">
                                        <input type="text" class="form-control form-control-solid" name="tr_name" value="<?php echo $haber->tr_name; ?>" />
                                    </div>
                                </div>
                                <!--end::Row-->
                                <div class="row mb-5">
                                    <div class="col-md-6 mb-5">
                                        <div class="col-lg-3">
                                            <div class="fs-6 fw-semibold mt-2 mb-3">Görsel</div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="image-input image-input-outline mb-5" data-kt-image-input="true" style="background-image: url('<?php echo base_url($haber->gorsel1); ?>')">
                                                <!--begin::Preview existing avatar-->
                                                <div class="image-input-wrapper w-125px h-125px bgi-position-center" style="background-size: 75%; background-image: url('<?php echo base_url($haber->gorsel1); ?>')"></div>
                                                <!--end::Preview existing avatar-->
                                                <!--begin::Label-->
                                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Görsel Seç">
                                                    <i class="bi bi-pencil-fill fs-7"></i>
                                                    <!--begin::Inputs-->
                                                    <input type="file" name="gorsel1" accept=".png, .jpg, .jpeg" />
                                                    <input type="hidden" name="old_gorsel" value="<?php echo $haber->gorsel1; ?>">
                                                    <!--end::Inputs-->
                                                </label>
                                                <input type="hidden" name="h_id" value="<?php echo $haber->h_id; ?>" />
                                                <!--end::Label-->
                                                <!--begin::Cancel-->
                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Görseli Kaldır">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                                <!--end::Cancel-->
                                                <!--begin::Remove-->
                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Görseli Kaldır">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                                <!--end::Remove-->
                                            </div>
                                            <div class="form-text">Lütfen Bu Uzantı Resimleri Yükleyiniz: png, jpg, jpeg.</div>
                                            <div class="form-text">Tercih Edilmesi Gereken Boyut: 1000x400</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-text mb-2">Haberi kısaca özet şeklinde yazınız.</div>
                                        <textarea name="tr_summary" cols="70" rows="10"><?php echo $haber->tr_summary; ?></textarea>
                                    </div>
                                </div>
                                <div>
                                    <div class="form-text mb-2">Bu Kısımda yukarıda yüklenilen görselin altına gövde metini açıklamayı yazınız.
                                        Kutunun üst kısmında bulunan seçeneklere göre yazınızı düzenleyiniz. "Lütfen bu kısımda görsel eklemeyiniz!"</div>
                                    <textarea name="tr_content" id="editor"><?php echo $haber->tr_content; ?></textarea>
                                </div>

                                <!--end::Row-->

                                <!--begin::Row-->
                                <div class="mt-5 mb-8">
                                    <!--begin::Col-->
                                    <div class="col-xl-3">
                                        <div class="fs-6 fw-semibold mt-2 mb-3">Haber Tarihi</div>
                                        <div class="form-text mb-2">Bu kısıma haberin tarihini giriniz.</div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-12 fv-row">
                                        <input type="text" class="form-control form-control-solid" name="date" value="<?php echo $haber->date; ?>" />
                                    </div>
                                </div>
                                <!--end::Row-->

                                <div class="row mb-5">
                                    <div class="col-md-4 mb-5">
                                        <div class="col-lg-3">
                                            <div class="fs-6 fw-semibold mt-2 mb-3">Görsel</div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="image-input image-input-outline mb-5" data-kt-image-input="true" style="background-image: url('<?php echo base_url($haber->gorsel2); ?>')">
                                                <!--begin::Preview existing avatar-->
                                                <div class="image-input-wrapper w-125px h-125px bgi-position-center" style="background-size: 75%; background-image: url('<?php echo base_url($haber->gorsel2); ?>')"></div>
                                                <!--end::Preview existing avatar-->
                                                <!--begin::Label-->
                                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Görsel Seç">
                                                    <i class="bi bi-pencil-fill fs-7"></i>
                                                    <!--begin::Inputs-->
                                                    <input type="file" name="gorsel2" accept=".png, .jpg, .jpeg" />
                                                    <input type="hidden" name="old_gorsel" value="<?php echo $haber->gorsel2; ?>">
                                                    <!--end::Inputs-->
                                                </label>

                                                <!--end::Label-->
                                                <!--begin::Cancel-->
                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Görseli Kaldır">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                                <!--end::Cancel-->
                                                <!--begin::Remove-->
                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Görseli Kaldır">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                                <!--end::Remove-->
                                            </div>
                                            <div class="form-text" style="color: red;">Bu görseli boş geçebilirsiniz. <br> "Sayfa Sonunda gözükecektir"</div>
                                            <div class="form-text">Lütfen Bu Uzantı Resimleri Yükleyiniz: png, jpg, jpeg.</div>
                                            <div class="form-text">Tercih Edilmesi Gereken Boyut: 300x240</div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-5">
                                        <div class="col-lg-3">
                                            <div class="fs-6 fw-semibold mt-2 mb-3">Görsel</div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="image-input image-input-outline mb-5" data-kt-image-input="true" style="background-image: url('<?php echo base_url($haber->gorsel3); ?>')">
                                                <!--begin::Preview existing avatar-->
                                                <div class="image-input-wrapper w-125px h-125px bgi-position-center" style="background-size: 75%; background-image: url('<?php echo base_url($haber->gorsel3); ?>')"></div>
                                                <!--end::Preview existing avatar-->
                                                <!--begin::Label-->
                                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Görsel Seç">
                                                    <i class="bi bi-pencil-fill fs-7"></i>
                                                    <!--begin::Inputs-->
                                                    <input type="file" name="gorsel3" accept=".png, .jpg, .jpeg" />
                                                    <input type="hidden" name="old_gorsel" value="<?php echo $haber->gorsel3; ?>">
                                                    <!--end::Inputs-->
                                                </label>

                                                <!--end::Label-->
                                                <!--begin::Cancel-->
                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Görseli Kaldır">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                                <!--end::Cancel-->
                                                <!--begin::Remove-->
                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Görseli Kaldır">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                                <!--end::Remove-->
                                            </div>
                                            <div class="form-text" style="color: red;">Bu görseli boş geçebilirsiniz. <br> "Sayfa Sonunda gözükecektir"</div>
                                            <div class="form-text">Lütfen Bu Uzantı Resimleri Yükleyiniz: png, jpg, jpeg.</div>
                                            <div class="form-text">Tercih Edilmesi Gereken Boyut: 300x240</div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-5">
                                        <div class="col-lg-3">
                                            <div class="fs-6 fw-semibold mt-2 mb-3">Görsel</div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="image-input image-input-outline mb-5" data-kt-image-input="true" style="background-image: url('<?php echo base_url($haber->gorsel4); ?>')">
                                                <!--begin::Preview existing avatar-->
                                                <div class="image-input-wrapper w-125px h-125px bgi-position-center" style="background-size: 75%; background-image: url('<?php echo base_url($haber->gorsel4); ?>')"></div>
                                                <!--end::Preview existing avatar-->
                                                <!--begin::Label-->
                                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Görsel Seç">
                                                    <i class="bi bi-pencil-fill fs-7"></i>
                                                    <!--begin::Inputs-->
                                                    <input type="file" name="gorsel4" accept=".png, .jpg, .jpeg" />
                                                    <input type="hidden" name="old_gorsel" value="<?php echo $haber->gorsel4; ?>">
                                                    <!--end::Inputs-->
                                                </label>

                                                <!--end::Label-->
                                                <!--begin::Cancel-->
                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Görseli Kaldır">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                                <!--end::Cancel-->
                                                <!--begin::Remove-->
                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Görseli Kaldır">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                                <!--end::Remove-->
                                            </div>
                                            <div class="form-text" style="color: red;">Bu görseli boş geçebilirsiniz. <br> "Sayfa Sonunda gözükecektir"</div>
                                            <div class="form-text">Lütfen Bu Uzantı Resimleri Yükleyiniz: png, jpg, jpeg.</div>
                                            <div class="form-text">Tercih Edilmesi Gereken Boyut: 300x240</div>
                                        </div>
                                    </div>
                                </div>

                                <!--begin::Card footer-->
                                <div class="card-footer d-flex justify-content-end py-6 px-9">
                                    <button type="submit" class="btn btn-primary">Kaydet</button>
                                </div>
                                <!--end::Card footer-->
                            </div>
                            <div class="card-body p-9 tab-pane fade" id="kt_builder_layout" role="tabpanel2">
                                <!--begin::Row-->
                                <!--begin::Row-->
                                <div class="mt-5 mb-8">
                                    <!--begin::Col-->
                                    <div class="col-xl-3">
                                        <div class="fs-6 fw-semibold mt-2 mb-3">Haber Başlığı</div>
                                        <div class="form-text mb-2">Görselin yukarısında duracak bold yazım başlık.</div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-12 fv-row">
                                        <input type="text" class="form-control form-control-solid" name="en_anabaslik" value="<?php echo $haber->en_anabaslik; ?>" />
                                    </div>
                                </div>
                                <!--end::Row-->
                                <!--begin::Row-->
                                <div class="mt-5 mb-8">
                                    <!--begin::Col-->
                                    <div class="col-xl-3">
                                        <div class="fs-6 fw-semibold mt-2 mb-3">Haber Adı</div>
                                        <div class="form-text mb-2">Bu kısımda haberin kısa adı veya haber sahibinin adını giriniz.</div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-12 fv-row">
                                        <input type="text" class="form-control form-control-solid" name="en_name" value="<?php echo $haber->en_name; ?>" />
                                    </div>
                                </div>
                                <!--end::Row-->
                                <div class="col-md-12">
                                    <div class="form-text mb-2">Haberi kısaca özet şeklinde yazınız.</div>
                                    <textarea name="en_summary" cols="70" rows="10"><?php echo $haber->en_summary; ?></textarea>
                                </div>
                                <div>
                                    <div class="form-text mb-2">Bu Kısımda yukarıda yüklenilen görselin altına gövde metini açıklamayı yazınız.
                                        Kutunun üst kısmında bulunan seçeneklere göre yazınızı düzenleyiniz. "Lütfen bu kısımda görsel eklemeyiniz!"</div>
                                    <textarea name="en_content" id="editoren"><?php echo $haber->en_content; ?></textarea>
                                </div>

                                <!--end::Row-->

                                <!--begin::Row-->
                                <div class="mt-5 mb-8">
                                    <!--begin::Col-->
                                    <div class="col-xl-3">
                                        <div class="fs-6 fw-semibold mt-2 mb-3">Haber Tarihi</div>
                                        <div class="form-text mb-2">Bu kısıma haberin tarihini giriniz.</div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-12 fv-row">
                                        <input type="text" class="form-control form-control-solid" name="date" value="<?php echo $haber->date; ?>" />
                                    </div>
                                </div>
                                <!--end::Row-->

                                <!--begin::Card footer-->
                                <div class="card-footer d-flex justify-content-end py-6 px-9">
                                    <button type="submit" class="btn btn-primary">Kaydet</button>
                                </div>
                                <!--end::Card footer-->
                            </div>
                        </div>


                    </form>
                    <!--end:Form-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
    <!--begin::Footer-->
    <div id="kt_app_footer" class="app-footer">
        <!--begin::Footer container-->
        <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
            <!--begin::Copyright-->
            <div class="text-dark order-2 order-md-1">
                <span class="text-muted fw-semibold me-1">2022&copy;</span>
                <a href="https://anibalbilisim.com" target="_blank" class="text-gray-800 text-hover-primary">Anibal Bilişim</a>
            </div>
            <!--end::Copyright-->
            <!--begin::Menu-->
            <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                <li class="menu-item">
                    <a href="https://anibalbilisim.com" target="_blank" class="menu-link px-2">Destek</a>
                </li>
                <li class="menu-item">
                    <a href="https://anibalbilisim.com" target="_blank" class="menu-link px-2">Panel Bilgi</a>
                </li>
            </ul>
            <!--end::Menu-->
        </div>
        <!--end::Footer container-->
    </div>
    <!--end::Footer-->
</div>
<!--end:::Main-->

<?php $this->load->view('back/include/footer'); ?>
<script src="<?php echo base_url('assets/back/demo1/'); ?>ckeditor/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        CKEDITOR.replace('editor');
    });
</script>
<script>
    $(document).ready(function() {
        CKEDITOR.replace('editoren');
    });
</script>