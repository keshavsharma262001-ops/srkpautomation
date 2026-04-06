document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("srkp-quote-modal");

  if (!modal) {
    return;
  }

  const dialog = modal.querySelector(".srkp-quote-modal__dialog");
  const triggers = document.querySelectorAll(".srkp-quote-trigger");
  const closeElements = modal.querySelectorAll("[data-modal-close]");
  const forms = modal.querySelectorAll("[data-mrx-form]");
  let previousActiveElement = null;

  function openModal(event) {
    if (event) {
      event.preventDefault();
    }

    previousActiveElement = document.activeElement;
    modal.hidden = false;
    document.body.classList.add("srkp-modal-open");

    window.setTimeout(function () {
      const firstInput = modal.querySelector("input, textarea, button");
      if (firstInput) {
        firstInput.focus();
      }
    }, 40);
  }

  function closeModal() {
    modal.hidden = true;
    document.body.classList.remove("srkp-modal-open");

    if (previousActiveElement) {
      previousActiveElement.focus();
    }
  }

  triggers.forEach(function (trigger) {
    trigger.addEventListener("click", openModal);
  });

  closeElements.forEach(function (element) {
    element.addEventListener("click", closeModal);
  });

  document.addEventListener("keydown", function (event) {
    if (event.key === "Escape" && !modal.hidden) {
      closeModal();
    }
  });

  modal.addEventListener("click", function (event) {
    if (!dialog.contains(event.target) && !modal.hidden) {
      closeModal();
    }
  });

  forms.forEach(function (form) {
    form.addEventListener("submit", function (event) {
      event.preventDefault();

      const submitButton = form.querySelector('button[type="submit"]');
      const responseElement = form.parentElement.querySelector("[data-mrx-response]");
      const formData = new FormData(form);

      submitButton.disabled = true;
      submitButton.dataset.originalText = submitButton.textContent;
      submitButton.textContent = "Sending...";
      responseElement.innerHTML = "";

      formData.append("action", "mrx_handle_form");
      formData.append("mrx_nonce", srkpQuoteModal.nonce);

      fetch(srkpQuoteModal.ajaxUrl, {
        method: "POST",
        body: formData,
      })
        .then(function (response) {
          if (!response.ok) {
            throw new Error("Network error");
          }

          return response.json();
        })
        .then(function (data) {
          if (!data.success) {
            throw new Error(data.data || "Something went wrong");
          }

          responseElement.innerHTML =
            '<p class="mrx-success">' + data.data + "</p>";
          form.reset();

          window.setTimeout(function () {
            closeModal();
          }, 1400);
        })
        .catch(function (error) {
          responseElement.innerHTML =
            '<p class="mrx-error">' + error.message + "</p>";
        })
        .finally(function () {
          submitButton.disabled = false;
          submitButton.textContent =
            submitButton.dataset.originalText || "Send Inquiry";
        });
    });
  });
});
