/* assets/js/components/navbar.js
   Mobile toggle + accessibility + scroll polish
   + Intro: left-to-right reveal (logo -> links -> CTA)
   - Runs once per session if the first page is home
*/

(() => {
  const nav = document.getElementById("gsNav");
  const btn = document.getElementById("gsNavToggle");
  const panel = document.getElementById("gsNavPanel");

  if (!nav || !btn || !panel) return;

  const OPEN_CLASS = "is-open";
  const BODY_CLASS = "gs-nav-open";
  const SCROLLED_CLASS = "is-scrolled";
  const HIDDEN_CLASS = "is-hidden";

  // Intro classes
  const INTRO_CLASS = "is-intro";
  const READY_CLASS = "is-ready";

  const reduceMotion =
    window.matchMedia && window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  let isOpen = false;
  let closeTimer = null;

  // ============================
  // Intro (session-based)
  // ============================
  const isHomePage = () => {
    const path = window.location.pathname || "";
    return /\/(index\.php)?$/.test(path);
  };

  const setReady = (introRan) => {
    nav.classList.add(READY_CLASS);
    nav.classList.remove(INTRO_CLASS);
    nav.classList.remove(HIDDEN_CLASS);
    nav.dataset.navReady = "1";
    nav.dataset.navIntro = introRan ? "1" : "0";

    if (nav.dataset.navReadyEvent !== "1") {
      nav.dataset.navReadyEvent = "1";
      document.dispatchEvent(new CustomEvent("gs-nav-ready", { detail: { introRan } }));
    }
  };

  const runIntro = () => {
    if (nav.dataset.introDone === "1") return;
    nav.dataset.introDone = "1";

    const isHome = isHomePage();
    let firstPage = null;
    let introPlayed = false;

    try {
      firstPage = sessionStorage.getItem("gs_session_first_page");
      introPlayed = sessionStorage.getItem("gs_nav_intro_played") === "1";
      if (!firstPage) {
        firstPage = isHome ? "home" : "other";
        sessionStorage.setItem("gs_session_first_page", firstPage);
      }
    } catch (_) {
      // sessionStorage may be blocked; fall back to per-load behavior
      firstPage = isHome ? "home" : "other";
    }

    const shouldIntro = !reduceMotion && isHome && firstPage === "home" && !introPlayed;

    // Mark intro as played for the session (so later home visits stay normal)
    try {
      sessionStorage.setItem("gs_nav_intro_played", "1");
    } catch (_) {}

    if (!shouldIntro) {
      setReady(false);
      return;
    }

    nav.classList.add(INTRO_CLASS);
    nav.classList.remove(READY_CLASS);
    nav.classList.remove(HIDDEN_CLASS);
    nav.dataset.navIntro = "1";
    nav.dataset.navReady = "0";

    const expand = () => {
      if (nav.dataset.navExpanded === "1") return;
      nav.dataset.navExpanded = "1";
      setReady(true);
    };

    document.addEventListener("gs-nav-expand", expand, { once: true });
    document.dispatchEvent(new CustomEvent("gs-nav-intro-start"));

    // fallback: never stay collapsed
    setTimeout(expand, 1800);
  };

  // --- helpers
  const setExpanded = (open) => {
    btn.setAttribute("aria-expanded", open ? "true" : "false");
    btn.setAttribute("aria-label", open ? "Close menu" : "Open menu");
  };

  const showPanel = () => {
    panel.hidden = false;
    requestAnimationFrame(() => {
      nav.classList.add(OPEN_CLASS);
      btn.classList.add(OPEN_CLASS);
    });
  };

  const hidePanel = () => {
    nav.classList.remove(OPEN_CLASS);
    btn.classList.remove(OPEN_CLASS);

    const t = reduceMotion ? 0 : 240;
    clearTimeout(closeTimer);
    closeTimer = setTimeout(() => {
      panel.hidden = true;
    }, t);
  };

  const openMenu = () => {
    if (isOpen) return;
    isOpen = true;
    setExpanded(true);
    document.body.classList.add(BODY_CLASS);
    showPanel();

    const firstLink = panel.querySelector("a, button, [tabindex]:not([tabindex='-1'])");
    if (firstLink) firstLink.focus({ preventScroll: true });
  };

  const closeMenu = () => {
    if (!isOpen) return;
    isOpen = false;
    setExpanded(false);
    document.body.classList.remove(BODY_CLASS);
    hidePanel();
    btn.focus({ preventScroll: true });
  };

  const toggleMenu = () => (isOpen ? closeMenu() : openMenu());

  // --- events
  btn.addEventListener("click", (e) => {
    e.preventDefault();
    toggleMenu();
  });

  document.addEventListener("keydown", (e) => {
    if (!isOpen) return;
    if (e.key === "Escape") closeMenu();
  });

  document.addEventListener("click", (e) => {
    if (!isOpen) return;
    const t = e.target;
    const clickedInside = panel.contains(t) || btn.contains(t);
    if (!clickedInside) closeMenu();
  });

  panel.addEventListener("click", (e) => {
    const a = e.target.closest("a");
    if (a) closeMenu();
  });

  window.addEventListener("resize", () => {
    if (!isOpen) return;
    if (window.innerWidth > 980) closeMenu();
  });

  // ============================
  // Scroll polish (UPDATED)
  // - Do NOT hide nav during intro
  // - Do NOT hide nav until it is-ready
  // ============================
  let lastY = window.scrollY || 0;
  let ticking = false;

  const onScroll = () => {
    const y = window.scrollY || 0;

    // scrolled state
    if (y > 12) nav.classList.add(SCROLLED_CLASS);
    else nav.classList.remove(SCROLLED_CLASS);

    const introActive = nav.classList.contains(INTRO_CLASS);
    const readyActive = nav.classList.contains(READY_CLASS);

    // hide/show on direction (gentle) — only after intro finished
    if (!isOpen && readyActive && !introActive) {
      const goingDown = y > lastY;
      if (goingDown && y > 220) nav.classList.add(HIDDEN_CLASS);
      else nav.classList.remove(HIDDEN_CLASS);
    } else {
      // during intro: keep visible and stable
      nav.classList.remove(HIDDEN_CLASS);
    }

    lastY = y;
    ticking = false;
  };

  window.addEventListener(
    "scroll",
    () => {
      if (ticking) return;
      ticking = true;
      requestAnimationFrame(onScroll);
    },
    { passive: true }
  );

  // init
  setExpanded(false);
  panel.hidden = true;

  // Run intro immediately (NEW)
  runIntro();

  // Init scroll states
  onScroll();
})();
