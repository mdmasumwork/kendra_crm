# CRM Project

## Overview
This CRM (Customer Relationship Management) project is designed to manage and track client interactions and activities. It features a robust system for handling client details and their associated activities such as meetings, calls, and emails.

## Features
- **Client Management**: Add, view, update, and delete client information.
- **Activity Tracking**: Log and manage activities associated with each client.
- **Responsive Design**: Accessible on various devices, providing a consistent user experience.

## Technologies Used
- PHP: Server-side scripting
- MySQL: Database management
- JavaScript: Client-side scripting
- HTML/CSS: Front-end layout and design, implementing scss
- Bootstrap: Styling and responsive design

## Installation
1. **Clone the Repository**: `git clone <repository-url>`
2. **Database Setup**:
    - Create a database named `crm_db`.
    - Import the provided `crm_db.sql` file (in root directory) to set up the required tables.
3. **Configure Environment**:
    - Create a file named '.env' copying the .env.sample, then set up your database connection details in `.env` file.
4. **Dependencies**:
    - Run `composer install` to install PHP dependencies.

## Usage
- Navigate to the root URL of the project to access the client list.
- Use the navigation bar or links to access different sections of the CRM.

## API Endpoints
- `POST /api/client/create`: Create a new client.
- `PUT /api/client/update`: Update an existing client.
- `DELETE /api/client/delete`: Delete a client.
- `POST api/activity/create`: Create a new Activity
- `PUT api/activity/update`: Update an existing activity
- `DELETE api/activity/delete`: Delete an activity

## Contributing
Contributions to this project are welcome. Please follow these steps:
1. Fork the repository.
2. Create a new branch: `git checkout -b feature-branch-name`.
3. Make your changes and commit them: `git commit -m 'Commit message'`
4. Push to the original branch: `git push origin feature-branch-name`
5. Create the pull request.

Alternatively, see the GitHub documentation on [creating a pull request](https://help.github.com/articles/creating-a-pull-request/).

## License
This project is licensed under the [MIT License](LICENSE).

## Contact
For any queries or feedback, please contact [Your Name or Project Contact Information].
