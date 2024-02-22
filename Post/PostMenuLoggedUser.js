function toggleMenu()
{
    let IsMenuVisible = false;
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
}
