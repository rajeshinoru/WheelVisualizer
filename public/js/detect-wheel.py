

import cv2 
import numpy as np 
# import torch
import codecs, json 
import sys 

sys.path.append('/home/rajesh/.local/lib/python3.6/site-packages') 

from detecto import core, utils, visualize
# import argparse
# # construct the argument parser and parse the arguments
# ap = argparse.ArgumentParser()
# ap.add_argument("-i", "--image", required = True, help = "Path to the image")
# args = vars(ap.parse_args())

# load the image, clone it for output, and then convert it to grayscale
args = sys.argv
image = args[1]
baseurl = args[2]
width = 668
# 800
height =501
# 600
# baseurl = '/bala/projects/inoru/WheelVisualizer/'
storageurl = '/storage/custom-detection-dataset/'
  
# Front Wheel Configuration values
param1 =55
param2 =20
minRadius =20
maxRadius =25

img = cv2.imread(image, cv2.IMREAD_COLOR) 

# img = cv2.resize(img, (0, 0), fx = 0.1, fy = 0.1) 
img = cv2.resize(img, (width, height))
cv2.imwrite('current_car.png', img)



# Specify the path to your image
image = utils.read_image('current_car.png')# Specify the path to your image
model = core.Model.load(baseurl+storageurl+'model_weights.pth', ['wheel'])
# image = utils.read_image('lorry-transport-services-500x500.jpg')
predictions = model.predict(image)

# print(boxes)

# # predictions format: (labels, boxes, scores)
labels, boxes, scores = predictions
# visualize.show_labeled_image(image, boxes, labels)

# print(boxes)
# Window name in which image is displayed 
# window_name = 'Image'
  
# # Start coordinate, here (5, 5) 
# # represents the top left corner of rectangle 
# start_point = (5, 5) 
  
# # Ending coordinate, here (220, 220) 
# # represents the bottom right corner of rectangle 
# end_point = (220, 220) 
  
# # Blue color in BGR 
color = (255, 0, 0) 
  
# # Line thickness of 2 px 
thickness = 2

points = [];

# back_points = [];

for key, value in enumerate(boxes): 
	if scores[key] > 0.6 :
		rect = value.tolist()
		x = (rect[0] +rect[2])/2
		y = (rect[1] +rect[3])/2
		sr = (rect[2]-rect[0])
		tr = (rect[3]-rect[1])
		points.append([x,y,sr,tr])
		# cv2.rectangle(img,(value[0],value[1]),(value[2],value[3]), color, thickness)
		# cv2.circle(img, (x,y), 1, color, thickness)



# cv2.imwrite('/bala/projects/inoru/WheelVisualizer/public/js/result.png', img);
# Using cv2.rectangle() method 
# Draw a rectangle with blue line borders of thickness of 2 px 
# image = cv2.rectangle(img, start_point, end_point, color, thickness) 
  
# Displaying the image  
# cv2.imshow('result', img)  
# cv2.waitKey(0) 

# # Read image. 
# # img = cv2.imread('/home/css/Desktop/shadow cropped.png', cv2.IMREAD_COLOR) 

# # Convert to grayscale. 

# # (thresh, blackAndWhiteImage) = cv2.threshold(img, 90, 255, cv2.THRESH_BINARY)
# # Blur using 3 * 3 kernel. 
# gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY) 

# gray_blurred = cv2.blur(gray, (5, 5)) 
# # gray_blurred = cv2.blur(gray, (4, 4)) 

# # Apply Hough transform on the blurred image. 

# # detected_circles = cv2.HoughCircles(gray_blurred, 
# # 				cv2.HOUGH_GRADIENT, 1, 80, param1 = 55, 
# # 			param2 = 20, minRadius = 30, maxRadius = 35) 



# # Font Wheel for 2400X1800 % 3 size
# detected_circles_front = cv2.HoughCircles(gray_blurred, 
# 				cv2.HOUGH_GRADIENT, 1, 80, param1 = 55, 
# 			param2 = 20, minRadius = 10, maxRadius = 30) 

# detected_circles_back = cv2.HoughCircles(gray_blurred, 
# 				cv2.HOUGH_GRADIENT, 1, 80, param1 = 55, 
# 			param2 = 20, minRadius = 10, maxRadius = 25) 


# # detected_circles = cv2.HoughCircles(gray_blurred, 
# # 				cv2.HOUGH_GRADIENT, 1.5, 80, param1 = 55, 
# # 			param2 = 20, minRadius = 54, maxRadius = 70)

# # Draw circles that are detected. 
# if detected_circles_front is not None:  

# 	# Convert the circle parameters a, b and r to integers. 
# 	detected_circles_front = np.uint16(np.around(detected_circles_front)) 
	
	
	
# 	for pt in detected_circles_front[0, :]: 
# 		a, b, r = pt[0], pt[1], pt[2] 
# 		if a < 350 and a > 280 and b > 290:
			# front_points.append([a,b,r])
# 		# Draw the circumference of the circle. 
# 		cv2.circle(img, (a, b), r, (0, 255, 0), 2) 

# 		# Draw a small circle (of radius 1) to show the center. 
# 		cv2.circle(img, (a, b), 1, (0, 0, 255), 3) 


# # Draw circles that are detected. 
# if detected_circles_back is not None:  

# 	# Convert the circle parameters a, b and r to integers. 
# 	detected_circles_back = np.uint16(np.around(detected_circles_back)) 
	
	
	
# 	for pt in detected_circles_back[0, :]: 
# 		a, b, r = pt[0], pt[1], pt[2] 
# 		if a > 400 and b > 300:
			# back_points.append([a,b,r])
# 		# Draw the circumference of the circle. 
# 		cv2.circle(img, (a, b), r, (0, 255, 255), 2) 

# 		# Draw a small circle (of radius 1) to show the center. 
# 		cv2.circle(img, (a, b), 1, (0, 0, 255), 3) 

# print(type(tf.Session().run(tf.constant([1,2,3]))))

print(points)

# # img = cv2.resize(img, (1200, 800))
# # thresh = cv2.resize(thresh, (1200, 800))
# # blackAndWhiteImage = cv2.resize(blackAndWhiteImage, (1200, 800))
# # cv2.imshow('img', img)
# # cv2.imshow('thresh', thresh)
# # cv2.imshow('blackAndWhiteImage', blackAndWhiteImage)
# # cv2.waitKey(0) 




