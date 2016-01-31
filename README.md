# simpleblog

**TODO(kriszt)-description**

## Development
> Please red the instructions in order to start contributing to this project

## Front-end
In order to start developing on the front-end side we used some **npm modules**. Basically we setup the environment to live reload pages, to compile our system templates **jade** and **sass** to **html** and **css**. All of this task are automated by one of the javascript task runner called **Grunt**.

#### Environment

**Windows/Mac**
 * Node 
 * Npm  
 * **[download](!https://nodejs.org/en/)**

**Linux**
   - Debian based:
        ```shell
            sudo apt-get install nodejs
        ```
    - ArchLinux:
         ```shell 
            yaourt -S nodejs npm
        ```
         ```shell 
            pacman -S nodejs npm 
        ```
        
If you need **[more info](!https://nodejs.org/en/download/package-manager/)** check here!

Now from the cmd/terminal `cd` into the folder you just downloaded with:
```shell
    git clone https://github.com/kriszt/sblog.git 
```
Now type the following command : 
```shell
    npm install 
``` 
This command creates a folder called **node_modules** in there it  will download all dev-dependencies and install them.
For the final part please install **grunt-cli** tool in order to run the **grunt** commands.

**LINUX/MAC**
```shell 
    sudo npm install -g grunt-cli
```
**Windows**
```text
Just open cmd with administrator privileges.And execute the same command above without sudo.
```

#### Grunt Commands:
```shell
	grunt compile
```


Compiles all the Sass and Jade files. We first concat 
every sass file into one file and after that we compile to css.
All jade files are separate. (ex index.jade --> index.html).
Jade files are compiled to html.
Using this template system we:
- write less clunky markup;
- maintaining is eazy;
- time saver;


```shell
grunt see
```

It does all the things that grunt compile command does  but it reruns automatically for every modification on any  template, js files in assets/ folder



``` 
grunt live
```
Start a http server to live reload all pages in the browser whenever something changes. **NOTE** this dosen't work for livereloading **PHP** files.In order to see the result in the browser please install and use **xampp/apache/nginx** etc.


## Back-end
**TODO(kriszt)**
