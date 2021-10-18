@extends('admin.layout.main')
@section('title', 'Bill')
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
                <div class="card">
                    <div class="card-body border-bottom">
                        <h4 class="card-title">Hóa Đơn</h4>
                    </div>
                    <div class="card-datatable table-responsive pt-0">
                        <table class="user-list-table table" id="DataTables_Table_User">
                            <thead class="table-light">
                                <tr>

                                    <th>Khách Hàng</th>
                                    <th>Tổng Thời Gian</th>
                                    <th>Ngày Đặt</th>
                                    <th>Tổng Hóa Đơn</th>
                                    <th>Ghi Chú</th>
                                    <th>Trạng Thái</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>


                        </table>


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
                    <h1 class="mb-1">Chi tiết hóa đơn</h1>
                    <p>Chi tiết hóa đơn !</p>
                </div>
                <form id="detailUserForm" method="POST" class="row gy-1 pt-75" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" hidden>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserFirstName">Tên Khách Hàng</label>
                        <input disabled type="text" name="full_name" class="form-control" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserFirstName">Tổng Thời Gian (phút)</label>
                        <input disabled type="number" name="total_time_execution" class="form-control" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserFirstName">Ngày Đặt</label>
                        <input disabled type="time" name="date_work" class="form-control" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserFirstName">Tổng Tiền</label>
                        <input disabled type="text" name="total_bill" class="form-control" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserFirstName">Trạng Thái</label>
                        <input disabled type="text" name="status_bill" class="form-control" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserFirstName">Nhân Viên Thực Hiện</label>
                        <input disabled type="text" name="user_staff_id" class="form-control" />
                    </div>
                    <div class="col-12 ">
                        <label class="form-label" for="modalEditUserCountry">Ghi Chú Hóa Đơn</label>
                        <textarea disabled class="form-control" name="note_bill" id="note_bill" cols="30" rows="4"></textarea>
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
                    <h1 class="mb-1">Cập nhật mới tài khoản</h1>
                    <p>Cập nhập chi tiết tài khoản mới !</p>
                </div>
                <form id="editUserForm" action="{{ route('user.update.api') }}" method="POST" class="row gy-1 pt-75" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" hidden>
                    <div class="d-flex center">
                        <a href="#" class="me-25">
                            <img src="" id="account-upload-img" class="uploadedAvatar rounded me-50" alt="profile image" height="100" width="100" name="avatar" />
                        </a>
                        <!-- upload and reset button -->
                        <div class="d-flex align-items-end mt-75 ms-1">
                            <div>
                                <label for="account-upload" class="btn btn-sm btn-primary mb-75 me-75">Upload</label>
                                <input type="file" id="account-upload" name="avatar" hidden accept="image/*" />
                                <button type="button" id="account-reset" class="btn btn-sm btn-outline-secondary mb-75">Reset</button>
                                <p class="mb-0">Loại tệp được phép: png, jpg, jpeg.</p>
                            </div>
                        </div>
                        <!--/ upload and reset button -->
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserFirstName">Họ và tên</label>
                        <input type="text" id="modalEditUserFirstName full_name" name="full_name" class="form-control" placeholder="tên của bạn" data-msg="Please enter your first name" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserEmail">Email:</label>
                        <input type="text" id="modalEditUserEmail email" name="email" class="form-control" placeholder="example@domain.com" />

                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserLastName">Ngày Sinh</label>
                        <input type="date" class="form-control picker" name="date_birth" id="date_birth" required />
                    </div>
                    <div class="col-12 col-md-6">
                        <i data-feather='lock'></i>
                        <label class="form-label" for="modalEditUserStatus">Chức vụ</label>
                        <select id="modalEditUserStatus" name="modalEditUserStatus" class="form-select" aria-label="Default select example">
                            <option selected>Lựa chọn</option>
                            <option value="1">Admin</option>
                            <option value="2">Auth</option>
                            <option value="3">Subject</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditTaxID">Mật khẩu</label>
                        <input type="password" id="modalEditTaxID password" name="password" class="form-control modal-edit-tax-id" placeholder="password" />
                    </div>


                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserPhone">Số điện thoại</label>
                        <select class="select2 form-select" multiple="multiple" id="default-select-multi">
                            <option value="square">Square</option>
                            <option value="rectangle">Rectangle</option>
                            <option value="rombo">Rombo</option>
                            <option value="romboid">Romboid</option>
                            <option value="trapeze">Trapeze</option>
                            <option value="traible">Triangle</option>
                            <option value="polygon" selected>Polygon</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditTaxID">Nhập lại mật khẩu</label>
                        <input type="password" id="modalEditTaxID password_confirm" name="password_confirm" class="form-control modal-edit-tax-id" placeholder="Tax-8894" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserCountry">Giới Tính</label>
                        <div class="d-flex">
                            <div class="form-check form-check-inline">
                                <input type="radio" id="gender1" name="gender" class="form-check-input" value="1" required />
                                <label class="form-check-label" for="gender1">Nam</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="gender2" name="gender" class="form-check-input" value="2" required />
                                <label class="form-check-label" for="gender2">Nữ</label>
                            </div>
                        </div>

                    </div>
                    <div class="col-12 ">
                        <label class="form-label" for="modalEditUserCountry">Địa chỉ</label>
                        <textarea class="form-control" name="address" id="address" cols="30" rows="1"></textarea>
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
                "url": "{{ route('bill.list.api') }}",
                "type": "GET",
                "dataSrc": ""
            },
            columns: [{
                    data: "user_id"
                },
                {
                    data: "total_time_execution"
                },
                {
                    data: "date_work"
                },
                {
                    data: "total_bill"
                },
                {
                    data: "note_bill"
                },
                {
                    data: "status_bill"
                },
            ],
            columnDefs: [
                // {
                //     className: "control",
                //     orderable: !1,
                //     responsivePriority: 1,
                //     targets: 0,

                // },
                {
                    targets: 0,
                    responsivePriority: 2,
                    render: function(e, t, a, s) {
                        var n = a.user.full_name,
                            l = a.user.email,
                            i = a.user.avatar;

                        if (i)
                            var c =
                                '<img src="/storage/' +
                                i +
                                '" alt="Avatar" height="32" width="32">';
                        else {
                            var d = [
                                    "success",
                                    "danger",
                                    "warning",
                                    "info",
                                    "dark",
                                    "primary",
                                    "secondary",
                                ][Math.floor(6 * Math.random()) + 1],
                                p = (n = a.user.full_name).match(/\b\w/g) || [];
                            c =
                                '<span class="avatar-content">' +
                                (p = (
                                    (p.shift() || "") + (p.pop() || "")
                                ).toUpperCase()) +
                                "</span>";
                        }
                        return (
                            '<div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar ' +
                            ("" === i ? " bg-light-" + d + " " : "") +
                            ' me-1">' +
                            c +
                            '</div></div><div class="d-flex flex-column"><a href="' +
                            r +
                            '" class="user_name text-truncate text-body"><span class="fw-bolder">' +
                            n +
                            '</span></a><small class="emp_post text-muted">' +
                            l +
                            "</small></div></div>"
                        );
                    },
                },
                {
                    targets: 1,
                    responsivePriority: 2,
                    render: function(e, t, a, s) {
                        var n = Math.floor(a.total_time_execution / 60);
                        var b = a.total_time_execution % 60;
                        if (b > 0 && n > 0) {
                            return n + ' giờ ' + b + ' phút';
                        } else if (n < 1) {
                            return a.total_time_execution + ' phút';
                        } else {
                            return n + ' giờ';
                        }
                    },
                },
                {
                    targets: 5,
                    render: function(e, t, a, s) {
                        var n = a.status_bill;
                        if (n == 1) {
                            return ('<span class="badge rounded-pill badge-light-warning" text-capitalized>Chờ xác nhận</span>')
                        }
                        if (n == 2) {
                            return ('<span class="badge rounded-pill badge-light-primary" text-capitalized>Xác nhận thành công</span>')
                        }
                        if (n == 3) {
                            return ('<span class="badge rounded-pill badge-light-info" text-capitalized>Đang làm</span>')
                        }
                        if (n == 4) {
                            return ('<span class="badge rounded-pill badge-light-success" text-capitalized>Hoàn thành</span>')
                        }
                        if (n == 5) {
                            return ('<span class="badge rounded-pill badge-light-danger" text-capitalized>Hủy</span>')
                        }
                    },
                },
                {
                    targets: 3,
                    responsivePriority: 2,
                    render: function(e, t, a, s) {
                        var n = a.total_bill;
                        if (n) {
                            return n.toLocaleString() + '₫';
                        }
                    },
                },
                {
                    targets: 6,
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
                            columns: [0, 1, 2, 3, 4, 5]
                        },
                    },
                    {
                        extend: "csv",
                        text: feather.icons["file-text"].toSvg({
                            class: "font-small-4 me-50",
                        }) + "Csv",
                        className: "dropdown-item",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        },
                    },
                    {
                        extend: "excel",
                        text: feather.icons.file.toSvg({
                            class: "font-small-4 me-50",
                        }) + "Excel",
                        className: "dropdown-item",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        },
                    },
                    {
                        extend: "pdf",
                        text: feather.icons.clipboard.toSvg({
                            class: "font-small-4 me-50",
                        }) + "Pdf",
                        className: "dropdown-item",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        },
                    },
                    {
                        extend: "copy",
                        text: feather.icons.copy.toSvg({
                            class: "font-small-4 me-50",
                        }) + "Copy",
                        className: "dropdown-item",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        },
                    },
                ],
            }, ],
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

        $('body').on('click', '#deleteUser', function() {
            var user_id = $(this).data("id");
            if (confirm("Bạn có chắc chắn muốn xóa Tài khoản này không ?")) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('bill.list.api') }}" + "/" + user_id,
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

        //detail
        $('body').on('click', '#detailUser', function() {
            var user_id = $(this).data("id");
            $.get('<?= route("bill.list.api") ?>' + "/show/" + user_id, function(data) {
                console.log(data)
                var form = $('#detailUserForm');
                form.find('input[name="full_name"]').val(data.user.full_name);
                form.find('input[name="total_time_execution"]').val(data.total_time_execution);
                form.find('input[name="date_work"]').val(data.date_work);
                form.find('input[name="total_bill"]').val(data.total_bill.toLocaleString() + '₫');
                form.find('input[name="user_staff_id"]').val(data.staff.full_name);
                if (data.status_bill == 1) {
                    form.find('input[name="status_bill"]').val('Chờ xác nhận');
                }
                if (data.status_bill == 2) {
                    form.find('input[name="status_bill"]').val('Xác nhận thành công');
                }
                if (data.status_bill == 3) {
                    form.find('input[name="status_bill"]').val('Đang làm');
                }
                if (data.status_bill == 4) {
                    form.find('input[name="status_bill"]').val('Hoàn thành');
                }
                if (data.status_bill == 5) {
                    form.find('input[name="status_bill"]').val('Hủy');
                }
                form.find('#note_bill').val(data.note_bill);
            }, 'json')
        });

        // get detail edit
        $('body').on('click', '#editUser', function() {
            var user_id = $(this).data("id");
            $.get('<?= route("user.list.api") ?>' + "/show/" + user_id, function(data) {
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
                            uploadedAvatar.attr("src", data.avatar ? "/storage/" + data.avatar :
                                "{{ asset('admin/images/portrait/small/avatar-none.png') }}");
                        });
                };
                var form = $('#editUserForm');
                $("#account-upload-img").attr("src", data.avatar ? "/storage/" + data.avatar :
                    "{{ asset('admin/images/portrait/small/avatar-none.png') }}");
                form.find('input[name="id"]').val(data.id);
                form.find('input[name="full_name"]').val(data.full_name);
                form.find('input[name="email"]').val(data.email);
                form.find('input[name="phone"]').val(data.phone);
                form.find('input[name="date_birth"]').val(data.date_birth);
                form.find('input[name="password"]').val(data.password);
                form.find('#address').val(data.address);
                if (data.gender == 1) {
                    $('#gender1').attr('checked', true);
                } else {
                    $('#gender2').attr('checked', true);
                }
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