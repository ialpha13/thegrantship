// assets/js/pages/services.js
(() => {
  document.documentElement.classList.add("js");

  // reveal
  const revealEls = document.querySelectorAll(".gs-reveal");
  if ("IntersectionObserver" in window) {
    const io = new IntersectionObserver((entries) => {
      entries.forEach(e => {
        if (!e.isIntersecting) return;
        e.target.classList.add("is-in");
        io.unobserve(e.target);
      });
    }, { threshold: 0.12 });
    revealEls.forEach((el, idx) => {
      el.style.transitionDelay = `${Math.min(idx * 60, 240)}ms`;
      io.observe(el);
    });
  } else {
    revealEls.forEach(el => el.classList.add("is-in"));
  }

  // Typewriter
  const typeEl = document.querySelector(".gs-sv-type");
  if (typeEl) {
    const phrases = (typeEl.dataset.phrases || "")
      .split("|")
      .map(s => s.trim())
      .filter(Boolean);

    let wordIdx = 0;
    let charIdx = 0;
    let dir = 1;

    const tick = () => {
      if (!phrases.length) return;
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

  // FAQ accordion (accessible, smooth behavior)
  const acc = document.getElementById("gsSvAcc");
  if (acc) {
    acc.addEventListener("click", (e) => {
      const btn = e.target.closest(".gs-sv-q");
      if (!btn) return;

      const qa = btn.closest(".gs-sv-qa");
      const panel = qa ? qa.querySelector(".gs-sv-a") : null;
      if (!qa || !panel) return;

      const isOpen = qa.classList.contains("is-open");

      // close others (keeps it tidy)
      acc.querySelectorAll(".gs-sv-qa.is-open").forEach(other => {
        if (other === qa) return;
        other.classList.remove("is-open");
        const ob = other.querySelector(".gs-sv-q");
        const op = other.querySelector(".gs-sv-a");
        if (ob) ob.setAttribute("aria-expanded", "false");
        if (op) op.hidden = true;
      });

      qa.classList.toggle("is-open", !isOpen);
      btn.setAttribute("aria-expanded", (!isOpen).toString());
      panel.hidden = isOpen;
    });
  }
})();
