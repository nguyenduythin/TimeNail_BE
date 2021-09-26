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
        <h3>Roles List</h3>
<p class="mb-2">
A role provided access to predefined menus and features so that depending <br />
on assigned role an administrator can have access to what he need
</p>

<!-- Role cards -->
<div class="row">
<div class="col-xl-4 col-lg-6 col-md-6">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between">
        <span>Total 4 users</span>
        <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
          <li
            data-bs-toggle="tooltip"
            data-popup="tooltip-custom"
            data-bs-placement="top"
            title="Vinnie Mostowy"
            class="avatar avatar-sm pull-up"
          >
            <img class="rounded-circle" src="{{ asset('admin/images/avatars/2.png')}}" alt="Avatar" />
          </li>
          <li
            data-bs-toggle="tooltip"
            data-popup="tooltip-custom"
            data-bs-placement="top"
            title="Allen Rieske"
            class="avatar avatar-sm pull-up"
          >
            <img class="rounded-circle" src="{{ asset('admin/images/avatars/12.png')}}" alt="Avatar" />
          </li>
          <li
            data-bs-toggle="tooltip"
            data-popup="tooltip-custom"
            data-bs-placement="top"
            title="Julee Rossignol"
            class="avatar avatar-sm pull-up"
          >
            <img class="rounded-circle" src="{{ asset('admin/images/avatars/6.png')}}" alt="Avatar" />
          </li>
          <li
            data-bs-toggle="tooltip"
            data-popup="tooltip-custom"
            data-bs-placement="top"
            title="Kaith D'souza"
            class="avatar avatar-sm pull-up"
          >
            <img class="rounded-circle" src="{{ asset('admin/images/avatars/11.png')}}" alt="Avatar" />
          </li>
        </ul>
      </div>
      <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
        <div class="role-heading">
          <h4 class="fw-bolder">Administrator</h4>
          <a href="javascript:;" class="role-edit-modal" data-bs-toggle="modal" data-bs-target="#addRoleModal">
            <small class="fw-bolder">Edit Role</small>
          </a>
        </div>
        <a href="javascript:void(0);" class="text-body"><i data-feather="copy" class="font-medium-5"></i></a>
      </div>
    </div>
  </div>
</div>
<div class="col-xl-4 col-lg-6 col-md-6">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between">
        <span>Total 7 users</span>
        <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
          <li
            data-bs-toggle="tooltip"
            data-popup="tooltip-custom"
            data-bs-placement="top"
            title="Jimmy Ressula"
            class="avatar avatar-sm pull-up"
          >
            <img class="rounded-circle" src="{{ asset('admin/images/avatars/4.png')}}" alt="Avatar" />
          </li>
          <li
            data-bs-toggle="tooltip"
            data-popup="tooltip-custom"
            data-bs-placement="top"
            title="John Doe"
            class="avatar avatar-sm pull-up"
          >
            <img class="rounded-circle" src="{{ asset('admin/images/avatars/1.png')}}" alt="Avatar" />
          </li>
          <li
            data-bs-toggle="tooltip"
            data-popup="tooltip-custom"
            data-bs-placement="top"
            title="Kristi Lawker"
            class="avatar avatar-sm pull-up"
          >
            <img class="rounded-circle" src="{{ asset('admin/images/avatars/2.png')}}" alt="Avatar" />
          </li>
          <li
            data-bs-toggle="tooltip"
            data-popup="tooltip-custom"
            data-bs-placement="top"
            title="Kaith D'souza"
            class="avatar avatar-sm pull-up"
          >
            <img class="rounded-circle" src="{{ asset('admin/images/avatars/5.png')}}" alt="Avatar" />
          </li>
          <li
            data-bs-toggle="tooltip"
            data-popup="tooltip-custom"
            data-bs-placement="top"
            title="Danny Paul"
            class="avatar avatar-sm pull-up"
          >
            <img class="rounded-circle" src="{{ asset('admin/images/avatars/7.png')}}" alt="Avatar" />
          </li>
        </ul>
      </div>
      <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
        <div class="role-heading">
          <h4 class="fw-bolder">Manager</h4>
          <a href="javascript:;" class="role-edit-modal" data-bs-toggle="modal" data-bs-target="#addRoleModal">
            <small class="fw-bolder">Edit Role</small>
          </a>
        </div>
        <a href="javascript:void(0);" class="text-body"><i data-feather="copy" class="font-medium-5"></i></a>
      </div>
    </div>
  </div>
