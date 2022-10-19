FROM python:3.9

COPY . /app

RUN pip install -r requirements.txt

CMD ["python", "./app.py"]
