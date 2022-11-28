import mysql.connector

db=mysql.connector.connect(
    host="localhost",
    user="newuser",
    passwd="",
    database="game_db"
)


mycursor=db.cursor()

#mycursor.execute("CREATE TABLE Person (username VARCHAR(50),password VARCHAR(50),topScore int UNSIGNED, ID int PRIMARY KEY AUTO_INCREMENT)")

