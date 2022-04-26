#!/usr/bin/env bash
rsync -avz ./Dockerfile root@137.184.144.59:/var/www/backend/ci_cd_laravel_codeship
docker-compose up --build