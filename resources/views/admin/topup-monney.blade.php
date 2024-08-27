@include('admin.header')

<div class="row">
    <div class="col p-1">
        <div class="card p-1">
            <form action="{{ route('admin.topup') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Number</span>
                        </div>
                        <input type="number" name="card_number" required class="form-control" autofocus value="">
                        @error('card_number')
                            <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message  }}</span>
                        @enderror
                    </div>
            </form>
        </div>
    </div>
    <div class="col p-1">
        <div class="card p-1">
            @isset($data)
                {{ $data }}
            @endisset

            @if (session('ok'))
                <div class="alert alert-danger">
                    {{ session('ok') }}
                </div>
            @else
                {{ session('not') }}
            @endif
        </div>
    </div>
</div>

@include('admin.footer')
