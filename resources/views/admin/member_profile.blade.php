@include('admin.header')

<style>
    .nav-item-sub{
        padding: 5px;
    }
</style>

<div class="row">
    <div class="col p-1">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#Profile" data-toggle="tab">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="#Product" data-toggle="tab">Product History</a></li>
                    <li class="nav-item"><a class="nav-link" href="#document" data-toggle="tab">Document</a></li>
                    <li class="nav-item"><a class="nav-link" href="#action" data-toggle="tab">Action</a></li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">

                    <div class="tab-pane" id="action">
                        <div class="row">
                            <ul>
                                <li class="nav-item-sub">
                                    <a href="{{ route('admin.member_edit', $data->id) }}" class="btn btn-info">Edit Profile</a>
                                </li>
                                <li class="nav-item-sub">
                                    <a href="#" class="btn btn-info">Edit Document</a>
                                </li>
                                <li class="nav-item-sub">
                                    {{-- <a href="#" class="btn btn-danger">Delete</a> --}}
                                    <button class="btn btn-danger delete-button" data-id="{{ $data->id }}">
                                        <i class="fas fa-trash-alt"> | Delete</i>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="tab-pane active " id="Profile">
                        <div class="row">
                            <div class="col-md-8">
                                {{-- card_id , visa_id --}}
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" >Card number</span>
                                            </div>
                                            <input type="number" class="form-control" name="card_id" value="{{ $data->card_id }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" >Visa number</span>
                                            </div>
                                            <input type="text" class="form-control" name="visa_id" value="{{ $data->visa_id }}">
                                        </div>
                                    </div>
                                </div>
                                {{-- gender fname --}}
                                <div class="row">
                                    <div class="col-3">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Gender</span>
                                            </div>
                                            <select name="gender" class="form-control">
                                                <option value="{{ $data->gender }}">{{ $data->gender }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">First name | Last name</span>
                                            </div>
                                            <input type="text" class="form-control" name="fname" value="{{ $data->fname }}">
                                        </div>
                                    </div>
                                </div>
                                {{-- product --}}
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Product</span>
                                            </div>
                                            <select name="product" class="form-control">
                                                <option>{{ $product[0]->name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                {{-- birthday nationality --}}
                                <div class="row">
                                    <div class="col-5">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" >Birth Day</span>
                                            </div>
                                            <input type="date" name="birthday" value="{{ $data->birthday }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" >Nationality</span>
                                            </div>
                                            <select name="nationality" class="form-control">
                                                <option>{{ $nation->name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                {{-- phone email --}}
                                <div class="row">
                                    <div class="col-5">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" >Phone</span>
                                            </div>
                                            <input type="text" name="phone" value="{{ $data->phone }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" >Eamil</span>
                                            </div>
                                            <input type="text" name="email" value="{{ $data->email }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                {{-- Start Training  Expiry date --}}
                                <div class="row">
                                    <div class="col-4">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" >Start Training</span>
                                            </div>
                                            <input type="date" name="sta_date" value="{{ $data->sta_date }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Expiry date</span>
                                            </div>
                                            <input type="date" name="exp_date" value="{{ $data->exp_date }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Expiry</span>
                                            </div>
                                            @if ( $diffInDays >= 0)
                                                <input type="text" value="{{ $diffInDays }} Day" class="form-control bg-success">
                                            @else
                                                <input type="text" value="{{ $diffInDays }} Day" class="form-control bg-danger">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                {{-- address comment --}}
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <textarea class="form-control" name="address" rows="5">{{ $data->address }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <textarea class="form-control" name="comment" rows="5">{{ $data->comment }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row mb-2">
                                    <img src="{{ asset('images/customer/' . $data->image) }}" width="100%"
                                        style="border-radius: 10px">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane " id="Product">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product</th>
                                    <th>Date of buy</th>
                                    <th>Employee</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=1;
                                @endphp
                                @foreach ($ph as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->date_of_buy }}</td>
                                        <td>{{ $item->emp }}</td>
                                        <td>
                                            <form action="{{ route('admin.pur_destroy',$item->id )}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="text" hidden  name="member_id" value="{{ $data->id }}">
                                                <button class="btn btn-danger">Delte</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane" id="Record">

                    </div>
                    <div class="tab-pane" id="document">

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

@include('admin.footer')

@if (session('update'))
    <script>
        $(function() {
            Swal.fire({
                title: "Good job!",
                text: "You clicked the button!",
                icon: "success",
                timer:1500,
            });
        });
    </script>
@endif

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
                            url: '/admin/member_destroy/' + itemId,  // URL to your delete route
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'  // Include CSRF token
                            },
                            success: function (response) {
                                Swal.fire(
                                    'Deleted!',
                                    'Your item has been deleted.',
                                    'success',
                                ).then((result) =>{
                                    // location.reload();
                                    window.location.href = '/admin/member';
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