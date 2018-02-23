# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|
  config.vm.box = "ubuntu/xenial64"

  config.vm.network "forwarded_port", guest: 80, host: 8080
  config.vm.network "forwarded_port", guest: 3306, host: 3306
  config.vm.synced_folder ".", "/var/www/html"
  config.vm.provider "virtualbox" do |vb|
    vb.name = "Cron_Dashboard"
  end

  config.vm.provision "shell", path: "script/install-lamp.sh"
end
