document.addEventListener('DOMContentLoaded', () => {
    const msg = document.getElementById('popMSG');
    if (msg) {
        msg.classList.add('show');

        setTimeout(() => {
            msg.classList.remove('show');
        }, 3000);
    }
});