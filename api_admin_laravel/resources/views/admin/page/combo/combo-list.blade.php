@extends('admin.layout.main')
@section('title', 'Combo')
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">

            <!-- users list start -->
            <section class="app-user-list">

                <!-- list and filter start -->
                <div class="card">
                    <div class="card-body border-bottom">
                        <h4 class="card-title">Dịch Vụ</h4>
                    </div>
                    <div class="card-datatable table-responsive pt-0">
                        <table class="user-list-table table" id="DataTables_Table_User">
                            <thead class="table-light">
                                <tr>

                                    <th>Tên Combo</th>
                                    <th>Giá Combo</th>
                                    <th>Ảnh Combo</th>
                                    <th>Tổng Thời Gian</th>
                                    <th>Mô Tả</th>
                                    <!-- <th>Mô Tả Chi Tiết</th> -->
                                    <th>Actions</th>
                                </tr>
                            </thead>


                        </table>


                    </div>
                    <div class="modal fade show" id="modals-slide-in" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                            <div class="modal-content">
                                <div class="modal-header bg-transparent">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body pb-5 px-sm-5 pt-50">
                                    <div class="text-center mb-2">
                                        <h1 class="mb-1">Thêm mới combo</h1>
                                        <p>Thêm chi tiết combo mới !</p>
                                    </div>
                                    <form id="addUserForm" action="{{ route('combo.add.api') }}" method="POST" class="row gy-1 pt-75 add-new-user" enctype="multipart/form-data">
                                        @csrf
                                        <input type="text" name="id" hidden>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="modalEditUserFirstName">Tên Combo</label>
                                            <input type="text" id="modalEditUserFirstName full_name" name="name_combo" class="form-control" placeholder="Combo Hè" />
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="modalEditUserFirstName">Giá Combo (₫)</label>
                                            <input type="text" data-type="currency" id="modalEditUserFirstName full_name" name="total_price" class="form-control" placeholder="100,000₫" />
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="modalEditUserFirstName">Thời Gian (phút)</label>
                                            <input type="text" data-type="currency" id="modalEditUserFirstName full_name" name="total_time_work" class="form-control" />
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="modalEditUserFirstName">Ảnh Combo</label>
                                            <input type="file" id="modalEditUserFirstName full_name" name="image" class="form-control" accept="image/*" />
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label" for="modalEditUserFirstName">Danh Mục Dịch Vụ</label>

                                            <h4 class="mt-2 pt-50">Dịch Vụ Có Trong Combo</h4>
                                            <!-- Permission table -->
                                            <div class="table-responsive">
                                                <table class="table table-flush-spacing">
                                                    <tbody id="service-list">
                                                        <!-- nút chọn all sau này sửa js xong thì để lại -->
                                                        <!-- <tr>
                                                                <td class="text-nowrap fw-bolder">
                                                                    Administrator Access
                                                                    <span data-bs-toggle="tooltip" data-bs-placement="top" title="Allows a full access to the system">
                                                                        <i data-feather="info"></i>
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="selectAll" />
                                                                        <label class="form-check-label" for="selectAll"> Select All </label>
                                                                    </div>
                                                                </td>
                                                            </tr> -->
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- Permission table -->
                                        </div>
                                        <div class="col-12 col-md-6 ">
                                            <label class="form-label" for="modalEditUserCountry">Mô Tả</label>
                                            <textarea class="form-control" name="short_description" placeholder="Những dịch vụ chuyên nghiệp hứa hẹn sẽ đem lại trải nghiệm tuyệt vời cho quý khách !" id="address" cols="30" rows="4"></textarea>
                                        </div>
                                        <div class="col-12 col-md-6 ">
                                            <label class="form-label" for="modalEditUserCountry">Mô Tả Chi Tiết</label>
                                            <textarea class="form-control" name="description" placeholder="Những dịch vụ chuyên nghiệp hứa hẹn sẽ đem lại trải nghiệm tuyệt vời cho quý khách !" id="address" cols="30" rows="4"></textarea>
                                        </div>


                                        <div class="col-12 text-center mt-2 pt-50">
                                            <button type="submit" class="btn btn-primary me-1">Submit</button>
                                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                                                Discard
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- list and filter end -->
            </section>
            <!-- users list ends -->

        </div>
    </div>
</div>

