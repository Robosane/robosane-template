#!/bin/bash
# Zip the package

rm RobosaneTemplate.zip
zip -r RobosaneTemplate.zip css fonts html img index.html index.php js language less README.md LICENSE.txt templateDetails.xml component.php

packagesize=$(ls -lh RobosaneTemplate.zip)
echo "Created: $packagesize"
