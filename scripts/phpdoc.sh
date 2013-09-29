#!/bin/bash

cd ..

echo "Generate phpdoc"
phpdoc

echo "Create phpdoc archive"
tar -pczf ./docs/phpdoc.tar ./docs/phpdoc/
