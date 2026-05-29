// assets/js/pages/error.js (v4)
(() => {
  document.documentElement.classList.add("js");

  // reveal
  const items = Array.from(document.querySelectorAll(".gs-reveal"));
  if ("IntersectionObserver" in window) {
    const io = new IntersectionObserver((entries) => {
      entries.forEach(e => {
        if (!e.isIntersecting) return;
        e.target.classList.add("is-in");
        io.unobserve(e.target);
      });
    }, { threshold: 0.12 });

    items.forEach((el, idx) => {
      el.style.transitionDelay = `${Math.min(idx * 60, 240)}ms`;
      io.observe(el);
    });
  } else {
    items.forEach(el => el.classList.add("is-in"));
  }

  // Back button
  const backBtn = document.querySelector("[data-gs-back]");
  if (backBtn) {
    const canGoBack = window.history.length > 1;
    backBtn.toggleAttribute("hidden", !canGoBack);
    backBtn.addEventListener("click", (e) => {
      e.preventDefault();
      window.history.back();
    });
  }

  // Copy reference ID
  const copyBtn = document.querySelector("[data-gs-copy-ref]");
  const refEl = document.getElementById("gsErRef");
  if (copyBtn && refEl && navigator.clipboard) {
    copyBtn.addEventListener("click", async () => {
      try {
        await navigator.clipboard.writeText(refEl.textContent.trim());
        copyBtn.textContent = "Copied";
        setTimeout(() => (copyBtn.textContent = "Copy"), 1200);
      } catch (_) {}
    });
  }
})();
