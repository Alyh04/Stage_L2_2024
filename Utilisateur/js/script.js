$(document).ready(function(){

// Fonction d'ajout
$("#insertForm").on("submit", function(e) {
    $("#insertBtn").attr("disabled", "disabled");
    e.preventDefault();
    $.ajax({
        url: "ajouter.php?action=insertData",
        // url: "server.php?action=insertData",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(response) {
            var response = JSON.parse(response);
            if (response.statutCode == 200) {  // Assurez-vous que c'est "statutCode"
                $("#insertBtn").removeAttr("disabled");
                $("#insertForm")[0].reset(); // Réinitialiser le formulaire
                $("#id_utilisateur").val(0).trigger('change'); // Réinitialiser le select2
                $("#successToast").toast("show");
                $("#successMsg").html(response.message);
            } else if (response.statutCode == 500) {
                $("#insertBtn").removeAttr("disabled");
                $("#errorToast").toast("show");
                $("#errorMsg").html(response.message);
            } else if (response.statutCode == 400) {
                $("#insertBtn").removeAttr("disabled");
                $("#errorToast").toast("show");
                $("#errorMsg").html(response.message);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $("#insertBtn").removeAttr("disabled");
            $("#errorToast").toast("show");
            $("#errorMsg").html("Erreur lors de l'ajout des données.");
            console.error("Erreur AJAX : " + textStatus, errorThrown);
        }
    });
});

})
