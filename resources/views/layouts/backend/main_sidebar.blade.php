    <!-- Left Sidebar start-->
    <div class="side-menu-fixed">
        <div class="scrollbar side-menu-bg">
         <ul class="nav navbar-nav side-menu" id="sidebarnav">
           <!-- menu item Dashboard-->
           <li>
            <li style="font-family: 'Cairo', sans-serif;
            "> <a href="{{route('dashboard')}}">{{ trans('backend/main_sidebar.dashboard') }}</a> </li>

        
           </li>

           <!-- menu title -->
           <li style="font-family: 'Cairo', sans-serif;
           " class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{ trans('backend/main_sidebar.Components') }}</li>
           

           <!-- menu item Elements-->
           @can('invoices')
           <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
              <div class="pull-left"><i class="ti-calendar"></i><span  style="font-family: 'Cairo', sans-serif; " class="right-nav-text">{{__('website/invoice.invoice-title')}}</span></div>
              <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
            </a>
            <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
              @can('view invoice')
              <li  style="font-family: 'Cairo', sans-serif; "> <a href="{{route('invoices.index')}}">{{__('website/invoice.invoice')}}</a> </li>
              @endcan
              @can('create invoice')
              <li  style="font-family: 'Cairo', sans-serif; " > <a href="{{route('invoices.create')}}">{{__('website/invoice.create-invoice')}}</a> </li>
              @endcan
            </ul>
          </li>
          @endcan

          @can('Elements')
           <li>
             <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
              <div class="pull-left"><i class="ti-calendar"></i><span style="font-family: 'Cairo', sans-serif;" class="right-nav-text">{{ trans('backend/main_sidebar.Components') }}</span></div>
              <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
             </a>
             <ul id="elements" class="collapse" data-parent="#sidebarnav">
              @can('categories')
              <li style="font-family: 'Cairo', sans-serif;"> <a href="{{route('categories.index')}}">{{ trans('website/category.categories') }}</a> </li>
              @endcan
              @can('Products')
              <li style="font-family: 'Cairo', sans-serif; "> <a href="{{route('products.index')}}">{{ trans('website/product.products') }}</a> </li>
           @endcan
             </ul>
           </li>
           @endcan

          
           
           <!-- menu item Charts-->
           <li style="font-family: 'Cairo', sans-serif; " class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{ trans('backend/main_sidebar.Permissions') }}</li>
            <!-- permissions-->
            @can('permissions')
            <li>
              <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart">
                <div class="pull-left"><i class="ti-pie-chart"></i><span style="font-family: 'Cairo', sans-serif; " class="right-nav-text">{{__('backend/main_sidebar.users')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
              </a>
              <ul id="chart" class="collapse" data-parent="#sidebarnav">
            @can('user permission')                
                <li style="font-family: 'Cairo', sans-serif; "> <a href="{{route('roles.index')}}">{{__('backend/main_sidebar.User Permissions')}}</a> </li>
            @endcan
            @can('user list')
                <li style="font-family: 'Cairo', sans-serif; "> <a href="{{route('users.index')}}">{{__('backend/main_sidebar.users list')}}</a> </li>
            @endcan
              </ul>
            </li>            
            @endcan
           <!-- menu font icon-->
     
           <!-- menu title -->
      
           <!-- menu item table -->
           
           <!-- menu item Custom pages-->
      
           <!-- menu item Authentication-->
         
         
           <!-- menu item Multi level-->
          
            
      
     </div> 
   </div> 
   
   <!-- Left Sidebar End-->