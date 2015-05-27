@if ($errors->any())
    <div class="ui error message">
        <div class="header">Hata var</div>
        <ul class="list">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif