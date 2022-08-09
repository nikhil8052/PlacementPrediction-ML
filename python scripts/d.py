import pickle


file=open("D:/xampp_php/htdocs/placement_prediction/python scripts/machine learning model/model.pkl",'rb')
model=pickle.load(file)
ans=model.predict([[]])
