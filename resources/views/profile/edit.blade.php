<x-layout :title="'Mon profil – KiM'">
    <x-header />
  
    <main class="section">
      <div class="container">
        <h1>Mon profil</h1>
        @if (session('status'))
          <div class="card" style="padding:12px;margin:10px 0"><strong>{{ session('status') }}</strong></div>
        @endif
  
        {{-- Formulaire profil --}}
        <form class="search-card" method="POST" action="{{ route('profile.update') }}">
          @csrf @method('PATCH')
  
          <label>Nom
            <input type="text" name="name" value="{{ old('name', $user->name) }}">
            @error('name')<small class="meta" style="color:#b91c1c">{{ $message }}</small>@enderror
          </label>
  
          <label>Email
            <input type="email" name="email" value="{{ old('email', $user->email) }}">
            @error('email')<small class="meta" style="color:#b91c1c">{{ $message }}</small>@enderror
          </label>
  
          <div class="filters" style="margin-top:10px">
            <label>Nouveau mot de passe (optionnel)
              <input type="password" name="password" placeholder="••••••••">
              @error('password')<small class="meta" style="color:#b91c1c">{{ $message }}</small>@enderror
            </label>
            <label>Confirmer le mot de passe
              <input type="password" name="password_confirmation" placeholder="••••••••">
            </label>
          </div>
  
          <button class="cta-large" type="submit" style="width:auto">Sauvegarder</button>
        </form>
  
        {{-- Suppression du compte --}}
        <form class="search-card" method="POST" action="{{ route('profile.destroy') }}" style="margin-top:16px">
          @csrf @method('DELETE')
          <h3>Supprimer mon compte</h3>
          <p class="meta">Action irréversible. Confirme avec ton mot de passe.</p>
          <label>Mot de passe
            <input type="password" name="password" placeholder="••••••••">
            @error('password')<small class="meta" style="color:#b91c1c">{{ $message }}</small>@enderror
          </label>
          <button class="cta-large" type="submit" style="background:#b91c1c;width:auto">Supprimer</button>
        </form>
      </div>
    </main>
  
    <x-footer />
  </x-layout>
  