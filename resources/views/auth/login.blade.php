@extends('login')

@section('content')

<h1>Klu Certificate Manage</h1>
<p>Lorem ipsum dolor sit amet, consectetur <b>adipisicing elit.</b> Dolorum, molestias!</p>
<p>Lorem ipsum dolor sit amet.</p>

@if (count($errors) > 0)
<div class="ui error message">
	<div class="ui header">There were some problems with your input.</div>
	<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif

<form role="form" method="POST" action="{{ url('/auth/login') }}" class="ui form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="two fields">
    <div class="field">
        {{-- <label for="ogrno">ÖĞRENCİ NO</label> --}}
        <input id="ogrno" name="ogrno" placeholder="Ogrenci no" value="{{ old('ogrno') }}" type="text">
    </div>
    <div class="field">
        {{-- <label for="password">ŞİFRE</label> --}}
        <input id="password" name="password" placeholder="Şifre" value="" type="password">
    </div>
    </div>
    <div class="two fields">
        <div class="field">
        </div>
        <div class="inline field">
            <div class="ui checkbox">
                <input id="unique-id" type="checkbox">
                <label for="unique-id">Beni hatırla</label>
            </div>
            <input type="submit" class="ui right floated teal button" value="Giriş yap">
        </div>
    </div>
</form>

@endsection
