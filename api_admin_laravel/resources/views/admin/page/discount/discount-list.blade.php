@extends('admin.layout.main')
@section('title', 'Discount')
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
                    <!-- <div class="card-body border-bottom">
                        <h4 class="card-title">Tìm kiếm & Lọc</h4>
                        <div class="row">
                            <div class="col-md-4 user_role"></div>
                            <div class="col-md-4 user_plan"></div>
                            <div class="col-md-4 user_status"></div>
                        </div>
                    </div> -->
                    <div class="card-datatable table-responsive pt-0">
                        <table class="user-list-table table" id="DataTables_Table_User">
                            <thead class="table-light">
                                <tr>

                                    <th>Mã Giảm Giá</th>
                                    <th>Ảnh</th>
                                    <th>Phần Trăm</th>
                                    <th>Số Lượng</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                    

                        </table>


                    </div>
                    <!-- Modal to add new user starts-->
                    <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
                        <div class="modal-dialog">
                            <form method="POST" action="{{route('discount.add.api')}}" class="add-new-user modal-content pt-0" enctype="multipart/form-data">
                                @csrf
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">Thêm tài khoản</h5>
                                </div>
                                <div class="modal-body flex-grow-1">
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-icon-default-fullname">Mã Giảm Giá</label>
                                        <input type="text" class="form-control dt-full-name code1" 
                                            id="basic-icon-default-fullname" placeholder="MKX34OP" name="code_discount" />
                                    </div>
                                    <!-- <div class="mb-1">
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
                                    </div> -->
                                    <div class="mb-1">
                                        <label for="customFile1" class="form-label">Ảnh Chương Trình</label>
                                        <input class="form-control" type="file" id="customFile1" name="image"
                                             />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-icon-default-fullname">Phần Trăm Giảm</label>
                                        <input type="number" class="form-control dt-full-name"
                                            id="basic-icon-default-fullname" placeholder="25%" name="percent" />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-icon-default-fullname">Số Lượng</label>
                                        <input type="number" class="form-control dt-full-name"
                                            id="basic-icon-default-fullname" placeholder="10" name="quantity" />
                                    </div>
                                    <!-- <div class="mb-1">
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
                                    </div> -->
