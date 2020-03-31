import cv2 
import numpy as np 

# Read image. 
# img = cv2.imread('/home/css/Desktop/shadow cropped.png', cv2.IMREAD_COLOR) 
img1 = cv2.imread('/bala/projects/inoru/WheelVisualizer/storage/app/public/demo_cars/0777_cc1280_032_KH3.jpg', cv2.IMREAD_COLOR) 
img2 = cv2.imread('/bala/projects/inoru/WheelVisualizer/storage/app/public/demo_cars/3674_cc1280_032_PRN.jpg', cv2.IMREAD_COLOR) 
img3 = cv2.imread('/bala/projects/inoru/WheelVisualizer/storage/app/public/demo_cars/3714_cc1280_032_3P2.jpg', cv2.IMREAD_COLOR) 
# /bala/projects/inoru/WheelVisualizer/storage/app/public/demo_cars/2962_cc1280_032_8N6.jpg
# Convert to grayscale. 

gray1 = cv2.cvtColor(img1, cv2.COLOR_BGR2GRAY) 
gray2 = cv2.cvtColor(img2, cv2.COLOR_BGR2GRAY) 
gray3 = cv2.cvtColor(img3, cv2.COLOR_BGR2GRAY) 

param1 = 55;
param2 = 60;
minRadius = 0;
maxRadius = 50;


# Blur using 3 * 3 kernel. 
# gray_blurred = cv2.blur(gray, (5, 5)) 
gray_blurred1 = cv2.GaussianBlur(gray1,(3,3),0)
gray_blurred2 = cv2.GaussianBlur(gray2,(3,3),0)
gray_blurred3 = cv2.GaussianBlur(gray3,(3,3),0)
# Apply Hough transform on the blurred image. 
# detected_circles = cv2.HoughCircles(gray_blurred, 
# 				cv2.HOUGH_GRADIENT, 1, 80, param1 = 55, 
# 			param2 = 20, minRadius = 30, maxRadius = 35) 
detected_circles1 = cv2.HoughCircles(gray_blurred1, 
				cv2.HOUGH_GRADIENT, 1, 100, param1 = param1,param2 = param2, minRadius = minRadius, maxRadius = maxRadius) 
detected_circles2 = cv2.HoughCircles(gray_blurred2, 
				cv2.HOUGH_GRADIENT, 1, 100, param1 = param1,param2 = param2, minRadius = minRadius, maxRadius = maxRadius) 
detected_circles3 = cv2.HoughCircles(gray_blurred3, 
				cv2.HOUGH_GRADIENT, 1, 100, param1 = param1,param2 = param2, minRadius = minRadius, maxRadius = maxRadius) 

# Draw circles that are detected. 
if detected_circles1 is not None:  

	# Convert the circle parameters a, b and r to integers. 
	detected_circles1 = np.uint16(np.around(detected_circles1)) 

	for pt in detected_circles1[0, :]: 
		a, b, r = pt[0], pt[1], pt[2] 

		# Draw the circumference of the circle. 
		cv2.circle(img1, (a, b), r, (0, 255, 0), 2) 

		# Draw a small circle (of radius 1) to show the center. 
		cv2.circle(img1, (a, b), 1, (0, 0, 255), 3) 




# Draw circles that are detected. 
if detected_circles2 is not None:  

	# Convert the circle parameters a, b and r to integers. 
	detected_circles2 = np.uint16(np.around(detected_circles2)) 

	for pt in detected_circles2[0, :]: 
		a, b, r = pt[0], pt[1], pt[2] 

		# Draw the circumference of the circle. 
		cv2.circle(img2, (a, b), r, (0, 255, 0), 2) 

		# Draw a small circle (of radius 1) to show the center. 
		cv2.circle(img2, (a, b), 1, (0, 0, 255), 3) 



# Draw circles that are detected. 
if detected_circles3 is not None:  

	# Convert the circle parameters a, b and r to integers. 
	detected_circles3 = np.uint16(np.around(detected_circles3)) 

	for pt in detected_circles3[0, :]: 
		a, b, r = pt[0], pt[1], pt[2] 

		# Draw the circumference of the circle. 
		cv2.circle(img3, (a, b), r, (0, 255, 0), 2) 

		# Draw a small circle (of radius 1) to show the center. 
		cv2.circle(img3, (a, b), 1, (0, 0, 255), 3) 



# cv2.imshow("Detected Circle", np.hstack([img1,img2,img3]))
cv2.imshow("Detected Circle1", img1)
cv2.imshow("Detected Circle2", img2)
cv2.imshow("Detected Circle3", img3)
cv2.waitKey(0) 
