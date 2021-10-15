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
                
                <!-- list and filter start -->
                <div class="card">
                    <!-- lọc đã xóa -->
                    <div class="card-body border-bottom">
                        <h4 class="card-title">Liên Hệ</h4>
                    </div>
                    <div class="card-datatable table-responsive pt-0">
                        <table class="user-list-table table" id="DataTables_Table_User">
                            <thead class="table-light">
                                <tr>

                                    <th>Họ & Tên</th>
                                    <th>Tin Nhắn</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                    

                        </table>


                    </div>
                    <!-- Modal to add new user starts-->
                    
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
                    //target đoạn này đang có lỗi khiến nó không nhận css của class
                    // {
                    //     // targets: 1,
                    //     render: function (e, t, a, s) {
                    //         var n = a.message;
                    //         if (n) {
                    //             return  ('<span class="badge rounded-pill badge-light-warning" text-capitalized>'+ n +'</span>')
                    //         }
                    //     },
                    // },
                    
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
                                '</a><div class="dropdown-menu dropdown-menu-end"><a href="#" id="deleteUser" data-id="'+a.id+'" class="dropdown-item delete-record">' +
                                feather.icons["trash-2"].toSvg({
                                    class: "font-small-4 me-50",
                                }) +
                                "Delete</a></div></div>"
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
                                    }) + "Print", //nên để tên thao tác full in hoa nhìn đẹp hơn
                                className: "dropdown-item",
                           exportOptions: { columns: [0,1 ] },
                            },
                            {
                                extend: "csv",
                                text:
                                    feather.icons["file-text"].toSvg({
                                        class: "font-small-4 me-50",
                                    }) + "Csv",
                                className: "dropdown-item",
                            exportOptions: { columns: [0,1 ] },
                            },
                            {
                                extend: "excel",
                                text:
                                    feather.icons.file.toSvg({
                                        class: "font-small-4 me-50",
                                    }) + "Excel",
                                className: "dropdown-item",
                               exportOptions: { columns: [0,1 ] },
                            },
                            {
                                extend: "pdf",
                                text:
                                    feather.icons.clipboard.toSvg({
                                        class: "font-small-4 me-50",
                                    }) + "Pdf",
                                className: "dropdown-item",
                             exportOptions: { columns: [0,1 ] },
                            },
                            {
                                extend: "copy",
                                text:
                                    feather.icons.copy.toSvg({
                                        class: "font-small-4 me-50",
                                    }) + "Copy", 
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
    var contact_id = $(this).data("id");
     if ( confirm("Bạn có chắc chắn muốn xóa Nội dung này không ?")) {
    $.ajax({
        type:"DELETE",
        url:"{{ route('contact.list.api') }}"+"/"+contact_id,
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