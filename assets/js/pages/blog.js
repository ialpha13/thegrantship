/* assets/js/pages/blog.js (v3)
   Safe + non-breaking:
   - Reveal animations
   - Optional filtering/search if matching elements exist
*/
(() => {
  // Reveal
  const revealItems = Array.from(document.querySelectorAll(".gs-reveal"));
  if ("IntersectionObserver" in window) {
    const io = new IntersectionObserver((entries) => {
      entries.forEach((e) => {
        if (e.isIntersecting) {
          e.target.classList.add("is-in");
          io.unobserve(e.target);
        }
      });
    }, { threshold: 0.12 });
    revealItems.forEach(el => io.observe(el));
  } else {
    revealItems.forEach(el => el.classList.add("is-in"));
  }

  // Optional filter/search
  const grid = document.getElementById("gsBlogGrid");
  const empty = document.getElementById("gsBlogEmpty");
  const search = document.getElementById("gsBlogSearch");
  const filterBtns = Array.from(document.querySelectorAll(".gs-blg-filter"));

  if (!grid || !search || filterBtns.length === 0) return;

  const posts = Array.from(grid.querySelectorAll(".gs-blg-card"));
  let activeFilter = "all";
  let query = "";

  const norm = (s) => (s || "").toLowerCase().trim();

  const apply = () => {
    const q = norm(query);
    let visibleCount = 0;

    posts.forEach((card) => {
      const tags = norm(card.getAttribute("data-tags"));
      const text = norm(card.textContent);

      const okFilter = (activeFilter === "all") || tags.includes(activeFilter);
      const okSearch = !q || text.includes(q);

      const show = okFilter && okSearch;
      card.style.display = show ? "" : "none";
      if (show) visibleCount++;
    });

    if (empty) empty.hidden = visibleCount !== 0;
  };

  filterBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
      filterBtns.forEach(b => b.classList.remove("is-active"));
      btn.classList.add("is-active");
      activeFilter = btn.getAttribute("data-filter") || "all";
      apply();
    });
  });

  let t = null;
  search.addEventListener("input", (e) => {
    query = e.target.value || "";
    clearTimeout(t);
    t = setTimeout(apply, 90);
  });

  apply();

  // Typewriter (hero)
  const typeEl = document.querySelector(".gs-blg-type");
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
