let IsMenuVisible = false;

function toggleMenu() {
    console.log("Function was called successfully");
    let MenuTable = document.getElementById("MenuTable");
    if (!IsMenuVisible) 
    {
        MenuTable.style.display = "inline-table";
        IsMenuVisible = true;
    } 
    else 
    {
        MenuTable.style.display = "none";
        IsMenuVisible = false;
    }
}