@extends('admin.layout.main')
@section('title', 'Gallery Category')
@section('content')

<div class="app-content content ">
  <div class="content-overlay"></div>
  <div class="header-navbar-shadow"></div>
  <div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
    </div>
    <div class="content-body">

      <h3 class="mt-50">Danh mục thư viện</h3>
      <!-- table -->
      <div class="card">
        <div class="card-datatable table-responsive">
          <table class="datatables-galleryCategory table" id="datatables-galleryCategory">
            <thead class="table-light">
              <tr>
                <th>Danh mục thư viện</th>
                <th>Ảnh</th>
                <th>Hành động</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
      <!-- table -->
      <!-- Add Role Modal -->
      <div class="modal fade" id="addGalleryCategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-gallery-category">
          <div class="modal-content">
            <div class="modal-header bg-transparent">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5 pb-5">
              <div class="text-center mb-4">
                <h1 class="blog-title">Thêm mới danh mục ảnh</h1>
              </div>
              <!-- Add role form -->
              <form id="addGalleryCategoryForm" class="row" method="POST" action="{{ route('gallery.list.api') }}" enctype="multipart/form-data">
                @csrf
                <div class="d-flex center">
                  <a href="#" class="me-25">
                      <img src="" id="gallery-cate-upload-img" class="uploadedAvatar rounded me-50" alt="profile avatar"
                          height="250" width="400" name="url" />
                  </a>
                  <!-- upload and reset button -->
                  <div class="d-flex align-items-end mt-75 ms-1">
                      <div>
                          <label for="gallery-cate-upload" class="btn btn-sm btn-primary mb-75 me-75">Ảnh</label>
                          <input type="file" id="gallery-cate-upload" name="url"  hidden accept="image/*" />
                          <p class="mb-0">Loại tệp được phép: png, jpg, jpeg.</p>
                      </div>
                  </div>
                  <!--/ upload and reset button -->
                </div>
                <div class="col-12">
                    <label class="form-label" for="modalBlogName">Danh mục bài viết</label>
                    <select class="form-control dt-full-name" id="getAllBlogCate" name="cate_gl_id" >
                      
                    </select>
                  </div>
                <div class="col-12 text-center mt-2">
                  <button type="submit" class="btn btn-primary me-1">Submit</button>
                  <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                    Discard
                  </button>
                </div>
              </form>
              <!--/ Add role form -->
            </div>
          </div>
        </div>
      </div>
      <!--/ Edit Role Modal -->

      <div class="modal fade" id="editGalleryCategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-gallery-category">
          <div class="modal-content">
            <div class="modal-header bg-transparent">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5 pb-5">
              <div class="text-center mb-4">
                <h1 class="blog-title">Chỉnh sửa danh mục ảnh</h1>
              </div>
              <!-- Edit role form -->
              <form id="editGalleryCategoryForm" class="row" method="POST" action="{{ route('gallery.update.api') }}" enctype="multipart/form-data">
                @csrf
                <input type="text" name="id" hidden>
                <div class="d-flex center">
                    <a href="#" class="me-25">
                        <img src="" id="tag-upload-img" class="uploadedImage rounded me-50" alt="profile image"
                            height="250" width="400" name="url" />
                    </a>
                    <!-- upload and reset button -->
                    <div class="d-flex align-items-end mt-75 ms-1">
                        <div>
                            <label for="tag-upload" class="btn btn-sm btn-primary mb-75 me-75">Ảnh</label>
                            <input type="file" id="tag-upload" name="url"  hidden accept="image/*" />
                            <button type="button" id="tag-reset"
                                class="btn btn-sm btn-outline-secondary mb-75">Reset</button>
                            <p class="mb-0">Loại tệp được phép: png, jpg, jpeg.</p>
                        </div>
                    </div>
                    <!--/ upload and reset button -->
                </div>
                <div class="col-12">
                    <label class="form-label" for="modalBlogName">Danh mục bài viết</label>
                    <select class="form-control dt-full-name" name="cate_gl_id" id="getAllBlogCateEdit">
                      
                    </select>
                  </div>
                <div class="col-12 text-center mt-2">
                  <button type="submit" class="btn btn-primary me-1">Submit</button>
                  <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                    Discard
                  </button>
                </div>
              </form>
              <!--/ Edit role form -->
            </div>
          </div>
        </div>
      </div>
      <!--/ Edit Role Modal -->

    </div>
  </div>
</div>

