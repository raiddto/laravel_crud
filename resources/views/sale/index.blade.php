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
                            @if (Route::has('login'))
                                @auth
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addSaleModal">
                                        <i class="fas fa-plus"></i> Add
                                    </button>
                                @endauth
                            @endif
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
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Description</th>
                                            <th>Date</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="addSaleModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel">Add sale</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="post" action="{{ route('sale.store') }}" role="form">
                                    <div class="modal-body">
                                        @csrf()
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
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
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
            var sale_url = "{{config('app.url')}}/list/"; // absolute link
            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('list') }}",
                columns: [
                    {
                        data: 'id',
                        name: 'id',
                        "render": function(data, type, row, meta) {
                            if(type === 'display'){
                                data = '<a href="/sales/' + data + '/edit" target="_blank" class="text-primary">' + data + '</a>';
                            }

                            return data;
                        }
                    },
                    { data: 'name', name: 'name' },
                    { data: 'price', name: 'price' },
                    { data: 'description', name: 'description' },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        "render": function(data, type, row, meta) {
                            if(type === 'display'){
                                data = new Date(data).toLocaleDateString();
                            }

                            return data;
                        }
                    },
                ],
                order: [
                    [0, "desc"]
                ],
                dom: "<'row'<'col-sm-12 pb-2'B>>" + "<'row'<'col-sm-5'l><'col-sm-7'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [
                    {
                        extend: 'excel',
                        text: '<i class="fas fa-file-excel"></i> Export',
                        titleAttr: 'Export',
                        className: 'btn btn-xs btn-primary'
                    }

                ]
            });
        });
    </script>
@endsection