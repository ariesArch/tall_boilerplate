# #!/bin/bash
# if [ -z "$APP_ENV" ]; then
#     echo "APP_ENV is not set. Please set the APP_ENV environment variable."
#     # exit 1
# fi

# if [ "$APP_ENV" = "dev" ]; then
#     ENV_FILE=".env.dev"
# fi

# if [ ! -f ".env" ]; then
#     echo "Creating env file for env $APP_ENV"
#     cp "$ENV_FILE"  .env
# else
#     echo "env file exists."
# fi
npm install
npm run build
php artisan migrate
php artisan optimize:clear
php artisan view:cache