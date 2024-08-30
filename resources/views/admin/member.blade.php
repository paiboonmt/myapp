@include('admin.header')

<style>
    .image-circle{
        border-radius: 50px;
        height: 50px;
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
                        <th>First name Last name</th>
                        <th>Nationality</th>
                        <th>Address</th>
                        <th>Start Training</th>
                        <th>Expiry Training</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>
                                <img src="{{ asset('images/customer/'.$item->image) }}" class="image-circle">
                            </td>
                            <td>{{ $item->card_id }}</td>
                            <td>{{ $item->fname }}</td>
                            <td>{{ $item->nationality }}</td>
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
