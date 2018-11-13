#
# Cookbook Name:: mysql
# Recipe:: default
#
# Copyright 2015, YOUR_COMPANY_NAME
#
# All rights reserved - Do Not Redistribute
#

#=========================
#  MySQLのインストール
#  sudo yum install -y mysqld
#=========================
%w[mysql mysql-server mysql-devel].each do |pkg|
  package pkg do
    action :install
  end
end
#=========================
#  MySQLの自動起動設定
#=========================
service "mysqld" do
  action [ :enable, :start ]
end

