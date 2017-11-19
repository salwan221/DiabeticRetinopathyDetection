import numpy as np
import pandas as pd 
import os
import cv2

from skimage import io, transform

from sklearn.metrics import confusion_matrix
from sklearn.metrics import accuracy_score
from sklearn.metrics import precision_score
from sklearn.metrics import recall_score
from sklearn.metrics import f1_score


class DRPredictor:

	DATA_PATH='train'
	DATA_LABELS_PATH='trainLabels.csv'
	TEST_DATA_FRACTION=0.2
	EPOCHS=30
																																																												
	IMG_WIDTH=256
	IMG_HEIGHT=256
	N_CHANNELS=1

	def __init__(self):

		self.IMG_DIMS={"width":DRPredictor.IMG_WIDTH,"height":DRPredictor.IMG_HEIGHT,"channels":DRPredictor.N_CHANNELS}
		self.OUTPUT_DIM=5

	#returns the image after processing 
	def transform_img(self,img_path):

		img = cv2.imread(img_path)
		img = cv2.cvtColor(img,cv2.COLOR_BGR2GRAY)
		return transform.resize(img,(DRPredictor.IMG_WIDTH,DRPredictor.IMG_HEIGHT,DRPredictor.N_CHANNELS))


	def load_data(self):

		data=[]
		labels=[]

		data_lables_csv=pd.read_csv(DRPredictor.DATA_LABELS_PATH)
		headers=data_lables_csv.columns
		img_names=np.array(data_lables_csv[headers[0]])
		img_labels=np.array(data_lables_csv[headers[1]])

		for img_label in img_labels:
			label=[0,0,0,0,0]
			label[img_label]=1
			labels.append(label)

		for img_name in img_names:
			img_path='{}.jpeg'.format(os.path.join(DRPredictor.DATA_PATH,img_name))
			try:
				print "processing : ",img_path
				data.append(self.transform_img(img_path))
			except:
				print 'error reading : {}'.format(img_path)

		return np.array(data),np.array(labels)

	def train_test_split(self,data,labels):

		from sklearn.model_selection import train_test_split
		train_data, test_data, train_labels, test_labels = train_test_split(data, labels, test_size = DRPredictor.TEST_DATA_FRACTION)

		return train_data,test_data,train_labels,test_labels

	def find_metrics(self,test_labels,preds):

		cm = confusion_matrix(test_labels, preds,labels=[0,1,2,3,4])
		accuracy=accuracy_score(test_labels,preds)
		precision=precision_score(test_labels,preds,labels=[0,1,2,3,4],average='macro')
		recall=recall_score(test_labels,preds,labels=[0,1,2,3,4],average='macro')
		f1=f1_score(test_labels,preds,labels=[0,1,2,3,4],average='macro')

		print 'confusion_matrix : ',cm
		print 'accuracy_score : ',accuracy
		print 'precision_score : ',precision
		print 'recall_score : ',recall
		print 'f1_score : ',f1

	def train_test_model(self):

		data,labels=self.load_data()

		train_data,test_data,train_labels,test_labels=self.train_test_split(data,labels)
		#training model
		from model1 import CNNModel
		cnnmodel=CNNModel(self.IMG_DIMS,self.OUTPUT_DIM)
		model=cnnmodel.get_model()

		idx = np.random.permutation(train_data.shape[0])        
		model.fit(train_data[idx], train_labels[idx],verbose=2, epochs=DRPredictor.EPOCHS)

		#testing model
		preds=np.argmax(model.predict(test_data),axis=1)
		test_labels=np.argmax(test_labels,axis=1)

		print 'predicted : ',preds
		print 'actual : ',test_labels

		#metrics
		self.find_metrics(test_labels,preds)


if __name__=='__main__':

	drp=DRPredictor()

	drp.train_test_model()













