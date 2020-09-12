FROM node:12.16-alpine
WORKDIR /app
RUN npm install -g @vue/cli
COPY package.json /app/
RUN npm install --progress=false

COPY /compose/vue/start /start
RUN sed -i 's/\r//' /start
RUN chmod +x /start
