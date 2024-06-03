function swalDeconnexion() {
    Swal.fire({
        title: '',
        text: 'Voulez-vous vous déconnecter?',
        icon: 'question',
        confirmButtonText: 'Se déconnecter',
        cancelButtonText: 'Annuler',
        reverseButtons: true,
        showCancelButton: true,
        customClass: {
            confirmButton: "btn btn-success", // Changement de couleur
            cancelButton: "btn btn-secondary", // Changement de couleur
            cancelButtonBorder: "none"
        },
        buttonsStyling: false
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "fonctionPHP/identification.php",
                dataType: 'json',
                data: {
                    deconnexion: true,
                },
                success: function (response) {
                    var data = JSON.parse(response);
                    if (data.redirect) {
                        window.location.href = '../index.php';
                    }
                }
            }
            )
        }
    }
    )
}


function swalConfirm(message='') {
    if(message == '')message= 'Voulez-vous vraiment supprimer cet élément?';
        Swal.fire({
        title: '',
        text: message,
        icon: 'warning',
        confirmButtonText: 'Confirmer',
        cancelButtonText: 'Annuler',
        reverseButtons: true,
        showCancelButton: true,
        customClass: {
            confirmButton: "btn btn-success", // Changement de couleur
            cancelButton: "btn btn-secondary", // Changement de couleur
            cancelButtonBorder: "none"
        },
        buttonsStyling: false
    })
    
}