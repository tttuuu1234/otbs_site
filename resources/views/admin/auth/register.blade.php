@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="card">
		<div class="card-body">
			<form method="POST" action="{{ route('admin.register') }}">
				@csrf

				<div class="form-group row">
					<div class="regist-header">
						<p class="regist-title">名前</p>
						<span class="required">必須</span>
					</div>
						<div class="col-md-6 form-register-text">
								<input id="name" type="text" class=" @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

								@error('name')
										<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
										</span>
								@enderror
						</div>
				</div>

				<div class="form-group row">
					<div class="regist-header"> 
						<p class="regist-title">メールアドレス</p>
						<span class="required">必須</span>
					</div>
					<div class="col-md-6">
							<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

							@error('email')
									<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
									</span>
							@enderror
					</div>
				</div>

				<div class="form-group row">
					<div class="regist-header">
						<p class="regist-title">パスワード</p>
						<span class="required">必須</span>
					</div>
					<div class="col-md-6">
							<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

							@error('password')
									<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
									</span>
							@enderror
					</div>
				</div>

				<div class="form-group row">
					<div class="regist-header">
						<p class="regist-title">確認のためもう一度ご入力ください</p>
						<span class="required">必須</span>
					</div>					
					<div class="col-md-6">
							<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
					</div>
				</div>

				<div class="form-group row mb-0">
						<div class="col-md-6 offset-md-4">
							<button type="submit" class="regist-submit">登録</button>
						</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
