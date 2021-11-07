@extends('admin.layout.main')
@section('title', 'Statistical')
@section('content')
<div class="app-content content ">
  <div class="content-overlay"></div>
  <div class="header-navbar-shadow"></div>
  <div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <!-- Dashboard Ecommerce Starts -->
      <section id="dashboard-ecommerce">
        <div class="row match-height">
          <div class="col-xl-4 col-md-6 col-12">
            <div class="row match-height">
              <!-- Bar Chart - Orders -->
              <div class="col-lg-6 col-md-6 col-6">
                <div class="card">
                  <div class="card-body pb-50">
                    <h6>Hóa đơn</h6>
                    <h2 class="fw-bolder mb-1" id="total_bill"></h2>
                    <div id="statistics-order-chart"></div>
                  </div>
                </div>
              </div>
              <!--/ Bar Chart - Orders -->

              <!-- Line Chart - Profit -->
              <div class="col-lg-6  col-md-6 col-6">
                <div class="card card-tiny-line-stats">
                  <div class="card-body pb-50">
                    <h6>Lơi nhuận</h6>
                    <h2 class="fw-bolder mb-1" id="avg_bill"></h2>
                    <div id="statistics-profit-chart"></div>
                  </div>
                </div>
              </div>
              <!--/ Line Chart - Profit -->
            </div>
          </div>

          <!-- Statistics Card -->
          <div class="col-xl-8 col-md-6 col-12">
            <div class="card card-statistics">
              <div class="card-header">
                <h4 class="card-title">Thống kê </h4>
                <div class="d-flex align-items-center">
                  <p class="card-text font-small-2 me-25 mb-0">Cập nhật mới</p>
                </div>
              </div>
              <div class="card-body statistics-body">
                <div class="row">
                  <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                    <div class="d-flex flex-row">
                      <div class="avatar bg-light-primary me-2">
                        <div class="avatar-content">
                          <i data-feather="user-check" class="avatar-icon"></i>
                        </div>
                      </div>
                      <div class="my-auto">
                        <h4 class="fw-bolder mb-0" id="staff-count"></h4>
                        <p class="card-text font-small-3 mb-0">Nhân viên</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                    <div class="d-flex flex-row">
                      <div class="avatar bg-light-info me-2">
                        <div class="avatar-content">
                          <i data-feather="user" class="avatar-icon"></i>
                        </div>
                      </div>
                      <div class="my-auto">
                        <h4 class="fw-bolder mb-0" id="user-count"></h4>
                        <p class="card-text font-small-3 mb-0">Tài khoản</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                    <div class="d-flex flex-row">
                      <div class="avatar bg-light-danger me-2">
                        <div class="avatar-content">
                          <i data-feather="box" class="avatar-icon"></i>
                        </div>
                      </div>
                      <div class="my-auto">
                        <h4 class="fw-bolder mb-0" id="service-count"></h4>
                        <p class="card-text font-small-3 mb-0">Dịch vụ</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 col-12">
                    <div class="d-flex flex-row">
                      <div class="avatar bg-light-success me-2">
                        <div class="avatar-content">
                          <i data-feather="box" class="avatar-icon"></i>
                        </div>
                      </div>
                      <div class="my-auto">
                        <h4 class="fw-bolder mb-0" id="combo-count"></h4>
                        <p class="card-text font-small-3 mb-0">Combo</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--/ Statistics Card -->
        </div>
        <div class="row match-height">
          <!-- ChartJs -->
          <!--Bar Chart Start -->
          <div class="col-xl-12 col-12">
            <div class="card">
              <div
                class="card-header d-flex justify-content-between align-items-sm-center align-items-start flex-sm-row flex-column">
                <div class="header-left">
                  <h4 class="card-title">Tổng Doanh Thu</h4>
                </div>
              </div>
              <div class="card-body">
                <canvas id="myChart" style="height: 100px"></canvas>
              </div>
            </div>
          </div>
          <!-- Bar Chart End -->


          <!--/ ChartJs -->

          <!-- Goal Overview Card -->
          <div class="col-lg-6 col-md-6 col-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Dịch vụ</h4>
                <i data-feather="help-circle" class="font-medium-3 text-muted cursor-pointer"></i>
              </div>
              <div class="card-body p-0">
                <div id="goal-overview-radial-bar-chart" class="my-2"></div>
                <div class="row border-top text-center mx-0">
                  <div class="col-6 border-end py-1">
                    <p class="card-text text-muted mb-0">Hoàn thành</p>
                    <h3 class="fw-bolder mb-0">786,617</h3>
                  </div>
                  <div class="col-6 py-1">
                    <p class="card-text text-muted mb-0">đang làm</p>
                    <h3 class="fw-bolder mb-0">13,561</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--/ Goal Overview Card -->

          <!-- Transaction Card -->
          <div class="col-lg-6 col-md-6 col-12">
            <div class="card card-transaction">
              <div class="card-header">
                <h4 class="card-title">Transactions</h4>
                <div class="dropdown chart-dropdown">
                  <i data-feather="more-vertical" class="font-medium-3 cursor-pointer" data-bs-toggle="dropdown"></i>
                  <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="#">Last 28 Days</a>
                    <a class="dropdown-item" href="#">Last Month</a>
                    <a class="dropdown-item" href="#">Last Year</a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="transaction-item">
                  <div class="d-flex">
                    <div class="avatar bg-light-primary rounded float-start">
                      <div class="avatar-content">
                        <i data-feather="pocket" class="avatar-icon font-medium-3"></i>
                      </div>
                    </div>
                    <div class="transaction-percentage">
                      <h6 class="transaction-title">Wallet</h6>
                      <small>Starbucks</small>
                    </div>
                  </div>
                  <div class="fw-bolder text-danger">- $74</div>
                </div>
                <div class="transaction-item">
                  <div class="d-flex">
                    <div class="avatar bg-light-success rounded float-start">
                      <div class="avatar-content">
                        <i data-feather="check" class="avatar-icon font-medium-3"></i>
                      </div>
                    </div>
                    <div class="transaction-percentage">
                      <h6 class="transaction-title">Bank Transfer</h6>
                      <small>Add Money</small>
                    </div>
                  </div>
                  <div class="fw-bolder text-success">+ $480</div>
                </div>
                <div class="transaction-item">
                  <div class="d-flex">
                    <div class="avatar bg-light-danger rounded float-start">
                      <div class="avatar-content">
                        <i data-feather="dollar-sign" class="avatar-icon font-medium-3"></i>
                      </div>
                    </div>
                    <div class="transaction-percentage">
                      <h6 class="transaction-title">Paypal</h6>
                      <small>Add Money</small>
                    </div>
                  </div>
                  <div class="fw-bolder text-success">+ $590</div>
                </div>
                <div class="transaction-item">
                  <div class="d-flex">
                    <div class="avatar bg-light-warning rounded float-start">
                      <div class="avatar-content">
                        <i data-feather="credit-card" class="avatar-icon font-medium-3"></i>
                      </div>
                    </div>
                    <div class="transaction-percentage">
                      <h6 class="transaction-title">Mastercard</h6>
                      <small>Ordered Food</small>
                    </div>
                  </div>
                  <div class="fw-bolder text-danger">- $23</div>
                </div>
                <div class="transaction-item">
                  <div class="d-flex">
                    <div class="avatar bg-light-info rounded float-start">
                      <div class="avatar-content">
                        <i data-feather="trending-up" class="avatar-icon font-medium-3"></i>
                      </div>
                    </div>
                    <div class="transaction-percentage">
                      <h6 class="transaction-title">Transfer</h6>
                      <small>Refund</small>
                    </div>
                  </div>
                  <div class="fw-bolder text-success">+ $98</div>
                </div>
              </div>
            </div>
          </div>
          <!--/ Transaction Card -->
        </div>
      </section>
      <!-- Dashboard Ecommerce ends -->

    </div>
  </div>
