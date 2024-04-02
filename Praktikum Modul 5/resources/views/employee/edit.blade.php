<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $pageTitle }}</title>
    @vite('resources/sass/app.scss')
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 position-absolute top-50 start-50 translate-middle">
            <div class="card ">
                <div class="card-header">{{ $pageTitle }}</div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('employees.update', $employee->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row grid gap-3">
                            <label for="firstName" class="col-md-4 col-form-label text-md-right">First Name</label>

                            <div class="p-2 col-md-6">
                                <input id="firstName" type="text" class="form-control @error('firstName') is-invalid
                                @enderror" name="firstName" value="{{ old('firstName', $employee->firstname) }}" required autofocus>

                                @error('firstName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row grid gap-3">
                            <label for="lastName" class="col-md-4 col-form-label text-md-right">Last Name</label>

                            <div class="p-2 col-md-6">
                                <input id="lastName" type="text" class="form-control @error('lastName') is-invalid
                                @enderror" name="lastName" value="{{ old('lastName', $employee->lastname) }}" required>

                                @error('lastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row grid gap-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="p-2 col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid
                                @enderror" name="email" value="{{ old('email', $employee->email) }}" required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row grid gap-3">
                            <label for="age" class="col-md-4 col-form-label text-md-right">Age</label>

                            <div class="p-2 col-md-6">
                                <input id="age" type="number" class="form-control @error('age') is-invalid
                                @enderror" name="age" value="{{ old('age', $employee->age) }}" required>

                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row grid gap-3">
                            <label for="position" class="col-md-4 col-form-label text-md-right">Position</label>

                            <div class="p-2 col-md-6">
                                <select id="position" class="form-control @error('position') is-invalid @enderror" name="position" required>
                                    @foreach($positions as $position)
                                        <option value="{{ $position->id }}" {{ old('position', $employee->position_id) == $position->id ? 'selected' : '' }}>{{ $position->name }}</option>
                                    @endforeach
                                </select>

                                @error('position')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark btn-lg mt-3">
                                    Update
                                </button>
                                <a href="{{ route('employees.index') }}" class="btn btn-outline-dark btn-lg mt-3">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@vite('resources/js/app.js')

</body>
</html>
