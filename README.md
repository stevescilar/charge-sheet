# CT-Pro (Charge Sheet Tracker)

## Abstract

This project is a web-based Contract Tracker application built using the Laravel framework. The application is designed to capture and manage daily working hours and earnings for contractors charging by the hour. Key features include the ability to record start and end times for each workday, automatically calculate earnings after deducting a lunch break, and prevent duplicate entries for the same date. The interface, enhanced with Bootstrap for a modern look and feel, consolidates the form for adding new entries and the list of existing entries on a single page for ease of use. Additional validation ensures that entries cannot be made for weekends or future dates, thus maintaining the integrity of the data. The application also displays a summary of daily and monthly earnings, providing contractors with a clear and organized overview of their work and income.

## Features

* Create new entries with a date, start time, and end time
* Calculate earnings based on hourly rates
* Display daily and monthly earnings
* Restrict future dates and weekends for new entries
* Disable past dates before the start of the project

## Installation

1. Clone the repository
2. Run `composer install`
3. Set up the database connection in the `.env` file
4. Run `php artisan migrate`
5. Run `php artisan serve`

## Usage

1. Visit the application in your browser
2. Click on "Add New Entry"
3. Enter the date, start time, and end time
4. Click on "Add Entry"
5. View the daily and monthly earnings on the home page

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License

[MIT](https://choosealicense.com/licenses/mit/)

## Code Sprint [![wakatime](https://wakatime.com/badge/user/563ecbb7-89c4-4563-82c1-258e14191d74/project/e528acbd-96b5-44a4-9ff4-83c2949ce413.svg)](https://wakatime.com/badge/user/563ecbb7-89c4-4563-82c1-258e14191d74/project/e528acbd-96b5-44a4-9ff4-83c2949ce413)
