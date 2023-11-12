function validateForm() {
    var countdown = document.getElementById('countdown');
    countdown.style.display = 'none';

    var loginAttempts = parseInt(localStorage.getItem('loginAttempts')) || 0;
    var maxLoginAttempts = 3;
    var waitTime = 30;

    if (loginAttempts >= maxLoginAttempts) {
        countdown.style.display = 'block';
        startCountdown(waitTime);
        alert('You have exceeded the maximum login attempts. Please try again later.');
        return false;
    }

    localStorage.setItem('loginAttempts', loginAttempts + 1);
    return true;
}

function startCountdown(seconds) {
    var countdown = document.getElementById('countdown');
    countdown.innerText = 'You must wait ' + seconds + ' seconds before the next login attempt.';

    var countdownInterval = setInterval(function() {
        seconds--;
        countdown.innerText = 'You must wait ' + seconds + ' seconds before the next login attempt.';

        if (seconds <= 0) {
            clearInterval(countdownInterval);
            countdown.style.display = 'none';
        }
    }, 1000);
}
