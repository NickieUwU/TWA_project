function changecontent()
{
    let email_input = document.querySelector("#email");
    let phone_input = document.querySelector("#telephone");
    let display_data = document.querySelector("#verification_content");
    if(email_input.checked)
    {
        display_data.innerHTML = '<input type="email" name="email" placeholder="youremail@example.com" class="verification_input"><br>';
    }
    else if(phone_input.checked)
    {
        display_data.innerHTML = '<input type="tel" name="Telephone" placeholder="Phone number" class="verification_input"><br>';
    }
}