let IsMenuVisible = false;

function toggleMenu() {
    let MenuTable = document.getElementById("MenuTable");
    if (!IsMenuVisible) 
    {
        MenuTable.classList.remove("hidden");
        IsMenuVisible = true;
    } 
    else 
    {
        MenuTable.classList.add("hidden");
        IsMenuVisible = false;
    }
}