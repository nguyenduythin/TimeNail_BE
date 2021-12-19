<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
  <div class="navbar-container d-flex content">
    <div class="bookmark-wrapper d-flex align-items-center">
      <ul class="nav navbar-nav d-xl-none">
        <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a>
        </li>
      </ul>
      <ul class="nav navbar-nav bookmark-icons">
        <li class="nav-item dropdown dropdown-language"><a class="nav-link dropdown-toggle" id="dropdown-flag" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-vn"></i><span class="selected-language">VietNam</span></a>
          <div class="dropdown-menu dropdown-menu-top" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="#" data-language="en"><i class="flag-icon flag-icon-us"></i> English</a><a class="dropdown-item" href="#" data-language="fr"><i class="flag-icon flag-icon-fr"></i> French</a><a class="dropdown-item" href="#" data-language="de"><i class="flag-icon flag-icon-de"></i> German</a><a class="dropdown-item" href="#" data-language="pt"><i class="flag-icon flag-icon-pt"></i> Portuguese</a></div>
        </li>
        {{-- <li class="nav-item d-none d-lg-block"><a class="nav-link" href="#" data-bs-toggle="tooltip"
            data-bs-placement="bottom" title="Email"><i class="ficon" data-feather="mail"></i></a></li>
        <li class="nav-item d-none d-lg-block"><a class="nav-link" href="#" data-bs-toggle="tooltip"
            data-bs-placement="bottom" title="Chat"><i class="ficon" data-feather="message-square"></i></a></li>
        <li class="nav-item d-none d-lg-block"><a class="nav-link" href="#" data-bs-toggle="tooltip"
            data-bs-placement="bottom" title="Calendar"><i class="ficon" data-feather="calendar"></i></a></li>
        <li class="nav-item d-none d-lg-block"><a class="nav-link" href="#" data-bs-toggle="tooltip"
            data-bs-placement="bottom" title="Todo"><i class="ficon" data-feather="check-square"></i></a></li> --}}
      </ul>

    </div>
    <ul class="nav navbar-nav align-items-center ms-auto">

      <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>
      {{-- <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon"
            data-feather="search"></i></a>
        <div class="search-input">
          <div class="search-input-icon"><i data-feather="search"></i></div>
          <input class="form-control input" type="text" placeholder="Explore Vuexy..." tabindex="-1"
            data-search="search">
          <div class="search-input-close"><i data-feather="x"></i></div>
          <ul class="search-list search-list-main"></ul>
        </div>
      </li> --}}
      @php
      $user = \App\Models\User::find(Auth::user()->id);
      @endphp
      <li class="nav-item dropdown dropdown-notification me-25"><a class="nav-link" href="#" data-bs-toggle="dropdown"><i class="ficon" data-feather="bell"></i>
          @if(count($user->unreadNotifications)>0)
          <span class="badge rounded-pill bg-danger badge-up" id="count-notifi">{{count($user->unreadNotifications)}}</span>
          @endif
        </a>
        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
          <li class="dropdown-menu-header">
            <div class="dropdown-header d-flex">
              <h4 class="notification-title mb-0 me-auto">Thông Báo</h4>
              @if(count($user->unreadNotifications)>0)
              <div class="badge rounded-pill badge-light-primary" id="count-notifi-small">{{count($user->unreadNotifications)}} chưa đọc</div>
              @endif
            </div>
          </li>
          <li class="scrollable-container media-list">
            @if(count($user->unreadNotifications)>0)
            @foreach($user->unreadNotifications as $c)
            @php
            $member = \App\Models\User::find(json_decode($c)->data->id);
            @endphp
            <a class="d-flex remove-all" href="{{route('read',$c->id)}}">
              <div class="list-item d-flex align-items-start">
                <div class="me-1">
                  <div class="avatar"><img src="{{ isset($member->avatar) ? asset('storage/'.$member->avatar) : "" }}" alt="" width="32" height="32"></div>
                </div>
                <div class="list-item-body flex-grow-1">
                  <p class="media-heading"><span class="fw-bolder">{{json_decode($c)->data->name}} </span></p><small class="notification-text"> {{json_decode($c)->data->date}}.</small>
                </div>
              </div>
            </a>
            @endforeach
          </li>
          <li class="dropdown-menu-footer" id="del-read-all"><a class="btn btn-primary w-100" id="read-all" href="#">Đánh dấu tất cả là đã đọc</a></li>
          @else
            <div class="card-body text-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card font-large-2 mb-1">
                <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                <line x1="1" y1="10" x2="23" y2="10"></line>
              </svg>
              <h5 class="card-title">Không có thông báo mới</h5>
            </div>
          @endif
          <div class="card-body text-center" id="empty-notifi" hidden="true">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card font-large-2 mb-1">
                <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                <line x1="1" y1="10" x2="23" y2="10"></line>
              </svg>
              <h5 class="card-title">Không có thông báo mới</h5>
            </div>
        </ul>
      </li>
      <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder" id="full-name">
              {{ Auth::user()->full_name }}
            </span><span class="user-status">{{ Auth::user()->roles[0]->name }}</span></div><span class="avatar"><img class="round" src="/storage/{{ Auth::user()->avatar }}" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
        </a>
        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
          {{-- <a class="dropdown-item" href="page-profile.html"><i class="me-50" data-feather="user"></i> Profile</a>
          <a class="dropdown-item" href="app-email.html"><i class="me-50" data-feather="mail"></i> Inbox</a><a
            class="dropdown-item" href="app-todo.html"><i class="me-50" data-feather="check-square"></i> Task</a><a
            class="dropdown-item" href="app-chat.html"><i class="me-50" data-feather="message-square"></i> Chats</a>
          --}}
          {{-- <div class="dropdown-divider"></div> --}}
          <a class="dropdown-item" href="#"><i class="me-50" data-feather="settings"></i> Settings</a><a class="dropdown-item" href="#"><i class="me-50" data-feather="credit-card"></i> Pricing</a><a class="dropdown-item" href="#"><i class="me-50" data-feather="help-circle"></i> FAQ</a><a class="dropdown-item" href="#" id="logout-admin"><i class="me-50" data-feather="power"></i>
            Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
@section('script')

@endsection