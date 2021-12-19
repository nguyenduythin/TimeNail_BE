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
                                    <th>Ngày Đặt</th>
                                    <th>Giờ Đặt</th>
                                    <th>Tổng Hóa Đơn</th>
                                    <th>Số Điện thoại</th>
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
                <form id="detailBillForm" method="POST" class="row gy-1 pt-75" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" hidden>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="">Tên Khách Hàng</label>
                        <input disabled type="text" name="full_name" class="form-control" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="">Tổng Tiền</label>
                        <input disabled type="text" name="total_bill" class="form-control" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="">Ngày Đặt</label>
                        <input disabled type="text" name="date_work" class="form-control flatpickr-basic flatpickr-input active">
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="">Giờ Đặt</label>
                        <input disabled type="text" name="time_work" class="form-control flatpickr-time text-start flatpickr-input active">
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="">Trạng Thái</label>
                        <input disabled type="text" name="status_bill" class="form-control" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="">Số điện thoại</label>
                        <input disabled type="text" name="phone" class="form-control" />
                    </div>
                    <div class="col-12">
                        <h4 class="mt-2 pt-50">Khách 1</h4>
                        <label class="form-label">Dịch Vụ</label>
                        <select disabled class="select2 form-select select2-hidden-accessible" multiple="" id="default-select-multi11" data-select2-id="default-select-multi2">
                        </select>
                        <label class="form-label">Combo</label>
                        <select disabled class="select2 form-select select2-hidden-accessible" multiple="" id="default-select-multi12" data-select2-id="default-select-multi2">
                        </select>
                        <label class="form-label" for="">Nhân Viên Phục Vụ</label>
                        <select disabled class="select form-select" id="staff_detail_1">
                        </select>
                    </div>
                    <div class="col-12" id="guest2">
                        <h4 class="mt-2 pt-50">Khách 2</h4>
                        <label class="form-label">Dịch Vụ</label>
                        <select disabled class="select2 form-select select2-hidden-accessible" multiple="" id="default-select-multi13" data-select2-id="default-select-multi2">
                        </select>
                        <label class="form-label">Combo</label>
                        <select disabled class="select2 form-select select2-hidden-accessible" multiple="" id="default-select-multi14" data-select2-id="default-select-multi2">
                        </select>
                        <label class="form-label" for="">Nhân Viên Phục Vụ</label>
                        <select disabled class="select form-select" id="staff_detail_2">
                        </select>
                    </div>
                    <div class="col-12" id="guest3">
                        <h4 class="mt-2 pt-50">Khách 3</h4>
                        <label class="form-label">Dịch Vụ</label>
                        <select disabled class="select2 form-select select2-hidden-accessible" multiple="" id="default-select-multi15" data-select2-id="default-select-multi2">
                        </select>
                        <label class="form-label">Combo</label>
                        <select disabled class="select2 form-select select2-hidden-accessible" multiple="" id="default-select-multi16" data-select2-id="default-select-multi2">
                        </select>
                        <label class="form-label" for="">Nhân Viên Phục Vụ</label>
                        <select disabled class="select form-select" id="staff_detail_3">
                        </select>
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
                    <h1 class="mb-1">Cập nhật mới hóa đơn</h1>
                    <p>Cập nhập chi tiết hóa đơn mới !</p>
                </div>
                <form id="editBillForm" action="{{route('bill.update.api')}}" method="POST" class="row gy-1 pt-75" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" hidden>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="">Ngày Đặt</label>
                        <input type="text" name="date_work" class="form-control flatpickr-basic flatpickr-input active">
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="">Giờ Đặt</label>
                        <input type="text" name="time_work" class="form-control flatpickr-time text-start flatpickr-input active">
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="">Trạng Thái</label>
                        <select class="select form-select" name="status_bill" id="select2-basic">
                            <option id="1" value="1">Chờ xác nhận</option>
                            <option id="2" value="2">Xác nhận thành công</option>
                            {{-- <option id="3" value="3">Đang làm</option> --}}
                            <option id="4" value="4">Hoàn thành</option>
                            <option id="5" value="5">Hủy</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="phone">Số điện thoại</label>
                        <input type="text" name="phone" class="form-control active" minlength="10" maxlength="10" required />
                    </div>
                    <div class="col-12">
                        <h4 class="mt-2 pt-50">Khách 1</h4>
                        <input type="hidden" name="member_1" value="1">
                        <label class="form-label">Dịch Vụ</label>
                        <select name="service_id1[]" class="select2 form-select select2-hidden-accessible" multiple="" id="default-select-multi1" data-select2-id="default-select-multi2">
                        </select>
                        <label class="form-label">Combo</label>
                        <select name="combo_id1[]" class="select2 form-select select2-hidden-accessible" multiple="" id="default-select-multi2" data-select2-id="default-select-multi2">
                        </select>
                        <label class="form-label" for="">Nhân Viên Phục Vụ</label>
                        <select class="select form-select" name="staff_1" id="staff_edit_1">
                        </select>
                    </div>
                    <div class="col-12">
                        <h4 class="mt-2 pt-50">Khách 2</h4>
                        <input type="hidden" name="member_2" value="2">
                        <label class="form-label">Dịch Vụ</label>
                        <select name="service_id2[]" class="select2 form-select select2-hidden-accessible" multiple="" id="default-select-multi3" data-select2-id="default-select-multi2">
                        </select>
                        <label class="form-label">Combo</label>
                        <select name="combo_id2[]" class="select2 form-select select2-hidden-accessible" multiple="" id="default-select-multi4" data-select2-id="default-select-multi2">
                        </select>
                        <label class="form-label" for="">Nhân Viên Phục Vụ</label>
                        <select class="select form-select" name="staff_2" id="staff_edit_2">
                        </select>
                    </div>
                    <div class="col-12">
                        <h4 class="mt-2 pt-50">Khách 3</h4>
                        <input type="hidden" name="member_3" value="3">
                        <label class="form-label">Dịch Vụ</label>
                        <select name="service_id3[]" class="select2 form-select select2-hidden-accessible" multiple="" id="default-select-multi5" data-select2-id="default-select-multi2">
                        </select>
                        <label class="form-label">Combo</label>
                        <select name="combo_id3[]" class="select2 form-select select2-hidden-accessible" multiple="" id="default-select-multi6" data-select2-id="default-select-multi2">
                        </select>
                        <label class="form-label" for="">Nhân Viên Phục Vụ</label>
                        <select class="select form-select" name="staff_3" id="staff_edit_3">
                        </select>
                    </div>
                    <div class="col-12 ">
                        <label class="form-label" for="modalEditUserCountry">Ghi Chú Hóa Đơn</label>
                        <textarea class="form-control" name="note_bill" id="note_bill" cols="30" rows="4"></textarea>
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
                    data: "date_work"
                },
                {
                    data: "time_work"
                },
                {
                    data: "total_bill"
                },
                {
                    data: "phone"
                },
                {
                    data: "status_bill"
                },
            ],
            columnDefs: [{
                    "width": "12%",
                    "targets": 6
                },
                {
                    targets: 0,
                    responsivePriority: 2,
                    render: function(e, t, a, s) {
                        var n = a.user.full_name,
                            l = a.user.email,
                            i = a.user.avatar;

                        if (i) {
                            if (i.includes('https')) {
                                var c = `<img src="${i}" alt="Avatar" height="32" width="32">`;
                            } else {
                                var c = `<img src="/storage/${i}" alt="Avatar" height="32" width="32">`;
                            }
                        } else {
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
            var id = $(this).data("id");
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
            }).then(function(t) {
                if (t.value) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('bill.list.api')  }}" + "/" + id,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function() {
                            table.ajax.reload();
                            toastr.success("Xóa Thành Công");
                        },
                        error: function() {
                            toastr.error("Xóa không Thành Công");
                        }
                    })
                }
            });

        });
        $.get('<?= route("service.list.api") ?>', function(data) {
            data.service.map(function(x) {
                var newOption = new Option(x.name_service, x.id, false, false);
                $('#default-select-multi11').append(newOption).trigger('change');
            })
            data.service.map(function(x) {
                var newOption = new Option(x.name_service, x.id, false, false);
                $('#default-select-multi13').append(newOption).trigger('change');
            })
            data.service.map(function(x) {
                var newOption = new Option(x.name_service, x.id, false, false);
                $('#default-select-multi15').append(newOption).trigger('change');
            })
        })
        $.get('<?= route("combo.list.api") ?>', function(data) {
            data.map(function(x) {
                var newOption = new Option(x.name_combo, x.id, false, false);
                $('#default-select-multi12').append(newOption).trigger('change');
            })
            data.map(function(x) {
                var newOption = new Option(x.name_combo, x.id, false, false);
                $('#default-select-multi14').append(newOption).trigger('change');
            })
            data.map(function(x) {
                var newOption = new Option(x.name_combo, x.id, false, false);
                $('#default-select-multi16').append(newOption).trigger('change');
            })
        })
        $.get('<?= route("staff.list.api") ?>', function(data) {
            data.user.map(function(x) {
                $('#staff_detail_1').append(
                    '<option id="' + x.id + '" value="' + x.id + '">' + x.full_name + '</option>'
                );
            })
            data.user.map(function(x) {
                $('#staff_detail_2').append(
                    '<option id="' + x.id + '" value="' + x.id + '">' + x.full_name + '</option>'
                );
            })
            data.user.map(function(x) {
                $('#staff_detail_3').append(
                    '<option id="' + x.id + '" value="' + x.id + '">' + x.full_name + '</option>'
                );
            })
        })
        //detail
        $('body').on('click', '#detailUser', function() {
            $('#detailBillForm')[0].reset();
            var user_id = $(this).data("id");
            $.get('<?= route("bill.list.api") ?>' + "/show/" + user_id, function(data) {
                var combo1 = [];
                var service1 = [];
                var combo2 = [];
                var service2 = [];
                var combo3 = [];
                var service3 = [];
                data.combo.map((x) => {
                    if(data.nguoi1.combo != null){
                        data.nguoi1.combo.map((y) => {
                            if (y.id === x.id) {
                                combo1.push(y.id);
                            }
                        })
                    }
                })
                data.service.map((x) => {
                    if(data.nguoi1.service != null){
                        data.nguoi1.service.map((y) => {
                            if (y.id === x.id) {
                                service1.push(y.id);
                            }
                        })
                    }
                })
                if (data.nguoi2 != null) {
                    if(data.nguoi2.combo != null){
                        data.combo.map((x) => {
                            data.nguoi2.combo.map((y) => {
                                if (y.id === x.id) {
                                    combo2.push(y.id);
                                }
                            })
                        })
                    }
                    if(data.nguoi2.service != null){
                        data.service.map((x) => {
                            data.nguoi2.service.map((y) => {
                                if (y.id === x.id) {
                                    service2.push(y.id);
                                }
                            })
                        })
                    }
                }
                if (data.nguoi3 != null) {
                    if(data.nguoi3.combo != null){
                        data.combo.map((x) => {
                            data.nguoi3.combo.map((y) => {
                                if (y.id === x.id) {
                                    combo3.push(y.id);
                                }
                            })
                        })
                    }
                    if(data.nguoi3.service != null){
                        data.service.map((x) => {
                            data.nguoi3.service.map((y) => {
                                if (y.id === x.id) {
                                    service3.push(y.id);
                                }
                            })
                        })
                    }
                }
                $("#default-select-multi11").val(service1).trigger('change');
                $("#default-select-multi12").val(combo1).trigger('change');
                $("#staff_detail_1").find("#" + data.nguoi1.staff.id, "option").prop('selected', true);
                $("#default-select-multi13").val(service2).trigger('change');
                $("#default-select-multi14").val(combo2).trigger('change');
                console.log(data);
                if (!data.nguoi2) {
                     $('#guest2').prop('hidden',true);
                }else{
                    $('#guest2').prop('hidden',false);
                    $("#staff_detail_2").find("#" + data.nguoi2.staff.id, "option").prop('selected', true);
                }
                $("#default-select-multi15").val(service3).trigger('change');
                $("#default-select-multi16").val(combo3).trigger('change');
                if (!data.nguoi3) {
                    $('#guest3').prop('hidden',true);
                }else{
                    $('#guest3').prop('hidden',false);
                    $("#staff_detail_3").find("#" + data.nguoi3.staff.id, "option").prop('selected', true);
                }
                var form = $('#detailBillForm');
                form.find('input[name="full_name"]').val(data.bill.user.full_name);
                form.find('input[name="date_work"]').val(data.bill.date_work);
                form.find('input[name="time_work"]').val(data.bill.time_work);
                form.find('input[name="phone"]').val(data.bill.phone);
                form.find('input[name="total_bill"]').val(data.bill.total_bill.toLocaleString() + '₫');
                if (data.bill.status_bill == 1) {
                    form.find('input[name="status_bill"]').val('Chờ xác nhận');
                }
                if (data.bill.status_bill == 2) {
                    form.find('input[name="status_bill"]').val('Xác nhận thành công');
                }
                if (data.bill.status_bill == 3) {
                    form.find('input[name="status_bill"]').val('Đang làm');
                }
                if (data.bill.status_bill == 4) {
                    form.find('input[name="status_bill"]').val('Hoàn thành');
                }
                if (data.bill.status_bill == 5) {
                    form.find('input[name="status_bill"]').val('Hủy');
                }
                form.find('#note_bill').val(data.bill.note_bill);
            }, 'json')
        });
        $.get('<?= route("service.list.api") ?>', function(data) {
            data.service.map(function(x) {
                var newOption = new Option(x.name_service, x.id, false, false);
                $('#default-select-multi1').append(newOption).trigger('change');
            })
            data.service.map(function(x) {
                var newOption = new Option(x.name_service, x.id, false, false);
                $('#default-select-multi3').append(newOption).trigger('change');
            })
            data.service.map(function(x) {
                var newOption = new Option(x.name_service, x.id, false, false);
                $('#default-select-multi5').append(newOption).trigger('change');
            })
        })
        $.get('<?= route("combo.list.api") ?>', function(data) {
            data.map(function(x) {
                var newOption = new Option(x.name_combo, x.id, false, false);
                $('#default-select-multi2').append(newOption).trigger('change');
            })
            data.map(function(x) {
                var newOption = new Option(x.name_combo, x.id, false, false);
                $('#default-select-multi4').append(newOption).trigger('change');
            })
            data.map(function(x) {
                var newOption = new Option(x.name_combo, x.id, false, false);
                $('#default-select-multi6').append(newOption).trigger('change');
            })
        })
        $.get('<?= route("staff.list.api") ?>', function(data) {
            data.user.map(function(x) {
                $('#staff_edit_1').append(
                    '<option id="' + x.id + '" value="' + x.id + '">' + x.full_name + '</option>'
                );
            })
            data.user.map(function(x) {
                $('#staff_edit_2').append(
                    '<option id="' + x.id + '" value="' + x.id + '">' + x.full_name + '</option>'
                );
            })
            data.user.map(function(x) {
                $('#staff_edit_3').append(
                    '<option id="' + x.id + '" value="' + x.id + '">' + x.full_name + '</option>'
                );
            })
        })
        // get detail edit
        $('body').on('click', '#editUser', function() {
            $('#editBillForm')[0].reset();
            var user_id = $(this).data("id");
            $.get('<?= route("bill.list.api") ?>' + "/show/" + user_id, function(data) {console.log(data)
                var combo1 = [];
                var service1 = [];
                var combo2 = [];
                var service2 = [];
                var combo3 = [];
                var service3 = [];
                data.combo.map((x) => {
                    if(data.nguoi1.combo != null){
                        data.nguoi1.combo.map((y) => {
                            if (y.id === x.id) {
                                combo1.push(y.id);
                            }
                        })
                    }
                })
                data.service.map((x) => {
                    if(data.nguoi1.service != null){
                        data.nguoi1.service.map((y) => {
                            if (y.id === x.id) {
                                service1.push(y.id);
                            }
                        })
                    }
                })
                if (data.nguoi2 != null) {
                    if(data.nguoi2.combo != null){
                        data.combo.map((x) => {
                            data.nguoi2.combo.map((y) => {
                                if (y.id === x.id) {
                                    combo2.push(y.id);
                                }
                            })
                        })
                    }
                    if(data.nguoi2.service != null){
                        data.service.map((x) => {
                            data.nguoi2.service.map((y) => {
                                if (y.id === x.id) {
                                    service2.push(y.id);
                                }
                            })
                        })
                    }
                }
                if (data.nguoi3 != null) {
                    if(data.nguoi3.combo != null){
                        data.combo.map((x) => {
                            data.nguoi3.combo.map((y) => {
                                if (y.id === x.id) {
                                    combo3.push(y.id);
                                }
                            })
                        })
                    }
                    if(data.nguoi3.service != null){
                        data.service.map((x) => {
                            data.nguoi3.service.map((y) => {
                                if (y.id === x.id) {
                                    service3.push(y.id);
                                }
                            })
                        })
                    }
                }
                $("#default-select-multi1").val(service1).trigger('change');
                $("#default-select-multi2").val(combo1).trigger('change');
                $("#staff_edit_1").find("#" + data.nguoi1.staff.id, "option").attr('selected', true);
                $("#default-select-multi3").val(service2).trigger('change');
                $("#default-select-multi4").val(combo2).trigger('change');
                if (!data.nguoi2) {

                }else{
                    $("#staff_edit_2").find("#" + data.nguoi2.staff.id, "option").attr('selected', true);
                }
                $("#default-select-multi5").val(service3).trigger('change');
                $("#default-select-multi6").val(combo3).trigger('change');
                if (!data.nguoi3) {

                }else{
                    $("#staff_edit_3").find("#" + data.nguoi3.staff.id, "option").attr('selected', true);
                }

                var form = $('#editBillForm');
                $("#select2-basic").find("#" + data.bill.status_bill, "option").prop('selected', true);
                form.find('input[name="id"]').val(data.bill.id);
                form.find('input[name="date_work"]').val(data.bill.date_work);
                form.find('input[name="time_work"]').val(data.bill.time_work);
                form.find('input[name="phone"]').val(data.bill.phone);
                form.find('#note_bill').val(data.bill.note_bill);
            }, 'json')
        });
        // submit edit in db
        $('#editBillForm').on('submit', function(e) {
            e.preventDefault();
            var form = this;
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