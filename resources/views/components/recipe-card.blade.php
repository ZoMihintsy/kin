@props(['title' => 'Recette', 'time' => '20', 'difficulty' => 'Facile', 'image' => 'https://placehold.co/800x500', 'href' => '#'])

<article class="card" role="listitem">
  <a href="{{ $href }}" style="text-decoration:none;color:inherit">
    <img class="thumb" src="{{ $image }}" alt="Image de {{ $title }}">
    <div class="card-body">
      <div class="row">
        <span class="title">{{ $title }}</span>
        <span class="meta">{{ $time }} min • {{ $difficulty }}</span>
      </div>
    </div>
  </a>
</article>
