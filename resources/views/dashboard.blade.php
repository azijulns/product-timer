<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Countdown Timer Admin Dashboard</title>
        <link rel="stylesheet" href="assets/css/styles.css" />
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        />
    </head>
    <body>
        <div class="dashboard-container">


            <!-- Main Content -->
            <div class="main-content">
                <div class="top-bar">
                     <button class="mobile-toggle" id="sidebarToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="search-container">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Search products..." />
                    </div>
                    <div class="top-bar-actions">
                        <button class="notification-btn">
                            <i class="fas fa-bell"></i>
                            <span class="badge">3</span>
                        </button>
                        <button class="help-btn">
                            <i class="fas fa-question-circle"></i>
                        </button>
                    </div>
                </div>
          {{-- @include('partials.sidebar') --}}
                <div class="page-header">
                    <h1>Products</h1>
                    <div class="actions">
                        <button class="secondary-btn">
                            <i class="fas fa-filter"></i> Filter
                        </button>
                    </div>
                </div>

                <div class="dashboard-content">
                    <!-- Products Table -->
                    <div class="products-section">
                        <div class="panel">
                            <div class="panel-header">
                                <h2><i class="fas fa-box"></i> All Products</h2>
                                <div class="panel-actions">
                                    <span class="product-count"
                                        >12 products</span
                                    >
                                    <div class="view-options">
                                        <button
                                            class="view-btn active"
                                            data-view="table"
                                        >
                                            <i class="fas fa-list"></i>
                                        </button>
                                        <button
                                            class="view-btn"
                                            data-view="grid"
                                        >
                                            <i class="fas fa-th-large"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="products-table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Stock</th>
                                                <th>Category</th>
                                                <th>Sale Status</th>
                                                <th>Timer</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                class="product-row"
                                                data-product-id="1">

                                                <td>
                                                    <label class="checkbox">
                                                        <input
                                                            type="checkbox"
                                                            class="product-checkbox"
                                                        />
                                                        <span
                                                            class="checkmark"
                                                        ></span>
                                                    </label>
                                                    <div class="product-info">
                                                        <div
                                                            class="product-image"
                                                        >
                                                            <img
                                                                src="https://via.placeholder.com/50"
                                                                alt="Wireless Headphones"
                                                            />
                                                        </div>
                                                        <div
                                                            class="product-details"
                                                        >
                                                            <h4>
                                                                Wireless
                                                                Headphones
                                                            </h4>
                                                            <p>SKU: WH-001</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="price-info">
                                                        <span class="sale-price"
                                                            >$89.99</span
                                                        >
                                                        <span
                                                            class="regular-price"
                                                            >$129.99</span
                                                        >
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="stock in-stock"
                                                        >In Stock (45)</span
                                                    >
                                                </td>
                                                <td>Electronics</td>
                                                <td>
                                                    <span
                                                        class="status-badge active"
                                                        >Active Sale</span
                                                    >
                                                </td>
                                                <td>
                                                    <div class="timer-status">
                                                        <i
                                                            class="fas fa-clock"
                                                        ></i>
                                                        <span>2d 14h left</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="action-buttons">
                                                        <button
                                                            class="action-btn edit-btn"
                                                            title="Edit Product"
                                                        >
                                                            <i
                                                                class="fas fa-edit"
                                                            ></i>
                                                        </button>
                                                        <button
                                                            class="action-btn timer-btn"
                                                            title="Edit Timer"
                                                        >
                                                            <i
                                                                class="fas fa-stopwatch"
                                                            ></i>
                                                        </button>
                                                        <button
                                                            class="action-btn delete-btn"
                                                            title="Delete Product"
                                                        >
                                                            <i
                                                                class="fas fa-trash"
                                                            ></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                {{-- <div class="pagination">
                                    <button class="pagination-btn" disabled>
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <button class="pagination-btn active">
                                        1
                                    </button>
                                    <button class="pagination-btn">2</button>
                                    <button class="pagination-btn">3</button>
                                    <span class="pagination-ellipsis">...</span>
                                    <button class="pagination-btn">10</button>
                                    <button class="pagination-btn">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                    <!-- Product Timer Settings (Hidden by default, shown when a product is selected) -->
                    <div class="product-timer-settings" style="display: none">
                        <div class="product-header">
                            <div class="back-button">
                                <button id="back-to-products">
                                    <i class="fas fa-arrow-left"></i> Back to
                                    Products
                                </button>
                            </div>
                            <div class="selected-product-info">
                                <div class="selected-product-image">
                                    <img
                                        src="https://via.placeholder.com/50"
                                        alt="Selected Product"
                                    />
                                </div>
                                <div class="selected-product-details">
                                    <h3 id="selected-product-name">
                                        Wireless Headphones
                                    </h3>
                                    <p id="selected-product-sku">SKU: WH-001</p>
                                </div>
                            </div>
                        </div>

                        <!-- Control Panels for the selected product -->
                        <div class="control-panels">
                            <!-- Timer Settings Panel -->
                            <div class="panel">
                                <div class="panel-header">
                                    <h2>
                                        <i class="fas fa-clock"></i> Timer
                                        Settings
                                    </h2>
                                    <button class="panel-toggle">
                                        <i class="fas fa-chevron-up"></i>
                                    </button>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="sale-status"
                                            >Sale Status</label
                                        >
                                        <select id="sale-status">
                                            <option value="active" selected>
                                                Active
                                            </option>
                                            <option value="scheduled">
                                                Scheduled
                                            </option>
                                            <option value="inactive">
                                                Inactive
                                            </option>
                                            <option value="ended">Ended</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="campaign-name"
                                            >Campaign Name</label
                                        >
                                        <input
                                            type="text"
                                            id="campaign-name"
                                            value="Summer Flash Sale"
                                        />
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="start-date"
                                                >Start Date</label
                                            >
                                            <input
                                                type="date"
                                                id="start-date"
                                                value="2023-07-15"
                                            />
                                        </div>
                                        <div class="form-group">
                                            <label for="start-time"
                                                >Start Time</label
                                            >
                                            <input
                                                type="time"
                                                id="start-time"
                                                value="08:00"
                                            />
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="end-date"
                                                >End Date</label
                                            >
                                            <input
                                                type="date"
                                                id="end-date"
                                                value="2023-07-18"
                                            />
                                        </div>
                                        <div class="form-group">
                                            <label for="end-time"
                                                >End Time</label
                                            >
                                            <input
                                                type="time"
                                                id="end-time"
                                                value="23:59"
                                            />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="timezone">Timezone</label>
                                        <select id="timezone">
                                            <option value="UTC">
                                                UTC (Coordinated Universal Time)
                                            </option>
                                            <option value="EST" selected>
                                                EST (Eastern Standard Time)
                                            </option>
                                            <option value="CST">
                                                CST (Central Standard Time)
                                            </option>
                                            <option value="PST">
                                                PST (Pacific Standard Time)
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label
                                            >Timer Behavior After Expiry</label
                                        >
                                        <div class="radio-group">
                                            <label class="radio">
                                                <input
                                                    type="radio"
                                                    name="expiry-behavior"
                                                    checked
                                                />
                                                <span
                                                    >Show "Expired"
                                                    Message</span
                                                >
                                            </label>
                                            <label class="radio">
                                                <input
                                                    type="radio"
                                                    name="expiry-behavior"
                                                />
                                                <span>Hide Timer</span>
                                            </label>
                                            <label class="radio">
                                                <input
                                                    type="radio"
                                                    name="expiry-behavior"
                                                />
                                                <span>Redirect to URL</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Appearance Panel -->
                            <div class="panel">
                                <div class="panel-header">
                                    <h2>
                                        <i class="fas fa-paint-brush"></i>
                                        Appearance
                                    </h2>
                                    <button class="panel-toggle">
                                        <i class="fas fa-chevron-up"></i>
                                    </button>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="sale-title"
                                            >Sale Title</label
                                        >
                                        <input
                                            type="text"
                                            id="sale-title"
                                            value="Limited Time Offer"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="sale-description"
                                            >Sale Description</label
                                        >
                                        <textarea
                                            id="sale-description"
                                            rows="2"
                                        >
Get these premium wireless headphones at a special discount for a limited time!</textarea
                                        >
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="discount-value"
                                                >Discount Value</label
                                            >
                                            <input
                                                type="number"
                                                id="discount-value"
                                                value="30"
                                            />
                                        </div>
                                        <div class="form-group">
                                            <label for="discount-type"
                                                >Discount Type</label
                                            >
                                            <select id="discount-type">
                                                <option
                                                    value="percentage"
                                                    selected
                                                >
                                                    Percentage (%)
                                                </option>
                                                <option value="fixed">
                                                    Fixed Amount ($)
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cta-text"
                                            >Button Text</label
                                        >
                                        <input
                                            type="text"
                                            id="cta-text"
                                            value="Buy Now"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="cta-url">Button URL</label>
                                        <input
                                            type="url"
                                            id="cta-url"
                                            value="https://example.com/product/wireless-headphones"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label>Color Scheme</label>
                                        <div class="color-picker-container">
                                            <div class="color-option">
                                                <span>Primary</span>
                                                <input
                                                    type="color"
                                                    value="#4299e1"
                                                />
                                            </div>
                                            <div class="color-option">
                                                <span>Accent</span>
                                                <input
                                                    type="color"
                                                    value="#ff6b6b"
                                                />
                                            </div>
                                            <div class="color-option">
                                                <span>Text</span>
                                                <input
                                                    type="color"
                                                    value="#2d3748"
                                                />
                                            </div>
                                            <div class="color-option">
                                                <span>Background</span>
                                                <input
                                                    type="color"
                                                    value="#ffffff"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Advanced Settings Panel -->
                            <div class="panel">
                                <div class="panel-header">
                                    <h2>
                                        <i class="fas fa-sliders-h"></i>
                                        Advanced Settings
                                    </h2>
                                    <button class="panel-toggle">
                                        <i class="fas fa-chevron-down"></i>
                                    </button>
                                </div>
                                <div class="panel-body" style="display: none">
                                    <div class="form-group">
                                        <label>Animation Effects</label>
                                        <div class="checkbox-group">
                                            <label class="checkbox">
                                                <input
                                                    type="checkbox"
                                                    checked
                                                />
                                                <span>Flip Animation</span>
                                            </label>
                                            <label class="checkbox">
                                                <input
                                                    type="checkbox"
                                                    checked
                                                />
                                                <span>Pulse Effect</span>
                                            </label>
                                            <label class="checkbox">
                                                <input
                                                    type="checkbox"
                                                    checked
                                                />
                                                <span
                                                    >Background Particles</span
                                                >
                                            </label>
                                            <label class="checkbox">
                                                <input type="checkbox" />
                                                <span>Confetti on Expiry</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Display Options</label>
                                        <div class="checkbox-group">
                                            <label class="checkbox">
                                                <input
                                                    type="checkbox"
                                                    checked
                                                />
                                                <span>Show Days</span>
                                            </label>
                                            <label class="checkbox">
                                                <input
                                                    type="checkbox"
                                                    checked
                                                />
                                                <span>Show Hours</span>
                                            </label>
                                            <label class="checkbox">
                                                <input
                                                    type="checkbox"
                                                    checked
                                                />
                                                <span>Show Minutes</span>
                                            </label>
                                            <label class="checkbox">
                                                <input
                                                    type="checkbox"
                                                    checked
                                                />
                                                <span>Show Seconds</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Display Locations</label>
                                        <div class="checkbox-group">
                                            <label class="checkbox">
                                                <input
                                                    type="checkbox"
                                                    checked
                                                />
                                                <span>Product Page</span>
                                            </label>
                                            <label class="checkbox">
                                                <input
                                                    type="checkbox"
                                                    checked
                                                />
                                                <span>Category Page</span>
                                            </label>
                                            <label class="checkbox">
                                                <input type="checkbox" />
                                                <span>Home Page</span>
                                            </label>
                                            <label class="checkbox">
                                                <input type="checkbox" />
                                                <span>Cart Page</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="custom-css"
                                            >Custom CSS</label
                                        >
                                        <textarea
                                            id="custom-css"
                                            rows="4"
                                            placeholder="Add your custom CSS here..."
                                        ></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Preview Section -->
                        <div class="preview-section">
                            <div class="panel">
                                <div class="panel-header">
                                    <h2>
                                        <i class="fas fa-eye"></i> Live Preview
                                    </h2>
                                    <div class="preview-controls">
                                        <button
                                            class="preview-btn active"
                                            data-device="desktop"
                                        >
                                            <i class="fas fa-desktop"></i>
                                        </button>
                                        <button
                                            class="preview-btn"
                                            data-device="tablet"
                                        >
                                            <i class="fas fa-tablet-alt"></i>
                                        </button>
                                        <button
                                            class="preview-btn"
                                            data-device="mobile"
                                        >
                                            <i class="fas fa-mobile-alt"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <!-- Replace the existing preview container with this updated version -->
                                    <div class="preview-container desktop">
                                        <div class="preview-frame">
                                            <div class="sale-banner-preview">
                                                <div
                                                    class="discount-badge-preview"
                                                >
                                                    50% OFF
                                                </div>
                                                <h2 class="sale-title-preview">
                                                    SUMMER FLASH SALE
                                                </h2>
                                                <p
                                                    class="sale-description-preview"
                                                >
                                                    Don't miss out on our
                                                    biggest sale of the season!
                                                    Limited time offer.
                                                </p>

                                                <div
                                                    class="countdown-container-preview"
                                                >
                                                    <div
                                                        class="countdown-title-preview"
                                                    >
                                                        Offer Ends In:
                                                    </div>
                                                    <div
                                                        class="countdown-timer-preview"
                                                    >
                                                        <div
                                                            class="time-section-preview"
                                                        >
                                                            <div
                                                                class="flip-card-container"
                                                                id="days-container"
                                                            >
                                                                <div
                                                                    class="flip-card"
                                                                    id="days-flip"
                                                                >
                                                                    <div
                                                                        class="flip-card-front"
                                                                        id="days-front"
                                                                    >
                                                                        02
                                                                    </div>
                                                                    <div
                                                                        class="flip-card-back"
                                                                        id="days-back"
                                                                    >
                                                                        01
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="time-label-preview"
                                                            >
                                                                Days
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="time-section-preview"
                                                        >
                                                            <div
                                                                class="flip-card-container"
                                                                id="hours-container"
                                                            >
                                                                <div
                                                                    class="flip-card"
                                                                    id="hours-flip"
                                                                >
                                                                    <div
                                                                        class="flip-card-front"
                                                                        id="hours-front"
                                                                    >
                                                                        23
                                                                    </div>
                                                                    <div
                                                                        class="flip-card-back"
                                                                        id="hours-back"
                                                                    >
                                                                        22
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="time-label-preview"
                                                            >
                                                                Hours
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="time-section-preview"
                                                        >
                                                            <div
                                                                class="flip-card-container"
                                                                id="minutes-container"
                                                            >
                                                                <div
                                                                    class="flip-card"
                                                                    id="minutes-flip"
                                                                >
                                                                    <div
                                                                        class="flip-card-front"
                                                                        id="minutes-front"
                                                                    >
                                                                        59
                                                                    </div>
                                                                    <div
                                                                        class="flip-card-back"
                                                                        id="minutes-back"
                                                                    >
                                                                        58
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="time-label-preview"
                                                            >
                                                                Minutes
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="time-section-preview"
                                                        >
                                                            <div
                                                                class="flip-card-container"
                                                                id="seconds-container"
                                                            >
                                                                <div
                                                                    class="flip-card"
                                                                    id="seconds-flip"
                                                                >
                                                                    <div
                                                                        class="flip-card-front"
                                                                        id="seconds-front"
                                                                    >
                                                                        40
                                                                    </div>
                                                                    <div
                                                                        class="flip-card-back"
                                                                        id="seconds-back"
                                                                    >
                                                                        39
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="time-label-preview"
                                                            >
                                                                Seconds
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button
                                                    class="cta-button-preview"
                                                >
                                                    Shop Now
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="action-footer">
                            <button class="secondary-btn">
                                <i class="fas fa-times"></i> Cancel
                            </button>
                            <button class="primary-btn">
                                <i class="fas fa-save"></i> Save Timer Settings
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="assets/js/script.js"></script>
    </body>
</html>
