// assets/js/pages/portfolio.js (FULL + UPDATED + LOCKED)
(() => {
  "use strict";
  document.documentElement.classList.add("js");

  // --------------------------
  // Reveal on scroll
  // --------------------------
  const revealEls = document.querySelectorAll(".gs-reveal");
  const io = new IntersectionObserver(
    (entries) => {
      entries.forEach((e) => {
        if (!e.isIntersecting) return;
        e.target.classList.add("is-in");
        io.unobserve(e.target);
      });
    },
    { threshold: 0.12 }
  );

  revealEls.forEach((el, idx) => {
    el.style.transitionDelay = `${Math.min(idx * 60, 240)}ms`;
    io.observe(el);
  });

  // --------------------------
  // Typewriter (hero)
  // --------------------------
  const typeEl = document.querySelector(".gs-pf5-type");
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
  // Filtering + search + sort
  // --------------------------
  const tabs = Array.from(document.querySelectorAll(".gs-pf5-tab"));
  const search = document.getElementById("gsPf5Search");
  const sortSel = document.getElementById("gsPf5Sort");
  const grid = document.getElementById("gsPf5Grid");
  const empty = document.getElementById("gsPf5Empty");
  const resetBtn = document.getElementById("gsPf5Reset");

  if (!grid) return;

  const cards = Array.from(grid.querySelectorAll(".gs-pf5-card"));
  let activeFilter = "all";

  const setActiveTab = (filter) => {
    activeFilter = filter;
    tabs.forEach((t) =>
      t.classList.toggle("is-active", (t.dataset.filter || "all") === filter)
    );
    applyFilters();
  };

  const sortCards = (mode) => {
    const copy = [...cards];
    const by = (k) => (a, b) =>
      (a.dataset[k] || "").localeCompare(b.dataset[k] || "");

    if (mode === "za") copy.sort((a, b) => (b.dataset.name || "").localeCompare(a.dataset.name || ""));
    else if (mode === "type") copy.sort(by("type"));
    else if (mode === "format") copy.sort(by("format"));
    else copy.sort(by("name"));

    copy.forEach((el) => grid.appendChild(el));
  };

  const applyFilters = () => {
    const q = (search?.value || "").trim().toLowerCase();
    let visible = 0;

    cards.forEach((card) => {
      const tag = card.dataset.tag || "";
      const hay = card.dataset.title || "";
      const matchesFilter = activeFilter === "all" || tag === activeFilter;
      const matchesQuery = !q || hay.includes(q);
      const show = matchesFilter && matchesQuery;

      card.style.display = show ? "" : "none";
      if (show) visible++;
    });

    if (empty) empty.hidden = visible !== 0;
  };

  tabs.forEach((t) => t.addEventListener("click", () => setActiveTab(t.dataset.filter || "all")));
  search?.addEventListener("input", applyFilters);
  sortSel?.addEventListener("change", () => { sortCards(sortSel.value); applyFilters(); });

  sortCards(sortSel?.value || "az");
  applyFilters();

  // --------------------------
  // QUICK VIEW - Professional Modal UI
  // --------------------------
  const modal = document.getElementById("gsPf5Modal");
  if (!modal) return;

  const panel = modal.querySelector(".gs-pf5-modal__panel");
  const closeBtn = modal.querySelector(".gs-pf5-modal__close");
  const backdrop = modal.querySelector(".gs-pf5-modal__backdrop");

  // legacy nodes in your HTML (we reuse/move them)
  const legacyTitle = document.getElementById("gsPf5MTitle");
  const legacyType  = document.getElementById("gsPf5MType");
  const legacyDesc  = document.getElementById("gsPf5MDesc");
  const legacyFmt   = document.getElementById("gsPf5MFmt");
  const legacyFile  = document.getElementById("gsPf5MFile");

  // viewer nodes (already in HTML)
  const viewer = document.getElementById("gsPf5Viewer");
  const iframe = document.getElementById("gsPf5Iframe");
  const fallback = document.getElementById("gsPf5Fallback");

  const isPdf = (url = "", fmt = "") =>
    (fmt || "").toLowerCase() === "pdf" || /\.pdf(\?|#|$)/i.test(url);

  // ---- build pro layout once ----
  let built = false;

  const buildLayout = () => {
    if (built || !panel) return;

    // topbar
    const topbar = document.createElement("div");
    topbar.className = "gs-pf5-modal__topbar";

    const brand = document.createElement("div");
    brand.className = "gs-pf5-modal__brand";
    brand.innerHTML = `
      <div class="gs-pf5-modal__badge">QV</div>
      <div class="gs-pf5-modal__headline">
        <h3 class="gs-pf5-modal__title" id="gsPf5ProTitle">Quick View</h3>
        <div class="gs-pf5-modal__tagline">
          <span class="gs-pf5-modal__pill" id="gsPf5ProType">Document</span>
          <span class="gs-pf5-modal__pill" id="gsPf5ProFmt">PDF</span>
        </div>
      </div>
    `;

    const actions = document.createElement("div");
    actions.className = "gs-pf5-modal__actions";

    // make download look consistent
    legacyFile && legacyFile.classList.add("gs-pf5-dl--modal");

    // move download + close into topbar
    if (legacyFile) actions.appendChild(legacyFile);
    if (closeBtn) actions.appendChild(closeBtn);

    topbar.appendChild(brand);
    topbar.appendChild(actions);

    // body
    const body = document.createElement("div");
    body.className = "gs-pf5-modal__body";

    const side = document.createElement("div");
    side.className = "gs-pf5-modal__side";

    // keep legacy desc node but styled by CSS
    if (legacyDesc) side.appendChild(legacyDesc);

    const metaGrid = document.createElement("div");
    metaGrid.className = "gs-pf5-modal__metaGrid";
    metaGrid.innerHTML = `
      <div class="gs-pf5-modal__metaCard">
        <div class="gs-pf5-modal__label">Type</div>
        <div class="gs-pf5-modal__value" id="gsPf5ProTypeVal">Document</div>
      </div>
      <div class="gs-pf5-modal__metaCard">
        <div class="gs-pf5-modal__label">Format</div>
        <div class="gs-pf5-modal__value" id="gsPf5ProFmtVal">PDF</div>
      </div>
    `;
    side.appendChild(metaGrid);

    // viewer on right
    if (viewer) body.appendChild(side), body.appendChild(viewer);

    // rebuild panel cleanly
    panel.innerHTML = "";
    panel.appendChild(topbar);
    panel.appendChild(body);

    // legacy nodes not used visually
    if (legacyTitle) legacyTitle.style.display = "none";
    if (legacyType) legacyType.style.display = "none";
    if (legacyFmt) legacyFmt.style.display = "none";

    built = true;
  };

  const showIFrame = (src) => {
    if (!iframe || !fallback) return;
    iframe.style.display = "block";
    fallback.style.display = "none";
    iframe.src = src;
  };

  const showFallback = () => {
    if (!iframe || !fallback) return;
    iframe.style.display = "none";
    fallback.style.display = "block";
    iframe.removeAttribute("src");
  };

  const openModal = (data) => {
    buildLayout();

    const proTitle = document.getElementById("gsPf5ProTitle");
    const proType = document.getElementById("gsPf5ProType");
    const proFmt = document.getElementById("gsPf5ProFmt");
    const proTypeVal = document.getElementById("gsPf5ProTypeVal");
    const proFmtVal = document.getElementById("gsPf5ProFmtVal");

    // download link
    if (legacyFile) legacyFile.href = data.file || "#";

    // set text
    if (proTitle) proTitle.textContent = data.title || "Quick View";
    if (proType) proType.textContent = data.type || "Document";
    if (proFmt) proFmt.textContent = data.format || "";
    if (proTypeVal) proTypeVal.textContent = data.type || "Document";
    if (proFmtVal) proFmtVal.textContent = data.format || "";

    if (legacyDesc) legacyDesc.textContent = data.desc || "";
    if (legacyType) legacyType.textContent = data.type || "Document";
    if (legacyFmt) legacyFmt.textContent = data.format || "";

    modal.hidden = false;
    document.body.classList.add("gs-modal-open");

    // embed only PDFs
    const file = data.file || "";
    const fmt = data.format || "";
    if (file && isPdf(file, fmt)) showIFrame(file);
    else showFallback();

    closeBtn && closeBtn.focus();
  };

  const closeModal = () => {
    modal.hidden = true;
    document.body.classList.remove("gs-modal-open");
    showFallback();
  };

  // Open quick view
  document.addEventListener("click", (e) => {
    const qv = e.target.closest(".gs-pf5-qv");
    if (qv) {
      openModal({
        title: qv.dataset.title,
        type: qv.dataset.type,
        format: qv.dataset.format,
        desc: qv.dataset.desc,
        file: qv.dataset.file,
      });
      return;
    }
    if (e.target?.dataset?.close === "1") closeModal();
  });

  backdrop?.addEventListener("click", closeModal);
  closeBtn?.addEventListener("click", closeModal);

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") closeModal();
  });

  // --------------------------
  // Custom sort dropdown (glass)
  // --------------------------
  const dd = document.getElementById("gsPf5Dd");
  const ddBtn = document.getElementById("gsPf5DdBtn");
  const ddPanel = document.getElementById("gsPf5DdPanel");
  const ddLabel = ddBtn ? ddBtn.querySelector(".gs-pf5-dd__label") : null;
  const ddOpts = ddPanel ? Array.from(ddPanel.querySelectorAll(".gs-pf5-dd__opt")) : [];

  const setDdSelected = (value) => {
    ddOpts.forEach((opt) => {
      const isSel = opt.dataset.value === value;
      opt.classList.toggle("is-selected", isSel);
      opt.setAttribute("aria-selected", isSel ? "true" : "false");
    });
    const selOpt = ddOpts.find((o) => o.dataset.value === value);
    if (ddLabel && selOpt) ddLabel.textContent = selOpt.textContent.trim();
  };

  const openDd = () => {
    if (!dd || !ddBtn) return;
    dd.dataset.open = "1";
    ddBtn.setAttribute("aria-expanded", "true");
    ddPanel && ddPanel.focus();
  };

  const closeDd = () => {
    if (!dd || !ddBtn) return;
    dd.dataset.open = "0";
    ddBtn.setAttribute("aria-expanded", "false");
  };

  const toggleDd = () => {
    if (!dd) return;
    dd.dataset.open === "1" ? closeDd() : openDd();
  };

  if (sortSel && ddOpts.length) setDdSelected(sortSel.value || "az");

  ddBtn?.addEventListener("click", (e) => { e.preventDefault(); toggleDd(); });

  ddOpts.forEach((opt) => {
    opt.addEventListener("click", () => {
      const val = opt.dataset.value || "az";
      if (sortSel) {
        sortSel.value = val;
        sortSel.dispatchEvent(new Event("change", { bubbles: true }));
      }
      setDdSelected(val);
      closeDd();
      ddBtn && ddBtn.focus();
    });
  });

  document.addEventListener("click", (e) => {
    if (!dd) return;
    const inside = e.target.closest("#gsPf5Dd");
    if (!inside && dd.dataset.open === "1") closeDd();
  });

  document.addEventListener("keydown", (e) => {
    if (!dd || dd.dataset.open !== "1") return;

    if (e.key === "Escape") { closeDd(); ddBtn && ddBtn.focus(); return; }

    if (e.key === "ArrowDown" || e.key === "ArrowUp") {
      e.preventDefault();
      const currentIdx = ddOpts.findIndex((o) => o.classList.contains("is-selected"));
      let nextIdx = currentIdx;
      if (e.key === "ArrowDown") nextIdx = Math.min(currentIdx + 1, ddOpts.length - 1);
      if (e.key === "ArrowUp") nextIdx = Math.max(currentIdx - 1, 0);
      const next = ddOpts[nextIdx];
      next && next.focus();
    }

    if (e.key === "Enter") {
      const focused = document.activeElement;
      if (focused && focused.classList.contains("gs-pf5-dd__opt")) focused.click();
    }
  });

  resetBtn?.addEventListener("click", () => {
    if (sortSel && ddOpts.length) setDdSelected(sortSel.value || "az");
  });
})();
