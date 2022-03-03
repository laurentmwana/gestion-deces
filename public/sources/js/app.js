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

    document.querySelectorAll(".table.table-responsive").forEach(function (table) {
        var labels = []

        table.querySelectorAll("th").forEach(function (th) {
            labels.push(th.innerText)
        })

        table.querySelectorAll("td").forEach(function (td, i) {
            td.setAttribute("data-label", labels[i % labels.length])
        })

    })
 
})()