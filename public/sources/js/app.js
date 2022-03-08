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

    const messages = document.querySelectorAll("div.message")
    const disabledMessage = "message-disabled"
    var interval = 8

    if (messages !== null && messages !== undefined) {
        messages.forEach((message) => {
            message.querySelectorAll("button.message-cancel").forEach((b) => {
                setInterval(() => {
                    b.querySelectorAll("em.times").forEach((em) => {
                        em.innerHTML = `${interval}`
                        --interval
                    })
                    
                }, 1000)
                b.addEventListener("click", () => {
                    message.classList.add(disabledMessage)
                })
            })

            if (!message.classList.contains(disabledMessage)) {
                setInterval(() => {
                    
                    message.classList.add(disabledMessage)
                }, (interval * 1000))
            }
        })
      
    }
 
})()