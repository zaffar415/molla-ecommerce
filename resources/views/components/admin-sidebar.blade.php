<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('dashboard') }}" class="brand-link">
    <img src="{{ asset('/assets/images/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3 bg-white"
         style="opacity: .8">
    <span class="brand-text font-weight-light">{{ config('app.name', 'Molla Ecommerce') }}</span>
  </a>

  @php
    $user = auth()->user();
  @endphp
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ $user->profile_image ? asset('/assets/images/users/' . $user->profile_image) : asset('/assets/images/avatar.png') }}"
             class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ $user->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">        
        <li class="nav-item">
          <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('*dashboard') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
            
        <li class="nav-item {{ request()->is('*product*') ? 'menu-open' : '' }}">
          <a href="{{ route('product.index') }}" class="nav-link {{ request()->is('*product*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-shopping-bag"></i>            
            <p>
              Products
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('product.index') }}" class="nav-link {{ request()->is('*product') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>All Products</p>
              </a>
            </li>            
            <li class="nav-item">
              <a href="{{ route('product.create') }}" class="nav-link {{ request()->is('*product/create') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Product</p>
              </a>
            </li>            
          </ul>
        </li>             
        
        <li class="nav-item {{ request()->is('*term/category*') ? 'menu-open' : '' }}">
          <a href="{{ route('category.index') }}" class="nav-link {{ request()->is('*term/category*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-glass-cheers"></i>
            <p>
              Category
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('category.index') }}" class="nav-link {{ request()->is('*term/category') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>All Categories</p>
              </a>
            </li>            
            <li class="nav-item">
              <a href="{{ route('category.create') }}" class="nav-link {{ request()->is('*term/category/create') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Category</p>
              </a>
            </li>            
          </ul>
        </li>             

        <li class="nav-item {{ request()->is('*term/size*') ? 'menu-open' : '' }}">
          <a href="{{ route('size.index') }}" class="nav-link {{ request()->is('*term/size*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-sitemap"></i>            
            <p>
              Sizes
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('size.index') }}" class="nav-link {{ request()->is('*term/size') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>All Sizes</p>
              </a>
            </li>            
            <li class="nav-item">
              <a href="{{ route('size.create') }}" class="nav-link {{ request()->is('*term/size/create') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Size</p>
              </a>
            </li>            
          </ul>
        </li>    
        
        <li class="nav-item {{ request()->is('*term/color*') ? 'menu-open' : '' }}">
          <a href="{{ route('color.index') }}" class="nav-link {{ request()->is('*term/color*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-swatchbook"></i>            
            <p>
              Colors
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('color.index') }}" class="nav-link {{ request()->is('*term/color') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>All Colors</p>
              </a>
            </li>            
            <li class="nav-item">
              <a href="{{ route('color.create') }}" class="nav-link {{ request()->is('*term/color/create') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Color</p>
              </a>
            </li>            
          </ul>
        </li>    

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>