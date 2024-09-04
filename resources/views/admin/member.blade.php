@include('admin.header')

<style>
    .image-circle{
        border-radius: 50px;
        height: 80px;
        width: 80px;
        padding: 5px

    }
</style>

<div class="row">
    <div class="col p-1">
        <div class="card p-1">
            <table class="table" id="example1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Card id</th>
                        <th>Name</th>
                        <th>Product</th>
                        <th>Nationality</th>
                        <th>Address</th>
                        <th>Start Training</th>
                        <th>Expiry Training</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>
                                <a href="{{ route('admin.member_profile',$item->id )}}">
                                    <img src="{{ asset('images/customer/'.$item->image) }}" class="image-circle">
                                </a>
                            </td>
                            <td>{{ $item->card_id }}</td>
                            <td>{{ $item->fname }}</td>
                            <td>{{ $item->pname }}</td>
                            <td>{{ $item->nname }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->sta_date }}</td>
                            <td>{{ $item->exp_date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@include('admin.footer')

@if (session('add-member'))
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
                title: 'Create Member Successfully.'
            })
        });
    </script>
@endif