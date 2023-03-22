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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Sayfa Sonu Düzenleme Seçenekleri</h1>
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
                        <li class="breadcrumb-item text-muted">Menü / Sayfa Sonu Düzenle</li>
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
                    <form id="kt_project_settings_form" class="form" action="<?php echo base_url('admin/footerup'); ?>" method="post" enctype="multipart/form-data">
                        <!--begin::Card body-->
                        <?php echo flashread(); ?>
                        <div class="card-body p-9">

                            <!--begin::Row-->
                            <div class="row mb-5">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">Logo</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <!--begin::Image input-->
                                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('<?php echo base_url($footer->logo); ?>')">
                                        <!--begin::Preview existing avatar-->
                                        <div class="image-input-wrapper w-125px h-125px bgi-position-center" style="background-size: 75%; background-image: url('<?php echo base_url($footer->logo); ?>')"></div>
                                        <!--end::Preview existing avatar-->
                                        <!--begin::Label-->
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Görsel Seç">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <!--begin::Inputs-->
                                            <input type="file" name="logo" accept=".png, .svg, .jpg, .jpeg" />
                                            <input type="hidden" name="logo" />
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
                                    <!--end::Image input-->
                                    <!--begin::Hint-->
                                    <div class="form-text">Lütfen Bu Uzantı Resimleri Yükleyiniz: 'png'</div>
                                    <div class="form-text">Tercih Edilmesi Gereken Boyut: 500x216</div>
                                    <!--end::Hint-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->

                            <!--begin::Row-->
                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-6">
                                    <div class="col-xl-3">
                                        <div class="fs-6 fw-semibold mt-2 mb-3">Hakkımızda</div>
                                        <div class="form-text mb-3">Kısa hakkımızda metni</div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-12 fv-row">
                                        <textarea name="trhakkimizda" class="form-control form-control-solid h-100px"><?php echo $footer->tr_hakkimizda; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="col-xl-12">
                                        <div class="fs-6 fw-semibold mt-2 mb-3">İngilizce Hakkımızda</div>
                                        <div class="form-text mb-3">Lütfen Girdiğiniz Metnin İngilizce Anlamını Yazınız.</div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-12 fv-row">
                                        <textarea name="enhakkimizda" class="form-control form-control-solid h-100px"><?php echo $footer->en_hakkimizda; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">Telefon Numarası</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-12 fv-row">
                                    <input type="text" class="form-control form-control-solid" name="tel1" value="<?php echo $footer->tel1; ?>" />
                                </div>
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">Telefon Numarası(2)</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-12 fv-row">
                                    <input type="text" class="form-control form-control-solid" name="tel2" value="<?php echo $footer->tel2; ?>" />
                                </div>
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">Whatsapp</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-12 fv-row">
                                    <input type="text" class="form-control form-control-solid" name="tel3" value="<?php echo $footer->tel3; ?>" />
                                </div>
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">Faks</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-12 fv-row">
                                    <input type="text" class="form-control form-control-solid" name="faks" value="<?php echo $footer->faks; ?>" />
                                </div>
                            </div>
                            <!--end::Row-->

                            <!--begin::Row-->
                            <div class="mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">E-mail</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-12 fv-row">
                                    <input type="text" class="form-control form-control-solid" name="mail" value="<?php echo $footer->mail; ?>" />
                                </div>
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">Kep Adresi</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-12 fv-row">
                                    <input type="text" class="form-control form-control-solid" name="kep" value="<?php echo $footer->kep; ?>" />
                                </div>
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">Adres</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-12 fv-row">
                                    <input type="text" class="form-control form-control-solid" name="adres" value="<?php echo $footer->adres; ?>" />
                                </div>
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">Facebook Linki</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-12 fv-row">
                                    <input type="text" class="form-control form-control-solid" name="facebook" value="<?php echo $footer->facebook; ?>" />
                                </div>
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">Twitter Linki</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-12 fv-row">
                                    <input type="text" class="form-control form-control-solid" name="twitter" value="<?php echo $footer->twitter; ?>" />
                                </div>
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">Linkedin</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-12 fv-row">
                                    <input type="text" class="form-control form-control-solid" name="linkedin" value="<?php echo $footer->linkedin; ?>" />
                                </div>
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">İnstagram Linki</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-12 fv-row">
                                    <input type="text" class="form-control form-control-solid" name="instagram" value="<?php echo $footer->instagram; ?>" />
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