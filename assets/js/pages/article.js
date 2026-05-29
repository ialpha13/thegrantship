/* assets/js/pages/article.js
   - reveal animation
   - share button copies URL
   - optional: highlight active TOC link on scroll
*/
(() => {
  // Reveal
  const items = Array.from(document.querySelectorAll(".gs-reveal"));
  if ("IntersectionObserver" in window) {
    const io = new IntersectionObserver((entries) => {
      entries.forEach(e => {
        if (e.isIntersecting) {
          e.target.classList.add("is-in");
          io.unobserve(e.target);
        }
      });
    }, { threshold: 0.12 });
    items.forEach(el => io.observe(el));
  } else {
    items.forEach(el => el.classList.add("is-in"));
  }

  // Share
  const btn = document.getElementById("gsShareBtn");
  if (btn) {
    btn.addEventListener("click", async () => {
      const url = window.location.href;

      try {
        if (navigator.share) {
          await navigator.share({ title: document.title, url });
          return;
        }
      } catch (_) {}

      try {
        await navigator.clipboard.writeText(url);
        btn.dataset.done = "1";
        const old = btn.textContent;
        btn.textContent = "Copied";
        setTimeout(() => {
          btn.textContent = old;
          delete btn.dataset.done;
        }, 1100);
      } catch (_) {
        // fallback: do nothing quietly
      }
    });
  }

  // TOC active highlight (safe)
  const toc = document.getElementById("gsToc");
  if (!toc) return;

  const links = Array.from(toc.querySelectorAll('a[href^="#"]'));
  const ids = links.map(a => a.getAttribute("href")?.slice(1)).filter(Boolean);
  const sections = ids.map(id => document.getElementById(id)).filter(Boolean);

  if (!sections.length) return;

  const setActive = (id) => {
    links.forEach(a => a.classList.toggle("is-active", (a.getAttribute("href") === `#${id}`)));
  };

  const obs = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) setActive(entry.target.id);
    });
  }, { rootMargin: "-25% 0px -65% 0px", threshold: 0.01 });

  sections.forEach(s => obs.observe(s));
})();
