<x-layout :title="'KiM – Compose avec ce que tu as'" :meta="'Anti-gaspillage et cuisine solidaire. Indique ce que tu as, on te propose des recettes.'">
  <x-header />

  <main>
    <section class="hero">
      <div class="container">
        <div class="hero-grid">
          <div>
            <span class="eyebrow">
              <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 21c14 0 14-14 14-14S7 7 5 21Zm0 0c0-4 2-6 6-6"/></svg>
              anti-gaspillage & solidaire
            </span>
            <h1>Compose <span style="color:var(--red)">avec ce que tu as</span></h1>
            <p>Indique les ingrédients présents dans ton placard/frigo et on te propose des idées de plats. Moins de gaspillage, plus de partage.</p>

            <div class="search-card" role="search" aria-label="Trouver des recettes">
              <label for="ingInput" style="font-weight:700; font-size:14px; color:#374151">Ingrédients</label>
              <div class="chips" id="chips" aria-live="polite">
                <input id="ingInput" type="text" placeholder="Ex : tomates, œufs, pâtes…" aria-label="Ajouter un ingrédient (Entrée pour valider)" />
              </div>

              <div class="filters" style="margin: 8px 0 16px">
                <div class="range">
                  <label for="timeRange" style="font-weight:700; color:#374151">Temps max (min)</label>
                  <output id="timeOut">30</output>
                  <input id="timeRange" type="range" min="5" max="120" step="5" value="30" aria-label="Temps maximum">
                </div>
                <div class="range">
                  <label for="diffRange" style="font-weight:700; color:#374151">Difficulté</label>
                  <output id="diffOut">Facile</output>
                  <input id="diffRange" type="range" min="1" max="3" step="1" value="1" aria-label="Difficulté">
                </div>
              </div>

              <button class="cta-large" id="goBtn">
                <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"></circle><path d="m21 21-4.3-4.3"></path></svg>
                Voir les recettes adaptées
              </button>

              <p style="margin:10px 0 0; color:#6b7280; font-size:12px">
                Conseil : tape un ingrédient puis <strong>Entrée</strong> pour l’ajouter. Clique sur une pastille pour la retirer.
              </p>
            </div>
          </div>

          <aside aria-label="Suggestions du jour">
            <div class="section" style="padding-top:0">
              {{-- Ici on va récupérer les 3 dernières recettes ajouter en bdd  --}}
              <h2 style="margin-bottom:10px">Suggestions rapides</h2>
              <div class="grid">
                <x-recipe-card title="Gratin de pâtes" time="30" difficulty="Facile" image="https://images.unsplash.com/photo-1523986371872-9d3ba2e2f642?q=80&w=1200&auto=format&fit=crop" href="{{ route('recipes.show','gratin-de-pates') }}" />
                <x-recipe-card title="Salade de riz" time="15" difficulty="Facile" image="https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=1200&auto=format&fit=crop" href="{{ route('recipes.show','salade-de-riz') }}" />
                <x-recipe-card title="Curry de légumes" time="40" difficulty="Intermédiaire" image="https://images.unsplash.com/photo-1512058564366-18510be2db19?q=80&w=1200&auto=format&fit=crop" href="{{ route('recipes.show','curry-de-legumes') }}" />
              </div>
            </div>
          </aside>
        </div>
      </div>
    </section>

    <section id="apropos" class="section">
      <div class="container">
        <h2>Pourquoi KiM ?</h2>
        <div class="info-stripe">
          <div class="info">
            <span class="badge" style="background:rgba(46,125,50,.1); color:#1f4d22">
              <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4V8a4 4 0 0 1 4-4h6l2 2h2a4 4 0 0 1 4 4z"/></svg>
              Moins de gaspillage
            </span>
            <h3>Valorise ce que tu as déjà</h3>
            <p>Le moteur propose des recettes adaptées à ton placard, avec substitutions intelligentes et priorité aux produits proches de la date.</p>
          </div>
          <div class="info">
            <span class="badge">
              <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 20l9-16H3z"/></svg>
              Cuisine solidaire
            </span>
            <h3>Des repas pour ceux qui en ont besoin</h3>
            <p>Les dons et invendus sont transformés en repas par l’association partenaire. Chaque action compte.</p>
          </div>
          <div class="info">
            <span class="badge" style="background:rgba(255,179,0,.18); color:#7a4c00">
              <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 6v12M6 12h12"/></svg>
              Simple & rapide
            </span>
            <h3>Filtre par temps et niveau</h3>
            <p>Du “vite fait” au batch-cooking du week-end, ajuste la durée, la difficulté et les ustensiles.</p>
          </div>
        </div>
      </div>
    </section>

    <section id="recettes" class="section">
      <div class="container">
        <h2>Recettes populaires</h2>
        <div class="grid" role="list">
          @foreach(range(1,6) as $i)
            <x-recipe-card :title="'Recette ' . $i" :time="10+$i" difficulty="Facile" :image="'https://placehold.co/800x500?text=Recette+' . $i" :href="route('recipes.show','recette-'.$i)" />
          @endforeach
        </div>
      </div>
    </section>
  </main>

  <x-footer />
</x-layout>