<!-- Detail service -->
<div class="modal fade show" id="detailUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1 class="mb-1">Chi tiết combo</h1>
                    <p>Chi tiết combo !</p>
                </div>
                <form id="detailUserForm" action="" method="POST" class="row gy-1 pt-75 add-new-user" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" hidden>
                    <div class="d-flex center">
                        <a href="#" class="me-25">
                            <img src="" id="account-upload-img" class="uploadedAvatar rounded me-50" alt="combo image" height="100" width="100" name="image" />
                        </a>
                        <!-- upload and reset button -->
                        <!-- <div class="d-flex align-items-end mt-75 ms-1">
                            <div>
                                <label for="account-upload" class="btn btn-sm btn-primary mb-75 me-75">Upload</label>
                                <input type="file" id="account-upload" name="image" hidden accept="image/*" />
                                <button type="button" id="account-reset" class="btn btn-sm btn-outline-secondary mb-75">Reset</button>
                                <p class="mb-0">Loại tệp được phép: png, jpg, jpeg.</p>
                            </div>
                        </div> -->
                        <!--/ upload and reset button -->
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserFirstName">Tên Combo</label>
                        <input type="text" disabled id="modalEditUserFirstName full_name" name="name_combo" class="form-control" placeholder="Combo Hè" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserFirstName">Giá Combo (₫)</label>
                        <input type="text" disabled data-type="currency" id="modalEditUserFirstName full_name" name="total_price" class="form-control" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserFirstName">Thời Gian (phút)</label>
                        <input type="text" disabled data-type="currency" id="modalEditUserFirstName full_name" name="total_time_work" class="form-control" />
                    </div>
                    <div class="col-12">
                        <h4 class="mt-2 pt-50">Dịch Vụ Có Trong Combo</h4>
                        <!-- Permission table -->
                        <div class="table-responsive">
                            <table class="table table-flush-spacing">
                                <tbody id="service-list1">

                                </tbody>
                            </table>
                        </div>
                        <!-- Permission table -->
                    </div>
                    <div class="col-12 col-md-6 ">
                        <label class="form-label" for="modalEditUserCountry">Mô Tả</label>
                        <textarea class="form-control" disabled name="short_description" id="address1" cols="30" rows="4"></textarea>
                    </div>
                    <div class="col-12 col-md-6 ">
                        <label class="form-label" for="modalEditUserCountry">Mô Tả Chi Tiết</label>
                        <textarea class="form-control" disabled name="description" id="address2" cols="30" rows="4"></textarea>
                    </div>



                </form>
            </div>
        </div>
    </div>
</div>
<!--/ Detail service -->

<!-- Edit User Modal -->
<div class="modal fade show" id="editUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1 class="mb-1">Cập nhật combo</h1>
                    <p>Cập nhật chi tiết combo !</p>
                </div>
                <form id="editUserForm" action="{{route('combo.update.api')}}" method="POST" class="row gy-1 pt-75 add-new-user" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" hidden>
                    <div class="d-flex center">
                        <a href="#" class="me-25">
                            <img src="" id="account-upload-img1" class="uploadedAvatar rounded me-50" alt="combo image" height="100" width="100" name="image" />
                        </a>
                        <!-- upload and reset button -->
                        <div class="d-flex align-items-end mt-75 ms-1">
                            <div>
                                <label for="account-upload" class="btn btn-sm btn-primary mb-75 me-75">Upload</label>
                                <input type="file" id="account-upload" name="image" hidden accept="image/*" />
                                <button type="button" id="account-reset" class="btn btn-sm btn-outline-secondary mb-75">Reset</button>
                                <p class="mb-0">Loại tệp được phép: png, jpg, jpeg.</p>
                            </div>
                        </div>
                        <!--/ upload and reset button -->
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserFirstName">Tên Combo</label>
                        <input type="text" id="modalEditUserFirstName full_name" name="name_combo" class="form-control" placeholder="Combo Hè" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserFirstName">Giá Combo (₫)</label>
                        <input type="text" data-type="currency" id="modalEditUserFirstName full_name" name="total_price" class="form-control" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserFirstName">Thời Gian (phút)</label>
                        <input type="text" data-type="currency" id="modalEditUserFirstName full_name" name="total_time_work" class="form-control" />
                    </div>
                    <div class="col-12">
                        <h4 class="mt-2 pt-50">Dịch Vụ Có Trong Combo</h4>
                        <!-- Permission table -->
                        <div class="table-responsive">
                            <table class="table table-flush-spacing">
                                <tbody id="service-list2">
                                    <!-- nút chọn all sau này sửa js xong thì để lại -->
                                    <!-- <tr>
                                                                <td class="text-nowrap fw-bolder">
                                                                    Administrator Access
                                                                    <span data-bs-toggle="tooltip" data-bs-placement="top" title="Allows a full access to the system">
                                                                        <i data-feather="info"></i>
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="selectAll" />
                                                                        <label class="form-check-label" for="selectAll"> Select All </label>
                                                                    </div>
                                                                </td>
                                                            </tr> -->
                                </tbody>
                            </table>
                        </div>
                        <!-- Permission table -->
                    </div>
                    <div class="col-12 col-md-6 ">
                        <label class="form-label" for="modalEditUserCountry">Mô Tả</label>
                        <textarea class="form-control" name="short_description" id="address1" cols="30" rows="4"></textarea>
                    </div>
                    <div class="col-12 col-md-6 ">
                        <label class="form-label" for="modalEditUserCountry">Mô Tả Chi Tiết</label>
                        <textarea class="form-control" name="description" id="address2" cols="30" rows="4"></textarea>
                    </div>
                    <div class="col-12 text-center mt-2 pt-50">
                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                            Discard
                        </button>
                    </div>



                </form>
            </div>
        </div>
    </div>
