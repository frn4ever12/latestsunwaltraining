@extends('admin.includes.main')
@section('content')
<div class="page-header">
    <h3 class="mb-3 fw-bold">नयाँ प्रयोगकर्ता भूमिका राख्नुहोस्</h3>
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
            <a href="{{ route('admin.prayog-karta-bhumika.index') }}">भूमिका</a>
        </li>
        <li class="separator">
            <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
            <a href="#">{{ isset($role->id) ? 'सम्पादन गर्नुहोस्' : 'नयाँ थप्नुहोस्' }}</a>
        </li>
    </ul>
</div>
    <form action="{{ isset($role->id) ? route('admin.prayog-karta-bhumika.update', $role->id) : route('admin.prayog-karta-bhumika.store') }}" class="text-left form-validate" method="post">
        @csrf
        @if(isset($role->id))
            @method('PUT')
        @endif
        <section class="forms" style="margin-top:20px;">
            <div class="container-fluid">
                <div class="row" style="padding: 0;">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group-material col-sm-4 mb-3">
                                    <strong class="label-material">भूमिका नाम</strong>
                                    <div style="margin-top:1rem;">
                                        <input class="form-control" type="text" id="RoleName" maxlength="100"
                                            name="name" value="{{ $role->name ?? '' }}" />
                                    </div>
                                </div>

                                <div class="form-group-material col-sm-4">
                                    <div class="mb-2 d-flex align-items-center">
                                        <strong class="label-material me-2">भूमिका क्षमताहरू</strong>
                                        <div class="checkbox">
                                            
                                            <label for="select_all_role" style="color:black;">
                                                <input id="select_all_role" name="checkAll" type="checkbox"
                                                onClick="toggle(this)" class=""> सबै छान्नुहोस्</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </section>

        <section class="forms">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">


                                <div class="row">
                                    @foreach (\Spatie\Permission\Models\Permission::all()->groupBy('group') as $group => $permissions)
                                        <div class="col-sm-3 ">

                                            <strong style="color:black !important;">{{__('messages.' .($group)) }}</strong>

                                            <ul id="" class="list-unstyled ">
                                                @foreach ($permissions as $permission)
                                                    <li>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input id="select_all_role_1" 
                                                                type="checkbox" value="{{$permission->id}}" 
                                                                name="permissions[]"
                                                                @if(isset($role) && $role->hasPermissionTo($permission))
                                                                    checked
                                                                @endif> {{ __('messages.' .($permission->name)) }}
                                                            </label>
                                                          </div>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    @endforeach


                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> सुरक्षित गर्नुहोस्</button>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
@endsection
@section('scripts')
    <script>
        function toggle(selectAllCheckbox) {
            const checkboxes = document.querySelectorAll('.checkbox input[type="checkbox"]:not(#select_all_role)');
            checkboxes.forEach((checkbox) => {
                checkbox.checked = selectAllCheckbox.checked;
            });
        }
    </script>
@endsection
