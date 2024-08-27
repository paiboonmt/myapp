@include('user.header')

<div class="row">
    <div class="col p-1">
        <div class="card p-2">
            <table class="table table-sm" id="example1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID Card</th>
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
                            <td>{{ $i->m_card }}</td>
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
