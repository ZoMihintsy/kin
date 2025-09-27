document.addEventListener('DOMContentLoaded', () => {
  function scrollToId(id){ document.getElementById(id)?.scrollIntoView({behavior:'smooth'}); }
  window.scrollToId = scrollToId;
  const y = document.getElementById('y'); if (y) y.textContent = new Date().getFullYear();

  const menuBtn = document.getElementById('menuBtn');
  const mobilePanel = document.getElementById('mobilePanel');
  function closeMobile(){ mobilePanel?.classList.remove('open'); }
  if (menuBtn && mobilePanel){
    menuBtn.addEventListener('click', () => mobilePanel.classList.toggle('open'));
    window.addEventListener('resize', ()=> { if(window.innerWidth>900) closeMobile(); });
  }

  // Chips
  const chips = document.getElementById('chips');
  const input = document.getElementById('ingInput');
  const state = new Set(['tomates','oignons']);
  function escapeHtml(s){ return s.replace(/[&<>"']/g, m => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#039;'}[m])); }
  function renderChips(focusInput){
    if(!chips || !input) return;
    [...chips.querySelectorAll('.chip')].forEach(n=>n.remove());
    state.forEach(v=>{
      const el = document.createElement('span');
      el.className = 'chip';
      el.innerHTML = `<span>${escapeHtml(v)}</span><button aria-label="Retirer ${escapeHtml(v)}">&times;</button>`;
      el.querySelector('button').addEventListener('click', ()=> { state.delete(v); renderChips(true); });
      chips.insertBefore(el, input);
    });
    if(focusInput) input.focus();
  }
  function addTag(value){
    const clean = (value||'').trim().toLowerCase();
    if(!clean || state.has(clean)) return;
    state.add(clean); renderChips(true);
  }
  if (chips && input){
    renderChips();
    input.addEventListener('keydown', e=>{
      if(e.key==='Enter'){ e.preventDefault(); addTag(input.value); input.value=''; }
      if(e.key===',' ){ e.preventDefault(); addTag(input.value.replace(',','')); input.value=''; }
      if(e.key==='Backspace' && input.value==='' && state.size){
        const last = Array.from(state).pop(); state.delete(last); renderChips(true);
      }
    });
  }

  const tRange = document.getElementById('timeRange');
  const tOut = document.getElementById('timeOut');
  const dRange = document.getElementById('diffRange');
  const dOut = document.getElementById('diffOut');
  const diffLabels = {1:'Facile', 2:'Intermédiaire', 3:'Avancé'};
  if (tRange && tOut){ tOut.textContent = tRange.value; tRange.addEventListener('input', ()=> tOut.textContent = tRange.value); }
  if (dRange && dOut){ dOut.textContent = diffLabels[dRange.value]; dRange.addEventListener('input', ()=> dOut.textContent = diffLabels[dRange.value]); }

  document.getElementById('goBtn')?.addEventListener('click', ()=>{
    const ingredients = Array.from(state);
    const params = new URLSearchParams({ q: ingredients.join(','), t: tRange?.value || '30', d: dRange?.value || '1' });
    document.getElementById('recettes')?.scrollIntoView({behavior:'smooth'});
    console.log('Recherche', params.toString());
  });
});