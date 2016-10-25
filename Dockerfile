FROM alpine:latest

RUN apk add --no-cache graphviz php5-cli

CMD ["-S", "0.0.0.0:8000"]

ENTRYPOINT ["/usr/bin/php"]

EXPOSE 8000
