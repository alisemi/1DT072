#!/bin/bash
set -e   # stop if any step fails instead of carrying on

sudo apt-get update
sudo apt-get install -y docker.io
sudo systemctl enable --now docker
sudo docker run --rm -p 3000:3000 bkimminich/juice-shop