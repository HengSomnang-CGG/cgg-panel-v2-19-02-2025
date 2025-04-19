@extends('layouts.dashboard.app')
@section('title', 'User Management')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap5.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<!-- Include Toastr CSS -->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>






@section('content')
    <div class="card mb-4 px-3">
        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
            <h6 class="font-weight-bolder mb-0 text-capitalize">User Management</h6>
            <a href="{{ route('user-management.create') }}" class="btn bg-gradient-info" id="addNewRecord">
                <i class="fas fa-plus"></i> Add New
            </a>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table id="searches-table" class="table table-hover mb-0 cursor-pointer">
                    <thead class="text-center">
                        <tr>
                            <th>ID</th>
                            <th>Actions</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Image</th>

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
<!-- DataTables Buttons JS -->
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

<!-- JSZip and pdfmake for Excel and PDF export -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>


<script>
    $(function() {
        let table = $('#searches-table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            // your existing DataTables setup
            ajax: "{{ route('user-management.data') }}",
            columns: [
                { data: 'id', name: 'id' },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true,
                },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'phone', name: 'phone' },
                { data: 'role', name: 'role' },
                {
                    data: 'image',
                    name: 'image',
                    render: function(data) {
                        const assetBaseUrl = "{{ asset('') }}";
                        return `<img loading="lazy" src="${assetBaseUrl}${data}" alt="User Image" class="avatar avatar-sm me-3" />`;
                    }
                },

            ]
        });

        $('#searches-table').on('click', '.delete-btn', function() {
            const id = $(this).data('id');

            // SweetAlert confirmation
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // AJAX call to delete
                    $.ajax({
                        url: `/panel/user-management/delete/${id}`,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}' // Include CSRF token
                        },
                        success: function(response) {
                            Swal.fire(
                                'Deleted!',
                                response.success,
                                'success'
                            );
                            table.ajax.reload(); // Reload DataTable
                        },
                        error: function(xhr) {
                            Swal.fire(
                                'Error!',
                                'Failed to delete the record.',
                                'error'
                            );
                        }
                    });
                }
            });
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
</style>
