# onOffice-api-tester
test-suite for onOffice API

**Table of Contents**
* [Requirements](#requirements)
* [Installation](#installation)
* [ooapi.ini](#ooapiini)
* [GUI](#gui)

# Requirements
* PHP >= 7.2
* Linux / OSX

# Installation
```bash
$ git clone
$ composer install #dev-mode
$ composer install --no-dev #op-mode
```

# ooapi.ini

To avoid unnecessary code configuration, this library provides a configuration file.
 
In the `config/ooapi.ini` the onOffice-API-URL configured.

## GUI

This library comes with a basic user interface where custom JSON data
can be entered.

Just call `public/index.html` in the browser.
