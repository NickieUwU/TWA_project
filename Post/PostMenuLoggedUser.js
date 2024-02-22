let IsMenuVisible = false;
let Menudots = document.getElementById("MenuDots");
Menudots.addEventListener("click", () => {
    if(!IsMenuVisible)
    {
        Menudots.style.display = "block";
        IsMenuVisible = true;
    }
    else
    {
        Menudots.style.display = "none";
        IsMenuVisible = false;
    }
});