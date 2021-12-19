@extends('admin.layout.main')
@section('title', 'Category Service')
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

                                    <th>Tên Danh Mục</th>
                                    <th>Ảnh</th>
                                    <th>Ghi Chú</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>


                        </table>


                    </div>
                    <!-- Modal to add new user starts-->
                    <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
                        <div class="modal-dialog">
                            <form method="POST" action="{{ route('cate-service.add.api') }}" class="add-new-user modal-content pt-0" enctype="multipart/form-data">
                                @csrf
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">Thêm Danh Mục</h5>
                                </div>
                                <div class="modal-body flex-grow-1">
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-icon-default-fullname">Tên Danh Mục</label>
                                        <input type="text" class="form-control dt-full-name" id="basic-icon-default-fullname" placeholder="Mi - Móng" name="name_cate_service" />
                                    </div>
                                    <div class="mb-1">
                                        <label for="customFile1" class="form-label">Ảnh Danh Mục</label>
                                        <input class="form-control" type="file" id="customFile1" name="image" accept="image/*" />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-icon-default-fullname">Ghi Chú</label>
                                        <input type="text" class="form-control dt-full-name" id="basic-icon-default-fullname" name="note" />
                                    </div>

                                    <button type="submit" class="btn btn-primary me-1 data-submit">Lưu</button>
                                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Modal to add new user Ends-->


                </div>
                <!-- list and filter end -->
            </section>
            <!-- users list ends -->

        </div>
    </div>
</div>

<!-- Edit User Modal -->
<div class="modal fade show" id="editUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1 class="mb-1">Cập nhật mới danh mục</h1>
                    <p>Cập nhập chi tiết danh mục mới !</p>
                </div>
                <form id="editUserForm" action="{{ route('cate-service.update.api') }}" method="POST" class="row gy-1 pt-75" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" hidden>
                    <div class="d-flex center">
                        <a href="#" class="me-25">
                            <img src="" id="account-upload-img" class="uploadedAvatar rounded me-50" alt="profile image" height="100" width="100" name="image" />
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
                        <label class="form-label" for="modalEditUserFirstName">Tên Danh Mục</label>
                        <input type="text" id="modalEditUserFirstName full_name" name="name_cate_service" class="form-control" placeholder="Mi - Móng" data-msg="Please enter your first name" />
                    </div>
                    <!-- Mai làm tiếp phần sửa -->
                    <div class="col-12 ">
                        <label class="form-label" for="modalEditUserCountry">Ghi Chú</label>
                        <textarea class="form-control" name="note" id="note" cols="30" rows="4"></textarea>
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

<!-- Detail Category Service -->
<div class="modal fade show" id="detailUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1 class="mb-1">Chi tiết danh mục</h1>
                    <p>Chi tiết danh mục !</p>
                </div>
                <form id="detailUserForm" action="" method="POST" class="row gy-1 pt-75" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" hidden>
                    <div class="d-flex center">
                        <a href="#" class="me-25">
                            <img src="" id="account-upload-img1" class="uploadedAvatar rounded me-50" alt="profile image" height="100" width="100" name="image" />
                        </a>
                        <div class="d-flex align-items-end mt-75 ms-1">
                            <div>
                                <p class="mb-0">Ảnh danh mục</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserFirstName">Tên Danh Mục</label>
                        <input type="text" disabled id="modalEditUserFirstName full_name" name="name_cate_service" class="form-control" placeholder="Mi - Móng" data-msg="Please enter your first name" />
                    </div>
                    <!-- Mai làm tiếp phần sửa -->
                    <div class="col-12 ">
                        <label class="form-label" for="modalEditUserCountry">Ghi Chú</label>
                        <textarea class="form-control" disabled name="note" id="note" cols="30" rows="4"></textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Detail Category Service -->

