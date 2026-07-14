@extends('admin.includes.main')
@section('content')
<div class="page-header">
    <h3 class="mb-3 fw-bold">प्रयोगकर्ता विवरण</h3>
    <ul class="mb-3 breadcrumbs">
        <li class="nav-home">
            <a href="{{ route('dashboard') }}">
                <i class="icon-home"></i>
            </a>
        </li>
        <li class="separator">
            <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.prayog-karta-darta.index') }}">प्रयोगकर्ता</a>
        </li>
        <li class="separator">
            <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
            <a href="#">{{ isset($user->id) ? 'सम्पादन गर्नुहोस्' : 'नयाँ प्रयोगकर्ता दर्ता गर्नुहोस्' }}</a>
        </li>
    </ul>
</div>

<div class="card">
    <div class="card-header d-flex align-items-center">
        <h4>{{ isset($user->id) ? 'सम्पादन गर्नुहोस्' : 'नयाँ प्रयोगकर्ता दर्ता गर्नुहोस्' }}</h4>
    </div>
    <div class="card-body">
        <form class="form-horizontal form-validate"
            action="{{ isset($user->id) ? route('admin.prayog-karta-darta.update', $user->id) : route('admin.prayog-karta-darta.store') }}" method="post">
            @csrf
            @if(isset($user->id))
                @method('PUT')
            @endif

            <div class="mb-3 row">
                <div class="col-md-6">
                    <label class="form-label required">प्रयोगकर्ता नाम:<span style="color:red;">*</span></label>
                    <input class="form-control @error('name') is-invalid @enderror" placeholder="प्रयोगकर्ता नाम"
                        type="text" id="UserName" maxlength="15" name="name" value="{{ old('name', $user->name ?? '') }}" required />
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label required">पासवर्ड<span style="color:red;">*</span></label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="पासवर्ड" id="Password" maxlength="15" name="password" required />
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-md-6">
                    <label class="form-label required">पुन पासवर्ड<span style="color:red;">*</span></label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                        placeholder="पुन पासवर्ड" id="ComfirmedPassword" name="password_confirmation" required />
                    @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label required">इमेल<span style="color:red;">*</span></label>
                    <input class="form-control @error('email') is-invalid @enderror" placeholder="इमेल" type="text"
                        id="Email" maxlength="100" name="email" value="{{ old('email', $user->email ?? '') }}" required />
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
              

                <div class="col-md-6">
                    <label class="form-label required">भूमिका छान्नुहोस्<span style="color:red;">*</span></label>
                    <select class="form-select @error('role') is-invalid @enderror" id="RoleName" name="role" required>
                        <option value="">छान्नुहोस्</option>
                        @foreach (\Spatie\Permission\Models\Role::get() as $data)
                            <option value="{{$data->name}}" {{ (old('role', (isset($user)?$user->getRoleNames()->first(): '')) == $data->name) ? 'selected' : '' }}>{{$data->name}}</option>
                        @endforeach
                    </select>
                    @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label required">प्रयोगकर्ता प्रमाणित गर्नु :<span style="color:red;">*</span></label>
                    <input class="form-control @error('email_verified_at') is-invalid @enderror" 
                        type="datetime-local" id="email_verified_at"  name="email_verified_at" value="{{ old('email_verified_at', $user->email_verified_at ?? '') }}" required />
                    @error('email_verified_at')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                    <div class="col-md-6 col-sm-12">
                        <label for="status" class="form-label ">स्थिति</label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                            <option disabled>-- छान्नुहोस् --</option>
                            <option value="active" {{ old('status', $user->status ?? '') == 'active' ? 'selected' : '' }}>
                                सक्रिय
                            </option>
                            <option value="deactive" {{ old('status', $user->status ?? '') == 'deactive' ? 'selected' : '' }}>
                                निष्क्रिय
                            </option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            <div class="row">
                <div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> सुरक्षित गर्नुहोस्</button>
                    <a href="{{ route('admin.prayog-karta-darta.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> बन्द गर्नुहोस्</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
