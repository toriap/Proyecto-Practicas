@extends('admin.layout')

@section('content')

<!-- Content Header (Page header) -->

@include('includes.message')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Mis datos</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Actualizar datos</div>

                <div class="card-body">
                    @if(Auth::user()->hasRole('director'))
                        @php($role = 'director')
                            <form method="POST" action="{{ route('user.updateDirectorUser') }}">
                    @else
                        @php($role = 'admin')
                            <form method="POST" action="{{ route('user.updateAdmin') }}">
                    @endif
                    
                        @csrf

                        <input type="hidden" name="role" value="{{$role}}">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ Auth::user()->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Lastname') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ Auth::user()->lastname }}" required autofocus>

                                @if ($errors->has('lastname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="document" class="col-md-4 col-form-label text-md-right">Cédula</label>

                            <div class="col-md-6">
                                <input id="document" type="text" class="form-control{{ $errors->has('document') ? ' is-invalid' : '' }}" name="document" value="{{ Auth::user()->document }}" required>

                                @if ($errors->has('document'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('document') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::user()->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Telefono</label>
                            

                            <div class="col-md-6">
                                <input id="phone" type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone"  pattern="^[0-9]*$" title="Ingrese solo numeros" required value="{{ Auth::user()->phone }}">

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" disabled>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" disabled>

                                <small>
                                    <input type="checkbox" id="pass" class="pass" onChange="updatePass()" />
                                    <label class="text">cambiar contraseña</label>
                                </small>
                            </div>

                           
                        </div>

                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Actualizar
                                </button>
                            </div>
                        </div>

                        <input type="hidden" name="id" value="{{ Auth::user()->id }}">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function updatePass(){
        var password1,password2,check;

        password1=document.getElementById("password");
        password2=document.getElementById("password-confirm");
        check=document.getElementById("pass");

        if(check.checked==true) // Si la checkbox de mostrar contraseña está activada
        {
            password1.required = true;
            password2.required = true;
            password1.disabled = false;
            password2.disabled = false;
        }
        else // Si no está activada
        {
            password1.required = false;
            password2.required = false;
            password1.disabled = true;
            password2.disabled = true;
        }
    }
</script>
@endsection
