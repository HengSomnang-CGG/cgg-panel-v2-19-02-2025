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
    <div class="card mb-4 px-3 mx-auto">
        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
            <h6>Searches Table</h6>
            <div class="flex justify-content-between align-items-center">
                <form action="{{route('searches.export')}}" method="POST" id="exportForm">
                    <button type="button" class="btn bg-gradient-info" id="addNewRecord" data-bs-toggle="modal" data-bs-target="#dynamicModal">
                        <i class="fas fa-plus"></i> Add New
                    </button>
                    <button type="submit" class="btn btn-success" id="exportData" ">
                        <i class="fas fa-file-excel"></i> Export Data
                    </button>
                </form>
            </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table id="searches-table" class="table table-hover mb-0 cursor-pointer">
                    <thead class="text-center">
                        <tr>
                            <th>Actions</th>
                            <th>ID</th>
                            <th>Website Name</th>
                            <th>Domain</th>
                            <th>Date</th>
                            <th>Keyword</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th class="no-export">Image Icon</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>


    <!-- Dynamic Modal -->
    <div class="modal fade" id="dynamicModal" tabindex="-1" inert style="display: none;">
        <div class="modal-dialog modal-lg">
            <form id="dynamicForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitle">Add Record</h5>
                        <button type="button" class="text-danger  fs-3 btn-close text-xl" data-bs-dismiss="modal"
                            aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="record-id" name="id" value="">
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="domain" class="form-label">Domain</label>
                                    <input type="text" name="domain" id="domain" class="form-control form-control-sm"
                                        required>
                                </div>
                                <div class="col">
                                    <label for="website_name">Website Name</label>
                                    <input type="text" name="website_name" id="website_name"
                                        class="form-control form-control-sm" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="datetime-local" name="date" id="date"
                                        class="form-control form-control-sm" required>
                                </div>
                                <div class="col">
                                    <label for="image_icon" class="form-label">Upload Icons</label>
                                    <div class="d-flex flex-column  align-items-center gap-3">
                                        <!-- Input Field -->
                                        <input type="file" name="image_icon" id="image_icon"
                                            class="form-control form-control-sm" accept="image/*">
                                        <!-- Image Preview -->
                                        <img id="imagePreview" src="#" alt="Image Preview" name="imagePreview"
                                            id="imagePreview" style=" width: 100px; height: 100px; border: 1px solid #ddd;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control form-control-sm"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="keyword" class="form-label">Keyword</label>
                            <input type="text" name="keyword" id="keyword" class="form-control form-control-sm"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control form-control-sm" rows="3" required></textarea>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-primary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-info" id="saveButton">
                            <div>
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            </div>

                            <span id="buttonText">Save</span>
                        </button>
                    </div>
                </div>
            </form>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" crossorigin="anonymous"></script>





