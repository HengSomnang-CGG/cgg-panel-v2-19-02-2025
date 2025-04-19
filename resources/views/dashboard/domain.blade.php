@extends('layouts.dashboard.app')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap5.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<!-- Include Toastr CSS -->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script src="https://cdn.jsdelivr.net/npm/choices.js@11.0.3/public/assets/scripts/choices.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/choices.js@11.0.3/public/assets/styles/choices.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
    crossorigin="anonymous" />




@section('content')
    <div class="card mb-4 px-3 ">
        <div class="card-body px-0 pt-0 pb-2 mt-2">
            <div class="table-responsive p-0">
                <table id="searches-table" class="table table-hover mb-0 cursor-pointer">
                    <thead class="text-center">
                        <tr >
                            <th>ID</th>
                            <th>Domain</th>
                            <th>TimeStamp</th>
                            <th>Check On</th>
                            <th>Last Check</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>

<script>
    $(document).ready(function() {
        var table = $('#searches-table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            stateSave: true,
            ajax: "{{ route('domain.data') }}",
            columns: [
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'domain',
                    name: 'domain'
                },
                {
                    data: 'timestamp',
                    name: 'timestamp'
                },
                {
                    data: 'check_on',
                    name: 'check_on',
                },
                {
                    data: 'last_check',
                    name: 'last_check',
                },


            ],
        });

        $(window).on('resize orientationchange', function() {
            table.columns.adjust().responsive.recalc();
        });

    });

</script>


<style>
    /* DataTable Pagination Styling */
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        background-color: #f8f9fa;
        border-radius: 0.375rem;
        border: none;
        color: #6c757d;
        margin: 0 2px;
        padding: 5px 10px;
        font-size: 14px;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background-image: linear-gradient(310deg, #2152ff, #21d4fd);
        color: #212529;
    }

    /* Search Box and Dropdown Styling */
    .dataTables_wrapper .dataTables_filter input {
        border: 1px solid #dee2e6;
        border-radius: 0.375rem;
        padding: 5px 10px;
        font-size: 14px;
        margin-left: 5px;
    }

    .dataTables_wrapper .dataTables_length select {
        border: 1px solid #dee2e6;
        border-radius: 0.375rem;
        padding: 5px 10px;
        font-size: 14px;
    }

    /* Table Header Styling */
    #searches-table thead th {
        background-color: #f8f9fa;
        color: #212529;
        text-transform: uppercase;
        font-weight: bold;
        font-size: 14px;
    }


    .dataTables_wrapper .dataTables_length {
        float: none;
        margin-right: 1rem;
        display: inline-block;
    }

    .dataTables_wrapper .dt-buttons {
        float: none;
        display: inline-block;
    }

    #searches-table thead input[type="text"] {
        width: 100%;
        margin-top: 10px;
        padding: 5px;
        border: 1px solid #dee2e6;
        border-radius: 0.375rem;
    }


    @media (max-width: 576px) {

        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dt-buttons {
            float: none;
            display: block;
            text-align: center;
        }
    }

    .choices__list--multiple .choices__item {
        background: linear-gradient(310deg, #2152ff, #21d4fd);
    }

    .toast {
        background-color: #2152ff !important;
        color: #fff !important;
        /* White text color */
        border: none !important;
        /* Remove border */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1) !important;
        /* Subtle shadow */
    }

    /* Optional: Style for Toastr progress bar */
    .toast-progress {
        background-color: #21d4fd !important;
        /* Gradient-like progress bar color */
    }

    /* Optional: Close button customization */
    .toast-close-button {
        color: #fff !important;
        opacity: 0.8;
    }

    .toast-close-button:hover {
        opacity: 1;
    }

    /* Transparent background for loading */
    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        /* Semi-transparent black */
        z-index: 1055;
        /* Above modal but below alerts */
    }

    /* Spinner styling */
    .spinner-border {
        width: 3rem;
        height: 3rem;
    }

    table.dataTable.dtr-inline.collapsed>tbody>tr.parent>td.dtr-control:before,
    table.dataTable.dtr-inline.collapsed>tbody>tr.parent>th.dtr-control:before {
        border-top: 10px solid rgba(0, 0, 0, 0.5);
        border-left: 5px solid transparent;
        border-bottom: 0px solid transparent;
        border-right: 5px solid transparent;
    }
</style>
