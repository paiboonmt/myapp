@include('user.header')

<style>
    #header{
        font-size: 18px;
        text-transform: uppercase;
    }
</style>

<div class="row">
    <div class="col">
        {{-- @dd($data) --}}
    </div>
</div>

<div class="row p-1">
    <div class="col">
        <div class="card">
            <div class="card-header bg-dark">
                <div class="row">
                    <div class="col-6"><span id="header">Profile || {{ $data[0]->fname }}</span></div>
                    <div class="col-6"><a href="{{ route('user.profile_print',$data[0]->id) }}" class="btn btn-success"><i class="fas fa-print"></i> | print</a></div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
{{-- image --}}
                        <div class="card p-1">
                            <img src="{{ asset('images/new_spider-man.png') }}" height="30%">
                        </div>
                    </div>
                    <div class="col-md-8">
{{--  status emergency --}}
                        <div class="row mb-1">
                            <div class="col-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Status</span>
                                    </div>
                                    @if ( $data[0]->exp_date >= date('Y-m-d'))
                                        <input type="text" class="form-control bg-success" value="Active">
                                    @else
                                        <input type="text" class="form-control bg-danger" value="Expired">
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Emergency</span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $data[0]->emergency }}">
                                </div>
                            </div>
                        </div>
{{-- member card visa passport --}}
                        <div class="row mb-1">
                            <div class="col-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Member card</span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $data[0]->m_card }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Visa | Passport number</span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $data[0]->p_visa }}">
                                </div>
                            </div>
                        </div>
{{-- gender first and last name --}}
                        <div class="row mb-1">
                            <div class="col-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Gender</span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $data[0]->sex }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">First and Last name</span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $data[0]->fname }}">
                                </div>
                            </div>
                        </div>
{{-- birthday age --}}
                        <div class="row mb-1">
                            <div class="col">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Birth Day</span>
                                    </div>
                                    <input type="date" class="form-control" value="{{ $data[0]->birthday }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Age</span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $data[0]->age }}">
                                </div>
                            </div>
                        </div>
{{-- Email Nationality --}}
                        <div class="row mb-1">
                            <div class="col">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Email</span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $data[0]->email }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Nationality</span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $data[0]->nationalty }}">
                                </div>
                            </div>
                        </div>
{{-- height weigh --}}
                        <div class="row mb-1">
                            <div class="col">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Height</span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $data[0]->height }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Weigh</span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $data[0]->weigh }}">
                                </div>
                            </div>
                        </div>
{{-- phone fightname Vaccine --}}
                        <div class="row mb-1">
                            <div class="col">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Phone</span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $data[0]->phone }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Fight Name</span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $data[0]->fightname }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Vaccine</span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $data[0]->vaccine }}">
                                </div>
                            </div>
                        </div>
{{-- Tenure type of trainning --}}
                        <div class="row mb-1">
                            <div class="col">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Tenure of Agreement</span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $data[0]->tenure }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Type of Training</span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $data[0]->type_training }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Type of Fighter</span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $data[0]->type_fighter }}">
                                </div>
                            </div>
                        </div>
{{-- Bennefit Commission Affiliate --}}
                        <div class="row mb-1">
                            <div class="col">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Bennefit</span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $data[0]->sponsored }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Commission</span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $data[0]->commission }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Affiliate</span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $data[0]->affiliate }}">
                                </div>
                            </div>
                        </div>
{{--  mealplan_month facebook instagram --}}
                        <div class="row mb-1">
                            <div class="col">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Mealplan</span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $data[0]->mealplan_month }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Facebook</span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $data[0]->facebook }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Instagram</span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $data[0]->instagram }}">
                                </div>
                            </div>
                        </div>
{{-- Comment Address --}}
                        <div class="row mb-1">
                            <div class="col">
                                <div class="input-group">
                                    <textarea cols="30" rows="6" class="form-control">{{ $data[0]->comment }}</textarea>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <textarea cols="30" rows="6" class="form-control" placeholder="Address / Accommodation">{{ $data[0]->accom }}</textarea>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('user.footer')

