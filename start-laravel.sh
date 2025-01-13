#!/bin/bash

# Define the container name
CONTAINER_NAME="app_tier"

# Check if the container is running
if docker ps --filter "name=$CONTAINER_NAME" --filter "status=running" | grep -q "$CONTAINER_NAME"; then
    echo "Starting Laravel server inside the container: $CONTAINER_NAME"
    
    # Execute the Laravel server command in detached mode
    docker exec -d "$CONTAINER_NAME" php artisan serve --host=0.0.0.0 --port=8000

    # Check if the command was successful
    if [ $? -eq 0 ]; then
        echo "Laravel server started successfully at http://localhost:8000"
    else
        echo "Failed to start the Laravel server. Please check the container logs."
    fi
else
    echo "Container $CONTAINER_NAME is not running. Please start the container first."
fi
