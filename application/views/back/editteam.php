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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Ekip Üyesi Ekleme Seçenekleri</h1>
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
                        <li class="breadcrumb-item text-muted">Kurumsal / Ekip</li>
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
                    </div>
                    <!--end::Card header-->
                    <!--begin::Form-->
                    <form id="kt_project_settings_form" class="form" action="<?php echo base_url('admin/teamupdate'); ?>" method="post" enctype="multipart/form-data">
                        <!--begin::Card body-->
                        <?php echo flashread(); ?>
                        <div class="card-body p-9">
                            <!--begin::Row-->
                            <div class="row mb-5">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">Görsel</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <!--begin::Image input-->
                                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('<?php echo base_url($team->gorsel); ?>')">
                                        <!--begin::Preview existing avatar-->
                                        <div class="image-input-wrapper w-125px h-125px bgi-position-center" style="background-size: 75%; background-image: url('<?php echo base_url($team->gorsel); ?>')"></div>
                                        <!--end::Preview existing avatar-->
                                        <!--begin::Label-->
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Görsel Seç">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <!--begin::Inputs-->
                                            <input type="hidden" name="old_gorsel" value="<?php echo $team->gorsel; ?>">
                                            <input type="file" name="gorsel" accept=".png, .jpg, .jpeg" />

                                            <!--end::Inputs-->
                                        </label>

                                        <input type="hidden" name="t_id" value="<?php echo $team->t_id; ?>" />
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
                                    <!--end::Image input-->
                                    <!--begin::Hint-->
                                    <div class="form-text">Lütfen Bu Uzantı Resimleri Yükleyiniz: png, jpg, jpeg.</div>
                                    <div class="form-text">Tercih Edilmesi Gereken Boyut: 300x300</div>
                                    <!--end::Hint-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class=" mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">Ad Soyad</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-12 fv-row">
                                    <input type="text" class="form-control form-control-solid" name="name" value="<?php echo $team->name; ?>" />
                                </div>
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-6">
                                    <div class="col-xl-3">
                                        <div class="fs-6 fw-semibold mt-2 mb-3">Statü</div>
                                        <div class="form-text mb-3">Başkan vb.</div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-12 fv-row">
                                        <input type="text" class="form-control form-control-solid" name="trstatu" value="<?php echo $team->trstatu; ?>" />
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="col-xl-12">
                                        <div class="fs-6 fw-semibold mt-2 mb-3">İngilizce Statü</div>
                                        <div class="form-text mb-3">Lütfen Girdiğiniz Statünün İngilizce Anlamını Yazınız.</div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-12 fv-row">
                                        <input type="text" class="form-control form-control-solid" name="enstatu" value="<?php echo $team->enstatu; ?>" />
                                    </div>

                                </div>


                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-12">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">
                                        Temsil Ettikleri Kurum Ve Kuruluşlar</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-12 fv-row">
                                    <input type="text" class="form-control form-control-solid" name="kurum" value="<?php echo $team->kurum; ?>" />
                                </div>
                            </div>
                            <!--end::Row-->

                        </div>
                        <!--end::Card body-->
                        <!--begin::Card footer-->
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="submit" class="btn btn-primary">Kaydet</button>
                        </div>
                        <!--end::Card footer-->
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