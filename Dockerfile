FROM ubuntu:latest

COPY . /app

RUN sudo apt-get update


RUN pip install -r requirements.txt

CMD ["python", "./app.py"]
