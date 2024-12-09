# **Mantenedor de Usuarios**

Prueba tecnica para **mantenedor de usuarios** funcionalidades: crear, editar y desactivar registros También incluye una autenticación mediante un **login** para acceseder al mentenedor de forma segura.

---

## **Funcionalidades Principales**

### **1. Mantenedor de Usuarios**
- **Crear usuarios:** Registra nuevos usuarios con la información necesaria.
- **Editar usuarios:** Actualiza la información de los usuarios existentes.
- **Desactivar usuarios:** Inhabilita cuentas temporalmente.
- **Activar usuarios:** Reactiva cuentas desactivadas para su uso.

### **2. Login**
- Inicio de sesión que permite acceder al sistema con credenciales (email y contraseña).
- Validación de contraseñas encriptadas mediante `password_verify`.
- Manejo de sesiones seguras mediante un token de autenticación.

---

## **Requisitos Previos**

Para correr el proyecto es necesario: tener instalado lo siguiente:

- **Servidor Web**: Apache.
- **PHP**: Versión 8.2 o superior.
- **Base de Datos**: MySQL.
  
---

## **Configuración del Proyecto**

1. Clona este repositorio en tu servidor local:
   ```bash
   git clone https://github.com/usuario/repositorio.git

## **Otras instrucciones**
se deben ejecutar los archivos de la carpeta Database en el siguiente orden: 

- **script.sql**
- **procedures.sql**

luego se podra ingresar al sistema con las credenciales por defecto: 

- **Usuario**: innobec@innobec.cl
- **password**: innobec

los usuario en estado: 'innactivo' al momento de ingresar se le enviara una alerta de que su cuenta esta desactivada. 