document.addEventListener("DOMContentLoaded", function () {
  const header = document.querySelector(".srkp-header");
  const toggle = document.querySelector(".srkp-mobile-toggle");
  const mobileMenu = document.querySelector(".srkp-mobile-menu");
  const hero = document.querySelector(".srkp-hero");
  const projectCards = document.querySelectorAll(".srkp-project-card");

  if (toggle && mobileMenu) {
    toggle.addEventListener("click", function () {
      const expanded = toggle.getAttribute("aria-expanded") === "true";
      toggle.setAttribute("aria-expanded", String(!expanded));
      mobileMenu.hidden = expanded;
      document.body.classList.toggle("srkp-menu-open", !expanded);
    });
  }

  if (header) {
    const updateHeader = function () {
      header.classList.toggle("is-scrolled", window.scrollY > 24);
    };

    window.addEventListener("scroll", updateHeader, { passive: true });
    updateHeader();
  }

  if (hero) {
    window.addEventListener(
      "mousemove",
      function (event) {
        const x = (event.clientX / window.innerWidth - 0.5) * 18;
        const y = (event.clientY / window.innerHeight - 0.5) * 18;
        hero.style.setProperty("--hero-shift-x", x.toFixed(2) + "px");
        hero.style.setProperty("--hero-shift-y", y.toFixed(2) + "px");
      },
      { passive: true }
    );
  }

  projectCards.forEach(function (card) {
    card.addEventListener("mousemove", function (event) {
      const bounds = card.getBoundingClientRect();
      const x = ((event.clientX - bounds.left) / bounds.width - 0.5) * 10;
      const y = ((event.clientY - bounds.top) / bounds.height - 0.5) * -10;
      card.style.setProperty("--tilt-x", y.toFixed(2) + "deg");
      card.style.setProperty("--tilt-y", x.toFixed(2) + "deg");
    });

    card.addEventListener("mouseleave", function () {
      card.style.setProperty("--tilt-x", "0deg");
      card.style.setProperty("--tilt-y", "0deg");
    });
  });
});
