@extends('admin.layout.main')
@section('title', 'User')
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
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75" id="member-count"></h3>
                                    <span>Thành viên</span>
                                </div>
                                <div class="avatar bg-light-primary p-50">
                                    <span class="avatar-content">
                                        <i data-feather="user" class="font-medium-4"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75" id="admin-count"></h3>
                                    <span>Quản lý</span>
                                </div>
                                <div class="avatar bg-light-danger p-50">
                                    <span class="avatar-content">
                                        <i data-feather="shield" class="font-medium-4"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75" id="staff-count"></h3>
                                    <span>Nhân viên</span>
                                </div>
                                <div class="avatar bg-light-success p-50">
                                    <span class="avatar-content">
                                        <i data-feather="user-check" class="font-medium-4"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75" id="editor-count"></h3>
                                    <span>Người biên tập</span>
                                </div>
                                <div class="avatar bg-light-warning p-50">
                                    <span class="avatar-content">
                                        <i data-feather="edit-3" class="font-medium-4"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- list and filter start -->
                <div class="card">
                    <div class="card-body border-bottom">
                        <h4 class="card-title">Tài Khoản</h4>
                        <div class="row">
                            <div class="col-md-4 user_role"></div>
                            <div class="col-md-4 user_plan"></div>
                            <div class="col-md-4 user_status"></div>
                        </div>
                    </div>
                    <div class="card-datatable table-responsive pt-0">
                        <table class="user-list-table table" id="DataTables_Table_User">
                            <thead class="table-light">
                                <tr>
                                    <th>Họ & Tên</th>
                                    <th>Giới tính</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ</th>
                                    <th>Vai trò</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                        </table>

                    </div>
                    <!-- Modal to add new user starts-->
                    <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
                        <div class="modal-dialog">
                            <form method="POST" action="{{ route('user.add.api') }}"
                                class="add-new-user modal-content pt-0" enctype="multipart/form-data">
                                @csrf
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">Thêm tài khoản</h5>
                                </div>
                                <div class="modal-body flex-grow-1">
                                    <div class="mb-1">
                                        <label for="customFile1" class="form-label">Ảnh đại diện</label>
                                        <input class="form-control" type="file" id="customFile1" name="avatar" />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" class="d-block">Giới tính</label>
                                        <div class="d-flex">
                                            <div class="form-check ">
                                                <input type="radio" id="validationRadio3" name="gender"
                                                    class="form-check-input" value="1" required />
                                                <label class="form-check-label" for="validationRadio3">Nam</label>
                                            </div>
                                            <div class="form-check " style="margin-left: 10px">
                                                <input type="radio" id="validationRadio4" name="gender"
                                                    class="form-check-input" value="2" required />
                                                <label class="form-check-label" for="validationRadio4">Nữ</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-icon-default-fullname">Họ & Tên</label>
                                        <input type="text" class="form-control dt-full-name"
                                            id="basic-icon-default-fullname" placeholder="John Doe" name="full_name" />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-icon-default-email">Email</label>
                                        <input type="text" id="basic-icon-default-email" class="form-control dt-email"
                                            placeholder="john.doe@example.com" name="email" />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-default-password1">Mật khẩu</label>
                                        <input type="password" id="basic-default-password1" class="form-control"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            name="password" required />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter your password.</div>
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="bsDob">Ngày sinh</label>
                                        <input type="date" class="form-control picker" name="date_birth" id="bsDob"
                                            required />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter your date of birth.</div>
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-icon-default-contact">Số điện thoại</label>
                                        <input type="text" id="basic-icon-default-contact" class="form-control "
                                            placeholder="0336-933-4479" name="phone"  minlength="10" maxlength="10"  required />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-icon-default-company">Địa chỉ</label>
                                        <input type="text" id="basic-icon-default-company" class="form-control "
                                            placeholder="địa chỉ" name="address" />
                                    </div>
                                    <button type="submit" class="btn btn-primary me-1 data-submit">Lưu</button>
                                    <button type="reset" class="btn btn-outline-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
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
                    <h1 class="mb-1">Cập nhật mới tài khoản</h1>
                    <p>Cập nhập chi tiết tài khoản mới !</p>
                </div>
                <form id="editUserForm" action="{{ route('user.update.api') }}" method="POST" class="row gy-1 pt-75"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" hidden>
                    <div class="d-flex center">
                        <a href="#" class="me-25">
                            <img src="" id="account-upload-img" class="uploadedAvatar rounded me-50" alt="profile image"
                                height="100" width="100" name="avatar" />
                        </a>
                        <!-- upload and reset button -->
                        <div class="d-flex align-items-end mt-75 ms-1">
                            <div>
                                <label for="account-upload" class="btn btn-sm btn-primary mb-75 me-75">Upload</label>
                                <input type="file" id="account-upload" name="avatar" hidden accept="image/*" />
                                <button type="button" id="account-reset"
                                    class="btn btn-sm btn-outline-secondary mb-75">Reset</button>
                                <p class="mb-0">Loại tệp được phép: png, jpg, jpeg.</p>
                            </div>
                        </div>
                        <!--/ upload and reset button -->
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserFirstName">Họ và tên</label>
                        <input type="text" id="modalEditUserFirstName full_name" name="full_name" class="form-control"
                            placeholder="tên của bạn" data-msg="Please enter your first name" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserEmail">Email:</label>
                        <input type="text" id="modalEditUserEmail email" name="email" class="form-control"
                            placeholder="example@domain.com" />

                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserLastName">Ngày Sinh</label>
                        <input type="date" class="form-control picker" name="date_birth" id="date_birth" required />
                    </div>
                    @role('Admin')
                    <div class="col-12 col-md-6">
                        <i data-feather='lock'></i>
                        <label class="form-label" for="role">Vai trò</label>
                        <select id="user-role" class="form-select" name="role">
                        </select>
                    </div>
                    @endrole

                    {{-- <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditTaxID">Mật khẩu</label>
                        <input type="password" id="modalEditTaxID " name="password"
                            class="form-control modal-edit-tax-id" placeholder="password" />
                    </div> --}}


                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserPhone">Số điện thoại</label>
                        <input type="text" id="modalEditUserPhone phone" name="phone"
                            class="form-control phone-number-mask" placeholder="+1 (609) 933-44-22"
                            value="+1 (609) 933-44-22"  minlength="10" maxlength="10"  required/>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserCountry">Giới Tính</label>
                        <div class="d-flex">
                            <div class="form-check form-check-inline">
                                <input type="radio" id="gender1" name="gender" class="form-check-input" value="1"
                                    required />
                                <label class="form-check-label" for="gender1">Nam</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="gender2" name="gender" class="form-check-input" value="2"
                                    required />
                                <label class="form-check-label" for="gender2">Nữ</label>
                            </div>
                        </div>

                    </div>
                    <div class="col-12 ">
                        <label class="form-label" for="modalEditUserCountry">Địa chỉ</label>
                        <textarea class="form-control" name="address" id="address" cols="30" rows="1"></textarea>
                    </div>


                    <div class="col-12 text-center mt-2 pt-50">
                        <button type="submit" class="btn btn-primary me-1">Lưu</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                            aria-label="Close">
                            Quay lại
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
    $.get('<?= route("user.list.api") ?>', function(data) {
        $('#staff-count').html(data.staff);
        $('#admin-count').html(data.admin);
        $('#editor-count').html(data.editor);
        $('#member-count').html(data.member);
 })
    $(function () {
    var e = $("#DataTables_Table_User");
    var t = $(".new-user-modal"),
        a = $(".add-new-user"),
        s = $(".select2"),
        n = $(".dt-contact"),
        o = "{{ route('user.list') }}",
        r = "app-user-view-account.html";
        var  table = e.DataTable({
                "ajax" : {
                        "url" : "{{ route('user.list.api') }}",
                        "type" : "GET",
                        "dataSrc": "user"
                        },
                columns: [
                    // { data: "" }, 
                    { data: "full_name"  },
                    // { data: "email" },
                    { data: "gender" }, 
                    { data: "phone" },
                    { data: "address" },
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
                        render: function (e, t, a, s) {
                            var n = a.full_name,
                                l = a.email,
                                i = a.avatar;
                            if (i)
                            {
                                if (i.includes('https')) {
                                    var c =`<img src="${i}" alt="Avatar" height="32" width="32">`;
                                }else{
                                    var c =`<img src="/storage/${i}" alt="Avatar" height="32" width="32">`;
                                }
                            }else {
                                var d = [
                                        "success",
                                        "danger",
                                        "warning",
                                        "info",
                                        "dark",
                                        "primary",
                                        "secondary",
                                    ][Math.floor(6 * Math.random()) + 1],
                                    p = (n = a.full_name).match(/\b\w/g) || [];
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
                        targets: 4,
                        render: function (e, t, a, s) {
                            var n = a.roles.map(n=> n.name);
                            return (
                                "<span class='text-truncate align-middle'>" +
                                {
                                    Member: feather.icons.user.toSvg({
                                        class: "font-medium-3 text-primary me-50",
                                    }),
                                    Author: feather.icons.settings.toSvg({
                                        class: "font-medium-3 text-warning me-50",
                                    }),
                                    Staff: feather.icons["user-check"].toSvg({
                                        class: "font-medium-3 text-success me-50",
                                    }),
                                    Editor: feather.icons["edit-2"].toSvg({
                                        class: "font-medium-3 text-info me-50",
                                    }),
                                    Admin: feather.icons.slack.toSvg({
                                        class: "font-medium-3 text-danger me-50",
                                    }),
                                }[n[0]]+
                                n[0] +
                                "</span>"
                            );
                        },
                    },
                    {
                        targets: 1,
                        render: function (e, t, a, s) {
                            var n = a.gender;
                            if (n==1) {
                                return  ('<span class="badge rounded-pill badge-light-warning" text-capitalized>Nam</span>')
                            } else {
                                return  ('<span class="badge rounded-pill badge-light-success" text-capitalized>Nữ</span>')
                            }
                        },
                    },
                    {
                        targets: 5,
                        title: "Actions",
                        orderable: !1,
                        render: function (e, t, a, s) {
                             console.log('addđ' , );
                            return (`<div class="btn-group"><a class="btn btn-sm dropdown-toggle hide-arrow" data-bs-toggle="dropdown">${
                                feather.icons["more-vertical"].toSvg({
                                    class: "font-small-4",
                                })}</a><div class="dropdown-menu dropdown-menu-end"><a href="#" id="editUser" data-id="${a.id}"  data-bs-toggle="modal" data-bs-target="#editUserModal" class="dropdown-item">${
                                feather.icons["edit"].toSvg({
                                    class: "font-small-4 me-50",
                                })}Edit</a>
                            ${(a.roles[0].name !== 'Admin') ? (
                                 `<a href="#" id="deleteUser" data-id="${a.id}" class="dropdown-item delete-record">${
                                feather.icons["trash-2"].toSvg({
                                    class: "font-small-4 me-50",
                                })}Delete </a>` ) : ""
                            }
                            </div></div></div>`
                            );

                        },
                    },
                ],
                order: [[1, "desc"]],
                dom: '<"d-flex justify-content-between align-items-center header-actions mx-2 row mt-75"<"col-sm-12 col-lg-4 d-flex justify-content-center justify-content-lg-start" l><"col-sm-12 col-lg-8 ps-xl-75 ps-0"<"dt-action-buttons d-flex align-items-center justify-content-center justify-content-lg-end flex-lg-nowrap flex-wrap"<"me-1"f>B>>>t<"d-flex justify-content-between mx-2 row mb-1"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                language: {
                    sLengthMenu: "Show _MENU_",
                    search: "Search",
                    searchPlaceholder: "Search..",
                },
                buttons: [
                    {
                        extend: "collection",
                        className:
                            "btn btn-outline-secondary dropdown-toggle me-2",
                        text:
                            feather.icons["external-link"].toSvg({
                                class: "font-small-4 me-50",
                            }) + "Export",
                        buttons: [
                            {
                                extend: "print",
                                text:
                                    feather.icons.printer.toSvg({
                                        class: "font-small-4 me-50",
                                    }) + "Print",
                                className: "dropdown-item",
                           exportOptions: { columns: [0,1, 2, 3 ] },
                            },
                            {
                                extend: "csv",
                                text:
                                    feather.icons["file-text"].toSvg({
                                        class: "font-small-4 me-50",
                                    }) + "Csv",
                                className: "dropdown-item",
                            exportOptions: { columns: [0,1, 2, 3 ] },
                            },
                            {
                                extend: "excel",
                                text:
                                    feather.icons.file.toSvg({
                                        class: "font-small-4 me-50",
                                    }) + "Excel",
                                className: "dropdown-item",
                               exportOptions: { columns: [0,1, 2, 3 ] },
                            },
                            {
                                extend: "pdf",
                                text:
                                    feather.icons.clipboard.toSvg({
                                        class: "font-small-4 me-50",
                                    }) + "Pdf",
                                className: "dropdown-item",
                             exportOptions: { columns: [0,1, 2, 3 ] },
                            },
                            {
                                extend: "copy",
                                text:
                                    feather.icons.copy.toSvg({
                                        class: "font-small-4 me-50",
                                    }) + "Copy",
                                className: "dropdown-item",
                                exportOptions: { columns: [0,1, 2, 3 ] },
                            },
                        ],
                        init: function (e, t, a) {
                            $(t).removeClass("btn-secondary"),
                                $(t).parent().removeClass("btn-group"),
                                setTimeout(function () {
                                    $(t)
                                        .closest(".dt-buttons")
                                        .removeClass("btn-group")
                                        .addClass("d-inline-flex mt-50");
                                }, 50);
                        },
                    },
                    {
                        text: "Thêm Mới Tài Khoản",
                        className: "add-new btn btn-primary",
                        attr: {
                            "data-bs-toggle": "modal",
                            "data-bs-target": "#modals-slide-in",
                        },
                        init: function (e, t, a) {
                            $(t).removeClass("btn-secondary");
                        },
                    },
                ],
                responsive: {
                    details: {
                        display: $.fn.dataTable.Responsive.display.modal({
                            header: function (e) {
                                return "Details of " + e.data().full_name;
                            },
                        }),
                        type: "column",
                        renderer: function (e, t, a) {
                            var s = $.map(a, function (e, t) {
                                return 6 !== e.columnIndex
                                    ? '<tr data-dt-row="' +
                                          e.rowIdx +
                                          '" data-dt-column="' +
                                          e.columnIndex +
                                          '"><td>' +
                                          e.title +
                                          ":</td> <td>" +
                                          e.data +
                                          "</td></tr>"
                                    : "";
                            }).join("");
                            return (
                                !!s &&
                                $('<table class="table"/>').append(
                                    "<tbody>" + s + "</tbody>"
                                )
                            );
                        },
                    },
                },
                language: { paginate: { previous: "&nbsp;", next: "&nbsp;" } },
                initComplete: function (test,et) {
                    this.api()
                        .columns(3)
                        .every(function () {
                            var e = this,
                                t =
                                    ($(
                                        '<label class="form-label" for="UserRole">Địa chỉ</label>'
                                    ).appendTo(".user_role"),
                                    $(
                                        '<select id="UserRole" class="form-select text-capitalize mb-md-0 mb-2"><option value=""> Lựa chọn địa chỉ </option></select>'
                                    )
                                        .appendTo(".user_role")
                                        .on("change", function () {
                                            var t =
                                                $.fn.dataTable.util.escapeRegex(
                                                    $(this).val()
                                                );
                                            e.search(
                                                t ? "^" + t + "$" : "",
                                                !0,
                                                !1
                                            ).draw();
                                        }));
                            e.data()
                                .unique()
                                .sort()
                                .each(function (e, a) {
                              
                                    t.append(
                                        '<option value="' +
                                            e +
                                            '" class="text-capitalize">' +
                                            e +
                                            "</option>"
                                    );
                                });
                        }),
                    this.api()
                            .columns(2)
                            .every(function () {
                                var e = this,
                                    t =
                                        ($(
                                            '<label class="form-label" for="UserPlan">Số điện thoại</label>'
                                        ).appendTo(".user_plan"),
                                        $(
                                            '<select id="UserPlan" class="form-select text-capitalize mb-md-0 mb-2"><option value=""> Lựa chọn SĐT </option></select>'
                                        )
                                            .appendTo(".user_plan")
                                            .on("change", function () {
                                                var t =
                                                    $.fn.dataTable.util.escapeRegex(
                                                        $(this).val()
                                                    );
                                                e.search(
                                                    t ? "^" + t + "$" : "",
                                                    !0,
                                                    !1
                                                ).draw();
                                            }));
                                e.data()
                                    .unique()
                                    .sort()
                                    .each(function (e, a) {
                                        t.append(
                                            '<option value="' +
                                                e +
                                                '" class="text-capitalize">' +
                                                e +
                                                "</option>"
                                        );
                                    });
                            }),
                    this.api()
                            .columns(1)
                            .every(function () {
                                var op = [{'vlue':1, 'name' : 'Nam'},{'vlue':2, 'name' : 'Nữ'}];
                                var e = this,
                                    t =
                                        ($(
                                            '<label class="form-label" for="FilterTransaction">Giới Tính</label>'
                                        ).appendTo(".user_status"),
                                        $(
                                            '<select id="FilterTransaction" class="form-select text-capitalize mb-md-0 mb-2xx"><option value=""> Lựa chọn giới tính </option></select>'
                                        )
                                            .appendTo(".user_status")
                                            .on("change", function () {
                                                
                                                var t = $.fn.dataTable.util.escapeRegex(
                                                            $(this).val()
                                                        );
                                                e.search(
                                                    t==1 ? "^" + 'Nam'  + "$" : "Nữ",
                                                    !0,
                                                    !1
                                                ).draw();
                                            }));
                                op.map(function (e, a) {
                                        t.append(
                                            '<option value="'+e.vlue+'" class="text-capitalize"> '+e.name+' </option>'
                                        );
                                    });
                            });
                },
            });
        s.each(function () {
            var e = $(this);
            e.wrap('<div class="position-relative"></div>'),
                e.select2({
                    dropdownAutoWidth: !0,
                    width: "100%",
                    dropdownParent: e.parent(),
                });
        })

 var response;
    $.validator.addMethod(
        "uniqueUserEmail", 
        function(value, element) {
            $.get('<?= route("user.list.api") ?>', function(dataR) {
                response =  dataR.user.some(e => e.email === value);
                    });
            return !response;
        },
        "Tài khoản này đã tồn tại!"
    );

a.length && (a.validate({
                errorClass: "error",
                rules: {
                    "full_name": { required: !0 },
                    "email": { required: !0 , email: true , uniqueUserEmail: true },
                    "phone": { required: !0 },
                    "address": { required: !0 },
                    "avatar": { required: !0 },
                },
            }),
            a.on("submit", function (e) {
                e.preventDefault();
                
                var form = this;
                var s = a.valid();
            if (s) {
            $.ajax({
                    type:"POST",
                    url:$(form).attr('action'),
                    data: new FormData(form),
                    processData: false,
                    dataType:'json',
                    async: false,
                    contentType: false,
                    headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                    success: function(data){
                        if (data.code==0) {
                            $.each(data.error,function (prefix,val) {
                                $(form).find('span'+prefix+'_error').text(val[0]);
                            });
                        }else{
                            $(form)[0].reset();
                            t.modal("hide");
                            table.ajax.reload();
                            toastr.success(data.msg)
                        }
                    },
                    error:function (error) {
                        console.log("Thêm không thành công",error);
                    }
                })
                }
               
            }));

$('body').on('click' ,'#deleteUser' , function(){
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
                    url:"{{ route('user.list.api') }}"+"/"+user_id,
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
$.get('<?= route("user.list.api") ?>', function(dataR) {
    dataR.role.map(function(x) {
        $('#user-role').append(`<option value="${x.id}"  data-id="${x.id}">${x.name}</option>`)
    })
// get detail edit
$('body').on('click' ,'#editUser' , function(){
    $('#editUserForm')[0].reset();
    var user_id = $(this).data("id");
    $.get('<?= route("user.list.api") ?>'+"/show/"+user_id , function (data) {
    var accountUploadImg = $("#account-upload-img"),
    accountUpload = $("#account-upload"),
    uploadedAvatar = $(".uploadedAvatar"),
    accountReset = $("#account-reset");
    if (uploadedAvatar) {
    accountUpload.on("change", function (ch) {
        var n = new FileReader(),
        uploadedAvatar = ch.target.files;
        (n.onload = function () {
        accountUploadImg && accountUploadImg.attr("src", n.result);
        }),
        n.readAsDataURL(uploadedAvatar[0]);
    }),
    accountReset.on("click", function () {
        uploadedAvatar.attr("src", data.avatar ? "/storage/"+ data.avatar 
        : "{{ asset('admin/images/portrait/small/avatar-none.png') }}" );
        });
    };
    var form = $('#editUserForm');
    $("#account-upload-img").attr("src", data.avatar ? "/storage/"+ data.avatar 
    : "{{ asset('admin/images/portrait/small/avatar-none.png') }}" );
    form.find('input[name="id"]').val(data.id); 
    form.find('input[name="full_name"]').val(data.full_name);    
    form.find('input[name="email"]').val(data.email);  
    form.find('input[name="phone"]').val(data.phone);
    form.find('input[name="date_birth"]').val(data.date_birth);   
    form.find('input[name="password"]').val(data.password); 
    form.find('#address').val(data.address); 
    if (data.gender === 1) {
        $('#gender1').attr('checked',true);
        $("#gender2").removeAttr("checked");

    }else if (data.gender === 2){
        $("#gender1").removeAttr("checked");
        $('#gender2').attr('checked',true);
    }
        $.get('<?= route("user.list.api") ?>', function(dataR) {
            dataR.role.map(function(x) {
                if (data.roles[0].id == x.id) {
                    $("#user-role").find(`option[data-id="${x.id}"]`).prop('selected', true);
                }
            })
        })
    },'json')
    })

});
// validation

$('#editUserForm').validate({
    errorClass: "error",
    rules: {
        "full_name": { required: !0 },
        "email": { required: !0 , email: true },
        "phone": { required: !0 },
        "address": { required: !0 },
        "avatar": { required: !0 },
    },
});
// submit edit in db
$('#editUserForm').on('submit', function(e){
    e.preventDefault();
    var form = this;
    var s = $('#editUserForm').valid();
        if (s) {
    $.ajax({
        type:"POST",
        url:$(form).attr('action'),
        data: new FormData(form),
        processData: false,
        dataType:'json',
        contentType: false,
        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
        success: function(data){
            if (data.code==0) {
                $.each(data.error,function (prefix,val) {
                    $(form).find('span'+prefix+'_error').text(val[0]);
                });
            }else{
                $(form)[0].reset();
                $('#editUserModal').modal("hide");
                table.ajax.reload();
                toastr.success(data.msg)
            }
        },
        error:function (error) {
            console.log("Sửa mới không thành công",error);
        }
    });}

});

});


</script>
@endsection