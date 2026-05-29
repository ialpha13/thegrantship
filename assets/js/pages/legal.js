/* assets/js/pages/legal.js
   Legal pages JS (Cookie Notice + FAQ)
   Extracted from inline scripts; behavior preserved.
*/
(() => {
  // Cookie Notice: demo button only (does nothing yet)
  const demoBtn = document.getElementById('gsCookieBannerDemo');
  if (demoBtn) {
    demoBtn.addEventListener('click', () => {
      alert('Next step: I will generate a cookie banner component + consent storage if you want.');
    });
  }

  // FAQ: Accordion + search (lightweight, no dependencies)
  const faqRoot = document.querySelector('.gs-faq');
  if (faqRoot) {
    const items = Array.from(document.querySelectorAll('.gs-faq-item'));
    const search = document.getElementById('gsFaqSearch');

    function closeAll(except = null) {
      items.forEach(it => {
        if (except && it === except) return;
        it.classList.remove('is-open');
        const a = it.querySelector('.gs-faq-a');
        if (a) a.style.maxHeight = '0px';
      });
    }

    function openItem(it) {
      it.classList.add('is-open');
      const a = it.querySelector('.gs-faq-a');
      const inner = it.querySelector('.gs-faq-aInner');
      if (a && inner) a.style.maxHeight = (inner.scrollHeight + 18) + 'px';
    }

    items.forEach(it => {
      const btn = it.querySelector('.gs-faq-q');
      const a = it.querySelector('.gs-faq-a');
      const inner = it.querySelector('.gs-faq-aInner');

      // start closed
      if (a) a.style.maxHeight = '0px';

      btn?.addEventListener('click', () => {
        const isOpen = it.classList.contains('is-open');
        closeAll(it);
        if (!isOpen) openItem(it);
      });

      // Keep height correct on resize if open
      window.addEventListener('resize', () => {
        if (it.classList.contains('is-open') && a && inner) {
          a.style.maxHeight = (inner.scrollHeight + 18) + 'px';
        }
      });
    });

    // If URL hash points to an item, open it
    if (location.hash) {
      const open = document.querySelector(location.hash);
      if (open && open.classList.contains('gs-faq-item')) {
        closeAll(open);
        openItem(open);
        open.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    }

    // Search filter
    search?.addEventListener('input', () => {
      const q = search.value.trim().toLowerCase();
      items.forEach(it => {
        const text = ((it.getAttribute('data-q') || '') + ' ' + (it.innerText || '')).toLowerCase();
        it.style.display = text.includes(q) ? '' : 'none';
      });
      closeAll();
    });
  }
})();
