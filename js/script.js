document.addEventListener('DOMContentLoaded', () => {
    const msg = document.getElementById('popMSG');
    if (msg) {
        // add class to show msg
        msg.classList.add('show');

        // delete msg
        setTimeout(() => {
            msg.classList.remove('show');
        }, 3000);
    }
    console.log(msg)
});