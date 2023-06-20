# Project Name

## Description

This project utilizes the eWeLink API to toggle the status of a device.

## Installation

1. Install Node.js by downloading it from [here](https://nodejs.org).
2. Open your command prompt, shell, or terminal and navigate to the project folder.
3. Run the following command to install the `ewelink-api` package:

## Setup

1. Download the `ewelink-api-node-js-html.php` file and place it in your project folder.
2. Install and run a WAMP server to host the `ewelink-api-node-js-html.php` file.

## Configuration

1. Open the `ewelink-api-node-js-html.php` file and enter your eWeLink account username, password, and region (usually "us").
2. Save the file.

## Usage

1. Ensure that your WAMP server is running and hosting the `ewelink-api-node-js-html.php` file.
2. Open the project in your web browser.
3. Click the "Get Device Info" button and wait for the response.
4. Find the device ID in the response text for a device with the status "online: true".
5. Enter the device ID into the "DEVICE ID" input field.
6. Click the "Toggle On/Off" button.
7. The relay status will be toggled, and the response will be displayed on your screen as "OK".
