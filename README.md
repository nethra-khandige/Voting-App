# Voting-App:
Creating a voting app using MySQL, PHP, HTML, and CSS involves combining server-side scripting (PHP), a database management system (MySQL), and front-end development (HTML and CSS).

# Database-Design:
- Create tables to store admin, candidate, party, election and voter information.
- Create further tables to store election polls and region of hosting.
- The databse file has been provided with the code.

# Server-Side Scripting:
- Develop php scripts on server side logic.
- Connect to mysql database to retrieve, update and insert into database.
- Create functions, triggers and procedures to manage user authentication, poll creation, and vote submission.

# Front-End Development:
- Design the user interface using HTML to structure the content.
- Apply CSS for styling and layout to enhance the user experience.
- Application of bootstrap is recommended to further improve UI/UX of web page.
- Utilize HTML forms for login and user input, such as creating new polls and submitting votes.
- Implement dynamic content loading using PHP to display poll options and results.

# Authentication:
- There are 3 authorizations in the app, admin login, candidate login and voter login.
- Admin login is available only for the main administrator or the one in chage of the entire election.
- Candidate login is for party leaders who want to assign their candidates to a respective constituency.
- Voter login is implemented for citizens who vote for their desired party.

# Functionalities:
## Admin:
- The administrator and the core of hosting the election.
- The admin can choose to host a state election or a national election and provide access for specific party leader to assigne their candidates to respective candidates.
- Upon closing the election the results of the closed election can be observed by the admin.
- The admin also has the power to undesired party, candidate or the voter from the election.

## Candidate(Party leader):
- The party leader can assign his/her party candidates to their desired constituency.
- Only one candidate from a party can be assigned to a single constituency.
- Once a election has started, the party leader can no longer assign candidates.

## Voter:
- The voter can vote in the election for the desired party/candidate that he desires.
- The candidates standing only in his/her constituency in state or national elections are displayed.
- After voting once in any election, the voter is unable to vote again unless a new election is started.
- A voter can cast his only once the election has been started by the admin.
