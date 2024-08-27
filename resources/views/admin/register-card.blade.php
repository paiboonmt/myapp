@include('admin.header')

<div class="row">
    <div class="col p-1">
        <div class="card p-1">
            <form action="{{ route('admin.register_card_inset') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Number</span>
                    </div>
                    <input type="number" name="card_number" required class="form-control" autofocus value="{{ old('card_number') }}">
                </div>
                @error('card_number')
                    <div class="input-group">
                        <div class="my-1">
                            <span class="text-danger">{{ $message }}</span>
                        </div>
                    </div>
                @enderror
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Group</span>
                    </div>
                    <select name="card_type" class="form-control">
                        <option value="Private_Training">Private Training</option>
                        <option value="Meal_Plan">Meal Plan</option>
                        <option value="Monney_Card">Monney Card</option>
                    </select>
                </div>
                <button class="btn btn-success form-control" type="submit">Save data</button>
            </form>
        </div>
    </div>
    <div class="col p-1">
        <div class="card p-1">
            <table class="table table-sm" id="example1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Numbae</th>
                        <th>Group</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ( $data as $item )
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $item->card_number }}</td>
                            <td>{{ $item->card_type }}</td>
                            @if ( $item->card_status )
                                <td></td>
                            @else

                            @endif
                            <td class="text-center">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#id{{ $item->card_id}}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="id{{ $item->card_id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('admin.card_update',$item->card_id) }}" method="post">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Edit Card Type</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    @csrf
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Number</span>
                                                        </div>
                                                        <input type="number" name="card_number" required class="form-control" readonly value="{{ $item->card_number }}">
                                                    </div>

                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Group</span>
                                                        </div>
                                                        <select name="card_type" class="form-control">
                                                            <option value="{{ $item->card_type}}">{{ $item->card_type}}</option>
                                                            <option value="Private_Training">Private Training</option>
                                                            <option value="Meal_Plan">Meal Plan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                                <a href="{{ route('admin.card_delete',$item->card_id) }}" class="btn btn-danger" onclick="return confirm('Are you sure ?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('admin.footer')

@if (session('delete-success'))
    <script>
        $(function(){
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
        $(function(){
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            Toast.fire({
                icon: 'success',
                title: 'Add Item Successfully.'
            })
        });
    </script>
@endif

@if (session('update-success'))
    <script>
        Swal.fire({
            title: "Good job!",
            text: "You update data successfully.",
            icon: "success"
        });
    </script>
@endif
