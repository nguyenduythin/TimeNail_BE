@extends('admin.layout.main')
@section('title', 'Service')
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

                                    <th>Tên Dịch Vụ</th>
                                    <th>Giá Dịch Vụ</th>
                                    <th>Tổng Thời Gian</th>
                                    <th>Mô Tả</th>
                                    <th>Danh Mục</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>


                        </table>


                    </div>
                    <!-- Modal to add new user starts-->
                    <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
                        <div class="modal-dialog">
                            <form method="POST" action="{{route('service.add.api')}}" class="add-new-user modal-content pt-0" enctype="multipart/form-data">
                                @csrf
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">Thêm Dịch Vụ</h5>
                                </div>
                                <div class="modal-body flex-grow-1">
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-icon-default-fullname">Tên Dịch Vụ</label>
                                        <input type="text" class="form-control dt-full-name" id="basic-icon-default-fullname" placeholder="Sơn Móng Tay" name="name_service" />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-icon-default-price">Giá Dịch Vụ (₫)</label>
                                        <input type="number" data-type="currency" class="form-control dt-full-name" id="basic-icon-default-price" placeholder="100,000₫" name="price" />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-icon-default-time">Tổng Thời Gian (phút)</label>
                                        <input type="number" class="form-control dt-full-name" id="basic-icon-default-time" name="total_time_work" />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-icon-default-desc">Mô Tả</label>
                                        <textarea type="text" class="form-control dt-full-name" id="basic-icon-default-desc" rows="3" placeholder="Những dịch vụ chuyên nghiệp hứa hẹn sẽ đem lại trải nghiệm tuyệt vời cho quý khách !" name="short_description"></textarea>
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-icon-default-fullname11">Danh Mục Dịch Vụ</label>
                                        <select class="form-control dt-full-name" name="cate_service_id" id="basic-icon-default-fullname11">
                                        </select>
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

