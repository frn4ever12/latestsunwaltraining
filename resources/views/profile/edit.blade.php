@extends('admin.includes.main')
@section('content')
    <div class="page-header">
        <h3 class="mb-3 fw-bold">मेरो प्रोफाइल</h3>
        <ul class="mb-3 breadcrumbs">
            <li class="nav-home">
                <a href="#">
                    <i class="icon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="{{ route('profile.edit') }}">मेरो प्रोफाइल</a>
            </li>
        </ul>
    </div>

    <section class="row">
        <div class="col-md-4 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-center my-4">
                        @if (isset(get_detail()->logo))
                            <img class="profile-user-img img-circle"
                                src="{{ route('file.show', urlencode('/' . get_detail()->logo)) }}" alt=""
                                height="110px">
                        @else
                            <img class="profile-user-img img-circle" src="{{ asset('dist/img/logo/Government_Logo.png') }}"
                                alt="" height="110px">
                        @endif
                    </div>
                    <h3 class="py-3">मेरो बारेमा</h3>
                    <p class="fw-bold"><i class="pe-2 fa fa-envelope" aria-hidden="true"></i> ईमेल</p>
                    <p class="text-muted">{{ Auth::user()->email }}</p>
                    <p class="fw-bold"><i class="pe-2 fa fa-map-marker" aria-hidden="true"></i> ठेगाणा</p>
                    <p class="text-muted">{{ Auth::user()->email }}</p>
                    <hr>
                    <p class="fw-bold"><i class="pe-2 fas fa-phone-volume"></i> सम्पर्क नम्बर</p>
                    <p class="text-muted"></p>
                    <hr>
                    <p class="fw-bold"><i class="pe-2  fa fa-user"></i> प्रयोगकर्ता विवरण</p>
                    <p class="text-muted">{{ Auth::user()->email }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-sm-12">
            <div class="card">
                <div class="card-header p-0">
                    <ul class="nav nav-tabs border-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link p-3 active" href="#userdetails" role="tab" data-toggle="tab"
                                aria-expanded="true">प्रयोगकर्ता विवरण</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-3" href="#usersetting" role="tab" data-toggle="tab"
                                aria-expanded="false">प्रयोगकर्ता सेटिङ</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="userdetails" role="tabpanel">
                            <div class="card border-0 shadow-none">
                                <form class="form-horizontal" action="{{ route('profile.update') }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="card-body">
                                        <div class=" row g-2 mb-3">
                                            <label for="inputName" class="col-sm-3 col-form-label">नाम नेपालीमा</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="inputName" name="name_np"
                                                    value="{{ Auth::user()->name_np }}">
                                            </div>
                                        </div>
                                        <div class=" row g-2 mb-3">
                                            <label for="inputEmail" class="col-sm-3 col-form-label">नाम अंग्रेजीमा</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="inputEmail" name="name"
                                                    value="{{ Auth::user()->name }}">
                                            </div>
                                        </div>
                                        <div class=" row g-2 mb-3">
                                            <label for="inputName2" class="col-sm-3 col-form-label">ईमेल आई.डि.</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="inputName2" name="email"
                                                    value="{{ Auth::user()->email }}">
                                            </div>
                                        </div>
                                        <div class=" row g-2 mb-3">
                                            <label for="inputName2" class="col-sm-3 col-form-label">प्रयोगकर्ता
                                                प्रकार</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="inputName2"
                                                    value="{{ Auth::user()->getRoleNames()->first() }}">
                                            </div>
                                        </div>
                                        <div class=" row g-2 mb-3">
                                            <label for="inputName2" class="col-sm-3 col-form-label">प्रयोगकर्ता
                                                स्थिति</label>
                                            <div class="col-sm-9">
                                                <select name="status" class="form-control" id="">
                                                    <option value="active" {{ Auth::user()->status=='active'?'selected':'' }}>Active</option>
                                                    <option value="deactive" {{ Auth::user()->status=='deactive'?'selected':'' }}>Deactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class=" row g-2 mb-3">
                                            <label for="inputName2" class="col-sm-3 col-form-label">कैफियत</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="inputName2"
                                                    name="kaifiyat" value="{{ Auth::user()->kaifiyat }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                                            परिवर्तन गर्नुहोस्</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane" id="usersetting" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card border-0 shadow-none">
                                        <form method="post" action="{{ route('password.update') }}">
                                            @method('PUT')
                                            @csrf
                                            <div class="card-body">
                                                <div class="row g-2">
                                                    <div class=" col-md-12">
                                                        <label class="form-label">हालको पासवर्ड <span
                                                                class="text text-danger">*</span></label>
                                                        <input type="password" class="form-control"
                                                            name="current_password" required placeholder="हालको पासवर्ड">
                                                    </div>
                                                    <div class=" col-md-12">
                                                        <label class="form-label">नयाँ पासवर्ड <span class="text text-danger">*</span></label>
                                                        <input type="password" class="form-control" name="password"
                                                            required placeholder="नयाँ पासवर्ड">
                                                    </div>
                                                    <div class=" col-md-12">
                                                        <label class="form-label">पुन नयाँ पासवर्ड <span
                                                                class="text text-danger">*</span></label>
                                                        <input type="password" class="form-control"
                                                            name="password_confirmation" required
                                                            placeholder="नयाँ पासवर्ड">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                                                    परिवर्तन गर्नुहोस्</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
@endsection
