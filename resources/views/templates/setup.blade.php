@extends('app')

@section('submenu')
<div class="ui fluid three item menu">
  <a class="item">Hepsini Listele</a>
  <a class="item">Yenisini Ekle</a>
  <a class="item">Sil</a>
</div>
@stop

@section('content')
<h1>Awards sayfasi</h1>

<canvas id="c" width="580px" height="420px" style="border:1px solid red"></canvas>

<div class="setup" style="background-color:#EAEAE1; padding: 20px">
    <form method="POST" action="{{ url('templates/save', $template->id) }}" class="ui form" style="font-size:10px">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <h4 class="ui dividing header">Name:</h4>
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
            <div class="field">
                <label>Name:</label>
            </div>
            <div class="field">
                <input type="text" name="name_top">
            </div>
            <div class="field">
                <input type="text" name="name_left">
            </div>
            <div class="field">
                <input type="text" name="name_width">
            </div>
            <div class="field">
                <input type="text" name="name_height">
            </div>
            <div class="field">
                <input type="text" name="name_font_family">
            </div>
            <div class="field">
                <input type="text" name="name_font_size">
            </div>
        </div>
        <input type="submit" class="ui submit button" value="Submit">
    </form>
</div>
@stop

@section('scripts')
<script type="text/javascript">
    // var canvasEl = document.getElementById('c');
    // var ctx = canvasEl.getContext('2d');
    // ctx.fillStyle = 'red';
    // ctx.fillRect(100, 100, 20, 20);
    // // create a wrapper around native canvas element (with id="c")
    // var canvas = new fabric.Canvas('c');

    // // create a rectangle object
    // var rect = new fabric.Rect({
    //   left: 100,
    //   top: 100,
    //   fill: 'red',
    //   width: 20,
    //   height: 20
    // });

    // // "add" rectangle onto canvas
    // canvas.add(rect);
    //
    //
    var canvas = new fabric.Canvas('c');

fabric.Image.fromURL('/{{ $template->thumb }}', function(image) {
    image.hasControls = false;
    image.selectable = false;
    image.scaleToWidth(canvas.width);
    canvas.add(image);
    image.sendToBack();
});

// create a rectangle with angle=45
var rect = new fabric.Rect({
  left: 100,
  top: 100,
  fill: 'red',
  width: 20,
  height: 20,
});
canvas.add(rect);

rect.on('modified', function() {
    console.log(rect)
    $('input[name=name_left]').val(Math.round(rect.left / 2));
    $('input[name=name_top]').val(Math.round(rect.top / 2));
    $('input[name=name_width]').val(Math.round(rect.scaleX));
    $('input[name=name_height]').val(Math.round(rect.scaleY));
    $('input[name=name_font_family]').val("Arial");
    $('input[name=name_font_size]').val(24);
})
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


    // var name = new fabric.Rect({
    //     width: 300,
    //     height: 300
    // })
    // canvas.add(name);
    // name.on('modified', function() {
    //     console.log(name)
    //     ypos.value = name.left / 20;
    //     xpos.value = name.top / 20;
    // })

    //         });
    //     });
    // });




</script>
@stop