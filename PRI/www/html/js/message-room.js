setTimeout(() => {
    // Změní opacity na 0 pro animovaný přechod
    document.getElementById("message-room").style.opacity = "0";

    // Po dokončení animace (čas přechodu + malá prodleva) nastaví element jako neviditelný
    setTimeout(() => {
        document.getElementById("message-room").style.display = "none";
    }, 1000); // 1000 ms odpovídá času přechodu v CSS
}, 1500); // Spustí animaci po 1,5 sekundě
