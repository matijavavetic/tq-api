.PHONY: dev-up

dev-up:
	docker-compose build
	docker-compose up -d
	docker run -it -p 8080:8080 --rm --name sw-ui sw-ui

dev-server:
	docker run -it -p 8080:8080 --rm --name sw-ui sw-ui