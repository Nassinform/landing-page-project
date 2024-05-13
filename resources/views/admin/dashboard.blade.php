@extends('layouts.admin.app',['title'=>'Tableau de bord'])

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
                            <h2 class="mb-2">Tableau de bord</h2>
                            <h6 class="mb-4 fw-light">
                                Une collection de visualisations montrant les données de notre site.
                            </h6>
                        </div>
                    </div>
                    <!-- Row end -->

                    <!-- Row start -->
                    <div class="row">
                        <div class="col-xxl-6 col-sm-6 col-12">
                            <div class="card mb-4 border-0 bg-violet">
                                <div class="card-body text-white">
                                    <div class="d-flex justify-content-center text-center">
                                        <div class="py-3">
                                            <h1>{{ $orderCount }}</h1>
                                            <h6>Nombre de commandes</h6>
                                        </div>
                                    </div>
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