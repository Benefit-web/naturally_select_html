#
# Cookbook Name:: php
# Recipe:: default
#
# Copyright 2015, YOUR_COMPANY_NAME
#
# All rights reserved - Do Not Redistribute
#

#==========================
# PHP + 関連モジュールのインストール
#==========================
%w[php php-odbc php-xml php-cli php-devel php-gd php-pgsql php-common php-mbstring php-pdo php-pear php-pecl-apc php-pecl-xdebug].each { |name|
  package name  do
    package_name name
    action :install
  end
}
