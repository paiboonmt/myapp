@include('user.header')

<div class="row p-1">
    <div class="col">
        <div class="card p-2">
            <table class="table table-sm" id="example1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Nationality</th>
                        <th>Fighter Type</th>
                        <th>Training Type</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $data as $i )
                        <tr>
                            <td><a href="{{ route('user.profile',$i->id) }}" class="btn btn-sm btn-info"><i class="fas fa-street-view"></i></a></td>
                            <td>{{ $i->id }}</td>
                            <td>{{ $i->fname }}</td>
                            <td>{{ $i->nationalty }}</td>
                            <td>{{ $i->type_fighter }}</td>
                            <td>{{ $i->type_training }}</td>
                            <td>{{ $i->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('user.footer')
