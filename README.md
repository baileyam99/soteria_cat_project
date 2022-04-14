
<div id="top"></div>

<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="https://github.com/baileyam99/soteria_cat_project.git">
    <img src="cat_frontend/src/images/logo.png" alt="Logo" width="80" height="80">
  </a>

<h3 align="center">Soteria Case Administration Tool </h3>

  <p align="center">
    CAT is a centralized management console for case administrative documentation. 
    <br />
    <br />
    <a href="https://github.com/baileyam99/soteria_cat_project.git">View Demo (Coming Soon)</a>
  </p>
</div>



<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#roadmap">Roadmap</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#acknowledgments">Acknowledgments</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

The purpose of the Case Administration Tool is to provide Soteria Digital Forensics and Incident Response services with a centralized management console for case administrative documentation. Centralized case management will foster efficient collaboration between team members on projects and automate portions of the reporting process.

<p align="right">(<a href="#top">back to top</a>)</p>



### Built With

* [React.js](https://reactjs.org/)
* [PHP](https://www.php.net)
* [PostgreSQL](https://www.postgresql.org/)
* [Auth0](https://auth0.com)


<p align="right">(<a href="#top">back to top</a>)</p>



<!-- GETTING STARTED -->
## Getting Started

To get a local copy up and running follow these simple example steps.

### Prerequisites

* npm
  ```bash
  npm install npm@latest -g
  ```
 * php 
	```bash
	sudo apt install php7.4-cli
	```

### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/github_username/repo_name.git
   ```
2. Install NPM packages
   ```sh
   npm install
   ```
3. Enter your Auth0 domain and client ID in `[local repository]/cat_frontend/.env`
   ```js
   REACT_APP_AUTH0_DOMAIN='ENTER YOUR DOMAIN'
   REACT_APP_AUTH0_CLIENT_ID='ENTER YOUR CLIENT ID'
   ```

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- USAGE EXAMPLES -->
## Usage

Users can open a new case, list cases, search amongst cases based on specific criteria, and maintain documentation within each case to be utilized in final reporting of results to clients. Each case will incorporate functions for multiple employees to collectively collaborate on evidence records, timelines of related events, case notes, and producing lists of tagged terms to associate with the investigation (for search querying).


<p align="right">(<a href="#top">back to top</a>)</p>



<!-- ROADMAP -->
## Roadmap

- [ ] Administration
	- [ ] Account Privilege Levels
	- [ ]  Credential Set/Reset
	- [ ] Audit Logging
 - [ ] Cases 
	 - [ ] Case Status
	 - [ ] Case Lead
	 - [ ] Opening a new case
	 - [ ] Display a case list
 - [ ] Interacting with a Specific Case
	 - [ ] View case details
	 - [ ] Evidence
		 - [ ] Physical inventory
		 - [ ] Evidence log
	 - [ ] Notes


Coming soon: See the [open issues](https://github.com/github_username/repo_name/issues) for a full list of proposed features (and known issues).

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<p align="right">(<a href="#top">back to top</a>)</p>
