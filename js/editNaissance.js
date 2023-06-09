$(() => { 
    $("#editAction").on("click" , () => { 
         
            $("#details").hide(200)
            $("#editForm").show(500)

    })
    
    $("#edit").on("click", function (e) {
        e.preventDefault() ; 
        var prenom = $("#prenom").val() ; 
        var fullname_pere  = $("#fullname_pere").val();
        var fullname_mere  = $("#fullname_mere").val();
        var age_pere  = $("#age_pere").val();
        var age_mere = $("#age_mere").val();
        var domicile_pere = $("#domicile_pere").val();
        var domicile_mere = $("#domicile_mere").val();
        var sexe= $("#sexe").val();
        var id = $("#acte_id").val() ; 
        var data = { prenom , sexe , fullname_pere , fullname_mere ,  age_pere , age_mere , domicile_pere , domicile_mere  ,  id  }
        console.log(data) ; 
        $.ajax({
            type: "POST",
            url: "../endpoints/editNaissance.php",
            data: data,
            dataType: "json",
            success: function (response) {
                if(response.status) {
                      Swal.fire({
                        icon : "success" , 
                        text : "Modification effectuée" 
                     })

                     setTimeout(() => {
                        window.location.href= "/naissances/"
                     }, 2000);
                }else { 
                    Swal.fire({
                        icon : "error" , 
                        text : response.message
                     })
                }
              
            }
        });
    });
   


})