/* assets/js/pages/about.js (v3)
   Reveal + typewriter
*/
(() => {
  document.documentElement.classList.add("js");

  // Reveal
  const items = Array.from(document.querySelectorAll(".gs-reveal"));
  if ("IntersectionObserver" in window) {
    const io = new IntersectionObserver((entries) => {
      entries.forEach((e) => {
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

  // Typewriter
  const typeEl = document.querySelector(".gs-ab3-type");
  if (typeEl) {
    const phrases = (typeEl.dataset.phrases || "")
      .split("|")
      .map((s) => s.trim())
      .filter(Boolean);
    if (phrases.length) {
      let wordIdx = 0;
      let charIdx = 0;
      let dir = 1;

      const tick = () => {
        const word = phrases[wordIdx];
        typeEl.textContent = word.slice(0, charIdx);

        if (dir === 1) {
          if (charIdx < word.length) {
            charIdx += 1;
            setTimeout(tick, 60);
          } else {
            dir = -1;
            setTimeout(tick, 1200);
          }
        } else {
          if (charIdx > 0) {
            charIdx -= 1;
            setTimeout(tick, 35);
          } else {
            dir = 1;
            wordIdx = (wordIdx + 1) % phrases.length;
            setTimeout(tick, 300);
          }
        }
      };

      tick();
    }
  }
})();
