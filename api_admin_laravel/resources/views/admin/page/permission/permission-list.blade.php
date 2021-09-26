@extends('admin.layout.main')
@section('title', 'Permission')
@section('content')
<!-- BEGIN: Content-->
<div class="app-content content ">
  <div class="content-overlay"></div>
  <div class="header-navbar-shadow"></div>
  <div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <h3>Permissions List</h3>
<p>Each category (Basic, Professional, and Business) includes the four predefined roles shown below.</p>

<!-- Permission Table -->
<div class="card">
<div class="card-datatable table-responsive">
<table class="datatables-permissions table">
  <thead class="table-light">
    <tr>
      <th></th>
      <th></th>
      <th>Name</th>
      <th>Assigned To</th>
      <th>Created Date</th>
      <th>Actions</th>
    </tr>
  </thead>
</table>
</div>
</div>
<!--/ Permission Table -->
      <!-- Add Permission Modal -->
<div class="modal fade" id="addPermissionModal" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
  <div class="modal-header bg-transparent">
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div>
  <div class="modal-body px-sm-5 pb-5">
    <div class="text-center mb-2">
      <h1 class="mb-1">Add New Permission</h1>
      <p>Permissions you may use and assign to your users.</p>
    </div>
    <form id="addPermissionForm" class="row" onsubmit="return false">
      <div class="col-12">
        <label class="form-label" for="modalPermissionName">Permission Name</label>
        <input
          type="text"
          id="modalPermissionName"
          name="modalPermissionName"
          class="form-control"
          placeholder="Permission Name"
          autofocus
          data-msg="Please enter permission name"
        />
      </div>
      <div class="col-12 mt-75">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="corePermission" />
          <label class="form-check-label" for="corePermission"> Set as core permission </label>
        </div>
      </div>
      <div class="col-12 text-center">
        <button type="submit" class="btn btn-primary mt-2 me-1">Create Permission</button>
        <button type="reset" class="btn btn-outline-secondary mt-2" data-bs-dismiss="modal" aria-label="Close">
          Discard
        </button>
      </div>
    </form>
  </div>
</div>
</div>
</div>
<!--/ Add Permission Modal -->
      <!-- Edit Permission Modal -->
<div class="modal fade" id="editPermissionModal" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
  <div class="modal-header bg-transparent">
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div>
  <div class="modal-body p-3 pt-0">
    <div class="text-center mb-2">
      <h1 class="mb-1">Edit Permission</h1>
      <p>Edit permission as per your requirements.</p>
    </div>

    <div class="alert alert-warning" role="alert">
      <h6 class="alert-heading">Warning!</h6>
      <div class="alert-body">
        By editing the permission name, you might break the system permissions functionality. Please ensure you're
        absolutely certain before proceeding.
      </div>
    </div>

    <form id="editPermissionForm" class="row" onsubmit="return false">
      <div class="col-sm-9">
        <label class="form-label" for="editPermissionName">Permission Name</label>
        <input
          type="text"
          id="editPermissionName"
          name="editPermissionName"
          class="form-control"
          placeholder="Enter a permission name"
          tabindex="-1"
          data-msg="Please enter permission name"
        />
      </div>
      <div class="col-sm-3 ps-sm-0">
        <button type="submit" class="btn btn-primary mt-2">Update</button>
      </div>
      <div class="col-12 mt-75">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="editCorePermission" />
          <label class="form-check-label" for="editCorePermission"> Set as core permission </label>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
</div>
<!--/ Edit Permission Modal -->

    </div>
  </div>
</div>
<!-- END: Content-->

@endsection
@section('script')
<script>
$(function () {
  ('use strict');
  var addPermissionForm = $('#addPermissionForm');

  // jQuery Validation
  // --------------------------------------------------------------------
  if (addPermissionForm.length) {
    addPermissionForm.validate({
      rules: {
        modalPermissionName: {
          required: true
        }
      }
    });
  }

  // reset form on modal hidden
  $('.modal').on('hidden.bs.modal', function () {
    $(this).find('form')[0].reset();
  });
});

