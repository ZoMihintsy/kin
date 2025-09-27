<x-layout :title="'Mon Espace – KiM'" :meta="'Tableau de bord utilisateur'">
    <x-header />
  
    <main class="section">
      <div class="container">
        {{-- Titre + flash message --}}
        <h1 style="margin:0">Bonjour, {{ auth()->user()->name }} 👋</h1>
        <p class="meta" style="margin:6px 0 18px">Bienvenue dans ton espace KiM.</p>
        @if (session('status'))
          <div class="card" style="padding:12px;margin-bottom:12px">
            <strong>✅ {{ session('status') }}</strong>
          </div>
        @endif
  
        {{-- Statistiques rapides --}}
        <div class="info-stripe" style="margin-bottom:18px">
          <div class="info">
            <span class="badge" style="background:rgba(46,125,50,.1); color:#1f4d22">Publiées</span>
            <h3 style="font-size:28px; margin:8px 0 0">{{ $countPublished ?? 0 }}</h3>
            <p class="meta">Recettes visibles publiquement</p>
          </div>
          <div class="info">
            <span class="badge">En attente</span>
            <h3 style="font-size:28px; margin:8px 0 0">{{ $countPending ?? 0 }}</h3>
            <p class="meta">En modération</p>
          </div>
          <div class="info">
            <span class="badge" style="background:rgba(255,179,0,.18); color:#7a4c00">Brouillons</span>
            <h3 style="font-size:28px; margin:8px 0 0">{{ $countDraft ?? 0 }}</h3>
            <p class="meta">À finaliser</p>
          </div>
        </div>
  
        {{-- Actions rapides --}}
        <div class="grid" style="margin-bottom:20px">
          <div class="card" style="grid-column:span 4">
            <div class="card-body">
              <h3>Ajouter une recette</h3>
              <p class="meta">Partage tes idées anti-gaspi.</p>
              <a href="{{ route('recipes.create') }}" class="cta-large" style="width:auto">Créer une recette</a>
            </div>
          </div>
  
          <div class="card" style="grid-column:span 4">
            <div class="card-body">
              <h3>Mon profil</h3>
              <p class="meta">Nom, email, mot de passe…</p>
              @if (Route::has('profile.edit'))
                <a href="{{ route('profile.edit') }}" class="cta-large" style="width:auto">Modifier mon profil</a>
              @endif
            </div>
          </div>
  
          <div class="card" style="grid-column:span 4">
            <div class="card-body">
              <h3>Voir mes recettes</h3>
              <p class="meta">Liste complète</p>
              <a href="#mes-recettes" class="cta-large" style="width:auto">Accéder</a>
            </div>
          </div>
        </div>
  
        {{-- Mes recettes --}}
        <h2 id="mes-recettes" style="margin:0 0 10px">Mes recettes</h2>
  
        <div class="grid" role="list">
          @php
            $labels = ['','Facile','Intermédiaire','Avancé'];
          @endphp
  
          @forelse($recipes as $recipe)
            <article class="card" role="listitem" style="grid-column: span 4">
              <a href="{{ route('recipes.show', $recipe->slug) }}" style="text-decoration:none;color:inherit">
                <img class="thumb"
                     src="{{ $recipe->image_path ? Storage::url($recipe->image_path) : 'https://placehold.co/800x500?text='.urlencode($recipe->title) }}"
                     alt="Image de {{ $recipe->title }}">
              </a>
  
              <div class="card-body">
                <div class="row">
                  <span class="title">{{ $recipe->title }}</span>
                  <span class="meta">
                    {{ $recipe->time_minutes ?? 20 }} min •
                    {{ $labels[$recipe->difficulty ?? 1] ?? 'Facile' }}
                  </span>
                </div>
  
                {{-- Statut --}}
                <div style="margin:8px 0">
                  @php $status = $recipe->status ?? 'published'; @endphp
                  @if($status === 'published')
                    <span class="badge" style="background:rgba(46,125,50,.1); color:#1f4d22">Publié</span>
                  @elseif($status === 'pending')
                    <span class="badge">En attente</span>
                  @else
                    <span class="badge" style="background:rgba(255,179,0,.18); color:#7a4c00">Brouillon</span>
                  @endif
                </div>
  
                {{-- Actions --}}
                <div style="display:flex; gap:8px; flex-wrap:wrap; margin-top:6px">
                  <a href="{{ route('recipes.show', $recipe->slug) }}" class="cta-small" style="background:#111827">Voir</a>
  
                  @if(Route::has('recipes.edit'))
                    <a href="{{ route('recipes.edit', $recipe->slug) }}" class="cta-small" style="background:var(--yellow); color:#1f2937">Modifier</a>
                  @endif
  
                  @if(Route::has('recipes.destroy'))
                    <form method="POST" action="{{ route('recipes.destroy', $recipe->slug) }}" onsubmit="return confirm('Supprimer cette recette ?');">
                      @csrf @method('DELETE')
                      <button type="submit" class="cta-small" style="background:var(--red)">Supprimer</button>
                    </form>
                  @endif
                </div>
              </div>
            </article>
          @empty
            <div class="card" style="grid-column: span 12">
              <div class="card-body">
                <p class="meta">Tu n’as pas encore de recettes.</p>
                <a href="{{ route('recipes.create') }}" class="cta-large" style="width:auto">Créer ma première recette</a>
              </div>
            </div>
          @endforelse
        </div>
  
        {{-- Pagination --}}
        @if(method_exists($recipes, 'links'))
          <div style="margin-top:14px">
            {{ $recipes->withQueryString()->links() }}
          </div>
        @endif
      </div>
    </main>
  
    <x-footer />
  </x-layout>
  