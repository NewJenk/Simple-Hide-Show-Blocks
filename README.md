# Simple Hide/Show Blocks for WordPress

![License: GPL v3 or later](https://img.shields.io/badge/License-GPLv3%20or%20later-blue.svg?style=flat-square)
![Requires PHP: >= 7.4](https://img.shields.io/badge/PHP-%3E%3D%207.4-blue.svg?style=flat-square)
![WordPress Tested: 6.8.1](https://img.shields.io/badge/WordPress-tested%20up%20to%206.8.1-brightgreen.svg?style=flat-square)
![GitHub issues](https://img.shields.io/github/issues/NewJenk/Simple-Hide-Show-Blocks?style=flat-square)
![GitHub stars](https://img.shields.io/github/stars/NewJenk/Simple-Hide-Show-Blocks?style=flat-square)

A WordPress plugin that allows you to run simple A/B tests by choosing to display one of two blocks ('Block A' or 'Block B') or hiding both.

---

## Overview

This plugin provides a straightforward way to control the visibility of content blocks on your website. It's ideal for simple A/B testing, gradually rolling out new content or preparing content in the background.

The core functionality is managed through a simple settings page where you can select whether to show Block A, Block B, or neither. The plugin is designed to be lean and performant, using core WordPress functions without any unnecessary libraries, pop-ups or other admin interface clutter. It feels like it's baked right into WordPress.

This was used in production on [onform.net](https://onform.net) to great effect when testing pricing variations.

## How to Use

1.  Install and activate the plugin.
2.  Add the 'SHSB Block A' and 'SHSB Block B' blocks to your posts or pages and populate them with your desired content.
3.  Navigate to the **Simple Hide/Show Blocks** settings page (Settings > Hide/Show Blocks) in your WordPress admin menu.
4.  Select whether to display 'Block A', 'Block B', or 'None'.
5.  Save your changes. **Important:** Remember to clear any server-side caches for the change to take effect on the front end of your site.

## Features

* **Simple A/B Testing:** Easily switch between two content variations to see which performs better.
* **Custom Blocks Included:** Adds two blocks to the editor: `SHSB Block A` and `SHSB Block B`.
* **Easy Content Migration:** Includes block transforms so you can effortlessly switch your content between Block A and Block B.
* **Full Alignment Support:** Supports all standard block editor alignment options (wide, full width, etc.).
* **Content Toggle:** Choose to display Block A, Block B, or hide both. Hiding both is useful when you're setting up content or when testing is complete.
* **Lightweight & Performant:** Uses core WordPress for everything. No gunk, no annoying pop-ups or third-party dependencies.
* **Clean Uninstall:** When the plugin is deactivated, the options value it stores is deleted from the database.
* **Contribute:** Got an idea for a new feature? [Add it to the GitHub issues](https://github.com/NewJenk/Simple-Hide-Show-Blocks/issues).

## Requirements

* **WordPress:** Version 5.8 or higher (Tested up to **6.8.1**)
* **PHP:** Version 7.4 or higher

## Installation

**1. GitHub Download (ZIP):**

* Go to the [Releases page](https://github.com/NewJenk/Simple-Hide-Show-Blocks/releases) of this repository.
* Download the latest `simple-hide-show-blocks.zip` file.
* In your WordPress admin dashboard, navigate to `Plugins` > `Add New` > `Upload Plugin`.
* Choose the downloaded ZIP file and click `Install Now`.
* Activate the plugin.

**2. Manual Upload (FTP/SFTP):**

* Go to the [Releases page](https://github.com/NewJenk/Simple-Hide-Show-Blocks/releases) of this repository.
* Download the latest `simple-hide-show-blocks.zip` file and extract it.
* Upload the entire `simple-hide-show-blocks` folder to your WordPress `wp-content/plugins/` directory.
* In your WordPress admin dashboard, navigate to `Plugins` > `Installed Plugins`.
* Find "Simple Hide/Show Blocks" and click `Activate`.