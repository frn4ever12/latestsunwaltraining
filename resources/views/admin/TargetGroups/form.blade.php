@extends('admin.includes.main')
@section('content')
<div class="page-header">
    <h3 class="mb-3 fw-bold">टार्गेट समूह</h3>
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
            <a href="#">टार्गेट समूह</a>
        </li>
        <li class="separator">
            <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
            <a href="#">{{ isset($group->id) ? 'टार्गेट समूह सम्पादन' : 'नयाँ टार्गेट समूह' }}</a>
        </li>
    </ul>
</div>

<div class="card">
    <div class="card-header">
        विवरण
    </div>
    <div class="card-body">
        <form role="form" action="{{ isset($group->id) ? route('admin.target-group.update', $group) : route('admin.target-group.store') }}" method="POST">
            @csrf
            @if(isset($group->id))
                @method('PUT')
            @endif
            
            <div class="mb-3 row">
                <div class="col-4">
                    <label class="form-label">नाम (नेपाली)<span style="color:red">*</span></label>
                    <input class="form-control @error('name_np') is-invalid @enderror" 
                        placeholder="नाम" id="name_np" name="name_np" type="text" 
                        value="{{ old('name_np', $group->name_np ?? '') }}" required>
                    @error('name_np')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label class="form-label">नाम (अंग्रेजी)<span style="color:red">*</span></label>
                    <input class="form-control @error('name_eng') is-invalid @enderror" 
                        placeholder="Target Group" id="name_eng" name="name_eng" type="text" 
                        value="{{ old('name_eng', $group->name_eng ?? '') }}" required>
                    @error('name_eng')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label class="form-label">स्थिति</label>
                    <select class="form-select @error('status') is-invalid @enderror" name="status" required>
                        <option value="1" {{ (old('status', $group->status ?? '1') == '1') ? 'selected' : '' }}>सक्रिय</option>
                        <option value="0" {{ (old('status', $group->status ?? '1') == '0') ? 'selected' : '' }}>निस्क्रिय</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="d-grid">
                <div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i>&nbsp;
                        {{ isset($group->id) ? 'अपडेट गर्नुहोस्' : 'सुरक्षित गर्नुहोस्' }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
