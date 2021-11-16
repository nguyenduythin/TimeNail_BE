@extends('admin.layout.main')
@section('title', 'Roles')
@section('content')

<div class="app-content content ">
  <div class="content-overlay"></div>
  <div class="header-navbar-shadow"></div>
  <div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
    </div>
    <div class="content-body">



      <h3 class="mt-50">Tổng số người dùng với vai trò của họ</h3>
      <p class="mb-2">Tìm tất cả các tài khoản quản trị viên của công ty bạn và các vai trò liên kết của họ.</p>
      <!-- table -->
      <div class="card">
        <div class="card-datatable table-responsive">
          <table class="datatables-roles table">
            <thead class="table-light">
              <tr>
                <th></th>
                <th></th>
                <th>Tên vai trò</th>
                <th>Các quyền</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
      <!-- table -->
      <!-- Add Role Modal -->
      <div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
          <div class="modal-content">
            <div class="modal-header bg-transparent">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5 pb-5">
              <div class="text-center mb-4">
                <h1 class="role-title">Thêm mới vai trò</h1>
                <p>Đặt quyền vai trò</p>
              </div>
              <!-- Add role form -->
              <form id="addRoleForm" class="row" method="POST" action="{{ route('role.list.api') }}">
                @csrf
                <div class="col-12">
                  <label class="form-label" for="modalRoleName">Role Name</label>
                  <input type="text" id="modalRoleName" class="form-control" placeholder="Enter role name" name="name"
                    tabindex="-1" data-msg="Please enter role name" />
                </div>
                <div class="col-12">
                  <h4 class="mt-2 pt-50">Role Permissions</h4>
                  <!-- role table -->
                  <div class="table-responsive">
                    <table class="table table-flush-spacing">
                      <tbody>

                        <tr>
                          <td>
                            <div class="d-flex" id="getAllPermission">

                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- role table -->
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

      <div class="modal fade" id="editRoleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
          <div class="modal-content">
            <div class="modal-header bg-transparent">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5 pb-5">
              <div class="text-center mb-4">
                <h1 class="role-title">Edit New Role</h1>
                <p>Set role permissions</p>
              </div>
              <!-- Edit role form -->
              <form id="editRoleForm" class="row" method="POST" action="{{ route('role.update.api') }}">
                @csrf
                <div class="col-12">
                  <label class="form-label" for="modalRoleName">Role Name</label>
                  <input type="hidden" name="id" id="">
                  <input type="text" id="modalRoleName" class="form-control" placeholder="Enter role name" name="name"
                    tabindex="-1" data-msg="Please enter role name" />
                </div>
                <div class="col-12">
                  <h4 class="mt-2 pt-50">Role Permissions</h4>
                  <!-- Permission table -->
                  <div class="table-responsive">
                    <table class="table table-flush-spacing">
                      <tbody>

                        <tr>

                          <td>
                            <div class="d-flex" id="getAllPermissionEdit">

                            </div>
                          </td>
                        </tr>


                      </tbody>
                    </table>
                  </div>
                  <!-- Permission table -->
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
  'use strict';
  // roles List datatable
  var table =  $('.datatables-roles').DataTable({
      ajax:  {
              "url" : "{{ route('role.list.api') }}",
              "type" : "GET",
              "dataSrc": "",
              },  
      columns: [
        // columns according to JSON
        { data: '' },
        { data: 'id' },
        { data: 'name' },
        { data: 'permissions' },
        { data: 'created_at' },
        { data: '' }
      ],
      columnDefs: [
        {
          // For Responsive
          className: 'control',
          orderable: false,
          responsivePriority: 2,
          targets: 0,
          render: function (data, type, full, meta) {
            return '';
          }
        },
        {
          targets: 1,
          visible: false
        },
        {
          targets: 3,
          render: function (e, t, a, s) {
              return  a.permissions.map(data => 
                  (`<span class="badge rounded-pill badge-light-dark " text-capitalized>${data.name}</span>`)
                ).join(" ") ;
          },
        },
        {
          // Actions
          targets: -1,
          title: 'Hành động',
          orderable: false,
          render: function (data, type, full, meta) {
            return (
              '<button class="btn btn-sm btn-icon" data-bs-toggle="modal" data-bs-target="#editRoleModal" id="editRole" data-id="'+full.id+'">' +
              feather.icons['edit'].toSvg({ class: 'font-medium-2 text-body' }) +
              '</i></button>' +
              '<button class="btn btn-sm btn-icon delete-record" id="deleteRole" data-id="'+full.id+'">' +
              feather.icons['trash'].toSvg({ class: 'font-medium-2 text-body' }) +
              '</button>'
            );
          }
        }
      ],
      order: [[1, 'asc']],
      dom:
        '<"d-flex justify-content-between align-items-center header-actions text-nowrap mx-1 row mt-75"' +
        '<"col-sm-12 col-lg-4 d-flex justify-content-center justify-content-lg-start" l>' +
        '<"col-sm-12 col-lg-8"<"dt-action-buttons d-flex align-items-center justify-content-lg-end justify-content-center flex-md-nowrap flex-wrap"<"me-1"f>B>>' +
        '><"text-nowrap" t>' +
        '<"d-flex justify-content-between mx-2 row mb-1"' +
        '<"col-sm-12 col-md-6"i>' +
        '<"col-sm-12 col-md-6"p>' +
        '>',
      language: {
        sLengthMenu: 'Show _MENU_',
        search: 'Search',
        searchPlaceholder: 'Search..'
      },
      // Buttons with Dropdown
      buttons: [
        {
          text: 'Thêm mới vai trò',
          className: 'add-new btn btn-primary mt-50',
          attr: {
            'data-bs-toggle': 'modal',
            'data-bs-target': '#addRoleModal'
          },
          init: function (api, node, config) {
            $(node).removeClass('btn-secondary');
          }
        }
      ],
      // For responsive popup
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
              var data = row.data();
              return 'Details of Role';
            }
          }),
          type: 'column',
          renderer: function (api, rowIdx, columns) {
            var data = $.map(columns, function (col, i) {
              return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                ? '<tr data-dt-row="' +
                    col.rowIndex +
                    '" data-dt-column="' +
                    col.columnIndex +
                    '">' +
                    '<td>' +
                    col.title +
                    ':' +
                    '</td> ' +
                    '<td>' +
                    col.data +
                    '</td>' +
                    '</tr>'
                : '';
            }).join('');

            return data ? $('<table class="table"/><tbody />').append(data) : false;
          }
        }
      },
      language: {
        paginate: {
          // remove previous & next text from pagination
          previous: '&nbsp;',
          next: '&nbsp;'
        }
      },
     

    })

