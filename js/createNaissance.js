$(() => { 
    $("#create").on("click", function () {
        var prenom = $("#prenom").val() ; 
        var fullname_pere  = $("#fullname_pere").val();
        var fullname_mere  = $("#fullname_mere").val();
        var age_pere  = $("#age_pere").val();
        var age_mere = $("#age_mere").val();
        var domicile_pere = $("#domicile_pere").val();
        var domicile_mere = $("#domicile_mere").val();
        var created_by = $("#user").val();
        var nom_declarant = $("#nom_declarant").val()
        var arrondissement_id = $("#arrondissement_id").val()
        var sexe= $("#sexe").val();
        var data = { prenom , sexe ,  fullname_pere , fullname_mere ,  age_pere , age_mere , domicile_pere , domicile_mere , nom_declarant ,  arrondissement_id , created_by }
        console.log(data) ; 
        $.ajax({
            type: "POST",
            url: "../endpoints/createNaissance.php",
            data: data,
            dataType: "json",
            success: function (response) {
                if(response.status) { 
                    Swal.fire({
                        icon: "success", 
                        text: "Acte de naissances enregistré"
                    })
                    setTimeout(() => {
                         window.location.href ="/dashboard"
                    }, 2000);
                   
                  }else 
                  { 
                    Swal.fire({
                        icon: "error", 
                        text: "erreur, verifiez vos champs "
                    })
                  }
            }
        });

    });
})