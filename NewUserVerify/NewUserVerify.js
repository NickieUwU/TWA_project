function changecontent()
{
    //'<input type="email" name="email" placeholder="youremail@example.com"><br>'
    //'<input type="tel" name="Telephone" placeholder="Phone number"><br>'
    let email_input = document.querySelector("#email");
    let phone_input = document.querySelector("#telephone");
    let display_data = document.querySelector("#verification_content");
    if(email_input.checked)
    {
        display_data.innerHTML = '<input type="email" name="email" placeholder="youremail@example.com"><br>';
    }
    else if(phone_input.checked)
    {
        display_data.innerHTML = '<input type="tel" name="Telephone" placeholder="Phone number"><br>';
    }
}