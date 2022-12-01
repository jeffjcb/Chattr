FROM python:3.9-slim

WORKDIR /app

RUN pip install --upgrade pip

RUN pip install flake8==3.9.2

COPY . /app

RUN flake8 --ignore=E501,F401 .

COPY requirements.txt /app

RUN pip install -r requirements.txt
# RUN pip wheel --no-cache-dir --no-deps --wheel-dir /usr/src/app/wheels -r requirements.txt

# ENV HOME=/home/app

# ENV APP_HOME=/home/app/django

# RUN mkdir $APP_HOME

# RUN mkdir $APP_HOME/staticfiles

# WORKDIR $APP_HOME