let IsMenuVisible = false;
let Menudots = document.getElementById("MenuDots");
Menudots.addEventListener("click", () => {
    let MenuTable = document.getElementById("MenuTable");
    if(!IsMenuVisible)
    {
        MenuTable.style.display = "table";
        IsMenuVisible = true;
    }
    else
    {
        MenuTable.style.display = "none";
        IsMenuVisible = false;
    }
});