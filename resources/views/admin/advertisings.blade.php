@extends('layouts.admin.app',['title'=>'Publicités'])

@section('extra-css')

<style>
    .vertical-center {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* CSS pour le loader */
    .loader {
        border: 4px solid #fff;
        border-left-color: #000;
        border-radius: 50%;
        width: 27px;
        height: 27px;
        animation: spin 1s linear infinite;
        margin: 0 auto;
    }

    /* Animation de rotation */
    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    /* Pour masquer le loader par défaut */
    #loader {
        display: none;
    }
</style>

@endsection

@section('content')

<!-- Page wrapper start -->
<div class="page-wrapper">

    <!-- Main container start -->
    <div class="main-container">

        <!-- Sidebar wrapper start -->
        <x-sidebar-wrapper />
        <!-- Sidebar wrapper end -->

        <!-- App container starts -->
        <div class="app-container">

            <!-- App header starts -->
            <x-app-header />
            <!-- App header ends -->

            <!-- App body starts -->
            <div class="app-body">

                <!-- Container starts -->
                <div class="container-fluid">

                    <!-- Row start -->
                    <div class="row">
                        <div class="col-12 col-xl-12">
                            <h2 class="mb-2">Publicités</h2>
                            <h6 class="mb-4 fw-light">
                                Une collection de visualisations montrant les données de notre site.
                            </h6>
                        </div>
                    </div>
                    <!-- Row end -->

                    <!-- Message de succès Bootstrap -->
                    <div id="notificationMessage" class="container pt-2" style="display: none;">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <span id="notificationText"></span>
                            <i class="far fa-xmark btn-close" data-bs-dismiss="alert" aria-label="Close"></i>
                        </div>
                    </div>

                    <!-- Row start -->
                    <div class="row">
                        <div class="col-sm-6 col-12">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <form id="uploadForm" enctype="multipart/form-data">
                                        @csrf
                                        <div class="m-0">
                                            <label for="formFile" class="form-label">Importer les publicités</label>
                                            <input class="form-control" type="file" id="advertisings">
                                            <div id="fileUploadError" class="text-danger"></div>
                                        </div>
                                        <div class="d-grid py-3 mt-3">
                                            <a id="importBtn" class="btn btn-lg btn-primary vertical-center" href="#" onclick="submitForm()">
                                                <span id="btnText">Importer</span>
                                                <span id="loader" class="loader"></span>
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row end -->

                </div>
                <!-- Container ends -->

            </div>
            <!-- App body ends -->

            <!-- App footer start -->
            <x-app-footer />
            <!-- App footer end -->

        </div>
        <!-- App container ends -->

    </div>
    <!-- Main container end -->

</div>
<!-- Page wrapper end -->

@endsection

@section('extra-js')

<script src="https://cdn.sheetjs.com/xlsx-0.20.2/package/dist/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
    function submitForm() {
        let fileInput = document.getElementById('advertisings').files[0];
        let reader = new FileReader();
        let importBtn = document.getElementById('importBtn');
        let loader = document.getElementById('loader');
        let btnText = document.getElementById('btnText');

        if (!fileInput) {
            // Afficher un message d'erreur si aucun fichier n'est sélectionné
            document.getElementById('fileUploadError').textContent = 'Veuillez sélectionner un fichier.';
            return; // Empêcher l'envoi du formulaire
        }

        // Afficher le loader et masquer le contenu du bouton
        loader.style.display = 'inline-block'; // Afficher le loader
        btnText.style.display = 'none'; // Masquer le texte du bouton

        reader.onload = function(e) {
            let data = new Uint8Array(e.target.result);
            let workbook = XLSX.read(data, {
                type: 'array'
            });
            let firstSheet = workbook.Sheets[workbook.SheetNames[0]];
            let excelData = XLSX.utils.sheet_to_json(firstSheet, {
                header: 1
            });

            axios.post('/advertisings', {
                    data: excelData
                })
                .then(response => {
                    // Stockez le message de succès dans le localStorage
                    localStorage.setItem('successMessage', response.data.message);
                    // Rafraîchissez la page
                    window.location.reload();
                })
                .catch(error => {
                    console.error('Error:', error);
                })
                .finally(() => {
                    // Masquer le loader et réafficher le contenu du bouton
                    loader.style.display = 'none'; // Masquer le loader
                    btnText.style.display = 'inline-block'; // Réafficher le texte du bouton
                });
        };

        reader.readAsArrayBuffer(fileInput); // Commencez à lire le fichier
    }
</script>

<!-- Récupération de message de succès du localStorage et l'afficher avec Bootstrap -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const successMessage = localStorage.getItem('successMessage');
        const notificationDiv = document.getElementById('notificationMessage');
        const notificationText = document.getElementById('notificationText');
        if (successMessage && notificationDiv && notificationText) {
            // Afficher le message de succès dans la notification
            notificationText.textContent = successMessage;
            notificationDiv.style.display = 'block';
            //notificationDiv.style.display = 'none';
            localStorage.removeItem('successMessage');
        }
    });
</script>

@endsection