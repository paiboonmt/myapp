@include('admin.header')

<div class="row">
    <div class="col p-2">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h4>Nationality</h4>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                            <i class="fas fa-plus"></i> | <span>create product</span>
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <form action="{{ route('admin.nationality_create') }}" method="post">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">From create product</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Product Name</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter nationality name." name="name"
                                                    value="{{ old('name') }}">
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">SAVE ITEM</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table" id="example1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nationality name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <form action="{{ route('admin.nationality_destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        {{-- <a href="#" class="btn btn-warning"><i class="far fa-edit"></i>|Edit</a> --}}
                                        <button type="button" class="btn btn-warning" data-toggle="modal"
                                            data-target="#id{{ $item->id }}">
                                            <i class="far fa-edit"></i>|Edit
                                        </button>

                                        <button class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this item?')">
                                            <i class="fas fa-trash-alt"></i>|Trash
                                        </button>

                                    </form>
                                </td>

                                <!-- Modal -->
                                <div class="modal fade" id="id{{ $item->id }}" data-backdrop="static" data-keyboard="false"
                                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <form action="{{ route('admin.nationality_update', $item->id ) }}" method="post">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">From create product
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Product Name</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter nationality name." name="name"
                                                            value="{{ $item->name }}">
                                                        @error('name')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">SAVE ITEM</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')

@if (session('delete-success'))
    <script>
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            Toast.fire({
                icon: 'success',
                title: 'Delete Item Successfully.'
            })
        });
    </script>
@endif

@if (session('add-success'))
    <script>
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            Toast.fire({
                icon: 'success',
                title: 'Create Item Successfully.'
            })
        });
    </script>
@endif

@if (session('update-success'))
    <script>
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            Toast.fire({
                icon: 'success',
                title: 'Update Item Successfully.'
            })
        });
    </script>
@endif
