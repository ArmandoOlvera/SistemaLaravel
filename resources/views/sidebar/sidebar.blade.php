<div class="sidebar">
  <nav class="sidebar-nav">
    <ul class="nav">
      
      <li @click="menu=0" class="nav-item">
        <a class="nav-link active" ><i class="icon-speedometer"></i> Escritorio</a>
      </li>
      
      <li class="nav-title">
        Mantenimiento
      </li>
      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-bag"></i> Roles</a>
        <ul class="nav-dropdown-items">
          <li  @click="menu=1"  class="nav-item">
            <a class="nav-link" ><i class="icon-bag"></i> Ver Roles</a>
          </li>
          <li @click="menu=2" class="nav-item">
            <a class="nav-link" ><i class="icon-bag"></i> Agregar Rol</a>
          </li>
        </ul>
      </li>
      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-wallet"></i> Personas</a>
        <ul class="nav-dropdown-items">
          <li class="nav-item">
            <a  @click="menu=3" class="nav-link"  ><i class="icon-wallet"></i> Ver Personas</a>
          </li>
          <li class="nav-item">
            <a @click="menu=4" class="nav-link"  ><i class="icon-notebook"></i> Agregar Personas</a>
          </li>
        </ul>
      </li>
      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-basket"></i> Usuarios</a>
        <ul class="nav-dropdown-items">
          <li class="nav-item">
            <a @click="menu=5" class="nav-link"  ><i class="icon-basket-loaded"></i> Ver Usuarios</a>
          </li>
          <li class="nav-item">
            <a @click="menu=6" class="nav-link"  ><i class="icon-notebook"></i> Agregar Usuarios</a>
          </li>
        </ul>
      </li>
      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-people"></i> Acceso</a>
        <ul class="nav-dropdown-items">
          <li class="nav-item">
            <a @click="menu=7" class="nav-link" href="i#"><i class="icon-user"></i> Usuarios</a>
          </li>
          <li class="nav-item">
            <a @click="menu=8" class="nav-link" href="#"><i class="icon-user-following"></i> Roles</a>
          </li>
        </ul>
      </li>
      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-pie-chart"></i> Reportes</a>
        <ul class="nav-dropdown-items">
          <li class="nav-item">
            <a class="nav-link" href="i#"><i class="icon-chart"></i> Reporte Ingresos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="icon-chart"></i> Reporte Ventas</a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="main.html"><i class="icon-book-open"></i> Ayuda <span class="badge badge-danger">PDF</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="main.html"><i class="icon-info"></i> Acerca de...<span class="badge badge-info">IT</span></a>
      </li>
    </ul>
  </nav>
  <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>