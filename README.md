# Development Server devbox

## Environment setup
- Create repository in github
- Download the `Vagrantfile` using curl into the new repository directory locally.

    ```
    curl -sS https://raw.githubusercontent.com/cyiwork/server-dev/master/Vagrantfile -o Vagrantfile
    ```

- Configure your SSH to work with github -
    [https://help.github.com/articles/generating-an-ssh-key/](https://help.github.com/articles/generating-an-ssh-key/)

- Update '/etc/hosts' file

    ```
    echo 192.168.59.76   testbox.dev www.testbox.dev | sudo tee -a /etc/hosts
    ```

## Provisioning Environment

- 'vagrant up' to start provisioning the environment

### Software to serve the web page

- Install LEMP stack
- Add index.php to validate devbox is working
