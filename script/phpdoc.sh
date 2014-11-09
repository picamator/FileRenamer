#!/bin/bash

cd ..

echo "Generate phpdoc"
phpdoc

echo "Create phpdoc archive"
tar -pczf ./doc/phpdoc.tar ./doc/phpdoc/
