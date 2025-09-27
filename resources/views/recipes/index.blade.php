<x-layout :title="'Recettes – KiM'" :meta="'Liste des recettes adaptées à vos ingrédients.'">
  <x-header />

  <main>
    <section class="hero">
      <div class="container">
        <h1>Recettes</h1>
        <p class="meta">Filtre rapide : ingrédients, temps, difficulté.</p>

        <form class="search-card" method="GET" action="{{ route('recipes.index') }}">
          <div class="chips" id="chips">
            <input id="ingInput" type="text" name="q" value="{{ request('q') }}" placeholder="Ex : tomates, œufs, pâtes…">
          </div>
          <div class="filters" style="margin: 8px 0 16px">
            <div class="range">
              <label for="timeRange">Temps max (min)</label>
              <output id="timeOut">{{ request('t', 30) }}</output>
              <input id="timeRange" type="range" min="5" max="120" step="5" value="{{ request('t', 30) }}" name="t">
            </div>
            <div class="range">
              <label for="diffRange">Difficulté</label>
              <output id="diffOut">Facile</output>
              <input id="diffRange" type="range" min="1" max="3" step="1" value="{{ request('d', 1) }}" name="d">
            </div>
          </div>
          <button class="cta-large" id="goBtn" type="submit">Filtrer</button>
        </form>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="grid" role="list">
          @foreach(range(1,9) as $i)
            <x-recipe-card :title="'Recette ' . $i" :time="10+$i" difficulty="Facile" :image="'https://placehold.co/800x500?text=Recette+' . $i" :href="route('recipes.show','recette-'.$i)" />
          @endforeach
        </div>
      </div>
    </section>
  </main>

  <x-footer />
</x-layout>
