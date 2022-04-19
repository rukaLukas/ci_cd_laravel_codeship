# Generate codeship_deploy_key and codeship_deploy_key.pub, configured to not require passphrase
docker run -it --rm -v $(pwd):/keys/ codeship/ssh-helper generate "lukas.figueiredo@hotmail.com"
