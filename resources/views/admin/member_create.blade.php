@include('admin.header')

<div class="col p-1">
    <div class="card">
        <div class="card-body">

            <form action="{{ route('admin.member_save') }}" method="post" enctype="multipart/form-data" >

                @csrf
                <div class="row">

                    <div class="col-md-8">
                        {{-- card_id , visa_id --}}
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Card number</span>
                                    </div>
                                    <input type="number" class="form-control" name="card_id"
                                        value="{{ $card_id }}">
                                </div>
                                {{-- <span class="error invalid-feedback">{{$message}}</span> --}}
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Visa number</span>
                                    </div>
                                    <input type="text" class="form-control" name="visa_id"
                                        value="{{ 'adc'.rand(100000, 200000).'dx' }}">
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
                                        <option value="Man">Man</option>
                                        <option value="Girl">Girl</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">First name | Last name</span>
                                    </div>
                                    <input type="text" class="form-control" name="fname" value="Paiboon Yaniwong">
                                </div>
                                {{-- <span class="error invalid-feedback">{{ $message }}</span> --}}
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
                                        @foreach ($pro as $p)
                                            <option value="{{ $p->id }}">{{ $p->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- birthday nationality --}}
                        <div class="row">
                            <div class="col-5">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Birth Day</span>
                                    </div>
                                    <input type="date" name="birthday" value="{{ date('Y-m-d') }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Nationality</span>
                                    </div>
                                    <select name="nationality" class="form-control">
                                        @foreach ( $na as $n )
                                            <option value="{{ $n->id }}">{{ $n->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- phone email --}}
                        <div class="row">
                            <div class="col-5">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Phone</span>
                                    </div>
                                    <input type="text" name="phone"
                                        value="{{ '+66 - ' . rand('09800000000', '9900000000') }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Eamil</span>
                                    </div>
                                    <input type="text" name="email" value="admin@local.com" class="form-control">
                                </div>
                            </div>
                        </div>
                        {{-- Start Training  Expiry date --}}
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Start Training</span>
                                    </div>
                                    <input type="date" name="sta_date" value="{{ date('Y-m-d') }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Expiry date</span>
                                    </div>
                                    <input type="date" name="exp_date" value="{{ date('Y-m-d') }}" class="form-control">
                                </div>
                            </div>
                        </div>
                        {{-- address comment --}}
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <textarea class="form-control" name="address" placeholder="Address" rows="5">Thailand , Phuket 7/35 </textarea>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <textarea class="form-control" name="comment" placeholder="Comment" rows="5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam veritatis, facere in porro ullam saepe mollitia nihil a eaque accusantium.</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- image --}}
                    <div class="col-md-4">

                        <div class="row mb-2">
                            {{-- <img src="{{ asset('images/image-logo.png') }}" width="100%"> --}}
                            <div id="imagePreview">
                                <img id="preview" src="#" alt="Image Preview" style="display:none;" width="100%">
                            </div>
                        </div>
                        <div class="row">
                            <input type="file" name="image" class="form-control" id="imageUpload" accept="image/*">
                        </div>
                        @error('image')
                            <div class="input-group">
                                <div class="my-1">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                            </div>
                        @enderror

                    </div>

                </div>

                <div class="row mt-3">
                    <div class="col">
                        <button class="btn btn-info form-control">SAVE DATA</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>

@include('admin.footer')

<script>
    document.getElementById('imageUpload').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const reader = new FileReader();
    
    reader.onload = function(e) {
        const preview = document.getElementById('preview');
        preview.src = e.target.result;
        preview.style.display = 'block';
    }

    reader.readAsDataURL(file);
});

</script>