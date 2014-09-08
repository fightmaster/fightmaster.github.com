#!/usr/bin/env bash
echo "deploy blog"
jekyll build
rm -rf _site/deploy.bash
rm -rf _deploy
git clone git@github.com:fightmaster/fightmaster.github.com.git _deploy
cp -R _site/* _deploy/
cd _deploy
git add .
git commit -m "Site updated at $(date +%Y-%m-%d:%H:%M:%S)"
git push origin master
cd ../
echo "End deploy"
