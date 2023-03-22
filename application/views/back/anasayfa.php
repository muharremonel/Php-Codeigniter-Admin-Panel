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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Anasayfa Düzenleme Seçenekleri</h1>
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
                        <li class="breadcrumb-item text-muted">Anasayfa </li>
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
                        <div class="card-title fs-3 fw-bold">İçeriği Düzenle</div>
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
                    <div class="container p-2">
                        <?php echo flashread(); ?>
                    </div>
                    <form class="form" action="<?php echo base_url('admin/anasayfaup'); ?>" method="post" enctype="multipart/form-data">
                        <!--begin::Card body-->
                        <div class="tab-content">
                            <div class="card-body p-9 tab-pane fade show active" id="kt_builder_main" role="tabpanel1">

                                <!--begin::Row-->
                                <!--begin::Row-->
                                <div class="row mb-8">
                                    <!--begin::Col-->
                                    <div class="col-xl-3">
                                        <div class="fs-6 fw-semibold mt-2 mb-3">Hakkımızda Başlık</div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-9 fv-row">
                                        <input type="text" class="form-control form-control-solid" name="trbaslik" value="<?php echo $anasayfa->tr_baslik; ?>" />
                                    </div>
                                    <!--begin::Col-->
                                </div>
                                <!--end::Row-->

                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">Hakkımızda Metin</div>
                                </div>
                                <!--end::Col-->
                                <div class="mb-8">
                                    <div class="form-text mb-2"></div>
                                    <textarea name="trhakkimizda" id="editor"><?php echo $anasayfa->tr_hakkimizda; ?></textarea>
                                </div>

                                <!--end::Row-->

                                <!--begin::Card footer-->
                                <div class="card-footer d-flex justify-content-end py-6 px-9">
                                    <button type="submit" class="btn btn-primary">Kaydet</button>
                                </div>
                                <!--end::Card footer-->
                            </div>
                            <div class="card-body p-9 tab-pane fade" id="kt_builder_layout" role="tabpanel2">

                                <!--begin::Row-->
                                <div class="row mb-8 mt-8">
                                    <!--begin::Col-->
                                    <div class="col-xl-3">
                                        <div class="fs-6 fw-semibold mt-2 mb-3">Title</div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-9 fv-row">
                                        <input type="text" class="form-control form-control-solid" name="enbaslik" value="<?php echo $anasayfa->en_baslik; ?>" />
                                    </div>
                                    <!--begin::Col-->
                                </div>

                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">About</div>
                                </div>
                                <!--end::Col-->
                                <div class="mb-8">
                                    <div class="form-text mb-2"></div>
                                    <textarea name="enhakkimizda" id="editoren"><?php echo $anasayfa->en_hakkimizda; ?></textarea>
                                </div>


                                <!--begin::Card footer-->
                                <div class="card-footer d-flex justify-content-end py-6 px-9">
                                    <button type="submit" class="btn btn-primary">Kaydet</button>
                                </div>
                                <!--end::Card footer-->
                            </div>
                        </div>

                        <!--end::Card body-->

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