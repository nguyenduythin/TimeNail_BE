<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
      <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                  <li class="nav-item me-auto"><a class="navbar-brand" href="/">
                        <span class="brand-logo">
                                    <img src="{{ asset('admin/images/logo/logo.png')}}" alt="">
                        </span>
                              <h2 class="brand-text"> TimeNails </h2>
                        </a></li>
                  <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0"
                              data-bs-toggle="collapse"><i
                                    class="d-block d-xl-none text-primary toggle-icon font-medium-4"
                                    data-feather="x"></i><i
                                    class="d-none d-xl-block collapse-toggle-icon font-medium-4 text-primary"
                                    data-feather="disc" data-ticon="disc"></i></a></li>
            </ul>
      </div>
      <div class="shadow-bottom"></div>
      <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                  <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i
                                    data-feather="home"></i><span class="menu-title text-truncate"
                                    data-i18n="Dashboards">Trang chính</span><span
                                    class="badge badge-light-warning rounded-pill ms-auto me-1">1</span></a>
                        <ul class="menu-content">
                              <li class=""><a class="d-flex align-items-center" href="/"><i
                                                data-feather="circle"></i><span class="menu-item text-truncate"
                                                data-i18n="eCommerce">Thống kê</span></a>
                              </li>
                        </ul>
                  </li>

                  <li class="navigation-header"><span data-i18n="Tài khoản">Tài Khoản</span><i
                              data-feather="more-horizontal"></i>
                  </li>
                  <li class="nav-item {{ request()->is('user*') ? 'active' : '' }}"><a class="d-flex align-items-center"
                              href="{{ route('user.list') }}"><i data-feather="users"></i><span
                                    class="menu-title text-truncate" data-i18n="Users">Tài khoản</span></a>
                  </li>
                  <li class="nav-item {{ request()->is('staff*') ? 'active' : '' }}"><a
                              class="d-flex align-items-center" href="{{ route('staff.list') }}"><i
                                    data-feather='user-check'></i><span class="menu-title text-truncate"
                                    data-i18n="Users">Nhân viên</span></a>
                  </li>
                  @role('Admin')
                  <li class="navigation-header"><span data-i18n="Tài khoản">Phân quyền</span><i
                              data-feather="more-horizontal"></i>
                  </li>
                  <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="shield"></i><span
                                    class="menu-title text-truncate" data-i18n="Roles &amp; Permission">Vai trò &amp;
                                    Quyền</span></a>
                        <ul class="menu-content">
                              <li class="{{ request()->is('role*') ? 'active' : '' }}"><a
                                          class="d-flex align-items-center" href="{{ route('role.list') }}"><i
                                                data-feather="circle"></i><span class="menu-item text-truncate"
                                                data-i18n="Roles">Vai trò</span></a>
                              </li>
                              <li class="{{ request()->is('permission*') ? 'active' : '' }}"><a
                                          class="d-flex align-items-center" href="{{ route('permission.list') }}"><i
                                                data-feather="circle"></i><span class="menu-item text-truncate"
                                                data-i18n="Permission">Quyền</span></a>
                              </li>
                        </ul>
                  </li>
                  @endrole
                  <li class=" navigation-header"><span data-i18n="Dịch vụ">Dịch vụ</span><i
                              data-feather="more-horizontal"></i>
                  </li>
                  <li class=" nav-item {{ request()->is('service*') ? 'active' : '' }}"><a
                              class="d-flex align-items-center" href="{{route('service.list')}}"><i
                                    data-feather='shopping-bag'></i><span class="menu-title text-truncate"
                                    data-i18n="Dịch vụ lẻ">Dịch vụ lẻ</span></a>
                  </li>
                  <li class=" nav-item {{ request()->is('cate-service*') ? 'active' : '' }}"><a
                              class="d-flex align-items-center" href="{{route('cate-service.list')}}"><i
                                    data-feather="list"></i><span class="menu-title text-truncate"
                                    data-i18n="Dịch vụ lẻ">Danh mục Dịch vụ</span></a>
                  </li>
                  <li class=" nav-item {{ request()->is('combo*') ? 'active' : '' }}"><a
                              class="d-flex align-items-center" href="{{route('combo.list')}}"><i
                                    data-feather='refresh-cw'></i><span class="menu-title text-truncate"
                                    data-i18n="combo">Combo dịch vụ</span></a>
                  </li>
                  <li class=" nav-item {{ request()->is('discount*') ? 'active' : '' }}"><a
                              class="d-flex align-items-center" href="{{route('discount.list')}}"><i
                                    data-feather='percent'></i><span class="menu-title text-truncate"
                                    data-i18n="giảm giá">Mã giảm giá</span></a>
                  </li>
                  <li class=" nav-item {{ request()->is('bill*') ? 'active' : '' }}"><a
                              class="d-flex align-items-center" href="{{route('bill.list')}}"><i
                                    data-feather='file-text'></i><span class="menu-title text-truncate"
                                    data-i18n="Invoice">Hóa đơn</span></a>
                  </li>
                  <li class=" navigation-header"><span data-i18n="Dịch vụ">Truyền thông</span><i
                              data-feather="more-horizontal"></i>
                  </li>
                  <li class=" nav-item {{ request()->is('blog*') ? 'active' : '' }}"><a
                              class="d-flex align-items-center" href="{{ route('blog.list')}}"><i
                                    data-feather='edit'></i><span class="menu-title text-truncate" data-i18n="blog">Bài
                                    viết</span></a>
                  </li>
                  <li class=" nav-item {{ request()->is('category-blog*') ? 'active' : '' }}"><a
                              class="d-flex align-items-center" href="{{ route('category-blog.list')}}"><i
                                    data-feather='list'></i><span class="menu-title text-truncate" data-i18n="blog">Danh
                                    mục bài viết</span></a>

                  </li>
                  <li class=" nav-item {{ request()->is('tag*') ? 'active' : '' }}"><a class="d-flex align-items-center"
                              href="{{ route('tag.list')}}"><i data-feather="tag"></i><span
                                    class="menu-title text-truncate" data-i18n="tag">Tags</span></a>
                  </li>
                  <li class=" navigation-header"><span data-i18n="Dịch vụ">Tương tác & Hỗ trợ</span><i
                              data-feather="more-horizontal"></i>
                  </li>
                  <li class=" nav-item {{ request()->is('feedback*') ? 'active' : '' }}"><a
                              class="d-flex align-items-center" href="{{ route('feedback.list')}}"><i
                                    data-feather='mail'></i><span class="menu-title text-truncate"
                                    data-i18n="Feedback">Feedback</span></a>
                  </li>
                  <li class=" nav-item {{ request()->is('gallery*') ? 'active' : '' }}"><a
                              class="d-flex align-items-center" href="{{ route('gallery.list')}}"><i
                                    data-feather='image'></i><span class="menu-title text-truncate"
                                    data-i18n="Review">Thư Viện Dịch Vụ</span></a>
                  </li>
                  <li class=" nav-item {{ request()->is('category-gallery*') ? 'active' : '' }}"><a
                              class="d-flex align-items-center" href="{{ route('category-gallery.list')}}"><i
                                    data-feather='list'></i><span class="menu-title text-truncate"
                                    data-i18n="Review">Danh Mục Thư Viện</span></a>
                  </li>
                  <li class=" nav-item {{ request()->is('contact*') ? 'active' : '' }}"><a
                              class="d-flex align-items-center" href="{{route('contact.list')}}"><i
                                    data-feather='phone'></i><span class="menu-title text-truncate"
                                    data-i18n="contact">Liên Hệ</span></a>
                  </li>
                  <li class=" navigation-header"><span data-i18n="Infomation">Thông Tin</span><i
                              data-feather="more-horizontal"></i>
                  </li>
                  <li class="nav-item {{ request()->is('slider*') ? 'active' : '' }}"><a
                              class="d-flex align-items-center" href="{{route('slider.list')}}"><i
                                    data-feather='sliders'></i><span class="menu-title text-truncate"
                                    data-i18n="Slider">Slider</span></a>

                  </li>
                  <li class=" nav-item {{ request()->is('setting*') ? 'active' : '' }}"><a
                              class="d-flex align-items-center" href="{{ route('setting.list')}}"><i
                                    data-feather='settings'></i><span class="menu-title text-truncate"
                                    data-i18n="Settings">Time Nails</span></a>

                  </li>
            </ul>
      </div>
</div>
@section('script')

<script>

</script>


@endsection