// Example of timing for quiz
let timer;
let timeLeft = 300; // 5 minutes

function startTimer() {
    timer = setInterval(() => {
        timeLeft--;
        document.getElementById('time').textContent = `Time Left: ${timeLeft}s`;
        if (timeLeft <= 0) {
            clearInterval(timer);
            alert('Time is up!');
            // Trigger form submission or other actions.
        }
    }, 1000);
}

function stopTimer() {
    clearInterval(timer);
}

document.addEventListener('DOMContentLoaded', startTimer);
