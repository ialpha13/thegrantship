// assets/js/pages/resources.js
(() => {
  "use strict";
  document.documentElement.classList.add("js");

  // Reveal
  const revealEls = document.querySelectorAll(".gs-reveal");
  const io = new IntersectionObserver((entries) => {
    entries.forEach((e) => {
      if (!e.isIntersecting) return;
      e.target.classList.add("is-in");
      io.unobserve(e.target);
    });
  }, { threshold: 0.12 });

  revealEls.forEach((el, idx) => {
    el.style.transitionDelay = `${Math.min(idx * 60, 240)}ms`;
    io.observe(el);
  });

  // Grid + filtering
  const grid = document.getElementById("gsResGrid");
  const empty = document.getElementById("gsResEmpty");
  const resetBtn = document.getElementById("gsResReset");
  const search = document.getElementById("gsResSearch");
  const tabs = Array.from(document.querySelectorAll(".gs-rs5-tab"));

  if (!grid) return;
  const cards = Array.from(grid.querySelectorAll(".gs-rs5-card"));

  let activeType = "all";
  let query = "";

  const norm = (s) => (s || "").toString().trim().toLowerCase();

  function setActiveTab(typeRaw){
    const t = norm(typeRaw);
    activeType = (t === "all" ? "all" : t);
    tabs.forEach(btn => btn.classList.toggle("is-active", norm(btn.dataset.filter) === (typeRaw || "All").toLowerCase()));
    apply();
  }

  function apply(){
    let visible = 0;
    const q = norm(query);

    cards.forEach(card => {
      const type = norm(card.dataset.type);
      const hay = norm(card.dataset.title);

      const okType = (activeType === "all") || (type === activeType);
      const okQuery = (!q) || hay.includes(q);

      const show = okType && okQuery;
      card.style.display = show ? "" : "none";
      if (show) visible++;
    });

    if (empty) empty.hidden = visible !== 0;
  }

  // Tabs
  tabs.forEach(btn => {
    btn.addEventListener("click", () => setActiveTab(btn.dataset.filter || "All"));
  });

  // Search
  search?.addEventListener("input", () => {
    query = search.value || "";
    apply();
  });

  // Reset button (empty state)
  resetBtn?.addEventListener("click", () => {
    if (search) search.value = "";
    query = "";
    setActiveTab("All");
    apply();
  });

  // Init
  setActiveTab("All");
  apply();

  // Typewriter (hero)
  const typeEl = document.querySelector(".gs-rs5-type");
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

  // --------------------------
  // Quick View Modal
  // --------------------------
  const modal = document.getElementById("gsResModal");
  const iframe = document.getElementById("gsResIframe");
  const fallback = document.getElementById("gsResFallback");

  const mTitle = document.getElementById("gsResMTitle");
  const mType  = document.getElementById("gsResMType");
  const mDesc  = document.getElementById("gsResMDesc");
  const mFmt   = document.getElementById("gsResMFmt");
  const mSize  = document.getElementById("gsResMSize");
  const mFile  = document.getElementById("gsResMFile");

  const isPdf = (url = "", fmt = "") =>
    norm(fmt) === "pdf" || /\.pdf(\?|#|$)/i.test(url);

  function openModal(data){
    if (!modal) return;

    if (mTitle) mTitle.textContent = data.title || "Preview";
    if (mType)  mType.textContent  = data.type || "Document";
    if (mDesc)  mDesc.textContent  = data.desc || "";
    if (mFmt)   mFmt.textContent   = data.format || "";
    if (mSize)  mSize.textContent  = data.size || "-";
    if (mFile)  mFile.href         = data.file || "#";

    // Preview logic (PDF iframe)
    if (iframe && fallback){
      iframe.style.display = "none";
      fallback.style.display = "none";
      iframe.src = "about:blank";

      if (data.file && isPdf(data.file, data.format)){
        iframe.src = data.file;
        iframe.style.display = "block";
      } else {
        fallback.style.display = "block";
      }
    }

    modal.hidden = false;
    document.body.style.overflow = "hidden";
  }

  function closeModal(){
    if (!modal) return;
    modal.hidden = true;
    document.body.style.overflow = "";

    if (iframe){
      iframe.src = "about:blank";
      iframe.style.display = "none";
    }
    if (fallback) fallback.style.display = "none";
  }

  document.addEventListener("click", (e) => {
    const qv = e.target.closest(".gs-rs5-qv");
    if (qv){
      openModal({
        title: qv.dataset.title,
        type: qv.dataset.type,
        format: qv.dataset.format,
        desc: qv.dataset.desc,
        file: qv.dataset.file,
        size: qv.dataset.size,
      });
      return;
    }

    if (e.target?.dataset?.close === "1") closeModal();
  });

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") closeModal();
  });
})();

