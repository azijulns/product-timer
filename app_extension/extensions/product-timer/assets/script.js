document.addEventListener("DOMContentLoaded", function () {
    // Set the countdown date (3 days from now)
    const countdownDate = new Date();
    countdownDate.setDate(countdownDate.getDate() + 3);

    // Initialize previous values
    let prevDays, prevHours, prevMinutes, prevSeconds;

    // Update the countdown every second
    const timer = setInterval(function () {
        updateCountdown();
    }, 1000);

    // Initial countdown update
    updateCountdown();

    function updateCountdown() {
        console.log(44);

        const now = new Date().getTime();
        const distance = countdownDate - now;

        // Calculate time units
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor(
            (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
        );
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Format numbers to always have two digits
        const formattedDays = String(days).padStart(2, "0");
        const formattedHours = String(hours).padStart(2, "0");
        const formattedMinutes = String(minutes).padStart(2, "0");
        const formattedSeconds = String(seconds).padStart(2, "0");

        // Update the display with animation if values changed
        if (formattedDays !== prevDays) {
            flipCard("days", prevDays, formattedDays);
            prevDays = formattedDays;
        }

        if (formattedHours !== prevHours) {
            flipCard("hours", prevHours, formattedHours);
            prevHours = formattedHours;
        }

        if (formattedMinutes !== prevMinutes) {
            flipCard("minutes", prevMinutes, formattedMinutes);
            prevMinutes = formattedMinutes;
        }

        if (formattedSeconds !== prevSeconds) {
            flipCard("seconds", prevSeconds, formattedSeconds);
            prevSeconds = formattedSeconds;
        }

        // If the countdown is over
        if (distance < 0) {
            clearInterval(timer);
            document.querySelector(".countdown-title").textContent =
                "Sale Ended!";
            document
                .querySelectorAll(".time-card-top, .time-card-bottom")
                .forEach((el) => {
                    el.textContent = "00";
                });
        }
    }

    function flipCard(unit, prevValue, newValue) {
        if (prevValue === undefined) {
            // Initial load, just set the values without animation
            document.getElementById(`${unit}-top`).textContent = newValue;
            document.getElementById(`${unit}-bottom`).textContent = newValue;
            document.getElementById(`${unit}-back`).textContent = newValue;
            document.getElementById(`${unit}-back-bottom`).textContent =
                newValue;
            return;
        }

        // Set the current value in the top and bottom cards
        document.getElementById(`${unit}-top`).textContent = prevValue;
        document.getElementById(`${unit}-bottom`).textContent = prevValue;

        // Set the new value in the back cards
        document.getElementById(`${unit}-back`).textContent = newValue;
        document.getElementById(`${unit}-back-bottom`).textContent = newValue;

        // Trigger flip animation
        const topCard = document.getElementById(`${unit}-top`);
        topCard.style.animation = "flip 0.6s ease-in-out";
        topCard.style.transformOrigin = "bottom center";

        // After animation completes, reset and update values
        setTimeout(() => {
            topCard.style.animation = "";

            // Update the displayed values
            document.getElementById(`${unit}-top`).textContent = newValue;
            document.getElementById(`${unit}-bottom`).textContent = newValue;
        }, 600);
    }
});
