<x-layout :title="($title ?? 'Recette') . ' – KiM'" :meta="'Étapes, temps, ingrédients et substitutions.'">
  <x-header />

  <main>
    <section class="section">
      <div class="container">
        <a href="{{ url()->previous() }}" class="meta" style="text-decoration:none">← Retour</a>
        <h1 style="margin-top:8px">{{ $title ?? 'Curry de légumes' }}</h1>
        <p class="meta">{{ $time ?? 35 }} min • {{ $difficulty ?? 'Facile' }} • {{ $servings ?? 4 }} portions</p>

        <div class="grid" style="grid-template-columns:1fr 1fr;gap:20px">
          <div class="card" style="grid-column:span 1">
            <img class="thumb" src="https://placehold.co/1000x600?text={{ urlencode($title ?? 'Recette') }}" alt="{{ $title ?? 'Image recette' }}">
            <div class="card-body">
              <h3>Ingrédients</h3>
              <ul class="meta">
                <li>2 carottes</li>
                <li>1 oignon</li>
                <li>200 g de lentilles</li>
                <li>Épices au goût</li>
              </ul>
            </div>
          </div>
          <div class="card" style="grid-column:span 1">
            <div class="card-body">
              <h3>Étapes</h3>
              <ol class="meta">
                <li>Émincer l’oignon et couper les carottes.</li>
                <li>Faire revenir, ajouter les lentilles, couvrir d’eau.</li>
                <li>Laisser mijoter {{ $time ?? 35 }} min, assaisonner.</li>
              </ol>
              <button class="cta-large" style="margin-top:12px">Ajouter à mon plan</button>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <x-footer />
</x-layout>
