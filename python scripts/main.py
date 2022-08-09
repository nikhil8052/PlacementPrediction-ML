
from statistics import mode
from flask import Flask
from flask import request
import json
import pickle


app = Flask(__name__)


def getPredictionResult(secondary,college,seniorSecondary):
    file=open("D:/xampp_php/htdocs/placement_prediction/python scripts/machine learning model/model.pkl",'rb')
    model=pickle.load(file)
    ans=model.predict([[int(secondary),int(seniorSecondary),int(college)]])
    return json.dumps(ans,indent=4, default=str )
 
@app.route('/predict', methods=['POST'])
def prediction():

    data=request.get_json(force=True)
    secondary=data['secondary']
    college=data['college']
    seniorSecondary=data['seniorSecondary']
    return getPredictionResult(secondary,college,seniorSecondary)


if __name__ == '__main__':
    app.run()
