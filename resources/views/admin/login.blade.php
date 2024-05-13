@extends('layouts.admin.app',['title'=>'Authentification'])

@section('content')

<!-- Container start -->
<div class="container">
	<div class="row justify-content-center">
		<div class="col-xl-4 col-lg-5 col-sm-6 col-12">
			<form action="{{ route('postAdminAuth') }}" method="POST" class="my-5">
				@csrf
				<div class="bg-white rounded-3 p-4">
					<div class="login-form">
						<h4 class="my-4">Se connecter en tant qu'admin</h4>
						@if(session('error'))
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							{{ session('error') }}
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
						@endif
						<div class="mb-3">
							<label class="form-label" for="email">E-mail <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="email" id="email" autocomplete="autocomplete" placeholder="Entrer vôtre email" />
							@if ($errors->has('email'))
							<small class="text text-danger">
								{{ $errors->first('email') }}
							</small>
							@endif
						</div>
						<div class="mb-3">
							<label class="form-label" for="pwd">Mot de passe <span class="text-danger">*</span></label>
							<input type="password" class="form-control" name="password" id="pwd" placeholder="Entrer vôtre mot de passe" />
							@if ($errors->has('password'))
							<small class="text text-danger">
								{{ $errors->first('password') }}
							</small>
							@endif
						</div>
						<div class="d-grid py-3 mt-3">
							<button type="submit" class="btn btn-lg btn-primary">
								Se connecter
							</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Container end -->

@endsection