@endsection
@section('script')
<script>
    $(function() {

        var e = $("#DataTables_Table_User");
        var t = $(".new-user-modal"),
            a = $(".add-new-user"),
            s = $(".select2"),
            n = $(".dt-contact"),
            o = "{{ route('user.list') }}",
            r = "app-user-view-account.html";
        var table = e.DataTable({
            "ajax": {
                "url": "{{ route('cate-service.list.api') }}",
                "type": "GET",
                "dataSrc": ""
            },
            columns: [
                // { data: "" }, 
                {
                    data: "name_cate_service"
                },
                {
                    data: "image"
                },
                {
                    data: "note"
                },

            ],
            columnDefs: [{
                    "width": "25%",
                    "targets": 0
                },
                {
                    "defaultContent": '<span class="badge rounded-pill badge-light-warning" text-capitalized>Không có ghi chú</span>',
                    "targets": 2 //tất cả thì là _all
                },
                {
                    targets: 1,
                    render: function(e, t, a, s) {
                        var n = a.image;
                        if (n) {
                            return ('<img src="/storage/' + n + '" class="me-75" height="60" width="60" alt="cate-service_avt"/>')
                        }
                    },
                },
                {
                    targets: 0,
                    responsivePriority: 2,
                    render: function(e, t, a, s) {
                        var n = a.name_cate_service;
                        if (n) {
                            return ('<span class="fw-bolder">' + n + '</span>')
                        }
                    },
                },
                {
                    targets: 3,
                    title: "Actions",
                    orderable: !1,
                    render: function(e, t, a, s) {
                        return (
                            '<div class="btn-group"><a class="btn btn-sm dropdown-toggle hide-arrow" data-bs-toggle="dropdown">' +
                            feather.icons["more-vertical"].toSvg({
                                class: "font-small-4",
                            }) +
                            '</a><div class="dropdown-menu dropdown-menu-end"><a href="#" id="detailUser" data-id="' + a.id + '" data-bs-toggle="modal" data-bs-target="#detailUserModal" class="dropdown-item">' +
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
                                columns: [0, 2]
                            },
                        },
                        {
                            extend: "csv",
                            text: feather.icons["file-text"].toSvg({
                                class: "font-small-4 me-50",
                            }) + "Csv",
                            className: "dropdown-item",
                            exportOptions: {
                                columns: [0, 2]
                            },
                        },
                        {
                            extend: "excel",
                            text: feather.icons.file.toSvg({
                                class: "font-small-4 me-50",
                            }) + "Excel",
                            className: "dropdown-item",
                            exportOptions: {
                                columns: [0, 2]
                            },
                        },
                        {
                            extend: "pdf",
                            text: feather.icons.clipboard.toSvg({
                                class: "font-small-4 me-50",
                            }) + "Pdf",
                            className: "dropdown-item",
                            exportOptions: {
                                columns: [0, 2]
                            },
                        },
                        {
                            extend: "copy",
                            text: feather.icons.copy.toSvg({
                                class: "font-small-4 me-50",
                            }) + "Copy",
                            className: "dropdown-item",
                            exportOptions: {
                                columns: [0, 2, ]
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
                    text: "Thêm Mới Danh Mục",
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
                    "name_cate_service": {
                        required: !0
                    },
                    "image": {
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
                    async: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        if (data.code == 0) {
                            $.each(data.error, function(prefix, val) {
                                $(form).find('span' + prefix + '_error').text(val[0]);
                            });
                        } else {
                            $(form)[0].reset();
                            t.modal("hide");
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
            Swal.fire({
                        title: "Bạn có chắc chắn?",
                        text: "Bạn sẽ không thể hoàn tác!",
                        icon: "warning",
                        showCancelButton: !0,
                        cancelButtonText: 'Quay lại',
                        confirmButtonText: "Đúng, Xóa!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                            cancelButton: "btn btn-outline-danger ms-1",
                        },
                        buttonsStyling: !1,
                        }).then(function (t) {
                            if (t.value) {
                                $.ajax({
                                    type:"DELETE",
                                    url: "{{ route('cate-service.list.api') }}" + "/" + user_id,
                                    headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                success: function(){
                                    table.ajax.reload();
                                    toastr.success("Xóa Thành Công");
                                },
                                error:function () {
                                    toastr.error("Xóa không Thành Công");
                                }
                            })
                            } 
                        });
        });
        //detail
        $('body').on('click', '#detailUser', function() {
            var user_id = $(this).data("id");
            $.get('<?= route("cate-service.list.api") ?>' + "/show/" + user_id, function(data) {
                var form = $('#detailUserForm');
                $("#account-upload-img1").attr("src", data.image ? "/storage/" + data.image :
                    "{{ asset('admin/images/portrait/small/avatar-none.png') }}");
                form.find('input[name="id"]').val(data.id);
                form.find('input[name="name_cate_service"]').val(data.name_cate_service);
                form.find('#note').val(data.note);
            }, 'json')
        });

        // get detail edit
        $('body').on('click', '#editUser', function() {
            var user_id = $(this).data("id");
            $.get('<?= route("cate-service.list.api") ?>' + "/show/" + user_id, function(data) {
                var accountUploadImg = $("#account-upload-img"),
                    accountUpload = $("#account-upload"),
                    uploadedAvatar = $(".uploadedAvatar"),
                    accountReset = $("#account-reset");
                if (uploadedAvatar) {
                    // var src = uploadedAvatar.attr("src");
                    accountUpload.on("change", function(ch) {

                            var n = new FileReader(),
                                uploadedAvatar = ch.target.files;
                            (n.onload = function() {
                                accountUploadImg && accountUploadImg.attr("src", n.result);
                            }),
                            n.readAsDataURL(uploadedAvatar[0]);
                        }),
                        accountReset.on("click", function() {
                            uploadedAvatar.attr("src", data.image ? "/storage/" + data.image :
                                "{{ asset('admin/images/portrait/small/avatar-none.png') }}");
                        });
                };
                var form = $('#editUserForm');
                $("#account-upload-img").attr("src", data.image ? "/storage/" + data.image :
                    "{{ asset('admin/images/portrait/small/avatar-none.png') }}");
                form.find('input[name="id"]').val(data.id);
                form.find('input[name="name_cate_service"]').val(data.name_cate_service);
                form.find('#note').val(data.note);
            }, 'json')
        });
        // validate
        $('#editUserForm').validate({
                errorClass: "error",
                rules: {
                    "name_cate_service": {
                        required: !0
                    },
                    "image": {
                        required: !0
                    },
                },
            });
        // submit edit in db
        $('#editUserForm').on('submit', function(e) {
            e.preventDefault();
            var form = this;
            var s =   $('#editUserForm').valid();
            if (s) {
            $.ajax({
                type: "POST",
                url: $(form).attr('action'),
                data: new FormData(form),
                processData: false,
                dataType: 'json',
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data.code == 0) {
                        $.each(data.error, function(prefix, val) {
                            $(form).find('span' + prefix + '_error').text(val[0]);
                        });
                    } else {
                        console.log('form', data);
                        $(form)[0].reset();
                        $('#editUserModal').modal("hide");
                        table.ajax.reload();
                        toastr.success(data.msg)
                    }
                },
                error: function(error) {
                    console.log("Sửa mới không thành công", error);
                }
            
            })}
        });

    });
</script>
@endsection