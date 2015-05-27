@extends('app')

{{-- GEREK VARMI ??? --}}
{{-- @section('submenu') --}}
{{-- <div class="ui fluid three item menu">
  <a class="item">Hepsini Listele</a>
  <a class="item">Yenisini Ekle</a>
  <a class="item">Sil</a>
</div> --}}
{{-- @stop --}}

@section('content')
<h1>Awards sayfasi</h1>

<div class="ui small horizontal divided list" style="background-color:#E6E6E6">
  <div class="item">
    <div class="content" >
      <p class="header" style="color:red">name</p>
    </div>
  </div>
  <div class="item">
    <div class="content">
      <p class="header" style="color:#0080FF">date</p>
    </div>
  </div>
</div>

<canvas id="c" width="580px" height="420px" style="border:1px solid red"></canvas>

<div class="setup" style="background-color:#EAEAE1; padding: 20px">
    <form method="POST" action="{{ url('templates/save', $template->id) }}" class="ui form" style="font-size:10px">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <h4 class="ui dividing header">Settings:</h4>
        <div class="ui seven fields">
            <div class="field"></div>
            <div class="field"><label>Top</label></div>
            <div class="field"><label>Left</label></div>
            <div class="field"><label>Width</label></div>
            <div class="field"><label>Height</label></div>
            <div class="field"><label>Font family</label></div>
            <div class="field"><label>Font size</label></div>
        </div>
        <div class="ui seven fields">
            {{-- */ $tmp = ""; /* --}}
            @foreach ($template->isettings as $key => $value)
                {{-- */ $name = ucfirst(substr($key, 0, 4)); /* --}}
                @if ($tmp != $name)
                <div class="field">
                    <label>{{ $name }}:</label>
                </div>
                {{-- */ $tmp = $name; /* --}}
                @endif
                <div class="field">
                    @if (property_exists($template->settings, $key))
                        <input type="text" name="{{ $key }}" value="{{ $template->settings->{$key} }}">
                    @else
                        <input type="text" name="{{ $key }}" value="{{ $value }}">
                    @endif
                </div>
            @endforeach

        </div>
        <input type="submit" class="ui submit button" value="Submit">
    </form>
</div>
@stop

@section('scripts')
<script type="text/javascript">
    var canvas = new fabric.Canvas('c');

    // NAME
    var rname = new fabric.Rect({
      left: {{ $template->isettings['name_left'] }},
      top: {{ $template->isettings['name_top'] }},
      width: {{ $template->isettings['name_width'] }},
      height: {{ $template->isettings['name_height'] }},
      fill: 'red',
    });

    canvas.add(rname);

    rname.on('modified', function() {
        $('input[name=name_left]').val(Math.round(rname.left / 2));
        $('input[name=name_top]').val(Math.round(rname.top / 2));
        $('input[name=name_width]').val(Math.round(rname.getWidth() / 2));
        $('input[name=name_height]').val(Math.round(rname.getHeight() / 2));
    });

    // DATE
    var rdate = new fabric.Rect({
      left: {{ $template->isettings['date_left']}},
      top: {{ $template->isettings['date_top']}},
      width: {{ $template->isettings['date_width']}},
      height: {{ $template->isettings['date_height']}},
      fill: '#0080FF',
    });

    canvas.add(rdate);

    rdate.on('modified', function() {
        $('input[name=date_left]').val(Math.round(rdate.left / 2));
        $('input[name=date_top]').val(Math.round(rdate.top / 2));
        $('input[name=date_width]').val(Math.round(rdate.getWidth()));
        $('input[name=date_height]').val(Math.round(rdate.getHeight()));
    });

    fabric.Image.fromURL('/{{ $template->thumb }}', function(image) {
        image.hasControls = false;
        image.selectable = false;
        image.scaleToWidth(canvas.width);
        canvas.add(image);
        image.sendToBack();
    });



    //
    // PDFJS.workerSrc = "pdf.worker.js";
    // PDFJS.getDocument('/denme.pdf').then(function(pdf) {
    //     // Using promise to fetch the page
    //     pdf.getPage(1).then(function(page) {
    //         // var scale = 0.5;
    //         var desiredWidth = 297*2;
    //         var viewportx = page.getViewport(1);
    //         var scale = desiredWidth / viewportx.width;
    //         var viewport = page.getViewport(scale);
    //         // var viewport = page.getViewport(scale);

    //         var pageDisplayWidth = viewport.width;
    //         var pageDisplayHeight = viewport.height;

    //         var c = document.createElement('canvas');
    //         c.setAttribute('id', 'mycanvas');
    //         c.setAttribute('style', 'display:none');
    //         document.body.appendChild(c);

    //         //
    //         // Prepare canvas using PDF page dimensions
    //         //
    //         var tcanvas = document.getElementById('mycanvas');
    //         var context = tcanvas.getContext('2d');
    //         tcanvas.height = viewport.height;
    //         tcanvas.width = viewport.width;
    //         // tcanvas.height = 200;
    //         // tcanvas.width = 300

    //         console.log(viewport.height);
    //         console.log(viewport.width);

    //         //
    //         // Render PDF page into canvas context
    //         //
    //         var renderContext = {
    //             canvasContext: context,
    //             viewport: viewport
    //         };

    //         page.render(renderContext).then(function(aa) {
    //             var img = new Image();
    //             img.src = tcanvas.toDataURL();
    //             var imgInstance = new fabric.Image(img, {
    //                 // left: 100,
    //                 // top: 100,
    //                 // angle: 30,
    //                 // opacity: 0.85
    //             });
    //             canvas.setHeight(tcanvas.height)
    //             canvas.setWidth(tcanvas.width)
    //             canvas.add(imgInstance);
</script>
@stop