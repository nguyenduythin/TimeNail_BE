@extends('admin.layout.main')
@section('title', 'Blogs')
@section('content')

<div class="app-content content ">
  <div class="content-overlay"></div>
  <div class="header-navbar-shadow"></div>
  <div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
    </div>
    <div class="content-body">



      <h3 class="mt-50">Bài viết</h3>
      <!-- table -->
      <div class="card">
        <div class="card-datatable table-responsive">
          <table class="datatables-blogs table" id="datatables-blogs">
            <thead class="table-light">
              <tr>
                <th>Tiêu đề bài viết</th>
                <th>Danh mục bài viết</th>
                <th>Ảnh</th>
                <th>Thẻ gán</th>
                <th>Người tạo</th>
                <th>Hành động</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
      <!-- table -->
      <!-- Add Role Modal -->
      <div class="modal fade" id="addBlogModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-blog">
          <div class="modal-content">
            <div class="modal-header bg-transparent">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5 pb-5">
              <div class="text-center mb-4">
                <h1 class="blog-title">Thêm mới bài viết</h1>
              </div>
              <!-- Add role form -->
              <form id="addBlogForm" class="row" method="POST" action="{{ route('blog.list.api') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="d-flex center">
                  <a href="#" class="me-25">
                    <img src="" id="blog-upload-img" class="uploadedImage rounded me-50 uploadedAvatar"
                      alt="profile image" height="250" width="300" name="image" />
                  </a>
                  <!-- upload and reset button -->
                  <div class="d-flex align-items-end mt-75 ms-1">
                    <div>
                      <label for="blog-upload" class="btn btn-sm btn-primary mb-75 me-75">Ảnh</label>
                      <input type="file" id="blog-upload" name="image" hidden accept="image/*" />
                      <p class="mb-0">Loại tệp được phép: png, jpg, jpeg.</p>
                    </div>
                  </div>
                  <!--/ upload and reset button -->
                </div>
                <div class="col-12">
                  <label class="form-label" for="modalBlogName">người viết bài</label>
                  <input type="hidden" name="user_id" value="{{  Auth::user()->id }}">
                  <p class="form-control ">
                    {{ Auth::user()->full_name }}
                  </p>
                </div>
                <div class="col-6">
                  <label class="form-label" for="modalBlogName">Tiêu đề bài viết</label>
                  <input type="text" id="modalBlogName" class="form-control" placeholder="Enter blog name" name="title"
                    tabindex="-1" data-msg="Please enter blog name" />
                </div>
                <div class="col-6">
                  <label class="form-label" for="modalBlogName">Danh mục bài viết</label>
                  <select class="form-control dt-full-name" id="getAllBlogCate" name="cate_blog_id">

                  </select>
                </div>
                <div class="col-12">
                  <h5 class="form-label mt-25" style="margin-top: 10px !important" for="modalBlogName">Thẻ bài viết</h5>
                  <div class="table-responsive">
                    <table class="table table-flush-spacing">
                      <tbody>

                        <tr>
                          <td>
                            <div class="d-flex" id="getAllTag">
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-2">
                    <h5 class="form-label">Nội dung</h5>
                    <textarea name="description" id="editor" cols="30" rows="30">
                    </textarea>

                  </div>
                </div>
                <div class="col-12 text-center mt-2">
                  <button type="submit" class="btn btn-primary me-1">Lưu</button>
                  <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                    Quay lại
                  </button>
                </div>
              </form>
              <!--/ Add role form -->
            </div>
          </div>
        </div>
      </div>
      <!--/ Edit Role Modal -->

      <div class="modal fade" id="editBlogModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-blog">
          <div class="modal-content">
            <div class="modal-header bg-transparent">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5 pb-5">
              <div class="text-center mb-4">
                <h1 class="blog-title">Chỉnh sửa bài viết</h1>
              </div>
              <!-- Edit role form -->
              <form id="editBlogForm" class="row" method="POST" action="{{ route('blog.update.api') }}"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id">
                <div class="d-flex center">
                  <a href="#" class="me-25">
                    <img src="" id="blogEdit-upload-img" class="uploadedImage rounded me-50" alt="profile image"
                      height="250" width="400" name="image" />
                  </a>
                  <!-- upload and reset button -->
                  <div class="d-flex align-items-end mt-75 ms-1">
                    <div>
                      <label for="blogEdit-upload" class="btn btn-sm btn-primary mb-75 me-75">Ảnh</label>
                      <input type="file" id="blogEdit-upload" name="image" hidden accept="image/*" />
                      <button type="button" id="blogEdit-reset"
                        class="btn btn-sm btn-outline-secondary mb-75">Reset</button>
                      <p class="mb-0">Loại tệp được phép: png, jpg, jpeg.</p>
                    </div>
                  </div>
                  <!--/ upload and reset button -->
                </div>
                {{-- <div class="col-12">
                  <label class="form-label" for="modalBlogName">Người viết bài</label>
                  <input type="text" id="modalBlogName title" class="form-control"
                  name="user_id" tabindex="-1" disabled />
                </div> --}}
                <div class="col-6">
                  <label class="form-label" for="modalBlogName">Tiêu đề bài viết</label>
                  <input type="text" id="modalBlogName title" class="form-control" placeholder="Enter blog title"
                    name="title" tabindex="-1" data-msg="Please enter blog title" />
                </div>
                <div class="col-6">
                  <label class="form-label" for="modalBlogName">Danh mục bài viết</label>
                  <select class="form-control dt-full-name" id="getAllBlogCateEdit" name="cate_blog_id">
                  </select>
                </div>
                <div class="col-12">
                  <h4 class="mt-2 pt-50">Thẻ bài viết</h4>
                  <div class="table-responsive">
                    <table class="table table-flush-spacing">
                      <tbody>
                        <tr>
                          <td>
                            <div class="d-flex" id="getAllTagEdit">
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-2">
                    <h5 class="form-label">Nội dung</h5>
                    <textarea name="description" class="description_edit" id="editorEdit" cols="30" rows="30">
                    </textarea>

                  </div>
                </div>

                <div class="col-12 text-center mt-2">
                  <button type="submit" class="btn btn-primary me-1">Lưu</button>
                  <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                    Quay lại
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

