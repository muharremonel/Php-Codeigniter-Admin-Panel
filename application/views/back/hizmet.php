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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Hizmetlerimiz Düzenleme Seçenekleri</h1>
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
                        <li class="breadcrumb-item text-muted">Hizmetlerimiz / Genel Düzenleme</li>
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
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Add customer-->
                            <a href="<?php echo base_url('admin/yenihizmet') ?>" class="btn btn-success">Yeni Hizmet</a>
                            <!--end::Add customer-->
                        </div>
                        <!--end::Card toolbar-->
                        <!--end::Card title-->
                    </div>
                    <div class="container p-2">
                        <?php echo flashread(); ?>
                    </div>
                    <!--end::Card header-->
                    <div id="kt_app_content" class="app-content flex-column-fluid">
                        <!--begin::Content container-->
                        <div id="kt_app_content_container" class="app-container container-xxl">
                            <!--begin::Category-->
                            <div class="card card-flush">
                                <!--begin::Table-->
                                <div id="kt_ecommerce_category_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="table-responsive">
                                        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_ecommerce_category_table">
                                            <!--begin::Table head-->
                                            <thead>
                                                <!--begin::Table row-->
                                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                                    <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 29.8984px;">Sıralama</th>
                                                    <th class="min-w-250px sorting" tabindex="0" aria-controls="kt_ecommerce_category_table" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending" style="width: 690.406px;">Hizmetler</th>
                                                    <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_ecommerce_category_table" rowspan="1" colspan="1" aria-label="Category Type: activate to sort column ascending" style="width: 182.672px;">Aktif</th>
                                                    <th class="text-end min-w-70px sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 117.773px;">İşlemler</th>
                                                </tr>
                                                <!--end::Table row-->
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody id="sortable" class="fw-semibold text-gray-600">
                                                <?php foreach ($hizmet as $hizmet) { ?>
                                                    <!--begin::Table row-->
                                                    <!--end::Table row-->
                                                    <tr id="listItem_<?php echo $hizmet['h_id']; ?>">
                                                        <!--begin::Checkbox-->
                                                        <td>
                                                            <div class="btn btn-xs btn-default handle ui-sortable-handle">
                                                                <i class="fa fa-arrows"></i>
                                                            </div>
                                                        </td>
                                                        <!--end::Checkbox-->
                                                        <!--begin::Category=-->
                                                        <td>
                                                            <div class="d-flex">
                                                                <!--begin::Thumbnail-->
                                                                <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-category.html" class="symbol symbol-50px">
                                                                    <span class="symbol-label" style="background-image:url(<?php echo base_url($hizmet['gorsel1']); ?>)"></span>
                                                                </a>
                                                                <!--end::Thumbnail-->
                                                                <div class="ms-5">
                                                                    <!--begin::Title-->
                                                                    <span class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1" data-kt-ecommerce-category-filter="category_name"><?php echo $hizmet['tr_baslik']; ?></span>
                                                                    <!--end::Title-->
                                                                    <!--begin::Description-->
                                                                    <!--end::Description-->
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <!--end::Category=-->
                                                        <!--begin::Type=-->
                                                        <td>
                                                            <!--begin::Menu-->
                                                            <div class="col-md-8 px-2 py-3">
                                                                <select onchange="window.location.href=`<?php echo base_url('admin/hizmet_update/') . $hizmet['h_id'] . '/'; ?>${this.value}`" name="active" class="form-select form-select-solid active-hizmet " data-control="select2" data-placeholder="Select an option">
                                                                    <option <?php echo ($hizmet['active'] == 1) ? 'selected' : ''; ?> value="1">Aktif</option>
                                                                    <option <?php echo ($hizmet['active'] == 2) ? 'selected' : ''; ?> value="2">Pasif</option>
                                                                </select>
                                                            </div>
                                                            <!--end::Badges-->
                                                        </td>
                                                        <!--end::Type=-->
                                                        <!--begin::Action=-->
                                                        <td class="text-end">
                                                            <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">İşlemler
                                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                                <span class="svg-icon svg-icon-5 m-0">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </a>
                                                            <!--begin::Menu-->
                                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">

                                                                <!--begin::Menu item-->
                                                                <div class="menu-item px-3">
                                                                    <a href="<?php echo base_url('admin/delete_hizmet/' . $hizmet['h_id']); ?>" class="menu-link px-3" data-kt-ecommerce-category-filter="delete_heyet">Hizmet Sil</a>
                                                                    <a href="<?php echo base_url('admin/hizmetduzenle/' . $hizmet['h_id']); ?>" class="menu-link px-3">Düzenle</a>
                                                                </div>
                                                                <!--end::Menu item-->
                                                            </div>
                                                            <!--end::Menu-->
                                                        </td>
                                                        <!--end::Action=-->
                                                    </tr>
                                                    <input class="hid" type="hidden" name="hid" value="<?php echo $hizmet['h_id']; ?>">
                                                <?php } ?>
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                                            <div class="dataTables_length" id="kt_ecommerce_category_table_length"><label><select name="kt_ecommerce_category_table_length" aria-controls="kt_ecommerce_category_table" class="form-select form-select-sm form-select-solid">
                                                        <option value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select></label></div>
                                        </div>
                                        <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                                            <div class="dataTables_paginate paging_simple_numbers" id="kt_ecommerce_category_table_paginate">
                                                <ul class="pagination">
                                                    <li class="paginate_button page-item previous disabled" id="kt_ecommerce_category_table_previous"><a href="#" aria-controls="kt_ecommerce_category_table" data-dt-idx="0" tabindex="0" class="page-link"><i class="previous"></i></a></li>
                                                    <li class="paginate_button page-item active"><a href="#" aria-controls="kt_ecommerce_category_table" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="kt_ecommerce_category_table" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                                    <li class="paginate_button page-item next" id="kt_ecommerce_category_table_next"><a href="#" aria-controls="kt_ecommerce_category_table" data-dt-idx="3" tabindex="0" class="page-link"><i class="next"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Table-->

                                <!--end::Card body-->
                            </div>
                            <!--end::Category-->
                        </div>
                        <!--end::Content container-->
                    </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script>
    $(document).ready(function() {
        $("#sortable").sortable({
            handle: '.handle',
            update: function() {
                var order = $(this).sortable('serialize');
                window.location.href = "<?php echo base_url('admin/hizmet_update_order?'); ?>" + order;
            }
        });
    });
</script>