<!--                                                                         
                                    <div class="mb-1">
                                        <label class="form-label" for="user-role">User Role</label>
                                        <select id="user-role" class="select2 form-select">
                                            <option value="subscriber">Subscriber</option>
                                            <option value="editor">Editor</option>
                                            <option value="maintainer">Maintainer</option>
                                            <option value="author">Author</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>  -->

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
    $(function() {
    $('.code1').keyup(function() {
        this.value = this.value.toLocaleUpperCase();
    });
});
    $(function () {
    var e = $("#DataTables_Table_User");
    var t = $(".new-user-modal"),
        a = $(".add-new-user"),
        s = $(".select2"),
        n = $(".dt-contact"),
        o = "{{ route('user.list') }}",
        r = "app-user-view-account.html";
        var  table =   e.DataTable({
                "ajax" : {
                        "url" : "{{ route('discount.list.api') }}",
                        "type" : "GET",
                        "dataSrc": ""
                        },
                columns: [
                    // { data: "" }, 
                  
                    { data: "code_discount"  },
                    // { data: "email" },
                    { data: "image" }, 
                    { data: "percent" },
                    { data: "quantity" },
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
                            var n = a.code_discount;
                            if (n) {
                                return  ('<span class="fw-bolder">'+ n +'</span>')
                            }
                        },
                    },
                    {
                        targets: 1,
                        render: function (e, t, a, s) {
                            var n = a.image;
                            if (n) {
                                return  ('<img src="/storage/'+n+'" class="me-75" height="60" width="60" alt="discount_avt"/>')
                            }
                        },
                    },
                    // {
                    //     targets: 3,
                    //     render: function (e, t, a, s) {
                    //         var n = a.quantity;
                    //         if (n) {
                    //             return  ('<span class="badge rounded-pill badge-light-success" text-capitalized>'+ n +'</span>')
                    //         }
                    //     },
                    // },
                    {
                        targets: 2,
                        render: function (e, t, a, s) {
                            var n = a.percent;
                            if (n) {
                                return  ('<span class="badge rounded-pill badge-light-success" text-capitalized>'+n+'%</span>')
                            }
                        },
                    },
                    {
                        targets: 4,
                        title: "Actions",
                        orderable: !1,
                        render: function (e, t, a, s) {
                            var test = a.id
                            return (
                                '<div class="btn-group"><a class="btn btn-sm dropdown-toggle hide-arrow" data-bs-toggle="dropdown">' +
                                feather.icons["more-vertical"].toSvg({
                                    class: "font-small-4",
                                }) +
                                '</a><div class="dropdown-menu dropdown-menu-end"><a href="#" id="deleteUser" data-id="'+a.id+'" class="dropdown-item delete-record">' +
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
                            }) + "Export",
                        buttons: [
                            {
                                extend: "print",
                                text:
                                    feather.icons.printer.toSvg({
                                        class: "font-small-4 me-50",
                                    }) + "Print",
                                className: "dropdown-item",
                           exportOptions: { columns: [0, 2, 3 ] },
                            },
                            {
                                extend: "csv",
                                text:
                                    feather.icons["file-text"].toSvg({
                                        class: "font-small-4 me-50",
                                    }) + "Csv",
                                className: "dropdown-item",
                            exportOptions: { columns: [0, 2, 3 ] },
                            },
                            {
                                extend: "excel",
                                text:
                                    feather.icons.file.toSvg({
                                        class: "font-small-4 me-50",
                                    }) + "Excel",
                                className: "dropdown-item",
                               exportOptions: { columns: [0, 2, 3 ] },
                            },
                            {
                                extend: "pdf",
                                text:
                                    feather.icons.clipboard.toSvg({
                                        class: "font-small-4 me-50",
                                    }) + "Pdf",
                                className: "dropdown-item",
                             exportOptions: { columns: [0, 2, 3 ] },
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
                        text: "Thêm Mới Mã Giảm Giá",
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
                // responsive: {
                //     details: {
                //         display: $.fn.dataTable.Responsive.display.modal({
                //             header: function (e) {
                //                 return "Details of " + e.data().full_name;
                //             },
                //         }),
                //         type: "column",
                //         renderer: function (e, t, a) {
                //             var s = $.map(a, function (e, t) {
                //                 return 6 !== e.columnIndex
                //                     ? '<tr data-dt-row="' +
                //                           e.rowIdx +
                //                           '" data-dt-column="' +
                //                           e.columnIndex +
                //                           '"><td>' +
                //                           e.title +
                //                           ":</td> <td>" +
                //                           e.data +
                //                           "</td></tr>"
                //                     : "";
                //             }).join("");
                //             return (
                //                 !!s &&
                //                 $('<table class="table"/>').append(
                //                     "<tbody>" + s + "</tbody>"
                //                 )
                //             );
                //         },
                //     },
                // },
                // language: { paginate: { previous: "&nbsp;", next: "&nbsp;" } },
                // initComplete: function () {
                //     this.api()
                //         .columns(3)
                //         .every(function () {
                //             var e = this,
                //                 t =
                //                     ($(
                //                         '<label class="form-label" for="UserRole">Chức vụ</label>'
                //                     ).appendTo(".user_role"),
                //                     $(
                //                         '<select id="UserRole" class="form-select text-capitalize mb-md-0 mb-2"><option value=""> Lựa chọn chức vụ </option></select>'
                //                     )
                //                         .appendTo(".user_role")
                //                         .on("change", function () {
                //                             var t =
                //                                 $.fn.dataTable.util.escapeRegex(
                //                                     $(this).val()
                //                                 );
                //                             e.search(
                //                                 t ? "^" + t + "$" : "",
                //                                 !0,
                //                                 !1
                //                             ).draw();
                //                         }));
                //             e.data()
                //                 .unique()
                //                 .sort()
                //                 .each(function (e, a) {
                //                     t.append(
                //                         '<option value="' +
                //                             e +
                //                             '" class="text-capitalize">' +
                //                             e +
                //                             "</option>"
                //                     );
                //                 });
                //         }),
                //     this.api()
                //             .columns(2)
                //             .every(function () {
                //                 var e = this,
                //                     t =
                //                         ($(
                //                             '<label class="form-label" for="UserPlan">Số điện thoại</label>'
                //                         ).appendTo(".user_plan"),
                //                         $(
                //                             '<select id="UserPlan" class="form-select text-capitalize mb-md-0 mb-2"><option value=""> Lựa chọn SĐT </option></select>'
                //                         )
                //                             .appendTo(".user_plan")
                //                             .on("change", function () {
                //                                 var t =
                //                                     $.fn.dataTable.util.escapeRegex(
                //                                         $(this).val()
                //                                     );
                //                                 e.search(
                //                                     t ? "^" + t + "$" : "",
                //                                     !0,
                //                                     !1
                //                                 ).draw();
                //                             }));
                //                 e.data()
                //                     .unique()
                //                     .sort()
                //                     .each(function (e, a) {
                //                         t.append(
                //                             '<option value="' +
                //                                 e +
                //                                 '" class="text-capitalize">' +
                //                                 e +
                //                                 "</option>"
                //                         );
                //                     });
                //             }),
                //     this.api()
                //             .columns(1)
                //             .every(function () {
                //                 var e = this,
                //                     t =
                //                         ($(
                //                             '<label class="form-label" for="FilterTransaction">Giới Tính</label>'
                //                         ).appendTo(".user_status"),
                //                         $(
                //                             '<select id="FilterTransaction" class="form-select text-capitalize mb-md-0 mb-2xx"><option value=""> Lựa chọn giới tính </option></select>'
                //                         )
                //                             .appendTo(".user_status")
                //                             .on("change", function () {
                //                                 var t = $.fn.dataTable.util.escapeRegex(
                //                                             $(this).val()
                //                                         );
                //                                 e.search(
                //                                     t ? "^" + t + "$" : "",
                //                                     !0,
                //                                     !1
                //                                 ).draw();
                //                             }));
                //                 e.data()
                //                     .unique()
                //                     .sort()
                //                     .each(function (e, a) {
                //                         t.append(
                //                             '<option value="' +
                //                                 //  l[e].title +
                //                                 e  +
                //                                 '" class="text-capitalize">' +
                //                                 // l[e].title +
                //                                  (e==1 ? "Nam" : "Nữ") +
                //                                 "</option>"
                //                         );
                //                     });
                //             });
                // },
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
                    "discount_code": { required: !0 },
                    "image": { required: !0 },
                    "percent": { required: !0 , min: 1 },
                    "quantity": { required: !0,min:1 },
                },
            }),
            a.on("submit", function (e) {
                var s = a.valid();
                
            //    var name = $('#basic-icon-default-fullname').val()
            //     e.preventDefault(), s && t.modal("hide");
            //     console.log(name,'ewwewwe');

            }))
     

       
$('body').on('click' ,'#deleteUser' , function(){
    var user_id = $(this).data("id");
     if ( confirm("Bạn có chắc chắn muốn xóa Mã giảm giá này không ?")) {
    $.ajax({
        type:"DELETE",
        url:"{{ route('discount.list.api') }}"+"/"+user_id,
        success: function(){
            table.ajax.reload();
        },
        error:function () {
            console.log("xóa thất bại");
        }
    })
     }
});


});

</script>
@endsection