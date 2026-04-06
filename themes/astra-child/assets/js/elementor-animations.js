document.addEventListener("DOMContentLoaded", function () {
  const animatedClass = "is-animated";
  const legacyAnimatedClass = "show";
  const viewportOffset = 80;
  const autoAnimatedFlag = "animAutoApplied";

  function isHomePage() {
    return (
      document.body.classList.contains("home") ||
      document.body.classList.contains("front-page")
    );
  }

  function hasManualAnimationClasses(scope) {
    return scope.querySelector(
      ".fade-up, .anim-scroll, .anim-load, .anim-fade-left, .anim-fade-right, .anim-fade-down, .anim-zoom-in, .anim-zoom-out"
    );
  }

  function applyHomePageAnimations(scope) {
    if (!isHomePage() || hasManualAnimationClasses(scope)) {
      return;
    }

    const targets = Array.from(
      scope.querySelectorAll(
        ".elementor-top-section, .elementor-widget-wrap > .elementor-element, .elementor-widget"
      )
    ).filter(function (element) {
      return (
        !element.dataset[autoAnimatedFlag] &&
        !element.closest(".elementor-editor-active") &&
        element.offsetParent !== null
      );
    });

    targets.forEach(function (element, index) {
      const delay = (index % 4) + 1;
      const direction =
        index % 3 === 0
          ? "anim-fade-left"
          : index % 3 === 1
          ? "anim-fade-right"
          : "anim-fade-down";

      if (index < 2) {
        element.classList.add("anim-load", "anim-zoom-in");
      } else {
        element.classList.add("anim-scroll", direction);
      }

      element.classList.add("anim-delay-" + delay);
      element.dataset[autoAnimatedFlag] = "true";
    });
  }

  function markVisible(element) {
    element.classList.add(animatedClass);

    if (element.classList.contains("fade-up")) {
      element.classList.add(legacyAnimatedClass);
    }
  }

  function setupLoadAnimations(scope) {
    scope.querySelectorAll(".anim-load").forEach(function (element) {
      markVisible(element);
    });
  }

  function setupScrollAnimations(scope) {
    const elements = Array.from(
      scope.querySelectorAll(".fade-up, .anim-scroll")
    ).filter(function (element) {
      return !element.dataset.animBound;
    });

    if (!elements.length) {
      return;
    }

    if ("IntersectionObserver" in window) {
      const observer = new IntersectionObserver(
        function (entries, instance) {
          entries.forEach(function (entry) {
            if (!entry.isIntersecting) {
              return;
            }

            markVisible(entry.target);
            instance.unobserve(entry.target);
          });
        },
        {
          root: null,
          rootMargin: "0px 0px -" + viewportOffset + "px 0px",
          threshold: 0.15,
        }
      );

      elements.forEach(function (element) {
        element.dataset.animBound = "true";
        observer.observe(element);
      });

      return;
    }

    function animateOnScroll() {
      elements.forEach(function (element) {
        if (element.classList.contains(animatedClass)) {
          return;
        }

        const elementTop = element.getBoundingClientRect().top;
        if (elementTop < window.innerHeight - viewportOffset) {
          markVisible(element);
        }
      });
    }

    elements.forEach(function (element) {
      element.dataset.animBound = "true";
    });

    window.addEventListener("scroll", animateOnScroll, { passive: true });
    animateOnScroll();
  }

  function initAnimations(scope) {
    applyHomePageAnimations(scope);
    setupLoadAnimations(scope);
    setupScrollAnimations(scope);
  }

  initAnimations(document);

  if (window.elementorFrontend && window.elementorFrontend.hooks) {
    window.elementorFrontend.hooks.addAction(
      "frontend/element_ready/global",
      function ($scope) {
        const scopeElement = $scope && $scope[0] ? $scope[0] : document;
        initAnimations(scopeElement);
      }
    );
  }

  document.addEventListener("elementor/popup/show", function () {
    initAnimations(document);
  });
});
