<section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

        

       

     

        @if (auth()->user()->level==1)
        <li class="menu-sidebar"><a href="{{ url('/home') }}"><span class="fa fa-calendar-minus-o"></span> Beranda Dashboard</span></a></li>

        <li class="menu-sidebar"><a href="{{ url('/supplier') }}"><span class="fa fa-calendar-minus-o"></span> Supplier</span></a></li>

        <li class="menu-sidebar"><a href="{{ url('/produk') }}"><span class="fa fa-calendar-minus-o"></span> Produk</span></a></li>

        <li class="menu-sidebar"><a href="{{ url('/po') }}"><span class="fa fa-calendar-minus-o"></span> Purchase Order</span></a></li>

        <li class="menu-sidebar"><a href="{{ url('/gr') }}"><span class="fa fa-calendar-minus-o"></span> Goods Receipt</span></a></li>

        <li class="menu-sidebar"><a href="{{ url('/sales') }}"><span class="fa fa-calendar-minus-o"></span> History Penjualan</span></a></li>

        <li class="menu-sidebar"><a href="{{ url('/update-perusahaan') }}"><span class="fa fa-calendar-minus-o"></span> Data Perusahaan</span></a></li>

        <li class="menu-sidebar"><a href="{{ url('/keluar') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</span></a></li>

        @elseif (auth()->user()->level==2)

        <li class="menu-sidebar"><a href="{{ url('/home') }}"><span class="glyphicon glyphicon-log-out"></span> Home</span></a></li>
        
        <li class="menu-sidebar"><a href="{{ url('/keluar') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</span></a></li>

        @endif

      </ul>
    </section>