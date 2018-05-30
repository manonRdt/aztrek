$(document).ready(function () {
    $('.table').DataTable();
    $('select').select2();
    
    $('.btn-danger').click(function() {
        event.preventDefault();
        
        var url =$(this).attr("href");
        var row = $(this).closest("tr");
        var response = confirm("Etes-vous certain ?");
        
        if (response) {
            fetch(url)
            .then(function (res){
                if (res.status === 200) {
                    row.fadeOut();
                }
            });
//            window.location.href = $(this).attr("href");
        }
    });
});