# Dynamic FAQ project

FAQs provide easy access to the browse the key information to the user. The project has been developed using basic web technologies and tools such as html, css, bootstrap, javascript, php, mysql database and exploting semantic similarity API available through Dandelion. The functional requirements of the projects are as follows.
* The system will contain a list of questions stored in the database. The home page will display only those questions that are asked popularly. The list of questions will be dynamically changed based on the new questions added as per the request of users.
* The system will also display the questions categorically with questions in every category sorted according to their popularity.
* Whenever a user will search for a question using the system, he/she will be displayed a list of question similar to the one provided by the user based on the decreasing order of their matching index. This function uses Dandelion Semantic Similarity API for getting similar questions.
* Each question will be associated with a frequency which will determine its popularity. There will always be change in the popularity of questions with time. Therefore this will change the questions that would be displayed to the users since user will be displayed the few top most popular questions.
* There may be a case when a question submitted by the user may not match any question already present in the system. In this case, the similarity will be provided to helpdesk and they will create new question and answer in the system.
* A helpdesk will be working behind the system which will handle the questions that are submitted by the user to add to the system and answer them. The helpdesk will check whether the question is relevant and it can be added. It can also map same answer to a new question by framing the question in another form, if required. So, there can be multiple questions having similar meaning mapped to the same answer. The helpdesk can also add new category to the system.

The working of application is also demonstrated in the screenshots directory.

## Running the application
The database first needs to be setup using the schema as described in the DB_schema directory. The database used here is of MySQL. The configurations for database is provided in the conn.php file of the project. Also, the token for dandelion api needs to be provided in the searchq.php file. The application has been tested using XAMPP 8.0. To run the application, the file and folder under the code directory needs to be added into htdocs folder and then after starting the server, the base url will redirect to the necessary page. Also, it is necessary to create an admin user for the application using database to enable proper functioning.