<script src="{{asset('admin/js/scripts/pages/page-blog-edit.min.js')}}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
<!-- END: Page JS-->
<script>
  $(function () {
    let editorEdit;
    ClassicEditor.create( document.querySelector('#editor'));
    ClassicEditor.create( document.querySelector('#editorEdit')).then( newEditor => {
      editorEdit = newEditor;
    });
    var e = $("#datatables-blogs");
    var o = "{{ route('blog.list') }}",
        r = "app-feedback-view-account.html";
        var  table =   e.DataTable({
                "ajax" : {
                        "url" : "{{ route('blog.list.api') }}",
                        "type" : "GET",
                        "dataSrc": ""
                        },
                columns: [
                    { data: "title"  },
                    { data: "category_blog" },
                    { data: "image" },
                    // { data: "description" },
                    { data: "blog_tag" },
                    { data: "blog_user" },
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
                      render: function(e, t, a, s) {
                          var n = a.category_blog.name_cate_blog;
                          return ('<span class="badge rounded-pill badge-light-warning" text-capitalized>' + n + '</span>')
                      },
                    },
                    {
                        targets: 2,
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
                      render: function (e, t, a, s) {
                          return  a.blog_tag.map(data => 
                              (`<span class="badge rounded-pill badge-light-dark " text-capitalized>${data.name_tag}</span>`)
                            ).join(" ") ;
                      },
                    },
                    {
                      targets: 4,
                      render: function(e, t, a, s) {
                          var n = a.blog_user.full_name;
                          return ('<span >' + n + '</span>')
                      },
                    },
                    {
                        targets: 5,
                        title: "Actions",
                        orderable: !1,
                        render: function (e, t, a, s) {
                            var test = a.id
                            return (
                                '<div class="btn-group"><a class="btn btn-sm dropdown-toggle hide-arrow" data-bs-toggle="dropdown">' +
                                feather.icons["more-vertical"].toSvg({
                                    class: "font-small-4",
                                }) +
                                '</a><div class="dropdown-menu dropdown-menu-end"><a href="#" id="editBlog" data-id="'+a.id+'" data-bs-toggle="modal" data-bs-target="#editBlogModal" class="dropdown-item">' +
                                feather.icons["edit"].toSvg({
                                    class: "font-small-4 me-50",
                                }) +
                                'Edit</a><a href="#" id="deleteBlog" data-id="'+a.id+'" class="dropdown-item delete-rec                   ord">' +
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
                  text: 'Thêm mới bài viết',
                  className: 'add-new btn btn-primary mt-50',
                  attr: {
                    'data-bs-toggle': 'modal',
                    'data-bs-target': '#addBlogModal'
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
                initComplete: function () {
                    this.api()
                            .columns(1)
                            .every(function () {
                                var e = this,
                                    t =
                                        ($(
                                            '<label class="form-label" for="FeedbackStar">Đánh giá sao</label>'
                                        ).appendTo(".feedback_star"),
                                        $(
                                            '<select id="FeedbackStar" class="form-select text-capitalize mb-md-0 mb-2"><option value=""> Lựa chọn theo đánh giá sao </option></select>'
                                        )
                                            .appendTo(".feedback_star")
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
                            });
                },
            });
          var tagtUploadImg = $("#blog-upload-img"),
              tagUpload = $("#blog-upload"),
              uploadedImage = $(".uploadedAvatar"),
              tagReset = $("#blog-reset");
          var src =   uploadedImage.attr("src" , "{{asset('admin/images/img-default.png')}}");
            tagUpload.on("change", function (ch) {
                var n = new FileReader(),
                uploadedImage = ch.target.files;
                (n.onload = function () {
                    tagtUploadImg && tagtUploadImg.attr("src", n.result);
                }),
                n.readAsDataURL(uploadedImage[0]);
            });
            var  a = $("#addBlogForm");
            a.length && (a.validate({
                      errorClass: "error",
                      rules: {
                          "title": { required: !0 },
                          "description": { required: !0 },

                      },
                  }),
                  
                  a.on("submit", function (e) {
                      $(`.mota`).val($('.ql-editor p').html())
                      e.preventDefault();
                      var s = a.valid();
                      var form = this;
                      if(s){
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
                                  $('#addBlogModal').modal("hide");
                                  uploadedImage.attr("src" , "{{asset('admin/images/img-default.png')}}");
                                  table.ajax.reload();
                                  toastr.success(data.msg)
                              
                          },
                          error:function (error) {

                              console.log("Thêm không thành công",error);
                          }
                      })}
                  }))

                   // get all tags
                  $.ajax({
                    "url" : "{{ route('tag.list.api') }}",
                    "type" : "GET",
                    dataType:'json',
                    success: function( result ) {
                      result.map(data => {
                        $( "#getAllTag").append(`<div class="form-check me-3 me-lg-5">
                                                                <input class="form-check-input" type="checkbox" id="${data.id}" name="blog_tag[]" data-id="${data.id}" value="${data.id}" />
                                                                <label class="form-check-label" for="${data.id}"> ${data.name_tag} </label>
                                                            </div>`);       
                        $( "#getAllTagEdit").append(`<div class="form-check me-3 me-lg-5">
                                                                <input class="form-check-input" type="checkbox" id="${data.id}" name="blog_tag[]" data-id="${data.id}" value="${data.id}" />
                                                                <label class="form-check-label" for="${data.id}"> ${data.name_tag} </label>
                                                            </div>`);
                      })
                    }
                  });
                  $.ajax({
                    "url" : "{{ route('blog.category.list.api') }}",
                    "type" : "GET",
                    dataType:'json',
                    success: function( result ) {
                      result.map(data => {
                        $("#getAllBlogCate").append(`<option value="${data.id}">${data.name_cate_blog}</option>`);                                
                        $("#getAllBlogCateEdit").append(`<option value="${data.id}" id="${data.id}">${data.name_cate_blog}</option>`);
                      })
                    }
                  });
               
                // Delete 
                  $('body').on('click' ,'#deleteBlog' , function(){
                    var blog_id = $(this).data("id");
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
                                  url:"{{ route('blog.list.api') }}"+"/"+blog_id,
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
                $('body').on('click' ,'#editBlog' , function(){
                  $('#editBlogForm')[0].reset();
                    var blog_id = $(this).data("id");
                    var cate = null;
                    var blogTag = "" ;
                    $.get('<?= route("blog.list.api") ?>'+"/show/"+blog_id , function (data) {
                      var tagtUploadImg = $("#blogEdit-upload-img"),
                      tagUpload = $("#blogEdit-upload"),
                      uploadedImage = $(".uploadedImage"),
                      tagReset = $("#blogEdit-reset");
                      if (uploadedImage) {
                      tagUpload.on("change", function (ch) {
                          var n = new FileReader(),
                          uploadedImage = ch.target.files;
                          (n.onload = function () {
                              tagtUploadImg && tagtUploadImg.attr("src", n.result);
                          }),
                          n.readAsDataURL(uploadedImage[0]);
                      }),
                      tagReset.on("click", function () {
                          uploadedImage.attr("src", data.image ? "/storage/"+ data.image 
                          : "{{ asset('admin/images/portrait/small/image-none.png') }}" );
                          });
                      };
                      var form = $('#editBlogForm');
                        $("#blogEdit-upload-img").attr("src", data.image ? "/storage/"+ data.image 
                        : "{{ asset('admin/images/portrait/small/image-none.png') }}" );
                        form.find('input[name="id"]').val(data.id); 
                        form.find('input[name="title"]').val(data.title); 
                        editorEdit.setData(data.description);
                        cate = data.cate_blog_id;
                        blogTag = data.blog_tag;
                    },'json');
                  $.ajax({
                    "url" : "{{ route('blog.category.list.api') }}",
                    "type" : "GET",
                    dataType:'json',
                    success: function( result ) {
                      result.map(data => {
                        if (cate == data.id) {
                            $("#getAllBlogCateEdit").find("#" + cate).prop('selected', true);
                        }  
                      })
                    }
                    });

                  $.ajax({
                      "url" : "{{ route('tag.list.api') }}",
                      "type" : "GET",
                      dataType:'json',
                      success: function( result ) {
                        result.map(data => {                      
                          blogTag.map(function(bt) {
                            if (bt.pivot.tag_id == data.id) {
                                $("#getAllTagEdit").find("#" + bt.pivot.tag_id, "input").prop('checked', true);
                            }
                          })
                        })
                      }
                    });
                });
                // submit edit in db
                $('#editBlogForm').on('submit', function(e){
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
                                $(form)[0].reset();
                                $('#editBlogModal').modal("hide");
                                table.ajax.reload();
                                toastr.success(data.msg)
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