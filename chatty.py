from Levenshtein import ratio
import pandas as pd
data = pd.read_csv('bankdata.csv')

f = open("t1.txt", "r", encoding="utf-8")
query = f.read()
test_data = [query]

def getResults(questions, fn):
    def getResult(q):
        answer = fn(q)
        return [answer]
    df = pd.DataFrame(list(map(getResult, questions)), columns=["A"])
    return df['A'][0]

def getApproximateAnswer2(q):
    max_score = 0
    answer = ""
    prediction = ""
    for idx, row in data.iterrows():
        score = ratio(row["Question"], q)
        if score >= 0.9: 
            return row["Answer"]
        elif score > max_score:
            max_score = score
            answer = row["Answer"]
            prediction = row["Question"]
            ff = open("predict.txt", "w", encoding="utf-8")
            ff.write(prediction)
    if max_score > 0.3:
        return answer
    return "Sorry, I couldn't follow you..." + "Do you mean " + "\" " + prediction + " \"" + " ?"

p=getResults(test_data, getApproximateAnswer2)
f1 = open("t2.txt", "w", encoding="utf-8")
f1.write(p)
print(p)
