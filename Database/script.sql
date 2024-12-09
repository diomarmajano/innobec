create database if not exists innobec;
use innobec;

CREATE TABLE IF NOT EXISTS regiones(
    region_ID char(36) not null primary key,
    nombre_region varchar(50)
);

CREATE TABLE IF NOT EXISTS roles (
    rol_ID char(36) not null primary key,
    nombre_rol varchar(50)
);

CREATE TABLE IF NOT EXISTS generos(
    genero_ID char(36) not null primary key,
    nombre_genero varchar(50)
);
CREATE TABLE IF NOT EXISTS usuarios(
    user_ID char(36) not null primary key,
    region_ID char(36) not null,
    genero_ID char(36) not null,
    nombre varchar(50) not null,
    apellido varchar(50) not null,
    edad int,
    email varchar(100) not null,
    user_password char(60) not null,
    rol_ID char(36) not null,
    estado boolean default 1,
    input_created datetime default current_timestamp,
    input_updated datetime default current_timestamp,
    constraint fk_region foreign key (region_ID) references regiones(region_ID),
    constraint fk_genero foreign key (genero_ID) references generos(genero_ID),
    constraint fk_rol foreign key (rol_ID) references roles(rol_ID)
);

INSERT INTO regiones (region_ID, nombre_region) VALUES
(UUID(), 'Arica y Parinacota'),
(UUID(), 'Tarapacá'),
(UUID(), 'Antofagasta'),
(UUID(), 'Atacama'),
(UUID(), 'Coquimbo'),
(UUID(), 'Valparaíso'),
(UUID(), 'Región del Libertador General Bernardo O’Higgins'),
(UUID(), 'Región del Maule'),
(UUID(), 'Región del Ñuble'),
(UUID(), 'Región del Biobío'),
(UUID(), 'Región de La Araucanía'),
(UUID(), 'Región de Los Ríos'),
(UUID(), 'Región de Los Lagos'),
(UUID(), 'Región de Aysén del General Carlos Ibáñez del Campo'),
(UUID(), 'Región de Magallanes y de la Antártica Chilena'),
(UUID(), 'Región Metropolitana de Santiago');

INSERT INTO generos (genero_ID, nombre_genero) VALUES
(UUID(), 'Masculino'),
(UUID(), 'Femenino'),
(UUID(), 'Otro'),
(UUID(), 'Prefiero no decirlo');

INSERT INTO roles (rol_ID, nombre_rol) VALUES
(UUID(), 'Administrador'),
(UUID(), 'usuario');

INSERT INTO usuarios (
    user_ID,
    region_ID,
    genero_ID,
    nombre,
    apellido,
    edad,
    email,
    user_password,
    rol_ID,
    estado,
    input_created,
    input_updated
)
VALUES (
    UUID(),
    (SELECT region_ID FROM regiones LIMIT 1), 
    (SELECT genero_ID FROM generos WHERE nombre_genero = 'Otro' LIMIT 1), 
    'Innobec',
    'CL',
    2024,
    'innobec@innobec.cl',
    '$2y$10$aMrh4oEsM0kiMF5ynnwFPeX1HcQqD5pJQp/JH804MovYGZAc0g0G6',
    (SELECT rol_ID FROM roles WHERE nombre_rol = 'Administrador' LIMIT 1),
    1, 
    NOW(), 
    NOW()
);