@endsection
@section('script')
<script>
    $(function () {
    var e = $("#datatables-galleryCategory");
    var o = "{{ route('gallery.list') }}",
        r = "app-feedback-view-account.html";
        var  table =   e.DataTable({
                "ajax" : {
                        "url" : "{{ route('gallery.list.api') }}",
                        "type" : "GET",
                        "dataSrc": ""
                        },
                columns: [
                    { data: "title"  },
                    { data: "url" },
                ],
                columnDefs: [
                    {
                        targets: 0,
                        responsivePriority: 2,
                        render: function (e, t, a, s) {
                            var n = a.title;
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
                            var i = a.url;
                                
                            if (i)
                                var c =
                                    '<div><img src="/storage/'+
                                    i +
                                    '" alt="Avatar" height="50" width="50"></div>';
                            
                                return c ;
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
                                'Details</a><a href="" id="editGalleryCategory" data-id="'+a.id+'" data-bs-toggle="modal" data-bs-target="#editGalleryCategoryModal" class="dropdown-item">' +
                                feather.icons["edit"].toSvg({
                                    class: "font-small-4 me-50",
                                }) +
                                'Edit</a><a href="" id="deleteGalleryCategory" data-id="'+a.id+'" class="dropdown-item delete-record">' +
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
                ],
                buttons: [
                {
                  text: 'Thêm mới thư viện',
                  className: 'add-new btn btn-primary mt-50',
                  attr: {
                    'data-bs-toggle': 'modal',
                    'data-bs-target': '#addGalleryCategoryModal'
                  },
                  init: function (api, node, config) {
                    $(node).removeClass('btn-secondary');
                  }
                }
              ],
                responsive: {
                    details: {
                        display: $.fn.dataTable.Responsive.display.modal({
                            header: function (e) {
                                return "Details of " + e.data().description;
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
        $.ajax({
        "url" : "{{ route('gallery.category.list.api') }}",
        "type" : "GET",
        dataType:'json',
        success: function( result ) {
            result.map(data => {

            $( "#getAllBlogCate").append(`<option value="${data.id}">${data.title}</option>`);

            $( "#getAllBlogCateEdit").append(`<option value="${data.id}">${data.title}</option>`);
                            
            })
        }
        });
        var tagtUploadImg = $("#gallery-cate-upload-img"),
        tagUpload = $("#gallery-cate-upload"),
        uploadedImage = $(".uploadedAvatar"),
        tagReset = $("#tag-reset");
        // var src = uploadedImage.attr("src");
        tagUpload.on("change", function (ch) {
            
            var n = new FileReader(),
            uploadedImage = ch.target.files;
            (n.onload = function () {
                tagtUploadImg && tagtUploadImg.attr("src", n.result);
            }),
            n.readAsDataURL(uploadedImage[0]);
        });
        var  a = $("#addGalleryCategoryForm");
        a.length && (a.validate({
            
                errorClass: "error",
                rules: {
                    "url": { required: !0 },
                    "cate_gl_id": { required: !0 },
                    
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
                contentType: false,
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                success: function(data){
                
                        $(form)[0].reset();
                        $('#addGalleryCategoryModal').modal("hide");
                        table.ajax.reload();
                        toastr.success(data.msg)
                    
                },
                error:function (error) {

                    console.log("Thêm không thành công",error);
                }
            })
        }))
    

// Delete 
        $('body').on('click' ,'#deleteGalleryCategory' , function(){
            var gallery_id = $(this).data("id");
            if ( confirm("Bạn có chắc chắn muốn xóa  không ?")) {
            $.ajax({
                type:"DELETE",
                url:"{{ route('gallery.list.api') }}"+"/"+gallery_id,
                success: function(){
                    table.ajax.reload();
                    toastr.success("Xóa Thành Công");
                },
                error:function () {
                    toastr.success("Xóa không Thành Công");
                }
            })
            }
        });

        $('body').on('click' ,'#editGalleryCategory' , function(){
            var gallery_id = $(this).data("id");
            var cate = null;
            $.get('<?= route("gallery.list.api") ?>'+"/show/"+gallery_id , function (data) {
                var tagtUploadImg = $("#tag-upload-img"),
                tagUpload = $("#tag-upload"),
                uploadedImage = $(".uploadedImage"),
                tagReset = $("#tag-reset");
                if (uploadedImage) {
                // var src = uploadedImage.attr("src");
                tagUpload.on("change", function (ch) {
                    
                    var n = new FileReader(),
                    uploadedImage = ch.target.files;
                    (n.onload = function () {
                        tagtUploadImg && tagtUploadImg.attr("src", n.result);
                    }),
                    n.readAsDataURL(uploadedImage[0]);
                }),
                tagReset.on("click", function () {
                    uploadedImage.attr("src", data.url ? "/storage/"+ data.url 
                    : "{{ asset('admin/images/portrait/small/image-none.png') }}" );
                    });
                };
                var form = $('#editGalleryCategoryForm');
                $("#tag-upload-img").attr("src", data.url ? "/storage/"+ data.url 
                : "{{ asset('admin/images/portrait/small/image-none.png') }}" );
                form.find('input[name="id"]').val(data.id); 
                cate = data.cate_gl_id;
            },'json')
            // $.get("{{ route('gallery.category.list.api') }}", function(data) {
            //             data.cate.map(function(x) {
            //                 console.log(x.id);
            //                 if (cate == x.id) { //check cate đã chọn
            //                     $("#getAllBlogCateEdit").find("#" + cate).prop('selected', true);
            //                 }
            //             })
            //         });
            $.ajax({
            "url" : "{{ route('gallery.category.list.api') }}",
            "type" : "GET",
            dataType:'json',
            success: function( result ) {
                result.map(data => {
                    console.log(data.id);
                    if (cate == data.id) {
                        $("#getAllBlogCateEdit").find("#" + cate).prop('selected', true);
                    }             
                })
            }
            });
        });
        $('#editGalleryCategoryForm').on('submit', function(e){
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
                        $('#editGalleryCategoryModal').modal("hide");
                        table.ajax.reload();
                        toastr.success(data.msg)
                    }
                },
                error:function (error) {
                    console.log("Sửa mới không thành công",error);
                }
            })
        });
  // Filter form control to default size
  // ? setTimeout used for multilingual table initialization
  setTimeout(() => {
    $('.dataTables_filter .form-control').removeClass('form-control-sm');
    $('.dataTables_length .form-select').removeClass('form-select-sm');
  }, 300);
});



</script>

@endsection