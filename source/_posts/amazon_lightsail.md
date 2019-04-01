---
extends: _layouts.post
section: content
title: How to Deploy a Flask application on Amazon Lightsail, using Apache2, WSGI and Flask.
date: 2019-03-29
description: Want to code but not sure how to start? Use this tried-and-true framework to get started — even if programming seems scary.
categories: [software]
cover_image: /assets/img/posts/amazon_lightsail/feature.png
---
<h1>Software</h1>

<h2>Introduction</h2>

<p>Amazon Lightsail is intended for developing quickly and cheaply. In this tutorial I will walk through how to set up an Amazon Lightsail instance with Apache2, WSGI and Flask development stack for deploying a Flask web-application.</p>

<h2>What the Red//make red// Means</h2>

<p>Changes that the user needs to make or customise will be in red in this tutorial! The rest will mostly be copy-and-pastable. (shout out to Digital Ocean //link to digital ocean// for this tutorial format).</p>

<h2>Step One - Create an AWS account</h2>

<p>Head over to https:aws.amazon.com/ and set up an AWS account if you do not already have one, this account will also be used for your Lightsail instances.</p>

<p>Once you have setup your AWS account, log in and head over to there Lightsail //https://aws.amazon.com/lightsail// website. </p>

<h2>Step Two - Create an Ubuntu 16.04 Lightsail Instance</h2>

<p>Click on the 'Create Instance' tab and select 'Linux/Unix' tab, then underneath click 'OS Only' then select 'Ubuntu 16.04 LTS'.</p>
![](/assets/img/posts/amazon_lightsail/create_instance.png "instance")

<p>Choose your Instance plan, for this tutorial we will use the cheapest $3.50 per month plan.</p>
![](/assets/img/posts/amazon_lightsail/choose_plan.png "amazon_lightsail")

<p>Then finally scroll down the page and rename your Instance to 'Flask<em>Lightsail</em>Depoloyment' and click on the 'Create instance' button.</p>
![](/assets/img/posts/amazon_lightsail/instance_name.png "amazon_lightsail")

<p>## Step Three - create static IP to publicly access your Lightsail instance.</p>

<p>Click the 'Home' button and then click on the 'Networking' tab and then click on the 'Create static IP' tab.</p>
![](/assets/img/posts/amazon_lightsail/?.png "amazon_lightsail")

<p>Scroll to the bottom of the page, rename your static IP and click the 'Create' button.</p>
![](/assets/img/posts/amazon_lightsail/create_static_ip.png "amazon_lightsail")

<p>Make a note of your new static IP address and attach it to your Lightsail instance if not done so already (found on the Networking tab and by clicking on the three orange dots on the static IP address box, this will take you to a management screen where you can attach the IP to your Lightsail instance).</p>

<p>## Allow Fire Wall access to public internet traffic.</p>

<p>Click the 'Home' button and then click on the small three orange dots next to wear it says Flask<em>Lightsail</em>Instance. This will open up a dropdown menu. Select 'Manage' from this drop down menu.</p>
![](/assets/img/posts/amazon_lightsail/three_dots.png "amazon_lightsail")

<p>From the management screen you will be able to see your Public and Private Ip addresses, scroll down the page and you will see your Fire Wall section. Set your Fire Wall preferences for testing by inputing the below settings. This will allow all internet traffic to reach your Lightsail instance.</p>
![](/assets/img/posts/amazon_lightsail/firewall_settings.png "amazon_lightsail")

<h2>Step Four - Setting up SSH</h2>

<p>Finally, we will install our development stack by remotely logging onto our Lightsail instance via SSH. To do this we need to download our SSH private keypair.</p>
![](/assets/img/posts/amazon_lightsail/ssh_key_tab.png "amazon_lightsail")

<p>Click the 'Account' Tab at the top of the page. Then click on the 'SSH Keys' tab. If you have not done so already create a new key pair and rename it 'MyKeyPair', then click the download button to download to your local downloads folder.</p>
![](/assets/img/posts/amazon_lightsail/account_tab.png "amazon_lightsail")

<p>After you download the MyKeyPair.pem file, you will want to store your key in a secure location. If you lose your key, you won't be able to access your instance. If someone else gets access to your key, they will be able to access your instance.</p>

<p>Windows users: It is recommend saving your key pair in your user directory in a sub-directory called .ssh (ex. C:\user&#123;yourusername}&#46;ssh\MyKeyPair.pem).</p>

<p>Tip: You can't use Windows Explorer to create a folder with a name that begins with a period unless you also end the folder name with a period. After you enter the name (.ssh.), the final period is removed automatically.</p>

<p>Mac/Linux users: It is recommend saving your key pair in the .ssh sub-directory from your home directory (ex. ~/.ssh/MyKeyPair.pem).</p>

<p>On MacOS, the key pair is downloaded to your Downloads directory by default. To move the key pair into the .ssh sub-directory, enter the following command in a terminal window: mv ~/Downloads/MyKeyPair.pem ~/.ssh/MyKeyPair.pem</p>

<p>Open a terminal window.
Use the chmod command to make sure your private key file is not publicly viewable by entering the following command to restrict permissions to your private SSH key:</p>

<p><code>chmod 400 ~/.ssh/MyKeyPair.pem</code></p>

<p>You do not need to do this every time you connect to you instance, you only need to set this once per SSH key that you have.</p>

<p>In your local terminal, Use SSH to connect to your instance.</p>

<p><code>ssh -i {full path of your .pem file} lightsail-server-name@{instance IP address}</code></p>

<p>Example:
<code>ssh -i ~/.ssh/MyKeyPair.pem ubuntu@ip-127-25-13-2@3.8.237.222</code></p>

<p>You'll see a response similar to the following:</p>

<p><code>The authenticity of host 'lightsail-198-51-100-1.compute-1.amazonaws.com (10.254.142.33)' can't be established. RSA key fingerprint is 1f:51:ae:28:df:63:e9:d8:cf:38:5d:87:. Are you sure you want to continue connecting (yes/no)?</code></p>

<p>Type yes and press enter. You'll see a response similar to the following:</p>

<p><code>Warning: Permanently added
'lightsail-198-51-100-1.compute-1.amazonaws.com' (RSA) to the list of known hosts.</code></p>

<p>You should then see the welcome screen for your instance and you are now connected to your Amazon Lightsail Ubuntu 16.04 virtual machine in the cloud.</p>

<h2>Step Five - Install Apache2</h2>

<p>Update the apt package.</p>

<p><code>sudo apt update</code></p>

<p>upgrade the package.</p>

<p><code>sudo apt upgrade</code></p>

<p>Install the upgrades.</p>

<p><code>sudo apt-get update</code></p>

<p>Update the local language.</p>

<p><code>sudo locale-gen "en_GB.UTF-8"</code></p>

<p>Install the main apache2 files.</p>

<p><code>sudo apt-get install apache2</code></p>

<p>Update apache2 to dev.</p>

<p><code>sudo apt-get install apache2-dev</code></p>

<p>Edit Apache2 configuration file with your server IP address.</p>

<p><code>sudo nano /etc/apache2/apache2.conf</code></p>

<p>Add the following line of text at the bottom of the apache2.conf file and save the file by pressing CTL-X.</p>

<p><code>ServerName &lt;IP address of server&gt;</code>
Example:
<code>ServerName 3.8.237.222</code></p>

<h2>Step Six - Install Python3.7.1</h2>

<p>Update apt install package.</p>

<p><code>sudo apt update</code></p>

<p>Download PPA python package.</p>

<p><code>sudo add-apt-repository ppa:deadsnakes/ppa</code></p>

<p>Update apt package.</p>

<p><code>sudo apt update</code></p>

<p>Install python3.7.1.</p>

<p><code>sudo apt install python3.7</code></p>

<h2>Install WSGI.</h2>

<p>Download WSGI tar file.</p>

<p><code>https://github.com/GrahamDumpleton/mod_wsgi/archive/4.6.4.tar.gz</code></p>

<p>Open up a second Terminal window and use scp to transfer downloaded WSGI tar file from your local machine to your remote Amazon Lightsail instance.</p>

<p><code>scp -i ~/.ssh/MyKeyPair.pem {full path of your mod_wsgi-4.6.4.tar.gz file} {instance IP address}:~</code></p>

<p>Example:</p>

<p><code>scp -i ~/.ssh/MyKeyPair.pem /Users/gavinmarsh/Downloads/mod_wsgi-4.6.4.tar.gz 3.8.237.222:~:~</code></p>

<p>Go back to your terminal window connected to your Lightsail instance then:
Unpact the tar file.
<code>tar xvfz mod_wsgi-4.6.4.tar.gz</code></p>

<p>Remove original tar.</p>

<p><code>rm -r mod_wsgi-4.6.4.tar.gz</code></p>

<p>Move into unpacked WSGI folder.</p>

<p><code>cd mod_wsgi-4.6.4</code></p>

<p>Install Python2.7-dev.</p>

<p><code>sudo apt-get install python2.7-dev</code></p>

<p>Install python-pip (incase you are missing any Python2.7 dev files.</p>

<p><code>sudo apt install python-pip</code></p>

<p>Configure the WSGI file.</p>

<p><code>./configure --with-python3=/usr/bin/python3.5.2 &amp;&amp; make &amp;&amp; sudo make install</code></p>

<p>Create a new apache2 mods WSGI configuration file.</p>

<p><code>sudo nano /etc/apache2/mods-available/mod_wsgi.so.load</code></p>

<p>Add the below text to the file, save and close.</p>

<p><code>LoadModule wsgi_module /usr/lib/apache2/modules/mod_wsgi.so</code></p>

<p>Install Liapache2.</p>

<p><code>sudo apt-get install libapache2-mod-wsgi-py3</code></p>

<p>Restart the apache2 server.</p>

<p><code>sudo /etc/init.d/apache2 restart</code></p>

<h2>Step Seven - Prepare server for new 'Hello World' FlaskApp.</h2>

<p>Deactivate default apache2 website.
<code>sudo a2dissite 000-default.conf</code></p>

<p>Change directory into Apache2, sites-enabled folder.</p>

<p><code>cd /etc/apache2/sites-enabled</code></p>

<p>Remove apache2 default configuration file.</p>

<p><code>rm 000-default.conf</code></p>

<h2>Step Eight - Create a Flask application</h2>

<p>Change directory into Ubuntu's standard Website directory.
<code>cd /var/www</code></p>

<p>Remove apache2 standard html folder.</p>

<p><code>sudo rm -R html</code></p>

<p>Make a new directory call FlaskApp to store your application files.</p>

<p><code>sudo mkdir FlaskApp</code></p>

<p>Change directory into this new folder.</p>

<p><code>cd FlaskApp</code></p>

<p>Make a new diectory called FlaskApp to store your application source code.</p>

<p><code>sudo mkdir FlaskApp</code></p>

<p>Change directory into this new folder.</p>

<p><code>cd FlaskApp</code></p>

<p>Make two new directories one called static and another called templates. </p>

<p><code>sudo mkdir static templates</code></p>

<p>Create a new .py file called <strong>init</strong>.py and open that file.</p>

<p><code>sudo nano __init__.py</code></p>

<p>Enter the following text into the file, save and close.</p>

<p><code>

from flask import Flask
app = Flask(<strong>name</strong>)</p>

<p>@app.route("/")
def hello():
    return "Hello World! from Flask"</p>

<p>if <strong>name</strong> == "<strong>main</strong>":
    app.run()
<code>
</p>

<p><em>Tip: sometimes nano doesn’t recognise the double quote symbol so delete and retype them until the string text turns green.</em></p>

<p>Install Virtualenv.</p>

<p><code>pip3 install virtualenv</code></p>

<p>Create a new python virtual environment called 'venv'</p>

<p><code>sudo virtualenv venv</code></p>

<p>Activate this new environment.</p>

<p><code>source venv/bin/activate</code></p>

<p>Install the Flask framework.</p>

<p><code>sudo pip3 install Flask</code></p>

<p>Create a new apache2 configuration file called FlaskApp.conf.</p>

<p><code>sudo nano /etc/apache2/sites-available/FlaskApp.conf</code></p>

<p>Enter the below text into the file then save and close.</p>
    Listen 80
    <VirtualHost \*:80>
        ServerName 3.8.237.222
        ServerAdmin admin@mywebsite.com
        WSGIScriptAlias / /var/www/FlaskApp/flaskapp.wsgi
        <Directory /var/www/FlaskApp/FlaskApp/>
            Order allow,deny
            Allow from all
        </Directory>
        Alias /static /var/www/FlaskApp/FlaskApp/static
        <Directory /var/www/FlaskApp/FlaskApp/static/>
            Order allow,deny
            Allow from all
            </Directory>
        ErrorLog ${APACHE_LOG_DIR}/error.log
        LogLevel info
        CustomLog ${APACHE_LOG_DIR}/access.log combined
    </VirtualHost>

<p>Enable your new FlaskApp configuration.</p>

<p><code>sudo a2ensite FlaskApp</code></p>

<p>Change directory into FlaskApp parent directory.</p>

<p><code>cd /var/www/FlaskApp</code></p>

<p>Create a new wsgi file called flaskapp.wsgi.</p>

<p><code>sudo nano flaskapp.wsgi</code></p>

<p>Enter the below text into the file, save and close.</p>

</p>

    !/usr/bin/python</h1>

    import sys
    import logging
    logging.basicConfig(stream=sys.stderr)
    sys.path.insert(0,"/var/www/FlaskApp/")

    from FlaskApp import app as application
    application.secret_key = 'Add your secret key'
</p>

<p>Restart the Apache2 server.</p>

<p><code>sudo /etc/init.d/apache2 restart</code></p>

<h2>Check everything is running correctly</h2>

<p>Use curl to print website to terminal</p>

<p><code>curl 3.8.237.222/</code></p>

<p>You should see an output of "Hello World! from Flask" in your terminal window.</p>

<p>If not you can trouble shoot buy printing apache2's error logs to your terminal window using the tail command.</p>

<p><code>sudo tail -10 /var/log/apache2/error.log</code></p>

<p>Finally, open up a new browser window and enter your public Lightsail IP address.</p>

<p><code>http://3.8.237.222/</code></p>

<p>If all has gone well, you should see "Hello World! from Flask" in your browser window.</p>

<h2>Summary</h2>

<p>I had always not bothered looking at AWS for my MVP (minimum viable product) development work as I found it too expensive. Amazons Lightsail offering however is very cheap to set up just $3.5 per month for there cheapest instance (VPS) and it is ideal for quick prototyping work as it has a feature called 'Snapshot' which allows you to take a snapshot of your server image and then transfer it across with just a few clicks to a larger AWS EC2 server set up for future horizontal and vertical scaling if the project grows or moves to production, this feature was what prompted me to move my python Flask deployments across to Amazon.</p>
