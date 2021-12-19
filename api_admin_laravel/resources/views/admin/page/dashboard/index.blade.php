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
                    <h6>Tổng giá hóa đơn</h6>
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
                    <h6>Tổng số hóa đơn</h6>
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
                <div class="header-right d-flex align-items-center mt-sm-0 mt-1 mr-5">
                  <i data-feather="calendar"></i>
                  <input type="text"
                    class="form-control flatpickr-basic flatpickr-input border-0 shadow-none bg-transparent pe-0 "
                    placeholder="Start" id="start" name="start"
                    style="width: 91px;" />
                  to
                  <input type="text"
                    class="form-control flatpickr-basic flatpickr-input border-0 shadow-none bg-transparent pe-0 "
                    placeholder="End" id="end" name="end" style="width: 93px; padding-left: 6px;" />
                  <button type="submit" id="find-date-submit" class="btn btn-flat-secondary"
                    style="background-color: rgba(88, 88, 88, 0.027);">Find date</button>
                </div>
                {{-- <div class="header-right d-flex align-items-center mt-sm-0 mt-1">
                  <i data-feather="calendar"></i>
                  <input type="text" class="form-control flat-picker border-0 shadow-none bg-transparent pe-0 "
                    placeholder="YYYY-MM-DD" readonly="readonly" />
                </div> --}}
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
                    <h3 class="fw-bolder mb-0" id="success_bill">0</h3>
                  </div>
                  <div class="col-6 py-1">
                    <p class="card-text text-muted mb-0">đang làm</p>
                    <h3 class="fw-bolder mb-0" id="doing_bill">0</h3>
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
                <h4 class="card-title">Chăm sóc Khách hàng</h4>
                <div class="dropdown chart-dropdown">
                  <i data-feather="more-vertical" class="font-medium-3 cursor-pointer" data-bs-toggle="dropdown"></i>

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
                      <h6 class="transaction-title">Bài viết</h6>
                      <small>Thông tin, chia sẻ</small>
                    </div>
                  </div>
                  <div class="fw-bolder text-success" id="blog">- $74</div>
                </div>
                <div class="transaction-item">
                  <div class="d-flex">
                    <div class="avatar bg-light-success rounded float-start">
                      <div class="avatar-content">
                        <i data-feather="thumbs-up" class="avatar-icon font-medium-3"></i>
                      </div>
                    </div>
                    <div class="transaction-percentage">
                      <h6 class="transaction-title">Feedback</h6>
                      <small>Đóng góp từ khách hàng</small>
                    </div>
                  </div>
                  <div class="fw-bolder text-success" id="feedback"></div>
                </div>
                <div class="transaction-item">
                  <div class="d-flex">
                    <div class="avatar bg-light-danger rounded float-start">
                      <div class="avatar-content">
                        <i data-feather="percent" class="avatar-icon font-medium-3"></i>

                      </div>
                    </div>
                    <div class="transaction-percentage">
                      <h6 class="transaction-title">Mã giảm giá</h6>
                      <small>các ưu đãi</small>
                    </div>
                  </div>
                  <div class="fw-bolder text-success" id="discount"></div>
                </div>
                <div class="transaction-item">
                  <div class="d-flex">
                    <div class="avatar bg-light-warning rounded float-start">
                      <div class="avatar-content">
                        <i data-feather='image' class="avatar-icon font-medium-3"></i>
                      </div>
                    </div>
                    <div class="transaction-percentage">
                      <h6 class="transaction-title">Thư Viện ảnh</h6>
                      <small>Cập nhật mới</small>
                    </div>
                  </div>
                  <div class="fw-bolder text-success" id="gallery"></div>
                </div>
                <div class="transaction-item">
                  <div class="d-flex">
                    <div class="avatar bg-light-info rounded float-start">
                      <div class="avatar-content">
                        <i data-feather="message-square" class="avatar-icon font-medium-3"></i>
                      </div>
                    </div>
                    <div class="transaction-percentage">
                      <h6 class="transaction-title">Liên hệ</h6>
                      <small>Hỗ trợ</small>
                    </div>
                  </div>
                  <div class="fw-bolder text-success" id="contact"></div>
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

