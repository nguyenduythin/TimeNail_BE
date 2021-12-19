@extends('admin.layout.main')
@section('title', 'Blog category')
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">

            <!-- users list start -->
            <section class="app-tag-list">
                
                <div class="card">
                    <div class="card-datatable table-responsive pt-0">
                        <table class="blog_category-list-table table" id="DataTables_Table_Blog_category">
                            <thead class="table-light">
                                <tr>

                                    <th>Danh mục bài viết</th>
                                    <th>Ảnh</th>
                                    <th>Ghi chú</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- Modal to add new user starts-->
                    <div class="modal modal-slide-in new-blog_category-modal fade" id="modals-slide-in">
                        <div class="modal-dialog">
                            <form method="POST" action="{{ route('blog.category.add.api') }}"
                                class="add-new-blog_category modal-content pt-0" enctype="multipart/form-data">
                                @csrf
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">Thêm danh mục bài viết</h5>
                                </div>
                                <div class="modal-body flex-grow-1">
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-icon-default-name_cate_blog">Tên nhãn</label>
                                        <input type="text" class="form-control dt-name-cate-blog"
                                            id="basic-icon-default-name_cate_blog" placeholder="name category blog" name="name_cate_blog" />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="basic-icon-default-contact">Ghi chú</label>
                                        <input type="text" id="basic-icon-default-contact" class="form-control "
                                            placeholder="note" name="note" />
                                    </div>
                                    <div class="mb-1">
                                        <label for="customFile1" class="form-label">Ảnh</label>
                                        <input class="form-control" type="file" id="customFile1" name="image" />
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
<div class="modal fade show" id="editBlogCateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-blogCate">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1 class="mb-1">Cập nhật mới nhãn</h1>
                    <p>Cập nhập chi tiết nhãn !</p>
                </div>
                <form id="editBlogCateForm" action="{{ route('blog.category.update.api') }}" method="POST" class="row gy-1 pt-75"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" hidden>
                    <div class="d-flex center">
                        <a href="#" class="me-25">
                            <img src="" id="blogCate-upload-img" class="uploadedImage rounded me-50" alt="profile image"
                                height="250" width="400" name="image" />
                        </a>
                        <!-- upload and reset button -->
                        <div class="d-flex align-items-end mt-75 ms-1">
                            <div>
                                <label for="blogCate-upload" class="btn btn-sm btn-primary mb-75 me-75">Ảnh</label>
                                <input type="file" id="blogCate-upload" name="image"  hidden accept="image/*" />
                                <button type="button" id="blogCate-reset"
                                    class="btn btn-sm btn-outline-secondary mb-75">Reset</button>
                                <p class="mb-0">Loại tệp được phép: png, jpg, jpeg.</p>
                            </div>
                        </div>
                        <!--/ upload and reset button -->
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditBlogCate">Tên nhãn</label>
                        <input type="text" id="modalEditBlogCate name_cate_blog" name="name_cate_blog" class="form-control"
                            placeholder="name blog category" data-msg="Please enter your name_cate_blog" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditTagNote">Ghi chú</label>
                        <input type="text" id="modalEditTagNote note" name="note" class="form-control"
                            placeholder="note" data-msg="Please enter your note" />
                    </div>
                    <div class="col-12 text-center mt-2 pt-50">
                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                            aria-label="Close">
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
    $(function () {

    var e = $("#DataTables_Table_Blog_category");
    var t = $(".new-blog_category-modal"),
        a = $(".add-new-blog_category"),
        s = $(".select2"),
        n = $(".dt-contact"),
        o = "{{ route('category-blog.list') }}",
        r = "app-user-view-account.html";
        var  table =   e.DataTable({
                "ajax" : {
                        "url" : "{{ route('blog.category.list.api') }}",
                        "type" : "GET",
                        "dataSrc": ""
                        },
                columns: [
                    { data: "name_cate_blog"  },
                    { data: "image" }, 
                    { data: "note" },
                ],
                columnDefs: [
                    {
                        targets: 0,
                        responsivePriority: 2,
                        render: function (e, t, a, s) {
                            var n = a.name_cate_blog;
                            return (
                                '<div class="d-flex justify-content-left align-items-center"><div class="d-flex flex-column"><a href="' +
                                r +
                                '" class="user_name text-truncate text-body"><span class="fw-bolder">' +
                                n +
                                '</span></div></div>'
                            );
                        },
                    },
                    {
                        targets: 1,
                        render: function (e, t, a, s) {
                            var i = a.image;
                                
                            if (i)
                                var c =
                                    '<div><img src="/storage/'+
                                    i +
                                    '" alt="Avatar" height="50" width="50"></div>';
                            
                                return c ;
                        },
                    },
                    {
                        targets: 3,
                        title: "Actions",
                        orderable: !1,
                        render: function (e, t, a, s) {
                            return (
                                '<div class="btn-group"><a class="btn btn-sm dropdown-toggle hide-arrow" data-bs-toggle="dropdown">' +
                                feather.icons["more-vertical"].toSvg({
                                    class: "font-small-4",
                                }) +
                                '</a><div class="dropdown-menu dropdown-menu-end"><a href="#" id="editBlogCate" data-id="'+a.id+'"  data-bs-toggle="modal" data-bs-target="#editBlogCateModal" class="dropdown-item">' +
                                feather.icons["edit"].toSvg({
                                    class: "font-small-4 me-50",
                                }) +
                                'Edit</a><a href="#" id="deleteBlogCate" data-id="'+a.id+'" class="dropdown-item delete-record">' +
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
                           exportOptions: { columns: [0,1, 2, 3,4 ] },
                            },
                            {
                                extend: "csv",
                                text:
                                    feather.icons["file-text"].toSvg({
                                        class: "font-small-4 me-50",
                                    }) + "Csv",
                                className: "dropdown-item",
                            exportOptions: { columns: [0,1, 2, 3,4 ] },
                            },
                            {
                                extend: "excel",
                                text:
                                    feather.icons.file.toSvg({
                                        class: "font-small-4 me-50",
                                    }) + "Excel",
                                className: "dropdown-item",
                               exportOptions: { columns: [0,1, 2, 3,4 ] },
                            },
                            {
                                extend: "pdf",
                                text:
                                    feather.icons.clipboard.toSvg({
                                        class: "font-small-4 me-50",
                                    }) + "Pdf",
                                className: "dropdown-item",
                             exportOptions: { columns: [0,1, 2, 3,4 ] },
                            },
                            {
                                extend: "copy",
                                text:
                                    feather.icons.copy.toSvg({
                                        class: "font-small-4 me-50",
                                    }) + "Copy",
                                className: "dropdown-item",
                                exportOptions: { columns: [0,1, 2, 3 ,4] },
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
                        text: "Thêm mới danh mục",
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
                                return "Details of " + e.data().name_cate_blog;
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
        a.length && (a.validate({
            errorClass: "error",
            rules: {
                "name_cate_blog": { required: !0 },
                "note": { required: !0 },
                "image": { required: !0 },
            },
        }),
        a.on("submit", function (e) {
            e.preventDefault();
            var s = a.valid();
            var form = this;
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
        }))

        $('body').on('click' ,'#deleteBlogCate' , function(){
            var blogCate_id = $(this).data("id");
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
                                    url:"{{ route('blog.category.list.api') }}"+"/"+blogCate_id,
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
// get detail edit
        $('body').on('click' ,'#editBlogCate' , function(){
            var blogCate_id = $(this).data("id");
            $.get('<?= route("blog.category.list.api") ?>'+"/show/"+blogCate_id , function (data) {
        var blogCatetUploadImg = $("#blogCate-upload-img"),
            blogCateUpload = $("#blogCate-upload"),
            uploadedImage = $(".uploadedImage"),
            blogCateReset = $("#blogCate-reset");
            if (uploadedImage) {
            // var src = uploadedImage.attr("src");
            blogCateUpload.on("change", function (ch) {
                
                var n = new FileReader(),
                uploadedImage = ch.target.files;
                (n.onload = function () {
                    blogCatetUploadImg && blogCatetUploadImg.attr("src", n.result);
                }),
                n.readAsDataURL(uploadedImage[0]);
            }),
            blogCateReset.on("click", function () {
                uploadedImage.attr("src", data.image ? "/storage/"+ data.image 
                : "{{ asset('admin/images/portrait/small/image-none.png') }}" );
                });
            };
                var form = $('#editBlogCateForm');
                $("#blogCate-upload-img").attr("src", data.image ? "/storage/"+ data.image 
                : "{{ asset('admin/images/portrait/small/image-none.png') }}" );
                form.find('input[name="id"]').val(data.id); 
                form.find('input[name="name_cate_blog"]').val(data.name_cate_blog);    
                form.find('input[name="note"]').val(data.note);
            },'json')
        });
// submit edit in db

        $('#editBlogCateForm').on('submit', function(e){
            e.preventDefault();
            var form = this;
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
                        console.log('fomr',data);
                        $(form)[0].reset();
                        $('#editBlogCateModal').modal("hide");
                        table.ajax.reload();
                        toastr.success(data.msg)
                    }
                },
                error:function (error) {
                    console.log("Sửa mới không thành công",error);
                }
            })
        });

});


</script>
@endsection