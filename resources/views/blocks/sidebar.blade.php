<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link <?=(Request::segment(1) == 'admin') ? "" : "collapsed"?>" href="{{route('admin')}}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>

      <a class="nav-link <?=(Request::segment(1) == 'admin_add_car') ? "" : "collapsed"?>" href="{{route('admin_add_car')}}">
        <i class="bi bi-grid"></i>
        <span>Add Car</span>
      </a>

      <a class="nav-link <?=(Request::segment(1) == 'admin_add_stamp') ? "" : "collapsed"?>" href="{{route('admin_add_stamp')}}">
        <i class="bi bi-grid"></i>
        <span>Add Stamp</span>
      </a>

      <a class="nav-link <?=(Request::segment(1) == 'admin_upd_slider') ? "" : "collapsed"?>" href="{{route('admin_upd_slider')}}">
        <i class="bi bi-grid"></i>
        <span>Upd Slider</span>
      </a>

      <a class="nav-link <?=(Request::segment(1) == 'admin_upd_data') ? "" : "collapsed"?>" href="{{route('admin_upd_data')}}">
        <i class="bi bi-grid"></i>
        <span>Upd Data</span>
      </a>

      @if (@$_SESSION['admin'] -> level >= 5)
      <a class="nav-link <?=(Request::segment(1) == 'admin_creator') ? "" : "collapsed"?>" href="{{route('admin_creator')}}">
        <i class="bi bi-grid"></i>
        <span>Add Admin</span>
      </a>
      @endif
    </li>

  </ul>

</aside><!-- End Sidebar-->