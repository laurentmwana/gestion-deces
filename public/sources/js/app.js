(function() {
    const elementBars = document.querySelectorAll("[data-navbar-toggle]")
    const bars = document.querySelector("[toggle-header]")
    // toggle du bouton mobile (bars)
    if (bars !== undefined && bars !== null) {
        bars.addEventListener("click", () => {
           elementBars.forEach((e) => {
               e.classList.toggle("toggle-h")
           })
           bars.classList.toggle("active")
        })  
    }

    const flash = document.querySelector("[data-flash]");

    if (flash !== undefined && flash !== null) {
        
        setInterval(() => {
            flash.classList.add("hide")
        }, 5000)
    }

 
})()