<script>
    $(document).ready(function() {
        var originalData = {}; // Object to store the original values
        const multipleSelect = document.getElementById('keyword');
        const choices = new Choices(multipleSelect, {
            removeItemButton: true, // Allow users to remove selected items
            searchEnabled: true, // Enable search functionality
            duplicateItemsAllowed: false, // Do not allow duplicate items
        });

        var table = $('#searches-table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            stateSave: true,
            ajax: "{{ route('searches.data') }}",
            columns: [{
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true,
                    className: 'no-export'
                },
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'website_name',
                    name: 'website_name'
                },
                {
                    data: 'domain',
                    name: 'domain'
                },
                {
                    data: 'date',
                    name: 'date',
                },
                {
                    data: 'keyword',
                    name: 'keyword',
                    render: function(data) {
                        return data ? data.split(',').map(keyword =>
                                `<span class="badge bg-info text-white">${keyword}</span>`)
                            .join(' ') : '';
                    }
                },
                {
                    data: 'title',
                    name: 'title'
                },

                {
                    data: 'description',
                    name: 'description'
                },
                {
                    data: 'image_icon',
                    name: 'image_icon',
                    render: function(data) {
                        return `<img loading="lazy" src="${data}" name="image_icon" alt="User Image" class="avatar avatar-sm me-3 no-export" />`;
                    }
                },

            ],
        });

        $(window).on('resize orientationchange', function() {
            table.columns.adjust().responsive.recalc();
        });

        function checkForChanges() {
            var currentData = {
                domain: $('#domain').val(),
                date: $('#date').val(),
                keyword: $('#keyword').val(),
                title: $('#title').val(),
                description: $('#description').val(),
                image: $('#image_icon').val(),
                website_name: $('#website_name').val(),
            };

            var isChanged = JSON.stringify(originalData) !== JSON.stringify(currentData);
            $('#saveButton').prop('disabled', !isChanged); // Enable button only if data has changed
        }

        $('#image_icon').on('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    $('#imagePreview').attr('src', event.target.result).show();
                };
                reader.readAsDataURL(file);
            } else {
                $('#imagePreview').hide();
            }
        });


        // // Clear image preview on modal close
        $('#dynamicModal').on('hidden.bs.modal', function() {
            $('#imagePreview').hide().attr('src', '#');
        });


        $('#dynamicForm input, #dynamicForm textarea').on('input change', checkForChanges);

        // Add New Record Button
        $('#addNewRecord').click(function() {
            // reset allk input form
            $('#dynamicForm')[0].reset();
            originalData = {};
            $('#record-id').val('');
            $('#modalTitle').text('Add New Record');
            $('#saveButton').text('Save').prop('disabled', true); // Disable save button initially
            $('#dynamicModal').modal('show');
            $('#imagePreview').hide().attr('src', '#');



        });

        // Handle Edit Button
        $(document).on('click', '.edit-btn', function() {
            var id = $(this).data('id');
            $.get(`{{ route('searches.show', ':id') }}`.replace(':id', id), function(data) {

                choices.clearStore();

                // If your keywords are stored as "keyword1,keyword2"
                if (data.keyword) {
                    let keywordsArray = data.keyword.split(',');
                    choices.setValue(keywordsArray);
                }

                $('#record-id').val(data.id);
                $('#domain').val(data.domain);
                const date = new Date(data.date);
                const formattedDate = date.toISOString().slice(0,16); // Format to "yyyy-MM-ddThh:mm"
                $('#date').val(formattedDate);
                $('#title').val(data.title);
                $('#description').val(data.description);
                $('#website_name').val(data.website_name);

                // set image icon preview
                if (data.image_icon) {
                    $('#imagePreview').attr('src', `${data.image_icon}`).show();
                } else {
                    // $('#imagePreview').hide();
                }


                originalData = {
                    domain: data.domain,
                    date: data.date,
                    keyword: data.keyword,
                    title: data.title,
                    description: data.description,
                    image_icon: data.image_icon,
                    website_name: data.website_name,

                };

                $('#modalTitle').text('Edit Record');
                $('#saveButton').text('Update').prop('disabled',
                    true); // Disable save button initially
                $('#dynamicModal').modal('show');
            });
        });

        // Handle Form Submission
        $('#dynamicForm').submit(function(e) {
            e.preventDefault();

            $('#loadingSpinner').show();
            $('#dynamicModal').addClass('modal-static');
            $('#saveButton').text('Loading...').prop('disabled',
                true); // Change button text and disable it


            let formData = new FormData(this);
            const imageFile = $('#image_icon')[0].files[0];
            if (imageFile) {
                formData.append('image_icon', imageFile);
            }
            const id = $('#record-id').val();
            const url = id ?
                "{{ route('searches.update', ':id') }}".replace(':id', id) :
                "{{ route('searches.store') }}";
            const method = id ? 'PUT' : 'POST';

            // Show the loading spinner
            $('#loadingOverlay').show();

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                success: function(response) {
                    $('#loadingSpinner').hide();
                    $('#dynamicModal').modal('hide');
                    table.ajax.reload();

                    // Hide the loading spinner
                    $('#loadingOverlay').hide();

                    const action = id ? 'updated' : 'saved';
                    toastr.success(`Record ${action} successfully!`, 'Success');
                },
                error: function(xhr) {
                    // Hide the loading spinner
                    $('#loadingOverlay').hide();
                    const id = $('#record-id').val();
                    $('#saveButton').text(id ? 'Update' : 'Save').prop('disabled',
                        false); // Reset button state
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        Object.keys(errors).forEach(function(key) {
                            toastr.error(errors[key][0], 'Validation Error');
                        });
                    } else {
                        toastr.error('An error occurred while saving the record.', 'Error');
                    }
                },
            });
        });



        // Handle hide modal
        $('#dynamicModal').on('show.bs.modal', function() {
            $(this).removeAttr('inert');
        });

        // Handle show modal
        $('#dynamicModal').on('hidden.bs.modal', function() {
            $(this).attr('inert', '');
            $('#dynamicForm')[0].reset();
            $('#record-id').val('');
            choices.clearStore();
            $('#saveButton').text('Save').prop('disabled', true); // Reset button state
            originalData = {};
        });

        // Handle delete button click
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
                        url: `{{ route('searches.delete', ':id') }}`.replace(':id', id),
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}' // Include CSRF token
                        },
                        success: function(response) {
                            table.ajax.reload(); // Reload DataTable
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                preventDuplicates: true,
                                timeOut: 5000,
                                positionClass: 'toast-top-right',
                                newestOnTop: true,
                                extendedTimeOut: 2000
                            };

                            toastr.success(response.success, 'Success');
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

    const myButton = document.getElementById('saveButton');
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
        border: none !important;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1) !important;
    }

    .toast-progress {
        background-color: #21d4fd !important;
    }

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