</div>
<!--/ Edit User Modal -->

@endsection
@section('script')
<script>
    // liệt kê cate cho thẻ select category service
    $.get('<?= route("service.list.api") ?>', function(data) {
        data.service.map(function(x) {
            document.getElementById('service-list').insertAdjacentHTML('beforeend',
                '<tr><td class="text-nowrap fw-bolder">' + x.name_service + '</td><td> <div class="d-flex"><div class="form-check me-3 me-lg-5"> <input class="form-check-input" name="service_id[]" value="' + x.id + '" type="checkbox" id="dbManagementRead" /></div></div></td></tr>'
            );
        })
    })
    $(function() {
        var e = $("#DataTables_Table_User");
        var t = $(".modal fade show"),
            a = $(".add-new-user"),
            s = $(".select2"),
            n = $(".dt-contact"),
            o = "{{ route('user.list') }}",
            r = "app-user-view-account.html";
        var table = e.DataTable({
            "ajax": {
                "url": "{{ route('combo.list.api') }}",
                "type": "GET",
                "dataSrc": ""
            },
            columns: [{
                    data: "name_combo"
                },
                {
                    data: "total_price"
                },
                {
                    data: "image"
                },
                {
                    data: "total_time_work"
                },
                {
                    data: "short_description"
                },
                // {
                //     data: "description"
                // },
            ],
            columnDefs: [{
                    "width": "25%",
                    "targets": 4
                },
                {
                    targets: 0,
                    responsivePriority: 2,
                    render: function(e, t, a, s) {
                        var n = a.name_combo;
                        if (n) {
                            return ('<span class="fw-bolder">' + n + '</span>')
                        }
                    },
                },
                {
                    targets: 1,
                    responsivePriority: 2,
                    render: function(e, t, a, s) {
                        var n = a.total_price;
                        if (n) {
                            return n.toLocaleString() + '₫';
                        }
                    },
                },
                {
                    targets: 3,
                    responsivePriority: 2,
                    render: function(e, t, a, s) {
                        var n = Math.floor(a.total_time_work / 60);
                        var b = a.total_time_work % 60;
                        if (b > 0 && n > 0) {
                            return n + ' giờ ' + b + ' phút';
                        } else if (n < 1) {
                            return a.total_time_work + ' phút';
                        } else {
                            return n + ' giờ';
                        }
                    },
                },
                {
                    targets: 2,
                    render: function(e, t, a, s) {
                        var n = a.image;
                        if (n) {
                            return ('<img src="/storage/' + n + '" class="me-75" height="60" width="60" alt="combo_avt"/>')
                        }
                    },
                },
                {
                    targets: 5,
                    title: "Actions",
                    orderable: !1,
                    render: function(e, t, a, s) {
                        return (
                            '<div class="btn-group"><a class="btn btn-sm dropdown-toggle hide-arrow" data-bs-toggle="dropdown">' +
                            feather.icons["more-vertical"].toSvg({
                                class: "font-small-4",
                            }) +
                            '</a><div class="dropdown-menu dropdown-menu-end"><a href="#" id="detailUser" data-id="' + a.id + '"  data-bs-toggle="modal" data-bs-target="#detailUserModal" class="dropdown-item">' +
                            feather.icons["file-text"].toSvg({
                                class: "font-small-4 me-50",
                            }) +
                            'Details</a><a href="#" id="editUser" data-id="' + a.id + '"  data-bs-toggle="modal" data-bs-target="#editUserModal" class="dropdown-item">' +
                            feather.icons["edit"].toSvg({
                                class: "font-small-4 me-50",
                            }) +
                            'Edit</a><a href="#" id="deleteUser" data-id="' + a.id + '" class="dropdown-item delete-record">' +
                            feather.icons["trash-2"].toSvg({
                                class: "font-small-4 me-50",
                            }) +
                            "Delete</a></div></div></div>"
                        );

                    },
                },
            ],
            order: [
                [1, "desc"]
            ],
            dom: '<"d-flex justify-content-between align-items-center header-actions mx-2 row mt-75"<"col-sm-12 col-lg-4 d-flex justify-content-center justify-content-lg-start" l><"col-sm-12 col-lg-8 ps-xl-75 ps-0"<"dt-action-buttons d-flex align-items-center justify-content-center justify-content-lg-end flex-lg-nowrap flex-wrap"<"me-1"f>B>>>t<"d-flex justify-content-between mx-2 row mb-1"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            language: {
                sLengthMenu: "Show _MENU_",
                search: "Search",
                searchPlaceholder: "Search..",
            },
            buttons: [{
                    extend: "collection",
                    className: "btn btn-outline-secondary dropdown-toggle me-2",
                    text: feather.icons["external-link"].toSvg({
                        class: "font-small-4 me-50",
                    }) + "Export",
                    buttons: [{
                            extend: "print",
                            text: feather.icons.printer.toSvg({
                                class: "font-small-4 me-50",
                            }) + "Print",
                            className: "dropdown-item",
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4]
                            },
                        },
                        {
                            extend: "csv",
                            text: feather.icons["file-text"].toSvg({
                                class: "font-small-4 me-50",
                            }) + "Csv",
                            className: "dropdown-item",
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4]
                            },
                        },
                        {
                            extend: "excel",
                            text: feather.icons.file.toSvg({
                                class: "font-small-4 me-50",
                            }) + "Excel",
                            className: "dropdown-item",
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4]
                            },
                        },
                        {
                            extend: "pdf",
                            text: feather.icons.clipboard.toSvg({
                                class: "font-small-4 me-50",
                            }) + "Pdf",
                            className: "dropdown-item",
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4]
                            },
                        },
                        {
                            extend: "copy",
                            text: feather.icons.copy.toSvg({
                                class: "font-small-4 me-50",
                            }) + "Copy",
                            className: "dropdown-item",
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4]
                            },
                        },
                    ],
                    init: function(e, t, a) {
                        $(t).removeClass("btn-secondary"),
                            $(t).parent().removeClass("btn-group"),
                            setTimeout(function() {
                                $(t)
                                    .closest(".dt-buttons")
                                    .removeClass("btn-group")
                                    .addClass("d-inline-flex mt-50");
                            }, 50);
                    },
                },
                {
                    text: "Thêm Mới Combo",
                    className: "add-new btn btn-primary",
                    attr: {
                        "data-bs-toggle": "modal",
                        "data-bs-target": "#modals-slide-in",
                    },
                    init: function(e, t, a) {
                        $(t).removeClass("btn-secondary");
                    },
                },
            ],
            language: {
                paginate: {
                    previous: "&nbsp;",
                    next: "&nbsp;"
                }
            },
        });
        s.each(function() {
            var e = $(this);
            e.wrap('<div class="position-relative"></div>'),
                e.select2({
                    dropdownAutoWidth: !0,
                    width: "100%",
                    dropdownParent: e.parent(),
                });
        })
        a.length && (a.validate({
                errorClass: "error",
                rules: {
                    "name_combo": {
                        required: !0
                    },
                    "image": {
                        required: !0
                    },
                    "total_price": {
                        required: !0,
                        min: 1,
                        digits: true
                    },
                    "total_time_work": {
                        required: !0,
                        min: 1,
                        digits: true
                    },
                    "short_description": {
                        required: !0
                    },
                },
            }),
            a.on("submit", function(e) {
                e.preventDefault();
                var s = a.valid();
                var form = this;
                $.ajax({
                    type: "POST",
                    url: $(form).attr('action'),
                    data: new FormData(form),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    success: function(data) {
                        if (data.code == 0) {
                            $.each(data.error, function(prefix, val) {
                                $(form).find('span' + prefix + '_error').text(val[0]);
                            });
                        } else {
                            $(form)[0].reset();
                            $('#modals-slide-in').modal("hide");
                            table.ajax.reload();
                            toastr.success(data.msg)
                        }
                    },
                    error: function(error) {
                        console.log("Thêm không thành công", error);
                    }
                })



            }))

        $('body').on('click', '#deleteUser', function() {
            var user_id = $(this).data("id");
            if (confirm("Bạn có chắc chắn muốn xóa Combo này không ?")) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('combo.list.api') }}" + "/" + user_id,
                    success: function() {
                        table.ajax.reload();
                        toastr.success("Xóa Thành Công");
                    },
                    error: function() {
                        toastr.success("Xóa không Thành Công");
                    }
                })
            }
        });
        //list service for detail
        $.get('<?= route("service.list.api") ?>', function(data) {
            data.service.map(function(x) {
                document.getElementById('service-list1').insertAdjacentHTML('beforeend',
                    '<tr><td class="text-nowrap fw-bolder">' + x.name_service + '</td><td> <div class="d-flex"><div class="form-check me-3 me-lg-5"> <input class="form-check-input" name="service_id[]" disabled value="' + x.id + '" type="checkbox" id="' + x.id + '" /></div></div></td></tr>'
                );
            })
        })

        //detail
        $('body').on('click', '#detailUser', function() {
            var user_id = $(this).data("id");
            $.get('<?= route("combo.list.api") ?>' + "/show/" + user_id, function(data) {
                data.model.services.map(function(x) {
                    $("#service-list1").find("#" + x.id, "input").prop('checked', true);
                })
                var form = $('#detailUserForm');
                $("#account-upload-img").attr("src", data.model.image ? "/storage/" + data.model.image :
                    "{{ asset('admin/images/portrait/small/avatar-none.png') }}");
                form.find('input[name="id"]').val(data.model.id);
                form.find('input[name="name_combo"]').val(data.model.name_combo);
                form.find('input[name="total_price"]').val(data.model.total_price.toLocaleString() + '₫');
                form.find('input[name="total_time_work"]').val(data.model.total_time_work);
                form.find('#address1').val(data.model.short_description);
                form.find('#address2').val(data.model.description);
            }, 'json')
        });
        //list service for edit
        $.get('<?= route("service.list.api") ?>', function(data) {
            data.service.map(function(x) {
                document.getElementById('service-list2').insertAdjacentHTML('beforeend',
                    '<tr><td class="text-nowrap fw-bolder">' + x.name_service + '</td><td> <div class="d-flex"><div class="form-check me-3 me-lg-5"> <input class="form-check-input" name="service_id[]" value="' + x.id + '" type="checkbox" id="' + x.id + '" /></div></div></td></tr>'
                );
            })
        })

        // get detail edit và checked các service đã có
        $('body').on('click', '#editUser', function() {
            // mai làm tiếp phần list service
            var user_id = $(this).data("id");
            $.get('<?= route("combo.list.api") ?>' + "/show/" + user_id, function(data) {
                data.ser.map(function(x) {
                    data.model.services.map(function(y) {
                        if (y.id == x.id) {
                            $("#service-list2").find("#" + y.id, "input").prop('checked', true);
                        }
                    })
                })
                $("#account-upload-img1").attr("src", data.model.image ? "/storage/" + data.model.image :
                    "{{ asset('admin/images/portrait/small/avatar-none.png') }}");
                var form = $('#editUserForm');
                form.find('input[name="id"]').val(data.model.id);
                form.find('input[name="name_combo"]').val(data.model.name_combo);
                form.find('input[name="total_price"]').val(data.model.total_price);
                form.find('input[name="total_time_work"]').val(data.model.total_time_work);
                form.find('#address1').val(data.model.short_description);
                form.find('#address2').val(data.model.description);
            }, 'json')

        });
        // submit edit in db
        $('#editUserForm').on('submit', function(e) {
            e.preventDefault();
            var form = this;
            $.ajax({
                type: "POST",
                url: $(form).attr('action'),
                data: new FormData(form),
                processData: false,
                dataType: 'json',
                contentType: false,
                success: function(data) {
                    if (data.code == 0) {
                        $.each(data.error, function(prefix, val) {
                            $(form).find('span' + prefix + '_error').text(val[0]);
                        });
                    } else {
                        console.log('fomr', data);
                        $(form)[0].reset();
                        $('#editUserModal').modal("hide");
                        table.ajax.reload();
                        toastr.success(data.msg)
                    }
                },
                error: function(error) {
                    console.log("Sửa mới không thành công", error);
                }
            })
        });

    });
</script>
@endsection