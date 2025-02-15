# ベースイメージにPHP8.3-Apacheを使用
FROM php:8.3-apache

# マルチステージビルドでComposerをインストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# PHP拡張モジュールのインストール
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libonig-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-install pdo pdo_mysql intl

# Apacheのmod_rewriteを有効化
RUN a2enmod rewrite

# アプリケーションコードをコンテナにコピー
COPY ./src /var/www/html/

# Composerで開発用の依存関係もインストール
RUN composer install --prefer-dist --optimize-autoloader --working-dir=/var/www/html

# writableディレクトリに書き込み権限を付与
RUN chown -R www-data:www-data /var/www/html/writable && chmod -R 775 /var/www/html/writable

# ApacheのDocumentRootをCodeIgniterのpublicディレクトリに変更
RUN sed -i 's|/var/www/html|/var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# PHPの設定ファイルをコピー
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

# Apacheが使用するポート80を公開
EXPOSE 80

# Apacheの起動
CMD ["apache2-foreground"]