$(() => {

    $('#login').on('click', function () {
         var email = $('#email').val();
         var pass = $('#pass').val() ; 

         if(!validateEmail(email) || email == "")
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
         
         $.ajax({
            type: "POST",
            url: "../endpoints/login.php",
            data: {email, pass},
            dataType: "json",
            success: function (response) {
               if(response.status)
               { 
                    window.location.href= "/dashboard"
               }else 
               { 
                Swal.fire({
                    icon: "warning", 
                    text: response.message, 
                    confirmButtonColor: '#1c64f2',
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