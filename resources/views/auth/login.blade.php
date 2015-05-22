@extends('login')

@section('content')

<h1>Klu Certificate Manage</h1>
<p>Lorem ipsum dolor sit amet, consectetur <b>adipisicing elit.</b> Dolorum, molestias!</p>
<p>Lorem ipsum dolor sit amet.</p>

<!-- @if (count($errors) > 0) -->
	<div class="ui error message">

		<div class="ui header">There were some problems with your input.</div>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
<!-- @endif -->

<form role="form" method="POST" action="{{ url('/auth/login') }}" class="klu-form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="klu-form-row">
        <input id="email" name="email" placeholder="Email" value="{{ old('email') }}" class="klu-form-control" type="text">
        <label for="email" class="klu-form-label">Kullanıcı adı</label>
    </div>
    <div class="klu-form-row">
        <input id="password" name="password" placeholder="Şifre" value="" required="" class="klu-form-control" type="password">
        <label for="password" class="klu-form-label">Şifre</label>
    </div>
    <!-- <div class="klu-form-row">
        <!-- <input id="remember" name="remember" class="klu-form-control" type="checkbox"> Beni hatirla -->
        <!-- <label for="remember" class="klu-form-label">Beni hatirla</label> -->
    <!-- </div> -->
    <div class="klu-form-row">
        <!-- <div class="ui hidden divider"></div> -->
<!--                         <div class="ui error message">
            <div class="header">We noticed some issues</div>
        </div> -->
        <div class="ui checkbox">
            <input id="unique-id" type="checkbox">
            <label for="unique-id">Beni hatirla</label>
            <div class="ui hidden divider"></div>
			<a class="btn btn-link" href="{{ url('/auth/register') }}">Register new user</a>
			<a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
        </div>
    </div>
    <div class="klu-form-actions">
        <button type="submit" class="klu-button">Giriş yap</button>
    </div>
</form>

@endsection
