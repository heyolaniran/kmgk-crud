$(() => { 

    $("#create").on("click", function (e) {
        e.preventDefault()  ; 
        var email = $("#email").val() ; 
        var pass = $("#pass").val() ; 
        var confirmPass = $('#confirm').val()
        var select = $('#arrondissement').val()
        var role = $("#role").val()

        if(!validateEmail(email))
        {
            Swal.fire({
                icon: "info", 
                text: "Un e-mail valide est requis",
                confirmButtonColor: '#1c64f2',
            })
            return false; 
        }

        if(pass.length < 8 || !validatePass(pass)) { 
            Swal.fire({
                icon: "info", 
                text: "Le mot de passe est requis et est de minimum 8 caractères",
                confirmButtonColor: '#1c64f2',
            })
            return false; 
         }

         if(confirmPass !== pass) { 
            Swal.fire({
                icon: "info", 
                text: "Les mots de passe ne correspondent pas ",
                confirmButtonColor: '#1c64f2',
            })
            return false; 
         }

         console.log("hello")

         $.ajax({
            type: "POST",
            url: "../endpoints/createUser.php",
            data: {email , pass , select , role},
            dataType: "json",
            success: function (response) {
              if(response.status) { 
                Swal.fire({
                    icon: "success", 
                    text: response.message
                })
                setTimeout(() => {
                     window.location.href ="/dashboard"
                }, 2000);
               
              }else 
              { 
                Swal.fire({
                    icon: "error", 
                    text: response.message
                })
              }
            }
         });
    });


})

function validateEmail($email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test( $email );
  }

  function validatePass($pass) { 
    var alphaNumReg = /^[a-zA-Z0-9]+$/
    return alphaNumReg.test($pass); 

}