</div>
<div class="col-xl-4 col-lg-6 col-md-6">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between">
        <span>Total 5 users</span>
        <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
          <li
            data-bs-toggle="tooltip"
            data-popup="tooltip-custom"
            data-bs-placement="top"
            title="Andrew Tye"
            class="avatar avatar-sm pull-up"
          >
            <img class="rounded-circle" src="{{ asset('admin/images/avatars/6.png')}}" alt="Avatar" />
          </li>
          <li
            data-bs-toggle="tooltip"
            data-popup="tooltip-custom"
            data-bs-placement="top"
            title="Rishi Swaat"
            class="avatar avatar-sm pull-up"
          >
            <img class="rounded-circle" src="{{ asset('admin/images/avatars/9.png')}}" alt="Avatar" />
          </li>
          <li
            data-bs-toggle="tooltip"
            data-popup="tooltip-custom"
            data-bs-placement="top"
            title="Rossie Kim"
            class="avatar avatar-sm pull-up"
          >
            <img class="rounded-circle" src="{{ asset('admin/images/avatars/12.png')}}" alt="Avatar" />
          </li>
          <li
            data-bs-toggle="tooltip"
            data-popup="tooltip-custom"
            data-bs-placement="top"
            title="Kim Merchent"
            class="avatar avatar-sm pull-up"
          >
            <img class="rounded-circle" src="{{ asset('admin/images/avatars/10.png')}}" alt="Avatar" />
          </li>
          <li
            data-bs-toggle="tooltip"
            data-popup="tooltip-custom"
            data-bs-placement="top"
            title="Sam D'souza"
            class="avatar avatar-sm pull-up"
          >
            <img class="rounded-circle" src="{{ asset('admin/images/avatars/8.png')}}" alt="Avatar" />
          </li>
        </ul>
      </div>
      <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
        <div class="role-heading">
          <h4 class="fw-bolder">Users</h4>
          <a href="javascript:;" class="role-edit-modal" data-bs-toggle="modal" data-bs-target="#addRoleModal">
            <small class="fw-bolder">Edit Role</small>
          </a>
        </div>
        <a href="javascript:void(0);" class="text-body"><i data-feather="copy" class="font-medium-5"></i></a>
      </div>
    </div>
  </div>
</div>
<div class="col-xl-4 col-lg-6 col-md-6">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between">
        <span>Total 3 users</span>
        <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
          <li
            data-bs-toggle="tooltip"
            data-popup="tooltip-custom"
            data-bs-placement="top"
            title="Kim Karlos"
            class="avatar avatar-sm pull-up"
          >
            <img class="rounded-circle" src="{{ asset('admin/images/avatars/3.png')}}" alt="Avatar" />
          </li>
          <li
            data-bs-toggle="tooltip"
            data-popup="tooltip-custom"
            data-bs-placement="top"
            title="Katy Turner"
            class="avatar avatar-sm pull-up"
          >
            <img class="rounded-circle" src="{{ asset('admin/images/avatars/9.png')}}" alt="Avatar" />
          </li>
          <li
            data-bs-toggle="tooltip"
            data-popup="tooltip-custom"
            data-bs-placement="top"
            title="Peter Adward"
            class="avatar avatar-sm pull-up"
          >
            <img class="rounded-circle" src="{{ asset('admin/images/avatars/12.png')}}" alt="Avatar" />
          </li>
          <li
            data-bs-toggle="tooltip"
            data-popup="tooltip-custom"
            data-bs-placement="top"
            title="Kaith D'souza"
            class="avatar avatar-sm pull-up"
          >
            <img class="rounded-circle" src="{{ asset('admin/images/avatars/10.png')}}" alt="Avatar" />
          </li>
          <li
            data-bs-toggle="tooltip"
            data-popup="tooltip-custom"
            data-bs-placement="top"
            title="John Parker"
            class="avatar avatar-sm pull-up"
          >
            <img class="rounded-circle" src="{{ asset('admin/images/avatars/11.png')}}" alt="Avatar" />
          </li>
        </ul>
      </div>
      <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
        <div class="role-heading">
          <h4 class="fw-bolder">Support</h4>
          <a href="javascript:;" class="role-edit-modal" data-bs-toggle="modal" data-bs-target="#addRoleModal">
            <small class="fw-bolder">Edit Role</small>
          </a>
        </div>
        <a href="javascript:void(0);" class="text-body"><i data-feather="copy" class="font-medium-5"></i></a>
      </div>
    </div>
  </div>
