<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="profile-image">
                <img src="{{asset('assets/images/faces/face16.jpg')}}" alt="image"/>
              </div>
              <div class="profile-name">
                <p class="name">
                  Bonjour {{ Auth::user()->name }}
                </p>
                <p class="designation">
                  Vendeur
                </p>
              </div>
            </div>
          </li>
          <li class="nav-item @if($table == 'dachboard')  active @endif">
            <a class="nav-link" href="/admin/dachboard">
              <i class="fa fa-home menu-icon"></i>
              <span class="menu-title">Acceuil</span>
            </a>
          </li>
      
          <li class="nav-item  @if($table == 'familles')  active @endif">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">
              <i class="fab fa-trello menu-icon"></i>
              <span class="menu-title">Les Familles</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="/familles">Tous les Familles</a></li>
                <li class="nav-item @if($table == 'familles')  active  @endif"> <a class="nav-link" href="/familles/create">Ajouteé Famille</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item  @if($table == 'produits')  active @endif">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">
              <i class="fab fa-trello menu-icon"></i>
              <span class="menu-title">Les Produits</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="/produits">Tous les Produits</a></li>
                <li class="nav-item @if($table == 'produits')  active @endif"> <a class="nav-link" href="/produits/create">Ajouteé Produit</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item  @if($table == 'conditionnements')  active @endif">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">
              <i class="fab fa-trello menu-icon"></i>
              <span class="menu-title">Les Conditionnements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="/conditionnements">Tous les Conditionnements</a></li>
                <li class="nav-item @if($table == 'conditionnements')  active @endif"> <a class="nav-link" href="/conditionnements/create">Ajouteé Conditionnement</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item  @if($table == 'conditionnements')  active @endif">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">
              <i class="fab fa-trello menu-icon"></i>
              <span class="menu-title">Les Clients</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="/clients">Tous les Clients</a></li>
                <li class="nav-item @if($table == 'clients')  active @endif"> <a class="nav-link" href="/clients/create">Ajouteé Client</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item d-none d-lg-block">
            <a class="nav-link" data-toggle="collapse" href="#sidebar-layouts" aria-expanded="false" aria-controls="sidebar-layouts">
              <i class="fas fa-columns menu-icon"></i>
              <span class="menu-title">Sidebar Layouts</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="sidebar-layouts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="compact-menu.html">Compact menu</a></li>
                <li class="nav-item"> <a class="nav-link" href="sidebar-collapsed.html">Icon menu</a></li>
                <li class="nav-item"> <a class="nav-link" href="sidebar-hidden.html">Sidebar Hidden</a></li>
                <li class="nav-item"> <a class="nav-link" href="sidebar-hidden-overlay.html">Sidebar Overlay</a></li>
                <li class="nav-item"> <a class="nav-link" href="sidebar-fixed.html">Sidebar Fixed</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="far fa-compass menu-icon"></i>
              <span class="menu-title">Basic UI Elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../ui-features/accordions.html">Accordions</a></li>
                <li class="nav-item"> <a class="nav-link" href="../ui-features/buttons.html">Buttons</a></li>
                <li class="nav-item"> <a class="nav-link" href="../ui-features/badges.html">Badges</a></li>
                <li class="nav-item"> <a class="nav-link" href="../ui-features/breadcrumbs.html">Breadcrumbs</a></li>
                <li class="nav-item"> <a class="nav-link" href="../ui-features/dropdowns.html">Dropdowns</a></li>
                <li class="nav-item"> <a class="nav-link" href="../ui-features/modals.html">Modals</a></li>
                <li class="nav-item"> <a class="nav-link" href="../ui-features/progress.html">Progress bar</a></li>
                <li class="nav-item"> <a class="nav-link" href="../ui-features/pagination.html">Pagination</a></li>
                <li class="nav-item"> <a class="nav-link" href="../ui-features/tabs.html">Tabs</a></li>
                <li class="nav-item"> <a class="nav-link" href="../ui-features/typography.html">Typography</a></li>
                <li class="nav-item"> <a class="nav-link" href="../ui-features/tooltips.html">Tooltips</a></li>
              </ul>
              </div>
          </li>
       
        </ul>
      </nav>