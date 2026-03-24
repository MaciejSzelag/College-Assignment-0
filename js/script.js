document.addEventListener("DOMContentLoaded", function () {
    const popMSG = document.getElementById('popMSG');
    if (popMSG) {
        setTimeout(() => {
            popMSG.classList.add(".show-popMSG");
            console.log('show')
        }, 100);

        setTimeout(() => {
            popMSG.classList.remove(".show-popMSG");
            console.log('removed')
        }, 4000)
    }

})