@extends('layouts.default')

@section('content')
    @include('layouts.header')
    @include('layouts.sidebar')
    <?php date_default_timezone_set('Asia/Manila'); ?>
    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">
        @include('layouts.alert')
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h3 class="m-0 text-primary">All Sales</h3>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addSaleModal">
                                <i class="fas fa-plus"></i> Add
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered first yajra-datatable" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Description</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Description</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Create Sale Modal -->
                        <div class="modal fade" id="addSaleModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel">Add sale</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" action="{{ route('sale.store') }}" role="form">
                                    @csrf()
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="name" class="col-form-label">Name <span class="text-secondary">*</span></label>
                                            <input type="text" class="form-control" id="name" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="price" class="col-form-label">Price <span class="text-secondary">*</span></label>
                                            <input type="number" class="form-control" id="price" name="price">
                                        </div>
                                        <div class="form-group">
                                            <label for="description" class="col-form-label">Description</label>
                                            <textarea class="form-control" id="description" name="description"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Edit Sale Modal -->
                        <div class="modal fade" id="editSaleModal" tabindex="-1" role="dialog" aria-labelledby="editSaleModal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editSaleModal">Edit sale</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" role="form" id="editSaleForm">
                                    @csrf()
                                    @method('PATCH')
                                    <div class="modal-body">
                                        <input type="hidden"  name="edit_id" id="edit_id" class="form-control"/>
                                        <div class="form-group">
                                            <label for="name" class="col-form-label">Name <span class="text-secondary">*</span></label>
                                            <input type="text" class="form-control" id="edit_name" name="edit_name">
                                        </div>
                                        <div class="form-group">
                                            <label for="price" class="col-form-label">Price <span class="text-secondary">*</span></label>
                                            <input type="number" class="form-control" id="edit_price" name="edit_price">
                                        </div>
                                        <div class="form-group">
                                            <label for="description" class="col-form-label">Description</label>
                                            <textarea class="form-control" id="edit_description" name="edit_description"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Delete Sale Modal -->
                        <div class="modal fade" id="deleteSaleModal" tabindex="-1" role="dialog" aria-labelledby="deleteSaleModal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteSaleModal">Delete sale</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" role="form" id="deleteSaleForm">
                                    @csrf()
                                    @method('DELETE')
                                    <div class="modal-body">
                                        <input type="hidden"  name="delete_id" id="edit_id" class="form-control"/>
                                        <p>Are you sure you wanted to delete <span id="delete_name"></span>?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                        <button type="submit" class="btn btn-primary">Yes</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('list') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'price', name: 'price' },
                    { data: 'description', name: 'description' },
                    {
                        data: 'updated_at',
                        name: 'updated_at',
                        "render": function(data, type, row, meta) {
                            if(type === 'display'){
                                data = new Date(data).toLocaleDateString();
                            }

                            return data;
                        }
                    },
                    { data: 'action', name: 'action' },
                ],
                order: [
                    [0, "desc"]
                ]
            });
        });
    </script>
    <script type="text/javascript">
        $(document).on("click", ".edit_modal", function () {
            var data_id = $(this).data('id');
            var data_name = $(this).data('name');
            var data_price = $(this).data('price');
            var data_description = $(this).data('description');
            var route = "{{route('sale.update', '')}}"+"/"+data_id;
            $("#edit_id").val(data_id);
            $("#edit_name").val(data_name);
            $("#edit_price").val(data_price);
            $("#edit_description").val(data_description);
            $("#editSaleForm").attr("action", route);
        });
    </script>
    <script type="text/javascript">
        $(document).on("click", ".delete_modal", function () {
            var data_id = $(this).data('id');
            var data_name = $(this).data('name');
            var route = "{{route('sale.destroy', '')}}"+"/"+data_id;
            $("#delete_name").text(data_name);
            $("#deleteSaleForm").attr("action", route);
        });
    </script>
@endsection