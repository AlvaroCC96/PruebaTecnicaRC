# Prueba Tecnica RC

## 1) Instalación y configuración:

- Clonar el repositorio.

- Dentro de la raiz del proyecto, ejecutar los siguientes comandos para instalar las dependencias necesarias.

```sh
npm install
npm run dev
composer install
```

## 2) Instalación:
- Crear archivo **.env**
    - Borrar la extension **.example** del archivo **.env.example**

- Modificar la variable **DB_HOST**, donde debe ir la ip entregada por su modem/router a su maquina local.


## 3) Configuración Docker:

- Dentro de la raiz del proyecto, ejecutar los siguientes comandos para crear la imagen a través de **docker-compose** . 

```sh
docker-compose build
docker-compose up
```

Se creará un contenedor con los servicios declarados en el archivo **docker-compose** Main, DB y Queue.

- Dentro del servicio Main, que contiene la aplicación, ejecutar: 

```sh
php artisan migrate
php artisan migrate:refresh --seed
```

## 4) Utilizar:
- A través de ***localhost:8000*** en el navegador ya podemos acceder a la aplicación.

- Usuarios:

| Tipo |  Usuario | Contraseña |
| ------ | ------ | ------ | 
| `Admin` | `admin@admin.com` |`admin` |
| `Basic` | `basic@basic.com` |`basic` |

---
## Autor

[ÁLVARO LUCAS CASTILLO CALABACERO](https://github.com/AlvaroCC96) - <alvarolucascc96@gmail.com> 
