.PHONY: build run

build:
	docker build -t graphviz .

run:
	docker run -it --rm -p 8000:8000 -v $(PWD):/www -w /www --name graphviz graphviz