</div>
<div class="col-xl-4 col-lg-6 col-md-6">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between">
        <span>Total 2 users</span>
        <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
          <li
            data-bs-toggle="tooltip"
            data-popup="tooltip-custom"
            data-bs-placement="top"
            title="Kim Merchent"
            class="avatar avatar-sm pull-up"
          >
            <img class="rounded-circle" src="{{ asset('admin/images/avatars/10.png')}}" alt="Avatar" />
          </li>
          <li
            data-bs-toggle="tooltip"
            data-popup="tooltip-custom"
            data-bs-placement="top"
            title="Sam D'souza"
            class="avatar avatar-sm pull-up"
          >
            <img class="rounded-circle" src="{{ asset('admin/images/avatars/6.png')}}" alt="Avatar" />
          </li>
          <li
            data-bs-toggle="tooltip"
            data-popup="tooltip-custom"
            data-bs-placement="top"
            title="Nurvi Karlos"
            class="avatar avatar-sm pull-up"
          >
            <img class="rounded-circle" src="{{ asset('admin/images/avatars/3.png')}}" alt="Avatar" />
          </li>
          <li
            data-bs-toggle="tooltip"
            data-popup="tooltip-custom"
            data-bs-placement="top"
            title="Andrew Tye"
            class="avatar avatar-sm pull-up"
          >
            <img class="rounded-circle" src="{{ asset('admin/images/avatars/8.png')}}" alt="Avatar" />
          </li>
          <li
            data-bs-toggle="tooltip"
            data-popup="tooltip-custom"
            data-bs-placement="top"
            title="Rossie Kim"
            class="avatar avatar-sm pull-up"
          >
            <img class="rounded-circle" src="{{ asset('admin/images/avatars/9.png')}}" alt="Avatar" />
          </li>
        </ul>
      </div>
      <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
        <div class="role-heading">
          <h4 class="fw-bolder">Restricted User</h4>
          <a href="javascript:;" class="role-edit-modal" data-bs-toggle="modal" data-bs-target="#addRoleModal">
            <small class="fw-bolder">Edit Role</small>
          </a>
        </div>
        <a href="javascript:void(0);" class="text-body"><i data-feather="copy" class="font-medium-5"></i></a>
      </div>
    </div>
  </div>
</div>
<div class="col-xl-4 col-lg-6 col-md-6">
  <div class="card">
    <div class="row">
      <div class="col-sm-5">
        <div class="d-flex align-items-end justify-content-center h-100">
          <img
            src="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/app-assets/images/illustration/faq-illustrations.svg"
            class="img-fluid mt-2"
            alt="Image"
            width="85"
          />
        </div>
      </div>
      <div class="col-sm-7">
        <div class="card-body text-sm-end text-center ps-sm-0">
          <a
            href="javascript:void(0)"
            data-bs-target="#addRoleModal"
            data-bs-toggle="modal"
            class="stretched-link text-nowrap add-new-role"
          >
            <span class="btn btn-primary mb-1">Add New Role</span>
          </a>
          <p class="mb-0">Add role, if it does not exist</p>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!--/ Role cards -->

