/* assets/js/pages/contact.js
   UI-only improvements:
   - reveal
   - form submit loading state + status message
   - graceful fallback if backend not JSON
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

  // Custom select (topic)
  const selectWrap = document.querySelector("[data-select]");
  const selectInput = document.getElementById("gsTopicInput");
  const selectBtn = document.getElementById("gsTopicButton");
  const selectText = selectWrap ? selectWrap.querySelector("[data-select-text]") : null;
  const selectMenu = selectWrap ? selectWrap.querySelector(".gs-ct__selectMenu") : null;
  const selectOptions = selectWrap ? Array.from(selectWrap.querySelectorAll(".gs-ct__selectOption")) : [];
  const selectError = selectWrap ? selectWrap.querySelector("[data-select-error]") : null;
  let activeIndex = -1;

  const closeSelect = () => {
    if (!selectWrap || !selectMenu || !selectBtn) return;
    selectWrap.classList.remove("is-open");
    selectBtn.setAttribute("aria-expanded", "false");
    selectMenu.hidden = true;
    activeIndex = -1;
    selectOptions.forEach((opt) => opt.classList.remove("is-active"));
  };

  const openSelect = () => {
    if (!selectWrap || !selectMenu || !selectBtn) return;
    selectWrap.classList.add("is-open");
    selectBtn.setAttribute("aria-expanded", "true");
    selectMenu.hidden = false;

    const currentValue = selectInput ? selectInput.value : "";
    const currentIndex = selectOptions.findIndex((opt) => opt.dataset.value === currentValue);
    activeIndex = currentIndex >= 0 ? currentIndex : 0;
    selectOptions.forEach((opt, idx) => {
      opt.classList.toggle("is-active", idx === activeIndex);
    });
    if (selectOptions[activeIndex]) {
      selectOptions[activeIndex].focus();
    }
  };

  const setSelectValue = (value, label) => {
    if (selectInput) selectInput.value = value;
    if (selectText) selectText.textContent = label;
    selectOptions.forEach((opt) => {
      const isSelected = opt.dataset.value === value;
      opt.classList.toggle("is-selected", isSelected);
      opt.setAttribute("aria-selected", isSelected ? "true" : "false");
    });
    if (selectError) selectError.hidden = true;
  };

  if (selectBtn && selectMenu && selectOptions.length) {
    selectBtn.addEventListener("click", () => {
      if (selectWrap.classList.contains("is-open")) {
        closeSelect();
      } else {
        openSelect();
      }
    });

    selectBtn.addEventListener("keydown", (e) => {
      if (e.key === "ArrowDown" || e.key === "ArrowUp") {
        e.preventDefault();
        openSelect();
      }
    });

    selectOptions.forEach((opt, idx) => {
      opt.addEventListener("click", () => {
        const value = opt.dataset.value || "";
        setSelectValue(value, opt.textContent || value);
        closeSelect();
        selectBtn.focus();
      });

      opt.addEventListener("keydown", (e) => {
        if (e.key === "ArrowDown") {
          e.preventDefault();
          activeIndex = Math.min(selectOptions.length - 1, activeIndex + 1);
          selectOptions.forEach((o, i) => o.classList.toggle("is-active", i === activeIndex));
          selectOptions[activeIndex].focus();
        } else if (e.key === "ArrowUp") {
          e.preventDefault();
          activeIndex = Math.max(0, activeIndex - 1);
          selectOptions.forEach((o, i) => o.classList.toggle("is-active", i === activeIndex));
          selectOptions[activeIndex].focus();
        } else if (e.key === "Enter" || e.key === " ") {
          e.preventDefault();
          const value = opt.dataset.value || "";
          setSelectValue(value, opt.textContent || value);
          closeSelect();
          selectBtn.focus();
        } else if (e.key === "Escape") {
          e.preventDefault();
          closeSelect();
          selectBtn.focus();
        }
      });
    });

    document.addEventListener("click", (e) => {
      if (!selectWrap) return;
      if (!selectWrap.contains(e.target)) closeSelect();
    });
  }

  const validateSelect = () => {
    if (!selectInput || !selectError) return true;
    if (selectInput.value) {
      selectError.hidden = true;
      return true;
    }
    selectError.hidden = false;
    return false;
  };

  // Form UX
  const form = document.getElementById("gsContactForm");
  const btn = document.getElementById("gsContactSubmit");
  const status = document.getElementById("gsContactStatus");
  if (!form || !btn || !status) return;

  const setStatus = (type, msg) => {
    status.className = "gs-ct__status is-show " + (type === "ok" ? "is-ok" : "is-err");
    status.textContent = msg;
  };

  const setLoading = (on) => {
    btn.disabled = !!on;
    btn.classList.toggle("is-loading", !!on);
  };

  form.addEventListener("submit", async (e) => {
    e.preventDefault();
    status.className = "gs-ct__status"; // hide

    // basic client-side validity
    const selectOk = validateSelect();
    if (!form.checkValidity() || !selectOk) {
      form.reportValidity();
      if (!selectOk && selectBtn) selectBtn.focus();
      return;
    }

    setLoading(true);

    try {
      const fd = new FormData(form);
      const res = await fetch(form.action, {
        method: "POST",
        body: fd,
        headers: { "X-Requested-With": "fetch" }
      });

      // Try JSON first
      let data = null;
      const ct = res.headers.get("content-type") || "";
      if (ct.includes("application/json")) {
        data = await res.json();
      } else {
        // fallback: treat as text
        const txt = await res.text();
        // If backend echoes success page, redirect
        if (res.ok && /success/i.test(txt)) {
          window.location.href = "contact-success.php";
          return;
        }
        data = { ok: res.ok, message: "Message sent." };
      }

      if (data && data.ok) {
        setStatus("ok", data.message || "Thanks - we received your message.");
        form.reset();
        // keep csrf as-is (session)
      } else {
        setStatus("err", (data && data.message) ? data.message : "Something went wrong. Please try again.");
      }
    } catch (err) {
      setStatus("err", "Network error. Please try again in a moment.");
    } finally {
      setLoading(false);
    }
  });

  // Typewriter (hero)
  const typeEl = document.querySelector(".gs-ct__type");
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
