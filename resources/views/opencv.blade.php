<!DOCTYPE html>
<html>
<head>
    <title>OpenCV.js</title>
</head>
<style type="text/css">
	/* display loading gif and hide webpage */
.modal {
    display:    none;
    position:   fixed;
    z-index:    1000;
    top:        0;
    left:       0;
    height:     100%;
    width:      100%;
    background: rgba( 255, 255, 255, .8)
                url('http://i.stack.imgur.com/FhHRx.gif')
                50% 50%
                no-repeat;
}

/* prevent scrollbar from display during load */
body.loading {
    overflow: hidden;
}

/* display the modal when loading class is added to body */
body.loading .modal {
    display: block;
}

</style>
<body>
    <!-- Our HTML will go here-->
<div class="modal"></div>

<input type="file" id="fileInput" name="file" />
<img id="imageSrc" alt="No Image" />
<canvas id="imageCanvas" ></canvas>
<button type="button" id="circlesButton" class="btn btn-primary">Circle Detection</button>
<script  onload="onOpenCvReady();" src="{{ asset('js/opencv/opencv-3.3.1.js') }}" async></script>


<script type="text/javascript">
    // Our JavaScript code will go here
document.body.classList.add("loading");
// previous code is here

let imgElement = document.getElementById('imageSrc');
let inputElement = document.getElementById('fileInput');


inputElement.onchange = function() {
  imgElement.src = URL.createObjectURL(event.target.files[0]);
};


imgElement.onload = function() {
  let image = cv.imread(imgElement);
  cv.imshow('imageCanvas', image);
  image.delete();
};


document.getElementById('circlesButton').onclick = function() {
    this.disabled = true;
    document.body.classList.add("loading");

    let srcMat = cv.imread('imageCanvas');
    let displayMat = srcMat.clone();
    let circlesMat = new cv.Mat();

    cv.cvtColor(srcMat, srcMat, cv.COLOR_RGBA2GRAY);

    cv.HoughCircles(srcMat, circlesMat, cv.HOUGH_GRADIENT, 0, 45, 75, 40, 0, 0);

    for (let i = 0; i < circlesMat.cols; ++i) {
        let x = circlesMat.data32F[i * 3];
        let y = circlesMat.data32F[i * 3 + 1];
        let radius = circlesMat.data32F[i * 3 + 2];
        console.log(x,y)
        let center = new cv.Point(x, y);
        cv.circle(displayMat, center, radius, [0, 255, 250, 255], 3);
    }

    cv.imshow('imageCanvas', displayMat);

    srcMat.delete();
    displayMat.delete();
    circlesMat.delete();



// img = cv.imread('imageCanvas');
// blur=cv.blur(img,(3,3))
// #cv.imwrite(blur,"Step 1 Blur.jpg")
// th,th_img = cv.threshold(img,80,255,cv.THRESH_BINARY)

// kernel=cv.getStructuringElement(cv.MORPH_RECT,(2,2))
// close_img = cv.morphologyEx(th_img, cv.MORPH_CLOSE, kernel)
// cv.imshow('Closed',close_img)
// erode_img = cv.erode(close_img,kernel,iterations = 1)
// cv.imshow('Erdoed',erode_img)
// #print closing.dtype

// gray=cv.cvtColor(erode_img,cv.COLOR_BGR2GRAY)

// (cimg,contours,h) = cv.findContours(gray,cv.RETR_TREE, cv.CHAIN_APPROX_SIMPLE)
// for cnt in contours:
//   cv.drawContours(img,[cnt],0,(0,0,255),1)

// cv.imshow('Org',img)
// cv.waitKey()



    this.disabled = false;
    document.body.classList.remove("loading");
};



function onOpenCvReady() {
  document.body.classList.remove("loading");
}

</script>

</body>
</html>