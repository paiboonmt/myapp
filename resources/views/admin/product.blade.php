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
                                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
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
                                                <textarea name="detail" class="form-control" cols="30" rows="5">{{ old('price') }}</textarea>
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
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Detail</th>
                            <th>Action | Edit | Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Apple</td>
                            <td>100.00</td>
                            <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Alias, commodi?</td>
                            <td>
                                <a href="" class="btn btn-warning"><i class="far fa-edit"></i>|Edit</a>
                                <a href="" class="btn btn-danger"><i class="fas fa-trash-alt"></i>|Trash</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')
