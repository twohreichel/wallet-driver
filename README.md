<p style="text-align: center;"><img src="/assets/icons/package.svg" width="200" alt="TWOH Logo"></p>

<p style="text-align: center;">
<img src="/assets/icons/build.svg" alt="Build Status">
<img src="/assets/icons/version.svg" alt="Latest Stable Version">
<img src="/assets/icons/license.svg" alt="License">
<a href="https://github.com/sponsors/twohreichel"><img src="https://img.shields.io/badge/Sponsor-❤-ff69b4?style=flat&logo=github" alt="Sponsor on GitHub"></a>
</p>

### About Wallet-Driver

---

This project includes a basic Driver to interact with different Walletsystems like Apple and Google.

### Support This Project

---

If you find this project helpful and would like to support its development, please consider becoming a sponsor! Your support helps maintain and improve this project.

[![Sponsor](https://img.shields.io/badge/Sponsor-❤-ff69b4?style=for-the-badge&logo=github)](https://github.com/sponsors/twohreichel)

**Why sponsor?**
- 🚀 Help maintain and improve the wallet-driver project
- 🐛 Faster bug fixes and feature implementations
- 📚 Better documentation and examples
- 💡 Priority support for sponsored users

Every contribution, no matter the size, makes a difference!

### Requirements

---

- PHP 8.3 or higher
- Composer

### Installation

---

````shell
composer req twoh/wallet-driver
````

### Usage

---

#### Starting Docker

To start the Docker containers, navigate to the project directory and use the following command:

```shell
docker-compose up -d --build
```

---

#### Docker Containers

| Docker Container Name | Final Container Name                 | Purpose             |
|-----------------------|--------------------------------------|---------------------|
| `php`                 | `wallet_driver_php83_container`     | PHP 8.3 Environment |

---

#### Setup Google Wallet
[Setup Google Wallet](examples/GoogleWallet.php)

---

#### Setup Apple Wallet
[Setup Apple Wallet](examples/AppleWallet.php)

---

#### Running Tests
To verify that the tests are passing, run the following command:

```shell
vendor/bin/phpunit
```

#### Documentation
- [Google Console Wallet](docs/google/wallet-integration.md)
- [Apple Console Wallet](docs/apple/wallet-integration.md)

#### Running Code Insights
To run PHP Insights, use the following command:

##### Apple Wallet
```shell
docker exec -it wallet_driver_php83_container php examples/AppleWallet.php
```

###### Validate PKPass
[PKPass Validator](https://pkpassvalidator.azurewebsites.net)

##### Google Wallet
```shell
docker exec -it wallet_driver_php83_container php examples/GoogleWallet.php
```


###### Generate PHP Documentation
```shell
doxygen Doxyfile
```
###### Open Documentation in Browser
```bash
open docs/html/index.html
```