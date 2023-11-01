ARG NGINX_VERSION=${NGINX_VERSION}
FROM nginx:${NGINX_VERSION}-alpine

COPY nginx.conf /etc/nginx/

RUN apk update && apk upgrade && \
    apk --update add logrotate openssl bash && \
    apk add --no-cache certbot certbot-nginx

RUN rm -rf /etc/nginx/conf.d/default.conf

RUN mkdir -p /var/www && \
    chown -R nginx:nginx /var/www && \
    chmod 755 -R /var/www

RUN mkdir -p /etc/nginx/sites-available /etc/nginx/conf.d && \
    chown -R nginx:nginx /etc/nginx/sites-available /etc/nginx/conf.d

WORKDIR /etc/nginx

RUN apk del --no-cache

CMD ["nginx", "-g", "daemon off;"]