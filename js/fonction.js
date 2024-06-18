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
                url: "../fonctionPHP/identification.php",
                dataType: 'json',
                data: {
                    deconnexion: true,
                },
                success: function (response) {
                    window.location.href = '../index.php';
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


function alertSave(msg) {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        showCloseButton: true,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });
    Toast.fire({
        icon: "success",
        title: msg
    });

}