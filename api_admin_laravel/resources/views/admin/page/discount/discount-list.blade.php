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
                <!-- list and filter start -->
                <div class="card">
                    <div class="card-body border-bottom">
                        <h4 class="card-title">Mã giảm giá</h4>
                    </div>
                    <div class="card-datatable table-responsive pt-0">
                        <table class="user-list-table table" id="DataTables_Table_User">
                            <thead class="table-light">
                                <tr>

                                    <th>Mã Giảm Giá</th>
                                    <th>Ảnh</th>
                                    <th>Phần Trăm</th>
                                    <th>Số Lượng</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>


                        </table>


                    </div>
                    <!-- Modal to add new user starts-->
                    <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
                        <div class="modal-dialog">
                            <form method="POST" action="{{route('discount.add.api')}}" class="add-new-user modal-content pt-0" enctype="multipart/form-data">
                                @csrf
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">Thêm Mã giảm giá</h5>
                                </div>
                                <div class="modal-body flex-grow-1">
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-icon-default-fullname">Mã Giảm Giá</label>
                                        <input type="text" class="form-control dt-full-name code1" id="basic-icon-default-fullname" placeholder="MKX34OP" name="code_discount" />
                                    </div>
                                    <div class="mb-1">
                                        <label for="customFile1" class="form-label">Ảnh Chương Trình</label>
                                        <input class="form-control" type="file" id="customFile1" name="image" accept="image/*" />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-icon-default-fullname">Phần Trăm Giảm</label>
                                        <input type="number" class="form-control dt-full-name" id="basic-icon-default-fullname" placeholder="25%" name="percent" />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-icon-default-fullname">Số Lượng</label>
                                        <input type="number" class="form-control dt-full-name" id="basic-icon-default-fullname" placeholder="10" name="quantity" />
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
@endsection
@section('script')
<script>
    $(function() {
        $('.code1').keyup(function() {
            this.value = this.value.toLocaleUpperCase();
        });
    });
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
                "url": "{{ route('discount.list.api') }}",
                "type": "GET",
                "dataSrc": ""
            },
            columns: [
                // { data: "" }, 

                {
                    data: "code_discount"
                },
                // { data: "email" },
                {
                    data: "image"
                },
                {
                    data: "percent"
                },
                {
                    data: "quantity"
                },
            ],
            columnDefs: [{
                    targets: 0,
                    responsivePriority: 2,
                    render: function(e, t, a, s) {
                        var n = a.code_discount;
                        if (n) {
                            return ('<span class="fw-bolder">' + n + '</span>')
                        }
                    },
                },
                {
                    targets: 1,
                    render: function(e, t, a, s) {
                        var n = a.image;
                        if (n) {
                            return ('<img src="/storage/' + n + '" class="me-75" height="60" width="60" alt="discount_avt"/>')
                        }
                    },
                },
                {
                    targets: 2,
                    render: function(e, t, a, s) {
                        var n = a.percent;
                        if (n) {
                            return ('<span class="badge rounded-pill badge-light-success" text-capitalized>' + n + '%</span>')
                        }
                    },
                },
                {
                    targets: 4,
                    title: "Actions",
                    orderable: !1,
                    render: function(e, t, a, s) {
                        var test = a.id
                        return (
                            '<div class="btn-group"><a class="btn btn-sm dropdown-toggle hide-arrow" data-bs-toggle="dropdown">' +
                            feather.icons["more-vertical"].toSvg({
                                class: "font-small-4",
                            }) +
                            '</a><div class="dropdown-menu dropdown-menu-end"><a href="#" id="deleteUser" data-id="' + a.id + '" class="dropdown-item delete-record">' +
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
            language: { paginate: { previous: "&nbsp;", next: "&nbsp;" } },
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
                                columns: [0, 2, 3]
                            },
                        },
                        {
                            extend: "csv",
                            text: feather.icons["file-text"].toSvg({
                                class: "font-small-4 me-50",
                            }) + "Csv",
                            className: "dropdown-item",
                            exportOptions: {
                                columns: [0, 2, 3]
                            },
                        },
                        {
                            extend: "excel",
                            text: feather.icons.file.toSvg({
                                class: "font-small-4 me-50",
                            }) + "Excel",
                            className: "dropdown-item",
                            exportOptions: {
                                columns: [0, 2, 3]
                            },
                        },
                        {
                            extend: "pdf",
                            text: feather.icons.clipboard.toSvg({
                                class: "font-small-4 me-50",
                            }) + "Pdf",
                            className: "dropdown-item",
                            exportOptions: {
                                columns: [0, 2, 3]
                            },
                        },
                        {
                            extend: "copy",
                            text: feather.icons.copy.toSvg({
                                class: "font-small-4 me-50",
                            }) + "Copy",
                            className: "dropdown-item",
                            exportOptions: {
                                columns: [0, 1, 2, 3]
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
                    text: "Thêm Mới Mã Giảm Giá",
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
        var response;
        $.validator.addMethod(
            "uniqueDiscountName", 
            function(value, element) {
                $.get('<?=  route("discount.list.api") ?>', function(dataR) {
                    response =  dataR.some(e => e.code_discount === value);
                        });
                return !response;
            },
            "Mã đã tồn tại!"
        );  
        a.length &&
            (a.validate({
                    errorClass: "error",
                    rules: {
                        "code_discount": {
                            required: !0,uniqueDiscountName : true
                        },
                        "image": {
                            required: !0
                        },
                        "percent": {
                            required: !0,
                            min: 1,
                            max: 100
                        },
                        "quantity": {
                            required: !0,
                            min: 1
                        },
                    },
                }),
                a.on("submit", function(e) {
                    e.preventDefault();
                    var s = a.valid();
                    var form = this;
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
                                $(form)[0].reset();
                                t.modal("hide");
                                table.ajax.reload();
                                toastr.success(data.msg)
                            }
                        },
                        error: function(error) {
                            console.log("Thêm không thành công", error);
                        }
                    })}
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
                                url: "{{ route('discount.list.api') }}" + "/" + user_id,
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


    });
</script>
@endsection