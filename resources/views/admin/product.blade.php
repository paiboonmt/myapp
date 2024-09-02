@include('admin.header')
<style>
    h5 {
        font-size: 30px;
        text-transform: uppercase;
    }

    span {
        font-size: 18px;
        text-transform: uppercase;
    }
</style>
<div class="row">
    <div class="col p-1">
        <div class="card p-1">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h5>products</h5>
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
                                    <form action="{{ route('admin.product_create') }}" method="post">
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
                                                <input type="text" class="form-control" name="name" autofocus value="{{ old('name') }}">
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Price</label>
                                                <input type="number" class="form-control" name="price" value="{{ old('price') }}">
                                                @error('price')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <textarea name="detail" class="form-control" placeholder="Detail" cols="30" rows="5">{{ old('price') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">SAVE ITEM</button>
                                            <button type="button" class="btn btn-secondary"data-dismiss="modal">Close</button>
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
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Detail</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ( $data as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->name}}</td>
                                <td>{{ number_format($item->price,2) }}</td>
                                <td>{{ $item->detail }}</td>
                                <td>

                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#id{{ $item->id }}">
                                        <i class="far fa-edit"></i> | Edit
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="id{{$item->id}}" data-backdrop="static" data-keyboard="false"
                                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <form action="{{ route('admin.product_update',$item->id) }}" method="post">
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
                                                            <input type="text" class="form-control" name="name" autofocus value="{{ $item->name }}">
                                                            @error('name')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Price</label>
                                                            <input type="number" class="form-control" name="price" value="{{ $item->price }}">
                                                            @error('price')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <textarea name="detail" class="form-control" placeholder="Detail" cols="30" rows="5">{{ $item->detail }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">SAVE ITEM</button>
                                                        <button type="button" class="btn btn-secondary"data-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    
                                    <button class="btn btn-danger delete-button" data-id="{{ $item->id }}">
                                        <i class="fas fa-trash-alt"> | Delete</i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Event listener for delete button
        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function () {
                var itemId = this.getAttribute('data-id');

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
                        // Make AJAX request to delete the item
                        $.ajax({
                            url: '/admin/product_destroy/' + itemId,  // URL to your delete route
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'  // Include CSRF token
                            },
                            success: function (response) {
                                Swal.fire(
                                    'Deleted!',
                                    'Your item has been deleted.',
                                    'success'
                                ).then((result) =>{
                                    location.reload();
                                })
                            },
                            error: function (xhr) {
                                Swal.fire(
                                    'Failed!',
                                    'There was a problem deleting your item.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });
        });
    });
</script>