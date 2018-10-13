# -*- mode: ruby -*-
# vi: set ft=ruby :

# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
Vagrant.configure("2") do |config|
  config.hostmanager.enabled = true
  config.hostmanager.manage_host = true
  config.vm.box_check_update = false
  config.vm.box = "godeng_2.box"
  config.vm.hostname = "dev.godeng"
  config.vm.network "private_network", ip: "192.168.56.107", :mac => "A8002778BC6C"

  if ENV['IS_PORT_FORWARDED']
      config.vm.network :forwarded_port, guest: 80, host: 80
      config.vm.network :forwarded_port, guest: 5432, host: 5342
  end

    config.vm.provider "virtualbox" do |vb|
      vb.customize ["modifyvm", :id, "--memory", "3072"]
    end


    if Vagrant::Util::Platform.windows?
      config.vm.synced_folder ".", "/vagrant", create: true
    else
      config.vm.synced_folder ".", "/vagrant", type: "nfs", nfs_udp: false, mount_options: ['rw', 'vers=3', 'fsc', 'tcp', 'actimeo=2', 'noatime', 'rsize=32768', 'wsize=32768']
    end

end