</div>
@endsection
@section('script')
<script src="{{ asset('admin/vendors/js/charts/chart.min.js')}}"></script>
<script src="{{ asset('admin/vendors/js/charts/apexcharts.min.js')}}"></script>
<script src="{{ asset('admin/js/scripts/pages/dashboard-ecommerce.min.js')}}"></script>

<script>
function nFormatter(num, digits) {
  const lookup = [
    { value: 1, symbol: "" },
    { value: 1e3, symbol: "k" },
    { value: 1e6, symbol: "M" },
    { value: 1e9, symbol: "G" },
    { value: 1e12, symbol: "T" },
    { value: 1e15, symbol: "P" },
    { value: 1e18, symbol: "E" }
  ];
  const rx = /\.0+$|(\.[0-9]*[1-9])0+$/;
  var item = lookup.slice().reverse().find(function(item) {
    return num >= item.value;
  });
  return item ? (num / item.value).toFixed(digits).replace(rx, "$1") + item.symbol : "0";
}

  $.get('<?= route("dashboard.api") ?>', function(data) {
        $('#combo-count').html(data.combo);
        $('#user-count').html(data.user);
        $('#staff-count').html(data.staff);
        $('#service-count').html(data.service);
        $('#total_bill').html(nFormatter(data.bill , 1));
        $('#avg_bill').html(nFormatter(data.avg_bill , 1));


 })
 
  const MONTHS = [
  'Tháng 1',
  'Tháng 2',
  'Tháng 3',
  'Tháng 4',
  'Tháng 5',
  'Tháng 6',
  'Tháng 7',
  'Tháng 8',
  'Tháng 9',
  'Tháng 10',
  'Tháng 11',
  'Tháng 12',
];

const data = {
  labels: MONTHS,
  datasets: [
  {
    label: 'Doanh thu dịch vụ',
    backgroundColor: 'rgb(255, 99, 132)',
    borderColor: 'rgb(255, 99, 132)',
    data: [10, 10, 5, 2, 20, 30, 43,23,12,44,33,25],
  },
  {
    label: 'Doanh thu combo',
    backgroundColor: 'rgb(76, 133, 255)',
    borderColor: 'rgb(76, 133, 255)',
    data: [10, 0, 12, 23, 2, 30, 50,13,12,4,25,33],
  },
]
};
const config = {
  type: 'bar',
  data: data,
  options: {}
};

const myChart = new Chart(
    $('#myChart'),
    config
  );
</script>
@endsection