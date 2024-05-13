@extends('layouts.admin.app',['title'=>'Liste de commandes'])

@section('extra-css')

<!-- Data Tables -->
<link rel="stylesheet" href="admin/vendor/datatables/dataTables.bs5.css" />
<link rel="stylesheet" href="admin/vendor/datatables/dataTables.bs5-custom.css" />
<link rel="stylesheet" href="admin/vendor/datatables/buttons/dataTables.bs5-custom.css" />

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
                        <div class="col-6 col-xl-6">
                            <h2 class="mb-2">Liste de commandes</h2>
                            <h6 class="mb-4 fw-light">
                                Une collection de visualisations montrant la liste des commandes
                            </h6>
                        </div>
                    </div>
                    <!-- Row end -->

                    <!-- Row start -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="customButtons" class="table table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Nom & Prénom</th>
                                            <th>Numéro de téléphone</th>
                                            <th>Wilaya</th>
                                            <th>Commune</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->name }}</td>
                                            <td>{{ $order->phone_number }}</td>
                                            <td>{{ $order->wilaya }}</td>
                                            <td>{{ $order->commune }}</td>
                                            <td>{{ $order->created_at }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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

<!-- Data Tables -->
<script src="admin/vendor/datatables/dataTables.min.js"></script>
<script src="admin/vendor/datatables/dataTables.bootstrap.min.js"></script>
<script src="admin/vendor/datatables/custom/custom-datatables.js"></script>
<!-- DataTable Buttons -->
<script src="admin/vendor/datatables/buttons/dataTables.buttons.min.js"></script>
<script src="admin/vendor/datatables/buttons/jszip.min.js"></script>
<script src="admin/vendor/datatables/buttons/dataTables.buttons.min.js"></script>
<script src="admin/vendor/datatables/buttons/pdfmake.min.js"></script>
<script src="admin/vendor/datatables/buttons/vfs_fonts.js"></script>
<script src="admin/vendor/datatables/buttons/buttons.html5.min.js"></script>
<script src="admin/vendor/datatables/buttons/buttons.print.min.js"></script>
<script src="admin/vendor/datatables/buttons/buttons.colVis.min.js"></script>

<!-- Custom JS files -->
<script src="js/custom.js"></script>

@endsection