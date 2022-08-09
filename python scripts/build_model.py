import numpy as np 
import pandas as pd 
from sklearn.model_selection import train_test_split 
from sklearn.linear_model import LogisticRegression
from sklearn.metrics import accuracy_score 
import pickle

df=pd.read_json("./clean_student_placement.json")

x=df[['10th %','12th %','Degree %']]
y=df['status']


x_train,x_test,y_train,y_test=train_test_split(x,y,test_size=0.1)

clf=LogisticRegression()
clf.fit(x_train,y_train)
y_predict=clf.predict(x_test)
accuracy=accuracy_score(y_test,y_predict)
pickle.dump(clf,open("model.pkl",'wb'))
print(accuracy)
