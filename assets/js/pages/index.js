/* assets/js/pages/index.js
   Homepage:
   - Navbar intro (session-based) -> hero typewriter sequence
   - Reveal on view
   - Hero media default logic
*/
(() => {
  document.documentElement.classList.add("js");

  const body = document.body;
  const isHome = body.classList.contains("gs-home");

  // ----------------------------
  // 0) Prep text effects (split words/lines)
  // ----------------------------
  const prepTextEffects = () => {
    document.querySelectorAll('[data-reveal="words"]').forEach((el) => {
      if (el.dataset.splitDone === "1") return;
      const text = (el.textContent || "").trim();
      if (!text) return;
      const words = text.split(/\s+/);
      el.innerHTML = words
        .map((word, i) => `<span class="gs-word" style="--delay:${i * 45}ms">${word}</span>`)
        .join(" ");
      el.dataset.splitDone = "1";
      el.classList.add("gs-words");
    });

    document.querySelectorAll('[data-reveal="lines"]').forEach((el) => {
      if (el.dataset.splitDone === "1") return;
      const html = (el.innerHTML || "").replace(/<br\s*\/?>/gi, "\n");
      const lines = html.split("\n").map((line) => line.trim()).filter(Boolean);
      if (!lines.length) return;
      el.innerHTML = lines
        .map(
          (line, i) =>
            `<span class="gs-line"><span class="gs-lineInner" style="--delay:${i * 160}ms">${line}</span></span>`
        )
        .join("");
      el.dataset.splitDone = "1";
      el.classList.add("gs-lines");
    });
  };

  prepTextEffects();

  // ----------------------------
  // 1) Reveal on view (existing)
  // ----------------------------
  const revealItems = Array.from(document.querySelectorAll(".gs-reveal"));
  if ("IntersectionObserver" in window) {
    const io = new IntersectionObserver(
      (entries) => {
        entries.forEach((e) => {
          if (e.isIntersecting) {
            e.target.classList.add("is-in");
            io.unobserve(e.target);
          }
        });
      },
      { threshold: 0.12 }
    );
    revealItems.forEach((el) => io.observe(el));
  } else {
    revealItems.forEach((el) => el.classList.add("is-in"));
  }

  // ----------------------------
  // 2) Hero media logic (existing)
  // ----------------------------
  const hero = document.querySelector(".gs-hm");
  const video = document.getElementById("gsHeroVideo");
  const image = document.getElementById("gsHeroImage");

  if (hero && image) {
    const defaultMode = (hero.getAttribute("data-hero-default") || "video").toLowerCase();
    const hasVideo = !!video && !!video.querySelector("source")?.getAttribute("src");
    const mode = defaultMode === "video" && hasVideo ? "video" : "image";

    if (video) video.classList.toggle("is-on", mode === "video");
    image.classList.toggle("is-on", mode === "image");

    if (video) {
      if (mode === "video") {
        try {
          video.muted = true;
          video.play().catch(() => {});
        } catch (_) {}
      } else {
        try { video.pause(); } catch (_) {}
      }

      document.addEventListener("visibilitychange", () => {
        if (!video) return;
        if (document.hidden) {
          try { video.pause(); } catch (_) {}
        } else if (mode === "video") {
          try { video.play().catch(() => {}); } catch (_) {}
        }
      });
    }
  }

  // ------------------------------------------------
  // 3) Home-only intro sequence: navbar -> hero typing
  // ------------------------------------------------
  if (!isHome) return;

  const reduceMotion =
    window.matchMedia && window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  const lineA = document.querySelector(".gs-hm-heroTitleLine--a");
  const lineB = document.querySelector(".gs-hm-heroTitleLine--b");
  const lineBAccent = lineB ? lineB.querySelector(".gs-hm-heroTitle__accent") : null;
  const pills = document.querySelector(".gs-hm-heroPills");
  const subtitle = document.querySelector(".gs-hm-heroSub");
  const buttons = document.querySelector(".gs-hm-heroBtns");
  const quote = document.querySelector(".gs-hm-heroQuote");
  const stat = document.querySelector(".gs-hm-heroStat");

  const navEl = document.getElementById("gsNav");
  const navIntroActive = !!(navEl && navEl.dataset.navIntro === "1");
  let navExpandTriggered = false;

  const smoothEase = "cubic-bezier(.22,.61,.36,1)";
  const softEase = "cubic-bezier(.25,.46,.45,.94)";

  const wait = (ms) => new Promise((r) => setTimeout(r, ms));

  const getTextWithBreaks = (el) => {
    if (!el) return "";
    const raw = (el.textContent || "").replace(/\s*\n\s*/g, "\n").trim();
    return raw;
  };

  const revealNow = (el, useScale) => {
    if (!el) return;
    el.style.opacity = "1";
    el.style.filter = "blur(0)";
    el.style.transform = useScale ? "translateY(0) scale(1)" : "translateY(0)";
  };

  const showImmediate = () => {
    if (lineA) {
      lineA.textContent = lineA.dataset.text || lineA.textContent;
      lineA.classList.add("is-typed");
    }
    if (lineBAccent) {
      lineBAccent.textContent = lineBAccent.dataset.text || lineBAccent.textContent;
      lineB.classList.add("is-typed");
    }
    if (subtitle) {
      const subText = subtitle.dataset.text || getTextWithBreaks(subtitle);
      subtitle.innerHTML = subText.replace(/\n/g, "<br>");
      subtitle.classList.add("is-typed");
    }
    revealNow(pills);
    revealNow(subtitle);
    revealNow(buttons);
    revealNow(quote, true);
    revealNow(stat, true);
  };

  const typeLine = (lineEl, textEl, text, speed, jitter) =>
    new Promise((resolve) => {
      if (!lineEl || !textEl) return resolve();
      let i = 0;
      lineEl.classList.add("is-typing");
      textEl.textContent = "";
      const tick = () => {
        i += 1;
        textEl.textContent = text.slice(0, i);
        if (i < text.length) {
          setTimeout(tick, speed + Math.random() * (jitter || 0));
        } else {
          lineEl.classList.remove("is-typing");
          lineEl.classList.add("is-typed");
          resolve();
        }
      };
      tick();
    });

  const typeBlock = (el, text, speed, jitter) =>
    new Promise((resolve) => {
      if (!el) return resolve();
      let i = 0;
      el.classList.add("is-typing");
      el.style.opacity = "1";
      el.style.filter = "blur(0)";
      el.style.transform = "translateY(0)";
      const tick = () => {
        i += 1;
        const slice = text.slice(0, i);
        el.innerHTML = slice.replace(/\n/g, "<br>");
        if (i < text.length) {
          setTimeout(tick, speed + Math.random() * (jitter || 0));
        } else {
          el.classList.remove("is-typing");
          el.classList.add("is-typed");
          resolve();
        }
      };
      tick();
    });

  const estimateTitleDuration = (textA, textB) => {
    const speedA = 38;
    const speedB = 46;
    const jitter = 18;
    const avgA = speedA + jitter / 2;
    const avgB = speedB + jitter / 2;
    const between = 120;
    return Math.ceil(textA.length * avgA + between + textB.length * avgB);
  };

  const triggerNavExpand = (duration) => {
    if (!navIntroActive || navExpandTriggered || !navEl) return;
    navExpandTriggered = true;
    navEl.style.setProperty("--nav-intro-duration", `${duration}ms`);
    document.dispatchEvent(new CustomEvent("gs-nav-expand", { detail: { duration } }));
  };

  const runHero = async () => {
    if (!lineA || !lineBAccent) {
      triggerNavExpand(800);
      showImmediate();
      return;
    }

    const textA = lineA.dataset.text || lineA.textContent.trim();
    const textB = lineBAccent.dataset.text || lineBAccent.textContent.trim();
    const subText = subtitle ? (subtitle.dataset.text || getTextWithBreaks(subtitle)) : "";

    lineA.dataset.text = textA;
    lineBAccent.dataset.text = textB;
    if (subtitle) subtitle.dataset.text = subText;

    lineA.textContent = "";
    lineBAccent.textContent = "";
    if (subtitle) subtitle.innerHTML = "";

    await wait(120);

    if (pills) {
      pills.style.opacity = "0";
      pills.style.transform = "translateY(8px)";
      pills.style.filter = "blur(8px)";
      pills.style.transition = `opacity .75s ${smoothEase}, transform .75s ${smoothEase}, filter .9s ${softEase}`;
      await wait(16);
      pills.style.opacity = "1";
      pills.style.transform = "translateY(0)";
      pills.style.filter = "blur(0)";
    }

    await wait(160);
    const titleDuration = estimateTitleDuration(textA, textB);
    triggerNavExpand(titleDuration);

    await typeLine(lineA, lineA, textA, 38, 18);
    await wait(110);
    await typeLine(lineB, lineBAccent, textB, 46, 18);

    await wait(140);

    const subPromise = subtitle ? typeBlock(subtitle, subText, 18, 12) : Promise.resolve();
    const otherPromise = (async () => {
      await wait(80);
      if (quote) {
        quote.style.opacity = "0";
        quote.style.transform = "translateY(12px) scale(.96)";
        quote.style.filter = "blur(8px)";
        quote.style.transition = `opacity .85s ${smoothEase} .18s, transform .85s ${smoothEase} .18s, filter .95s ${softEase} .24s`;
        await wait(16);
        quote.style.opacity = "1";
        quote.style.transform = "translateY(0) scale(1)";
        quote.style.filter = "blur(0)";
      }

      await wait(90);
      if (stat) {
        stat.style.opacity = "0";
        stat.style.transform = "translateY(12px) scale(.96)";
        stat.style.filter = "blur(8px)";
        stat.style.transition = `opacity .85s ${smoothEase} .28s, transform .85s ${smoothEase} .28s, filter .95s ${softEase} .34s`;
        await wait(16);
        stat.style.opacity = "1";
        stat.style.transform = "translateY(0) scale(1)";
        stat.style.filter = "blur(0)";
      }
    })();

    await subPromise;

    if (buttons) {
      buttons.style.opacity = "0";
      buttons.style.transform = "translateY(10px)";
      buttons.style.filter = "blur(6px)";
      buttons.style.transition = `opacity .75s ${smoothEase} .08s, transform .75s ${smoothEase} .08s, filter .9s ${softEase} .12s`;
      await wait(16);
      buttons.style.opacity = "1";
      buttons.style.transform = "translateY(0)";
      buttons.style.filter = "blur(0)";
    }

    await otherPromise;
  };

  let heroStarted = false;
  const startHero = () => {
    if (heroStarted) return;
    heroStarted = true;
    if (reduceMotion) {
      showImmediate();
      return;
    }
    runHero().catch(showImmediate);
  };

  if (reduceMotion) {
    showImmediate();
  } else {
    setTimeout(startHero, navIntroActive ? 80 : 0);
  }

  // ------------------------------------------------
  // 4) Typewriter lines below hero
  // ------------------------------------------------
  const typeTargets = Array.from(document.querySelectorAll("[data-typewriter]"));
  if (typeTargets.length) {
    typeTargets.forEach((el) => {
      const raw = el.getAttribute("data-typewriter-text");
      const text = raw ? raw : getTextWithBreaks(el);
      el.dataset.typewriterText = text;
    });

    const startType = (el) => {
      if (!el || el.dataset.twStarted === "1") return;
      el.dataset.twStarted = "1";
      const text = el.dataset.typewriterText || "";
      if (!text) return;
      if (reduceMotion) {
        el.innerHTML = text.replace(/\n/g, "<br>");
        el.classList.remove("is-typing");
        el.classList.add("is-typed");
        el.style.opacity = "1";
        el.style.filter = "blur(0)";
        el.style.transform = "translateY(0)";
        return;
      }
      const speed = parseInt(el.dataset.typewriterSpeed || "22", 10);
      const jitter = parseInt(el.dataset.typewriterJitter || "10", 10);
      typeBlock(el, text, speed, jitter);
    };

    if ("IntersectionObserver" in window && !reduceMotion) {
      const twObserver = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              startType(entry.target);
              twObserver.unobserve(entry.target);
            }
          });
        },
        { threshold: 0.35, rootMargin: "0px 0px -20% 0px" }
      );
      typeTargets.forEach((el) => twObserver.observe(el));
    } else {
      typeTargets.forEach((el) => startType(el));
    }
  }

  // ------------------------------------------------
  // 5) Count-up stats
  // ------------------------------------------------
  const countEls = Array.from(document.querySelectorAll("[data-count]"));
  if (countEls.length) {
    const runCount = (el) => {
      if (el.dataset.countStarted === "1") return;
      el.dataset.countStarted = "1";
      const end = parseFloat(el.dataset.count || "0");
      const prefix = el.dataset.prefix || "";
      const suffix = el.dataset.suffix || "";
      const decimals = parseInt(el.dataset.decimals || "0", 10);
      const duration = parseInt(el.dataset.duration || "1200", 10);
      if (!isFinite(end) || reduceMotion) {
        el.textContent = `${prefix}${end.toFixed(decimals)}${suffix}`;
        return;
      }
      const start = performance.now();
      const step = (now) => {
        const progress = Math.min((now - start) / duration, 1);
        const value = end * progress;
        el.textContent = `${prefix}${value.toFixed(decimals)}${suffix}`;
        if (progress < 1) requestAnimationFrame(step);
      };
      requestAnimationFrame(step);
    };

    if ("IntersectionObserver" in window) {
      const countObserver = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              runCount(entry.target);
              countObserver.unobserve(entry.target);
            }
          });
        },
        { threshold: 0.6 }
      );
      countEls.forEach((el) => countObserver.observe(el));
    } else {
      countEls.forEach((el) => runCount(el));
    }
  }

  // ------------------------------------------------
  // 6) Compact contact form (home)
  // ------------------------------------------------
  const homeForm = document.getElementById("gsHomeContactForm");
  const homeBtn = document.getElementById("gsHomeContactSubmit");
  const homeStatus = document.getElementById("gsHomeContactStatus");

  if (homeForm && homeBtn && homeStatus) {
    const setStatus = (type, msg) => {
      homeStatus.className = "gs-hm-contactStatus is-show " + (type === "ok" ? "is-ok" : "is-err");
      homeStatus.textContent = msg;
    };

    const setLoading = (on) => {
      homeBtn.disabled = !!on;
      homeBtn.classList.toggle("is-loading", !!on);
    };

    homeForm.addEventListener("submit", async (e) => {
      e.preventDefault();
      homeStatus.className = "gs-hm-contactStatus";

      if (!homeForm.checkValidity()) {
        homeForm.reportValidity();
        return;
      }

      setLoading(true);

      try {
        const fd = new FormData(homeForm);
        const res = await fetch(homeForm.action, {
          method: "POST",
          body: fd,
          headers: { "X-Requested-With": "fetch" }
        });

        let data = null;
        const ct = res.headers.get("content-type") || "";
        if (ct.includes("application/json")) {
          data = await res.json();
        } else {
          const txt = await res.text();
          if (res.ok && /success/i.test(txt)) {
            setStatus("ok", "Message sent. We will reply soon.");
            homeForm.reset();
            return;
          }
          data = { ok: res.ok, message: "Message sent." };
        }

        if (data && data.ok) {
          setStatus("ok", data.message || "Thanks. We received your message.");
          homeForm.reset();
        } else {
          setStatus("err", (data && data.message) ? data.message : "Something went wrong. Please try again.");
        }
      } catch (err) {
        setStatus("err", "Network error. Please try again in a moment.");
      } finally {
        setLoading(false);
      }
    });
  }
})();