var  a = $("#addRoleForm");
var response;
  $.validator.addMethod(
      "uniqueName", 
      function(value, element) {
          $.get('<?= route("role.list.api") ?>', function(dataR) {
              response =  dataR.some(e => e.name === value);
                  });
          return !response;
      },
      "Vai trò đã tồn tại!"
  );
a.length && (a.validate({
          errorClass: "error",
          rules: {
              "name": { required: !0 , uniqueName : true},
          },
      }),
      a.on("submit", function (e) {
          e.preventDefault();
          var s = a.valid();
          var form = this;
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
            
                      $(form)[0].reset();
                      $('#addRoleModal').modal("hide");
                      table.ajax.reload();
                      toastr.success(data.msg)
                  
              },
              error:function (error) {

                  console.log("Thêm không thành công",error);
              }
          });
      }
      }))

// get all permission

$.ajax({
  "url" : "{{ route('permission.list.api') }}",
  "type" : "GET",
  dataType:'json',
  headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
  success: function( result ) {
    result.map(data => {
      $( "#getAllPermission ").append(`<div class="form-check me-3 me-lg-5">
                                          <input class="form-check-input" type="checkbox" id="${data.id}" name="permissions[]" data-id="${data.id}" value="${data.id}" />
                                          <label class="form-check-label" for="${data.id}"> ${data.name} </label>
                                      </div>`); 

      $( "#getAllPermissionEdit").append(`<div class="form-check me-3 me-lg-5">
                                            <input class="form-check-input" type="checkbox"  id="${data.id}" name="permissions[]" data-id="${data.id}" value="${data.id}" />
                                            <label class="form-check-label" for="${data.id}"> ${data.name} </label>
                                        </div>`);
  })
  }
});

// Delete 
  $('body').on('click' ,'#deleteRole' , function(){
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
                      url:"{{ route('role.list.api') }}"+"/"+user_id,
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
$('body').on('click' ,'#editRole' , function(){
    $('#editRoleForm')[0].reset();
    var role_id = $(this).data("id");
    $.get('<?= route("role.list.api") ?>'+"/show/"+role_id , function (data) {
        var form = $('#editRoleForm');
        form.find('input[name="id"]').val(data.id); 
        form.find('input[name="name"]').val(data.name); 
        var permissions  =  data.permissions;
        console.log('đata',data);
       
    $.get("{{ route('permission.list.api') }}" , function (result) {
      result.map(x => {
        data.permissions.map((y)=>{
                        if (y.id === x.id) {
                            $("#getAllPermissionEdit").find("#"+y.id,"input").prop('checked', true);
                        }
                    })
        })
    })

    },'json')
    
});
// submit edit in db
$('#editRoleForm').on('submit', function(e){
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
                $('#editRoleModal').modal("hide");
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