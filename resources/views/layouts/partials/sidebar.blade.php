<!-- Sidebar -->
<div class="sidebar sidebar-style-2" data-background-color="dark2">			
	<div class="sidebar-wrapper scrollbar scrollbar-inner">
		<div class="sidebar-content">
			<div class="user">
				<div class="avatar-sm float-left mr-2">
					<img src="Atlantis/img/mujer.png" alt="..." class="avatar-img rounded-circle">
				</div>
				<div class="info">
					<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
						<span>
							
							<span class="user-level">Administrador</span>
							<span class="caret"></span>
						</span>
					</a>
					<div class="clearfix"></div>

					<div class="collapse in" id="collapseExample">
						<ul class="nav">
							<li>
								<a href="#profile">
									<span class="link-collapse">My Profile</span>
								</a>
							</li>
							<li>
								<a href="#edit">
									<span class="link-collapse">Edit Profile</span>
								</a>
							</li>
							<li>
								<a href="#settings">
									<span class="link-collapse">Settings</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<ul class="nav nav-primary">
				<li class="nav-item">
				
					<a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
						<i class="fas fa-home"></i>
						<p>Home</p>
						<span class="caret"></span>
					</a>
					
				</li>
				<li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#base">
						<i class="fas fa-layer-group"></i>
						<p>Citas</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="base">
						<ul class="nav nav-collapse">														
							<li>
								<a href="{{route('citas.index')}}">
									<span class="sub-item">Mostrar</span>
								</a>
							</li>
							<li>
								<a href="{{route('citas.create')}}">
									<span class="sub-item">Nuevo</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#sidebarLayouts">
						<i class="fas fa-male"></i>
						<p>Pacientes</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="sidebarLayouts">
						<ul class="nav nav-collapse">
							<li>
								<a href="{{route('patients.index')}}">
									<span class="sub-item">Mostrar</span>
								</a>
							</li>
							<li>
								<a href="{{route('patients.create')}}">
									<span class="sub-item">Nuevo</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#forms">
						<i class="fas fa-user-md"></i>
						<p>Médico-Odontólogo</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="forms">
						<ul class="nav nav-collapse">
							<li>
								<a href="{{route('dentist.index')}}">
									<span class="sub-item">Mostrar</span>
								</a>
							</li>
							<li>
								<a href="{{route('dentist.create')}}">
									<span class="sub-item">Nuevo</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#Horarios">
					<i class="fa fa-calendar"></i>
						<p>Horarios</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="Horarios">
						<ul class="nav nav-collapse">
							<li>
								<a href="{{route('horarios.index')}}">
									<span class="sub-item">Mostrar</span>
								</a>
							</li>
							
							
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#Historia">
					<i class="fa fa-book"></i>
						<p>Historia Clínica</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="Historia">
						<ul class="nav nav-collapse">
							<li>
								<a href="{{route('historia_clinica.index')}}">
									<span class="sub-item">Mostrar</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#Facturación">
					<i class="fa fa-balance-scale"></i>
						<p>Facturación</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="Facturación">
						<ul class="nav nav-collapse">
							<li>
								<a href="{{route('documents.index')}}">
									<span class="sub-item">Mostrar</span>
								</a>
							</li>
							<li>
								<a href="{{route('documents.create')}}">
									<span class="sub-item">Nuevo comprobante electrónico</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#Productos">
					<i class="fa fa-balance-scale"></i>
						<p>Productos</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="Productos">
						<ul class="nav nav-collapse">
							<li>
								<a href="{{route('items.index')}}">
									<span class="sub-item">Mostrar</span>
								</a>
							</li>
							<li>
								<a href="{{route('items.create')}}">
									<span class="sub-item">Nuevo</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#Reportes">
					<i class="fa fa-file-pdf"></i>
						<p>Reportes</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="Reportes">
						<ul class="nav nav-collapse">
							<li>
								<a href="specialty.php">
									<span class="sub-item">Pacientes</span>
								</a>
							</li>
							<li>
								<a href="specialty.php">
									<span class="sub-item">Médico-Odontólogo</span>
								</a>
							</li>
							<li>
								<a href="{{route('reports.orders')}}">
									<span class="sub-item">Orden de Pagos</span>
								</a>
							</li>
							<li>
								<a href="{{route('reports.citas')}}">
									<span class="sub-item">Citas</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#Historial">
					<i class="fa fa-history"></i>
						<p>Historial</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="Historial">
						<ul class="nav nav-collapse">
							<li>
								<a href="specialty.php">
									<span class="sub-item">Mostrar</span>
								</a>
							</li>
							
						</ul>
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>
<!-- End Sidebar -->