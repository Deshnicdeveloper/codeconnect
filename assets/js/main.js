// Set copyright year
document.getElementById('year').textContent = new Date().getFullYear();

// Countdown Timer
function updateCountdown() {
    const eventDate = new Date('November 29, 2025 00:00:00').getTime();

    function update() {
        const now = new Date().getTime();
        const distance = eventDate - now;

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById('countdown-days').textContent = String(days).padStart(2, '0');
        document.getElementById('countdown-hours').textContent = String(hours).padStart(2, '0');
        document.getElementById('countdown-minutes').textContent = String(minutes).padStart(2, '0');
        document.getElementById('countdown-seconds').textContent = String(seconds).padStart(2, '0');

        if (distance < 0) {
            clearInterval(countdownInterval);
            document.querySelectorAll('.countdown-value').forEach(el => {
                el.textContent = '00';
            });
        }
    }

    update(); // Initial update
    const countdownInterval = setInterval(update, 1000);
}

// Initialize countdown when document is ready
document.addEventListener('DOMContentLoaded', updateCountdown);
