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
                    window.location.href = "index.php"; // Redirection côté client
                }
            }
            )
        }
    }
    )
}

