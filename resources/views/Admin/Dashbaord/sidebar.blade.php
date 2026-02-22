<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="{{ asset('valoria/assets/img/logo.png') }}" class="header-logo" /> <span
                class="logo-name">Valoria Noir</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
              <a href="{{ route('admin.dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>Products</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('admin.products.index') }}">All Products </a></li>
                 <li><a class="nav-link" href="{{  route('admin.products.create')}}">Add Clothes Product </a></li>
                <li><a class="nav-link" href="widget-data.html">Add Beauty Product </a></li>
                {{-- <li><a class="nav-link" href="widget-data.html">Makeup </a></li>
                <li><a class="nav-link" href="widget-data.html">Skincare </a></li>
                <li><a class="nav-link" href="widget-data.html">Hair Care </a></li> --}}
              </ul>
            </li>
            <li class="dropdown">
              <a href="" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>Product Categories</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('admin.categories.index') }}">All Categories</a></li>
                <li><a class="nav-link" href="{{ route('admin.categories.create') }}">Add Category</a></li>
                {{-- <li><a class="nav-link" href="portfolio.html">Children</a></li>
                <li><a class="nav-link" href="blog.html">Makeup</a></li>
                <li><a class="nav-link" href="calendar.html">Hair Care</a></li>
                <li><a class="nav-link" href="calendar.html">Skincare</a></li> --}}
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Attributes</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('admin.attributes.index') }}">All Attribute</a></li>
                <li><a class="nav-link" href="{{ route('admin.attributes.create') }}">Add Attribute</a></li>
                
              </ul>
            </li>
           
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Customers</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="alert.html">Alert</a></li>
               
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="shopping-bag"></i><span>Discounts</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="avatar.html">Avatar</a></li>
                
              </ul>
            </li>
            
            <li class="dropdown">
              <a href="" class="menu-toggle nav-link has-dropdown"><i data-feather="layout"></i><span>Users</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('admin.users.index') }}">All Users</a></li>
                
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="grid"></i><span>Settings</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="basic-table.html">Basic Tables</a></li>
                
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="pie-chart"></i><span>Transaction History</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="chart-amchart.html">amChart</a></li>
                
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="feather"></i><span>Coupon Code</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="icon-font-awesome.html">Font Awesome</a></li>
                
              </ul>
            </li>
            
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="image"></i><span>Product Reviews</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="light-gallery.html">Light Gallery</a></li>
                <li><a href="gallery1.html">Gallery 2</a></li>
              </ul>
            </li>



             <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="image"></i><span>
 Orders</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="light-gallery.html">Light Gallery</a></li>
                <li><a href="gallery1.html">Gallery 2</a></li>
              </ul>
            </li>

               <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="image"></i><span>
 Posters Image</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('admin.posters.index') }}">Add Poster</a></li>
                {{-- <li><a href="gallery1.html">Gallery 2</a></li> --}}
              </ul>
            </li>
            
            