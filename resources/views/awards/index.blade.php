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

<canvas id="c" width="300px" height="300px" style="border:1px solid red"></canvas>
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
    canvas = new fabric.Canvas('c');

    PDFJS.workerSrc = "pdf.worker.js";
    PDFJS.getDocument('/denme.pdf').then(function(pdf) {
        // Using promise to fetch the page
        pdf.getPage(1).then(function(page) {
            // var scale = 0.5;
            var desiredWidth = 297*2;
            var viewportx = page.getViewport(1);
            var scale = desiredWidth / viewportx.width;
            var viewport = page.getViewport(scale);
            // var viewport = page.getViewport(scale);

            var pageDisplayWidth = viewport.width;
            var pageDisplayHeight = viewport.height;

            var c = document.createElement('canvas');
            c.setAttribute('id', 'mycanvas');
            c.setAttribute('style', 'display:none');
            document.body.appendChild(c);

            //
            // Prepare canvas using PDF page dimensions
            //
            var tcanvas = document.getElementById('mycanvas');
            var context = tcanvas.getContext('2d');
            tcanvas.height = viewport.height;
            tcanvas.width = viewport.width;
            // tcanvas.height = 200;
            // tcanvas.width = 300

            console.log(viewport.height);
            console.log(viewport.width);

            //
            // Render PDF page into canvas context
            //
            var renderContext = {
                canvasContext: context,
                viewport: viewport
            };

            page.render(renderContext).then(function(aa) {
                var img = new Image();
                img.src = tcanvas.toDataURL();
                var imgInstance = new fabric.Image(img, {
                    // left: 100,
                    // top: 100,
                    // angle: 30,
                    // opacity: 0.85
                });
                canvas.setHeight(tcanvas.height)
                canvas.setWidth(tcanvas.width)
                canvas.add(imgInstance);


    var name = new fabric.Rect({
        width: 300,
        height: 300
    })
    canvas.add(name);
    name.on('modified', function() {
        console.log(name)
        ypos.value = name.left / 20;
        xpos.value = name.top / 20;
    })

            });
        });
    });



    // XPOS
    var xpos = document.createElement('input');
    xpos.setAttribute('placeholder', 'X pos');
    xpos.setAttribute('id', 'xpos');
    document.body.appendChild(xpos);

    // YPOS
    var ypos = document.createElement('input');
    ypos.setAttribute('placeholder', 'Y pos');
    ypos.setAttribute('id', 'ypos');
    document.body.appendChild(ypos);
</script>
@stop