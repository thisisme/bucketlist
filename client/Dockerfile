FROM node:11.5-alpine

RUN mkdir -p /usr/src/client

WORKDIR /usr/src/client

RUN yarn global add @vue/cli -g
RUN yarn global add @api-platform/client-generator

# Prevent the reinstallation of node modules at every changes in the source code
#COPY package.json yarn.lock ./
COPY package.json ./
RUN yarn install

COPY . ./

EXPOSE 8080

CMD ["yarn", "run", "serve"]
