<?php
include_once ('fonctionPHP/headerFooter.php');
headerASRI(false, '');
?>

<div class="container mt-3">
    <h2>Accordions Horizontaux</h2>
    <div class="accordion accordion-horizontal" id="accordion">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                    Collapsible Group Item #1
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordion">
                <div class="accordion-body">
                    Contenu de l'accordéon 1
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo">
                    Collapsible Group Item #2
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordion">
                <div class="accordion-body">
                    Contenu de l'accordéon 2
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseThree">
                    Collapsible Group Item #3
                </button>
            </h2>
        </div>
    </div>
</div>

<!-- Carte à droite des accordéons -->
<div class="container mt-3">
    <div class="row">
        <div class="col-md-6 offset-md-6">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
footerASRI(false, '');
?>
