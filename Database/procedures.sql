DELIMITER $$
CREATE PROCEDURE IF NOT EXISTS saveUser(
    IN p_region_ID CHAR(36),
    IN p_genero_ID CHAR(36),
    IN p_nombre VARCHAR(50),
    IN p_apellido VARCHAR(50),
    IN p_edad INT,
    IN p_email VARCHAR(100),
    IN p_user_password CHAR(60),
    IN p_rol_ID CHAR(36),
    IN p_estado INT,
    OUT p_resultado INT
)
BEGIN
    DECLARE email_count INT;
    SELECT COUNT(*) INTO email_count
    FROM usuarios
    WHERE email= p_email;

    IF email_count > 0 THEN
        SET p_resultado = 0; 
    ELSE
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
            estado
        )
        VALUES (
            UUID(),
            p_region_ID,
            p_genero_ID,
            p_nombre,
            p_apellido,
            p_edad,
            p_email,
            p_user_password,
            p_rol_ID,
            p_estado
        );

        SET p_resultado = 1; 
    END IF;
END $$


CREATE PROCEDURE IF NOT EXISTS obtenerRegiones()
BEGIN
    SELECT region_ID, nombre_region FROM regiones;
END $$

CREATE PROCEDURE IF NOT EXISTS obtenerGeneros()
BEGIN
    SELECT genero_ID, nombre_genero FROM generos;
END $$

CREATE PROCEDURE IF NOT EXISTS obtenerRoles()
BEGIN
    SELECT rol_ID, nombre_rol FROM roles;
END $$

CREATE PROCEDURE IF NOT EXISTS obtenerRolID(IN nombreRol VARCHAR(50), OUT rolID INT)
BEGIN
    SELECT rol_ID INTO rolID 
    FROM roles 
    WHERE nombre_rol = nombreRol;
    
    IF rolID IS NULL THEN
        SET rolID = -1;
    END IF;
END $$

CREATE PROCEDURE IF NOT EXISTS verificarUsuario(IN p_usuario VARCHAR(100))
BEGIN
    SELECT user_password, estado
    FROM usuarios
    WHERE email = p_usuario;
END $$

CREATE PROCEDURE IF NOT EXISTS obtenerUsuarios()
BEGIN
    SELECT 
    usuarios.user_ID,
    usuarios.region_ID,
    usuarios.genero_ID,
    usuarios.nombre,
    usuarios.apellido,
    usuarios.edad,
    usuarios.email,
    usuarios.user_password,
    usuarios.estado,
    regiones.nombre_region AS region,
    generos.nombre_genero AS genero,
    roles.nombre_rol AS rol
    FROM 
        usuarios
    LEFT JOIN 
        regiones ON usuarios.region_id = regiones.region_ID
    LEFT JOIN 
        generos ON usuarios.genero_id = generos.genero_ID
    LEFT JOIN 
        roles ON usuarios.rol_ID = roles.rol_ID;
END $$

CREATE PROCEDURE IF NOT EXISTS actualizarUser(
    IN p_user_ID CHAR(36),
    IN p_region_ID CHAR(36),
    IN p_genero_ID CHAR(36),
    IN p_nombre VARCHAR(50),
    IN p_apellido VARCHAR(50),
    IN p_edad INT,
    IN p_email VARCHAR(100),
    IN p_user_password VARCHAR(60),
    IN p_rol_ID CHAR(36),
    IN p_estado INT
)
BEGIN
    UPDATE usuarios
    SET
        region_ID = p_region_ID,
        genero_ID = p_genero_ID,
        nombre = p_nombre,
        apellido = p_apellido,
        edad = p_edad,
        email = p_email,
        user_password = p_user_password,
        estado = p_estado,
        input_updated = Now()
    WHERE user_ID = p_user_ID;
END $$

CREATE PROCEDURE IF NOT EXISTS desactivarUser(
    IN p_user_ID CHAR(36),
    IN p_estado INT
)
BEGIN
    UPDATE usuarios
    SET
        estado = p_estado,
        input_updated = Now()
    WHERE user_ID = p_user_ID;
END $$
DELIMITER ;

