<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <div class="nav-link">        <div class="profile-image">
          <img src="{{asset('assets/images/faces/face16.jpg')}}" alt="image" />
        </div>
        <div class="profile-name">
          <p class="name">
            Bonjour {{ Auth::user()->nom }} {{ Auth::user()->prenom }}
          </p>
          <p class="designation">
            Vendeur
          </p>
        </div>
      </div>
    </li>
    <li class="nav-item @if($table === 'dachboard')  active @endif">
      <a class="nav-link" href="/">
        <i class="fa fa-home menu-icon"></i>
        <span class="menu-title">Acceuil</span>
      </a>
    </li>

    <li class="nav-item  @if($table === 'familles')  active @endif">
      <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">
        <i class="fab fa-trello menu-icon"></i>
        <span class="menu-title">Les Familles</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="page-layouts">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="/familles">Tous les Familles</a></li>
          <li class="nav-item @if($table === 'familles')  active @endif"> <a class="nav-link" href="/familles/create">Ajouteé Famille</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item @if($table === 'produits')  active @endif">
      <a class="nav-link collapsed" data-toggle="collapse" href="#e-commerce" aria-expanded="false" aria-controls="e-commerce">
        <i class="fas fa-shopping-cart menu-icon"></i>
        <span class="menu-title">Les Produits</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="e-commerce" style="">
        <ul class="nav flex-column sub-menu">

          <li class="nav-item"> <a class="nav-link" href="/produits"> Tous les Produits </a></li>
          <li class="nav-item  @if($table === 'produits')  active @endif"> <a class="nav-link" href="/produits/create"> Pricing Table </a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item d-none d-lg-block  @if($table == 'conditionnements')  active @endif">
      <a class="nav-link" data-toggle="collapse" href="#sidebar-layouts" aria-expanded="false" aria-controls="sidebar-layouts">
        <i class="fas fa-cubes menu-icon"></i>
        <span class="menu-title">Les Conditionnements</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="sidebar-layouts">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="/conditionnements">tous les conditionnements</a></li>
          <li class="nav-item @if($table == 'conditionnements')  active @endif"> <a class="nav-link" href="/conditionnements/create">Ajoutée conditionnement</a></li>

        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
      <i class="fas fa-file-invoice-dollar menu-icon"></i>
              <span class="menu-title">List du Bon...</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ route('bonentres.index') }}"> d'entree</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('bonsorts.index') }}"> sortie</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('bonlivrasons.index') }}"> livraison</a></li>
  
        </ul>
      </div>
    </li>

  </ul>
</nav>