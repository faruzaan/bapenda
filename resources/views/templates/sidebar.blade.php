<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="{{route('dashboard')}}" class="brand-link">
		<img src="{{asset("assets")}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">AdminLTE 3</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="info">
				<a href="#" class="d-block">{{Auth::user()->name}}</a>
			</div>
		</div>


		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
							with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="{{ url('/pegawai') }}" class="nav-link">
						<i class="nav-icon far fa-circle text-info"></i>
						<p>Data Pegawai</p>
					</a>
				</li>
                <li class="nav-item">
					<a href="{{ url('/golongan') }}" class="nav-link">
						<i class="nav-icon far fa-circle text-info"></i>
						<p>Data Golongan</p>
					</a>
				</li>
                <li class="nav-item">
					<a href="{{ url('/jabatan') }}" class="nav-link">
						<i class="nav-icon far fa-circle text-info"></i>
						<p>Data Jabatan</p>
					</a>
				</li>
                <li class="nav-item">
					<a href="{{ url('/pangkat') }}" class="nav-link">
						<i class="nav-icon far fa-circle text-info"></i>
						<p>Data Pangkat</p>
					</a>
				</li>
                <li class="nav-item">
					<a href="{{ url('/sppd') }}" class="nav-link">
						<i class="nav-icon far fa-circle text-info"></i>
						<p>Data SPPD</p>
					</a>
				</li>
                <li class="nav-item">
					<a href="{{ url('/uang-harian') }}" class="nav-link">
						<i class="nav-icon far fa-circle text-info"></i>
						<p>Uang Harian</p>
					</a>
				</li>
                <li class="nav-item">
					<a href="{{ url('/kwitansi') }}" class="nav-link">
						<i class="nav-icon far fa-circle text-info"></i>
						<p>R. Biaya & Kwitansi</p>
					</a>
				</li>
                <li class="nav-item">
					<a href="{{ url('/cetaksppd') }}" class="nav-link">
						<i class="nav-icon far fa-circle text-info"></i>
						<p>Cetak SPPD</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