<!-- Detail service -->
<div class="modal fade show" id="detailUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1 class="mb-1">Chi tiết dịch vụ</h1>
                    <p>Chi tiết dịch vụ lẻ !</p>
                </div>
                <form id="detailUserForm" method="POST" class="row gy-1 pt-75" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" hidden>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserFirstName">Tên Dịch Vụ</label>
                        <input disabled type="text" id="modalEditUserFirstName full_name" name="name_service" class="form-control" placeholder="Sơn Móng Tay" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserFirstName">Giá Dịch Vụ (₫)</label>
                        <input disabled type="number" id="modalEditUserFirstName full_name" name="price" class="form-control" placeholder="100,000₫" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserFirstName">Tổng Thời Gian (phút)</label>
                        <input disabled type="number" id="modalEditUserFirstName full_name" name="total_time_work" class="form-control" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserFirstName">Danh Mục Dịch Vụ</label>
                        <input disabled type="text" id="modalEditUserFirstName full_name" name="cate_name_service" class="form-control" />
                    </div>
                    <div class="col-12 ">
                        <label class="form-label" for="modalEditUserCountry">Mô Tả</label>
                        <textarea disabled class="form-control" name="short_description" placeholder="Những dịch vụ chuyên nghiệp hứa hẹn sẽ đem lại trải nghiệm tuyệt vời cho quý khách !" id="address" cols="30" rows="4"></textarea>
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
                    <h1 class="mb-1">Cập nhật mới dịch vụ</h1>
                    <p>Cập nhập chi tiết dịch vụ lẻ mới !</p>
                </div>
                <form id="editUserForm" action="{{ route('service.update.api') }}" method="POST" class="row gy-1 pt-75" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" hidden>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserFirstName">Tên Dịch Vụ</label>
                        <input type="text" id="modalEditUserFirstName full_name" name="name_service" class="form-control" placeholder="Sơn Móng Tay" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserFirstName">Giá Dịch Vụ (₫)</label>
                        <input type="text" data-type="currency" id="modalEditUserFirstName full_name" name="price" class="form-control" placeholder="100,000₫" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserFirstName">Tổng Thời Gian (phút)</label>
                        <input type="text" id="modalEditUserFirstName full_name" name="total_time_work" class="form-control" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserFirstName">Danh Mục Dịch Vụ</label>
                        <select class="form-control dt-full-name" name="cate_service_id" id="basic-icon-default-fullname12">
                        </select>
                    </div>
                    <div class="col-12 ">
                        <label class="form-label" for="modalEditUserCountry">Mô Tả</label>
                        <textarea class="form-control" name="short_description" placeholder="Những dịch vụ chuyên nghiệp hứa hẹn sẽ đem lại trải nghiệm tuyệt vời cho quý khách !" id="address" cols="30" rows="4"></textarea>
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
    //liệt kê cate cho thẻ select category service
    $.get('<?= route("service.list.api") ?>', function(data) {
        data.cate.map(function(x) {
            document.getElementById('basic-icon-default-fullname11').insertAdjacentHTML('beforeend', '<option value="' + x.id + '">' + x.name_cate_service + '</option>');
        })
    })
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
                "url": "{{ route('service.list.api') }}",
                "type": "GET",
                "dataSrc": "service"
            },
            columns: [{
                    data: "name_service"
                },
                {
                    data: "price"
                },
                {
                    data: "total_time_work"
                },
                {
                    data: "short_description"
                },
                {
                    data: "cate_service_id"
                },
            ],
            columnDefs: [{
                    "width": "25%",
                    "targets": 3
                },
                {
                    targets: 0,
                    responsivePriority: 2,
                    render: function(e, t, a, s) {
                        var n = a.name_service;
                        if (n) {
                            return ('<span class="fw-bolder">' + n + '</span>')
                        }
                    },
                },
                {
                    targets: 1,
                    responsivePriority: 2,
                    render: function(e, t, a, s) {
                        var n = a.price;
                        if (n) {
                            return n.toLocaleString() + '₫';
                        }
                    },
                },
                {
                    targets: 2,
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
                    targets: 4,
                    render: function(e, t, a, s) {
                        var n = a.cate_service.name_cate_service;
                        return ('<span class="badge rounded-pill badge-light-warning" text-capitalized>' + n + '</span>')
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
                    text: "Thêm Mới Dịch Vụ",
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
        });
        var response;
        $.validator.addMethod(
            "uniqueServiceName", 
            function(value, element) {
                $.get('<?=  route("service.list.api") ?>', function(dataR) {
                    response =  dataR.service.some(e => e.name_service === value);
                        });
                return !response;
            },
            "Dịch vụ đã tồn tại!"
        );  
        a.length && (a.validate({
                errorClass: "error",
                rules: {
                    "name_service": {
                        required: !0 ,uniqueServiceName : true
                    },
                    "price": {
                        required: !0,
                        min: 1,
                        digits: true
                    },
                    "total_time_work": {
                        required: !0,
                        min: 1,
                        digits: true
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
                    async: false,

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
                }
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
                                url: "{{ route('service.list.api') }}" + "/" + user_id,

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
            var cate = null;
            $.get('<?= route("service.list.api") ?>' + "/show/" + user_id, function(data) {
                var form = $('#detailUserForm');
                form.find('input[name="id"]').val(data.id);
                form.find('input[name="name_service"]').val(data.name_service);
                form.find('input[name="price"]').val(data.price.toLocaleString() + '₫');
                form.find('input[name="total_time_work"]').val(data.total_time_work);
                form.find('input[name="cate_name_service"]').val(data.cate_service.name_cate_service);
                form.find('#address').val(data.short_description);
            }, 'json')
        });

        // list cate cho detailservice
        $.get('<?= route("service.list.api") ?>', function(data) {
            data.cate.map(function(x) {
                document.getElementById('basic-icon-default-fullname12').insertAdjacentHTML('beforeend', '<option id="' + x.id + '" value="' + x.id + '">' + x.name_cate_service + '</option>');
            })
        })

        // get detail edit và selected cate đã chọn
        $('body').on('click', '#editUser', function() {
            var user_id = $(this).data("id");
            var cate = null;
            $.get('<?= route("service.list.api") ?>' + "/show/" + user_id, function(data) {
                var form = $('#editUserForm');
                form.find('input[name="id"]').val(data.id);
                form.find('input[name="name_service"]').val(data.name_service);
                form.find('input[name="price"]').val(data.price);
                form.find('input[name="total_time_work"]').val(data.total_time_work);
                form.find('#address').val(data.short_description);
                cate = data.cate_service_id; //lấy ra id cate đã chọn
            }, 'json')
            $.get('<?= route("service.list.api") ?>', function(data) {
                data.cate.map(function(x) {
                    if (cate == x.id) { //check cate đã chọn
                        $("#basic-icon-default-fullname12").find("#" + cate).prop('selected', true);
                    }
                })
            })
        });
        // submit edit in db
        $('#editUserForm').validate({
                errorClass: "error",
                rules: {
                    "name_service": {
                        required: !0 ,
                    },
                    "price": {
                        required: !0,
                        min: 1,
                        digits: true
                    },
                    "total_time_work": {
                        required: !0,
                        min: 1,
                        digits: true
                    },
                },
            }),
        $('#editUserForm').on('submit', function(e) {
            e.preventDefault();
            var form = this;
            var s  = $('#editUserForm').valid();
            if (s) {
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
                        $('#editUserModal').modal("hide");
                        table.ajax.reload();
                        toastr.success(data.msg)
                    }
                },
                error: function(error) {
                    console.log("Sửa mới không thành công", error);
                }
            }) }
        });

    });
</script>
@endsection