$(function () {
  ('use strict');
  var editPermissionForm = $('#editPermissionForm');

  // jQuery Validation
  // --------------------------------------------------------------------
  if (editPermissionForm.length) {
    editPermissionForm.validate({
      rules: {
        editPermissionName: {
          required: true
        }
      }
    });
  }
});



$(function () {
  'use strict';

  var dataTablePermissions = $('.datatables-permissions'),
    assetPath = '../../../app-assets/',
    dt_permission,
    userList = 'app-user-list.html';

  if ($('body').attr('data-framework') === 'laravel') {
    assetPath = $('body').attr('data-asset-path');
    userList = assetPath + 'app/user/list';
  }

  // Users List datatable
  if (dataTablePermissions.length) {
    dt_permission = dataTablePermissions.DataTable({
      ajax: assetPath + 'data/permissions-list.json', // JSON file to add data
      columns: [
        // columns according to JSON
        { data: '' },
        { data: 'id' },
        { data: 'name' },
        { data: 'assigned_to' },
        { data: 'created_date' },
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
          // remove ordering from Name
          targets: 2,
          orderable: false
        },
        {
          // User Role
          targets: 3,
          orderable: false,
          render: function (data, type, full, meta) {
            var $assignedTo = full['assigned_to'],
              $output = '';
            var roleBadgeObj = {
              Admin:
                '<a href="' +
                userList +
                '" class="me-50"><span class="badge rounded-pill badge-light-primary">Administrator</span></a>',
              Manager:
                '<a href="' +
                userList +
                '" class="me-50"><span class="badge rounded-pill badge-light-warning">Manager</span></a>',
              Users:
                '<a href="' +
                userList +
                '" class="me-50"><span class="badge rounded-pill badge-light-success">Users</span></a>',
              Support:
                '<a href="' +
                userList +
                '" class="me-50"><span class="badge rounded-pill badge-light-info">Support</span></a>',
              Restricted:
                '<a href="' +
                userList +
                '" class="me-50"><span class="badge rounded-pill badge-light-danger">Restricted User</span></a>'
            };
            for (var i = 0; i < $assignedTo.length; i++) {
              var val = $assignedTo[i];
              $output += roleBadgeObj[val];
            }
            return $output;
          }
        },
        {
          // Actions
          targets: -1,
          title: 'Actions',
          orderable: false,
          render: function (data, type, full, meta) {
            return (
              '<button class="btn btn-sm btn-icon" data-bs-toggle="modal" data-bs-target="#editPermissionModal">' +
              feather.icons['edit'].toSvg({ class: 'font-medium-2 text-body' }) +
              '</i></button>' +
              '<button class="btn btn-sm btn-icon delete-record">' +
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
        '<"col-sm-12 col-lg-8"<"dt-action-buttons d-flex align-items-center justify-content-lg-end justify-content-center flex-md-nowrap flex-wrap"<"me-1"f><"user_role mt-50 width-200 me-1">B>>' +
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
          text: 'Add Permission',
          className: 'add-new btn btn-primary mt-50',
          attr: {
            'data-bs-toggle': 'modal',
            'data-bs-target': '#addPermissionModal'
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
              return 'Details of Permission';
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
      initComplete: function () {
        // Adding role filter once table initialized
        this.api()
          .columns(3)
          .every(function () {
            var column = this;
            var select = $(
              '<select id="UserRole" class="form-select text-capitalize"><option value=""> Select Role </option><option value="Administrator" class="text-capitalize">Administrator</option><option value="Manager" class="text-capitalize">Manager</option><option value="Users" class="text-capitalize">users</option><option value="Support" class="text-capitalize">Support</option><option value="Restricted" class="text-capitalize">Restricted User</option></select>'
            )
              .appendTo('.user_role')
              .on('change', function () {
                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                column.search(val ? val : '', true, false).draw();
              });
          });
      }
    });
  }

  // Delete Record
  $('.datatables-permissions tbody').on('click', '.delete-record', function () {
    dt_permission.row($(this).parents('tr')).remove().draw();
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