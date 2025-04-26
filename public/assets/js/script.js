document.addEventListener("DOMContentLoaded", () => {
    // Toggle sidebar on mobile
    const sidebarToggle = document.getElementById("sidebarToggle");
    const sidebar = document.querySelector(".sidebar");

    if (sidebarToggle) {
        sidebarToggle.addEventListener("click", () => {
            sidebar.classList.toggle("active");
        });
    }

    // Panel toggle functionality
    const panelToggles = document.querySelectorAll(".panel-toggle");

    panelToggles.forEach((toggle) => {
        toggle.addEventListener("click", function () {
            const panel = this.closest(".panel");
            const panelBody = panel.querySelector(".panel-body");
            const icon = this.querySelector("i");

            if (panelBody.style.display === "none") {
                panelBody.style.display = "block";
                icon.classList.remove("fa-chevron-down");
                icon.classList.add("fa-chevron-up");
            } else {
                panelBody.style.display = "none";
                icon.classList.remove("fa-chevron-up");
                icon.classList.add("fa-chevron-down");
            }
        });
    });

    // Preview device switcher
    const previewButtons = document.querySelectorAll(".preview-btn");
    const previewContainer = document.querySelector(".preview-container");

    previewButtons.forEach((button) => {
        button.addEventListener("click", function () {
            // Remove active class from all buttons
            previewButtons.forEach((btn) => btn.classList.remove("active"));

            // Add active class to clicked button
            this.classList.add("active");

            // Update preview container class
            const device = this.getAttribute("data-device");
            previewContainer.className = "preview-container " + device;
        });
    });

    // Product row click handler
    const productRows = document.querySelectorAll(".product-row");
    const productsSection = document.querySelector(".products-section");
    const productTimerSettings = document.querySelector(
        ".product-timer-settings"
    );
    const selectedProductName = document.getElementById(
        "selected-product-name"
    );
    const selectedProductSku = document.getElementById("selected-product-sku");

    // Function to show product timer settings
    function showProductTimerSettings(productId, productName, productSku) {
        // Update selected product info
        selectedProductName.textContent = productName;
        selectedProductSku.textContent = "SKU: " + productSku;

        // Get additional product details from the row
        const productRow = document.querySelector(
            `.product-row[data-product-id="${productId}"]`
        );
        const productImage = productRow.querySelector(".product-image img").src;
        const regularPrice =
            productRow.querySelector(".regular-price").textContent;
        const salePrice = productRow.querySelector(".sale-price").textContent;

        // Hide products section and show timer settings
        productsSection.style.display = "none";
        productTimerSettings.style.display = "block";

        // Update page header
        document.querySelector(".page-header h1").textContent =
            "Product Timer Settings";
        document.querySelector(".page-header .actions").style.display = "none";

        // Initialize preview with current form values
        initializePreview();

        // Calculate discount percentage
        if (discountBadgePreview) {
            const regPrice = Number.parseFloat(
                regularPrice.replace(/[^0-9.-]+/g, "")
            );
            const saleP = Number.parseFloat(
                salePrice.replace(/[^0-9.-]+/g, "")
            );
            if (!isNaN(regPrice) && !isNaN(saleP) && regPrice > 0) {
                const discountPercent = Math.round(
                    ((regPrice - saleP) / regPrice) * 100
                );
                discountBadgePreview.textContent = `${discountPercent}% OFF`;

                // Update discount value in form
                if (discountValue && discountType) {
                    discountValue.value = discountPercent;
                    discountType.value = "percentage";
                }
            }
        }
    }

    // Add click event to product rows
    productRows.forEach((row) => {
        row.addEventListener("click", function (e) {
            // Don't trigger if clicking on checkbox or action buttons
            if (
                e.target.closest(".checkbox") ||
                e.target.closest(".action-buttons")
            ) {
                return;
            }

            const productId = this.getAttribute("data-product-id");
            const productName = this.querySelector(
                ".product-details h4"
            ).textContent;
            const productSku =
                this.querySelector(".product-details p").textContent;

            showProductTimerSettings(productId, productName, productSku);
        });
    });

    // Add click event to timer buttons
    const timerButtons = document.querySelectorAll(".timer-btn");

    timerButtons.forEach((button) => {
        button.addEventListener("click", function (e) {
            e.stopPropagation(); // Prevent row click

            const row = this.closest(".product-row");
            const productId = row.getAttribute("data-product-id");
            const productName = row.querySelector(
                ".product-details h4"
            ).textContent;
            const productSku =
                row.querySelector(".product-details p").textContent;

            showProductTimerSettings(productId, productName, productSku);
        });
    });

    // Back button functionality
    const backButton = document.getElementById("back-to-products");

    if (backButton) {
        backButton.addEventListener("click", () => {
            // Hide timer settings and show products section
            productTimerSettings.style.display = "none";
            productsSection.style.display = "block";

            // Reset page header
            document.querySelector(".page-header h1").textContent = "Products";
            document.querySelector(".page-header .actions").style.display =
                "flex";
        });
    }

    // Form input change handlers to update preview
    const saleTitle = document.getElementById("sale-title");
    const saleDescription = document.getElementById("sale-description");
    const discountValue = document.getElementById("discount-value");
    const discountType = document.getElementById("discount-type");
    const ctaText = document.getElementById("cta-text");
    const ctaUrl = document.getElementById("cta-url");
    const saleStatus = document.getElementById("sale-status");
    const campaignName = document.getElementById("campaign-name");
    const startDate = document.getElementById("start-date");
    const startTime = document.getElementById("start-time");
    const endDate = document.getElementById("end-date");
    const endTime = document.getElementById("end-time");

    // Preview elements
    const saleTitlePreview = document.querySelector(".sale-title-preview");
    const saleDescriptionPreview = document.querySelector(
        ".sale-description-preview"
    );
    const discountBadgePreview = document.querySelector(
        ".discount-badge-preview"
    );
    const ctaButtonPreview = document.querySelector(".cta-button-preview");
    const productPreviewTitle = document.querySelector(
        ".product-preview-title"
    );
    const countdownTimerPreview = document.querySelector(
        ".countdown-timer-preview"
    );

    // Flip card elements
    const daysFront = document.getElementById("days-front");
    const daysBack = document.getElementById("days-back");
    const hoursFront = document.getElementById("hours-front");
    const hoursBack = document.getElementById("hours-back");
    const minutesFront = document.getElementById("minutes-front");
    const minutesBack = document.getElementById("minutes-back");
    const secondsFront = document.getElementById("seconds-front");
    const secondsBack = document.getElementById("seconds-back");

    const daysFlip = document.getElementById("days-flip");
    const hoursFlip = document.getElementById("hours-flip");
    const minutesFlip = document.getElementById("minutes-flip");
    const secondsFlip = document.getElementById("seconds-flip");

    // Initialize preview with current form values
    function initializePreview() {
        if (saleTitle && saleTitlePreview) {
            saleTitlePreview.textContent = saleTitle.value.toUpperCase();
        }

        if (saleDescription && saleDescriptionPreview) {
            saleDescriptionPreview.textContent = saleDescription.value;
        }

        if (discountValue && discountType && discountBadgePreview) {
            const value = discountValue.value;
            const type = discountType.value;
            discountBadgePreview.textContent =
                type === "percentage" ? `${value}% OFF` : `$${value} OFF`;
        }

        if (ctaText && ctaButtonPreview) {
            ctaButtonPreview.textContent = ctaText.value;
        }

        // Apply initial colors from color pickers
        const colorPickers = document.querySelectorAll('input[type="color"]');
        colorPickers.forEach((picker) => {
            const colorType =
                picker.previousElementSibling.textContent.toLowerCase();
            applyColorToPreview(colorType, picker.value);
        });

        // Update countdown timer based on end date/time
        updateCountdownPreview();
    }

    // Add this new function to apply colors to the preview
    function applyColorToPreview(colorType, colorValue) {
        switch (colorType) {
            case "primary":
                // document.documentElement.style.setProperty(
                //     "--primary-color",
                //     colorValue
                // );
                if (ctaButtonPreview) {
                    ctaButtonPreview.style.backgroundColor = colorValue;
                }

                break;
            case "accent":
                // document.documentElement.style.setProperty(
                //     "--accent-color",
                //     colorValue
                // );
                if (discountBadgePreview) {
                    discountBadgePreview.style.backgroundColor = colorValue;
                }

                break;
            case "text":
                // document.documentElement.style.setProperty(
                //     "--text-color",
                //     colorValue
                // );
                if (saleTitlePreview) {
                    saleTitlePreview.style.color = colorValue;
                }

                break;
            case "background":
                const saleBanner = document.querySelector(
                    ".sale-banner-preview"
                );
                if (saleBanner) {
                    saleBanner.style.backgroundColor = colorValue;
                }

                break;
        }
    }

    // Call initialize on page load
    initializePreview();

    // Variables to track current time values
    let currentDays = 0;
    let currentHours = 0;
    let currentMinutes = 0;
    let currentSeconds = 0;

    // Update countdown preview based on end date/time
    function updateCountdownPreview() {
        if (!endDate || !endTime) return;

        const now = new Date();
        const endDateTime = new Date(`${endDate.value}T${endTime.value}`);

        // Calculate difference in milliseconds
        const diff = endDateTime - now;

        // If end date is in the past, show zeros
        if (diff <= 0) {
            updateFlipCard("days", 0);
            updateFlipCard("hours", 0);
            updateFlipCard("minutes", 0);
            updateFlipCard("seconds", 0);
            return;
        }

        // Calculate days, hours, minutes, seconds
        const days = Math.floor(diff / (1000 * 60 * 60 * 24));
        const hours = Math.floor(
            (diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
        );
        const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((diff % (1000 * 60)) / 1000);

        // Update flip cards if values have changed
        if (days !== currentDays) {
            updateFlipCard("days", days);
            currentDays = days;
        }

        if (hours !== currentHours) {
            updateFlipCard("hours", hours);
            currentHours = hours;
        }

        if (minutes !== currentMinutes) {
            updateFlipCard("minutes", minutes);
            currentMinutes = minutes;
        }

        if (seconds !== currentSeconds) {
            updateFlipCard("seconds", seconds);
            currentSeconds = seconds;
        }
    }

    // Function to update a flip card with animation
    function updateFlipCard(unit, value) {
        const formattedValue = value.toString().padStart(2, "0");
        const frontEl = document.getElementById(`${unit}-front`);
        const backEl = document.getElementById(`${unit}-back`);
        const flipEl = document.getElementById(`${unit}-flip`);

        if (!frontEl || !backEl || !flipEl) return;

        // Update the back face with the new value
        backEl.textContent = formattedValue;

        // Add the flip class to animate
        flipEl.classList.add("flipping");

        // After animation completes, reset for next flip
        setTimeout(() => {
            flipEl.classList.remove("flipping");
            frontEl.textContent = formattedValue;
        }, 600);
    }

    // Start a timer to update the countdown preview every second
    const countdownInterval = setInterval(updateCountdownPreview, 1000);

    // Update preview on input change
    if (saleTitle) {
        saleTitle.addEventListener("input", function () {
            if (saleTitlePreview) {
                saleTitlePreview.textContent = this.value.toUpperCase();
            }
        });
    }

    if (saleDescription) {
        saleDescription.addEventListener("input", function () {
            if (saleDescriptionPreview) {
                saleDescriptionPreview.textContent = this.value;
            }
        });
    }

    if (discountValue && discountType) {
        const updateDiscountBadge = () => {
            if (discountBadgePreview) {
                const value = discountValue.value;
                const type = discountType.value;
                discountBadgePreview.textContent =
                    type === "percentage" ? `${value}% OFF` : `$${value} OFF`;
            }
        };

        discountValue.addEventListener("input", updateDiscountBadge);
        discountType.addEventListener("change", updateDiscountBadge);
    }

    if (ctaText) {
        ctaText.addEventListener("input", function () {
            if (ctaButtonPreview) {
                ctaButtonPreview.textContent = this.value;
            }
        });
    }

    // Update end date/time preview
    if (endDate) {
        endDate.addEventListener("change", () => {
            // Reset current values to force update
            currentDays = -1;
            currentHours = -1;
            currentMinutes = -1;
            currentSeconds = -1;
            updateCountdownPreview();
        });
    }

    if (endTime) {
        endTime.addEventListener("change", () => {
            // Reset current values to force update
            currentDays = -1;
            currentHours = -1;
            currentMinutes = -1;
            currentSeconds = -1;
            updateCountdownPreview();
        });
    }

    // Color pickers
    const colorPickers = document.querySelectorAll('input[type="color"]');

    colorPickers.forEach((picker) => {
        picker.addEventListener("input", function () {
            const colorType =
                this.previousElementSibling.textContent.toLowerCase();
            applyColorToPreview(colorType, this.value);
        });
    });

    // Update product preview when a product is selected
    function updateProductPreview(
        productName,
        productImage,
        regularPrice,
        salePrice
    ) {
        const previewTitle = document.querySelector(".product-preview-title");
        const previewImage = document.querySelector(
            ".product-preview-image img"
        );
        const previewRegularPrice = document.querySelector(
            ".product-preview-regular-price"
        );
        const previewSalePrice = document.querySelector(
            ".product-preview-sale-price"
        );

        if (previewTitle) previewTitle.textContent = productName;
        if (previewImage) {
            previewImage.src =
                productImage || "https://via.placeholder.com/300";
            previewImage.alt = productName;
        }

        if (previewRegularPrice) previewRegularPrice.textContent = regularPrice;
        if (previewSalePrice) previewSalePrice.textContent = salePrice;

        // Calculate discount percentage for badge
        if (discountBadgePreview) {
            const regPrice = Number.parseFloat(
                regularPrice.replace(/[^0-9.-]+/g, "")
            );
            const saleP = Number.parseFloat(
                salePrice.replace(/[^0-9.-]+/g, "")
            );
            if (!isNaN(regPrice) && !isNaN(saleP) && regPrice > 0) {
                const discountPercent = Math.round(
                    ((regPrice - saleP) / regPrice) * 100
                );
                discountBadgePreview.textContent = `${discountPercent}%\nOFF`;

                // Update discount value in form
                if (discountValue && discountType) {
                    discountValue.value = discountPercent;
                    discountType.value = "percentage";
                }
            }
        }
    }

    // Select all checkbox functionality
    const selectAllCheckbox = document.getElementById("select-all");
    const productCheckboxes = document.querySelectorAll(".product-checkbox");

    if (selectAllCheckbox) {
        selectAllCheckbox.addEventListener("change", function () {
            productCheckboxes.forEach((checkbox) => {
                checkbox.checked = this.checked;
            });
        });
    }

    // Save changes button
    const saveButton = document.querySelector(
        ".product-timer-settings .primary-btn"
    );

    if (saveButton) {
        saveButton.addEventListener("click", () => {
            // Show a success message
            const message = document.createElement("div");
            message.className = "save-message";
            message.innerHTML =
                '<i class="fas fa-check-circle"></i> Timer settings saved successfully!';
            message.style.position = "fixed";
            message.style.bottom = "30px";
            message.style.right = "30px";
            message.style.backgroundColor = "var(--success-color)";
            message.style.color = "white";
            message.style.padding = "15px 20px";
            message.style.borderRadius = "var(--radius)";
            message.style.boxShadow = "var(--shadow)";
            message.style.display = "flex";
            message.style.alignItems = "center";
            message.style.gap = "10px";
            message.style.zIndex = "1000";
            message.style.animation = "slideIn 0.3s ease-out forwards";

            document.body.appendChild(message);

            // Remove the message after 3 seconds
            setTimeout(() => {
                message.style.animation = "slideOut 0.3s ease-out forwards";
                setTimeout(() => {
                    document.body.removeChild(message);
                }, 300);
            }, 3000);

            // Return to products list after saving
            setTimeout(() => {
                backButton.click();
            }, 1000);
        });
    }

    // Add animations
    document.head.insertAdjacentHTML(
        "beforeend",
        `
        <style>
            @keyframes slideIn {
                from { transform: translateX(100%); opacity: 0; }
                to { transform: translateX(0); opacity: 1; }
            }

            @keyframes slideOut {
                from { transform: translateX(0); opacity: 1; }
                to { transform: translateX(100%); opacity: 0; }
            }
        </style>
    `
    );

    // Add flip animation to the head
    document.head.insertAdjacentHTML(
        "beforeend",
        `
      <style>
        @keyframes flipAnimation {
          0% { transform: perspective(400px) rotateX(0); }
          50% { transform: perspective(400px) rotateX(90deg); }
          100% { transform: perspective(400px) rotateX(0); }
        }

        .time-card-preview.flip {
          animation: flipAnimation 0.5s;
        }

        .countdown-timer-preview.expired .time-card-preview {
          background-color: var(--danger-color) !important;
        }
      </style>
    `
    );
});
