(() => {
  const header = document.querySelector("[data-header]");
  const burger = document.querySelector("[data-burger]");
  const mobileMenu = document.querySelector("[data-mobile-menu]");
  const dropdownRoots = document.querySelectorAll("[data-dropdown]");
  const modal = document.querySelector("#consult-modal");
  const form = document.querySelector("[data-consult-form]");
  const mqDesktop = window.matchMedia("(min-width: 1100px)");

  const closeTimers = new WeakMap();

  function closeMobile() {
    header?.classList.remove("is-open");
    burger?.classList.remove("is-open");
    burger?.setAttribute("aria-expanded", "false");
  }

  function cancelClose(root) {
    const timer = closeTimers.get(root);
    if (timer) clearTimeout(timer);
  }

  function closeDropdown(root) {
    cancelClose(root);
    const btn = root.querySelector("[data-dropdown-btn]");
    const panel = root.querySelector("[data-dropdown-panel]");
    btn?.setAttribute("aria-expanded", "false");
    if (panel) panel.hidden = true;
  }

  function closeAllDropdowns(except) {
    dropdownRoots.forEach((root) => {
      if (root !== except) closeDropdown(root);
    });
  }

  function openDropdown(root) {
    const btn = root.querySelector("[data-dropdown-btn]");
    const panel = root.querySelector("[data-dropdown-panel]");
    if (!panel) return;
    cancelClose(root);
    closeAllDropdowns(root);
    panel.hidden = false;
    btn?.setAttribute("aria-expanded", "true");
  }

  function scheduleClose(root) {
    cancelClose(root);
    closeTimers.set(
      root,
      setTimeout(() => closeDropdown(root), 250)
    );
  }

  burger?.addEventListener("click", () => {
    const open = header.classList.toggle("is-open");
    burger.classList.toggle("is-open", open);
    burger.setAttribute("aria-expanded", String(open));
    if (!open) closeAllDropdowns();
  });

  dropdownRoots.forEach((root) => {
    const btn = root.querySelector("[data-dropdown-btn]");
    const panel = root.querySelector("[data-dropdown-panel]");

    btn?.addEventListener("click", (event) => {
      event.preventDefault();
      event.stopPropagation();
      if (mqDesktop.matches) {
        openDropdown(root);
        return;
      }
      if (panel?.hidden) openDropdown(root);
      else closeDropdown(root);
    });

    root.addEventListener("mouseenter", () => {
      if (mqDesktop.matches) openDropdown(root);
    });

    root.addEventListener("mouseleave", () => {
      if (mqDesktop.matches) scheduleClose(root);
    });

    panel?.addEventListener("mouseenter", () => {
      if (mqDesktop.matches) openDropdown(root);
    });

    panel?.addEventListener("mouseleave", () => {
      if (mqDesktop.matches) scheduleClose(root);
    });
  });

  document.addEventListener("click", (event) => {
    dropdownRoots.forEach((root) => {
      if (!root.contains(event.target)) closeDropdown(root);
    });
  });

  mobileMenu?.querySelectorAll("a").forEach((link) => {
    link.addEventListener("click", () => {
      if (!mqDesktop.matches) closeMobile();
      closeAllDropdowns();
    });
  });

  mqDesktop.addEventListener("change", (event) => {
    if (event.matches) closeMobile();
    closeAllDropdowns();
  });

  document.querySelectorAll("[data-open-services]").forEach((btn) => {
    btn.addEventListener("click", () => {
      const first = dropdownRoots[0];
      if (!first) return;
      openDropdown(first);
      first.querySelector("[data-dropdown-btn]")?.focus();
    });
  });

  function openModal(topic) {
    if (!modal) return;
    closeAllDropdowns();
    closeMobile();
    modal.hidden = false;
    document.body.classList.add("modal-open");
    const topicInput = form?.querySelector('[name="topic"]');
    if (topicInput) topicInput.value = topic || "";
    modal.querySelector(".modal__dialog")?.focus();
  }

  function closeModal() {
    if (!modal) return;
    modal.hidden = true;
    document.body.classList.remove("modal-open");
  }

  document.querySelectorAll("[data-open-modal]").forEach((btn) => {
    btn.addEventListener("click", (event) => {
      event.preventDefault();
      openModal(btn.getAttribute("data-topic"));
    });
  });

  modal?.querySelectorAll("[data-close-modal]").forEach((el) => {
    el.addEventListener("click", closeModal);
  });

  document.addEventListener("keydown", (event) => {
    if (event.key !== "Escape") return;
    closeModal();
    closeAllDropdowns();
    closeMobile();
  });

  const phoneInput = form?.querySelector('[name="phone"]');

  function formatPhone(value) {
    const digits = value.replace(/\D/g, "").replace(/^8/, "7");
    let next = digits.startsWith("7") ? digits : `7${digits}`;
    next = next.slice(0, 11);
    const a = next.slice(1, 4);
    const b = next.slice(4, 7);
    const c = next.slice(7, 9);
    const d = next.slice(9, 11);
    let out = "+7";
    if (a) out += ` (${a}`;
    if (a.length === 3) out += ")";
    if (b) out += ` ${b}`;
    if (c) out += `-${c}`;
    if (d) out += `-${d}`;
    return out;
  }

  phoneInput?.addEventListener("input", () => {
    phoneInput.value = formatPhone(phoneInput.value);
  });

  form?.addEventListener("submit", (event) => {
    event.preventDefault();
    const errorEl = form.querySelector("[data-form-error]");
    const successEl = document.querySelector("[data-form-success]");
    const data = new FormData(form);
    const name = String(data.get("name") || "").trim();
    const phone = String(data.get("phone") || "").replace(/\D/g, "");
    const agree = form.querySelector('[name="agree"]')?.checked;

    if (errorEl) errorEl.hidden = true;

    if (name.length < 2) {
      if (errorEl) {
        errorEl.hidden = false;
        errorEl.textContent = "Укажите имя.";
      }
      return;
    }
    if (phone.length < 11) {
      if (errorEl) {
        errorEl.hidden = false;
        errorEl.textContent = "Укажите телефон полностью.";
      }
      return;
    }
    if (!agree) {
      if (errorEl) {
        errorEl.hidden = false;
        errorEl.textContent = "Нужно согласие на обработку данных.";
      }
      return;
    }

    form.hidden = true;
    if (successEl) successEl.hidden = false;
  });
})();
