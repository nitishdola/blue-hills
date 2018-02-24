<nav>
	<ul class="nav">
		<li><a href="javascript:void(0)" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
		<li><a href="javascript:void(0)" class=""><i class="lnr lnr-code"></i> <span>Customers</span></a></li>
		<li><a href="javascript:void(0)" class=""><i class="lnr lnr-chart-bars"></i> <span>Bookings</span></a></li>
		
		<li>
			<a href="#subPagesBusRoute" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Bus Routes</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
			<div id="subPagesBusRoute" class="collapse ">
				<ul class="nav">
					<li><a href="{{ route('admin.bus.routes.create') }}" class=""> Add Bus Route</a></li>
					<li><a href="javascript:void(0)" class="">View All Bus Route</a></li>
				</ul>
			</div>
		</li>
		<li>
			<a href="#subPagesBus" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Bus</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
			<div id="subPagesBus" class="collapse ">
				<ul class="nav">
					<li><a href="{{ route('admin.bus.create') }}" title="Add a Bus" class=""> Add Bus</a></li>
					<li><a href="{{ route('admin.bus') }}" title="View all buses" class="">View All Buses</a></li>
				</ul>
			</div>
		</li>
		<li>
			<a href="#subPagesAgents" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Agents</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
			<div id="subPagesAgents" class="collapse ">
				<ul class="nav">
					<li><a href="javascript:void(0)" class=""> Add Agent</a></li>
					<li><a href="javascript:void(0)" class="">View All Agents</a></li>
					<li><a href="javascript:void(0)" class="">View All Agent Bookings</a></li>
				</ul>
			</div>
		</li>
		<!-- 
		<li><a href="typography.html" class=""><i class="lnr lnr-text-format"></i> <span>Typography</span></a></li>
		<li><a href="icons.html" class=""><i class="lnr lnr-linearicons"></i> <span>Icons</span></a></li> 
		-->
	</ul>
</nav>