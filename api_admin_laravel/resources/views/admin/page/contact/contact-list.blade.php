@extends('admin.layout.main')
@section('title', 'Contact')
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
                                    <h3 class="fw-bolder mb-75">21,459</h3>
                                    <span>Total Users</span>
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
                                    <h3 class="fw-bolder mb-75">4,567</h3>
                                    <span>Paid Users</span>
                                </div>
                                <div class="avatar bg-light-danger p-50">
                                    <span class="avatar-content">
                                        <i data-feather="user-plus" class="font-medium-4"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75">19,860</h3>
                                    <span>Active Users</span>
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
                                    <h3 class="fw-bolder mb-75">237</h3>
                                    <span>Pending Users</span>
                                </div>
                                <div class="avatar bg-light-warning p-50">
                                    <span class="avatar-content">
                                        <i data-feather="user-x" class="font-medium-4"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- list and filter start -->
                <div class="card">
                    <!-- lọc đã xóa -->

                    <div class="card-datatable table-responsive pt-0">
                        <table class="user-list-table table" id="DataTables_Table_User">
                            <thead class="table-light">
                                <tr>

                                    <th>Họ & Tên</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                    

                        </table>


                    </div>
                    <!-- Modal to add new user starts-->
                    <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
                        <div class="modal-dialog">
                            <form method="POST" action="" class="add-new-user modal-content pt-0" enctype="multipart/form-data">
                                @csrf
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">Thêm tài khoản</h5>
                                </div>
                                <div class="modal-body flex-grow-1">
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
                                    {{-- <div class="mb-1">
                                        <label class="form-label" for="basic-default-password">Password</label>
                                        <input
                                          type="password"
                                          id="basic-icon-default-password"
                                          name="basic-default-password"
                                          class="form-control dt-password"
                                          placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        />
                                      </div>
                                      <div class="mb-1">
                                        <label class="form-label" for="confirm-password">Confirm Password</label>
                                        <input
                                          type="password"
                                          id="confirm-password"
                                          name="confirm-password"
                                          class="form-control"
                                          placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        />
                                      </div> --}}


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
                                            placeholder="0336-933-4479" name="phone" />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-icon-default-company">Địa chỉ</label>
                                        <input type="text" id="basic-icon-default-company" class="form-control "
                                            placeholder="địa chỉ" name="address" />
                                    </div>
                                    <div class="mb-1">
                                        <label for="customFile1" class="form-label">Ảnh đại diện</label>
                                        <input class="form-control" type="file" id="customFile1" name="avatar"
                                             />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" class="d-block">Giới tính</label>
                                        <div class="form-check my-50">
                                            <input type="radio" id="validationRadio3" name="gender"
                                                class="form-check-input" value="1" required />
                                            <label class="form-check-label" for="validationRadio3">Nam</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" id="validationRadio4" name="gender"
                                                class="form-check-input" value="2" required />
                                            <label class="form-check-label" for="validationRadio4">Nữ</label>
                                        </div>
                                    </div>
                                    {{--                                    
                                    <div class="mb-1">
                                        <label class="form-label" for="user-role">User Role</label>
                                        <select id="user-role" class="select2 form-select">
                                            <option value="subscriber">Subscriber</option>
                                            <option value="editor">Editor</option>
                                            <option value="maintainer">Maintainer</option>
                                            <option value="author">Author</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div> --}}

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
@endsection
@section('script')
<script>
    $(function () {
    var e = $("#DataTables_Table_User");
    var t = $(".new-user-modal"),
        a = $(".add-new-user"),
        s = $(".select2"),
        n = $(".dt-contact"),
        o = "{{ route('contact.list') }}",
        r = "app-user-view-account.html";
        var  table =   e.DataTable({
                "ajax" : {
                        "url" : "{{ route('contact.list.api') }}",
                        "type" : "GET",
                        "dataSrc": ""
                        },
                columns: [
                    // { data: "" }, 
                  
                    { data: "user.full_name"  },
                    // { data: "email" },
                    { data: "message" }, 
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
                            var n = a.user.full_name,
                                l = a.user.email,
                                i = a.user.avatar;
                              
                            if (i)
                                var c =
                                    '<img src="/storage/'+
                                    i +
                                    '" alt="Avatar" height="32" width="32">';
                                   
                                    // var c =
                                    // '<img src="
                                    // {{asset( "storage/" . '+ i +')}}
                                    // " alt="Avatar" height="32" width="32">';

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
                        // targets: 1,
                        render: function (e, t, a, s) {
                            var n = a.message;
                            if (n) {
                                return  ('<span class="badge rounded-pill badge-light-warning" text-capitalized>'+ n +'</span>')
                            }
                        },
                    },
                    
                    {
                        targets: 2,
                        title: "Actions",
                        orderable: !1,
                        render: function (e, t, a, s) {
                            var test = a.id
                            return (
                                '<div class="btn-group"><a class="btn btn-sm dropdown-toggle hide-arrow" data-bs-toggle="dropdown">' +
                                feather.icons["more-vertical"].toSvg({
                                    class: "font-small-4",
                                }) +
                                '</a><div class="dropdown-menu dropdown-menu-end"><a href="' +
                                r +
                                '" class="dropdown-item">' +
                                feather.icons["file-text"].toSvg({
                                    class: "font-small-4 me-50",
                                }) +
                                'Details</a><a href="' +
                                r +
                                '" id="editUser" data-id="'+a.id+'" class="dropdown-item">' +
                                feather.icons["edit"].toSvg({
                                    class: "font-small-4 me-50",
                                }) +
                                'Edit</a><a href="#" id="deleteUser" data-id="'+a.id+'" class="dropdown-item delete-record">' +
                                feather.icons["trash-2"].toSvg({
                                    class: "font-small-4 me-50",
                                }) +
                                "Delete</a></div></div></div>"
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
                            }) + "EXPORT",
                        buttons: [
                            {
                                extend: "print",
                                text:
                                    feather.icons.printer.toSvg({
                                        class: "font-small-4 me-50",
                                    }) + "PRINT", //nên để tên thao tác full in hoa nhìn đẹp hơn
                                className: "dropdown-item",
                           exportOptions: { columns: [0,1 ] },
                            },
                            {
                                extend: "csv",
                                text:
                                    feather.icons["file-text"].toSvg({
                                        class: "font-small-4 me-50",
                                    }) + "CSV",
                                className: "dropdown-item",
                            exportOptions: { columns: [0,1 ] },
                            },
                            {
                                extend: "excel",
                                text:
                                    feather.icons.file.toSvg({
                                        class: "font-small-4 me-50",
                                    }) + "EXCEL",
                                className: "dropdown-item",
                               exportOptions: { columns: [0,1 ] },
                            },
                            {
                                extend: "pdf",
                                text:
                                    feather.icons.clipboard.toSvg({
                                        class: "font-small-4 me-50",
                                    }) + "PDF",
                                className: "dropdown-item",
                             exportOptions: { columns: [0,1 ] },
                            },
                            {
                                extend: "copy",
                                text:
                                    feather.icons.copy.toSvg({
                                        class: "font-small-4 me-50",
                                    }) + "COPY", 
                                className: "dropdown-item",
                                exportOptions: { columns: [0,1] },
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

a.length &&
            (a.validate({
                errorClass: "error",
                rules: {
                    "full_name": { required: !0 },
                    "email": { required: !0 },
                    "phone": { required: !0 },
                    "address": { required: !0 },
                    "avatar": { required: !0 },
                },
            }),
            a.on("submit", function (e) {
                var s = a.valid();
                
               var name = $('#basic-icon-default-fullname').val()
                e.preventDefault(), s && t.modal("hide");
                console.log(name,'ewwewwe');

            }))
     

       
$('body').on('click' ,'#deleteUser' , function(){
    var user_id = $(this).data("id");
     if ( confirm("Bạn có chắc chắn muốn xóa Tài khoản này không ?")) {
    $.ajax({
        type:"DELETE",
        url:"{{ route('user.list.api') }}"+"/"+user_id,
        success: function(){
            table.ajax.reload();
        },
        error:function () {
            console.log("xóa thất bại");
        }
    })
     }
});

$('body').on('click' ,'#editUser' , function(){
    var user_id = $(this).data("id");
    $.ajax({
        type:"PATCH",
        url:"{{ route('user.list.api') }}"+"edit/"+user_id,
        success: function(){

            table.ajax.reload();
        },
        error:function () {
            console.log("xóa thất bại");
        }
    })
});

});

</script>
@endsection