<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="https://github.com/github_username/repo_name">
    <img src="public/logo_light.svg" alt="Logo" width="160">
  </a>

  <p align="center">
    Built with ❤️

[![forthebadge](https://forthebadge.com/images/badges/built-with-love.svg)](https://forthebadge.com)
[![forthebadge](https://forthebadge.com/images/badges/powered-by-electricity.svg)](https://forthebadge.com)
[![forthebadge](https://forthebadge.com/images/badges/ctrl-c-ctrl-v.svg)](https://forthebadge.com)

</div>

# About The Project

## Code Coverage

[![codecov](https://codecov.io/gh/sahrohit/event-management/branch/main/graph/badge.svg?token=3928e7bf-bae0-4a28-997a-0e548887bdbe)](https://codecov.io/gh/sahrohit/event-management)

![Code Coverage](public/coverage.png)

## Installation

To install Event Maangement (Takshak) locally, follow these steps:

1. Clone the repository from GitHub:

    ```bash
    git clone https://github.com/sahrohit/event-management.git
    cd event-management
    ```

2. Install the required dependencies using Composer:

    ```bash
    composer install
    ```

3. Set up the environment file:

    ```bash
    cp .env.example .env
    ```

4. Create the database and set its credentials in the `.env` file.

5. . Run the migrations and seed the database:

    ```bash
    php artisan migrate --seed
    ```

6. Start the development server:

    ```bash
    php artisan serve
    ```

7. Start Vite development server:

    ```bash
    npm run dev
    ```

## Pages

| Pages         | Description                                                                |
| ------------- | -------------------------------------------------------------------------- |
| /             | Displays all the events in the database                                    |
| /{event_id}   | Display Add Participants Form with Participants Table for a specific event |
| /participants | Display all the participants                                               |

## Built With

<div style="display: flex; flex-wrap: wrap; gap:6px;">
<img src="https://img.icons8.com/color/48/000000/tailwindcss.png" title="TailwindCSS" alt="TailwindCSS" width="50" height="50" />
<img src="https://img.icons8.com/?size=50&id=hUvxmdu7Rloj&format=png" title="Laravel" alt="Laravel" width="50" height="50" />
<img src="https://avatars.githubusercontent.com/u/51960834?s=200&v=4" title="Livewire" alt="Livewire" width="50" height="50" />
<img src="https://pestphp.com/www/assets/logo.svg" title="Pest" alt="Pest" width="100" height="50" />
<img src="https://img.icons8.com/?size=512&id=ldAV1F3sx1VI&format=png" title="SQL Lite" alt="SQL Lite" width="50" height="50" />
</div>

## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## Built by

<a href="https://github.com/sahrohit/event-management/graphs/contributors">
  <img src="https://contrib.rocks/image?repo=sahrohit/event-management&max=2" />
</a>

<!-- LICENSE -->

## License

Distributed under the MIT License. See `LICENSE.txt` for more information.