<!--Bar Chart Start -->

<!-- Bar Chart End -->
@endsection
@section('script')
<script src="{{ asset('admin/vendors/js/charts/chart.min.js')}}"></script>
<script src="{{ asset('admin/vendors/js/charts/apexcharts.min.js')}}"></script>
<script src="{{ asset('admin/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('admin/vendors/js/moment/moment.js') }}"></script>
<script>
  S = "rtl" === $("html").attr("data-textdirection");
    setTimeout(function () {
        toastr.success(
            "Admin TimeNails. Bây giờ bạn có thể bắt đầu khám phá!",
            "👋 Chào mừng bạn!",
            { closeButton: !0, tapToDismiss: !1, rtl: S }
        );
    }, 2e3);
</script>

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


 $.get("{{ route('getDateWorkFirst.api') }}",
   function (date) {
    var start = moment(date).format('YYYY-MM-DD');
    $('#start').val(start);
    $('#start').flatpickr({ minDate: start });

   },
 );

var end = moment().format('YYYY-MM-DD');
$('#end').val(end);
$('#end').flatpickr({ maxDate: end });

var url = '{{ route("dashboard.api", [":start", ":end" ]) }}';
url = url.replace(':start', start);
url = url.replace(':end', end);

  $.get(url, async function(data) {
        $('#combo-count').html(data.combo);
        $('#user-count').html(data.user);
        $('#staff-count').html(data.staff);
        $('#service-count').html(data.service);
        $('#doing_bill').html(data.doing_bill);
        $('#blog').html( '+ ' + data.blog );
        $('#gallery').html( '+ ' + data.gallery );
        $('#feedback').html( '+ ' + data.feedback );
        $('#discount').html( '+ ' + data.discount );
        $('#contact').html( '+ ' + data.contact );

        $('#success_bill').html(data.success_bill);
        $('#total_bill').html(nFormatter(data.bill , 1));
        $('#avg_bill').html(data.avg_bill );

 g = document.querySelector("#statistics-profit-chart");
        c = "#f3f3f3",
        w = "#EBEBEB",
        p = "#b9b9c3";

 e = {chart: {
                height: 70,
                type: "line",
                toolbar: { show: !1 },
                zoom: { enabled: !1 },
            },
            grid: {
                borderColor: w,
                strokeDashArray: 5,
                xaxis: { lines: { show: !0 } },
                yaxis: { lines: { show: !1 } },
                padding: { top: -30, bottom: -10 },
            },
            stroke: { width: 3 },
            colors: [window.colors.solid.info],
            series: [{ data: [0, 20, 5, 30, 15, 45] }],
            markers: {
                size: 2,
                colors: window.colors.solid.info,
                strokeColors: window.colors.solid.info,
                strokeWidth: 2,
                strokeOpacity: 1,
                strokeDashArray: 0,
                fillOpacity: 1,
                discrete: [
                    {
                        seriesIndex: 0,
                        dataPointIndex: 5,
                        fillColor: "#ffffff",
                        strokeColor: window.colors.solid.info,
                        size: 5,
                    },
                ],
                shape: "circle",
                radius: 2,
                hover: { size: 3 },
            },
            xaxis: {
                labels: { show: !0, style: { fontSize: "0px" } },
                axisBorder: { show: !1 },
                axisTicks: { show: !1 },
            },
            yaxis: { show: !1 },
            tooltip: { x: { show: !1 } },
        };new ApexCharts(g, e).render();

u = document.querySelector("#statistics-order-chart");
o = {chart: {
                height: 70,
                type: "bar",
                stacked: !0,
                toolbar: { show: !1 },
            },
            grid: {
                show: !1,
                padding: { left: 0, right: 0, top: -15, bottom: -15 },
            },
            plotOptions: {
                bar: {
                    horizontal: !1,
                    columnWidth: "20%",
                    startingShape: "rounded",
                    colors: {
                        backgroundBarColors: [c, c, c, c, c],
                        backgroundBarRadius: 5,
                    },
                },
            },
            legend: { show: !1 },
            dataLabels: { enabled: !1 },
            colors: [window.colors.solid.warning],
            series: [{ name: "2020", data: [45, 85, 65, 45, 65] }],
            xaxis: {
                labels: { show: !1 },
                axisBorder: { show: !1 },
                axisTicks: { show: !1 },
            },
            yaxis: { show: !1 },
            tooltip: { x: { show: !1 } },
        };new ApexCharts(u, o).render();

        $('#doing_bill').html(data.doing_bill);
        $('#success_bill').html(data.success_bill);
 const percent = Math.round(( 100 / (data.success_bill + data.doing_bill) ) * data.success_bill);
 B = document.querySelector("#goal-overview-radial-bar-chart");
 h = {chart: {
                height: 245,
                type: "radialBar",
                sparkline: { enabled: !0 },
                dropShadow: {
                    enabled: !0,
                    blur: 3,
                    left: 1,
                    top: 1,
                    opacity: 0.1,
                },
            },
            colors: ["#51e5a8"],
            plotOptions: {
                radialBar: {
                    offsetY: -10,
                    startAngle: -150,
                    endAngle: 150,
                    hollow: { size: "77%" },
                    track: { background: "#ebe9f1", strokeWidth: "50%" },
                    dataLabels: {
                        name: { show: !1 },
                        value: {
                            color: "#5e5873",
                            fontSize: "2.86rem",
                            fontWeight: "600",
                        },
                    },
                },
            },
            fill: {
                type: "gradient",
                gradient: {
                    shade: "dark",
                    type: "horizontal",
                    shadeIntensity: 0.5,
                    gradientToColors: [window.colors.solid.success],
                    inverseColors: !0,
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 100],
                },
            },
            series: [percent],
            stroke: { lineCap: "round" },
            grid: { padding: { bottom: 30 } },
        };new ApexCharts(B, h).render();



  const getDate = data.date_work.map(n => n.date_work );
  const total_bill = data.date_work.map(n => n.total_bill );
  const dataB = {
    labels:  getDate,
    datasets: [
    {
      label: 'Doanh thu Hóa đơn',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: total_bill,
    },
    // {
    //   label: 'Doanh thu combo',
    //   backgroundColor: 'rgb(76, 133, 255)',
    //   borderColor: 'rgb(76, 133, 255)',
    //   data: data.total_bill,
    // },
  ]
  };

  const config = {
    type: 'bar',
    data: dataB,
    options: {
      scales: {
          y: {
            beginAtZero: true
          }
        }
    }
  };

  const myChart = new Chart(
      $('#myChart'),
      config
    );

$('#find-date-submit').click(function (e) { 
  e.preventDefault();
    start = $('#start').val();
    end = $('#end').val();
    var url = '{{ route("dashboard.api", [":start", ":end" ]) }}';
    url = url.replace(':start', start);
    url = url.replace(':end', end);
    $.get(url, function(data) {
        const getDate = data.date_work.map(n => n.date_work);
        if (data.date_work.length > 0) {
          myChart.config.data.labels = getDate;
          myChart.update();
        }else{
          toastr.warning('Không tìm thấy dữ liệu trong khoảng thời gian này!');
        }
      })
    });

  var r = $(".flat-picker");
  new Date();
    r.each(function () {
      $(this).flatpickr({
        mode: "range",
        defaultDate: [moment(getDate[0]).format('YYYY-MM-DD'), moment().format('YYYY-MM-DD') ],
        onChange:  function(dates) {
                      const dateNew = [...getDate]
                      if (dates.length == 2) {
                          var start =  moment( dates[0]).format('YYYY-MM-DD');
                          var end = moment( dates[1]).format('YYYY-MM-DD');
                          var indexStartDate = dateNew.indexOf(start);
                          var indexEndDate = dateNew.indexOf(end);
                          const filterData = dateNew.slice(indexStartDate, indexEndDate + 1);
                          myChart.config.data.labels = filterData;
                          myChart.update();
                          
                      }
                  }
      });
    });
 });

</script>
@endsection