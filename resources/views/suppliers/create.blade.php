@extends('layouts.panel')
@section('title', 'Nuevo Proveedor')

@section('content')    
<div class="container py-4">
    <h1 class="mb-4">Registrar Nuevo Proveedor</h1>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show small py-2 mb-3" role="alert">
            <h6 class="font-weight-bold mb-1"><i class="fas fa-exclamation-triangle mr-1"></i> Por favor corrige los siguientes errores:</h6>
            <ul class="mb-0 pl-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close py-2" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <form action="{{ route('suppliers.store') }}" method="POST">
        @csrf 
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white py-2 font-weight-bold small text-uppercase">
                Datos de Contacto de la Empresa
            </div>
            <div class="card-body py-3">
                <div class="row">
                    <!-- Campo: Nombre -->
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-control-label small font-weight-bold">Nombre de la Empresa:</label>
                        <input type="text" name="name" id="name" class="form-control form-control-alternative form-control-sm" value="{{ old('name') }}" placeholder="Ej: Molinos del Centro S.A." required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="status" class="form-control-label small font-weight-bold">Estado en el Sistema:</label>
                        <select name="status" id="status" class="form-control form-control-alternative form-control-sm" required>
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Activo (Habilitado para compras)</option>
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactivo (Bloqueado para compras)</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-control-label small font-weight-bold">Teléfono de Contacto:</label>
                        <input type="text" name="phone" id="phone" class="form-control form-control-alternative form-control-sm" value="{{ old('phone') }}" placeholder="Ej: +505 8888-8888" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-control-label small font-weight-bold">Correo Electrónico:</label>
                        <input type="email" name="email" id="email" class="form-control form-control-alternative form-control-sm" value="{{ old('email') }}" placeholder="Ej: ventas@proveedor.com" required>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="address" class="form-control-label small font-weight-bold">Dirección Completa:</label>
                        <textarea name="address" id="address" rows="3" class="form-control form-control-alternative form-control-sm" placeholder="Especificar calle, avenidas, puntos de referencia comerciales..." required>{{ old('address') }}</textarea>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-3 pt-3 border-top border-light">
                    <a href="{{ route('suppliers.index') }}" class="btn btn-outline-secondary btn-sm py-1 px-3 mr-2 w-auto mb-0" style="font-size: 11px; height: 30px;">
                        Cancelar
                    </a>
                    <button type="submit" class="btn btn-success btn-sm py-1 px-3 w-auto mb-0" style="font-size: 11px; height: 30px;">
                        Guardar Proveedor
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
