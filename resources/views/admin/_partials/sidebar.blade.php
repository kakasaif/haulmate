<style>
  .caret {
    display: inline-block;
    width: 0;
    height: 0;
    margin-left: 2px;
    vertical-align: middle;
    border-top: 4px dashed;
    border-top: 4px solid\9;
    border-right: 4px solid transparent;
    border-left: 4px solid transparent;
  }
  .panel-body {
    padding-left: 15px;
  }
</style>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{asset('assets/admin')}}/img/logo.png" alt="AdminLTE Logo" class="main">
  </a>
  <div class="clearfix"></div>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('assets/admin')}}/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{Auth::user()->name}}</a>
      </div>
    </div> --}}

    @php
    $role = Auth::user()->role;
    @endphp
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item" data-page="Dashboard">
          <a href="{{route('dashboard')}}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        @if ($role === 'Super')
        <li class="nav-item" data-page="Administrators">
          <a href="{{route('administrators.index')}}" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Administrators
            </p>
          </a>
        </li>
        @endif

        @if (in_array($role, ['Super', 'Admin']))
        <li class="nav-item" data-page="Users">
          <a href="{{route('users.index')}}" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Users
            </p>
          </a>
        </li>

        <li class="nav-item" data-page="Moving List">
          <a href="{{route('movings')}}" class="nav-link">
            <i class="nav-icon fas fa-route"></i>
            <p>
              Moving List
            </p>
          </a>
        </li>

        <li class="nav-item" data-page="Locations">
          <a href="{{route('locations.index')}}" class="nav-link">
            <i class="nav-icon fas fa-map-marker-alt"></i>
            <p>
              Locations
            </p>
          </a>
        </li>
        @endif

        @if (in_array($role, ['Super', 'Admin', 'Housing', 'Both']))
        <li class="nav-item" data-page="Housing">
          <a href="{{route('housing.index')}}" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Housing
            </p>
          </a>
        </li>
        @endif

        @if (in_array($role, ['Super', 'Admin', 'Partner', 'Both']))
    	<li class="nav-item has_items" data-page="Product" data-panel="products-dropdown">
          <a class="nav-link" data-toggle="collapse" href="#products-dropdown">
            <i class="nav-icon fas fa-boxes"></i>
            <p>
              Products
			  <span class="caret"></span>
            </p>
          </a>
          <div id="products-dropdown" class="panel-collapse collapse">
			<div class="panel-body">
			  <ul class="nav navbar-nav">
                <li class="nav-item" data-page="Product Categories">
                  <a href="{{route('product_category.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-list"></i>
                    <p>
                      Categories
                    </p>
                  </a>
                </li>
                <li class="nav-item" data-page="Product Sections">
                  <a href="{{route('product_section.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>
                      Sections
                    </p>
                  </a>
                </li>
                <li class="nav-item" data-page="Section Items">
                  <a href="{{route('product_section_item.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-list"></i>
                    <p>
                      Section Items
                    </p>
                  </a>
                </li>
                <li class="nav-item" data-page="Product List">
                  <a href="{{route('product.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>
                      Product List
                    </p>
                  </a>
                </li>
                <li class="nav-item" data-page="Product Details">
                  <a href="{{route('product_detail.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-list"></i>
                    <p>
                      Product Details
                    </p>
                  </a>
                </li>
			  </ul>
			</div>
		  </div>
		</li>
        @endif

        @if (in_array($role, ['Super', 'Admin', 'Partner', 'Both']))
        <li class="nav-item" data-page="Products">
          <a href="{{route('partners.index')}}" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Partners
            </p>
          </a>
        </li>
        @endif

        <li class="nav-item" data-page="Leads">
          <a href="{{route('leads.index')}}" class="nav-link">
            <i class="nav-icon fas fa-address-card"></i>
            <p>
              Leads
            </p>
          </a>
        </li>

        @if (in_array($role, ['Super', 'Admin']))
        <li class="nav-item" data-page="Categories">
          <a href="{{route('categories.index')}}" class="nav-link">
            <i class="nav-icon fa fa-list-alt"></i>
            <p>
              Categories
            </p>
          </a>
        </li>

        <li class="nav-item" data-page="Services">
          <a href="{{route('services.index')}}" class="nav-link">
            <i class="nav-icon fas fa-cogs"></i>
            <p>
              Services
            </p>
          </a>
        </li>

        <li class="nav-item" data-page="Preferences">
          <a href="{{route('pref_options.index')}}" class="nav-link">
            <i class="nav-icon fas fa-cogs"></i>
            <p>
              Preferences
            </p>
          </a>
        </li>
        
        <li class="nav-item" data-page="Dashboard Links">
          <a href="{{route('dashboardlinks.index')}}" class="nav-link">
            <i class="nav-icon fa fa-link" aria-hidden="true"></i>
            <p>
              Dashboard Links
            </p>
          </a>
        </li>

        <li class="nav-item" data-page="Contact Us">
          <a href="{{route('contact_us.index')}}" class="nav-link">
            <i class="nav-icon far fa-address-book"></i>
            <p>
              Contact Us
            </p>
          </a>
        </li>

        <li class="nav-item" data-page="Testimonials">
          <a href="{{route('testimonials.index')}}" class="nav-link">
            <i class="nav-icon fa fa-quote-left" aria-hidden="true"></i>
            <p>
              Testimonials
            </p>
          </a>
        </li>

        <li class="nav-item" data-page="Topics">
          <a href="{{route('topics.index')}}" class="nav-link">
            <i class="nav-icon fas fa-comments"></i>
            <p>
              Topics
            </p>
          </a>
        </li>
        @endif

        <li class="nav-item">
          <a href="{{route('admin.change_password')}}" class="nav-link">
            <i class="nav-icon fas fa-key"></i>
            <p>
              Change Password
            </p>
          </a>
        </li>

        <hr style="width:100%; border-top:1px solid rgb(215, 215, 215);">

        <li class="nav-item">
          <a href="{{route('admin.logout')}}" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>