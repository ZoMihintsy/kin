<header id="top" class="site-header">
    <div class="container">
      <div class="navbar">
        <a href="{{ route('home') }}" class="brand" aria-label="Accueil KiM">
          <span class="logo">KiM</span><span>Kossà I Mange</span>
        </a>
  
        <nav aria-label="Navigation principale">
          <ul>
            <li><a href="{{ route('about.show') }}">À propos</a></li>
            <li><a href="{{ route('recipes.index') }}" id="nav-recettes">Recettes</a></li>
            <li><a href="{{ route('contact.show') }}">Contact</a></li>
          </ul>
        </nav>
  
        <div style="display:flex;align-items:center;gap:8px">
          {{-- Bouton vers la liste des recettes --}}
          <a href="{{ route('recipes.index') }}" class="cta-small">Voir les recettes</a>
  
          {{-- Liens utilisateur --}}
          @auth
            <a href="{{ route('dashboard') }}" class="cta-small" style="background:var(--green)">Mon compte</a>
            <form method="POST" action="{{ route('logout') }}" style="display:inline">
              @csrf
              <button type="submit" class="cta-small" style="background:#374151">Se déconnecter</button>
            </form>
          @else
            <a href="{{ route('filament.client.auth.login') }}" class="cta-small">Se connecter</a>
            <a href="{{ route('filament.client.auth.register') }}" class="cta-small" style="background:var(--green)">S’inscrire</a>
          @endauth
  
          {{-- Menu burger pour mobile --}}
          <button class="menu-btn" aria-label="Ouvrir le menu" id="menuBtn">☰</button>
        </div>
      </div>
  
      {{-- Menu mobile --}}
      <div class="mobile-panel" id="mobilePanel" role="dialog" aria-label="Menu mobile">
        <div class="container" style="padding:0">
          <a href="{{ route('about.show') }}">À propos</a>
          <a href="{{ route('recipes.index') }}">Recettes</a>
          <a href="{{ route('contact.show') }}">Contact</a>
          @auth
            <a href="{{ route('dashboard') }}">Mon compte</a>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" style="background:none;border:none;padding:10px;text-align:left;width:100%">Se déconnecter</button>
            </form>
          @else
            <a href="{{ route('login') }}">Se connecter</a>
            <a href="{{ route('register') }}">S’inscrire</a>
          @endauth
        </div>
      </div>
    </div>
  </header>
  