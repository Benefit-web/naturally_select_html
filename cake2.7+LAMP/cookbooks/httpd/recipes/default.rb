#
# Cookbook Name:: httpd
# Recipe:: default
#
# Copyright 2015, YOUR_COMPANY_NAME
#
# All rights reserved - Do Not Redistribute
#

#=======================
# Apacheのインストール
# sudo yum install -y httpd
#=======================
package "httpd" do
    action :install
end

#=======================
# Apacheの自動起動設定
#=======================
service "httpd" do
  service_name "httpd"
  enabled
  running
  supports :restart => true ,:reload=>true ,:start=>true,:stop=>true
  action [ :enable, :start ]
end