<h3 class="mt-50">Total users with their roles</h3>
<p class="mb-2">Find all of your company’s administrator accounts and their associate roles.</p>
<!-- table -->
<div class="card">
<div class="table-responsive">
  <table class="user-list-table table">
    <thead class="table-light">
      <tr>
        <th></th>
        <th></th>
        <th>Name</th>
        <th>Role</th>
        <th>Plan</th>
        <th>Billing</th>
        <th>Status</th>
        <th>Actions</th>
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
        <h1 class="role-title">Add New Role</h1>
        <p>Set role permissions</p>
      </div>
      <!-- Add role form -->
      <form id="addRoleForm" class="row" onsubmit="return false">
        <div class="col-12">
          <label class="form-label" for="modalRoleName">Role Name</label>
          <input
            type="text"
            id="modalRoleName"
            name="modalRoleName"
            class="form-control"
            placeholder="Enter role name"
            tabindex="-1"
            data-msg="Please enter role name"
          />
        </div>
        <div class="col-12">
          <h4 class="mt-2 pt-50">Role Permissions</h4>
          <!-- Permission table -->
          <div class="table-responsive">
            <table class="table table-flush-spacing">
              <tbody>
                <tr>
                  <td class="text-nowrap fw-bolder">
                    Administrator Access
                    <span data-bs-toggle="tooltip" data-bs-placement="top" title="Allows a full access to the system">
                      <i data-feather="info"></i>
                    </span>
                  </td>
                  <td>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="selectAll" />
                      <label class="form-check-label" for="selectAll"> Select All </label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-nowrap fw-bolder">User Management</td>
                  <td>
                    <div class="d-flex">
                      <div class="form-check me-3 me-lg-5">
                        <input class="form-check-input" type="checkbox" id="userManagementRead" />
                        <label class="form-check-label" for="userManagementRead"> Read </label>
                      </div>
                      <div class="form-check me-3 me-lg-5">
                        <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                        <label class="form-check-label" for="userManagementWrite"> Write </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                        <label class="form-check-label" for="userManagementCreate"> Create </label>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-nowrap fw-bolder">Content Management</td>
                  <td>
                    <div class="d-flex">
                      <div class="form-check me-3 me-lg-5">
                        <input class="form-check-input" type="checkbox" id="contentManagementRead" />
                        <label class="form-check-label" for="contentManagementRead"> Read </label>
                      </div>
                      <div class="form-check me-3 me-lg-5">
                        <input class="form-check-input" type="checkbox" id="contentManagementWrite" />
                        <label class="form-check-label" for="contentManagementWrite"> Write </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="contentManagementCreate" />
                        <label class="form-check-label" for="contentManagementCreate"> Create </label>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-nowrap fw-bolder">Disputes Management</td>
                  <td>
                    <div class="d-flex">
                      <div class="form-check me-3 me-lg-5">
                        <input class="form-check-input" type="checkbox" id="dispManagementRead" />
                        <label class="form-check-label" for="dispManagementRead"> Read </label>
                      </div>
                      <div class="form-check me-3 me-lg-5">
                        <input class="form-check-input" type="checkbox" id="dispManagementWrite" />
                        <label class="form-check-label" for="dispManagementWrite"> Write </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="dispManagementCreate" />
                        <label class="form-check-label" for="dispManagementCreate"> Create </label>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-nowrap fw-bolder">Database Management</td>
                  <td>
                    <div class="d-flex">
                      <div class="form-check me-3 me-lg-5">
                        <input class="form-check-input" type="checkbox" id="dbManagementRead" />
                        <label class="form-check-label" for="dbManagementRead"> Read </label>
                      </div>
                      <div class="form-check me-3 me-lg-5">
                        <input class="form-check-input" type="checkbox" id="dbManagementWrite" />
                        <label class="form-check-label" for="dbManagementWrite"> Write </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="dbManagementCreate" />
                        <label class="form-check-label" for="dbManagementCreate"> Create </label>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-nowrap fw-bolder">Financial Management</td>
                  <td>
                    <div class="d-flex">
                      <div class="form-check me-3 me-lg-5">
                        <input class="form-check-input" type="checkbox" id="finManagementRead" />
                        <label class="form-check-label" for="finManagementRead"> Read </label>
                      </div>
                      <div class="form-check me-3 me-lg-5">
                        <input class="form-check-input" type="checkbox" id="finManagementWrite" />
                        <label class="form-check-label" for="finManagementWrite"> Write </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="finManagementCreate" />
                        <label class="form-check-label" for="finManagementCreate"> Create </label>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-nowrap fw-bolder">Reporting</td>
                  <td>
                    <div class="d-flex">
                      <div class="form-check me-3 me-lg-5">
                        <input class="form-check-input" type="checkbox" id="reportingRead" />
                        <label class="form-check-label" for="reportingRead"> Read </label>
                      </div>
                      <div class="form-check me-3 me-lg-5">
                        <input class="form-check-input" type="checkbox" id="reportingWrite" />
                        <label class="form-check-label" for="reportingWrite"> Write </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="reportingCreate" />
                        <label class="form-check-label" for="reportingCreate"> Create </label>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-nowrap fw-bolder">API Control</td>
                  <td>
                    <div class="d-flex">
                      <div class="form-check me-3 me-lg-5">
                        <input class="form-check-input" type="checkbox" id="apiRead" />
                        <label class="form-check-label" for="apiRead"> Read </label>
                      </div>
                      <div class="form-check me-3 me-lg-5">
                        <input class="form-check-input" type="checkbox" id="apiWrite" />
                        <label class="form-check-label" for="apiWrite"> Write </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="apiCreate" />
                        <label class="form-check-label" for="apiCreate"> Create </label>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-nowrap fw-bolder">Repository Management</td>
                  <td>
                    <div class="d-flex">
                      <div class="form-check me-3 me-lg-5">
                        <input class="form-check-input" type="checkbox" id="repoRead" />
                        <label class="form-check-label" for="repoRead"> Read </label>
                      </div>
                      <div class="form-check me-3 me-lg-5">
                        <input class="form-check-input" type="checkbox" id="repoWrite" />
                        <label class="form-check-label" for="repoWrite"> Write </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="repoCreate" />
                        <label class="form-check-label" for="repoCreate"> Create </label>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-nowrap fw-bolder">Payroll</td>
                  <td>
                    <div class="d-flex">
                      <div class="form-check me-3 me-lg-5">
                        <input class="form-check-input" type="checkbox" id="payrollRead" />
                        <label class="form-check-label" for="payrollRead"> Read </label>
                      </div>
                      <div class="form-check me-3 me-lg-5">
                        <input class="form-check-input" type="checkbox" id="payrollWrite" />
                        <label class="form-check-label" for="payrollWrite"> Write </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="payrollCreate" />
                        <label class="form-check-label" for="payrollCreate"> Create </label>
                      </div>
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
      <!--/ Add role form -->
    </div>
  </div>
