import numpy as np
import pandas as pd 
import os.path	
from shutil import copy

def categorise_data():
	data=[]
	labels=[]

	PAR_DIR_PATH=os.path.abspath(os.path.join('./',os.pardir))
	CSV_PATH=PAR_DIR_PATH+'/previous_model/trainLabels.csv';
	TRAIN_PATH=PAR_DIR_PATH+'/previous_model/train';
	DATASET_PATH=PAR_DIR_PATH+'/inception_model/tf_files/dataset'

	data_lables_csv=pd.read_csv(CSV_PATH)
	headers=data_lables_csv.columns

	img_names=np.array(data_lables_csv[headers[0]])
	img_labels=np.array(data_lables_csv[headers[1]])

	for i,img_name in enumerate(img_names):

		src=TRAIN_PATH+'/'+img_name+'.jpeg'
		label=img_labels[i]

		if label==0:
			des=DATASET_PATH+'/0-No_DR/'
		elif label==1:
			des=DATASET_PATH+'/1-Mild/'
		elif label==2:
			des=DATASET_PATH+'/2-Moderate/'
		elif label==3:
			des=DATASET_PATH+'/3-Severe/'
		elif label==4:
			des=DATASET_PATH+'/4-Proliferative_DR/'

		print 'copying '+src+' to '+des
		copy(src,des)


if __name__=='__main__':

	categorise_data()
