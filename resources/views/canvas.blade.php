@extends('layouts.app')



@section('content')

<canvas id="cancan" width="400", height="200">Canvas Blue Goat</canvas>

<script type="text/javascript">
function imageLoaded(ev) {
    element = document.getElementById("cancan");
    c = element.getContext("2d");

    im = ev.target; // the image, assumed to be 200x200

    // read the width and height of the canvas
    width = element.width;
    height = element.height;

    // stamp the image on the left of the canvas:
    c.drawImage(im, 0, 0);

    // get all canvas pixel data
    imageData = c.getImageData(0, 0, width, height);

    w2 = width / 2;

    // run through the image, increasing blue, but filtering
    // down red and green:

    for (y = 0; y < height; y++) {
        inpos = y * width * 4; // *4 for 4 ints per pixel
        outpos = inpos + w2 * 4
        for (x = 0; x < w2; x++) {
            r = imageData.data[inpos++] / 3; // less red
            g = imageData.data[inpos++] / 3; // less green
            b = imageData.data[inpos++] * 5; // MORE BLUE
            a = imageData.data[inpos++];     // same alpha

            b = Math.min(255, b); // clamp to [0..255]

            imageData.data[outpos++] = r;
            imageData.data[outpos++] = g;
            imageData.data[outpos++] = b;
            imageData.data[outpos++] = a;
        }
    }

    // put pixel data on canvas
    c.putImageData(imageData, 0, 0);
}

im = new Image();
im.onload = imageLoaded;
im.src = "goat200.jpg"; // code assumes this image is 200x200

</script>

@endsection