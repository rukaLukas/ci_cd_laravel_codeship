#!/usr/bin/env bash
# Generate codeship_deploy_key and codeship_deploy_key.pub, configured to not require passphrase
docker run -it --rm -v $(pwd):/keys/ codeship/ssh-helper generate "lukas.figueiredo@hotmail.com"

# Store codeship_deploy_key as a one line entry in codeship.env file under `PRIVATE_SSH_KEY`
docker run -it --rm -v $(pwd):/keys/ codeship/ssh-helper prepare

# Remove original private key file
rm codeship_deploy_key

# Encrypt file
jet encrypt codeship.env codeship.env.encrypted

# Ensure that `.gitignore` includes all sensitive files/directories
docker run -it --rm -v $(pwd):/app -w /app ubuntu:16.04 \
/bin/bash -c 'echo -e "codeship.aes\ncodeship_deploy_key\ncodeship_deploy_key.pub\ncodeship.env\n.ssh" >> .gitignore'
