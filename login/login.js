function admin_login_button_function()
{
    if(document.getElementById("admin_username").value === "")
    {
        document.getElementById("admin_username").setCustomValidity("Username cannot be empty.");
        document.getElementById("admin_username").reportValidity();
    }
    else if(document.getElementById("admin_password").value === "")
    {
        document.getElementById("admin_password").setCustomValidity("Password cannot be empty.");
        document.getElementById("admin_password").reportValidity();
    }
    else
    {
        var data = 
        {
            action: 'admin_login_button_function',
            admin_username: $("#admin_username").val(),
            admin_password: $("#admin_password").val(),
        };
    
        $.ajax
        ({
            url: 'login_ajax.php',
            type: 'post',
            data: data,
    
            success:function(response)
            {
                if(response == 1)
                {
                    // alert("1");
                    window.location.href = "../admin/admin_dashboard.php";
                }
                else
                {
                    // alert("0");
                    Swal.fire(
                        'Failed!',
                        'Invalid Credentials!',
                        'error'
                      );
                }
    
                // alert(response);
            }
        });
    }
    
}