$(document).ready(function () {

    $('.table').DataTable();
    $('select').select2();
    $('textarea').summernote({
        lang: 'fr-FR'
    });

    $('table a.btn-danger').click(function (event) {
        event.preventDefault();
        
        var url = $(this).attr("href");
        var row = $(this).closest("tr");
        var response = confirm("Êtes-vous certain ?");

        if (response) {
            fetch(url)
            .then(function (res) {
                if (res.status === 200) {
                    row.fadeOut();
                    return res.json();
                } else {
                    alert("Erreur lors de la suppression");
                }
            })
            .then(function(data) {
                alert("La personne " + data.firstname + " a été supprimée !")
            });
        }
    });

});