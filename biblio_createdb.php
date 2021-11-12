<?php
$servername = "localhost";
$username = "app";
$password = "543210";
$dbname = "biblioteca";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table

$sql = "CREATE TABLE Usuario(
    idUsuario VARCHAR(25) PRIMARY KEY,
    nombre VARCHAR(20) NOT NULL,
    apellidos VARCHAR(50) NOT NULL,
    direccion VARCHAR(50) NOT NULL,
    telefono INT(10) NOT NULL,
    email VARCHAR(50) NOT NULL,
    ciudad VARCHAR(60) NULL,
    codigoPostal VARCHAR(8) NULL,
    pais VARCHAR(60) NULL,
    tipo VARCHAR(15) NOT NULL,
    estado VARCHAR(10) NULL,
    ocupacion VARCHAR(15) NULL
    )";

if ($conn->query($sql) === TRUE) {
    echo "Table usuario created successfully";
  } else {
    echo "Error creating table usuario: " . $conn->error;
  }


$sql = "CREATE TABLE Fondo(
    idFondo VARCHAR(15) PRIMARY KEY,
    titulo VARCHAR(40) NOT NULL,
    titulo_Original VARCHAR(50) NULL,
    isbn INT(15) NULL,
    editorial VARCHAR(20) NOT NULL,
    tipo VARCHAR(25) NOT NULL,
    portada VARCHAR(8) NULL,
    idioma VARCHAR(30) NOT NULL,
    coleccion VARCHAR(15) NOT NULL,
    añoEdicion TIMESTAMP NULL,
    lugarEdicion VARCHAR(60) NULL,
    sinopsis VARCHAR(255) NULL,
    autor VARCHAR (25) NULL,
    rol VARCHAR (9) NULL,
    numEjemplares TINYINT (100)
    )";

if ($conn->query($sql) === TRUE) {
    echo "Table fondo created successfully";
  } else {
    echo "Error creating table fondo: " . $conn->error;
  }

    

$sql = "CREATE TABLE Libro (
    id_libro INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    paginas INT(255),
    idFondo VARCHAR(15) NOT NULL,
    CONSTRAINT fk_idFondo FOREIGN KEY (idFondo) REFERENCES Fondo(idFondo)
    ON UPDATE CASCADE ON DELETE CASCADE
    )";
    
    if ($conn->query($sql) === TRUE) {
      echo "Table libro created successfully";
    } else {
      echo "Error creating table libro: " . $conn->error;
    }

$sql ="CREATE TABLE Revista (
    id_revista INT(10) NOT NULL AUTO_INCREMENT  PRIMARY KEY,
    paginas INT(255),
    idFondo VARCHAR(15) NOT NULL,
    numEntregas INT(100) NULL,
    CONSTRAINT fk_idFondoRevista FOREIGN KEY (idFondo) REFERENCES Fondo(idFondo)
    ON UPDATE CASCADE ON DELETE CASCADE
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Table revista created successfully";
    } else {
        echo "Error creating table revista: " . $conn->error;
    }

$sql = "CREATE TABLE Multimedia (
    id_multi INT(10) NOT NULL AUTO_INCREMENT  PRIMARY KEY,
    formato VARCHAR(25),
    idFondo VARCHAR(15) NOT NULL,
    tamaño INT(50) NULL,
    CONSTRAINT fk_idFondoMulti FOREIGN KEY (idFondo) REFERENCES Fondo(idFondo)
    ON UPDATE CASCADE ON DELETE CASCADE
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Table multimedia created successfully";
    } else {
        echo "Error creating table multimedia: " . $conn->error;
    }


$sql = "CREATE TABLE Autor (
    idAutor VARCHAR(20) PRIMARY KEY,
    nombre VARCHAR(20) NOT NULL,
    apellidos VARCHAR(50) NOT NULL,
    nacionalidad VARCHAR(30) NULL,
    fechaNacimiento TIMESTAMP NULL,
    biografia VARCHAR (255) NULL
    )";
        
    if ($conn->query($sql) === TRUE) {
        echo "Table autor created successfully";
    } else {
        echo "Error creating table autor: " . $conn->error;
    }


$sql = "CREATE TABLE Escrito (
    rol VARCHAR(15),
    id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    idFondo VARCHAR(15) NOT NULL,
    CONSTRAINT fk_idFondoEscrito FOREIGN KEY (idFondo) REFERENCES Fondo(idFondo)
    ON UPDATE CASCADE ON DELETE RESTRICT,
    idAutor VARCHAR(20) NOT NULL,
    CONSTRAINT fk_idAutor FOREIGN KEY (idAutor) REFERENCES Autor(idAutor)
    ON UPDATE CASCADE ON DELETE RESTRICT
    )";
            
    if ($conn->query($sql) === TRUE) {
        echo "Table escrito created successfully";
    } else {
        echo "Error creating table escrito: " . $conn->error;
    }

    $sql = "CREATE TABLE Analisis_critica (
        id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        opiniones VARCHAR(255) NULL,
        puntuacion INT(10) NULL,
        idFondo VARCHAR(15) NOT NULL,
        idUsuario VARCHAR(25) NOT NULL,
        CONSTRAINT fk_idFondoAnalisis FOREIGN KEY (idFondo) REFERENCES Fondo(idFondo)
        ON UPDATE CASCADE ON DELETE RESTRICT,
        CONSTRAINT fk_idUsuario FOREIGN KEY (idUsuario) REFERENCES Usuario(idUsuario)
        ON UPDATE CASCADE ON DELETE SET NULL
        )";

    if ($conn->query($sql) === TRUE) {
        echo "Table usuario created successfully";
    } else {
        echo "Error creating table usuario: " . $conn->error;
    }

$conn->close();
?>
