# e-shop

e-shop is an e-commerce web application that sells goods online. Buyers have to create an account to buy products with e-shop. This application has major features such as user authentication with social media accounts such as GitHub, Linkedin, and Pinterest; User Authorization with different roles such as Admin, Author, and user; Goods online payment with methods such as Paypal and Stripe. Customer newsletter subscription with MailChimp. This application has an Administrator dashboard through which all applications' resources are managed; Products Dashboard where only the administrator or author can manage products (create, edit or delete products); Users Dashboard where only the administrator can manage users(delete users, assign roles to users).

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

What things you need to install the software and how to install them:

1. Composer
Download link:
<p align="left"><a href="https://getcomposer.org/download/" >Download Composer</a></p>
2. Git
Download link:
<p align="left"><a href="https://git-scm.com/downloads" >Download Git</a></p>

3. Node.js
<p align="left"><a href="https://nodejs.org/en/download/" >Download Node.js</a></p>

4. Localhost server
 <p> You can get localhost server of your choice in Bitnami. </p>

5. Text editor (example. Visual studio code)
<p align="left"><a href="https://code.visualstudio.com/download" >Download Visual Studio Code</a></p>

6. Git Desktop 
<p align="left"><a href="https://desktop.github.com/" >Download Git Desktop For windows or mac Os</a></p>
<p align="left"><a href="https://aur.archlinux.org/packages/github-desktop/" >Download Git Desktop For Linux</a></p>



### Installing

A step by step series of examples that tell you how to get a development env running

1. Install Your local serve. Find the local server installation procedure for your operating system.

2. Install visual studio Code in your operating system.

3. Install git Desktop.
 Git will request for your GitHub credentials. Signin to your GitHub account with the GitHub desktop.  
4. Install Composer and set command-line php.
 
```
for example in windows the path for your command-line php will be
Installation Directory/php/php.exe
where installation Directory will be the path to where local server is installed.
for example
C:\Bitnami\wampstack-7.4.9-0/php/php.exe
```
5. Install Git and also install the Git Bash.

6. Install Node.js

7. Downloading/cloning the project Files from GitHub.
 <ol type="I">
  <li> Open Your Git Desktop.</li>
  <li> At the top left of Git Desktop Click The File Option 
  on the Toolbar and select the clone repository from the dropdown menu to launch the clone
  repository dialog pop-up.</li>
  <li> Select Url Option. </li>
 
  ```
  enter the repository url as
  https://github.com/JohnyIrush/e-shop.git
  then set the local path as 
  Installation Directory/framewoks/ 
  ```
  <li>Click clone and wait for the cloning process to finish</li>
  <li>Click Open in Visual Studio Code Option under Open the repository in your external editor.</li>
 </ol>
8. Set up the Project in Visual Studio code
 <ol type="I">
 <li>Set bash as the default shell. Click terminal at the main toolbar, then select new terminal from  the dropdown menu.</li>
 <li>Select bash as default shell. At the top left of the new terminal window just before the big  Plus sign click the down arrow. click select default shell to launch the installed shells list pop  up. At the top click select Git Bash.</li>
 </ol>
9. Install the Project Composer packages and Nodejs packages
<ol type="I">
In your shell Run the following commands
<li>Composer packages: composer install </li>
<li>Nodejs packages: npm install</li>
</ol>
10. Set The application Database
 <ol type="I">
  <li>Create a database </li>
  <li>Create a file called .env and copy all the contents of .env.example into the .env file</li>
  <li>Enter the Database credentials  </li>
 </ol>
 11. Genarate Application key.
  in your shell run 
  php artisan key:generate


## Running the application
Run the following command to launch e-shop

```
php artisan serve
```

## Deployment



## Built With

* [Laravel](https://laravel.com/docs/7.x/installation) - The web framework used
* [npm](https://www.npmjs.com/) - Dependency Management
* [ROME](https://rometools.github.io/rome/) - Used to generate RSS Feeds

## Contributing


## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/your/project/tags). 

## Authors

* **John Irungu ** - *Initial work* 

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments



