
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="{{ url('home') }}"><i class='fa fa-home'></i> <span> Início</span></a></li>
            <li><a href="{{ url('temperatura') }}"><i class='fas fa-thermometer-quarter'></i> <span> Temperatura</span></a></li>
            <li><a href="{{ url('umidade') }}"><i class='fab fa-cloudversify'></i> <span> Umidade</span></a></li>
            <li><a href="{{ url('altitude') }}"><i class='fab fa-cloudscale'></i> <span> Altitude</span></a></li>
            <li><a href="{{ url('pressao') }}"><i class='fas fa-tachometer-alt'></i> <span> Pressão</span></a></li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