</div>
</div>
<!--/ Add Role Modal -->

      </div>
    </div>
  </div>


@endsection
@section('script')
<script>
!(function () {
    var e = $("#addRoleForm");
    e.length && e.validate({ rules: { modalRoleName: { required: !0 } } }),
      $(".modal").on("hidden.bs.modal", function () {
        $(this).find("form")[0].reset();
      });
    const o = document.querySelector("#selectAll"),
      t = document.querySelectorAll('[type="checkbox"]');
    o.addEventListener("change", (e) => {
      t.forEach((o) => {
        o.checked = e.target.checked;
      });
    });
  })();



  $(function () {
  var e = $(".user-list-table"),
    t = "{{ asset('admin/",
    a = "app-user-view-account.html",
    s = {
      1: { title: "Pending", class: "badge-light-warning" },
      2: { title: "Active", class: "badge-light-success" },
      3: { title: "Inactive", class: "badge-light-secondary" },
    };
  "laravel" === $("body").attr("data-framework") &&
    ((t = $("body").attr("data-asset-path")),
    (a = t + "app/user/view/account")),
    e.length &&
      e.DataTable({
        ajax: t + "data/user-list.json",
        columns: [
          { data: "" },
          { data: "id" },
          { data: "full_name" },
          { data: "role" },
          { data: "current_plan" },
          { data: "billing" },
          { data: "status" },
          { data: "" },
        ],
        columnDefs: [
          {
            className: "control",
            orderable: !1,
            responsivePriority: 2,
            targets: 0,
            render: function (e, t, a, s) {
              return "";
            },
          },
          {
            targets: 1,
            orderable: !1,
            responsivePriority: 3,
            render: function (e, t, a, s) {
              return (
                '<div class="form-check"> <input class="form-check-input dt-checkboxes" type="checkbox" value="" id="checkbox' +
                e +
                '" /><label class="form-check-label" for="checkbox' +
                e +
                '"></label></div>'
              );
            },
            checkboxes: {
              selectAllRender:
                '<div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="checkboxSelectAll" /><label class="form-check-label" for="checkboxSelectAll"></label></div>',
            },
          },
          {
            targets: 2,
            responsivePriority: 4,
            render: function (e, s, n, l) {
              var r = n.full_name,
                c = n.email,
                o = n.avatar;
              if (o)
                var i =
                  '<img src="' +
                  t +
                  "images/avatars/" +
                  o +
                  '" alt="Avatar" height="32" width="32">';
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
                  u = (r = n.full_name).match(/\b\w/g) || [];
                i =
                  '<span class="avatar-content">' +
                  (u = ((u.shift() || "") + (u.pop() || "")).toUpperCase()) +
                  "</span>";
              }
              return (
                '<div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar ' +
                ("" === o ? " bg-light-" + d + " " : "") +
                ' me-1">' +
                i +
                '</div></div><div class="d-flex flex-column"><a href="' +
                a +
                '" class="user_name text-body text-truncate"><span class="fw-bolder">' +
                r +
                '</span></a><small class="emp_post text-muted">' +
                c +
                "</small></div></div>"
              );
            },
          },
          {
            targets: 3,
            render: function (e, t, a, s) {
              var n = a.role;
              return (
                "<span class='text-truncate align-middle'>" +
                {
                  Subscriber: feather.icons.user.toSvg({
                    class: "font-medium-3 text-primary me-50",
                  }),
                  Author: feather.icons.settings.toSvg({
                    class: "font-medium-3 text-warning me-50",
                  }),
                  Maintainer: feather.icons.database.toSvg({
                    class: "font-medium-3 text-success me-50",
                  }),
                  Editor: feather.icons["edit-2"].toSvg({
                    class: "font-medium-3 text-info me-50",
                  }),
                  Admin: feather.icons.slack.toSvg({
                    class: "font-medium-3 text-danger me-50",
                  }),
                }[n] +
                n +
                "</span>"
              );
            },
          },
          {
            targets: 5,
            render: function (e, t, a, s) {
              return '<span class="text-nowrap">' + a.billing + "</span>";
            },
          },
          {
            targets: 6,
            render: function (e, t, a, n) {
              var l = a.status;
              return (
                '<span class="badge rounded-pill ' +
                s[l].class +
                '" text-capitalized>' +
                s[l].title +
                "</span>"
              );
            },
          },
          {
            targets: -1,
            title: "Actions",
            orderable: !1,
            render: function (e, t, s, n) {
              return (
                '<a href="' +
                a +
                '" class="btn btn-sm btn-icon">' +
                feather.icons.eye.toSvg({ class: "font-medium-3 text-body" }) +
                "</a>"
              );
            },
          },
        ],
        order: [[2, "desc"]],
        dom: '<"d-flex justify-content-between align-items-center header-actions mx-2 row mt-50 mb-1"<"col-sm-12 col-md-4 col-lg-6" l><"col-sm-12 col-md-8 col-lg-6 ps-xl-75 ps-0"<"dt-action-buttons d-flex align-items-center justify-content-md-end justify-content-center flex-sm-nowrap flex-wrap"<"me-1"f><"user_role mt-50 width-200">>>>t<"d-flex justify-content-between mx-2 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
        language: {
          sLengthMenu: "Show _MENU_",
          search: "Search",
          searchPlaceholder: "Search..",
        },
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
                return "" !== e.title
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
                $('<table class="table"/>').append("<tbody>" + s + "</tbody>")
              );
            },
          },
        },
        language: { paginate: { previous: "&nbsp;", next: "&nbsp;" } },
        initComplete: function () {
          this.api()
            .columns(4)
            .every(function () {
              var e = this,
                t = $(
                  '<select id="UserRole" class="form-select text-capitalize"><option value=""> Select Role </option></select>'
                )
                  .appendTo(".user_role")
                  .on("change", function () {
                    var t = $.fn.dataTable.util.escapeRegex($(this).val());
                    e.search(t ? "^" + t + "$" : "", !0, !1).draw();
                  });
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
  var n = $(".role-edit-modal"),
    l = $(".add-new-role"),
    r = $(".role-title");
  l.on("click", function () {
    r.text("Add New Role");
  }),
    n.on("click", function () {
      r.text("Edit Role");
    });
});

</script>

@endsection