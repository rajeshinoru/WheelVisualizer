<!DOCTYPE html>
<html>
<head>
</head>
<body>
<!-- Load TensorFlow.js. This is required to use coco-ssd model. -->
<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"> </script>
<!-- Load the coco-ssd model. -->
<script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/coco-ssd"> </script>

<!-- Replace this with your image. Make sure CORS settings allow reading the image! -->
<img id="img" src="/storage/cars/12993_cc0320_032_720.jpg"/>
<!-- <canvas id="resultImg"></canvas> -->

<!-- Place your code in the script tag below. You can also use an external .js file -->
<script>
  // Notice there is no 'import' statement. 'cocoSsd' and 'tf' is
  // available on the index-page because of the script tag above.

  const img = document.getElementById('img');
  // res = document.getElementById('resultImg');

  // Load the model.
  cocoSsd.load().then(model => {
    // detect objects in the image.
    model.detect(img).then(predictions => {
      console.log('Predictions: ', predictions);
    var canvas = document.createElement("canvas");
    document.body.appendChild(canvas);

    canvas.width  = img.width;
    canvas.height = img.height;

    var ctx = canvas.getContext("2d");

    ctx.drawImage(img, 0, 0);
    // ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
    const font = "24px helvetica";
    ctx.font = font;
    ctx.textBaseline = "top";

    predictions.forEach(prediction => {
      const x = prediction.bbox[0];
      const y = prediction.bbox[1];
      const width = prediction.bbox[2];
      const height = prediction.bbox[3];
      // Draw the bounding box.
      ctx.strokeStyle = "#2fff00";
      ctx.lineWidth = 1;
      ctx.strokeRect(x, y, width, height);
      // Draw the label background.
      ctx.fillStyle = "#2fff00";
      const textWidth = ctx.measureText(prediction.class).width;
      const textHeight = parseInt(font, 10);
      // draw top left rectangle
      ctx.fillRect(x, y, textWidth + 10, textHeight + 10);
      // draw bottom left rectangle
      ctx.fillRect(x, y + height - textHeight, textWidth + 15, textHeight + 10);

      // Draw the text last to ensure it's on top.
      ctx.fillStyle = "#000000";
      ctx.fillText(prediction.class, x, y);
      ctx.fillText(prediction.score.toFixed(2), x, y + height - textHeight);
    });
});
  });
</script>

</body>
</html>