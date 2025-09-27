<x-layout :title="'Contact – KiM'" :meta="'Contactez l’équipe KIM – Kossà I Mange.'">
  <x-header />

  <main>
    <section class="hero">
      <div class="container">
        <h1>Contact</h1>
        <p class="meta">Une question, une idée ? Écris-nous.</p>

        <form class="search-card" method="POST" action="#">
          @csrf
          <div class="filters" style="grid-template-columns:1fr 1fr">
            <div>
              <label for="name">Nom</label>
              <input id="name" name="name" type="text" placeholder="Votre nom">
            </div>
            <div>
              <label for="email">Email</label>
              <input id="email" name="email" type="email" placeholder="vous@exemple.com">
            </div>
          </div>
          <div style="margin-top:10px">
            <label for="message">Message</label>
            <textarea id="message" name="message" rows="6" style="width:100%;padding:10px;border:1px solid #e5e7eb;border-radius:10px"></textarea>
          </div>
          <button class="cta-large" style="margin-top:12px" type="submit">Envoyer</button>
        </form>
      </div>
    </section>
  </main>

  <x-footer />
</x-layout>
