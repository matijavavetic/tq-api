.PHONY: setup dev-server api-ssh

setup:
	docker-compose build
	docker-compose up -d
	docker run -it -p 8080:8080 --rm --name sw-ui sw-ui

dev-server:
	docker run -it -p 8080:8080 --rm --name sw-ui sw-ui

api-ssh:
	docker container exec -it tq-api_sw-api_1 sh