import cv2 
import numpy as np 

import codecs, json 

import argparse
# construct the argument parser and parse the arguments
ap = argparse.ArgumentParser()
ap.add_argument("-i", "--image", required = True, help = "Path to the image")
args = vars(ap.parse_args())


# load the image, clone it for output, and then convert it to grayscale

width = 668
# 800
height =501
# 600

  
# Front Wheel Configuration values
param1 =55
param2 =20
minRadius =20
maxRadius =25

img = cv2.imread(args["image"], cv2.IMREAD_COLOR) 

# img = cv2.resize(img, (0, 0), fx = 0.1, fy = 0.1) 
img = cv2.resize(img, (width, height))

front_points = [];
back_points = [];
# Read image. 
# img = cv2.imread('/home/css/Desktop/shadow cropped.png', cv2.IMREAD_COLOR) 

# Convert to grayscale. 

# (thresh, blackAndWhiteImage) = cv2.threshold(img, 90, 255, cv2.THRESH_BINARY)
# Blur using 3 * 3 kernel. 
gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY) 

gray_blurred = cv2.blur(gray, (5, 5)) 

# Apply Hough transform on the blurred image. 

# detected_circles = cv2.HoughCircles(gray_blurred, 
# 				cv2.HOUGH_GRADIENT, 1, 80, param1 = 55, 
# 			param2 = 20, minRadius = 30, maxRadius = 35) 


# detected_circles = cv2.HoughCircles(gray_blurred, 
# 				cv2.HOUGH_GRADIENT, 1, 80, param1 = 55, 
# 			param2 = 20, minRadius = 54, maxRadius = 60)


# Font Wheel for 2400X1800 % 3 size
detected_circles_front = cv2.HoughCircles(gray_blurred, 
				cv2.HOUGH_GRADIENT, 1, 80, param1 = 55, 
			param2 = 20, minRadius = 20, maxRadius = 25) 
detected_circles_back = cv2.HoughCircles(gray_blurred, 
				cv2.HOUGH_GRADIENT, 1, 80, param1 = 55, 
			param2 = 20, minRadius = 10, maxRadius = 25) 

# Draw circles that are detected. 
if detected_circles_front is not None:  

	# Convert the circle parameters a, b and r to integers. 
	detected_circles_front = np.uint16(np.around(detected_circles_front)) 
	
	
	
	for pt in detected_circles_front[0, :]: 
		a, b, r = pt[0], pt[1], pt[2] 
		if a < 300 and a > 200 and b > 290:
			front_points.append([a,b,r])
		# Draw the circumference of the circle. 
		cv2.circle(img, (a, b), r, (0, 255, 0), 2) 

		# Draw a small circle (of radius 1) to show the center. 
		cv2.circle(img, (a, b), 1, (0, 0, 255), 3) 


# Draw circles that are detected. 
if detected_circles_back is not None:  

	# Convert the circle parameters a, b and r to integers. 
	detected_circles_back = np.uint16(np.around(detected_circles_back)) 
	
	
	
	for pt in detected_circles_back[0, :]: 
		a, b, r = pt[0], pt[1], pt[2] 
		if a > 400 and b > 300:
			back_points.append([a,b,r])
			# Draw the circumference of the circle. 
			cv2.circle(img, (a, b), r, (0, 255, 255), 2) 

			# Draw a small circle (of radius 1) to show the center. 
			cv2.circle(img, (a, b), 1, (0, 0, 255), 3) 


print([front_points,back_points,width,height])

# img = cv2.resize(img, (1200, 800))
# thresh = cv2.resize(thresh, (1200, 800))
# blackAndWhiteImage = cv2.resize(blackAndWhiteImage, (1200, 800))
# cv2.imshow('img', img)
# cv2.imshow('thresh', thresh)
# cv2.imshow('blackAndWhiteImage', blackAndWhiteImage)
# cv2.waitKey(0) 




