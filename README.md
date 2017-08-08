# Phlex project template
## Installation
1. Create the project:
```
composer create-project laborci/phlex-project **MyAwesome** --stability dev
cd MyAwesome
```
2. Install dependencies:
```
npm insall
bower install
```
3. Build frontend components:

```
npm run build
```
4. Create your mysql database for the project!

5. Configure the environment:
```
./phlex px:configure
```
This will create two files in the **config** folder and a *.htaccess* into the **public** folder. Include the *config/local.conf* into your apache's httpd.conf!

6. Initialize the application:
```
./phlex app:init
```
This command creates a user table into your database, and adds a user to it. (login: **elvis@presley.com**, password: **vegas**)

7. Test http://www.yourawesome.com and http://admin.youravesome.com in your browser!

Read the documentation at https://github.com/laborci/phlex/wiki
