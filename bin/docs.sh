#!/usr/bin/env bash

set -e
DIR=$(cd `dirname $0` && pwd)

redoc-cli serve \
  "${DIR}/../openapi.yaml" \
  --port=8080 \
  --watch \
  --options.requiredPropsFirst=1
