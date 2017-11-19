from keras.models import Sequential
from keras.layers import Convolution2D
from keras.layers import MaxPooling2D
from keras.layers import Flatten
from keras.layers import Dense, Dropout


class CNNModel:

	PADDING='SAME'
	OUTPUT_SHAPES=[256,512,256,512,256,1024,1024,1024]
	KERNEL_SIZE=(5,5)
	POOL_SIZE=(2,2)

	def __init__(self,img_dims,output_dim):

		print "model1"
		self.IMG_DIMS=img_dims
		self.OUTPUT_DIM=output_dim

	def get_model(self):

		model=Sequential()

		#layer 1
		model.add(Convolution2D(filters=CNNModel.OUTPUT_SHAPES[0],kernel_size=CNNModel.KERNEL_SIZE,input_shape=(self.IMG_DIMS['width'],self.IMG_DIMS['height'],self.IMG_DIMS['channels']),activation='relu',padding=CNNModel.PADDING))    
		model.add(MaxPooling2D(pool_size=CNNModel.POOL_SIZE,padding=CNNModel.PADDING))
		model.add(Dropout(0.3))

		#layer 2
		model.add(Convolution2D(filters=CNNModel.OUTPUT_SHAPES[1],kernel_size=CNNModel.KERNEL_SIZE,activation='relu',padding=CNNModel.PADDING))    
		model.add(MaxPooling2D(pool_size=CNNModel.POOL_SIZE,padding=CNNModel.PADDING))
		model.add(Dropout(0.4))

		#layer 3
		model.add(Convolution2D(filters=CNNModel.OUTPUT_SHAPES[2],kernel_size=CNNModel.KERNEL_SIZE,input_shape=(self.IMG_DIMS['width'],self.IMG_DIMS['height'],self.IMG_DIMS['channels']),activation='relu',padding=CNNModel.PADDING))    
		model.add(MaxPooling2D(pool_size=CNNModel.POOL_SIZE,padding=CNNModel.PADDING))
		model.add(Dropout(0.5))

		#layer 4
		model.add(Convolution2D(filters=CNNModel.OUTPUT_SHAPES[3],kernel_size=CNNModel.KERNEL_SIZE,activation='relu',padding=CNNModel.PADDING))    
		model.add(MaxPooling2D(pool_size=CNNModel.POOL_SIZE,padding=CNNModel.PADDING))
		model.add(Dropout(0.6))

		#layer 5
		model.add(Convolution2D(filters=CNNModel.OUTPUT_SHAPES[4],kernel_size=CNNModel.KERNEL_SIZE,activation='relu',padding=CNNModel.PADDING))    
		model.add(MaxPooling2D(pool_size=CNNModel.POOL_SIZE,padding=CNNModel.PADDING))
		model.add(Dropout(0.7))

		#flatten
		model.add(Flatten())

		# fully connected layer 6
		model.add(Dense(units=CNNModel.OUTPUT_SHAPES[5],activation='relu'))

		#fully connected layer 7
		model.add(Dense(units=CNNModel.OUTPUT_SHAPES[6],activation='relu'))		

		#fully connected lyaer 8
		model.add(Dense(units=CNNModel.OUTPUT_SHAPES[7],activation='relu'))	

		#output layer 9
		model.add(Dense(units=self.OUTPUT_DIM,activation='softmax'))

		model.compile(optimizer='adam',loss='categorical_crossentropy',metrics=['accuracy'])

		return model



