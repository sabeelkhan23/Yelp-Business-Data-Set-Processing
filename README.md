# Yelp-Business-Data-Set-Processing
## Transforming Big Data in JSON (JavaScript Object Notation) Format as Semi-Structured Data 
One of the most common machine generated Big data format is JSON format. This project required me to create a database for the
given Yelp Business data by converting the data in a Semi-Structured JSON format to a structured file format (CSV, TSV) so that the converted files can be directly created as database tables in the MySQL in a table format.

For this lab, I have received a JSON file as business100ValidForm contains business data about location, categories, and ratings from the Yelp site or the CIS593 class webpage. You can directly download from the Yelp site at https://www.yelp.com/dataset

Scripting language : PHP, IDE : VScode, Database: MySQL
Dependencies : Composer, ikkez/f3-schema-builder

### Method Used:
1) I designed a scheme (multiple CSV file formats) and created multiple CSV files in my program and
2) Created database tables directly from each CSV in a Stored Procedure in a MySQL Server.

### Development:
#### 1. Platform setup procedure: 
  For the setup, I have used PHP lang and VScode as the IDE. Firstly, I have downloaded XAMPP onto my system which is a cross-platform application for MySQL and PHP.           And it runs as a local webserver on my computer. I have also installed MySQL workbench to be able to connect to it and create tables with the CSV outputs I had from           my script.
#### 2. Program executions to retrieve multiple CSV files: 
  The below script was used to generate multiple csv files by parsing the business100ValidForm JSON file;

![image](https://user-images.githubusercontent.com/89702819/156298065-ad17af7a-ac87-442c-86ca-98f42b83f70c.png)

### businessmain.csv

![image](https://user-images.githubusercontent.com/89702819/156298114-0c945882-96bd-4373-8e88-33307bdc28fc.png)

### categories.csv

![image](https://user-images.githubusercontent.com/89702819/156298155-7a372d8a-9eca-4a0d-9d6f-8ebfb1358173.png)

#### 3. Screen captures of mysql database for lab2:

![image](https://user-images.githubusercontent.com/89702819/156298341-f7b1ae2d-bdeb-4dcf-9694-4fbed5cbdb94.png)

####    The schema for the businessmain table is as follows;
  
![image](https://user-images.githubusercontent.com/89702819/156298394-3208f6b0-2149-4be9-a59a-5cf6f6fec262.png)
